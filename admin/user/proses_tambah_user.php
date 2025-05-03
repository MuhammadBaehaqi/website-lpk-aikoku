<?php
include '../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Masih pakai MD5 sesuai permintaan
    $email = $_POST['email'];
    $roles = $_POST['roles'];

    $stmt = $mysqli->prepare("INSERT INTO tb_pengguna (username, password, email_pengguna, roles) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $email, $roles);

    if ($stmt->execute()) {
        echo "<script>
                alert('User berhasil ditambahkan!');
                window.location.href = 'kelola_user.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menambahkan user: " . $stmt->error . "');
                window.location.href = 'kelola_user.php';
              </script>";
    }

    $stmt->close();
    $mysqli->close();
} else {
    header("Location: kelola_user.php");
    exit;
}
?>