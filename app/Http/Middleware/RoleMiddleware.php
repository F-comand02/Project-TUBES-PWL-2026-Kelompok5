<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();

        if ($user->role->role_name !== $role) {
            if ($user->role->role_name === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($user->role->role_name === 'volunteer') {
                return redirect()->route('volunteer.dashboard');
            }

            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}