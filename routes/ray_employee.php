<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {
        Route::get('/dashboard/ray_employee', function () {
            return view('dashboard.dashboard_ray_employee.dashboard');
        })->middleware(['auth:ray_employee'])->name('dashboard.ray_employee');

        Route::middleware(['auth:ray_employee'])->prefix('ray_employee')->group(function () {
        });

        require __DIR__.'/auth.php';
    });
