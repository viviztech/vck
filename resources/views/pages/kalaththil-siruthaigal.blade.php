@extends('layouts.app')

@section('title', __('site.menu.kalaththil_siruthaigal'))

@section('content')
    {{-- Page Header --}}
    <x-page-header-simple
        :title="__('site.menu.kalaththil_siruthaigal')"
        :subtitle="__('site.home.youtube-title')"
    />

    {{-- Kalaththil Siruthaigal Content --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            @if($kalams->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                @foreach($kalams as $index => $kalam)
                @php
                    $delay = ($index % 3) * 100;
                @endphp
                {{-- Kalam Card with Gradient Border --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-teal-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    {{-- Card Content --}}
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col h-full border border-teal-100 dark:border-teal-900/30">
                        {{-- Featured Image --}}
                        <div class="relative h-60 overflow-hidden">
                             <a href="{{ route('media.show', $kalam->slug) }}" class="block w-full h-full">
                                <img src="{{ asset('assets/images/backgrounds/kalththil-siruthaigal.webp') }}" alt="{{ app()->getLocale() === 'ta' ? $kalam->title_ta : $kalam->title_en }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                             </a>

                             {{-- Date Badge --}}
                             <div class="absolute top-4 right-4">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-full blur-md opacity-75"></div>
                                    <div class="relative bg-white dark:bg-gray-900 text-teal-700 dark:text-teal-300 px-4 py-2 rounded-full text-xs font-bold shadow-lg border-2 border-teal-200 dark:border-teal-700">
                                        {{ $kalam->event_date ? $kalam->event_date->format('M j, Y') : $kalam->created_at->format('M j, Y') }}
                                    </div>
                                </div>
                             </div>

                             {{-- Gradient Overlay --}}
                             <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        {{-- Card Content --}}
                        <div class="p-6 flex flex-col flex-grow bg-gradient-to-br from-teal-50/50 to-cyan-50/50 dark:from-teal-950/20 dark:to-cyan-950/20">
                            {{-- Title --}}
                            <h3 class="text-xl font-bold text-teal-900 dark:text-teal-100 mb-3 line-clamp-2 leading-tight">
                                <a href="{{ route('media.show', $kalam->slug) }}" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors duration-300">
                                    {!! app()->getLocale() === 'ta' ? $kalam->title_ta : $kalam->title_en !!}
                                </a>
                            </h3>

                            {{-- Excerpt --}}
                            <p class="text-teal-700/80 dark:text-teal-200/70 text-sm mb-5 line-clamp-3 flex-grow leading-relaxed">
                                {!! Str::limit(strip_tags(app()->getLocale() === 'ta' ? $kalam->content_ta : $kalam->content_en), 150) !!}
                            </p>

                            {{-- Read More Button --}}
                            <div class="mt-auto pt-4 border-t border-teal-200/50 dark:border-teal-700/50">
                                 <a href="{{ route('media.show', $kalam->slug) }}" class="inline-flex items-center text-teal-600 dark:text-teal-400 hover:text-cyan-600 dark:hover:text-cyan-400 font-semibold text-sm transition-all duration-300 group/link">
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
            @if ($kalams->hasPages())
            <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-center">
                 <div class="pagination-links">
                    {{ $kalams->links() }}
                 </div>
            </div>
            @endif

            @else
            {{-- No Items Found --}}
            <div class="text-center py-24" data-aos="fade-up">
                <div class="max-w-lg mx-auto relative group">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-teal-500 to-cyan-500 rounded-3xl opacity-50 blur transition duration-500"></div>

                    {{-- Content Card --}}
                    <div class="relative bg-gradient-to-br from-teal-50 to-cyan-50 dark:from-teal-950/30 dark:to-cyan-950/30 p-12 rounded-3xl border border-teal-200 dark:border-teal-800">
                        {{-- Icon with Gradient Background --}}
                        <div class="relative w-20 h-20 mx-auto mb-8">
                            <div class="absolute inset-0 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-2xl opacity-20"></div>
                            <div class="relative w-20 h-20 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center shadow-lg border-2 border-teal-200 dark:border-teal-700">
                                <svg class="w-10 h-10 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 12h6m-1 8H5"></path>
                                </svg>
                            </div>
                        </div>

                        <h2 class="text-3xl font-extrabold text-teal-900 dark:text-teal-100 mb-4">{{ __('site.kalams.no_kalams') }}</h2>
                        <p class="text-lg text-teal-700/80 dark:text-teal-200/70 mb-8 leading-relaxed">{{ __('site.press_releases.check_back') }}</p>

                        {{-- Back Home Button --}}
                        <div class="relative inline-block group/btn">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-teal-500 to-cyan-500 rounded-xl opacity-75 group-hover/btn:opacity-100 blur transition duration-300"></div>
                            <a href="{{ route('home') }}" class="relative inline-block bg-gradient-to-r from-teal-600 to-cyan-600 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
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
