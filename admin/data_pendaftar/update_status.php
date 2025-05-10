<?php
include '../../config.php'; // Pastikan ini sesuai lokasi file koneksi kamu

if (isset($_POST['id_pendaftaran']) && isset($_POST['status'])) {
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $status = $_POST['status'];
    $pengumuman = $_POST['pengumuman'];
    // Update ke database
    $query = "UPDATE tb_pendaftaran SET status='$status' , pengumuman='$pengumuman' WHERE id_pendaftaran='$id_pendaftaran'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        header("Location: data_pendaftaran.php?pesan=update_sukses");
    } else {
        echo "Gagal mengubah status: " . mysqli_error($mysqli);
    }
} else {
    echo "Data tidak lengkap.";
}
?>