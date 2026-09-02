<?php

namespace App\Http\Controllers;

use App\Models\Pendonor;
use App\Models\KegiatanDonor;
use App\Models\RiwayatDonor;

class PendonorController extends Controller
{
    // Profil Pendonor

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


    // Data Pendonor untuk Petugas

    public function dataPendonor()
    {
        $pendonor = Pendonor::with('user')->get();

        return view(
            'pages.pendonor.data.index',
            compact('pendonor')
        );
    }


    // Daftar Kegiatan Donor Pendonor

    public function daftarKegiatanDonor()
    {
        $kegiatan = KegiatanDonor::orderBy('tanggal')->get();

        return view(
            'pages.pendonor.kegiatan',
            compact('kegiatan')
        );
    }


    // Riwayat Donor Pendonor

    public function lihatRiwayatDonor()
    {
        $pendonor = Pendonor::where(
            'id_user',
            session('id_user')
        )->firstOrFail();

        $riwayat = RiwayatDonor::where(
            'id_pendonor',
            $pendonor->id_pendonor
        )
            ->with('hasilDonor')
            ->get();

        return view(
            'pages.pendonor.riwayat_donor.riwayat',
            compact('riwayat')
        );
    }
}