<?php
// Konfigurasi Database
define('DB_HOST', 'localhost'); // Host database (misalnya: localhost)
define('DB_USER', 'root');      // Username database
define('DB_PASS', '');          // Password database
define('DB_NAME', 'tititss');   // Nama database

// Membuat koneksi ke database
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Periksa koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Jika berhasil terhubung
// echo "Koneksi berhasil!";
?>
