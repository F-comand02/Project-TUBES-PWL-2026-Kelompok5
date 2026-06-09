<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user();
        $user->refresh();

        if ($user->two_factor_enabled) {
            $user->generateTwoFactorCode();
            // Send email with code
            $user->notify(new \App\Notifications\TwoFactorCode($user->two_factor_code));

            // Log out temporarily
            Auth::logout();

            // Store email in session for verification
            session(['two_factor_email' => $user->email]);

            return redirect()->route('two-factor.verify');
        }

        $roleName = $user->role?->role_name;

        if ($roleName === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($roleName === 'volunteer') {
            return redirect()->route('volunteer.dashboard');
        }

        if (is_null($roleName)) {
            return redirect()->route('role.select');
        }

        return redirect()->route('dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
