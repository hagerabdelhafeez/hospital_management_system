<?php

use App\Http\Controllers\RayEmployeeDashboard\InvoiceController;
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

        Route::middleware(['auth:ray_employee'])->group(function () {
            Route::resource('invoices_ray_employee', InvoiceController::class);
            Route::get('completed_Invoices', [InvoiceController::class, 'completedInvoices'])->name('completedInvoices');
            Route::get('view_rays/{id}', [InvoiceController::class, 'viewRays'])->name('view_rays');
        });

        require __DIR__.'/auth.php';
    });
