<?php
session_start();
include 'config.php';

// Proses login saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hashing password dengan MD5

    // Query menggunakan prepared statement
    $stmt = $mysqli->prepare("SELECT * FROM tb_pengguna WHERE username = ? AND password = ?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data_session = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['roles'] = $data_session['roles'];

        // Redirect berdasarkan role
        if ($data_session['roles'] == 'admin') {
            header("Location: admin/dashboard/dashboard_admin.php");
            exit();
        } else {
            header("Location: user_dashboard.php"); // Jika user
            exit();
        }
    } else {
        $error = "Username atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('img/sejarah.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.3);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 350px;
            backdrop-filter: blur(10px);
        }

        .logo {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        .btn-primary {
            background: linear-gradient(45deg, #28a745, #218838);
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #218838, #1e7e34);
            transform: scale(1.05);
        }

        .btn-secondary {
            background: linear-gradient(45deg, #20c997, #17a2b8);
            border: none;
            transition: 0.3s;
        }

        .btn-secondary:hover {
            background: linear-gradient(45deg, #17a2b8, #138496);
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="login-container p-4">
        <img src="logo.png" alt="Logo" class="logo">
        <h2 class="mb-2">Selamat Datang</h2>
        <p>Silakan masuk ke akun Anda</p>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3 position-relative">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                    required>
                <span id="toggle-password"
                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">👁️</span>
            </div>
            <button type="submit" class="btn btn-primary w-100">Masuk</button>
            <a href="index.php" class="btn btn-secondary w-100 mt-2">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    // Ambil elemen untuk password field dan ikon mata
    const togglePassword = document.getElementById('toggle-password');
    const passwordField = document.getElementById('password');

    // Tambahkan event listener untuk mengubah tipe input password
    togglePassword.addEventListener('click', function () {
        // Jika tipe password adalah 'password', ubah ke 'text', jika tidak, kembali ke 'password'
        const type = passwordField.type === 'password' ? 'text' : 'password';
        passwordField.type = type;

        // Ganti icon mata (opsional)
        this.textContent = type === 'password' ? '👁️' : '🙈';
    });
</script>

</html>