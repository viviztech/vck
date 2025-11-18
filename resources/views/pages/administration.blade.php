@extends('layouts.app')

@section('title', __('site.administration.title'))

@section('content')

  {{-- Page Header --}}
  <x-page-header-simple
    :title="__('site.administration.title')"
    :subtitle="__('site.administration.subtitle')"
  />

  {{-- Administration Structure --}}
  <section class="relative min-h-screen flex items-center justify-center px-4 bg-white dark:bg-gray-950 overflow-hidden">
    {{-- Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-1/4 right-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
      <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto w-full relative z-10 py-20 lg:py-28">
      {{-- Section Header --}}
      <div class="text-center mb-16" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
          {{ __('site.administration.structure_title') }}
        </h2>
      </div>

      {{-- Structure Cards Grid --}}
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">

        {{-- Structure Card 1: National Executive --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="0">
          {{-- Animated Border --}}
          <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

          {{-- Card Content --}}
          <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl p-8 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col">
            {{-- Icon --}}
            <div class="relative w-14 h-14 mb-6">
              <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
              <div class="relative w-14 h-14 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                <svg class="w-7 h-7 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m-6 4h6m-6 4h6"/>
                </svg>
              </div>
            </div>

            <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-3">
              {{ __('site.administration.national_executive') }}
            </h3>
            <p class="text-blue-700/80 dark:text-blue-200/70 text-base leading-relaxed flex-grow">
              {{ __('site.administration.national_executive_desc') }}
            </p>
          </div>
        </div>

        {{-- Structure Card 2: State Units --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="100">
          {{-- Animated Border --}}
          <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

          {{-- Card Content --}}
          <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl p-8 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col">
            {{-- Icon --}}
            <div class="relative w-14 h-14 mb-6">
              <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
              <div class="relative w-14 h-14 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                <svg class="w-7 h-7 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
              </div>
            </div>

            <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-3">
              {{ __('site.administration.state_units') }}
            </h3>
            <p class="text-blue-700/80 dark:text-blue-200/70 text-base leading-relaxed flex-grow">
              {{ __('site.administration.state_units_desc') }}
            </p>
          </div>
        </div>

        {{-- Structure Card 3: District Committees --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="200">
          {{-- Animated Border --}}
          <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

          {{-- Card Content --}}
          <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl p-8 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col">
            {{-- Icon --}}
            <div class="relative w-14 h-14 mb-6">
              <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
              <div class="relative w-14 h-14 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                <svg class="w-7 h-7 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
              </div>
            </div>

            <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-3">
              {{ __('site.administration.district_committees') }}
            </h3>
            <p class="text-blue-700/80 dark:text-blue-200/70 text-base leading-relaxed flex-grow">
              {{ __('site.administration.district_committees_desc') }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Key Functions --}}
  <section class="relative min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-blue-50 via-white to-red-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30 overflow-hidden">
    {{-- Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
      <div class="absolute bottom-20 right-10 w-96 h-96 bg-red-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s"></div>
    </div>

    <div class="max-w-7xl mx-auto w-full relative z-10 py-20 lg:py-28">
      {{-- Section Header --}}
      <div class="text-center mb-16" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
          {{ __('site.administration.functions_title') }}
        </h2>
      </div>

      {{-- Functions Grid --}}
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-12">

        {{-- Policy Making Card --}}
        <div class="group relative" data-aos="fade-right">
          {{-- Animated Border --}}
          <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

          {{-- Card Content --}}
          <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl p-8 lg:p-10 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl h-full">
            {{-- Icon Badge --}}
            <div class="flex items-center mb-6">
              <div class="relative w-12 h-12 mr-4">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-xl opacity-20"></div>
                <div class="relative w-12 h-12 bg-white dark:bg-gray-900 rounded-xl flex items-center justify-center shadow-lg border-2 border-blue-200 dark:border-blue-700">
                  <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                  </svg>
                </div>
              </div>
              <h3 class="text-3xl lg:text-4xl font-bold text-blue-900 dark:text-blue-100">
                {{ __('site.administration.policy_making') }}
              </h3>
            </div>

            <p class="text-lg text-blue-800/90 dark:text-blue-200/80 mb-6 leading-relaxed">
              {{ __('site.administration.policy_making_desc') }}
            </p>

            <ul class="space-y-4">
              <li class="flex items-start">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-blue-700/80 dark:text-blue-200/70 text-base leading-relaxed">
                  {{ __('site.administration.policy_1') }}
                </span>
              </li>
              <li class="flex items-start">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-blue-700/80 dark:text-blue-200/70 text-base leading-relaxed">
                  {{ __('site.administration.policy_2') }}
                </span>
              </li>
              <li class="flex items-start">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-blue-700/80 dark:text-blue-200/70 text-base leading-relaxed">
                  {{ __('site.administration.policy_3') }}
                </span>
              </li>
            </ul>
          </div>
        </div>

        {{-- Implementation Card --}}
        <div class="group relative" data-aos="fade-left">
          {{-- Animated Border --}}
          <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

          {{-- Card Content --}}
          <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl p-8 lg:p-10 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl h-full">
            {{-- Icon Badge --}}
            <div class="flex items-center mb-6">
              <div class="relative w-12 h-12 mr-4">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-xl opacity-20"></div>
                <div class="relative w-12 h-12 bg-white dark:bg-gray-900 rounded-xl flex items-center justify-center shadow-lg border-2 border-blue-200 dark:border-blue-700">
                  <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                  </svg>
                </div>
              </div>
              <h3 class="text-3xl lg:text-4xl font-bold text-blue-900 dark:text-blue-100">
                {{ __('site.administration.implementation') }}
              </h3>
            </div>

            <p class="text-lg text-blue-800/90 dark:text-blue-200/80 mb-6 leading-relaxed">
              {{ __('site.administration.implementation_desc') }}
            </p>

            <ul class="space-y-4">
              <li class="flex items-start">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-blue-700/80 dark:text-blue-200/70 text-base leading-relaxed">
                  {{ __('site.administration.implementation_1') }}
                </span>
              </li>
              <li class="flex items-start">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-blue-700/80 dark:text-blue-200/70 text-base leading-relaxed">
                  {{ __('site.administration.implementation_2') }}
                </span>
              </li>
              <li class="flex items-start">
                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-blue-700/80 dark:text-blue-200/70 text-base leading-relaxed">
                  {{ __('site.administration.implementation_3') }}
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection