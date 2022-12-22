<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InOutController;
use App\Http\Controllers\ItemsController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// User Controller
Route::resource('user', UserController::class)->middleware('auth');

// Items Controller
Route::resource('items', ItemsController::class);
Route::post('items/addStock/{id}', [ItemsController::class, 'addStock'])->name('addStock');

// Sale Controller
Route::resource('sale', SaleController::class)->middleware('auth');

// In Out Controller
Route::resource('inout', InOutController::class)->middleware('auth');

// Category Controller
Route::resource('category', CategoryController::class)->middleware('auth');

Auth::routes();


