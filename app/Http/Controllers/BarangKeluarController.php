<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluar = BarangKeluar::with('product')->latest()->get();
        return view('barang-keluar.index', compact('barangKeluar'));
    }

    public function create()
    {
        $products = Product::all();
        return view('barang-keluar.create', compact('products'));
    }

public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'jumlah' => 'required|integer|min:1',
        'tanggal_keluar' => 'required|date',
        'keterangan' => 'nullable|string',
    ]);

    $product = Product::findOrFail($request->product_id);

    // cek stok
    if ($request->jumlah > $product->stok) {
        // jika stok tidak cukup, redirect dengan error
        return redirect()->back()->with('error', 'Stok tidak mencukupi!');
    }

    // kurangi stok produk
    $product->stok -= $request->jumlah;
    $product->save();

    // simpan data barang keluar
    BarangKeluar::create([
        'product_id' => $product->id,
        'jumlah' => $request->jumlah,
        'tanggal_keluar' => $request->tanggal_keluar,
        'keterangan' => $request->keterangan,
    ]);

    return redirect()->route('barang-keluar.index')
                     ->with('success', 'Barang keluar berhasil disimpan');
}
}
