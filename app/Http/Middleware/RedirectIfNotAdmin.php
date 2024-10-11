<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->usertype != 1) {
            return back();
        }

        return $next($request);
    }
}
