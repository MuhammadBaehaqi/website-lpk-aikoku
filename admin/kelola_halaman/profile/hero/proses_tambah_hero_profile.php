<?php
include '../../../../includes/config.php';

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_FILES['gambar']['name'];
$lokasi = $_FILES['gambar']['tmp_name'];
$folder = "../../../../uploads/" . $gambar;

// Validasi upload
if (!move_uploaded_file($lokasi, $folder)) {
    echo "Gagal mengupload gambar.";
    exit;
}

// Hapus data lama (jika hanya satu hero aktif)
mysqli_query($mysqli, "DELETE FROM tb_hero_profile");

// Simpan data baru
$query = "INSERT INTO tb_hero_profile (judul, deskripsi, gambar) VALUES ('$judul', '$deskripsi', '$gambar')";
if (mysqli_query($mysqli, $query)) {
    header("Location: ../profile_admin.php?status=hero_updated");
    exit;
} else {
    echo "Gagal menyimpan data: " . mysqli_error($mysqli);
    exit;
}
