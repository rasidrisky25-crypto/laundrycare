
@extends('layouts.app')

@section('title', 'Tambah Detail Pesanan')
@section('page-title', 'Tambah Detail Pesanan')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Form Tambah Detail Pesanan</h4>
                <p class="card-subtitle mb-4">
                    Tambahkan layanan ke dalam pesanan pelanggan.
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

                <form action="{{ route('detail-pesanan.store') }}"
                      method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Pilih Pesanan</label>

                        <select name="pesanan_id"
                                id="pesanan_id"
                                class="form-select @error('pesanan_id') is-invalid @enderror"
                                required>

                            <option value="">-- Pilih Pesanan --</option>

                            @foreach($pesanans as $pesanan)
                                <option value="{{ $pesanan->id }}"
                                    data-berat="{{ $pesanan->berat }}"
                                    {{ old('pesanan_id') == $pesanan->id ? 'selected' : '' }}>

                                    {{ $pesanan->kode_pesanan }}
                                    - {{ $pesanan->pelanggan->nama }}
                                    ({{ $pesanan->berat }} kg)

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
                                    {{ old('layanan_id') == $layanan->id ? 'selected' : '' }}>

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
                        <label class="form-label">Jumlah / Berat (kg)</label>

                        <input type="number"
                               name="jumlah"
                               id="jumlah"
                               class="form-control @error('jumlah') is-invalid @enderror"
                               step="0.01"
                               min="0.01"
                               value="{{ old('jumlah') }}"
                               placeholder="Otomatis berdasarkan berat pesanan"
                               readonly
                               required>

                        <small class="text-muted">
                            Jumlah akan terisi otomatis sesuai berat pesanan yang dipilih.
                        </small>

                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-content-save"></i>
                        Simpan
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

<script>
    const pilihanPesanan = document.getElementById('pesanan_id');
    const jumlah = document.getElementById('jumlah');

    function isiJumlahOtomatis() {
        const opsi = pilihanPesanan.options[pilihanPesanan.selectedIndex];

        if (opsi && opsi.value !== '') {
            jumlah.value = opsi.dataset.berat;
        } else {
            jumlah.value = '';
        }
    }

    pilihanPesanan.addEventListener('change', isiJumlahOtomatis);

    // Mengisi jumlah otomatis saat halaman dibuka
    isiJumlahOtomatis();
</script>

@endsection
