<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\AuthController;

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

//Login
Route::get('/', [AuthController::class, 'showformlogin'])->name('login');
Route::post('/login', [AuthController::class, 'proseslogin'])->name('login.proseslogin');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


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

//Users routes
Route::get('/user', [UsersController::class, 'index'])->name('user.index');
Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
Route::post('/user', [UsersController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UsersController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UsersController::class, 'destroy'])->name('user.destroy');

//Transactions routes
Route::get('/transactions', [TransactionsController::class, 'index'])->name('transactions.index');
//Form tambah transaction
Route::get('/transactions/create', [TransactionsController::class, 'create'])->name('transactions.create');
//Simpan transaction baru
Route::post('/transactions', [TransactionsController::class, 'store'])->name('transactions.store');
Route::get('/transactions/{id}/show', [TransactionsController::class, 'show'])->name('transactions.show');
Route::delete('/transactions/{id}', [TransactionsController::class, 'destroy'])->name('transactions.destroy');
Route::get('/transactions/{id}/print', [TransactionsController::class, 'print'])->name('transactions.print');



