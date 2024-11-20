<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PerizinanController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Rute lainnya
Route::get('/login', function () {
    return view('auth.login'); // Sesuaikan dengan lokasi file login.blade.php
})->name('login');

// Rute lainnya...

Route::get('/auth/redirect/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.redirect');

Route::get('/auth/callback/google', function () {
    $googleUser = Socialite::driver('google')->user();

    if (!$googleUser || !$googleUser->getEmail()) {
        return redirect('/login')->with('error', 'Data dari Google tidak valid.');
        dd($googleUser);
    }

    // Cari atau buat pengguna
    $user = User::updateOrCreate(
        [
            'email' => $googleUser->getEmail(),
        ],
        [
            'name' => $googleUser->getName(),
            'provider' => 'google',
            'provider_id' => $googleUser->getId(),
        ]
    );

    // Login pengguna
    Auth::login($user);

    return redirect('/dashboard')->with('success', 'Login berhasil!');
})->name('google.callback');



Route::get('/perizinan/create', [PerizinanController::class, 'create'])->name('perizinan.create');
Route::post('/perizinan', [PerizinanController::class, 'store'])->name('perizinan.store');


Route::resource('pengajuan', PengajuanController::class);
Route::post('/pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan.store');

Route::resource('peminjaman', PeminjamanController::class);

Route::resource('barang', BarangController::class);
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');  // Menampilkan daftar barang
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');  // Menampilkan form input barang
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');  // Menyimpan data barang

Route::get('/karyawan', [EmployeeController::class, 'index'])->name('employees.index');
Route::post('/karyawan', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/karyawan/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/karyawan/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/karyawan/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
