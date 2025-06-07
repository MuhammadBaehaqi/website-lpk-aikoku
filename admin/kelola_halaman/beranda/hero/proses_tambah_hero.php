<?php
include '../../../../config.php';

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_FILES['gambar']['name'];
$link = $_POST['link_tombol'];
$teks = $_POST['teks_tombol'];
$gambar_tmp = $_FILES['gambar']['tmp_name'];

$upload_path = "../../../../uploads/" . $gambar;
move_uploaded_file($gambar_tmp, $upload_path);

mysqli_query($mysqli, "INSERT INTO tb_hero (judul, deskripsi, gambar, link_tombol, teks_tombol) VALUES ('$judul', '$deskripsi', '$gambar', '$link', '$teks')");
header("Location: ../beranda_admin.php?status=tambah_sukses");
?>