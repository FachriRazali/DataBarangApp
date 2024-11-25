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
        if (!Schema::hasTable('users')) {
            // Buat tabel jika belum ada
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password')->nullable();
                $table->string('provider')->nullable();
                $table->string('provider_id')->nullable();
                $table->string('google_id')->nullable();
                $table->string('avatar')->nullable();
                $table->timestamps();
            });
        } else {
            // Tambahkan kolom baru jika tabel sudah ada
            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users', 'google_id')) {
                    $table->string('google_id')->nullable()->after('password');
                }
                if (!Schema::hasColumn('users', 'avatar')) {
                    $table->string('avatar')->nullable()->after('google_id');
                }
                if (!Schema::hasColumn('users', 'provider')) {
                    $table->string('provider')->nullable()->after('avatar');
                }
                if (!Schema::hasColumn('users', 'provider_id')) {
                    $table->string('provider_id')->nullable()->after('provider');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                // Periksa kolom sebelum menghapusnya
                if (Schema::hasColumn('users', 'google_id')) {
                    $table->dropColumn('google_id');
                }
                if (Schema::hasColumn('users', 'avatar')) {
                    $table->dropColumn('avatar');
                }
                if (Schema::hasColumn('users', 'provider')) {
                    $table->dropColumn('provider');
                }
                if (Schema::hasColumn('users', 'provider_id')) {
                    $table->dropColumn('provider_id');
                }
            });
        }
    }
};
