<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RoleSelectionController extends Controller
{
    public function create()
    {
        $user = auth()->user();

        if ($user->role?->role_name) {
            return match ($user->role->role_name) {
                'admin' => redirect()->route('admin.dashboard'),
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

        $user = auth()->user();
        $user->role_id = $role->id;
        $user->save();

        if ($role->role_name === 'volunteer') {
            return redirect()->route('volunteer.dashboard');
        }

        return redirect()->route('dashboard');
    }
}
