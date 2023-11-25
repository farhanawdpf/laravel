<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PhoneController;
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
Route::get('/home',[ProductController::class, 'index'])->name('home');
// Route::get('/home',[PhoneController::class, 'index'])->name('home');
Route::get('/student',[StudentController::class, 'index'])->name('student');
Route::get('students/create', [App\Http\Controllers\StudentController::class, 'create']);
Route::post('students', [App\Http\Controllers\StudentController::class, 'store']);
