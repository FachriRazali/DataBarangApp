<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Perizinan;
use Illuminate\Http\Request;

class PerizinanController extends Controller
{
    // Menampilkan form perizinan
    public function create()
    {
        $barang = Barang::all(); // Ambil semua data barang
        return view('barang.perizinan', compact('barang'));
    }
    
    
    

    // Menyimpan data perizinan
    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'barang_id' => 'required|exists:barangs,id', // Pastikan tabel adalah 'barangs'
            'nama_atasan' => 'nullable|string|max:255',
        ]);
        

        Perizinan::create([
            'nama_peminjam' => $request->nama_peminjam,
            'barang_id' => $request->barang_id,
            'nama_atasan' => $request->nama_atasan,
        ]);

        return redirect()->route('perizinan.create')->with('success', '');

    }
}
