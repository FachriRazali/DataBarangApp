<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pengajuan Peminjaman Barang')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles') <!-- Tempat untuk CSS khusus -->
</head>
<body>
    @yield('content') <!-- Tempat konten halaman -->

    @yield('scripts') <!-- Tempat script khusus halaman -->
</body>
</html>
