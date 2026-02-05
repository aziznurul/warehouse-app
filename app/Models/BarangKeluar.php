<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluar';

    protected $fillable = [
        'product_id',
        'jumlah',
        'tanggal_keluar',
        'keterangan',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

