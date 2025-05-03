<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* CSS kamu tetap */
        .hero {
            position: relative;
            background: url('img/profile.jpg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0);
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            color: white;
            border-radius: 10px;
        }

        .section-sejarah {
            padding: 50px 0;
            text-align: center;
        }

        .section-sejarah img {
            max-width: 100%;
            border-radius: 10px;
            margin-top: 20px;
        }

        .hover-effect {
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        .hover-effect:hover {
            transform: translateY(-5px);
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <!-- Hero Section -->
    <div class="hero">
        <div class="container hero-content">
            <h1 class="fw-bold text-white">LPK Aikoku Terpadu</h1>
            <h2 class="text-white">Wujudkan Mimpimu Kerja di Jepang</h2>
            <p class="lead text-white mx-auto" style="max-width: 600px;">
                Lembaga Pelatihan Kerja "AIKOKU TERPADU" adalah lembaga pelatihan yang mendidik dan melatih siswa sesuai
                dengan kebutuhan perusahaan di Jepang.
            </p>
        </div>
    </div>

    <!-- Section Sejarah -->
    <section class="section-sejarah container">
        <h2 class="fw-bold text-success text-center">SEJARAH</h2>
        <h3 class="fw-bold text-success text-center">LPK AIKOKU TERPADU</h3>
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                <img src="img/sejarah.jpg" alt="Sejarah LPK" class="img-fluid rounded shadow-lg hover-effect">
            </div>
            <div class="col-md-6">
                <h3 class="fw-bold text-success text-center">LPK Aikoku Terpadu</h3>
                <p>
                    LPK Aikoku Terpadu adalah lembaga pelatihan kerja yang berdedikasi untuk mengembangkan sumber daya
                    manusia berkualitas. Didirikan pada 10 Mei 2018, lembaga kami berkomitmen memberikan pelatihan
                    terbaik.
                </p>
                <p>
                    Kami telah melatih ribuan peserta yang kini bekerja di perusahaan terkemuka. Komitmen kami terhadap
                    kualitas menjadikan LPK Aikoku Terpadu sebagai lembaga terpercaya.
                </p>
            </div>
        </div>
    </section>

    <!-- Section Sambutan -->
    <section class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="fw-bold text-success">Sambutan Kepala Sekolah</h2>
                <p>Assalamu'alaikum warahmatullahi wabarakatuh,</p>
                <p>Selamat datang di website resmi kami. Kami berkomitmen mencetak SDM yang terampil dan siap kerja di
                    Jepang.</p>
                <p>Semoga lembaga ini terus berkembang dan berkontribusi bagi masyarakat. Terima kasih atas kepercayaan
                    Anda.</p>
                <p>Wassalamu'alaikum warahmatullahi wabarakatuh.</p>
                <h5 class="fw-bold">[Nama Kepala Sekolah]</h5>
            </div>
            <div class="col-md-4 text-center">
                <img src="img/Selma.jpg" alt="Kepala Sekolah" class="img-fluid rounded-circle shadow-lg hover-effect"
                    width="200">
            </div>
        </div>
    </section>

    <!-- Section Visi Misi -->
    <section class="container my-5">
        <h2 class="fw-bold text-success text-center">Visi & Misi</h2>
        <div class="row">
            <div class="col-md-6">
                <h3 class="fw-bold text-success">Visi</h3>
                <p>Menjadi lembaga pelatihan kerja terbaik untuk tenaga kerja profesional di Jepang dengan standar
                    internasional.</p>
            </div>
            <div class="col-md-6">
                <h3 class="fw-bold text-success">Misi</h3>
                <ul>
                    <li>Pelatihan berbasis kebutuhan industri Jepang.</li>
                    <li>Pengembangan bahasa & keterampilan kerja.</li>
                    <li>Kerjasama dengan perusahaan/institusi Jepang.</li>
                    <li>Menanamkan disiplin, profesionalisme, dan etos kerja.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Section Tim Pengurus -->
    <section class="container my-5">
        <h2 class="fw-bold text-success text-center">Tim Pengurus</h2>
        <p class="text-center">Kami adalah tim profesional yang berdedikasi mencetak SDM unggul.</p>
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <img src="img/Selma.jpg" alt="Direktur" class="img-fluid rounded-circle shadow-lg hover-effect" width="150">
                <h4 class="fw-bold mt-2">Imam Joharudin</h4>
                <p>Direktur - Memimpin visi lembaga.</p>
            </div>
            <div class="col-md-4">
                <img src="img/Selma.jpg" alt="Wakil Direktur" class="img-fluid rounded-circle shadow-lg hover-effect"
                    width="150">
                <h4 class="fw-bold mt-2">Ali Chamdan</h4>
                <p>Wakil Direktur - Mendukung implementasi misi.</p>
            </div>
            <div class="col-md-4">
                <img src="img/Selma.jpg" alt="Bendahara" class="img-fluid rounded-circle shadow-lg hover-effect"
                    width="150">
                <h4 class="fw-bold mt-2">Nurul Aeni</h4>
                <p>Bendahara - Mengelola administrasi & keuangan.</p>
            </div>
        </div>
    </section>

    <!-- Section Legalitas -->
    <section class="container my-5">
        <div class="card text-center p-3 shadow-lg hover-effect" style="max-width: 500px; margin: 0 auto;">
            <div class="card-body">
                <h2 class="fw-bold text-success">Legalitas</h2>
                <img src="logo.png" alt="Logo" class="img-fluid my-3 hover-effect" width="80">
                <p>Surat Izin Menkumham Dinperinaker Brebes Nomor</p>
                <h4 class="fw-bold">KEP 563/548/V/2019</h4>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>