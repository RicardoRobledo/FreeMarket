<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\ShoppingController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\AuthenticationController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('authentication')->group(function () {
    Route::get('login', [AuthenticationController::class, 'show']);
    Route::get('logout', [AuthenticationController::class, 'destroy']);
    Route::post('register', [AuthenticationController::class, 'create']);
});

Route::prefix('products')->group(function () {
    Route::get('retrieve-products', [ProductController::class, 'index']);
    Route::get('retrieve-product', [ProductController::class, 'show']);
});

Route::prefix('shopping')->group(function () {
    Route::get('retrieve-shopping', [ShoppingController::class, 'index']);
    Route::get('obtain-shopping', [ShoppingController::class, 'show2']);
    Route::get('obtain-user-shopping', [ShoppingController::class, 'show']);
});