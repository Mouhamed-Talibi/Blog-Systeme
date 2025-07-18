<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Symfony\Component\HttpFoundation\Response;

    class CheckAdmin
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
         */
        public function handle(Request $request, Closure $next): Response
        {
            // check if the user is admin
            if (Auth::check() && Auth::user()->is_admin) {
                return $next($request);
            }
            return redirect('/')->with('error', 'You are not allowed.');
    }
}
