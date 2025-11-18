@extends('layouts.app')

@section('title', app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en)

@section('content')
@php
use Illuminate\Support\Facades\Storage;
@endphp
    {{-- Hero Section --}}
    <section class="bg-blue-900 py-16 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight">{{ app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en }}</h1>
            @if($mediaItem->event_date)
                <div class="flex items-center justify-center text-white text-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    {{ $mediaItem->event_date->format('F j, Y') }}
                </div>
            @endif
        </div>
    </section>

    {{-- Main Content Section --}}
    <section class="py-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                {{-- Main Content --}}
                <div class="lg:col-span-2">
                    {{-- Featured Image --}}
                    @if($mediaItem->featured_image)
                        <div class="mb-8">
                            <img src="{{ Storage::url($mediaItem->featured_image) }}" alt="{{ app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en }}" class="w-full h-64 md:h-96 object-cover rounded-lg shadow-lg">
                        </div>
                    @endif

                    {{-- Article Meta --}}
                    <div class="flex items-center space-x-4 mb-8 text-gray-600">
                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $mediaItem->category->name ?? 'News' }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $mediaItem->created_at->diffForHumans() }}
                        </span>
                    </div>

                    {{-- Article Content --}}
                    <div class="prose prose-lg max-w-none text-justify mb-8">
                        {!! app()->getLocale() === 'ta' ? $mediaItem->content_ta : $mediaItem->content_en !!}
                    </div>

                    {{-- Video Section --}}
                    @if($mediaItem->video_link)
                        <div class="mb-12">
                            <h3 class="text-2xl font-bold text-gray-800 mb-6">Featured Video</h3>
                            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-lg">
                                @php
                                    $videoId = null;
                                    // Extract YouTube video ID from various YouTube URL formats
                                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $mediaItem->video_link, $matches)) {
                                        $videoId = $matches[1];
                                    }
                                @endphp
                                @if($videoId)
                                    <iframe
                                        src="https://www.youtube.com/embed/{{ $videoId }}"
                                        class="w-full"
                                        height="auto"
                                        style="aspect-ratio: 16/9;"
                                        frameborder="0"
                                        allowfullscreen
                                        title="{{ app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en }}"
                                    ></iframe>
                                @else
                                    <div class="w-full h-64 flex items-center justify-center bg-gray-200">
                                        <div class="text-center text-gray-500">
                                            <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                            </svg>
                                            <p class="text-lg font-medium">Video Not Available</p>
                                            <p class="text-sm">Unable to load the video content</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{-- More Photos Gallery --}}
                    @if($mediaItem->more_photos && count($mediaItem->more_photos) > 0)
                        <div class="mb-12">
                            <h3 class="text-2xl font-bold text-gray-800 mb-6">Photo Gallery</h3>
                            <div class="masonry-grid columns-1 md:columns-2 lg:columns-3 xl:columns-4 gap-4 space-y-4">
                                @foreach($mediaItem->more_photos as $index => $photo)
                                    <div class="gallery-item group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer animate-fadeInUp break-inside-avoid"
                                         style="animation-delay: {{ $index * 0.1 }}s"
                                         data-index="{{ $index }}"
                                         data-image="{{ Storage::url($photo) }}"
                                         data-title="{{ app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en }} - Photo {{ $index + 1 }}">
                                        <img src="{{ Storage::url($photo) }}" alt="Media Photo {{ $index + 1 }}" class="w-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end">
                                            <div class="p-4 text-white">
                                                <div class="flex items-center justify-between">
                                                    <span class="text-sm font-medium">Photo {{ $index + 1 }}</span>
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Social Share --}}
                    <div class="border-t pt-8 mt-12">
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Share this article</h4>
                        <div class="flex space-x-4">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                               target="_blank"
                               class="bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                                </svg>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode((app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en) . ' ' . url()->current()) }}"
                               target="_blank"
                               class="bg-blue-400 text-white p-3 rounded-full hover:bg-blue-500 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode((app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en) . ' ' . url()->current()) }}"
                               target="_blank"
                               class="bg-green-500 text-white p-3 rounded-full hover:bg-green-600 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Right Sidebar --}}
                <div class="lg:col-span-1">
                    {{-- Article Info Card --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 mb-8 sticky top-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Article Information</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Published:</span>
                                <span class="font-medium">{{ $mediaItem->created_at->format('M j, Y') }}</span>
                            </div>
                            @if($mediaItem->event_date)
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Event Date:</span>
                                <span class="font-medium">{{ $mediaItem->event_date->format('M j, Y') }}</span>
                            </div>
                            @endif
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Category:</span>
                                <span class="bg-red-100 text-red-600 px-2 py-1 rounded-full text-sm font-medium">
                                    {{ $mediaItem->category->name ?? 'News' }}
                                </span>
                            </div>
                            @if($mediaItem->video_link)
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Media:</span>
                                <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-sm font-medium">
                                    Video Available
                                </span>
                            </div>
                            @endif
                            @if($mediaItem->more_photos && count($mediaItem->more_photos) > 0)
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Gallery:</span>
                                <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-sm font-medium">
                                    {{ count($mediaItem->more_photos) }} Photos
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- Quick Links --}}
                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Explore More</h3>
                        <div class="space-y-3">
                            <a href="{{ route('latest-news') }}" class="block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200 text-center">
                                Latest News
                            </a>
                            <a href="{{ route('press-releases') }}" class="block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200 text-center">
                                Press Releases
                            </a>
                            <a href="{{ route('events') }}" class="block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200 text-center">
                                Events
                            </a>
                            <a href="{{ route('gallery') }}" class="block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200 text-center">
                                Gallery
                            </a>
                            <a href="{{ route('videos') }}" class="block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200 text-center">
                                Videos
                            </a>
                        </div>
                    </div>

                    {{-- Related Articles --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 sticky top-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Recent Articles</h3>
                        <div class="space-y-4">
                            @php
                                $relatedArticles = \App\Models\Media::where('id', '!=', $mediaItem->id)
                                    ->where('category_id', $mediaItem->category_id)
                                    ->orderBy('created_at', 'desc')
                                    ->take(3)
                                    ->get();
                            @endphp
                            @foreach($relatedArticles as $article)
                            <div class="border-b border-gray-100 pb-3 last:border-b-0">
                                <a href="{{ route('media.show', $article->slug) }}" class="block hover:text-red-600 transition-colors duration-200">
                                    <h4 class="font-medium text-gray-800 mb-1 text-sm leading-tight">
                                        {{ Str::limit(app()->getLocale() === 'ta' ? $article->title_ta : $article->title_en, 60) }}
                                    </h4>
                                    <p class="text-gray-500 text-xs">{{ $article->created_at->diffForHumans() }}</p>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Image Gallery Modal --}}
    @if($mediaItem->more_photos && count($mediaItem->more_photos) > 0)
    <div id="gallery-modal" class="fixed inset-0 bg-black bg-opacity-90 hidden z-50 flex items-center justify-center">
        <div class="relative w-full h-full max-w-6xl max-h-screen p-4">
            {{-- Close Button --}}
            <button id="close-gallery-modal" class="absolute top-4 right-4 z-60 text-white hover:text-gray-300 transition-colors">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            {{-- Previous Button --}}
            <button id="prev-image" class="absolute left-4 top-1/2 transform -translate-y-1/2 z-60 text-white hover:text-gray-300 transition-colors bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-75">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            {{-- Next Button --}}
            <button id="next-image" class="absolute right-4 top-1/2 transform -translate-y-1/2 z-60 text-white hover:text-gray-300 transition-colors bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-75">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            {{-- Main Image --}}
            <div class="w-full h-full flex items-center justify-center">
                <img id="modal-image" src="" alt="" class="max-w-full max-h-full object-contain">
            </div>

            {{-- Image Info --}}
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-black bg-opacity-75 text-white px-4 py-2 rounded-lg">
                <div class="text-center">
                    <span id="image-counter" class="text-sm font-medium"></span>
                    <span id="image-title" class="block text-xs mt-1 text-gray-300"></span>
                </div>
            </div>

            {{-- Thumbnail Strip --}}
            <div class="absolute bottom-16 left-0 right-0 px-4">
                <div id="thumbnail-strip" class="flex justify-center space-x-2 overflow-x-auto pb-2">
                    @foreach($mediaItem->more_photos as $index => $photo)
                        <div class="thumbnail-item flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden cursor-pointer border-2 border-transparent hover:border-white transition-colors opacity-60 hover:opacity-100 {{ $index === 0 ? 'active opacity-100 border-white' : '' }}"
                             data-index="{{ $index }}"
                             data-image="{{ Storage::url($photo) }}">
                            <img src="{{ Storage::url($photo) }}" alt="Thumb {{ $index + 1 }}" class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

    <style>
        .animate-fadeInUp {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .animate-fadeInUp.animate-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Masonry Layout */
        .masonry-grid {
            column-gap: 1rem;
        }

        .gallery-item {
            margin-bottom: 1rem;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Modal Styles */
        #gallery-modal img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .thumbnail-item.active {
            border-color: white !important;
            opacity: 1 !important;
        }

        /* Responsive Masonry */
        @media (max-width: 768px) {
            .masonry-grid {
                column-count: 1;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .masonry-grid {
                column-count: 2;
            }
        }

        @media (min-width: 1025px) and (max-width: 1280px) {
            .masonry-grid {
                column-count: 3;
            }
        }

        @media (min-width: 1281px) {
            .masonry-grid {
                column-count: 4;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer for gallery animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-visible');
                    }
                });
            }, observerOptions);

            // Observe gallery items
            document.querySelectorAll('.animate-fadeInUp').forEach(el => {
                observer.observe(el);
            });

            // Gallery Modal Functionality
            @if($mediaItem->more_photos && count($mediaItem->more_photos) > 0)
            const galleryModal = document.getElementById('gallery-modal');
            const modalImage = document.getElementById('modal-image');
            const imageCounter = document.getElementById('image-counter');
            const imageTitle = document.getElementById('image-title');
            const thumbnailStrip = document.getElementById('thumbnail-strip');
            const closeModalBtn = document.getElementById('close-gallery-modal');
            const prevBtn = document.getElementById('prev-image');
            const nextBtn = document.getElementById('next-image');

            let currentImageIndex = 0;
            const galleryImages = @json($mediaItem->more_photos);

            // Open modal when clicking gallery items
            document.querySelectorAll('.gallery-item').forEach((item, index) => {
                item.addEventListener('click', function() {
                    currentImageIndex = parseInt(this.getAttribute('data-index'));
                    openModal(currentImageIndex);
                });
            });

            // Thumbnail click handlers
            document.querySelectorAll('.thumbnail-item').forEach((thumb, index) => {
                thumb.addEventListener('click', function() {
                    currentImageIndex = index;
                    updateModal(currentImageIndex);
                });
            });

            // Navigation buttons
            prevBtn.addEventListener('click', function() {
                currentImageIndex = currentImageIndex > 0 ? currentImageIndex - 1 : galleryImages.length - 1;
                updateModal(currentImageIndex);
            });

            nextBtn.addEventListener('click', function() {
                currentImageIndex = currentImageIndex < galleryImages.length - 1 ? currentImageIndex + 1 : 0;
                updateModal(currentImageIndex);
            });

            // Close modal
            closeModalBtn.addEventListener('click', closeModal);
            galleryModal.addEventListener('click', function(e) {
                if (e.target === galleryModal) {
                    closeModal();
                }
            });

            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (!galleryModal.classList.contains('hidden')) {
                    if (e.key === 'Escape') {
                        closeModal();
                    } else if (e.key === 'ArrowLeft') {
                        prevBtn.click();
                    } else if (e.key === 'ArrowRight') {
                        nextBtn.click();
                    }
                }
            });

            function openModal(index) {
                currentImageIndex = index;
                updateModal(index);
                galleryModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeModal() {
                galleryModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }

            function updateModal(index) {
                const imageUrl = '/storage/' + galleryImages[index];
                const imageTitleText = "{{ app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en }} - Photo " + (index + 1);

                modalImage.src = imageUrl;
                modalImage.alt = imageTitleText;
                imageCounter.textContent = (index + 1) + ' / ' + galleryImages.length;
                document.getElementById('image-title').textContent = imageTitleText;

                // Update active thumbnail
                document.querySelectorAll('.thumbnail-item').forEach((thumb, i) => {
                    thumb.classList.toggle('active', i === index);
                    thumb.classList.toggle('border-white', i === index);
                    thumb.classList.toggle('opacity-60', i !== index);
                    thumb.classList.toggle('opacity-100', i === index);
                });
            }
            @endif
        });
    </script>
@endsection