<?php
include '../../../../includes/config.php';

// Cek jika form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_size = $_FILES['gambar']['size'];

    // Cek apakah ada gambar yang diupload
    if ($gambar_size > 0) {
        $gambar_target = "../../../../uploads/" . basename($gambar);

        // Cek apakah gambar berhasil diupload
        if (move_uploaded_file($gambar_tmp, $gambar_target)) {
            // Cek apakah sudah ada hero album yang ada, jika ada, hapus gambar lama
            $cek_album = mysqli_query($mysqli, "SELECT * FROM tb_hero_album");
            if (mysqli_num_rows($cek_album) > 0) {
                // Hapus album hero yang sudah ada
                $album = mysqli_fetch_assoc($cek_album);
                // Menghapus gambar lama dari server
                if (file_exists("../../../../uploads/" . $album['gambar'])) {
                    unlink("../../../../uploads/" . $album['gambar']);
                }
                // Hapus album lama dari database
                mysqli_query($mysqli, "DELETE FROM tb_hero_album WHERE id_hero = " . $album['id_hero']);
            }

            // Menambahkan album baru
            $query = "INSERT INTO tb_hero_album (judul, deskripsi, gambar, tanggal_upload) 
                      VALUES ('$judul', '$deskripsi', '$gambar', NOW())";
            if (mysqli_query($mysqli, $query)) {
                header("Location: ../album_admin.php?success=Album berhasil ditambahkan");
            } else {
                echo "Error: " . mysqli_error($mysqli);
            }
        } else {
            echo "Gagal meng-upload gambar.";
        }
    } else {
        echo "Gambar tidak ditemukan.";
    }
}
?>