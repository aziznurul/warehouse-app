@extends('layouts.dashboard')

@section('title', 'Tambah Barang Keluar')

@section('content')

<div class="mb-4">
    <h4 class="fw-bold">Tambah Barang Keluar</h4>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        {{-- Alert error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('barang-keluar.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Produk</label>
                <select name="product_id" class="form-select" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}"
                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->nama_produk }} (Stok: {{ $product->stok }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Keluar</label>
                <input type="number"
                       name="jumlah"
                       class="form-control"
                       min="1"
                       value="{{ old('jumlah') }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Keluar</label>
                <input type="date"
                       name="tanggal_keluar"
                       class="form-control"
                       value="{{ old('tanggal_keluar', date('Y-m-d')) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan"
                          class="form-control"
                          rows="3">{{ old('keterangan') }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('barang-keluar.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>

@endsection
