<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/** Este classe trata do Login e logout do usuário*/
class LoginController extends Controller
{
    /** o metodo logar recebe a request, caso o usuário e senha sejam validos será criado um token e devolvido ao usuário */
    public function logar(Request $request)
    {
        $data = request(['email', 'password']);

        if(Auth::attempt($data)){
            $token = Auth::user()->createToken('token')->accessToken;
            return response($token)->header('Content-Type', 'text/plain');
        }

        return response()->json('As credencias fornecidas estão incorretas!', 404);

    }

    /**o metodo logout recebe a request, busca o token do usuário e revoga, se a revagação ocorrer com sucesso retonar a informação de sucesso ao usuario */
    public function logout(Request $request)
    {
        $logout = $request->user()->token()->revoke();
        if($logout){
            return response()->json('Sessão destruida com sucesso!', 200);
        }
    }
}
