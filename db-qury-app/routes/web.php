<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product',[ProductController::class, 'index'])->name('product');
Route::get('/product/{id}',[ProductController::class, 'singleProduct'])->name('singleProduct');
Route::get('/delete/{id}',[ProductController::class, 'deleteProduct'])->name('deleteProduct');
Route::post('/add-product',[ProductController::class, 'addProduct'])->name('addProduct');
Route::get('/add-product',[ProductController::class, 'create'])->name('add-product');
