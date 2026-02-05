<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'satuan',
        'stok',
    ];

    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }
    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}
