<?php

namespace App\Http\Controllers;

use App\Models\DokumentasiDonor;
use App\Models\KegiatanDonor;
use App\Models\Pendonor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KegiatanDonorController extends Controller
{
    // Daftar kegiatan petugas

    public function index()
    {
        $jumlahTotal = KegiatanDonor::count();

        $jumlahMendatang = KegiatanDonor::whereDate(
            'tanggal',
            '>',
            Carbon::today()
        )->count();

        $jumlahHariIni = KegiatanDonor::whereDate(
            'tanggal',
            Carbon::today()
        )->count();

        $kegiatan = KegiatanDonor::orderBy(
            'tanggal',
            'asc'
        )->paginate(6);

        return view(
            'pages.kegiatan-donor.index',
            compact(
                'kegiatan',
                'jumlahTotal',
                'jumlahMendatang',
                'jumlahHariIni'
            )
        );
    }


    // Form tambah

    public function create()
    {
        return view('pages.kegiatan-donor.create');
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


    // Detail kegiatan petugas

    public function show($id)
    {
        $kegiatan = KegiatanDonor::with([
            'pendaftaranDonor.pendonor.user',
        ])->findOrFail($id);

        $dokumentasi = DokumentasiDonor::where(
            'id_kegiatan',
            $kegiatan->id_kegiatan
        )
            ->latest()
            ->get();

        return view(
            'pages.kegiatan-donor.show-petugas',
            compact(
                'kegiatan',
                'dokumentasi'
            )
        );
    }


    // Form edit

    public function edit($id)
    {
        $kegiatan = KegiatanDonor::findOrFail($id);

        return view(
            'pages.kegiatan-donor.edit',
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


    // Daftar kegiatan pendonor

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
            'pages.kegiatan-donor.show-pendonor',
            compact('kegiatan')
        );
    }


    // Form pendaftaran

    public function formPendaftaran($id)
    {
        $kegiatan = KegiatanDonor::findOrFail($id);

        $pendonor = Pendonor::where(
            'id_user',
            session('id_user')
        )->firstOrFail();

        return view(
            'pages.pendonor.pendaftaran.daftar',
            compact(
                'kegiatan',
                'pendonor'
            )
        );
    }
}