
@extends('layouts.app')

@section('title', 'Tambah Pembayaran')
@section('page-title', 'Tambah Pembayaran')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Form Tambah Pembayaran</h4>
                <p class="card-subtitle mb-4">
                    Catat pembayaran dari pesanan pelanggan.
                </p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pembayaran.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Pesanan</label>

                        <select name="pesanan_id"
                                class="form-select @error('pesanan_id') is-invalid @enderror"
                                required>
                            <option value="">-- Pilih Pesanan --</option>

                            @foreach ($pesanans as $pesanan)
                                <option value="{{ $pesanan->id }}"
                                    {{ old('pesanan_id') == $pesanan->id ? 'selected' : '' }}>
                                    {{ $pesanan->kode_pesanan }}
                                    - {{ $pesanan->pelanggan->nama }}
                                    - Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>

                        @error('pesanan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Pembayaran</label>

                        <input type="date"
                               name="tanggal_bayar"
                               class="form-control @error('tanggal_bayar') is-invalid @enderror"
                               value="{{ old('tanggal_bayar', date('Y-m-d')) }}"
                               required>

                        @error('tanggal_bayar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah Pembayaran (Rp)</label>

                        <input type="number"
                               name="jumlah_bayar"
                               class="form-control @error('jumlah_bayar') is-invalid @enderror"
                               min="1"
                               step="0.01"
                               value="{{ old('jumlah_bayar') }}"
                               placeholder="Masukkan jumlah pembayaran"
                               required>

                        @error('jumlah_bayar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Metode Pembayaran</label>

                        <select name="metode_pembayaran"
                                class="form-select @error('metode_pembayaran') is-invalid @enderror"
                                required>
                            <option value="">-- Pilih Metode --</option>

                            <option value="tunai"
                                {{ old('metode_pembayaran') == 'tunai' ? 'selected' : '' }}>
                                Tunai
                            </option>

                            <option value="transfer"
                                {{ old('metode_pembayaran') == 'transfer' ? 'selected' : '' }}>
                                Transfer
                            </option>
                        </select>

                        @error('metode_pembayaran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Catatan</label>

                        <textarea name="catatan"
                                  class="form-control @error('catatan') is-invalid @enderror"
                                  rows="4"
                                  placeholder="Catatan tambahan (opsional)">{{ old('catatan') }}</textarea>

                        @error('catatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-content-save"></i>
                        Simpan Pembayaran
                    </button>

                    <a href="{{ route('pembayaran.index') }}"
                       class="btn btn-secondary">
                        <i class="mdi mdi-arrow-left"></i>
                        Kembali
                    </a>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
