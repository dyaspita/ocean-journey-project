<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "ocean-journey";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
