<?php
session_start();
include '../../../includes/config.php';
//hero section
$hero_result = mysqli_query($mysqli, "SELECT * FROM tb_hero_profile ORDER BY id_hero DESC");

//sejarah
$sejarah = mysqli_query($mysqli, "SELECT * FROM tb_profile_sejarah ORDER BY id DESC LIMIT 1");

//sambutan
$sambutan_result = mysqli_query($mysqli, "SELECT * FROM tb_profile_sambutan ORDER BY tanggal_upload DESC LIMIT 1");

//visi dan misi
$data = mysqli_query($mysqli, "SELECT * FROM tb_profile_visimisi ORDER BY tanggal_upload DESC LIMIT 1");
$visimisi = mysqli_fetch_assoc($data);

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

$pageTitle = 'Kelola Halaman / Profile';

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - Admin</title>
    <link rel="icon" href="../../../img/logo.png" type="image/x-icon">
</head>

<body>

    <?php include '../../../sidebar1.php'; ?>

    <div class="content">
        <h2 class="mb-4"><?php echo $pageTitle; ?></h2>

        <!-- Hero Section -->
        <div class="card mb-4">
            <div class="card-header">Kelola Hero Section</div>
            <div class="card-body">
                <form action="hero/proses_tambah_hero_profile.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="judul" class="form-control mb-3" placeholder="Judul" required>
                    <input type="text" name="deskripsi" class="form-control mb-3" placeholder="Deskripsi" required>
                    <input type="file" name="gambar" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Tambah Hero</button>
                </form>
            </div>
        </div>
        <!-- Tabel Menampilkan Data Hero -->
        <div class="card mb-4">
            <div class="card-header">Data Hero Section</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Tanggal Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($hero_result)) {
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['judul']; ?></td>
                                <td><?= $row['deskripsi']; ?></td>
                                <td>
                                    <img src="../../../uploads/<?= $row['gambar']; ?>" width="150" alt="Hero Gambar">
                                </td>
                                <td><?= date('d-m-Y H:i:s', strtotime($row['upload_date'])); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Sejarah -->
        <div class="card mb-4">
            <div class="card-header">Kelola Sejarah LPK</div>
            <div class="card-body">
                <form action="sejarah/proses_tambah_sejarah.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="judul_atas" class="form-control mb-3"
                        placeholder="Judul Atas (contoh: SEJARAH)" required>
                    <input type="text" name="judul_bawah" class="form-control mb-3"
                        placeholder="Sub Judul (contoh: LPK AIKOKU TERPADU)" required>
                    <input type="text" name="judul_tengah" class="form-control mb-3"
                        placeholder="Judul Tengah (contoh: LPK Aikoku Terpadu)" required>

                    <textarea name="paragraf1" class="form-control mb-3" placeholder="Paragraf 1 Sejarah"
                        required></textarea>
                    <textarea name="paragraf2" class="form-control mb-3" placeholder="Paragraf 2 Sejarah"
                        required></textarea>

                    <label class="form-label">Gambar Sejarah</label>
                    <input type="file" name="gambar" class="form-control mb-3" required>

                    <button type="submit" class="btn btn-primary">Simpan Sejarah</button>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Data Sejarah LPK</div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Judul Atas</th>
                            <th>Judul Bawah</th>
                            <th>Judul Tengah</th>
                            <th>Paragraf 1</th>
                            <th>Paragraf 2</th>
                            <th>Gambar</th>
                            <th>Tanggal Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        while ($data = mysqli_fetch_assoc($sejarah)) {
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['judul_atas']; ?></td>
                                <td><?= $data['judul_bawah']; ?></td>
                                <td><?= $data['judul_tengah']; ?></td>
                                <td><?= $data['paragraf1']; ?></td>
                                <td><?= $data['paragraf2']; ?></td>
                                <td><img src="../../../uploads/<?= $data['gambar']; ?>" width="100"></td>
                                <td><?= date('d-m-Y H:i', strtotime($data['tanggal_upload'])); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Sambutan Kepala Sekolah -->
        <div class="card mb-4">
            <div class="card-header">Kelola Sambutan Kepala Sekolah</div>
            <div class="card-body">
                <form action="sambutan/proses_tambah_sambutan.php" method="POST" enctype="multipart/form-data">
                    <textarea name="paragraf_1" class="form-control mb-3" placeholder="Paragraf 1" required></textarea>
                    <textarea name="paragraf_2" class="form-control mb-3" placeholder="Paragraf 2" required></textarea>
                    <textarea name="paragraf_3" class="form-control mb-3" placeholder="Paragraf 3" required></textarea>
                    <textarea name="paragraf_4" class="form-control mb-3" placeholder="Paragraf 4" required></textarea>
                    <input type="text" name="nama_kepala" class="form-control mb-3" placeholder="Nama Kepala Sekolah"
                        required>
                    <input type="file" name="gambar" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Tambah Sambutan</button>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar Sambutan -->
        <div class="card mb-4">
            <div class="card-header">Daftar Sambutan Kepala Sekolah</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Atas</th>
                            <th>Judul Bawah</th>
                            <th>Judul Tengah</th>
                            <th>Judul Tengah</th>
                            <th>Nama Kepala</th>
                            <th>Gambar</th>
                            <th>Tanggal Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Tampilkan setiap sambutan
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($sambutan_result)) {
                            echo "<tr>";
                            echo "<td>$no</td>";
                            echo "<td>" . htmlspecialchars($row['paragraf_1']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['paragraf_2']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['paragraf_3']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['paragraf_4']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nama_kepala']) . "</td>";
                            echo "<td><img src='../../../uploads/" . htmlspecialchars($row['gambar']) . "' width='100'></td>";
                            echo "<td>" . date('d-m-Y', strtotime($row['tanggal_upload'])) . "</td>";
                            echo "</tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="card mb-4">
            <div class="card-header">Kelola Visi & Misi</div>
            <div class="card-body">
                <form action="visi_misi/proses_tambah_visimisi.php" method="POST">
                    <textarea name="visi" class="form-control mb-3" placeholder="Visi" required></textarea>
                    <textarea name="misi" class="form-control mb-3" placeholder="Misi" required></textarea>
                    <button type="submit" class="btn btn-primary">Tambah Visi & Misi</button>
                </form>
                <hr>
                <h5>Visi Saat Ini:</h5>
                <p><?= isset($visimisi['visi']) ? nl2br($visimisi['visi']) : '<i>Data visi belum tersedia.</i>'; ?></p>
                <h5>Misi Saat Ini:</h5>
                <p><?= isset($visimisi['misi']) ? nl2br($visimisi['misi']) : '<i>Data misi belum tersedia.</i>'; ?></p>
                <a href="edit_visimisi.php" class="btn btn-warning mt-3">Edit Visi & Misi</a>
                <a href="hapus_visimisi.php" class="btn btn-danger mt-3">Hapus Visi & Misi</a>
            </div>
        </div>

        <!-- Tim Pengurus -->
        <div class="card mb-4">
            <div class="card-header">Tambah Tim Pengurus</div>
            <div class="card-body">
                <form action="pengurus/proses_tambah_pengurus.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama_pengurus" class="form-control mb-3" placeholder="Nama Pengurus"
                        required>
                    <input type="text" name="jabatan" class="form-control mb-3" placeholder="Jabatan" required>
                    <textarea name="deskripsi" class="form-control mb-3" placeholder="Deskripsi" required></textarea>
                    <input type="file" name="foto" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Tambah Pengurus</button>
                </form>
            </div>
        </div>
        <?php
        $pengurus_result = mysqli_query($mysqli, "SELECT * FROM tb_profile_pengurus ORDER BY id_pengurus ASC");
        ?>
        <div class="card mb-4">
            <div class="card-header">Kelola Tim Pengurus</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-success">
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($pengurus_result)) : ?>
                                <tr>
                                    <td><img src="../../../uploads/<?= $row['foto']; ?>" width="60" class="rounded-circle"></td>
                                    <td><?= $row['nama_pengurus']; ?></td>
                                    <td><?= $row['jabatan']; ?></td>
                                    <td><?= $row['deskripsi']; ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id_pengurus']; ?>">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $row['id_pengurus']; ?>">Hapus</button>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal<?= $row['id_pengurus']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['id_pengurus']; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="pengurus/update_pengurus.php" method="POST" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel<?= $row['id_pengurus']; ?>">Edit Tim Pengurus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_pengurus" value="<?= $row['id_pengurus']; ?>">
                                                    
                                                    <div class="mb-3">
                                                        <label>Nama Pengurus</label>
                                                        <input type="text" name="nama_pengurus" class="form-control" value="<?= $row['nama_pengurus']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Jabatan</label>
                                                        <input type="text" name="jabatan" class="form-control" value="<?= $row['jabatan']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Deskripsi</label>
                                                        <textarea name="deskripsi" class="form-control" rows="3"><?= $row['deskripsi']; ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Foto (biarkan kosong jika tidak diganti)</label>
                                                        <input type="file" name="foto" class="form-control">
                                                    </div>
                                                    <div class="text-center">
                                                        <img src="../../../uploads/<?= $row['foto']; ?>" width="100" class="rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapusModal<?= $row['id_pengurus']; ?>" tabindex="-1" aria-labelledby="hapusModalLabel<?= $row['id_pengurus']; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <form action="pengurus/hapus_pengurus.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $row['id_pengurus']; ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah kamu yakin ingin menghapus data:
                                                    <br><strong><?= htmlspecialchars($row['nama_pengurus']); ?></strong>?
                                                    <br><img src="../../../uploads/<?= $row['foto']; ?>" width="80" class="rounded-circle mt-2">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Legalitas -->
        <div class="card mb-4">
            <div class="card-header">Kelola Legalitas</div>
            <div class="card-body">
            <form action="legalitas/proses_tambah_legalitas.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                    <input type="text" name="nomor_surat" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Upload Logo</label>
                    <input type="file" name="logo" class="form-control" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan Legalitas</button>
            </form>
            </div>
        </div>
        <?php
        $query = "SELECT * FROM tb_profile_legalitas ORDER BY tanggal_upload ASC";
        $result = mysqli_query($mysqli, $query);
        ?>
        
        <h2 class="my-4">Data Legalitas</h2>
        
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Logo</th>
                    <th>Deskripsi</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Upload</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php $no = 1;
                    while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['judul']; ?></td>
                            <td><img src="../../../uploads/<?= $row['logo']; ?>" alt="Logo" width="50"></td>
                            <td><?= $row['deskripsi']; ?></td>
                            <td><?= $row['nomor_surat']; ?></td>
                            <td><?= date('d-m-Y', strtotime($row['tanggal_upload'])); ?></td>
                            <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id_legalitas']; ?>">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $row['id_legalitas']; ?>">Hapus</button>
                            </td>
                        </tr>
                        <!-- Modal Edit Legalitas -->
                        <div class="modal fade" id="editModal<?= $row['id_legalitas']; ?>" tabindex="-1"
                            aria-labelledby="editModalLabel<?= $row['id_legalitas']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="legalitas/proses_edit_legalitas.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Legalitas</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id_legalitas" value="<?= $row['id_legalitas']; ?>">
                        
                                            <div class="mb-3">
                                                <label class="form-label">Judul</label>
                                                <input type="text" name="judul" class="form-control" value="<?= $row['judul']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi</label>
                                                <textarea name="deskripsi" class="form-control" rows="3"
                                                    required><?= $row['deskripsi']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nomor Surat</label>
                                                <input type="text" name="nomor_surat" class="form-control" value="<?= $row['nomor_surat']; ?>"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Upload Logo (Opsional)</label>
                                                <input type="file" name="logo" class="form-control" accept="image/*">
                                                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti logo.</small>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Hapus -->
                        <div class="modal fade" id="hapusModal<?= $row['id_legalitas']; ?>" tabindex="-1" aria-labelledby="hapusModalLabel<?= $row['id_legalitas']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <form action="legalitas/hapus_legalitas.php" method="GET">
                                <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                <p>Yakin ingin menghapus data <strong><?= $row['judul']; ?></strong>?</p>
                                <input type="hidden" name="id" value="<?= $row['id_legalitas']; ?>">
                                </div>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data legalitas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>

</html>