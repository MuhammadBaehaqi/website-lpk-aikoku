<?php
include '../../../includes/config.php';

$zip = new ZipArchive();
$zip_name = "foto_pendaftar.zip";

if ($zip->open($zip_name, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
    exit("Gagal membuat file ZIP.");
}

$query = mysqli_query($mysqli, "SELECT foto_diri FROM tb_pendaftaran WHERE foto_diri IS NOT NULL");

while ($d = mysqli_fetch_assoc($query)) {
    $file_path = realpath('../../../uploads/' . $d['foto_diri']);
    if (file_exists($file_path)) {
        $zip->addFile($file_path, basename($file_path));
    }
}

$zip->close();

// Unduh file
header('Content-Type: application/zip');
header("Content-Disposition: attachment; filename=$zip_name");
header('Content-Length: ' . filesize($zip_name));
readfile($zip_name);
unlink($zip_name); // hapus zip setelah download otomatis
exit;
?>