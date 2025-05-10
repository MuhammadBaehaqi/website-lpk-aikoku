<?php
session_start();
include '../config.php';

if (!isset($_SESSION['nama'])) {
    header("Location: ../login.php");
    exit();
}

$username = $_SESSION['nama'];

$query = "SELECT pengumuman FROM tb_pendaftaran WHERE nama_lengkap = '$username' LIMIT 1";
$result = mysqli_query($mysqli, $query);
$data = mysqli_fetch_assoc($result);

$pengumuman = $data ? $data['pengumuman'] : null;

$pageTitle = "Pengumuman";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?> - LPK Aikoku Terpadu</title>
    <link rel="icon" href="../logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <h4>Pengumuman</h4>
                </div>
                <div class="card-body">
                    <h5>Pengumuman Terbaru</h5>
                    <?php if (!empty($pengumuman)): ?>
                        <p><?= nl2br(htmlspecialchars($pengumuman)) ?></p>
                    <?php else: ?>
                        <p><em>Belum ada pengumuman dari admin.</em></p>
                    <?php endif; ?>
                    <a href="dashboard_user.php" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>