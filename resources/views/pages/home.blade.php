@extends('layouts.app')

@section('title', 'Home')

@section('content')
@php
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
$locale = app()->getLocale();
@endphp


    {{-- Full-Page Hero Slider --}}
    <section id="home" class="relative h-screen overflow-hidden">
        {{-- Slider Container --}}
        <div id="slider-container" class="absolute inset-0 flex transition-transform duration-700 ease-in-out">
            {{-- Slide 1 --}}
            <div class="w-full h-full flex-shrink-0 relative">
                <picture>
                    <source media="(max-width: 768px)" srcset="{{ asset('assets/images/bg/slider1.mobile.jpg') }}">
                    <img src="{{ asset('assets/images/bg/slider1.jpg') }}" class="w-full h-full object-cover" alt="Slide 1" loading="eager" fetchpriority="high">
                </picture>
                {{-- Optional: Overlay for better text readability if needed --}}
                <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40"></div>
            </div>

            {{-- Slide 2 --}}
            <div class="w-full h-full flex-shrink-0 relative">
                <picture>
                    <source media="(max-width: 768px)" srcset="{{ asset('assets/images/bg/slider2.mobile.jpg') }}">
                    <img src="{{ asset('assets/images/bg/slider2.jpg') }}" class="w-full h-full object-cover" alt="Slide 2" loading="lazy">
                </picture>
                {{-- Optional: Overlay for better text readability if needed --}}
                <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40"></div>
            </div>

            {{-- Slide 3 --}}
            <div class="w-full h-full flex-shrink-0 relative">
                <picture>
                    <source media="(max-width: 768px)" srcset="{{ asset('assets/images/bg/slider3.mobile.jpg') }}">
                    <img src="{{ asset('assets/images/bg/slider3.jpg') }}" class="w-full h-full object-cover" alt="Slide 3" loading="lazy">
                </picture>
                {{-- Optional: Overlay for better text readability if needed --}}
                <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40"></div>
            </div>
        </div>

        {{-- Navigation Dots --}}
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3 z-10">
            <button class="w-3 h-3 rounded-full bg-white/70 hover:bg-white transition-all duration-300 hover:scale-125 shadow-lg" data-slide="0" aria-label="Go to slide 1"></button>
            <button class="w-3 h-3 rounded-full bg-white/70 hover:bg-white transition-all duration-300 hover:scale-125 shadow-lg" data-slide="1" aria-label="Go to slide 2"></button>
            <button class="w-3 h-3 rounded-full bg-white/70 hover:bg-white transition-all duration-300 hover:scale-125 shadow-lg" data-slide="2" aria-label="Go to slide 3"></button>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-20 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
            <svg class="w-6 h-6 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    {{-- About Section - Apple Style --}}
    <section id="about" class="relative min-h-screen flex items-center justify-center px-4 bg-white dark:bg-gray-950 overflow-hidden">
        {{-- Background Image with Overlay --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/images/mla/15.jpg') }}" alt="Background" class="w-full h-full object-cover opacity-90 dark:opacity-90" loading="lazy">
            <div class="absolute inset-0 bg-gradient-to-b from-white/85 via-white/90 to-white/85 dark:from-gray-950/85 dark:via-gray-950/90 dark:to-gray-950/85"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10 pt-16">
            {{-- Section Header --}}
            

            {{-- Content Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                {{-- Text Content --}}
                <div class="order-2 lg:order-1 scroll-reveal left-content">
                    <div class="prose prose-lg max-w-none">
                        <h2 class="amaippai-title animation-element slide-top">{{ __('site.about.title') }}</h2>
                        <p class="text-lg md:text-xl  mb-6 leading-relaxed">
                            {{ __('site.about.intro-1') }}
                        </p>
                        <p class="text-lg md:text-xl leading-relaxed">
                            {{ __('site.about.intro-2') }}
                        </p>
                    </div>
                </div>

                {{-- Image Content --}}
                <div class="order-1 lg:order-2 scroll-reveal right-img animation-element slide-right">
                    <div class="relative">
                        {{-- Animated gradient glow --}}
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-blue-500 rounded-3xl opacity-0 group-hover:opacity-100 blur-2xl"></div>
                        <div class="absolute -inset-4 bg-gradient-to-r from-red-600 to-blue-600 rounded-3xl blur-2xl opacity-20 animate-pulse"></div>

                        {{-- Image with border --}}
                        <div class="relative">
                            <img src="{{ asset('assets/images/about/about-1.png') }}" alt="About Our Party" class="relative w-full h-auto rounded-2xl" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="events">
        <div class=" events-wrap container">
            <!-- Left Column -->
            <div class="column left">
                <h2>{{ __('site.latest_events') }}</h2>
                @forelse($latestEvents as $event)
                @php
                    $locale = app()->getLocale();
                    // Choose language-specific title/content with sensible fallback
                    $title = $locale === 'ta'
                        ? ($event->title_ta ?? $event->title_en)
                        : ($event->title_en ?? $event->title_ta);
                    $content = $locale === 'ta'
                        ? ($event->content_ta ?? $event->content_en)
                        : ($event->content_en ?? $event->content_ta);
                    // category name (no Tamil field assumed) - fallback to 'Event'
                    $categoryName = $event->category->name ?? 'Event';
                @endphp
                <div class="card">
                    <div class="meta">
                        <span class="tag tech {{ strtolower(str_replace(' ', '-', $categoryName ?? 'general')) }}">
                            {{ $categoryName ?? 'Latest Events' }}
                        </span>
                        <span class="date">{{ $event->event_date ? $event->event_date->format('F d, Y') : now()->format('F d, Y') }}</span>
                    </div>
                    <h3><a href="{{ route('media.show', $event->slug) }}">{{ $title }}</a></h3>
                    <p>{{ Str::limit(strip_tags($content ?? ''), 150) }}</p>
                </div>
                @empty
                <div class="card">
                    <p>No events available at the moment.</p>
                </div>
                @endforelse
                <div class="text-center mt-4">
                    <a href="{{ route('events') }}" class="card-link" style="display: inline-block; padding: 12px 24px; background-color: #2563eb; color: white; border-radius: 8px; text-decoration: none; font-weight: 500; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1d4ed8'" onmouseout="this.style.backgroundColor='#2563eb'">
                        {{ __('site.view_all_news') }}
                    </a>
                </div>
            </div>

            <!-- Center Column (Featured latest news: show single latest post) -->
            <div class="column center">
                @php
                    $featured = isset($latest_news) && $latest_news->count() ? $latest_news->first() : null;
                @endphp

                @if($featured)
                    @php
                        $locale = app()->getLocale();
                        $fTitle = $locale === 'ta' ? ($featured->title_ta ?? $featured->title_en) : ($featured->title_en ?? $featured->title_ta);
                        $fContent = $locale === 'ta' ? ($featured->content_ta ?? $featured->content_en) : ($featured->content_en ?? $featured->content_ta);
                        $fCategory = $featured->category->name ?? 'News';
                        $featuredImageUrl = $featured->featured_image ? (Storage::exists($featured->featured_image) ? Storage::url($featured->featured_image) : asset($featured->featured_image)) : null;
                        // Prepare inline background style when an image is available
                        $featuredBgStyle = $featuredImageUrl ? "background-image: url('{$featuredImageUrl}'); background-size: cover; background-position: center; background-repeat: no-repeat;" : '';
                    @endphp

                    <div class="featured" style="{{ $featuredBgStyle }}">
                        <div class="" style="background: rgba(255,255,255,0.0);">
                            <div class="meta">
                                <span class="tag {{ strtolower(str_replace(' ', '-', $fCategory)) }}">{{ $fCategory }}</span>
                                <span class="date">{{ $featured->event_date ? $featured->event_date->format('F d, Y') : now()->format('F d, Y') }}</span>
                            </div>
                            <h2><a href="{{ route('media.show', $featured->slug) }}">{{ $fTitle }}</a></h2>
                            <p>{{ Str::limit(strip_tags($fContent ?? ''), 220) }}</p>
                        </div>
                    </div>
                @else
                    <div class="featured">
                        <div class="">
                            <div class="meta">
                                <span class="tag health">Health</span>
                                <span class="date">{{ now()->format('F d, Y') }}</span>
                            </div>
                            <h2>Study Finds Link Between Social Media Use and Mental Health Issues</h2>
                            <p>A new study has found a link between excessive social media use and mental health issues such
                                as depression and anxiety, raising concerns about the impact of social media on mental
                                well-being.
                            </p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right Column -->
            <div class="column right">
                <h2>{{ __('site.party_news') }}</h2>

                @if(isset($partyNews) && $partyNews->count())
                    @foreach($partyNews as $p)
                        @php
                            $locale = app()->getLocale();
                            $pTitle = $locale === 'ta' ? ($p->title_ta ?? $p->title_en) : ($p->title_en ?? $p->title_ta);
                            $pContent = $locale === 'ta' ? ($p->content_ta ?? $p->content_en) : ($p->content_en ?? $p->content_ta);
                            $pCategory = $p->category->name ?? 'Party News';
                        @endphp

                        <div class="card">
                            <div class="meta">
                                <span class="tag tech {{ strtolower(str_replace(' ', '-', $pCategory)) }}">{{ $pCategory }}</span>
                                <span class="date">{{ $p->event_date ? $p->event_date->format('F d, Y') : now()->format('F d, Y') }}</span>
                            </div>
                            <h3><a href="{{ route('media.show', $p->slug) }}">{{ $pTitle }}</a></h3>
                            <p>{{ Str::limit(strip_tags($pContent ?? ''), 120) }}</p>
                        </div>
                    @endforeach
                @else
                    <div class="card">
                        <p>{{ __('site.no_party_news') }}</p>
                    </div>
                @endif
                <div class="text-center mt-4">
                    <a href="{{ route('latest-news') }}" class="card-link" style="display: inline-block; padding: 12px 24px; background-color: #2563eb; color: white; border-radius: 8px; text-decoration: none; font-weight: 500; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#1d4ed8'" onmouseout="this.style.backgroundColor='#2563eb'">
                        {{ __('site.view_all_news') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="amaippai-wrapper">
        <div class="container">
            <div class="amaippai-quote-area">
                <div class="amaippai-quote-left">
                    <h2 class="amaippai-title animation-element slide-top">{{ __('site.amaippai_thiralvom.title') }}</h2>

                    <div class="amaippai-quote-block">
                        <img src="{{ asset('assets/images/images/quote-icon.png') }}" alt="quote-icon" loading="lazy" width="50" height="50">
                        <p class="amaippai-quote-text">
                            {{ __('site.amaippai_thiralvom.quote') }}
                        </p>
                    </div>

                    <p class="amaippai-author">{{ __('site.amaippai_thiralvom.author') }}</p>
                </div>

                <div class="amaippai-quote-right animation-element slide-right">
                    <div class="amaippai-book-wrapper">
                        <img src="{{ asset('assets/images/images/amaippai-thiralvom-right-img.png')}}" alt="Amaippai Thiralvom poster"
                            class="amaippai-image" loading="lazy" />
                        <div class="amaippai-img-overlay">
                            <a href="{{ route('books') }}" class="amaippai-buy-btn">{{ __('site.books.buy_book') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="amaippai-news-row">
                <div class="amaippai-news-card">
                    <img src="{{ asset('assets/images/images/star.png') }}" alt="Plant based food" class="amaippai-news-img" loading="lazy" />
                    <div class="amaippai-news-meta">
                        <span class="amaippai-news-date">March 15, 2023</span>
                        <h3 class="amaippai-news-title">முதன்மை முரண்களை அடையாளம் காண்போம்! அவை மூலமாய்த் தோழமை சக்திகளை அறிவோம்!</h3>
                    </div>

                </div>

                <div class="amaippai-news-card">
                    <img src="{{ asset('assets/images/images/star.png') }}" alt="Spotify podcast" class="amaippai-news-img" loading="lazy" />
                    <div class="amaippai-news-meta">
                        <span class="amaippai-news-date">March 14, 2023</span>
                        <h3 class="amaippai-news-title">முதன்மை அடிப்படை முரண்களை அறிவோம்! அவை மூலமாய்த் சனநாயக சக்திகளைத் தெரிவோம்!</h3>
                    </div>

                </div>

                <div class="amaippai-news-card">
                    <img src="{{ asset('assets/images/images/star.png') }}" alt="Infrastructure Bill" class="amaippai-news-img" loading="lazy" />
                    <div class="amaippai-news-meta">
                        <span class="amaippai-news-date">March 12, 2023</span>
                        <h3 class="amaippai-news-title">முதன்மை அடிப்படை முரண்களை அறிவோம்! அவை மூலமாய்த் சனநாயக சக்திகளைத் தெரிவோம்!</h3>
                    </div>

                </div>

                <div class="amaippai-news-card">
                    <img src="{{ asset('assets/images/images/star.png') }}" alt="TikTok news" class="amaippai-news-img" loading="lazy" />
                    <div class="amaippai-news-meta">
                        <span class="amaippai-news-date">March 11, 2023</span>
                        <h3 class="amaippai-news-title">முதன்மை அடிப்படை முரண்களை அறிவோம்! அவை மூலமாய்த் சனநாயக சக்திகளைத் தெரிவோம்!</h3>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Video modal for YouTube playback -->
    <style>
        #video-modal { display: none; position: fixed; inset: 0; z-index: 9999; align-items: center; justify-content: center; }
        #video-modal.open { display: flex; }
        #video-modal .backdrop { position: absolute; inset: 0; background: rgba(0,0,0,0.8); }
        #video-modal .panel { position: relative; width: 90%; max-width: 1100px; z-index: 2; }
        #video-modal .panel .frame-wrap { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; }
        #video-modal iframe { position: absolute; top:0; left:0; width:100%; height:100%; border:0; }
        #video-modal .close-btn { position: absolute; right: -10px; top: -10px; background: #fff; border-radius: 999px; width:36px; height:36px; display:flex; align-items:center; justify-content:center; cursor:pointer; z-index:3; }
        .ytabs-track a[data-video] img { cursor: pointer; }
    </style>

    <div id="video-modal" aria-hidden="true">
        <div class="backdrop" id="video-modal-backdrop"></div>
        <div class="panel">
            <div class="frame-wrap">
                <iframe id="video-iframe" src="" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>
            </div>
            <button id="close-video-modal" class="close-btn" aria-label="Close video">✕</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('video-modal');
            const iframe = document.getElementById('video-iframe');
            const closeBtn = document.getElementById('close-video-modal');
            const backdrop = document.getElementById('video-modal-backdrop');

            function openVideo(url) {
                if (!url) return;
                // ensure autoplay param
                const sep = url.includes('?') ? '&' : '?';
                iframe.src = url + sep + 'autoplay=1';
                modal.classList.add('open');
                modal.setAttribute('aria-hidden', 'false');
            }

            function closeVideo() {
                iframe.src = '';
                modal.classList.remove('open');
                modal.setAttribute('aria-hidden', 'true');
            }

            // click handler for any element with data-video attribute inside the page
            document.body.addEventListener('click', function(e) {
                const el = e.target.closest('a[data-video]');
                if (!el) return;
                e.preventDefault();
                const url = el.getAttribute('data-video');
                if (url) openVideo(url);
            });

            closeBtn.addEventListener('click', closeVideo);
            backdrop.addEventListener('click', closeVideo);

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal.classList.contains('open')) {
                    closeVideo();
                }
            });
        });
    </script>
    
    <section class="members-section">
        <div class="container">
            <div class="members-wrap">
                <h2 class="animation-element slide-top">{{ __('site.home.members_section_title') }}</h2>
                <div class="members-wrap">
                    <div class="members-top-row">
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/thol-thirmavalavan.png') }}" alt="{{ __('site.home.member_1_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="animation-element slide-top">{{ __('site.home.member_1_name') }}</h6>
                                <span>{{ __('site.home.member_1_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/thirumaofficial" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/thirumaofficial" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                    <p><a href="https://www.instagram.com/thol.thirumaavalavan/" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/insta.png') }}" alt="instagram" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/raj-kumar.png') }}" alt="{{ __('site.home.member_2_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="animation-element slide-top">{{ __('site.home.member_2_name') }}</h6>
                                <span>{{ __('site.home.member_2_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/WriterRavikumar" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/WriterRavikumar" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="members-bottom-row">
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/sinthanai-selvan.png') }}" alt="{{ __('site.home.member_3_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="animation-element slide-top">{{ __('site.home.member_3_name') }}</h6>
                                <span>{{ __('site.home.member_3_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/SinthanaiVCKofficial" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/sinthanaivck" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                    <p><a href="https://www.instagram.com/sinthanai_vck" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/insta.png') }}" alt="instagram" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/aloor-shah-nawaz.png') }}" alt="{{ __('site.home.member_4_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="animation-element slide-top">{{ __('site.home.member_4_name') }}</h6>
                                <span>{{ __('site.home.member_4_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/aloor.shanavas" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/aloor_ShaNavas" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                    <p><a href="https://www.instagram.com/aloor_sha_navas/" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/insta.png') }}" alt="instagram" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/panaiyur-babu.png') }}" alt="{{ __('site.home.member_5_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="animation-element slide-top">{{ __('site.home.member_5_name') }}</h6>
                                <span>{{ __('site.home.member_5_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/panaiyurmbabu/" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/PanaiyurBabu" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                    <p><a href="https://www.instagram.com/panaiyurbabumla/" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/insta.png') }}" alt="instagram" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="s-member-wrap">
                            <div class="member-img">
                                <img src="{{ asset('assets/images/images/balaji.png') }}" alt="{{ __('site.home.member_6_name') }}" loading="lazy">
                            </div>
                            <div class="member-cont">
                                <h6 class="animation-element slide-top">{{ __('site.home.member_6_name') }}</h6>
                                <span>{{ __('site.home.member_6_position') }}</span>
                                <div class="members-s-media">
                                    <p><a href="https://www.facebook.com/s.s.balaji" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/fb.png') }}" alt="facebook" loading="lazy"></a></p>
                                    <p><a href="https://x.com/VckBalaji" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/images/images/twitter.png') }}" alt="twitter" loading="lazy"></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="milestone-slider-section">
        <h2 class="milestone-slider-title animation-element slide-top">{{ __('site.history.milestones') }}</h2>

        <!-- Timeline navigation -->
        <div class="milestone-slider-years">
            <button class="milestone-slider-year active" data-slide="0">1972</button>
            <button class="milestone-slider-year" data-slide="1">1990</button>
            <button class="milestone-slider-year" data-slide="2">1999</button>
            <button class="milestone-slider-year" data-slide="3">2001</button>
            <button class="milestone-slider-year" data-slide="4">2009</button>
            <button class="milestone-slider-year" data-slide="5">2019</button>
            <button class="milestone-slider-year" data-slide="6">2021</button>
            <button class="milestone-slider-year" data-slide="7">2024</button>
        </div>

        <!-- Slider content -->
        <div class="milestone-slider-content">
            <div class="milestone-slider-item active">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.1972_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.1972_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.1972_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.1990_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.1990_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.1990_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.1999_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.1999_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.1999_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.2001_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.2001_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.2001_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.2009_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.2009_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.2009_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.2019_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.2019_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.2019_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.2021_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.2021_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.2021_desc') }}
                </p>
            </div>

            <div class="milestone-slider-item">
                <img src="{{ asset('assets/images/images/milestone-img1.png') }}" alt="{{ __('site.history.2024_title') }}" class="milestone-slider-image" loading="lazy" />
                <h3 class="milestone-slider-caption">{{ __('site.history.2024_title') }}</h3>
                <p class="milestone-slider-text">
                    {{ __('site.history.2024_desc') }}
                </p>
            </div>

        </div>
    </section>
    <section class="exclusive-section">
        <div class="container">
          @php
            $locale = app()->getLocale();
            $exclusiveInterviews = isset($exclusiveInterviews) ? $exclusiveInterviews : collect();
            
            // Function to convert any YouTube URL format to embed URL
            $convertToEmbedUrl = function($url) {
                if (empty($url)) return null;
                
                // If already an embed URL, return as is (with rel=0 if not present)
                if (strpos($url, 'youtube.com/embed') !== false) {
                    return strpos($url, 'rel=') === false ? $url . (strpos($url, '?') !== false ? '&' : '?') . 'rel=0' : $url;
                }
                
                // Extract video ID from various YouTube URL formats
                $videoId = null;
                if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
                    $videoId = $matches[1];
                } elseif (preg_match('/^[a-zA-Z0-9_-]{11}$/', $url)) {
                    // If it's just a video ID
                    $videoId = $url;
                }
                
                // Convert to embed URL
                return $videoId ? "https://www.youtube.com/embed/{$videoId}?rel=0" : null;
            };
            
            // Function to get YouTube thumbnail from video link
            $getThumbnailUrl = function($url) {
                if (empty($url)) return null;
                
                $videoId = null;
                if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
                    $videoId = $matches[1];
                } elseif (preg_match('/^[a-zA-Z0-9_-]{11}$/', $url)) {
                    $videoId = $url;
                }
                
                return $videoId ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg" : null;
            };
            
            $featuredInterview = $exclusiveInterviews->first();
            $sidebarInterviews = $exclusiveInterviews->skip(1)->take(4);
          @endphp
          
          @if($featuredInterview && $featuredInterview->video_link)
            @php
              $embedUrl = $convertToEmbedUrl($featuredInterview->video_link);
              $featuredTitle = $locale === 'ta' ? ($featuredInterview->title_ta ?? $featuredInterview->title_en) : ($featuredInterview->title_en ?? $featuredInterview->title_ta);
            @endphp
            <!-- LEFT FEATURED VIDEO -->
            <div class="featured">
              @if($embedUrl)
                <iframe id="mainVideo" width="100%" height="580"
                  data-src="{{ $embedUrl }}"
                  title="{{ $featuredTitle }}" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  allowfullscreen
                  loading="lazy"></iframe>
              @else
                <div style="width: 100%; height: 580px; background: #000; display: flex; align-items: center; justify-content: center; color: white;">
                  <p>Video not available</p>
                </div>
              @endif
              <div class="tag">{{ __('site.menu.interviews') }}</div>
            </div>
          @else
            <!-- PLACEHOLDER IF NO INTERVIEWS -->
            <div class="featured">
              <div style="width: 100%; height: 580px; background: #000; display: flex; align-items: center; justify-content: center; color: white;">
                <p>{{ __('site.videos.no_videos') }}</p>
              </div>
              <div class="tag">{{ __('site.menu.interviews') }}</div>
            </div>
          @endif
        
          <!-- RIGHT SIDEBAR -->
          <div class="sidebar">
            @forelse($sidebarInterviews as $interview)
              @if($interview->video_link)
                @php
                  $embedUrl = $convertToEmbedUrl($interview->video_link);
                  $title = $locale === 'ta' ? ($interview->title_ta ?? $interview->title_en) : ($interview->title_en ?? $interview->title_ta);
                  $thumbnailUrl = $getThumbnailUrl($interview->video_link);
                @endphp
                @if($embedUrl && $thumbnailUrl)
                  <div class="side-item" data-video="{{ $embedUrl }}">
                    <img src="{{ $thumbnailUrl }}" alt="{{ $title }}" loading="lazy">
                    <p>{{ $title }}</p>
                  </div>
                @endif
              @endif
            @empty
              <div class="side-item">
                <p>{{ __('site.videos.no_videos') }}</p>
              </div>
            @endforelse
          </div>
        </div>
    </section>
    <section class="orgsec-container">
        <div class="container">
            <h2 class="orgsec-title">{{ __('site.color_symbolism.title') }}</h2>

            <div class="orgsec-card-wrapper">

            <div class="orgsec-card">
                <img src="{{ asset('assets/images/images/blue.png') }}" class="orgsec-icon" alt="{{ __('site.color_symbolism.blue_title') }}" loading="lazy">
                <h3 class="orgsec-card-title animation-element slide-top">{{ __('site.color_symbolism.blue_title') }}</h3>
                <p class="orgsec-desc">{{ __('site.color_symbolism.blue_meaning') }} - {{ __('site.color_symbolism.blue_subtitle') }}</p>
            </div>

            <div class="orgsec-card">
                <img src="{{ asset('assets/images/images/red.png') }}" class="orgsec-icon" alt="{{ __('site.color_symbolism.red_title') }}" loading="lazy">
                <h3 class="orgsec-card-title animation-element slide-top">{{ __('site.color_symbolism.red_title') }}</h3>
                <p class="orgsec-desc">{{ __('site.color_symbolism.red_meaning') }} - {{ __('site.color_symbolism.red_subtitle') }}</p>
            </div>

            <div class="orgsec-card">
                <img src="{{ asset('assets/images/images/star.png') }}" class="orgsec-icon" alt="{{ __('site.color_symbolism.star_title') }}" loading="lazy">
                <h3 class="orgsec-card-title animation-element slide-top">{{ __('site.color_symbolism.star_title') }}</h3>
                <p class="orgsec-desc">{{ __('site.color_symbolism.star_meaning') }} - {{ __('site.color_symbolism.star_subtitle') }}</p>
            </div>

            <div class="orgsec-card">
                <img src="{{ asset('assets/images/images/tiger.png') }}" class="orgsec-icon" alt="{{ __('site.color_symbolism.panther_title') }}" loading="lazy">
                <h3 class="orgsec-card-title animation-element slide-top">{{ __('site.color_symbolism.panther_title') }}</h3>
                <p class="orgsec-desc">{{ __('site.color_symbolism.panther_meaning') }} - {{ __('site.color_symbolism.panther_subtitle') }}</p>
            </div>
        </div>

        <h2 class="orgsec-subtitle">{{ __('site.color_symbolism.organization_structure') }}</h2>

        <div class="orgsec-tabs">
            <div class="orgsec-tab orgsec-blue">{{ __('site.color_symbolism.leadership') }}</div>
            <div class="orgsec-tab orgsec-red">{{ __('site.color_symbolism.district_secretaries') }}</div>
            <div class="orgsec-tab orgsec-blue orgsec-active">{{ __('site.color_symbolism.committee_members') }}</div>
            <div class="orgsec-tab orgsec-red">{{ __('site.color_symbolism.party_wings') }}</div>
        </div>

            <div class="orgsec-icons">
            <div class="orgsec-tab orgsec-blue">{{ __('site.color_symbolism.leadership') }}</div>
            <a href="{{ route('leadership') }}">
                <img class="animation-element slide-bottom" src="{{ asset('assets/images/images/leadership.png') }}" alt="{{ __('site.color_symbolism.leadership') }}" loading="lazy">
            </a>
            <div class="orgsec-tab orgsec-red">{{ __('site.color_symbolism.district_secretaries') }}</div>
            <a href="{{ route('party-representatives') }}">
                <img class="animation-element slide-bottom" src="{{ asset('assets/images/images/secratary.png') }}" alt="{{ __('site.color_symbolism.district_secretaries') }}" loading="lazy">
            </a>
            <div class="orgsec-tab orgsec-blue orgsec-active">{{ __('site.color_symbolism.committee_members') }}</div>
            <a href="{{ route('office-bearers') }}">
                <img class="animation-element slide-bottom" src="{{ asset('assets/images/images/commitee-members.png') }}" alt="{{ __('site.color_symbolism.committee_members') }}" loading="lazy">
            </a>
            <div class="orgsec-tab orgsec-red">{{ __('site.color_symbolism.party_wings') }}</div>
            <a href="{{ route('party-wings') }}">
                <img class="animation-element slide-bottom" src="{{ asset('assets/images/images/party-wings.png') }}" alt="{{ __('site.color_symbolism.party_wings') }}" loading="lazy">
            </a>
        </div>
        </div>

    </section>
    <section class="gallerysec-container">

        <div class="container">
            <h2 class="gallerysec-title">Gallery</h2>
            <p class="gallerysec-subtitle">Explore Moments From VCK Rallies, Meeting and Community Programs</p>

            <div class="gallerysec-tabs">
                <button class="gallerysec-tab gallerysec-active" data-target="events">Events Gallery</button>
                <button class="gallerysec-tab" data-target="party">VCK Party</button>
                <button class="gallerysec-tab" data-target="thiru">Thol Thirumavalavan Special</button>
            </div>

            <!-- EVENTS TAB -->
            <div class="gallerysec-content gallerysec-show" id="events">
                <div class="grid-container">
                    <img class="grid-item grid1" src="{{ asset('assets/images/images/gallery-img1.png') }}" alt="gallery-img1" loading="lazy">
                    <img class="grid-item grid2" src="{{ asset('assets/images/images/gallery-img2.png') }}" alt="gallery-img2" loading="lazy">
                    <img class="grid-item grid3" src="{{ asset('assets/images/images/gallery-img3.png') }}" alt="gallery-img3" loading="lazy">
                    <img class="grid-item grid4" src="{{ asset('assets/images/images/gallery-img4.png') }}" alt="gallery-img4" loading="lazy">
                    <img class="grid-item grid5" src="{{ asset('assets/images/images/gallery-img5.png') }}" alt="gallery-img5" loading="lazy">
                    <img class="grid-item grid6" src="{{ asset('assets/images/images/gallery-img6.png') }}" alt="gallery-img6" loading="lazy">
                </div>
            </div>

             <!--PARTY TAB -->
            <div class="gallerysec-content gallerysec-show" id="party">
                <div class="grid-container">
                    <img class="grid-item grid2" src="{{ asset('assets/images/images/gallery-img1.png') }}" alt="gallery-img1" loading="lazy">
                    <img class="grid-item grid1" src="{{ asset('assets/images/images/gallery-img2.png') }}" alt="gallery-img2" loading="lazy">
                    <img class="grid-item grid3" src="{{ asset('assets/images/images/gallery-img3.png') }}" alt="gallery-img3" loading="lazy">
                    <img class="grid-item grid6" src="{{ asset('assets/images/images/gallery-img4.png') }}" alt="gallery-img4" loading="lazy">
                    <img class="grid-item grid5" src="{{ asset('assets/images/images/gallery-img5.png') }}" alt="gallery-img5" loading="lazy">
                    <img class="grid-item grid4" src="{{ asset('assets/images/images/gallery-img6.png') }}" alt="gallery-img6" loading="lazy">
                </div>
            </div>

             <!--THIRU TAB -->
            <div class="gallerysec-content gallerysec-show" id="thiru">
                <div class="grid-container">
                    <img class="grid-item grid6" src="{{ asset('assets/images/images/gallery-img1.png') }}" alt="gallery-img1" loading="lazy">
                    <img class="grid-item grid5" src="{{ asset('assets/images/images/gallery-img2.png') }}" alt="gallery-img2" loading="lazy">
                    <img class="grid-item grid4" src="{{ asset('assets/images/images/gallery-img3.png') }}" alt="gallery-img3" loading="lazy">
                    <img class="grid-item grid3" src="{{ asset('assets/images/images/gallery-img4.png') }}" alt="gallery-img4" loading="lazy">
                    <img class="grid-item grid2" src="{{ asset('assets/images/images/gallery-img5.png') }}" alt="gallery-img5" loading="lazy">
                    <img class="grid-item grid1" src="{{ asset('assets/images/images/gallery-img6.png') }}" alt="gallery-img6" loading="lazy">
                </div>
            </div>
        </div>

    </section>
    <section class="ytabs-container">

        <div class="container">
            @php
                $locale = app()->getLocale();
                $videoGallery = isset($videoGallery) ? $videoGallery : collect();
                $velichamTvGallery = isset($velichamTvGallery) ? $velichamTvGallery : collect();
                $kalathiGallery = isset($kalathiGallery) ? $kalathiGallery : collect();
                $pressMeetGallery = isset($pressMeetGallery) ? $pressMeetGallery : collect();
                $getYoutubeId = function($url) {
                    if (empty($url)) return null;
                    if (preg_match('/(?:v=|\/embed\/|youtu\.be\/)([A-Za-z0-9_-]+)/', $url, $m)) {
                        return $m[1];
                    }
                    if (preg_match('/^[A-Za-z0-9_-]{11}$/', $url)) {
                        return $url;
                    }
                    return null;
                };
            @endphp
            <div class="ytabs-tabs">
                <div class="ytabs-tab ytabs-active" data-target="ytabs-yt">VCK Youtube</div>
                <div class="ytabs-tab" data-target="ytabs-vtv">Velicham Tv</div>
                <div class="ytabs-tab" data-target="ytabs-kal">Kalathi Chiruthaikal</div>
                <div class="ytabs-tab" data-target="ytabs-press">Thirumavalavan Press Meet</div>
            </div>

            <!-- VCK YouTube Tab: Dynamic Video Gallery -->
            <div class="ytabs-slider ytabs-show" id="ytabs-yt">
                <div class="ytabs-track">
                    @forelse($videoGallery as $video)
                        @php
                            $ytId = $getYoutubeId($video->video_link ?? '');
                            $title = $locale === 'ta' ? ($video->title_ta ?? $video->title_en) : ($video->title_en ?? $video->title_ta);
                            $embedUrl = $ytId ? "https://www.youtube.com/embed/{$ytId}?rel=0" : null;
                        @endphp
                        @if($embedUrl)
                            <iframe width="360" height="215" data-src="{{ $embedUrl }}" title="{{ $title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="margin:8px 0;" loading="lazy"></iframe>
                        @else
                            <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="{{ $title }}" style="object-fit: cover;" loading="lazy">
                        @endif
                    @empty
                        <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="yt1">
                        <img src="{{ asset('assets/images/images/vck-yt2.png') }}" alt="yt2">
                        <img src="{{ asset('assets/images/images/vck-yt3.png') }}" alt="yt3">
                        <img src="{{ asset('assets/images/images/vck-yt4.png') }}" alt="yt4">
                        <img src="{{ asset('assets/images/images/vck-yt5.png') }}" alt="yt5">
                    @endforelse
                </div>
                <div class="ytabs-next">›</div>
            </div>

            <!-- Velicham TV Tab: Dynamic Video Gallery -->
            <div class="ytabs-slider" id="ytabs-vtv">
                <div class="ytabs-track">
                    @forelse($velichamTvGallery as $video)
                        @php
                            $ytId = $getYoutubeId($video->video_link ?? '');
                            $title = $locale === 'ta' ? ($video->title_ta ?? $video->title_en) : ($video->title_en ?? $video->title_ta);
                            $embedUrl = $ytId ? "https://www.youtube.com/embed/{$ytId}?rel=0" : null;
                        @endphp
                        @if($embedUrl)
                            <iframe width="360" height="215" data-src="{{ $embedUrl }}" title="{{ $title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="margin:8px 0;" loading="lazy"></iframe>
                        @else
                            <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="{{ $title }}" style="object-fit: cover;" loading="lazy">
                        @endif
                    @empty
                        <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="yt1">
                        <img src="{{ asset('assets/images/images/vck-yt2.png') }}" alt="yt2">
                        <img src="{{ asset('assets/images/images/vck-yt3.png') }}" alt="yt3">
                    @endforelse
                </div>
                <div class="ytabs-next">›</div>
            </div>

            <!-- Kalathi Chiruthaikal Tab: Dynamic Video Gallery -->
            <div class="ytabs-slider" id="ytabs-kal">
                <div class="ytabs-track">
                    @forelse($kalathiGallery as $video)
                        @php
                            $ytId = $getYoutubeId($video->video_link ?? '');
                            $title = $locale === 'ta' ? ($video->title_ta ?? $video->title_en) : ($video->title_en ?? $video->title_ta);
                            $embedUrl = $ytId ? "https://www.youtube.com/embed/{$ytId}?rel=0" : null;
                        @endphp
                        @if($embedUrl)
                            <iframe width="360" height="215" data-src="{{ $embedUrl }}" title="{{ $title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="margin:8px 0;" loading="lazy"></iframe>
                        @else
                            <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="{{ $title }}" style="object-fit: cover;" loading="lazy">
                        @endif
                    @empty
                        <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="yt1">
                        <img src="{{ asset('assets/images/images/vck-yt2.png') }}" alt="yt2">
                        <img src="{{ asset('assets/images/images/vck-yt3.png') }}" alt="yt3">
                    @endforelse
                </div>
                <div class="ytabs-next">›</div>
            </div>

            <!-- Thirumavalavan Press Meet Tab: Dynamic Video Gallery -->
            <div class="ytabs-slider" id="ytabs-press">
                <div class="ytabs-track">
                    @forelse($pressMeetGallery as $video)
                        @php
                            $ytId = $getYoutubeId($video->video_link ?? '');
                            $title = $locale === 'ta' ? ($video->title_ta ?? $video->title_en) : ($video->title_en ?? $video->title_ta);
                            $embedUrl = $ytId ? "https://www.youtube.com/embed/{$ytId}?rel=0" : null;
                        @endphp
                        @if($embedUrl)
                            <iframe width="360" height="215" data-src="{{ $embedUrl }}" title="{{ $title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="margin:8px 0;" loading="lazy"></iframe>
                        @else
                            <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="{{ $title }}" style="object-fit: cover;" loading="lazy">
                        @endif
                    @empty
                        <img src="{{ asset('assets/images/images/vck-yt1.png') }}" alt="yt1">
                        <img src="{{ asset('assets/images/images/vck-yt2.png') }}" alt="yt2">
                        <img src="{{ asset('assets/images/images/vck-yt3.png') }}" alt="yt3">
                    @endforelse
                </div>
                <div class="ytabs-next">›</div>
            </div>
        </div>

    </section>
    

    {{-- Horizontal Scroll Script with Auto-Scroll --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Generic function to setup scroll for a section
            function setupScroll(containerId, leftBtnId, rightBtnId, progressBarId) {
                const container = document.getElementById(containerId);
                const leftBtn = document.getElementById(leftBtnId);
                const rightBtn = document.getElementById(rightBtnId);
                const progressBar = document.getElementById(progressBarId);

                if (!container || !leftBtn || !rightBtn || !progressBar) return;

                // Scroll amount (width of one card + gap)
                const scrollAmount = 336;
                let autoScrollInterval;
                let isUserInteracting = false;

                // Scroll buttons
                leftBtn.addEventListener('click', () => {
                    stopAutoScroll();
                    container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                    setTimeout(startAutoScroll, 5000); // Resume after 5 seconds
                });

                rightBtn.addEventListener('click', () => {
                    stopAutoScroll();
                    container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                    setTimeout(startAutoScroll, 5000); // Resume after 5 seconds
                });

                // Update progress bar
                function updateProgress() {
                    const scrollWidth = container.scrollWidth - container.clientWidth;
                    const scrolled = container.scrollLeft;
                    const progress = (scrolled / scrollWidth) * 100;
                    progressBar.style.width = `${progress}%`;
                }

                container.addEventListener('scroll', updateProgress);
                updateProgress();

                // Auto-scroll functionality
                function autoScroll() {
                    if (isUserInteracting) return;

                    const scrollWidth = container.scrollWidth - container.clientWidth;
                    const currentScroll = container.scrollLeft;

                    // If reached the end, scroll back to start
                    if (currentScroll >= scrollWidth - 10) {
                        container.scrollTo({ left: 0, behavior: 'smooth' });
                    } else {
                        // Scroll to next card
                        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                    }
                }

                function startAutoScroll() {
                    stopAutoScroll(); // Clear any existing interval
                    autoScrollInterval = setInterval(autoScroll, 3000); // Auto-scroll every 3 seconds
                }

                function stopAutoScroll() {
                    if (autoScrollInterval) {
                        clearInterval(autoScrollInterval);
                        autoScrollInterval = null;
                    }
                }

                // Pause auto-scroll on user interaction
                container.addEventListener('mouseenter', () => {
                    isUserInteracting = true;
                    stopAutoScroll();
                });

                container.addEventListener('mouseleave', () => {
                    isUserInteracting = false;
                    startAutoScroll();
                });

                container.addEventListener('touchstart', () => {
                    isUserInteracting = true;
                    stopAutoScroll();
                });

                container.addEventListener('touchend', () => {
                    setTimeout(() => {
                        isUserInteracting = false;
                        startAutoScroll();
                    }, 3000); // Resume after 3 seconds of no touch
                });

                // Pause auto-scroll when manually scrolling
                let scrollTimeout;
                container.addEventListener('scroll', () => {
                    if (!autoScrollInterval) {
                        clearTimeout(scrollTimeout);
                        scrollTimeout = setTimeout(() => {
                            if (!isUserInteracting) {
                                startAutoScroll();
                            }
                        }, 3000);
                    }
                });

                // Keyboard navigation
                container.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowLeft') {
                        e.preventDefault();
                        leftBtn.click();
                    } else if (e.key === 'ArrowRight') {
                        e.preventDefault();
                        rightBtn.click();
                    }
                });

                // Start auto-scroll on page load
                startAutoScroll();

                // Pause when page is not visible
                document.addEventListener('visibilitychange', () => {
                    if (document.hidden) {
                        stopAutoScroll();
                    } else if (!isUserInteracting) {
                        startAutoScroll();
                    }
                });
            }

            // Setup scroll for news, videos, and timeline
            setupScroll('news-scroll-container', 'news-scroll-left', 'news-scroll-right', 'news-scroll-progress');
            setupScroll('videos-scroll-container', 'videos-scroll-left', 'videos-scroll-right', 'videos-scroll-progress');
            setupScroll('timeline-scroll-container', 'timeline-scroll-left', 'timeline-scroll-right', 'timeline-scroll-progress');
        });
    </script>
    

    {{-- Hide Scrollbar Style --}}
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>

    {{-- Additional Animations Styles --}}
    <style>
        /* Hero Text Animations */
        @keyframes hero-slide-up {
            0% {
                opacity: 0;
                transform: translateY(80px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes hero-fade-in {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes hero-buttons-appear {
            0% {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .hero-text-slide-up {
            animation: hero-slide-up 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .hero-text-fade-in {
            animation: hero-fade-in 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .hero-buttons {
            animation: hero-buttons-appear 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        /* Other Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
        }

        @keyframes float-delayed {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-40px); }
        }

        @keyframes pulse-slow {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.1); }
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        @keyframes fade-in-down {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-float {
            animation: float 8s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float-delayed 10s ease-in-out infinite;
            animation-delay: 1s;
        }

        .animate-pulse-slow {
            animation: pulse-slow 6s ease-in-out infinite;
        }

        .animate-shimmer {
            animation: shimmer 3s ease-in-out infinite;
        }

        .animate-shimmer-delayed {
            animation: shimmer 3s ease-in-out infinite;
            animation-delay: 1.5s;
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.8s ease-out forwards;
        }

        .parallax-quote-bg {
            will-change: transform;
        }
    </style>

    {{-- Quote Parallax Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quoteSection = document.getElementById('quote-banner');
            const parallaxBg = quoteSection?.querySelector('.parallax-quote-bg');

            if (parallaxBg) {
                window.addEventListener('scroll', () => {
                    const rect = quoteSection.getBoundingClientRect();
                    const scrolled = window.pageYOffset;

                    // Only apply parallax when section is in view
                    if (rect.top < window.innerHeight && rect.bottom > 0) {
                        const rate = (scrolled - quoteSection.offsetTop) * 0.3;
                        parallaxBg.style.transform = `translateY(${rate}px)`;
                    }
                });
            }
        });
    </script>

    {{-- Custom Styles for Animations --}}
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
        }

        .scroll-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Apple-style backdrop blur */
        @supports (backdrop-filter: blur(20px)) or (-webkit-backdrop-filter: blur(20px)) {
            .backdrop-blur-apple {
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
            }
        }
    </style>

    {{-- Scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hero Slider
            const sliderContainer = document.getElementById('slider-container');
            const slideButtons = document.querySelectorAll('[data-slide]');
            let currentSlide = 0;
            const totalSlides = 3;
            let autoSlideInterval;

            function goToSlide(slideIndex) {
                currentSlide = slideIndex;
                const offset = -slideIndex * 100;
                sliderContainer.style.transform = `translateX(${offset}%)`;

                // Update active dot
                slideButtons.forEach((btn, index) => {
                    if (index === slideIndex) {
                        btn.classList.remove('bg-white/70');
                        btn.classList.add('bg-white');
                    } else {
                        btn.classList.remove('bg-white');
                        btn.classList.add('bg-white/70');
                    }
                });
            }

            function nextSlide() {
                const next = (currentSlide + 1) % totalSlides;
                goToSlide(next);
            }

            function startAutoSlide() {
                autoSlideInterval = setInterval(nextSlide, 5000); // Auto-slide every 5 seconds
            }

            function stopAutoSlide() {
                if (autoSlideInterval) {
                    clearInterval(autoSlideInterval);
                }
            }

            // Navigation dots click handlers
            slideButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    stopAutoSlide();
                    const slideIndex = parseInt(button.getAttribute('data-slide'));
                    goToSlide(slideIndex);
                    startAutoSlide(); // Restart auto-slide
                });
            });

            // Pause auto-slide on hover
            if (sliderContainer) {
                sliderContainer.addEventListener('mouseenter', stopAutoSlide);
                sliderContainer.addEventListener('mouseleave', startAutoSlide);
            }

            // Initialize
            goToSlide(0);
            startAutoSlide();

            // Parallax Effect for Hero
            const parallaxBg = document.getElementById('parallax-bg');
            if (parallaxBg) {
                window.addEventListener('scroll', () => {
                    const scrolled = window.pageYOffset;
                    const rate = scrolled * 0.5;
                    parallaxBg.style.transform = `translate3d(0, ${rate}px, 0) scale(1.1)`;
                });
            }

            // Scroll Reveal Animation
            const revealElements = document.querySelectorAll('.scroll-reveal');
            const revealOnScroll = () => {
                revealElements.forEach(el => {
                    const elementTop = el.getBoundingClientRect().top;
                    const elementBottom = el.getBoundingClientRect().bottom;
                    const isVisible = (elementTop < window.innerHeight - 100) && (elementBottom > 0);

                    if (isVisible) {
                        el.classList.add('revealed');
                    }
                });
            };

            window.addEventListener('scroll', revealOnScroll);
            revealOnScroll(); // Initial check

            // Video Modal
            const thumbnails = document.querySelectorAll('.video-thumbnail');
            const modal = document.getElementById('video-modal');
            const iframe = document.getElementById('video-iframe');
            const closeModal = document.getElementById('close-modal');

            if (thumbnails.length > 0 && modal && iframe && closeModal) {
                thumbnails.forEach(thumbnail => {
                    thumbnail.addEventListener('click', function() {
                        const videoId = this.getAttribute('data-video-id');
                        if (videoId) {
                            iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
                            modal.classList.remove('hidden');
                            modal.classList.add('flex');
                        }
                    });
                });

                function closeVideoModal() {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    iframe.src = '';
                }

                closeModal.addEventListener('click', closeVideoModal);
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeVideoModal();
                    }
                });

                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                        closeVideoModal();
                    }
                });
            }

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');
                    if (href !== '#' && href !== '#0') {
                        const target = document.querySelector(href);
                        if (target) {
                            e.preventDefault();
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    }
                });
            });
        });
    </script>
    {{-- Defer jQuery and lazy load YouTube iframes --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script>
        // Load YouTube iframes only when visible or clicked
        document.addEventListener('DOMContentLoaded', function() {
            // Lazy load YouTube iframes
            function loadYouTubeIframes() {
                const iframes = document.querySelectorAll('iframe[data-src]');
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const iframe = entry.target;
                            if (iframe.dataset.src) {
                                iframe.src = iframe.dataset.src;
                                iframe.removeAttribute('data-src');
                            }
                            observer.unobserve(iframe);
                        }
                    });
                }, { rootMargin: '50px' });
                
                iframes.forEach(iframe => observer.observe(iframe));
            }
            
            // Load main video when section is visible
            const mainVideo = document.getElementById('mainVideo');
            if (mainVideo && mainVideo.dataset.src) {
                const videoObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && mainVideo.dataset.src) {
                            mainVideo.src = mainVideo.dataset.src;
                            mainVideo.removeAttribute('data-src');
                            videoObserver.unobserve(mainVideo);
                        }
                    });
                }, { rootMargin: '200px' });
                videoObserver.observe(mainVideo);
            }
            
            // Load iframes in video gallery tabs when they become visible
            const videoTabs = document.querySelectorAll('.ytabs-tab');
            videoTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const targetId = this.dataset.target;
                    const targetSlider = document.getElementById(targetId);
                    if (targetSlider) {
                        setTimeout(() => {
                            const iframes = targetSlider.querySelectorAll('iframe[data-src]');
                            iframes.forEach(iframe => {
                                if (iframe.dataset.src) {
                                    iframe.src = iframe.dataset.src;
                                    iframe.removeAttribute('data-src');
                                }
                            });
                        }, 100);
                    }
                });
            });
            
            loadYouTubeIframes();
        });
        
        // Animation elements check - defer until jQuery loads
        window.addEventListener('load', function() {
            if (typeof jQuery !== 'undefined') {
                jQuery(document).ready(function () {
                  var $animationElements = jQuery(".animation-element");
                  var $window = jQuery(window);
                
                  function checkIfInView() {
                    var windowHeight = $window.height();
                    var windowTop = $window.scrollTop();
                    var windowBottom = windowTop + windowHeight;
                
                    jQuery.each($animationElements, function () {
                      var $element = jQuery(this);
                      var elementHeight = $element.outerHeight();
                      var elementTop = $element.offset().top;
                      var elementBottom = elementTop + elementHeight;
                
                      if (elementBottom >= windowTop && elementTop <= windowBottom) {
                        $element.addClass("in-view");
                      }
                    });
                  }
                
                  $window.on("scroll resize", checkIfInView);
                  $window.trigger("scroll");
                });
            }
        });
    </script>
    <script>
        // Historic Milestones JS
        const yearButtons = document.querySelectorAll(".milestone-slider-year");
        const slides = document.querySelectorAll(".milestone-slider-item");

        yearButtons.forEach((button, index) => {
            button.addEventListener("click", () => {
                // Remove active from all
                yearButtons.forEach(btn => btn.classList.remove("active"));
                slides.forEach(slide => slide.classList.remove("active"));

                // Activate current
                button.classList.add("active");
                slides[index].classList.add("active");
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
          const mainVideo = document.getElementById("mainVideo");
          const tag = document.querySelector(".featured .tag");
          const sideItems = document.querySelectorAll(".side-item");
        
          sideItems.forEach(item => {
            item.addEventListener("click", () => {
              // Get clicked video link & text
              const newVideo = item.getAttribute("data-video");
              const newText = item.querySelector("p").textContent;
        
              // Get current video src & text before swapping
              const oldVideo = mainVideo.src;
              const oldText = tag.textContent;
        
              // Swap: set clicked video to featured with autoplay
              mainVideo.src = `${newVideo}&autoplay=1`;
              tag.textContent = newText;
        
              // Replace clicked sidebar item with old video thumbnail + title
              const oldVideoId = oldVideo.split("/embed/")[1]?.split("?")[0];
              if (oldVideoId) {
                item.innerHTML = `
                  <img src="https://img.youtube.com/vi/${oldVideoId}/hqdefault.jpg" alt="">
                  <p>${oldText}</p>
                `;
                item.setAttribute("data-video", oldVideo);
              }
            });
          });
        });
    </script>
    <script>
        // Gallery JS
        document.addEventListener("DOMContentLoaded", () => {
          const tabs = document.querySelectorAll(".gallerysec-tab");
          const contents = document.querySelectorAll(".gallerysec-content");
        
          // Show only the active one on load
          contents.forEach(content => content.style.display = "none");
          document.querySelector(".gallerysec-content.gallerysec-show").style.display = "block";
        
          // Tab click handling
          tabs.forEach(tab => {
            tab.addEventListener("click", () => {
              tabs.forEach(t => t.classList.remove("gallerysec-active"));
              tab.classList.add("gallerysec-active");
        
              const target = tab.getAttribute("data-target");
              contents.forEach(content => {
                content.style.display = (content.id === target) ? "block" : "none";
              });
            });
          });
        });
    </script>
    <script>
        const yTabs = document.querySelectorAll(".ytabs-tab");
        const ySliders = document.querySelectorAll(".ytabs-slider");

        // Tab switching
        yTabs.forEach(tab => {
            tab.addEventListener("click", () => {
                yTabs.forEach(t => t.classList.remove("ytabs-active"));
                tab.classList.add("ytabs-active");

                ySliders.forEach(s => s.classList.remove("ytabs-show"));
                document.getElementById(tab.dataset.target).classList.add("ytabs-show");
            });
        });

        // Slider scroll and lazy load iframes
        ySliders.forEach(slider => {
            const track = slider.querySelector(".ytabs-track");
            const btn = slider.querySelector(".ytabs-next");
            let x = 0;

            // Load iframes when tab becomes visible
            function loadIframesInSlider() {
                const iframes = track.querySelectorAll('iframe[data-src]');
                iframes.forEach(iframe => {
                    if (iframe.dataset.src) {
                        iframe.src = iframe.dataset.src;
                        iframe.removeAttribute('data-src');
                    }
                });
            }

            btn.addEventListener("click", () => {
                const maxScroll = track.scrollWidth - slider.clientWidth;
                x += 300;
                if (x > maxScroll) x = 0;
                track.style.transform = `translateX(-${x}px)`;
            });
            
            // Load iframes when slider becomes visible
            if (slider.classList.contains('ytabs-show')) {
                loadIframesInSlider();
            }
        });
        
        // Load iframes when tab is clicked
        yTabs.forEach(tab => {
            tab.addEventListener("click", () => {
                const targetSlider = document.getElementById(tab.dataset.target);
                if (targetSlider) {
                    setTimeout(() => {
                        const iframes = targetSlider.querySelectorAll('iframe[data-src]');
                        iframes.forEach(iframe => {
                            if (iframe.dataset.src) {
                                iframe.src = iframe.dataset.src;
                                iframe.removeAttribute('data-src');
                            }
                        });
                    }, 100);
                }
            });
        });

        // Video Modal for Video Gallery tab
        // Ensure modal markup exists in the DOM
        let videoModal = document.getElementById('video-modal');
        let videoIframe = document.getElementById('video-iframe');
        let videoClose = document.getElementById('close-modal');

        // If modal markup doesn't exist, inject it
        if (!videoModal) {
            videoModal = document.createElement('div');
            videoModal.id = 'video-modal';
            videoModal.className = 'fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80 hidden';
            videoModal.innerHTML = `
                <div class="relative w-full max-w-2xl p-4">
                    <button id="close-modal" class="absolute top-2 right-2 text-white text-2xl">&times;</button>
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe id="video-iframe" width="560" height="315" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            `;
            document.body.appendChild(videoModal);
            videoIframe = document.getElementById('video-iframe');
            videoClose = document.getElementById('close-modal');
        }

        // Click handler for video items in Video Gallery tab
        function attachVideoClickHandlers() {
            document.querySelectorAll('#ytabs-yt img.video-thumbnail[data-video]').forEach(el => {
                el.addEventListener('click', function(e) {
                    e.preventDefault();
                    const embedUrl = this.getAttribute('data-video');
                    if (embedUrl && videoModal && videoIframe) {
                        videoIframe.src = embedUrl + '&autoplay=1';
                        videoModal.classList.remove('hidden');
                        videoModal.classList.add('flex');
                    }
                });
            });
        }
        
        // Attach handlers immediately and retry if elements not found
        if (document.querySelectorAll('#ytabs-yt img.video-thumbnail[data-video]').length > 0) {
            attachVideoClickHandlers();
        } else {
            // Retry after a short delay if DOM not ready
            setTimeout(attachVideoClickHandlers, 100);
        }

        // Close modal logic
        function closeVideoModal() {
            if (videoModal && videoIframe) {
                videoModal.classList.add('hidden');
                videoModal.classList.remove('flex');
                videoIframe.src = '';
            }
        }
        if (videoClose) {
            videoClose.addEventListener('click', closeVideoModal);
        }
        if (videoModal) {
            videoModal.addEventListener('click', function(e) {
                if (e.target === videoModal) {
                    closeVideoModal();
                }
            });
        }
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && videoModal && !videoModal.classList.contains('hidden')) {
                closeVideoModal();
            }
        });
    </script>
@endsection