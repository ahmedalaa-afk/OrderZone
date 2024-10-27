<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            !Auth::guard('web')->check()
            || Auth::guard('web')->user()->status == 'block'
            || !Auth::guard('web')->user()->hasRole('user')
        ) {
            return to_route('login');
        }

        return $next($request);
    }
}