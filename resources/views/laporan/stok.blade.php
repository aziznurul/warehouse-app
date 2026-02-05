@extends('layouts.dashboard')

@section('title', 'Laporan Stok Barang')

@section('content')

<div class="mb-4">
    <h4 class="fw-bold">Laporan Stok Barang</h4>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th width="50">No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Satuan</th>
                    <th width="120">Stok Tersedia</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->kode_produk }}</td>
                        <td>{{ $product->nama_produk }}</td>
                        <td>{{ $product->satuan }}</td>
                        <td class="fw-bold">
                            {{ $product->stok }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Tidak ada data produk
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
