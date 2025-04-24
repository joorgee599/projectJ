<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'indexLogin']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::group(['prefix' => 'admin' ,'as' => 'admin.' , 'middleware' =>['auth']],function(){

     Route::get('dashboard' ,[HomeController::class,'index'])->name('dashboard');
     Route::resource('users', UserController::class);
     Route::resource('roles', RoleController::class);
     Route::resource('products', ProductController::class);
     Route::resource('categories', CategoryController::class);
     Route::resource('brands', BrandController::class);
 });

// Route::get('dashboard',function(){
//     return view('home.dashboard');
// })->middleware(['auth'])->name('dashboard');
