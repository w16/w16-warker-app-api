<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Pegar usuário da sessão
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
        return response(['token' => $this->service->login($request->all())]);
    }

    /**
     * Autenticar usuário registrado
     *
     * @param  \App\Http\Requests\RegisterUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterUserRequest $request)
    {
        return response(['token' => $this->service->create($request->all())], 201);
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
