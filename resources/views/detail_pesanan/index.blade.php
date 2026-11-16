
@extends('layouts.app')

@section('title', 'Detail Pesanan - LaundryCare')

@section('page-title', 'Detail Pesanan')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-body">

                <!-- Judul dan Tombol Tambah -->
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h4 class="card-title mb-1">
                            Daftar Detail Pesanan
                        </h4>

                        <p class="text-muted mb-0">
                            Kelola rincian layanan setiap pesanan LaundryCare.
                        </p>
                    </div>

                    <a href="{{ route('detail-pesanan.create') }}"
                       class="btn btn-primary">
                        <i class="mdi mdi-plus"></i>
                        Tambah Detail Pesanan
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


                <!-- Tabel Detail Pesanan -->
                <div class="table-responsive">

                    <table class="table table-striped table-bordered">

                        <thead class="bg-primary text-white">
                            <tr>
                                <th width="50">No</th>
                                <th>Kode Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Layanan</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                                <th width="200">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($detailPesanans as $detail)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        {{ $detail->pesanan->kode_pesanan }}
                                    </td>

                                    <td>
                                        {{ $detail->pesanan->pelanggan->nama }}
                                    </td>

                                    <td>
                                        {{ $detail->layanan->nama_layanan }}
                                    </td>

                                    <td>
                                        {{ $detail->jumlah }}
                                        {{ $detail->layanan->satuan }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($detail->harga, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($detail->subtotal, 0, ',', '.') }}
                                    </td>

                                    <td>

                                        <a href="{{ route('detail-pesanan.show', $detail->id) }}"
                                           class="btn btn-info btn-sm text-white mb-1">
                                            <i class="mdi mdi-eye"></i>
                                            Detail
                                        </a>

                                        <a href="{{ route('detail-pesanan.edit', $detail->id) }}"
                                           class="btn btn-warning btn-sm mb-1">
                                            <i class="mdi mdi-pencil"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('detail-pesanan.destroy', $detail->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus detail pesanan ini?')">

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

                                        <i class="mdi mdi-file-document-outline"
                                           style="font-size: 30px;"></i>

                                        <p class="mb-0">
                                            Belum ada detail pesanan.
                                        </p>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                <!-- Tombol Kembali -->
                <a href="{{ route('pesanan.index') }}"
                   class="btn btn-secondary mt-3">
                    <i class="mdi mdi-arrow-left"></i>
                    Kembali ke Data Pesanan
                </a>

            </div>

        </div>

    </div>

</div>

@endsection
