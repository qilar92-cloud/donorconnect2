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
            'jenis_warga' => [
                'required',
                'in:siswa,guru,karyawan',
            ],
            'identitas' => [
                'required',
                'string',
            ],
            'password' => [
                'required',
            ],
        ]);

        if (Auth::attempt([
            'jenis_warga' => $credentials['jenis_warga'],
            'identitas' => $credentials['identitas'],
            'password' => $credentials['password'],
            'role' => 'pendonor',
        ])) {

            $request->session()->regenerate();

            $request->session()->put(
                'id_user',
                Auth::user()->id_user
            );

            return redirect()->route('dashboard');
        }

        return back()
            ->withErrors([
                'identitas' => 'Identitas atau password tidak sesuai.',
            ])
            ->withInput(
                $request->only('jenis_warga', 'identitas')
            );
    }

    public function logout(Request $request)
    {
        $role = Auth::user()?->role;

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($role === 'petugas') {
            return redirect()->route('login.petugas');
        }

        return redirect()->route('login');
    }
}