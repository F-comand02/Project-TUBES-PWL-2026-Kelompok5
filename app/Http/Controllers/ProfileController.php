<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        // role_name is the canonical string used across the app (middleware, redirects)
        $roleName = $user?->role?->role_name;

        return view('profile.edit', compact('roleName'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female',

            // volunteer
            'skills' => 'nullable|string|max:255',
            'organization' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'availability' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

        $user->name = $request->name;

        $user->phone = $request->phone;
        $user->bio = $request->bio;
        $user->address = $request->address;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->skills = $request->skills;
        $user->organization = $request->organization;
        $user->experience = $request->experience;
        $user->availability = $request->availability;

        if ($request->hasFile('profile_photo')) {

            $file = $request->file('profile_photo');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('profile-photos', $filename, 'public');

            $user->profile_photo = $filename;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully');
    }

    
}