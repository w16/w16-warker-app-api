<?php

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


Route::middleware(['auth:sanctum'])->group(function () { 
    Route::post('/token/generate', function (Request $request) {
        $request->user()->tokens()->delete();
        return ['api_token' => $request->user()->createToken('apiToken')->plainTextToken ];
    });

    Route::get('/cidades', 'CidadeController@index');
    Route::get('/cidade/{id}', 'CidadeController@show');
    Route::delete('/cidade/{id}', 'CidadeController@delete');
    Route::put('/cidade/{id}', 'CidadeController@update');
    Route::post('/cidade', 'CidadeController@create');

    Route::get('/postos', 'PostoController@index');
    Route::get('/posto/{id}', 'PostoController@show');
    Route::delete('/posto/{id}', 'PostoController@delete');
    Route::put('/posto/{id}', 'PostoController@update');
    Route::post('/posto', 'PostoController@create');
});
