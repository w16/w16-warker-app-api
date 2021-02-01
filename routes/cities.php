<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

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

Route::get('/{id}', [CityController::class, 'show']);
Route::post('/', [CityController::class, 'store']);
Route::put('/{id}', [CityController::class, 'update']);
Route::delete('/{id}', [CityController::class, 'destroy']);
