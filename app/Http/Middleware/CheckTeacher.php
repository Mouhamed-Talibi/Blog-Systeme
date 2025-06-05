<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckTeacher
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Example: get user ID from session or auth (you can adjust this)
        $user = DB::table('teachers')->where('id', 1)->first(); // use ->first(), not ->get()

        // Check if user exists and is a teacher
        if (!$user || $user->role !== 'teacher') {
            return abort(403, 'Access denied: Teachers only.');
        }

        // Allow access
        return $next($request);
    }
}
