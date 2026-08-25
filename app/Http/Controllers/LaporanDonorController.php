<?php

namespace App\Http\Controllers;

use App\Models\LaporanDonor;

class LaporanDonorController extends Controller
{
    public function index()
    {
        $laporan = LaporanDonor::with([
            'hasilDonor.pendonor',
            'hasilDonor.kegiatanDonor',
            'kegiatanDonor'
        ])->get();

        return view(
            'laporan_donor.index',
            compact('laporan')
        );
    }

    public function filter()
    {
        $laporan = LaporanDonor::with([
            'hasilDonor.pendonor',
            'hasilDonor.kegiatanDonor',
            'kegiatanDonor'
        ])->get();

        return view(
            'laporan_donor.index',
            compact('laporan')
        );
    }
}