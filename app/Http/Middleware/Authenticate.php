<?php

namespace App\Http\Middleware;

use App\Helpers\Api\ApiError;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{

    public function handle(Request $request, Closure $next, string $guard = null){

        if(Auth::guard($guard)->check()){
            return $next($request);
        }

        throw new ApiError('Требуется авторизация', 403);

    }



}
