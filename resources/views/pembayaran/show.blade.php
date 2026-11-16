
@extends('layouts.app')

@section('title', 'Detail Pembayaran')
@section('page-title', 'Detail Pembayaran')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Informasi Pembayaran</h4>
                <p class="card-subtitle mb-4">
                    Detail transaksi pembayaran pesanan pelanggan.
                </p>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="35%">Kode Pesanan</th>
                                <td>
                                    {{ $pembayaran->pesanan->kode_pesanan }}
                                </td>
                            </tr>

                            <tr>
                                <th>Nama Pelanggan</th>
                                <td>
                                    {{ $pembayaran->pesanan->pelanggan->nama }}
                                </td>
                            </tr>

                            <tr>
                                <th>Tanggal Pembayaran</th>
                                <td>
                                    {{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d-m-Y') }}
                                </td>
                            </tr>

                            <tr>
                                <th>Jumlah Pembayaran</th>
                                <td>
                                    Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}
                                </td>
                            </tr>

                            <tr>
                                <th>Metode Pembayaran</th>
                                <td>
                                    {{ ucfirst($pembayaran->metode_pembayaran) }}
                                </td>
                            </tr>

                            <tr>
                                <th>Catatan</th>
                                <td>
                                    {{ $pembayaran->catatan ?? '-' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <a href="{{ route('pembayaran.index') }}"
                       class="btn btn-secondary">
                        <i class="mdi mdi-arrow-left"></i>
                        Kembali
                    </a>

                    <a href="{{ route('pembayaran.edit', $pembayaran->id) }}"
                       class="btn btn-warning">
                        <i class="mdi mdi-pencil"></i>
                        Edit Pembayaran
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
