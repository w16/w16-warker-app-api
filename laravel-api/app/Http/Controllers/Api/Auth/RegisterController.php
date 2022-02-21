<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class RegisterController extends Controller
{
    public function register(UserRequest $request, User $user)
    {
        $userData = $request->only('nome', 'email', 'senha');
        $userCreate = $user->create($userData); 

        if (!$userCreate) {
            abort(500, "Erro ao criar novo usuario");
        }

        return response()->json([
            'data' => [
                'user' => $userCreate,
            ]
        ]);
        
    }
}
