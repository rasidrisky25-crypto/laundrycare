
@extends('layouts.app')

@section('title', 'Detail Pesanan')
@section('page-title', 'Detail Pesanan')

@section('content')

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Informasi Detail Pesanan</h4>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="30%">Kode Pesanan</th>
                        <td>{{ $detailPesanan->pesanan->kode_pesanan ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Nama Pelanggan</th>
                        <td>{{ $detailPesanan->pesanan->pelanggan->nama ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Masuk</th>
                        <td>{{ $detailPesanan->pesanan->tanggal_masuk ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Nama Layanan</th>
                        <td>{{ $detailPesanan->layanan->nama_layanan ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Jumlah</th>
                        <td>
                            {{ $detailPesanan->jumlah }}
                            {{ $detailPesanan->layanan->satuan ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>Harga Satuan</th>
                        <td>
                            Rp {{ number_format($detailPesanan->harga, 0, ',', '.') }}
                        </td>
                    </tr>

                    <tr>
                        <th>Subtotal</th>
                        <td>
                            <strong>
                                Rp {{ number_format($detailPesanan->subtotal, 0, ',', '.') }}
                            </strong>
                        </td>
                    </tr>
                </table>

                <div class="mt-4">
                    <a href="{{ route('detail-pesanan.edit', $detailPesanan->id) }}"
                       class="btn btn-warning">
                        <i class="mdi mdi-pencil"></i>
                        Edit Detail
                    </a>

                    <a href="{{ route('detail-pesanan.index') }}"
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
