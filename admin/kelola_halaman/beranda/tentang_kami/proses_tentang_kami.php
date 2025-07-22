<?php
include '../../../../includes/config.php';

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

$namaFile = $_FILES['gambar']['name'];
$lokasiTmp = $_FILES['gambar']['tmp_name'];

if (!empty($namaFile)) {
    move_uploaded_file($lokasiTmp, "../../../../uploads/" . $namaFile);
    $query = "INSERT INTO tb_beranda_tentang_kami (judul, deskripsi, gambar) VALUES ('$judul', '$deskripsi', '$namaFile')";
} else {
    $query = "INSERT INTO tb_beranda_tentang_kami (judul, deskripsi) VALUES ('$judul', '$deskripsi')";
}

mysqli_query($mysqli, $query);
header("Location: ../beranda_admin.php?status=tambah_tentang_sukses");
exit();
