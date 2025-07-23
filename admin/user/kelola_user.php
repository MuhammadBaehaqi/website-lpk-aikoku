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

$pageTitle = "Kelola User";
include '../../includes/config.php';

// Ambil parameter search, show, dan page
$search = isset($_GET['search']) ? $_GET['search'] : '';
$show = isset($_GET['show']) ? intval($_GET['show']) : 10;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $show;

// Query untuk data user dengan pencarian
$filter = "";
if (!empty($search)) {
    $searchEscaped = mysqli_real_escape_string($mysqli, $search);
    $filter = "AND (username LIKE '%$searchEscaped%' OR email_pengguna LIKE '%$searchEscaped%')";
}

$query = mysqli_query($mysqli, "SELECT * FROM tb_pengguna WHERE roles='user' $filter LIMIT $show OFFSET $offset");

// Hitung total untuk pagination
$total_query = mysqli_query($mysqli, "SELECT COUNT(*) as total FROM tb_pengguna WHERE roles='user' $filter");
$total_data = mysqli_fetch_assoc($total_query)['total'];
$total_pages = ceil($total_data / $show);

$no = $offset + 1;
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../img/logo.png" type="image/x-icon">
    <title><?= $pageTitle ?> - LPK Aikoku Terpadu</title>
    <style>
        body,
        html {
            overflow-x: hidden;
        }

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

    <?php include '../../sidebar1.php'; ?>

    <div class="container mt-4 content">
        <h2><?= $pageTitle ?></h2>

        <!-- Search dan Show -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form method="GET" action="" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Cari user..."
                    value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="btn btn-success">Cari</button>
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

        <!-- Tombol Tambah -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahUserModal">Tambah Pengguna</button>

        <!-- Modal Tambah User -->
        <div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="tambahUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="margin-top: 50px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Form Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="proses_tambah_user.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="roles" class="form-label">Roles</label>
                                <select class="form-select" name="roles" required>
                                    <option value="">-- Pilih Roles --</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- TABEL ADMIN -->
        <div class="card shadow mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Daftar Admin</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped">
                        <thead>
                                <tr>
                                    <th class="bg-success text-white">No</th>
                                    <th class="bg-success text-white">Nama</th>
                                    <th class="bg-success text-white">Email</th>
                                    <th class="bg-success text-white">Roles</th>
                                    <th class="bg-success text-white">Aksi</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php
                            $noAdmin = 1;
                            $queryAdmin = mysqli_query($mysqli, "SELECT * FROM tb_pengguna WHERE roles='admin' $filter");
                            while ($data = mysqli_fetch_assoc($queryAdmin)) {
                                ?>
                                    <tr>
                                        <td><?= $noAdmin++ ?></td>
                                        <td><?= htmlspecialchars($data['username']) ?></td>
                                        <td><?= htmlspecialchars($data['email_pengguna']) ?></td>
                                        <td><?= ucfirst($data['roles']) ?></td>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editUserModal<?= $data['id_pengguna'] ?>"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="hapus_user.php?id=<?= $data['id_pengguna'] ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus user ini?');"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit Admin -->
                                    <div class="modal fade" id="editUserModal<?= $data['id_pengguna'] ?>" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" style="margin-top: 50px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Form Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="proses_edit_user.php" method="POST">
                                                        <input type="hidden" name="id_pengguna"
                                                            value="<?= $data['id_pengguna'] ?>">
                                                        <div class="mb-3">
                                                            <label class="form-label">Username</label>
                                                            <input type="text" class="form-control" name="username"
                                                                value="<?= htmlspecialchars($data['username']) ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" class="form-control" name="email"
                                                                value="<?= htmlspecialchars($data['email_pengguna']) ?>"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Roles</label>
                                                            <select class="form-select" name="roles" required>
                                                                <option value="admin" <?= $data['roles'] == 'admin' ? 'selected' : '' ?>>
                                                                    Admin
                                                                </option>
                                                                <option value="user" <?= $data['roles'] == 'user' ? 'selected' : '' ?>>User
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            <!-- TABEL USER -->
            <div class="card shadow mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Daftar User</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="bg-success text-white">No</th>
                                    <th class="bg-success text-white">Nama</th>
                                    <th class="bg-success text-white">Email</th>
                                    <th class="bg-success text-white">Roles</th>
                                    <th class="bg-success text-white">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $noUser = 1;
                                $queryUser = mysqli_query($mysqli, "SELECT * FROM tb_pengguna WHERE roles='user' $filter LIMIT $show OFFSET $offset");
                                while ($data = mysqli_fetch_assoc($queryUser)) {
                                    ?>
                                        <tr>
                                            <td><?= $noUser++ ?></td>
                                            <td><?= htmlspecialchars($data['username']) ?></td>
                                            <td><?= htmlspecialchars($data['email_pengguna']) ?></td>
                                            <td><?= ucfirst($data['roles']) ?></td>
                                            <td>
                                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editUserModal<?= $data['id_pengguna'] ?>"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="hapus_user.php?id=<?= $data['id_pengguna'] ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus user ini?');"
                                                    title="Hapus User">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                            </td>
                                        </tr>

                                        <!-- Modal Edit User -->
                                        <div class="modal fade" id="editUserModal<?= $data['id_pengguna'] ?>" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" style="margin-top: 50px;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Form Edit User</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="proses_edit_user.php" method="POST">
                                                            <input type="hidden" name="id_pengguna"
                                                                value="<?= $data['id_pengguna'] ?>">
                                                            <div class="mb-3">
                                                                <label class="form-label">Username</label>
                                                                <input type="text" class="form-control" name="username"
                                                                    value="<?= htmlspecialchars($data['username']) ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Email</label>
                                                                <input type="email" class="form-control" name="email"
                                                                    value="<?= htmlspecialchars($data['email_pengguna']) ?>"
                                                                    required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Roles</label>
                                                                <select class="form-select" name="roles" required>
                                                                    <option value="admin" <?= $data['roles'] == 'admin' ? 'selected' : '' ?>>
                                                                        Admin</option>
                                                                    <option value="user" <?= $data['roles'] == 'user' ? 'selected' : '' ?>>User
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-success">Simpan
                                                                Perubahan</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <nav>
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                        <a class="page-link"
                                            href="?page=<?= $i ?>&show=<?= $show ?>&search=<?= urlencode($search) ?>"><?= $i ?></a>
                                    </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                </div>
            </div>
</body>

</html>