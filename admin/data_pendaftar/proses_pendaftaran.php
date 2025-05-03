<?php
include '../../config.php'; // file ini harus berisi koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['kirim_nama'];
    $tempat_lahir = $_POST['kirim_tempat_lahir'];
    $tanggal_lahir = $_POST['kirim_tanggal_lahir'];
    $usia = $_POST['kirim_usia'];
    $jenis_kelamin = $_POST['kirim_jenis_kelamin'];
    $agama = $_POST['kirim_agama'];
    $alamat_ktp = $_POST['kirim_alamat_ktp'];
    $email = $_POST['alamat_email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['kirim_alamat'];
    $alamat_keluarga = $_POST['kirim_alamat_keluarga'];
    $telepon_keluarga = $_POST['kirim_no_telepon_keluarga'];
    $program = $_POST['kirim_program'];
    $pendidikan = $_POST['kirim_pendidikan_terakhir'];
    $pengalaman_kerja = $_POST['kirim_pengalaman_kerja'];
    $status_pernikahan = $_POST['kirim_status_pernikahan'];
    $tinggi_badan = $_POST['kirim_tinggi_badan'];
    $berat_badan = $_POST['kirim_berat_badan'];
    $pengalaman_jepang = $_POST['kirim_pengalaman_jepang'];
    $penyakit_kronis = $_POST['kirim_penyakit_kronis'];
    $golongan_darah = $_POST['kirim_golongan_darah'];

    // Cari ID terakhir untuk membuat nomor pendaftaran
    $query_last = mysqli_query($mysqli, "SELECT id FROM tb_pendaftaran ORDER BY id DESC LIMIT 1");
    $data_last = mysqli_fetch_assoc($query_last);

    $last_id = $data_last ? $data_last['id'] : 0;
    $next_id = $last_id + 1;

    // Buat nomor pendaftaran
    $nomor_pendaftaran = '2025' . str_pad($next_id, 3, '0', STR_PAD_LEFT); // Format: 2025001, 2025002, dst.

    // Query untuk insert data pendaftaran
    $query = "INSERT INTO tb_pendaftaran (nama_lengkap, tempat_lahir, tanggal_lahir, usia, jenis_kelamin, agama, alamat_ktp, email, telepon, alamat, alamat_keluarga, telepon_keluarga, program, pendidikan_terakhir, pengalaman_kerja, status_pernikahan, tinggi_badan, berat_badan, pengalaman_jepang, penyakit_kronis, golongan_darah, nomor_pendaftaran) 
              VALUES ('$nama', '$tempat_lahir', '$tanggal_lahir', '$usia', '$jenis_kelamin', '$agama', '$alamat_ktp', '$email', '$telepon', '$alamat', '$alamat_keluarga', '$telepon_keluarga', '$program', '$pendidikan', '$pengalaman_kerja', '$status_pernikahan', '$tinggi_badan', '$berat_badan', '$pengalaman_jepang', '$penyakit_kronis', '$golongan_darah', '$nomor_pendaftaran')";

    if (mysqli_query($mysqli, $query)) {
        echo "<script>alert('Pendaftaran berhasil! Silakan tunggu konfirmasi dari admin.'); window.location.href = 'http://localhost/pendaftaran/index.php';</script>";
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($mysqli);
    }
}
?>