<?php
include '../../../../includes/config.php';

$id = $_POST['id'];
$paragraf_1 = $_POST['paragraf_1'];
$paragraf_2 = $_POST['paragraf_2'];
$paragraf_3 = $_POST['paragraf_3'];
$paragraf_4 = $_POST['paragraf_4'];
$nama_kepala = $_POST['nama_kepala'];
$gambar_lama = $_POST['gambar_lama'];

if ($_FILES['gambar']['name'] != '') {
    $gambar_baru = time() . '_' . basename($_FILES['gambar']['name']);
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "../../../../uploads/" . $gambar_baru);
    $gambar = $gambar_baru;

    if (file_exists("../../../../uploads/" . $gambar_lama)) {
        unlink("../../../../uploads/" . $gambar_lama);
    }
} else {
    $gambar = $gambar_lama;
}

$query = "UPDATE tb_profile_sambutan 
          SET paragraf_1='$paragraf_1', paragraf_2='$paragraf_2', paragraf_3='$paragraf_3', paragraf_4='$paragraf_4', nama_kepala='$nama_kepala', gambar='$gambar' 
          WHERE id='$id'";

if (mysqli_query($mysqli, $query)) {
    header("Location: ../profile_admin.php?status=sambutan_edited");
} else {
    echo "Gagal update: " . mysqli_error($mysqli);
}
