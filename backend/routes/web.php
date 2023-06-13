<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsLTE;
use App\Http\Controllers\ProductLTE;
use App\Http\Controllers\ShoppingLTE;
use App\Models\User;
use Illuminate\Http\Request;
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
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');


    //CRUD
    Route::resource('/admin/users', UsLTE::class);
    Route::resource('/admin/products', ProductLTE::class);
    Route::resource('/admin/shopping', ShoppingLTE::class);
});
