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

$pageTitle = 'Kelola Halaman / Kontak';
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
                    <!-- Hero Section Items -->
                    <li class="list-group-item">
                        Hero 1 - Deskripsi singkat
                        <a href="edit_hero.php?id=1" class="btn btn-sm btn-warning float-end mx-1">Edit</a>
                        <a href="hapus_hero.php?id=1" class="btn btn-sm btn-danger float-end">Hapus</a>
                    </li>
                    <li class="list-group-item">
                        Hero 2 - Deskripsi singkat
                        <a href="edit_hero.php?id=2" class="btn btn-sm btn-warning float-end mx-1">Edit</a>
                        <a href="hapus_hero.php?id=2" class="btn btn-sm btn-danger float-end">Hapus</a>
                    </li>
                    <!-- Add more items here if needed -->
                </ul>
            </div>
        </div>

        <!-- Informasi Kontak -->
        <div class="card mb-4">
            <div class="card-header">Kelola Informasi Kontak</div>
            <div class="card-body">
                <form action="proses_tambah_kontak.php" method="POST">
                    <input type="text" name="alamat" class="form-control mb-3" placeholder="Alamat" required>
                    <input type="email" name="email_kontak" class="form-control mb-3" placeholder="Email" required>
                    <input type="text" name="telepon" class="form-control mb-3" placeholder="Telepon" required>
                    <input type="text" name="jam_kerja" class="form-control mb-3" placeholder="Jam Kerja" required>
                    <input type="text" name="jam_sabtu" class="form-control mb-3" placeholder="Jam Kerja Sabtu" required>
                    <input type="text" name="catatan" class="form-control mb-3" placeholder="Catatan Tambahan">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
                <hr>
                <h5>Daftar Kontak</h5>
                <ul class="list-group">
                    <!-- Informasi Kontak Items -->
                    <li class="list-group-item">
                        Alamat: Petunjungan, Kab. Brebes, Jawa Tengah | 
                        Email: lpkaikokuterpadu@gmail.com | 
                        Telepon: +62 857-2522-1265 | 
                        Jam Kerja: 08:00 - 17:00 | 
                        Catatan: Minggu: Jadwalkan Terlebih Dahulu 
                        <a href="edit_kontak.php?id=1" class="btn btn-sm btn-warning float-end mx-1">Edit</a>
                        <a href="hapus_kontak.php?id=1" class="btn btn-sm btn-danger float-end">Hapus</a>
                    </li>
                    <!-- Add more items here if needed -->
                </ul>
            </div>
        </div>

        <!-- Google Maps -->
        <div class="card mb-4">
            <div class="card-header">Kelola Google Maps</div>
            <div class="card-body">
                <form action="proses_tambah_maps.php" method="POST">
                    <input type="text" name="maps_url" class="form-control mb-3" placeholder="URL Google Maps" required>
                    <button type="submit" class="btn btn-primary">Simpan URL Maps</button>
                </form>
                <hr>
                <h5>Daftar Google Maps</h5>
                <ul class="list-group">
                    <!-- Google Maps URL Items -->
                    <li class="list-group-item">
                        <a href="https://www.google.com/maps/embed?pb=..." target="_blank">Lokasi 1</a>
                        <a href="edit_maps.php?id=1" class="btn btn-sm btn-warning float-end mx-1">Edit</a>
                        <a href="hapus_maps.php?id=1" class="btn btn-sm btn-danger float-end">Hapus</a>
                    </li>
                    <!-- Add more items here if needed -->
                </ul>
            </div>
        </div>

    </div>

</body>

</html>
