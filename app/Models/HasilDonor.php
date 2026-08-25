<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HasilDonor extends Model
{
    protected $table = 'hasil_donor';
    protected $primaryKey = 'id_hasil';

    protected $fillable = [
        'id_pendonor',
        'id_kegiatan',
        'tanggal_donor',
        'jumlah_kantong',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_donor' => 'date',
    ];

    public function pendonor(): BelongsTo
    {
        return $this->belongsTo(Pendonor::class, 'id_pendonor', 'id_pendonor');
    }

    public function kegiatanDonor(): BelongsTo
    {
        return $this->belongsTo(KegiatanDonor::class, 'id_kegiatan', 'id_kegiatan');
    }

    public function riwayatDonor(): HasOne
    {
        return $this->hasOne(RiwayatDonor::class, 'id_hasil', 'id_hasil');
    }
}
