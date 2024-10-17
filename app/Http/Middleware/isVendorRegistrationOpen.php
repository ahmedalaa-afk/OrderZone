<?php

namespace App\Http\Middleware;

use App\Models\VendorRegistrationApplicationDate;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isVendorRegistrationOpen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $currentDate = now();

        $registrationPeriod = VendorRegistrationApplicationDate::where('end_at', '<=', $currentDate)
            ->orderBy('end_at', 'desc')
            ->first();

        if ($registrationPeriod) {
            return $next($request);
        } else {
            return to_route('vendor.login')->with('flash','Vendor registration is currently closed.');
        }
    }
}
