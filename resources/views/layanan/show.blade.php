
@extends('layouts.app')

@section('title', 'Detail Layanan - LaundryCare')

@section('page-title', 'Detail Layanan')

@section('content')

<div class="row">
    <div class="col-md-8">

        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Informasi Layanan</h4>
                <p class="text-muted">
                    Informasi lengkap layanan LaundryCare.
                </p>

                <div class="mb-3">
                    <label class="text-muted">Nama Layanan</label>
                    <h5>{{ $layanan->nama_layanan }}</h5>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="text-muted">Deskripsi</label>
                    <h5>{{ $layanan->deskripsi ?? '-' }}</h5>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="text-muted">Harga</label>
                    <h5>
                        Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                        / {{ $layanan->satuan }}
                    </h5>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="text-muted">Estimasi Pengerjaan</label>
                    <h5>{{ $layanan->estimasi_hari }} Hari</h5>
                </div>

                <hr>

                <div class="mb-4">
                    <label class="text-muted">Status Layanan</label>
                    <div>
                        @if($layanan->status)
                            <span class="badge bg-success fs-6">Aktif</span>
                        @else
                            <span class="badge bg-danger fs-6">Tidak Aktif</span>
                        @endif
                    </div>
                </div>

                <div class="d-flex gap-2">

                    <a href="{{ route('layanan.edit', $layanan->id) }}"
                       class="btn btn-warning">
                        <i class="mdi mdi-pencil"></i>
                        Edit Layanan
                    </a>

                    <a href="{{ route('layanan.index') }}"
                       class="btn btn-secondary">
                        <i class="mdi mdi-arrow-left"></i>
                        Kembali
                    </a>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
