<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function() {
    Route::get('/signin', [AuthenticatedSessionController::class, 'loginPage'])->name('signin');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

    Route::get('/signup', [RegisteredUserController::class, 'registerPage'])->name(('signup'));
    Route::post('/register', [RegisteredUserController::class, 'store'])->name(('register'));
});