<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\GasStationController; 

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

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

/**
 * Routes protected with authentication
 */
Route::apiResource('cidade', CityController::class)->middleware('auth:sanctum');
Route::apiResource('posto', GasStationController::class)->middleware('auth:sanctum');