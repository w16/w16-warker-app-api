<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CidadeController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PostoController;
use App\Http\Controllers\Api\UserController;

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

/** As rotas estão divididas em dois grupos, com restirção de acesso a usuarios não atenticados e as que não necessitam de autenticação */

Route::group(['middleware' => ['auth:api']], function(){
    /** Rotas que necessitam de autenticação */
    Route::get('logout', [LoginController::class, 'logout']);
    
    Route::apiResource('user', UserController::class);
    Route::apiResource('cidade', CidadeController::class);
    Route::apiResource('posto', PostoController::class);
});

Route::group(['middleware' => ['guest:api']], function(){
    /** Rotas que não necessitam de autenticação */
    Route::post('login', [LoginController::class, 'logar']);

    /**esta rota nomeada é chamada pelo middleware Authenticate quando uma rota que necessita de autenticação é acessada sem que usuário tenha se autenticado antes.*/
    Route::get('restrito', function(){
        return response()->json('Acesso restrito, por favor efetue login.', 401);
    })->name('restrito');
});