<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    

public function index()
{
    $pembayarans = Pembayaran::with([
        'pesanan.pelanggan',
        'pesanan.pembayarans'
    ])
    ->latest()
    ->get();

    $pesanans = Pesanan::with([
        'pelanggan',
        'pembayarans'
    ])
    ->latest()
    ->get();

    // Ringkasan hanya untuk pesanan yang belum lunas
        $ringkasanPembayarans = $pesanans->filter(function ($pesanan) {
        $totalDibayar = $pesanan->pembayarans->sum('jumlah_bayar');

        return $totalDibayar < $pesanan->total_harga;
    });

    // Riwayat hanya untuk pesanan yang sudah lunas
        $riwayatPembayarans = $pembayarans->filter(function ($pembayaran) {
        $pesanan = $pembayaran->pesanan;

        $totalDibayar = $pesanan->pembayarans->sum('jumlah_bayar');

        return $totalDibayar >= $pesanan->total_harga;
    });

    return view('pembayaran.index', compact(
        'pembayarans',
        'pesanans',
        'ringkasanPembayarans',
        'riwayatPembayarans'
    ));
}

    public function create()
    {
        $pesanans = Pesanan::with('pelanggan')
            ->latest()
            ->get();

        return view('pembayaran.create', compact('pesanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pesanan_id' => 'required|exists:pesanans,id',
            'tanggal_bayar' => 'required|date',
            'jumlah_bayar' => 'required|numeric|min:1',
            'metode_pembayaran' => 'required|in:tunai,transfer',
            'catatan' => 'nullable|string',
        ]);

        Pembayaran::create($request->all());

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function show(Pembayaran $pembayaran)
    {
        $pembayaran->load('pesanan.pelanggan');

        return view('pembayaran.show', compact('pembayaran'));
    }

    public function edit(Pembayaran $pembayaran)
    {
        $pesanans = Pesanan::with('pelanggan')
            ->latest()
            ->get();

        return view('pembayaran.edit', compact('pembayaran', 'pesanans'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'pesanan_id' => 'required|exists:pesanans,id',
            'tanggal_bayar' => 'required|date',
            'jumlah_bayar' => 'required|numeric|min:1',
            'metode_pembayaran' => 'required|in:tunai,transfer',
            'catatan' => 'nullable|string',
        ]);

        $pembayaran->update($request->all());

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }
}
