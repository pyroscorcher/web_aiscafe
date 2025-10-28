<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore($user->id_user, 'id_user'),
            ],
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($user->id_user, 'id_user'),
            ],
            'telp' => [
                'nullable',
                Rule::unique('users', 'telp')->ignore($user->id_user, 'id_user'),
            ],
        ]);

        $user->update($request->only(['username', 'name', 'email', 'telp']));

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}
