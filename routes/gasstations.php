<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/{id}', [GasStationController::class, 'show']);
Route::post('/', [GasStationController::class, 'store']);
Route::put('/{id}', [GasStationController::class, 'update']);
Route::delete('/{id}', [GasStationController::class, 'destroy']);
