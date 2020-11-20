<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\PostoController;
use App\Http\Livewire\Cidades;
use App\Http\Livewire\Postos;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/cidades',Cidades::class)->middleware(['auth:sanctum','verified'])->name('cidades');
Route::get('/postos',Postos::class)->middleware(['auth:sanctum','verified'])->name('postos');