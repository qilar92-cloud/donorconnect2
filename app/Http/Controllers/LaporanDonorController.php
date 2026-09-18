<?php

namespace App\Http\Controllers;

use App\Models\LaporanDonor;
use App\Models\KegiatanDonor;
use Illuminate\Http\Request;

class LaporanDonorController extends Controller
{
    // Tampilkan laporan
    public function index(Request $request)
    {
        $kegiatan = KegiatanDonor::orderBy(
            'tanggal',
            'asc'
        )->get();

        $query = LaporanDonor::with([
            'hasilDonor.pendonor.user',
            'hasilDonor.kegiatanDonor',
        ]);

        // Filter tanggal awal
        if ($request->filled('dari_tanggal')) {
            $query->whereHas('hasilDonor', function ($q) use ($request) {
                $q->whereDate(
                    'tanggal_donor',
                    '>=',
                    $request->dari_tanggal
                );
            });
        }

        // Filter tanggal akhir
        if ($request->filled('sampai_tanggal')) {
            $query->whereHas('hasilDonor', function ($q) use ($request) {
                $q->whereDate(
                    'tanggal_donor',
                    '<=',
                    $request->sampai_tanggal
                );
            });
        }

        // Filter kegiatan
        if ($request->filled('id_kegiatan')) {
            $query->where(
                'id_kegiatan',
                $request->id_kegiatan
            );
        }

        $laporan = $query
            ->latest('id_laporan')
            ->get();

        // Total pendonor
        $totalPendonor = $laporan
            ->pluck('hasilDonor.id_pendonor')
            ->filter()
            ->unique()
            ->count();

        // Total kegiatan
        $totalKegiatan = $laporan
            ->pluck('hasilDonor.id_kegiatan')
            ->filter()
            ->unique()
            ->count();

        // Total kantong
        $totalKantong = $laporan->sum(function ($item) {
            return $item->hasilDonor->jumlah_kantong ?? 0;
        });

        // Total donor
        $totalDonor = $laporan->count();

        // Data grafik 12 bulan
        $dataGrafik = array_fill(0, 12, 0);

        foreach ($laporan as $item) {

            if (
                $item->hasilDonor &&
                $item->hasilDonor->tanggal_donor
            ) {

                $bulan = $item->hasilDonor
                    ->tanggal_donor
                    ->month;

                $dataGrafik[$bulan - 1] +=
                    $item->hasilDonor->jumlah_kantong ?? 0;
            }
        }

        return view(
            'pages.laporan-donor.index',
            compact(
                'laporan',
                'kegiatan',
                'totalPendonor',
                'totalKegiatan',
                'totalKantong',
                'totalDonor',
                'dataGrafik'
            )
        );
    }

    // Filter laporan
    public function filter(Request $request)
    {
        return $this->index($request);
    }
}