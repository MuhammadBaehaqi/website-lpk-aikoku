<?php
include '../../../../config.php'; // sesuaikan dengan path kamu

// Tangkap data dari form
$ikon = $_POST['ikon'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

// Insert ke database
$query = "INSERT INTO tb_beranda_fasilitas (ikon, judul, deskripsi) 
          VALUES ('$ikon', '$judul', '$deskripsi')";
$hasil = mysqli_query($mysqli, $query);

// Redirect kembali
if ($hasil) {
    header("Location: ../beranda_admin.php?status=sukses");
} else {
    echo "Gagal menambahkan fasilitas: " . mysqli_error($mysqli);
}
?>