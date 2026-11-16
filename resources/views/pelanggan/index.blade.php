
@extends('layouts.app')

@section('title', 'Data Pelanggan - LaundryCare')

@section('page-title', 'Data Pelanggan')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-body">

                <!-- Judul dan Tombol Tambah -->
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h4 class="card-title mb-1">
                            Daftar Pelanggan
                        </h4>

                        <p class="text-muted mb-0">
                            Kelola data pelanggan LaundryCare
                        </p>
                    </div>

                    <a href="{{ route('pelanggan.create') }}"
                       class="btn btn-primary">
                        <i class="mdi mdi-plus"></i>
                        Tambah Pelanggan
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


                <!-- Tabel Data Pelanggan -->
                <div class="table-responsive">

                    <table class="table table-striped table-bordered">

                        <thead class="bg-primary text-white">
                            <tr>
                                <th width="50">No</th>
                                <th>Nama</th>
                                <th>No. HP</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th width="200">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($pelanggans as $pelanggan)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $pelanggan->nama }}</td>

                                    <td>{{ $pelanggan->no_hp }}</td>

                                    <td>{{ $pelanggan->alamat }}</td>

                                    <td>{{ $pelanggan->email ?? '-' }}</td>

                                    <td>

                                        <a href="{{ route('pelanggan.show', $pelanggan->id) }}"
                                           class="btn btn-info btn-sm text-white mb-1">
                                            <i class="mdi mdi-eye"></i>
                                            Detail
                                        </a>

                                        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}"
                                           class="btn btn-warning btn-sm mb-1">
                                            <i class="mdi mdi-pencil"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">

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
                                    <td colspan="6"
                                        class="text-center text-muted py-4">

                                        <i class="mdi mdi-account-off"
                                           style="font-size: 30px;"></i>

                                        <p class="mb-0">
                                            Belum ada data pelanggan.
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
