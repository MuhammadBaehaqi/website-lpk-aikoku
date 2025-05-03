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

$pageTitle = 'Kelola Halaman / Album';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - LPK Aikoku Terpadu</title>
    <link rel="icon" href="../../../logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal-body {
            max-height: 70vh;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <?php include '../../../sidebar1.php'; ?>
  
    <div class="container mt-4 content">
        <h2><?php echo $pageTitle; ?></h2>

        <!-- Form Pencarian dan Show (Search Kiri, Show Kanan) -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Form Pencarian -->
            <form method="GET" action="" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Cari album..."
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>

            <!-- Dropdown Show -->
            <form method="GET" action="" class="d-flex align-items-center gap-2">
                <label for="show" class="mb-0">Show:</label>
                <select name="show" id="show" class="form-select" onchange="this.form.submit()">
                    <?php
                    $options = [5, 10, 20, 50, 100];
                    foreach ($options as $option) {
                        $selected = (isset($_GET['show']) && $_GET['show'] == $option) ? 'selected' : '';
                        echo "<option value='$option' $selected>$option</option>";
                    }
                    ?>
                </select>
            </form>
        </div>

        <!-- Tombol Tambah Album (Modal) -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahAlbumModal">Tambah
            Album</button>

        <!-- Tabel Data Album -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Dibuat</th>
                        <th>Detail</th>
                        <th>Preview Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../../../config.php';
                    $query = "SELECT * FROM tb_album ORDER BY id_album ASC";

                    $result = mysqli_query($mysqli, $query);
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['deskripsi']; ?></td>
                            <td><?= $row['upload_date']; ?></td>
                            <td><?= $row['detail']; ?></td>
                            <td><img src="../../../<?= $row['foto_album']; ?>" width="100" class="img-thumbnail"></td>
                            <td>
                                <!-- Tombol untuk membuka modal Edit -->
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editAlbumModal<?= $row['id_album']; ?>">Edit</button>
                                <a href="hapus_album.php?id=<?= $row['id_album']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus album ini?');">Hapus</a>
                            </td>
                        </tr>

                        <!-- Modal Edit Album -->
                        <div class="modal fade" id="editAlbumModal<?= $row['id_album']; ?>" tabindex="-1"
                            aria-labelledby="editAlbumModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" style="margin-top: 50px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editAlbumModalLabel">Edit Album</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-warning" role="alert">
                                            Pastikan semua data diisi dengan benar sebelum menyimpan perubahan.
                                        </div>
                                        <form action="proses_edit_album.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $row['id_album']; ?>">

                                            <div class="mb-3">
                                                <label for="deskripsi" class="form-label">Deskripsi Album</label>
                                                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                                    value="<?= htmlspecialchars($row['deskripsi']); ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="detail" class="form-label">Detail Album (Kategori)</label>
                                                <select class="form-select" id="detail" name="detail" required>
                                                    <option value="">-- Pilih Kategori --</option>
                                                    <?php
                                                    $kategori = ['Keberangkatan', 'Kelulusan Job', 'Pendidikan LPK', 'Tanda Tangan Kontrak'];
                                                    foreach ($kategori as $k) {
                                                        $selected = ($row['detail'] == $k) ? 'selected' : '';
                                                        echo "<option value='$k' $selected>$k</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="foto_album" class="form-label">Ganti Foto (Opsional)</label>
                                                <input type="file" class="form-control" id="foto_album" name="foto_album"
                                                    accept="image/*">
                                                <p class="mt-2">Foto saat ini: <br><img
                                                        src="../../../<?= $row['foto_album']; ?>" width="150"
                                                        class="img-thumbnail"></p>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Album</button>
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

    <!-- Modal Tambah Album -->
    <div class="modal fade" id="tambahAlbumModal" tabindex="-1" aria-labelledby="tambahAlbumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="margin-top: 50px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahAlbumModalLabel">Tambah Album</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info" role="alert">
                        Lengkapi data album beserta foto untuk ditambahkan ke daftar album.
                    </div>
                    <form action="proses_tambah_album.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Album</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                        </div>

                        <div class="mb-3">
                            <label for="detail" class="form-label">Detail Album (Kategori)</label>
                            <select class="form-select" id="detail" name="detail" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Keberangkatan">Keberangkatan</option>
                                <option value="Kelulusan Job">Kelulusan Job</option>
                                <option value="Pendidikan LPK">Pendidikan LPK</option>
                                <option value="Tanda Tangan Kontrak">Tanda Tangan Kontrak</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="foto_album" class="form-label">Unggah Foto</label>
                            <input type="file" class="form-control" id="foto_album" name="foto_album" accept="image/*"
                                required>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan Album</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>