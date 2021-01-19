<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(UserRequest $request) {
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) 
            return response(['message' => 'invalid email and/or password'], 401);

        $token = $user->createToken(env('APP_TOKEN'))->plainTextToken;

        return response(['user' => $user, 'token' => $token], 201);
    }

    /**
     * Register new user
     * 
     * @param UserRequest $request
     * 
     * @return
     */
    public function register(UserRequest $request) {
        $userExist = User::where('email', $request->email)->get();
        if ($userExist) return response(['message' => 'user already exist'], 400);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $token = $user->createToken(env('APP_TOKEN'))->plainTextToken;

        return response(['token' => $token, 'user' => $user], 201);
    }
}
