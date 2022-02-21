<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\GasStationController;
use App\Http\Controllers\Api\UserController;

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

Route::get('/', function () {
    $routeCollection = Route::getRoutes();

    foreach ($routeCollection as $route) {
        $routes[] = [
            'url' => $route->uri,
            'acoes' => $route->methods,
            'metodo' => $route->action->uses,
            'full' => $route
        ];
    }

    return $routes;
});

Route::middleware('auth:sanctum')->get('/usuarios', [UserController::class, 'index'])->name('user.index');

Route::get('cidades', [CityController::class, 'index'])->name('cidade.index');
Route::apiResource('cidade', CityController::class, ['except' => 'index']);

Route::get('postos', [GasStationController::class, 'index'])->name('posto.index');
Route::apiResource('posto', GasStationController::class,  ['except' => 'index']);

Route::prefix('autenticacao')->group(function() {
    Route::post('login', [App\Http\Controllers\Api\Auth\LoginController::class, 'login']);
    Route::post('cadastro', [App\Http\Controllers\Api\Auth\RegisterController::class, 'register']);
});