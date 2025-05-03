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
    <div class="hero-section">
        <h1>Hubungi Kami</h1>
        <p>Dapatkan informasi yang sebenar-benarnya tentang Jepang dan program pemagangan kami. Kami siap membantu Anda
            mencapai impian bekerja di Jepang.</p>
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
                        <p><i class="fas fa-map-marker-alt text-success"></i> Petunjungan, Kab. Brebes, Jawa Tengah</p>
                        <p><i class="fas fa-envelope text-success"></i> lpkaikokuterpadu@gmail.com</p>
                        <p><i class="fas fa-phone text-success"></i> +62 857-2522-1265</p>
                        <p><i class="fas fa-clock text-success"></i> Senin - Jumat: 08:00 - 17:00</p>
                        <p><i class="fas fa-clock text-success"></i> Sabtu: 08:00 - 14:00</p>
                        <span class="text-danger fw-bold">Minggu: Jadwalkan Terlebih Dahulu</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Google Maps -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-0">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1411.6175482198566!2d108.977370955763!3d-6.9124748066521775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fa5af84c2ae8d%3A0x6d0eb4890eba578f!2sLPK%20AIKOKU%20TERPADU!5e1!3m2!1sid!2sid!4v1742344655628!5m2!1sid!2sid"
                            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>