<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with('pelanggan')->latest()->get();

        return view('pesanan.index', compact('pesanans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();

        return view('pesanan.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_masuk',
            'berat' => 'required|numeric|min:0.01',
            'total_harga' => 'required|numeric|min:0',
            'status' => 'required|in:menunggu,diproses,dicuci,disetrika,selesai,diambil',
            'catatan' => 'nullable|string',
        ]);

        Pesanan::create([
            'kode_pesanan' => 'PSN-' . strtoupper(Str::random(8)),
            'pelanggan_id' => $request->pelanggan_id,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_selesai' => $request->tanggal_selesai,
            'berat' => $request->berat,
            'total_harga' => $request->total_harga,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil ditambahkan.');
    }

    public function show(Pesanan $pesanan)
    {
        $pesanan->load('pelanggan', 'detailPesanans.layanan');

        return view('pesanan.show', compact('pesanan'));
    }

    public function edit(Pesanan $pesanan)
    {
        $pelanggans = Pelanggan::all();

        return view('pesanan.edit', compact('pesanan', 'pelanggans'));
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_masuk',
            'berat' => 'required|numeric|min:0.01',
            'total_harga' => 'required|numeric|min:0',
            'status' => 'required|in:menunggu,diproses,dicuci,disetrika,selesai,diambil',
            'catatan' => 'nullable|string',
        ]);

        $pesanan->update($request->only([
            'pelanggan_id',
            'tanggal_masuk',
            'tanggal_selesai',
            'berat',
            'total_harga',
            'status',
            'catatan',
        ]));

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }
}
