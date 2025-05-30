<?php
include 'config.php';

$query = "SELECT * FROM tb_footer ORDER BY id DESC LIMIT 1";
$result = mysqli_query($mysqli, $query);
$footer = mysqli_fetch_assoc($result);
?>
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
        font-size: 1.5rem; /* atau sesuaikan seperti 1.8rem, 2.2rem, dll */
    margin-right: 12px; /* optional: biar jaraknya juga pas */
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
            <div
                class="col-md-3 mb-4 text-center text-md-start d-flex flex-column align-items-center align-items-md-start">
                <?php if (!empty($footer['logo'])): ?>
                    <img src="uploads/<?= htmlspecialchars($footer['logo']) ?>" alt="Logo" class="footer-logo">
                    <p class="mt-3"><?= nl2br(htmlspecialchars($footer['deskripsi'])) ?></p>
                <?php endif; ?>
                <div class="social-icons mt-3">
                    <?php if (!empty($footer['facebook'])): ?>
                        <a href="<?= htmlspecialchars($footer['facebook']) ?>" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($footer['instagram'])): ?>
                        <a href="<?= htmlspecialchars($footer['instagram']) ?>" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($footer['whatsapp'])): ?>
                        <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $footer['whatsapp']) ?>" target="_blank"
                            class="me-2">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($footer['youtube'])): ?>
                        <a href="<?= htmlspecialchars($footer['youtube']) ?>" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($footer['email_sosmed'])): ?>
                        <a href="mailto:<?= htmlspecialchars($footer['email_sosmed']) ?>" target="_blank">
                            <i class="fas fa-envelope"></i>
                        </a>
                    <?php endif; ?>
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
                <p><i class="bi bi-geo-alt-fill me-2 text-warning"></i><?= nl2br(htmlspecialchars($footer['alamat'])) ?>
                </p>
                <p><i class="bi bi-telephone-fill me-2 text-warning"></i><?= htmlspecialchars($footer['telepon']) ?></p>
                <p><i class="bi bi-envelope-fill me-2 text-warning"></i><a
                        href="mailto:<?= htmlspecialchars($footer['email']) ?>"
                        class="text-light"><?= htmlspecialchars($footer['email']) ?></a></p>
                <p><i class="bi bi-clock-fill me-2 text-warning"></i><strong>Senin - Jumat:</strong>
                    <?= htmlspecialchars($footer['jam_kerja']) ?></p>
                <p><i class="bi bi-clock-fill me-2 text-warning"></i><strong>Sabtu:</strong>
                    <?= htmlspecialchars($footer['jam_sabtu']) ?></p>
                <p><i class="bi bi-calendar-event-fill me-2 text-danger"></i><span
                        class="text-danger"><?= htmlspecialchars($footer['catatan']) ?></span></p>
            </div>
        </div>

        <!-- Google Maps Panjang -->
        <div class="row mt-4">
            <?php if (!empty($footer['maps_url'])): ?>
                <div class="col-12">
                    <iframe <iframe src="<?= htmlspecialchars($footer['maps_url']) ?>" width="100%" height="300"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            <?php endif; ?>
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