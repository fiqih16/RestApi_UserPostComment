<?php

use App\Http\Controllers\API\v1\LoginController;
use App\Http\Controllers\API\v1\RegisterController;
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

Route::middleware('auth:api')->get('/v1/user', function (Request $request) {
    return $request->user();
});

Route::post('/v1/login', [LoginController::class, 'login']);
Route::middleware('auth:api')->get('/v1/logout', [LoginController::class, 'logout']);
Route::post('/v1/register', [RegisterController::class, 'register']);
