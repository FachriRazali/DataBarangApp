@extends('layout') <!-- Menggunakan layout utama -->

@section('styles')
<!-- Hubungkan file CSS -->
<link rel="stylesheet" href="{{ asset('css/pengajuan2.css') }}">
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
    <h1>Pengajuan Peminjaman Barang</h1>
    <div class="card-input">
        <form class="form" method="POST" action="{{ route('pengajuan.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" placeholder="Nama" required />

            <label for="barang">Barang</label>
            <input type="text" id="barang" name="barang" placeholder="Barang" required />

            <label class="file" for="signature">Tanda Tangan Atasan</label>
            <input type="file" id="signature" name="signature" required />

            <label class="file" for="memo">Surat Internal Memo</label>
            <input type="file" id="memo" name="memo" required />

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
