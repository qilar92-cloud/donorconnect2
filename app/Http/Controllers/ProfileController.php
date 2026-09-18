<?php

namespace App\Http\Controllers;

use App\Models\Pendonor;
use App\Models\PetugasPMR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    // Tampilkan profil
    public function show()
    {
        $user = Auth::user();

        // Profil Petugas
        if ($user->role === 'petugas') {

            $petugas = PetugasPMR::with('user')
                ->where('id_user', $user->id_user)
                ->firstOrFail();

            return view(
                'pages.petugas.profile.profile-petugas',
                compact('user', 'petugas')
            );
        }

        // Profil Pendonor
        if ($user->role === 'pendonor') {

            $pendonor = Pendonor::with('user')
                ->where('id_user', $user->id_user)
                ->firstOrFail();

            return view(
                'pages.pendonor.profile.profile-pendonor',
                compact('user', 'pendonor')
            );
        }

        abort(403);
    }


    // Form edit profil
    public function edit()
    {
        $user = Auth::user();

        // Edit profil Petugas
        if ($user->role === 'petugas') {

            $petugas = PetugasPMR::with('user')
                ->where('id_user', $user->id_user)
                ->firstOrFail();

            return view(
                'pages.petugas.profile.edit',
                compact('user', 'petugas')
            );
        }

        // Edit profil Pendonor
        if ($user->role === 'pendonor') {

            $pendonor = Pendonor::with('user')
                ->where('id_user', $user->id_user)
                ->firstOrFail();

            return view(
                'pages.pendonor.profile.edit',
                compact('user', 'pendonor')
            );
        }

        abort(403);
    }


    // Update profil
    public function update(Request $request)
    {
        $user = Auth::user();

        // Data akun
        $data = $request->validate([
            'nama' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($user->id_user, 'id_user'),
            ],

            'password' => [
                'nullable',
                'string',
                'min:6',
                'confirmed',
            ],
        ]);


        // Update akun
        $user->nama = $data['nama'];
        $user->email = $data['email'];

        if (!empty($data['password'])) {
            $user->password = Hash::make(
                $data['password']
            );
        }

        $user->save();


        // Update profil Pendonor
        if ($user->role === 'pendonor') {

            $pendonorData = $request->validate([
                'status' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'kelas_jabatan' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'tanggal_lahir' => [
                    'required',
                    'date',
                ],

                'golongan_darah' => [
                    'required',
                    'string',
                    'max:10',
                ],

                'nomor_telepon' => [
                    'required',
                    'string',
                    'max:20',
                ],

                'informasi_kesehatan' => [
                    'required',
                    'string',
                ],
            ]);

            $pendonor = Pendonor::where(
                'id_user',
                $user->id_user
            )->firstOrFail();

            $pendonor->update($pendonorData);

            return redirect()
                ->route('profile.pendonor')
                ->with(
                    'success',
                    'Profil berhasil diperbarui.'
                );
        }


        // Update profil Petugas
        if ($user->role === 'petugas') {

            $petugas = PetugasPMR::where(
                'id_user',
                $user->id_user
            )->firstOrFail();

            // Tidak ada field tambahan
            // selain data akun pada rancangan saat ini.

            return redirect()
                ->route('profile.petugas')
                ->with(
                    'success',
                    'Profil berhasil diperbarui.'
                );
        }


        abort(403);
    }
}