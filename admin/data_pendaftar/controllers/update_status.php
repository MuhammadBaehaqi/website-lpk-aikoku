<?php
include '../../../includes/config.php'; // Pastikan sesuai

if (isset($_POST['id_pendaftaran']) && isset($_POST['status']) && isset($_POST['pengumuman'])) {
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $status = $_POST['status'];
    $pengumuman = $_POST['pengumuman'];

    // Update status dan pengumuman
    $query = "UPDATE tb_pendaftaran SET status='$status', pengumuman='$pengumuman' WHERE id_pendaftaran='$id_pendaftaran'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        // Jika status Lolos, ambil data pendaftar
        if ($status === 'Lolos') {
            $getData = mysqli_query($mysqli, "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran='$id_pendaftaran'");
            if ($getData && mysqli_num_rows($getData) > 0) {
                $dataPendaftar = mysqli_fetch_assoc($getData);
                $nama = $dataPendaftar['nama_lengkap'];
                $email = $dataPendaftar['email'];

                // Cek apakah email sudah ada
                $cekUser = mysqli_query($mysqli, "SELECT * FROM tb_pengguna WHERE email_pengguna='$email'");
                if (mysqli_num_rows($cekUser) == 0) {
                    // Belum ada, buat akun baru dengan md5 password
                    $password = md5("123456"); // Password default sementara
                    $insert = mysqli_query($mysqli, "INSERT INTO tb_pengguna (username, password, email_pengguna, roles) VALUES ('$nama', '$password', '$email', 'user')");
                }
            }
        }

        header("Location: ../data_pendaftaran.php?pesan=update_sukses");
    } else {
        echo "Gagal mengubah status: " . mysqli_error($mysqli);
    }
} else {
    echo "Data tidak lengkap.";
}
?>