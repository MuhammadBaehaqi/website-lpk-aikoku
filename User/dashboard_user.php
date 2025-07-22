<?php
session_start();
include '../includes/config.php';

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
    <style>
        .content {
            padding: 10px;
            background-color: #f8f9fa;
        }

        @media (max-width: 767px) {
            .card {
                margin: 10px;
            }

            .card-body {
                padding: 15px;
            }

            img.img-fluid {
                display: block;
                margin: 0 auto 15px auto;
                width: 100px;
            }

            table.table th,
            table.table td {
                font-size: 14px;
                padding: 6px;
            }

            .btn {
                font-size: 14px;
                padding: 6px 12px;
            }
        }

        .btn-custom-primary {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-custom-primary:hover {
            background-color: #0056b3;
        }

        .btn-custom-danger {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-custom-danger:hover {
            background-color: #c82333;
        }

        .btn-wrapper {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body style="background-color: #f8f9fa;">
    <?php include '../sidebar_user.php'; ?>
    <div class="content">
        <div class="container-sm mt-2 mb-3">
            <div class="card shadow-sm rounded">
                <div class="card-header text-white" style="background-color: #1e5631;">
                    <h4>Dashboard Pendaftar</h4>
                </div>

                <div class="card-body">
                    <!-- Informasi Profil -->
                    <h5>Data Diri</h5>
                    <img src="../uploads/<?= $data['foto_diri'] ?>"
                        class="img-fluid rounded shadow border border-2 mb-3" width="120">
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
                            <th>Bidang Pekerjaan</th>
                            <td><?= $data['bidang'] ?></td>
                        </tr>
                        <tr>
                            <th>Program</th>
                            <td><?= $data['program'] ?></td>
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
                            <?= substr(htmlspecialchars($pengumuman), 0, 80) ?>...
                            <a href="lihat_pengumuman.php" class="btn btn-sm btn-outline-primary ms-2">Lihat
                                Selengkapnya</a>
                        </div>
                    <?php else: ?>
                        <p><em>Belum ada pengumuman dari admin.</em></p>
                    <?php endif; ?>
                    <!-- Motivasi -->
                    <h5><i class="fas fa-lightbulb text-warning me-2"></i>Motivasi Anda Mengikuti Program Ini</h5>
                    <div class="alert alert-secondary" role="alert">
                        <?= nl2br(htmlspecialchars($data['motivasi'])) ?>
                    </div>
                    <div class="btn-wrapper">
                        <a href="cetak_bukti.php" target="_blank" class="btn btn-custom-primary w-100">
                            <i class="fas fa-download me-2"></i> Unduh Bukti Pendaftaran (PDF)
                        </a>
                        <a href="../logout.php" class="btn btn-custom-danger w-100">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>