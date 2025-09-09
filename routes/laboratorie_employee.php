<?php

use App\Http\Controllers\LaboratorieEmployeeDashboard\InvoiceController;
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
            Route::resource('invoices_laboratorie_employee', InvoiceController::class);
            Route::get('completed_invoices', [InvoiceController::class, 'completed_invoices'])->name('laboratorie_completed_invoices');
            Route::get('view_laboratories/{id}', [InvoiceController::class, 'view_laboratories'])->name('view_laboratories');
        });

        require __DIR__.'/auth.php';
    });
