<?php
include '../../../config.php';

$program = $_POST['program'];
$jenis = $_POST['jenis'];
$isi = $_POST['isi'];

$query = "INSERT INTO tb_persyaratan_program (program, jenis, isi) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($mysqli, $query);
mysqli_stmt_bind_param($stmt, 'sss', $program, $jenis, $isi);

if (mysqli_stmt_execute($stmt)) {
    header("Location: program_admin.php?status=sukses");
} else {
    echo "Gagal menyimpan data: " . mysqli_error($mysqli);
}
?>