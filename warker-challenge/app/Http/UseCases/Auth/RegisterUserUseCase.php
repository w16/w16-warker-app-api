<?php

namespace App\Http\UseCases\Auth;

use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUserUseCase
{
    public function execute(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return $token;
    }
}
