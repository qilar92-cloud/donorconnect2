<?php

namespace App\Http\Controllers;

use App\Models\Pendonor;
use App\Models\KegiatanDonor;
use App\Models\RiwayatDonor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    // Data Pendonor

    public function dataPendonor()
    {
        $pendonor = Pendonor::with('user')->get();

        return view(
            'pages.pendonor.data.index',
            compact('pendonor')
        );
    }


    // Detail Pendonor

    public function show($id)
    {
        $pendonor = Pendonor::with('user')
            ->findOrFail($id);

        return view(
            'pages.pendonor.data.show',
            compact('pendonor')
        );
    }


    // Form Edit Pendonor

    public function edit($id)
    {
        $pendonor = Pendonor::with('user')
            ->findOrFail($id);

        return view(
            'pages.pendonor.data.edit',
            compact('pendonor')
        );
    }


    // Update Pendonor

    public function update(Request $request, $id)
    {
        $pendonor = Pendonor::with('user')
            ->findOrFail($id);

        $request->validate([
            'status' => 'nullable|string|max:255',
            'kelas_jabatan' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'golongan_darah' => 'nullable|string|max:10',
            'nomor_telepon' => 'nullable|string|max:20',
            'informasi_kesehatan' => 'nullable|string',
        ]);

        DB::transaction(function () use ($request, $pendonor) {

            $pendonor->update([
                'status' => $request->status,
                'kelas_jabatan' => $request->kelas_jabatan,
                'tanggal_lahir' => $request->tanggal_lahir,
                'golongan_darah' => $request->golongan_darah,
                'nomor_telepon' => $request->nomor_telepon,
                'informasi_kesehatan' => $request->informasi_kesehatan,
            ]);
        });

        return redirect()
            ->route('pendonor.index')
            ->with('success', 'Data pendonor berhasil diperbarui.');
    }


    // Hapus Pendonor

    public function destroy($id)
    {
        $pendonor = Pendonor::findOrFail($id);

        $pendonor->delete();

        return redirect()
            ->route('pendonor.index')
            ->with('success', 'Data pendonor berhasil dihapus.');
    }


    // Daftar Kegiatan Donor

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
            'pages.pendonor.riwayat-donor.riwayat',
            compact('riwayat')
        );
    }
}