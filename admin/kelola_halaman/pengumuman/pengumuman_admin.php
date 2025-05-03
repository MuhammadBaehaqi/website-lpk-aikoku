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

$pageTitle = 'Kelola Halaman / Pengumuman';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $pageTitle; ?> - Admin
    </title>
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
            <div class="card-header">Atur Hero Section</div>
            <div class="card-body">
                <form method="POST" action="proses_hero.php">
                    <div class="mb-3">
                        <label for="hero_title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="hero_title" name="hero_title" required>
                    </div>
                    <div class="mb-3">
                        <label for="hero_description" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="hero_description" name="hero_description" required>
                    </div>
                    <div class="mb-3">
                        <label for="hero_image" class="form-label">URL Gambar</label>
                        <input type="url" class="form-control" id="hero_image" name="hero_image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui Hero Section</button>
                </form>
            </div>
        </div>
    
        <!-- Form Tambah Pengumuman -->
        <div class="card mb-4">
            <div class="card-header">Tambah Pengumuman</div>
            <div class="card-body">
                <form method="POST" action="proses_tambah.php">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor Pendaftaran</label>
                        <input type="text" class="form-control" id="nomor" name="nomor" required>
                    </div>
                    <div class="mb-3">
                        <label for="program" class="form-label">Program</label>
                        <select class="form-select" id="program" name="program">
                            <option value="Magang">Magang</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Tokutei">Tokutei Ginou</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="Lolos">Lolos</option>
                            <option value="Tidak Lolos">Tidak Lolos</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Pengumuman</button>
                </form>
            </div>
        </div>
    
        <!-- Tabel Data Pengumuman -->
        <div class="card">
            <div class="card-header">Daftar Pengumuman</div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nomor Pendaftaran</th>
                            <th>Program</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ahmad Fauzan</td>
                            <td>2025001</td>
                            <td>Magang</td>
                            <td><span class="badge bg-success">Lolos</span></td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Siti Aisyah</td>
                            <td>2025002</td>
                            <td>Engineering</td>
                            <td><span class="badge bg-success">Lolos</span></td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    </body>
    
    </html>