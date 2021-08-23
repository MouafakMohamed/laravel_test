<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class UserBlock
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
        if (Auth::guard($role1)->user()->block == 'oui') {
            // abort(404, 'salam khouti');
            return response()->view('errors.Block', ['url' => $role]);
         }
        return $next($request);
    }
}
