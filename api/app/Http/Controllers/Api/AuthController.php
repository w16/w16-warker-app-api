<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use \App\Http\Requests\{
    StoreUserRequest,
    IndexUserRequest
};
use \App\Models\User;
use \App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(IndexUserRequest $request) {
        try {
            $credentials = $this->user->where('email', $request->username)->first();

            if (!$credentials || !Hash::check($request->password, $credentials->password)) {
                return response()->json(['message' => 'Combinação de usuário e senha não encontrada'], 401);
            }

            return response()->json(
                            [
                                'access_token' => $credentials->createToken('Token de acesso pessoal')->plainTextToken,
                                'token_type' => 'Bearer',
                                'user' => UserResource::make($credentials)
                            ],
                            200
            );
        } catch (Exception $err) {
            return response()->json(['error' => 'Erro ao cadastrar.'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(StoreUserRequest $request) {
        try {

            $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json(['message' => 'Usuário Cadastrado com sucesso'], 201);
        } catch (Exception $err) {
            return response()->json(['error' => 'Erro ao cadastrar.'], 404);
        }
    }

}
