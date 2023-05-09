<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsLTE;
use App\Http\Controllers\ProductLTE;
use App\Http\Controllers\ShoppingLTE;

use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/logout', function () {
    Auth::logout();
    // Redirigir a la página de inicio de sesión
    return redirect()->route('login');
})->name('logout');

Route::resource('/admin/users', UsLTE::class);
Route::resource('/admin/products', ProductLTE::class);
Route::resource('/admin/shopping', ShoppingLTE::class);