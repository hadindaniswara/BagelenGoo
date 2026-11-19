<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::redirect('/home', '/');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::prefix('product')->group(function () {

    Route::get('/', [ProductController::class, 'index'])
        ->name('product.index');

    Route::get('/{slug}', [ProductController::class, 'show'])
        ->name('product.show');

});

Route::get('/our-team/{name?}', function ($name = null) {
    return view('our-team', ['name' => $name]);
})->name('team');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact');

Route::fallback(function () {
    return response()->view('fallback', [], 404);
});