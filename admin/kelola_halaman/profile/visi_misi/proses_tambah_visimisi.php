<?php
include '../../../../config.php';

$visi = $_POST['visi'];
$misi = $_POST['misi'];

$query = "INSERT INTO tb_profile_visimisi (visi, misi) VALUES ('$visi', '$misi')";
mysqli_query($mysqli, $query);

header("Location: ../profile_admin.php");
exit;
