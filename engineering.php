<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Engineering</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .hero-section {
            background: url('img/tulisan.jpeg') no-repeat center center/cover;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
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
    <div class="hero-section d-flex flex-column justify-content-center align-items-center text-center">
        <h1 class="fw-bold">Engineering</h1>
        <p class="fs-5">Program Engineering bagi lulusan D3/S1 yang ingin bekerja di Jepang.</p>
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
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Laki-Laki/Perempuan</li>
                            <li class="list-group-item">Umur 18 – 32 tahun</li>
                            <li class="list-group-item">Pendidikan Min. MA, SMA/SMK/Sederajat</li>
                            <li class="list-group-item">Tidak Buta Warna</li>
                            <li class="list-group-item">Sehat Jasmani dan Rohani</li>
                            <li class="list-group-item">Bersedia mengikuti pembelajaran bahasa Jepang di LPK Aikoku
                                Terpadu
                            </li>
                            <li class="list-group-item">Tidak Bertindik & Bertato</li>
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
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Fotokopi & Asli Ijazah (SD, SMP, SMA/SMK, dan
                                Diploma/Universitas
                                jika ada)</li>
                            <li class="list-group-item">Fotokopi Kartu Tanda Penduduk (KTP)</li>
                            <li class="list-group-item">Fotokopi Kartu Keluarga (KK)</li>
                            <li class="list-group-item">Fotokopi & Asli Akte Kelahiran</li>
                            <li class="list-group-item">Pas Foto dalam format JPG (Background Putih)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>