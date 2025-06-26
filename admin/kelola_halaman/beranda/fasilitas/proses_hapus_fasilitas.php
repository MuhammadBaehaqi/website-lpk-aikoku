<?php
include '../../../../includes/config.php';

$id = $_POST['id'];

// Query untuk menghapus fasilitas
$query = "DELETE FROM tb_beranda_fasilitas WHERE id_fasilitas='$id'";

mysqli_query($mysqli, $query);
header("Location: ../beranda_admin.php");
?>