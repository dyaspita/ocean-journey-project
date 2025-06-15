<?php
include 'koneksi.php';

// Koneksi DB manual (bisa dihapus kalau 'koneksi.php' sudah menangani ini)
$koneksi = mysqli_connect("localhost", "root", "", "ocean-journey");

if (!isset($_GET['id_pesan'])) {
    echo "ID pesanan tidak ditemukan.";
    exit;
}

$id_pesan = intval($_GET['id_pesan']);

// Ambil data pemesanan berdasarkan ID
$query = "SELECT p.*, d.nama_destinasi 
          FROM pemesanan p 
          JOIN destinasi d ON p.id_destinasi = d.id_desti 
          WHERE id_pesan = $id_pesan";
$result = mysqli_query($koneksi, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "Data pesanan tidak ditemukan.";
    exit;
}

$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ringkasan Pemesanan | Oceano Journey</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-sky-100 text-gray-800">

<!-- Header -->
<header class="fixed top-0 left-0 w-full bg-white shadow-md px-8 py-4 rounded-br-2xl z-50">
  <div class="max-w-7xl mx-auto flex justify-between items-center">
    <div class="flex items-center gap-2">
      <img src="gambar/logolagi.png" alt="Logo" class="w-8 h-8">
      <span class="font-semibold text-sky-700 text-lg">Oceano Journey</span>
    </div>
    <nav class="space-x-8 text-sm font-semibold text-[#8a6d3b]">
      <a href="beranda.php" class="hover:text-yellow-600">Beranda</a>
      <a href="destinasi.php" class="hover:text-yellow-600">Destinasi</a>
      <a href="pakettour1.php" class="hover:text-yellow-600">Paket Tour</a>
      <a href="tentang.php" class="hover:text-yellow-600">Tentang</a>
    </nav>
    <a href="login.html" class="bg-[#a78d60] text-white text-sm px-4 py-1 rounded-full hover:bg-[#8a6d3b] transition">
      Login
    </a>
  </div>
</header>
<div class="pt-24"></div>

<!-- Ringkasan Pemesanan -->
<section class="py-20 px-6">
  <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-lg p-8 md:p-12 flex flex-col md:flex-row items-center gap-20">
    <!-- Info -->
    <div class="w-full md:w-1/2">
      <div class="mb-6 flex items-center gap-2">
        <img src="gambar/logolagi.png" alt="Logo kecil" class="w-20 h-20">
      </div>
      <h2 class="text-xl md:text-2xl font-bold text-[#a78d60] mb-4">Ringkasan Pesanan</h2>
      <hr class="mb-4 border-[#a78d60]">
      <div class="text-[#a78d60] space-y-2">
        <p><span class="font-semibold">No. Pesanan :</span> <?= htmlspecialchars($data['id_pesan']) ?></p>
        <p><span class="font-semibold">Nama Pemesan :</span> <?= htmlspecialchars($data['nama_plg']) ?></p>
        <p><span class="font-semibold">Alamat :</span> <?= htmlspecialchars($data['alamat']) ?></p>
        <p><span class="font-semibold">Nomor Telepon :</span> <?= htmlspecialchars($data['telepon']) ?></p>
        <p><span class="font-semibold">Pilihan Paket :</span> <?= htmlspecialchars($data['nama_destinasi']) ?></p>
        <p><span class="font-semibold">Tanggal Keberangkatan :</span> <?= htmlspecialchars($data['tgl_berangkat']) ?></p>
        <p><span class="font-semibold">Jumlah Orang :</span> <?= htmlspecialchars($data['jumlah_orang']) ?></p>
        <p><span class="font-semibold">Metode Pembayaran :</span> <?= htmlspecialchars($data['metode_bayar']) ?></p>
      </div>
      <div class="mt-6">
        <!-- Tombol Lanjutkan Pembayaran -->
        <a href="halamanpembayaran.php?id=<?= $data['id_pesan'] ?>" class="bg-[#a78d60] text-white px-6 py-2 rounded-full hover:bg-[#8a6d3b] transition shadow-md inline-block">
          Lanjutkan Pembayaran
        </a>
      </div>
    </div>

    <!-- Gambar -->
    <div class="w-full md:w-1/3">
      <img src="https://i.pinimg.com/736x/4a/89/18/4a8918fd1b07d681e91f30fbc37b111b.jpg" alt="Pantai" class="rounded-xl shadow-md object-cover w-full h-full" />
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg-white py-10 px-8">
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6 text-gray-600 text-sm">
    <div>
      <h5 class="font-semibold mb-2">OCEANO JOURNEY</h5>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Agent</a></li>
        <li><a href="#">Testimony</a></li>
      </ul>
    </div>
    <div>
      <h5 class="font-semibold mb-2">HELP CENTER</h5>
      <ul>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Terms & Condition</a></li>
        <li><a href="#">Privacy Policy</a></li>
      </ul>
    </div>
    <div>
      <h5 class="font-semibold mb-2">CONTACT US</h5>
      <ul>
        <li>📞 081217263827</li>
        <li>📷 @oceano.journey</li>
        <li>✉️ oceanojourney@gmail.com</li>
      </ul>
    </div>
    <div>
      <img src="gambar/logo2.png" alt="Logo" class="mx-auto h-24" />
    </div>
  </div>
</footer>

</body>
</html>
