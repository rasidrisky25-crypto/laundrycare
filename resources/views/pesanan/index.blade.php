
@extends('layouts.app')

@section('title', 'Data Pesanan - LaundryCare')

@section('page-title', 'Data Pesanan')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-body">

                <!-- Judul dan Tombol Tambah -->
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h4 class="card-title mb-1">
                            Daftar Pesanan
                        </h4>

                        <p class="text-muted mb-0">
                            Kelola seluruh pesanan LaundryCare.
                        </p>
                    </div>

                    <a href="{{ route('pesanan.create') }}"
                       class="btn btn-primary">
                        <i class="mdi mdi-plus"></i>
                        Tambah Pesanan
                    </a>

                </div>


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


                <!-- Tabel Data Pesanan -->
                <div class="table-responsive">

                    <table class="table table-striped table-bordered">

                        <thead class="bg-primary text-white">
                            <tr>
                                <th width="50">No</th>
                                <th>Kode Pesanan</th>
                                <th>Nama Pelanggan</th>
                                <th>Tanggal Masuk</th>
                                <th>Berat</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th width="220">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($pesanans as $pesanan)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        {{ $pesanan->kode_pesanan }}
                                    </td>

                                    <td>
                                        {{ $pesanan->pelanggan->nama ?? '-' }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($pesanan->tanggal_masuk)->format('d-m-Y') }}
                                    </td>

                                    <td>
                                        {{ $pesanan->berat }} kg
                                    </td>

                                    <td>
                                        Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                                    </td>

                                    <td>

                                        @php
                                            $warna = [
                                                'menunggu' => 'secondary',
                                                'diproses' => 'primary',
                                                'dicuci' => 'info',
                                                'disetrika' => 'warning',
                                                'selesai' => 'success',
                                                'diambil' => 'dark',
                                            ];
                                        @endphp

                                        <span class="badge badge-{{ $warna[$pesanan->status] ?? 'secondary' }}">
                                            {{ ucfirst($pesanan->status) }}
                                        </span>

                                    </td>

                                    <td>

                                        <a href="{{ route('pesanan.show', $pesanan->id) }}"
                                           class="btn btn-info btn-sm text-white mb-1">
                                            <i class="mdi mdi-eye"></i>
                                            Detail
                                        </a>

                                        <a href="{{ route('pesanan.edit', $pesanan->id) }}"
                                           class="btn btn-warning btn-sm mb-1">
                                            <i class="mdi mdi-pencil"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('pesanan.destroy', $pesanan->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm mb-1">
                                                <i class="mdi mdi-delete"></i>
                                                Hapus
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="8"
                                        class="text-center text-muted py-4">

                                        <i class="mdi mdi-clipboard-text-outline"
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

    </div>

</div>

@endsection
