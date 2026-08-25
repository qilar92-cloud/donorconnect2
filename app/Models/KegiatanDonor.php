<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KegiatanDonor extends Model
{
    protected $table = 'kegiatan_donor';
    protected $primaryKey = 'id_kegiatan';

    protected $fillable = [
        'nama_kegiatan',
        'tanggal',
        'waktu',
        'lokasi',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function pendaftaranDonor(): HasMany
    {
        return $this->hasMany(PendaftaranDonor::class, 'id_kegiatan', 'id_kegiatan');
    }

    public function hasilDonor(): HasMany
    {
        return $this->hasMany(HasilDonor::class, 'id_kegiatan', 'id_kegiatan');
    }
}
