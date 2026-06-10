<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RoleSelectionController extends Controller
{
    public function create()
    {
        $user = Auth::user();

        if ($user instanceof User && $user->role?->role_name) {
            return match ($user->role->role_name) {
               'admin' => redirect('/admin'),
                'volunteer' => redirect()->route('volunteer.dashboard'),
                'citizen' => redirect()->route('dashboard'),
                default => redirect()->route('role.select'),
            };
        }

        $roles = Role::whereIn('role_name', ['citizen', 'volunteer'])->get();

        return view('auth.select-role', compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $role = Role::findOrFail($request->role_id);

        if (!in_array($role->role_name, ['citizen', 'volunteer'])) {
            abort(403);
        }

        $user = Auth::user();
        if (! $user instanceof User) {
            abort(403);
        }

        $user->role_id = $role->id;
        $user->save();

        if ($role->role_name === 'volunteer') {
            return redirect()->route('volunteer.dashboard');
        }

        return redirect()->route('dashboard');
    }
}
