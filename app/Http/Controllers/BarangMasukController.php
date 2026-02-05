<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuk = BarangMasuk::with('product')->latest()->get();
        return view('barang-masuk.index', compact('barangMasuk'));
    }

    public function create()
    {
        $products = Product::all();
        return view('barang-masuk.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        DB::transaction(function () use ($request) {
            BarangMasuk::create($request->all());

            Product::where('id', $request->product_id)
                ->increment('stok', $request->jumlah);
        });

        return redirect()
            ->route('barang-masuk.index')
            ->with('success', 'Barang masuk berhasil disimpan');
    }
}

