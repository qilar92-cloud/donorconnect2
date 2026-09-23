<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumentasiDonor extends Model
{
    protected $table = 'dokumentasi_donors';

    protected $primaryKey = 'id_dokumentasi';

    protected $fillable = [
        'id_kegiatan',
        'foto',
        'judul',
        'keterangan',
    ];

    public function kegiatanDonor()
    {
        return $this->belongsTo(
            KegiatanDonor::class,
            'id_kegiatan',
            'id_kegiatan'
        );
    }
}