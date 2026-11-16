
@extends('layouts.app')

@section('title', 'Tambah Pesanan - LaundryCare')

@section('page-title', 'Tambah Pesanan')

@section('content')

<div class="row">
    <div class="col-md-8">

        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Form Tambah Pesanan</h4>
                <p class="text-muted">Masukkan informasi pesanan pelanggan LaundryCare.</p>

                <form action="{{ route('pesanan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Pelanggan</label>
                        <select name="pelanggan_id"
                                class="form-select @error('pelanggan_id') is-invalid @enderror"
                                required>

                            <option value="">-- Pilih Pelanggan --</option>

                            @foreach($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}"
                                    {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>
                                    {{ $pelanggan->nama }}
                                </option>
                            @endforeach

                        </select>

                        @error('pelanggan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Masuk</label>
                        <input type="date"
                               name="tanggal_masuk"
                               class="form-control @error('tanggal_masuk') is-invalid @enderror"
                               value="{{ old('tanggal_masuk') }}"
                               required>

                        @error('tanggal_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="date"
                               name="tanggal_selesai"
                               class="form-control @error('tanggal_selesai') is-invalid @enderror"
                               value="{{ old('tanggal_selesai') }}">

                        @error('tanggal_selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Berat (kg)</label>
                        <input type="number"
                               name="berat"
                               class="form-control @error('berat') is-invalid @enderror"
                               step="0.01"
                               min="0.01"
                               value="{{ old('berat') }}"
                               placeholder="Contoh: 3.5"
                               required>

                        @error('berat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total Harga (Rp)</label>
                        <input type="number"
                               name="total_harga"
                               class="form-control @error('total_harga') is-invalid @enderror"
                               step="0.01"
                               min="0"
                               value="{{ old('total_harga') }}"
                               placeholder="Masukkan total harga"
                               required>

                        @error('total_harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Pesanan</label>
                        <select name="status"
                                class="form-select @error('status') is-invalid @enderror"
                                required>

                            <option value="menunggu" {{ old('status', 'menunggu') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="diproses" {{ old('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="dicuci" {{ old('status') == 'dicuci' ? 'selected' : '' }}>Dicuci</option>
                            <option value="disetrika" {{ old('status') == 'disetrika' ? 'selected' : '' }}>Disetrika</option>
                            <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="diambil" {{ old('status') == 'diambil' ? 'selected' : '' }}>Diambil</option>

                        </select>

                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Catatan</label>
                        <textarea name="catatan"
                                  class="form-control @error('catatan') is-invalid @enderror"
                                  rows="3"
                                  placeholder="Masukkan catatan pesanan (opsional)">{{ old('catatan') }}</textarea>

                        @error('catatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i>
                            Simpan Pesanan
                        </button>

                        <a href="{{ route('pesanan.index') }}"
                           class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left"></i>
                            Kembali
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
