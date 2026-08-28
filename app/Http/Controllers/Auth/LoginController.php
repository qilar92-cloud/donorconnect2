<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login berdasarkan role.
     */
    public function login(Request $request)
    {
        // Validasi form
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required', 'in:pendonor,petugas'],
        ]);

        // Coba login
        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'role' => $credentials['role'],
        ])) {

            $request->session()->regenerate();

            // Petugas PMR
            if ($credentials['role'] === 'petugas') {
                return redirect()->route('dashboard.petugas');
            }

            // Pendonor
            return redirect()->route('dashboard');
        }

        // Jika login gagal
        return back()
            ->withErrors([
                'email' => 'Email, password, atau role tidak sesuai.',
            ])
            ->withInput($request->only('email', 'role'));
    }

    /**
     * Logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}