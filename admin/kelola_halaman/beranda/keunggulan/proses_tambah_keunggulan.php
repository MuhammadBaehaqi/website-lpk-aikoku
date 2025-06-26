<?php
include '../../../../includes/config.php';

$ikon = $_POST['ikon'];
$judul = $_POST['judul'];
$deskripsi = $_POST['keunggulan'];

$query = "INSERT INTO tb_beranda_keunggulan (ikon, judul, deskripsi) VALUES ('$ikon', '$judul', '$deskripsi')";
if (mysqli_query($mysqli, $query)) {
    header("Location: ../beranda_admin.php");
} else {
    echo "Gagal menyimpan data: " . mysqli_error($mysqli);
}
?>