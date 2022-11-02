<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registration(Request $request)
    {
        $user = User::create($request->all());

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $token = $user->createToken('appToken')->accessToken;
            return response()->json(['user' => $user, 'access_token' => $token], 200);
        }

    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken('appToken')->accessToken;
            return response()->json(['user' => $user, 'access_token' => $token], 200);
        }else{
            return response()->json(['error' => 'User unauthenticated.'], 422);
        }

    }

    public function logout(Request $request)
    {
        Auth::user()->token()->revoke();
        return response()->json(['message' => 'User successfully logout.'], 200);
    }
}
