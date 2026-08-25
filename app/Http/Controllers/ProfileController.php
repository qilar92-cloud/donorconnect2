<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendonor;

class ProfileController extends Controller
{
    public function show()
    {
        $pendonor = Pendonor::where(
            'id_user',
            session('id_user')
        )->firstOrFail();

        return view('profile', compact('pendonor'));
    }

    public function update(Request $request)
    {
        $pendonor = Pendonor::where(
            'id_user',
            session('id_user')
        )->firstOrFail();

        $data = $request->validate([
            'status' => 'required|string|max:255',
            'kelas_jabatan' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'golongan_darah' => 'required|string|max:10',
            'nomor_telepon' => 'required|string|max:20',
            'informasi_kesehatan' => 'required|string',
        ]);

        $pendonor->update($data);

        return back()->with(
            'success',
            'Profil berhasil diperbarui.'
        );
    }
}
