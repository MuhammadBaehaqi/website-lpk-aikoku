<?php
include '../../../../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_job_detail'];
    $paragraf = $_POST['paragraf'];
    $pengumuman = $_POST['pengumuman'];
    $cakupan = $_POST['cakupan_tugas'];
    $pendaftaran = $_POST['pendaftaran_terbuka'];
    $persyaratan = $_POST['persyaratan_umum'];

    // Cek jika ada file baru di-upload
    if ($_FILES['gambar']['name'] != '') {
        $gambar = $_FILES['gambar'];
        $nama_baru = time() . '_' . $gambar['name'];
        $tmp = $gambar['tmp_name'];
        $folder = "../../../../uploads/";

        if (!move_uploaded_file($tmp, $folder . $nama_baru)) {
            echo "Upload gagal.";
            exit;
        }

        // Hapus gambar lama
        $cek = mysqli_query($mysqli, "SELECT gambar FROM tb_job_detail WHERE id_job_detail = '$id'");
        $lama = mysqli_fetch_assoc($cek)['gambar'];
        if (is_file($folder . $lama))
            unlink($folder . $lama);

        // Update dengan gambar baru
        $stmt = $mysqli->prepare("UPDATE tb_job_detail SET 
            paragraf = ?, pengumuman = ?, cakupan_tugas = ?, 
            pendaftaran_terbuka = ?, persyaratan_umum = ?, gambar = ?
            WHERE id_job_detail = ?");
        $stmt->bind_param("ssssssi", $paragraf, $pengumuman, $cakupan, $pendaftaran, $persyaratan, $nama_baru, $id);
    } else {
        // Tanpa update gambar
        $stmt = $mysqli->prepare("UPDATE tb_job_detail SET 
            paragraf = ?, pengumuman = ?, cakupan_tugas = ?, 
            pendaftaran_terbuka = ?, persyaratan_umum = ?
            WHERE id_job_detail = ?");
        $stmt->bind_param("sssssi", $paragraf, $pengumuman, $cakupan, $pendaftaran, $persyaratan, $id);
    }

    if ($stmt->execute()) {
        header("Location: ../job_admin.php?pesan=update");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>