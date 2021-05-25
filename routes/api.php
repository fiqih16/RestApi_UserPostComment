<?php

use App\Http\Controllers\API\v1\LoginController;
use App\Http\Controllers\API\v1\ProductController;
use App\Http\Controllers\API\v1\RegisterController;
use App\Http\Controllers\API\v1\UserController;
use App\Http\Controllers\API\v1\CategoryController;
use App\Http\Controllers\API\v1\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// UserController
// Route::middleware('auth:api')->get('/v1/show', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:api')->get('/v1/show', [UserController::class, 'show']);
Route::middleware('auth:api')->post('/v1/store', [UserController::class, 'store']);
Route::middleware('auth:api')->post('/v1/update', [UserController::class, 'update']);


// LoginController
Route::post('/v1/login', [LoginController::class, 'login']);
Route::middleware('auth:api')->get('/v1/logout', [LoginController::class, 'logout']);

// RegisController
Route::post('/v1/register', [RegisterController::class, 'register']);

// CategoryController
Route::middleware('auth:api')->get('/v1/category', [CategoryController::class, 'index']);

// ProductController
Route::middleware('auth:api')->get('/v1/products', [ProductController::class, 'index']);
Route::middleware('auth:api')->get('/v1/products/{product}', [ProductController::class, 'show']);
Route::middleware('auth:api')->get('/v1/products/searchByCategory/{category}', [ProductController::class, 'searchByCategory']);
Route::middleware('auth:api')->post('/v1/products/searchByKey', [ProductController::class, 'searchByKey']);
Route::middleware('auth:api')->post('/v1/products/searchKey', [ProductController::class, 'searchKey']);

// OrderController
Route::middleware('auth:api')->post('/v1/order', [OrderController::class, 'store']);
Route::middleware('auth:api')->post('/v1/order/delete', [OrderController::class, 'destroy']);
Route::middleware('auth:api')->get('/v1/order/cart', [OrderController::class, 'cart']);
Route::middleware('auth:api')->get('/v1/order/history', [OrderController::class,'history']);
Route::middleware('auth:api')->post('/v1/order/checkout', [OrderController::class,'checkout']);
