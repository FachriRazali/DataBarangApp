<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Buat tabel jika belum ada
        Schema::create('perizinan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam'); // Nama peminjam
            $table->unsignedBigInteger('barang_id'); // Foreign key ke tabel barang
            $table->text('nama_atasan')->nullable(); // Nama atasan (opsional)
            $table->timestamps(); // Kolom created_at dan updated_at

            // Relasi foreign key
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Hapus tabel jika ada
        Schema::dropIfExists('perizinan');
    }
};
