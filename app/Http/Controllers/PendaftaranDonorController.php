<?php

namespace App\Http\Controllers;

use App\Models\KegiatanDonor;
use App\Models\PendaftaranDonor;
use App\Models\Pendonor;
use Illuminate\Http\Request;

class PendaftaranDonorController extends Controller
{
    // Form pendaftaran
    public function create($id_kegiatan)
    {
        $kegiatan = KegiatanDonor::findOrFail($id_kegiatan);

        $pendonor = Pendonor::where(
            'id_user',
            session('id_user')
        )->firstOrFail();

        return view(
            'pages.pendonor.pendaftaran.daftar',
            compact('kegiatan', 'pendonor')
        );
    }


    // Simpan pendaftaran
    public function store(Request $request)
    {
        $pendonor = Pendonor::where(
            'id_user',
            session('id_user')
        )->firstOrFail();

        $data = $request->validate([
            'id_kegiatan' => [
                'required',
                'exists:kegiatan_donor,id_kegiatan',
            ],
            'catatan' => [
                'nullable',
                'string',
            ],
        ]);


        // Cek pendaftaran yang sama
        $sudahDaftar = PendaftaranDonor::where(
            'id_pendonor',
            $pendonor->id_pendonor
        )
            ->where(
                'id_kegiatan',
                $data['id_kegiatan']
            )
            ->exists();


        // Tolak jika sudah terdaftar
        if ($sudahDaftar) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Kamu sudah terdaftar pada kegiatan donor ini.'
                );
        }


        // Simpan pendaftaran
        PendaftaranDonor::create([
            'id_pendonor' => $pendonor->id_pendonor,
            'id_kegiatan' => $data['id_kegiatan'],
            'status_pendaftaran' => 'Terdaftar',
        ]);


        // Ke halaman status
        return redirect()
            ->route('pendonor.status')
            ->with(
                'success',
                'Berhasil mendaftar kegiatan donor.'
            );
    }


    // Status pendaftaran
    public function status()
    {
        $pendonor = Pendonor::where(
            'id_user',
            session('id_user')
        )->firstOrFail();

        $pendaftaran = PendaftaranDonor::with([
            'kegiatanDonor'
        ])
            ->where(
                'id_pendonor',
                $pendonor->id_pendonor
            )
            ->latest()
            ->get();

        return view(
            'pages.pendonor.status.status',
            compact('pendaftaran')
        );
    }
}

