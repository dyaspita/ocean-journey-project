<<<<<<< HEAD
<?php
// konfirmasi_pemesanan.php
include 'koneksi.php';
$conn = mysqli_connect("localhost", "root", "", "ocean-journey");

// Hapus pesanan jika ada id_hapus
if (isset($_GET['id_hapus'])) {
  $id_hapus = intval($_GET['id_hapus']);
  mysqli_query($conn, "DELETE FROM pemesanan WHERE id_pesan = $id_hapus");
  header("Location: konfirmasi_pemesanan.php");
  exit;
}

// Update status pesanan
if (isset($_GET['id']) && isset($_GET['status'])) {
  $id = $_GET['id'];
  $status = $_GET['status'];
  $query = "UPDATE pemesanan SET status='$status' WHERE id_pesan='$id'";
  mysqli_query($conn, $query);
  header("Location: konfirmasi_pemesanan.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Konfirmasi Pemesanan - Oceano Journey</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-white">

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

<div class="pt-24"></div>

<!-- Tabel -->
<div class="max-w-4xl mx-auto my-10 bg-white shadow rounded-lg p-6">
  <h2 class="text-xl font-semibold mb-4">Daftar Pemesanan</h2>
  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 text-sm">
      <thead>
        <tr class="bg-gray-100">
          <th class="py-2 px-4 border-b">ID</th>
          <th class="py-2 px-4 border-b">Nama Pelanggan</th>
          <th class="py-2 px-4 border-b">Tanggal Berangkat</th>
          <th class="py-2 px-4 border-b">Metode Pembayaran</th>
          <th class="py-2 px-4 border-b">Status</th>
          <th class="py-2 px-4 border-b text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT id_pesan, nama_plg, tgl_berangkat, metode_bayar, status FROM pemesanan";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0):
          while ($row = mysqli_fetch_assoc($result)):
            $statusClass = match($row['status']) {
              'Menunggu Konfirmasi' => 'text-yellow-600 font-semibold',
              'Diterima' => 'text-green-600 font-semibold',
              'Ditolak'  => 'text-red-600 font-semibold',
              default    => 'text-gray-600',
            };
        ?>
        <tr>
          <td class="py-2 px-4 border-b text-center"><?= $row['id_pesan'] ?></td>
          <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['nama_plg']) ?></td>
          <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['tgl_berangkat']) ?></td>
          <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['metode_bayar']) ?></td>
          <td class="py-2 px-4 border-b">
            <span class="<?= $statusClass ?>"><?= htmlspecialchars($row['status']) ?></span>
          </td>
          <td class="py-2 px-4 border-b text-center">
            <?php if ($row['status'] === 'Menunggu Konfirmasi'): ?>
              <button 
                class="text-blue-500 hover:text-blue-700 mx-1 edit-btn"
                data-id="<?= $row['id_pesan'] ?>"
                title="Konfirmasi Pembayaran">
                <img src="gambar/edit.png" alt="Edit" class="inline w-5 h-5" />
              </button>
            <?php endif; ?>
            <a href="#" 
              class="text-red-500 hover:text-red-700 mx-1 hapus-btn" 
              data-id="<?= $row['id_pesan'] ?>" 
              title="Hapus">
              <img src="gambar/delete.png" alt="Hapus" class="inline w-5 h-5" />
            </a>
          </td>
        </tr>
        <?php endwhile; endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- POPUP KONFIRMASI -->
<div id="popupCancel" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white p-6 rounded-xl shadow-xl text-center max-w-sm w-full">
    <h2 class="text-xl font-semibold text-red-600 mb-3">Konfirmasi Pembayaran</h2>
    <p class="text-gray-700 mb-5">Konfirmasi Pesanan</p>
    <div id="popupActions" class="flex justify-center gap-4">
      <a href="#" id="btnTerima" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">  Diterima</a>
      <a href="#" id="btnTolak" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Ditolak</a>
    </div>
    <div id="popupSuccess" class="hidden text-green-600 font-semibold mt-4">Status berhasil diubah!</div>
  </div>
</div>

<!-- POPUP HAPUS -->
<div id="popupHapus" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white p-6 rounded-xl shadow-xl text-center max-w-sm w-full">
    <h2 class="text-xl font-semibold text-red-600 mb-3">Hapus Pesanan</h2>
    <p class="text-gray-700 mb-5">Yakin ingin menghapus pesanan ini?</p>
    <div class="flex justify-center gap-4">
      <button id="btnYaHapus" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full">
        Hapus
      </button>
      <button onclick="closeHapusPopup()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-full">
        Batal
      </button>
    </div>
  </div>
</div>

<script>
  let currentId = null;
  let hapusId = null;

  // Buka popup konfirmasi
  document.querySelectorAll('.edit-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      currentId = btn.dataset.id;
      document.getElementById('popupCancel').classList.remove('hidden');
      document.getElementById('popupActions').classList.remove('hidden');
      document.getElementById('popupSuccess').classList.add('hidden');
    });
  });

  function updateStatus(status) {
    fetch(`?id=${currentId}&status=${status}`)
      .then(() => {
        document.getElementById('popupActions').classList.add('hidden');
        document.getElementById('popupSuccess').classList.remove('hidden');
        setTimeout(() => location.reload(), 1200);
      });
  }

  document.getElementById('btnTerima').onclick = function(e) {
    e.preventDefault();
    updateStatus('Diterima');
  };
  document.getElementById('btnTolak').onclick = function(e) {
    e.preventDefault();
    updateStatus('Ditolak');
  };

  // Popup hapus
  document.querySelectorAll('.hapus-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      hapusId = btn.dataset.id;
      document.getElementById('popupHapus').classList.remove('hidden');
    });
  });

  document.getElementById('btnYaHapus').onclick = function() {
    window.location.href = '?id_hapus=' + hapusId;
  };

  function closeHapusPopup() {
    document.getElementById('popupHapus').classList.add('hidden');
  }
</script>

</body>
</html>
=======
<?php
// konfirmasi_pemesanan.php
include 'koneksi.php';
$conn = mysqli_connect("localhost", "root", "", "ocean-journey");

// Hapus pesanan jika ada id_hapus
if (isset($_GET['id_hapus'])) {
  $id_hapus = intval($_GET['id_hapus']);
  mysqli_query($conn, "DELETE FROM pemesanan WHERE id_pesan = $id_hapus");
  header("Location: konfirmasi_pemesanan.php");
  exit;
}

// Update status pesanan
if (isset($_GET['id']) && isset($_GET['status'])) {
  $id = $_GET['id'];
  $status = $_GET['status'];
  $query = "UPDATE pemesanan SET status='$status' WHERE id_pesan='$id'";
  mysqli_query($conn, $query);
  header("Location: konfirmasi_pemesanan.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Konfirmasi Pemesanan - Oceano Journey</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-white">

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

<div class="pt-24"></div>

<!-- Tabel -->
<div class="max-w-4xl mx-auto my-10 bg-white shadow rounded-lg p-6">
  <h2 class="text-xl font-semibold mb-4">Daftar Pemesanan</h2>
  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 text-sm">
      <thead>
        <tr class="bg-gray-100">
          <th class="py-2 px-4 border-b">ID</th>
          <th class="py-2 px-4 border-b">Nama Pelanggan</th>
          <th class="py-2 px-4 border-b">Tanggal Berangkat</th>
          <th class="py-2 px-4 border-b">Metode Pembayaran</th>
          <th class="py-2 px-4 border-b">Status</th>
          <th class="py-2 px-4 border-b text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT id_pesan, nama_plg, tgl_berangkat, metode_bayar, status FROM pemesanan";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0):
          while ($row = mysqli_fetch_assoc($result)):
            $statusClass = match($row['status']) {
              'Menunggu Konfirmasi' => 'text-yellow-600 font-semibold',
              'Diterima' => 'text-green-600 font-semibold',
              'Ditolak'  => 'text-red-600 font-semibold',
              default    => 'text-gray-600',
            };
        ?>
        <tr>
          <td class="py-2 px-4 border-b text-center"><?= $row['id_pesan'] ?></td>
          <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['nama_plg']) ?></td>
          <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['tgl_berangkat']) ?></td>
          <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['metode_bayar']) ?></td>
          <td class="py-2 px-4 border-b">
            <span class="<?= $statusClass ?>"><?= htmlspecialchars($row['status']) ?></span>
          </td>
          <td class="py-2 px-4 border-b text-center">
            <?php if ($row['status'] === 'Menunggu Konfirmasi'): ?>
              <button 
                class="text-blue-500 hover:text-blue-700 mx-1 edit-btn"
                data-id="<?= $row['id_pesan'] ?>"
                title="Konfirmasi Pembayaran">
                <img src="gambar/edit.png" alt="Edit" class="inline w-5 h-5" />
              </button>
            <?php endif; ?>
            <a href="#" 
              class="text-red-500 hover:text-red-700 mx-1 hapus-btn" 
              data-id="<?= $row['id_pesan'] ?>" 
              title="Hapus">
              <img src="gambar/delete.png" alt="Hapus" class="inline w-5 h-5" />
            </a>
          </td>
        </tr>
        <?php endwhile; endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- POPUP KONFIRMASI -->
<div id="popupCancel" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white p-6 rounded-xl shadow-xl text-center max-w-sm w-full">
    <h2 class="text-xl font-semibold text-red-600 mb-3">Konfirmasi Pembayaran</h2>
    <p class="text-gray-700 mb-5">Konfirmasi Pesanan</p>
    <div id="popupActions" class="flex justify-center gap-4">
      <a href="#" id="btnTerima" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">  Diterima</a>
      <a href="#" id="btnTolak" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Ditolak</a>
    </div>
    <div id="popupSuccess" class="hidden text-green-600 font-semibold mt-4">Status berhasil diubah!</div>
  </div>
</div>

<!-- POPUP HAPUS -->
<div id="popupHapus" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white p-6 rounded-xl shadow-xl text-center max-w-sm w-full">
    <h2 class="text-xl font-semibold text-red-600 mb-3">Hapus Pesanan</h2>
    <p class="text-gray-700 mb-5">Yakin ingin menghapus pesanan ini?</p>
    <div class="flex justify-center gap-4">
      <button id="btnYaHapus" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full">
        Hapus
      </button>
      <button onclick="closeHapusPopup()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-full">
        Batal
      </button>
    </div>
  </div>
</div>

<script>
  let currentId = null;
  let hapusId = null;

  // Buka popup konfirmasi
  document.querySelectorAll('.edit-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      currentId = btn.dataset.id;
      document.getElementById('popupCancel').classList.remove('hidden');
      document.getElementById('popupActions').classList.remove('hidden');
      document.getElementById('popupSuccess').classList.add('hidden');
    });
  });

  function updateStatus(status) {
    fetch(`?id=${currentId}&status=${status}`)
      .then(() => {
        document.getElementById('popupActions').classList.add('hidden');
        document.getElementById('popupSuccess').classList.remove('hidden');
        setTimeout(() => location.reload(), 1200);
      });
  }

  document.getElementById('btnTerima').onclick = function(e) {
    e.preventDefault();
    updateStatus('Diterima');
  };
  document.getElementById('btnTolak').onclick = function(e) {
    e.preventDefault();
    updateStatus('Ditolak');
  };

  // Popup hapus
  document.querySelectorAll('.hapus-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      hapusId = btn.dataset.id;
      document.getElementById('popupHapus').classList.remove('hidden');
    });
  });

  document.getElementById('btnYaHapus').onclick = function() {
    window.location.href = '?id_hapus=' + hapusId;
  };

  function closeHapusPopup() {
    document.getElementById('popupHapus').classList.add('hidden');
  }
</script>

</body>
</html>
>>>>>>> e24f584b726490866d5fb10a6ca998e798c32b10
