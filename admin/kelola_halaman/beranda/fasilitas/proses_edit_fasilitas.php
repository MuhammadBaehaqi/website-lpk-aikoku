<?php
include '../../../../includes/config.php';

$id = $_POST['id'];
$ikon = $_POST['ikon'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

// Query untuk memperbarui fasilitas
$query = "UPDATE tb_beranda_fasilitas SET ikon='$ikon', judul='$judul', deskripsi='$deskripsi' WHERE id_fasilitas='$id'";

mysqli_query($mysqli, $query);
header("Location: ../beranda_admin.php");
?>