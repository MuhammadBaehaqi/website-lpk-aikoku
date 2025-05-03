<?php
session_start();

// Cek apakah session username dan roles ada
if (!isset($_SESSION['username'])) {
    // Jika tidak ada session username, redirect ke halaman login
    header("Location: login.php");
    exit();
}

// Jika peran bukan admin, arahkan ke halaman user atau halaman lainnya
if ($_SESSION['roles'] != 'admin' && $_SESSION['roles'] != 'user') {
    header("Location: login.php"); // Atau halaman yang sesuai
    exit();
}
?>