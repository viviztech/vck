@extends('layouts.app')

@section('title', __('site.books.title'))

@section('content')
    {{-- Page Header --}}
    <x-page-header-simple
        :title="__('site.books.title')"
        :subtitle="__('site.books.description')"
    />

    {{-- Books Content --}}
    <section class="py-12 lg:py-16 px-4 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            @if($books->isEmpty())
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
                {{-- Ecommerce Books Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
                    @foreach($books as $bookIndex => $book)
                        @php
                            $delay = ($bookIndex % 4) * 100;
                            $isInStock = $book->stock > 0 && $book->is_available;
                            $isAvailable = $book->price > 0 && $isInStock;
                        @endphp
                        {{-- Product Card --}}
                        <div class="group bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-200 dark:border-gray-700 flex flex-col" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                            {{-- Image Container --}}
                            <div class="relative aspect-[3/4] overflow-hidden bg-gray-100 dark:bg-gray-700">
                                @if($book->cover_image)
                                    <img src="{{ asset($book->cover_image) }}" alt="{{ $book->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                @else
                                    {{-- Placeholder --}}
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800">
                                        <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                @endif
                                
                                {{-- Stock Badge --}}
                                @if($isInStock)
                                    <div class="absolute top-3 left-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            <span class="w-1.5 h-1.5 mr-1.5 bg-green-500 rounded-full"></span>
                                            In Stock
                                        </span>
                                    </div>
                                @else
                                    <div class="absolute top-3 left-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                            Out of Stock
                                        </span>
                                    </div>
                                @endif
                            </div>

                            {{-- Product Info --}}
                            <div class="p-4 flex flex-col flex-grow">
                                {{-- Author --}}
                                @if($book->author)
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1 font-medium uppercase tracking-wide">
                                        {{ $book->author }}
                                    </p>
                                @endif

                                {{-- Title --}}
                                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100 mb-2 line-clamp-2 leading-snug min-h-[2.5rem]">
                                    {{ $book->title }}
                                </h3>

                                {{-- Description --}}
                                @if($book->description)
                                    <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-2 mb-3 flex-grow leading-relaxed">
                                        {{ $book->description }}
                                    </p>
                                @endif
                                
                                {{-- Price and Stock Info --}}
                                <div class="mt-auto pt-3 border-t border-gray-200 dark:border-gray-700">
                                    @if($book->price > 0)
                                        <div class="flex items-baseline justify-between mb-3">
                                            <div>
                                                <span class="text-2xl font-bold text-gray-900 dark:text-gray-100">₹{{ number_format($book->price, 0) }}</span>
                                                @if($book->price < 100)
                                                    <span class="text-xs text-gray-500 dark:text-gray-400 ml-1">.00</span>
                                                @endif
                                            </div>
                                            @if($isInStock && $book->stock < 10)
                                                <span class="text-xs text-orange-600 dark:text-orange-400 font-medium">
                                                    Only {{ $book->stock }} left
                                                </span>
                                            @endif
                                        </div>
                                    @endif
                                    
                                    {{-- Add to Cart Button --}}
                                    @if($isAvailable)
                                        <a href="{{ route('books.order', $book->slug) }}" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-md transition-colors duration-200 shadow-sm hover:shadow-md">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            </svg>
                                            Order Now
                                        </a>
                                    @elseif($book->price > 0)
                                        <button disabled class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-gray-300 dark:bg-gray-600 text-gray-500 dark:text-gray-400 text-sm font-semibold rounded-md cursor-not-allowed">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            Unavailable
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection

{{-- Removed @push('scripts') and associated <style> block --}}