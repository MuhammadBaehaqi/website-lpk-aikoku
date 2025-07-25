<?php
include '../../../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_pendaftaran'])) {
    $id = $_POST['id_pendaftaran'];

    // Ambil data lama dulu
    $get_old = mysqli_query($mysqli, "SELECT email, foto_diri FROM tb_pendaftaran WHERE id_pendaftaran = '$id'");
    $row = mysqli_fetch_assoc($get_old);
    $email_lama = $row['email'];
    $foto_lama = $row['foto_diri'];

    // Ambil data baru dari form
    $nama = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $usia = $_POST['usia'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat_ktp = $_POST['alamat_ktp'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $alamat_keluarga = $_POST['alamat_keluarga'];
    $telepon_keluarga = $_POST['telepon_keluarga'];
    $program = $_POST['program'];
    $bidang = $_POST['bidang'];
    $pendidikan = $_POST['pendidikan_terakhir'];
    $pengalaman_kerja = $_POST['pengalaman_kerja'];
    $status_pernikahan = $_POST['status_pernikahan'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $berat_badan = $_POST['berat_badan'];
    $pengalaman_jepang = $_POST['pengalaman_jepang'];
    $penyakit_kronis = $_POST['penyakit_kronis'];
    $golongan_darah = $_POST['golongan_darah'];
    $motivasi = $_POST['kirim_motivasi'];

    // Cek jika admin upload foto baru
    if (!empty($_FILES['foto_diri']['name'])) {
        $foto_name = $_FILES['foto_diri']['name'];
        $foto_tmp = $_FILES['foto_diri']['tmp_name'];
        $foto_ext = pathinfo($foto_name, PATHINFO_EXTENSION);
        $foto_new = 'foto_' . time() . '.' . $foto_ext;
        move_uploaded_file($foto_tmp, '../../../uploads/' . $foto_new);
        $foto_path = $foto_new;
    } else {
        $foto_path = $foto_lama;
    }

    // Update ke database
    $query = "UPDATE tb_pendaftaran SET 
        nama_lengkap='$nama',
        tempat_lahir='$tempat_lahir',
        tanggal_lahir='$tanggal_lahir',
        usia='$usia',
        jenis_kelamin='$jenis_kelamin',
        agama='$agama',
        alamat_ktp='$alamat_ktp',
        email='$email',
        telepon='$telepon',
        alamat='$alamat',
        alamat_keluarga='$alamat_keluarga',
        telepon_keluarga='$telepon_keluarga',
        program='$program',
        bidang='$bidang',
        pendidikan_terakhir='$pendidikan',
        pengalaman_kerja='$pengalaman_kerja',
        status_pernikahan='$status_pernikahan',
        tinggi_badan='$tinggi_badan',
        berat_badan='$berat_badan',
        pengalaman_jepang='$pengalaman_jepang',
        penyakit_kronis='$penyakit_kronis',
        golongan_darah='$golongan_darah',
        motivasi='$motivasi',
        foto_diri='$foto_path'
        WHERE id_pendaftaran='$id'
    ";

    if (mysqli_query($mysqli, $query)) {
        mysqli_query($mysqli, "
            UPDATE tb_pengguna 
            SET username = '$nama', email_pengguna = '$email' 
            WHERE email_pengguna = '$email_lama' AND roles = 'user'
        ");
        echo "<script>alert('Data berhasil diperbarui'); window.location.href='../data_pendaftaran.php';</script>";
    } else {
        echo "Gagal update data: " . mysqli_error($mysqli);
    }
} else {
    echo "Permintaan tidak valid.";
}
?>