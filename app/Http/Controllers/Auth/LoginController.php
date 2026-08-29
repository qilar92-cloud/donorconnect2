<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required', 'in:pendonor,petugas'],
        ]);

        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'role' => $credentials['role'],
        ])) {

            $request->session()->regenerate();

            $request->session()->put(
                'id_user',
                Auth::user()->id_user
            );

            if ($credentials['role'] === 'petugas') {
                return redirect()->route('dashboard.petugas');
            }

            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'Email, password, atau role tidak sesuai.',
            ])
            ->withInput($request->only('email', 'role'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}