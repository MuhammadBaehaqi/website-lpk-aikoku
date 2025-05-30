<?php
session_start();
include '../../config.php';

$id_pengguna = $_SESSION['id_pengguna'];
$password_lama = $_POST['password_lama'];
$password_baru = $_POST['password_baru'];
$konfirmasi = $_POST['konfirmasi_password'];

$stmt = $mysqli->prepare("SELECT password FROM tb_pengguna WHERE id_pengguna = ?");
$stmt->bind_param("i", $id_pengguna);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row && $row['password'] === md5($password_lama)) {
    if ($password_baru === $konfirmasi) {
        $password_baru_md5 = md5($password_baru);
        $stmt = $mysqli->prepare("UPDATE tb_pengguna SET password = ? WHERE id_pengguna = ?");
        $stmt->bind_param("si", $password_baru_md5, $id_pengguna);
        $stmt->execute();
        header("Location: profile_admin_pw.php?status=password_updated");
        exit();
    } else {
        header("Location: profile_admin_pw.php?status=password_mismatch");
        exit();
    }
} else {
    header("Location: profile_admin_pw.php?status=wrong_old");
    exit();
}
?>