<?php
include '../../../config.php';

$id = $_POST['id_legalitas'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$nomor_surat = $_POST['nomor_surat'];

if ($_FILES['logo']['name']) {
    $logo = $_FILES['logo']['name'];
    $tmp = $_FILES['logo']['tmp_name'];
    $lokasi = '../../../uploads/' . $logo;

    if (move_uploaded_file($tmp, $lokasi)) {
        $query = "UPDATE tb_profile_legalitas 
                  SET judul='$judul', deskripsi='$deskripsi', nomor_surat='$nomor_surat', logo='$logo' 
                  WHERE id_legalitas=$id";
    } else {
        die("Gagal mengupload logo.");
    }
} else {
    $query = "UPDATE tb_profile_legalitas 
              SET judul='$judul', deskripsi='$deskripsi', nomor_surat='$nomor_surat' 
              WHERE id_legalitas=$id";
}

if (mysqli_query($mysqli, $query)) {
    header("Location: profile_admin.php?status=edit_sukses");
} else {
    echo "Gagal mengupdate data: " . mysqli_error($mysqli);
}
?>
