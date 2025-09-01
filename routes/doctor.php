<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Doctor\InvoiceController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {
        Route::get('/dashboard/doctor', function () {
            return view('dashboard.doctor.dashboard');
        })->middleware(['auth:doctor'])->name('dashboard.doctor');

        Route::middleware(['auth:doctor'])->prefix('doctor')->group(function () {
            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/custom/livewire/update', $handle);
            });
            Route::resource('invoices', InvoiceController::class);
        });

        require __DIR__.'/auth.php';
    });
