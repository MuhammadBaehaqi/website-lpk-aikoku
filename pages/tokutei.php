<?php
include '../includes/config.php';

// Ambil hero section untuk program tokutei
$queryHero = "SELECT * FROM tb_hero_program WHERE program='tokutei' ORDER BY id_hero_program DESC LIMIT 1";
$resultHero = mysqli_query($mysqli, $queryHero);
$dataHero = mysqli_fetch_assoc($resultHero);

// Siapkan data default jika tidak ada hero
$gambarHero = $dataHero ? '../uploads/' . $dataHero['gambar'] : '../img/default.jpg';
$judulHero = $dataHero ? $dataHero['judul'] : 'Program Tokutei Ginou';
$deskripsiHero = $dataHero ? $dataHero['deskripsi'] : 'Program Tokutei Ginou bagi yang baru ke Jepang.';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Tokutei Ginou</title>
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .hero-section {
            background: url('../img/tulisan.jpeg') no-repeat center center/cover;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
            padding: 0 20px;
        }

        .hero-section h1,
        .hero-section p {
            word-wrap: break-word;
            /* Membuat teks terbungkus ke baris berikutnya jika panjang */
            word-break: break-word;
            /* Menjamin kata panjang yang tidak terpisah juga akan terputus dengan baik */
            max-width: 100%;
            /* Pastikan teks tidak melampaui lebar container */
        }
    </style>
</head>

<body>
    <?php include '../includes/navbar.php'; ?>
    <div class="hero-section d-flex flex-column justify-content-center align-items-center text-center"
        style="background: url('<?php echo $gambarHero; ?>') no-repeat center center/cover;">
        <h1 class="fw-bold"><?php echo htmlspecialchars($judulHero); ?></h1>
        <p class="fs-5"><?php echo htmlspecialchars($deskripsiHero); ?></p>
        <a href="daftar.php" class="btn btn-warning btn-lg mt-3">Daftar Sekarang</a>
    </div>

    <div class="container mt-5">
        <div class="row mb-5">
            <!-- Card Persyaratan Umum -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white text-center">
                        <h5>Persyaratan Umum</h5>
                    </div>
                    <div class="card-body">
                        <!-- Persyaratan Umum -->
                        <ul class="list-group list-group-flush">
                            <?php
                            $queryUmum = "SELECT * FROM tb_persyaratan_program WHERE program='tokutei' AND jenis='umum'";
                            $resultUmum = mysqli_query($mysqli, $queryUmum);
                            while ($row = mysqli_fetch_assoc($resultUmum)) {
                                echo "<li class='list-group-item'>" . htmlspecialchars($row['isi']) . "</li>";
                            }
                            ?>
                        </ul>

                    </div>
                </div>
            </div>

            <!-- Card Persyaratan Dokumen -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-lg">
                    <div class="card-header bg-warning text-dark text-center">
                        <h5>Persyaratan Dokumen</h5>
                    </div>
                    <div class="card-body">
                        <!-- Persyaratan Dokumen -->
                        <ul class="list-group list-group-flush">
                            <?php
                            $queryDokumen = "SELECT * FROM tb_persyaratan_program WHERE program='tokutei' AND jenis='dokumen'";
                            $resultDokumen = mysqli_query($mysqli, $queryDokumen);
                            while ($row = mysqli_fetch_assoc($resultDokumen)) {
                                echo "<li class='list-group-item'>" . htmlspecialchars($row['isi']) . "</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php' ?>
</body>

</html>