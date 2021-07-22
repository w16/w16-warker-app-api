<?php

use App\Http\Controllers\CidadeController;
use App\Http\Controllers\PostoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['auth:sanctum', 'verified'], function () {
    Route::resource('cidades', CidadeController::class);
    Route::resource('postos', PostoController::class);
});
