# VCK Design System

## Overview
This design system documentation is based on the **latest-news.blade.php** page implementation, which represents the current design standards for the VCK website. The system features animated gradient borders, smooth micro-interactions, and a cohesive blue-red color theming built on Tailwind CSS.

**Reference Implementation:** [resources/views/pages/latest-news.blade.php](resources/views/pages/latest-news.blade.php)

## Key Design Patterns from Latest News Page

### Card Structure
- **Background**: Solid `bg-white dark:bg-gray-800` (not gradient)
- **Content Area**: Gradient `from-blue-50/50 to-red-50/50`
- **Border**: `border-blue-100 dark:border-blue-900/30`
- **Padding**: `p-6` for content (not `p-8`)
- **Image**: Fixed `h-60` with hover scale

### Section Layout
- **Background**: `bg-gray-100 dark:bg-gray-900`
- **Padding**: `py-20 lg:py-28 px-4`
- **Grid**: `grid-cols-1 sm:grid-cols-2 lg:grid-cols-3`
- **Gap**: `gap-8 lg:gap-12`

### Animations
- **Delays**: Calculated as `($index % 3) * 100`
- **Card Hover**: `duration-500` for lift and shadow
- **Image Scale**: `duration-700` for smooth effect
- **Link Hover**: `duration-300` for quick feedback

### Special Features
- **Date Badge**: Nested gradient glow with `blur-md opacity-75`
- **Gradient Overlay**: Appears on image hover
- **Line Clamping**: Title `line-clamp-2`, excerpt `line-clamp-3`
- **CTA Separator**: `pt-4 border-t` before read more link
- **Empty State**: Gradient border card with call-to-action
- **Pagination**: Border-top separator with centered layout

## Table of Contents
1. [Design Principles](#design-principles)
2. [Color System](#color-system)
3. [Card Components](#card-components)
4. [Section Layouts](#section-layouts)
5. [Typography](#typography)
6. [Animations & Effects](#animations--effects)
7. [Empty States](#empty-states)
8. [Usage Examples](#usage-examples)

---

## Design Principles

### Core Design Language (Based on Latest News Page)
- **Animated Gradient Borders**: Glowing borders that appear on hover with blur effects
- **Blue-Red Theme**: Consistent use of `from-blue-500 to-red-500` gradients
- **Double-Layer Cards**: Outer gradient border + inner content card
- **Smooth Transitions**: All interactions use `transition-all duration-500`
- **Dark Mode Support**: Full support for light and dark themes
- **AOS Animations**: Scroll-triggered animations with staggered delays (100ms increments)
- **Content Sections**: Sections use `py-20 lg:py-28` padding with `bg-gray-100 dark:bg-gray-900`

### Visual Hierarchy
1. **Page Headers**: Simple component pattern using `<x-page-header-simple>`
2. **Section Padding**: `py-20 lg:py-28` for main content sections
3. **Cards**: Rounded corners (`rounded-3xl`), padding (`p-6`), gradient borders
4. **Featured Images**: Fixed height (`h-60`) with hover scale effects
5. **CTAs**: Inline-flex with animated arrows and group hover effects

---

## Color System

### Primary Theme: Blue-Red

This is the **official VCK color scheme** used throughout the entire website. The blue-red combination represents:
- **Blue**: Working People's Liberation (நீலம் - உழைக்கும் மக்கள் விடுதலை)
- **Red**: Liberation & Justice (சிவப்பு - விடுதலை மற்றும் நீதி)
- **Yellow** (accent): Equality & Hope (மஞ்சள் - சமத்துவம் மற்றும் நம்பிக்கை)

All components, cards, sections, and UI elements should follow this color scheme for consistency.

#### CSS Custom Properties

The design system defines the following color variables in `app.css`:

```css
/* Primary: Blue (Working People's Liberation) */
--color-primary: #3b82f6; /* blue-500 */
--color-primary-light: #60a5fa; /* blue-400 */
--color-primary-dark: #2563eb; /* blue-600 */

/* Secondary: Red (Liberation & Justice) */
--color-secondary: #dc2626; /* red-600 */
--color-secondary-light: #ef4444; /* red-500 */
--color-secondary-dark: #991b1b; /* red-700 */

/* Accent: Yellow (Equality & Hope) */
--color-accent: #fbbf24; /* yellow-500 */
--color-accent-light: #fcd34d; /* yellow-400 */
--color-accent-dark: #f59e0b; /* yellow-600 */
```

#### Gradient Combinations

**Border Gradient (Primary Pattern):**
```html
<div class="bg-gradient-to-r from-blue-600 to-red-600"></div>
```

**Card Background (Light Mode):**
```html
<div class="bg-gradient-to-br from-blue-50 to-red-50"></div>
```

**Card Background (Dark Mode):**
```html
<div class="dark:from-blue-950/30 dark:to-red-950/30"></div>
```

**Section Background:**
```html
<section class="bg-gradient-to-br from-blue-50 via-white to-red-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30">
```

**Border Colors:**
```html
<div class="border-blue-200 dark:border-blue-800"></div>
```

**Text Colors:**
```html
<!-- Headings (Strong Blue) -->
<h3 class="text-blue-900 dark:text-blue-100"></h3>

<!-- Body text (Subtle Blue with opacity) -->
<p class="text-blue-700/80 dark:text-blue-200/70"></p>

<!-- Links/CTAs (Blue in light, Red accent in dark) -->
<a class="text-blue-600 dark:text-red-600 group-hover:text-blue-700 dark:group-hover:text-blue-300"></a>

<!-- Secondary text -->
<span class="text-blue-600 dark:text-blue-400"></span>
```

### Utility Classes (from app.css)

The design system provides ready-to-use utility classes:

```html
<!-- Brand Colors -->
<div class="vck-primary">Blue primary text</div>
<div class="vck-bg-primary">Blue background</div>
<div class="vck-border-primary">Blue border</div>

<div class="vck-secondary">Red secondary text</div>
<div class="vck-bg-secondary">Red background</div>
<div class="vck-border-secondary">Red border</div>

<!-- Gradient Utilities -->
<div class="vck-gradient-primary">Blue to Red gradient</div>
<div class="vck-gradient-blue-red">Subtle blue-red background</div>
<div class="vck-gradient-section">Full section gradient background</div>

<!-- Gradient Border (for animated hover effect) -->
<div class="group relative">
  <div class="vck-gradient-border"></div>
  <div class="relative">Content</div>
</div>
```

### Section Background Patterns

**Standard pattern for full sections:**
```html
<section class="vck-gradient-section min-h-screen flex items-center justify-center px-4 overflow-hidden">
  <!-- Content -->
</section>
```

**Alternative simple background:**
```html
<section class="bg-white dark:bg-gray-950">
  <!-- Content -->
</section>
```

### When to Use Each Color

- **Blue (Primary)**: Main headings, primary buttons, feature highlights, icons
- **Red (Secondary)**: Accents, hover states (dark mode), badges, important CTAs
- **Blue + Red Gradient**: Animated borders, badges, special highlights
- **Yellow (Accent)**: Sparingly for special emphasis, warnings, or celebrations

---

## Card Components

### 1. News/Media Card (Primary Pattern - From latest-news.blade.php)

This is the primary card component used for news, media, and article listings. Based on the latest-news page implementation.

```html
{{-- News Card with Gradient Border --}}
<div class="group relative" data-aos="fade-up" data-aos-delay="{{ $delay }}">
    {{-- Animated Gradient Border --}}
    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

    {{-- Card Content --}}
    <div class="relative bg-white dark:bg-gray-800 rounded-3xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col h-full border border-blue-100 dark:border-blue-900/30">
        {{-- Featured Image --}}
        <div class="relative h-60 overflow-hidden">
             <a href="{{ route('media.show', $news->slug) }}" class="block w-full h-full">
                <img src="{{ Storage::url($news->featured_image) }}" alt="Title" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
             </a>

             {{-- Date Badge --}}
             <div class="absolute top-4 right-4">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-500 rounded-full blur-md opacity-75"></div>
                    <div class="relative bg-white dark:bg-gray-900 text-blue-700 dark:text-blue-300 px-4 py-2 rounded-full text-xs font-bold shadow-lg border-2 border-blue-200 dark:border-blue-700">
                        {{ $news->event_date->format('M j, Y') }}
                    </div>
                </div>
             </div>

             {{-- Gradient Overlay --}}
             <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        </div>

        {{-- Card Content --}}
        <div class="p-6 flex flex-col flex-grow bg-gradient-to-br from-blue-50/50 to-red-50/50 dark:from-blue-950/20 dark:to-red-950/20">
            {{-- Title --}}
            <h3 class="text-xl font-bold text-blue-900 dark:text-blue-100 mb-3 line-clamp-2 leading-tight">
                <a href="{{ route('media.show', $news->slug) }}" class="hover:text-red-600 dark:hover:text-red-400 transition-colors duration-300">
                    {!! $news->title !!}
                </a>
            </h3>

            {{-- Excerpt --}}
            <p class="text-blue-700/80 dark:text-blue-200/70 text-sm mb-5 line-clamp-3 flex-grow leading-relaxed">
                {!! Str::limit(strip_tags($news->content), 150) !!}
            </p>

            {{-- Read More Button --}}
            <div class="mt-auto pt-4 border-t border-blue-200/50 dark:border-blue-700/50">
                 <a href="{{ route('media.show', $news->slug) }}" class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-red-600 dark:hover:text-red-400 font-semibold text-sm transition-all duration-300 group/link">
                    {{ __('site.about.learn-more') }}
                    <svg class="w-4 h-4 ml-1 rtl:rotate-180 transition-transform duration-300 group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>
```

**Key Features:**
- **Double-layer structure**: Outer animated border + inner content card
- **Featured image**: Fixed height (`h-60`) with scale on hover
- **Date badge**: Floating badge with gradient glow effect
- **Hover effects**:
  - Card lifts up (`hover:-translate-y-2`)
  - Enhanced shadow (`hover:shadow-2xl`)
  - Image scales (`group-hover:scale-110`)
  - Gradient overlay appears on image
  - Arrow slides right on link hover
  - Border fades in with blur
- **Flex layout**: Using `flex flex-col` with `flex-grow` and `mt-auto` for perfect spacing
- **AOS animation**: Scroll-triggered fade-up with staggered delay
- **Line clamping**: Title uses `line-clamp-2`, excerpt uses `line-clamp-3`
- **Separator**: Border-top separator before CTA

**Component Breakdown:**

1. **Outer Container** (`group relative`):
   - `group`: Enables group-hover effects on children
   - `relative`: Positions the animated border
   - `data-aos`: Scroll animation trigger

2. **Animated Border** (`absolute -inset-0.5`):
   - Positioned absolutely with slight negative inset
   - Hidden by default (`opacity-0`)
   - Fades in on hover (`group-hover:opacity-100`)
   - Blur effect creates glow
   - Uses `from-blue-500 to-red-500` gradient

3. **Card Container** (`relative bg-white dark:bg-gray-800`):
   - `relative`: Positions above the animated border
   - White/dark background (not gradient like feature cards)
   - `rounded-3xl overflow-hidden` for image containment
   - `flex flex-col h-full` for consistent card heights
   - Border: `border-blue-100 dark:border-blue-900/30`

4. **Featured Image Section**:
   - Fixed height: `h-60`
   - Image scales on hover: `group-hover:scale-110`
   - Date badge with nested gradient glow
   - Gradient overlay appears on hover

5. **Content Section**:
   - Gradient background: `from-blue-50/50 to-red-50/50`
   - Title: `text-xl font-bold`, 2-line clamp
   - Excerpt: `text-sm`, 3-line clamp, `flex-grow`
   - CTA: `mt-auto` with border-top separator

### 2. Color Symbolism Card

Smaller variant used for displaying color meanings with icon + text combinations.

```html
<div class="group relative" data-aos="zoom-in" data-aos-delay="0">
    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
    <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl p-8 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full">
        <div class="relative w-16 h-16 mb-6">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
            <div class="relative w-16 h-16 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-red-600 rounded"></div>
            </div>
        </div>
        <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-3">நீலம்</h3>
        <p class="text-base text-blue-700/80 dark:text-blue-200/70 leading-relaxed">உழைக்கும் மக்கள் விடுதலை</p>
        <p class="text-sm text-blue-600/70 dark:text-blue-300/60 mt-2 italic">Working People's Liberation</p>
    </div>
</div>
```

### 3. Member/Profile Card

Vertical card with image and info overlay, used for displaying party members, MLAs, and leaders.

```html
<div class="group relative" data-aos="fade-up" data-aos-delay="0">
    {{-- Animated Border --}}
    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

    <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
        <div class="relative overflow-hidden aspect-[3/4]">
            <img class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105" src="image.jpg" alt="Name">
            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-transparent to-transparent"></div>
            <div class="absolute top-2 left-2 bg-gradient-to-r from-blue-600 to-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg">MLA</div>
        </div>
        <div class="p-4 text-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
            <h3 class="text-sm md:text-base font-bold text-blue-900 dark:text-blue-100 mb-1 line-clamp-2">
                Member Name
            </h3>
            <p class="text-xs text-blue-600 dark:text-blue-400 font-medium line-clamp-1 mb-3">Position</p>
            <div class="flex justify-center gap-2">
                <!-- Social icons -->
            </div>
        </div>
    </div>
</div>
```

### 4. News/Article Card

Horizontal image with content below, used for news articles, press releases, and blog posts.

```html
<article class="group relative" data-aos="fade-up" data-aos-delay="100">
    {{-- Animated Border --}}
    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

    <a href="#" class="relative block bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full">
        {{-- Image --}}
        <div class="relative overflow-hidden aspect-[16/9]">
            <img src="image.jpg" alt="News" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-transparent to-transparent"></div>
            <div class="absolute top-3 left-3 bg-gradient-to-r from-blue-600 to-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg uppercase">
                Featured
            </div>
        </div>

        {{-- Content --}}
        <div class="p-6 bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
            <time class="text-xs text-blue-600 dark:text-blue-400 mb-3 flex items-center gap-1.5 font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                March 15, 2024
            </time>

            <h3 class="text-lg md:text-xl font-bold text-blue-900 dark:text-blue-100 group-hover:text-blue-600 dark:group-hover:text-red-400 transition-colors line-clamp-2 mb-4">
                Article Title Goes Here
            </h3>

            <span class="inline-flex items-center text-blue-600 dark:text-blue-400 font-semibold group-hover:text-blue-700 dark:group-hover:text-blue-300 transition-colors">
                Read more
                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </span>
        </div>
    </a>
</article>
```

### 5. Vision/Mission Card

Large content card with icon badge, used for vision/mission statements and important messaging.

```html
<div class="group relative" data-aos="fade-right">
    <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-pink-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
    <div class="relative bg-gradient-to-br from-red-50 to-pink-50 dark:from-red-950/30 dark:to-pink-950/30 rounded-3xl p-8 lg:p-10 border border-red-200 dark:border-red-800 transition-all duration-500 hover:shadow-2xl h-full">
        <div class="flex items-center mb-6">
            <div class="relative w-12 h-12 mr-4">
                <div class="absolute inset-0 bg-gradient-to-br from-red-500 to-pink-500 rounded-xl opacity-20"></div>
                <div class="relative w-12 h-12 bg-white dark:bg-gray-900 rounded-xl flex items-center justify-center shadow-lg border-2 border-red-200 dark:border-red-700">
                    <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <!-- Icon -->
                    </svg>
                </div>
            </div>
            <h2 class="text-3xl lg:text-4xl font-extrabold text-red-900 dark:text-red-100">Vision</h2>
        </div>
        <blockquote class="border-l-4 border-red-600 pl-6">
            <p class="text-lg text-red-800/90 dark:text-red-200/80 italic leading-relaxed">
                "Vision statement text goes here"
            </p>
        </blockquote>
    </div>
</div>
```

### 6. Hero/Foundation Card

Large image + content card for founders/leaders, typically used in About or History sections.

```html
<div class="group relative" data-aos="fade-up">
    <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-12 items-center bg-gradient-to-br from-blue-50 to-purple-50 dark:from-blue-950/20 dark:to-purple-950/20 rounded-3xl p-8 lg:p-12 border border-blue-200 dark:border-blue-800">
        <div>
            <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl mb-4 shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <!-- Icon -->
                </svg>
            </div>
            <h3 class="text-3xl font-bold text-blue-900 dark:text-blue-100 mb-4">Dr. Ambedkar</h3>
            <p class="text-lg text-blue-800/90 dark:text-blue-200/80 mb-4 leading-relaxed">
                Description paragraph 1
            </p>
            <p class="text-lg text-blue-800/90 dark:text-blue-200/80 leading-relaxed">
                Description paragraph 2
            </p>
        </div>
        <div class="relative rounded-2xl shadow-2xl overflow-hidden group-hover:shadow-3xl transition-shadow duration-500">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-purple-500/10"></div>
            <img src="image.jpg" alt="Name" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
        </div>
    </div>
</div>
```

### 7. Slogan Card

Bold gradient cards with centered content, used for impactful statements and slogans.

```html
<div class="group relative" data-aos="zoom-in" data-aos-delay="0">
    <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-red-800 rounded-3xl blur-lg opacity-75 group-hover:opacity-100 transition duration-500"></div>
    <div class="relative bg-gradient-to-br from-red-600 via-red-700 to-red-800 p-8 rounded-3xl shadow-2xl text-center transform hover:-translate-y-2 hover:scale-105 transition-all duration-500 min-h-[200px] flex items-center justify-center">
        <div class="text-yellow-100">
            <svg class="w-12 h-12 mx-auto mb-4 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
            </svg>
            <p class="text-2xl font-bold leading-relaxed">Slogan Text Here</p>
        </div>
    </div>
</div>
```

---

## Section Layouts

### Standard Content Section Pattern (From latest-news.blade.php)

Standard pattern for main content sections throughout the site. This is the actual implementation used in the latest news page.

```html
{{-- Latest News Content --}}
<section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto">
        @if($latest_news->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
            @foreach($latest_news as $index => $news)
            @php
                $delay = ($index % 3) * 100;
            @endphp
            {{-- News Card with Gradient Border --}}
            <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                <!-- Card content here -->
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if ($latest_news->hasPages())
        <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-center">
             <div class="pagination-links">
                {{ $latest_news->links() }}
             </div>
        </div>
        @endif

        @else
        {{-- No News Found (Empty State) --}}
        <!-- See Empty States section -->
        @endif
    </div>
</section>
```

**Key Features:**
- **Section Padding**: `py-20 lg:py-28 px-4` for consistent spacing
- **Background**: `bg-gray-100 dark:bg-gray-900` (simpler than gradient backgrounds)
- **Container**: `max-w-7xl mx-auto` for content containment
- **Grid Layout**: `grid-cols-1 sm:grid-cols-2 lg:grid-cols-3` with `gap-8 lg:gap-12`
- **Staggered Delays**: Calculate delay based on index: `($index % 3) * 100`
- **Pagination**: Styled pagination with border-top separator
- **Conditional Rendering**: Shows empty state when no content

### Page Header Pattern

Standard page header used on internal pages (About, Administration, Office Bearers, etc.). This is the modern design system version with animated background elements.

```html
{{-- Modern Page Header with Design System --}}
<section class="relative min-h-[60vh] flex items-center justify-center px-4 bg-gradient-to-br from-blue-50 via-white to-red-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30 overflow-hidden">
    {{-- Background Decorative Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-red-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s"></div>
    </div>

    <div class="max-w-7xl mx-auto w-full relative z-10 text-center py-16">
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight" data-aos="fade-up">
            {{ __('site.page.title') }}
        </h1>
        <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto font-light" data-aos="fade-up" data-aos-delay="100">
            {{ __('site.page.subtitle') }}
        </p>
    </div>
</section>
```

**Alternative: Simple Page Header (Legacy)**

For pages that need a simpler dark header without the design system effects:

```html
{{-- Simple Dark Header --}}
<section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">{{ __('site.page.title') }}</h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('site.page.subtitle') }}</p>
    </div>
</section>
```

**Note:** The modern page header with animated background elements is preferred for consistency with the design system. Use the simple dark header only for specific cases where a darker, more minimal look is required.

### Hero Header Pattern

Used for the main hero/slider section at the top of pages (typically the home page).

```html
<section id="home" class="relative h-screen min-h-screen overflow-hidden">
    {{-- Slider Container --}}
    <div id="slider-container" class="absolute inset-0 flex transition-transform duration-700 ease-in-out">
        <div class="w-full h-full flex-shrink-0 relative">
            <img src="slider1.jpg" class="w-full h-full object-cover" alt="Slide 1">
            <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40"></div>
        </div>
    </div>

    {{-- Navigation Dots --}}
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3 z-10">
        <button class="w-3 h-3 rounded-full bg-white/70 hover:bg-white transition-all duration-300 hover:scale-125 shadow-lg"></button>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-20 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
        <svg class="w-6 h-6 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>
```

### About Section with Image

Two-column layout with text and image, commonly used for about/history sections.

```html
<section id="about" class="relative min-h-screen flex items-center justify-center px-4 bg-white dark:bg-gray-950 overflow-hidden">
    {{-- Background Image with Overlay --}}
    <div class="absolute inset-0 z-0">
        <img src="background.jpg" alt="Background" class="w-full h-full object-cover opacity-90">
        <div class="absolute inset-0 bg-gradient-to-b from-white/85 via-white/90 to-white/85 dark:from-gray-950/85 dark:via-gray-950/90 dark:to-gray-950/85"></div>
    </div>

    <div class="max-w-7xl mx-auto w-full relative z-10 py-16">
        {{-- Section Header --}}
        <div class="text-center mb-12 lg:mb-16">
            <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                About Us
            </h2>
            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto font-light">
                Fighting for justice. Empowering communities.
            </p>
        </div>

        {{-- Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            {{-- Text Content --}}
            <div class="order-2 lg:order-1">
                <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                    Paragraph 1
                </p>
                <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 mb-8 leading-relaxed">
                    Paragraph 2
                </p>
                <a href="#" class="group inline-flex items-center text-blue-600 dark:text-blue-400 text-lg font-semibold hover:text-blue-700 dark:hover:text-blue-300 transition-colors">
                    Learn More
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>

            {{-- Image Content --}}
            <div class="order-1 lg:order-2" data-aos="fade-left">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-r from-red-600 to-blue-600 rounded-3xl blur-2xl opacity-20 animate-pulse"></div>
                    <div class="relative bg-white dark:bg-gray-900 rounded-3xl p-2 border border-blue-200 dark:border-blue-800 shadow-2xl">
                        <img src="about.png" alt="About" class="relative w-full h-auto rounded-2xl">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
```

---

## Typography

### Heading Scale

```html
<!-- Hero Title (Largest) -->
<h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
    Hero Title
</h1>

<!-- Section Title -->
<h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
    Section Title
</h2>

<!-- Subsection Title -->
<h2 class="text-3xl lg:text-4xl font-extrabold text-blue-900 dark:text-blue-100">
    Subsection
</h2>

<!-- Card Title -->
<h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-3">
    Card Title
</h3>

<!-- Content Heading -->
<h3 class="text-xl font-bold text-gray-900 dark:text-white">
    Content Heading
</h3>
```

### Body Text

```html
<!-- Large body text -->
<p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 leading-relaxed">
    Large paragraph text
</p>

<!-- Standard body text (Card description) -->
<p class="text-base text-blue-700/80 dark:text-blue-200/70 leading-relaxed">
    Standard paragraph
</p>

<!-- Small text -->
<p class="text-sm text-blue-600/70 dark:text-blue-300/60">
    Small text
</p>

<!-- Subtitle/Description -->
<p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 font-light">
    Section description
</p>
```

---

## Animations & Effects

### AOS (Animate On Scroll)

Scroll-triggered animations using the AOS library.

```html
<!-- Fade Up (default for cards) -->
<div data-aos="fade-up">Content</div>

<!-- With delay (stagger multiple items) -->
<div data-aos="fade-up" data-aos-delay="0">Card 1</div>
<div data-aos="fade-up" data-aos-delay="100">Card 2</div>
<div data-aos="fade-up" data-aos-delay="200">Card 3</div>

<!-- Zoom In (for special cards) -->
<div data-aos="zoom-in">Content</div>
<div data-aos="zoom-in" data-aos-delay="300">Content</div>

<!-- Fade Directional -->
<div data-aos="fade-left">Content from right</div>
<div data-aos="fade-right">Content from left</div>
```

**Recommended Delay Increments:**
- First item: `0ms`
- Second item: `100ms`
- Third item: `200ms`
- Fourth item: `300ms`
- Max recommended delay: `500ms`

### Hover Effects

```html
<!-- Card Lift (Standard) -->
<div class="hover:-translate-y-2 transition-all duration-500">Content</div>

<!-- Icon Scale -->
<div class="group-hover:scale-110 transition-transform duration-500">Icon</div>

<!-- Arrow Slide Right -->
<svg class="group-hover:translate-x-1 transition-transform">Arrow</svg>

<!-- Shadow Enhancement -->
<div class="hover:shadow-2xl transition-all duration-500">Content</div>

<!-- Image Scale on Hover -->
<img class="transition-transform duration-700 group-hover:scale-105" src="image.jpg">

<!-- Opacity Change -->
<div class="opacity-20 group-hover:opacity-30 transition-opacity">Gradient Background</div>
```

### Gradient Border Animation

The signature animated border effect used across all cards.

```html
<!-- Container with group class -->
<div class="group relative">
    <!-- Animated gradient border (hidden by default) -->
    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

    <!-- Content -->
    <div class="relative bg-white dark:bg-gray-900 rounded-3xl p-8">
        Content
    </div>
</div>
```

**How it works:**
1. Outer div has `group` class and `relative` positioning
2. Border div is positioned absolutely with slight negative inset (`-inset-0.5`)
3. Border is hidden by default (`opacity-0`)
4. On hover, border fades in (`group-hover:opacity-100`)
5. Blur creates the glow effect
6. Inner content has `relative` to appear above border

### Background Blur Elements

Decorative background elements for sections.

```html
<div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-red-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s"></div>
</div>
```

### Backdrop Blur (Glassmorphism)

Used for overlays and semi-transparent sections.

```html
<!-- Glassmorphism effect -->
<div class="bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
    Content
</div>
```

---

## Icon Patterns

### Standard Icon Container (w-14 h-14)

The primary icon pattern used in feature cards.

```html
<div class="relative w-14 h-14 mb-6">
    <!-- Background glow (gradient) -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>

    <!-- Icon container (white/dark background) -->
    <div class="relative w-14 h-14 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
        <svg class="w-7 h-7 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 24 24">
            <!-- SVG path -->
        </svg>
    </div>
</div>
```

**3-Layer Structure:**
1. **Outer layer** (`relative w-14 h-14`): Container
2. **Gradient glow** (`absolute inset-0`): Background gradient with low opacity
3. **Icon container** (`relative w-14 h-14`): White/dark box with border and shadow
4. **SVG icon** (`w-7 h-7`): The actual icon

### Badge Icon (w-12 h-12)

Smaller variant for vision/mission cards and inline icons.

```html
<div class="relative w-12 h-12 mr-4">
    <div class="absolute inset-0 bg-gradient-to-br from-red-500 to-pink-500 rounded-xl opacity-20"></div>
    <div class="relative w-12 h-12 bg-white dark:bg-gray-900 rounded-xl flex items-center justify-center shadow-lg border-2 border-red-200 dark:border-red-700">
        <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <!-- SVG -->
        </svg>
    </div>
</div>
```

### Solid Gradient Icon

Direct gradient fill instead of icon, used for color symbolism.

```html
<div class="relative w-16 h-16 mb-6">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
    <div class="relative w-16 h-16 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-red-600 rounded"></div>
    </div>
</div>
```

### Inline Badge (Labels/Tags)

Small gradient badges for overlaying on images.

```html
<!-- MLA/Position Badge -->
<div class="absolute top-2 left-2 bg-gradient-to-r from-blue-600 to-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg">
    MLA
</div>

<!-- Featured Badge -->
<div class="absolute top-3 left-3 bg-gradient-to-r from-blue-600 to-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg uppercase">
    Featured
</div>
```

---

## Usage Examples

### Complete News/Media Listing Page (Based on latest-news.blade.php)

Full implementation showing the complete page structure with cards, pagination, and empty state.

```blade
@extends('layouts.app')

@section('title', __('site.menu.latest_news'))

@section('content')
@php
use Illuminate\Support\Facades\Storage;
@endphp
    {{-- Page Header (using component) --}}
    <x-page-header-simple
        :title="__('site.menu.latest_news')"
        :subtitle="__('site.home.latest_news_description')"
    />

    {{-- Latest News Content --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            @if($latest_news->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                @foreach($latest_news as $index => $news)
                @php
                    // Calculate staggered animation delay
                    $delay = ($index % 3) * 100;
                @endphp

                {{-- News Card with Gradient Border --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    {{-- Card Content --}}
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col h-full border border-blue-100 dark:border-blue-900/30">
                        {{-- Featured Image --}}
                        <div class="relative h-60 overflow-hidden">
                             <a href="{{ route('media.show', $news->slug) }}" class="block w-full h-full">
                                <img src="{{ Storage::url($news->featured_image) }}" alt="{{ app()->getLocale() === 'ta' ? $news->title_ta : $news->title_en }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                             </a>

                             {{-- Date Badge --}}
                             <div class="absolute top-4 right-4">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-500 rounded-full blur-md opacity-75"></div>
                                    <div class="relative bg-white dark:bg-gray-900 text-blue-700 dark:text-blue-300 px-4 py-2 rounded-full text-xs font-bold shadow-lg border-2 border-blue-200 dark:border-blue-700">
                                        {{ $news->event_date ? $news->event_date->format('M j, Y') : $news->created_at->format('M j, Y') }}
                                    </div>
                                </div>
                             </div>

                             {{-- Gradient Overlay --}}
                             <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        {{-- Card Content --}}
                        <div class="p-6 flex flex-col flex-grow bg-gradient-to-br from-blue-50/50 to-red-50/50 dark:from-blue-950/20 dark:to-red-950/20">
                            {{-- Title --}}
                            <h3 class="text-xl font-bold text-blue-900 dark:text-blue-100 mb-3 line-clamp-2 leading-tight">
                                <a href="{{ route('media.show', $news->slug) }}" class="hover:text-red-600 dark:hover:text-red-400 transition-colors duration-300">
                                    {!! app()->getLocale() === 'ta' ? $news->title_ta : $news->title_en !!}
                                </a>
                            </h3>

                            {{-- Excerpt --}}
                            <p class="text-blue-700/80 dark:text-blue-200/70 text-sm mb-5 line-clamp-3 flex-grow leading-relaxed">
                                {!! Str::limit(strip_tags(app()->getLocale() === 'ta' ? $news->content_ta : $news->content_en), 150) !!}
                            </p>

                            {{-- Read More Button --}}
                            <div class="mt-auto pt-4 border-t border-blue-200/50 dark:border-blue-700/50">
                                 <a href="{{ route('media.show', $news->slug) }}" class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-red-600 dark:hover:text-red-400 font-semibold text-sm transition-all duration-300 group/link">
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
            @if ($latest_news->hasPages())
            <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-center">
                 <div class="pagination-links">
                    {{ $latest_news->links() }}
                 </div>
            </div>
            @endif

            @else
            {{-- No News Found (Empty State) --}}
            <div class="text-center py-24" data-aos="fade-up">
                <div class="max-w-lg mx-auto relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-3xl opacity-50 blur transition duration-500"></div>
                    <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 p-12 rounded-3xl border border-blue-200 dark:border-blue-800">
                        <div class="relative w-20 h-20 mx-auto mb-8">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-500 rounded-2xl opacity-20"></div>
                            <div class="relative w-20 h-20 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center shadow-lg border-2 border-blue-200 dark:border-blue-700">
                                <svg class="w-10 h-10 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 12h6m-1 8H5"></path>
                                </svg>
                            </div>
                        </div>
                        <h2 class="text-3xl font-extrabold text-blue-900 dark:text-blue-100 mb-4">{{ __('site.home.no_news') }}</h2>
                        <p class="text-lg text-blue-700/80 dark:text-blue-200/70 mb-8 leading-relaxed">{{ __('site.press_releases.check_back') }}</p>
                        <div class="relative inline-block group/btn">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-xl opacity-75 group-hover/btn:opacity-100 blur transition duration-300"></div>
                            <a href="{{ route('home') }}" class="relative inline-block bg-gradient-to-r from-blue-600 to-red-600 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
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
```

**This example demonstrates:**
- Complete page structure with header component
- Grid layout with responsive columns
- Staggered animation delays calculated dynamically
- Full card implementation with all hover effects
- Date badge with gradient glow
- Image scaling and gradient overlay on hover
- Line clamping for consistent card heights
- Pagination with separator
- Empty state with call-to-action
- Multilingual support
- Dark mode throughout

### Color Theme Variations

Apply different color themes to the same card structure for visual variety.

```html
{{-- Red-Orange Theme --}}
<div class="group relative">
    <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-orange-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
    <div class="relative bg-gradient-to-br from-red-50 to-orange-50 dark:from-red-950/30 dark:to-orange-950/30 rounded-3xl p-8 border border-red-200 dark:border-red-800">
        <!-- Content with red-900/red-100 text colors -->
    </div>
</div>

{{-- Purple-Pink Theme --}}
<div class="group relative">
    <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
    <div class="relative bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-950/30 dark:to-pink-950/30 rounded-3xl p-8 border border-purple-200 dark:border-purple-800">
        <!-- Content with purple-900/purple-100 text colors -->
    </div>
</div>

{{-- Yellow-Amber Theme --}}
<div class="group relative">
    <div class="absolute -inset-0.5 bg-gradient-to-r from-yellow-500 to-amber-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
    <div class="relative bg-gradient-to-br from-yellow-50 to-amber-50 dark:from-yellow-950/30 dark:to-amber-950/30 rounded-3xl p-8 border border-yellow-200 dark:border-yellow-800">
        <!-- Content with yellow-900/yellow-100 text colors -->
    </div>
</div>
```

---

## Empty States

### No Content Found Pattern (From latest-news.blade.php)

When there's no content to display, use this empty state pattern with a call-to-action.

```html
{{-- No News Found --}}
<div class="text-center py-24" data-aos="fade-up">
    <div class="max-w-lg mx-auto relative group">
        {{-- Animated Gradient Border --}}
        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-3xl opacity-50 blur transition duration-500"></div>

        {{-- Content Card --}}
        <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 p-12 rounded-3xl border border-blue-200 dark:border-blue-800">
            {{-- Icon with Gradient Background --}}
            <div class="relative w-20 h-20 mx-auto mb-8">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-500 rounded-2xl opacity-20"></div>
                <div class="relative w-20 h-20 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center shadow-lg border-2 border-blue-200 dark:border-blue-700">
                    <svg class="w-10 h-10 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 12h6m-1 8H5"></path>
                    </svg>
                </div>
            </div>

            <h2 class="text-3xl font-extrabold text-blue-900 dark:text-blue-100 mb-4">{{ __('site.home.no_news') }}</h2>
            <p class="text-lg text-blue-700/80 dark:text-blue-200/70 mb-8 leading-relaxed">{{ __('site.press_releases.check_back') }}</p>

            {{-- Back Home Button --}}
            <div class="relative inline-block group/btn">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-xl opacity-75 group-hover/btn:opacity-100 blur transition duration-300"></div>
                <a href="{{ route('home') }}" class="relative inline-block bg-gradient-to-r from-blue-600 to-red-600 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
                    {{ __('site.footer.back_home') }}
                </a>
            </div>
        </div>
    </div>
</div>
```

**Key Features:**
- **Centered Layout**: `text-center py-24` for vertical spacing
- **Max Width**: `max-w-lg mx-auto` to constrain width
- **Gradient Border**: Static border with `opacity-50` (always visible, unlike card hover borders)
- **Large Icon**: `w-20 h-20` with nested gradient glow pattern
- **Typography**:
  - Heading: `text-3xl font-extrabold`
  - Description: `text-lg` with opacity
- **CTA Button**: Gradient button with animated border on hover
- **Button Hover**: Scale effect (`hover:scale-105`)

**When to Use:**
- No search results
- Empty categories
- No upcoming events
- Missing content listings

---

## Pagination

### Pagination Styling (From latest-news.blade.php)

The pagination component is styled with custom CSS that integrates with Laravel's default pagination.

```html
{{-- Pagination --}}
@if ($latest_news->hasPages())
<div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-center">
     <div class="pagination-links">
        {{ $latest_news->links() }}
     </div>
</div>
@endif
```

**CSS Styling (Optional - add to layouts/app.blade.php):**

```css
/* Basic styling for default Laravel pagination */
.pagination-links nav[role="navigation"] > div:first-child { display: none; }
.pagination-links nav[role="navigation"] > div:last-child { display: flex; justify-content: center;}
.pagination-links nav span > span, .pagination-links nav a { @apply inline-flex items-center justify-center px-4 py-2 mx-1 text-sm font-medium border rounded-md transition-colors duration-150; }
.pagination-links nav span > span { @apply bg-red-600 border-red-600 text-white z-10; }
.pagination-links nav span[aria-disabled="true"] > span { @apply bg-gray-100 border-gray-300 text-gray-400 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-500; }
.pagination-links nav a { @apply bg-white border-gray-300 text-gray-700 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-700; }
```

**Key Features:**
- **Separator**: Border-top with `border-gray-200 dark:border-gray-700`
- **Spacing**: `mt-16 pt-8` for separation from content
- **Centered**: `flex justify-center`
- **Active Page**: Red background (`bg-red-600`)
- **Hover States**: Background color changes on hover
- **Dark Mode**: Full dark mode support

---

## Best Practices

### 1. Consistent Spacing (Based on Latest News Implementation)
- **Section padding**: `py-20 lg:py-28 px-4` for main content sections
- **Card padding**: `p-6` for content area (not `p-8`)
- **Grid gaps**: `gap-8 lg:gap-12` (larger gaps on desktop)
- **Pagination spacing**: `mt-16 pt-8` with border-top separator
- **Empty state**: `py-24` for vertical centering
- **Content margins**:
  - Headings: `mb-3`
  - Excerpts: `mb-5`
  - Icon sections: `mb-8` (larger for empty states)

### 2. Animation Timing (From Latest News Page)
- **Standard transitions**: `transition-all duration-500` for card hover effects
- **Image transforms**: `duration-700` for smoother scaling
- **Link animations**: `duration-300` for faster CTA feedback
- **Border animations**: `transition duration-500` for gradient borders
- **Stagger delays**: Calculate as `($index % 3) * 100` for 3-column grids
- **Delay increments**: 0ms, 100ms, 200ms pattern
- **Gradient overlay**: `transition-opacity duration-500`

### 3. Color Application (Exact Implementation)
- **Card background**: `bg-white dark:bg-gray-800` (solid, not gradient)
- **Content background**: `bg-gradient-to-br from-blue-50/50 to-red-50/50 dark:from-blue-950/20 dark:to-red-950/20`
- **Section background**: `bg-gray-100 dark:bg-gray-900`
- **Borders**:
  - Card: `border-blue-100 dark:border-blue-900/30`
  - Content: `border-blue-200 dark:border-blue-700`
  - Separators: `border-gray-200 dark:border-gray-700`
- **Text colors**:
  - Headings: `text-blue-900 dark:text-blue-100`
  - Body: `text-blue-700/80 dark:text-blue-200/70`
  - Small text: `text-blue-700 dark:text-blue-300`
  - Links: `text-blue-600 dark:text-blue-400 hover:text-red-600 dark:hover:text-red-400`
- **Gradient borders**: `from-blue-500 to-red-500` (500 level, not 600)

### 4. Responsive Design (Latest News Implementation)
- **Mobile-first approach**: Base size, then `sm:`, `md:`, and `lg:` breakpoints
- **Grid responsiveness**: `grid-cols-1 sm:grid-cols-2 lg:grid-cols-3`
- **Section padding**: `py-20 lg:py-28` (consistent across breakpoints)
- **Gap scaling**: `gap-8 lg:gap-12` (significantly larger on desktop)
- **Image height**: Fixed `h-60` for consistent card appearance
- **RTL support**: `rtl:rotate-180` on directional icons

### 5. Dark Mode (Actual Implementation)
- **Universal support**: All components have dark mode variants
- **Background colors**:
  - Section: `bg-gray-100 dark:bg-gray-900`
  - Card: `bg-white dark:bg-gray-800`
  - Content: Gradient with `/50` and `/20` opacity adjustments
- **Border opacity**: Use `/30` for subtle dark borders (e.g., `dark:border-blue-900/30`)
- **Text opacity**: Body text uses `/80` in light, `/70` in dark
- **Contrast**: Badge uses `dark:bg-gray-900` for maximum contrast

### 6. Flexbox Card Layout (From Latest News Cards)
- **Outer card**: `flex flex-col h-full` for equal heights in grid
- **Image section**: Fixed height with overflow hidden
- **Content section**: `flex flex-col flex-grow` for flexible content area
- **Grow description**: `flex-grow` on excerpt pushes CTA to bottom
- **Auto margin on CTA**: `mt-auto` anchors link container to card bottom
- **Separator**: Use `pt-4 border-t` before CTA for visual separation
- **Structure**: Image → Content (Title → Excerpt [flex-grow] → Separator → CTA [mt-auto])

### 7. Accessibility
- **Alt text**: Always include descriptive alt text for images
- **Semantic HTML**: Use proper tags (section, article, header, nav)
- **Color contrast**: Maintain WCAG AA standards minimum
- **Keyboard navigation**: Ensure all interactive elements are focusable
- **Aria labels**: Add when link text isn't descriptive enough
- **Focus states**: Include visible focus indicators

### 8. Group Hover Pattern
- **Parent has `group`**: Outer container must have `group` class
- **Children use `group-hover:`**: Apply to nested elements
- **Common applications**:
  - Icon scaling: `group-hover:scale-110`
  - Arrow movement: `group-hover:translate-x-1`
  - Border reveal: `group-hover:opacity-100`
  - Color changes: `group-hover:text-blue-700`
  - Opacity shifts: `group-hover:opacity-30`

---

## File Locations

- **Main Layout**: [resources/views/layouts/app.blade.php](resources/views/layouts/app.blade.php)
- **Home Page**: [resources/views/pages/home.blade.php](resources/views/pages/home.blade.php)
- **Ideology Page**: [resources/views/pages/ideology.blade.php](resources/views/pages/ideology.blade.php)
- **CSS**: [resources/css/app.css](resources/css/app.css)
- **Tailwind Config**: [tailwind.config.js](tailwind.config.js)

---

## Quick Reference Checklist

### News/Media Card Checklist (Based on Latest News Page)

When creating a news or media card component, ensure:

- [ ] Outer container has `group relative` classes
- [ ] Animated border: `absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500`
- [ ] Card container: `relative bg-white dark:bg-gray-800 rounded-3xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col h-full border border-blue-100 dark:border-blue-900/30`
- [ ] Featured image: `relative h-60 overflow-hidden` with `group-hover:scale-110` on img
- [ ] Date badge with gradient glow (2-layer structure)
- [ ] Gradient overlay on image: `absolute inset-0 bg-gradient-to-t from-black/50 opacity-0 group-hover:opacity-100`
- [ ] Content area: `p-6 flex flex-col flex-grow bg-gradient-to-br from-blue-50/50 to-red-50/50 dark:from-blue-950/20 dark:to-red-950/20`
- [ ] Title: `text-xl font-bold text-blue-900 dark:text-blue-100 mb-3 line-clamp-2`
- [ ] Excerpt: `text-blue-700/80 dark:text-blue-200/70 text-sm mb-5 line-clamp-3 flex-grow`
- [ ] CTA container: `mt-auto pt-4 border-t border-blue-200/50 dark:border-blue-700/50`
- [ ] Link: `inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-red-600 dark:hover:text-red-400`
- [ ] Arrow icon with `group-hover/link:translate-x-1` animation
- [ ] RTL support: `rtl:rotate-180` on arrow
- [ ] AOS animation: `data-aos="fade-up" data-aos-delay="{{ $delay }}"`
- [ ] Staggered delays calculated as `($index % 3) * 100`

### Section Layout Checklist

- [ ] Section: `py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900`
- [ ] Container: `max-w-7xl mx-auto`
- [ ] Grid: `grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12`
- [ ] Pagination: `mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-center`
- [ ] Empty state: Centered with gradient border card and CTA button

---

## VCK Utility Classes Reference

All utility classes are defined in [resources/css/app.css](resources/css/app.css) and follow the blue-red color scheme.

### Color Utilities

```html
<!-- Primary (Blue) -->
<div class="vck-primary">Text in blue-600/blue-400</div>
<div class="vck-bg-primary">Background blue-600, hover blue-700</div>
<div class="vck-border-primary">Border blue-600</div>

<!-- Secondary (Red) -->
<div class="vck-secondary">Text in red-600/red-400</div>
<div class="vck-bg-secondary">Background red-600, hover red-700</div>
<div class="vck-border-secondary">Border red-600</div>
```

### Gradient Utilities

```html
<!-- Primary gradient (blue to red) -->
<div class="vck-gradient-primary"></div>

<!-- Subtle gradient background -->
<div class="vck-gradient-blue-red"></div>

<!-- Section gradient background -->
<div class="vck-gradient-section"></div>

<!-- Animated border (use inside group relative) -->
<div class="group relative">
  <div class="vck-gradient-border"></div>
  <div class="relative">Content</div>
</div>
```

### Card Utilities

```html
<!-- Standard card -->
<div class="vck-card">Card with blue-red gradient background</div>

<!-- Simple card -->
<div class="vck-card-simple">Simple gradient card</div>

<!-- Card with flex layout for equal heights -->
<div class="vck-card-bordered">Flex column card with border</div>
```

### Typography Utilities

```html
<!-- Body text -->
<p class="vck-text-body">Blue-tinted body text with opacity</p>

<!-- Heading -->
<h3 class="vck-text-heading">Blue heading text</h3>

<!-- Card title -->
<h3 class="vck-text-card-title">Card title with margin</h3>

<!-- Link/CTA -->
<a href="#" class="vck-text-link">Interactive link with hover</a>
```

### Section Utilities

```html
<!-- Section wrapper -->
<section class="vck-section">Padding py-20 lg:py-28</section>

<!-- Container -->
<div class="vck-container">Max-width 7xl centered</div>

<!-- Section title -->
<h2 class="vck-section-title">Large responsive title</h2>

<!-- Section subtitle -->
<p class="vck-section-subtitle">Subtitle with max-width</p>
```

### Button Utilities

```html
<!-- Primary button (blue) -->
<button class="vck-btn-primary">Primary Button</button>

<!-- Secondary button (blue outline) -->
<button class="vck-btn-secondary">Secondary Button</button>

<!-- Gradient button (blue to red) -->
<button class="vck-btn-gradient">Gradient Button</button>
```

### Icon Utilities

```html
<!-- Icon container with 3-layer structure -->
<div class="relative w-14 h-14 mb-6">
  <div class="vck-icon-glow"></div>
  <div class="vck-icon-container">
    <svg class="w-7 h-7 text-blue-600 dark:text-blue-400">...</svg>
  </div>
</div>
```

### Member Card Utilities

```html
<!-- Complete member card -->
<!-- Important: Add 'group' class manually for hover effects -->
<div class="vck-member-card group">
  <div class="vck-gradient-border"></div>
  <div class="vck-member-card-content">
    <div class="vck-member-image">
      <img src="member.jpg" alt="Name">
      <div class="vck-member-overlay"></div>
      <div class="vck-badge">MLA</div>
    </div>
    <div class="vck-member-info">
      <h4 class="vck-member-name">Name</h4>
      <p class="vck-member-position">Position</p>
    </div>
  </div>
</div>
```

### Badge Utilities

```html
<!-- Gradient badge -->
<div class="vck-badge">Featured</div>
```

### Background Blur Utilities

```html
<!-- Background decorative elements -->
<div class="vck-bg-blur">
  <div class="vck-bg-blur-blue absolute top-20 left-10"></div>
  <div class="vck-bg-blur-red absolute bottom-20 right-10"></div>
</div>
```

### Grid Utilities

```html
<!-- 2 column grid -->
<div class="vck-grid-2">...</div>

<!-- 3 column grid -->
<div class="vck-grid-3">...</div>

<!-- 4 column grid -->
<div class="vck-grid-4">...</div>
```

### Image Utilities

```html
<!-- Responsive image with hover scale -->
<img class="vck-image" src="image.jpg" alt="Description">

<!-- Image container with shimmer effect -->
<div class="vck-image-container">
  <img src="image.jpg" alt="Description">
</div>
```

### Page Header Utilities

```html
<div class="vck-page-header">
  <div class="vck-page-header-content">
    <h1 class="vck-page-title">Page Title</h1>
    <p class="vck-page-subtitle">Page description</p>
  </div>
</div>
```

---

## Color Consistency Checklist

When creating new components, ensure:

- [ ] All gradients use `from-blue-*` to `to-red-*` pattern
- [ ] Light mode backgrounds use `from-blue-50 to-red-50`
- [ ] Dark mode backgrounds use `dark:from-blue-950/30 dark:to-red-950/30`
- [ ] Borders are `border-blue-200 dark:border-blue-800`
- [ ] Headings are `text-blue-900 dark:text-blue-100`
- [ ] Body text is `text-blue-700/80 dark:text-blue-200/70`
- [ ] Links are `text-blue-600 dark:text-red-600`
- [ ] Hover states include `group-hover:` variations
- [ ] Animated borders use `from-blue-600 to-red-600`
- [ ] Icons use blue colors `text-blue-600 dark:text-blue-400`

---

## Support

For questions or suggestions about the design system, create an issue in the repository or refer to existing page implementations for examples. The home page ([resources/views/pages/home.blade.php](resources/views/pages/home.blade.php)) contains the most comprehensive examples of the design patterns.

All color utilities and component styles are centralized in [resources/css/app.css](resources/css/app.css) for easy maintenance and consistency.
