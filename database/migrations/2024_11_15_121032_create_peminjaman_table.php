<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama_barang'); // Nama Barang
            $table->integer('jumlah'); // Jumlah Barang
            $table->string('kode_barang'); // Kode Barang
            $table->string('status'); // Status (Dipinjam/Tersedia)
            $table->string('nama_peminjam')->nullable(); // Nama Peminjam
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
