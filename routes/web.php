<?php

use App\Http\Controllers\WebCidadeController;
use App\Http\Controllers\WebPostoController;
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

//Lista todas as cidades
Route::get('/', [WebCidadeController::class, 'index'])->name('cidades');

//Exibe a tela de cadastro de cidades
Route::get('/cidade/create', [WebCidadeController::class, 'create'])->name('cad_cidade');

//Cadastra uma cidade
Route::post('/cidade/create', [WebCidadeController::class, 'store'])->name('save_cidade');

//Retorna a view cadCidade, com os dados de uma cidade em específico, para alterar seus dados
Route::get('/cidade/{id}/edit', [WebCidadeController::class, 'edit'])->name('edit_cidade');

//Altera os dados de uma cidade
Route::put('/cidade/{id}/edit', [WebCidadeController::class, 'update'])->name('update_cidade');

//Deleta uma cidade
Route::delete('/cidade/{id}/del', [WebCidadeController::class, 'destroy'])->name('delete_cidade');

//Lista todos os postos
Route::get('/postos', [WebPostoController::class, 'index'])->name('postos');

//Lista os postos de uma cidade
Route::get('posto/{cidade_id}', [WebPostoController::class, 'show']);

//Exibe a tela de cadastro de postos
Route::get('/posto/{cidade_id}/create', [WebPostoController::class, 'create'])->name('cad_posto');

//Cadastra uma posto referenciando à uma cidade
Route::post('/posto/create', [WebPostoController::class, 'store'])->name('save_posto');

//Retorna a view cadPosto, com os dados de um posto em específico, para alterar seus dados
Route::get('/posto/{id}/edit', [WebPostoController::class, 'edit'])->name('edit_posto');

//Altera os dados de um posto
Route::put('/posto/{id}/edit', [WebPostoController::class, 'update'])->name('update_posto');

//Deleta um posto
Route::delete('/posto/{id}/del', [WebPostoController::class, 'destroy'])->name('delete_posto');
