<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .hero-section {
            background: url('img/hero.jpg') no-repeat center center/cover;
            height: 60vh;
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

        /* Efek hover kuning di footer */
        .footer a:hover,
        .footer .dropdown-toggle:hover {
            color: #FFD700 !important;
            /* Warna emas saat hover */
        }

        /* Pisahkan hover tombol dari hover link footer */
        .footer a.btn:hover {
            color: inherit !important;
            /* Warna teks kembali ke default */
        }

        /* Tombol Daftar */
        .footer .btn-success {
            background-color: #FFD700 !important;
            /* Kuning */
            color: #fff !important;
            /* Teks putih */

            border: 1px solid #fff !important;
            /* Border kuning */
        }

        .footer .btn-success:hover {
            background-color: #fff !important;
            /* Putih */
            color: #FFD700 !important;
            /* Teks kuning */
            border: 1px solid #FFD700 !important;
            /* Tambahkan border kuning saat hover */
        }

        /* Tombol Login */
        .footer .btn-outline-light {
            background-color: #fff !important;
            /* Putih */
            color: #FFD700 !important;
            /* Teks kuning */
            border: 1px solid #FFD700 !important;
            /* Border kuning */
        }

        .footer .btn-outline-light:hover {
            background-color: #FFD700 !important;
            /* Kuning */
            color: #fff !important;
            /* Teks putih */
            border: 1px solid #fff !important;
            /* Border tetap kuning */
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="hero-section">
        <h1>Daftar Sekarang dan Wujudkan Mimpi Anda di Jepang!</h1>
    </div>
    <div class="container mt-4">
        <h2 class="text-center">Formulir Pendaftaran</h2>
        <form action="/pendaftaran/admin/data_pendaftar/proses_pendaftaran.php" method="POST" class="p-4 shadow rounded bg-light mb-5">
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="kirim_nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir:</label>
                <input type="text" id="tempat_lahir" name="kirim_tempat_lahir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="kirim_tanggal_lahir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="usia" class="form-label">Usia:</label>
                <input type="number" id="usia" name="kirim_usia" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="kirim_jenis_kelamin" class="form-select" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama:</label>
                <select id="agama" name="kirim_agama" class="form-select" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat_ktp" class="form-label">Alamat KTP:</label>
                <input type="text" id="alamat_ktp" name="kirim_alamat_ktp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email:</label>
                <input type="email" id="email" name="alamat_email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">No.Telepon/WhatsApp:</label>
                <input type="text" id="telepon" name="telepon" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" id="alamat" name="kirim_alamat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="alamat_keluarga" class="form-label">Alamat_Keluarga:</label>
                <input type="text" id="alamat_keluarga" name="kirim_alamat_keluarga" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="telepon_keluarga" class="form-label">No.Telepon/WhatsApp Keluarga:</label>
                <input type="text" id="telepon_keluarga" name="kirim_no_telepon_keluarga" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="program" class="form-label">Pilih Program:</label>
                <select id="program" name="kirim_program" class="form-select" required>
                    <option value="Magang">Program Magang</option>
                    <option value="Engineering">Program Engineering</option>
                    <option value="Tokutei Ginou">Program Tokutei Ginou</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir:</label>
                <select id="pendidikan_terakhir" name="kirim_pendidikan_terakhir" class="form-select" required>
                    <option value="">Pilih Pendidikan Terakhir</option>
                    <option value="SD">SD</option>
                    <option value="MI">MI</option>
                    <option value="SMP">SMP</option>
                    <option value="MTS">MTS</option>
                    <option value="SMA">SMA</option>
                    <option value="ALIYAH">ALIYAH</option>
                    <option value="SMK">SMK</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="pengalaman_kerja" class="form-label">Pengalaman Kerja:</label>
                <input type="text" id="pengalaman_kerja" name="kirim_pengalaman_kerja" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="status_pernikahan" class="form-label">Status Pernikahan:</label>
                <select id="status_pernikahan" name="kirim_status_pernikahan" class="form-select" required>
                    <option value="">Pilih Status Pernikahan</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Janda/Duda">Janda/Duda</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tinggi_badan" class="form-label">Tinggi Badan (cm):</label>
                <input type="number" id="tinggi_badan" name="kirim_tinggi_badan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="berat_badan" class="form-label">Berat Badan (kg):</label>
                <input type="number" id="berat_badan" name="kirim_berat_badan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="pengalaman_jepang" class="form-label">Pengalaman Jepang:</label>
                <select id="pengalaman_jepang" name="kirim_pengalaman_jepang" class="form-select" required>
                    <option value="">Pilih Status</option>
                    <option value="Pemula">Pemula</option>
                    <option value="Ex-Jepang">Ex-Jepang</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="penyakit_kronis" class="form-label">Penyakit Kronis (jika ada):</label>
                <input type="text" id="penyakit_kronis" name="kirim_penyakit_kronis" class="form-control">
            </div>
            <div class="mb-3">
                <label for="golongan_darah" class="form-label">Golongan Darah:</label>
                <input type="text" id="golongan_darah" name="kirim_golongan_darah" class="form-control">
            </div>
            <button type="submit" class="btn btn-success w-100">Daftar</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>