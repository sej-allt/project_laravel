<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AdminGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('welcome'); // Redirect to the login page
        }

        // Check if the user is type 1
        $user = Auth::user();
        if ($user->type != 1) {
            return redirect('welcome'); // Redirect to home or another route
        }

        return $next($request);
    }
}
