<?php
session_start();

// Periksa apakah pengguna sudah login dan apakah mereka manajer
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'manajer') {
    header("Location: login.php"); // Alihkan ke halaman login jika bukan manajer
    exit;
}
?>




<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Oceano Journey</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" href="styless.css" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-white">

<header class="flex items-center justify-between px-8 py-4 bg-white shadow-md">
  <!-- Logo dan Navigasi -->
  <div class="flex items-center space-x-8">
    <div class="flex items-center space-x-2">
      <img src="gambar/logo2.png" alt="Logo" class="w-8 h-8" />
      <span class="font-semibold text-sky-700">Oceano Journey</span>
    </div>
    <nav class="flex space-x-4 font-semibold text-[#a78d60]">
      <a href="berandamanajer.php" class="hover:text-[#8a6d3b]">Beranda</a>
      <a href="laporan_manajer.php" class="hover:text-[#8a6d3b]">Data Laporan</a>
    </nav>
  </div>

  <!-- Logout Button -->
  <a href="logout.php" class="bg-[#a78d60] text-white text-sm px-4 py-1 rounded-full hover:bg-[#8a6d3b] transition">
    Logout
  </a>
</header>

      

  <section class="text-center py-12 px-6 bg-[#BFE5F7] text-gray-800">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <img src="logo2.png" alt="Logo" class="mx-auto h-60">   
      <div class="text-center mt-12">
        <h1 class="text-4xl md:text-5xl font-extrabold text-center">
          <span class="text-[#a78d60]">WELCOME,</span>
          <span class="text-white">MANAJER !</span>
        </h1>
      </div>
    </div>
  </section>

   <!-- Footer -->
   <footer class="bg-white py-10 px-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-gray-600">
      <div>
        <h5 class="font-semibold mb-2">OCEAN JOURNEY</h5>
        <ul>
          <li><a href="#">About</a></li>
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
          <li>📞 081237823627</li>
          <li>📷 @oceano.journey</li>
          <li>✉️ oceanojurney@gmail.com</li>
        </ul>
      </div>
      <div>
        <img src="logo2.png" alt="Logo" class="mx-auto h-40">
      </div>
    </div>
  </footer>
