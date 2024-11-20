<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs'; // Nama tabel di database
    protected $fillable = ['barang', 'noBarang', 'kodebarang', 'status']; // Kolom yang dapat diisi
}


