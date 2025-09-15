<?php

use App\Http\Controllers\Doctor\InvoiceController;
use App\Http\Controllers\DoctorDashboard\DiagnosticController;
use App\Http\Controllers\DoctorDashboard\LaboratorieController;
use App\Http\Controllers\DoctorDashboard\PatientDetailsController;
use App\Http\Controllers\DoctorDashboard\RayController;
use App\Livewire\Chat\CreateChat;
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
            Route::get('completed_invoices', [InvoiceController::class, 'completedInvoices'])->name('completed_Invoices');
            Route::get('review_invoices', [InvoiceController::class, 'reviewInvoices'])->name('reviewInvoices');
            Route::resource('invoices', InvoiceController::class);
            Route::post('add_review', [DiagnosticController::class, 'addReview'])->name('add_review');
            Route::resource('diagnostics', DiagnosticController::class);
            Route::resource('rays', RayController::class);
            Route::resource('Laboratories', LaboratorieController::class);
            Route::get('show_laboratorie/{id}', [InvoiceController::class, 'showLaboratorie'])->name('show.laboratorie');
            Route::get('patient_details/{id}', [PatientDetailsController::class, 'index'])->name('patient_details');
            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/custom/livewire/update', $handle);
            });
            Route::get('list/patients', CreateChat::class)->name('list.patients');
            Route::view('chat/patients', 'dashboard.chat.chat')->name('chat.patients');
        });

        Route::get('/404', function () {
            return view('dashboard.404');
        })->name('404');

        require __DIR__.'/auth.php';
    });
