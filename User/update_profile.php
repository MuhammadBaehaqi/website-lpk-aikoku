<?php
session_start();
include '../config.php';

if (!isset($_SESSION['id_pengguna'])) {
    header("Location: ../login.php");
    exit();
}

$id_pengguna = $_SESSION['id_pengguna'];

// Ambil email sekarang berdasarkan id_pengguna
$query_user = mysqli_query($mysqli, "SELECT email_pengguna FROM tb_pengguna WHERE id_pengguna = '$id_pengguna'");
$user_data = mysqli_fetch_assoc($query_user);
$email_lama = $user_data['email_pengguna'];

// Ambil data dari POST
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$email_baru = $_POST['email'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$alamat_keluarga = $_POST['alamat_keluarga'];
$telepon_keluarga = $_POST['telepon_keluarga'];

// Update di tb_pendaftaran berdasarkan email lama
$query_pendaftaran = "UPDATE tb_pendaftaran SET 
    tempat_lahir = '$tempat_lahir',
    tanggal_lahir = '$tanggal_lahir',
    jenis_kelamin = '$jenis_kelamin',
    agama = '$agama',
    email = '$email_baru',
    telepon = '$telepon',
    alamat = '$alamat',
    alamat_keluarga = '$alamat_keluarga',
    telepon_keluarga = '$telepon_keluarga'
    WHERE email = '$email_lama' LIMIT 1";

// Jalankan update
if (mysqli_query($mysqli, $query_pendaftaran)) {
    // Update email di tb_pengguna
    $query_pengguna = "UPDATE tb_pengguna SET email_pengguna = '$email_baru' WHERE id_pengguna = '$id_pengguna' LIMIT 1";
    mysqli_query($mysqli, $query_pengguna);

    header("Location: edit_profile_user.php?update=success");
} else {
    echo "Gagal memperbarui data: " . mysqli_error($mysqli);
}
