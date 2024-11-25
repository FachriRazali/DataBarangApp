<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\Auth\GoogleController;

Route::get('/auth/redirect/google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/callback/google', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
// Login Page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Redirect to Google for Authorization
Route::get('/auth/redirect/google', function () {
    try {
        Log::info('Redirecting to Google OAuth...');
        return Socialite::driver('google')->redirect();
    } catch (\Exception $e) {
        Log::error('Google Redirect Error: ' . $e->getMessage());
        return redirect('/login')->with('error', 'Unable to connect to Google.');
    }
})->name('google.redirect');

// Callback from Google
Route::get('/auth/callback/google', function () {
    try {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'provider' => 'google',
                'provider_id' => $googleUser->getId(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
            ]
        );

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Login successful!');
    } catch (\Exception $e) {
        Log::error('Google Callback Error: ' . $e->getMessage());
        return redirect('/login')->with('error', 'Error processing Google data.');
    }
})->name('google.callback');

// Dashboard Redirect Based on Role
Route::get('/dashboard', function () {
    $user = auth()->user();

    if (!$user) {
        return redirect()->route('login');
    }

    switch ($user->role) {
        case 'admin':
            return redirect()->route('admin.karyawan');
        case 'manager':
            return redirect()->route('manager.dashboard');
        case 'user':
            return redirect()->route('user.dashboard');
        default:
            return redirect()->route('login')->with('error', 'No role assigned!');
    }
})->middleware('auth')->name('dashboard');

// Role-Based Routes
// Admin Role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/karyawan', [EmployeeController::class, 'index'])->name('admin.karyawan');
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Manager Role
Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/manager', function () {
        return view('manager.dashboard');
    })->name('manager.dashboard');
});

// User Role
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

// Employee Management
Route::prefix('employees')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
    Route::post('/', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
});

// Perizinan Routes
Route::get('/perizinan/create', [PerizinanController::class, 'create'])->name('perizinan.create');
Route::post('/perizinan', [PerizinanController::class, 'store'])->name('perizinan.store');

// Pengajuan Routes
Route::resource('pengajuan', PengajuanController::class);
Route::post('/pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan.store');

// Peminjaman Routes
Route::resource('peminjaman', PeminjamanController::class);

// Barang Routes
Route::resource('barang', BarangController::class);
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
