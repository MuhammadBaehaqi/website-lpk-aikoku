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

$pageTitle = 'Kelola Halaman / Profile';
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

                <!-- Tombol Edit dan Hapus -->
                <a href="edit_hero.php" class="btn btn-warning mt-3">Edit Hero</a>
                <a href="hapus_hero.php" class="btn btn-danger mt-3">Hapus Hero</a>
            </div>
        </div>

        <!-- Sejarah -->
        <div class="card mb-4">
            <div class="card-header">Kelola Sejarah</div>
            <div class="card-body">
                <form action="proses_tambah_sejarah.php" method="POST" enctype="multipart/form-data">
                    <textarea name="sejarah" class="form-control mb-3" placeholder="Deskripsi Sejarah"
                        required></textarea>
                    <input type="file" name="gambar" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Tambah Sejarah</button>
                </form>

                <a href="edit_sejarah.php" class="btn btn-warning mt-3">Edit Sejarah</a>
                <a href="hapus_sejarah.php" class="btn btn-danger mt-3">Hapus Sejarah</a>
            </div>
        </div>

        <!-- Sambutan Kepala Sekolah -->
        <div class="card mb-4">
            <div class="card-header">Kelola Sambutan Kepala Sekolah</div>
            <div class="card-body">
                <form action="proses_tambah_sambutan.php" method="POST" enctype="multipart/form-data">
                    <textarea name="sambutan" class="form-control mb-3" placeholder="Isi Sambutan" required></textarea>
                    <input type="text" name="nama_kepala" class="form-control mb-3" placeholder="Nama Kepala Sekolah"
                        required>
                    <input type="file" name="gambar" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Tambah Sambutan</button>
                </form>

                <a href="edit_sambutan.php" class="btn btn-warning mt-3">Edit Sambutan</a>
                <a href="hapus_sambutan.php" class="btn btn-danger mt-3">Hapus Sambutan</a>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="card mb-4">
            <div class="card-header">Kelola Visi & Misi</div>
            <div class="card-body">
                <form action="proses_tambah_visimisi.php" method="POST">
                    <textarea name="visi" class="form-control mb-3" placeholder="Visi" required></textarea>
                    <textarea name="misi" class="form-control mb-3" placeholder="Misi" required></textarea>
                    <button type="submit" class="btn btn-primary">Tambah Visi & Misi</button>
                </form>

                <a href="edit_visimisi.php" class="btn btn-warning mt-3">Edit Visi & Misi</a>
                <a href="hapus_visimisi.php" class="btn btn-danger mt-3">Hapus Visi & Misi</a>
            </div>
        </div>

        <!-- Tim Pengurus -->
        <div class="card mb-4">
            <div class="card-header">Kelola Tim Pengurus</div>
            <div class="card-body">
                <form action="proses_tambah_pengurus.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama" class="form-control mb-3" placeholder="Nama" required>
                    <input type="text" name="jabatan" class="form-control mb-3" placeholder="Jabatan" required>
                    <textarea name="deskripsi" class="form-control mb-3" placeholder="Deskripsi" required></textarea>
                    <input type="file" name="gambar" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Tambah Pengurus</button>
                </form>

                <a href="edit_pengurus.php" class="btn btn-warning mt-3">Edit Pengurus</a>
                <a href="hapus_pengurus.php" class="btn btn-danger mt-3">Hapus Pengurus</a>
            </div>
        </div>

        <!-- Legalitas -->
        <div class="card mb-4">
            <div class="card-header">Kelola Legalitas</div>
            <div class="card-body">
                <form action="proses_tambah_legalitas.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="no_legalitas" class="form-control mb-3" placeholder="Nomor Legalitas"
                        required>
                    <input type="file" name="gambar" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Tambah Legalitas</button>
                </form>

                <a href="edit_legalitas.php" class="btn btn-warning mt-3">Edit Legalitas</a>
                <a href="hapus_legalitas.php" class="btn btn-danger mt-3">Hapus Legalitas</a>
            </div>
        </div>
    </div>

</body>

</html>