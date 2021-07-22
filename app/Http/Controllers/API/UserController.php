<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Pegar dados do usuário autorizado
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response($this->service->current());
    }

    /**
     * Criar novo usuário
     *
     * @param  \App\Http\Requests\LoginUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginUserRequest $request)
    {
        return response(['token' => $this->service->login($request->validated())]);
    }

    /**
     * Autenticar usuário registrado
     *
     * @param  \App\Http\Requests\RegisterUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterUserRequest $request)
    {
        return response(['token' => $this->service->create($request->validated())], 201);
    }

    /**
     * Alterar dados de perfil do usuário autorizado
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(UpdateUserProfileRequest $request)
    {
        return response($this->service->update($request->validated()));
    }

    /**
     * Gerar novo token de autorização
     *
     * @return \Illuminate\Http\Response
     */
    public function newToken()
    {
        return response(['token' => $this->service->generateToken()]);
    }
}
