<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        // Ambil semua data pengajuan
        $pengajuan = Pengajuan::all();
        return view('barang.pengajuan', compact('pengajuan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'barang' => 'required|string|max:255',
            'signature' => 'required|file|mimes:png,jpg,jpeg,pdf',
            'memo' => 'required|file|mimes:pdf,doc,docx',
        ]);

        // Simpan file
        $signaturePath = $request->file('signature')->store('signatures');
        $memoPath = $request->file('memo')->store('memos');

        // Simpan data
        Pengajuan::create([
            'name' => $request->name,    
            'barang' => $request->barang,
            'signature' => $signaturePath,
            'memo' => $memoPath,
        ]); 

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil disimpan.');
    }
}
