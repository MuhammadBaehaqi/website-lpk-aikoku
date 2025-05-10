<?php
session_start();

// Pengecekan jika pengguna belum login
if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php");
    exit();
}

// Pengecekan jika pengguna bukan admin
if ($_SESSION['roles'] != 'admin') {
    header("Location: user_dashboard.php"); // Atau ke halaman lain yang sesuai
    exit();
}

$pageTitle = "Data Kontak";
include '../../config.php';

// Mengambil data kontak dari database
$query = "SELECT * FROM tb_kontak ORDER BY date_sent ASC";
$result = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?> - LPK Aikoku Terpadu</title>
    <link rel="icon" href="../../logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <?php include '../../sidebar1.php'; ?>

    <div class="container mt-4 content">
        <h2><?= $pageTitle ?></h2>

        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Pesan</th>
                        <th>Tanggal Kirim</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['message']}</td>
                            <td>{$row['date_sent']}</td>
                            <td>
                                <a href='hapus_kontak.php?id_kontak={$row['id_kontak']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus pesan ini?\");'>
                                    <i class='bi bi-trash'></i> Hapus
                                </a>
                            </td>
                        </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>