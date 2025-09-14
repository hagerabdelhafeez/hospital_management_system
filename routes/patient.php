<?php

use App\Http\Controllers\PatientDashboard\PatientController;
use App\Livewire\Chat\CreateChat;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| doctor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {
        Route::get('/dashboard/patient', function () {
            return view('dashboard.dashboard_patient.dashboard');
        })->middleware(['auth:patient'])->name('dashboard.patient');

        Route::middleware(['auth:patient'])->group(function () {
            Route::get('invoices', [PatientController::class, 'invoices'])->name('invoices.patient');
            Route::get('laboratories', [PatientController::class, 'laboratories'])->name('laboratories.patient');
            Route::get('view_laboratories/{id}', [PatientController::class, 'viewLaboratories'])->name('laboratories.view');
            Route::get('rays', [PatientController::class, 'rays'])->name('rays.patient');
            Route::get('view_rays/{id}', [PatientController::class, 'viewRays'])->name('rays.view');
            Route::get('payments', [PatientController::class, 'payments'])->name('payments.patient');
            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/custom/livewire/update', $handle);
            });
            Route::get('list/doctors', CreateChat::class)->name('list.doctors');
            Route::view('chat/doctors', 'dashboard.chat.chat')->name('chat.doctors');
        });

        require __DIR__.'/auth.php';
    });
