<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\City\CreateCityController;
use App\Http\Controllers\Posts\CreatePostController;
use App\Http\Controllers\City\DeleteCityController;
use App\Http\Controllers\City\ListCityController;
use App\Http\Controllers\City\UpdateCityController;
use App\Http\Controllers\Posts\DeletePostController;
use App\Http\Controllers\Posts\ListPostController;
use App\Http\Controllers\Posts\UpdatePostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'cidade'], function () {
    Route::post('/', CreateCityController::class);
    Route::delete('/{id}', DeleteCityController::class);
    Route::get('/{id}', ListCityController::class);
    Route::put('/{id}', UpdateCityController::class);
});

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'posto'], function () {
    Route::post('/', CreatePostController::class);
    Route::delete('/{id}', DeletePostController::class);
    Route::get('/{id}', ListPostController::class);
    Route::put('/{id}', UpdatePostController::class);
});

Route::prefix('user')->group(function () {
    Route::post('/register', RegisterUserController::class);
    Route::post('/login', LoginUserController::class);
});
