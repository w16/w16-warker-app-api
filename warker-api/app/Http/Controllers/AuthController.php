<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        //If the validation fails, the proper response is automatically be generated.
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);


        /*Bcrypt is better than SHA-256 because it's less prone to be broken by
        *Brute force approach*/
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);


        /*Plaintext is here to return only the token value to the user,
        * Otherwise it will return the entire object*/
        $token = $user->createToken('warkertoosafetoken')->plainTextToken;

        $data = [
            'user' => $user,
            'token' => $token
        ];

        $response = [
            'message' => 'Usuário com sucesso',
            'data' => $data
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        //If the validation fails, the proper response is automatically be generated.
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //Email check
        $user = User::where('email', $fields['email'])->first();

        //Password check
        //Hash function does the verification with bcrypt password stored in database
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Credenciais incorretas'
            ], 401);
        }

        /*Plaintext is here to return only the token value to the user,
        * Otherwise it will return the entire object*/
        $token = $user->createToken('warkertoosafetoken')->plainTextToken;

        $data = [
            'user' => $user,
            'token' => $token
        ];

        $response = [
            'message' => 'Login realizado',
            'data' => $data
        ];


        return response($response, 201);
    }

    public function logout(Request $request)
    {
        //Retrieve the user, and remove its stored tokens.
        auth()->user()->tokens()->delete();

        $response = [
            'message' => 'Logout realizado'
        ];
        return response($response, 200);
    }
}
