<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiwayatDonor extends Model
{
    protected $table = 'riwayat_donor';
    protected $primaryKey = 'id_riwayat';

    protected $fillable = [
        'id_pendonor',
        'id_hasil',
    ];

    public function pendonor(): BelongsTo
    {
        return $this->belongsTo(Pendonor::class, 'id_pendonor', 'id_pendonor');
    }

    public function hasilDonor(): BelongsTo
    {
        return $this->belongsTo(HasilDonor::class, 'id_hasil', 'id_hasil');
    }
}
