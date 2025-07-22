<?php
include '../../../../includes/config.php';

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$link = $_POST['link_tombol'];
$teks = $_POST['teks_tombol'];
$gambar = $_FILES['gambar']['name'];
$gambar_tmp = $_FILES['gambar']['tmp_name'];

$upload_path = "../../../../uploads/" . $gambar;
move_uploaded_file($gambar_tmp, $upload_path);

// Cek apakah data dengan judul DAN link tombol yang sama sudah ada
$cek = mysqli_query($mysqli, "SELECT * FROM tb_hero WHERE judul='$judul' AND link_tombol='$link'");
if (mysqli_num_rows($cek) > 0) {
    // Jika ada, update
    mysqli_query($mysqli, "UPDATE tb_hero SET deskripsi='$deskripsi', gambar='$gambar', teks_tombol='$teks' WHERE judul='$judul' AND link_tombol='$link'");
} else {
    // Jika tidak ada, insert baru
    mysqli_query($mysqli, "INSERT INTO tb_hero (judul, deskripsi, gambar, link_tombol, teks_tombol) VALUES ('$judul', '$deskripsi', '$gambar', '$link', '$teks')");
}

header("Location: ../beranda_admin.php?status=sukses");
?>