<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranDonor;
use App\Models\Pendonor;

class PendaftaranDonorController extends Controller
{
    public function store(Request $request)
    {
        $pendonor = Pendonor::where(
            'id_user',
            session('id_user')
        )->firstOrFail();

        $data = $request->validate([
            'id_kegiatan' => 'required|exists:kegiatan_donor,id_kegiatan',
        ]);

        $sudahDaftar = PendaftaranDonor::where(
            'id_pendonor',
            $pendonor->id_pendonor
        )
        ->where(
            'id_kegiatan',
            $data['id_kegiatan']
        )
        ->exists();

        if ($sudahDaftar) {
            return back()->with(
                'error',
                'Kamu sudah terdaftar pada kegiatan ini.'
            );
        }

        PendaftaranDonor::create([
            'id_pendonor' => $pendonor->id_pendonor,
            'id_kegiatan' => $data['id_kegiatan'],
            'status_pendaftaran' => 'Terdaftar',
        ]);

        return back()->with(
            'success',
            'Berhasil mendaftar kegiatan donor.'
        );
    }
}