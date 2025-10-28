<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Show register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle register
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'name' => 'required',
            'telp' => 'nullable|unique:users,telp',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed', // expects password_confirmation field
        ], [
            'username.required' => 'Username wajib diisi.',
            'name.required' => 'Nama wajib diisi.',
            'telp.unique' => 'Nomor telepon sudah terdaftar di akun lain.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
    ]);

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'telp' => $request->telp,
            'email' => $request->email,
            'password' => $request->password, // bcrypt handled by model mutator
        ]
    );

        Auth::login($user); // auto-login after register
        return redirect('/')->with('success', 'Selamat datang, ' . $user->name);
    }

    // show login page
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // handle login request (email + password only)
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password salah',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // prevent session fixation
            $request->session()->regenerate();

            // success flash message
            return redirect('/')->with('success', 'Selamat datang, ' . Auth::user()->name);

        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }


    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
