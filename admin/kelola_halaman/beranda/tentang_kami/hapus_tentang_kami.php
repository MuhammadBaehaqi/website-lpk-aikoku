<?php
include '../../../../includes/config.php';

$id = $_GET['id'];

// Hapus dari database
mysqli_query($mysqli, "DELETE FROM tb_beranda_tentang_kami WHERE id_tentang = '$id'");

header("Location: ../beranda_admin.php?status=hapus_tentang_sukses");
exit();
