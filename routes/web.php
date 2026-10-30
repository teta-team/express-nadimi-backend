<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FallBackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCotrller;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/en');

Route::group(['prefix' => '{lang}', 'where' => ['lang' => 'en|fa|ar'], 'middleware' => ['web', 'locale']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/', [HomeController::class, 'form'])->name('home.post')->middleware('throttle:5,1');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'form'])->name('contact.post')->middleware('throttle:5,1');
    Route::get('/product', [ProductCotrller::class, 'index'])->name('product');
    Route::get('/product/{slug}', [ProductCotrller::class, 'index'])->name('product.show');
    Route::post('/product', [ProductCotrller::class, 'form'])->name('product.post')->middleware('throttle:5,1');
    Route::get('/products', [ProductCotrller::class, 'products'])->name('products');
    Route::get('/supplier', [SuplierController::class, 'index'])->name('supplier');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store')->middleware('throttle:5,1');
    Route::fallback([FallBackController::class, 'index'])->name('fallback');
});
