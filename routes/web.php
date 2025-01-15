<?php

use Illuminate\Support\Facades\Route;


Route::middleware(["authMiddleware"])->group(function () {
    Route::resource('people', \App\Http\Controllers\PersonController::class);
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(["authOkMiddleware"])->group(function () {
    Route::get('/auth', [\App\Http\Controllers\AuthController::class, 'index'])->name('auth');
    Route::post('/auth', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('auth');
});

