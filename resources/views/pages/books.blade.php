@extends('layouts.app')

@section('title', __('site.books.title'))

@section('content')
    {{-- Page Header --}}
    <x-page-header-simple
        :title="__('site.books.title')"
        :subtitle="__('site.books.description')"
    />

    {{-- Books Content --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            @if(empty($booksByCategory))
                {{-- No Books Found --}}
                <div class="text-center py-24" data-aos="fade-up">
                    <div class="max-w-lg mx-auto relative group">
                        {{-- Animated Gradient Border --}}
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-amber-500 to-orange-500 rounded-3xl opacity-50 blur transition duration-500"></div>

                        {{-- Content Card --}}
                        <div class="relative bg-gradient-to-br from-amber-50 to-orange-50 dark:from-amber-950/30 dark:to-orange-950/30 p-12 rounded-3xl border border-amber-200 dark:border-amber-800">
                            {{-- Icon with Gradient Background --}}
                            <div class="relative w-20 h-20 mx-auto mb-8">
                                <div class="absolute inset-0 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl opacity-20"></div>
                                <div class="relative w-20 h-20 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center shadow-lg border-2 border-amber-200 dark:border-amber-700">
                                    <svg class="w-10 h-10 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                            </div>

                            <h2 class="text-3xl font-extrabold text-amber-900 dark:text-amber-100 mb-4">{{ __('site.books.no_books') }}</h2>
                            <p class="text-lg text-amber-700/80 dark:text-amber-200/70 mb-8 leading-relaxed">{{ __('site.press_releases.check_back') }}</p>

                            {{-- Back Home Button --}}
                            <div class="relative inline-block group/btn">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-amber-500 to-orange-500 rounded-xl opacity-75 group-hover/btn:opacity-100 blur transition duration-300"></div>
                                <a href="{{ route('home') }}" class="relative inline-block bg-gradient-to-r from-amber-600 to-orange-600 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
                                    {{ __('site.footer.back_home') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @foreach($booksByCategory as $categoryName => $books)
                    <div class="mb-16 last:mb-0" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        {{-- Category Heading --}}
                        <div class="mb-10 pb-4 border-b-2 border-gradient-to-r from-amber-500 to-orange-500">
                            <div class="relative inline-block">
                                <div class="absolute -inset-1 bg-gradient-to-r from-amber-500 to-orange-500 rounded-lg blur opacity-25"></div>
                                <h2 class="relative text-4xl font-extrabold bg-gradient-to-r from-amber-700 to-orange-700 dark:from-amber-500 dark:to-orange-500 bg-clip-text text-transparent">{{ $categoryName }}</h2>
                            </div>
                        </div>

                        {{-- Books Grid --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 lg:gap-10">
                            @foreach($books as $bookIndex => $book)
                                @php
                                    $delay = ($bookIndex % 4) * 100;
                                @endphp
                                {{-- Book Card with Gradient Border --}}
                                <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                                    {{-- Animated Gradient Border --}}
                                    <div class="absolute -inset-0.5 bg-gradient-to-r from-amber-500 to-orange-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                                    {{-- Card Content --}}
                                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col h-full border border-amber-100 dark:border-amber-900/30">
                                        {{-- Image Container --}}
                                        <div class="relative h-72 overflow-hidden bg-gradient-to-br from-amber-50 to-orange-50 dark:from-amber-950/30 dark:to-orange-950/30">
                                             <a href="{{ route('books.show', $book->slug) }}" class="block w-full h-full">
                                                @if($book->cover_image)
                                                    <img src="{{ asset($book->cover_image) }}" alt="{{ $book->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                                @else
                                                    {{-- Placeholder --}}
                                                    <div class="w-full h-full flex items-center justify-center">
                                                        <div class="relative w-16 h-16">
                                                            <div class="absolute inset-0 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl opacity-20"></div>
                                                            <div class="relative w-16 h-16 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center">
                                                                <svg class="w-8 h-8 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                             </a>

                                             {{-- Gradient Overlay --}}
                                             <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                        </div>

                                        {{-- Content Container --}}
                                        <div class="p-6 flex flex-col flex-grow bg-gradient-to-br from-amber-50/50 to-orange-50/50 dark:from-amber-950/20 dark:to-orange-950/20">
                                            <h3 class="text-xl font-bold text-amber-900 dark:text-amber-100 mb-2 line-clamp-2 leading-tight">
                                                 <a href="{{ route('books.show', $book->slug) }}" class="hover:text-orange-600 dark:hover:text-orange-400 transition-colors duration-300">
                                                    {{ $book->title }}
                                                 </a>
                                            </h3>
                                            @if($book->author)
                                                <p class="text-sm text-amber-600 dark:text-amber-400 mb-3 font-medium">by {{ $book->author }}</p>
                                            @endif
                                            @if($book->description)
                                                <p class="text-sm text-amber-700/80 dark:text-amber-200/70 line-clamp-3 mb-4 flex-grow leading-relaxed">{{ $book->description }}</p>
                                            @endif
                                            {{-- View Button --}}
                                            <div class="mt-auto pt-4">
                                                <div class="relative group/btn">
                                                    <div class="absolute -inset-0.5 bg-gradient-to-r from-amber-500 to-orange-500 rounded-xl opacity-0 group-hover/btn:opacity-75 blur transition duration-300"></div>
                                                    <a href="{{ route('books.show', $book->slug) }}" class="relative inline-flex items-center justify-center w-full bg-gradient-to-r from-amber-600 to-orange-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                        </svg>
                                                        {{ __('site.books.view_book') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection

{{-- Removed @push('scripts') and associated <style> block --}}