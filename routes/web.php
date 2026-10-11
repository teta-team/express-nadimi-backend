<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FallBackController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SuplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

route::group(['prefix' => '{lang}'], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/about', [AboutController::class, 'index']);
    Route::get('/contact', [ContactController::class, 'index']);
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/suplier', [SuplierController::class, 'index']);
    // Route::post('/suplier', [SuplierController::class, 'index']);
    route::fallback([FallBackController::class, 'index']);
});
