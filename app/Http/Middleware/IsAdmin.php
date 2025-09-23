<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            // Option A: redirect to home with message
            // return redirect('/')->with('error', 'Unauthorized.');

            // Option B: abort 403
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
