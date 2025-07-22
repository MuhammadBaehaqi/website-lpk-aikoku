<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> <!-- sesuaikan path -->
    <style>
        body {
            background-color: #e8f5e9;
            /* hijau pastel lembut */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .not-found-box {
            background: linear-gradient(to bottom right, #ffffff, #d0f0d2);
            /* putih ke hijau muda */
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 0 15px rgba(76, 175, 80, 0.3);
            /* hijau shadow */
            border: 1px solid #a5d6a7;
            /* garis tipis hijau muda */
            max-width: 500px;
        }

        .not-found-box img {
            width: 150px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 72px;
            margin: 0;
            color: #2e7d32;
            /* hijau tua */
            font-family: 'Noto Sans JP', sans-serif;
        }

        p {
            font-size: 18px;
            color: #444;
            margin: 15px 0 30px;
        }

        a.btn {
            background-color: #388e3c;
            /* hijau tombol */
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
        }

        a.btn:hover {
            background-color: #2e7d32;
        }
    </style>
</head>

<body>
    <div class="not-found-box">
        <img src="../img/logo.png" alt="Sakura Girl"> <!-- gambar bisa kamu ganti -->
        <h1>404</h1>
        <p>Yabai! Halaman yang kamu cari tidak ditemukan.<br>Mungkin tautannya salah, atau sudah tidak tersedia.</p>
        <a href="/pendaftaran/pages/index.php">Kembali ke Beranda</a>
    </div>
</body>

</html>