<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/website', [\App\Http\Controllers\HomeController::class, 'getProducts'])->name('getProducts ');
Route::get('/viewcart', [\App\Http\Controllers\HomeController::class, 'viewcart'])->name('viewcart ');
Route::get('/order', [\App\Http\Controllers\HomeController::class, 'order'])->name('order');

Auth::routes();
Route::group(['middleware' => ['auth', 'isAdmin']], function (){
    Route::get('/dashboard', function () {
        return view('layouts.dashboard');
    });
    Route::resource('companies', \App\Http\Controllers\CompanyController::class);
    Route::get('delete/{company}',[App\Http\Controllers\CompanyController::class, 'destroy'])->name('delete_company');

    Route::resource('employees',\App\Http\Controllers\EmployeesController::class);
    Route::get('delete_employee/{employee}',[App\Http\Controllers\EmployeesController::class,'destroy'])->name('delete_employee');
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::get('delete_category/{category}', [App\Http\Controllers\CategoryController::class,'destroy'])->name('delete_category');

    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::get('delete_product/{product}', [App\Http\Controllers\ProductController::class,'destroy'])->name('delete_product');



});
Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


// Add to Cart Routes
Route::get('cart', [\App\Http\Controllers\CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [\App\Http\Controllers\CartController::class, 'update'])->name('update.cart');
Route::get('remove-from-cart/{id}', [\App\Http\Controllers\CartController::class, 'remove'])->name('remove.from.cart');

// Stripe Routes
Route::post('stripe', [\App\Http\Controllers\StripeController::class, 'stripePost'])->name('stripe.post')->middleware('auth');

Route::post('search',[\App\Http\Controllers\ProductController::class,'search'])->name('search');
Route::get('viewcart',[\App\Http\Controllers\CartController::class,'viewcart'])->name('viewcart');
