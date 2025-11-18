@extends('layouts.app')

@section('title', __('site.office_bearers.title'))

@section('content')

  {{-- Page Header --}}
  <section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
    <div class="relative max-w-7xl mx-auto px-4 text-center">
      <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">{{ __('site.office_bearers.title') }}</h1>
      <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('site.office_bearers.subtitle') }}</p>
    </div>
  </section>

  {{-- Office Bearers by Post --}}
  @if($posts->isNotEmpty())
    @foreach($posts as $post)
      @php
        $postBearers = $post->bearers;
        // Determine section background color (alternate with design system colors)
        $bgClass = $loop->even
          ? 'bg-gradient-to-br from-blue-50 via-white to-red-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30'
          : 'bg-white dark:bg-gray-950';

        // Determine if this is a leadership position (first few posts)
        $isLeadership = $loop->index < 3; // First 3 posts are leadership
        $gridClass = $isLeadership ? 'md:grid-cols-2 lg:grid-cols-3' : 'sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4';
      @endphp

      <section class="relative min-h-screen flex items-center justify-center px-4 {{ $bgClass }} overflow-hidden">
        {{-- Background Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
          <div class="absolute top-1/4 right-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
          <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10 py-20 lg:py-28">
          {{-- Post Title --}}
          <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
              {{ app()->getLocale() === 'ta' ? $post->name_ta : $post->name_en }}
            </h2>
            @if($post->description_en || $post->description_ta)
              <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto font-light">
                {{ app()->getLocale() === 'ta' ? $post->description_ta : $post->description_en }}
              </p>
            @endif
          </div>

          {{-- Bearers Grid --}}
          <div class="grid grid-cols-1 {{ $gridClass }} gap-8 md:gap-12">
            @foreach($postBearers as $bearer)
              @if($isLeadership)
                {{-- Leadership Card (Larger) --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                  {{-- Animated Border --}}
                  <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                  <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                  <div class="relative overflow-hidden">
                    @if($bearer->photo)
                      <img class="w-full h-80 object-cover object-top transition-transform duration-300 group-hover:scale-105"
                           src="{{ asset($bearer->photo) }}"
                           alt="{{ app()->getLocale() === 'ta' ? $bearer->name_ta : $bearer->name_en }}">
                    @else
                      <div class="w-full h-80 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                        <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                      </div>
                    @endif
                  </div>

                  <div class="p-6 text-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
                    <h3 class="text-2xl font-bold tracking-tight text-blue-900 dark:text-blue-100 mb-1">
                      {{ app()->getLocale() === 'ta' ? $bearer->name_ta : $bearer->name_en }}
                    </h3>

                    <span class="block text-blue-600 dark:text-blue-400 font-semibold text-lg mb-2">
                      {{ app()->getLocale() === 'ta' ? $post->name_ta : $post->name_en }}
                    </span>

                    @if($bearer->assembly)
                      <p class="text-sm text-blue-600/70 dark:text-blue-300/60 mb-3">
                        {{ app()->getLocale() === 'ta' ? $bearer->assembly->name_ta : $bearer->assembly->name_en }}
                      </p>
                    @endif

                    @if($bearer->content_en || $bearer->content_ta)
                      <p class="text-blue-700/80 dark:text-blue-200/70 text-sm line-clamp-3">
                        {{ app()->getLocale() === 'ta' ? $bearer->content_ta : $bearer->content_en }}
                      </p>
                    @endif

                    {{-- Social Links --}}
                    @if($bearer->facebook || $bearer->x || $bearer->instagram || $bearer->youtube)
                      <div class="flex justify-center gap-3 mt-4">
                        @if($bearer->facebook)
                          <a href="{{ $bearer->facebook }}" target="_blank" rel="noopener"
                             class="text-gray-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                          </a>
                        @endif

                        @if($bearer->x)
                          <a href="{{ $bearer->x }}" target="_blank" rel="noopener"
                             class="text-gray-600 hover:text-black dark:text-gray-400 dark:hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                          </a>
                        @endif

                        @if($bearer->instagram)
                          <a href="{{ $bearer->instagram }}" target="_blank" rel="noopener"
                             class="text-gray-600 hover:text-pink-600 dark:text-gray-400 dark:hover:text-pink-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                          </a>
                        @endif

                        @if($bearer->youtube)
                          <a href="{{ $bearer->youtube }}" target="_blank" rel="noopener"
                             class="text-gray-600 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-500 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                          </a>
                        @endif
                      </div>
                    @endif
                  </div>
                  </div>
                </div>
              @else
                {{-- Regular Bearer Card (Smaller) --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                  {{-- Animated Border --}}
                  <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                  <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 text-center transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                  <div class="relative overflow-hidden">
                    @if($bearer->photo)
                      <img class="w-full h-64 object-cover object-top transition-transform duration-300 group-hover:scale-105"
                           src="{{ asset($bearer->photo) }}"
                           alt="{{ app()->getLocale() === 'ta' ? $bearer->name_ta : $bearer->name_en }}">
                    @else
                      <div class="w-full h-64 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                        <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                      </div>
                    @endif
                  </div>

                  <div class="p-6 bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
                    <h4 class="text-xl font-bold text-blue-900 dark:text-blue-100 mb-1">
                      {{ app()->getLocale() === 'ta' ? $bearer->name_ta : $bearer->name_en }}
                    </h4>

                    <p class="text-blue-600 dark:text-blue-400 font-semibold mb-2">
                      {{ app()->getLocale() === 'ta' ? $post->name_ta : $post->name_en }}
                    </p>

                    @if($bearer->assembly)
                      <p class="text-xs text-blue-600/70 dark:text-blue-300/60 mb-2">
                        {{ app()->getLocale() === 'ta' ? $bearer->assembly->name_ta : $bearer->assembly->name_en }}
                      </p>
                    @endif

                    {{-- Social Links --}}
                    @if($bearer->facebook || $bearer->x || $bearer->instagram || $bearer->youtube)
                      <div class="flex justify-center gap-2 mt-3">
                        @if($bearer->facebook)
                          <a href="{{ $bearer->facebook }}" target="_blank" rel="noopener"
                             class="text-gray-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-500 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                          </a>
                        @endif

                        @if($bearer->x)
                          <a href="{{ $bearer->x }}" target="_blank" rel="noopener"
                             class="text-gray-600 hover:text-black dark:text-gray-400 dark:hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                          </a>
                        @endif

                        @if($bearer->instagram)
                          <a href="{{ $bearer->instagram }}" target="_blank" rel="noopener"
                             class="text-gray-600 hover:text-pink-600 dark:text-gray-400 dark:hover:text-pink-500 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                          </a>
                        @endif

                        @if($bearer->youtube)
                          <a href="{{ $bearer->youtube }}" target="_blank" rel="noopener"
                             class="text-gray-600 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-500 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                          </a>
                        @endif
                      </div>
                    @endif
                  </div>
                  </div>
                </div>
              @endif
            @endforeach
          </div>
        </div>
      </section>
    @endforeach
  @else
    {{-- Empty State --}}
    <section class="py-20 lg:py-28 bg-white dark:bg-gray-900">
      <div class="max-w-7xl mx-auto px-4 text-center">
        <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
          <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">No Office Bearers Found</h2>
        <p class="text-gray-600 dark:text-gray-400">Office bearers information will be displayed here once available.</p>
      </div>
    </section>
  @endif

@endsection
