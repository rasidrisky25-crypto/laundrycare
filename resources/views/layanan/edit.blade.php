
@extends('layouts.app')

@section('title', 'Edit Layanan - LaundryCare')

@section('page-title', 'Edit Layanan')

@section('content')

<div class="row">
    <div class="col-md-8">

        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Form Edit Layanan</h4>
                <p class="text-muted">Perbarui informasi layanan laundry.</p>

                <form action="{{ route('layanan.update', $layanan->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama Layanan</label>
                        <input type="text"
                               name="nama_layanan"
                               class="form-control @error('nama_layanan') is-invalid @enderror"
                               value="{{ old('nama_layanan', $layanan->nama_layanan) }}"
                               placeholder="Masukkan nama layanan"
                               required>

                        @error('nama_layanan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi"
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  rows="3"
                                  placeholder="Masukkan deskripsi layanan">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>

                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number"
                               name="harga"
                               class="form-control @error('harga') is-invalid @enderror"
                               value="{{ old('harga', $layanan->harga) }}"
                               min="0"
                               step="0.01"
                               placeholder="Masukkan harga layanan"
                               required>

                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Satuan</label>
                        <select name="satuan"
                                class="form-select @error('satuan') is-invalid @enderror"
                                required>

                            <option value="kg" {{ old('satuan', $layanan->satuan) == 'kg' ? 'selected' : '' }}>
                                Kilogram (kg)
                            </option>

                            <option value="pcs" {{ old('satuan', $layanan->satuan) == 'pcs' ? 'selected' : '' }}>
                                Pieces (pcs)
                            </option>

                            <option value="meter" {{ old('satuan', $layanan->satuan) == 'meter' ? 'selected' : '' }}>
                                Meter
                            </option>

                        </select>

                        @error('satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Estimasi Pengerjaan (Hari)</label>
                        <input type="number"
                               name="estimasi_hari"
                               class="form-control @error('estimasi_hari') is-invalid @enderror"
                               value="{{ old('estimasi_hari', $layanan->estimasi_hari) }}"
                               min="1"
                               required>

                        @error('estimasi_hari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Status Layanan</label>
                        <select name="status"
                                class="form-select @error('status') is-invalid @enderror"
                                required>

                            <option value="1" {{ old('status', $layanan->status) == '1' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="0" {{ old('status', $layanan->status) == '0' ? 'selected' : '' }}>
                                Tidak Aktif
                            </option>

                        </select>

                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i>
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('layanan.index') }}"
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
