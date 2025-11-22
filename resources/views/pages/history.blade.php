@extends('layouts.app')

@section('title', __('site.history.title'))

@section('content')

  {{-- Page Header --}}
  <x-page-header-simple
    :title="__('site.history.title')"
    :subtitle="__('site.history.subtitle')"
  />

  {{-- Founding of VCK --}}
  <section class="relative min-h-[90vh] flex items-center justify-center px-4 overflow-hidden">
    {{-- Background Image with Overlay --}}
    <div class="absolute inset-0 z-0 overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-br from-blue-600/90 via-blue-700/85 to-blue-900/90 dark:from-blue-900/95 dark:via-blue-800/90 dark:to-gray-950/95 z-10"></div>
      <div class="absolute inset-0 flex items-center justify-center z-5 p-4">
        <img src="{{ asset('assets/images/about/about.png') }}" alt="VCK Founding" class="w-auto h-auto max-w-full max-h-full object-contain opacity-30 dark:opacity-20" style="width: 100%; height: 100%; object-fit: contain;">
      </div>
      <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent z-20"></div>
    </div>

    {{-- Animated Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-5">
      <div class="absolute top-1/4 right-10 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl animate-pulse"></div>
      <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
      <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-to-r from-blue-400/10 to-blue-500/10 rounded-full blur-3xl"></div>
    </div>

    {{-- Content --}}
    <div class="max-w-5xl mx-auto w-full relative z-30 py-20 lg:py-32">
      <div class="text-center" data-aos="fade-up">
        {{-- Icon Badge --}}
        <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl mb-8 shadow-2xl transform hover:scale-110 transition-transform duration-300">
          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
          </svg>
        </div>

        {{-- Title --}}
        <h2 class="text-5xl lg:text-7xl font-extrabold text-white mb-8 leading-tight drop-shadow-2xl">
          {{ __('site.history.founding_title') }}
        </h2>

        {{-- Decorative Line --}}
        <div class="flex items-center justify-center gap-4 mb-10">
          <div class="h-1 w-20 bg-gradient-to-r from-transparent to-blue-400"></div>
          <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
          <div class="h-1 w-20 bg-gradient-to-l from-transparent to-blue-400"></div>
        </div>

        {{-- Content Card --}}
        <div class="bg-white/10 dark:bg-gray-900/30 backdrop-blur-xl rounded-3xl p-8 lg:p-12 border border-white/20 shadow-2xl max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="200">
          <p class="text-xl lg:text-2xl text-white/95 dark:text-gray-100 mb-6 leading-relaxed font-medium">
            {{ __('site.history.founding_desc1') }}
          </p>
          <p class="text-lg lg:text-xl text-white/90 dark:text-gray-200 leading-relaxed">
            {{ __('site.history.founding_desc2') }}
          </p>
        </div>

        {{-- Decorative Elements --}}
        <div class="mt-12 flex items-center justify-center gap-2">
          <div class="w-2 h-2 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 0s;"></div>
          <div class="w-2 h-2 bg-blue-500 rounded-full animate-bounce" style="animation-delay: 0.2s;"></div>
          <div class="w-2 h-2 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 0.4s;"></div>
        </div>
      </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-30 animate-bounce">
      <svg class="w-6 h-6 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
      </svg>
    </div>
  </section>

  {{-- Key Milestones Timeline --}}
  <section class="py-20 lg:py-28 px-4 bg-gradient-to-b from-gray-50 to-white dark:from-gray-950 dark:to-gray-900">
    <div class="max-w-7xl mx-auto">
      <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
        <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 dark:text-white">{{ __('site.history.milestones') }}</h2>
      </div>

      <div class="space-y-24 lg:space-y-32">
        
        {{-- 1972 - Left Content, Right Image --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-2 lg:order-1">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-red-500 to-orange-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-red-50 to-orange-50 dark:from-red-950/30 dark:to-orange-950/30 rounded-3xl p-8 border border-red-200 dark:border-red-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-red-600 to-orange-600 text-white text-sm font-bold rounded-lg mb-4">1972</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-red-900 dark:text-red-100 mb-4">{{ __('site.history.1972_title') }}</h3>
                <p class="text-red-700/90 dark:text-red-200/80 leading-relaxed text-lg">{{ __('site.history.1972_desc') }}</p>
              </div>
            </div>
          </div>
          <div class="order-1 lg:order-2 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 to-orange-500/10"></div>
            <img src="{{ asset('assets/images/about/ambedkar.jpg') }}" alt="1972" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
        </div>

        {{-- 1977 - Left Image, Right Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-1 lg:order-1 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-pink-500/10"></div>
            <img src="{{ asset('assets/images/about/marx.jpg') }}" alt="1977" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
          <div class="order-2 lg:order-2">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-950/30 dark:to-pink-950/30 rounded-3xl p-8 border border-purple-200 dark:border-purple-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white text-sm font-bold rounded-lg mb-4">1977</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-purple-900 dark:text-purple-100 mb-4">{{ __('site.history.1977_title') }}</h3>
                <p class="text-purple-700/90 dark:text-purple-200/80 leading-relaxed text-lg">{{ __('site.history.1977_desc') }}</p>
              </div>
            </div>
          </div>
        </div>

        {{-- 1980s Late - Left Content, Right Image --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-2 lg:order-1">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl p-8 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-blue-600 to-cyan-600 text-white text-sm font-bold rounded-lg mb-4">1980-களின் பிற்பகுதி</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-blue-900 dark:text-blue-100 mb-4">{{ __('site.history.1980s_title') }}</h3>
                <p class="text-blue-700/90 dark:text-blue-200/80 leading-relaxed text-lg">{{ __('site.history.1980s_desc') }}</p>
              </div>
            </div>
          </div>
          <div class="order-1 lg:order-2 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-cyan-500/10"></div>
            <img src="{{ asset('assets/images/about/periyar.jpg') }}" alt="1980s" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
        </div>

        {{-- 1982 - Left Image, Right Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-1 lg:order-1 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 to-emerald-500/10"></div>
            <img src="{{ asset('assets/images/about/thiruma.jpg') }}" alt="1982" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
          <div class="order-2 lg:order-2">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-green-500 to-emerald-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-950/30 dark:to-emerald-950/30 rounded-3xl p-8 border border-green-200 dark:border-green-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-green-600 to-emerald-600 text-white text-sm font-bold rounded-lg mb-4">1982</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-green-900 dark:text-green-100 mb-4">{{ __('site.history.1982_title') }}</h3>
                <p class="text-green-700/90 dark:text-green-200/80 leading-relaxed text-lg">{{ __('site.history.1982_desc') }}</p>
              </div>
            </div>
          </div>
        </div>

        {{-- 1989 - Left Content, Right Image --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-2 lg:order-1">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-violet-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-indigo-50 to-violet-50 dark:from-indigo-950/30 dark:to-violet-950/30 rounded-3xl p-8 border border-indigo-200 dark:border-indigo-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-indigo-600 to-violet-600 text-white text-sm font-bold rounded-lg mb-4">1989</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-indigo-900 dark:text-indigo-100 mb-4">{{ __('site.history.1989_title') }}</h3>
                <p class="text-indigo-700/90 dark:text-indigo-200/80 leading-relaxed text-lg">{{ __('site.history.1989_desc') }}</p>
              </div>
            </div>
          </div>
          <div class="order-1 lg:order-2 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-violet-500/10"></div>
            <img src="{{ asset('assets/images/bg/slider1.jpg') }}" alt="1989" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
        </div>

        {{-- 1990 - Left Image, Right Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-1 lg:order-1 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/10 to-amber-500/10"></div>
            <img src="{{ asset('assets/images/bg/slider2.jpg') }}" alt="1990" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
          <div class="order-2 lg:order-2">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-yellow-500 to-amber-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-yellow-50 to-amber-50 dark:from-yellow-950/30 dark:to-amber-950/30 rounded-3xl p-8 border border-yellow-200 dark:border-yellow-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-yellow-600 to-amber-600 text-white text-sm font-bold rounded-lg mb-4">1990</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-yellow-900 dark:text-yellow-100 mb-4">{{ __('site.history.1990_title') }}</h3>
                <p class="text-yellow-700/90 dark:text-yellow-200/80 leading-relaxed text-lg">{{ __('site.history.1990_desc') }}</p>
              </div>
            </div>
          </div>
        </div>

        {{-- 1990 April 14 - Left Content, Right Image --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-2 lg:order-1">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-red-500 to-pink-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-red-50 to-pink-50 dark:from-red-950/30 dark:to-pink-950/30 rounded-3xl p-8 border border-red-200 dark:border-red-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-red-600 to-pink-600 text-white text-sm font-bold rounded-lg mb-4">1990 (ஏப்ரல் 14)</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-red-900 dark:text-red-100 mb-4">{{ __('site.history.1990_april_title') }}</h3>
                <p class="text-red-700/90 dark:text-red-200/80 leading-relaxed text-lg">{{ __('site.history.1990_april_desc') }}</p>
              </div>
            </div>
          </div>
          <div class="order-1 lg:order-2 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 to-pink-500/10"></div>
            <img src="{{ asset('assets/images/bg/slider3.jpg') }}" alt="1990 April 14" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
        </div>

        {{-- 1992-1996 - Left Image, Right Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-1 lg:order-1 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-orange-500/10 to-red-500/10"></div>
            <img src="{{ asset('assets/images/bg/Header_1.jpg') }}" alt="1992-1996" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
          <div class="order-2 lg:order-2">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 to-red-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-orange-50 to-red-50 dark:from-orange-950/30 dark:to-red-950/30 rounded-3xl p-8 border border-orange-200 dark:border-orange-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-orange-600 to-red-600 text-white text-sm font-bold rounded-lg mb-4">1992–1996</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-orange-900 dark:text-orange-100 mb-4">{{ __('site.history.1992_1996_title') }}</h3>
                <p class="text-orange-700/90 dark:text-orange-200/80 leading-relaxed text-lg">{{ __('site.history.1992_1996_desc') }}</p>
              </div>
            </div>
          </div>
        </div>

        {{-- 1998 - Left Content, Right Image --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-2 lg:order-1">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-teal-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-teal-50 to-cyan-50 dark:from-teal-950/30 dark:to-cyan-950/30 rounded-3xl p-8 border border-teal-200 dark:border-teal-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-teal-600 to-cyan-600 text-white text-sm font-bold rounded-lg mb-4">1998</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-teal-900 dark:text-teal-100 mb-4">{{ __('site.history.1998_title') }}</h3>
                <p class="text-teal-700/90 dark:text-teal-200/80 leading-relaxed text-lg">{{ __('site.history.1998_desc') }}</p>
              </div>
            </div>
          </div>
          <div class="order-1 lg:order-2 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-teal-500/10 to-cyan-500/10"></div>
            <img src="{{ asset('assets/images/bg/Header_2.jpg') }}" alt="1998" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
        </div>

        {{-- 1999 - Left Image, Right Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-1 lg:order-1 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 to-green-500/10"></div>
            <img src="{{ asset('assets/images/mla/thiruma.jpg') }}" alt="1999" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
          <div class="order-2 lg:order-2">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500 to-green-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-emerald-50 to-green-50 dark:from-emerald-950/30 dark:to-green-950/30 rounded-3xl p-8 border border-emerald-200 dark:border-emerald-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-emerald-600 to-green-600 text-white text-sm font-bold rounded-lg mb-4">1999</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-emerald-900 dark:text-emerald-100 mb-4">{{ __('site.history.1999_title') }}</h3>
                <p class="text-emerald-700/90 dark:text-emerald-200/80 leading-relaxed text-lg">{{ __('site.history.1999_desc') }}</p>
              </div>
            </div>
          </div>
        </div>

        {{-- 2001 - Left Content, Right Image --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-2 lg:order-1">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-950/30 dark:to-indigo-950/30 rounded-3xl p-8 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-bold rounded-lg mb-4">2001</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-blue-900 dark:text-blue-100 mb-4">{{ __('site.history.2001_title') }}</h3>
                <p class="text-blue-700/90 dark:text-blue-200/80 leading-relaxed text-lg">{{ __('site.history.2001_desc') }}</p>
              </div>
            </div>
          </div>
          <div class="order-1 lg:order-2 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-indigo-500/10"></div>
            <img src="{{ asset('assets/images/mla/ravi.jpg') }}" alt="2001" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
        </div>

        {{-- 2004 - Left Image, Right Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-1 lg:order-1 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-rose-500/10 to-pink-500/10"></div>
            <img src="{{ asset('assets/images/mla/sinthanai.jpg') }}" alt="2004" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
          <div class="order-2 lg:order-2">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-rose-500 to-pink-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-rose-50 to-pink-50 dark:from-rose-950/30 dark:to-pink-950/30 rounded-3xl p-8 border border-rose-200 dark:border-rose-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-rose-600 to-pink-600 text-white text-sm font-bold rounded-lg mb-4">2004</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-rose-900 dark:text-rose-100 mb-4">{{ __('site.history.2004_title') }}</h3>
                <p class="text-rose-700/90 dark:text-rose-200/80 leading-relaxed text-lg">{{ __('site.history.2004_desc') }}</p>
              </div>
            </div>
          </div>
        </div>

        {{-- 2007 - Left Content, Right Image --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-2 lg:order-1">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-violet-500 to-purple-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-violet-50 to-purple-50 dark:from-violet-950/30 dark:to-purple-950/30 rounded-3xl p-8 border border-violet-200 dark:border-violet-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-violet-600 to-purple-600 text-white text-sm font-bold rounded-lg mb-4">2007</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-violet-900 dark:text-violet-100 mb-4">{{ __('site.history.2007_title') }}</h3>
                <p class="text-violet-700/90 dark:text-violet-200/80 leading-relaxed text-lg">{{ __('site.history.2007_desc') }}</p>
              </div>
            </div>
          </div>
          <div class="order-1 lg:order-2 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-violet-500/10 to-purple-500/10"></div>
            <img src="{{ asset('assets/images/mla/aloor.jpg') }}" alt="2007" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
        </div>

        {{-- 2009 - Left Image, Right Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-1 lg:order-1 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-fuchsia-500/10 to-pink-500/10"></div>
            <img src="{{ asset('assets/images/mla/babu.jpg') }}" alt="2009" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
          <div class="order-2 lg:order-2">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-fuchsia-500 to-pink-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-fuchsia-50 to-pink-50 dark:from-fuchsia-950/30 dark:to-pink-950/30 rounded-3xl p-8 border border-fuchsia-200 dark:border-fuchsia-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-fuchsia-600 to-pink-600 text-white text-sm font-bold rounded-lg mb-4">2009</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-fuchsia-900 dark:text-fuchsia-100 mb-4">{{ __('site.history.2009_title') }}</h3>
                <p class="text-fuchsia-700/90 dark:text-fuchsia-200/80 leading-relaxed text-lg">{{ __('site.history.2009_desc') }}</p>
              </div>
            </div>
          </div>
        </div>

        {{-- 2019 - Left Content, Right Image --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-2 lg:order-1">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-sky-500 to-blue-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-sky-50 to-blue-50 dark:from-sky-950/30 dark:to-blue-950/30 rounded-3xl p-8 border border-sky-200 dark:border-sky-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-sky-600 to-blue-600 text-white text-sm font-bold rounded-lg mb-4">2019</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-sky-900 dark:text-sky-100 mb-4">{{ __('site.history.2019_title') }}</h3>
                <p class="text-sky-700/90 dark:text-sky-200/80 leading-relaxed text-lg">{{ __('site.history.2019_desc') }}</p>
              </div>
            </div>
          </div>
          <div class="order-1 lg:order-2 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-sky-500/10 to-blue-500/10"></div>
            <img src="{{ asset('assets/images/mla/balaji.jpg') }}" alt="2019" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
        </div>

        {{-- 2021 - Left Image, Right Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center" data-aos="fade-up">
          <div class="order-1 lg:order-1 relative rounded-2xl shadow-2xl overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 to-orange-500/10"></div>
            <img src="{{ asset('assets/images/about/about.png') }}" alt="2021" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
          <div class="order-2 lg:order-2">
            <div class="group relative">
              <div class="absolute -inset-1 bg-gradient-to-r from-red-500 to-orange-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
              <div class="relative bg-gradient-to-br from-red-50 to-orange-50 dark:from-red-950/30 dark:to-orange-950/30 rounded-3xl p-8 border border-red-200 dark:border-red-800 transition-all duration-500 hover:shadow-2xl">
                <span class="inline-block px-4 py-2 bg-gradient-to-r from-red-600 to-orange-600 text-white text-sm font-bold rounded-lg mb-4">2021</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-red-900 dark:text-red-100 mb-4">{{ __('site.history.2021_title') }}</h3>
                <p class="text-red-700/90 dark:text-red-200/80 leading-relaxed text-lg">{{ __('site.history.2021_desc') }}</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


  

@endsection
