<?php
include '../../includes/config.php'; // koneksi database

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

    // ✅ Cek apakah email sudah digunakan untuk akun login
    $cek_email = mysqli_query($mysqli, "SELECT * FROM tb_pengguna WHERE email_pengguna = '$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>
            alert('Email sudah terdaftar. Jika ingin memperbaiki data, silakan login dan edit profil.');
            window.location.href = '../../pages/daftar.php';
        </script>";
        exit();
    }

    // 🔒 Buat akun login terlebih dahulu
    $password_default = md5("123456");
    $role = 'user';
    mysqli_query($mysqli, "INSERT INTO tb_pengguna (username, email_pengguna, password, roles)
                           VALUES ('$nama', '$email', '$password_default', '$role')");

    // 🔍 Ambil id_pengguna yang baru dibuat
    $get_user = mysqli_query($mysqli, "SELECT id_pengguna FROM tb_pengguna WHERE email_pengguna = '$email'");
    $user = mysqli_fetch_assoc($get_user);
    $id_pengguna = $user['id_pengguna'];

    // 🔢 Buat nomor pendaftaran
    $query_last = mysqli_query($mysqli, "SELECT id_pendaftaran FROM tb_pendaftaran ORDER BY id_pendaftaran DESC LIMIT 1");
    $data_last = mysqli_fetch_assoc($query_last);
    $last_id = $data_last ? $data_last['id_pendaftaran'] : 0;
    $next_id = $last_id + 1;
    $nomor_pendaftaran = '2025' . str_pad($next_id, 3, '0', STR_PAD_LEFT); // 2025001, dst.

    // 📝 Simpan data ke tb_pendaftaran, gunakan id_pengguna
    $query = "INSERT INTO tb_pendaftaran (
        nama_lengkap, tempat_lahir, tanggal_lahir, usia, jenis_kelamin, agama, alamat_ktp, email, telepon, alamat,
        alamat_keluarga, telepon_keluarga, program, pendidikan_terakhir, pengalaman_kerja, status_pernikahan,
        tinggi_badan, berat_badan, pengalaman_jepang, penyakit_kronis, golongan_darah, nomor_pendaftaran, id_pengguna
    ) VALUES (
        '$nama', '$tempat_lahir', '$tanggal_lahir', '$usia', '$jenis_kelamin', '$agama', '$alamat_ktp',
        '$email', '$telepon', '$alamat', '$alamat_keluarga', '$telepon_keluarga', '$program', '$pendidikan',
        '$pengalaman_kerja', '$status_pernikahan', '$tinggi_badan', '$berat_badan', '$pengalaman_jepang',
        '$penyakit_kronis', '$golongan_darah', '$nomor_pendaftaran', '$id_pengguna'
    )";

    if (mysqli_query($mysqli, $query)) {
        echo "<script>
            alert('Pendaftaran berhasil! Silakan tunggu konfirmasi dari admin melalui WhatsApp/email.');
            window.location.href = 'http://localhost/pendaftaran/pages/index.php';
        </script>";
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($mysqli);
    }
}
?>