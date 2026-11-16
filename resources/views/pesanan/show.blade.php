
@extends('layouts.app')

@section('title', 'Detail Pesanan')
@section('page-title', 'Detail Pesanan')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="card-title mb-1">Informasi Pesanan</h4>
                        <p class="text-muted mb-0">
                            Informasi lengkap pesanan LaundryCare.
                        </p>
                    </div>

                    <span class="badge bg-primary fs-6">
                        {{ ucfirst($pesanan->status) }}
                    </span>
                </div>

                <div class="mb-3">
                    <label class="text-muted">Kode Pesanan</label>
                    <h5>{{ $pesanan->kode_pesanan }}</h5>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="text-muted">Nama Pelanggan</label>
                    <h5>{{ $pesanan->pelanggan->nama ?? '-' }}</h5>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="text-muted">Nomor HP Pelanggan</label>
                    <h5>{{ $pesanan->pelanggan->no_hp ?? '-' }}</h5>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="text-muted">Tanggal Masuk</label>
                    <h5>
                        {{ \Carbon\Carbon::parse($pesanan->tanggal_masuk)->format('d-m-Y') }}
                    </h5>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="text-muted">Tanggal Selesai</label>
                    <h5>
                        {{ $pesanan->tanggal_selesai
                            ? \Carbon\Carbon::parse($pesanan->tanggal_selesai)->format('d-m-Y')
                            : '-' }}
                    </h5>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="text-muted">Berat</label>
                    <h5>{{ $pesanan->berat }} kg</h5>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="text-muted">Total Harga</label>
                    <h5>
                        Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                    </h5>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="text-muted">Status Pesanan</label>
                    <div>
                        <span class="badge bg-primary fs-6">
                            {{ ucfirst($pesanan->status) }}
                        </span>
                    </div>
                </div>

                <hr>

                <div class="mb-4">
                    <label class="text-muted">Catatan</label>
                    <h5>{{ $pesanan->catatan ?? '-' }}</h5>
                </div>

                <a href="{{ route('pesanan.edit', $pesanan->id) }}"
                   class="btn btn-warning">
                    <i class="mdi mdi-pencil"></i>
                    Edit Pesanan
                </a>

                <a href="{{ route('pesanan.index') }}"
                   class="btn btn-secondary">
                    <i class="mdi mdi-arrow-left"></i>
                    Kembali
                </a>

            </div>
        </div>
    </div>
</div>

@endsection
