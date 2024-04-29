<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/category-products', [HomeController::class, 'categoryProducts'])->name('categories');
Route::get('/product-details/{id}', [HomeController::class, 'productDetails'])->name('product-details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/manage-product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create-product', [ProductController::class, 'create'])->name('product.create');
    Route::post('/new-product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});
