<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['roles'] != 'admin') {
    header("Location: ../../../login.php");
    exit();
}

include '../../../includes/config.php';

// Ambil data dari form
$deskripsi = $_POST['deskripsi'] ?? '';
$facebook = $_POST['facebook'] ?? '';
$instagram = $_POST['instagram'] ?? '';
$whatsapp = $_POST['whatsapp'] ?? '';
$youtube = $_POST['youtube'] ?? '';
$email_sosmed = $_POST['email_sosmed'] ?? '';
$email = $_POST['email'] ?? '';
$alamat = $_POST['alamat'] ?? '';
$telepon = $_POST['telepon'] ?? '';
$jam_kerja = $_POST['jam_kerja'] ?? '';
$jam_sabtu = $_POST['jam_sabtu'] ?? '';
$catatan = $_POST['catatan'] ?? '';
$maps_url = $_POST['maps_url'] ?? '';
$old_logo = $_POST['old_logo'] ?? '';

// Upload logo jika ada
if (isset($_FILES['logo']) && $_FILES['logo']['error'] == UPLOAD_ERR_OK) {
    $uploadDir = '../../../uploads/';
    $tmpName = $_FILES['logo']['tmp_name'];
    $fileName = basename($_FILES['logo']['name']);
    $filePath = $uploadDir . $fileName;

    // Pindahkan file
    if (move_uploaded_file($tmpName, $filePath)) {
        $logo = $fileName;
        // Hapus logo lama jika ada dan berbeda
        if ($old_logo && file_exists($uploadDir . $old_logo) && $old_logo !== $fileName) {
            unlink($uploadDir . $old_logo);
        }
    } else {
        $logo = $old_logo; // tetap pakai logo lama jika gagal upload
    }
} else {
    $logo = $old_logo; // tidak upload baru
}

// Update atau insert data footer
// Cek apakah sudah ada data footer
$result = mysqli_query($mysqli, "SELECT id FROM tb_footer ORDER BY id DESC LIMIT 1");
if ($row = mysqli_fetch_assoc($result)) {
    // Update
    $id = $row['id'];
    $sql = "UPDATE tb_footer SET 
        logo = '" . mysqli_real_escape_string($mysqli, $logo) . "',
        deskripsi = '" . mysqli_real_escape_string($mysqli, $deskripsi) . "',
        facebook = '" . mysqli_real_escape_string($mysqli, $facebook) . "',
        instagram = '" . mysqli_real_escape_string($mysqli, $instagram) . "',
        whatsapp = '" . mysqli_real_escape_string($mysqli, $whatsapp) . "',
        youtube = '" . mysqli_real_escape_string($mysqli, $youtube) . "',
        email_sosmed = '" . mysqli_real_escape_string($mysqli, $email_sosmed) . "',
        email = '" . mysqli_real_escape_string($mysqli, $email) . "',
        alamat = '" . mysqli_real_escape_string($mysqli, $alamat) . "',
        telepon = '" . mysqli_real_escape_string($mysqli, $telepon) . "',
        jam_kerja = '" . mysqli_real_escape_string($mysqli, $jam_kerja) . "',
        jam_sabtu = '" . mysqli_real_escape_string($mysqli, $jam_sabtu) . "',
        catatan = '" . mysqli_real_escape_string($mysqli, $catatan) . "',
        maps_url = '" . mysqli_real_escape_string($mysqli, $maps_url) . "'
        WHERE id = $id";
} else {
    // Insert baru
    $sql = "INSERT INTO tb_footer (logo, deskripsi, facebook, instagram, whatsapp, youtube, email_sosmed, email, alamat, telepon, jam_kerja, jam_sabtu, catatan, maps_url) VALUES (
        '" . mysqli_real_escape_string($mysqli, $logo) . "',
        '" . mysqli_real_escape_string($mysqli, $deskripsi) . "',
        '" . mysqli_real_escape_string($mysqli, $facebook) . "',
        '" . mysqli_real_escape_string($mysqli, $instagram) . "',
        '" . mysqli_real_escape_string($mysqli, $whatsapp) . "',
        '" . mysqli_real_escape_string($mysqli, $youtube) . "',
        '" . mysqli_real_escape_string($mysqli, $email_sosmed) . "',
        '" . mysqli_real_escape_string($mysqli, $email) . "',
        '" . mysqli_real_escape_string($mysqli, $alamat) . "',
        '" . mysqli_real_escape_string($mysqli, $telepon) . "',
        '" . mysqli_real_escape_string($mysqli, $jam_kerja) . "',
        '" . mysqli_real_escape_string($mysqli, $jam_sabtu) . "',
        '" . mysqli_real_escape_string($mysqli, $catatan) . "',
        '" . mysqli_real_escape_string($mysqli, $maps_url) . "'
    )";
}

if (mysqli_query($mysqli, $sql)) {
    header("Location: footer_admin.php?success=1");
} else {
    echo "Error: " . mysqli_error($mysqli);
}
?>