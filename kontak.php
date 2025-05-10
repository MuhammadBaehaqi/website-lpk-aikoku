<?php
include 'config.php'; // Ini HARUS ada sebelum pemakaian $mysqli

$kontakQuery = mysqli_query($mysqli, "SELECT * FROM tb_informasi_kontak ORDER BY id_kontak DESC LIMIT 1");
$kontakData = mysqli_fetch_assoc($kontakQuery);

$mapsQuery = mysqli_query($mysqli, "SELECT * FROM tb_maps ORDER BY id_maps DESC LIMIT 1");
$mapsData = mysqli_fetch_assoc($mapsQuery);
$maps_url = $mapsData ? $mapsData['maps_url'] : '';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .hero-section {
            background: url('img/kontak.jpg') no-repeat center center/cover;
            height: 80vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 20px;
        }

        .hero-section h1 {
            font-size: 32px;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 16px;
            max-width: 600px;
        }

        .contact-info {
            background: #f8f9fa;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <?php
    $heroQuery = mysqli_query($mysqli, "SELECT * FROM tb_hero_kontak ORDER BY id_hero DESC LIMIT 1");
    $heroData = mysqli_fetch_assoc($heroQuery);

    // Tambahkan pengecekan jika tidak ada data
    if (!$heroData) {
        $hero_background = 'img/hero.jpg';  // Default image
        $hero_title = 'Hubungi Kami';
        $hero_description = '';  // Kosongkan deskripsi jika tidak ada
    } else {
        // Gunakan data dari database jika ada
        $hero_background = "uploads/" . $heroData['gambar'];
        $hero_title = $heroData['judul'];
        $hero_description = $heroData['deskripsi'];
    }
    ?>
    <div class="hero-section" style="background: url('<?= $hero_background ?>') no-repeat center center/cover;">
        <div class="container">
            <h1><?= htmlspecialchars($hero_title) ?></h1>
            <p><?= htmlspecialchars($hero_description) ?></p>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <!-- Card Kirim Pesan -->
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h3 class="text-success">Kirim Pesan</h3>
                        <form action="/pendaftaran/admin/kontak_masuk/proses_kontak.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Card Informasi Kontak -->
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h3 class="text-success">Informasi Kontak</h3>
                        <?php if ($kontakData): ?>
                            <p><i class="fas fa-map-marker-alt text-success"></i>
                                <?= htmlspecialchars($kontakData['alamat']) ?></p>
                            <p><i class="fas fa-envelope text-success"></i>
                                <?= htmlspecialchars($kontakData['email_kontak']) ?></p>
                            <p><i class="fas fa-phone text-success"></i> <?= htmlspecialchars($kontakData['telepon']) ?></p>
                            <p><i class="fas fa-clock text-success"></i> <?= htmlspecialchars($kontakData['jam_kerja']) ?>
                            </p>
                            <p><i class="fas fa-clock text-success"></i> <?= htmlspecialchars($kontakData['jam_sabtu']) ?>
                            </p>
                            <p><i class="fas fa-sticky-note text-success"></i>
                                <?= htmlspecialchars($kontakData['catatan']) ?></p>
                        <?php else: ?>
                            <p class="text-danger">Informasi kontak belum tersedia.</p>
                        <?php endif; ?>
                        <span class="text-danger fw-bold">Minggu: Jadwalkan Terlebih Dahulu</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Google Maps -->
        <?php if ($maps_url): ?>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-0">
                            <iframe src="<?= htmlspecialchars($maps_url) ?>" width="100%" height="350" style="border:0;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>