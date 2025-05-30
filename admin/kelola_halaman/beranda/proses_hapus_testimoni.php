<?php
include('../../../config.php');

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);

    // Opsional: ambil nama file gambar untuk dihapus dari folder
    $getGambar = mysqli_query($mysqli, "SELECT gambar FROM tb_beranda_testimoni WHERE id_testimoni='$id'");
    if ($row = mysqli_fetch_assoc($getGambar)) {
        $filePath = '../../../uploads/' . $row['gambar'];
        if (file_exists($filePath)) {
            unlink($filePath); // Hapus file dari folder
        }
    }

    // Hapus dari database
    $query = "DELETE FROM tb_beranda_testimoni WHERE id_testimoni='$id'";
    if (mysqli_query($mysqli, $query)) {
        header('Location: beranda_admin.php?success=hapus');
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>
