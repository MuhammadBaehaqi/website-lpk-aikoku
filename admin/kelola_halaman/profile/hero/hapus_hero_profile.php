<?php
include '../../../../includes/config.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT gambar FROM tb_hero_profile WHERE id_hero='$id'"));
$gambar = $data['gambar'];

if (file_exists("../../../../uploads/" . $gambar)) {
    unlink("../../../../uploads/" . $gambar);
}

mysqli_query($mysqli, "DELETE FROM tb_hero_profile WHERE id_hero='$id'");
header("Location: ../profile_admin.php?status=hero_deleted");
