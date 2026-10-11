<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FallBackController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SuplierController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'index']);
route::redirect('/', '/en');

route::group(['prefix' => '{lang}'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/suplier', [SuplierController::class, 'index'])->name('suplier');
    // Route::post('/suplier', [SuplierController::class, 'index']);
    route::fallback([FallBackController::class, 'index'])->name('fallback');
});
