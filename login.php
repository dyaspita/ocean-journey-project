<?php
include "koneksi.php";
session_start();

// Jika sudah login, langsung arahkan ke dashboard
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'admin') {
      header("Location: berandaadmin.php");
  } elseif ($_SESSION['role'] == 'manajer') {
      header("Location: berandamanajer.php");
  }
  exit;
}


// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Amankan input dari karakter berbahaya
    $input_username = $conn->real_escape_string($input_username);
    $input_password = $conn->real_escape_string($input_password);

    // Cek di tabel admin
    $sql_admin = "SELECT * FROM admin WHERE username_admin = '$input_username' AND password_admin = '$input_password'";
    $result_admin = $conn->query($sql_admin);

    // Cek di tabel manajer (pakai nama kolom di database Anda)
    $sql_manajer = "SELECT * FROM manajer WHERE username_manajer = '$input_username' AND password_manajer = '$input_password'";
    $result_manajer = $conn->query($sql_manajer);

    if ($result_admin->num_rows > 0) {
        $user = $result_admin->fetch_assoc();
        $_SESSION['username'] = $user['username_admin'];
        $_SESSION['role'] = 'admin';
        header("Location: berandaadmin.php");
        exit;
    } elseif ($result_manajer->num_rows > 0) {
        $user = $result_manajer->fetch_assoc();
        $_SESSION['username'] = $user['username_manajer'];
        $_SESSION['role'] = 'manajer';
        header("Location: berandamanajer.php");
        exit;
    } else {
        $error_message = "Username atau Password salah!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Oceano Journey - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-white min-h-screen flex flex-col">

  <!-- Header -->
  <header class="flex justify-between items-center px-8 py-4 bg-white shadow-md rounded-br-2xl">
    <div class="flex items-center space-x-2">
      <img src="gambar/logolagi.png" alt="Logo" class="w-8 h-8" />
      <span class="font-semibold text-sky-700">Oceano Journey</span>
    </div>
  </header>

  <!-- Login Section -->
  <section class="flex justify-center items-start flex-grow pt-24">
    <form method="POST" class="w-full max-w-sm bg-gradient-to-b from-white to-sky-200 rounded-2xl shadow-md p-8 text-center">
      <img src="gambar/logo2.png" alt="Logo" class="mx-auto w-16 mb-4">
      <h2 class="text-[#8a6d3b] font-semibold text-xl mb-6">Log In</h2>
      <?php if (isset($error_message)): ?>
        <div class="text-red-500 text-sm mb-4"><?php echo $error_message; ?></div>
      <?php endif; ?>
      <!-- Username Input -->
      <div class="flex items-center bg-gray-200 rounded-full px-4 py-2 mb-4">
        <input type="text" name="username" placeholder="Username" class="bg-transparent w-full focus:outline-none text-sm text-gray-700" required>
      </div>

      <!-- Password Input -->
      <div class="flex items-center bg-gray-200 rounded-full px-4 py-2 mb-2">
        <input type="password" name="password" placeholder="Password" class="bg-transparent w-full focus:outline-none text-sm text-gray-700" required>
      </div>
      <!-- Login Button -->
      <button type="submit" class="bg-[#a78d60] text-white w-full py-2 rounded-full hover:bg-[#8a6d3b] transition">
        Log In
      </button>
    </form>
  </section>
</body>
</html>
