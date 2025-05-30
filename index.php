<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        #heroCarousel .hero-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            color: white;
            padding-top: 80px;
        }

        /* Animasi fade-in di hero */
        #heroCarousel .hero-content {
            animation: fadeIn 1.5s ease-in-out;
        }

        /* Gambar di carousel hero */
        #heroCarousel .carousel-item img {
            object-fit: cover;
            /* Hindari distorsi */
            height: 100vh;
            /* Full layar */
        }

        /* Teks di atas gambar (caption) di hero */
        #heroCarousel .carousel-caption {
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
        }

        /* Efek hover tombol di hero */
        #heroCarousel .btn-warning {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        #heroCarousel .btn-warning:hover {
            transform: translateY(-3px);
            /* Tombol naik sedikit */
            box-shadow: 0 10px 20px rgba(255, 193, 7, 0.5);
            /* Bayangan hover */
        }

        /* Animasi fade-in */
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

        .content-section {
            padding: 60px 0;
        }

        .content-section h2 {
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeInUp 0.8s ease-in-out;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Gaya teks di carousel testimoni */
        #testimoniCarousel .testimonial-text {
            font-size: 18px;
            font-style: italic;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Efek transisi di carousel testimoni */
        #testimoniCarousel .carousel-item {
            transition: transform 0.6s ease-in-out;
        }

        /* Warna tombol navigasi di testimoni */
        #testimoniCarousel .carousel-control-prev,
        #testimoniCarousel .carousel-control-next {
            filter: invert(30%);
        }

        /* Bingkai di foto testimoni */
        #testimoniCarousel .rounded-circle {
            border: 3px solid #28a745;
            /* Warna hijau */
            padding: 5px;
        }

        .deskripsi-beranda {
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php' ?>
    <!-- Hero Section -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/hero.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption hero-section">
                    <div class="hero-content">
                        <h1>Wujudkan Mimpimu Kerja di Jepang</h1>
                        <p>Bersama LPK Aikoku Terpadu</p>
                        <a href="#daftar" class="btn btn-warning">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/sejarah.jpg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption hero-section">
                    <div class="hero-content">
                        <h1>Raih Masa Depan Cerah di Jepang</h1>
                        <p>Dengan Dukungan LPK Aikoku Terpadu</p>
                        <a href="#program" class="btn btn-warning">Lihat Program</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/profile.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption hero-section">
                    <div class="hero-content">
                        <h1>Bersiaplah Menuju Karier Global</h1>
                        <p>Bersama LPK Aikoku Terpadu</p>
                        <a href="#kontak" class="btn btn-warning">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
    <?php
    $query = mysqli_query($mysqli, "SELECT * FROM tb_beranda_tentang_kami ORDER BY id_tentang DESC LIMIT 1");
    $data = mysqli_fetch_assoc($query);
    ?>
    <!-- Tentang Kami Singkat -->
    <section class="content-section py-5 bg-light" id="tentang">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="uploads/<?php echo $data['gambar']; ?>" class="img-fluid rounded shadow"
                        alt="Tentang LPK Aikoku Terpadu">
                </div>
                <div class="col-md-6">
                    <h2 class="text-success fw-bold"><?php echo $data['judul']; ?></h2>
                    <div class="deskripsi-beranda">
                        <?php echo $data['deskripsi']; ?>
                    </div>
                    <a href="kontak.php" class="btn btn-success mt-3">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Mengapa Memilih Kami -->
    <?php
    $query = mysqli_query($mysqli, "SELECT * FROM tb_beranda_keunggulan ORDER BY id_keunggulan ASC");
    ?>

    <section class="content-section py-5">
        <div class="container">
            <h2 class="text-center text-success fw-bold mb-4">Mengapa Memilih Kami</h2>
            <div class="row g-4">
                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                    <div class="col-md-6">
                        <div class="card text-center shadow-sm p-4 h-100">
                            <div class="mb-3">
                                <i class="<?php echo $row['ikon']; ?> fa-3x text-success mb-3"></i>
                            </div>
                            <h4><?php echo $row['judul']; ?></h4>
                            <p><?php echo $row['deskripsi']; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- fasilitas -->
    <section class="content-section py-5">
        <div class="container">
            <h2 class="text-center text-success fw-bold mb-4">Fasilitas Kami</h2>
            <div class="row g-4">
                <?php
                include 'config.php';
                $result = mysqli_query($mysqli, "SELECT * FROM tb_beranda_fasilitas ORDER BY id_fasilitas ASC");
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-md-6">
                        <div class="card text-center shadow-sm p-4 h-100">
                            <div class="mb-3">
                                <i class="<?= $row['ikon']; ?> fa-3x text-success"></i>
                            </div>
                            <h4><?= $row['judul']; ?></h4>
                            <p><?= $row['deskripsi']; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php
    // Query untuk mengambil data testimoni
    $query = "SELECT * FROM tb_beranda_testimoni ORDER BY tanggal ASC"; // Urutkan sesuai tanggal atau sesuaikan
    $result = mysqli_query($mysqli, $query);

    // Cek apakah query berhasil
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli); // Tampilkan pesan error jika query gagal
    }
    ?>
    <!-- Testimoni Section -->
    <section id="testimoni" class="testimoni-section py-5 bg-white">
        <div class="container">
            <!-- Teks Heading Testimoni Alumni -->
            <h2 class="text-center text-success fw-bold mb-4">Testimoni Alumni<br>LPK Aikoku Terpadu</h2>
            <div id="testimoniCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $isActive = 'active'; // Inisialisasi status item pertama sebagai 'active'
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="carousel-item ' . $isActive . '">';
                        echo '<div class="d-flex flex-column align-items-center">';
                        echo '<p class="testimonial-text px-4 text-center">"' . $row['testimoni'] . '"</p>';
                        echo '<img src="uploads/' . $row['gambar'] . '" class="rounded-circle mt-3" width="150" alt="Alumni">';
                        echo '<h5 class="fw-bold mt-2">' . $row['nama'] . '</h5>';
                        echo '<p class="text-muted">' . $row['bidang'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        $isActive = ''; // Set status item berikutnya menjadi kosong setelah item pertama
                    }
                    ?>
                </div>
                <!-- Navigasi Carousel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimoniCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimoniCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Program Unggulan -->
    <section class="content-section py-5" id="program">
        <div class="container">
            <h2 class="text-center text-success fw-bold mb-5">Program Unggulan</h2>
            <div class="row text-center">

                <!-- Engineering -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm p-4 h-100">
                        <i class="fas fa-cogs fa-3x text-success mb-3"></i>
                        <h4>Program Engineering</h4>
                        <p>Pelatihan keterampilan teknik untuk mendukung karier profesional di Jepang.</p>
                        <a href="engineering.php" class="btn btn-success mt-3">Lihat Detail</a>
                    </div>
                </div>

                <!-- Magang -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm p-4 h-100">
                        <i class="fas fa-briefcase fa-3x text-success mb-3"></i>
                        <h4>Program Magang</h4>
                        <p>Persiapan intensif untuk magang di berbagai perusahaan Jepang terkemuka.</p>
                        <a href="magang.php" class="btn btn-success mt-3">Lihat Detail</a>
                    </div>
                </div>

                <!-- Tokutei Ginou -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm p-4 h-100">
                        <i class="fas fa-language fa-3x text-success mb-3"></i>
                        <h4>Tokutei Ginou</h4>
                        <p>Pelatihan untuk skill tertentu tokutei ginou dengan peluang kerja tetap di Jepang.</p>
                        <a href="tokutei.php" class="btn btn-success mt-3">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pengumuman -->
    <section class="container my-5">
        <h2 class="fw-bold text-success text-center">Pengumuman Kelulusan</h2>
        <div class="text-center">
            <p>Cek pengumuman hasil seleksi siswa LPK Aikoku Terpadu.</p>
            <a href="pengumuman.php" class="btn btn-outline-success">Lihat Pengumuman</a>
        </div>
    </section>

    <!-- Langkah Pendaftaran -->
    <section class="content-section">
        <div class="container">
            <h2>Langkah Mudah Mendaftar</h2>
            <div class="row">
                <div class="col-md-3 text-center">
                    <h4>1. Isi Formulir</h4>
                    <p>Lengkapi formulir pendaftaran secara online.</p>
                </div>
                <div class="col-md-3 text-center">
                    <h4>2. Verifikasi Data</h4>
                    <p>Pihak admin akan melakukan pengecekan data.</p>
                </div>
                <div class="col-md-3 text-center">
                    <h4>3. Proses Seleksi</h4>
                    <p>Ikuti tahapan seleksi dan tes kemampuan.</p>
                </div>
                <div class="col-md-3 text-center">
                    <h4>4. Diterima!</h4>
                    <p>Selamat! Kamu siap untuk pelatihan dan kerja di Jepang.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Ajakan Daftar -->
    <section class="content-section py-5 bg-success text-white text-center">
        <div class="container">
            <h2 class="fw-bold mb-4">Siap Wujudkan Mimpimu ke Jepang?</h2>
            <p class="lead mb-4">Bergabunglah dengan LPK Aikoku Terpadu dan mulailah perjalananmu menuju masa depan
                cerah di Jepang!</p>
            <a href="daftar.php" class="btn btn-warning btn-lg">Daftar Sekarang</a>
        </div>
    </section>

    <?php include 'footer.php' ?>

</body>

</html>