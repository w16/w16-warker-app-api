<?php

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\PostoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('cidade/add', [CidadeController::class,'store']);
Route::post('posto/add', [PostoController::class,'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
