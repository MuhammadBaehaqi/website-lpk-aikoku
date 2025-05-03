<?php
include '../../../config.php';  // Sesuaikan path sesuai struktur file

if (isset($_GET['id'])) {
    $id_album = mysqli_real_escape_string($mysqli, $_GET['id']);

    // Ambil data album
    $query = "SELECT foto_album FROM tb_album WHERE id_album = $id_album";
    $result = mysqli_query($mysqli, $query);
    $album = mysqli_fetch_assoc($result);

    if ($album) {
        // Hapus file jika ada
        $imagePath = "../../../" . $album['foto_album']; // Path absolut dari root proyek
        if (file_exists($imagePath) && is_file($imagePath)) {
            unlink($imagePath);
        }

        // Hapus data dari DB
        $deleteQuery = "DELETE FROM tb_album WHERE id_album = $id_album";
        if (mysqli_query($mysqli, $deleteQuery)) {
            echo "<script>alert('Album berhasil dihapus!'); window.location.href = 'album_admin.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus album!'); window.location.href = 'album_admin.php';</script>";
        }
    } else {
        echo "<script>alert('Album tidak ditemukan!'); window.location.href = 'album_admin.php';</script>";
    }
} else {
    echo "<script>alert('ID album tidak ditemukan!'); window.location.href = 'album_admin.php';</script>";
}
?>