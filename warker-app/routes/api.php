<?php

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\PostoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rota que aponta para o Controller, Resource irá usar os metodos GET, POST, DELETE e PUT
Route::resource('cidade', CidadeController::class);

Route::resource('posto', PostoController::class);
