<?php
include '../../../../includes/config.php';
$id = $_POST['id'];
$query = "DELETE FROM tb_beranda_keunggulan WHERE id_keunggulan='$id'";
mysqli_query($mysqli, $query);
header("Location: ../beranda_admin.php#keunggulan");
exit;
?>