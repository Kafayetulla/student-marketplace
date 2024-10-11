<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->usertype != 0) {
            return back();
        }

        return $next($request);
    }
}
