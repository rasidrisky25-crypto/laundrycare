
@extends('layouts.app')

@section('title', 'Data Pembayaran - LaundryCare')

@section('page-title', 'Data Pembayaran')

@section('content')

<div class="row">
    <div class="col-12">

        <!-- Notifikasi -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show"
                 role="alert">
                {{ session('success') }}

                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- RINGKASAN STATUS PEMBAYARAN -->
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="card-title mb-1">
                            Ringkasan Status Pembayaran
                        </h4>

                        <p class="text-muted mb-0">
                            Informasi pembayaran seluruh pesanan pelanggan.
                        </p>
                    </div>

                    <a href="{{ route('pembayaran.create') }}"
                       class="btn btn-primary">
                        <i class="mdi mdi-plus"></i>
                        Tambah Pembayaran
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">

                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Kode Pesanan</th>
                                <th>Nama Pelanggan</th>
                                <th>Total Pesanan</th>
                                <th>Total Dibayar</th>
                                <th>Sisa Pembayaran</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($ringkasanPembayarans as $pesanan)

                                @php
                                    $totalPesanan = $pesanan->total_harga;
                                    $totalDibayar = $pesanan->pembayarans->sum('jumlah_bayar');
                                    $sisaPembayaran = max(0, $totalPesanan - $totalDibayar);

                                    if ($totalDibayar <= 0) {
                                        $status = 'Belum Bayar';
                                    } elseif ($totalDibayar < $totalPesanan) {
                                        $status = 'DP';
                                    } else {
                                        $status = 'Lunas';
                                    }
                                @endphp

                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $pesanan->kode_pesanan }}</td>

                                    <td>{{ $pesanan->pelanggan->nama }}</td>

                                    <td>
                                        Rp {{ number_format($totalPesanan, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($totalDibayar, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($sisaPembayaran, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        @if ($status == 'Lunas')
                                            <span class="badge badge-success">
                                                Lunas
                                            </span>
                                        @elseif ($status == 'DP')
                                            <span class="badge badge-warning">
                                                DP
                                            </span>
                                        @else
                                            <span class="badge badge-danger">
                                                Belum Bayar
                                            </span>
                                        @endif
                                    </td>

                                    <!-- AKSI BERDASARKAN STATUS -->
                                    <td>

                                        @if ($status == 'Belum Bayar')

                                            <a href="{{ route('pembayaran.create', ['pesanan_id' => $pesanan->id]) }}"
                                               class="btn btn-primary btn-sm">
                                                <i class="mdi mdi-plus"></i>
                                                Tambah Pembayaran
                                            </a>

                                        @elseif ($status == 'DP')

                                            @foreach ($pesanan->pembayarans as $transaksi)

                                                <div class="d-flex flex-wrap mb-1">

                                                    <a href="{{ route('pembayaran.show', $transaksi->id) }}"
                                                       class="btn btn-info btn-sm text-white mr-1 mb-1">
                                                        <i class="mdi mdi-eye"></i>
                                                        Detail
                                                    </a>

                                                    <a href="{{ route('pembayaran.edit', $transaksi->id) }}"
                                                       class="btn btn-warning btn-sm mr-1 mb-1">
                                                        <i class="mdi mdi-pencil"></i>
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('pembayaran.destroy', $transaksi->id) }}"
                                                          method="POST"
                                                          class="mb-1"
                                                          onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?')">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                                class="btn btn-danger btn-sm">
                                                            <i class="mdi mdi-delete"></i>
                                                            Hapus
                                                        </button>

                                                    </form>

                                                </div>

                                            @endforeach

                                        @endif

                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="8"
                                        class="text-center text-muted py-4">

                                        <i class="mdi mdi-cash-remove"
                                           style="font-size: 30px;"></i>

                                        <p class="mb-0">
                                            Belum ada data pesanan.
                                        </p>

                                    </td>
                                </tr>

                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

        <!-- RIWAYAT TRANSAKSI PEMBAYARAN -->
        <div class="card">
            <div class="card-body">

                <div class="mb-4">
                    <h4 class="card-title mb-1">
                        Riwayat Transaksi Pembayaran
                    </h4>

                    <p class="text-muted mb-0">
                        Daftar transaksi dari pesanan yang sudah lunas.
                    </p>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">

                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Kode Pesanan</th>
                                <th>Nama Pelanggan</th>
                                <th>Tanggal Bayar</th>
                                <th>Jumlah Bayar</th>
                                <th>Metode</th>
                                <th>Status Pembayaran</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($riwayatPembayarans as $pembayaran)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        {{ $pembayaran->pesanan->kode_pesanan }}
                                    </td>

                                    <td>
                                        {{ $pembayaran->pesanan->pelanggan->nama }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d-m-Y') }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        {{ ucfirst($pembayaran->metode_pembayaran) }}
                                    </td>

                                    <td>
                                        <span class="badge badge-success">
                                            Lunas
                                        </span>
                                    </td>

                                    <td>
                                        {{ $pembayaran->catatan ?? '-' }}
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="8"
                                        class="text-center text-muted py-4">

                                        <i class="mdi mdi-history"
                                           style="font-size: 30px;"></i>

                                        <p class="mb-0">
                                            Belum ada riwayat transaksi pembayaran lunas.
                                        </p>

                                    </td>
                                </tr>

                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
