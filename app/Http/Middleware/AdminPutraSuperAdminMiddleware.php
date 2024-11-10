<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminPutraSuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Allow access if the user is a "superadmin" or an "admin" who is female
            if ($user->level == 'superadmin' || ($user->level == 'admin' && $user->jenkel == 'laki-laki')) {
                return $next($request);
            }
        }

        // If the user doesn't meet the criteria, return a 403 forbidden response or redirect
        abort(403, 'Unauthorized access.');
    }
}
