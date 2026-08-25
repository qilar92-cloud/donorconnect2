<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanDonor extends Model
{
    protected $table = 'laporan_donor';
    protected $primaryKey = 'id_laporan';

protected $fillable = [
    'id_hasil',
    'id_kegiatan',
];


public function hasilDonor(): BelongsTo
{
    return $this->belongsTo(
        HasilDonor::class,
        'id_hasil',
        'id_hasil'
    );
}

public function kegiatanDonor(): BelongsTo
{
    return $this->belongsTo(
        KegiatanDonor::class,
        'id_kegiatan',
        'id_kegiatan'
    );
  }
}