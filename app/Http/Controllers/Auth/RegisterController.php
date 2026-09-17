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
            'jenis_warga' => 'required|in:siswa,guru,karyawan',
            'identitas' => 'required|string|max:50|unique:users,identitas',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'nama' => $data['nama'],
            'jenis_warga' => $data['jenis_warga'],
            'identitas' => $data['identitas'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'pendonor',
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

        return redirect()
            ->route('login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }
}