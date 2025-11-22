@extends('layouts.app')

@section('title', $book->title . ' - Book Viewer')

@section('content')
    {{-- Page Header --}}
    <section class="relative bg-blue-900 py-16">
        <div class="relative max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">{{ $book->title }}</h1>
            @if($book->author)
                <p class="text-lg text-gray-200">by {{ $book->author }}</p>
            @endif
        </div>
    </section>

    {{-- Book Viewer --}}
    <section class="py-8 px-4">
        <div class="max-w-6xl mx-auto">
            {{-- Navigation --}}
            <div class="flex flex-wrap items-center justify-between mb-6 bg-white p-4 rounded-lg shadow">
                <div class="flex items-center space-x-4 mb-4 md:mb-0">
                    <a href="{{ route('books') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        {{ __('site.books.back_to_books') }}
                    </a>
                </div>

                <div class="flex items-center space-x-2">
                    <button id="prevPage" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded-lg disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <span class="text-sm text-gray-600">
                        {{ __('site.books.page') }} <span id="currentPage">1</span> {{ __('site.books.of') }} <span id="totalPages">-</span>
                    </span>
                    <button id="nextPage" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-2 rounded-lg disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- PDF Viewer Container --}}
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div id="pdfContainer" class="relative">
                    <div id="loadingIndicator" class="flex items-center justify-center py-20">
                        <div class="text-center">
                            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto mb-4"></div>
                            <p class="text-gray-600">Loading book...</p>
                        </div>
                    </div>
                    <canvas id="pdfCanvas" class="w-full hidden"></canvas>
                </div>
            </div>

            {{-- Zoom Controls --}}
            <div class="flex justify-center mt-6 space-x-4">
                <button id="zoomOut" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                    </svg>
                    {{ __('site.books.zoom_out') }}
                </button>
                <button id="zoomIn" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    {{ __('site.books.zoom_in') }}
                </button>
                <button id="fitToWidth" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    {{ __('site.books.fit_to_width') }}
                </button>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<!-- PDF.js Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // PDF.js configuration
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

        let pdfDoc = null;
        let pageNum = 1;
        let pageRendering = false;
        let pageNumPending = null;
        let scale = 1.5;
        const canvas = document.getElementById('pdfCanvas');
        const ctx = canvas.getContext('2d');

        // Note: PDF viewing functionality has been removed as file_path field is no longer available
        document.getElementById('loadingIndicator').innerHTML = '<div class="text-center"><p class="text-gray-600">PDF viewer is not available. Please contact administrator.</p></div>';

        // Render page function
        function renderPage(num) {
            pageRendering = true;

            pdfDoc.getPage(num).then(function(page) {
                const viewport = page.getViewport({scale: scale});
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                };

                const renderTask = page.render(renderContext);

                renderTask.promise.then(function() {
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });
            });

            document.getElementById('currentPage').textContent = num;
        }

        // Queue render page function
        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        }

        // Navigation functions
        function onPrevPage() {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
        }

        function onNextPage() {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
        }

        // Event listeners
        document.getElementById('prevPage').addEventListener('click', onPrevPage);
        document.getElementById('nextPage').addEventListener('click', onNextPage);

        // Zoom controls
        document.getElementById('zoomIn').addEventListener('click', function() {
            scale += 0.25;
            renderPage(pageNum);
        });

        document.getElementById('zoomOut').addEventListener('click', function() {
            if (scale > 0.5) {
                scale -= 0.25;
                renderPage(pageNum);
            }
        });

        document.getElementById('fitToWidth').addEventListener('click', function() {
            pdfDoc.getPage(pageNum).then(function(page) {
                const viewport = page.getViewport({scale: 1});
                const containerWidth = document.getElementById('pdfContainer').clientWidth - 40; // padding
                scale = containerWidth / viewport.width;
                renderPage(pageNum);
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                onPrevPage();
            } else if (e.key === 'ArrowRight') {
                onNextPage();
            }
        });

        // Update button states
        function updateButtons() {
            document.getElementById('prevPage').disabled = pageNum <= 1;
            document.getElementById('nextPage').disabled = pageNum >= (pdfDoc ? pdfDoc.numPages : 1);
        }

        // Update buttons when page changes
        const observer = new MutationObserver(updateButtons);
        observer.observe(document.getElementById('currentPage'), { childList: true, subtree: true });

        // Initial button state update
        setTimeout(updateButtons, 1000);
    });
</script>
@endpush