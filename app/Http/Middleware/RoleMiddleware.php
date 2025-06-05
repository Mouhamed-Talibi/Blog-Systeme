<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // check if the user is loged in
        if(!Auth::check()) {
            return to_route('hoem')->with('error', 'You are not allowed to access this page !');
        }

        // check the user role
        if(Auth::user()->role !== $role) {
            return abort(403, 'Not Authorised');
        }
        return $next($request);
    }
}
