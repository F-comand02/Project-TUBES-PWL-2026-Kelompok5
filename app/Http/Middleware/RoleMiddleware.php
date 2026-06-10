<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
            if (! Auth::check()) {
            return redirect('/login');
        }

        /** @var User $user */
        $user = Auth::user();

        if ($user->role->role_name !== $role) {
            if ($user->role->role_name === 'admin') {
                return redirect()->route('/admin');
            }

            if ($user->role->role_name === 'volunteer') {
                return redirect()->route('volunteer.dashboard');
            }

            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}