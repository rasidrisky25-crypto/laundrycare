@extends('layouts.app')

@section('title', 'Dashboard - LaundryCare')

@section('page-title', 'Dashboard')

@section('content')

<div class="row">

    <!-- Selamat Datang -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Selamat Datang di LaundryCare</h4>
                <p class="card-text">
                    Sistem Informasi Manajemen Laundry.
                    Kelola data pelanggan, layanan, pesanan,
                    detail pesanan, dan pembayaran melalui
                    menu navigasi di sebelah kiri.
                </p>
            </div>
        </div>
    </div>

    <!-- Data Pelanggan -->
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h3 class="text-info">
                            <i class="mdi mdi-account-multiple"></i>
                        </h3>
                        <h5>Data Pelanggan</h5>
                        <p class="text-muted mb-0">
                            Kelola informasi pelanggan.
                        </p>
                    </div>
                </div>
                <a href="{{ route('pelanggan.index') }}"
                    class="btn btn-info btn-sm mt-3">
                    Lihat Data
                </a>
            </div>
        </div>
    </div>

    <!-- Data Layanan -->
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h3 class="text-success">
                    <i class="mdi mdi-washing-machine"></i>
                </h3>
                <h5>Data Layanan</h5>
                <p class="text-muted mb-0">
                    Kelola jenis dan harga layanan laundry.
                </p>
                <a href="{{ route('layanan.index') }}"
                    class="btn btn-success btn-sm mt-3">
                    Lihat Data
                </a>
            </div>
        </div>
    </div>

    <!-- Data Pesanan -->
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h3 class="text-warning">
                    <i class="mdi mdi-clipboard-text"></i>
                </h3>
                <h5>Data Pesanan</h5>
                <p class="text-muted mb-0">
                    Kelola seluruh pesanan pelanggan.
                </p>
                <a href="{{ route('pesanan.index') }}"
                    class="btn btn-warning btn-sm mt-3">
                    Lihat Data
                </a>
            </div>
        </div>
    </div>

    <!-- Detail Pesanan -->
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h3 class="text-primary">
                    <i class="mdi mdi-file-document"></i>
                </h3>
                <h5>Detail Pesanan</h5>
                <p class="text-muted mb-0">
                    Lihat rincian layanan setiap pesanan.
                </p>
                <a href="{{ route('detail-pesanan.index') }}"
                    class="btn btn-primary btn-sm mt-3">
                    Lihat Data
                </a>
            </div>
        </div>
    </div>

    <!-- Pembayaran -->
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h3 class="text-danger">
                    <i class="mdi mdi-cash-multiple"></i>
                </h3>
                <h5>Pembayaran</h5>
                <p class="text-muted mb-0">
                    Kelola transaksi pembayaran pelanggan.
                </p>
                <a href="{{ route('pembayaran.index') }}"
                    class="btn btn-danger btn-sm mt-3">
                    Lihat Data
                </a>
            </div>
        </div>
    </div>

</div>

@endsection
