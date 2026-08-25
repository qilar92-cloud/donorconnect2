<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PetugasPMR extends Model
{
    protected $table = 'petugas_pmr';
    protected $primaryKey = 'id_petugas';

    protected $fillable = [
        'id_user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
