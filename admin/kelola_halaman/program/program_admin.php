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
    header("Location: dashboard_user.php"); // Atau ke halaman lain yang sesuai
    exit();
}

$pageTitle = 'Kelola Halaman / Program';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - LPK Aikoku Terpadu</title>
    <link rel="icon" href="../../../img/logo.png" type="image/x-icon">
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
    <?php include '../../../sidebar1.php'; ?>
    <div class="container mt-4 content">
        <h2><?php echo $pageTitle; ?></h2>

        <!-- Hero Section Program -->
        <div class="card mb-4">
            <div class="card-header">Kelola Hero Program</div>
            <div class="card-body">
                <!-- Tambah Hero Section -->
                <form action="hero/proses_tambah_hero_program.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="program" class="form-label">Program</label>
                    <select name="program" class="form-select" required>
                        <option value="" disabled selected>Pilih Program</option>
                        <option value="magang">Magang</option>
                        <option value="engineering">Engineering</option>
                        <option value="tokutei">Tokutei Ginou</option>
                    </select>
                </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" required maxlength="100">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required rows="3" maxlength="255"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Gambar</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
                <hr>

                <h5>Data Hero Program</h5>
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Program</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Tanggal Upload</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($mysqli, "SELECT * FROM tb_hero_program ORDER BY id_hero_program DESC");
                        $no = 1;
                        while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($data['program']) ?></td>
                                <td><?= htmlspecialchars($data['judul']) ?></td>
                                <td><?= htmlspecialchars($data['deskripsi']) ?></td>
                                <td><img src="../../../uploads/<?= $data['gambar'] ?>" width="100"></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($data['tanggal_upload'])) ?></td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editHero<?= $data['id_hero_program'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal Edit Hero -->
                            <div class="modal fade" id="editHero<?= $data['id_hero_program'] ?>" tabindex="-1"
                                aria-labelledby="editHeroLabel<?= $data['id_hero_program'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="hero/edit_hero_program.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $data['id_hero_program'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editHeroLabel<?= $data['id_hero_program'] ?>">Edit Hero Program</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Program</label>
                                                    <input type="text" class="form-control" value="<?= htmlspecialchars($data['program']) ?>"
                                                        readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Judul</label>
                                                    <input type="text" name="judul" class="form-control" required maxlength="100"
                                                        value="<?= htmlspecialchars($data['judul']) ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control" required rows="3"
                                                        maxlength="255"><?= htmlspecialchars($data['deskripsi']) ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Gambar Saat Ini</label><br>
                                                    <img src="../../../uploads/<?= $data['gambar'] ?>" width="100" class="mb-2">
                                                    <input type="file" name="gambar" class="form-control" accept="image/*">
                                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>

        <!-- Form Tambah Persyaratan -->
        <div class="card mb-4">
            <div class="card-header">Tambah Persyaratan</div>
            <div class="card-body">
                <form action="persyaratan/proses_tambah_persyaratan.php" method="POST">
                    <div class="mb-3">
                        <label for="program" class="form-label">Program</label>
                        <select name="program" class="form-select" required>
                            <option value="magang">Magang</option>
                            <option value="engineering">Engineering</option>
                            <option value="tokutei">Tokutei Ginou</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Persyaratan</label>
                        <select name="jenis" class="form-select" required>
                            <option value="umum">Umum</option>
                            <option value="dokumen">Dokumen</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Persyaratan</label>
                        <textarea name="isi" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    <!-- Data Persyaratan Dipisah per Program dan Jenis -->
    <div class="card mb-4">
        <div class="table-responsive">
        <div class="card-header">Data Persyaratan (Dipisah per Program dan Jenis)</div>
        <div class="card-body">
            <?php
            $programs = ['magang', 'engineering', 'tokutei'];
            $jenisList = ['umum', 'dokumen'];

            foreach ($programs as $program) {
                echo "<h4 class='mt-4 text-primary'>Program: " . ucfirst($program) . "</h4>";
                foreach ($jenisList as $jenis) {
                    echo "<h6 class='mt-3'>Jenis: " . ucfirst($jenis) . "</h6>";

                    $query = "SELECT * FROM tb_persyaratan_program WHERE program = '$program' AND jenis = '$jenis' ORDER BY id ASC";
                    $result = mysqli_query($mysqli, $query);

                    $no = 1; // ✅ RESET nomor urut tiap jenis
            
                    if (mysqli_num_rows($result) > 0) {
                        echo '<table class="table table-bordered mb-4">';
                        echo '<thead class="table-light"><tr>
                                <th>No</th>
                                <th>Isi Persyaratan</th>
                                <th>Aksi</th>
                            </tr></thead><tbody>';

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['isi']) ?></td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal<?= $id ?>"><i class="fas fa-edit"></i>
                                    </button>
            
                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#hapusModal<?= $id ?>"><i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            
                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal<?= $id ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $id ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="persyaratan/edit_persyaratan.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel<?= $id ?>">Edit Persyaratan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Program</label>
                                                        <select name="program" class="form-select" required>
                                                            <option value="magang" <?= $row['program'] == 'magang' ? 'selected' : '' ?>>Magang
                                                            </option>
                                                            <option value="engineering" <?= $row['program'] == 'engineering' ? 'selected' : '' ?>>
                                                                Engineering</option>
                                                            <option value="tokutei" <?= $row['program'] == 'tokutei' ? 'selected' : '' ?>>Tokutei
                                                                Ginou</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jenis</label>
                                                        <select name="jenis" class="form-select" required>
                                                            <option value="umum" <?= $row['jenis'] == 'umum' ? 'selected' : '' ?>>Umum</option>
                                                            <option value="dokumen" <?= $row['jenis'] == 'dokumen' ? 'selected' : '' ?>>Dokumen
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Isi</label>
                                                        <textarea name="isi" class="form-control"
                                                            required><?= htmlspecialchars($row['isi']) ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
        
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapusModal<?= $id ?>" tabindex="-1" aria-labelledby="hapusModalLabel<?= $id ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="persyaratan/hapus_persyaratan.php" method="GET">
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapusModalLabel<?= $id ?>">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah kamu yakin ingin menghapus persyaratan ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                            }
                            echo '</tbody></table>';
                        } else {
                            echo "<p class='text-muted fst-italic'>Tidak ada data persyaratan.</p>";
                        }
                    }
                }
                ?>
            </div>
        </div>
        </div>
    </div>
</body>

</html>