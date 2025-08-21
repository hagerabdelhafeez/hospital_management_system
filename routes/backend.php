<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/Dashboard_Admin', [DashboardController::class, 'index']);

Route::get('/dashboard/user', function () {
    return view('dashboard.user.dashboard');
})->middleware(['auth'])->name('dashboard.user');

Route::get('/dashboard/admin', function () {
    return view('dashboard.admin.dashboard');
})->middleware(['auth:admin'])->name('dashboard.admin');

require __DIR__.'/auth.php';
