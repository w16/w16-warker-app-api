<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUser;
use App\Http\UseCases\Auth\RegisterUserUseCase;
use Exception;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterUser $request)
    {
        //
        $request->validated();
        try {
           $token = (new RegisterUserUseCase)->execute($request->all());
           return response(['success'=>'Usuário criado','_token'=>$token],200);
        } catch (Exception $e) {
            return response(['Error'=>$e->getMessage()],500);
        }
    }
}
