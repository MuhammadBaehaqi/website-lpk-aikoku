<?php
include '../../../../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_job = $_POST['id_job'];
    $nama_job = $_POST['nama_job'];
    $deskripsi_job = $_POST['deskripsi_job'];

    // Ambil data lama
    $getOld = mysqli_query($mysqli, "SELECT hero_image FROM tb_job WHERE id_job = '$id_job'");
    $old = mysqli_fetch_assoc($getOld);
    $old_image = $old['hero_image'];

    // Cek apakah gambar baru diupload
    if (!empty($_FILES['hero_image']['name'])) {
        $folder = "../../../../uploads/";
        $gambar = $_FILES['hero_image'];
        $nama_unik = time() . '_' . $gambar['name'];
        $lokasi_tmp = $gambar['tmp_name'];

        // Hapus gambar lama
        if (is_file($folder . $old_image)) {
            unlink($folder . $old_image);
        }

        // Upload gambar baru
        move_uploaded_file($lokasi_tmp, $folder . $nama_unik);

        // Update data dengan gambar baru
        $stmt = $mysqli->prepare("UPDATE tb_job SET nama_job=?, deskripsi_job=?, hero_image=? WHERE id_job=?");
        $stmt->bind_param("sssi", $nama_job, $deskripsi_job, $nama_unik, $id_job);
    } else {
        // Update tanpa ganti gambar
        $stmt = $mysqli->prepare("UPDATE tb_job SET nama_job=?, deskripsi_job=? WHERE id_job=?");
        $stmt->bind_param("ssi", $nama_job, $deskripsi_job, $id_job);
    }

    if ($stmt->execute()) {
        header("Location: ../job_admin.php?pesan=edit_berhasil");
    } else {
        echo "Gagal update data: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("Location: ../job_admin.php");
    exit;
}
?>