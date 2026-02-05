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
        ]);

        DB::transaction(function () use ($request) {
            $product = Product::findOrFail($request->product_id);

            // ⛔ VALIDASI PALING PENTING
            if ($request->jumlah > $product->stok) {
                abort(400, 'Stok tidak mencukupi');
            }

            BarangKeluar::create([
                'product_id' => $request->product_id,
                'jumlah' => $request->jumlah,
                'tanggal_keluar' => $request->tanggal_keluar,
                'keterangan' => $request->keterangan,
            ]);

            $product->decrement('stok', $request->jumlah);
        });

        return redirect()
            ->route('barang-keluar.index')
            ->with('success', 'Barang keluar berhasil disimpan');
    }
}
