<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilDonor;

class HasilDonorController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_pendonor' => 'required|exists:pendonor,id_pendonor',
            'id_kegiatan' => 'required|exists:kegiatan_donor,id_kegiatan',
            'tanggal_donor' => 'required|date',
            'jumlah_kantong' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        HasilDonor::create($data);

        return back()->with(
            'success',
            'Hasil donor berhasil dicatat.'
        );
    }

    public function create()
    {
        return view('pages.hasil-donor.create');
    }
}
