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
        $tipeLogin = $request->input('tipe_login');

        // Petugas

        if ($tipeLogin === 'petugas') {

            $credentials = $request->validate([
                'email' => [
                    'required',
                    'email',
                ],
                'password' => [
                    'required',
                ],
            ]);

            if (Auth::attempt([
                'email' => $credentials['email'],
                'password' => $credentials['password'],
                'role' => 'admin',
            ])) {

                $request->session()->regenerate();

                $request->session()->put(
                    'id_user',
                    Auth::user()->id_user
                );

                return redirect()->route('dashboard.petugas');
            }

            return back()
                ->withErrors([
                    'email' => 'Email atau password Petugas PMR tidak sesuai.',
                ])
                ->withInput(
                    $request->only('email')
                );
        }


        // Pendonor

        if ($tipeLogin === 'pendonor') {

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
                'role' => 'user',
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
                    $request->only(
                        'jenis_warga',
                        'identitas'
                    )
                );
        }


        // Login tidak dipilih

        return back()
            ->withErrors([
                'login' => 'Silakan pilih jenis login.',
            ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}