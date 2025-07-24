<?php
session_start();

// Pengecekan jika pengguna belum login
if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php");
    exit();
}

// Pengecekan jika pengguna bukan admin
if ($_SESSION['roles'] != 'admin') {
    header("Location: dashboard_user.php"); // Atau ke halaman lain yang sesuai
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - LPK Aikoku Terpadu</title>
    <link rel="icon" href="../../img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <!-- Memasukkan sidebar -->
    <?php include '../../sidebar1.php'; ?>

    <!-- Konten utama -->
    <div class="content">
        <h2>Dashboard Admin</h2>

        <div class="row mt-4">
            <!-- Kartu Informasi Pendaftaran -->
            <div class="col-md-4">
                <div class="card text-bg-success mb-3 shadow-lg">
                    <div class="card-header">Kelola Pendaftaran</div>
                    <div class="card-body">
                        <?php
                        include '../../includes/config.php'; // Pastikan path config sesuai
                        $pendaftar = mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM tb_pendaftaran");
                        $hasil_pendaftar = mysqli_fetch_assoc($pendaftar);
                        ?>
                        <h5 class="card-title">Jumlah Pendaftar: <?= $hasil_pendaftar['total']; ?></h5>
                        <p class="card-text">Data pendaftaran terbaru tersedia di sini.</p>
                        <a href="/pendaftaran/admin/data_pendaftar/data_pendaftaran.php" class="btn btn-light">Lihat
                            Detail</a>
                    </div>
                </div>
            </div>

            <!-- Kartu Data Kontak -->
            <div class="col-md-4">
                <div class="card text-bg-danger mb-3 shadow-lg">
                    <div class="card-header">Data Kontak</div>
                    <div class="card-body">
                        <?php
                        include '../../includes/config.php'; // Pastikan path ini benar
                        $kontak = mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM tb_kontak");
                        $hasil_kontak = mysqli_fetch_assoc($kontak);
                        ?>
                        <h5 class="card-title">Pesan Masuk: <?= $hasil_kontak['total']; ?></h5>
                        <p class="card-text">Lihat semua pesan dari form kontak pengunjung.</p>
                        <a href="/pendaftaran/admin/kontak_masuk/data_kontak.php" class="btn btn-light">Lihat Pesan</a>
                    </div>
                </div>
            </div>

            <!-- Kartu Total Pengguna -->
            <div class="col-md-4">
                <div class="card text-bg-primary mb-3 shadow-lg">
                    <div class="card-header">Kelola User</div>
                    <div class="card-body">
                        <?php
                        include '../../includes/config.php'; // Pastikan path config sesuai
                        $pengguna = mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM tb_pengguna");
                        $hasil_pengguna = mysqli_fetch_assoc($pengguna);
                        ?>
                        <h5 class="card-title">Total User: <?= $hasil_pengguna['total']; ?></h5>
                        <p class="card-text">Kelola akun user di sini.</p>
                        <a href="/pendaftaran/admin/user/kelola_user.php" class="btn btn-light">Kelola Pengguna</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Riwayat Aktivitas Terbaru -->
        <div class="mt-5">
            <h4>Riwayat Aktivitas Terbaru</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="bg-success text-white">Aktivitas</th>
                        <th class="bg-success text-white">Nama</th>
                        <th class="bg-success text-white">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Limit itu tampilan history yg ditampilkan ada 3 dan 5
                    // Ambil 3 pendaftar terakhir
                    $result_pendaftar = mysqli_query($mysqli, "SELECT nama_lengkap, tanggal_daftar FROM tb_pendaftaran ORDER BY tanggal_daftar DESC LIMIT 3");
                    while ($row = mysqli_fetch_assoc($result_pendaftar)) {
                        echo '<tr>
                        <td>📝 Pendaftar baru</td>
                        <td><strong>' . $row['nama_lengkap'] . '</strong></td>
                        <td>' . date('d M Y', strtotime($row['tanggal_daftar'])) . '</td>
                      </tr>';
                    }

                    // Ambil 3 pesan terakhir dari kontak
                    $result_kontak = mysqli_query($mysqli, "SELECT name, date_sent FROM tb_kontak ORDER BY date_sent DESC LIMIT 3");
                    while ($row = mysqli_fetch_assoc($result_kontak)) {
                        echo '<tr>
                        <td>📩 Pesan masuk</td>
                        <td><strong>' . $row['name'] . '</strong></td>
                        <td>' . date('d M Y H:i', strtotime($row['date_sent'])) . '</td>
                      </tr>';
                    }

                    // Menampilkan pengguna terakhir mendaftar
                    $result_pengguna = mysqli_query($mysqli, "SELECT * FROM tb_pengguna ORDER BY id_pengguna DESC LIMIT 5");
                    if (mysqli_num_rows($result_pengguna) > 0) {
                        while ($row = mysqli_fetch_array($result_pengguna)) {
                            echo '<tr>
            <td>' . (isset($row['aktivitas']) ? $row['aktivitas'] : ucfirst($row['roles'])) . '</td>
            <td><strong>' . $row['username'] . '</strong></td>
            <td>' . date('d M Y H:i', strtotime($row['tanggal_aktivitas'])) . '</td>
        </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="3">Tidak ada aktivitas terbaru.</td></tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>