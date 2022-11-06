<?php
namespace App\Support\Auth;

use Illuminate\Support\Str;

class RateLimiters
{
    public function throttleKey($request)
    {
        return Str::lower($request->input('email')).'|'.$request->ip();
    }
}
