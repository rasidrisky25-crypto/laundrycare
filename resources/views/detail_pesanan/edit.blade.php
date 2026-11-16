
@extends('layouts.app')

@section('title', 'Edit Detail Pesanan')
@section('page-title', 'Edit Detail Pesanan')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Form Edit Detail Pesanan</h4>
                <p class="card-subtitle mb-4">
                    Perbarui informasi layanan pada pesanan pelanggan.
                </p>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('detail-pesanan.update', $detailPesanan->id) }}"
                      method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Pilih Pesanan</label>

                        <select name="pesanan_id"
                                class="form-select @error('pesanan_id') is-invalid @enderror"
                                required>

                            <option value="">-- Pilih Pesanan --</option>

                            @foreach($pesanans as $pesanan)
                                <option value="{{ $pesanan->id }}"
                                    {{ old('pesanan_id', $detailPesanan->pesanan_id) == $pesanan->id ? 'selected' : '' }}>

                                    {{ $pesanan->kode_pesanan }}
                                    - {{ $pesanan->pelanggan->nama }}

                                </option>
                            @endforeach

                        </select>

                        @error('pesanan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pilih Layanan</label>

                        <select name="layanan_id"
                                class="form-select @error('layanan_id') is-invalid @enderror"
                                required>

                            <option value="">-- Pilih Layanan --</option>

                            @foreach($layanans as $layanan)
                                <option value="{{ $layanan->id }}"
                                    {{ old('layanan_id', $detailPesanan->layanan_id) == $layanan->id ? 'selected' : '' }}>

                                    {{ $layanan->nama_layanan }}
                                    - Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                                    / {{ $layanan->satuan }}

                                </option>
                            @endforeach

                        </select>

                        @error('layanan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jumlah</label>

                        <input type="number"
                               name="jumlah"
                               class="form-control @error('jumlah') is-invalid @enderror"
                               step="0.01"
                               min="0.01"
                               value="{{ old('jumlah', $detailPesanan->jumlah) }}"
                               required>

                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-content-save"></i>
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('detail-pesanan.index') }}"
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
