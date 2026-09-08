<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pendonor;
use App\Models\PetugasPMR;

class ProfileController extends Controller
{
    // Tampilkan profil
    public function show()
    {
        $user = Auth::user();

        if ($user->role === 'petugas') {

            $petugas = PetugasPMR::firstOrCreate([
                'id_user' => $user->id_user
            ]);

            return view(
                'pages.pendonor.profile.profile',
                compact('user', 'petugas')
            );
        }

        $pendonor = Pendonor::with('user')
            ->where('id_user', $user->id_user)
            ->firstOrFail();

        return view(
            'pages.pendonor.profile.profile',
            compact('user', 'pendonor')
        );
    }

    // Form edit profil
    public function edit()
    {
        $user = Auth::user();

        if ($user->role === 'petugas') {

            $petugas = PetugasPMR::firstOrCreate([
                'id_user' => $user->id_user
            ]);

            return view(
                'pages.pendonor.profile.edit',
                compact('user', 'petugas')
            );
        }

        $pendonor = Pendonor::where(
            'id_user',
            $user->id_user
        )->firstOrFail();

        return view(
            'pages.pendonor.profile.edit',
            compact('user', 'pendonor')
        );
    }

    // Update profil
    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->nama = $data['nama'];
        $user->email = $data['email'];

        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        if ($user->role === 'pendonor') {

            $pendonor = Pendonor::where(
                'id_user',
                $user->id_user
            )->firstOrFail();

            $pendonorData = $request->validate([
                'status' => 'required|string|max:255',
                'kelas_jabatan' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'golongan_darah' => 'required|string|max:10',
                'nomor_telepon' => 'required|string|max:20',
                'informasi_kesehatan' => 'required|string',
            ]);

            $pendonor->update($pendonorData);
        }

        if ($user->role === 'petugas') {

            PetugasPMR::firstOrCreate([
                'id_user' => $user->id_user
            ]);
        }

        return redirect()
            ->route('profile')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}