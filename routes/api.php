<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Import and set usage to all controllers
use App\Http\Controllers\warkerCities;
use App\Http\Controllers\warkerUser;
use App\Http\Controllers\warkerDangerLevels;
use App\Http\Controllers\warkerFuelStations;
use App\Http\Controllers\warkerLogout;

/*
|--------------------------------------------------------------------------
| WARKER API ROUTES
|--------------------------------------------------------------------------
|
| Here u gonna find all the Warker routes and it's info.
| Have fun!
|
*/

// Used as a test rout in warkerUser controller
Route::get('/user/test', [warkerUser::class, 'test']);

// Used to validate user`s loggin info
Route::post('/user/loginValidate', [warkerUser::class, 'loginValidate']);

// Used to get data bout the users
Route::post('/user/getData', [warkerUser::class, 'getData']);

// Used to clean all session user data
Route::post('/user/cleanSessionData', [warkerUser::class, 'cleanSessionData']);

// Used to process user logout action
Route::post('/user/logout', [warkerLogout::class, 'logout']);




// Used to get data bout the cities with a fuel station
Route::post('/cities/getData', [warkerCities::class, 'getData']);

// Used to insert data bout the cities
Route::post('/cities/insertData', [warkerCities::class, 'insertData']);

// Used to update data bout the cities
Route::post('/cities/updateData', [warkerCities::class, 'updateData']);




// Used to get data bout the fuel stations
Route::post('/fuelStations/getData', [warkerFuelStations::class, 'getData']);

// Used to insert data bout the fuel stations
Route::post('/fuelStations/insertData', [warkerFuelStations::class, 'insertData']);

// Used to update data bout the fuel stations
Route::post('/fuelStations/updateData', [warkerFuelStations::class, 'updateData']);

