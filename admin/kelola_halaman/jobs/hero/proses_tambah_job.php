<?php
include '../../../../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_job = $_POST['nama_job'];
    $deskripsi_job = $_POST['deskripsi_job'];

    $folder = "../../../../uploads/";
    $gambar = $_FILES['hero_image'];

    $nama_asli = $gambar['name'];
    $nama_unik = time() . '_' . $nama_asli;  // Nama file unik
    $lokasi_tmp = $gambar['tmp_name'];

    // Cek dulu: apakah ada job lama dengan nama yang sama?
    $cek = mysqli_query($mysqli, "SELECT hero_image FROM tb_job WHERE nama_job = '$nama_job'");
    while ($row = mysqli_fetch_assoc($cek)) {
        $gambar_lama = $folder . $row['hero_image'];
        if (is_file($gambar_lama)) {
            unlink($gambar_lama); // Hapus gambar lama
        }
    }

    // Hapus data lama dari database
    mysqli_query($mysqli, "DELETE FROM tb_job WHERE nama_job = '$nama_job'");

    // Upload gambar baru
    if (!move_uploaded_file($lokasi_tmp, $folder . $nama_unik)) {
        echo "Upload gambar gagal!";
        exit;
    }

    // Simpan data baru
    $stmt = $mysqli->prepare("INSERT INTO tb_job (nama_job, deskripsi_job, hero_image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama_job, $deskripsi_job, $nama_unik);

    if ($stmt->execute()) {
        header("Location: ../job_admin.php?pesan=berhasil");
        exit;
    } else {
        echo "Gagal menyimpan ke database: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("Location: ../job_admin.php");
    exit();
}
?>
