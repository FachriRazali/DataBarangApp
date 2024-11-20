@extends('layout') <!-- Menggunakan layout utama -->

@section('styles')
<!-- Hubungkan file CSS -->
<link rel="stylesheet" href="{{ asset('css/masuk.css') }}">
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
    <h1>Master Data Barang</h1>

    <!-- Tombol Input Baru -->
    <button id="showFormButton" class="dt-button">Input Baru</button>

    <!-- Form Tambah Data (hidden by default) -->
    <div>
        <form id="addForm" style="display: none;" method="POST" action="{{ route('barang.store') }}">
            @csrf
            <input type="text" name="barang" placeholder="Nama Barang" required />
            <input type="text" name="noBarang" placeholder="No Barang" required />
            <input type="text" name="KodeBarang" placeholder="Kode Barang" required />
            <input type="text" name="status" placeholder="Status" required />
            <button type="submit">Tambah Barang</button>
        </form>
    </div>

    <div class="table-rekap">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>No Barang</th>
                    <th>Kode Barang</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $barang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $barang->barang }}</td>
                        <td>{{ $barang->noBarang }}</td>
                        <td>{{ $barang->KodeBarang }}</td>
                        <td>{{ $barang->status }}</td>
                        <td>
                            <a href="{{ route('barang.edit', $barang->id) }}" class="btn-edit">Edit</a>
                            <a href="{{ route('barang.show', $barang->id) }}" class="btn-detail">Detail</a>
                            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline;">
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
