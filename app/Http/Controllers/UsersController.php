<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Auth;
use Session;

class UsersController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function registerStore(UsersRequest $request) {
        $dados = $request->all();

        // Verifica se o usuário degitou um e-mail válido
        // Essa função fica no arquivo app/Models/User.php
        if(!verifyEmail($dados['email'])) {
            Session::flash('error', 'E-mail inválido');
            return redirect('/usuario/cadastro')->withInput();
        }

        // Função para verificar se o e-mail já existe no banco de dados. Caso já exista não deixa cadastrar novamente
        // Essa função fica no arquivo app/Models/User.php
        if(User::emailExists($dados['email'])) {
            Session::flash('error', 'Este e-mail já existe.');
            return redirect('/usuario/cadastro')->withInput();
        }

        // Criptografar a senha
        $dados['password'] = bcrypt($dados['password']);
        $user = new User($dados);

        if($user->save()) {
            Session::flash('success', 'Cadastro realizado com sucesso.');
            return redirect('/login');
        }
        else {
            Session::flash('error', 'Problemas ao realizar cadastro. Tente novamente.');
            return redirect('/usuario/cadastro')->withInput();
        }
    }

    public function profile() {
    	return view('users.profile');
    }

    public function update(ProfileRequest $request) {
    	$dados = $request->all();

        // Verifica se o usuário degitou um e-mail válido
        // Essa função fica no arquivo app/Models/User.php
        if(!verifyEmail($dados['email'])) {
            Session::flash('error', 'E-mail inválido');
            return redirect('/perfil');
        }

        // Função para verificar se o e-mail já existe no banco de dados. Caso já exista não deixa cadastrar novamente
        // Essa função fica no arquivo app/Models/User.php
        if(User::emailExists($dados['email'])) {
            Session::flash('error', 'Este e-mail já existe.');
            return redirect('/perfil');
        }

        if(is_null($dados['password'])) {
            unset($dados['password']);
        }
        else {
            // Criptografar a senha
        	$dados['password'] = bcrypt($dados['password']);
        }

    	$user = User::find(Auth::user()->id);

    	if($user->update($dados)) {
    		Session::flash('success', 'Dados atualizados com sucesso.');
    	}
    	else {
    		Session::flash('error', 'Problemas ao atualizar dados. Tente novamente.');
    	}

    	return redirect('/perfil');
    }
}