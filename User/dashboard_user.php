<?php
session_start();
include '../config.php';

if (!isset($_SESSION['nama'])) {
    header("Location: ../login.php");
    exit();
}

$id_pengguna = $_SESSION['id_pengguna'];
$query = "SELECT * FROM tb_pengguna 
          INNER JOIN tb_pendaftaran 
          ON tb_pengguna.email_pengguna = tb_pendaftaran.email 
          WHERE tb_pengguna.id_pengguna = '$id_pengguna' LIMIT 1";
$result = mysqli_query($mysqli, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    header("Location: ../login.php");
    exit();
}

// Ambil data dari $data untuk ditampilkan
$nama = $data['nama_lengkap'];
$nomor_pendaftaran = $data['nomor_pendaftaran'];
$email = $data['email'];
$tanggal_daftar = date("d F Y", strtotime($data['tanggal_daftar']));
$status = $data['status'];
$pengumuman = $data['pengumuman']; // Tambahkan ini
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Pendaftar - LPK Aikoku Terpadu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../logo.png" type="image/x-icon">
    <style>
        .content {
            margin-left: 250px;
            padding: 20px;
            background-color: #f8f9fa;
        }

        @media (max-width: 991px) {
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body style="background-color: #f8f9fa;">
    <?php include '../sidebar_user.php'; ?>
    <div class="content">
        <div class="container mt-5">
            <div class="card shadow rounded">
                <div class="card-header text-white" style="background-color: #1e5631;">
                    <h4>Dashboard Pendaftar</h4>
                </div>

                <div class="card-body">
                    <!-- Informasi Profil -->
                    <h5>Data Diri</h5>
                    <table class="table">
                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?= $nama ?></td>
                        </tr>
                        <tr>
                            <th>Nomor Pendaftaran</th>
                            <td><?= $nomor_pendaftaran ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $email ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Daftar</th>
                            <td><?= $tanggal_daftar ?></td>
                        </tr>
                    </table>

                    <!-- Status Pendaftaran -->
                    <h5>Status Pendaftaran</h5>
                    <div class="alert alert-success" role="alert">
                        Selamat! Status Anda: <strong><?= $status ?></strong>
                    </div>

                    <!-- Pengumuman -->
                    <h5>Pengumuman</h5>
                    <?php if (!empty($pengumuman)): ?>
                        <div class="alert alert-info">
                            <?= nl2br(htmlspecialchars($pengumuman)) ?>
                        </div>
                    <?php else: ?>
                        <p><em>Belum ada pengumuman dari admin.</em></p>
                    <?php endif; ?>

                    <!-- Tombol Download Bukti -->
                    <a href="cetak_bukti.php" target="_blank" class="btn btn-outline-primary">Unduh Bukti Pendaftaran
                        (PDF)</a>

                    <!-- Tombol Logout -->
                    <a href="../logout.php" class="btn btn-outline-danger float-end">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>