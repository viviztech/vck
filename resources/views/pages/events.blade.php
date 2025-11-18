@extends('layouts.app')

@section('title', __('site.home.events'))

@section('content')
@php
use Illuminate\Support\Facades\Storage;
@endphp
    {{-- Page Header --}}
    <x-page-header-simple
        :title="__('site.home.events')"
        :subtitle="__('site.home.events_description')"
    />

    {{-- Events Content --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            @if($events->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                @foreach($events as $index => $event)
                @php
                    $delay = ($index % 3) * 100;
                @endphp
                {{-- Event Card with Gradient Border --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    {{-- Card Content --}}
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col h-full border border-purple-100 dark:border-purple-900/30">
                        {{-- Featured Image --}}
                        <div class="relative h-60 overflow-hidden">
                             <a href="{{ route('media.show', $event->slug) }}" class="block w-full h-full">
                                <img src="{{ Storage::url($event->featured_image) }}" alt="{{ app()->getLocale() === 'ta' ? $event->title_ta : $event->title_en }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                             </a>

                             {{-- Date Badge --}}
                             @if($event->event_date)
                             <div class="absolute top-4 right-4">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full blur-md opacity-75"></div>
                                    <div class="relative bg-white dark:bg-gray-900 text-purple-700 dark:text-purple-300 px-4 py-2 rounded-full text-xs font-bold shadow-lg border-2 border-purple-200 dark:border-purple-700">
                                        {{ $event->event_date->format('M j, Y') }}
                                    </div>
                                </div>
                             </div>
                             @endif

                             {{-- Gradient Overlay --}}
                             <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        {{-- Card Content --}}
                        <div class="p-6 flex flex-col flex-grow bg-gradient-to-br from-purple-50/50 to-pink-50/50 dark:from-purple-950/20 dark:to-pink-950/20">
                            {{-- Title --}}
                            <h3 class="text-xl font-bold text-purple-900 dark:text-purple-100 mb-3 line-clamp-2 leading-tight">
                                <a href="{{ route('media.show', $event->slug) }}" class="hover:text-pink-600 dark:hover:text-pink-400 transition-colors duration-300">
                                    {!! app()->getLocale() === 'ta' ? $event->title_ta : $event->title_en !!}
                                </a>
                            </h3>

                            {{-- Excerpt --}}
                            <p class="text-purple-700/80 dark:text-purple-200/70 text-sm mb-5 line-clamp-3 flex-grow leading-relaxed">
                                {!! Str::limit(strip_tags(app()->getLocale() === 'ta' ? $event->content_ta : $event->content_en), 150) !!}
                            </p>

                            {{-- Read More Button --}}
                            <div class="mt-auto pt-4 border-t border-purple-200/50 dark:border-purple-700/50">
                                 <a href="{{ route('media.show', $event->slug) }}" class="inline-flex items-center text-purple-600 dark:text-purple-400 hover:text-pink-600 dark:hover:text-pink-400 font-semibold text-sm transition-all duration-300 group/link">
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
            @if ($events->hasPages())
            <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-center">
                 <div class="pagination-links">
                    {{ $events->links() }}
                 </div>
            </div>
            @endif

            @else
            {{-- No Events Found --}}
            <div class="text-center py-24" data-aos="fade-up">
                <div class="max-w-lg mx-auto relative group">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl opacity-50 blur transition duration-500"></div>

                    {{-- Content Card --}}
                    <div class="relative bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-950/30 dark:to-pink-950/30 p-12 rounded-3xl border border-purple-200 dark:border-purple-800">
                        {{-- Icon with Gradient Background --}}
                        <div class="relative w-20 h-20 mx-auto mb-8">
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl opacity-20"></div>
                            <div class="relative w-20 h-20 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center shadow-lg border-2 border-purple-200 dark:border-purple-700">
                                <svg class="w-10 h-10 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>

                        <h2 class="text-3xl font-extrabold text-purple-900 dark:text-purple-100 mb-4">{{ __('site.events.no_events') }}</h2>
                        <p class="text-lg text-purple-700/80 dark:text-purple-200/70 mb-8 leading-relaxed">{{ __('site.press_releases.check_back') }}</p>

                        {{-- Back Home Button --}}
                        <div class="relative inline-block group/btn">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl opacity-75 group-hover/btn:opacity-100 blur transition duration-300"></div>
                            <a href="{{ route('home') }}" class="relative inline-block bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
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
