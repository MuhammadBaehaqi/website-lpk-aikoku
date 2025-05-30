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

$pageTitle = 'Kelola Halaman / Beranda';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - Admin</title>
    <link rel="icon" href="../../../logo.png" type="image/x-icon">
   

    <style>
        .table td,
        .table th {
            white-space: normal;
            /* Membuat teks membungkus jika panjang */
            word-wrap: break-word;
            /* Memastikan kata panjang terpotong jika tidak muat */
        }

        .table {
            table-layout: fixed;
            /* Menjaga ukuran kolom tabel tetap rapi */
            width: 100%;
            /* Membuat tabel mengisi lebar kontainer */
        }
    </style>
</head>

<body>

    <?php include '../../../sidebar1.php'; ?>

    <div class="content">
        <h2 class="mb-4"><?php echo $pageTitle; ?></h2>

        <!-- Hero Section -->
        <div class="card mb-4">
            <div class="card-header">Kelola Hero Section</div>
            <div class="card-body">
                <form action="proses_tambah_hero.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="judul" class="form-control mb-3" placeholder="Judul" required>
                    <input type="text" name="deskripsi" class="form-control mb-3" placeholder="Deskripsi" required>
                    <input type="file" name="gambar" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Tambah Hero</button>
                </form>
                <hr>
                <h5>Daftar Hero</h5>
                <ul class="list-group">
                    <li class="list-group-item">Hero 1 <a href="edit_hero.php?id=1"
                            class="btn btn-sm btn-warning">Edit</a> <a href="hapus_hero.php?id=1"
                            class="btn btn-sm btn-danger">Hapus</a></li>
                    <li class="list-group-item">Hero 2 <a href="edit_hero.php?id=2"
                            class="btn btn-sm btn-warning">Edit</a> <a href="hapus_hero.php?id=2"
                            class="btn btn-sm btn-danger">Hapus</a></li>
                </ul>
            </div>
        </div>
        <!-- Tentang Kami Singkat -->
        <div class="card mb-4">
            <div class="card-header">Kelola Tentang Kami Singkat</div>
            <div class="card-body">
                <form action="proses_tentang_kami.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="judul" class="form-control mb-3" placeholder="Judul Tentang Kami" required>
                    <textarea name="deskripsi" class="form-control mb-3" placeholder="Deskripsi Singkat"
                        required></textarea>
                    <input type="file" name="gambar" class="form-control mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

        <!-- Data Saat Ini dibungkus Card -->
        <div class="card mb-4">
            <div class="card-header">Data Kelola Tentang Kami Singkat</div>
            <div class="card-body">
                <?php
                include '../../../config.php';
                $tentang = mysqli_query($mysqli, "SELECT * FROM tb_beranda_tentang_kami ORDER BY id_tentang DESC LIMIT 1");
                if ($row = mysqli_fetch_assoc($tentang)) {
                    ?>
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
                            <tr>
                                <td>1</td>
                                <td><?php echo $row['judul']; ?></td>
                                <td><?php echo nl2br($row['deskripsi']); ?></td>
                                <td><?php echo date("d-m-Y H:i", strtotime($row['tanggal_upload'])); ?></td>
                                <td><img src="../../../uploads/<?php echo $row['gambar']; ?>" width="150" class="img-fluid">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p>Belum ada data.</p>
                <?php } ?>
            </div>
        </div>

        <!-- Mengapa Memilih Kami -->
        <div class="card mb-4">
            <div class="card-header">Kelola "Mengapa Memilih Kami"</div>
            <div class="card-body">
                <form action="proses_tambah_keunggulan.php" method="POST">
                    <input type="text" name="ikon" class="form-control mb-2"
                        placeholder="Ikon di web Fontawesome Contoh: fas fa-graduation-cap" required>
                    <input type="text" name="judul" class="form-control mb-2" placeholder="Judul" required>
                    <textarea name="keunggulan" class="form-control mb-3" placeholder="Deskripsi" required></textarea>
                    <button type="submit" class="btn btn-primary">Tambah Keunggulan</button>
                </form>
                <hr>
                <h5>Daftar Keunggulan</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Ikon</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../../../config.php';
                            $result = mysqli_query($mysqli, "SELECT * FROM tb_beranda_keunggulan ORDER BY id_keunggulan ASC");
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><i class="<?php echo $data['ikon']; ?>"></i>
                                        <small><?php echo $data['ikon']; ?></small>
                                    </td>
                                    <td><?php echo $data['judul']; ?></td>
                                    <td><?php echo substr($data['deskripsi'], 0, 100); ?>...</td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editModal<?= $data['id_keunggulan']; ?>">Edit</button>

                                        <!-- Tombol Hapus -->
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusModal<?= $data['id_keunggulan']; ?>">Hapus</button>
                                    </td>
                                </tr>
                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal<?= $data['id_keunggulan']; ?>" tabindex="-1"
                                    aria-labelledby="editModalLabel<?= $data['id_keunggulan']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="proses_edit_keunggulan.php" method="POST">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Keunggulan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?= $data['id_keunggulan']; ?>">
                                                    <div class="mb-2">
                                                        <label>Ikon</label>
                                                        <input type="text" name="ikon" class="form-control"
                                                            value="<?= $data['ikon']; ?>" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label>Judul</label>
                                                        <input type="text" name="judul" class="form-control"
                                                            value="<?= $data['judul']; ?>" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label>Deskripsi</label>
                                                        <textarea name="deskripsi" class="form-control"
                                                            required><?= $data['deskripsi']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapusModal<?= $data['id_keunggulan']; ?>" tabindex="-1"
                                    aria-labelledby="hapusModalLabel<?= $data['id_keunggulan']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="proses_hapus_keunggulan.php" method="POST">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Keunggulan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?= $data['id_keunggulan']; ?>">
                                                    Yakin ingin menghapus "<strong><?= $data['judul']; ?></strong>"?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
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

        <!-- Fasilitas -->
        <div class="card mb-4">
            <div class="card-header">Kelola Fasilitas</div>
            <div class="card-body">
                <form action="proses_tambah_fasilitas.php" method="POST">
                    <input type="text" name="ikon" class="form-control mb-2" placeholder="Ikon Fontawesome" required>
                    <input type="text" name="judul" class="form-control mb-2" placeholder="Judul" required>
                    <textarea name="deskripsi" class="form-control mb-3" placeholder="Deskripsi" required></textarea>
                    <button type="submit" class="btn btn-primary">Tambah Fasilitas</button>
                </form>
                <hr>
                <h5>Daftar Fasilitas</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Ikon</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $fasilitas = mysqli_query($mysqli, "SELECT * FROM tb_beranda_fasilitas ORDER BY id_fasilitas ASC");
                            $no = 1;
                            while ($f = mysqli_fetch_assoc($fasilitas)) {
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><i class="<?= $f['ikon']; ?>"></i> <small><?= $f['ikon']; ?></small></td>
                                    <td><?= $f['judul']; ?></td>
                                    <td><?= substr($f['deskripsi'], 0, 100); ?>...</td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editFasilitasModal<?= $f['id_fasilitas']; ?>">Edit</button>

                                        <!-- Tombol Hapus -->
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusFasilitasModal<?= $f['id_fasilitas']; ?>">Hapus</button>
                                    </td>
                                </tr>

                                <!-- Modal Edit Fasilitas -->
                                <div class="modal fade" id="editFasilitasModal<?= $f['id_fasilitas']; ?>" tabindex="-1"
                                    aria-labelledby="editFasilitasModalLabel<?= $f['id_fasilitas']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="proses_edit_fasilitas.php" method="POST">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Fasilitas</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?= $f['id_fasilitas']; ?>">
                                                    <div class="mb-2">
                                                        <label>Ikon</label>
                                                        <input type="text" name="ikon" class="form-control"
                                                            value="<?= $f['ikon']; ?>" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label>Judul</label>
                                                        <input type="text" name="judul" class="form-control"
                                                            value="<?= $f['judul']; ?>" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label>Deskripsi</label>
                                                        <textarea name="deskripsi" class="form-control"
                                                            required><?= $f['deskripsi']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal Hapus Fasilitas -->
                                <div class="modal fade" id="hapusFasilitasModal<?= $f['id_fasilitas']; ?>" tabindex="-1"
                                    aria-labelledby="hapusFasilitasModalLabel<?= $f['id_fasilitas']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="proses_hapus_fasilitas.php" method="POST">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Fasilitas</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?= $f['id_fasilitas']; ?>">
                                                    Yakin ingin menghapus fasilitas "<strong><?= $f['judul']; ?></strong>"?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
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

        <!-- Testimoni -->
        <?php
        // Query untuk mengambil data testimoni
        $query = "SELECT * FROM tb_beranda_testimoni ORDER BY tanggal ASC";
        $result = mysqli_query($mysqli, $query);
        ?>
        <div class="card mb-4">
            <div class="card-header">Kelola Testimoni</div>
            <div class="card-body">
                <form action="proses_tambah_testimoni.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama" class="form-control mb-3" placeholder="Nama Alumni" required>
                    <textarea name="testimoni" class="form-control mb-3" placeholder="Isi Testimoni"
                        required></textarea>
                    <input type="text" name="bidang" class="form-control mb-3"
                        placeholder="Bidang Alumni (contoh: Kaigo, Perhotelan, dll)" required>
                    <input type="file" name="gambar" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Tambah Testimoni</button>
                </form>
                <hr>
                <h5>Daftar Testimoni</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-success text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Bidang</th>
                                <th>Gambar</th>
                                <th>Testimoni</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            mysqli_data_seek($result, 0); // Reset hasil query ke baris pertama
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td class="text-center">' . $no++ . '</td>';
                                echo '<td>' . $row['nama'] . '</td>';
                                echo '<td>' . $row['bidang'] . '</td>';
                                echo '<td><img src="../../../uploads/' . $row['gambar'] . '" width="60" class="rounded-circle"></td>';
                                echo '<td>' . substr($row['testimoni'], 0, 100) . '...</td>';
                                echo '<td>' . date('d-m-Y', strtotime($row['tanggal'])) . '</td>';
                                echo '<td>
        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editTestimoniModal' . $row['id_testimoni'] . '">Edit</button>
        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusTestimoniModal' . $row['id_testimoni'] . '">Hapus</button>
    </td>';
                                echo '</tr>';

                                // Modal Edit Testimoni
                                echo '
    <div class="modal fade" id="editTestimoniModal' . $row['id_testimoni'] . '" tabindex="-1" aria-labelledby="editTestimoniModalLabel' . $row['id_testimoni'] . '" aria-hidden="true">
        <div class="modal-dialog">
            <form action="proses_edit_testimoni.php" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Testimoni</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="' . $row['id_testimoni'] . '">
                        <div class="mb-2">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="' . $row['nama'] . '" required>
                        </div>
                        <div class="mb-2">
                            <label>Bidang</label>
                            <input type="text" name="bidang" class="form-control" value="' . $row['bidang'] . '" required>
                        </div>
                        <div class="mb-2">
                            <label>Testimoni</label>
                            <textarea name="testimoni" class="form-control" required>' . $row['testimoni'] . '</textarea>
                        </div>
                        <div class="mb-2">
                            <label>Ganti Gambar (opsional)</label>
                            <input type="file" name="gambar" class="form-control">
                            <small>Gambar saat ini: ' . $row['gambar'] . '</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>';

                                // Modal Hapus Testimoni
                                echo '
    <div class="modal fade" id="hapusTestimoniModal' . $row['id_testimoni'] . '" tabindex="-1" aria-labelledby="hapusTestimoniModalLabel' . $row['id_testimoni'] . '" aria-hidden="true">
        <div class="modal-dialog">
            <form action="proses_hapus_testimoni.php" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Testimoni</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="' . $row['id_testimoni'] . '">
                        Yakin ingin menghapus testimoni dari <strong>' . $row['nama'] . '</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>