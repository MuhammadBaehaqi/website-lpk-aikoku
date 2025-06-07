<?php
include '../../../../config.php';

$id = (int) $_POST['id_legalitas'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$nomor_surat = $_POST['nomor_surat'];

// Cek apakah user upload logo baru
if (!empty($_FILES['logo']['name'])) {
    $logo = $_FILES['logo']['name'];
    $tmp = $_FILES['logo']['tmp_name'];
    $dest = '../../../../uploads/' . $logo;

    if (!move_uploaded_file($tmp, $dest)) {
        die("Gagal mengupload logo.");
    }

    $sql = "UPDATE tb_profile_legalitas 
            SET judul='$judul', deskripsi='$deskripsi', nomor_surat='$nomor_surat', logo='$logo' 
            WHERE id_legalitas=$id";
} else {
    $sql = "UPDATE tb_profile_legalitas 
            SET judul='$judul', deskripsi='$deskripsi', nomor_surat='$nomor_surat' 
            WHERE id_legalitas=$id";
}

if (mysqli_query($mysqli, $sql)) {
    header("Location: ../profile_admin.php?status=edit_sukses");
    exit;
}

echo "Gagal mengupdate data: " . mysqli_error($mysqli);
exit;
