<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Data Laporan Manajer</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<?php
include 'koneksi.php';
?>
<body class="bg-blue-100 text-gray-800">

  <!-- Header -->
<header class="fixed top-0 left-0 w-full z-50 bg-white shadow-md rounded-br-2xl px-8 py-4">
  <div class="flex justify-between items-center max-w-screen-xl mx-auto">
    <div class="flex items-center space-x-2">
      <img src="gambar/logolagi.png" alt="Logo" class="w-8 h-8" />
      <span class="font-semibold text-sky-700 text-lg">Oceano Journey</span>
    </div>
    <nav class="space-x-8 text-sm font-semibold text-[#8a6d3b]">
      <a href="berandaadmin.php" class="hover:text-yellow-600">Beranda</a>
      <a href="konfirmasi_pembayaran.php" class="hover:text-yellow-600">Konfirmasi Pembayaran</a>
    </nav>
    <a href="logout.php" class="bg-[#a78d60] text-white text-sm px-4 py-1 rounded-full hover:bg-[#8a6d3b] transition">
      Logout
    </a>
  </div>
</header>

  <!-- Data Laporan -->
  <main class="max-w-7xl mx-auto mt-10 px-6">
    <h2 class="text-xl font-bold text-center text-[#a78d60] mb-6">Data Laporan</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
      <div class="bg-white rounded-xl shadow p-4 text-center">
        <p class="text-gray-600 font-medium">Total Penjualan</p>
        <p class="text-2xl font-bold text-[#a78d60]">Rp 17.750.000</p>
      </div>
      <div class="bg-white rounded-xl shadow p-4 text-center">
        <p class="text-gray-600 font-medium">Jumlah Pelanggan</p>
        <p class="text-2xl font-bold text-[#a78d60]">711</p>
      </div>
      <div class="bg-white rounded-xl shadow p-4 text-center">
        <p class="text-gray-600 font-medium">Paket Terlaris</p>
        <p class="text-lg font-bold text-[#a78d60]">Paket Petualang 1 Hari</p>
      </div>
    </div>

    <!-- Tabel Riwayat -->
    <h3 class="text-lg font-semibold text-[#a78d60] mb-3">Tabel Riwayat Pesanan</h3>
     <div class="max-w-6xl mx-auto my-10 bg-white shadow rounded-lg p-6">
  <h2 class="text-xl font-semibold mb-4">Daftar Pemesanan</h2>

 <?php

    include 'koneksi.php';
    $conn = mysqli_connect("localhost", "root", "", "ocean-journey");
    ?>
    <div class="overflow-x-auto bg-white shadow-md rounded-xl">
      <table class="min-w-full border border-gray-200 text-sm">
        <thead>
          <tr class="bg-gray-100">
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Nama Pelanggan</th>
            <th class="py-2 px-4 border-b">Tanggal Berangkat</th>
            <th class="py-2 px-4 border-b">Metode Pembayaran</th>
            <th class="py-2 px-4 border-b">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT id_pesan, nama_plg, tgl_berangkat, metode_bayar, status FROM pemesanan";
          $result = mysqli_query($conn, $query);
          if ($result && mysqli_num_rows($result) > 0):
            while ($row = mysqli_fetch_assoc($result)):
          ?>
          <tr>
            <td class="py-2 px-4 border-b text-center"><?= $row['id_pesan'] ?></td>
            <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['nama_plg']) ?></td>
            <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['tgl_berangkat']) ?></td>
            <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['metode_bayar']) ?></td>
            <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['status']) ?></td>
          </tr>
          <?php endwhile; else: ?>
          <tr>
            <td colspan="5" class="py-2 px-4 border-b text-center">Tidak ada data.</td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    </div>
</div>
</body> 
</html>