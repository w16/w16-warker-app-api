<?php

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

// Rotas de autenticação
Route::get('/login', 'AuthController@login');
Route::post('/authenticate', 'AuthController@authenticate');
// Rotas de autenticação

// Rotas de cadastros de novos usuários
Route::get('/usuario/cadastro', 'UsersController@register');
Route::post('/usuario/cadastro/salvar', 'UsersController@registerStore');
// Rotas de cadastros de novos usuários

Route::group(['middleware' => 'auth'], function() {
	Route::get('/', 'HomeController@index');

	// Rotas de cidades
	Route::get('/cidades', 'CidadesController@index');
	Route::get('/cidades/novo', 'CidadesController@add');
	Route::post('/cidades/salvar', 'CidadesController@store');
	Route::get('/cidades/editar/{id}', 'CidadesController@edit');
	Route::post('/cidades/atualizar/{id}', 'CidadesController@update');
	Route::get('/cidades/excluir/{id}', 'CidadesController@delete');

	// Rotas de cidades
	
	// Rotas de postos
	Route::get('/postos', 'PostosController@index');
	Route::get('/postos/novo', 'PostosController@add');
	Route::post('/postos/salvar', 'PostosController@store');
	Route::get('/postos/editar/{id}', 'PostosController@edit');
	Route::post('/postos/atualizar/{id}', 'PostosController@update');
	Route::get('/postos/excluir/{id}', 'PostosController@delete');
	// Rotas de postos

	// Rotas de dados do perfil do usuário
	Route::get('/perfil', 'UsersController@profile');
	Route::post('/perfil/atualizar', 'UsersController@update');
	// Rotas de dados do perfil do usuário

	Route::get('/logout', 'AuthController@logout');
});