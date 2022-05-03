<?php

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\PostoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('cidade/add', [CidadeController::class,'store']);
Route::get('cidade/{id}', [CidadeController::class,'show']);
Route::put('cidade/{id}/update', [CidadeController::class,'update']);
Route::delete('cidade/{id}/delete', [CidadeController::class,'destroy']);


Route::post('posto/add', [PostoController::class,'store']);
Route::get('posto/{id}', [PostoController::class,'show']);
Route::put('posto/{id}/update', [PostoController::class,'update']);
Route::delete('posto/{id}/delete', [PostoController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
