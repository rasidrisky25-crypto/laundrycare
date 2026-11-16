
@extends('layouts.app')

@section('title', 'Tambah Pelanggan - LaundryCare')

@section('page-title', 'Tambah Pelanggan')

@section('content')

<div class="row">

    <div class="col-md-8">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Form Tambah Pelanggan
                </h4>

                <p class="text-muted">
                    Masukkan informasi pelanggan baru LaundryCare.
                </p>

                <form action="{{ route('pelanggan.store') }}" method="POST">

                    @csrf

                    <!-- Nama Pelanggan -->
                    <div class="form-group">
                        <label>Nama Pelanggan</label>

                        <input type="text"
                               name="nama"
                               class="form-control @error('nama') is-invalid @enderror"
                               value="{{ old('nama') }}"
                               placeholder="Masukkan nama pelanggan"
                               required>

                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <!-- Nomor HP -->
                    <div class="form-group">
                        <label>Nomor HP</label>

                        <input type="text"
                               name="no_hp"
                               class="form-control @error('no_hp') is-invalid @enderror"
                               value="{{ old('no_hp') }}"
                               maxlength="15"
                               placeholder="Contoh: 081234567890"
                               required>

                        @error('no_hp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <!-- Alamat -->
                    <div class="form-group">
                        <label>Alamat</label>

                        <textarea name="alamat"
                                  class="form-control @error('alamat') is-invalid @enderror"
                                  rows="3"
                                  placeholder="Masukkan alamat pelanggan"
                                  required>{{ old('alamat') }}</textarea>

                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <!-- Email -->
                    <div class="form-group">
                        <label>Email <small class="text-muted">(Opsional)</small></label>

                        <input type="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}"
                               placeholder="Contoh: pelanggan@email.com">

                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <!-- Tombol -->
                    <div class="mt-4">

                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i>
                            Simpan Pelanggan
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
