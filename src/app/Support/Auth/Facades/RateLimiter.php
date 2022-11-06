<?php

namespace App\Support\Auth\Facades;

use Illuminate\Support\Facades\Facade;
use \App\Support\Auth\RateLimiters;

class RateLimiter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return  RateLimiters::class;
    }
}
