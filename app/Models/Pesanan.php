<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'kode_pesanan',
        'pelanggan_id',
        'tanggal_masuk',
        'tanggal_selesai',
        'berat',
        'total_harga',
        'status',
        'catatan',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function detailPesanans()
    {
        return $this->hasMany(DetailPesanan::class);
    }
    
    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'pesanan_id');
    }
}
