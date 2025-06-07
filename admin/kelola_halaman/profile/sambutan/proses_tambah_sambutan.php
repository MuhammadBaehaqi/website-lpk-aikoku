<?php
include('../../../../config.php');

// Ambil data dari form
$paragraf_1 = $_POST['paragraf_1'];
$paragraf_2 = $_POST['paragraf_2'];
$paragraf_3 = $_POST['paragraf_3'];
$paragraf_4 = $_POST['paragraf_4'];
$nama_kepala = $_POST['nama_kepala'];

// Nama gambar baru dibuat unik
$gambar_name = time() . '_' . basename($_FILES['gambar']['name']);
$gambar_tmp = $_FILES['gambar']['tmp_name'];
$gambar_path = '../../../../uploads/' . $gambar_name;

// Ambil gambar lama
$query_lama = mysqli_query($mysqli, "SELECT gambar FROM tb_profile_sambutan LIMIT 1");
if ($query_lama && mysqli_num_rows($query_lama) > 0) {
    $gambar_lama = mysqli_fetch_assoc($query_lama)['gambar'];
    $gambar_lama_path = '../../../../uploads/' . $gambar_lama;
    if (file_exists($gambar_lama_path) && is_file($gambar_lama_path)) {
        unlink($gambar_lama_path);
    }

    // Hapus data lama
    mysqli_query($mysqli, "DELETE FROM tb_profile_sambutan");
}

// Upload gambar baru
if (!move_uploaded_file($gambar_tmp, $gambar_path)) {
    echo "Gagal mengupload gambar baru.";
    exit;
}

// Simpan data baru
$query = "INSERT INTO tb_profile_sambutan 
          (paragraf_1, paragraf_2, paragraf_3, paragraf_4, nama_kepala, gambar) 
          VALUES ('$paragraf_1', '$paragraf_2', '$paragraf_3', '$paragraf_4', '$nama_kepala', '$gambar_name')";

if (mysqli_query($mysqli, $query)) {
    header('Location: ../profile_admin.php?status=sambutan_tersimpan');
    exit;
} else {
    echo "Error saat menyimpan ke database: " . mysqli_error($mysqli);
    exit;
}
