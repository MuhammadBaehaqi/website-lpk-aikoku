<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['roles'] != 'admin') {
    header("Location: ../../../login.php");
    exit();
}

include '../../../includes/config.php';

$query = "SELECT * FROM tb_footer ORDER BY id DESC LIMIT 1";
$result = mysqli_query($mysqli, $query);
$footer = mysqli_fetch_assoc($result);

if (!$footer) {
    $footer = [
        'logo' => '',
        'deskripsi' => '',
        'facebook' => '',
        'instagram' => '',
        'whatsapp' => '',
        'youtube' => '',
        'email_sosmed' => '',
        'email' => '',
        'alamat' => '',
        'telepon' => '',
        'jam_kerja' => '',
        'jam_sabtu' => '',
        'catatan' => '',
        'maps_url' => ''
    ];
}

$pageTitle = "Kelola Halaman / Footer";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?> - Admin</title>
    <link rel="icon" href="../../../img/logo.png" type="image/x-icon">
</head>

<body class="bg-light">
    <?php include '../../../sidebar1.php'; ?>

    <div class="content">
        <div class="card shadow">
            <div class="card-header bg-light text-dark">
                <h4 class="mb-0"><?= $pageTitle ?></h4>
            </div>
            <div class="card-body">
                <form action="proses_update_footer.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Logo (upload baru jika ingin ganti):</label><br>
                        <?php if (!empty($footer['logo'])): ?>
                            <img src="../../../uploads/<?= htmlspecialchars($footer['logo']) ?>" width="120" alt="Logo"
                                class="mb-2"><br>
                        <?php endif; ?>
                        <input type="file" name="logo" class="form-control">
                        <input type="hidden" name="old_logo" value="<?= htmlspecialchars($footer['logo']) ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi:</label>
                        <textarea name="deskripsi" class="form-control"
                            rows="3"><?= htmlspecialchars($footer['deskripsi']) ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Facebook URL:</label>
                            <input type="text" name="facebook" class="form-control"
                                value="<?= htmlspecialchars($footer['facebook']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Instagram URL:</label>
                            <input type="text" name="instagram" class="form-control"
                                value="<?= htmlspecialchars($footer['instagram']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Whatsapp URL:</label>
                            <input type="text" name="whatsapp" class="form-control"
                                value="<?= htmlspecialchars($footer['whatsapp']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Youtube URL:</label>
                            <input type="text" name="youtube" class="form-control"
                                value="<?= htmlspecialchars($footer['youtube']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email Sosial Media:</label>
                            <input type="email" name="email_sosmed" class="form-control"
                                value="<?= htmlspecialchars($footer['email_sosmed']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control"
                                value="<?= htmlspecialchars($footer['email']) ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat:</label>
                        <textarea name="alamat" class="form-control"
                            rows="2"><?= htmlspecialchars($footer['alamat']) ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Telepon:</label>
                            <input type="text" name="telepon" class="form-control"
                                value="<?= htmlspecialchars($footer['telepon']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jam Kerja (Senin-Jumat):</label>
                            <input type="text" name="jam_kerja" class="form-control"
                                value="<?= htmlspecialchars($footer['jam_kerja']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jam Kerja Sabtu:</label>
                            <input type="text" name="jam_sabtu" class="form-control"
                                value="<?= htmlspecialchars($footer['jam_sabtu']) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Catatan Tambahan:</label>
                            <input type="text" name="catatan" class="form-control"
                                value="<?= htmlspecialchars($footer['catatan']) ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">URL Google Maps:</label>
                        <input type="text" name="maps_url" class="form-control"
                            value="<?= htmlspecialchars($footer['maps_url']) ?>">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>