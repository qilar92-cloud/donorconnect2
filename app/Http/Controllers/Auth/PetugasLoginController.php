<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.petugas-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (
            Auth::attempt([
                'email' => $credentials['email'],
                'password' => $credentials['password'],
                'role' => 'petugas',
            ])
        ) {
            $request->session()->regenerate();

            return redirect()
                ->route('dashboard.petugas')
                ->with('success', 'Berhasil masuk sebagai Petugas PMR.');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password Petugas PMR salah.',
            ])
            ->withInput($request->only('email'));
    }
}