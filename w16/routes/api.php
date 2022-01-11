<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Gestao\CidadeController;
use App\Http\Controllers\Api\Gestao\PostoController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

/**
 * Verificar se o usuario está logado com o token e para cadastrar cidades e postos.
 */
Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource("cidade",CidadeController::class);
    Route::resource("posto", PostoController::class);
});

