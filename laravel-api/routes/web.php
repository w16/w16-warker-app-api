<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\GasStationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/cidades', 301);


Route::get('/cidades', [CityController::class, 'index']);
Route::get('/cidades/{id}/postos', [CityController::class, 'getAllGasStations']);
Route::get('/cidades/cadastrar', [CityController::class, 'create']);
Route::get('/cidades/alterar/{id}', [CityController::class, 'edit']);

Route::post('/cidades/cadastrar', [CityController::class, 'store']);
Route::put('/cidades/alterar/{id}', [CityController::class, 'update']);
Route::delete('/cidades/deletar/{id}', [CityController::class, 'destroy']);


Route::get('/postos', [GasStationController::class, 'index']);
Route::get('/postos/cadastrar', [GasStationController::class, 'create']);
Route::get('/postos/alterar/{id}', [GasStationController::class, 'edit']);

Route::post('/postos/cadastrar', [GasStationController::class, 'store']);
Route::put('/postos/alterar/{id}', [GasStationController::class, 'update']);
Route::delete('/postos/deletar/{id}', [GasStationController::class, 'destroy']);

