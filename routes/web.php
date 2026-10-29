<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FallBackController;
use App\Http\Controllers\HomeController;
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
    Route::get('/products', [\App\Http\Controllers\Panel\PageController::class, 'index'])->name('panel.products');
    Route::get('/products/create', [\App\Http\Controllers\Panel\PageController::class, 'createProduct'])->name('panel.products.create');
    Route::post('/products', [\App\Http\Controllers\Panel\PageController::class, 'storeProduct'])->name('panel.products.store');
    Route::get('/products/{product}/edit', [\App\Http\Controllers\Panel\PageController::class, 'editProduct'])->name('panel.products.edit');
    Route::put('/products/{product}', [\App\Http\Controllers\Panel\PageController::class, 'updateProduct'])->name('panel.products.update');
    Route::delete('/products/{product}', [\App\Http\Controllers\Panel\PageController::class, 'destroyProduct'])->name('panel.products.destroy');
});

Route::middleware(['web', 'auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get(
            '/dashboard',
            [\App\Http\Controllers\Admin\DashboardController::class, 'index']
        )->name('dashboard');

        Route::get(
            '/products/trash',
            [\App\Http\Controllers\Admin\ProductController::class, 'trash']
        )->name('products.trash');

        Route::post(
            '/products/{id}/restore',
            [\App\Http\Controllers\Admin\ProductController::class, 'restore']
        )->whereNumber('id')->name('products.restore');

        Route::delete('/products/{id}/force-delete', [
            \App\Http\Controllers\Admin\ProductController::class,
            'forceDelete',
        ])
            ->whereNumber('id')
            ->name('products.forceDelete');

        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)
            ->except(['show']);
    });

Route::group(['prefix' => '{lang}', 'where' => ['lang' => 'en|fa|ar'], 'middleware' => ['web', 'locale']], function () {
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

// Panel product CRUD
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/panel/products', [\App\Http\Controllers\Panel\ProductController::class, 'index']);
    Route::post('/panel/products', [\App\Http\Controllers\Panel\ProductController::class, 'store']);
    Route::put('/panel/products/{product}', [\App\Http\Controllers\Panel\ProductController::class, 'update']);
    Route::patch('/panel/products/{product}', [\App\Http\Controllers\Panel\ProductController::class, 'update']);
    Route::delete('/panel/products/{product}', [\App\Http\Controllers\Panel\ProductController::class, 'destroy']);
});
