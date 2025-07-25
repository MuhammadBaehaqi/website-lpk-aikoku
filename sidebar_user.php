<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$role = isset($_SESSION['roles']) ? $_SESSION['roles'] : 'user';
?>

<?php
function isActive($page)
{
    return strpos($_SERVER['REQUEST_URI'], $page) !== false ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .sidebar a.active {
            background-color: #0d4221;
            font-weight: bold;
            transform: translateX(5px);
        }

        .sidebar {
            width: 250px;
            height: 100vh;
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
            scrollbar-width: thin;
        }

        .sidebar::-webkit-scrollbar {
            width: 8px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #0d4221;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #0f8a5f;
            border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #0d7a53;
        }

        .sidebar>a,
        #kelolaHalamanDropdown {
            padding-left: 40px !important;
        }

        .sidebar a {
            padding: 10px 30px;
            text-decoration: none;
            color: white;
            display: block;
            transition: background 0.3s, transform 0.3s;
        }

        .sidebar a:hover {
            background-color: #0d4221;
            transform: translateX(5px);
        }

        .dropdown-menu a:hover {
            background-color: #14532d;
            color: white;
        }

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

        .header {
            background: linear-gradient(145deg, #14532d, #0d4221);
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: 250px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-dark {
            background-color: white !important;
            color: black !important;
            border: 1px solid #ccc;
        }

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
    </style>
</head>

<body>

    <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="closeSidebar()"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="text-center mb-4">
            <img src="/pendaftaran/img/logo.png" alt="Logo LPK" class="img-fluid" style="width: 80px; height: auto;">
            <h5 class="mt-2">LPK Aikoku Terpadu</h5>
        </div>
        <span class="btn-close-sidebar" onclick="closeSidebar()">✖</span>

        <a href="/pendaftaran/User/dashboard/dashboard_user.php" onclick="changeTitle('Dashboard')"
            class="text-white d-block px-3 py-2 <?php echo isActive('dashboard_user.php'); ?>">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="/pendaftaran/User/pengumuman/lihat_pengumuman.php" onclick="changeTitle('Pengumuman')"
            class="text-white d-block px-3 py-2 <?php echo isActive('lihat_pengumuman.php'); ?>">
            <i class="bi bi-megaphone"></i> Pengumuman
        </a>

        <a href="/pendaftaran/User/pendaftaran/Lihat_pendaftaran.php" onclick="changeTitle('Status Pendaftaran')"
            class="text-white d-block px-3 py-2 <?php echo isActive('Lihat_pendaftaran.php'); ?>">
            <i class="bi bi-file-earmark-check"></i> Status Pendaftaran
        </a>

        <a href="/pendaftaran/User/profile/Edit_profile_user.php" onclick="changeTitle('Edit Profil')"
            class="text-white d-block px-3 py-2 <?php echo isActive('Edit_profile_user.php'); ?>">
            <i class="bi bi-person-gear"></i> Edit Profil
        </a>

    </div>

    <!-- Header -->
    <div class="header">
        <button class="btn-menu" onclick="openSidebar()">☰</button>
        <span id="page-title"><?php echo isset($pageTitle) ? $pageTitle : 'Dashboard'; ?></span>

        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle d-flex align-items-center gap-2" type="button" id="userDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle"></i>
                <?php echo $username; ?> (<?php echo ucfirst($role); ?>)
            </button>

            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="/pendaftaran/logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
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
            closeSidebar();
        }

    </script>

</body>

</html>