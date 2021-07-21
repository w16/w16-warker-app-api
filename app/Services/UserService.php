<?php

namespace App\Services;

use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class UserService
{
    /**
     * Retorna usuário autorizado
     *
     * @return \App\Resource\User
     */
    public function current()
    {
        return new UserResource(\Auth::user());
    }

    /**
     * Criar novo usuário
     *
     * @param array $input strings de dados necessários para registro de nova conta
     * @return \App\Resource\User
     */
    public function create($input)
    {
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        return $user->createToken('api_token')->plainTextToken;
    }

    /**
     * Autenticar usuário registrado
     *
     * @param array $input strings dados pertinentes ao usuário registrado
     * @throws UnauthorizedHttpException para problemas com email ou senha
     * @return string token de autorização
     */
    public function login($input)
    {
        $user = User::where('email', $input['email'])->first();

        if (!($user && Hash::check($input['password'], $user->password))) {
            throw new UnauthorizedHttpException('Email ou senha estão incorretos');
        }

        return $user->createToken('api_token')->plainTextToken;
    }

    /**
     * Remover todas as autorizações do usuário autorizado
     *
     * @return void
     */
    public function logout()
    {
        $user = auth()->user();

        $user->tokens()->delete();
    }

    /**
     * Gerar novo token para o usuário autorizado
     *
     * @return string token de autorização
     */
    public function generateToken()
    {
        $user = auth()->user();

        return $user->createToken('api_token')->plainTextToken;
    }
}
