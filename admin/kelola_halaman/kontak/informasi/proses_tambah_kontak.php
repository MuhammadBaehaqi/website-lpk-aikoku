<?php
include '../../../../config.php'; // Koneksi ke database

// Mengambil data dari form
$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
$email_kontak = mysqli_real_escape_string($mysqli, $_POST['email_kontak']);
$telepon = mysqli_real_escape_string($mysqli, $_POST['telepon']);
$jam_kerja = mysqli_real_escape_string($mysqli, $_POST['jam_kerja']);
$jam_sabtu = mysqli_real_escape_string($mysqli, $_POST['jam_sabtu']);
$catatan = mysqli_real_escape_string($mysqli, $_POST['catatan']);

// Menghapus data yang ada sebelumnya
$delete_query = "DELETE FROM tb_informasi_kontak";
mysqli_query($mysqli, $delete_query);

// Query untuk menambahkan data kontak ke database
$query = "INSERT INTO tb_informasi_kontak (alamat, email_kontak, telepon, jam_kerja, jam_sabtu, catatan) 
          VALUES ('$alamat', '$email_kontak', '$telepon', '$jam_kerja', '$jam_sabtu', '$catatan')";

// Eksekusi query
if (mysqli_query($mysqli, $query)) {
    header("Location: ../kontak_admin.php");
    exit; 
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}

?>