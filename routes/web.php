<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/products', [ProductController::class, 'index'])->name('index');
Route::get('products/create', [ProductController::class,'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{id}', [ProductController::class,'destroy'])->name('products.destroy');

Route::get('/brand', [BrandController::class, 'index'])->name('brand');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');