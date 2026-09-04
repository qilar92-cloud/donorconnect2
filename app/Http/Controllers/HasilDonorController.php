<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilDonor;
use App\Models\Pendonor;
use App\Models\KegiatanDonor;
use App\Models\RiwayatDonor;
use App\Models\LaporanDonor;

class HasilDonorController extends Controller
{
    // Form catat hasil donor
    public function create()
    {
        $pendonor = Pendonor::with('user')->get();

        $kegiatan = KegiatanDonor::orderBy(
            'tanggal',
            'asc'
        )->get();

        return view(
            'pages.hasil-donor.create',
            compact('pendonor', 'kegiatan')
        );
    }

    // Simpan hasil donor
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_pendonor' => 'required|exists:pendonor,id_pendonor',
            'id_kegiatan' => 'required|exists:kegiatan_donor,id_kegiatan',
            'tanggal_donor' => 'required|date',
            'jumlah_kantong' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        $hasil = HasilDonor::create($data);

        RiwayatDonor::create([
            'id_pendonor' => $hasil->id_pendonor,
            'id_hasil' => $hasil->id_hasil,
        ]);

        LaporanDonor::create([
            'id_hasil' => $hasil->id_hasil,
            'id_kegiatan' => $hasil->id_kegiatan,
        ]);

        return redirect()
            ->route('riwayat-donor.index')
            ->with(
                'success',
                'Hasil donor berhasil dicatat dan disimpan ke riwayat serta laporan donor.'
            );
    }
}