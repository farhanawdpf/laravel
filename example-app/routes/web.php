<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher;
use App\Http\Controllers\StudentsController;


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

// Route::get('/home', function () {
//     return view('welcome');
// });
Route::get('teacher',[Teacher::class, 'index'])->name('teacher');
// Route::get('/', [StudentsController::class, 'index']);
// Route::post('store', [StudentsController::class, 'store'])->name('store');
// Route::get('create', [StudentsController::class, 'create'])->name('create');
Route::get('/', [StudentsController::class, 'index']);

Route::get('create', [StudentsController::class, 'create'])->name('create');
Route::post('store', [StudentsController::class, 'store'])->name('store');

Route::get('edit/{student_id}', [StudentsController::class, 'update'])->name('edit');

Route::post('edit-store', [StudentsController::class, 'editStore'])->name('editStore');

Route::delete('delete', [StudentsController::class, 'destroy'])->name('delete');
