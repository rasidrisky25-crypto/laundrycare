<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    protected $fillable = [
        'pesanan_id',
        'layanan_id',
        'jumlah',
        'harga',
        'subtotal',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
