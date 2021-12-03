<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $role = auth()->user()->role;
        if ($role !== 'admin' && $role !== 'author') {
            abort(403, 'شما مجوز دسترسی به این صفحه را ندارید !');
        }
        return $next($request);
    }
}
