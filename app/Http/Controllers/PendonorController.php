<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendonor;
use App\Models\KegiatanDonor;
use App\Models\RiwayatDonor;

class PendonorController extends Controller
{
    public function index()
    {
        $pendonor = Pendonor::where(
            'id_user',
            session('id_user')
        )->firstOrFail();

        return view('pendonor.index', compact('pendonor'));
    }

    public function daftarKegiatanDonor()
    {
        $kegiatan = KegiatanDonor::orderBy('tanggal')->get();

        return view(
            'pendonor.kegiatan',
            compact('kegiatan')
        );
    }

    public function lihatRiwayatDonor()
    {
        $pendonor = Pendonor::where(
            'id_user',
            session('id_user')
        )->firstOrFail();

        $riwayat = RiwayatDonor::where(
            'id_pendonor',
            $pendonor->id_pendonor
        )->with('hasilDonor')->get();

        return view(
            'pendonor.riwayat',
            compact('riwayat')
        );
    }
}
