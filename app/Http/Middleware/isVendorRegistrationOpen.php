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

        $registrationPeriod = VendorRegistrationApplicationDate::find(1);
        if ($registrationPeriod) {
            if ($registrationPeriod->end_at <= $currentDate) {
                return to_route('vendor.login')->with('flash', 'Vendor registration is currently closed.');
            } else {
                return $next($request);
            }
        }
    }
}
