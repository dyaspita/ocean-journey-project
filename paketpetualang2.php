<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Paket Petualang 1 Hari | Oceano Journey</title>
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
        <a href="beranda.php" class="hover:text-yellow-600">Beranda</a>
        <a href="destinasi.php" class="hover:text-yellow-600">Destinasi</a>
        <a href="pakettour1.php" class="hover:text-yellow-600">Paket Tour</a>
        <a href="tentang.php" class="hover:text-yellow-600">Tentang</a>
      </nav>
      <a href="login.php" class="bg-[#a78d60] text-white text-sm px-4 py-1 rounded-full hover:bg-[#8a6d3b] transition">
        Login
      </a>
    </div>
  </header>
  <div class="pt-24"></div>

  <!-- Banner -->
  <section class="relative">
    <img src="https://i.pinimg.com/736x/4e/65/95/4e6595be9b579bec7b82bf4237f151cc.jpg" alt="Pantai" class="w-full h-[300px] object-cover" />
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center">
      <h1 class="text-white text-4xl font-extrabold tracking-wide drop-shadow-lg">Paket Eksplor  Hari</h1>
    </div>
  </section>

  <!-- Detail Paket -->
  <section class="bg-sky-100 py-14 px-6">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8">
      
    <!-- Destination Spot -->
    <div class="relative mb-12">
    <!-- Teks di atas gambar pertama -->
    <h2 class="absolute top-2 left-2 text-4xl font-black text-[#a78d60] px-0 py-0">
        Destination <br>
        Spot
    </h2> <br> <br>


    <!-- Gambar bertangga -->
    <div class="grid grid-cols-3 gap-3">
      <img src="https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/74/2024/03/04/Pacitan-Camping-Paradise-4021668745.jpg"
        alt="Spot 1" class="aspect-[3/2] object-cover rounded-xl shadow-md mt-16" />
        <img src="https://hypeabis.id/assets/content/20230820024436000000IMG20230820024229.jpg"
        alt="Spot 2" class="aspect-[3/2] object-cover rounded-xl shadow-md mt-16" />
        <img src="https://atourin.obs.ap-southeast-3.myhuaweicloud.com/images/destination/pacitan/pantai-pidakan-profile1653619721.jpeg?x-image-process=image/resize,p_100,limit_1/imageslim"
        alt="Spot 3" class="aspect-[3/2] object-cover rounded-xl shadow-md mt-16" />
        <img src="https://cdn.timesmedia.co.id/images/2021/12/06/Wisata-Sungai-Maron-3.jpg"
        alt="Spot 1" class="aspect-[3/2] object-cover rounded-xl shadow-md mt-16" />
        <img src="https://pantainesia.com/wp-content/uploads/2021/01/Sumset-di-Pantai-Karang-Bolong-Pacitan.jpg"
        alt="Spot 2" class="aspect-[3/2] object-cover rounded-xl shadow-md mt-16" />
        <img src="http://anekatempatwisata.com/wp-content/uploads/2014/04/Pantai-Klayar.jpg"
        alt="Spot 3" class="aspect-[3/2] object-cover rounded-xl shadow-md mt-16" />
    </div>
    </div>

    <!-- What You Gets Section -->
    <div class="flex flex-col md:flex-row items-start mb-12 gap-6">
    <!-- Teks di luar latar biru -->
    <div class="md:w-1/3 w-full">
        <h3 class=" top-2 text-5xl font-extrabold text-[#7AC6EA] align-items: center">
        What You Gets?
        </h3>
    </div>

    <!-- Latar biru untuk ikon -->
    <div class="md:w-2/3 w-full bg-sky-100 rounded-xl shadow-md p-6 grid grid-cols-3 gap-4 text-center">
        <div>
        <img src="https://cdn-icons-png.flaticon.com/128/75/75689.png" alt="Transportasi" class="h-10 mx-auto mb-2">
        <p class="text-sm font-medium text-gray-700">Transportasi</p>
        </div>
        <div>
        <img src="https://cdn-icons-png.flaticon.com/128/2648/2648958.png" alt="Makan Siang" class="h-10 mx-auto mb-2">
        <p class="text-sm font-medium text-gray-700">Makan Siang</p>
        </div>
        <div>
        <img src="https://cdn-icons-png.flaticon.com/128/15410/15410960.png" alt="Tiket Masuk" class="h-10 mx-auto mb-2">
        <p class="text-sm font-medium text-gray-700">Tiket Masuk</p>
        </div>
    </div>
    </div>


      <!-- Tombol -->
      <div class="text-center">
        <a href="form pemesanan.php" class="bg-[#a78d60] hover:bg-[#8a6d3b] text-white font-semibold px-6 py-2 rounded-md text-lg transition">
          Pesan Sekarang
  </a>
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
