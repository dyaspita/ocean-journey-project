<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Paket Tour | Oceano Journey</title>
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
        <a href="pakettour.php" class="hover:text-yellow-600">Paket Tour</a>
        <a href="tentang.php" class="hover:text-yellow-600">Tentang</a>
      </nav>
      <a href="login.html" class="bg-[#a78d60] text-white text-sm px-4 py-1 rounded-full hover:bg-[#8a6d3b] transition">
        Login
      </a>
    </div>
  </header>
  <div class="pt-24"></div>

  <!-- Banner -->
  <section class="relative">
  <img src="https://i.pinimg.com/736x/4e/65/95/4e6595be9b579bec7b82bf4237f151cc.jpg" alt="Pantai" class="w-full h-[350px] object-cover" />
  <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center">
    <h1 class="text-white text-4xl font-extrabold tracking-wide drop-shadow-lg">Paket Tour</h1>
  </div>
</section>


  <!-- Paket Tour -->
  <section class="bg-sky-100 py-16 px-4 md:px-10">
    <div class="max-w-6xl mx-auto space-y-12">

      <!-- Paket 1 Hari -->
      <div>
      <h2 class="text-3xl font-bold text-center text-[#a78d60] mb-6 underline underline-offset-4">Paket 1 Hari</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <!-- Eksplor -->
          <div class="bg-white rounded-xl shadow-md p-4 text-center">
            <img src="https://propertek.id/wp-content/uploads/2023/08/FSyWrV8aIAAKCDy.jpeg" class="rounded-xl h-100 w-full object-cover mb-4" />
            <span class="text-base text-white bg-[#a78d60] px-3 py-1 rounded-full font-semibold">Rp. 150.000</span>
            <h3 class="mt-2 text-xl font-bold text-[#a78d60]">Paket Eksplor 1</h3>
            <p class="text-sm mt-1 text-gray-600">Menjelajahi keindahan laut Pacitan di Pantai Watukarung, menyusuri Sungai Maron, dan mengenal sejarah di Museum SBY dalam sehari penuh pengalaman seru!</p>
            <a href="paketeksplor1.php" class="mt-4 inline-block w-full bg-[#a78d60] hover:bg-[#8a6d3b] text-white py-2 rounded-md font-semibold transition">
  Selengkapnya
</a>

        </div>

          <!-- Petualang -->
          <div class="bg-white rounded-xl shadow-md p-4 text-center">
            <img src="https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/222/2024/06/27/d70467a2-60ea-4161-996a-3faf5c16c80e-957287385.jpg" class="rounded-xl h-100 w-full object-cover mb-4" />
            <span class="text-base text-white bg-[#a78d60] px-3 py-1 rounded-full font-semibold">Rp. 150.000</span>
            <h3 class="mt-2 text-xl font-bold text-[#a78d60]">Paket Petualang 1</h3>
            <p class="text-sm mt-1 text-gray-600">Menjelajahi keindahan laut Pacitan di Pantai Watukarung, menyusuri Sungai Maron, dan mengenal sejarah di Museum SBY dalam sehari penuh pengalaman seru</p>
            <a href="paketpetualang1.php" class="mt-4 inline-block w-full bg-[#a78d60] hover:bg-[#8a6d3b] text-white py-2 rounded-md font-semibold transition">
  Selengkapnya
</a>

        </div>
        </div>
      </div>

      <!-- Paket 2 Hari -->
      <div>
      <h2 class="text-3xl font-bold text-center text-[#a78d60] mb-6 underline underline-offset-4">Paket 2 Hari</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <!-- Eksplor -->
          <div class="bg-white rounded-xl shadow-md p-4 text-center">
            <img src="gambar/sungaimaron.jpg" class="rounded-xl h-100 w-full object-cover mb-4" />
            <span class="text-base text-white bg-[#a78d60] px-3 py-1 rounded-full font-semibold">Rp. 350.000</span>
            <h3 class="mt-2 text-xl font-bold text-[#a78d60]">Paket Eksplor 2</h3>
            <p class="text-sm mt-1 text-gray-600">Paket wisata lengkap untuk menikmati panorama surga tersembunyi Pacitan dari pantai, goa, sungai, hingga wisata kuliner khas daerah.</p>
            <br>
           <a href="paketeksplor2.php" class="mt-4 inline-block w-full bg-[#a78d60] hover:bg-[#8a6d3b] text-white py-2 rounded-md font-semibold transition">
  Selengkapnya
</a>

        </div>

          <!-- Petualang -->
          <div class="bg-white rounded-xl shadow-md p-4 text-center">
            <img src="gambar/pantaiklayar.jpg" class="rounded-xl h-100 w-full object-cover mb-4" />
            <span class="text-base text-white bg-[#a78d60] px-3 py-1 rounded-full font-semibold">Rp. 350.000</span>
            <h3 class="mt-2 text-xl font-bold text-[#a78d60]">Paket Petualang 2</h3>
            <p class="text-sm mt-1 text-gray-600">Jelajahi Pacitan lebih dalam dengan kombinasi wisata pantai, sejarah, dan kuliner khas dalam perjalanan yang lebih luas dan santai.</p>
            <br>
            <a href="paketpetualang2.php" class="mt-4 inline-block w-full bg-[#a78d60] hover:bg-[#8a6d3b] text-white py-2 rounded-md font-semibold transition">
  Selengkapnya
</a>

        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white py-10 px-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-gray-600">
      <div>
        <h5 class="font-semibold mb-2">OCEAN JOURNEY</h5>
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
        <img src="logo2.png" alt="Logo" class="mx-auto h-32">
      </div>
    </div>
  </footer>

</body>
</html>
