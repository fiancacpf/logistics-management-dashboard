<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutoLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return $next($request);
        }

        $user = User::find(1);

        if (!$user) {
            return response()->view('errors.no-setup', [], 503);
        }

        Auth::login($user);

        return $next($request);
    }
}
