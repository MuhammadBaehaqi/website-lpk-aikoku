<?php
include '../../../config.php'; // Sesuaikan path jika perlu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul_atas = $_POST['judul_atas'];
    $judul_bawah = $_POST['judul_bawah'];
    $judul_tengah = $_POST['judul_tengah'];
    $paragraf1 = $_POST['paragraf1'];
    $paragraf2 = $_POST['paragraf2'];

    // Proses upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "../../../uploads/" . $gambar;

    if (move_uploaded_file($tmp, $path)) {
        // Hapus data lama
        mysqli_query($mysqli, "DELETE FROM tb_profile_sejarah");

        // Simpan data baru
        $query = "INSERT INTO tb_profile_sejarah 
                  (judul_atas, judul_bawah, judul_tengah, paragraf1, paragraf2, gambar) 
                  VALUES ('$judul_atas', '$judul_bawah', '$judul_tengah', '$paragraf1', '$paragraf2', '$gambar')";

        if (mysqli_query($mysqli, $query)) {
            echo "<script>alert('Data sejarah berhasil ditambahkan'); window.location='profile_admin.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan ke database'); window.location='profile_admin.php';</script>";
        }
    } else {
        echo "<script>alert('Gagal upload gambar'); window.location='profile_admin.php';</script>";
    }
}
?>