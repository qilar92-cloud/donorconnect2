<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatDonor;
use App\Models\Pendonor;

class RiwayatDonorController extends Controller
{
    public function index()
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
            'riwayat_donor.index',
            compact('riwayat')
        );
    }

    public function store(
        $id_pendonor,
        $id_hasil
    ) {
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
