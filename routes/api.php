<?php

use App\Http\Controllers\API\CidadeController;
use App\Http\Controllers\API\PostoController;
use App\Http\Controllers\API\UserController;
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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/token', [UserController::class, 'newToken']);
    Route::get('/user', [UserController::class, 'index']);
    Route::put('/user', [UserController::class, 'updateProfile']);
    Route::apiResources([
        'cidade' => CidadeController::class,
        'posto' => PostoController::class,
    ]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

