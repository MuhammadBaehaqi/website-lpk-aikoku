<?php
include '../../../../includes/config.php'; // perbaikan path

$deskripsi = $_POST['deskripsi'];
$detail = $_POST['detail'];
$tanggal_upload = date("Y-m-d");

$nama_file = time() . "_" . basename($_FILES["foto_album"]["name"]);
$relative_path = "uploads/" . $nama_file; // disimpan di DB
$full_path = "../../../../" . $relative_path;   // real path untuk upload

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($relative_path, PATHINFO_EXTENSION));

// Cek file gambar
$check = getimagesize($_FILES["foto_album"]["tmp_name"]);
if ($check === false) {
    echo "File bukan gambar.";
    $uploadOk = 0;
}

// Cek ekstensi
$allowedTypes = ["jpg", "jpeg", "png"];
if (!in_array($imageFileType, $allowedTypes)) {
    echo "Hanya file JPG, JPEG, dan PNG yang diperbolehkan.";
    $uploadOk = 0;
}

// Upload file
if ($uploadOk) {
    // Pastikan folder ada
    $folder_upload = dirname($full_path);
    if (!is_dir($folder_upload)) {
        mkdir($folder_upload, 0755, true);
    }

    if (move_uploaded_file($_FILES["foto_album"]["tmp_name"], $full_path)) {
        $sql = "INSERT INTO tb_album (deskripsi, detail, foto_album, upload_date)
                VALUES ('$deskripsi', '$detail', '$relative_path', '$tanggal_upload')";
        if (mysqli_query($mysqli, $sql)) {
    echo "<script>
        alert('Sukses! Album baru berhasil ditambahkan.');
        window.location.href = '../album_admin.php';
    </script>";
    exit;
        } else {
            echo "Gagal menyimpan ke database: " . mysqli_error($mysqli);
        }
    } else {
        echo "Gagal mengupload file.";
    }
} else {
    echo "File tidak valid untuk diupload.";
}
?>