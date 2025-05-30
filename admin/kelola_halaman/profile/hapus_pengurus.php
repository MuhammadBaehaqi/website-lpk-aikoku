<?php
include '../../../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil nama file foto dari database
    $result = mysqli_query($mysqli, "SELECT foto FROM tb_profile_pengurus WHERE id_pengurus = $id");
    $data = mysqli_fetch_assoc($result);
    $foto = $data['foto'];

    // Hapus data dari database
    $delete = mysqli_query($mysqli, "DELETE FROM tb_profile_pengurus WHERE id_pengurus = $id");

    if ($delete) {
        // Hapus file foto dari folder uploads jika ada
        $file_path = "../../../uploads/$foto";
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        header("Location: profile_admin.php?hapus=berhasil");
    } else {
        echo "Gagal menghapus data: " . mysqli_error($mysqli);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>