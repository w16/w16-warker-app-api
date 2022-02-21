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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Public routes
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);



// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    //GAS STATION ROUTES    
    Route::get('/posto', [App\Http\Controllers\GasStationController::class, 'index']);
    Route::get('/posto/id/{id}', [App\Http\Controllers\GasStationController::class, 'show']);
    Route::post('/posto/adicionar', [App\Http\Controllers\GasStationController::class, 'store']);
    Route::put('/posto/editar/{id}', [App\Http\Controllers\GasStationController::class, 'edit']); //It modifies the entire object
    Route::delete('/posto/deletar/{id}', [App\Http\Controllers\GasStationController::class, 'destroy']);

    //CITY ROUTES
    Route::get('/cidade', [App\Http\Controllers\CityController::class, 'index']);
    Route::get('/cidade/id/{id}', [App\Http\Controllers\CityController::class, 'show']);
    Route::post('/cidade/adicionar', [App\Http\Controllers\CityController::class, 'store']);
    Route::put('/cidade/editar/{id}', [App\Http\Controllers\CityController::class, 'edit']); //It modifies the entire object
    Route::delete('/cidade/deletar/{id}', [App\Http\Controllers\CityController::class, 'destroy']);

    //AUTH ROUTES
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
});
