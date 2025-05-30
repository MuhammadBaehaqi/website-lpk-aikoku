<?php
include('../../../config.php');

// Ambil data dari form
$paragraf_1 = $_POST['paragraf_1'];
$paragraf_2 = $_POST['paragraf_2'];
$paragraf_3 = $_POST['paragraf_3'];
$paragraf_4 = $_POST['paragraf_4'];
$nama_kepala = $_POST['nama_kepala'];

// Proses upload gambar
$gambar = $_FILES['gambar']['name'];
$gambar_tmp = $_FILES['gambar']['tmp_name'];
$gambar_path = '../../../uploads/' . $gambar;

// Ambil nama gambar lama
$query_lama = mysqli_query($mysqli, "SELECT gambar FROM tb_profile_sambutan LIMIT 1");
$gambar_lama = mysqli_fetch_assoc($query_lama)['gambar'];

// Hapus gambar lama jika ada
if ($gambar_lama) {
    $gambar_lama_path = '../../../uploads/' . $gambar_lama;
    if (file_exists($gambar_lama_path)) {
        unlink($gambar_lama_path); // Menghapus file gambar lama
    }
}

// Pindahkan file gambar baru ke folder uploads
move_uploaded_file($gambar_tmp, $gambar_path);

// Simpan data sambutan ke database
$query = "INSERT INTO tb_profile_sambutan (paragraf_1, paragraf_2, paragraf_3, paragraf_4, nama_kepala, gambar) 
          VALUES ('$paragraf_1', '$paragraf_2', '$paragraf_3', '$paragraf_4', '$nama_kepala', '$gambar')";

if (mysqli_query($mysqli, $query)) {
    header('Location: profile_admin.php'); // Redirect ke halaman admin setelah berhasil
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}
?>
