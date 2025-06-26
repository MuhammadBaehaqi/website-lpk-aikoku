<?php
include '../../../../includes/config.php';

if (!isset($_GET['id'])) {
    header("Location: ../profile_admin.php");
    exit;
}

$id = (int) $_GET['id'];

// Ambil nama file logo
$sql = "SELECT logo FROM tb_profile_legalitas WHERE id_legalitas = $id";
$data = mysqli_fetch_assoc(mysqli_query($mysqli, $sql));
$path = '../../../../uploads/' . $data['logo'];

// Hapus data
if (mysqli_query($mysqli, "DELETE FROM tb_profile_legalitas WHERE id_legalitas = $id")) {
    if (file_exists($path))
        unlink($path);
    header("Location: ../profile_admin.php?status=hapus_sukses");
    exit;
}

echo "Gagal menghapus data: " . mysqli_error($mysqli);
exit;
