<?php
include '../../../../includes/config.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$link = $_POST['link_tombol'];
$teks = $_POST['teks_tombol'];

// Cek apakah link_tombol sudah digunakan oleh hero lain (kecuali yang sedang diedit)
$cek = mysqli_query($mysqli, "SELECT * FROM tb_hero WHERE link_tombol='$link' AND id_hero != '$id'");
if (mysqli_num_rows($cek) > 0) {
    // Redirect dengan pesan error
    header("Location: ../beranda_admin.php?status=duplikat_link");
    exit();
}

// Cek apakah user upload gambar baru
if ($_FILES['gambar']['name'] != "") {
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $folder = '../../../../uploads/' . $gambar;

    // Pindahkan file baru
    move_uploaded_file($tmp, $folder);

    // Update dengan gambar baru
    $query = "UPDATE tb_hero SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar', link_tombol='$link', teks_tombol='$teks' WHERE id_hero=$id";
} else {
    // Update tanpa mengganti gambar
    $query = "UPDATE tb_hero SET judul='$judul', deskripsi='$deskripsi', link_tombol='$link', teks_tombol='$teks' WHERE id_hero=$id";
}

mysqli_query($mysqli, $query);
header("Location: ../beranda_admin.php?status=edit_sukses");
exit();
?>