@extends('layouts.app')

@section('title', __('site.menu.gallery'))

@section('content')
@php
use Illuminate\Support\Facades\Storage;
@endphp
    {{-- Page Header --}}
    <x-page-header-simple
        :title="__('site.menu.gallery')"
        :subtitle="__('site.gallery.description')"
    />

    {{-- Gallery Content --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            @if($gallery->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                @foreach($gallery as $index => $item)
                @php
                    $delay = ($index % 3) * 100;
                @endphp
                {{-- Gallery Card with Gradient Border --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-emerald-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    {{-- Card Content --}}
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col h-full border border-green-100 dark:border-green-900/30">
                        {{-- Featured Image --}}
                        <div class="relative h-60 overflow-hidden">
                            <a href="{{ route('media.show', $item->slug) }}" class="block w-full h-full">
                                <img src="{{ Storage::url($item->featured_image) }}" alt="{{ app()->getLocale() === 'ta' ? $item->title_ta : $item->title_en }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            </a>

                            {{-- Event Date Badge --}}
                            @if($item->event_date)
                            <div class="absolute top-4 right-4">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full blur-md opacity-75"></div>
                                    <div class="relative bg-white dark:bg-gray-900 text-green-700 dark:text-green-300 px-3 py-1.5 rounded-full text-xs font-bold shadow-lg border-2 border-green-200 dark:border-green-700">
                                        {{ $item->event_date->format('M j') }}
                                    </div>
                                </div>
                            </div>
                            @endif

                            {{-- Gradient Overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        {{-- Card Content --}}
                        <div class="p-6 flex flex-col flex-grow bg-gradient-to-br from-green-50/50 to-emerald-50/50 dark:from-green-950/20 dark:to-emerald-950/20">
                            {{-- Title --}}
                            <h3 class="text-xl font-bold text-green-900 dark:text-green-100 mb-3 line-clamp-2 leading-tight">
                                 <a href="{{ route('media.show', $item->slug) }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-300">
                                    {!! app()->getLocale() === 'ta' ? $item->title_ta : $item->title_en !!}
                                 </a>
                            </h3>

                            {{-- Description/Excerpt (Optional) --}}
                            @if(app()->getLocale() === 'ta' ? $item->content_ta : $item->content_en)
                            <p class="text-green-700/80 dark:text-green-200/70 text-sm mb-4 line-clamp-3 flex-grow leading-relaxed">
                                {!! Str::limit(strip_tags(app()->getLocale() === 'ta' ? $item->content_ta : $item->content_en), 120) !!}
                            </p>
                            @endif

                            {{-- Meta Information --}}
                            <div class="flex items-center justify-between text-sm text-green-600 dark:text-green-400 mt-auto pt-4 border-t border-green-200/50 dark:border-green-700/50">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $item->created_at->diffForHumans() }}
                                </span>
                                <span class="bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 px-2.5 py-1 rounded-full text-xs font-medium">
                                    {{ $item->category->name ?? 'Gallery' }}
                                </span>
                            </div>

                             {{-- Action Buttons --}}
                            <div class="mt-5 flex items-center justify-between gap-3">
                                <div class="relative flex-1 group/btn">
                                    <div class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl opacity-0 group-hover/btn:opacity-75 blur transition duration-300"></div>
                                    <a href="{{ route('media.show', $item->slug) }}" class="relative inline-flex items-center justify-center w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
                                        <span>{{ __('site.about.learn-more') }}</span>
                                        <svg class="w-4 h-4 ml-2 transition-transform duration-300 group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                                {{-- View Image Button (Opens in new tab) --}}
                                <a href="{{ Storage::url($item->featured_image) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center p-2.5 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 rounded-xl hover:bg-green-200 dark:hover:bg-green-800/40 transition-all duration-200 shadow-md hover:shadow-lg" title="View Image">
                                    <span class="sr-only">View Image</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if ($gallery->hasPages())
            <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-center">
                 {{-- Add Tailwind styling classes if you publish pagination views --}}
                 {{-- Example basic styling: --}}
                 <div class="pagination-links">
                    {{ $gallery->links() }}
                 </div>
            </div>
            @endif

            @else
            {{-- No Images Found --}}
            <div class="text-center py-24" data-aos="fade-up">
                <div class="max-w-lg mx-auto relative group">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-emerald-500 rounded-3xl opacity-50 blur transition duration-500"></div>

                    {{-- Content Card --}}
                    <div class="relative bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-950/30 dark:to-emerald-950/30 p-12 rounded-3xl border border-green-200 dark:border-green-800">
                        {{-- Icon with Gradient Background --}}
                        <div class="relative w-20 h-20 mx-auto mb-8">
                            <div class="absolute inset-0 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl opacity-20"></div>
                            <div class="relative w-20 h-20 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center shadow-lg border-2 border-green-200 dark:border-green-700">
                                <svg class="w-10 h-10 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>

                        <h2 class="text-3xl font-extrabold text-green-900 dark:text-green-100 mb-4">{{ __('site.gallery.no_images') }}</h2>
                        <p class="text-lg text-green-700/80 dark:text-green-200/70 mb-8 leading-relaxed">{{ __('site.press_releases.check_back') }}</p>

                        {{-- Back Home Button --}}
                        <div class="relative inline-block group/btn">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl opacity-75 group-hover/btn:opacity-100 blur transition duration-300"></div>
                            <a href="{{ route('home') }}" class="relative inline-block bg-gradient-to-r from-green-600 to-emerald-600 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
                                {{ __('site.footer.back_home') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    {{-- Removed inline style block as line-clamp is standard Tailwind --}}
@endsection

{{-- Add this to your layouts/app.blade.php if you haven't published pagination views --}}
{{-- or customize your published views directly --}}
{{-- @push('styles')
<style>
    /* Basic styling for default Laravel pagination */
    .pagination-links nav[role="navigation"] > div:first-child {
        display: none; /* Hide 'Showing x to y of z results' */
    }
    .pagination-links nav[role="navigation"] > div:last-child {
        display: flex;
        justify-content: center;
    }
    .pagination-links nav span > span,
    .pagination-links nav a {
        @apply inline-flex items-center justify-center px-4 py-2 mx-1 text-sm font-medium border rounded-md transition-colors duration-150;
    }
    .pagination-links nav span > span { /* Current page */
        @apply bg-red-600 border-red-600 text-white z-10;
    }
     .pagination-links nav span[aria-disabled="true"] > span { /* Disabled arrows */
        @apply bg-gray-100 border-gray-300 text-gray-400 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-500;
     }
    .pagination-links nav a {
         @apply bg-white border-gray-300 text-gray-700 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-700;
    }
</style>
@endpush --}}