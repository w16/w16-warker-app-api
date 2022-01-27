<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Public routes
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', function () {
    return response("Para logar envie {'name'=>'Nome teste','email'=>email,'password'=>senha,'password_confirmation'=>senha} em POST para api/login", 200)
                  ->header('Content-Type', 'text/plain');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', function () {
    return response("Você precisa estar logado para acessar esta página!<br>Para logar envie {'email'=>email,'password'=>senha} em POST para api/login<br>ou envie {'name'=>'Nome teste','email'=>email,'password'=>senha,'password_confirmation'=>senha} em POST para api/register para se cadastrar.", 200)
                  ->header('Content-Type', 'text/plain');
});

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('cidade', 'CidadesController');
    Route::apiResource('posto', 'PostosController');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
