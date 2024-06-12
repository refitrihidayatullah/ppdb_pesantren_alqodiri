<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // isLogin mengecek jika sudah login akan di next jika belum redirect ke login
        if (!Auth::check()) {
            return redirect('login')->with('failed', 'Silahkan Login terlebih dahulu!');
        }
        return $next($request);
    }
}
