<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('barang.peminjaman', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|numeric',
            'kode_barang' => 'required',
            'status' => 'required',
            'nama_peminjam' => 'required',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Peminjaman $peminjaman)
    {
        return view('barang.edit-peminjaman', compact('peminjaman'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|numeric',
            'kode_barang' => 'required',
            'status' => 'required',
            'nama_peminjam' => 'required',
        ]);

        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil dihapus.');
    }
}
