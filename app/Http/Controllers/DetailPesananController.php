<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class DetailPesananController extends Controller
{
    public function index()
    {
        $detailPesanans = DetailPesanan::with([
            'pesanan.pelanggan',
            'layanan'
        ])->latest()->get();

        return view('detail_pesanan.index', compact('detailPesanans'));
    }
    
    
    public function create()
    {
        $pesanans = Pesanan::with('pelanggan')->latest()->get();
        $layanans = Layanan::where('status', true)->get();

        return view('detail_pesanan.create', compact(
            'pesanans',
            'layanans'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pesanan_id' => 'required|exists:pesanans,id',
            'layanan_id' => 'required|exists:layanans,id',
            'jumlah' => 'required|numeric|min:0.01',
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);

        $harga = $layanan->harga;
        $subtotal = $request->jumlah * $harga;

        DetailPesanan::create([
            'pesanan_id' => $request->pesanan_id,
            'layanan_id' => $request->layanan_id,
            'jumlah' => $request->jumlah,
            'harga' => $harga,
            'subtotal' => $subtotal,
        ]);

        $this->hitungTotalPesanan($request->pesanan_id);

        return redirect()->route('detail-pesanan.index')
            ->with('success', 'Detail pesanan berhasil ditambahkan.');
    }

    public function show(DetailPesanan $detail_pesanan)
    {
        $detail_pesanan->load('pesanan.pelanggan', 'layanan');

        return view('detail_pesanan.show', [
            'detailPesanan' => $detail_pesanan
        ]);
    }

    public function edit(DetailPesanan $detail_pesanan)
    {
        $pesanans = Pesanan::with('pelanggan')->latest()->get();
        $layanans = Layanan::where('status', true)->get();

        return view('detail_pesanan.edit', [
            'detailPesanan' => $detail_pesanan,
            'pesanans' => $pesanans,
            'layanans' => $layanans,
        ]);
    }

    public function update(Request $request, DetailPesanan $detail_pesanan)
    {
        $request->validate([
            'pesanan_id' => 'required|exists:pesanans,id',
            'layanan_id' => 'required|exists:layanans,id',
            'jumlah' => 'required|numeric|min:0.01',
        ]);

        $pesananLama = $detail_pesanan->pesanan_id;

        $layanan = Layanan::findOrFail($request->layanan_id);

        $harga = $layanan->harga;
        $subtotal = $request->jumlah * $harga;

        $detail_pesanan->update([
            'pesanan_id' => $request->pesanan_id,
            'layanan_id' => $request->layanan_id,
            'jumlah' => $request->jumlah,
            'harga' => $harga,
            'subtotal' => $subtotal,
        ]);

        $this->hitungTotalPesanan($pesananLama);
        $this->hitungTotalPesanan($request->pesanan_id);

        return redirect()->route('detail-pesanan.index')
            ->with('success', 'Detail pesanan berhasil diperbarui.');
    }

    public function destroy(DetailPesanan $detail_pesanan)
    {
        $pesananId = $detail_pesanan->pesanan_id;

        $detail_pesanan->delete();

        $this->hitungTotalPesanan($pesananId);

        return redirect()->route('detail-pesanan.index')
            ->with('success', 'Detail pesanan berhasil dihapus.');
    }

    private function hitungTotalPesanan($pesananId)
    {
        $total = DetailPesanan::where('pesanan_id', $pesananId)
            ->sum('subtotal');

        Pesanan::where('id', $pesananId)
            ->update(['total_harga' => $total]);
    }
}
