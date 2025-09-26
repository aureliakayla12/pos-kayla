<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Categories routes
Route::get('/category', [CategoriesController::class, 'index'])->name('category.index');
//Form tambah kategori
Route::get('/category/create', [CategoriesController::class, 'create'])->name('category.create');
//Simpan kategori baru
Route::post('/category', [CategoriesController::class, 'store'])->name('category.store');
//Form edit kategori
Route::get('/category/{id}/edit', [CategoriesController::class, 'edit'])->name('category.edit');
//Update kategoru
Route::put('/category/{id}', [CategoriesController::class, 'update'])->name('category.update');
//Hapus kategori
Route::delete('/category/{id}', [CategoriesController::class, 'destroy'])->name('category.destroy');


//Customers routes
Route::get('/customers', [CustomersController::class, 'index'])->name('customer.index');
//Form tambah customer
Route::get('/customers/create', [CustomersController::class, 'create'])->name('customer.create');
//Simpan customer baru
Route::post('/customers', [CustomersController::class, 'store'])->name('customer.store');
//Form edit customer
Route::get('/customers/{id}/edit', [CustomersController::class, 'edit'])->name('customer.edit');
//Update customer
Route::put('/customers/{id}', [CustomersController::class, 'update'])->name('customer.update');
//Hapus customer
Route::delete('/customers/{id}', [CustomersController::class, 'destroy'])->name('customer.destroy');


//Products routes
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
//Form tambah product
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
//Simpan product baru
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
//Form edit product
Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
//Update product
Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
//Hapus product
Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');

