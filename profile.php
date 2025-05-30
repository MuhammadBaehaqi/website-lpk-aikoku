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

    <?php
    include 'config.php';
    $data = mysqli_query($mysqli, "SELECT * FROM tb_hero_profile ORDER BY id_hero DESC LIMIT 1");
    $hero = mysqli_fetch_assoc($data);
    ?>

    <div class="hero" style="background: url('uploads/<?= $hero['gambar']; ?>') no-repeat center center/cover;">
        <div class="container hero-content">
            <h1 class="fw-bold text-white"><?= $hero['judul']; ?></h1>
            <p class="lead text-white mx-auto" style="max-width: 600px;"><?= $hero['deskripsi']; ?></p>
        </div>
    </div>

    <?php
    $query = mysqli_query($mysqli, "SELECT * FROM tb_profile_sejarah ORDER BY id DESC LIMIT 1");
    $data = mysqli_fetch_assoc($query);
    ?>
    <!-- Section Sejarah -->
    <section class="section-sejarah container">
        <h2 class="fw-bold text-success text-center"><?= $data['judul_atas']; ?></h2>
        <h3 class="fw-bold text-success text-center"><?= $data['judul_bawah']; ?></h3>
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                <img src="uploads/<?= $data['gambar']; ?>" alt="Sejarah LPK"
                    class="img-fluid rounded shadow-lg hover-effect">
            </div>
            <div class="col-md-6">
                <h3 class="fw-bold text-success text-center"><?= $data['judul_tengah']; ?></h3>
                <p><?= $data['paragraf1']; ?></p>
                <p><?= $data['paragraf2']; ?></p>
            </div>
        </div>
    </section>

    <?php
    // Ambil data sambutan dari database
    $query = "SELECT * FROM tb_profile_sambutan ORDER BY tanggal_upload DESC LIMIT 1";
    $result = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_assoc($result);
    ?>
    <!-- Sambutan Kepala Sekolah -->
    <section class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="fw-bold text-success">Sambutan Kepala Sekolah</h2>
                <p><?php echo nl2br($data['paragraf_1']); ?></p>
                <p><?php echo nl2br($data['paragraf_2']); ?></p>
                <p><?php echo nl2br($data['paragraf_3']); ?></p>
                <p><?php echo nl2br($data['paragraf_4']); ?></p>
                <h5 class="fw-bold"><?php echo $data['nama_kepala']; ?></h5>
            </div>
            <div class="col-md-4 text-center">
                <img src="uploads/<?php echo $data['gambar']; ?>" alt="Kepala Sekolah"
                    class="img-fluid rounded-circle shadow-lg hover-effect" width="200">
            </div>
        </div>
    </section>
    <?php
    $query = mysqli_query($mysqli, "SELECT * FROM tb_profile_visimisi ORDER BY tanggal_upload DESC LIMIT 1");
    $visimisi = mysqli_fetch_assoc($query);
    ?>
    <!-- Section Visi Misi -->
    <section class="container my-5">
        <h2 class="fw-bold text-success text-center">Visi & Misi</h2>
        <div class="row">
            <div class="col-md-6">
                <h3 class="fw-bold text-success">Visi</h3>
                <p><?= isset($visimisi['visi']) ? nl2br($visimisi['visi']) : '<i>Data visi belum tersedia.</i>'; ?></p>
            </div>
            <div class="col-md-6">
                <h3 class="fw-bold text-success">Misi</h3>
                <p><?= isset($visimisi['misi']) ? nl2br($visimisi['misi']) : '<i>Data misi belum tersedia.</i>'; ?></p>
            </div>
        </div>
    </section>

    <?php
    $query = "SELECT * FROM tb_profile_pengurus ORDER BY id_pengurus ASC";
    $result = mysqli_query($mysqli, $query);
    ?>
    <!-- Section Tim Pengurus -->
    <section class="container my-5">
        <h2 class="fw-bold text-success text-center">Tim Pengurus</h2>
        <p class="text-center">Kami adalah tim profesional yang berdedikasi mencetak SDM unggul.</p>
        <div class="row text-center mt-4">
            <div class="row text-center mt-4">
                <?php while ($pengurus = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-4">
                        <img src="uploads/<?= $pengurus['foto']; ?>" alt="<?= $pengurus['nama_pengurus']; ?>"
                            class="img-fluid rounded-circle shadow-lg hover-effect" width="150">
                        <h4 class="fw-bold mt-2"><?= $pengurus['nama_pengurus']; ?></h4>
                        <p><?= $pengurus['jabatan']; ?></p>
                        <p><?= $pengurus['deskripsi']; ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
    </section>

    <?php
    $query = "SELECT * FROM tb_profile_legalitas ORDER BY tanggal_upload ASC";
    $result = mysqli_query($mysqli, $query);
    // Pastikan query berhasil dijalankan dan ada hasilnya
    if (!$result) {
        die("Query gagal: " . mysqli_error($mysqli));
    }
    ?>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <section class="container my-5">
            <div class="text-center mb-4">
                <h2 class="fw-bold text-success">Legalitas</h2>
            </div>
            <div class="row justify-content-center">
                <?php while ($legalitas = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card text-center p-3 shadow-lg hover-effect">
                            <div class="card-body">
                                <h2 class="fw-bold text-success"><?= $legalitas['judul']; ?></h2>
                                <img src="uploads/<?= $legalitas['logo']; ?>" alt="Logo Legalitas"
                                    class="img-fluid my-3 hover-effect" width="80">
                                <p><?= $legalitas['deskripsi']; ?></p>
                                <h4 class="fw-bold"><?= $legalitas['nomor_surat']; ?></h4>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    <?php else: ?>
        <div class="text-center my-5">
            <p class="text-muted">Data legalitas belum tersedia. Silakan tambahkan melalui halaman admin.</p>
        </div>
    <?php endif; ?>

    <?php include 'footer.php'; ?>
</body>

</html>