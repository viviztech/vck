@extends('layouts.app')

@section('title', __('site.menu.videos'))

@section('content')
    {{-- Page Header --}}
    <x-page-header-simple
        :title="__('site.menu.videos')"
        :subtitle="__('site.videos.description')"
    />

    {{-- Videos Content --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            @if($videos->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                @foreach($videos as $index => $video)
                @php
                    $delay = ($index % 3) * 100;
                    $videoId = null;
                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $video->video_link, $matches)) {
                        $videoId = $matches[1];
                    }
                    $thumbnail = $videoId ? "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg" : asset('assets/images/placeholders/video-placeholder.jpg');
                @endphp
                {{-- Video Card with Gradient Border --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-violet-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    {{-- Video Card --}}
                    <div class="relative overflow-hidden rounded-3xl cursor-pointer video-thumbnail aspect-video bg-gray-900 border border-indigo-100 dark:border-indigo-900/30 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2" data-video-id="{{ $videoId }}" data-video-url="{{ $video->video_link }}">
                        {{-- Thumbnail Image --}}
                        <img src="{{ $thumbnail }}"
                             alt="{{ app()->getLocale() === 'ta' ? $video->title_ta : $video->title_en }}"
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 rounded-3xl"
                             onerror="this.onerror=null; this.src='{{ asset('assets/images/placeholders/video-placeholder-hq.jpg') }}';">

                        {{-- Play Button Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300 flex items-center justify-center rounded-3xl">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-violet-500 rounded-full blur-xl opacity-75 group-hover:opacity-100 transition-opacity"></div>
                                <div class="relative bg-gradient-to-br from-indigo-600 to-violet-600 rounded-full p-5 transform scale-90 group-hover:scale-110 transition-transform duration-300 shadow-2xl">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- Text Overlay --}}
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/70 to-transparent p-6 text-white transform translate-y-2 group-hover:translate-y-0 transition-transform duration-500 ease-in-out rounded-b-3xl">
                            <h3 class="text-lg font-bold mb-2 line-clamp-2">{!! app()->getLocale() === 'ta' ? $video->title_ta : $video->title_en !!}</h3>
                            <p class="text-sm opacity-90">{{ $video->event_date ? $video->event_date->format('M j, Y') : '' }}</p>
                        </div>

                        {{-- YouTube Badge --}}
                        <div class="absolute top-4 right-4">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-br from-red-500 to-red-600 rounded-full blur-md opacity-75"></div>
                                <div class="relative bg-gradient-to-br from-red-600 to-red-700 text-white text-xs px-3 py-2 rounded-full flex items-center gap-1.5 shadow-lg font-semibold">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                    YouTube
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
             @if ($videos->hasPages())
            <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-center">
                 {{-- Add Tailwind styling classes if you publish pagination views --}}
                 <div class="pagination-links">
                    {{ $videos->links() }}
                 </div>
            </div>
            @endif

            @else
            {{-- No Videos Found --}}
            <div class="text-center py-24" data-aos="fade-up">
                <div class="max-w-lg mx-auto relative group">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-violet-500 rounded-3xl opacity-50 blur transition duration-500"></div>

                    {{-- Content Card --}}
                    <div class="relative bg-gradient-to-br from-indigo-50 to-violet-50 dark:from-indigo-950/30 dark:to-violet-950/30 p-12 rounded-3xl border border-indigo-200 dark:border-indigo-800">
                        {{-- Icon with Gradient Background --}}
                        <div class="relative w-20 h-20 mx-auto mb-8">
                            <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-violet-500 rounded-2xl opacity-20"></div>
                            <div class="relative w-20 h-20 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center shadow-lg border-2 border-indigo-200 dark:border-indigo-700">
                                <svg class="w-10 h-10 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>

                        <h2 class="text-3xl font-extrabold text-indigo-900 dark:text-indigo-100 mb-4">{{ __('site.videos.no_videos') }}</h2>
                        <p class="text-lg text-indigo-700/80 dark:text-indigo-200/70 mb-8 leading-relaxed">{{ __('site.press_releases.check_back') }}</p>

                        {{-- Back Home Button --}}
                        <div class="relative inline-block group/btn">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-violet-500 rounded-xl opacity-75 group-hover/btn:opacity-100 blur transition duration-300"></div>
                            <a href="{{ route('home') }}" class="relative inline-block bg-gradient-to-r from-indigo-600 to-violet-600 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
                                {{ __('site.footer.back_home') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    {{-- Modal for video playback --}}
    <div id="video-modal" class="fixed inset-0 bg-black/80 hidden z-50 flex items-center justify-center p-4">
        {{-- Modal Content Container --}}
        <div class="relative w-full max-w-4xl mx-auto bg-black rounded-lg shadow-2xl">
             {{-- Close Button --}}
            <button id="close-modal" class="absolute -top-4 -right-4 md:top-0 md:-right-10 text-white hover:text-gray-300 transition-colors z-50 p-2 rounded-full bg-black/50 hover:bg-black/70" aria-label="Close video">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            {{-- Iframe Wrapper --}}
            <div class="aspect-video">
                <iframe id="video-iframe" class="w-full h-full rounded-lg" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
{{-- Keep existing modal script --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnails = document.querySelectorAll('.video-thumbnail');
        const modal = document.getElementById('video-modal');
        const iframe = document.getElementById('video-iframe');
        const closeModalBtn = document.getElementById('close-modal'); // Use the button ID

        function openModal(videoId) {
            if (videoId) {
                iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`; // Added rel=0
                modal.classList.remove('hidden');
                modal.classList.add('flex'); // Use flex for centering
                // Apply enter animation class
                modal.classList.remove('animate-modalOut');
                modal.classList.add('animate-modalIn');
            }
        }

        function closeModal() {
             // Apply leave animation class
             modal.classList.remove('animate-modalIn');
             modal.classList.add('animate-modalOut');

             // Wait for animation to finish before hiding and clearing src
             setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex', 'animate-modalOut'); // Clean up classes
                iframe.src = ''; // Stop video playback
            }, 300); // Duration should match animation duration
        }

        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                const videoId = this.getAttribute('data-video-id');
                openModal(videoId);
            });
        });

        // Close modal via button
        closeModalBtn.addEventListener('click', closeModal);

        // Close modal by clicking outside the video container
        modal.addEventListener('click', function(e) {
            // Check if the click is directly on the modal backdrop (not the iframe container)
            if (e.target === modal) {
                closeModal();
            }
        });

         // Close modal with Escape key
         document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>

{{-- Keep existing animation styles --}}
<style>
    .animate-modalIn {
        animation: modalIn 0.3s ease-out forwards;
    }
    .animate-modalOut {
        animation: modalOut 0.3s ease-in forwards;
    }
    @keyframes modalIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    @keyframes modalOut {
        from { opacity: 1; transform: scale(1); }
        to { opacity: 0; transform: scale(0.95); }
    }
    /* Basic styling for default Laravel pagination */
    .pagination-links nav[role="navigation"] > div:first-child { display: none; }
    .pagination-links nav[role="navigation"] > div:last-child { display: flex; justify-content: center;}
    .pagination-links nav span > span, .pagination-links nav a { @apply inline-flex items-center justify-center px-4 py-2 mx-1 text-sm font-medium border rounded-md transition-colors duration-150; }
    .pagination-links nav span > span { @apply bg-red-600 border-red-600 text-white z-10; }
    .pagination-links nav span[aria-disabled="true"] > span { @apply bg-gray-100 border-gray-300 text-gray-400 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-500; }
    .pagination-links nav a { @apply bg-white border-gray-300 text-gray-700 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-700; }
</style>
@endpush