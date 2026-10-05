<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilDonor;
use App\Models\Pendonor;
use App\Models\KegiatanDonor;
use App\Models\PendaftaranDonor;
use App\Models\RiwayatDonor;
use App\Models\LaporanDonor;
use Carbon\Carbon;

class HasilDonorController extends Controller
{
    // Form catat hasil donor
    public function create()
    {
        $pendaftaran = PendaftaranDonor::with([
            'pendonor.user',
            'kegiatanDonor'
        ])
            ->where('status_pendaftaran', 'Terdaftar')
            ->get()
            ->filter(function ($item) {
                if (!$item->kegiatanDonor) {
                    return false;
                }

                $tanggalKegiatan = Carbon::parse(
                    $item->kegiatanDonor->tanggal
                );

                // Kegiatan hari ini atau yang sudah berlangsung
                return !$tanggalKegiatan
                    ->startOfDay()
                    ->isFuture();
            })
            ->values();

        // Pendonor yang terdaftar pada kegiatan valid
        $pendonor = $pendaftaran
            ->pluck('pendonor')
            ->filter()
            ->unique('id_pendonor')
            ->sortBy(function ($item) {
                return $item->user->nama ?? '';
            })
            ->values();

        // Kegiatan yang sudah berlangsung
        $kegiatan = $pendaftaran
            ->pluck('kegiatanDonor')
            ->filter()
            ->unique('id_kegiatan')
            ->sortBy(function ($item) {
                return $item->tanggal;
            })
            ->values();

        return view(
            'pages.hasil-donor.create',
            compact(
                'pendonor',
                'kegiatan',
                'pendaftaran'
            )
        );
    }

    // Simpan hasil donor
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_pendonor' => [
                'required',
                'exists:pendonor,id_pendonor',
            ],

            'id_kegiatan' => [
                'required',
                'exists:kegiatan_donor,id_kegiatan',
            ],

            'tanggal_donor' => [
                'required',
                'date',
            ],

            'jumlah_kantong' => [
                'required',
                'integer',
                'min:1',
            ],

            'volume_ml' => [
                'required',
                'integer',
                'min:1',
            ],

            'keterangan' => [
                'nullable',
                'string',
            ],
        ]);

        // Ambil kegiatan
        $kegiatan = KegiatanDonor::find(
            $data['id_kegiatan']
        );

        if (!$kegiatan) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Kegiatan donor tidak ditemukan.'
                );
        }

        $tanggalKegiatan = Carbon::parse(
            $kegiatan->tanggal
        );

        $tanggalDonor = Carbon::parse(
            $data['tanggal_donor']
        );

        // Pastikan pendonor terdaftar pada kegiatan
        $pendaftaran = PendaftaranDonor::where(
            'id_pendonor',
            $data['id_pendonor']
        )
            ->where(
                'id_kegiatan',
                $data['id_kegiatan']
            )
            ->first();

        if (!$pendaftaran) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Hasil donor tidak dapat dicatat karena pendonor belum terdaftar pada kegiatan donor yang dipilih.'
                );
        }

        // Pastikan status pendaftaran benar
        if (
            trim($pendaftaran->status_pendaftaran)
            !== 'Terdaftar'
        ) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Hasil donor tidak dapat dicatat karena status pendaftaran pendonor tidak valid.'
                );
        }

        // Kegiatan harus sudah berlangsung
        if (
            $tanggalKegiatan
                ->startOfDay()
                ->isFuture()
        ) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Hasil donor belum dapat dicatat karena kegiatan donor belum berlangsung.'
                );
        }

        // Tanggal donor harus sama dengan tanggal kegiatan
        if (
            !$tanggalDonor->isSameDay($tanggalKegiatan)
        ) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Tanggal donor tidak sesuai dengan tanggal kegiatan donor.'
                );
        }

        // Cegah hasil donor dicatat dua kali
        $sudahAda = HasilDonor::where(
            'id_pendonor',
            $data['id_pendonor']
        )
            ->where(
                'id_kegiatan',
                $data['id_kegiatan']
            )
            ->exists();

        if ($sudahAda) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Hasil donor untuk pendonor dan kegiatan tersebut sudah pernah dicatat.'
                );
        }

        // Simpan hasil donor
        $hasil = HasilDonor::create([
            'id_pendonor' => $data['id_pendonor'],
            'id_kegiatan' => $data['id_kegiatan'],
            'tanggal_donor' => $data['tanggal_donor'],
            'jumlah_kantong' => $data['jumlah_kantong'],
            'volume_ml' => $data['volume_ml'],
            'keterangan' => $data['keterangan'] ?? null,
        ]);

        // Simpan ke riwayat donor
        RiwayatDonor::create([
            'id_pendonor' => $hasil->id_pendonor,
            'id_hasil' => $hasil->id_hasil,
        ]);

        // Simpan ke laporan donor
        LaporanDonor::create([
            'id_hasil' => $hasil->id_hasil,
            'id_kegiatan' => $hasil->id_kegiatan,
        ]);

        return redirect()
            ->route('riwayat-donor.index')
            ->with(
                'success',
                'Hasil donor berhasil dicatat dan disimpan ke riwayat serta laporan donor.'
            );
    }
}