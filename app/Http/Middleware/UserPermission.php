<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class UserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $role1)
    {
        if (Auth::guard('staff')->user()->$role != $role1) {
           // abort(404, 'salam khouti');
           return response()->view('errors.custom');
        }
        return $next($request);
    }
}
