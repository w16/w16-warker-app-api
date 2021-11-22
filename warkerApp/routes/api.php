<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostoController;
use App\Http\Controllers\CidadeController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posto/{id}', [PostoController::class, 'index']);
Route::get('posto/', [PostoController::class, 'list']);

Route::post('posto/store', [PostoController::class, 'store']);

Route::put('posto/update/{id}', [PostoController::class, 'update']);

Route::delete('posto/delete/{id}', [PostoController::class,'destroy']);


Route::get('cidade/{id}', [CidadeController::class, 'index']);
Route::get('cidade', [CidadeController::class, 'list']);

Route::post('cidade/store', [CidadeController::class, 'store']);

Route::put('cidade/update/{id}', [CidadeController::class, 'update']);

Route::delete('cidade/delete/{id}', [CidadeController::class,'destroy']);