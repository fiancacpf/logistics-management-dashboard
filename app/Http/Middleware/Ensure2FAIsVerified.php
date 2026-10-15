<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Ensure2FAIsVerified
{
    public function handle(Request $request, Closure $next)
    {
        //if (auth()->check() && auth()->user()->two_factor_code && now()->lt(auth()->user()->two_factor_expires_at)) {
        if (
            auth()->check() &&
            auth()->user()->two_factor_code &&
            now()->lt(auth()->user()->two_factor_expires_at) &&
            !$request->is('2fa/verify') &&
            !$request->is('2fa/resend') &&
            !$request->is('logout')
        ) {
            return redirect()->route('2fa.verify');
        }

        return $next($request);
    }
}
