<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BusController;
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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('master');
});
Route::get('/add-user', function () {
    return view('pages.user.add_user');
});
Route::get('/manage-user', function () {
    return view('pages.user.manage_users');
});
Route::get('/type', function () {
    return view('pages.one-to-one.add_type');
});
Route::get('/manage-type', function () {
    return view('pages.one-to-one.type_list');
});
Route::get('/manage-type',[TypeController::class, 'index'])->name('manage-type');
Route::get('/manage-post',[PostController::class, 'index'])->name('manage-post');
Route::get('/manage-bus',[BusController::class, 'index'])->name('manage-bus');
