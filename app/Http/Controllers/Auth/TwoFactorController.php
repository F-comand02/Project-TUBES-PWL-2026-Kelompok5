<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TwoFactorController extends Controller
{
    public function show()
    {
        return view('auth.two-factor');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:6',
        ]);

        $user = Auth::user();

        if (! $user) {
            $email = session('two_factor_email');
            $user = User::where('email', $email)->first();
        }

        if (!$user || !$user->verifyTwoFactorCode($request->code)) {
            throw ValidationException::withMessages([
                'code' => 'Invalid or expired code.',
            ]);
        }

        $user->resetTwoFactorCode();
        session()->forget('two_factor_email');

        Auth::login($user);

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
}
