<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'kode_pemesanan',
        'status',
        'total_harga',
        'kode_unik',
        'user_id',
        'bkt_transaksi',
    ];

    // Relasi dengan tabel pesanan_detail
    public function pesanan_details()
    {
        return $this->hasMany(PesananDetail::class, 'pesanan_id', 'id');
    }

    // Relasi dengan table user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
