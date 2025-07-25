<?php
include '../../../includes/config.php';

if (isset($_GET['id_pendaftaran'])) {
    $id_pendaftaran = intval($_GET['id_pendaftaran']);

    // Query hapus data berdasarkan id_pendaftaran
    $query = "DELETE FROM tb_pendaftaran WHERE id_pendaftaran = $id_pendaftaran";

    if (mysqli_query($mysqli, $query)) {
        // Menampilkan alert dan redirect ke halaman data_pendaftaran.php
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href = '../data_pendaftaran.php';
              </script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($mysqli);
    }
} else {
    echo "ID Pendaftaran tidak ditemukan.";
}
?>