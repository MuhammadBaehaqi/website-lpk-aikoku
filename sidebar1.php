<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
?>

<?php
function isActive($page)
{
    return strpos($_SERVER['REQUEST_URI'], $page) !== false ? 'active' : '';
}
?>
<!-- untuk dropdown -->
<?php
function isDropdownActive($pages = [])
{
    foreach ($pages as $page) {
        if (strpos($_SERVER['REQUEST_URI'], $page) !== false) {
            return 'show'; // untuk collapse Bootstrap
        }
    }
    return '';
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard LPK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Tambahkan scroll di sidebar jika kontennya melebihi tinggi */
        .sidebar {
            width: 250px;
            height: 100vh;
            /* Tetap 100% tinggi viewport */
            position: fixed;
            top: 0;
            left: 0;
            background: #14532d;
            padding-top: 20px;
            color: white;
            z-index: 999;
            transition: left 0.3s ease-in-out;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.2);
            overflow-y: auto;
            /* Tambahkan scroll vertikal jika konten melebihi */
            scrollbar-width: thin;
            /* Membuat scrollbar lebih tipis di Firefox */
        }

        /* Gaya khusus untuk scrollbar di Webkit (Chrome, Edge, Safari) */
        .sidebar::-webkit-scrollbar {
            width: 8px;
            /* Ukuran scrollbar */
        }

        .sidebar::-webkit-scrollbar-track {
            background: #0d4221;
            /* Warna latar belakang track */
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #0f8a5f;
            /* Warna pegangan scrollbar */
            border-radius: 10px;
            /* Membuat ujung pegangan melengkung */
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #0d7a53;
            /* Warna pegangan saat di-hover */
        }

        /* Geser semua link utama di sidebar */
        .sidebar>a,
        #kelolaHalamanDropdown {
            padding-left: 40px !important;
            /* Geser link utama termasuk Kelola Halaman */
        }

        /* Geser item di dalam dropdown (Beranda, Profil, dll.) */
        #kelolaHalamanMenu a {
            padding-left: 55px !important;
            /* Sesuaikan jarak lebih jauh */
        }

        .sidebar a {
            padding: 10px 30px;
            /* Geser teks ke kanan dengan menambah padding kiri */
            text-decoration: none;
            color: white;
            display: block;
            transition: background 0.3s, transform 0.3s;
        }

        .sidebar a:hover {
            background-color: #0d4221;
            /* Warna lebih gelap dari sidebar */
            transform: translateX(5px);
        }

        /* ini termasuk dengan header dropdown */
        .dropdown-menu a:hover {
            background-color: #14532d;
            /* Sama dengan sidebar agar serasi */
            color: white;
        }

        /* Overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 998;
        }

        /* Header */
        .header {
            background: linear-gradient(145deg, #14532d, #0d4221);
            /* Warna lebih sesuai */
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: 250px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        /* Button Dropdown (putih, teks hitam) */
        .btn-dark {
            background-color: white !important;
            /* Warna latar belakang putih */
            color: black !important;
            /* Teks berwarna hitam */
            border: 1px solid #ccc;
            /* Tambahkan border agar lebih jelas */
        }

        /* Gaya saat hover (untuk efek) */
        .btn-dark:hover {
            background-color: #f8f8f8 !important;
            color: black !important;
        }

        .btn-menu {
            background: none;
            border: none;
            font-size: 24px;
            color: white;
            cursor: pointer;
            display: none;
        }

        /* Konten utama */
        .content {
            margin-left: 250px;
            padding: 20px;
            overflow-x: auto;
            max-width: calc(100vw - 250px);
        }

        @media (max-width: 991px) {
            .sidebar {
                left: -250px;
            }

            .header {
                margin-left: 0;
            }

            .content {
                margin-left: 0;
                max-width: 100vw;
            }

            .btn-menu {
                display: block;
            }

            .btn-close-sidebar {
                display: block;
            }
        }

        .btn-close-sidebar {
            display: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        .sidebar a.active {
            background-color: #0d4221;
            font-weight: bold;
            transform: translateX(5px);
        }
    </style>
</head>

<body>

    <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="closeSidebar()"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="text-center mb-4">
            <img src="/pendaftaran/logo.png" alt="Logo LPK" class="img-fluid" style="width: 80px; height: auto;">
            <h5 class="mt-2">LPK Aikoku Terpadu</h5>
        </div>
        <span class="btn-close-sidebar" onclick="closeSidebar()">✖</span>
        <a href="/pendaftaran/admin/dashboard/dashboard_admin.php" onclick="changeTitle('Dashboard')"
            class="text-white d-block px-3 py-2 <?php echo isActive('dashboard_admin.php'); ?>">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <div class="dropdown">
            <!-- kelas aktif -->
            <a class="dropdown-toggle text-white d-block px-3 py-2 <?php echo isDropdownActive([
                'beranda_admin.php',
                'profile_admin.php',
                'program_admin.php',
                'album_admin.php',
                'pengumuman_admin.php',
                'kontak_admin.php',
                'pendaftaran_admin.php',
                'footer_admin.php',
                'logo_admin.php'
            ]) ? 'active' : ''; ?>" href="#" role="button" id="kelolaHalamanDropdown" data-bs-toggle="collapse"
                data-bs-target="#kelolaHalamanMenu">
                <i class="bi bi-layout-text-sidebar-reverse"></i> Kelola Halaman
            </a>
            <!-- dropdown buka -->
            <div class="collapse <?php echo isDropdownActive([
                'beranda_admin.php',
                'profile_admin.php',
                'program_admin.php',
                'album_admin.php',
                'pengumuman_admin.php',
                'kontak_admin.php',
                'pendaftaran_admin.php',
                'footer_admin.php',
                'logo_admin.php'
            ]); ?>" id="kelolaHalamanMenu">
                <ul class="list-unstyled ms-3">
                    <li><a class="text-white d-block px-3 py-2 <?php echo isActive('beranda_admin.php'); ?>"
                            href="/pendaftaran/admin/kelola_halaman/beranda/beranda_admin.php"
                            onclick="changeTitle('Beranda')">
                            <i class="bi bi-house-door"></i> Beranda</a></li>
                    <li><a class="text-white d-block px-3 py-2 <?php echo isActive('profile_admin.php'); ?>"
                            href="/pendaftaran/admin/kelola_halaman/profile/profile_admin.php"
                            onclick="changeTitle('Profile')">
                            <i class="bi bi-person-circle"></i> Profile</a></li>
                    <li><a class="text-white d-block px-3 py-2 <?php echo isActive('program_admin.php'); ?>"
                            href="/pendaftaran/admin/kelola_halaman/program/program_admin.php"
                            onclick="changeTitle('Program')">
                            <i class="bi bi-journal-code"></i> Program</a></li>
                    <a class="text-white d-block px-3 py-2 <?php echo isActive('album_admin.php'); ?>"
                        href="/pendaftaran/admin/kelola_halaman/album/album_admin.php" onclick="changeTitle('Album')">
                        <i class="bi bi-images"></i> Album
                    </a>
                    <li><a class="text-white d-block px-3 py-2 <?php echo isActive('pengumuman_admin.php'); ?>"
                            href="/pendaftaran/admin/kelola_halaman/pengumuman/pengumuman_admin.php"
                            onclick="changeTitle('Pengumuman')">
                            <i class="bi bi-megaphone"></i> Pengumuman</a></li>
                    <li><a class="text-white d-block px-3 py-2 <?php echo isActive('kontak_admin.php'); ?>"
                            href="/pendaftaran/admin/kelola_halaman/kontak/kontak_admin.php"
                            onclick="changeTitle('Kontak')">
                            <i class="bi bi-envelope"></i> Kontak</a></li>
                    <li><a class="text-white d-block px-3 py-2 <?php echo isActive('pendaftaran_admin.php'); ?>"
                            href="/pendaftaran/admin/kelola_halaman/pendaftaran/pendaftaran_admin.php"
                            onclick="changeTitle('Pendaftaran')">
                            <i class="bi bi-person-add"></i> Pendaftaran</a></li>
                    <li><a class="text-white d-block px-3 py-2 <?php echo isActive('footer_admin.php'); ?>"
                            href="/pendaftaran/admin/kelola_halaman/footer/footer_admin.php"
                            onclick="changeTitle('footer')">
                            <i class="bi bi-arrow-down-square"></i> Footer</a></li>
                    <li><a class="text-white d-block px-3 py-2 <?php echo isActive('logo_admin.php'); ?>"
                            href="/pendaftaran/admin/kelola_halaman/logo/logo_admin.php" onclick="changeTitle('Logo')">
                            <i class="bi bi-bootstrap-fill"></i> Logo
                        </a></li>
                </ul>
            </div>
        </div>
        <!-- Data Pendaftaran -->
        <a href="/pendaftaran/admin/data_pendaftar/data_pendaftaran.php" onclick="changeTitle('Data Pendaftaran')"
            class="text-white d-block px-3 py-2 <?php echo isActive('data_pendaftaran.php'); ?>">
            <i class="bi bi-table"></i> Data Pendaftaran
        </a>

        <!-- Data Kontak -->
        <a href="/pendaftaran/admin/kontak_masuk/data_kontak.php" onclick="changeTitle('Data Kontak')"
            class="text-white d-block px-3 py-2 <?php echo isActive('data_kontak.php'); ?>">
            <i class="bi bi-telephone"></i> Data Kontak
        </a>

        <!-- Profile Admin Password -->
        <a href="/pendaftaran/admin/profile/profile_admin_pw.php" onclick="changeTitle('Profile Admin')"
            class="text-white d-block px-3 py-2 <?php echo isActive('profile_admin_pw.php'); ?>">
            <i class="bi bi-person-gear"></i> Profile Admin
        </a>

        <!-- Kelola User -->
        <a href="/pendaftaran/admin/user/kelola_user.php" onclick="changeTitle('Kelola User')"
            class="text-white d-block px-3 py-2 <?php echo isActive('kelola_user.php'); ?>">
            <i class="bi bi-people"></i> Kelola User
        </a>
    </div>

    <!-- Header -->
    <div class="header">
        <button class="btn-menu" onclick="openSidebar()">☰</button>
        <span id="page-title"><?php echo isset($pageTitle) ? $pageTitle : "Dashboard"; ?></span>

        <!-- Dropdown -->
        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown"
                aria-expanded="false">
                <?php echo $_SESSION['username']; ?> (<?php echo ucfirst($_SESSION['roles']); ?>)
            </button>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="/pendaftaran/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

    <script>
        function openSidebar() {
            document.getElementById("sidebar").style.left = "0";
            document.getElementById("overlay").style.display = "block";
        }

        function closeSidebar() {
            if (window.innerWidth <= 991) {
                document.getElementById("sidebar").style.left = "-250px";
                document.getElementById("overlay").style.display = "none";
            }
        }

        window.addEventListener("resize", function () {
            if (window.innerWidth > 991) {
                document.getElementById("sidebar").style.left = "0";
                document.getElementById("overlay").style.display = "none";
            } else {
                document.getElementById("sidebar").style.left = "-250px";
            }
        });

        function changeTitle(title) {
            document.getElementById("page-title").textContent = title;
            closeSidebar(); // Tambahkan ini agar sidebar tertutup di semua menu
        }

    </script>

</body>

</html>