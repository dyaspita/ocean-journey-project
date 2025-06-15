
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

$conn = mysqli_connect("localhost", "root", "", "ocean-journey");

// Hitung total penjualan
$sqlTotal = "SELECT SUM(p.jumlah_orang * d.harga) AS total 
             FROM pemesanan p 
             JOIN destinasi d ON p.id_destinasi = d.id_desti 
             WHERE p.status = 'Diterima'";
$resTotal = mysqli_query($conn, $sqlTotal);
$rowTotal = mysqli_fetch_assoc($resTotal);
$total_penjualan = $rowTotal['total'] ?? 0;

// Jumlah Pesanan
$sqlJumlah = "SELECT COUNT(*) AS jumlah FROM pemesanan WHERE status='Diterima'";
$resJumlah = mysqli_query($conn, $sqlJumlah);
$rowJumlah = mysqli_fetch_assoc($resJumlah);
$jumlah_pesanan = $rowJumlah['jumlah'] ?? 0;

// Paket Terlaris
$sqlTerlaris = "SELECT d.nama_destinasi, COUNT(*) AS jumlah 
                FROM pemesanan p 
                JOIN destinasi d ON p.id_destinasi = d.id_desti 
                WHERE p.status='Diterima'
                GROUP BY p.id_destinasi 
                ORDER BY jumlah DESC LIMIT 1";
$resTerlaris = mysqli_query($conn, $sqlTerlaris);
$rowTerlaris = mysqli_fetch_assoc($resTerlaris);
$paket_terlaris = $rowTerlaris['nama_destinasi'] ?? '-';
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
    <p class="text-2xl font-bold text-[#a78d60]">Total Penjualan</p>
    <p class="text-2xl font-bold text-[#a78d60]">
      Rp <?= number_format($total_penjualan, 0, ',', '.') ?>
    </p>
  </div>
    <div class="bg-white rounded-xl shadow p-4 text-center">
    <p class="text-2xl font-bold text-[#a78d60]">Jumlah Pesanan</p>
    <p class="text-2xl font-bold text-[#a78d60]">
      <?= $jumlah_pesanan ?>
    </p>
  </div>
     <div class="bg-white rounded-xl shadow p-4 text-center">
    <p class="text-2xl font-bold text-[#a78d60]">Paket Terlaris</p>
    <p class="text-2xl font-bold text-[#a78d60]">
      <?= htmlspecialchars($paket_terlaris) ?>
    </p>
  </div>
</div>
   
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
            <th class="py-2 px-4 border-b">Paket Destinasi</th>
            <th class="py-2 px-4 border-b">Metode Pembayaran</th>
            <th class="py-2 px-4 border-b">Jumlah Orang</th>
            <th class="py-2 px-4 border-b">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
        $query = "SELECT p.id_pesan, p.nama_plg, p.tgl_berangkat, d.nama_destinasi, p.metode_bayar, p.jumlah_orang, p.status
                  FROM pemesanan p
                  JOIN destinasi d ON p.id_destinasi = d.id_desti";
          $result = mysqli_query($conn, $query);
          if ($result && mysqli_num_rows($result) > 0):
            while ($row = mysqli_fetch_assoc($result)):
          ?>
          <tr>
            <td class="py-2 px-4 border-b text-center"><?= $row['id_pesan'] ?></td>
            <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['nama_plg']) ?></td>
            <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['tgl_berangkat']) ?></td>
            <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['nama_destinasi']) ?></td>
            <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['metode_bayar']) ?></td>
            <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['jumlah_orang']) ?></td>
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
