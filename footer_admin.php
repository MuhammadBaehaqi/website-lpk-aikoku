<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengaturan Footer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (untuk ikon media sosial) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 40px;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h3 {
            font-weight: bold;
            border-left: 5px solid #0d6efd;
            padding-left: 10px;
            color: #333;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        textarea.form-control {
            resize: vertical;
        }

        ::placeholder {
            font-style: italic;
            color: #aaa;
        }

        input[type="file"] {
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

     <div class="container my-5">
        <h3 class="mb-4 text-center">Pengaturan Footer Website</h3>
        <form action="#" method="POST">

            <!-- Deskripsi & Logo -->
            <div class="form-section">
                <h5>Logo & Deskripsi</h5>
                <div class="mb-3">
                    <label for="footerLogo" class="form-label">URL Logo</label>
                    <input type="text" class="form-control" id="footerLogo" name="footer_logo" placeholder="contoh: assets/img/logo.png">
                </div>
                <div class="mb-3">
                    <label for="footerDeskripsi" class="form-label">Deskripsi Singkat</label>
                    <textarea class="form-control" id="footerDeskripsi" name="footer_deskripsi" rows="2"></textarea>
                </div>
            </div>

            <!-- Sosial Media -->
            <div class="form-section">
                <h5>Sosial Media</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Facebook</label>
                        <input type="text" class="form-control" name="facebook" placeholder="https://facebook.com/akun">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Instagram</label>
                        <input type="text" class="form-control" name="instagram" placeholder="https://instagram.com/akun">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>WhatsApp</label>
                        <input type="text" class="form-control" name="whatsapp" placeholder="https://wa.me/nomor">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>YouTube</label>
                        <input type="text" class="form-control" name="youtube" placeholder="https://youtube.com/channel">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="example@email.com">
                    </div>
                </div>
            </div>

            <!-- Menu Cepat -->
            <div class="form-section">
                <h5>Menu Cepat</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="menu_cepat_judul[]" placeholder="Judul Menu, contoh: Beranda">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="menu_cepat_link[]" placeholder="Link, contoh: index.php">
                    </div>
                    <!-- Tambah lagi input sesuai kebutuhan -->
                </div>
            </div>

            <!-- Program -->
            <div class="form-section">
                <h5>Program</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="program_nama[]" placeholder="Nama Program, contoh: Engineering">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="program_link[]" placeholder="Link Program, contoh: engineering.php">
                    </div>
                    <!-- Tambah lagi input sesuai kebutuhan -->
                </div>
            </div>

            <!-- Kontak & Jam Operasional -->
            <div class="form-section">
                <h5>Kontak & Jam Operasional</h5>
                <div class="mb-3">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat lengkap">
                </div>
                <div class="mb-3">
                    <label>No. Telepon</label>
                    <input type="text" class="form-control" name="telepon" placeholder="+62 xxx">
                </div>
                <div class="mb-3">
                    <label>Jam Operasional (Senin - Jumat)</label>
                    <input type="text" class="form-control" name="jam_kerja_weekdays" placeholder="08:00 - 17:00">
                </div>
                <div class="mb-3">
                    <label>Jam Operasional (Sabtu)</label>
                    <input type="text" class="form-control" name="jam_kerja_sabtu" placeholder="08:00 - 14:00">
                </div>
                <div class="mb-3">
                    <label>Jam Operasional (Minggu)</label>
                    <input type="text" class="form-control" name="jam_kerja_minggu" placeholder="Jadwalkan terlebih dahulu">
                </div>
            </div>

            <!-- Google Maps -->
            <div class="form-section">
                <h5>Embed Google Maps</h5>
                <textarea class="form-control" name="google_maps" rows="4" placeholder="Masukkan kode iframe Google Maps"></textarea>
            </div>

            <!-- Copyright -->
            <div class="form-section">
                <h5>Copyright</h5>
                <input type="text" class="form-control" name="copyright" placeholder="© 2025 LPK Aikoku Terpadu. All rights reserved.">
            </div>

            <!-- Tombol Simpan -->
            <div class="text-end">
                <button type="submit" class="btn btn-warning fw-bold px-4">Simpan Perubahan</button>
            </div>
        </form>
    </div>
    <!-- Bootstrap JS (jika diperlukan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>