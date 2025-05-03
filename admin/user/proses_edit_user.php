<?php
include '../../config.php';

if (isset($_POST['id_pengguna'])) {
    $id_pengguna = $_POST['id_pengguna'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $roles = $_POST['roles'];

    // Membuat prepared statement untuk mengupdate data user
    $query = "UPDATE tb_pengguna SET username = ?, email_pengguna = ?, roles = ? WHERE id_pengguna = ?";

    if ($stmt = mysqli_prepare($mysqli, $query)) {
        // Menyambungkan variabel ke prepared statement
        mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $roles, $id_pengguna);

        // Menjalankan query
        if (mysqli_stmt_execute($stmt)) {
            // Redirect ke halaman kelola user setelah sukses
            header("Location: kelola_user.php");
            exit();
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($mysqli);
        }

        // Menutup prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Gagal mempersiapkan query: " . mysqli_error($mysqli);
    }
} else {
    echo "ID pengguna tidak ditemukan.";
}
?>