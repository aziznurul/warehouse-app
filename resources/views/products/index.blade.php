@extends('layouts.dashboard')

@section('title', 'Master Produk')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold">Master Produk</h4>

    <a href="{{ route('products.create') }}" class="btn btn-primary">
        + Tambah Produk
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $p)
                <tr>
                    <td>{{ $p->kode_produk }}</td>
                    <td>{{ $p->nama_produk }}</td>
                    <td>{{ $p->satuan }}</td>
                    <td>{{ $p->stok }}</td>
                    <td>
                        <a href="{{ route('products.edit', $p) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>
                        <form action="{{ route('products.destroy', $p) }}" method="POST" class="d-inline deleteForm">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(this.form)">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Data produk belum ada
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
