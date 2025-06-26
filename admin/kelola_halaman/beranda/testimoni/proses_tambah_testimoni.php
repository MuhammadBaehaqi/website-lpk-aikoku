<?php
// Koneksi ke database
include('../../../../includes/config.php'); // Sesuaikan dengan file koneksi ke database

if (isset($_POST['nama'], $_POST['testimoni'], $_POST['bidang'], $_FILES['gambar'])) {
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $testimoni = mysqli_real_escape_string($mysqli, $_POST['testimoni']);
    $bidang = mysqli_real_escape_string($mysqli, $_POST['bidang']);


    // Menangani upload gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_folder = '../../../../uploads/' . $gambar;

    if (move_uploaded_file($gambar_tmp, $gambar_folder)) {
        // Query untuk menambahkan testimoni ke database
        $query = "INSERT INTO tb_beranda_testimoni (nama, testimoni, bidang, gambar, tanggal) VALUES ('$nama', '$testimoni', '$bidang', '$gambar', NOW())";
        if (mysqli_query($mysqli, $query)) {
            header('Location: ../beranda_admin.php?success=tambah');
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    } else {
        echo "Gagal mengunggah gambar.";
    }
}
?>