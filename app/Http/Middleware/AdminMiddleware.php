<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        foreach ($roles as $role) {
            if (auth()->user()->role == $role) {
                return $next($request);
            }
        }

        return abort(403);
    }
}
