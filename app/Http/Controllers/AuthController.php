<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;
use Session;

class AuthController extends Controller
{
    public function login() {
    	return view('auth.login');
    }

    public function authenticate(LoginRequest $request) {
    	$dados = $request->all();

        // Verifica se o usuário degitou um e-mail válido
        // Essa função fica no arquivo app/Models/User.php
        if(!verifyEmail($dados['email'])) {
            Session::flash('error', 'E-mail inválido');
            return redirect('/login');
        }
    	
    	$credentials = [
            'email' => $dados['email'],
            'password' => $dados['password']
        ];

    	if(Auth::attempt($credentials)) {
    		return redirect('/');
		}
		else {			
			Session::flash('error', 'E-mail ou senha incorretos.');
			return redirect('/login');
		}
    }

    public function logout() {
    	Auth::logout();
    	return redirect('/login');
    }
}   