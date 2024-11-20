@extends('layout') <!-- Menggunakan layout utama -->

@section('styles')
<!-- Hubungkan file CSS -->
<link rel="stylesheet" href="{{ asset('css/karyawan.css') }}">

<div class="sidebar">
    <div class="profile">
        <div class="photo"></div>
        <div class="name">
            <h1>Fachri Razali</h1>
            <h3>Admin</h3>
        </div>
    </div>

    <div class="list">
        <img src="list.png" class="icon" />
        <a href="{{ route('employees.index') }}">Data Karyawan</a>
    </div>

    <div class="list">
        <img src="list.png" class="icon" />
        <a href="{{ route('barang.index') }}">Data Barang</a>
    </div>

    <div class="list">
        <img src="list.png" class="icon" />
        <a href="{{ route('peminjaman.index') }}">Laporan Peminjaman Barang</a>
    </div>

    <div class="list">
        <img src="list.png" class="icon" />
        <a href="{{ route('pengajuan.index') }}">Pengajuan Peminjaman Barang</a>
    </div>

    <div class="list">
        <img src="{{ asset('img/list.png') }}" class="icon" />
        <a href="{{ route('perizinan.create') }}">Perizinan Barang</a>
    </div>
</div>

<div class="main">
    <h1>Laporan Peminjaman Barang</h1>

    <button id="showFormButton" class="dt-button">Input Baru</button>

    <!-- Form Tambah Data (hidden by default) -->
    <div>
        <form id="addForm" style="display: none;" method="POST" action="{{ route('peminjaman.store') }}">
            @csrf
            <input type="text" name="nama_barang" placeholder="Nama Barang" required />
            <input type="number" name="jumlah" placeholder="Jumlah" required />
            <input type="text" name="kode_barang" placeholder="Kode Barang" required />
            <input type="text" name="status" placeholder="Status" required />
            <input type="text" name="nama_peminjam" placeholder="Nama Peminjam" required />
            <button type="submit">Tambah Barang</button>
        </form>
    </div>

    <div class="table-rekap">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kode Barang</th>
                    <th>Status</th>
                    <th>Nama Peminjam</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->nama_peminjam }}</td>
                        <td>
                            <a href="{{ route('peminjaman.edit', $item) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('peminjaman.destroy', $item) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        const table = $("#myTable").DataTable();

        // Toggle form visibility
        $("#showFormButton").on("click", function () {
            $("#addForm").toggle();
        });
    });
</script>
@endsection
