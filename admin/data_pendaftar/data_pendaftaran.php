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

$pageTitle = 'Data Pendaftaran';
include '../../includes/config.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - Admin</title>
    <link rel="icon" href="../../img/logo.png" type="image/x-icon">
    <style>
        thead th {
            background-color: #198754 !important;
            /* Hijau */
            color: white !important;
            /* Teks putih */
        }

        .table-container {
            overflow-x: auto;
            overflow-y: auto;
            max-height: 90vh;
            -webkit-overflow-scrolling: touch;
        }

        .table-container::-webkit-scrollbar {
            width: 6px;
            /* ini untuk scrollbar vertikal */
            height: 6px;
            /* ini untuk scrollbar horizontal */
        }

        .table-container::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 4px;
        }

        .table-container::-webkit-scrollbar-track {
            background-color: transparent;
        }

        /* Pastikan tabel tidak melebar di luar container */
        table {
            min-width: 1200px;
            /* Lebar minimum tabel untuk memastikan scroll horizontal muncul */
        }
    </style>
</head>

<body>
    <?php include '../../sidebar1.php'; ?>
    <div class="content">
        <h2 class="mb-4"><?php echo $pageTitle; ?></h2>
        <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <div class="alert alert-success">
                Pendaftaran berhasil! Silakan tunggu konfirmasi dari admin.
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'update_sukses'): ?>
            <div class="alert alert-success">
                Status pendaftaran berhasil diperbarui.
            </div>
        <?php endif; ?>

        <div class="container-fluid mt-3">
            <form method="GET" class="d-flex mb-3">
                <input type="text" name="search" class="form-control me-2"
                    placeholder="Cari nama, email, nomor, atau telepon..."
                    value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                <select name="limit" class="form-select w-auto me-2" onchange="this.form.submit()">
                    <?php
                    $limits = [5, 10, 15, 20];
                    foreach ($limits as $val) {
                        $selected = (isset($_GET['limit']) && $_GET['limit'] == $val) ? 'selected' : '';
                        echo "<option value='$val' $selected>$val</option>";
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-success">Tampilkan</button>
            </form>
            <div class="mb-3">
                <a href="export_excel.php" class="btn btn-success btn-sm">
                    <i class="bi bi-file-earmark-excel"></i> Export Semua Excel
                </a>
                <a href="cetak_semua_pendaftaran.php" target="_blank" class="btn btn-danger btn-sm">
                    <i class="bi bi-printer"></i> Cetak Semua PDF
                </a>
                <a href="download_foto_zip.php" class="btn btn-dark btn-sm">
                    <i class="bi bi-download"></i> Download Semua Foto
                </a>
            </div>

            <div class="table-container">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Nomor Pendaftaran</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Usia</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat KTP</th>
                            <th>Alamat Email</th>
                            <th>No.Telepon</th>
                            <th>Alamat</th>
                            <th>Alamat Keluarga</th>
                            <th>No.Telepon Keluarga</th>
                            <th>Program</th>
                            <th>Bidang</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Pengalaman Kerja</th>
                            <th>Status Pernikahan</th>
                            <th>Motivasi</th>
                            <th>Foto</th>
                            <th>Tinggi Badan</th>
                            <th>Berat Badan</th>
                            <th>Pengalaman Jepang</th>
                            <th>Penyakit Kronis</th>
                            <th>Golongan Darah</th>
                            <th>Status</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 5;
                    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $offset = ($page - 1) * $limit;

                    $where = "";
                    if (!empty($search)) {
                        $search = mysqli_real_escape_string($mysqli, $search);
                        $where = "WHERE 
                            nama_lengkap LIKE '%$search%' OR
                            email LIKE '%$search%' OR
                            nomor_pendaftaran LIKE '%$search%' OR
                            telepon LIKE '%$search%'";
                    }

                    // Ambil data sesuai filter dan pagination
                    $data = mysqli_query($mysqli, "SELECT * FROM tb_pendaftaran $where ORDER BY id_pendaftaran ASC LIMIT $limit OFFSET $offset");

                    // Ambil total data (untuk pagination)
                    $total_data_result = mysqli_query($mysqli, "SELECT COUNT(*) as total FROM tb_pendaftaran $where");
                    $total_data = mysqli_fetch_assoc($total_data_result)['total'];
                    $total_pages = ceil($total_data / $limit);

                    $no = $offset + 1; // No urut dimulai dari offset+1
                    ?>

                    <tbody>
                        <?php
                        // Generate nomor pendaftaran jika masih kosong
                        $data_generate = mysqli_query($mysqli, "SELECT * FROM tb_pendaftaran WHERE nomor_pendaftaran IS NULL ORDER BY id_pendaftaran ASC");
                        $gen = 1;
                        while ($d_generate = mysqli_fetch_array($data_generate)) {
                            $nomor = '2025-' . str_pad($gen, 4, '0', STR_PAD_LEFT);
                            mysqli_query($mysqli, "UPDATE tb_pendaftaran SET nomor_pendaftaran = '$nomor' WHERE id_pendaftaran = " . $d_generate['id_pendaftaran']);
                            $gen++;
                        }
                        ?>
                        <?php
                        while ($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d['nama_lengkap'] ?></td>
                                <td><?= $d['nomor_pendaftaran'] ?></td>
                                <td><?= $d['tempat_lahir'] ?></td>
                                <td><?= date('d-m-Y', strtotime($d['tanggal_lahir'])) ?></td>
                                <td><?= $d['usia'] ?> tahun</td>
                                <td><?= $d['jenis_kelamin'] ?></td>
                                <td><?= $d['agama'] ?></td>
                                <td><?= $d['alamat_ktp'] ?></td>
                                <td><?= $d['email'] ?></td>
                                <td><?= $d['telepon'] ?></td>
                                <td><?= $d['alamat'] ?></td>
                                <td><?= $d['alamat_keluarga'] ?></td>
                                <td><?= $d['telepon_keluarga'] ?></td>
                                <td><?= $d['program'] ?></td>
                                <td><?= $d['bidang'] ?></td>
                                <td><?= $d['pendidikan_terakhir'] ?></td>
                                <td><?= $d['pengalaman_kerja'] ?></td>
                                <td><?= $d['status_pernikahan'] ?></td>
                                <td><?= nl2br(htmlspecialchars($d['motivasi'])) ?></td>
                                <td>
                                    <?php if (!empty($d['foto_diri'])): ?>
                                        <img src="/pendaftaran/uploads/<?= $d['foto_diri'] ?>" width="60" alt="Foto Diri">
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= $d['tinggi_badan'] ?> cm</td>
                                <td><?= $d['berat_badan'] ?> kg</td>
                                <td><?= $d['pengalaman_jepang'] ?></td>
                                <td><?= $d['penyakit_kronis'] ?></td>
                                <td><?= $d['golongan_darah'] ?></td>
                                <td><?= $d['status'] ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($d['tanggal_daftar'])) ?></td>
                                <td>
                                    <div class="p-2 border rounded mb-2 bg-light">
                                        <div class="d-flex flex-wrap gap-2 mb-2">
                                            <a href="export_excel.php?id=<?= $d['id_pendaftaran'] ?>"
                                                class="btn btn-sm btn-success" title="Excel Data Ini">
                                                <i class="bi bi-file-earmark-excel"></i>
                                            </a>
                                            <a href="cetak_semua_pendaftaran.php?id=<?= $d['id_pendaftaran'] ?>"
                                                class="btn btn-sm btn-danger" title="PDF Data Ini">
                                                <i class="bi bi-printer"></i>
                                            </a>

                                            <!-- Tombol untuk membuka modal -->
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit<?= $d['id_pendaftaran'] ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <a href="hapus_data_pendaftaran.php?id_pendaftaran=<?= $d['id_pendaftaran'] ?>"
                                                class="btn btn-danger btn-sm" title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <a href="../../uploads/<?= $d['foto_diri'] ?>" class="btn btn-sm btn-secondary"
                                                download="<?= $d['nama_lengkap'] ?>_foto.jpg"
                                                title="Download Foto Pendaftar">
                                                <i class="bi bi-download"></i>
                                            </a>

                                        </div>
                                        <form action="update_status.php" method="POST"
                                            class="d-flex flex-wrap gap-2 align-items-center">
                                            <input type="hidden" name="id_pendaftaran" value="<?= $d['id_pendaftaran'] ?>">
                                            <select name="status" class="form-select form-select-sm w-auto">
                                                <option value="Pending" <?= ($d['status'] == 'Pending') ? 'selected' : '' ?>>
                                                    Pending</option>
                                                <option value="Lolos" <?= ($d['status'] == 'Lolos') ? 'selected' : '' ?>>Lolos
                                                </option>
                                                <option value="Tidak Lolos" <?= ($d['status'] == 'Tidak Lolos') ? 'selected' : '' ?>>Tidak Lolos</option>
                                            </select>
                                            <input type="text" name="pengumuman" class="form-control form-control-sm w-auto"
                                                placeholder="Isi pengumuman"
                                                value="<?= htmlspecialchars($d['pengumuman']) ?>">
                                            <button type="submit" class="btn btn-success btn-sm" title="Update">
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal Edit Data -->
                            <div class="modal fade" id="modalEdit<?= $d['id_pendaftaran'] ?>" tabindex="-1"
                                aria-labelledby="modalLabel<?= $d['id_pendaftaran'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <form action="edit_data_pendaftaran.php" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel<?= $d['id_pendaftaran'] ?>">Edit Data
                                                    Pendaftaran</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_pendaftaran"
                                                    value="<?= $d['id_pendaftaran'] ?>">
                                                <div class="row g-3">
                                                    <!-- Nama Lengkap -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Nama Lengkap</label>
                                                        <input type="text" name="nama_lengkap" class="form-control"
                                                            value="<?= htmlspecialchars($d['nama_lengkap']) ?>" required>
                                                    </div>
                                                    <!-- Tempat Lahir -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tempat Lahir</label>
                                                        <input type="text" name="tempat_lahir" class="form-control"
                                                            value="<?= htmlspecialchars($d['tempat_lahir']) ?>" required>
                                                    </div>
                                                    <!-- Tanggal Lahir -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tanggal Lahir</label>
                                                        <input type="date" name="tanggal_lahir" class="form-control"
                                                            value="<?= isset($d['tanggal_lahir']) ? $d['tanggal_lahir'] : ''; ?>"
                                                            required>
                                                    </div>
                                                    <!-- Usia -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Usia</label>
                                                        <input type="number" name="usia" class="form-control"
                                                            value="<?= $d['usia'] ?>" required>
                                                    </div>
                                                    <!-- Jenis Kelamin -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Jenis Kelamin</label>
                                                        <select name="jenis_kelamin" class="form-select" required>
                                                            <option value="Laki-laki" <?= ($d['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                                                            <option value="Perempuan" <?= ($d['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <!-- Agama -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Agama</label>
                                                        <select name="agama" class="form-select" required>
                                                            <option value="">Pilih Agama</option>
                                                            <option value="Islam" <?= ($d['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                                                            <option value="Kristen" <?= ($d['agama'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                                                            <option value="Katolik" <?= ($d['agama'] == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
                                                            <option value="Hindu" <?= ($d['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                                                            <option value="Buddha" <?= ($d['agama'] == 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
                                                            <option value="Konghucu" <?= ($d['agama'] == 'Konghucu') ? 'selected' : ''; ?>>Konghucu</option>
                                                        </select>
                                                    </div>
                                                    <!-- Alamat KTP -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Alamat KTP</label>
                                                        <input type="text" name="alamat_ktp" class="form-control"
                                                            value="<?= htmlspecialchars($d['alamat_ktp']) ?>" required>
                                                    </div>
                                                    <!-- Email -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" name="email" class="form-control"
                                                            value="<?= htmlspecialchars($d['email']) ?>" required>
                                                    </div>
                                                    <!-- Telepon -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Telepon</label>
                                                        <input type="text" name="telepon" class="form-control"
                                                            value="<?= htmlspecialchars($d['telepon']) ?>" required>
                                                    </div>
                                                    <!-- Alamat -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Alamat</label>
                                                        <input type="text" name="alamat" class="form-control"
                                                            value="<?= htmlspecialchars($d['alamat']) ?>" required>
                                                    </div>
                                                    <!-- Alamat Keluarga -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Alamat Keluarga</label>
                                                        <input type="text" name="alamat_keluarga" class="form-control"
                                                            value="<?= htmlspecialchars($d['alamat_keluarga']) ?>" required>
                                                    </div>
                                                    <!-- Telepon Keluarga -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Telepon Keluarga</label>
                                                        <input type="text" name="telepon_keluarga" class="form-control"
                                                            value="<?= htmlspecialchars($d['telepon_keluarga']) ?>"
                                                            required>
                                                    </div>
                                                    <!-- Program -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Program</label>
                                                        <select name="program" class="form-select" required>
                                                            <option value="Magang" <?= ($d['program'] == 'Magang') ? 'selected' : '' ?>>Program Magang</option>
                                                            <option value="Engineering" <?= ($d['program'] == 'Engineering') ? 'selected' : '' ?>>Program Engineering</option>
                                                            <option value="Tokutei Ginou" <?= ($d['program'] == 'Tokutei Ginou') ? 'selected' : '' ?>>Program Tokutei Ginou
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <!-- Bidang -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Bidang Pekerjaan</label>
                                                        <select name="bidang" class="form-select" required>
                                                            <option value="Perhotelan" <?= ($d['bidang'] == 'Perhotelan') ? 'selected' : '' ?>>Perhotelan</option>
                                                            <option value="Pertanian" <?= ($d['bidang'] == 'Pertanian') ? 'selected' : '' ?>>Pertanian</option>
                                                            <option value="Pengelolahan Makanan"
                                                                <?= ($d['bidang'] == 'Pengelolahan Makanan') ? 'selected' : '' ?>>Pengelolahan Makanan</option>
                                                            <option value="Perawat Lansia (Kaigo)"
                                                                <?= ($d['bidang'] == 'Perawat Lansia (Kaigo)') ? 'selected' : '' ?>>Perawat Lansia (Kaigo)</option>
                                                            <option value="Konstruksi" <?= ($d['bidang'] == 'Konstruksi') ? 'selected' : '' ?>>Konstruksi</option>
                                                            <option value="Kebersihan & Layanan Umum"
                                                                <?= ($d['bidang'] == 'Kebersihan & Layanan Umum') ? 'selected' : '' ?>>Kebersihan & Layanan Umum</option>
                                                            <option value="Restoran" <?= ($d['bidang'] == 'Restoran') ? 'selected' : '' ?>>Restoran</option>
                                                        </select>
                                                    </div>

                                                    <!-- Pendidikan Terakhir -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Pendidikan Terakhir</label>
                                                        <select name="pendidikan_terakhir" class="form-select" required>
                                                            <option value="">Pilih Pendidikan Terakhir</option>
                                                            <option value="SD" <?= ($d['pendidikan_terakhir'] == 'SD') ? 'selected' : '' ?>>SD</option>
                                                            <option value="MI" <?= ($d['pendidikan_terakhir'] == 'MI') ? 'selected' : '' ?>>MI</option>
                                                            <option value="SMP" <?= ($d['pendidikan_terakhir'] == 'SMP') ? 'selected' : '' ?>>SMP</option>
                                                            <option value="MTS" <?= ($d['pendidikan_terakhir'] == 'MTS') ? 'selected' : '' ?>>MTS</option>
                                                            <option value="SMA" <?= ($d['pendidikan_terakhir'] == 'SMA') ? 'selected' : '' ?>>SMA</option>
                                                            <option value="ALIYAH" <?= ($d['pendidikan_terakhir'] == 'ALIYAH') ? 'selected' : '' ?>>ALIYAH</option>
                                                            <option value="SMK" <?= ($d['pendidikan_terakhir'] == 'SMK') ? 'selected' : '' ?>>SMK</option>
                                                            <option value="D3" <?= ($d['pendidikan_terakhir'] == 'D3') ? 'selected' : '' ?>>D3</option>
                                                            <option value="S1" <?= ($d['pendidikan_terakhir'] == 'S1') ? 'selected' : '' ?>>S1</option>
                                                            <option value="S2" <?= ($d['pendidikan_terakhir'] == 'S2') ? 'selected' : '' ?>>S2</option>
                                                            <option value="S3" <?= ($d['pendidikan_terakhir'] == 'S3') ? 'selected' : '' ?>>S3</option>
                                                        </select>
                                                    </div>
                                                    <!-- Pengalaman Kerja -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Pengalaman Kerja</label>
                                                        <input type="text" name="pengalaman_kerja" class="form-control"
                                                            value="<?= htmlspecialchars($d['pengalaman_kerja']) ?>"
                                                            required>
                                                    </div>
                                                    <!-- Status Pernikahan -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Status Pernikahan</label>
                                                        <select name="status_pernikahan" class="form-select" required>
                                                            <option value="Belum Menikah"
                                                                <?= ($d['status_pernikahan'] == 'Belum Menikah') ? 'selected' : '' ?>>Belum Menikah
                                                            </option>
                                                            <option value="Menikah" <?= ($d['status_pernikahan'] == 'Menikah') ? 'selected' : '' ?>>Menikah</option>
                                                            <option value="Janda/Duda"
                                                                <?= ($d['status_pernikahan'] == 'Janda/Duda') ? 'selected' : '' ?>>Janda/Duda</option>
                                                        </select>
                                                    </div>
                                                    <!-- Tinggi Badan -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tinggi Badan</label>
                                                        <input type="text" name="tinggi_badan" class="form-control"
                                                            value="<?= htmlspecialchars($d['tinggi_badan']) ?>" required>
                                                    </div>
                                                    <!-- Berat Badan -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Berat Badan</label>
                                                        <input type="text" name="berat_badan" class="form-control"
                                                            value="<?= htmlspecialchars($d['berat_badan']) ?>" required>
                                                    </div>
                                                    <!-- Pengalaman Jepang -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Pengalaman Jepang</label>
                                                        <select name="pengalaman_jepang" class="form-select" required>
                                                            <option value="Pemula" <?= ($d['pengalaman_jepang'] == 'Pemula') ? 'selected' : '' ?>>Pemula</option>
                                                            <option value="Ex-Jepang"
                                                                <?= ($d['pengalaman_jepang'] == 'Ex-Jepang') ? 'selected' : '' ?>>Ex-Jepang</option>
                                                        </select>
                                                    </div>
                                                    <!-- Penyakit Kronis -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Penyakit Kronis</label>
                                                        <input type="text" name="penyakit_kronis" class="form-control"
                                                            value="<?= htmlspecialchars($d['penyakit_kronis']) ?>" required>
                                                    </div>
                                                    <!-- Golongan Darah -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Golongan Darah</label>
                                                        <input type="text" name="golongan_darah" class="form-control"
                                                            value="<?= htmlspecialchars($d['golongan_darah']) ?>" required>
                                                    </div>
                                                    <!-- Motivasi -->
                                                    <div class="col-md-12">
                                                        <label class="form-label">Motivasi</label>
                                                        <textarea name="kirim_motivasi" class="form-control"
                                                            rows="3"><?= htmlspecialchars($d['motivasi']) ?></textarea>
                                                    </div>

                                                    <!-- Upload Foto Baru -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Foto Baru (opsional)</label>
                                                        <input type="file" name="foto_diri" class="form-control">
                                                        <small class="text-muted">Biarkan kosong jika tidak ingin
                                                            mengganti.</small>
                                                    </div>

                                                    <!-- Preview Foto Lama -->
                                                    <div class="col-md-6">
                                                        <label class="form-label">Foto Saat Ini</label><br>
                                                        <?php if (!empty($d['foto_diri'])): ?>
                                                            <img src="../../uploads/<?= $d['foto_diri'] ?>" alt="Foto Lama"
                                                                width="100" class="img-thumbnail">
                                                        <?php else: ?>
                                                            <span class="text-muted">Tidak ada foto.</span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="update" class="btn btn-success">Simpan
                                                    Perubahan</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                <a class="page-link"
                                    href="?page=<?= $i ?>&limit=<?= $limit ?>&search=<?= $search ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>

</html>