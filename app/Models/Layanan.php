<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'harga',
        'satuan',
        'estimasi_hari',
        'status',
    ];

    public function detailPesanans()
    {
        return $this->hasMany(DetailPesanan::class);
    }
}