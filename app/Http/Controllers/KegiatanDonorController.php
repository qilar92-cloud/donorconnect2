<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanDonor;

class KegiatanDonorController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanDonor::orderBy('tanggal')->get();

        return view(
            'kegiatan_donor.index',
            compact('kegiatan')
        );
    }

    public function show($id)
    {
        $kegiatan = KegiatanDonor::findOrFail($id);

        return view(
            'kegiatan_donor.show',
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
