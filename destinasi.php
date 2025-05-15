<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Oceano Journey</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" href="styless.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-white">

 
<header class="fixed top-0 left-0 w-full z-50 bg-white shadow-md rounded-br-2xl px-8 py-4">
  <div class="flex justify-between items-center max-w-screen-xl mx-auto">
    
    <div class="flex items-center space-x-2">
      <img src="gambar/logolagi.png" alt="Logo" class="w-8 h-8" />
      <span class="font-semibold text-sky-700 text-lg">Oceano Journey</span>
    </div>
    <!-- Navbar -->
    <nav class="space-x-8 text-sm font-semibold text-[#8a6d3b]">
      <a href="beranda.php" class="hover:text-yellow-600">Beranda</a>
      <a href="destinasi.php" class="hover:text-yellow-600">Destinasi</a>
      <a href="pakettour.php" class="hover:text-yellow-600">Paket Tour</a>
      <a href="tentang.php" class="hover:text-yellow-600">Tentang</a>
    </nav>
    <!-- Login Button -->
    <a href="gambar/login.php" class="bg-[#a78d60] text-white text-sm px-4 py-1 rounded-full hover:bg-[#8a6d3b] transition">
      Login
    </a>
  </div>
</header>
<style>
  .scroll-container::-webkit-scrollbar {
    display: none;
  }
</style>
</head>
<body class="font-sans text-gray-800 bg-white">
<br> <br>
<!-- Header -->
<section class="text-center px-4 pt-12 pb-16 max-w-3xl mx-auto">
  <h2 class="text-4xl font-extrabold text-yellow-900 mb-4">Destinasi di Pacitan</h2>
  <p class="text-gray-700">
    Jelajahi keindahan Pacitan dengan berbagai pilihan destinasi seru! Nikmati wisata alam seperti Pantai Klayar, Sungai Maron, dan Goa Gong yang menakjubkan. Temukan sisi historis di museum seperti Museum Song Terus dan Museum SBY Ani. Lengkapi perjalanan dengan kuliner khas Pacitan, mulai dari Sego Gobyos hingga Tahu Tuna. Semua keindahan Pacitan ada di sini, siap untuk dijelajahi!
  </p>
</section>

<!-- Wisata Alam -->
<section class="py-10">
  <h3 class="text-2xl font-bold text-center text-yellow-800 mb-6">Wisata Alam</h3>
  <div class="relative">
    <button onclick="scrollLeft('alamScroll')" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white shadow-md rounded-full w-10 h-10 z-10">←</button>
    <div id="alamScroll" class="flex overflow-x-auto scroll-container space-x-4 px-6 pb-4">
      <img src="https://ik.imagekit.io/tvlk/blog/2020/03/wisata-pacitan-7-Pantainesia.jpg" class="flex-shrink-0 rounded-lg shadow-md w-72 h-48 object-cover" alt="Pantai Klayar">
      <img src="https://atourin.obs.ap-southeast-3.myhuaweicloud.com/images/destination/pacitan/sungai-maron-profile1653617984.jpeg?x-image-process=image/resize,p_100,limit_1/imageslim" class="flex-shrink-0 rounded-lg shadow-md w-72 h-48 object-cover" alt="Sungai Maron">
      <img src="https://sidita.disbudpar.jatimprov.go.id/storage/foto-dtw/d35ca_1666861588.jpg" class="flex-shrink-0 rounded-lg shadow-md w-72 h-48 object-cover" alt="Goa Gong">
      <img src="https://i.pinimg.com/736x/53/05/7c/53057ccc304e314bdc76b7fe7b844a85.jpg" class="flex-shrink-0 rounded-lg shadow-md w-72 h-48 object-cover" alt="Sungai Maron">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP6RGPaPLULQa32l1w0epJtSIlfDVf5TWRqd860j0WYA&s&ec=72940545" class="flex-shrink-0 rounded-lg shadow-md w-72 h-48 object-cover" alt="Goa Gong">
    </div>
    <button onclick="scrollRight('alamScroll')" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-yellow shadow-md rounded-full w-10 h-10 z-10">→</button>
  </div>
</section>

<!-- Museum -->
<section class="py-10">
  <h3 class="text-2xl font-bold text-center text-yellow-800 mb-6">Museum</h3>
  <div class="flex justify-center gap-6 px-6 flex-wrap">
    <img src="https://hypeabis.id/assets/content/20230820024436000000IMG20230820024229.jpg" class="rounded-lg shadow-md w-72 h-48 object-cover" alt="Museum SBY Ani">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRnlpvGmENdWyu7aO017G48zMP6Z1FKntG5-OL5OEPXw&s&ec=72940545" class="rounded-lg shadow-md w-72 h-48 object-cover" alt="Museum Song Terus">
  </div>
</section>

<!-- Kulineran -->
<section class="py-10">
  <h3 class="text-2xl font-bold text-center text-yellow-800 mb-6">Kulineran</h3>
  <div class="flex justify-center gap-6 px-6 flex-wrap">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgwlFt9zbBl54hmMCTkI7wWK2LwYD1j8OBNZXfLxcJDg&s&ec=72940545" class="rounded-lg shadow-md w-64 h-48 object-cover" alt="Sego Gobyos">
    <img src="https://cdn.idntimes.com/content-images/community/2022/10/28435544-1617747121666286-3032906008067309568-n-6b75102fdd1f4d7b075c889774100d28-458270e93687c2284cfa6ed51b656c0e_600x400.jpg" class="rounded-lg shadow-md w-64 h-48 object-cover" alt="Tahu Tuna">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEHZgL_cRrlGMphcjKKzEPAjqHKZlul9Kh6IqVxHD22g&s&ec=72940545" class="rounded-lg shadow-md w-64 h-48 object-cover" alt="Jajanan Pasar">
    <img src="https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/882/2023/09/07/tahu-tuna-pacitan-3512489310.jpeg" class="rounded-lg shadow-md w-64 h-48 object-cover" alt="Jajanan Pasar">
  </div>
</section>



   <!-- Footer -->
   <footer class="bg-white py-10 px-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-gray-600">
      <div>
        <h5 class="font-semibold mb-2">OCEAN JOURNEY</h5>
        <ul>
          <li><a href="tentang.php">About</a></li>
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
        <img src="gambar/logo2.png" alt="Logo" class="mx-auto h-40">
      </div>
    </div>
  </footer>
<!-- JavaScript -->
<script>
  function scrollLeft(id) {
    document.getElementById(id).scrollBy({ left: -300, behavior: 'smooth' });
  }
  function scrollRight(id) {
    document.getElementById(id).scrollBy({ left: 300, behavior: 'smooth' });
  }
</script>