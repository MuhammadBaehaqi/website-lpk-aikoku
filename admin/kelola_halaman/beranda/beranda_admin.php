<?php
session_start();

// Pengecekan jika pengguna belum login
if (!isset($_SESSION['username'])) {
    header("Location: ../../../login.php");
    exit();
}

// Pengecekan jika pengguna bukan admin
if ($_SESSION['roles'] != 'admin') {
    header("Location: user_dashboard.php"); // Atau ke halaman lain yang sesuai
    exit();
}

$pageTitle = 'Kelola Halaman / Beranda';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - Admin</title>
    <link rel="icon" href="../../../logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        
    </style>
</head>

<body>

    <?php include '../../../sidebar1.php'; ?>

    <div class="content">
        <h2 class="mb-4"><?php echo $pageTitle; ?></h2>

        <!-- Hero Section -->
        <div class="card mb-4">
            <div class="card-header">Kelola Hero Section</div>
            <div class="card-body">
                <form action="proses_tambah_hero.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="judul" class="form-control mb-3" placeholder="Judul" required>
                    <input type="text" name="deskripsi" class="form-control mb-3" placeholder="Deskripsi" required>
                    <input type="file" name="gambar" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Tambah Hero</button>
                </form>
                <hr>
                <h5>Daftar Hero</h5>
                <ul class="list-group">
                    <li class="list-group-item">Hero 1 <a href="edit_hero.php?id=1"
                            class="btn btn-sm btn-warning">Edit</a> <a href="hapus_hero.php?id=1"
                            class="btn btn-sm btn-danger">Hapus</a></li>
                    <li class="list-group-item">Hero 2 <a href="edit_hero.php?id=2"
                            class="btn btn-sm btn-warning">Edit</a> <a href="hapus_hero.php?id=2"
                            class="btn btn-sm btn-danger">Hapus</a></li>
                </ul>
            </div>
        </div>

        <!-- Mengapa Memilih Kami -->
        <div class="card mb-4">
            <div class="card-header">Kelola "Mengapa Memilih Kami"</div>
            <div class="card-body">
                <form action="proses_tambah_keunggulan.php" method="POST">
                    <textarea name="keunggulan" class="form-control mb-3" placeholder="Keunggulan" required></textarea>
                    <button type="submit" class="btn btn-primary">Tambah Keunggulan</button>
                </form>
                <hr>
                <h5>Daftar Keunggulan</h5>
                <ul class="list-group">
                    <li class="list-group-item">Keunggulan 1 <a href="edit_keunggulan.php?id=1"
                            class="btn btn-sm btn-warning">Edit</a> <a href="hapus_keunggulan.php?id=1"
                            class="btn btn-sm btn-danger">Hapus</a></li>
                </ul>
            </div>
        </div>

        <!-- Fasilitas -->
        <div class="card mb-4">
            <div class="card-header">Kelola Fasilitas</div>
            <div class="card-body">
                <form action="proses_tambah_fasilitas.php" method="POST">
                    <textarea name="fasilitas" class="form-control mb-3" placeholder="Deskripsi Fasilitas"
                        required></textarea>
                    <button type="submit" class="btn btn-primary">Tambah Fasilitas</button>
                </form>
                <hr>
                <h5>Daftar Fasilitas</h5>
                <ul class="list-group">
                    <li class="list-group-item">Fasilitas 1 <a href="edit_fasilitas.php?id=1"
                            class="btn btn-sm btn-warning">Edit</a> <a href="hapus_fasilitas.php?id=1"
                            class="btn btn-sm btn-danger">Hapus</a></li>
                </ul>
            </div>
        </div>

        <!-- Testimoni -->
        <div class="card mb-4">
            <div class="card-header">Kelola Testimoni</div>
            <div class="card-body">
                <form action="proses_tambah_testimoni.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama" class="form-control mb-3" placeholder="Nama Alumni" required>
                    <textarea name="testimoni" class="form-control mb-3" placeholder="Isi Testimoni"
                        required></textarea>
                    <input type="file" name="gambar" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Tambah Testimoni</button>
                </form>
                <hr>
                <h5>Daftar Testimoni</h5>
                <ul class="list-group">
                    <li class="list-group-item">Alumni 1 <a href="edit_testimoni.php?id=1"
                            class="btn btn-sm btn-warning">Edit</a> <a href="hapus_testimoni.php?id=1"
                            class="btn btn-sm btn-danger">Hapus</a></li>
                </ul>
            </div>
        </div>

    </div>

</body>

</html>