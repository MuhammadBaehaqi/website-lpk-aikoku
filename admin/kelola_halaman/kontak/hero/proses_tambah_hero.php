<?php
include '../../../../config.php';

// Pastikan file gambar ada
if (isset($_FILES['hero_image']) && $_FILES['hero_image']['error'] == 0) {
    // Path folder uploads
    $targetDir = "../../../../uploads/";
    $fileName = basename($_FILES['hero_image']['name']);
    $targetFilePath = $targetDir . $fileName;

    // Periksa apakah file gambar adalah gambar
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        // Upload file
        if (move_uploaded_file($_FILES['hero_image']['tmp_name'], $targetFilePath)) {
            $judul = $_POST['hero_title'];
            $deskripsi = $_POST['hero_description'];

            // Hapus data lama jika ada
            mysqli_query($mysqli, "DELETE FROM tb_hero_kontak");

            // Simpan data baru ke database
            $query = "INSERT INTO tb_hero_kontak (judul, deskripsi, gambar)
                    VALUES ('$judul', '$deskripsi', '$fileName')";
            if (mysqli_query($mysqli, $query)) {
                header("Location: ../kontak_admin.php?status=sukses");
            } else {
                echo "Gagal menyimpan data: " . mysqli_error($mysqli);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Only image files are allowed.";
    }
} else {
    echo "No file uploaded or there was an error.";
}
?>