<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['roles'] != 'admin') {
    header("Location: ../../../login.php");
    exit();
}

include '../../../includes/config.php';

$pageTitle = "Kelola Halaman / Logo";

// Ambil data logo terbaru
$query = "SELECT * FROM tb_logo ORDER BY id_logo DESC LIMIT 1";
$result = mysqli_query($mysqli, $query);
$logo = mysqli_fetch_assoc($result);

if (!$logo) {
    $logo = ['logo' => '', 'text_logo' => 'LPK AIKOKU TERPADU'];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?> - Admin</title>
    <link rel="icon" href="../../../img/logo.png" type="image/x-icon">
</head>

<body class="bg-light">
    <?php include '../../../sidebar1.php'; ?>
    <div class="content">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4><?= $pageTitle ?></h4>
            </div>
            <div class="card-body">
                <form action="proses_logo.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Upload Logo Baru:</label><br>
                        <?php if (!empty($logo['logo'])): ?>
                            <img src="../../../uploads/<?= $logo['logo'] ?>" width="100" class="mb-2"><br>
                        <?php endif; ?>
                        <input type="file" name="logo" class="form-control">
                        <input type="hidden" name="old_logo" value="<?= $logo['logo'] ?>">
                    </div>

                    <div class="mb-3">
                        <label>Teks Logo:</label>
                        <input type="text" name="text_logo" class="form-control" value="<?= $logo['text_logo'] ?>"
                            required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>