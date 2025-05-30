<?php
include '../../../config.php';
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $check = mysqli_query($mysqli, "SELECT * FROM tb_pengumuman_tayang WHERE id_pendaftaran = $id");
    if (mysqli_num_rows($check) == 0) {
        mysqli_query($mysqli, "INSERT INTO tb_pengumuman_tayang (id_pendaftaran) VALUES ($id)");
    }
}
header("Location: pengumuman_admin.php");
exit();
