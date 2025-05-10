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
include '../../config.php';

// Ambil parameter search dan show
$search = isset($_GET['search']) ? $_GET['search'] : '';
$show = isset($_GET['show']) ? intval($_GET['show']) : 10;

// Query untuk data user dengan pencarian
$where = "";
if (!empty($search)) {
    $searchEscaped = mysqli_real_escape_string($mysqli, $search);
    $where = "WHERE username LIKE '%$searchEscaped%' OR email_pengguna LIKE '%$searchEscaped%'";
}

$query = mysqli_query($mysqli, "SELECT * FROM tb_pengguna $where LIMIT $show");
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../logo.png" type="image/x-icon">
    <title><?= $pageTitle ?> - LPK Aikoku Terpadu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            </form>

        </div>

        <!-- Tombol Tambah -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahUserModal">Tambah
            User</button>

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

        <!-- Tabel User -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($data['username']) ?></td>
                            <td><?= htmlspecialchars($data['email_pengguna']) ?></td>
                            <td><?= ucfirst($data['roles']) ?></td>
                            <td>
                                <!-- Edit -->
                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editUserModal<?= $data['id_pengguna'] ?>">Edit</a>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editUserModal<?= $data['id_pengguna'] ?>" tabindex="-1"
                                    aria-labelledby="editUserModalLabel<?= $data['id_pengguna'] ?>" aria-hidden="true">
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
                                                            <option value="admin" <?= $data['roles'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                                            <option value="user" <?= $data['roles'] == 'user' ? 'selected' : '' ?>>User</option>
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

                                <!-- Hapus -->
                                <a href="hapus_user.php?id=<?= $data['id_pengguna'] ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus user ini?');">Hapus</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>