<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
        'email',
    ];

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}
