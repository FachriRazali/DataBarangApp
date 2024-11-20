@extends('layout') <!-- Menggunakan layout utama -->

@section('styles')
<!-- Hubungkan file CSS -->
<link rel="stylesheet" href="{{ asset('css/karyawan.css') }}">
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
    <h1>Master Data Karyawan</h1>
    <button id="showFormButton" class="dt-button">Input Baru</button>

    <!-- Form Tambah Data (hidden by default) -->
    <div>
        <form id="addForm" style="display: none;" method="POST" action="{{ route('employees.store') }}">
            @csrf
            <input type="text" name="nama" placeholder="Nama Karyawan" required />
            <input type="text" name="id" placeholder="ID Karyawan" required />
            <input type="text" name="alamat" placeholder="Alamat" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="text" name="divisi" placeholder="Divisi" required />
            <button type="submit">Tambah Karyawan</button>
        </form>
    </div>

    <div class="table-rekap">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>ID</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Divisi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->nama }}</td>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->alamat }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->divisi }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display: inline;">
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

        // Delete row function
        $("#myTable tbody").on("click", ".btn-delete", function () {
            table.row($(this).parents("tr")).remove().draw();
        });
    });
</script>
@endsection
