<?php
session_start();

// Jika belum login atau bukan admin, arahkan ke login.php
if (!isset($_SESSION['username']) || $_SESSION['roles'] !== 'admin') {
    header('Location: ../../login.php'); // Pastikan path-nya sesuai struktur folder kamu
    exit();
}
include '../../includes/config.php'; // pastikan path ini sesuai

// Ambil data admin dari database
$id_pengguna = $_SESSION['id_pengguna'];
$stmt = $mysqli->prepare("SELECT * FROM tb_pengguna WHERE id_pengguna = ?");
$stmt->bind_param("i", $id_pengguna);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc(); // Sekarang $data tersedia untuk digunakan di form
} else {
    echo "Data admin tidak ditemukan.";
    exit();
}

$pageTitle = 'Profile Saya';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - LPK Aikoku Terpadu</title>
    <link rel="icon" href="../../img/logo.png" type="image/x-icon">
    <style>
        body,
        html {
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <?php include '../../sidebar1.php'; ?>

    <div class="container mt-4 content">
        <h2><?php echo $pageTitle; ?></h2>
        <form action="proses_update_profile_admin.php" method="POST">
            <input type="hidden" name="id_pengguna" value="<?= $data['id_pengguna'] ?>">

            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control"
                    value="<?= htmlspecialchars($data['username']) ?>" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                    value="<?= htmlspecialchars($data['email_pengguna']) ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>

        <hr>

        <h4>Ganti Password</h4>
        <?php if (isset($_GET['status']) && $_GET['status'] == 'password_updated'): ?>
            <div class="alert alert-success">Password berhasil diubah.</div>
        <?php endif; ?>
        <?php if (isset($_GET['status']) && $_GET['status'] == 'password_mismatch'): ?>
            <div class="alert alert-danger">Konfirmasi password tidak cocok.</div>
        <?php endif; ?>
        <?php if (isset($_GET['status']) && $_GET['status'] == 'wrong_old'): ?>
            <div class="alert alert-danger">Password lama salah.</div>
        <?php endif; ?>
        <form action="proses_ganti_password.php" method="POST">
            <div class="mb-3">
                <label>Password Lama</label>
                <input type="password" name="password_lama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password Baru</label>
                <input type="password" name="password_baru" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Konfirmasi Password Baru</label>
                <input type="password" name="konfirmasi_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning">Ganti Password</button>
        </form>
    </div>

</body>

</html>