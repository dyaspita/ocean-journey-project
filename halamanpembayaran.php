<?php
include 'koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID pemesanan tidak ditemukan.'); window.location.href = 'beranda.php';</script>";
    exit;
}

$id_pesan = intval($_GET['id']);

// Ambil data pemesanan
$query = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id_pesan='$id_pesan'");
$data = mysqli_fetch_assoc($query);

// Jika tombol 'Sudah Transfer' ditekan
if (isset($_POST['konfirmasi'])) {
    $update = mysqli_query($conn, "UPDATE pemesanan SET status='Menunggu Konfirmasi' WHERE id_pesan='$id_pesan'");
    if ($update) {
        echo "<script>alert('Pembayaran Anda sudah kami terima. Silakan menunggu konfirmasi.'); window.location.href = 'halamanpembayaran.php?id=$id_pesan';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal mengupdate status.');</script>";
    }
}

$metode = strtolower($data['metode_bayar'] ?? '');
$rekening = [
    'bca' => '8077 7889 5990 4563 44',
    'mandiri' => '1230 9876 5432 1001',
    'bri' => '0012 3456 7890 1234',
    'bni' => '9876 5432 1098 7654'
];
$logo = [
    'bca' => 'https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_800,h_600/https://brandingkan.com/wp-content/uploads/2023/02/Logo-Bank-BCA-1.png',
    'mandiri' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Bank_Mandiri_logo_2016.svg/2560px-Bank_Mandiri_logo_2016.svg.png',
    'bri' => 'https://buatlogoonline.com/wp-content/uploads/2022/10/Logo-Bank-BRI.png',
    'bni' => 'https://upload.wikimedia.org/wikipedia/id/thumb/5/55/BNI_logo.svg/2560px-BNI_logo.svg.png'
];

$rekening_tujuan = $rekening[$metode] ?? '';
$logo_bank = $logo[$metode] ?? '';

$query2 = mysqli_query($conn, "
  SELECT p.jumlah_orang, d.harga 
  FROM pemesanan p 
  JOIN destinasi d ON p.id_destinasi = d.id_desti 
  WHERE p.id_pesan = '$id_pesan'
");
$data_paket = mysqli_fetch_assoc($query2);
$jumlah_orang = $data_paket['jumlah_orang'] ?? 0;
$harga_paket = $data_paket['harga'] ?? 0;
$total_bayar = $jumlah_orang * $harga_paket;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pemesanan Paket Trip | Oceano Journey</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #cce5f5; }
  </style>
</head>
<body class="bg-white">
<header class="fixed top-0 left-0 w-full z-50 bg-white shadow-md rounded-br-2xl px-8 py-4">
  <div class="flex justify-between items-center max-w-screen-xl mx-auto">
    <div class="flex items-center space-x-2">
      <img src="gambar/logolagi.png" alt="Logo" class="w-8 h-8" />
      <span class="font-semibold text-sky-700 text-lg">Oceano Journey</span>
    </div>
    <nav class="space-x-8 text-sm font-semibold text-[#8a6d3b]">
      <a href="beranda.php" class="hover:text-yellow-600">Beranda</a>
      <a href="destinasi.php" class="hover:text-yellow-600">Destinasi</a>
      <a href="pakettour1.php" class="hover:text-yellow-600">Paket Tour</a>
      <a href="tentang.php" class="hover:text-yellow-600">Tentang</a>
    </nav>
    <a href="login.html" class="bg-[#a78d60] text-white text-sm px-4 py-1 rounded-full hover:bg-[#8a6d3b] transition">Login</a>
  </div>
</header>
<section class="bg-sky-100 py-20 px-6">
  <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-lg p-8 md:p-12 flex flex-col md:flex-row items-center gap-10">
    <div class="w-full md:w-1/2">
      <img src="gambar/logolagi.png" alt="Logo" class="w-20 mb-4">
      <h2 class="text-xl md:text-2xl font-bold text-[#a78d60] mb-4">Halaman Pembayaran</h2>
      <hr class="mb-6 border-[#a78d60]">
      <div class="bg-gray-300 rounded-xl p-6 text-center mb-6">
        <?php if ($logo_bank): ?>
          <img src="<?= $logo_bank ?>" alt="Bank" class="w-16 mx-auto mb-4">
        <?php endif; ?>
        <div class="text-lg text-gray-800 font-semibold mb-3"><?= $rekening_tujuan ?></div>
        <button onclick="copyText()" class="bg-gray-100 hover:bg-white px-4 py-2 rounded-md inline-flex items-center gap-2">
          <img src="https://img.icons8.com/material-rounded/24/000000/copy.png" alt="copy" class="w-4">
          Salin
        </button>
        <br><br>
        <div class="mb-6 text-center text-lg text-gray-800">
          <p>Total yang harus dibayar:</p>
          <p class="text-2xl font-bold text-green-600">Rp <?= number_format($total_bayar, 0, ',', '.') ?></p>
        </div>
      </div>
      <div class="flex gap-4 flex-wrap justify-center">
        <button type="button" class="btn-transfer bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-full shadow">
          Sudah Transfer
        </button>
        <button type="button" class="btn-cancel bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-full shadow">
          Batalkan Pesanan
        </button>
  <a href="tiket.php?id=<?= $id_pesan ?>" target="_blank"
     class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-full shadow ml-2 inline-block">
    Lihat Tiket
  </a>
      </div>
    </div>
    <div class="w-full md:w-1/2">
      <img src="http://1.bp.blogspot.com/-6fayx0iysWs/UUycglBHQCI/AAAAAAAAUyU/z47OKsQMFvo/s1600/Beach+Desktop+Backgrounds+9.jpg" alt="Pantai" class="rounded-2xl shadow-md w-full h-full object-cover" />
    </div>
  </div>
</section>

<!-- Popup Sudah Transfer -->
<div id="popupTransfer" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white p-6 rounded-xl shadow-xl text-center max-w-sm w-full">
    <h2 class="text-xl font-semibold text-green-600 mb-3">Konfirmasi Transfer</h2>
    <p class="text-gray-700 mb-5">Apakah Anda yakin sudah melakukan transfer?</p>
    <div class="flex justify-center gap-4">
      <form method="post">
        <button type="submit" name="konfirmasi" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full">Ya, Sudah</button>
      </form>
      <button type="button" onclick="closeTransferPopup()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-full">Batal</button>
    </div>
  </div>
</div>

<!-- Popup Batalkan Pesanan -->
<div id="popupCancel" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white p-6 rounded-xl shadow-xl text-center max-w-sm w-full">
    <h2 class="text-xl font-semibold text-red-600 mb-3">Batalkan Pesanan?</h2>
    <p class="text-gray-700 mb-5">Apakah Anda yakin ingin membatalkan pesanan ini?</p>
    <div class="flex justify-center gap-4">
      <button onclick="confirmCancel()" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full">Ya, Batalkan</button>
      <button onclick="closeCancelPopup()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-full">Batal</button>
    </div>
  </div>
</div>

<footer class="bg-white py-10 px-8">
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-gray-600">
    <div>
      <h5 class="font-semibold mb-2">OCEANO JOURNEY</h5>
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

<script>
  function copyText() {
    navigator.clipboard.writeText("<?= $rekening_tujuan ?>");
    alert('Nomor rekening disalin!');
  }
  function showCancelPopup() {
    document.getElementById('popupCancel').classList.remove('hidden');
  }
  function closeCancelPopup() {
    document.getElementById('popupCancel').classList.add('hidden');
  }
  function confirmCancel() {
    window.location.href = 'beranda.php';
  }
  function showTransferPopup() {
    document.getElementById('popupTransfer').classList.remove('hidden');
  }
  function closeTransferPopup() {
    document.getElementById('popupTransfer').classList.add('hidden');
  }

  document.querySelector('.btn-cancel')?.addEventListener('click', showCancelPopup);
  document.querySelector('.btn-transfer')?.addEventListener('click', showTransferPopup);
</script>
</body>
</html>