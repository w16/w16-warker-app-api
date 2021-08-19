<?php

use Illuminate\Support\Facades\Route;


Route::get('/','CityController@index');

Route::resource('city','CityController');
Route::resource('gas','GasStationController');
Route::resource('coordinates','CoordinatesController');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
