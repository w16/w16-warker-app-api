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

Route::get('/', function (Request $request) {
    if(Auth::check()) {
        $data = [];
        
        if(count($request->user()->tokens) == 0) {
            $token = explode('|', $request->user()->createToken('api_token')->plainTextToken);
            $data['api_token'] = $token[1];
        }

        return view('dashboard', $data);
    } else {
        return redirect('/login');
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'auth:sanctum'])->name('dashboard');

require __DIR__.'/auth.php';
