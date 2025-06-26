<?php
include '../../includes/config.php';
if (isset($_GET['id_kontak'])) { // Mengubah 'id' menjadi 'id_kontak'
    $id_kontak = $_GET['id_kontak'];

    // Query untuk menghapus pesan berdasarkan id_kontak
    $query = "DELETE FROM tb_kontak WHERE id_kontak = $id_kontak";  // Mengubah 'id' menjadi 'id_kontak'

    if (mysqli_query($mysqli, $query)) {
        echo "<script>alert('Pesan berhasil dihapus!'); window.location.href = 'data_kontak.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus pesan.'); window.location.href = 'data_kontak.php';</script>";
    }
}
?>