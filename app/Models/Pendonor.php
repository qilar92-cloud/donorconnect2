<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pendonor extends Model
{
    protected $table = 'pendonor';
    protected $primaryKey = 'id_pendonor';

    protected $fillable = [
        'id_user',
        'status',
        'kelas_jabatan',
        'tanggal_lahir',
        'golongan_darah',
        'nomor_telepon',
        'informasi_kesehatan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function pendaftaranDonor(): HasMany
    {
        return $this->hasMany(PendaftaranDonor::class, 'id_pendonor', 'id_pendonor');
    }

    public function hasilDonor(): HasMany
    {
        return $this->hasMany(HasilDonor::class, 'id_pendonor', 'id_pendonor');
    }

    public function riwayatDonor(): HasMany
    {
        return $this->hasMany(RiwayatDonor::class, 'id_pendonor', 'id_pendonor');
    }
}
