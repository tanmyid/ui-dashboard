<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('layouts.app');
})->name('dashboard');

Route::get('/dashboard/examples', function () {
    return view('examples.halaman');
})->name('example-halaman');
