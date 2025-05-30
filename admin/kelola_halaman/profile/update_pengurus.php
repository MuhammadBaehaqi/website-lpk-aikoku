<?php
include '../../../config.php';

$id = $_POST['id_pengurus'];
$nama = $_POST['nama_pengurus'];
$jabatan = $_POST['jabatan'];
$deskripsi = $_POST['deskripsi'];

if ($_FILES['foto']['name']) {
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "../../../uploads/$foto");

    $query = "UPDATE tb_profile_pengurus SET nama_pengurus='$nama', jabatan='$jabatan', deskripsi='$deskripsi', foto='$foto' WHERE id_pengurus=$id";
} else {
    $query = "UPDATE tb_profile_pengurus SET nama_pengurus='$nama', jabatan='$jabatan', deskripsi='$deskripsi' WHERE id_pengurus=$id";
}

if (mysqli_query($mysqli, $query)) {
    header("Location: profile_admin.php?success=1");
} else {
    echo "Error: " . mysqli_error($mysqli);
}
?>
