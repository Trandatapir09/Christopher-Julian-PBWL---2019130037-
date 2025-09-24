<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        // Jika belum login dan bukan sedang buka login
        if (!Session::has('user') && !$request->is('login') && !$request->is('login/*')) {
            return redirect('/login');
        }

        // Jika sudah login dan mencoba buka /login, redirect ke home
        if (Session::has('user') && $request->is('login')) {
            return redirect('welcome');
        }

        return $next($request);
    }
}