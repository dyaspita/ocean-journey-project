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
<body class="bg-white">


<?php
include 'koneksi.php';
$destinasi = mysqli_query($conn, "SELECT * FROM destinasi");

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
        ('$id_destinasi', '$nama', '$tgl_berangkat', '$telepon', '$alamat', '$metode_bayar', '$jumlah_orang')";

    if (mysqli_query($conn, $insert)) {
        $id_pesan = mysqli_insert_id($conn); 
        header("Location: ringkasanpesanan.php?id_pesan=$id_pesan"); 
        exit;
    } else {
        echo "<div class='text-red-600 text-center font-semibold mt-4'>❌ Gagal menyimpan: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!-- Header -->
<header class="fixed top-0 left-0 w-full z-50 bg-white shadow-md rounded-br-2xl px-8 py-4">
  <div class="flex justify-between items-center max-w-screen-xl mx-auto">
    <div class="flex items-center space-x-2">
      <img src="gambar/logolagi.png" alt="Logo" class="w-8 h-8" />
      <span class="font-semibold text-sky-700 text-lg">Oceano Journey</span>
    </div>
    <nav class="space-x-8 text-sm font-semibold text-[#8a6d3b]">
       <a href="beranda.php" class="hover:text-yellow-600">Beranda</a>
      <a href="destinasi.php" class="hover:text-yellow-600">Destinasi</a>
      <a href="pakettour.php" class="hover:text-yellow-600">Paket Tour</a>
      <a href="tentang.php" class="hover:text-yellow-600">Tentang</a>
    </nav>
    <a href="login.php" class="bg-[#a78d60] text-white text-sm px-4 py-1 rounded-full hover:bg-[#8a6d3b] transition">
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

      <form class="space-y-4" method="POST" action="">
        <input type="text" name="nama_plg" placeholder="Nama Pemesan" required class="w-full bg-blue-100 rounded-md py-2 px-4 outline-none" />

        <select name="destinasi" required class="w-full bg-blue-100 rounded-md py-2 px-4 outline-none">
          <option value="" disabled selected>Pilihan Paket</option>
          <?php while($d = mysqli_fetch_assoc($destinasi)): ?>
            <option value="<?= $d['id_desti'] ?>"><?= htmlspecialchars($d['nama_destinasi']) ?></option>
          <?php endwhile; ?>
        </select>

        <input type="date" name="tgl_berangkat" required class="w-full bg-blue-100 rounded-md py-2 px-4 outline-none" />

        <select name="metode_bayar" required class="w-full bg-blue-100 rounded-md py-2 px-4 outline-none">
          <option value="" disabled selected>Metode Pembayaran</option>
          <option value="BCA">BCA</option>
          <option value="BRI">BRI</option>
          <option value="BNI">BNI</option>
          <option value="Mandiri">Mandiri</option>
        </select>

        <input type="text" name="alamat" placeholder="Alamat Domisili" required class="w-full bg-blue-100 rounded-md py-2 px-4 outline-none" />
        <input type="tel" name="telepon" placeholder="Nomor Telepon" required class="w-full bg-blue-100 rounded-md py-2 px-4 outline-none" />
        <input type="number" name="jumlah_orang" placeholder="Jumlah Orang" min="1" required class="w-full bg-blue-100 rounded-md py-2 px-4 outline-none" />

        <button type="submit" class="w-full bg-[#a78d60] hover:bg-[#8a6d3b] text-white py-2 rounded-md font-semibold transition">
          Submit
        </button>
      </form>

      <div id="formMsg" class="mt-2 text-sm font-semibold"></div>

      <script>
      const form = document.querySelector('form');
      const teleponInput = form.querySelector('input[name="telepon"]');
      const jumlahOrangInput = form.querySelector('input[name="jumlah_orang"]');
      const submitBtn = form.querySelector('button[type="submit"]');
      const paketSelect = form.querySelector('select[name="destinasi"]');
      const formMsg = document.getElementById('formMsg');

      teleponInput.addEventListener('input', function () {
        if (!/^08[0-9]{8,13}$/.test(this.value)) {
          this.classList.add('ring-2', 'ring-red-400');
          formMsg.textContent = 'Nomor telepon harus diawali 08 dan 10-15 digit.';
          formMsg.classList.add('text-red-600');
        } else {
          this.classList.remove('ring-2', 'ring-red-400');
          formMsg.textContent = '';
          formMsg.classList.remove('text-red-600');
        }
      });

      jumlahOrangInput.addEventListener('input', function () {
        if (parseInt(this.value) < 1) {
          this.classList.add('ring-2', 'ring-red-400');
          formMsg.textContent = 'Jumlah orang minimal 1.';
          formMsg.classList.add('text-red-600');
        } else {
          this.classList.remove('ring-2', 'ring-red-400');
          formMsg.textContent = '';
          formMsg.classList.remove('text-red-600');
        }
      });

      paketSelect.addEventListener('change', function () {
        let paket = paketSelect.options[paketSelect.selectedIndex].text;
        formMsg.textContent = 'Anda memilih: ' + paket;
        formMsg.classList.remove('text-red-600');
        formMsg.classList.add('text-green-600');
      });

      form.addEventListener('submit', function () {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Memproses...';
      });
      </script>
    </div>

    <div class="w-full md:w-1/2">
      <img src="https://i.pinimg.com/736x/4a/89/18/4a8918fd1b07d681e91f30fbc37b111b.jpg" alt="Pantai" class="rounded-2xl shadow-md w-full h-full object-cover" />
    </div>
  </div>
</section>

 <!-- Footer -->
  <footer class="bg-white py-10 px-8" id="tentang">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-gray-600">
      <div>
        <h5 class="font-semibold mb-2">OCEAN JOURNEY</h5>
        <ul><li><a href="tentang.php">About</a></li></ul>
      </div>
      <div>
        <h5 class="font-semibold mb-2">HELP CENTER</h5>
        <ul><li><a href="#">FAQ</a></li></ul>
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
        <img src="gambar/logo2.png" alt="Logo" class="mx-auto h-40 hover:scale-105 transition duration-300">
      </div>
    </div>
  </footer>

</body>
</html>
