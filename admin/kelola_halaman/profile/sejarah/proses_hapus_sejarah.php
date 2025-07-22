<?php
include '../../../../includes/config.php';

$id = $_POST['id'];
$gambar = $_POST['gambar'];

if (file_exists("../../../../uploads/" . $gambar)) {
    unlink("../../../../uploads/" . $gambar);
}

mysqli_query($mysqli, "DELETE FROM tb_profile_sejarah WHERE id='$id'");
header("Location: ../profile_admin.php?status=sejarah_deleted");
