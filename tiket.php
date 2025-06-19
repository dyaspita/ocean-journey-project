<?php
include 'koneksi.php';
$conn = mysqli_connect("localhost", "root", "", "ocean-journey");

$id_pesan = $_GET['id'] ?? '';

$query = "SELECT p.*, d.nama_destinasi 
          FROM pemesanan p 
          JOIN destinasi d ON p.id_destinasi = d.id_desti 
          WHERE p.id_pesan='$id_pesan' AND p.status='Diterima'";

$result = mysqli_query($conn, $query);
$tiket = mysqli_fetch_assoc($result);

if (!$tiket) {
  echo "<script>alert('Tiket tidak ditemukan atau belum dikonfirmasi.'); window.location.href='beranda.html';</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pembayaran Berhasil | Oceano Journey</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .qr-box {
      border: 2px dashed #a78d60;
      padding: 10px;
      display: inline-block;
      border-radius: 8px;
      text-align: center;
    }
    @media print {
      .no-print {
        display: none !important;
      }
    }
  </style>
</head>
<body class="bg-sky-100 text-gray-800">

  <!-- Header -->
  <header class="fixed top-0 left-0 w-full bg-white shadow-md px-8 py-4 rounded-br-2xl z-50 no-print">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <div class="flex items-center gap-2">
        <img src="logolagi.png" alt="Logo" class="w-8 h-8">
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

  <div class="pt-24 no-print"></div>

  <!-- Tiket -->
  <div id="tiketArea" class="max-w-4xl mx-auto bg-white rounded-xl shadow-xl p-8 text-[#a78d60] my-12">
    <h1 class="text-center text-4xl font-bold mb-4">Tiket Anda</h1>
    <div class="max-w-4xl mx-auto bg-white rounded-xl p-8 text-[#a78d60]">
      <div class="bg-[#a78d60] text-white text-center font-semibold py-2">
        OCEANO JOURNEY
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 p-6 text-sm">
        <div class="space-y-2">
          <div class="grid grid-cols-[auto_16px_1fr] gap-2 text-sm">
            <div class="font-semibold">ID Pemesanan</div>
            <div>:</div>
            <div><?= htmlspecialchars($tiket['id_pesan']) ?></div>

            <div class="font-semibold">Nama</div>
            <div>:</div>
            <div><?= htmlspecialchars($tiket['nama_plg']) ?></div>

            <div class="font-semibold">Paket</div>
            <div>:</div>
            <div><?= htmlspecialchars($tiket['nama_destinasi']) ?></div>

            <div class="font-semibold">Tanggal</div>
            <div>:</div>
            <div><?= htmlspecialchars($tiket['tgl_berangkat']) ?></div>

            <div class="font-semibold">Jumlah</div>
            <div>:</div>
            <div><?= htmlspecialchars($tiket['jumlah_orang']) ?> Orang</div>

            <div class="font-semibold">No. HP</div>
            <div>:</div>
            <div><?= htmlspecialchars($tiket['telepon']) ?></div>
          </div>
        </div>
        
        <div class="flex flex-col items-center justify-center mt-4 md:mt-0">
          <div class="qr-box">
            <p class="text-xs font-semibold mb-2">SCAN HERE</p>
            <!-- Menggunakan data URL untuk QR code -->
            <?php 
              $qrContent = urlencode($tiket['id_pesan']);
              $qrImage = "https://api.qrserver.com/v1/create-qr-code/?data=$qrContent&size=120x120";
              $qrData = file_get_contents($qrImage);
              $qrBase64 = 'data:image/png;base64,' . base64_encode($qrData);
            ?>
            <img src="<?= $qrBase64 ?>" alt="QR Code" class="w-28 h-28" />
          </div>
        </div>
      </div>
    </div>

    <div class="mt-6 text-center no-print">
      <button onclick="cetakPDF()" class="bg-[#a78d60] text-white px-6 py-2 rounded-full hover:bg-[#8a6d3b] shadow">
        Cetak Tiket (PDF)
      </button>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-white py-10 px-8 no-print" id="tentang">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
function cetakPDF() {

  const elements = document.querySelectorAll('.no-print');
  elements.forEach(el => el.style.display = 'none');
  
  const element = document.getElementById('tiketArea');
  
  // Konfigurasi html2pdf
  const opt = {
    margin: 0.5,
    filename: 'tiket-oceano-journey.pdf',
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { 
      scale: 2,
      useCORS: true,
      allowTaint: true
    },
    jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
  };
  
  // Generate PDF
  html2pdf().set(opt).from(element).save();
  
  // Setelah selesai, tampilkan kembali elemen yang disembunyikan
  setTimeout(() => {
    elements.forEach(el => el.style.display = '');
  }, 1000);
}
</script>

</body>
</html>