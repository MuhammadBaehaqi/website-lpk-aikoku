<?php
include '../../../../includes/config.php';

if (isset($_POST['id']) && isset($_POST['foto_album'])) {
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $foto_album = $_POST['foto_album'];

    $path = "../../../../" . $foto_album;

    // Hapus file gambar jika ada
    if (file_exists($path) && is_file($path)) {
        unlink($path);
    }

    // Hapus dari database
    $delete = mysqli_query($mysqli, "DELETE FROM tb_album WHERE id_album = '$id'");

    header("Location: ../album_admin.php#album");
    exit;
} else {
    echo "<script>alert('Data tidak lengkap!'); window.location.href = '../album_admin.php';</script>";
}
