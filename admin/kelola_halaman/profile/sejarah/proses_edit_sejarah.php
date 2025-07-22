<?php
include '../../../../includes/config.php';

$id = $_POST['id'];
$judul_atas = $_POST['judul_atas'];
$judul_bawah = $_POST['judul_bawah'];
$judul_tengah = $_POST['judul_tengah'];
$paragraf1 = $_POST['paragraf1'];
$paragraf2 = $_POST['paragraf2'];
$gambar_lama = $_POST['gambar_lama'];

if ($_FILES['gambar']['name'] != '') {
    $gambar_baru = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "../../../../uploads/" . $gambar_baru);
    $gambar = $gambar_baru;

    if (file_exists("../../../../uploads/" . $gambar_lama)) {
        unlink("../../../../uploads/" . $gambar_lama);
    }
} else {
    $gambar = $gambar_lama;
}

$query = "UPDATE tb_profile_sejarah 
          SET judul_atas='$judul_atas', judul_bawah='$judul_bawah', judul_tengah='$judul_tengah', paragraf1='$paragraf1', paragraf2='$paragraf2', gambar='$gambar'
          WHERE id='$id'";

if (mysqli_query($mysqli, $query)) {
    header("Location: ../profile_admin.php?status=sejarah_edited");
} else {
    echo "Gagal mengupdate data: " . mysqli_error($mysqli);
}
