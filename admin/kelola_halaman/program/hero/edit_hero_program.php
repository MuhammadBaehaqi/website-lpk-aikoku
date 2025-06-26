<?php
include '../../../../includes/config.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

$gambarBaru = $_FILES['gambar']['name'];
$lokasi = $_FILES['gambar']['tmp_name'];
$folder = "../../../../uploads/";

// Ambil data lama
$queryOld = mysqli_query($mysqli, "SELECT * FROM tb_hero_program WHERE id_hero_program = '$id'");
$dataLama = mysqli_fetch_assoc($queryOld);
$gambarLama = $dataLama['gambar'];

if (!empty($gambarBaru)) {
    // Upload gambar baru
    move_uploaded_file($lokasi, $folder . $gambarBaru);
    // Hapus gambar lama
    if (file_exists($folder . $gambarLama)) {
        unlink($folder . $gambarLama);
    }
    $gambarFinal = $gambarBaru;
} else {
    $gambarFinal = $gambarLama;
}

$query = "UPDATE tb_hero_program 
          SET judul = '$judul', deskripsi = '$deskripsi', gambar = '$gambarFinal'
          WHERE id_hero_program = '$id'";
mysqli_query($mysqli, $query);

header("Location: ../program_admin.php");
exit();
?>