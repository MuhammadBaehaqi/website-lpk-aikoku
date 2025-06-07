<?php
include '../../../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $program = mysqli_real_escape_string($mysqli, $_POST['program']);
    $jenis = mysqli_real_escape_string($mysqli, $_POST['jenis']);
    $isi = mysqli_real_escape_string($mysqli, $_POST['isi']);

    $query = "UPDATE tb_persyaratan_program 
              SET program = '$program', jenis = '$jenis', isi = '$isi' 
              WHERE id = $id";

    if (mysqli_query($mysqli, $query)) {
        header("Location: ../program_admin.php");
        exit();
    } else {
        echo "Gagal mengedit data: " . mysqli_error($mysqli);
    }
} else {
    header("Location: ../program_admin.php");
    exit();
}
