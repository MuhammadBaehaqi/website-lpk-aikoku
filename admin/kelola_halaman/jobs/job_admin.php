<?php
session_start();
include '../../../includes/config.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../../../login.php");
    exit();
}

if ($_SESSION['roles'] != 'admin') {
    header("Location: dashboard_user.php");
    exit();
}

$pageTitle = 'Kelola Halaman / Bidang Pekerjaan';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?> - LPK Aikoku Terpadu</title>
    <link rel="icon" href="../../../img/logo.png" type="image/x-icon">
    <style>
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

        <!-- Form Tambah Bidang Pekerjaan -->
        <div class="card mb-4">
            <div class="card-header">Kelola Hero Bidang Pekerjaan</div>
            <div class="card-body">
                <form action="hero/proses_tambah_job.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama Bidang</label>
                        <select name="nama_job" class="form-select" required>
                            <option value="">-- Pilih Bidang --</option>
                            <option value="Perhotelan">Perhotelan</option>
                            <option value="Pertanian">Pertanian</option>
                            <option value="Pengolahan Makanan">Pengolahan Makanan</option>
                            <option value="Perawat Lansia">Perawat Lansia</option>
                            <option value="Konstruksi">Konstruksi</option>
                            <option value="Cleaning Service">Cleaning Service</option>
                            <option value="Restoran">Restoran</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi_job" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Gambar Hero</label>
                        <input type="file" name="hero_image" class="form-control" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="card mb-4">
            <div class="card-header">Data Bidang Pekerjaan</div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Gambar Hero</th>
                            <th>Tanggal Upload</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $result = mysqli_query($mysqli, "SELECT * FROM tb_job ORDER BY id_job ASC");
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['nama_job']) ?></td>
                                <td><?= htmlspecialchars($row['deskripsi_job']) ?></td>
                                <td><img src="../../../uploads/<?= $row['hero_image'] ?>" width="120"></td>
                                <td><?= date('d-m-Y H:i', strtotime($row['tanggal_upload'])) ?></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal<?= $row['id_job'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#hapusModal<?= $row['id_job'] ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal<?= $row['id_job'] ?>" tabindex="-1"
                                aria-labelledby="editModalLabel<?= $row['id_job'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="hero/edit_job.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id_job" value="<?= $row['id_job'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel<?= $row['id_job'] ?>">Edit
                                                    Bidang: <?= htmlspecialchars($row['nama_job']) ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Bidang</label>
                                                    <input type="text" name="nama_job" class="form-control bg-light"
                                                        value="<?= htmlspecialchars($row['nama_job']) ?>" readonly>
                                                    <small class="text-muted fst-italic">Bidang tidak dapat diubah.</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea name="deskripsi_job" class="form-control"
                                                        required><?= htmlspecialchars($row['deskripsi_job']) ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Gambar Hero Saat Ini</label><br>
                                                    <img src="../../../uploads/<?= $row['hero_image'] ?>" width="100">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Ganti Gambar Hero (Opsional)</label>
                                                    <input type="file" name="hero_image" class="form-control"
                                                        accept="image/*">
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
                            <div class="modal fade" id="hapusModal<?= $row['id_job'] ?>" tabindex="-1"
                                aria-labelledby="hapusModalLabel<?= $row['id_job'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="hero/hapus.php" method="GET">
                                        <input type="hidden" name="id" value="<?= $row['id_job'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="hapusModalLabel<?= $row['id_job'] ?>">Konfirmasi
                                                    Hapus</h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p>Apakah kamu yakin ingin menghapus bidang
                                                    <strong><?= htmlspecialchars($row['nama_job']) ?></strong>?
                                                </p>
                                                <p class="text-danger small fst-italic">Data yang dihapus tidak dapat
                                                    dikembalikan.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
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

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Tambah Detail Bidang Pekerjaan</h5>
            </div>
            <div class="card-body">
                <form action="detail job/proses_tambah_detail.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama Bidang</label>
                        <select name="nama_job" class="form-select" required>
                            <option value="">-- Pilih Bidang --</option>
                            <option value="Perhotelan">Perhotelan</option>
                            <option value="Pertanian">Pertanian</option>
                            <option value="Pengolahan Makanan">Pengolahan Makanan</option>
                            <option value="Perawat Lansia">Perawat Lansia</option>
                            <option value="Konstruksi">Konstruksi</option>
                            <option value="Cleaning Service">Cleaning Service</option>
                            <option value="Restoran">Restoran</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Konten</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Paragraf Deskripsi</label>
                        <textarea name="paragraf" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pengumuman</label>
                        <textarea name="pengumuman" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cakupan Tugas <small class="text-muted">(1 baris 1
                                tugas)</small></label>
                        <textarea name="cakupan_tugas" class="form-control" rows="3" required placeholder="Contoh:
                        Pengangkutan bahan bangunan
                        Persiapan lokasi kerja
                        Perakitan struktur">
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pendaftaran Terbuka Untuk <small class="text-muted">(1 baris 1
                                poin)</small></label>
                        <textarea name="pendaftaran_terbuka" class="form-control" rows="3" required placeholder="Contoh:
                        Kamu yang punya stamina kuat
                        Siap kerja di lapangan
                        Berkomitmen dan semangat tinggi">
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Persyaratan Umum <small class="text-muted">(1 baris 1
                                syarat)</small></label>
                        <textarea name="persyaratan_umum" class="form-control" rows="3" required placeholder="Contoh:
                        Lulusan SMA/sederajat
                        Usia 18–28 tahun
                        Sehat jasmani dan rohani
                        Bersedia kerja fisik
                        Lulus pelatihan bahasa Jepang (N4/N3)">
                        </textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
        <!-- Card Daftar Detail Bidang -->
        <div class="card mb-5 shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Data Detail Bidang Pekerjaan</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered mt-4">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Bidang</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($mysqli, "SELECT * FROM tb_job_detail ORDER BY id_job_detail ASC");
                        while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['nama_job']) ?></td>
                                <td><img src="../../../uploads/<?= $row['gambar'] ?>" width="100"></td>
                                <td><?= htmlspecialchars(substr($row['paragraf'], 0, 80)) ?>...</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal<?= $row['id_job_detail'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#hapusDetailModal<?= $row['id_job_detail'] ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal<?= $row['id_job_detail'] ?>" tabindex="-1"
                                aria-labelledby="editModalLabel<?= $row['id_job_detail'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form action="detail_job/edit_detail.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id_job_detail" value="<?= $row['id_job_detail'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel<?= $row['id_job_detail'] ?>">Edit
                                                    Detail:
                                                    <?= $row['nama_job'] ?>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Paragraf</label>
                                                    <textarea name="paragraf"
                                                        class="form-control"><?= $row['paragraf'] ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Pengumuman</label>
                                                    <textarea name="pengumuman"
                                                        class="form-control"><?= $row['pengumuman'] ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        Cakupan Tugas
                                                        <small class="text-muted">(1 baris 1 tugas)</small>
                                                    </label>
                                                    <textarea name="cakupan_tugas"
                                                        class="form-control"><?= htmlspecialchars($row['cakupan_tugas']) ?></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        Pendaftaran Terbuka Untuk
                                                        <small class="text-muted">(1 baris 1 poin)</small>
                                                    </label>
                                                    <textarea name="pendaftaran_terbuka"
                                                        class="form-control"><?= htmlspecialchars($row['pendaftaran_terbuka']) ?></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        Persyaratan Umum
                                                        <small class="text-muted">(1 baris 1 syarat)</small>
                                                    </label>
                                                    <textarea name="persyaratan_umum"
                                                        class="form-control"><?= htmlspecialchars($row['persyaratan_umum']) ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Ganti Gambar (Opsional)</label>
                                                    <input type="file" name="gambar" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Modal Hapus Detail Job -->
                            <div class="modal fade" id="hapusDetailModal<?= $row['id_job_detail'] ?>" tabindex="-1"
                                aria-labelledby="hapusDetailLabel<?= $row['id_job_detail'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="detail_job/hapus_detail.php" method="GET">
                                        <input type="hidden" name="id" value="<?= $row['id_job_detail'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="hapusDetailLabel<?= $row['id_job_detail'] ?>">
                                                    Konfirmasi
                                                    Hapus</h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p>Apakah kamu yakin ingin menghapus detail bidang
                                                    <strong><?= htmlspecialchars($row['nama_job']) ?></strong>?
                                                </p>
                                                <p class="text-danger small fst-italic">Data yang dihapus tidak dapat
                                                    dikembalikan.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
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
</body>

</html>