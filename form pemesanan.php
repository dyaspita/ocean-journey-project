<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pemesanan Paket Trip | Oceano Journey</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<?php
include 'koneksi.php';?>
<body class="bg-white">

  <!-- Header -->
  <header class="fixed top-0 left-0 w-full z-50 bg-white shadow-md rounded-br-2xl px-8 py-4">
    <div class="flex justify-between items-center max-w-screen-xl mx-auto">
      <div class="flex items-center space-x-2">
        <img src="gambar/logolagi.png" alt="Logo" class="w-8 h-8" />
        <span class="font-semibold text-sky-700 text-lg">Oceano Journey</span>
      </div>
      <nav class="space-x-8 text-sm font-semibold text-[#8a6d3b]">
        <a href="beranda.html" class="hover:text-yellow-600">Beranda</a>
        <a href="destinasi.html" class="hover:text-yellow-600">Destinasi</a>
        <a href="pakettour1.html" class="hover:text-yellow-600">Paket Tour</a>
        <a href="tentang.html" class="hover:text-yellow-600">Tentang</a>
      </nav>
      <a href="login.html" class="bg-[#a78d60] text-white text-sm px-4 py-1 rounded-full hover:bg-[#8a6d3b] transition">
        Login
      </a>
    </div>
  </header>
  <div class="pt-24"></div>

  <!-- Form Section -->
  <section class="bg-sky-100 py-16 px-6">
    <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-lg p-8 md:p-12 flex flex-col md:flex-row items-center gap-10">
      <!-- Form -->
      <div class="w-full md:w-1/2">
        <div class="mb-6 flex items-center gap-2">
          <img src="gambar/logolagi.png" alt="Logo kecil" class="w-20 h-20">
        </div>
        <div>
             <h2 class="text-xl md:text-2xl font-bold text-[#a78d60]">Pemesanan Paket Trip</h2>
             <br>
        </div>
        <form class="space-y-4">
          <input type="text" placeholder="Nama Pemesan"  name="nama_plg" class="w-full bg-blue-100 rounded-md py-2 px-4 outline-none" />
          <input type="text" placeholder="Pilihan Paket" name="destinasi" class="w-full bg-blue-100 rounded-md py-2 px-4 outline-none" />
          <input type="date" name="tgl_berangkat" class="w-full bg-blue-100 rounded-md py-2 px-4 outline-none"  />
          <input type="text" placeholder="Metode Pembayaran" name="metode_bayar" class="w-full bg-blue-100 rounded-md py-2 px-4 outline-none" />
          <input type="text" name="alamat" placeholder="Alamat Domisili" class="w-full bg-blue-100 rounded-md py-2 px-4 outline-none" />
          <input type="tel" name="telepon" placeholder="Nomor Telepon" class="w-full bg-blue-100 rounded-md py-2 px-4 outline-none" />
          <input type="number" name="jumlah_orang" placeholder="Jumlah Orang" class="w-full bg-blue-100 rounded-md py-2 px-4 outline-none" />
          <button type="submit" class="w-full bg-[#a78d60] hover:bg-[#8a6d3b] text-white py-2 rounded-md font-semibold transition">
            Submit
          </button>
        </form>
      </div>
<?php
$conn = mysqli_connect("localhost", "root", "", "ocean-journey"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_destinasi  = $_POST['destinasi'];
    $nama          = $_POST['nama_plg'];
    $telepon       = $_POST['telepon'];
    $alamat        = $_POST['alamat'];
    $metode_bayar  = $_POST['metode_bayar'];
    $tgl_berangkat = $_POST['tgl_berangkat'];
    $jumlah_orang  = $_POST['jumlah_orang'];

    $insert = "INSERT INTO pemesanan 
        (id_destinasi, nama_plg, tgl_berangkat, telepon, alamat, metode_bayar, jumlah_orang) 
        VALUES 
        ('$id_destinasi', '$nama_plg', '$tgl_berangkat', '$telepon', '$alamat', '$metode_bayar', '$jumlah_orang')";

    if (mysqli_query($conn, $insert)) {
        $id_pesan = mysqli_insert_id($conn); 
        header("Location: ringkasan.php?id_pesan=$id_pesan"); 
        exit;
    } else {
        echo "❌ Gagal menyimpan: " . mysqli_error($conn);
    }
}
?>

      <!-- Image -->
      <div class="w-full md:w-1/2">
        <img src="https://i.pinimg.com/736x/4a/89/18/4a8918fd1b07d681e91f30fbc37b111b.jpg" alt="Pantai" class="rounded-2xl shadow-md w-full h-full object-cover" />
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white py-10 px-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-gray-600">
      <div>
        <h5 class="font-semibold mb-2">OCEAN JOURNEY</h5>
        <ul>
          <li><a href="tentang.php">About Us</a></li>
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
        <img src="gambar/logo2.png" alt="Logo" class="mx-auto h-32">
      </div>
    </div>
  </footer>

</body>
</html>
