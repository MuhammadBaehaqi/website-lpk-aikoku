<style>
    /* Warna judul footer */
    footer h5 {
        color: #ffcc00;
        /* kuning */
        font-weight: bold;
    }

    footer {
        background-color: #1a1a1a;
        color: #fff;
    }

    footer a {
        color: #ccc;
        text-decoration: none;
    }
.footer-logo {
    width: 120px;
    height: auto;
    max-width: 100%;
}

    /* khusus untuk email di kontak & jam operasional */
    /* footer a:hover {
            color: #ffcc00;
            text-decoration: none;
        } */

    .footer-subitem {
        color: #ccc;
        display: block;
        padding: 5px 0;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .footer-subitem:hover {
        color: #ffcc00;
        /* Hover color kuning */
        text-decoration: none;
    }

    .footer-toggle {
        cursor: pointer;
    }

    .social-icons a {
        font-size: 1.4rem;
        margin-right: 8px;
        color: #ccc;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    /* Sosial media hover jadi kuning + animasi membesar dikit */
    .social-icons a:hover {
        color: #ffcc00;
        transform: scale(1.2);
    }

    .btn {
        transition: all 0.3s ease-in-out;
    }

    .btn:hover {
        transform: scale(1.05);
    }
</style>
<!-- footer.php -->
<footer class="pt-5 pb-3" style="background-color: #1a1a1a; color: #fff;">
    <div class="container">
        <div class="row">
            <!-- Kolom Logo dan Deskripsi -->
            <div class="col-md-3 mb-4">
                <img src="logo.png" alt="Logo" class="footer-logo">
                <p class="mt-3">Pusat Pelatihan Bahasa Jepang Terbaik untuk Mewujudkan Impian Berkarir di Jepang</p>
                <div class="social-icons mt-3">
                    <a href="#"><i class="fab fa-facebook-f me-3"></i></a>
                    <a href="#"><i class="fab fa-instagram me-3"></i></a>
                    <a href="#"><i class="fab fa-whatsapp me-3"></i></a>
                    <a href="#"><i class="fab fa-youtube me-3"></i></a>
                    <a href="mailto:lpkaikokuterpadu@gmail.com">
                        <i class="fas fa-envelope me-3"></i>
                    </a>
                </div>
            </div>

            <!-- Menu Cepat -->
            <div class="col-md-3 mb-4">
                <h5>Menu Cepat</h5>
                <a href="index.php" class="footer-subitem d-block">Beranda</a>
                <a href="profil.php" class="footer-subitem d-block">Profil</a>
                <a href="album.php" class="footer-subitem d-block">Album</a>
                <a href="pengumuman.php" class="footer-subitem d-block">Pengumuman</a>
                <a href="kontak.php" class="footer-subitem d-block">Kontak</a>

                <!-- Tombol Login dan Daftar -->
                <div class="d-flex flex-column gap-2 mt-3">
                    <a href="login.php" class="btn btn-outline-warning fw-bold">Login</a>
                    <a href="daftar.php" class="btn btn-outline-light fw-bold">Daftar</a>
                </div>
            </div>

            <!-- Program -->
            <div class="col-md-3 mb-4">
                <h5>Program</h5>
                <a href="tokutei.php" class="footer-subitem d-block">Tokutei Ginou</a>
                <a href="magang.php" class="footer-subitem d-block">Magang</a>
                <a href="engineering.php" class="footer-subitem d-block">Engineering</a>
            </div>

            <!-- Kontak & Jam Operasional -->
            <div class="col-md-3 mb-4">
                <h5>Kontak & Jam Operasional</h5>
                <p><i class="bi bi-geo-alt-fill me-2 text-warning"></i>Petunjungan, Kab. Brebes, Jawa Tengah 52253</p>
                <p><i class="bi bi-envelope-fill me-2 text-warning"></i>lpkaikokuterpadu@gmail.com</p>
                <p><i class="bi bi-telephone-fill me-2 text-warning"></i>+62 857-2522-1265</p>
                <p><i class="bi bi-clock-fill me-2 text-warning"></i>Senin - Jumat: 08:00 - 17:00</p>
                <p><i class="bi bi-clock-fill me-2 text-warning"></i>Sabtu: 08:00 - 14:00</p>
                <p><i class="bi bi-calendar-event-fill me-2 text-danger"></i><span class="text-danger">Minggu: Jadwalkan
                        Terlebih Dahulu</span></p>
            </div>
        </div>

        <!-- Google Maps Panjang -->
        <div class="row mt-4">
            <div class="col-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.1708493362!2d109.0320760740444!3d-7.55201107518066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6548a6cf3522f9%3A0x4aa00a4c8b5c0aab!2sPetunjungan%2C%20Kec.%20Bulakamba%2C%20Kabupaten%20Brebes%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1714143000000!5m2!1sid!2sid"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <!-- Garis Horizontal -->
        <hr class="mt-4" style="border-top: 1px solid #666;">

        <!-- Copyright -->
        <div class="text-center mt-2">
            <small>© 2025 LPK Aikoku Terpadu. All rights reserved.</small>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>