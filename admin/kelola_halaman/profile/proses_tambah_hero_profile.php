<?php
include '../../../config.php';

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

// Upload Gambar
$gambar = $_FILES['gambar']['name'];
$lokasi = $_FILES['gambar']['tmp_name'];
$folder = "../../../uploads/" . $gambar;
move_uploaded_file($lokasi, $folder);

// Hapus hero lama (jika hanya 1 yang aktif)
mysqli_query($mysqli, "DELETE FROM tb_hero_profile");

// Simpan data baru
mysqli_query($mysqli, "INSERT INTO tb_hero_profile (judul, deskripsi, gambar) VALUES ('$judul', '$deskripsi', '$gambar')");

header("Location: profile_admin.php");
?>