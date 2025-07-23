<?php
session_start();

include '../../../includes/config.php';
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
    <title><?php echo $pageTitle; ?> - Admin</title>
    <link rel="icon" href="../../../img/logo.png" type="image/x-icon">
    <style>
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            width: 100%;
        }

        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 4px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background-color: transparent;
        }
    </style>
</head>

<body>
    <?php include '../../../sidebar1.php'; ?>

    <div class="content">
        <h2 class="mb-4"><?php echo $pageTitle; ?></h2>

        <!-- Hero Section -->
        <div class="card mb-4">
            <div class="card-header">Atur Hero Section</div>
            <div class="card-body">
                <form method="POST" action="hero/proses_hero.php" enctype="multipart/form-data">
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
                    <button type="submit" class="btn btn-success">Perbarui Hero Section</button>
                </form>
            </div>
        </div>
        <!-- Hero Section Tabel -->
        <div class="card mb-4">
            <div class="card-header">Data Hero Section</div>
            <div class="card-body">
                <div class="table-responsive">
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
        </div>

        <?php
        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 10;
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $search_escaped = mysqli_real_escape_string($mysqli, $search);
        $offset = ($page - 1) * $limit;

        $where = "p.status IN ('Lolos', 'Tidak Lolos')";
        if (!empty($search)) {
            $where .= " AND (p.nama_lengkap LIKE '%$search_escaped%' OR p.nomor_pendaftaran LIKE '%$search_escaped%')";
        }
        // Hitung total data
        $count_sql = "SELECT COUNT(*) as total FROM tb_pendaftaran p WHERE $where";
        $count_result = mysqli_query($mysqli, $count_sql);
        $total_data = mysqli_fetch_assoc($count_result)['total'];
        $total_pages = ceil($total_data / $limit);
        ?>

        <!-- Tabel Daftar Pendaftar Lolos -->
        <form method="GET" class="d-flex mb-3">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari nama atau nomor pendaftaran..."
                value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
            <select name="limit" class="form-select w-auto me-2" onchange="this.form.submit()">
                <?php
                $limits = [5, 10, 15, 20];
                foreach ($limits as $val) {
                    $selected = ($limit == $val) ? 'selected' : '';
                    echo "<option value='$val' $selected>$val</option>";
                }
                ?>
            </select>
            <button type="submit" class="btn btn-success">Tampilkan</button>
        </form>

        <div class="card mb-4">
            <div class="card-header">Daftar Pendaftar (Lolos dan Tidak Lolos)</div>
            <div class="card-body">
                <div class="table-responsive">
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
                        WHERE $where
                        ORDER BY p.id_pendaftaran ASC
                        LIMIT $limit OFFSET $offset";
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
                                        <a href="tayang/hapus_tayang.php?id=<?= $row['id_pendaftaran'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus dari pengumuman?')">Hapus dari
                                            Pengumuman</a>
                                    <?php else: ?>
                                        <a href="tayang/tambah_tayang.php?id=<?= $row['id_pendaftaran'] ?>"
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
                <nav>
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>&limit=<?= $limit ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>

</html>