<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman'; // Nama tabel di database

    // Kolom-kolom yang boleh diisi
    protected $fillable = [
        'nama_barang',
        'jumlah',
        'kode_barang',
        'status',
        'nama_peminjam',
    ];
}
