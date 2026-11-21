<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminAuthController;

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

// Jalur customer
Route::get('/order', [OrderController::class, 'create'])->name('orders.create');
Route::post('/order', [OrderController::class, 'store'])->name('orders.store');
Route::get('/order/sukses/{order:order_code}', [OrderController::class, 'success'])->name('orders.success');

// Login admin
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Jalur admin (wajib login)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('orders', OrderController::class)->except(['create', 'store']);
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