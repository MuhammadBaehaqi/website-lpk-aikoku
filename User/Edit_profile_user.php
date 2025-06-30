<?php
session_start();
include '../includes/config.php';

if (!isset($_SESSION['id_pengguna'])) {
    // Jika id_pengguna tidak ditemukan di session, arahkan ke login
    header("Location: ../login.php");
    exit();
}

$pageTitle = "Edit Profil"; // Tambahkan baris ini

$id_pengguna = $_SESSION['id_pengguna'];
$result = mysqli_query($mysqli, "SELECT * FROM tb_pengguna INNER JOIN tb_pendaftaran ON tb_pengguna.email_pengguna = tb_pendaftaran.email WHERE tb_pengguna.id_pengguna = '$id_pengguna' LIMIT 1");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="icon" href="../img/logo.png" type="image/x-icon">
</head>

<body>
    <?php include '../sidebar_user.php'; ?>
    <div class="content p-4">
        <div class="container">
            <h3 class="mb-4">Profil Saya</h3>
            <div class="card shadow-lg p-4">
                <div class="row">
                    <!-- KIRI: FOTO & NAMA -->
                    <div class="col-md-4 text-center border-end">
                        <?php if (!empty($data['foto_diri']) && file_exists("../uploads/" . $data['foto_diri'])): ?>
                            <img src="../uploads/<?= $data['foto_diri'] ?>" alt="Foto Profil" class="img-fluid rounded mb-3"
                                style="width: 150px; height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <i class="fas fa-user-circle mb-3" style="font-size: 120px; color: #0db4d8;"></i>
                        <?php endif; ?>
                        <h5 class="fw-bold"><?= $data['nama_lengkap'] ?></h5>
                        <p class="text-muted">No. Pendaftaran: <br><strong><?= $data['nomor_pendaftaran'] ?></strong>
                        </p>
                        <button class="btn btn-outline-primary mt-2" data-bs-toggle="modal"
                            data-bs-target="#editModal">Edit
                            Profil</button>
                        <button class="btn btn-outline-danger mt-2" data-bs-toggle="modal"
                            data-bs-target="#ubahPasswordModal">Ubah Password</button>
                    </div>

                    <!-- KANAN: DETAIL PROFIL -->
                    <div class="col-md-8">
                        <div class="row">
                            <!-- Data Pribadi -->
                            <div class="col-md-6 mb-3">
                                <h6 class="text-primary">Informasi Pribadi</h6>
                                <p><strong>Tempat Lahir:</strong> <?= $data['tempat_lahir'] ?></p>
                                <p><strong>Tanggal Lahir:</strong> <?= $data['tanggal_lahir'] ?></p>
                                <p><strong>Jenis Kelamin:</strong> <?= $data['jenis_kelamin'] ?></p>
                                <p><strong>Agama:</strong> <?= $data['agama'] ?></p>
                            </div>

                            <!-- Kontak -->
                            <div class="col-md-6 mb-3">
                                <h6 class="text-primary">Kontak</h6>
                                <p><strong>Email:</strong> <?= $data['email'] ?></p>
                                <p><strong>Telepon:</strong> <?= $data['telepon'] ?></p>
                                <p><strong>Telepon Keluarga:</strong> <?= $data['telepon_keluarga'] ?></p>
                            </div>

                            <!-- Alamat & Program -->
                            <div class="col-md-6 mb-3">
                                <h6 class="text-primary">Alamat</h6>
                                <p><strong>Alamat:</strong> <?= $data['alamat'] ?></p>
                                <p><strong>Alamat Keluarga:</strong> <?= $data['alamat_keluarga'] ?></p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <h6 class="text-primary">Pendidikan & Program</h6>
                                <p><strong>Bidang Pekerjaan:</strong> <?= $data['bidang'] ?></p>
                                <p><strong>Program:</strong> <?= $data['program'] ?></p>
                                <p><strong>Pendidikan Terakhir:</strong> <?= $data['pendidikan_terakhir'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Profil -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="update_profile.php" method="POST" class="modal-content" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <!-- Readonly Fields -->
                    <div class="mb-3">
                        <label class="form-label">Nomor Pendaftaran <small class="text-muted">(*tidak dapat
                                diedit)</small></label>
                        <input type="text" name="nomor_pendaftaran" class="form-control"
                            value="<?= $data['nomor_pendaftaran'] ?>" readonly style="background-color:#e9ecef;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap <small class="text-muted">(*tidak dapat
                                diedit)</small></label>
                        <input type="text" name="nama_lengkap" class="form-control" value="<?= $data['nama_lengkap'] ?>"
                            readonly style="background-color:#e9ecef;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Program <small class="text-muted">(*tidak dapat
                                diedit)</small></label>
                        <input type="text" name="program" class="form-control" value="<?= $data['program'] ?>" readonly
                            style="background-color:#e9ecef;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bidang Pekerjaan <small class="text-muted">(*tidak dapat
                                diedit)</small></label>
                        <input type="text" name="bidang" class="form-control" value="<?= $data['bidang'] ?>" readonly
                            style="background-color:#e9ecef;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pendidikan Terakhir <small class="text-muted">(*tidak dapat
                                diedit)</small></label>
                        <input type="text" name="pendidikan_terakhir" class="form-control"
                            value="<?= $data['pendidikan_terakhir'] ?>" readonly style="background-color:#e9ecef;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Foto Diri Baru (Opsional)</label>
                        <input type="file" name="foto_diri" class="form-control" accept="image/*">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $data['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control"
                            value="<?= $data['tempat_lahir'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control"
                            value="<?= $data['tanggal_lahir'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <!-- form-select ikon panah -->
                        <select name="jenis_kelamin" class="form-select">
                            <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>
                                Laki-laki</option>
                            <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>
                                Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Agama</label>
                        <!-- form-select ikon panah -->
                        <select name="agama" class="form-select" required>
                            <option value="">Pilih Agama</option>
                            <option value="Islam" <?= $data['agama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
                            <option value="Kristen" <?= $data['agama'] == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                            <option value="Katolik" <?= $data['agama'] == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
                            <option value="Hindu" <?= $data['agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                            <option value="Buddha" <?= $data['agama'] == 'Buddha' ? 'selected' : '' ?>>Buddha</option>
                            <option value="Konghucu" <?= $data['agama'] == 'Konghucu' ? 'selected' : '' ?>>Konghucu
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" name="telepon" class="form-control" value="<?= $data['telepon'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telepon Keluarga</label>
                        <input type="text" name="telepon_keluarga" class="form-control"
                            value="<?= $data['telepon_keluarga'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control"><?= $data['alamat'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Keluarga</label>
                        <textarea name="alamat_keluarga" class="form-control"><?= $data['alamat_keluarga'] ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Ubah Password -->
    <div class="modal fade" id="ubahPasswordModal" tabindex="-1" aria-labelledby="ubahPasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="update_password.php" method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahPasswordModalLabel">Ubah Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Password Lama</label>
                        <input type="password" name="password_lama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        <input type="password" name="password_baru" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" name="konfirmasi_password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ubah Password</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>