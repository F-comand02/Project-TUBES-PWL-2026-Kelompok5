<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\TwoFactorCodeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required|exists:roles,id',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'two_factor_enabled' => true,
        ]);

        // Generate OTP
        $user->generateTwoFactorCode();

        // Kirim OTP ke Email
        Mail::to($user->email)
            ->send(new TwoFactorCodeMail($user));

        // Simpan email ke session
        session([
            'two_factor_email' => $user->email
        ]);

        // Redirect ke halaman verifikasi OTP
        return redirect()->route('two-factor.verify');
    }
}