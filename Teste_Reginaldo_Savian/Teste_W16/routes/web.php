<?php

use Illuminate\Support\Facades\Route;


//ROTAS PARA CIDADES
Route::resource('/cidades', 'App\Http\Controllers\CidadesController');

//ROTAS PARA POSTOS
Route::resource('/postos', 'App\Http\Controllers\PostosController');

