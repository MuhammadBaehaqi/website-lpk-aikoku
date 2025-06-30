<?php
include '../../../../includes/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil gambar dulu
    $query = mysqli_query($mysqli, "SELECT gambar FROM tb_job_detail WHERE id_job_detail = '$id'");
    $row = mysqli_fetch_assoc($query);
    $file = "../../../../uploads/" . $row['gambar'];

    if (is_file($file))
        unlink($file); // Hapus file

    // Hapus dari DB
    mysqli_query($mysqli, "DELETE FROM tb_job_detail WHERE id_job_detail = '$id'");

    header("Location: ../job_admin.php?pesan=hapus");
    exit;
}
?>