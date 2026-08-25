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
