<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/index', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
Route::get('/admin/{id}', [App\Http\Controllers\UsersController::class, 'admin'])->name('users.admin');
Route::get('/register', [App\Http\Controllers\UsersController::class, 'create'])->name('users.register');
Route::get('/store', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');

Route::get('/index', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');
Route::get('/create', [App\Http\Controllers\ProductsController::class, 'create'])->name('products.create');
Route::get('/store', [App\Http\Controllers\ProductsController::class, 'store'])->name('products.store');
Route::get('/products', [App\Http\Controllers\ProductsController::class, 'admin'])->name('products.admin');