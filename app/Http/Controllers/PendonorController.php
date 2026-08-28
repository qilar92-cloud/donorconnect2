<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendonor;
use App\Models\KegiatanDonor;
use App\Models\RiwayatDonor;

class PendonorController extends Controller
{
    // Bagian Profil Pendonor

    public function index()
    {
        $pendonor = Pendonor::where(
            'id_user',
            session('id_user')
        )->firstOrFail();

        return view(
            'pages.pendonor.index',
            compact('pendonor')
        );
    }


    // Bagian Daftar Kegiatan Donor Pendonor

    public function daftarKegiatanDonor()
    {
        $kegiatan = KegiatanDonor::orderBy('tanggal')->get();

        return view(
            'pages.pendonor.kegiatan',
            compact('kegiatan')
        );
    }


    // Bagian Riwayat Donor Pendonor

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
            'pages.pendonor.riwayat',
            compact('riwayat')
        );
    }
}