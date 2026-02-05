<?php

namespace App\Http\Controllers;

use App\Models\Product;

class LaporanStokController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('nama_produk')->get();
        return view('laporan.stok', compact('products'));
    }
}
