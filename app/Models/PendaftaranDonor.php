<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PendaftaranDonor extends Model
{
    protected $table = 'pendaftaran_donor';
    protected $primaryKey = 'id_pendaftaran';

    protected $fillable = [
        'id_pendonor',
        'id_kegiatan',
        'status_pendaftaran',
    ];

    public function pendonor(): BelongsTo
    {
        return $this->belongsTo(Pendonor::class, 'id_pendonor', 'id_pendonor');
    }

    public function kegiatanDonor(): BelongsTo
    {
        return $this->belongsTo(KegiatanDonor::class, 'id_kegiatan', 'id_kegiatan');
    }
}
