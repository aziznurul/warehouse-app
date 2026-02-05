@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

<h3 class="fw-bold mb-4">Dashboard</h3>

<div class="row g-4">

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Total Produk</h6>
                <h3 class="fw-bold">{{ $totalProduk }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Total Barang Masuk</h6>
                <h3 class="fw-bold text-success">{{ $totalMasuk }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Total Barang Keluar</h6>
                <h3 class="fw-bold text-danger">{{ $totalKeluar }}</h3>
            </div>
        </div>
    </div>

</div>

@endsection
