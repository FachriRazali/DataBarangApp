<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Karyawan</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css"
    />
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/pengajuan2.css" />
  </head>
  <body>
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
        <a href="karyawan.html"> Data karyawan</a>
      </div>

      <div class="list">
        <img src="list.png" class="icon" />
        <a href="masuk.html"> Data Barang</a>
      </div>

      <div class="list">
        <img src="list.png" class="icon" />
        <a href="peminjaman.html">Laporan Peminjaman Barang</a>
      </div>

      <div class="list">
        <img src="list.png" class="icon" />
        <a href="pengajuan2.html">Pengajuan Peminjaman Barang</a>
      </div>
    </div>

    <div class="main">
      <h1>Detail Karyawan </h1>
      <div class="card-input">
        <form class="form">
          <div class="detail">
            <label for="name">Nama Peminjam</label>
            <label class="file" for="memo">Luna</label>
          </div>

          <div class="detail">
            <label for="name">ID</label>
            <label class="file" for="memo">1</label>
          </div>

          <div class="detail">
            <label for="name">Alamat Karyawan</label>
            <label class="file" for="memo">Pasar Kecapi</label>
          </div>

          <div class="detail">
            <label for="name">Email</label>
            <label class="file" for="memo">AI03@gmail.com</label>
          </div>

          <div class="detail">
            <label for="name">Divisi</label>
            <label class="file" for="memo">Science</label>
          </div>

          <button type="submit">
            <a href="karyawan.html" class="sub">Submit</a>
          </button>
        </form>
      </div>
    </div>
    <script>
      $(document).ready(function () {
        $("#myTable").DataTable();
      });
    </script>
  </body>
</html>
