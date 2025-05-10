<?php
include 'config.php';

$category = isset($_GET['category']) ? str_replace('-', ' ', $_GET['category']) : '';
$filter = '';
if (!empty($category)) {
    $filter = "WHERE detail = '$category'";
}

$query = "SELECT foto_album, deskripsi, upload_date, detail FROM tb_album $filter ORDER BY upload_date DESC";
$result = mysqli_query($mysqli, $query);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .hero-section {
            background: url('img/sejarah.jpg') no-repeat center center/cover;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .nav-buttons {
            width: 100%;
            background-color: #00b300;
            padding: 15px 0;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .nav-button {
            background: none;
            border: 2px solid white;
            color: white;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-weight: bold;
        }

        .nav-button:hover {
            background-color: white;
            color: #00ff37;
        }

        .nav-button.active {
            background-color: white;
            color: #00b300;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 15px;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .card-img-top {
            transition: transform 0.5s ease;

        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .footer {
            background-color: #000;
            /* Warna hitam */
            color: #fff;
            /* Warna teks putih */
        }

        .footer a {
            text-decoration: none;
        }

        .footer .fab,
        .footer .fas {
            font-size: 20px;
        }

        .footer h5 {
            color: #00ff00;
            /* Warna hijau neon */
        }

        .footer .text-success {
            color: #00ff00 !important;
            /* Hijau neon */
        }

        .footer .text-danger {
            color: #ff0000 !important;
            /* Merah */
        }

        .footer p,
        .footer a {
            color: #bbb;
            /* Abu-abu terang */
        }

        .footer a:hover {
            color: #00ff00;
            /* Hijau neon saat hover */
        }

        /* Garis di atas Copyright */
        .footer-line {
            border: 1px solid #444;
            /* Warna garis abu-abu gelap */
            margin-top: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <?php
   

    $heroQuery = mysqli_query($mysqli, "SELECT * FROM tb_hero_album ORDER BY id_hero DESC LIMIT 1");
    $heroData = mysqli_fetch_assoc($heroQuery);

    // Tambahkan pengecekan jika tidak ada data
    if (!$heroData) {
        $hero_background = 'img/sejarah.jpg';  // Default image
        $hero_title = 'Album Kami';
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


    <!-- Tombol Navigasi Kategori -->
    <div class="nav-buttons">
        <a href="album.php?category=Keberangkatan"
            class="nav-button <?php echo ($category == 'Keberangkatan') ? 'active' : ''; ?>">Keberangkatan</a>
        <a href="album.php?category=Kelulusan-Job"
            class="nav-button <?php echo ($category == 'Kelulusan Job') ? 'active' : ''; ?>">Kelulusan Job</a>
        <a href="album.php?category=Pendidikan-LPK"
            class="nav-button <?php echo ($category == 'Pendidikan LPK') ? 'active' : ''; ?>">Pendidikan LPK</a>
        <a href="album.php?category=Tanda-Tangan-Kontrak"
            class="nav-button <?php echo ($category == 'Tanda Tangan Kontrak') ? 'active' : ''; ?>">Tanda Tangan
            Kontrak</a>
    </div>

    <!-- Album Grid -->
    <div class="container my-2">
        <div class="row g-4">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow fade-in">
                            <img src="<?= $row['foto_album']; ?>" class="card-img-top"
                                alt="<?= htmlspecialchars($row['deskripsi']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['deskripsi']); ?></h5>
                                <p class="card-text">
                                    <small class="text-muted"><?= date('d M Y', strtotime($row['upload_date'])); ?></small>
                                </p>
                                <p class="card-text"><?= htmlspecialchars($row['detail']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-danger text-center fw-bold" role="alert">
                        Tidak ada gambar di kategori ini.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>