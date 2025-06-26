<?php
session_start();

// Pengecekan jika pengguna belum login
if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php");
    exit();
}

// Pengecekan jika pengguna bukan admin
if ($_SESSION['roles'] != 'admin') {
    header("Location: user_dashboard.php");
    exit();
}

$pageTitle = "Data Kontak";
include '../../includes/config.php';

// Ambil parameter
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$offset = ($page - 1) * $limit;

// Filter pencarian
$where = "";
if (!empty($search)) {
    $search_escaped = mysqli_real_escape_string($mysqli, $search);
    $where = "WHERE name LIKE '%$search_escaped%' OR email LIKE '%$search_escaped%' OR phone LIKE '%$search_escaped%' OR message LIKE '%$search_escaped%'";
}

// Query data kontak
$query = "SELECT * FROM tb_kontak $where ORDER BY date_sent DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($mysqli, $query);

// Total data untuk pagination
$total_query = mysqli_query($mysqli, "SELECT COUNT(*) as total FROM tb_kontak $where");
$total_data = mysqli_fetch_assoc($total_query)['total'];
$total_pages = ceil($total_data / $limit);

$no = $offset + 1;
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?> - LPK Aikoku Terpadu</title>
    <link rel="icon" href="../../img/logo.png" type="image/x-icon">
</head>

<body>
    <?php include '../../sidebar1.php'; ?>

    <div class="container mt-4 content">
        <h2><?= $pageTitle ?></h2>

        <!-- Search dan Show -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form method="GET" action="" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Cari user..."
                    value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        
            <form method="GET" action="" class="d-flex align-items-center gap-2">
                <label for="show" class="mb-0">Show:</label>
                <select name="show" id="show" class="form-select" onchange="this.form.submit()">
                    <?php
                    $options = [5, 10, 15, 20, 50];
                    foreach ($options as $option) {
                        $selected = ($show == $option) ? 'selected' : '';
                        echo "<option value='$option' $selected>$option</option>";
                    }
                    ?>
                </select>
                <input type="hidden" name="search" value="<?= htmlspecialchars($search) ?>">
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Pesan</th>
                        <th>Tanggal Kirim</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['phone']) ?></td>
                                <td><?= htmlspecialchars($row['address']) ?></td>
                                <td><?= htmlspecialchars($row['message']) ?></td>
                                <td><?= $row['date_sent'] ?></td>
                                <td>
                                    <a href='hapus_kontak.php?id_kontak=<?= $row['id_kontak'] ?>' class='btn btn-danger btn-sm' onclick='return confirm("Yakin ingin menghapus pesan ini?");'>
                                        <i class='bi bi-trash'></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">Tidak ada data ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>&limit=<?= $limit ?>&search=<?= urlencode($search) ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

</body>

</html>
