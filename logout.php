<?php
session_start(); // Memulai sesi

// Menghapus semua session variables
session_unset();

// Menghancurkan sesi
session_destroy();

// Arahkan pengguna kembali ke halaman login atau halaman utama
header("Location: login.php"); // Ganti dengan halaman yang sesuai, misalnya halaman login
exit;
?>