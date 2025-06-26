<style>
    .navbar {
        background-color: rgba(0, 128, 0, 1);
        /* Warna hijau solid */
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .navbar.scrolled {
        background-color: rgba(0, 128, 0, 0.8);
        /* Warna hijau transparan */
    }

    .navbar-brand,
    .nav-link {
        color: white !important;
        font-weight: bold;
        transition: color 0.3s ease-in-out;
    }

    .nav-link:hover,
    .nav-link.active {
        color: #FFD700 !important;
        /* Warna emas saat hover atau aktif */
    }

    /* Dropdown Menu Styling */
    .dropdown-menu {
        background-color: rgba(0, 128, 0, 0.9);
        /* Hijau sedikit transparan */
        border: none;
    }

    .dropdown-item {
        color: white !important;
        transition: background 0.3s ease-in-out;
    }

    .dropdown-item:hover {
        background-color: rgba(255, 215, 0, 0.8);
        /* Warna emas saat hover */
        color: black !important;
    }
</style>
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <?php
        include 'config.php'; // pastikan ini sebelum <nav>
        $logo_query = mysqli_query($mysqli, "SELECT * FROM tb_logo ORDER BY id_logo DESC LIMIT 1");
        $logo_data = mysqli_fetch_assoc($logo_query);
        $logo_img = !empty($logo_data['logo']) ? '../uploads/' . $logo_data['logo'] : 'logo.png';
        $logo_text = !empty($logo_data['text_logo']) ? $logo_data['text_logo'] : 'LPK AIKOKU TERPADU';
        ?>

        <a class="navbar-brand d-flex align-items-center" id="logoBrand" href="index.php">
            <img src="<?= $logo_img ?>" alt="Logo" width="40" height="40" class="d-inline-block align-text-top me-2">
            <?= htmlspecialchars($logo_text) ?>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" id="nav-beranda" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="nav-profile" href="profile.php">Profile</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="programDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Program
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="programDropdown">
                        <li><a class="dropdown-item" href="magang.php">Program Magang</a></li>
                        <li><a class="dropdown-item" href="tokutei.php">Program Tokutei Ginou</a></li>
                        <li><a class="dropdown-item" href="engineering.php">Program
                                Engineering</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="nav-album" href="album.php">Album</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="nav-pengumuman" href="pengumuman.php">Pengumuman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="nav-kontak" href="kontak.php">Kontak</a>
                </li>
            </ul>
            <div class="d-flex ms-3">
                <a href="daftar.php" class="btn btn-warning me-2">Pendaftaran</a>
                <a href="../login.php" class="btn btn-light">Login</a>
            </div>
        </div>
    </div>
</nav>
<script>
    window.addEventListener("scroll", function () {
        var navbar = document.querySelector(".navbar");
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });
    // Menandai link aktif
    document.addEventListener("DOMContentLoaded", function () {
        let currentPath = window.location.pathname;

        // Hapus semua 'active' dulu
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
        });

        // Menandai menu yang benar-benar cocok dengan halaman saat ini
        document.querySelectorAll('.nav-link').forEach(link => {
            if (link.pathname === currentPath) {
                link.classList.add('active');
            }
        });

        // Pastikan dropdown "Program" tidak aktif jika bukan di dalam program
        let programDropdown = document.querySelector('#programDropdown');
        let programLinks = document.querySelectorAll('.dropdown-menu .dropdown-item');

        let isProgramActive = Array.from(programLinks).some(link => link.pathname === currentPath);
        if (!isProgramActive) {
            programDropdown.classList.remove('active');
        }

        // Saat klik logo/nama LPK, langsung aktifkan menu Beranda
        document.querySelector('.navbar-brand').addEventListener('click', function () {
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            document.querySelector('a[href="index.php"]').classList.add('active');
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const links = document.querySelectorAll('.nav-link'); // Semua link nav
        const logoBrand = document.getElementById('logoBrand'); // Logo
        const currentPage = window.location.pathname.split("/").pop(); // Nama file sekarang

        // Untuk semua link navbar
        links.forEach(link => {
            link.addEventListener("click", function (e) {
                const targetPage = link.getAttribute("href");

                if (targetPage === currentPage || (targetPage === "index.php" && (currentPage === ""))) {
                    e.preventDefault();
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            });
        });

        // Untuk logo navbar
        logoBrand.addEventListener("click", function (e) {
            const targetPage = logoBrand.getAttribute("href");
            if (targetPage === currentPage || (targetPage === "index.php" && (currentPage === ""))) {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    });
</script>
</body>

</html>