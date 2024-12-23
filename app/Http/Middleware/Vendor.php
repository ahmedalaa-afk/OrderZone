<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Vendor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            !Auth::guard('vendor')->check()
            || Auth::guard('vendor')->user()->status != 'approved'
            || !Auth::guard('vendor')->user()->hasRole('vendor')
        ) {

            return to_route('vendor.login');
        }
        return $next($request);
    }
}
