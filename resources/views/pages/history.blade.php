@extends('layouts.app')

@section('title', __('site.history.title'))

@section('content')

  {{-- Page Header --}}
  <x-page-header-simple
    :title="__('site.history.title')"
    :subtitle="__('site.history.subtitle')"
  />

  {{-- Founding of VCK --}}
  <section class="relative min-h-screen flex items-center justify-center px-4 bg-white dark:bg-gray-950 overflow-hidden">
    {{-- Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-1/4 right-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
      <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto w-full relative z-10 py-20 lg:py-28">
      <div class="group relative" data-aos="fade-up">
        <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
        <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-12 items-center bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/20 dark:to-red-950/20 rounded-3xl p-8 lg:p-12 border border-blue-200 dark:border-blue-800">
          <div class="order-2 lg:order-1">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-600 to-red-600 rounded-xl mb-4 shadow-lg">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
              </svg>
            </div>
            <h2 class="text-4xl lg:text-5xl font-extrabold text-blue-900 dark:text-blue-100 mb-6">{{ __('site.history.founding_title') }}</h2>
            <p class="text-lg text-blue-800/90 dark:text-blue-200/80 mb-4 leading-relaxed">
              {{ __('site.history.founding_desc1') }}
            </p>
            <p class="text-lg text-blue-800/90 dark:text-blue-200/80 leading-relaxed">
              {{ __('site.history.founding_desc2') }}
            </p>
          </div>
          <div class="order-1 lg:order-2 relative rounded-2xl shadow-2xl overflow-hidden group-hover:shadow-3xl transition-shadow duration-500">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-red-500/10"></div>
            <img src="{{ asset('assets/images/about/about.png') }}" alt="VCK Founding" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Key Milestones Timeline --}}
  <section class="py-20 lg:py-28 px-4 bg-gradient-to-b from-gray-50 to-white dark:from-gray-950 dark:to-gray-900">
    <div class="max-w-7xl mx-auto">
      <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
        <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 dark:text-white">{{ __('site.history.milestones') }}</h2>
      </div>

      <div class="relative max-w-5xl mx-auto">
        <div class="absolute left-4 md:left-1/2 w-0.5 h-full bg-gradient-to-b from-red-200 via-red-400 to-red-200 dark:from-red-900/50 dark:via-red-600/50 dark:to-red-900/50" aria-hidden="true"></div>

        <div class="relative flex flex-col gap-16">

          {{-- Timeline Item 1972 --}}
          <div class="relative flex items-start" data-aos="fade-right">
            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-red-600 to-orange-600 border-4 border-white dark:border-gray-900 absolute top-0 left-0 md:left-1/2 -ml-6 md:-ml-6 z-10 shadow-lg flex items-center justify-center">
              <span class="text-white text-xs font-bold">72</span>
            </div>
            <div class="w-full md:w-1/2 md:pr-12 ml-16 md:ml-0">
              <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-orange-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                <div class="relative bg-gradient-to-br from-red-50 to-orange-50 dark:from-red-950/30 dark:to-orange-950/30 rounded-3xl p-6 border border-red-200 dark:border-red-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                  <div class="relative overflow-hidden rounded-xl mb-4 aspect-[16/9]">
                    <img src="{{ asset('assets/images/history/milestone-2016.jpg') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="1972">
                    <div class="absolute inset-0 bg-gradient-to-t from-red-900/60 via-transparent to-transparent"></div>
                  </div>
                  <span class="inline-block px-3 py-1 bg-red-600 text-white text-sm font-bold rounded-lg mb-3">1972</span>
                  <h3 class="text-xl font-bold text-red-900 dark:text-red-100 mb-2">{{ __('site.history.1972_title') }}</h3>
                  <p class="text-red-700/80 dark:text-red-200/70">{{ __('site.history.1972_desc') }}</p>
                </div>
              </div>
            </div>
          </div>

          {{-- Timeline Item 1990 --}}
          <div class="relative flex items-start" data-aos="fade-left">
            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-blue-600 to-purple-600 border-4 border-white dark:border-gray-900 absolute top-0 left-0 md:left-1/2 -ml-6 md:-ml-6 z-10 shadow-lg flex items-center justify-center">
              <span class="text-white text-xs font-bold">90</span>
            </div>
            <div class="w-full md:w-1/2 md:pl-12 ml-16 md:ml-auto">
              <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-purple-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                <div class="relative bg-gradient-to-br from-blue-50 to-purple-50 dark:from-blue-950/30 dark:to-purple-950/30 rounded-3xl p-6 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                  <div class="relative overflow-hidden rounded-xl mb-4 aspect-[16/9]">
                    <img src="{{ asset('assets/images/history/milestone-2018.jpg') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="1990">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-transparent to-transparent"></div>
                  </div>
                  <span class="inline-block px-3 py-1 bg-blue-600 text-white text-sm font-bold rounded-lg mb-3">1990</span>
                  <h3 class="text-xl font-bold text-blue-900 dark:text-blue-100 mb-2">{{ __('site.history.1990_title') }}</h3>
                  <p class="text-blue-700/80 dark:text-blue-200/70">{{ __('site.history.1990_desc') }}</p>
                </div>
              </div>
            </div>
          </div>

          {{-- Timeline Item 1999 --}}
          <div class="relative flex items-start" data-aos="fade-right">
            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-green-600 to-emerald-600 border-4 border-white dark:border-gray-900 absolute top-0 left-0 md:left-1/2 -ml-6 md:-ml-6 z-10 shadow-lg flex items-center justify-center">
              <span class="text-white text-xs font-bold">99</span>
            </div>
            <div class="w-full md:w-1/2 md:pr-12 ml-16 md:ml-0">
              <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-emerald-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                <div class="relative bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-950/30 dark:to-emerald-950/30 rounded-3xl p-6 border border-green-200 dark:border-green-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                  <div class="relative overflow-hidden rounded-xl mb-4 aspect-[16/9]">
                    <img src="{{ asset('assets/images/history/milestone-2020.jpg') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="1999">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 via-transparent to-transparent"></div>
                  </div>
                  <span class="inline-block px-3 py-1 bg-green-600 text-white text-sm font-bold rounded-lg mb-3">1999</span>
                  <h3 class="text-xl font-bold text-green-900 dark:text-green-100 mb-2">{{ __('site.history.1999_title') }}</h3>
                  <p class="text-green-700/80 dark:text-green-200/70">{{ __('site.history.1999_desc') }}</p>
                </div>
              </div>
            </div>
          </div>

          {{-- Timeline Item 2001 --}}
          <div class="relative flex items-start" data-aos="fade-left">
            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-yellow-600 to-amber-600 border-4 border-white dark:border-gray-900 absolute top-0 left-0 md:left-1/2 -ml-6 md:-ml-6 z-10 shadow-lg flex items-center justify-center">
              <span class="text-white text-xs font-bold">01</span>
            </div>
            <div class="w-full md:w-1/2 md:pl-12 ml-16 md:ml-auto">
              <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-yellow-500 to-amber-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                <div class="relative bg-gradient-to-br from-yellow-50 to-amber-50 dark:from-yellow-950/30 dark:to-amber-950/30 rounded-3xl p-6 border border-yellow-200 dark:border-yellow-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                  <div class="relative overflow-hidden rounded-xl mb-4 aspect-[16/9]">
                    <img src="{{ asset('assets/images/history/milestone-2022.jpg') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="2001">
                    <div class="absolute inset-0 bg-gradient-to-t from-yellow-900/60 via-transparent to-transparent"></div>
                  </div>
                  <span class="inline-block px-3 py-1 bg-yellow-600 text-white text-sm font-bold rounded-lg mb-3">2001</span>
                  <h3 class="text-xl font-bold text-yellow-900 dark:text-yellow-100 mb-2">{{ __('site.history.2001_title') }}</h3>
                  <p class="text-yellow-700/80 dark:text-yellow-200/70">{{ __('site.history.2001_desc') }}</p>
                </div>
              </div>
            </div>
          </div>

          {{-- Timeline Item 2009 --}}
          <div class="relative flex items-start" data-aos="fade-right">
            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-purple-600 to-pink-600 border-4 border-white dark:border-gray-900 absolute top-0 left-0 md:left-1/2 -ml-6 md:-ml-6 z-10 shadow-lg flex items-center justify-center">
              <span class="text-white text-xs font-bold">09</span>
            </div>
            <div class="w-full md:w-1/2 md:pr-12 ml-16 md:ml-0">
              <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                <div class="relative bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-950/30 dark:to-pink-950/30 rounded-3xl p-6 border border-purple-200 dark:border-purple-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                  <div class="relative overflow-hidden rounded-xl mb-4 aspect-[16/9]">
                    <img src="{{ asset('assets/images/history/milestone-2024.jpg') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="2009">
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-900/60 via-transparent to-transparent"></div>
                  </div>
                  <span class="inline-block px-3 py-1 bg-purple-600 text-white text-sm font-bold rounded-lg mb-3">2009</span>
                  <h3 class="text-xl font-bold text-purple-900 dark:text-purple-100 mb-2">{{ __('site.history.2009_title') }}</h3>
                  <p class="text-purple-700/80 dark:text-purple-200/70">{{ __('site.history.2009_desc') }}</p>
                </div>
              </div>
            </div>
          </div>

          {{-- Timeline Item 2019 --}}
          <div class="relative flex items-start" data-aos="fade-left">
            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-indigo-600 to-violet-600 border-4 border-white dark:border-gray-900 absolute top-0 left-0 md:left-1/2 -ml-6 md:-ml-6 z-10 shadow-lg flex items-center justify-center">
              <span class="text-white text-xs font-bold">19</span>
            </div>
            <div class="w-full md:w-1/2 md:pl-12 ml-16 md:ml-auto">
              <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-violet-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                <div class="relative bg-gradient-to-br from-indigo-50 to-violet-50 dark:from-indigo-950/30 dark:to-violet-950/30 rounded-3xl p-6 border border-indigo-200 dark:border-indigo-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                  <div class="relative overflow-hidden rounded-xl mb-4 aspect-[16/9]">
                    <img src="{{ asset('assets/images/history/milestone-2022.jpg') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="2019">
                    <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/60 via-transparent to-transparent"></div>
                  </div>
                  <span class="inline-block px-3 py-1 bg-indigo-600 text-white text-sm font-bold rounded-lg mb-3">2019</span>
                  <h3 class="text-xl font-bold text-indigo-900 dark:text-indigo-100 mb-2">{{ __('site.history.2019_title') }}</h3>
                  <p class="text-indigo-700/80 dark:text-indigo-200/70">{{ __('site.history.2019_desc') }}</p>
                </div>
              </div>
            </div>
          </div>

          {{-- Timeline Item 2021 --}}
          <div class="relative flex items-start" data-aos="fade-right">
            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-red-600 to-pink-600 border-4 border-white dark:border-gray-900 absolute top-0 left-0 md:left-1/2 -ml-6 md:-ml-6 z-10 shadow-lg flex items-center justify-center">
              <span class="text-white text-xs font-bold">21</span>
            </div>
            <div class="w-full md:w-1/2 md:pr-12 ml-16 md:ml-0">
              <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-pink-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                <div class="relative bg-gradient-to-br from-red-50 to-pink-50 dark:from-red-950/30 dark:to-pink-950/30 rounded-3xl p-6 border border-red-200 dark:border-red-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                  <div class="relative overflow-hidden rounded-xl mb-4 aspect-[16/9]">
                    <img src="{{ asset('assets/images/history/milestone-2024.jpg') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="2021">
                    <div class="absolute inset-0 bg-gradient-to-t from-red-900/60 via-transparent to-transparent"></div>
                  </div>
                  <span class="inline-block px-3 py-1 bg-red-600 text-white text-sm font-bold rounded-lg mb-3">2021</span>
                  <h3 class="text-xl font-bold text-red-900 dark:text-red-100 mb-2">{{ __('site.history.2021_title') }}</h3>
                  <p class="text-red-700/80 dark:text-red-200/70">{{ __('site.history.2021_desc') }}</p>
                </div>
              </div>
            </div>
          </div>

          {{-- Timeline Item 2024 --}}
          <div class="relative flex items-start" data-aos="fade-left">
            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-gradient-to-br from-blue-600 to-red-600 border-4 border-white dark:border-gray-900 absolute top-0 left-0 md:left-1/2 -ml-6 md:-ml-6 z-10 shadow-lg flex items-center justify-center">
              <span class="text-white text-xs font-bold">24</span>
            </div>
            <div class="w-full md:w-1/2 md:pl-12 ml-16 md:ml-auto">
              <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl p-6 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                  <div class="relative overflow-hidden rounded-xl mb-4 aspect-[16/9]">
                    <img src="{{ asset('assets/images/history/milestone-2022.jpg') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="2024">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-transparent to-transparent"></div>
                  </div>
                  <span class="inline-block px-3 py-1 bg-blue-600 text-white text-sm font-bold rounded-lg mb-3">2024</span>
                  <h3 class="text-xl font-bold text-blue-900 dark:text-blue-100 mb-2">{{ __('site.history.2024_title') }}</h3>
                  <p class="text-blue-700/80 dark:text-blue-200/70">{{ __('site.history.2024_desc') }}</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  {{-- VCK Leadership --}}
  <section class="py-20 lg:py-28 px-4 bg-gradient-to-b from-white to-gray-50 dark:from-gray-900 dark:to-gray-950">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16" data-aos="fade-up">
        <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 dark:text-white">{{ __('site.history.founders') }}</h2>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

        {{-- Leader Card 1 --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="0">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-orange-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-red-50 to-orange-50 dark:from-red-950/30 dark:to-orange-950/30 rounded-3xl overflow-hidden border border-red-200 dark:border-red-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="relative overflow-hidden aspect-[3/4]">
              <img src="{{ asset('assets/images/mla/thiruma.png') }}" alt="{{ __('site.home.member_1_name') }}" class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105">
              <div class="absolute inset-0 bg-gradient-to-t from-red-900/60 via-transparent to-transparent"></div>
            </div>
            <div class="p-6 text-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
              <h4 class="text-lg font-bold text-red-900 dark:text-red-100 mb-1">{{ __('site.home.member_1_name') }}</h4>
              <p class="text-sm text-red-600 dark:text-red-400 font-semibold">{{ __('site.home.member_1_position') }}</p>
            </div>
          </div>
        </div>

        {{-- Leader Card 2 --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="100">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="relative overflow-hidden aspect-[3/4]">
              <img src="{{ asset('assets/images/mla/ravi.png') }}" alt="{{ __('site.home.member_2_name') }}" class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105">
              <div class="absolute inset-0 bg-gradient-to-t from-blue-600/60 via-transparent to-transparent"></div>
            </div>
            <div class="p-6 text-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
              <h4 class="text-lg font-bold text-blue-600 dark:text-blue-100 mb-1">{{ __('site.home.member_2_name') }}</h4>
              <p class="text-sm text-blue-600 dark:text-blue-400 font-semibold">{{ __('site.home.member_2_position') }}</p>
            </div>
          </div>
        </div>

        {{-- Leader Card 3 --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="200">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-950/30 dark:to-pink-950/30 rounded-3xl overflow-hidden border border-purple-200 dark:border-purple-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="relative overflow-hidden aspect-[3/4]">
              <img src="{{ asset('assets/images/mla/sinthanai.png') }}" alt="{{ __('site.home.member_3_name') }}" class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105">
              <div class="absolute inset-0 bg-gradient-to-t from-purple-900/60 via-transparent to-transparent"></div>
            </div>
            <div class="p-6 text-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
              <h4 class="text-lg font-bold text-purple-900 dark:text-purple-100 mb-1">{{ __('site.home.member_3_name') }}</h4>
              <p class="text-sm text-purple-600 dark:text-purple-400 font-semibold">{{ __('site.home.member_3_position') }}</p>
            </div>
          </div>
        </div>

        {{-- Leader Card 4 --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="300">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-emerald-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-950/30 dark:to-emerald-950/30 rounded-3xl overflow-hidden border border-green-200 dark:border-green-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
            <div class="relative overflow-hidden aspect-[3/4]">
              <img src="{{ asset('assets/images/mla/aloor.png') }}" alt="{{ __('site.home.member_4_name') }}" class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105">
              <div class="absolute inset-0 bg-gradient-to-t from-green-900/60 via-transparent to-transparent"></div>
            </div>
            <div class="p-6 text-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
              <h4 class="text-lg font-bold text-green-900 dark:text-green-100 mb-1">{{ __('site.home.member_4_name') }}</h4>
              <p class="text-sm text-green-600 dark:text-green-400 font-semibold">{{ __('site.home.member_4_position') }}</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- VCK Legacy Quote --}}
  <section class="py-20 lg:py-28 px-4 bg-gradient-to-br from-gray-900 via-red-950 to-gray-900 dark:from-gray-950 dark:via-red-950 dark:to-black text-white overflow-hidden">
    {{-- Background decoration --}}
    <div class="absolute inset-0 opacity-10">
      <div class="absolute top-10 left-20 w-96 h-96 bg-red-500 rounded-full mix-blend-multiply filter blur-3xl"></div>
      <div class="absolute bottom-10 right-20 w-96 h-96 bg-yellow-500 rounded-full mix-blend-multiply filter blur-3xl"></div>
    </div>
    <div class="relative max-w-5xl mx-auto">
      <div class="group relative" data-aos="zoom-in">
        <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-yellow-600 rounded-3xl blur-xl opacity-50 group-hover:opacity-75 transition duration-500"></div>
        <div class="relative bg-gradient-to-br from-gray-800/50 to-red-900/50 backdrop-blur-sm rounded-3xl p-12 lg:p-16 border border-red-500/30 text-center">
          <svg class="w-16 h-16 text-red-400 mx-auto mb-8 opacity-50" fill="currentColor" viewBox="0 0 24 24">
            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
          </svg>
          <blockquote class="text-2xl md:text-3xl lg:text-4xl font-serif italic mb-8 text-white leading-relaxed">
            "{{ __('site.history.legacy_quote1') }}"
          </blockquote>
          <div class="inline-flex items-center justify-center">
            <div class="h-px w-12 bg-gradient-to-r from-transparent to-red-400 mr-4"></div>
            <p class="font-semibold text-lg text-red-200">— {{ __('site.history.legacy_author') }}</p>
            <div class="h-px w-12 bg-gradient-to-l from-transparent to-red-400 ml-4"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
