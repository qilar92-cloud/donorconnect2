<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek apakah sudah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Cek role pengguna
        if (!in_array(auth()->user()->role, $roles)) {
            abort(
                403,
                'Role kamu: ' . auth()->user()->role .
                ' | Role yang dibutuhkan: ' . implode(', ', $roles)
            );
        }

        return $next($request);
    }
}