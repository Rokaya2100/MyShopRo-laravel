<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\UserController;

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

Auth::routes();
Route::get('/',function(){
    return view('welcome');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('is_admin')->group(function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');

    Route::get('/products/archive',[ProductController::class,'archive'])->name('products.archive');
    Route::delete('/forcedelete/{product}',[ProductController::class,'forceDelete'])->name('products.forcedelete');
    Route::post('/{product}/restore',[ProductController::class,'restore'])->name('products.restore');
    Route::get('/products/search',[ProductController::class,'search'])->name('product.search');
    Route::resource('/products',ProductController::class);

    Route::get('/customer/search',[UserController::class,'search'])->name('user.search');
    Route::get('/customers',[UserController::class,'index'])->name('users.index');
    Route::get('/customer/{user}',[UserController::class,'destroy'])->name('users.destroy');


    Route::get('categories/search',[CategoryController::class,'search'])->name('category.search');
    Route::resource('/orders',OrderController::class);
    Route::resource('/categories',CategoryController::class);
});

Route::controller(HomeController::class)->group(function(){
    Route::get('home','index')->name('home.index');
    Route::get('home/search','search')->name('home.search');
    Route::get('home/{category}','searchCategory')->name('home.category');
    Route::get('home/{book}/show','show')->name('home.show');
});

