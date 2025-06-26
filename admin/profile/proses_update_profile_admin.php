<?php
session_start();
include '../../includes/config.php';

// Pastikan user sudah login dan punya hak akses admin
if (!isset($_SESSION['username']) || $_SESSION['roles'] !== 'admin') {
    header('Location: ../../login.php');
    exit();
}

// Ambil data dari form
$id_pengguna = $_POST['id_pengguna'];
$username = trim($_POST['username']);
$email = trim($_POST['email']);

// Validasi sederhana
if (empty($username) || empty($email)) {
    echo "Username dan email tidak boleh kosong.";
    exit();
}

// Update ke database
$stmt = $mysqli->prepare("UPDATE tb_pengguna SET username = ?, email_pengguna = ? WHERE id_pengguna = ?");
$stmt->bind_param("ssi", $username, $email, $id_pengguna);

if ($stmt->execute()) {
    // ✅ Perbarui session username
    $_SESSION['username'] = $username;

    // Redirect atau tampilkan pesan
    header("Location: profile_admin_pw.php?status=sukses");
    exit();
} else {
    echo "Gagal memperbarui profil.";
}
?>