<?php
include '../../../../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pengurus = $_POST['nama_pengurus'];
    $jabatan = $_POST['jabatan'];
    $deskripsi = $_POST['deskripsi'];

    // Upload foto
    $target_dir = "../../../../uploads/";
    $originalName = basename($_FILES["foto"]["name"]);
    $nama_unik = time() . '_' . $originalName;
    $target_file = $target_dir . $nama_unik;

    // Validasi & upload
    if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        echo "Gagal mengupload foto.";
        exit;
    }

    $tanggal_upload = date('Y-m-d H:i:s');
    $query = "INSERT INTO tb_profile_pengurus (nama_pengurus, jabatan, deskripsi, foto, tanggal_upload) 
                VALUES ('$nama_pengurus', '$jabatan', '$deskripsi', '$nama_unik', '$tanggal_upload')";

    if (mysqli_query($mysqli, $query)) {
        header("Location: ../profile_admin.php?status=tambah_pengurus");
        exit;
    } else {
        echo "Error: " . mysqli_error($mysqli);
        exit;
    }
}
