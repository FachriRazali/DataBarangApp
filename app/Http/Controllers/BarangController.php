<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Display all barang items
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    // Store a new barang item
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'barang' => 'required',
            'noBarang' => 'required',
            'kodebarang' => 'required',
            'status' => 'required',
        ]);

        // Create the barang item with validated data
        Barang::create([
            'barang' => $request->barang,
            'noBarang' => $request->noBarang, // Ensure this is passed to the database
            'kodebarang' => $request->kodebarang,
            'status' => $request->status,
        ]);

        // Redirect back to the index page
        return redirect()->route('barang.index');
    }

    // Show the edit form for a specific barang item
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    // Update an existing barang item
    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'barang' => 'required',
            'noBarang' => 'required',
            'kodebarang' => 'required',
            'status' => 'required',
        ]);

        // Find the barang item and update it with validated data
        $barang = Barang::findOrFail($id);
        $barang->update([
            'barang' => $request->barang,
            'noBarang' => $request->nobarang, // Ensure this is passed to the database
            'kodebarang' => $request->kodebarang,
            'status' => $request->status,
        ]);

        // Redirect back to the index page
        return redirect()->route('barang.index');
    }

    // Delete a specific barang item
    public function destroy($id)
    {
        Barang::findOrFail($id)->delete();
        return redirect()->route('barang.index');
    }
}
