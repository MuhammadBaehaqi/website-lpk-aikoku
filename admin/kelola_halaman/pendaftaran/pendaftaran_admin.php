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

$pageTitle = 'Kelola Halaman / Pendaftaran';
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
            <div class="card-header">Kelola Hero Pendaftaran</div>
            <div class="card-body">
                <form action="hero/proses_tambah_hero_pendaftaran.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="hero_title" class="form-control mb-3" placeholder="Judul" required>
                    <input type="text" name="hero_description" class="form-control mb-3" placeholder="Deskripsi"
                        required>
                    <input type="file" name="hero_image" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Tambah Hero</button>
                </form>
                <hr>
                <h5>Tabel Hero Pendaftaran</h5>
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
                        // Query untuk mengambil data hero section pendaftaran
                        $query = "SELECT * FROM tb_hero_pendaftaran ORDER BY id_hero DESC LIMIT 1";
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
    </div>

</body>

</html>