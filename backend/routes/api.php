<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ShoppingController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\AuthenticationController;
use App\Http\Controllers\api\UserController;

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

Route::middleware('web')->prefix('authentication')->group(function () {
    Route::get('login', [AuthenticationController::class, 'show']);
    Route::get('logout', [AuthenticationController::class, 'destroy']);
    Route::get('csrf-token', [AuthenticationController::class, 'show_token']);
    Route::post('register-user', [AuthenticationController::class, 'create']);
});

Route::middleware('web')->prefix('users')->group(function () {
    Route::get('retrieve-user', [UserController::class, 'show']);
    Route::put('update-user', [UserController::class, 'update']);
});

Route::prefix('products')->group(function () {
    Route::get('retrieve-products', [ProductController::class, 'index']);
    Route::get('retrieve-product', [ProductController::class, 'show']);
});

Route::middleware('web')->prefix('shopping')->group(function () {
    Route::get('retrieve-shopping', [ShoppingController::class, 'index']);
    Route::get('obtain-single-shopping', [ShoppingController::class, 'show2']);
    Route::get('obtain-user-shopping', [ShoppingController::class, 'show']);
    Route::post('create-shopping', [ShoppingController::class, 'create']);
    Route::delete('delete-shopping/{id}', [ShoppingController::class, 'destroy']);
});