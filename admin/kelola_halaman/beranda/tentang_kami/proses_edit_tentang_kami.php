<?php
include '../../../../includes/config.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

if (!empty($_FILES['gambar']['name'])) {
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $upload_path = "../../../../uploads/" . $gambar;

    move_uploaded_file($tmp, $upload_path);

    // Update dengan gambar baru
    $query = "UPDATE tb_beranda_tentang_kami SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id_tentang='$id'";
} else {
    // Update tanpa mengganti gambar
    $query = "UPDATE tb_beranda_tentang_kami SET judul='$judul', deskripsi='$deskripsi' WHERE id_tentang='$id'";
}

mysqli_query($mysqli, $query);
header("Location: ../beranda_admin.php?status=edit_tentang_sukses");
exit();
