<?php

use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\PaymentAccountController;
use App\Http\Controllers\Dashboard\ReceiptAccountController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\SingleServiceController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
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

        // ################# Admin Dashboard Routes ######################
        Route::get('/dashboard/admin', function () {
            return view('dashboard.admin.dashboard');
        })->middleware(['auth:admin'])->name('dashboard.admin');

        // ################# End Admin Dashboard Routes ##################

        Route::middleware(['auth:admin'])->group(function () {
            Route::resource('sections', SectionController::class);
            Route::resource('doctors', DoctorController::class);
            Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
            Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status');
            Route::resource('services', SingleServiceController::class);
            Route::resource('insurances', InsuranceController::class);
            Route::resource('ambulances', AmbulanceController::class);
            Route::resource('patients', PatientController::class);
            Route::resource('Receipt', ReceiptAccountController::class);
            Route::resource('Payment', PaymentAccountController::class);
            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/custom/livewire/update', $handle);
            });
            Route::view('add_group_services', 'livewire.GroupServices.include_create')->name('Add_GroupServices');
            Route::view('single_invoices', 'livewire.single_invoices.index')->name('single_invoices');
            Route::view('Print_single_invoices', 'livewire.single_invoices.print')->name('Print_single_invoices');

            Route::view('group_invoices', 'livewire.Group_invoices.index')->name('group_invoices');
            Route::view('group_Print_single_invoices', 'livewire.Group_invoices.print')->name('group_Print_single_invoices');
        });

        require __DIR__.'/auth.php';
    });
