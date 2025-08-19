<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/Dashboard_Admin', [DashboardController::class, 'index'])->middleware('auth');
