<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pendonor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);

        Pendonor::create([
            'id_user' => $user->id_user,
            'status' => '',
            'kelas_jabatan' => '',
            'tanggal_lahir' => now()->toDateString(),
            'golongan_darah' => '',
            'nomor_telepon' => '',
            'informasi_kesehatan' => '',
        ]);

        return redirect('/login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
