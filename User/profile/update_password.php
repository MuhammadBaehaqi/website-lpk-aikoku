<?php
// Koneksi database
include('../../includes/config.php');

session_start();
if (!isset($_SESSION['id_pengguna'])) {
    // Jika id_pengguna belum ada dalam session, redirect ke halaman login
    header("Location: ../../login.php");
    exit();
}

$id_pengguna = $_SESSION['id_pengguna'];

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];

    // Query untuk mengambil password yang disimpan di database
    $query = "SELECT password FROM tb_pengguna WHERE id_pengguna = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id_pengguna);
    $stmt->execute();
    $stmt->bind_result($password_db);

    // Ambil hasil query dan cek
    $stmt->fetch();

    // Menutup statement setelah fetch selesai
    $stmt->close();

    // Verifikasi password lama (gunakan MD5 untuk mencocokkan password yang disimpan dengan MD5)
    if (md5($password_lama) === $password_db) {
        // Password lama cocok, lanjutkan untuk memperbarui password

        // Hash password baru dengan MD5
        $password_baru_hashed = md5($password_baru);

        // Update password baru ke database
        $update_query = "UPDATE tb_pengguna SET password = ? WHERE id_pengguna = ?";
        $update_stmt = $mysqli->prepare($update_query);
        $update_stmt->bind_param("si", $password_baru_hashed, $id_pengguna);
        $update_stmt->execute();

        // Cek apakah update berhasil
        if ($update_stmt->affected_rows > 0) {
            echo "Password berhasil diperbarui.";
            header("Location: edit_profile_user.php"); // Mengarahkan ke halaman edit profil
            exit();
        } else {
            echo "Gagal memperbarui password.";
        }

        // Menutup statement setelah update selesai
        $update_stmt->close();
    } else {
        // Jika password lama tidak cocok
        echo "Password lama yang Anda masukkan salah.";
    }
}
?>