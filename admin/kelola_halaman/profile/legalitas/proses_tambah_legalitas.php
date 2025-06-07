<?php
include '../../../../config.php';

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$nomor_surat = $_POST['nomor_surat'];

$logo = $_FILES['logo']['name'];
$tmp = $_FILES['logo']['tmp_name'];
$dest = '../../../../uploads/' . $logo;

if (move_uploaded_file($tmp, $dest)) {
    $sql = "INSERT INTO tb_profile_legalitas (judul, deskripsi, nomor_surat, logo, tanggal_upload) 
            VALUES ('$judul', '$deskripsi', '$nomor_surat', '$logo', NOW())";
    mysqli_query($mysqli, $sql);
    header("Location: ../profile_admin.php?status=sukses");
    exit;
}

echo "Upload gagal.";
exit;
