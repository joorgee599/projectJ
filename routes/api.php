<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login',[AuthController::class,'login'])->name('login');

Route::middleware('auth:sanctum')->group(function(){

    Route::post('logout',[AuthController::class,'logout']);

    Route::resource('products', ProductController::class);

    Route::resource(('users'), UserController::class);
    
}

);
