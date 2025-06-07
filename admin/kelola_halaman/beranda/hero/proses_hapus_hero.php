<?php
include '../../../../config.php';

$id = $_POST['id'];

// Ambil nama file gambar sebelum menghapus
$get = mysqli_query($mysqli, "SELECT gambar FROM tb_hero WHERE id_hero = $id");
$data = mysqli_fetch_assoc($get);
$gambar = $data['gambar'];

// Hapus file gambar di folder (jika ada)
$path = '../../../../uploads/' . $gambar;
if (file_exists($path)) {
    unlink($path);
}

// Hapus data dari database
mysqli_query($mysqli, "DELETE FROM tb_hero WHERE id_hero = $id");

header("Location: ../beranda_admin.php?status=hapus_sukses");
exit();
?>