<?php
session_start();
include '../../includes/config.php';

if (isset($_POST['id_pengguna'])) {
    $id_pengguna = $_POST['id_pengguna'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $roles = $_POST['roles'];

    // Ambil email lama (digunakan jika roles adalah 'user')
    $get_old_email = mysqli_query($mysqli, "SELECT email_pengguna FROM tb_pengguna WHERE id_pengguna = '$id_pengguna'");
    $old_data = mysqli_fetch_assoc($get_old_email);
    $email_lama = $old_data['email_pengguna'];

    // Membuat prepared statement untuk mengupdate data user
    $query = "UPDATE tb_pengguna SET username = ?, email_pengguna = ?, roles = ? WHERE id_pengguna = ?";

    if ($stmt = mysqli_prepare($mysqli, $query)) {
        // Menyambungkan variabel ke prepared statement
        mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $roles, $id_pengguna);

        // Menjalankan query
        if (mysqli_stmt_execute($stmt)) {

            // ✅ Jika user login mengedit dirinya sendiri
            if ($_SESSION['id_pengguna'] == $id_pengguna) {
                $_SESSION['username'] = $username;
            }

            // ✅ Jika roles = user, update juga email di tb_pendaftaran
            if ($roles === 'user') {
                $query_update_pendaftaran = "UPDATE tb_pendaftaran 
                    SET nama_lengkap = '$username', email = '$email' 
                    WHERE email = '$email_lama' OR email = '$email'";
                mysqli_query($mysqli, $query_update_pendaftaran);
            }

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