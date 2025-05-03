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
include '../../config.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - Admin</title>
    <link rel="icon" href="../../logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        thead th {
            background-color: #198754 !important;
            /* Hijau */
            color: white !important;
            /* Teks putih */
        }

        .table-container {
            overflow-x: auto;
            /* Scroll horizontal di perangkat kecil */
            overflow-y: auto;
            /* Scroll vertikal jika diperlukan */
            max-width: 100%;
            max-height: 90vh;
            /* Batas tinggi agar bisa scroll di semua perangkat */
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
            <div class="table-container">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No Urutan</th>
                            <th>Nama Lengkap</th>
                            <th>Nomor Pendaftaran</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Usia</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat KTP</th>
                            <th>Alamat Email</th>
                            <th>No.Telepon/WhatsApp</th>
                            <th>Alamat</th>
                            <th>Alamat Keluarga</th>
                            <th>No.Telepon/WhatsApp Keluarga</th>
                            <th>Program</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Pengalaman Kerja</th>
                            <th>Status Pernikahan</th>
                            <th>Tinggi Badan (cm)</th>
                            <th>Berat Badan (kg)</th>
                            <th>Pengalaman Jepang</th>
                            <th>Penyakit Kronis</th>
                            <th>Golongan Darah</th>
                            <th>Status</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $pageTitle = 'Data Pendaftaran';
                        include '../../config.php';

                        // Generate nomor pendaftaran jika masih kosong
                        $data_generate = mysqli_query($mysqli, "SELECT * FROM tb_pendaftaran WHERE nomor_pendaftaran IS NULL ORDER BY id_pendaftaran ASC");
                        $no = 1;
                        while ($d_generate = mysqli_fetch_array($data_generate)) {
                            $nomor = '2025-' . str_pad($no, 4, '0', STR_PAD_LEFT);
                            mysqli_query($mysqli, "UPDATE tb_pendaftaran SET nomor_pendaftaran = '$nomor' WHERE id_pendaftaran = " . $d_generate['id_pendaftaran']);
                            $no++;
                        }
                        
                        // Baru lanjut ambil data seperti biasa
                        $data = mysqli_query($mysqli, "SELECT * FROM tb_pendaftaran ORDER BY id_pendaftaran ASC");
                        ?>

                        <?php
                        $data = mysqli_query($mysqli, "SELECT * FROM tb_pendaftaran ORDER BY id_pendaftaran ASC");
                        $no = 1; // Inisialisasi nomor urut
                        while ($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td> <!-- Menampilkan nomor urut dinamis -->
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
                                <td><?= $d['pendidikan_terakhir'] ?></td>
                                <td><?= $d['pengalaman_kerja'] ?></td>
                                <td><?= $d['status_pernikahan'] ?></td>
                                <td><?= $d['tinggi_badan'] ?> cm</td>
                                <td><?= $d['berat_badan'] ?> kg</td>
                                <td><?= $d['pengalaman_jepang'] ?></td>
                                <td><?= $d['penyakit_kronis'] ?></td>
                                <td><?= $d['golongan_darah'] ?></td>
                                <td><?= $d['status'] ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($d['tanggal_daftar'])) ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $d['id_pendaftaran'] ?>"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <a href="hapus_data_pendaftaran.php?id_pendaftaran=<?= $d['id_pendaftaran'] ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                    <!-- Form Update Status -->
                                    <form action="update_status.php" method="POST" style="display:inline-block;">
                                        <input type="hidden" name="id_pendaftaran" value="<?= $d['id_pendaftaran'] ?>">
                                        <select name="status" class="form-select form-select-sm"
                                            style="width:auto;display:inline-block;">
                                            <option value="Pending" <?= ($d['status'] == 'Pending') ? 'selected' : '' ?>>
                                                Pending</option>
                                            <option value="Lolos" <?= ($d['status'] == 'Lolos') ? 'selected' : '' ?>>Lolos
                                            </option>
                                            <option value="Tidak Lolos" <?= ($d['status'] == 'Tidak Lolos') ? 'selected' : '' ?>>Tidak Lolos</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-success mt-1">Update</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>