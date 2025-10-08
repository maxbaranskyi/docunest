<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.mail');
})->name('main');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
});
