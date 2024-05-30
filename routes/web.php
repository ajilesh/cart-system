<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CurrencyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
//product controllers
Route::get('/',[ProductController::class,'index'])->name('product.index');
Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::get('/cart-remove/{id}',[CartController::class,'remove'])->name('cart.remove');
Route::get('/cart-increment/{id}',[CartController::class,'increment'])->name('cart.increment');
Route::get('/cart-decrement/{id}',[CartController::class,'decrement'])->name('cart.decrement');
Route::get('/cart-add/{id}',[CartController::class,'add'])->name('cart.add');
//currency
Route::post('set-currency',[CurrencyController::class,'setCurrency'])->name('currency.setCurrency');
Route::resource('/currency',CurrencyController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

require __DIR__ .'/Admin/cart.php';
require __DIR__ .'/Admin/currency.php';
