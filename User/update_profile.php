<?php
session_start();
include '../config.php';

if (!isset($_SESSION['nama'])) {
    header("Location: ../login.php");
    exit();
}

$nama_lengkap = $_SESSION['nama'];

// Ambil data dari POST
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$alamat_keluarga = $_POST['alamat_keluarga'];
$telepon_keluarga = $_POST['telepon_keluarga'];
// Update di tb_pendaftaran
$query_pendaftaran = "UPDATE tb_pendaftaran SET 
    tempat_lahir = '$tempat_lahir',
    tanggal_lahir = '$tanggal_lahir',
    jenis_kelamin = '$jenis_kelamin',
    agama = '$agama',
    email = '$email',  
    telepon = '$telepon',
    alamat = '$alamat',
    alamat_keluarga = '$alamat_keluarga',
    telepon_keluarga = '$telepon_keluarga'
    WHERE nama_lengkap = '$nama_lengkap' LIMIT 1";

if (mysqli_query($mysqli, $query_pendaftaran)) {
    // Update di tb_pengguna untuk sinkronisasi email
    $query_pengguna = "UPDATE tb_pengguna SET email_pengguna = '$email' WHERE username = '$nama_lengkap' LIMIT 1";
    mysqli_query($mysqli, $query_pengguna);  // Update email di tb_pengguna

    header("Location: edit_profile_user.php?update=success");
} else {
    echo "Gagal memperbarui data: " . mysqli_error($mysqli);
}
