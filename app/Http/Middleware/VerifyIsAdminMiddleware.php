<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyIsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->isEmployer()) {
            return redirect('/dashboard');
        } elseif (Auth::check() && Auth::user()->isUser()) {
            return redirect('/app');
        } else {
            return redirect('/');
        }
    }
}
