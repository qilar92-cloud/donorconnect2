<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function petugasPMR(): HasOne
    {
        return $this->hasOne(PetugasPMR::class, 'id_user', 'id_user');
    }

    public function pendonor(): HasOne
    {
        return $this->hasOne(Pendonor::class, 'id_user', 'id_user');
    }
}
