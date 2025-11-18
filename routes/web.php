<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ApplicationPdfController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localize' ]
    ],
    function() {
        Route::get('/', [PageController::class, 'home'])->name('home');
        Route::get('/ideology', [PageController::class, 'ideology'])->name('ideology');
        Route::get('/history', [PageController::class, 'history'])->name('history');
        Route::get('/latest-news', [PageController::class, 'latest_news'])->name('latest-news');
        Route::get('/press-releases', [PageController::class, 'pressReleases'])->name('press-releases');
        Route::get('/events', [PageController::class, 'events'])->name('events');
        Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
        Route::get('/videos', [PageController::class, 'videos'])->name('videos');
        Route::get('/interviews', [PageController::class, 'interviews'])->name('interviews');
        Route::get('/kalaththil-siruthaigal', [PageController::class, 'kalaththilSiruthaigal'])->name('kalaththil-siruthaigal');
        Route::get('/media/{media}', [PageController::class, 'showMedia'])->name('media.show');
        Route::get('/contact', [PageController::class, 'contact'])->name('contact');
        Route::post('/contact', [PageController::class, 'contactStore'])->name('contact.store');
        Route::get('/offline', function () {
            return view('offline');
        })->name('offline');
        Route::get('/coming-soon', function () {
            return view('coming-soon');
        })->name('coming-soon');
        Route::get('/administration', [PageController::class, 'administration'])->name('administration');
        Route::get('/elected-members', [PageController::class, 'electedMembers'])->name('elected-members');
        Route::get('/office-bearers', [PageController::class, 'officeBearers'])->name('office-bearers');
        Route::get('/party-representatives', [PageController::class, 'partyRepresentatives'])->name('party-representatives');
        Route::get('/join', [PageController::class, 'join'])->name('join');
        Route::post('/join', [PageController::class, 'joinStore'])->name('join.store');

        Route::get('/donation', [PageController::class, 'donation'])->name('donation');
        Route::post('/donation', [PageController::class, 'donationStore'])->name('donation.store');
        Route::post('/donation/verify', [PageController::class, 'donationVerify'])->name('donation.verify');
        Route::get('/donation/success', [PageController::class, 'donationSuccess'])->name('donation.success');

        Route::get('/books', [PageController::class, 'books'])->name('books');
        Route::get('/books/{book}', [PageController::class, 'showBook'])->name('books.show');

        Route::get('/applications', [PageController::class, 'applications'])->name('applications');
        Route::post('/applications', [PageController::class, 'applicationsStore'])->name('applications.store');

        // API routes for dynamic dropdowns
        Route::get('api/districts/{stateId}', [PageController::class, 'getDistricts']);
        Route::get('api/assemblies/{districtId}', [PageController::class, 'getAssemblies']);
        Route::get('api/blocks/{assemblyId}', [PageController::class, 'getBlocks']);
        Route::get('api/cities/{districtId}', [PageController::class, 'getCities']);
        Route::get('api/perurs/{cityId}', [PageController::class, 'getPerurs']);
        Route::get('api/paguthis/{perurId}', [PageController::class, 'getPaguthis']);
        Route::get('api/vattams/{paguthiId}', [PageController::class, 'getVattams']);

        Route::get('api/blocks/by-district/{districtId}', [PageController::class, 'getBlocksByDistrict']);
        Route::get('api/perurs/by-district/{districtId}', [PageController::class, 'getPerursByDistrict']);
        Route::get('api/cities/by-district/{districtId}', [PageController::class, 'getCitiesByDistrict']);
        Route::get('api/corporations/by-district/{districtId}', [PageController::class, 'getCorporationsByDistrict']);
        Route::get('api/paguthis/by-district/{districtId}', [PageController::class, 'getPaguthisByDistrict']);
        Route::get('api/vattams/by-district/{districtId}', [PageController::class, 'getVattamsByDistrict']);
        Route::get('api/subbodies/by-postingstage/{postingstageId}', [PageController::class, 'getSubbodiesByPostingstage']);
        Route::get('api/posts/by-postingstage/{postingstageId}', [PageController::class, 'getPostsByPostingstage']);

    }

);

// Application PDF Download Route (outside localization for Filament access)
Route::middleware(['web', \Filament\Http\Middleware\Authenticate::class])->group(function () {
    Route::get('/applications/{application}/pdf', [ApplicationPdfController::class, 'download'])
        ->name('applications.pdf.download');
    Route::get('/members/{member}/idcard/{type?}', [\App\Http\Controllers\MemberIdCardController::class, 'download'])
        ->name('members.idcard.download');
});
