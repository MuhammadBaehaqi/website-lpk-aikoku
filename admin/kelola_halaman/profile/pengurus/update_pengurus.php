<?php
include '../../../../config.php';

$id = (int) $_POST['id_pengurus'];
$nama = $_POST['nama_pengurus'];
$jabatan = $_POST['jabatan'];
$deskripsi = $_POST['deskripsi'];

if (!empty($_FILES['foto']['name'])) {
    $foto_name = time() . '_' . $_FILES['foto']['name']; // Hindari nama sama
    $tmp = $_FILES['foto']['tmp_name'];
    $dest = "../../../../uploads/$foto_name";

    if (!move_uploaded_file($tmp, $dest)) {
        echo "Gagal upload foto.";
        exit;
    }

    // Simpan query update dengan foto
    $query = "UPDATE tb_profile_pengurus 
              SET nama_pengurus='$nama', jabatan='$jabatan', deskripsi='$deskripsi', foto='$foto_name' 
              WHERE id_pengurus=$id";
} else {
    // Tanpa mengganti foto
    $query = "UPDATE tb_profile_pengurus 
              SET nama_pengurus='$nama', jabatan='$jabatan', deskripsi='$deskripsi' 
              WHERE id_pengurus=$id";
}

// Eksekusi
if (mysqli_query($mysqli, $query)) {
    header("Location: ../profile_admin.php?status=edit_pengurus");
    exit;
} else {
    echo "Error: " . mysqli_error($mysqli);
    exit;
}
