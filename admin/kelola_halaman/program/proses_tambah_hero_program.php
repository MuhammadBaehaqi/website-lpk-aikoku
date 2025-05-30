<?php
include '../../../config.php';

$program = $_POST['program'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_FILES['gambar']['name'];
$lokasi = $_FILES['gambar']['tmp_name'];
$folder = "../../../uploads/";

// Hapus data hero lama berdasarkan program
$hapusLama = mysqli_query($mysqli, "SELECT gambar FROM tb_hero_program WHERE program = '$program'");
while ($row = mysqli_fetch_assoc($hapusLama)) {
    $gambarLama = $row['gambar'];
    if (file_exists($folder . $gambarLama)) {
        unlink($folder . $gambarLama); // Hapus gambar lama dari folder
    }
}
mysqli_query($mysqli, "DELETE FROM tb_hero_program WHERE program = '$program'");

// Upload gambar baru
move_uploaded_file($lokasi, $folder . $gambar);

// Insert data baru
$query = "INSERT INTO tb_hero_program (program, judul, deskripsi, gambar, tanggal_upload)
          VALUES ('$program', '$judul', '$deskripsi', '$gambar', NOW())";
mysqli_query($mysqli, $query);

header("Location: program_admin.php");
?>