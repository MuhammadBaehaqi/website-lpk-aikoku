<?php
include 'config.php'; // koneksi ke database
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .hero-section {
            background: url('img/hero.jpg') no-repeat center center/cover;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .container-pengumuman {
            max-width: 900px;
            margin: 50px auto;
        }

        .card {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            border: none;
            background: #f8f9fa;
        }

        .card h2 {
            color: #006400;
            font-weight: bold;
        }

        .btn-cari {
            background-color: #006400;
            color: white;
        }

        .btn-cari:hover {
            background-color: #004d00;
            color: white;
        }

        .table {
            margin-top: 20px;
        }

        .table th {
            background-color: #006400;
            color: white;
            text-transform: uppercase;
        }

        .table td {
            vertical-align: middle;
        }

        .badge {
            font-size: 14px;
            padding: 8px 12px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <?php
    $heroQuery = mysqli_query($mysqli, "SELECT * FROM hero_pengumuman ORDER BY id DESC LIMIT 1");
    $heroData = mysqli_fetch_assoc($heroQuery);

    // Tambahkan pengecekan jika tidak ada data
    if (!$heroData) {
        $hero_background = 'img/hero.jpg';  // Default image
        $hero_title = 'Daftar Sekarang dan Wujudkan Mimpi Anda di Jepang!';
        $hero_description = '';  // Kosongkan deskripsi jika tidak ada
    } else {
        // Gunakan data dari database jika ada
        $hero_background = "uploads/" . $heroData['hero_image'];
        $hero_title = $heroData['hero_title'];
        $hero_description = $heroData['hero_description'];
    }
    ?>

    <div class="hero-section" style="background: url('<?= $hero_background ?>') no-repeat center center/cover;">
        <div class="container">
            <h1><?= htmlspecialchars($hero_title) ?></h1>
            <p><?= htmlspecialchars($heroData['hero_description']) ?></p>
        </div>
    </div>

    <div class="container-pengumuman">
        <div class="card p-4">
            <h2 class="text-center">Pengumuman Kelulusan</h2>
            <p class="text-center text-muted">Silakan cari nama atau nomor pendaftaran untuk melihat status kelulusan
                Anda.</p>

            <form class="d-flex justify-content-center mt-3" method="GET">
                <input class="form-control w-50" type="text" name="cari"
                    placeholder="Masukkan nama atau nomor pendaftaran"
                    value="<?= isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : '' ?>">
                <button class="btn btn-cari ms-2" type="submit">Cari</button>
            </form>

            <?php
            // Cek jika pencarian dilakukan
            if (isset($_GET['cari'])) {
                // Menyaring input pencarian
                $cari = mysqli_real_escape_string($mysqli, $_GET['cari']);

                // Query untuk mencari pendaftar dengan status Lolos atau Tidak Lolos
                $query = "SELECT * FROM tb_pendaftaran WHERE (nama_lengkap LIKE '%$cari%' OR nomor_pendaftaran LIKE '%$cari%') AND status IN ('Lolos', 'Tidak Lolos')";
                $result = mysqli_query($mysqli, $query);

                // Jika tidak ada hasil pencarian dengan status Lolos/Tidak Lolos
                if (mysqli_num_rows($result) == 0) {
                    // Cek apakah data pendaftar ada di database
                    $cek_data = mysqli_query($mysqli, "SELECT * FROM tb_pendaftaran WHERE nama_lengkap LIKE '%$cari%' OR nomor_pendaftaran LIKE '%$cari%'");
                    if (mysqli_num_rows($cek_data) > 0) {
                        echo '<div class="alert alert-info mt-3">Status Anda sedang diproses. Harap tunggu konfirmasi lebih lanjut.</div>';
                    } else {
                        echo '<div class="alert alert-warning mt-3">Data tidak ditemukan. Pastikan nama atau nomor pendaftaran yang Anda masukkan benar.</div>';
                    }
                }
            } else {
                // Query default jika tidak ada pencarian
                $query = "SELECT * FROM tb_pendaftaran WHERE status IN ('Lolos', 'Tidak Lolos')";
                $result = mysqli_query($mysqli, $query);
            }
            ?>

            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nomor Pendaftaran</th>
                        <th>Program</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Menampilkan data jika ditemukan
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['nama_lengkap']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nomor_pendaftaran']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['program']) . "</td>";
                            if ($row['status'] == 'Lolos') {
                                echo "<td><span class='badge bg-success'>Lolos</span></td>";
                            } elseif ($row['status'] == 'Tidak Lolos') {
                                echo "<td><span class='badge bg-danger'>Tidak Lolos</span></td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Data tidak ditemukan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>