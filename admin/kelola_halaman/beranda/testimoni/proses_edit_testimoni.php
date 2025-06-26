<?php
include('../../../../includes/config.php');

if (isset($_POST['id'], $_POST['nama'], $_POST['bidang'], $_POST['testimoni'])) {
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $bidang = mysqli_real_escape_string($mysqli, $_POST['bidang']);
    $testimoni = mysqli_real_escape_string($mysqli, $_POST['testimoni']);

    // Cek apakah user mengupload gambar baru
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_folder = '../../../../uploads/' . $gambar;

        // Upload gambar baru
        if (move_uploaded_file($gambar_tmp, $gambar_folder)) {
            $query = "UPDATE tb_beranda_testimoni 
                    SET nama='$nama', bidang='$bidang', testimoni='$testimoni', gambar='$gambar' 
                    WHERE id_testimoni='$id'";
        } else {
            echo "Gagal mengunggah gambar baru.";
            exit;
        }
    } else {
        // Jika tidak ada gambar baru
        $query = "UPDATE tb_beranda_testimoni 
                SET nama='$nama', bidang='$bidang', testimoni='$testimoni' 
                WHERE id_testimoni='$id'";
    }

    if (mysqli_query($mysqli, $query)) {
        header('Location: ../beranda_admin.php?success=edit');
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>