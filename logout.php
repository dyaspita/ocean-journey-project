<?php
session_start();        // Mulai sesi
session_unset();        // Hapus semua variabel sesi
session_destroy();      // Hancurkan sesi

header("Location: login.php"); // Arahkan ke halaman login
exit;
