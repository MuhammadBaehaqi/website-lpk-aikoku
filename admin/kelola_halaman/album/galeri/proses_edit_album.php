<?php
include '../../../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $deskripsi = mysqli_real_escape_string($mysqli, $_POST['deskripsi']);
    $detail = mysqli_real_escape_string($mysqli, $_POST['detail']);

    // Ambil data lama untuk cek foto sebelumnya
    $queryOld = "SELECT foto_album FROM tb_album WHERE id_album = $id";
    $resultOld = mysqli_query($mysqli, $queryOld);
    $dataOld = mysqli_fetch_assoc($resultOld);
    $fotoLama = $dataOld['foto_album'];

    // Cek apakah ada file baru yang diupload
    if (isset($_FILES['foto_album']) && $_FILES['foto_album']['error'] === UPLOAD_ERR_OK) {
        $namaFile = $_FILES['foto_album']['name'];
        $tmpName = $_FILES['foto_album']['tmp_name'];
        $namaBaru = "uploads/" . time() . "_" . basename($namaFile); // Path disimpan di DB
        $lokasiUpload = "../../../../" . $namaBaru; // Path untuk move_uploaded_file()

        // Pastikan folder uploads tersedia
        $folderUpload = dirname($lokasiUpload);
        if (!is_dir($folderUpload)) {
            mkdir($folderUpload, 0755, true);
        }

        // Upload dan update data
        if (move_uploaded_file($tmpName, $lokasiUpload)) {
            // Hapus foto lama jika ada
            $pathFotoLama = "../../../../" . $fotoLama;
            if (file_exists($pathFotoLama) && is_file($pathFotoLama)) {
                unlink($pathFotoLama);
            }

            $update = "UPDATE tb_album SET deskripsi='$deskripsi', detail='$detail', foto_album='$namaBaru' WHERE id_album=$id";
        } else {
            echo "Gagal mengunggah foto baru.";
            exit;
        }
    } else {
        // Jika tidak ada file baru, hanya update teks
        $update = "UPDATE tb_album SET deskripsi='$deskripsi', detail='$detail' WHERE id_album=$id";
    }

    // Jalankan query update
    if (mysqli_query($mysqli, $update)) {
        echo "<script>
        alert('Update sukses! Album berhasil diperbarui.!');
        window.location.href = '../album_admin.php';
    </script>";
        exit;

    } else {
        echo "Gagal mengupdate album: " . mysqli_error($mysqli);
    }
} else {
    echo "Akses tidak valid.";
}
?>