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
</head>

<body>

    <?php include '../../../sidebar1.php'; ?>

    <div class="content">
        <h2 class="mb-4"><?php echo $pageTitle; ?></h2>

        <!-- Hero Section -->
        <div class="card mb-4">
            <div class="card-header">Kelola Hero Section</div>
            <div class="card-body">
                <form action="hero/proses_tambah_hero.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="hero_title" class="form-control mb-3" placeholder="Judul" required>
                    <input type="text" name="hero_description" class="form-control mb-3" placeholder="Deskripsi"
                        required>
                    <input type="file" name="hero_image" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Tambah Hero</button>
                </form>
                <hr>
                <h5>Daftar Hero</h5>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Tanggal Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../../../config.php';
                        // Query untuk mengambil data hero section kontak
                        $query = "SELECT * FROM tb_hero_kontak ORDER BY id_hero DESC LIMIT 1";
                        $result = mysqli_query($mysqli, $query);
                        $no = 1;
                        while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($data['judul']) ?></td>
                                <td><?= htmlspecialchars($data['deskripsi']) ?></td>
                                <td><img src="../../../uploads/<?= $data['gambar'] ?>" width="100"></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($data['tanggal_upload'])) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php

        // Query untuk menampilkan semua data kontak
        $query = "SELECT * FROM tb_informasi_kontak";
        $result = mysqli_query($mysqli, $query);
        ?>

        <!-- Informasi Kontak -->
        <div class="card mb-4">
            <div class="card-header">Kelola Informasi Kontak</div>
            <div class="card-body">
                <form action="informasi/proses_tambah_kontak.php" method="POST">
                    <input type="text" name="alamat" class="form-control mb-3" placeholder="Alamat" required>
                    <input type="email" name="email_kontak" class="form-control mb-3" placeholder="Email" required>
                    <input type="text" name="telepon" class="form-control mb-3" placeholder="Telepon" required>
                    <input type="text" name="jam_kerja" class="form-control mb-3" placeholder="Jam Kerja" required>
                    <input type="text" name="jam_sabtu" class="form-control mb-3" placeholder="Jam Kerja Sabtu"
                        required>
                    <input type="text" name="catatan" class="form-control mb-3" placeholder="Catatan Tambahan">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
                <hr>
                <h5>Daftar Kontak</h5>
                <ul class="list-group">
                    <?php
                    // Loop untuk menampilkan semua kontak
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <li class="list-group-item">
                            <strong>Dibuat pada:</strong> <?= date('d-m-Y H:i:s', strtotime($row['created_at'])); ?><br>
                            Alamat: <?= $row['alamat']; ?> |
                            Email: <?= $row['email_kontak']; ?> |
                            Telepon: <?= $row['telepon']; ?> |
                            Jam Kerja: <?= $row['jam_kerja']; ?> |
                            Jam Kerja Sabtu: <?= $row['jam_sabtu']; ?> |
                            Catatan: <?= $row['catatan']; ?>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Kelola Google Maps</div>
            <div class="card-body">
                <form action="maps/proses_tambah_maps.php" method="POST">
                    <input type="text" name="maps_url" class="form-control mb-3" placeholder="URL Google Maps" required>
                    <button type="submit" class="btn btn-primary">Simpan URL Maps</button>
                </form>
                <hr>
                <h5>Daftar Google Maps</h5>
                <ul class="list-group">
                    <?php
                    include '../../../config.php';

                    // Query untuk mengambil semua URL Google Maps
                    $query_maps = "SELECT * FROM tb_kontak_maps ORDER BY id_maps DESC";
                    $result_maps = mysqli_query($mysqli, $query_maps);
                    while ($data_maps = mysqli_fetch_assoc($result_maps)) {
                        ?>
                        <li class="list-group-item">
                            <a href="<?= $data_maps['maps_url'] ?>" target="_blank"><?= $data_maps['maps_url'] ?></a>
                            <br>
                            <small>Diupdate pada: <?= date('d-m-Y H:i:s', strtotime($data_maps['created_at'])) ?></small>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>