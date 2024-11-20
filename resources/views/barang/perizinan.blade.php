@extends('layout') <!-- Menggunakan layout utama -->

@section('styles')
<!-- Hubungkan file CSS -->
<link rel="stylesheet" href="{{ asset('css/perizinan.css') }}">
@endsection

@section('content')
<div class="sidebar">
    <div class="profile">
        <div class="photo"></div>
        <div class="name">
            <h1>Fachri Razali</h1>
            <h3>Admin</h3>
        </div>
    </div>

    <div class="list">
        <img src="{{ asset('img/list.png') }}" class="icon" />
        <a href="{{ route('employees.index') }}">Data Karyawan</a>
    </div>

    <div class="list">
        <img src="{{ asset('img/list.png') }}" class="icon" />
        <a href="{{ route('barang.index') }}">Data Barang</a>
    </div>

    <div class="list">
        <img src="{{ asset('img/list.png') }}" class="icon" />
        <a href="{{ route('peminjaman.index') }}">Laporan Peminjaman Barang</a>
    </div>

    <div class="list">
        <img src="{{ asset('img/list.png') }}" class="icon" />
        <a href="{{ route('pengajuan.index') }}">Pengajuan Peminjaman Barang</a>
    </div>

    <div class="list">
        <img src="{{ asset('img/list.png') }}" class="icon" />
        <a href="{{ route('perizinan.create') }}">Perizinan Barang</a>
    </div>
</div>

<div class="main">
    <h1>Form Perizinan Barang</h1>
    <div class="card-input">
        <!-- Tampilkan pesan sukses jika ada -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form class="form" method="POST" action="{{ route('perizinan.store') }}">
            @csrf
            <label for="nama_peminjam">Nama Peminjam</label>
            <input type="text" id="nama_peminjam" name="nama_peminjam" placeholder="Nama Peminjam" required />

            <label for="barang_id">Barang</label>
            <select id="barang_id" name="barang_id" required>
    <option value="">-- Pilih Barang --</option>
    @foreach ($barang as $item)
        <option value="{{ $item->id }}">{{ $item->barang }}</option>
    @endforeach
</select>









            <label for="nama_atasan">Nama Atasan</label>
            <input type="text" id="nama_atasan" name="nama_atasan" placeholder="Nama Atasan" />

            <button type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        // Inisialisasi jika ada tabel
        $("#myTable").DataTable();
    });
</script>
@endsection
