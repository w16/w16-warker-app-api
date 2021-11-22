<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostoController;
use App\Http\Controllers\CidadeController;
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

Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [\App\Http\Controllers\AuthController::class, 'user']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('posto/{id}', [PostoController::class, 'index']);

    Route::post('posto/store', [PostoController::class, 'store']);
    Route::get('posto/', [PostoController::class, 'list']);

    Route::put('posto/update/{id}', [PostoController::class, 'update']);

    Route::delete('posto/delete/{id}', [PostoController::class,'destroy']);


    Route::get('cidade/{id}', [CidadeController::class, 'index']);
    Route::get('cidade', [CidadeController::class, 'list']);

    Route::post('cidade/store', [CidadeController::class, 'store']);

    Route::put('cidade/update/{id}', [CidadeController::class, 'update']);

    Route::delete('cidade/delete/{id}', [CidadeController::class,'destroy']);
});