<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\PostoController;

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

// Rota para login
Route::post('login', [AuthController::class, 'login']);

// Rota para register
Route::post('register', [AuthController::class, 'register']);

// Rotas apenas para usuários autenticados
Route::group(['middleware' => 'api'], function () {

    // Rota para logout
    Route::get('/logout', [AuthController::class, 'logout']);

    // Rota para atualizar o token
    Route::get('/refresh-token', [AuthController::class, 'refresh']);

    // Rota para mostrar o usuário logado
    Route::get('/user', [AuthController::class, 'userProfile']);

    // Resource de cidades
    Route::resource('/cidades', CidadeController::class);

    // Resource de postos
    Route::resource('/postos', PostoController::class);
});
