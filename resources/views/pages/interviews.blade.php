@extends('layouts.app')

@section('title', __('site.menu.interviews'))

@section('content')
@php
use Illuminate\Support\Facades\Storage;
@endphp
    {{-- Page Header --}}
    <x-page-header-simple
        :title="__('site.menu.interviews')"
        :subtitle="__('site.home.interviews-title-description')"
    />

    {{-- Interviews Content --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            @if($interviews->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                @foreach($interviews as $index => $interview)
                @php
                    $delay = ($index % 3) * 100;
                @endphp
                {{-- Interview Card with Gradient Border --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-yellow-500 to-amber-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    {{-- Card Content --}}
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col h-full border border-yellow-100 dark:border-yellow-900/30">
                        {{-- Featured Image --}}
                        <div class="relative h-60 overflow-hidden">
                             <a href="{{ route('media.show', $interview->slug) }}" class="block w-full h-full">
                                <img src="{{ Storage::url($interview->featured_image) }}" alt="{{ app()->getLocale() === 'ta' ? $interview->title_ta : $interview->title_en }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                             </a>

                             {{-- Date Badge --}}
                             <div class="absolute top-4 right-4">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-full blur-md opacity-75"></div>
                                    <div class="relative bg-white dark:bg-gray-900 text-yellow-700 dark:text-yellow-300 px-4 py-2 rounded-full text-xs font-bold shadow-lg border-2 border-yellow-200 dark:border-yellow-700">
                                        {{ $interview->event_date ? $interview->event_date->format('M j, Y') : $interview->created_at->format('M j, Y') }}
                                    </div>
                                </div>
                             </div>

                             {{-- Gradient Overlay --}}
                             <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        {{-- Card Content --}}
                        <div class="p-6 flex flex-col flex-grow bg-gradient-to-br from-yellow-50/50 to-amber-50/50 dark:from-yellow-950/20 dark:to-amber-950/20">
                            {{-- Title --}}
                            <h3 class="text-xl font-bold text-yellow-900 dark:text-yellow-100 mb-3 line-clamp-2 leading-tight">
                                <a href="{{ route('media.show', $interview->slug) }}" class="hover:text-amber-600 dark:hover:text-amber-400 transition-colors duration-300">
                                    {!! app()->getLocale() === 'ta' ? $interview->title_ta : $interview->title_en !!}
                                </a>
                            </h3>

                            {{-- Excerpt --}}
                            <p class="text-yellow-700/80 dark:text-yellow-200/70 text-sm mb-5 line-clamp-3 flex-grow leading-relaxed">
                                {!! Str::limit(strip_tags(app()->getLocale() === 'ta' ? $interview->content_ta : $interview->content_en), 150) !!}
                            </p>

                            {{-- Read More Button --}}
                            <div class="mt-auto pt-4 border-t border-yellow-200/50 dark:border-yellow-700/50">
                                 <a href="{{ route('media.show', $interview->slug) }}" class="inline-flex items-center text-yellow-600 dark:text-yellow-400 hover:text-amber-600 dark:hover:text-amber-400 font-semibold text-sm transition-all duration-300 group/link">
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
            @if ($interviews->hasPages())
            <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-center">
                 <div class="pagination-links">
                    {{ $interviews->links() }}
                 </div>
            </div>
            @endif

            @else
            {{-- No Interviews Found --}}
            <div class="text-center py-24" data-aos="fade-up">
                <div class="max-w-lg mx-auto relative group">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-yellow-500 to-amber-500 rounded-3xl opacity-50 blur transition duration-500"></div>

                    {{-- Content Card --}}
                    <div class="relative bg-gradient-to-br from-yellow-50 to-amber-50 dark:from-yellow-950/30 dark:to-amber-950/30 p-12 rounded-3xl border border-yellow-200 dark:border-yellow-800">
                        {{-- Icon with Gradient Background --}}
                        <div class="relative w-20 h-20 mx-auto mb-8">
                            <div class="absolute inset-0 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-2xl opacity-20"></div>
                            <div class="relative w-20 h-20 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center shadow-lg border-2 border-yellow-200 dark:border-yellow-700">
                                <svg class="w-10 h-10 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                                </svg>
                            </div>
                        </div>

                        <h2 class="text-3xl font-extrabold text-yellow-900 dark:text-yellow-100 mb-4">{{ __('site.interviews.no_interviews') }}</h2>
                        <p class="text-lg text-yellow-700/80 dark:text-yellow-200/70 mb-8 leading-relaxed">{{ __('site.press_releases.check_back') }}</p>

                        {{-- Back Home Button --}}
                        <div class="relative inline-block group/btn">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-yellow-500 to-amber-500 rounded-xl opacity-75 group-hover/btn:opacity-100 blur transition duration-300"></div>
                            <a href="{{ route('home') }}" class="relative inline-block bg-gradient-to-r from-yellow-600 to-amber-600 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
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
