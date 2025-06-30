<?php
include '../../../../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_job = $_POST['nama_job'];
    $paragraf = $_POST['paragraf'];
    $pengumuman = $_POST['pengumuman'];
    $cakupan = $_POST['cakupan_tugas'];
    $pendaftaran = $_POST['pendaftaran_terbuka'];
    $persyaratan = $_POST['persyaratan_umum'];

    $gambar = $_FILES['gambar'];
    $nama_gambar = time() . '_' . $gambar['name'];
    $tmp = $gambar['tmp_name'];
    $folder = "../../../../uploads/";

    if (!move_uploaded_file($tmp, $folder . $nama_gambar)) {
        echo "Gagal upload gambar.";
        exit;
    }

    // Hapus yang lama jika ada nama_job sama
    $cek = mysqli_query($mysqli, "SELECT gambar FROM tb_job_detail WHERE nama_job = '$nama_job'");
    while ($row = mysqli_fetch_assoc($cek)) {
        $lama = $folder . $row['gambar'];
        if (is_file($lama))
            unlink($lama);
    }
    mysqli_query($mysqli, "DELETE FROM tb_job_detail WHERE nama_job = '$nama_job'");

    // Simpan baru
    $stmt = $mysqli->prepare("INSERT INTO tb_job_detail 
        (nama_job, gambar, paragraf, pengumuman, cakupan_tugas, pendaftaran_terbuka, persyaratan_umum)
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nama_job, $nama_gambar, $paragraf, $pengumuman, $cakupan, $pendaftaran, $persyaratan);

    if ($stmt->execute()) {
        header("Location: ../job_admin.php?pesan=berhasil");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
