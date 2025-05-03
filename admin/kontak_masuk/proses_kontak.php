<?php
include '../../config.php';

// Memeriksa apakah data dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $message = $_POST['message'];

    // Menyimpan data kontak ke database
    $query = "INSERT INTO tb_kontak (name, email, phone, address, message) 
              VALUES ('$name', '$email', '$phone', '$address', '$message')";
    if (mysqli_query($mysqli, $query)) {
        echo "<script>alert('Pesan Anda berhasil dikirim!'); window.location.href = 'http://localhost/pendaftaran/index.php ';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengirim pesan.');</script>";
    }
}
?>