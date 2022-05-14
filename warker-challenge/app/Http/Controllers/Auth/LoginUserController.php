<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUser;
use App\Http\UseCases\Auth\LoginUserUseCase;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginUser $request)
    {
        //
        $request->validated();
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'Error' => 'Dados de login inválido'
            ], 403);
        }
        try {
            $token = (new LoginUserUseCase)->execute($request->all());
            return response(['success' => 'Usuário autenticado', '_token' => $token], 200);
        } catch (Exception $e) {
            return response(['Error' => $e->getMessage()], 500);
        }
    }
}
