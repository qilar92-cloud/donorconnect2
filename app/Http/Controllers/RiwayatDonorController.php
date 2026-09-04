<?php

namespace App\Http\Controllers;

use App\Models\RiwayatDonor;

class RiwayatDonorController extends Controller
{
    // Tampilkan riwayat donor
    public function index()
    {
        $riwayat = RiwayatDonor::with([
            'pendonor.user',
            'hasilDonor.kegiatanDonor'
        ])
            ->latest('id_riwayat')
            ->get();

        return view(
            'pages.riwayat_donor.index',
            compact('riwayat')
        );
    }

    // Simpan ke riwayat
    public function store($id_pendonor, $id_hasil)
    {
        RiwayatDonor::create([
            'id_pendonor' => $id_pendonor,
            'id_hasil' => $id_hasil,
        ]);

        return back()->with(
            'success',
            'Hasil donor berhasil disimpan ke riwayat.'
        );
    }
}