<?php
include '../../../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pengurus = $_POST['nama_pengurus'];
    $jabatan = $_POST['jabatan'];
    $deskripsi = $_POST['deskripsi'];

    // Upload foto
    $target_dir = "../../../uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

    // Menambahkan data ke database termasuk tanggal_upload
    $tanggal_upload = date('Y-m-d H:i:s');  // Format tanggal dan waktu saat ini
    $query = "INSERT INTO tb_profile_pengurus (nama_pengurus, jabatan, deskripsi, foto, tanggal_upload) 
              VALUES ('$nama_pengurus', '$jabatan', '$deskripsi', '" . basename($_FILES["foto"]["name"]) . "', '$tanggal_upload')";
    if (mysqli_query($mysqli, $query)) {
        header("Location: profile_admin.php");
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
