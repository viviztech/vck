@extends('layouts.app')

@section('title', __('site.press_releases.title'))

@section('content')
@php
use Illuminate\Support\Facades\Storage;
@endphp
    {{-- Page Header --}}
    <x-page-header-simple
        :title="__('site.press_releases.title')"
        :subtitle="__('site.press_releases.subtitle')"
    />

    {{-- Press Releases Content --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            @if($press_releases->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                @foreach($press_releases as $index => $press_release)
                @php
                    $delay = ($index % 3) * 100;
                @endphp
                {{-- Press Release Card with Gradient Border --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-orange-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    {{-- Card Content --}}
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col h-full border border-red-100 dark:border-red-900/30">
                        {{-- Featured Image --}}
                        <div class="relative h-60 overflow-hidden">
                             <a href="{{ route('media.show', $press_release->slug) }}" class="block w-full h-full">
                                <img src="{{ Storage::url($press_release->featured_image) }}" alt="{{ app()->getLocale() === 'ta' ? $press_release->title_ta : $press_release->title_en }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                             </a>

                             {{-- Date Badge --}}
                             <div class="absolute top-4 right-4">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-red-500 to-orange-500 rounded-full blur-md opacity-75"></div>
                                    <div class="relative bg-white dark:bg-gray-900 text-red-700 dark:text-red-300 px-4 py-2 rounded-full text-xs font-bold shadow-lg border-2 border-red-200 dark:border-red-700">
                                        {{ $press_release->event_date ? $press_release->event_date->format('M j, Y') : $press_release->created_at->format('M j, Y') }}
                                    </div>
                                </div>
                             </div>

                             {{-- Gradient Overlay --}}
                             <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        {{-- Card Content --}}
                        <div class="p-6 flex flex-col flex-grow bg-gradient-to-br from-red-50/50 to-orange-50/50 dark:from-red-950/20 dark:to-orange-950/20">
                            {{-- Title --}}
                            <h3 class="text-xl font-bold text-red-900 dark:text-red-100 mb-3 line-clamp-2 leading-tight">
                                <a href="{{ route('media.show', $press_release->slug) }}" class="hover:text-orange-600 dark:hover:text-orange-400 transition-colors duration-300">
                                    {!! app()->getLocale() === 'ta' ? $press_release->title_ta : $press_release->title_en !!}
                                </a>
                            </h3>

                            {{-- Excerpt --}}
                            <p class="text-red-700/80 dark:text-red-200/70 text-sm mb-5 line-clamp-3 flex-grow leading-relaxed">
                                {!! Str::limit(strip_tags(app()->getLocale() === 'ta' ? $press_release->content_ta : $press_release->content_en), 150) !!}
                            </p>

                            {{-- Read More Button --}}
                            <div class="mt-auto pt-4 border-t border-red-200/50 dark:border-red-700/50">
                                <div class="relative group/btn">
                                    <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-orange-500 rounded-xl opacity-0 group-hover/btn:opacity-75 blur transition duration-300"></div>
                                    <a href="{{ route('media.show', $press_release->slug) }}" class="relative inline-flex items-center justify-center w-full bg-gradient-to-r from-red-600 to-orange-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
                                        {{ __('site.about.learn-more') }}
                                        <svg class="w-4 h-4 ml-2 rtl:rotate-180 transition-transform duration-300 group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
             @if ($press_releases->hasPages())
            <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-center">
                 <div class="pagination-links">
                    {{ $press_releases->links() }}
                 </div>
            </div>
            @endif

            @else
            {{-- No Releases Found --}}
            <div class="text-center py-24" data-aos="fade-up">
                <div class="max-w-lg mx-auto relative group">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-orange-500 rounded-3xl opacity-50 blur transition duration-500"></div>

                    {{-- Content Card --}}
                    <div class="relative bg-gradient-to-br from-red-50 to-orange-50 dark:from-red-950/30 dark:to-orange-950/30 p-12 rounded-3xl border border-red-200 dark:border-red-800">
                        {{-- Icon with Gradient Background --}}
                        <div class="relative w-20 h-20 mx-auto mb-8">
                            <div class="absolute inset-0 bg-gradient-to-br from-red-500 to-orange-500 rounded-2xl opacity-20"></div>
                            <div class="relative w-20 h-20 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center shadow-lg border-2 border-red-200 dark:border-red-700">
                                <svg class="w-10 h-10 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 12h6m-1 8H5"></path>
                                </svg>
                            </div>
                        </div>

                        <h2 class="text-3xl font-extrabold text-red-900 dark:text-red-100 mb-4">{{ __('site.press_releases.no_releases') }}</h2>
                        <p class="text-lg text-red-700/80 dark:text-red-200/70 mb-8 leading-relaxed">{{ __('site.press_releases.check_back') }}</p>

                        {{-- Back Home Button --}}
                        <div class="relative inline-block group/btn">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-orange-500 rounded-xl opacity-75 group-hover/btn:opacity-100 blur transition duration-300"></div>
                            <a href="{{ route('home') }}" class="relative inline-block bg-gradient-to-r from-red-600 to-orange-600 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
                                {{ __('site.footer.back_home') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection

{{-- Add this to your layouts/app.blade.php if needed and not already present --}}
{{-- @push('styles')
<style>
    /* Basic styling for default Laravel pagination */
    .pagination-links nav[role="navigation"] > div:first-child { display: none; }
    .pagination-links nav[role="navigation"] > div:last-child { display: flex; justify-content: center;}
    .pagination-links nav span > span, .pagination-links nav a { @apply inline-flex items-center justify-center px-4 py-2 mx-1 text-sm font-medium border rounded-md transition-colors duration-150; }
    .pagination-links nav span > span { @apply bg-red-600 border-red-600 text-white z-10; }
    .pagination-links nav span[aria-disabled="true"] > span { @apply bg-gray-100 border-gray-300 text-gray-400 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-500; }
    .pagination-links nav a { @apply bg-white border-gray-300 text-gray-700 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-700; }
</style>
@endpush --}}