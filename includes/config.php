<?php

// Konfigurasi koneksi ke database
$databaseHost = 'localhost'; // Server database 
$databaseUsername = 'root'; // Username MySQL
$databasePassword = ''; 
$databaseName = 'lpk_aikoku'; // Nama database

// Membuat koneksi
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Cek koneksi
if (!$mysqli) {
    die('Koneksi gagal: ' . mysqli_connect_error());
} else {
    // echo 'Koneksi berhasil'; // Bisa diaktifkan untuk debugging
}

?>