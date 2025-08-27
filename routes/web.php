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


//Dashboards Utama
Route::get('/owner', function () {
    return view('dashboard.owner');
})->name('owner');

Route::get('/admin', function () {
    return view('dashboard.admin');
})->name('admin');

Route::get('/ownernavbar', function () {
    return view('layouts.ownernavbar');
})->name('ownernavbar');

Route::get('/adminnavbar', function () {
    return view('layouts.adminnavbar');
})->name('adminnavbar');


//Products
Route::get('product', function () {
    return view('products.product');
})->name('product');

Route::get('product/create', function () {
    return view('products.create');
})->name('product/create');

Route::get('product/edit', function () {
    return view('products.edit');
})->name('product/edit');


//Customers
Route::get('/customer', function () {
    return view('customers.customer');
})->name('customer');

Route::get('/customer/create', function () {
    return view('customers.create');
})->name('/customer/create');

Route::get('/customer/edit', function () {
    return view('customers.edit');
})->name('/customer/edit');


//Invoices
Route::get('/invoice', function () {
    return view('invoices.invoice');
})->name('invoice');

Route::get('/customer/create', function () {
    return view('customers.create');
})->name('/customer/create');

Route::get('/customer/edit', function () {
    return view('customers.edit');
})->name('/customer/edit');




//I LOVE LARAVEL❤️❤️
