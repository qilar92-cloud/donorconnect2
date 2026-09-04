<?php

namespace App\Http\Controllers;

use App\Models\LaporanDonor;
use App\Models\HasilDonor;
use App\Models\KegiatanDonor;
use Illuminate\Http\Request;

class LaporanDonorController extends Controller
{
    // Tampilkan laporan
    public function index(Request $request)
    {
        $hasilDonor = HasilDonor::all();

        foreach ($hasilDonor as $hasil) {
            LaporanDonor::firstOrCreate([
                'id_hasil' => $hasil->id_hasil,
                'id_kegiatan' => $hasil->id_kegiatan,
            ]);
        }

        $kegiatan = KegiatanDonor::orderBy(
            'tanggal',
            'asc'
        )->get();

        $query = LaporanDonor::with([
            'hasilDonor.pendonor.user',
            'hasilDonor.kegiatanDonor'
        ]);

        if ($request->filled('dari_tanggal')) {
            $query->whereHas('hasilDonor', function ($q) use ($request) {
                $q->whereDate(
                    'tanggal_donor',
                    '>=',
                    $request->dari_tanggal
                );
            });
        }

        if ($request->filled('sampai_tanggal')) {
            $query->whereHas('hasilDonor', function ($q) use ($request) {
                $q->whereDate(
                    'tanggal_donor',
                    '<=',
                    $request->sampai_tanggal
                );
            });
        }

        if ($request->filled('id_kegiatan')) {
            $query->where(
                'id_kegiatan',
                $request->id_kegiatan
            );
        }

        $laporan = $query
            ->latest('id_laporan')
            ->get();

        $totalPendonor = $laporan
            ->pluck('hasilDonor.id_pendonor')
            ->filter()
            ->unique()
            ->count();

        $totalKegiatan = $laporan
            ->pluck('hasilDonor.id_kegiatan')
            ->filter()
            ->unique()
            ->count();

        $totalKantong = $laporan->sum(function ($item) {
            return $item->hasilDonor->jumlah_kantong ?? 0;
        });

        $pendonorAktif = $totalPendonor;

        $grafik = [];

        for ($bulan = 1; $bulan <= 12; $bulan++) {

            $jumlah = $laporan->filter(function ($item) use ($bulan) {
                return $item->hasilDonor &&
                    $item->hasilDonor->tanggal_donor &&
                    $item->hasilDonor->tanggal_donor->month == $bulan;
            })->sum(function ($item) {
                return $item->hasilDonor->jumlah_kantong ?? 0;
            });

            $grafik[] = $jumlah;
        }

        return view(
            'pages.laporan_donor.index',
            compact(
                'laporan',
                'kegiatan',
                'totalPendonor',
                'totalKegiatan',
                'totalKantong',
                'pendonorAktif',
                'grafik'
            )
        );
    }

    // Filter laporan
    public function filter(Request $request)
    {
        return $this->index($request);
    }
}