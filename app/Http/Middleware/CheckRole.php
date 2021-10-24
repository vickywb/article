<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role = Auth::user()->role_id;

        if ($role == 'admin' && Auth()->user()->role_id != 1) {
            abort(403);
        }

        if ($role == 'author' && auth()->user()->role_id != 2) {
            abort(403);
        }

        if ($role == 'customer' && auth()->user()->role_id != 3) {
            abort(403);
        }

        return $next($request);
    }
}
