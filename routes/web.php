<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return redirect('/login');
});

Route::get('/dashboard', function (Request $request) {
    return view('dashboard', [ 'apiToken' => $request->user()->tokens[0]->name ]);
})->middleware(['auth', 'auth:sanctum'])->name('dashboard');

require __DIR__.'/auth.php';
