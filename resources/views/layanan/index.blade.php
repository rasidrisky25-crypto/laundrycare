
@extends('layouts.app')

@section('title', 'Data Layanan - LaundryCare')

@section('page-title', 'Data Layanan')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-body">

                <!-- Judul dan Tombol Tambah -->
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h4 class="card-title mb-1">
                            Daftar Layanan
                        </h4>

                        <p class="text-muted mb-0">
                            Kelola layanan LaundryCare
                        </p>
                    </div>

                    <a href="{{ route('layanan.create') }}"
                       class="btn btn-primary">
                        <i class="mdi mdi-plus"></i>
                        Tambah Layanan
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


                <!-- Tabel Data Layanan -->
                <div class="table-responsive">

                    <table class="table table-striped table-bordered">

                        <thead class="bg-primary text-white">
                            <tr>
                                <th width="50">No</th>
                                <th>Nama Layanan</th>
                                <th>Harga</th>
                                <th>Satuan</th>
                                <th>Estimasi</th>
                                <th>Status</th>
                                <th width="210">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($layanans as $layanan)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $layanan->nama_layanan }}</td>

                                    <td>
                                        Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                                    </td>

                                    <td>{{ $layanan->satuan }}</td>

                                    <td>{{ $layanan->estimasi_hari }} hari</td>

                                    <td>
                                        @if($layanan->status)
                                            <span class="badge badge-success">
                                                Aktif
                                            </span>
                                        @else
                                            <span class="badge badge-danger">
                                                Tidak Aktif
                                            </span>
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ route('layanan.show', $layanan->id) }}"
                                           class="btn btn-info btn-sm text-white mb-1">
                                            <i class="mdi mdi-eye"></i>
                                            Detail
                                        </a>

                                        <a href="{{ route('layanan.edit', $layanan->id) }}"
                                           class="btn btn-warning btn-sm mb-1">
                                            <i class="mdi mdi-pencil"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('layanan.destroy', $layanan->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">

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
                                    <td colspan="7"
                                        class="text-center text-muted py-4">

                                        <i class="mdi mdi-washing-machine"
                                           style="font-size: 30px;"></i>

                                        <p class="mb-0">
                                            Belum ada data layanan.
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
