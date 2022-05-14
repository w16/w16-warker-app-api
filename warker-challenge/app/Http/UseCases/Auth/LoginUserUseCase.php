<?php

namespace App\Http\UseCases\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginUserUseCase
{
    public function execute(array $data)
    {
        $user = User::where('email', $data['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return $token;
    }
}
