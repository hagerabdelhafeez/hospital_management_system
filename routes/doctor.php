<?php

use App\Http\Controllers\Doctor\InvoiceController;
use App\Http\Controllers\DoctorDashboard\DiagnosticController;
use App\Http\Controllers\DoctorDashboard\LaboratorieController;
use App\Http\Controllers\DoctorDashboard\PatientDetailsController;
use App\Http\Controllers\DoctorDashboard\RayController;
use Illuminate\Support\Facades\Route;
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
            Route::get('completed_invoices', [InvoiceController::class, 'completedInvoices'])->name('completedInvoices');
            Route::get('review_invoices', [InvoiceController::class, 'reviewInvoices'])->name('reviewInvoices');
            Route::resource('invoices', InvoiceController::class);
            Route::post('add_review', [DiagnosticController::class, 'addReview'])->name('add_review');
            Route::resource('diagnostics', DiagnosticController::class);
            Route::resource('rays', RayController::class);
            Route::resource('Laboratories', LaboratorieController::class);
            Route::get('patient_details/{id}', [PatientDetailsController::class, 'index'])->name('patient_details');
        });

        Route::get('/404', function () {
            return view('dashboard.404');
        })->name('404');

        require __DIR__.'/auth.php';
    });
