<?php
include '../../../../includes/config.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
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

$query = "UPDATE tb_hero_profile SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id_hero='$id'";
if (mysqli_query($mysqli, $query)) {
    header("Location: ../profile_admin.php?status=hero_edited");
} else {
    echo "Gagal mengupdate data: " . mysqli_error($mysqli);
}
?>
