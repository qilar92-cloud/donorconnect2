<?php

namespace App\Http\Controllers;

use App\Models\DokumentasiDonor;
use App\Models\KegiatanDonor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiDonorController extends Controller
{
    // Upload
    public function store(Request $request, $id_kegiatan)
    {
        $kegiatan = KegiatanDonor::findOrFail($id_kegiatan);

        $data = $request->validate([
            'foto' => 'required|array|min:1',
            'foto.*' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'judul' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Storage::disk('public')->makeDirectory('dokumentasi');

        $jumlahFoto = count($request->file('foto'));

        foreach ($request->file('foto') as $foto) {

            $path = $foto->store(
                'dokumentasi',
                'public'
            );

            DokumentasiDonor::create([
                'id_kegiatan' => $kegiatan->id_kegiatan,
                'foto' => $path,
                'judul' => $data['judul'] ?? null,
                'keterangan' => $data['keterangan'] ?? null,
            ]);
        }

        return back()->with(
            'success',
            $jumlahFoto . ' foto dokumentasi berhasil diupload.'
        );
    }

    // Semua dokumentasi
    public function pendonor()
    {
        $dokumentasi = DokumentasiDonor::with(
            'kegiatanDonor'
        )
            ->latest()
            ->get();

        return view(
            'pages.pendonor.dokumentasi',
            compact('dokumentasi')
        );
    }

    // Hapus
    public function destroy($id_dokumentasi)
    {
        $dokumentasi = DokumentasiDonor::findOrFail(
            $id_dokumentasi
        );

        if ($dokumentasi->foto) {

            Storage::disk('public')->delete(
                $dokumentasi->foto
            );
        }

        $dokumentasi->delete();

        return back()->with(
            'success',
            'Foto dokumentasi berhasil dihapus.'
        );
    }
}