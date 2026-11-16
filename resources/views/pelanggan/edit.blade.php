
@extends('layouts.app')

@section('title', 'Edit Pelanggan - LaundryCare')

@section('page-title', 'Edit Pelanggan')

@section('content')

<div class="row">
    <div class="col-md-8">

        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Form Edit Pelanggan</h4>
                <p class="text-muted">Perbarui informasi pelanggan LaundryCare.</p>

                <form action="{{ route('pelanggan.update', $pelanggan->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text"
                               name="nama"
                               class="form-control @error('nama') is-invalid @enderror"
                               value="{{ old('nama', $pelanggan->nama) }}"
                               placeholder="Masukkan nama pelanggan"
                               required>

                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor HP</label>
                        <input type="text"
                               name="no_hp"
                               class="form-control @error('no_hp') is-invalid @enderror"
                               maxlength="15"
                               value="{{ old('no_hp', $pelanggan->no_hp) }}"
                               placeholder="Contoh: 081234567890"
                               required>

                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat"
                                  class="form-control @error('alamat') is-invalid @enderror"
                                  rows="3"
                                  placeholder="Masukkan alamat pelanggan"
                                  required>{{ old('alamat', $pelanggan->alamat) }}</textarea>

                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Email <span class="text-muted">(Opsional)</span></label>
                        <input type="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $pelanggan->email) }}"
                               placeholder="Contoh: pelanggan@email.com">

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i>
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('pelanggan.index') }}"
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
