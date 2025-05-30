<?php
include '../../../config.php';
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    mysqli_query($mysqli, "DELETE FROM tb_pengumuman_tayang WHERE id_pendaftaran = $id");
}
header("Location: pengumuman_admin.php");
exit();
