<?php
session_start();
include '../includes/config.php';

if (!isset($_SESSION['nama'])) {
    header("Location: ../login.php");
    exit();
}

$username = $_SESSION['nama'];

$query = "SELECT * FROM tb_pendaftaran WHERE nama_lengkap = '$username' LIMIT 1";
$result = mysqli_query($mysqli, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data pendaftaran tidak ditemukan.";
    exit();
}

$nomor_pendaftaran = $data['nomor_pendaftaran'];
$status = $data['status'];
$tanggal_daftar = date("d F Y", strtotime($data['tanggal_daftar']));
$pageTitle = "Status Pendaftaran";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?> - LPK Aikoku Terpadu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
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
                    <h4>Status Pendaftaran</h4>
                </div>
                <div class="card-body">
                    <h5>Informasi Pendaftaran</h5>
                    <table class="table">
                        <tr>
                            <th>Nomor Pendaftaran</th>
                            <td><?= $nomor_pendaftaran ?></td>
                        </tr>
                        <tr>
                            <th>Status Pendaftaran</th>
                            <td><?= strtoupper($status) ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Daftar</th>
                            <td><?= $tanggal_daftar ?></td>
                        </tr>
                    </table>
                    <a href="dashboard_user.php" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>