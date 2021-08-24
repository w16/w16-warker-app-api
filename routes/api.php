<?php

use App\Http\Controllers\api\CidadeController;
use App\Http\Controllers\api\PostoController;
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

Route::get('/cidades', [CidadeController::class, 'index']);

Route::get('/cidade/{id}', [CidadeController::class, 'show']);

Route::post('/cidade', [CidadeController::class, 'store']);

Route::put('/cidade/{id}', [CidadeController::class, 'update']);

Route::delete('/cidade/{id}', [CidadeController::class, 'destroy']);

Route::get('/postos', [PostoController::class, 'index']);

Route::get('/posto/{id}', [PostoController::class, 'show']);

Route::post('/posto', [PostoController::class, 'store']);

Route::put('/posto/{id}', [PostoController::class, 'update']);

Route::delete('/posto/{id}', [PostoController::class, 'destroy']);
