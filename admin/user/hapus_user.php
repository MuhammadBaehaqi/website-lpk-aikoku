<?php
include '../../config.php';

// Memastikan ada ID pengguna yang diterima
if (isset($_GET['id'])) {
    $id_pengguna = $_GET['id'];

    // Membuat prepared statement untuk menghapus user berdasarkan ID
    $query = "DELETE FROM tb_pengguna WHERE id_pengguna = ?";

    if ($stmt = mysqli_prepare($mysqli, $query)) {
        // Menyambungkan variabel ke prepared statement
        mysqli_stmt_bind_param($stmt, "i", $id_pengguna);

        // Menjalankan query
        if (mysqli_stmt_execute($stmt)) {
            // Redirect ke halaman kelola user setelah berhasil menghapus
            header("Location: kelola_user.php");
            exit();
        } else {
            echo "Terjadi kesalahan saat menghapus user: " . mysqli_error($mysqli);
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