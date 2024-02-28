<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Product\ProductController;

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/products', [ProductController::class, 'index'])->middleware('auth')->name('product.index');

Route::post('/cart/add', [CartController::class, 'addToCart'])->middleware('auth')->name('cart.add');
Route::get('/cart', [CartController::class,'index'])->middleware('auth')->name('cart.index');
Route::delete('/cart/{id}', [CartController::class,'removeFromCart'])->middleware('auth')->name('cart.remove');
