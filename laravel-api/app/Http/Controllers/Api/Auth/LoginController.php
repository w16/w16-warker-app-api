<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        
        $user = User::where('email', $request->email)->first();

        $deviceNameErrorsMessages = [
            'device_name.required' => 'Insira o nome do dispositivo',
            'device_name.min' => 'Nome do dispositivo muito curto'
        ];

        $request->validate([
            'device_name' => ['required', 'min:5']
        ], $deviceNameErrorsMessages);

        if (!$user) {
            return status_and_message('Usuario nao encontrado', 404);
        }

        if (Hash::check($request->senha, $user->senha)) {
            return $user->createToken($request->device_name)->plainTextToken;
        }

    }
}
