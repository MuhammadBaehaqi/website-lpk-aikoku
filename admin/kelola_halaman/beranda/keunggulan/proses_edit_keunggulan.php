<?php
include '../../../../config.php';
$id = $_POST['id'];
$ikon = $_POST['ikon'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

$query = "UPDATE tb_beranda_keunggulan SET ikon='$ikon', judul='$judul', deskripsi='$deskripsi' WHERE id_keunggulan='$id'";
mysqli_query($mysqli, $query);
header("Location: ../beranda_admin.php"); 
?>