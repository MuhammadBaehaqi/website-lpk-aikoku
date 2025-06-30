<?php
include '../../../../includes/config.php'; // pastikan path ini sesuai struktur folder

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil nama file gambar dulu
    $cek = mysqli_query($mysqli, "SELECT hero_image FROM tb_job WHERE id_job = '$id'");
    $data = mysqli_fetch_assoc($cek);
    $gambar = $data['hero_image'];

    // Hapus gambar dari folder
    $filePath = "../../../../uploads/" . $gambar;
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    // Hapus dari database
    $delete = mysqli_query($mysqli, "DELETE FROM tb_job WHERE id_job = '$id'");

    if ($delete) {
        header("Location: ../job_admin.php?pesan=hapus_berhasil");
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>