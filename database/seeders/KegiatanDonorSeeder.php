<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KegiatanDonor;

class KegiatanDonorSeeder extends Seeder
{
    public function run(): void
    {
        KegiatanDonor::create([
            'nama_kegiatan' => 'Donor Darah Akbar PMR Kota Bandung',
            'tanggal' => '2025-05-24',
            'waktu' => '08:00:00',
            'lokasi' => 'Aula PMR Kota Bandung',
            'keterangan' => 'Kegiatan donor darah bersama PMR Kota Bandung.',
        ]);

        KegiatanDonor::create([
            'nama_kegiatan' => 'Donor Darah Kampus Universitas',
            'tanggal' => '2025-05-31',
            'waktu' => '08:00:00',
            'lokasi' => 'Aula Universitas',
            'keterangan' => 'Kegiatan donor darah bersama civitas kampus.',
        ]);

        KegiatanDonor::create([
            'nama_kegiatan' => 'Donor Darah Bersama Kelurahan Sukajadi',
            'tanggal' => '2025-06-10',
            'waktu' => '08:00:00',
            'lokasi' => 'Kantor Kelurahan Sukajadi',
            'keterangan' => 'Kegiatan donor darah bersama masyarakat.',
        ]);
    }
}