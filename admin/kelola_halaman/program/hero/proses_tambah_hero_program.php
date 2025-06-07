<?php
include '../../../../config.php';

$program = $_POST['program'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

$folder = "../../../../uploads/";
$nama_asli = $_FILES['gambar']['name'];
$nama_unik = time() . '_' . $nama_asli;          // Hindari nama bentrok
$lokasi_tmp = $_FILES['gambar']['tmp_name'];

// ■ 1. Hapus data dan file hero lama untuk program ini
$result = mysqli_query($mysqli, "SELECT gambar FROM tb_hero_program WHERE program = '$program'");
while ($row = mysqli_fetch_assoc($result)) {
    $old = $folder . $row['gambar'];
    if (is_file($old))
        unlink($old);
}
mysqli_query($mysqli, "DELETE FROM tb_hero_program WHERE program = '$program'");

// ■ 2. Upload gambar baru
if (!move_uploaded_file($lokasi_tmp, $folder . $nama_unik)) {
    echo "Upload gambar gagal!";
    exit;
}

// ■ 3. Simpan ke database
$sql = "INSERT INTO tb_hero_program (program, judul, deskripsi, gambar, tanggal_upload)
        VALUES ('$program', '$judul', '$deskripsi', '$nama_unik', NOW())";

if (mysqli_query($mysqli, $sql)) {
    header("Location: ../program_admin.php?status=hero_sukses");
    exit;
}

echo "Gagal menyimpan data: " . mysqli_error($mysqli);
exit;
