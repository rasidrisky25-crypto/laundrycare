
@extends('layouts.app')

@section('title', 'Edit Pesanan')
@section('page-title', 'Edit Pesanan')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Form Edit Pesanan</h4>
                <p class="card-subtitle mb-4">
                    Perbarui informasi pesanan pelanggan.
                </p>

                <form action="{{ route('pesanan.update', $pesanan->id) }}"
                      method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Kode Pesanan</label>
                        <input type="text"
                               class="form-control"
                               value="{{ $pesanan->kode_pesanan }}"
                               disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Pelanggan</label>
                        <select name="pelanggan_id"
                                class="form-select @error('pelanggan_id') is-invalid @enderror"
                                required>
                            <option value="">-- Pilih Pelanggan --</option>

                            @foreach($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}"
                                    {{ old('pelanggan_id', $pesanan->pelanggan_id) == $pelanggan->id ? 'selected' : '' }}>
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
                               value="{{ old('tanggal_masuk', $pesanan->tanggal_masuk) }}"
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
                               value="{{ old('tanggal_selesai', $pesanan->tanggal_selesai) }}">
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
                               value="{{ old('berat', $pesanan->berat) }}"
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
                               value="{{ old('total_harga', $pesanan->total_harga) }}"
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
                            @foreach([
                                'menunggu' => 'Menunggu',
                                'diproses' => 'Diproses',
                                'dicuci' => 'Dicuci',
                                'disetrika' => 'Disetrika',
                                'selesai' => 'Selesai',
                                'diambil' => 'Diambil'
                            ] as $value => $label)
                                <option value="{{ $value }}"
                                    {{ old('status', $pesanan->status) == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Catatan</label>
                        <textarea name="catatan"
                                  class="form-control @error('catatan') is-invalid @enderror"
                                  rows="3">{{ old('catatan', $pesanan->catatan) }}</textarea>
                        @error('catatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-content-save"></i>
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('pesanan.index') }}"
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
