<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SectionController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/Dashboard_Admin', [DashboardController::class, 'index']);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {
        // ################# User Dashboard Routes #####################

        Route::get('/dashboard/user', function () {
            return view('dashboard.user.dashboard');
        })->middleware(['auth'])->name('dashboard.user');

        // ################# End User Dashboard Routes ###################

        // ################# Admin Dashboard Routes ######################
        Route::get('/dashboard/admin', function () {
            return view('dashboard.admin.dashboard');
        })->middleware(['auth:admin'])->name('dashboard.admin');

        // ################# End Admin Dashboard Routes ##################

        Route::middleware(['auth:admin'])->group(function () {
            // ################# Sections Routes #####################

            Route::resource('sections', SectionController::class);

            // ################# End Sections Routes ##################
        });

        require __DIR__.'/auth.php';
    });
