<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'VCK - Viduthalai Chiruthaigal Katchi')</title>

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- PWA Meta Tags --}}
    <meta name="description" content="Official website of Viduthalai Chiruthaigal Katchi - Empowering the Marginalized, Fighting for Justice">
    <meta name="keywords" content="VCK, Viduthalai Chiruthaigal Katchi, Tamil Nadu Politics, Social Justice, Dalit Rights">
    <meta name="author" content="Viduthalai Chiruthaigal Katchi">
    <meta name="theme-color" content="#dc2626">
    <meta name="msapplication-TileColor" content="#dc2626">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="VCK">

    {{-- Web App Manifest --}}
    <link rel="manifest" href="/site.webmanifest">

    {{-- Favicons --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicons/favicon-16x16.png">
    <link rel="mask-icon" href="/assets/images/favicons/safari-pinned-tab.svg" color="#dc2626">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'VCK - Viduthalai Chiruthaigal Katchi')">
    <meta property="og:description" content="Official website of Viduthalai Chiruthaigal Katchi - Empowering the Marginalized, Fighting for Justice">
    <meta property="og:image" content="{{ url('/assets/images/about/vck-about.webp') }}">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'VCK - Viduthalai Chiruthaigal Katchi')">
    <meta property="twitter:description" content="Official website of Viduthalai Chiruthaigal Katchi - Empowering the Marginalized, Fighting for Justice">
    <meta property="twitter:image" content="{{ url('/assets/images/about/vck-about.webp') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Flowbite CSS --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    {{-- AOS CSS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    {{-- Google Fonts --}}
    
    <style>
        @font-face {
            font-family: 'Mukta Malar';
            font-style: normal;
            font-weight: 400;
            src: url('{{ asset('fonts/MuktaMalar-Regular.ttf') }}') format('truetype');
        }
        body {
            font-family: 'Mukta Malar', sans-serif;
        }
    </style>
    <style>
        .mukta-malar-extralight {
        font-family: "Mukta Malar", sans-serif;
        font-weight: 200;
        font-style: normal;
        }

        .mukta-malar-light {
        font-family: "Mukta Malar", sans-serif;
        font-weight: 300;
        font-style: normal;
        }

        .mukta-malar-regular {
        font-family: "Mukta Malar", sans-serif;
        font-weight: 400;
        font-style: normal;
        }

        .mukta-malar-medium {
        font-family: "Mukta Malar", sans-serif;
        font-weight: 500;
        font-style: normal;
        }

        .mukta-malar-semibold {
        font-family: "Mukta Malar", sans-serif;
        font-weight: 600;
        font-style: normal;
        }

        .mukta-malar-bold {
        font-family: "Mukta Malar", sans-serif;
        font-weight: 700;
        font-style: normal;
        }

        .mukta-malar-extrabold {
        font-family: "Mukta Malar", sans-serif;
        font-weight: 800;
        font-style: normal;
        }
    </style>

<style>
    /*----onscroll animation start-----*/
.in-view.anim-delay2 {
  -webkit-transition-delay: 0.4s !important;
}

.in-view.anim-delay3 {
  -webkit-transition-delay: 0.8s !important;
}

.in-view.anim-delay4 {
  -webkit-transition-delay: 1.2s !important;
}

.in-view.anim-delay5 {
  -webkit-transition-delay: 1.6s !important;
}

.in-view.anim-delay6 {
  -webkit-transition-delay: 2s !important;
}

.animation-element.slide-top {
  opacity: 0;
  transition: all 1000ms cubic-bezier(0.11, 0.16, 0.43, 0.86);
  -moz-transform: translate3d(0px, -60px, 0px);
  -webkit-transform: translate3d(0px, -60px, 0px);
  -o-transform: translate(0px, -60px);
  -ms-transform: translate(0px, -60px);
  transform: translate3d(0px, -60px, 0px);
}

.animation-element.fadein {
  opacity: 0;
  transition: all 1000ms cubic-bezier(0.11, 0.16, 0.43, 0.86);
}

.animation-element.slide-bottom {
  opacity: 0;
  transition: all 1000ms cubic-bezier(0.11, 0.16, 0.43, 0.86);
  -moz-transform: translate3d(0px, 60px, 0px);
  -webkit-transform: translate3d(0px, 60px, 0px);
  -o-transform: translate(0px, 60px);
  -ms-transform: translate(0px, 60px);
  transform: translate3d(0px, 60px, 0px);
}

.animation-element.slide-left {
  opacity: 0;
  transition: all 1000ms cubic-bezier(0.11, 0.16, 0.43, 0.86);
  -moz-transform: translate3d(-50px, 0, 0);
  -webkit-transform: translate3d(-50px, 0, 0);
  -o-transform: translate(-50px, 0);
  -ms-transform: translate(-50px, 0);
  transform: translate3d(-50px, 0, 0);
}

.animation-element.slide-right {
  opacity: 0;
  transition: all 1000ms cubic-bezier(0.11, 0.16, 0.43, 0.86);
  -moz-transform: translate3d(50px, 0, 0);
  -webkit-transform: translate3d(50px, 0, 0);
  -o-transform: translate(50px, 0);
  -ms-transform: translate(50px, 0);
  transform: translate3d(50px, 0, 0);
}

.animation-element.slide-left.in-view,
.animation-element.slide-top.in-view,
.animation-element.slide-right.in-view,
.animation-element.slide-bottom.in-view,
.animation-element.fadein.in-view {
  opacity: 1;
  -moz-transform: translate3d(0px, 0px, 0px);
  -webkit-transform: translate3d(0px, 0px, 0px);
  -o-transform: translate(0px, 0px);
  -ms-transform: translate(0px, 0px);
  transform: translate3d(0px, 0px, 0px);
}

.events-wrap{
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    /* max-height: 300px; */
    overflow: hidden;
    align-items: stretch;
    justify-content: flex-end;
}
.container {
  
max-width: 1200px;
  
margin: 50px auto;
  
gap: 40px;
}

.column {
  flex: 1;
}

.column.left, .column.right {
  max-width: 300px;
  padding-right: 30px;
  overflow-y: auto;
  max-height: 570px;
}
section.events h3 {font-family: "Titillium Web", sans-serif;font-weight: 600;font-style: normal;line-height: 30px;font-size: 20px;}

section.events p {
    font-family: "Titillium Web", sans-serif;
    font-weight: 400;
    font-style: normal;
    color: #222222;
    opacity: 0.7;
    font-size: 14px;
}
.column.center {
  /* width: 50%; */
  text-align: left;
  /* align-self: end; */
}

h2 {
  font-size: 1rem;
  font-weight: 700;
  margin-bottom: 20px;
  text-transform: uppercase;
  color: #111;
}

.card {
  margin-bottom: 25px;
}

.meta {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 5px;
}

.tag {
  font-size: 0.7rem;
  padding: 2px 8px;
  border-radius: 3px;
  color: #fff;
}

.tech { background: #DD3030; }         /* red */
.entertainment { background: #DD3030; } /* darker red */
.business { background: #DD3030; }      /* orange */
.politics { background: #DD3030; }      /* deep orange */
.health { background: #DD3030; }        /* red again for consistency */

.date {
  font-size: 0.7rem;
  color: #DD3030;
}

h3 {
  font-size: 0.9rem;
  margin: 5px 0;
}

p {
  font-size: 0.8rem;
  color: #555;
  line-height: 1.4;
}

.featured {
  background: #d9d9d9;
  padding: 40px;
  border-radius: 6px;
  text-align: left;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
}

.featured h2 {
  font-size: 1.1rem;
  color: #fff;
  margin: 10px 0;
}

.featured p {
  font-size: 0.85rem;
  color: #fff !important;
  opacity: 0.7 !important;
}
/* === Amaippai Thiralvom Section === */

.amaippai-wrapper {
  background: #f4f4f4;
  padding: 20px 60px;
  font-family: "Inter", sans-serif;
  color: #222;
}

/* Top quote area layout */
.amaippai-quote-area {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 40px;
  margin-bottom: 60px;
}

.amaippai-quote-left {
  flex: 1 1 65%;
}

.amaippai-quote-right {
  flex: 1 1 25%;
  text-align: right;
}

.amaippai-book-wrapper {
  position: relative;
  display: inline-block;
  overflow: hidden;
  border-radius: 12px;
}

.amaippai-image {
  width: 320px;
  border-radius: 12px;
  transition: transform 0.3s ease, filter 0.3s ease;
  display: block;
}

.amaippai-book-wrapper:hover .amaippai-image {
  transform: scale(1.05);
  filter: blur(2px);
}

.amaippai-book-wrapper .amaippai-img-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
  border-radius: 12px;
}

.amaippai-book-wrapper:hover .amaippai-img-overlay {
  opacity: 1;
}

.amaippai-book-wrapper .amaippai-buy-btn {
  transform: translateY(10px);
  opacity: 0;
}

.amaippai-book-wrapper:hover .amaippai-buy-btn {
  transform: translateY(0);
  opacity: 1;
}

/* Title */
.amaippai-title {
  font-size: 2rem;
  font-weight: 700;
  color: #000;
  margin-bottom: 25px;
  text-align: center;
  text-transform:capitalize;
}

/* Quote text */
.amaippai-quote-block {
  position: relative;
  /* margin-left: 40px; */
}

.amaippai-quote-mark {
  font-size: 4rem;
  color: #e07a7a;
  position: absolute;
  left: -40px;
  top: -10px;
}

.amaippai-quote-text {
  font-size: 40px;
  line-height: 1.4;
  color: #222222;
  margin: 0;
  /* max-width: 600px; */
  font-family: 'Titillium Web';
  font-weight: 500;
  padding-left: 100px;
}

/* Author */
.amaippai-author {
  color: #DD3030;
  font-weight: 600;
  margin-top: 20px;
  margin-left: 40px;
  font-size: 30px;
  text-align: end;
}

/* === News cards below === */
.amaippai-news-card {
    display: flex;
    gap: 10px;
}
.amaippai-news-row {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 10px;
}

.amaippai-news-card {
  width: 23%;
}

.amaippai-img-wrapper {
  position: relative;
  width: 129px;
  height: 136px;
  overflow: hidden;
  border-radius: 6px;
}

.amaippai-news-img {
  width: 100%;
  height: 100%;
  border-radius: 6px;
  object-fit: cover;
  transition: transform 0.3s ease, filter 0.3s ease;
}

.amaippai-img-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
  border-radius: 6px;
}

.amaippai-img-wrapper:hover .amaippai-img-overlay {
  opacity: 1;
}

.amaippai-img-wrapper:hover .amaippai-news-img {
  transform: scale(1.1);
  filter: blur(2px);
}

.amaippai-buy-btn {
  background: #DD3030;
  color: #fff;
  padding: 10px 20px;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 600;
  font-size: 14px;
  transition: all 0.3s ease;
  transform: translateY(10px);
  opacity: 0;
}

.amaippai-img-wrapper:hover .amaippai-buy-btn {
  transform: translateY(0);
  opacity: 1;
}

.amaippai-buy-btn:hover {
  background: #c02929;
  transform: translateY(0) scale(1.05);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.amaippai-news-meta {
  /* display: flex; */
  gap: 10px;
  align-items: center;
  margin-top: 8px;
}

.amaippai-news-tag {
  font-size: 14px;
  padding: 4px 6px;
  border-radius: 3px;
  color: #fff;
  font-weight: 500;
}

.amaippai-health { color: #DD3030; }
.amaippai-entertainment { color: #DD3030; }
.amaippai-politics { color: #DD3030; }

.amaippai-news-date {
  font-size: 0.8rem;
  color: #222222;
  opacity: 0.5;
}

.amaippai-news-title {
  font-size: 14px;
  color: #222;
  font-weight: 500;
  line-height: 1.4;
  margin-top: 5px;
}

/* Responsive layout */
@media (max-width: 900px) {
  .amaippai-quote-area {
    flex-direction: column;
    text-align: center;
    gap: 10px;
  }

  .amaippai-quote-right {
    text-align: center;
    margin-top: 30px;
  }

  .amaippai-image {
    width: 250px;
  }

  .amaippai-news-row {
    flex-direction: column;
    align-items: center;
  }

  .amaippai-news-card {
    width: 90%;
  }
}



section.members-section {
    background-image: url({{ asset('assets/images/images/members-bg.png') }});
    background-size: cover;
    padding: 10px 0;
}
.members-wrap h2 {
    text-transform: capitalize;
    font-size: 30px;
    text-align: center;
    padding-bottom: 20px;
}

.members-top-row {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 60px;
}

.s-member-wrap {
    width: 23%;
}
.s-member-wrap:hover .member-cont{
    background-color:#d92526;
    box-shadow: 0px 4px 5px 2px rgba(0, 0, 0, 0.25);
}
.members-bottom-row {
    display: flex;
    justify-content: center;
    gap: 20px;
}
.member-img {
    text-align: center;
}
.member-img img{
    margin:auto;
}
.member-cont {
    background: #006A9C;
    border-radius: 5px;
    text-align: center;
    padding: 5px 10px 6px;
    color: #fff;
    transition:all 0.5s ease;
}
.member-cont h6 {
    font-size: 20px;
    margin: 0;
    font-weight:900;
    /* line-height: 30px; */
}
.member-cont span {
  color: #D0D0D0;
  display: block;
  margin-bottom:8px;
}
.members-s-media {
    display: flex;
    justify-content: center;
    align-items:center;
    gap: 14px;
}

/* === Historic Milestones Slider === */

.milestone-slider-section {
  background-image: url({{ asset('assets/images/images/milestone-bg.png') }});
  background-size: cover;
  padding: 80px 60px;
  text-align: center;
  font-family: "Inter", sans-serif;
  color: #222;
}

.milestone-slider-title {
  font-size: 2.0rem;
  font-weight: 700;
  margin-bottom: 40px;
  color: #111;
  text-transform: capitalize;
}

/* Timeline years (buttons) */
.milestone-slider-years {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 35px;
  flex-wrap: wrap;
  margin-bottom: 40px;
}

.milestone-slider-year {
  background: transparent;
  border: none;
  color: #777;
  font-size: 1rem;
  padding: 6px 14px;
  border-radius: 30px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.milestone-slider-year.active {
  color: #007bff;
  border: 1px solid #007bff;
  background-color: rgba(0, 123, 255, 0.1);
  font-weight: 600;
}

/* Slider content */
.milestone-slider-content {
  max-width: 700px;
  margin: 0 auto;
  position: relative;
}

.milestone-slider-item {
  display: none;
  animation: fadeIn 0.5s ease-in-out;
}

.milestone-slider-item.active {
  display: block;
}

.milestone-slider-image {
  width: 100%;
  border-radius: 8px;
  margin-bottom: 20px;
}

.milestone-slider-caption {
  font-size: 1rem;
  font-weight: 600;
  color: #111;
  margin-bottom: 10px;
}

.milestone-slider-text {
  font-size: 20px;
  color: #222222;
  line-height: 1.6;
  margin: 0 auto;
  max-width: 650px;
}

/* Animation */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsive */
@media (max-width: 768px) {
  .milestone-slider-section {
    padding: 30px 20px;
  }

  .milestone-slider-years {
    gap: 20px;
  }

  .milestone-slider-text {
    font-size: 0.9rem;
  }
}


.exclusive-section .container {
  display: flex;
  background: #fff;
  overflow: hidden;
  align-items: stretch;
  gap: 20px;
  justify-content: space-between;
}

.exclusive-section .featured {
  position: relative;
  width: 60%;
}

.exclusive-section .featured img {
  width: auto;
  /* height: 600px; */
  display: block;
}

.exclusive-section .play-btn {
  position: absolute;
  left: 30px;
  bottom: 30px;
  background: #d91921;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.exclusive-section .play-btn::before {
  content: "";
  color: white;
  font-size: 20px;
}

.exclusive-section .tag {
  position: absolute;
  bottom: 0;
  left: 0;
  background: #d91921;
  color: white;
  padding: 14px 20px;
  font-size: 20px;
  width: 220px;
  font-weight: bold;
}

.exclusive-section .sidebar {
  width: 40%;
  /*padding: 15px;*/
}

.exclusive-section .side-item {
  display: flex;
  margin-bottom: 15px;
  gap: 10px;
  justify-content: center;
  align-items: start;
}

.exclusive-section .side-item img {
  width: auto;
  height: auto;
  object-fit: cover;
  max-width: 172px;
}

.exclusive-section .side-item p {
  font-size: 16px;
  margin: 0;
  font-family: 'Titillium Web';
  font-weight: 600;
  width:100%;
}
section.exclusive-section .featured {
    padding: 0;
    background: #fff;
}
.orgsec-container {
  display: flex;
  text-align: center;
  padding: 40px 0;
  background-image: url({{ asset('assets/images/images/tab-bg.png') }});
}

.orgsec-title,
.orgsec-subtitle {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 30px;
  text-transform: capitalize;
  padding-top: 60px;
}
.orgsec-icons img {width: auto;}
.orgsec-card-wrapper {
  display: flex;
  justify-content: center;
  gap: 25px;
  margin-bottom: 50px;
  margin: 0 auto;
}

.orgsec-card {
  width: 230px;
  background: #fff;
  padding: 25px;
  border-radius: 15px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.08);
  text-align: left;
  transition: all 0.5s ease;
  transform: translateY(0);
}
.orgsec-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
}
.orgsec-icon {
  /* width: 50px; */
  margin-bottom: 12px;
  height: 100px;
}

.orgsec-card-title {
  margin: 0 0 10px;
  font-weight: bold;
  font-size: 32px;
}

.orgsec-desc {
  font-size: 16px;
  line-height: 24px;
  color: #363636;
}

.orgsec-tabs {
  display: flex;
  justify-content: center;
  border-radius: 50px;
  overflow: hidden;
  margin-bottom: 30px;
  width: 100%;
  max-width: 80%;
  margin: 0 auto;
}

.orgsec-tab {
  padding: 15px 30px;
  font-size: 13px;
  font-weight: bold;
  color: #fff;
  white-space: nowrap;
  width: 25%;
}

.orgsec-blue { background: #005da8; }
.orgsec-red { background: #d92526; }
.orgsec-active { background: #012b6d; }

.orgsec-icons {
  display: flex;
  justify-content: space-around;
  gap: 60px;
  width: 100%;
  max-width: 80%;
  margin: 0 auto;
}

.gallerysec-container {
  text-align: center;
  padding: 10px 0;
}

.gallerysec-title {
  font-size: 30px;
  margin-bottom: 8px;
  font-weight: bold;
}

.gallerysec-subtitle {
  font-size: 14px;
  margin-bottom: 30px;
  font-weight: bold;
  color: #1B263B;
}

.gallerysec-tabs {
  margin-bottom: 35px;
}

.gallerysec-tab {
  border: none;
  background: transparent;
  font-size: 12px;
  margin: 0 12px;
  padding-bottom: 5px;
  cursor: pointer;
  opacity: .7;
  text-transform: uppercase;
  letter-spacing: .5px;
  color: #6E6E6E;
}

.gallerysec-active {
  opacity: 1;
  border-bottom: 2px solid #000;
  color: #415A77;
}

.gallerysec-content {
  display: none;
}
.gallerysec-content.gallerysec-show {
  display: block;
}

.ytabs-container {
  width: 100%;
}

.ytabs-tabs {
  display: flex;
  gap: 35px;
  margin-bottom: 25px;
}

.ytabs-tab {
  font-size: 18px;
  opacity: 0.5;
  cursor: pointer;
  border-bottom: 2px solid transparent;
}

.ytabs-active {
  opacity: 1 !important;
  border-color: #d91d29;
}

.ytabs-slider {
  position: relative;
  width: 100%;
  overflow: hidden;
  display: none;
}

.ytabs-show {
  display: block;
}

.ytabs-track {
  display: flex;
  gap: 15px;
  transition: transform 0.4s ease;
}

.ytabs-track img {
  width: 280px;
  height: 170px;
  object-fit: cover;
  border-radius: 6px;
}

.ytabs-next {
  position: absolute;
  right: 0;
  top: 40%;
  background: #d91d29;
  color: #fff;
  width: 35px;
  height: 40px;
  border-radius: 4px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 24px;
  cursor: pointer;
  opacity: .8;
}


@media (max-width: 600px) {
  .ytabs-track img {
    width: 200px;
    height: 130px;
  }
  .ytabs-tabs {
    flex-wrap: wrap;
    gap: 15px;
  }
}

.footer {
  background: #b91c1c;
  border-radius: 20px;
  width: 80%;
  margin: 80px auto 0px;
  padding: 10px 60px;
  /* box-shadow: 0 0 60px rgba(0, 0, 0, 0.6); */
}

.footer-inner {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 50px;
}

.footer-left {
  flex: 1.2;
}

.footer-left h2 {
  font-size: 56px;
  font-weight: 700;
  line-height: 1.1;
  color: #fff;
}

.footer-left h2 span {
  color: #fff;
}

.footer-left p {
  margin: 25px 0 40px;
  font-size: 15px;
  color: #b5b5b5;
  max-width: 400px;
}

.subscribe-box {
  display: flex;
  margin-bottom: 30px;
}

.subscribe-box input {
  flex: 1;
  padding: 16px;
  border: none;
  outline: none;
  border-radius: 8px 0 0 8px;
  font-size: 15px;
  background: #f7f7f7;
  color: #333;
}

.subscribe-box button {
  background: #0073b1;
  color: #fff;
  border: none;
  padding: 0 30px;
  border-radius: 0 8px 8px 0;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
}

.subscribe-box button:hover {
  background: #0082ca;
}

.social-icons a {
  display: inline-block;
  color: #fff;
  font-size: 18px;
  margin-right: 15px;
  transition: color 0.3s;
}
section.footer-bg {
    background: #dc2626;
    padding: 10px 0;
    color: #fff;
}
.social-icons a:hover {
  color: #0082ca;
}

.footer-right {
  display: flex;
  flex-direction: column;
  gap: 40px;
}
.footer-column{
  display: flex;
  gap: 30px;
}
.footer-column-inner h4 {
  font-size: 20px;
  margin-bottom: 20px;
  font-weight: 600;
}

.footer-column-inner ul {
  list-style: none;
}

.footer-column-inner li {
  margin-bottom: 10px;
}

.footer-column-inner li a {
  text-decoration: none;
  color: #ccc;
  font-size: 15px;
  display: inline-flex;
  align-items: center;
  transition: color 0.3s;
}

.footer-column-inner li a span {
  color: #000;
  margin-right: 8px;
  font-size: 8px;
  background: #006A9C;
  border-radius: 50%;
  width: 14px;
  height: 14px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.footer-column-inner li a:hover {
  color: #fff;
}

.footer-contact {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  border-top: 1px solid #991b1b;
  /* margin-top: 50px; */
  padding-top: 30px;
  gap: 100px;
}

.contact-item {
  display: flex;
  align-items: center;
  gap: 20px;
}

.icon {
  width: 55px;
  height: 55px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: #7f1d1d;
  font-size: 24px;
}

.contact-item h5 {
  font-size: 16px;
  margin-bottom: 6px;
}

.contact-item p {
  color: #ccc;
  font-size: 15px;
}

.contact-item p a {
  color: #ccc;
  text-decoration: none;
}

.contact-item p a:hover {
  color: #0082ca;
}

.footer-bottom {
  text-align: center;
  font-size: 14px;
  color: #fff;
  margin-top:20px;
}

.footer-bottom p {
  color: #fff;
}
.footer-column-inner ul {
    padding: 0;
}
.social-icons {
    display: flex;
}
.social-icons p {
  margin: 0;
}
.orgsec-icons > div {
    display: none;
}
section.events ::-webkit-scrollbar-button {
  display: none;
}
/* Scrollbar styling example */
section.events ::-webkit-scrollbar {
  width: 5px;
}

section.events ::-webkit-scrollbar-track {
  background: #f1f1f1;
}

section.events ::-webkit-scrollbar-thumb {
  background: #9a9a9a;
  border-radius: 5px;
}

/* Remove only arrows */
section.events ::-webkit-scrollbar-button {
  display: none;
}

/*New Style*/
.grid1 { grid-area: grid1; }
.grid2 { grid-area: grid2; }
.grid3 { grid-area: grid3; }
.grid4 { grid-area: grid4; }
.grid5 { grid-area: grid5; }
.grid6 { grid-area: grid6; }
    .grid-container{
        display:grid;
        grid-template-areas:
          'grid1 grid1 grid2 grid2 grid3 grid3 grid3 grid3'
          'grid4 grid4 grid4 grid5 grid5 grid6 grid6 grid6';
        gap:10px;
        
    }
.grid-container .grid-item {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 5px;
}
.events-wrap.container h2 {
  font-size: 32px;
  font-weight: 700;
  color: #222;
}
.events-wrap.container .featured h2{
    color:#fff;
}

@media screen and (max-width: 991px) {
      footer.footer {
        padding: 10px;
    }
    
    .contact-item {
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        gap: 0px;
        margin-bottom: 20px;
    }
    
    
    .orgsec-icons img {
        width: 150px;
        margin-inline: auto;
    }
    
    p.amaippai-quote-text {
        padding: 0;
        font-size: 24px;
    }
    
    p.amaippai-author {
        text-align: center;
        margin: 20px 0 0;
        font-size: 18px;
    }
    section {
        overflow: hidden;
    }
    .members-wrap h2 {
        font-size: 24px;
    }
    .container{
        padding: 0 3vw;
    }
    .events-wrap{
        flex-direction: column;
    }
    .column.left, .column.right{
        width: 100%;
        max-height: max-content;
    }
    .column.center{
        width: 100%;
    }
    .amaippai-wrapper{
        padding: 20px 3vw;
    }
    .amaippai-quote-block{
        margin: 0;
    }
    .members-top-row {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }
    .s-member-wrap{
        width: 100%;
    }
    .members-bottom-row{
        flex-direction: column;
    }
    .exclusive-section .container{
        flex-direction: column;
    }
    .exclusive-section .featured,.exclusive-section .sidebar{
        width: 100%;
    }
    .orgsec-card-wrapper{
        flex-direction: column;
        align-items: center;
    }
    .orgsec-tabs {
        flex-direction: column;
        align-items: center;
    }
    .orgsec-tab {
        width: 100%;
    }
    .orgsec-icons {
        flex-direction: column;
        gap: 0;
    }
    .gallerysec-tab {
        display: block;
        margin: auto;
    }
    .grid-item {
      width: 100%;
    }
    .gallerysec-container{
      padding: 0px ;
    }
    .ytabs-tab {
      width: max-content;
    }
    .footer-left h2{
      font-size: 32px;
    }
    .footer-column{
      flex-direction: column;
    }
    .footer-contact {
      flex-direction: column;
      gap: 20px;
      align-items: start;
    }
    .footer-left {
        flex: 1 1 100%; /* let it take full width */
        width: 100%;    /* ensure 100% width */
      }
      .subscribe-box input {
      width: 70%;
    }
    .subscribe-box button {
      width: 30%;
      font-size: 14px;
      padding: 8px;
      flex: 1;
    }
    .footer-inner{
      gap: 0;
    
    }
    .orgsec-icons > div {
        display: block;
    }
    .orgsec-tabs {
        display: none;
    }
    .grid-container {
      display: flex;
      flex-direction: column;
    }
}

.slick-list {
    overflow: visible;
    -webkit-clip-path: inset(-100vw -100vw -100vw 0);
    clip-path: inset(-100vw -100vw -100vw 0);
}
.scroll-reveal.revealed.left-content{
    background-color:#D9D9D9;
    padding:50px 48px;
    border-radius:10px;
    margin-bottom:20px;
}
.scroll-reveal.revealed.right-img img{
    bottom:-40px;
}
</style>
</head>
<body class="bg-white text-gray-800">

    {{-- Navbar --}}
    @include('layouts.partials.navbar')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.partials.footer')

    {{-- Flowbite JS --}}

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    {{-- AOS JS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Slider
            const container = document.getElementById('slider-container');
            const dots = document.querySelectorAll('[data-slide]');
            let current = 0;
            const total = 3;

            function goToSlide(index) {
                current = index;
                container.style.transform = `translateX(-${current * 100}%)`;
                dots.forEach((dot, i) => {
                    dot.classList.toggle('bg-blue-600', i === current);
                    dot.classList.toggle('opacity-100', i === current);
                    if (i !== current) dot.classList.add('opacity-50');
                });
            }

            setInterval(() => goToSlide((current + 1) % total), 5000);
            dots.forEach((dot, i) => dot.addEventListener('click', () => goToSlide(i)));

            // News Tabs
            const newsTabButtons = document.querySelectorAll('[data-tabs-toggle="#news-content"] button');
            const newsTabContents = {
                '#latest-news': document.getElementById('latest-news'),
                '#press-releases': document.getElementById('press-releases'),
                '#events-news': document.getElementById('events-news')
            };

            newsTabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active from all buttons
                    newsTabButtons.forEach(btn => {
                        btn.classList.remove('pb-3', 'border-b-2', 'border-blue-600', 'text-blue-600');
                        btn.classList.add('pb-3', 'hover:text-gray-600');
                    });
                    // Add active to clicked
                    button.classList.remove('hover:text-gray-600');
                    button.classList.add('border-b-2', 'border-blue-600', 'text-blue-600');
                    // Hide all contents
                    Object.values(newsTabContents).forEach(content => content.classList.add('hidden'));
                    // Show target
                    const target = button.getAttribute('data-tabs-target');
                    if (newsTabContents[target]) {
                        newsTabContents[target].classList.remove('hidden');
                    }
                });
            });

            // Timeline Tabs
            const timelineTabButtons = document.querySelectorAll('#timeline button[data-tab]');
            const timelineTabContents = document.querySelectorAll('.tab-content');

            timelineTabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active from all buttons
                    timelineTabButtons.forEach(btn => {
                        btn.classList.remove('bg-blue-600', 'text-white');
                        btn.classList.add('bg-gray-200', 'hover:bg-gray-300');
                    });
                    // Add active to clicked
                    button.classList.add('bg-blue-600', 'text-white');
                    button.classList.remove('bg-gray-200', 'hover:bg-gray-300');
                    // Hide all contents
                    timelineTabContents.forEach(content => content.classList.add('hidden'));
                    // Show target
                    const tab = button.getAttribute('data-tab');
                    const targetContent = document.querySelector(`.tab-content[data-tab="${tab}"]`);
                    if (targetContent) {
                        targetContent.classList.remove('hidden');
                    }
                });
            });

            // Dropdown Menus
            window.toggleDropdown = function(id) {
                const menu = document.getElementById(id);
                const isHidden = menu.classList.contains('hidden');
                // Hide all dropdown menus
                document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
                // Toggle the clicked one
                if (isHidden) {
                    menu.classList.remove('hidden');
                }
            };

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.relative')) {
                    document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
                }
            });
        });
    </script>

    {{-- Page-specific scripts --}}
    @stack('scripts')

    {{-- PWA Service Worker Registration --}}
    <script>
        // Register service worker
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js')
                    .then(function(registration) {
                        console.log('[PWA] ServiceWorker registration successful with scope: ', registration.scope);

                        // Handle updates
                        registration.addEventListener('updatefound', function() {
                            const newWorker = registration.installing;
                            newWorker.addEventListener('statechange', function() {
                                if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
                                    // New content is available, notify user
                                    if (confirm('New content is available! Reload to get the latest version?')) {
                                        window.location.reload();
                                    }
                                }
                            });
                        });
                    })
                    .catch(function(error) {
                        console.log('[PWA] ServiceWorker registration failed: ', error);
                    });
            });
        }

        // Handle PWA install prompt
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', function(e) {
            console.log('[PWA] beforeinstallprompt event fired');
            e.preventDefault();
            deferredPrompt = e;

            // Show custom install button or notification
            showInstallPrompt();
        });

        function showInstallPrompt() {
            // Create and show install prompt
            const installPrompt = document.createElement('div');
            installPrompt.id = 'install-prompt';
            installPrompt.className = 'fixed bottom-4 right-4 bg-blue-600 text-white p-4 rounded-lg shadow-lg z-50 max-w-sm';
            installPrompt.innerHTML = `
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="font-bold text-lg mb-2">Install VCK App</h3>
                        <p class="text-sm mb-3">Get the full VCK experience with offline access and notifications.</p>
                        <div class="flex space-x-2">
                            <button onclick="installPWA()" class="bg-white text-blue-600 px-4 py-2 rounded font-medium hover:bg-gray-100 transition-colors">
                                Install
                            </button>
                            <button onclick="dismissInstallPrompt()" class="text-blue-200 hover:text-white px-4 py-2 rounded transition-colors">
                                Later
                            </button>
                        </div>
                    </div>
                    <button onclick="dismissInstallPrompt()" class="text-blue-200 hover:text-white ml-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            `;
            document.body.appendChild(installPrompt);
        }

        function installPWA() {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then(function(choiceResult) {
                    console.log('[PWA] User choice:', choiceResult.outcome);
                    deferredPrompt = null;
                    dismissInstallPrompt();
                });
            }
        }

        function dismissInstallPrompt() {
            const prompt = document.getElementById('install-prompt');
            if (prompt) {
                prompt.remove();
            }
        }

        // Handle successful app installation
        window.addEventListener('appinstalled', function(evt) {
            console.log('[PWA] App was installed');
            dismissInstallPrompt();
        });

        // Network status monitoring
        function updateNetworkStatus() {
            const isOnline = navigator.onLine;
            console.log('[PWA] Network status changed:', isOnline ? 'online' : 'offline');
        }

        window.addEventListener('online', updateNetworkStatus);
        window.addEventListener('offline', updateNetworkStatus);

        // Initial network status
        updateNetworkStatus();
    </script>
</body>
</html>