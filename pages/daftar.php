<?php
include '../includes/config.php'; // Ini HARUS ada sebelum pemakaian $mysqli
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .hero-section {
            background: url('../img/hero.jpg') no-repeat center center/cover;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        fieldset {
            border: 2px solid #dee2e6;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        legend {
            font-size: 1.2rem;
            font-weight: 600;
            padding: 0 10px;
            width: auto;
            color: #343a40;
            border-bottom: none;
        }
    </style>
</head>

<body>
    <?php include '../includes/navbar.php'; ?>
    <?php
    $heroQuery = mysqli_query($mysqli, "SELECT * FROM tb_hero_pendaftaran ORDER BY id_hero DESC LIMIT 1");
    $heroData = mysqli_fetch_assoc($heroQuery);

    // Tambahkan pengecekan jika tidak ada data
    if (!$heroData) {
        $hero_background = 'img/hero.jpg';  // Default image
        $hero_title = 'Hubungi Kami';
        $hero_description = '';  // Kosongkan deskripsi jika tidak ada
    } else {
        // Gunakan data dari database jika ada
        $hero_background = "../uploads/" . $heroData['gambar'];
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

    <!-- Peringatan sebelum form -->
    <div class="alert alert-warning">
        <strong>Perhatian!</strong> Pastikan semua data yang Anda isi sudah benar.
        Setelah mengklik tombol "Daftar", Anda tidak dapat mendaftar ulang menggunakan email yang sama.
        Jika Anda ingin memperbaiki data setelah mendaftar, silakan login lalu gunakan fitur <strong>Edit
            Profil</strong>.
    </div>

    <div class="container mt-4">
        <h2 class="text-center">Formulir Pendaftaran</h2>
        <form action="/pendaftaran/admin/data_pendaftar/proses_pendaftaran.php" method="POST"
            enctype="multipart/form-data" class="p-4 shadow rounded bg-light mb-5" onsubmit="return konfirmasiData();">
            <!-- A. Data Pribadi -->
            <fieldset class="mb-4">
                <legend>Data Pribadi</legend>

                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                    <input type="text" id="nama_lengkap" name="kirim_nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="foto_diri" class="form-label">Upload Foto Diri (3x4):</label>
                    <input type="file" id="foto_diri" name="foto_diri" class="form-control" accept="image/*" required>
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
            </fieldset>

            <!-- B. Kontak & Alamat -->
            <fieldset class="mb-4">
                <legend>Kontak & Alamat</legend>

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
            </fieldset>

            <!-- C. Kontak Keluarga -->
            <fieldset class="mb-4">
                <legend>Kontak Keluarga</legend>

                <div class="mb-3">
                    <label for="alamat_keluarga" class="form-label">Alamat_Keluarga:</label>
                    <input type="text" id="alamat_keluarga" name="kirim_alamat_keluarga" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="telepon_keluarga" class="form-label">No.Telepon/WhatsApp Keluarga:</label>
                    <input type="text" id="telepon_keluarga" name="kirim_no_telepon_keluarga" class="form-control"
                        required>
                </div>
            </fieldset>

            <!-- D. Latar Belakang Pendidikan -->
            <fieldset class="mb-4">
                <legend>Pendidikan & Program</legend>

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
                    <label for="program" class="form-label">Pilih Program:</label>
                    <select id="program" name="kirim_program" class="form-select" required>
                        <option value="">Pilih Program</option>
                        <option value="Magang">Program Magang</option>
                        <option value="Engineering">Program Engineering</option>
                        <option value="Tokutei Ginou">Program Tokutei Ginou</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="BidangPekerjaan" class="form-label">Pilih Bidang Pekerjaan:</label>
                    <select id="bidang_pekerjaan" name="kirim_bidang" class="form-select" required>
                        <option value="">Pilih Bidang Pekerjaan</option>
                        <option value="Perhotelan">Perhotelan</option>
                        <option value="Pertanian">Pertanian</option>
                        <option value="Pengelolahan Makanan">Pengelolahan Makanan</option>
                        <option value="Perawat Lansia (Kaigo)">Perawat Lansia (Kaigo)</option>
                        <option value="Konstruksi">Konstruksi</option>
                        <option value="Kebersihan & Layanan Umum">Kebersihan & Layanan Umum</option>
                        <option value="Restoran">Restoran</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pengalaman_kerja" class="form-label">Pengalaman Kerja:</label>
                    <input type="text" id="pengalaman_kerja" name="kirim_pengalaman_kerja" class="form-control"
                        required>
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
                    <label for="motivasi" class="form-label">Motivasi Anda Mengikuti Program Ini:</label>
                    <textarea id="motivasi" name="kirim_motivasi" class="form-control" rows="3"></textarea>
                </div>
            </fieldset>

            <!-- E. Informasi Tambahan -->
            <fieldset class="mb-4">
                <legend>Informasi Tambahan</legend>

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
                    <input type="text" id="penyakit_kronis" name="kirim_penyakit_kronis" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="golongan_darah" class="form-label">Golongan Darah:</label>
                    <input type="text" id="golongan_darah" name="kirim_golongan_darah" class="form-control" required>
                </div>
            </fieldset>

            <!-- Submit -->
            <button type="submit" class="btn btn-success w-100">Daftar</button>
        </form>

    </div>
    <?php include '../includes/footer.php'; ?>

    <!-- JS Konfirmasi Submit -->
    <script>
        function konfirmasiData() {
            return confirm("Apakah semua data yang Anda isi sudah benar? Klik OK untuk lanjut atau Cancel untuk kembali.");
        }
    </script>
</body>

</html>