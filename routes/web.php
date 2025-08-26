<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/feature', function () {
    return view('feature');
})->name('feature');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/role', function () {
    return view('auth.role');
})->name('role');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Route::get('/company-code', function () {
    return view('admin.company-code');
})->name('company-code');

Route::get('/queue', function () {
    return view('admin.queue');
})->name('queue');

Route::get('/reject', function () {
    return view('admin.reject');
})->name('reject');

Route::get('/company-basic-info', function () {
    return view('owner.company-basic-info');
})->name('company-basic-info');

Route::get('/company-info-advance', function () {
    return view('owner.company-info-advance');
})->name('company-info-advance');

//I LOVE LARAVEL❤️❤️
