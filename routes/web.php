<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FallBackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Panel\PageController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ProductCotrller;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('language.select');
Route::get('/panel', [PanelController::class, 'index'])->name('panel');
Route::get('/login', [PanelController::class, 'index'])->name('login');
Route::post('/panel', [PanelController::class, 'login']);
Route::post('/login', [PanelController::class, 'login']);
Route::post('/panel/logout', [PanelController::class, 'logout'])->name('logout');
Route::post('/panel/account', [PanelController::class, 'updateAccount'])->middleware(['auth', 'throttle:10,1'])->name('panel.account');

Route::middleware(['web', 'auth'])->prefix('panel')->group(function () {
    Route::get('/products', [PageController::class, 'index'])->name('panel.products');
    Route::get('/products/create', [PageController::class, 'createProduct'])->name('panel.products.create');
    Route::post('/products', [PageController::class, 'storeProduct'])->name('panel.products.store')->middleware('throttle:10,1');
    Route::get('/products/{product}/edit', [PageController::class, 'editProduct'])->name('panel.products.edit');
    Route::put('/products/{product}', [PageController::class, 'updateProduct'])->name('panel.products.update');
    Route::delete('/products/{product}', [PageController::class, 'destroyProduct'])->name('panel.products.destroy');
});

Route::middleware(['web', 'auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/products/trash', [ProductController::class, 'trash'])->name('products.trash');
        Route::post('/products/{id}/restore', [ProductController::class, 'restore'])->whereNumber('id')->name('products.restore');
        Route::delete('/products/{id}/force-delete', [ProductController::class, 'forceDelete'])->whereNumber('id')->name('products.forceDelete');
        Route::resource('products', ProductController::class)->except(['show']);
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

        Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/trash', [ContactMessageController::class, 'trash'])->name('messages.trash');
        Route::get('/messages/{id}', [ContactMessageController::class, 'show'])->whereNumber('id')->name('messages.show');
        Route::post('/messages/{id}/review', [ContactMessageController::class, 'review'])->whereNumber('id')->name('messages.review');
        Route::patch('/messages/{id}/status', [ContactMessageController::class, 'updateStatus'])->whereNumber('id')->name('messages.updateStatus');
        Route::post('/messages/{id}/archive', [ContactMessageController::class, 'archive'])->whereNumber('id')->name('messages.archive');
        Route::post('/messages/{id}/unarchive', [ContactMessageController::class, 'unarchive'])->whereNumber('id')->name('messages.unarchive');
        Route::delete('/messages/{id}', [ContactMessageController::class, 'destroy'])->whereNumber('id')->name('messages.destroy');
        Route::post('/messages/{id}/restore', [ContactMessageController::class, 'restore'])->whereNumber('id')->name('messages.restore');
        Route::delete('/messages/{id}/force-delete', [ContactMessageController::class, 'forceDelete'])->whereNumber('id')->name('messages.forceDelete');

        Route::get('/settings', [SettingsController::class, 'edit'])->name('settings');
        Route::post('/settings', [SettingsController::class, 'update'])->middleware('throttle:10,1')->name('settings.update');
    });

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

// Panel product CRUD
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/panel/products', [App\Http\Controllers\Panel\ProductController::class, 'index']);
    Route::post('/panel/products', [App\Http\Controllers\Panel\ProductController::class, 'store']);
    Route::put('/panel/products/{product}', [App\Http\Controllers\Panel\ProductController::class, 'update']);
    Route::patch('/panel/products/{product}', [App\Http\Controllers\Panel\ProductController::class, 'update']);
    Route::delete('/panel/products/{product}', [App\Http\Controllers\Panel\ProductController::class, 'destroy']);
});
