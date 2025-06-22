<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class RedirectIfAuthenticated
// {
//     /**
//      * Handle an incoming request.
//      */
//     public function handle(Request $request, Closure $next, ...$guards)
//     {
//         $guard = $guards[0] ?? null;

//         if (Auth::guard($guard)->check()) {
//             return redirect('/dashboard'); // Ubah ke route dashboard kamu
//         }

//         return $next($request);
//     }
// }
