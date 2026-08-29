<?php

namespace App\Http\Controllers;

use App\Models\KegiatanDonor;
use Illuminate\Http\Request;

class KegiatanDonorController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanDonor::orderBy('tanggal')->get();

        return view(
            'pages.kegiatan_donor.index',
            compact('kegiatan')
        );
    }

    public function create()
    {
        return view('pages.kegiatan_donor.create');
    }

    public function show($id)
    {
        $kegiatan = KegiatanDonor::with([
            'pendaftaranDonor.pendonor.user',
        ])->findOrFail($id);

        if (auth()->user()->role === 'pendonor') {
            return view(
                'pages.kegiatan_donor.show_pendonor',
                compact('kegiatan')
            );
        }

        return view(
            'pages.kegiatan_donor.show',
            compact('kegiatan')
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        KegiatanDonor::create($data);

        return redirect()
            ->route('kegiatan-donor.index')
            ->with('success', 'Kegiatan donor berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kegiatan = KegiatanDonor::findOrFail($id);

        return view(
            'pages.kegiatan_donor.edit',
            compact('kegiatan')
        );
    }

    public function update(Request $request, $id)
    {
        $kegiatan = KegiatanDonor::findOrFail($id);

        $data = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $kegiatan->update($data);

        return redirect()
            ->route('kegiatan-donor.index')
            ->with('success', 'Kegiatan donor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kegiatan = KegiatanDonor::findOrFail($id);

        $kegiatan->delete();

        return redirect()
            ->route('kegiatan-donor.index')
            ->with('success', 'Kegiatan donor berhasil dihapus.');
    }
}
