<?php
session_start();
include '../includes/config.php';

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
$nama_lengkap = $_POST['nama_lengkap'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$email_baru = $_POST['email'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$alamat_keluarga = $_POST['alamat_keluarga'];
$telepon_keluarga = $_POST['telepon_keluarga'];
$foto_update = "";
if (isset($_FILES['foto_diri']) && $_FILES['foto_diri']['error'] === 0) {
    $foto_name = $_FILES['foto_diri']['name'];
    $foto_tmp = $_FILES['foto_diri']['tmp_name'];
    $foto_ext = pathinfo($foto_name, PATHINFO_EXTENSION);
    $foto_new_name = 'foto_' . time() . '.' . $foto_ext;

    if (move_uploaded_file($foto_tmp, '../uploads/' . $foto_new_name)) {
        // tambahkan bagian ini ke SET foto_diri
        $foto_update = ", foto_diri = '$foto_new_name'";
    }
}

// Update di tb_pendaftaran berdasarkan email lama
$query_pendaftaran = "UPDATE tb_pendaftaran SET 
    nama_lengkap = '$nama_lengkap',
    tempat_lahir = '$tempat_lahir',
    tanggal_lahir = '$tanggal_lahir',
    jenis_kelamin = '$jenis_kelamin',
    agama = '$agama',
    email = '$email_baru',
    telepon = '$telepon',
    alamat = '$alamat',
    alamat_keluarga = '$alamat_keluarga',
    telepon_keluarga = '$telepon_keluarga'
    $foto_update
    WHERE email = '$email_lama' LIMIT 1";

// Jalankan update
if (mysqli_query($mysqli, $query_pendaftaran)) {
    // Update email di tb_pengguna
    $query_pengguna = "UPDATE tb_pengguna 
        SET username = '$nama_lengkap', email_pengguna = '$email_baru' 
        WHERE id_pengguna = '$id_pengguna' LIMIT 1";
    mysqli_query($mysqli, $query_pengguna);
    // Update session jika nama berubah
    $_SESSION['username'] = $nama_lengkap;

    header("Location: edit_profile_user.php?update=success");
} else {
    echo "Gagal memperbarui data: " . mysqli_error($mysqli);
}
