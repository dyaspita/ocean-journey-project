<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Oceano Journey</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>
<body class="bg-white">

  <!-- Navbar -->
  <header class="fixed top-0 left-0 w-full z-50 bg-white shadow-md rounded-br-2xl px-8 py-4 transition duration-300 ease-in-out">
    <div class="flex justify-between items-center max-w-screen-xl mx-auto">
      <div class="flex items-center space-x-2">
        <img src="gambar/logolagi.png" alt="Logo" class="w-8 h-8 hover:scale-110 transition-transform duration-300" />
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
  <div class="pt-24" id="beranda"></div>

  <!-- Hero -->
  <section class="relative bg-cover bg-center text-white" style="background-image: url('https://1.bp.blogspot.com/-u3hUrBCx4MI/WCaKeSFk0II/AAAAAAAAFS0/09QPtOkqIfkMa_X3MGItxvVzb7S_U-OngCLcB/s1600/Pacitan_Klayar_047.jpg');">
    <div class="bg-black/20 p-10 md:p-16" data-aos="fade-up">
      <h1 class="text-4xl font-bold mb-2">Hello, <span class="text-yellow-300">Traveler!</span></h1>
      <h2 class="text-2xl mb-4">Ready to discover <span class="text-yellow-400">Pacitan?</span></h2>
      <p class="max-w-md mb-6">Join us on a journey to magnificent landscapes, thrilling waves, and cultural wonders.</p>
      <a href="#destinasi" class="bg-white text-gray-800 px-6 py-2 rounded-full font-semibold hover:bg-gray-100 hover:scale-105 transition transform duration-300 shadow">
        Selengkapnya
      </a>
    </div>
   
  </section>

  <!-- Peta -->
  <section class="bg-blue-100 py-10 px-6" id="destinasi">
    <div class="container mx-auto flex flex-col md:flex-row gap-6 justify-center">
      <div class="w-full md:w-1/2 bg-white rounded-lg shadow p-4" data-aos="fade-right">
        <iframe src="https://www.google.com/maps/embed?..." class="w-full h-64 rounded-lg border" loading="lazy"></iframe>
      </div>
      <div class="w-full md:w-1/2 bg-white rounded-lg shadow p-6 flex flex-col justify-center" data-aos="fade-left">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-4">
          <span class="text-sky-800">Ayo Jelajah</span> <span class="text-yellow-900">Pacitan!</span>
        </h2>
        <p class="text-gray-700 text-justify leading-relaxed">
          Pacitan adalah permata tersembunyi di ujung barat daya Jawa Timur, dijuluki sebagai "Kota 1001 Goa". Dengan bentang alam yang menakjubkan mulai dari pantai berpasir putih hingga goa-goa eksotis seperti Goa Gong, kota ini menyajikan keindahan yang masih alami. Tak hanya alam, Pacitan juga kaya akan budaya dan keramahan penduduknya, menjadikannya destinasi sempurna untuk petualangan dan relaksasi.
        </p>
      </div>
      
    </div>
  </section>

  <!-- Ajak Liburan -->
  <section class="text-center py-12 px-6" data-aos="fade-up">
    <p class="text-gray-600 mb-2">Mau liburan seru ke Pacitan tanpa ribet?</p>
    <p class="text-gray-600 mb-6">
      <a href="#" class="text-sky-500 font-semibold">Oceano Journey</a> siap menemani perjalananmu dengan berbagai paket trip terbaik yang bikin liburanmu makin asik!
    </p>
    <h2 class="text-3xl md:text-4xl font-bold">
      <span class="text-sky-400">Let's Travel</span> <span class="text-yellow-900">With Us!</span>
    </h2>
  </section>

  <!-- Kelebihan -->
  <section class="bg-sky-100 py-12 px-8" id="paket">
    <img src="gambar/support.png" alt="label" class="mx-auto h-20 mb-4" data-aos="zoom-in">
    <h3 class="text-xl font-bold text-center mb-8">Kelebihan Layanan Kami</h3>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
      <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transform hover:scale-105 transition duration-300" data-aos="fade-up">
        <img src="gambar/labellabel.jpg" alt="Harga Terjangkau" class="mx-auto mb-4 w-20 h-20">
        <h4 class="font-semibold mb-2">Harga Terjangkau</h4>
        <p class="text-sm text-gray-600">"Liburan nggak harus mahal!" - Alya</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transform hover:scale-105 transition duration-300" data-aos="fade-up" data-aos-delay="100">
        <img src="gambar/Convenient.png" alt="Transportasi" class="mx-auto mb-4 w-20 h-20">
        <h4 class="font-semibold mb-2">Transportasi Nyaman</h4>
        <p class="text-sm text-gray-600">"Mobilnya bersih, duduknya enak!" - Pita</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transform hover:scale-105 transition duration-300" data-aos="fade-up" data-aos-delay="200">
        <img src="gambar/Easy to use.png" alt="Pemesanan" class="mx-auto mb-4 w-20 h-20">
        <h4 class="font-semibold mb-2">Pemesanan Mudah</h4>
        <p class="text-sm text-gray-600">"Pesennya gampang banget!" - Candra</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transform hover:scale-105 transition duration-300" data-aos="fade-up" data-aos-delay="300">
        <img src="gambar/Task.png" alt="Destinasi" class="mx-auto mb-4 w-20 h-20">
        <h4 class="font-semibold mb-2">Destinasi Lengkap</h4>
        <p class="text-sm text-gray-600">"Banyak banget pilihan tempat!" - Dita</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white py-10 px-8" id="tentang">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-gray-600">
      <div>
        <h5 class="font-semibold mb-2">OCEAN JOURNEY</h5>
        <ul><li><a href="#">About</a></li><li><a href="#">Testimony</a></li></ul>
      </div>
      <div>
        <h5 class="font-semibold mb-2">HELP CENTER</h5>
        <ul><li><a href="#">FAQ</a></li><li><a href="#">Terms & Condition</a></li><li><a href="#">Privacy Policy</a></li></ul>
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

  <!-- AOS & Script -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
    // Navbar scroll effect
    window.addEventListener('scroll', function () {
      const header = document.querySelector('header');
      if (window.scrollY > 20) {
        header.classList.add('bg-sky-50', 'shadow-lg');
      } else {
        header.classList.remove('bg-sky-50', 'shadow-lg');
      }
    });
  </script>
</body>
</html>
