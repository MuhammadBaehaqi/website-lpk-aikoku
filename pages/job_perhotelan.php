<?php include '../includes/config.php';
$query = mysqli_query($mysqli, "SELECT * FROM tb_job WHERE nama_job = 'Perhotelan' LIMIT 1");
$data = mysqli_fetch_assoc($query);
//ini buat detail 
$detail = mysqli_query($mysqli, "SELECT * FROM tb_job_detail WHERE nama_job = 'Perhotelan' LIMIT 1");
$dataDetail = mysqli_fetch_assoc($detail);

$nama = $data['nama_job'];
$deskripsi = $data['deskripsi_job'];
$hero = $data['hero_image'];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Bidang Pekerjaan - Perhotelan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .hero-job {
            position: relative;
            background-image: url('../img/sejarah.jpg');
            /* Ganti sesuai gambar */
            background-size: cover;
            background-position: center;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 40px 20px;
            border-radius: 10px;
            animation: fadeIn 1.2s ease-in-out;
            max-width: 800px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .highlight-box {
            background-color: #e6f9e6;
            border-left: 5px solid #28a745;
            padding: 15px 20px;
            margin-top: 20px;
            border-radius: 6px;
        }

        @media (max-width: 768px) {
            .hero-job {
                height: 70vh;
                padding: 30px 10px;
            }

            .hero-overlay h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>

    <?php include '../includes/navbar.php'; ?>

    <!-- Hero Section -->
    <div class="hero-job" style="background: url('../uploads/<?= $hero ?>') center/cover no-repeat;">
        <div class="hero-overlay">
            <h1 class="fw-bold">Bidang Pekerjaan: <?= htmlspecialchars($nama) ?></h1>
            <p class="lead mb-3"><?= htmlspecialchars($deskripsi) ?></p>
            <a href="daftar.php" class="btn btn-warning btn-lg">Daftar Sekarang</a>
        </div>
    </div>

    <!-- Konten Utama -->
    <section class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4">
                <img src="../uploads/<?= htmlspecialchars($dataDetail['gambar']) ?>" class="img-fluid rounded shadow"
                    alt="<?= htmlspecialchars($nama) ?>">
            </div>
            <div class="col-md-6">
                <p><?= nl2br($dataDetail['paragraf']) ?></p>
    
                <div class="highlight-box">
                    <div class="alert alert-warning mt-2 fw-semibold">
                        📅 <?= $dataDetail['pengumuman'] ?>
                    </div>
    
                    <h5 class="fw-semibold text-success mt-3">Cakupan Tugas:</h5>
                    <ul>
                        <?php
                        $baris = explode("\n", $dataDetail['cakupan_tugas']);
                        foreach ($baris as $isi) {
                            echo "<li>" . htmlspecialchars(trim($isi)) . "</li>";
                        }
                        ?>
                    </ul>
    
                    <h5 class="fw-semibold text-success">Pendaftaran Terbuka Untuk:</h5>
                    <ul>
                        <?php
                        $baris = explode("\n", $dataDetail['pendaftaran_terbuka']);
                        foreach ($baris as $isi) {
                            echo "<li>" . htmlspecialchars(trim($isi)) . "</li>";
                        }
                        ?>
                    </ul>
    
                    <h5 class="fw-semibold text-success">Persyaratan Umum:</h5>
                    <ul>
                        <?php
                        $baris = explode("\n", $dataDetail['persyaratan_umum']);
                        foreach ($baris as $isi) {
                            echo "<li>" . htmlspecialchars(trim($isi)) . "</li>";
                        }
                        ?>
                    </ul>
                </div>
    
                <div class="text-start mt-4">
                    <a href="daftar.php" class="btn btn-success btn-lg">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <?php include '../includes/footer.php'; ?>
</body>

</html>