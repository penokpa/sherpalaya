<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ExpeditionController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\PeakController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TrekController;
use App\Http\Controllers\WebsiteController;
use App\Http\Middleware\ManageLocaleMddleware;
use Illuminate\Support\Facades\Route;

// Redirect to home page
Route::redirect('/', '/home');

Route::middleware(ManageLocaleMddleware::class)
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
                Route::get('/change-locale/{locale}', 'changeLocale')->name('website.change_locale');
                // Route::get('/our_team', 'ourTeam')->name('website.company.our_team');
            });

        //legal section controller
        Route::controller(LegalController::class)
            ->group(function () {
                Route::get('/cookie-policy', 'cookiePolicy')->name('website.legal.cookie_policy');
                Route::get('/privacy-policy', 'privacyPolicy')->name('website.legal.privacy_policy');
                Route::get('/terms-and-conditions', 'termsAndConditions')->name('website.legal.term_and_condition');
            });

        // Service Route
        Route::controller(ServiceController::class)
            ->prefix('/services')
            ->group(function () {
                Route::get('/', 'index')->name('website.company.our_service');
                Route::get('/{id}', 'show')->name('show_service');
            });


        // Our Team Route
        Route::controller(OurTeamController::class)
            ->prefix('/sherpas')
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


        // Peak Route
        Route::controller(PeakController::class)
            ->prefix('/peaks')
            ->group(function () {
                Route::get('/', 'index')->name('website.peaks');
                Route::get('/{id}', 'show')->name('show_peak');
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

        // Booking route

        Route::controller(BookingController::class)
            ->prefix('/bookings')
            ->group(function () {
                Route::post('/booking', 'addBooking');
                Route::post('/inquiry', 'addInquiry');
            });
    });
