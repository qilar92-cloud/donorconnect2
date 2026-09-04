<?php

namespace App\Http\Controllers;

use App\Models\KegiatanDonor;
use App\Models\Pendonor;
use Illuminate\Http\Request;

class KegiatanDonorController extends Controller
{
    // Daftar kegiatan untuk petugas
    public function index()
    {
        $kegiatan = KegiatanDonor::orderBy('tanggal', 'asc')->get();

        return view(
            'pages.kegiatan_donor.index',
            compact('kegiatan')
        );
    }

    // Form tambah kegiatan
    public function create()
    {
        return view('pages.kegiatan_donor.create');
    }

    // Simpan kegiatan
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        KegiatanDonor::create($data);

        return redirect()
            ->route('kegiatan-donor.index')
            ->with(
                'success',
                'Kegiatan donor berhasil ditambahkan.'
            );
    }

    // Detail kegiatan
    public function show($id)
    {
        $kegiatan = KegiatanDonor::with([
            'pendaftaranDonor.pendonor.user',
        ])->findOrFail($id);

        return view(
            'pages.kegiatan_donor.show',
            compact('kegiatan')
        );
    }

    // Form edit
    public function edit($id)
    {
        $kegiatan = KegiatanDonor::findOrFail($id);

        return view(
            'pages.kegiatan_donor.edit',
            compact('kegiatan')
        );
    }

    // Update kegiatan
    public function update(Request $request, $id)
    {
        $kegiatan = KegiatanDonor::findOrFail($id);

        $data = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $kegiatan->update($data);

        return redirect()
            ->route('kegiatan-donor.index')
            ->with(
                'success',
                'Kegiatan donor berhasil diperbarui.'
            );
    }

    // Hapus kegiatan
    public function destroy($id)
    {
        $kegiatan = KegiatanDonor::findOrFail($id);

        $kegiatan->delete();

        return redirect()
            ->route('kegiatan-donor.index')
            ->with(
                'success',
                'Kegiatan donor berhasil dihapus.'
            );
    }

    // Daftar kegiatan untuk pendonor
    public function pendonor()
    {
        $kegiatan = KegiatanDonor::orderBy(
            'tanggal',
            'asc'
        )->get();

        return view(
            'pages.pendonor.kegiatan',
            compact('kegiatan')
        );
    }

    // Detail kegiatan pendonor
    public function detailPendonor($id)
    {
        $kegiatan = KegiatanDonor::findOrFail($id);

        return view(
            'pages.kegiatan_donor.show_pendonor',
            compact('kegiatan')
        );
    }

    // Form pendaftaran donor
    public function formPendaftaran($id)
    {
        $kegiatan = KegiatanDonor::findOrFail($id);

        $pendonor = Pendonor::where(
            'id_user',
            session('id_user')
        )->firstOrFail();

        return view(
            'pages.pendonor.pendaftaran.daftar',
            compact('kegiatan', 'pendonor')
        );
    }
}