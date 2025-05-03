<?php
session_start();

// Pengecekan jika pengguna belum login
if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php");
    exit();
}

// Pengecekan jika pengguna bukan admin
if ($_SESSION['roles'] != 'admin') {
    header("Location: user_dashboard.php"); // Atau ke halaman lain yang sesuai
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - LPK Aikoku Terpadu</title>
    <link rel="icon" href="../../logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- Memasukkan sidebar -->
    <?php include '../../sidebar1.php'; ?>

    <!-- Konten utama -->
    <div class="content">
        <h2>Dashboard Admin</h2>

        <div class="row mt-4">
            <!-- Kartu Informasi Pendaftaran -->
            <div class="col-md-4">
                <div class="card text-bg-success mb-3">
                    <div class="card-header">Kelola Pendaftaran</div>
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Pendaftar: 120</h5>
                        <p class="card-text">Data pendaftaran terbaru tersedia di sini.</p>
                        <a href="#" class="btn btn-light">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <!-- Kartu Informasi Pengumuman -->
            <div class="col-md-4">
                <div class="card text-bg-warning mb-3">
                    <div class="card-header">Kelola Pengumuman</div>
                    <div class="card-body">
                        <h5 class="card-title">Total Pengumuman: 5</h5>
                        <p class="card-text">Atur dan terbitkan pengumuman penting.</p>
                        <a href="#" class="btn btn-light">Kelola Pengumuman</a>
                    </div>
                </div>
            </div>

            <!-- Kartu Kelola User -->
            <div class="col-md-4">
                <div class="card text-bg-primary mb-3">
                    <div class="card-header">Kelola User</div>
                    <div class="card-body">
                        <h5 class="card-title">Total User: 10</h5>
                        <p class="card-text">Kelola akun admin dan pengguna lainnya.</p>
                        <a href="kelola_user.php" class="btn btn-light">Kelola User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>