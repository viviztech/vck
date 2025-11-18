@extends('layouts.app')

@section('title', __('site.menu.latest_news'))

@section('content')
@php
use Illuminate\Support\Facades\Storage;
@endphp
    {{-- Page Header --}}
    <x-page-header-simple
        :title="__('site.menu.latest_news')"
        :subtitle="__('site.home.latest_news_description')"
    />

    {{-- Latest News Content --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            @if($latest_news->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                @foreach($latest_news as $index => $news)
                @php
                    $delay = ($index % 3) * 100;
                @endphp
                {{-- News Card with Gradient Border --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    {{-- Card Content --}}
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col h-full border border-blue-100 dark:border-blue-900/30">
                        {{-- Featured Image --}}
                        <div class="relative h-60 overflow-hidden">
                             <a href="{{ route('media.show', $news->slug) }}" class="block w-full h-full">
                                <img src="{{ Storage::url($news->featured_image) }}" alt="{{ app()->getLocale() === 'ta' ? $news->title_ta : $news->title_en }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                             </a>

                             {{-- Date Badge --}}
                             <div class="absolute top-4 right-4">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-500 rounded-full blur-md opacity-75"></div>
                                    <div class="relative bg-white dark:bg-gray-900 text-blue-700 dark:text-blue-300 px-4 py-2 rounded-full text-xs font-bold shadow-lg border-2 border-blue-200 dark:border-blue-700">
                                        {{ $news->event_date ? $news->event_date->format('M j, Y') : $news->created_at->format('M j, Y') }}
                                    </div>
                                </div>
                             </div>

                             {{-- Gradient Overlay --}}
                             <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        {{-- Card Content --}}
                        <div class="p-6 flex flex-col flex-grow bg-gradient-to-br from-blue-50/50 to-red-50/50 dark:from-blue-950/20 dark:to-red-950/20">
                            {{-- Title --}}
                            <h3 class="text-xl font-bold text-blue-900 dark:text-blue-100 mb-3 line-clamp-2 leading-tight">
                                <a href="{{ route('media.show', $news->slug) }}" class="hover:text-red-600 dark:hover:text-red-400 transition-colors duration-300">
                                    {!! app()->getLocale() === 'ta' ? $news->title_ta : $news->title_en !!}
                                </a>
                            </h3>

                            {{-- Excerpt --}}
                            <p class="text-blue-700/80 dark:text-blue-200/70 text-sm mb-5 line-clamp-3 flex-grow leading-relaxed">
                                {!! Str::limit(strip_tags(app()->getLocale() === 'ta' ? $news->content_ta : $news->content_en), 150) !!}
                            </p>

                            {{-- Read More Button --}}
                            <div class="mt-auto pt-4 border-t border-blue-200/50 dark:border-blue-700/50">
                                 <a href="{{ route('media.show', $news->slug) }}" class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-red-600 dark:hover:text-red-400 font-semibold text-sm transition-all duration-300 group/link">
                                    {{ __('site.about.learn-more') }}
                                    <svg class="w-4 h-4 ml-1 rtl:rotate-180 transition-transform duration-300 group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if ($latest_news->hasPages())
            <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-center">
                 <div class="pagination-links">
                    {{ $latest_news->links() }}
                 </div>
            </div>
            @endif

            @else
            {{-- No News Found --}}
            <div class="text-center py-24" data-aos="fade-up">
                <div class="max-w-lg mx-auto relative group">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-3xl opacity-50 blur transition duration-500"></div>

                    {{-- Content Card --}}
                    <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 p-12 rounded-3xl border border-blue-200 dark:border-blue-800">
                        {{-- Icon with Gradient Background --}}
                        <div class="relative w-20 h-20 mx-auto mb-8">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-500 rounded-2xl opacity-20"></div>
                            <div class="relative w-20 h-20 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center shadow-lg border-2 border-blue-200 dark:border-blue-700">
                                <svg class="w-10 h-10 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 12h6m-1 8H5"></path>
                                </svg>
                            </div>
                        </div>

                        <h2 class="text-3xl font-extrabold text-blue-900 dark:text-blue-100 mb-4">{{ __('site.home.no_news') }}</h2>
                        <p class="text-lg text-blue-700/80 dark:text-blue-200/70 mb-8 leading-relaxed">{{ __('site.press_releases.check_back') }}</p>

                        {{-- Back Home Button --}}
                        <div class="relative inline-block group/btn">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-xl opacity-75 group-hover/btn:opacity-100 blur transition duration-300"></div>
                            <a href="{{ route('home') }}" class="relative inline-block bg-gradient-to-r from-blue-600 to-red-600 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
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