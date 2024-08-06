<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyIsEmployerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check() && Auth::user()->isEmployer()) {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->isAdmin()) {
            return redirect('/admin');
        } elseif (Auth::check() && Auth::user()->isUser()) {
            return redirect('/app');
        } else {
            return redirect('/');
        }
    }
}
