<?php
include '../../../../includes/config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "DELETE FROM tb_persyaratan_program WHERE id = $id";

    if (mysqli_query($mysqli, $query)) {
        header("Location: ../program_admin.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($mysqli);
    }
} else {
    header("Location: ../program_admin.php");
    exit();
}
