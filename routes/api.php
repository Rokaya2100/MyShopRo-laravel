<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

// Public routes of product
Route::controller(ProductController::class)->group(function() {
    Route::get('/products', 'index');
    Route::get('/products/{id}', 'show');
    Route::get('/products/search/{name}', 'search');
    Route::get('/products/filter/{category}', 'filterCategory');
});

// orders routes and logout
Route::middleware('auth:sanctum')->group( function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::controller(OrderController::class)->group(function() {
           Route::get('/user/orders', 'userOrders');
           Route::post('/user/addorder', 'addOrder');
           Route::post('/user/canncelorder/{id}','canncelOrder');
    });
});

//all orders route (just admin can you all orders)
Route::middleware(['auth:sanctum','is_admin_api'])->group( function () {
    Route::get('/admin/allOrders', [OrderController::class, 'allOrders']);
});
