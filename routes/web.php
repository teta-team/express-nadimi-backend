<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FallBackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCotrller;
use App\Http\Controllers\SuplierController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('language.select');

Route::group(['prefix' => '{lang}', 'where' => ['lang' => 'en|fa|ar']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/product', [ProductCotrller::class, 'index'])->name('product');
    Route::get('/products', [ProductCotrller::class, 'products'])->name('products');
    Route::get('/supplier', [SuplierController::class, 'index'])->name('supplier');
    Route::post('/supplier', [SuplierController::class, 'index'])->name('supplier');
    Route::fallback([FallBackController::class, 'index'])->name('fallback');
});
