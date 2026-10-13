<?php

use Illuminate\Support\Facades\Route;

// 1. Home Page
Route::get('/', function () {
    return view('home');
});

// 2. Redirect Route
Route::redirect('/home', '/');

// 3. About Page
Route::get('/about', function () {
    return view('about');
});

// 4. Route Group untuk Product
Route::prefix('product')->group(function () {
    Route::get('/', function () {
        return view('product');
    });
    
    Route::get('/{slug}', function ($slug) {
        return view('product', ['slug' => $slug]);
    });
});

// 5. Our Team Page
Route::get('/our-team/{name?}', function ($name = null) {
    return view('our-team', ['name' => $name]);
});

// 6. Contact Us Page
Route::get('/contact-us', function () {
    return view('contact-us');
});

// 7. Fallback Route
Route::fallback(function () {
    return view('fallback');
});