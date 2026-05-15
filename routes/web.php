<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ExpeditionController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TrekController;
use App\Http\Controllers\WebsiteController;
use App\Http\Middleware\ManageLocaleMddleware;
use Illuminate\Support\Facades\Route;

// Redirect to home page
Route::redirect('/', '/en/home');

// Design preview (dev only — remove or gate when going to production)
Route::view('/style-preview', 'style-preview')->name('style.preview');

Route::get('/change-locale/{locale}', [WebsiteController::class, 'changeLocale'])
    ->name('website.change_locale')
    ->middleware('lscache:no-cache');

Route::middleware([
    ManageLocaleMddleware::class,
    'lscache:max-age=600;public',
    'lstags:sherpalaya_website'
])
    ->prefix('/{locale}')
    ->group(function () {


        // Search route
        Route::prefix('/search')
            ->controller(SearchController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::get('/query', 'query');
            });

        // Website Route
        Route::controller(WebsiteController::class)
            ->group(function () {
                Route::get('/home', 'home')->name('website.home');
                Route::get('/contact', 'contactUs')->name('website.contact');
                Route::post('/contact', 'contactUsSubmit');
                Route::get('/about_us', 'aboutUs')->name('website.company.about_us');
                // Route::get('/our_team', 'ourTeam')->name('website.company.our_team');
            });

        //legal section controller
        Route::controller(LegalController::class)
            ->group(function () {
                Route::get('/cookie-policy', 'cookiePolicy')->name('website.legal.cookie_policy');
                Route::get('/privacy-policy', 'privacyPolicy')->name('website.legal.privacy_policy');
                Route::get('/terms-and-conditions', 'termsAndConditions')->name('website.legal.term_and_condition');
            });

        // Our Team Route
        Route::controller(OurTeamController::class)
            ->prefix('/our-team')
            ->group(function () {
                Route::get('/', 'index')->name('website.company.our_team');
                Route::get('/{id}', 'show')->name('show_team_member');
            });


        // Trek Route
        Route::controller(TrekController::class)
            ->prefix('/treks')
            ->group(function () {
                Route::get('/', 'index')->name('website.trekking');
                Route::get('/{id}', 'show')->name('show_trek');
            });


        // Expedition Route
        Route::controller(ExpeditionController::class)
            ->prefix('/expeditions')
            ->group(function () {
                Route::get('/', 'index')->name('website.expeditions');
                Route::get('/{id}', 'show')->name('show_expedition');
            });

        // Tour Route
        Route::controller(TourController::class)
            ->prefix('/tours')
            ->group(function () {
                Route::get('/', 'index')->name('website.tours');
                Route::get('/{id}', 'show')->name('show_tour');
            });

        // Blog Route
        Route::controller(BlogController::class)
            ->prefix('/blog')
            ->group(function () {
                Route::get('/', 'index')->name('website.blog.index');
                Route::get('/{slug}', 'show')->name('website.blog.show');
            });

        // Booking route

        Route::controller(BookingController::class)
            ->prefix('/bookings')
            ->group(function () {
                Route::post('/booking', 'addBooking');
                Route::post('/inquiry', 'addInquiry');
            });
    });
