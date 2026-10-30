<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FallBackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCotrller;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Language Selection
|--------------------------------------------------------------------------
*/

Route::view('/', 'index')->name('language.select');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:10,1');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['web', 'auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [
            DashboardController::class,
            'index',
        ])->name('dashboard');

        // Products
        Route::get('/products/trash', [
            ProductController::class,
            'trash',
        ])->name('products.trash');

        Route::post('/products/{id}/restore', [
            ProductController::class,
            'restore',
        ])->whereNumber('id')->name('products.restore');

        Route::delete('/products/{id}/force-delete', [
            ProductController::class,
            'forceDelete',
        ])->whereNumber('id')->name('products.forceDelete');

        Route::resource('products', ProductController::class)
            ->except(['show']);

        // Requests
        Route::get('/Request', [
            RequestController::class,
            'index',
        ])->name('Request');

        Route::get('/Request/trash', [
            RequestController::class,
            'trash',
        ])->name('Request.trash');

        Route::get('/Request/{type}/{id}', [
            RequestController::class,
            'show',
        ])->where([
            'type' => 'price|supplier',
            'id' => '[0-9]+',
        ])->name('Request.show');

        Route::post('/Request/{type}/{id}/review', [
            RequestController::class,
            'review',
        ])->where([
            'type' => 'price|supplier',
            'id' => '[0-9]+',
        ])->name('Request.review');

        Route::patch('/Request/{type}/{id}/status', [
            RequestController::class,
            'updateStatus',
        ])->where([
            'type' => 'price|supplier',
            'id' => '[0-9]+',
        ])->name('Request.updateStatus');

        Route::post('/Request/{type}/{id}/archive', [
            RequestController::class,
            'archive',
        ])->where([
            'type' => 'price|supplier',
            'id' => '[0-9]+',
        ])->name('Request.archive');

        Route::post('/Request/{type}/{id}/unarchive', [
            RequestController::class,
            'unarchive',
        ])->where([
            'type' => 'price|supplier',
            'id' => '[0-9]+',
        ])->name('Request.unarchive');

        Route::delete('/Request/{type}/{id}', [
            RequestController::class,
            'destroy',
        ])->where([
            'type' => 'price|supplier',
            'id' => '[0-9]+',
        ])->name('Request.destroy');

        Route::post('/Request/{type}/{id}/restore', [
            RequestController::class,
            'restore',
        ])->where([
            'type' => 'price|supplier',
            'id' => '[0-9]+',
        ])->name('Request.restore');

        Route::delete('/Request/{type}/{id}/force-delete', [
            RequestController::class,
            'forceDelete',
        ])->where([
            'type' => 'price|supplier',
            'id' => '[0-9]+',
        ])->name('Request.forceDelete');

        // Contact Messages
        Route::get('/messages', [
            ContactMessageController::class,
            'index',
        ])->name('messages.index');

        Route::get('/messages/trash', [
            ContactMessageController::class,
            'trash',
        ])->name('messages.trash');

        Route::get('/messages/{id}', [
            ContactMessageController::class,
            'show',
        ])->whereNumber('id')->name('messages.show');

        Route::post('/messages/{id}/review', [
            ContactMessageController::class,
            'review',
        ])->whereNumber('id')->name('messages.review');

        Route::patch('/messages/{id}/status', [
            ContactMessageController::class,
            'updateStatus',
        ])->whereNumber('id')->name('messages.updateStatus');

        Route::post('/messages/{id}/archive', [
            ContactMessageController::class,
            'archive',
        ])->whereNumber('id')->name('messages.archive');

        Route::post('/messages/{id}/unarchive', [
            ContactMessageController::class,
            'unarchive',
        ])->whereNumber('id')->name('messages.unarchive');

        Route::delete('/messages/{id}', [
            ContactMessageController::class,
            'destroy',
        ])->whereNumber('id')->name('messages.destroy');

        Route::post('/messages/{id}/restore', [
            ContactMessageController::class,
            'restore',
        ])->whereNumber('id')->name('messages.restore');

        Route::delete('/messages/{id}/force-delete', [
            ContactMessageController::class,
            'forceDelete',
        ])->whereNumber('id')->name('messages.forceDelete');

        // Settings
        Route::get('/settings', [
            SettingsController::class,
            'edit',
        ])->name('settings');

        Route::post('/settings', [
            SettingsController::class,
            'update',
        ])->middleware('throttle:10,1')->name('settings.update');
    });

/*
|--------------------------------------------------------------------------
| Public Website
|--------------------------------------------------------------------------
*/

Route::group([
    'prefix' => '{lang}',
    'where' => ['lang' => 'en|fa|ar'],
    'middleware' => ['web', 'locale'],
], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/', [HomeController::class, 'form'])->name('home.post');

    Route::get('/about', [AboutController::class, 'index'])->name('about');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'form'])->name('contact.post');

    Route::get('/product', [ProductCotrller::class, 'index'])->name('product');
    Route::get('/product/{slug}', [ProductCotrller::class, 'index'])->name('product.show');
    Route::post('/product', [ProductCotrller::class, 'form'])->name('product.post');

    Route::get('/products', [ProductCotrller::class, 'products'])->name('products');

    Route::get('/supplier', [SuplierController::class, 'index'])->name('supplier');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');

    Route::fallback([FallBackController::class, 'index'])->name('fallback');
});
