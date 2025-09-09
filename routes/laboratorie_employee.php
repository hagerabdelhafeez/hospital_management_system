<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {
        Route::get('/dashboard/laboratorie_employee', function () {
            return view('dashboard.dashboard_laboratorie_employee.dashboard');
        })->middleware(['auth:laboratorie_employee'])->name('dashboard.laboratorie_employee');

        Route::middleware(['auth:laboratorie_employee'])->group(function () {
        });

        require __DIR__.'/auth.php';
    });
