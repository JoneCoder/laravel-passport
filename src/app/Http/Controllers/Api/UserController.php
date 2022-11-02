<?php

namespace App\Http\Controllers\Api;

use App\Events\RefreshTokenCreated;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userInfo(Request $request)
    {
        $user = Auth::user();
        $token = RefreshTokenCreated::dispatch($user);
        return response()->json(['user' => $user, 'access_token' => $token], 200);
    }
}
