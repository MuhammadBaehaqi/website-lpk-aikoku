<?php
include '../../../../includes/config.php';

if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];

    // Ambil nama file foto dari DB
    $result = mysqli_query($mysqli, "SELECT foto FROM tb_profile_pengurus WHERE id_pengurus = $id");
    $data = mysqli_fetch_assoc($result);
    $foto = $data['foto'];

    // Hapus dari DB
    $delete = mysqli_query($mysqli, "DELETE FROM tb_profile_pengurus WHERE id_pengurus = $id");

    if ($delete) {
        $path = "../../../../uploads/$foto";
        if (file_exists($path) && is_file($path)) {
            unlink($path);
        }
        header("Location: ../profile_admin.php?status=hapus_pengurus");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($mysqli);
        exit;
    }
} else {
    echo "ID tidak ditemukan!";
    exit;
}
