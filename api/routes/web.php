<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLTE;
use App\Http\Controllers\ProductLTE;
use App\Http\Controllers\ShoppingLTE;

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

Route::resource('/admin/users', UserLTE::class);
Route::resource('/admin/products', ProductLTE::class);
Route::resource('/admin/shopping', ShoppingLTE::class);