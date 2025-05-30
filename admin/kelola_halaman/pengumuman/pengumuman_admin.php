<?php
session_start();

include '../../../config.php';
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
</head>

<body>
    <?php include '../../../sidebar1.php'; ?>

    <div class="content">
        <h2 class="mb-4"><?php echo $pageTitle; ?></h2>

        <!-- Hero Section -->
        <div class="card mb-4">
            <div class="card-header">Atur Hero Section</div>
            <div class="card-body">
                <form method="POST" action="proses_hero.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="hero_title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="hero_title" name="hero_title" required>
                    </div>
                    <div class="mb-3">
                        <label for="hero_description" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="hero_description" name="hero_description" required>
                    </div>
                    <div class="mb-3">
                        <label for="hero_image" class="form-label">Pilih Gambar</label>
                        <input type="file" class="form-control" id="hero_image" name="hero_image" accept="image/*"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui Hero Section</button>
                </form>
            </div>
        </div>
        <!-- Hero Section Tabel -->
        <div class="card mb-4">
            <div class="card-header">Data Hero Section</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query untuk mengambil data hero section dari database
                        $query = "SELECT * FROM tb_hero_pengumuman ORDER BY id DESC";
                        $result = mysqli_query($mysqli, $query);
                        $no = 1;
                        while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['hero_title']; ?></td>
                                <td><?php echo $data['hero_description']; ?></td>
                                <td><img src="../../../uploads/<?php echo $data['hero_image']; ?>" alt="Gambar Hero"
                                        width="100"></td>
                                <td><?php echo date('d-m-Y H:i:s', strtotime($data['created_at'])); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Tabel Daftar Pendaftar Lolos -->
        <div class="card mb-4">
            <div class="card-header">Daftar Pendaftar (Lolos dan Tidak Lolos)</div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nomor Pendaftaran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT p.id_pendaftaran, p.nama_lengkap, p.nomor_pendaftaran, p.status,
                    t.id AS id_tayang
             FROM tb_pendaftaran p
             LEFT JOIN tb_pengumuman_tayang t ON t.id_pendaftaran = p.id_pendaftaran
             WHERE p.status IN ('Lolos', 'Tidak Lolos')
             ORDER BY p.id_pendaftaran ASC";
                        $result = mysqli_query($mysqli, $sql);
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)):
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                                <td><?= htmlspecialchars($row['nomor_pendaftaran']) ?></td>
                                <td><span class="badge bg-success"><?= $row['status'] ?></span></td>
                                <td>
                                    <?php if ($row['id_tayang']): ?>
                                        <a href="hapus_tayang.php?id=<?= $row['id_pendaftaran'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus dari pengumuman?')">Hapus dari
                                            Pengumuman</a>
                                    <?php else: ?>
                                        <a href="tambah_tayang.php?id=<?= $row['id_pendaftaran'] ?>"
                                            class="btn btn-success btn-sm"
                                            onclick="return confirm('Tampilkan di halaman pengumuman?')">Tampilkan di
                                            Pengumuman</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>