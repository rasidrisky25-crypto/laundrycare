
@extends('layouts.app')

@section('title', 'Detail Pelanggan - LaundryCare')

@section('page-title', 'Detail Pelanggan')

@section('content')

<div class="row">
    <div class="col-md-8">

        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Informasi Pelanggan</h4>
                <p class="text-muted">
                    Informasi lengkap pelanggan LaundryCare.
                </p>

                <div class="mb-3">
                    <label class="text-muted">Nama Pelanggan</label>
                    <h5>{{ $pelanggan->nama }}</h5>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="text-muted">Nomor HP</label>
                    <h5>{{ $pelanggan->no_hp }}</h5>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="text-muted">Alamat</label>
                    <h5>{{ $pelanggan->alamat }}</h5>
                </div>

                <hr>

                <div class="mb-4">
                    <label class="text-muted">Email</label>
                    <h5>{{ $pelanggan->email ?? '-' }}</h5>
                </div>

                <div class="d-flex gap-2">

                    <a href="{{ route('pelanggan.edit', $pelanggan->id) }}"
                       class="btn btn-warning">
                        <i class="mdi mdi-pencil"></i>
                        Edit Pelanggan
                    </a>

                    <a href="{{ route('pelanggan.index') }}"
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
