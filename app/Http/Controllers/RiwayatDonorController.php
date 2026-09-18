<?php

namespace App\Http\Controllers;

use App\Models\RiwayatDonor;
use App\Models\Pendonor;
use App\Models\HasilDonor;
use Illuminate\Http\Request;

class RiwayatDonorController extends Controller
{
    public function index()
    {
        $riwayat = RiwayatDonor::with([
            'pendonor.user',
            'hasilDonor.kegiatanDonor',
        ])
            ->latest()
            ->get();

        return view(
            'pages.petugas.riwayat-donor.index',
            compact('riwayat')
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_pendonor' => [
                'required',
                'exists:pendonors,id_pendonor',
            ],
            'id_hasil' => [
                'required',
                'exists:hasil_donors,id_hasil',
            ],
        ]);

        RiwayatDonor::create([
            'id_pendonor' => $data['id_pendonor'],
            'id_hasil' => $data['id_hasil'],
        ]);

        return redirect()
            ->route('riwayat-donor.index')
            ->with(
                'success',
                'Hasil donor berhasil disimpan ke riwayat.'
            );
    }
}