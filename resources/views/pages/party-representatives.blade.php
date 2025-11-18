@extends('layouts.app')

@section('title', __('site.party_representatives.title'))

@section('content')

  {{-- Page Header --}}
  <section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
    <div class="relative max-w-7xl mx-auto px-4 text-center">
      <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">{{ __('site.party_representatives.title') }}</h1>
      <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('site.party_representatives.subtitle') }}</p>
    </div>
  </section>

  {{-- Party Representatives --}}
  @if($representatives->isNotEmpty())
    <section class="relative min-h-screen flex items-center justify-center px-4 bg-white dark:bg-gray-950 overflow-hidden">
      {{-- Background Elements --}}
      <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 right-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
      </div>

      <div class="max-w-7xl mx-auto w-full relative z-10 py-20 lg:py-28">
        {{-- Section Title --}}
        <div class="text-center mb-16" data-aos="fade-up">
          <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
            @if($post)
              {{ app()->getLocale() === 'ta' ? $post->name_ta : $post->name_en }}
            @else
              {{ __('site.party_representatives.representatives_title') }}
            @endif
          </h2>
          @if($post && ($post->description_en || $post->description_ta))
            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto font-light">
              {{ app()->getLocale() === 'ta' ? $post->description_ta : $post->description_en }}
            </p>
          @endif
        </div>

        {{-- Representatives Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
          @foreach($representatives as $representative)
            <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
              {{-- Animated Border --}}
              <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

              <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
              {{-- Photo --}}
              <div class="relative overflow-hidden">
                @if($representative->photo)
                  <img class="w-full h-80 object-cover object-top transition-transform duration-300 group-hover:scale-105"
                       src="{{ asset($representative->photo) }}"
                       alt="{{ app()->getLocale() === 'ta' ? $representative->name_ta : $representative->name_en }}">
                @else
                  <div class="w-full h-80 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                    <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                  </div>
                @endif
              </div>

              {{-- Content --}}
              <div class="p-6 text-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
                <h3 class="text-2xl font-bold tracking-tight text-blue-900 dark:text-blue-100 mb-1">
                  {{ app()->getLocale() === 'ta' ? $representative->name_ta : $representative->name_en }}
                </h3>

                @if($representative->post)
                  <span class="block text-blue-600 dark:text-blue-400 font-semibold text-lg mb-2">
                    {{ app()->getLocale() === 'ta' ? $representative->post->name_ta : $representative->post->name_en }}
                  </span>
                @endif

                @if($representative->assembly)
                  <p class="text-sm text-blue-600/70 dark:text-blue-300/60 mb-3">
                    {{ app()->getLocale() === 'ta' ? $representative->assembly->name_ta : $representative->assembly->name_en }}
                  </p>
                @endif

                @if($representative->content_en || $representative->content_ta)
                  <p class="text-blue-700/80 dark:text-blue-200/70 text-sm line-clamp-3">
                    {{ app()->getLocale() === 'ta' ? $representative->content_ta : $representative->content_en }}
                  </p>
                @endif

                {{-- Social Links --}}
                @if($representative->facebook || $representative->x || $representative->instagram || $representative->youtube)
                  <div class="flex justify-center gap-3 mt-4">
                    @if($representative->facebook)
                      <a href="{{ $representative->facebook }}" target="_blank" rel="noopener"
                         class="text-gray-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-500 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                      </a>
                    @endif

                    @if($representative->x)
                      <a href="{{ $representative->x }}" target="_blank" rel="noopener"
                         class="text-gray-600 hover:text-black dark:text-gray-400 dark:hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                      </a>
                    @endif

                    @if($representative->instagram)
                      <a href="{{ $representative->instagram }}" target="_blank" rel="noopener"
                         class="text-gray-600 hover:text-pink-600 dark:text-gray-400 dark:hover:text-pink-500 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                      </a>
                    @endif

                    @if($representative->youtube)
                      <a href="{{ $representative->youtube }}" target="_blank" rel="noopener"
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
          @endforeach
        </div>
      </div>
    </section>
  @else
    {{-- Empty State --}}
    <section class="py-20 lg:py-28 bg-white dark:bg-gray-900">
      <div class="max-w-7xl mx-auto px-4 text-center">
        <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
          <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ __('site.party_representatives.no_representatives') }}</h2>
        <p class="text-gray-600 dark:text-gray-400">{{ __('site.party_representatives.no_representatives_desc') }}</p>
      </div>
    </section>
  @endif

  {{-- Roles and Responsibilities --}}
  @if($representatives->isNotEmpty())
    <section class="py-20 lg:py-28 px-4 bg-gray-50 dark:bg-gray-800">
      <div class="max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16">
          <h2 class="text-4xl lg:text-5xl font-extrabold text-red-700 dark:text-red-500">{{ __('site.party_representatives.roles_title') }}</h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

          {{-- Communication Role --}}
          <div>
            <h3 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-white mb-6">{{ __('site.party_representatives.communication_role') }}</h3>
            <ul class="space-y-4 text-lg">
              <li class="flex items-start">
                <svg class="w-6 h-6 text-red-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-gray-700 dark:text-gray-300">{{ __('site.party_representatives.communication_1') }}</span>
              </li>
              <li class="flex items-start">
                <svg class="w-6 h-6 text-red-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-gray-700 dark:text-gray-300">{{ __('site.party_representatives.communication_2') }}</span>
              </li>
              <li class="flex items-start">
                <svg class="w-6 h-6 text-red-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-gray-700 dark:text-gray-300">{{ __('site.party_representatives.communication_3') }}</span>
              </li>
            </ul>
          </div>

          {{-- Representation Role --}}
          <div>
            <h3 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-white mb-6">{{ __('site.party_representatives.representation_role') }}</h3>
            <ul class="space-y-4 text-lg">
              <li class="flex items-start">
                <svg class="w-6 h-6 text-red-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-gray-700 dark:text-gray-300">{{ __('site.party_representatives.representation_1') }}</span>
              </li>
              <li class="flex items-start">
                <svg class="w-6 h-6 text-red-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-gray-700 dark:text-gray-300">{{ __('site.party_representatives.representation_2') }}</span>
              </li>
              <li class="flex items-start">
                <svg class="w-6 h-6 text-red-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-gray-700 dark:text-gray-300">{{ __('site.party_representatives.representation_3') }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  @endif

  {{-- Contact Representatives CTA --}}
  <section class="py-20 lg:py-28 px-4 {{ $representatives->isNotEmpty() ? 'bg-red-50 dark:bg-gray-900' : 'bg-white dark:bg-gray-800' }}">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl lg:text-4xl font-extrabold text-red-700 dark:text-red-500 mb-6">{{ __('site.party_representatives.contact_title') }}</h2>
      <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">{{ __('site.party_representatives.contact_desc') }}</p>
      <a href="{{ route('contact') }}" class="inline-block bg-red-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-red-700 dark:hover:bg-red-500 transition-all duration-300 transform hover:scale-105 shadow hover:shadow-lg">
        {{ __('site.party_representatives.contact_button') }}
      </a>
    </div>
  </section>

@endsection
