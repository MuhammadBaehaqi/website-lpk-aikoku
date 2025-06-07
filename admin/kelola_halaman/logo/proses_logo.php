<?php
session_start();
include '../../../config.php';

// Cek jika admin
if (!isset($_SESSION['username']) || $_SESSION['roles'] != 'admin') {
    header("Location: ../../../login.php");
    exit();
}

$targetDir = "../../../uploads/";
$oldLogo = $_POST['old_logo'];
$logoFileName = $oldLogo; // default tetap pakai yang lama jika tidak upload

// Proses upload jika ada file baru
if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
    $fileTmp = $_FILES['logo']['tmp_name'];
    $fileName = basename($_FILES['logo']['name']);
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (in_array($fileExt, $allowed)) {
        $newFileName = 'logo_' . time() . '.' . $fileExt;
        $targetFile = $targetDir . $newFileName;

        if (move_uploaded_file($fileTmp, $targetFile)) {
            // Hapus logo lama kalau ada dan berbeda
            if (!empty($oldLogo) && file_exists($targetDir . $oldLogo)) {
                unlink($targetDir . $oldLogo);
            }
            $logoFileName = $newFileName;
        }
    }
}

// Simpan ke database
$textLogo = mysqli_real_escape_string($mysqli, $_POST['text_logo']);
mysqli_query($mysqli, "INSERT INTO tb_logo (logo, text_logo) VALUES ('$logoFileName', '$textLogo')");

header("Location: logo_admin.php?status=success");
exit();
?>