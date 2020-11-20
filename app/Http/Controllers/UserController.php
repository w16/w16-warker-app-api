<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Método de Login para criação do Token de Acesso
     * 
     * @return JsonResponse
     */
    public function index(Request $request){
        $user = User::where('email',$request->email)->first();
        
        if(!$user || !Hash::check($request->password,$user->password)){
            return $this->jsonResponse([
                'Message'=>['Essas Credenciais estão incorretas']
            ],404);
        }

        $token = $user->createToken('token_app')->plainTextToken;

        $response = [
            'user'=>$user->name,
            'token'=>$token
        ];

        return $this->jsonResponse($response,201);

    }
    /**
     * Método de Registro de Usuário 
     * 
     * @return JsonResponse
     */
    public function register(UserRequest $request){

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        
        $user = new User();
        $user['name'] = $input['name'];
        $user['email'] = $input['email'];
        $user['password'] = $input['password'];

        $result = $user->save();
        if($result){
            $success['token'] = $user->createToken('token_app')->plainTextToken;
            $success['name']= $user->name;
            
            return $this->jsonResponse(["Registrado"=>$success],200);
        } 

        return abort(500);
    }

}
