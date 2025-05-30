<?php
include '../../../config.php';

$id = $_GET['id'];

// Ambil nama file logo untuk dihapus dari folder uploads
$query = "SELECT logo FROM tb_profile_legalitas WHERE id_legalitas = $id";
$result = mysqli_query($mysqli, $query);
$data = mysqli_fetch_assoc($result);
$logoPath = '../../../uploads/' . $data['logo'];

// Hapus data dari database
$queryDelete = "DELETE FROM tb_profile_legalitas WHERE id_legalitas = $id";
if (mysqli_query($mysqli, $queryDelete)) {
    // Hapus file logo jika ada
    if (file_exists($logoPath)) {
        unlink($logoPath);
    }
    header("Location: profile_admin.php?status=hapus_sukses");
} else {
    echo "Gagal menghapus data: " . mysqli_error($mysqli);
}
?>