-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2025 pada 16.38
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lpk_aikoku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_album`
--

CREATE TABLE `tb_album` (
  `id_album` int(11) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `foto_album` varchar(255) DEFAULT NULL,
  `upload_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_album`
--

INSERT INTO `tb_album` (`id_album`, `deskripsi`, `detail`, `foto_album`, `upload_date`) VALUES
(5, 'hkasdzxx', 'Tanda Tangan Kontrak', 'uploads/1745421241_471782679_1245106896748017_8469993405143907191_n.jpg', '2025-04-23'),
(6, '12345', 'Kelulusan Job', 'uploads/1745450377_afda.jpg', '2025-04-23'),
(14, 'Lpk', 'Keberangkatan', 'uploads/1750941566_galery.jpg', '2025-06-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_beranda_fasilitas`
--

CREATE TABLE `tb_beranda_fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `ikon` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_beranda_fasilitas`
--

INSERT INTO `tb_beranda_fasilitas` (`id_fasilitas`, `ikon`, `judul`, `deskripsi`) VALUES
(1, 'fa-regular fa-money-bill-1', 'wadaaaaaaaaaa22', 'awwwwwwaaaaaaaaaaaaaaa'),
(4, 'fas fa-graduation-cap', '123', '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_beranda_keunggulan`
--

CREATE TABLE `tb_beranda_keunggulan` (
  `id_keunggulan` int(11) NOT NULL,
  `ikon` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_upload` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_beranda_keunggulan`
--

INSERT INTO `tb_beranda_keunggulan` (`id_keunggulan`, `ikon`, `judul`, `deskripsi`, `tanggal_upload`) VALUES
(6, 'fa-regular fa-money-bill-1', '312', '32', '2025-06-06 18:57:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_beranda_tentang_kami`
--

CREATE TABLE `tb_beranda_tentang_kami` (
  `id_tentang` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_upload` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_beranda_tentang_kami`
--

INSERT INTO `tb_beranda_tentang_kami` (`id_tentang`, `judul`, `deskripsi`, `gambar`, `tanggal_upload`) VALUES
(11, 'LPK AIKOKU TERPADU', 'jadi w', 'assassins-creed-shadows-naoe-yasuke-4k-wallpaper-uhdpaper.com-642@5@e.jpg', '2025-06-06 19:05:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_beranda_testimoni`
--

CREATE TABLE `tb_beranda_testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `testimoni` text NOT NULL,
  `bidang` varchar(100) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_beranda_testimoni`
--

INSERT INTO `tb_beranda_testimoni` (`id_testimoni`, `nama`, `testimoni`, `bidang`, `gambar`, `tanggal`) VALUES
(3, 'aaaaa', 'aaaaaa', NULL, 'it-only-happens-in-motogp24.webp', '2025-05-12 04:35:49'),
(4, 'ZAK', 'aaaa', NULL, 'wong gagah.jpg', '2025-05-12 04:36:10'),
(6, 'selma', 'eq', 'perhotelan', 'Selma.jpg', '2025-06-06 12:03:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_footer`
--

CREATE TABLE `tb_footer` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `email_sosmed` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `jam_kerja` varchar(100) DEFAULT NULL,
  `jam_sabtu` varchar(100) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `maps_url` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_footer`
--

INSERT INTO `tb_footer` (`id`, `logo`, `deskripsi`, `facebook`, `instagram`, `whatsapp`, `youtube`, `email_sosmed`, `email`, `alamat`, `telepon`, `jam_kerja`, `jam_sabtu`, `catatan`, `maps_url`, `updated_at`) VALUES
(1, 'logo.png', 'Pusat Pelatihan Bahasa Jepang Terbaik untuk Mewujudkan Impian Berkarir di Jepang', 'https://www.facebook.com/lpk.aikokuterpadu?locale=id_ID', 'https://www.instagram.com/lpkaikokuterpadu/', '+6285875962872', 'https://www.youtube.com/@%E3%83%8F%E3%82%AD%E3%83%93%E3%82%AD%E3%83%B3%E3%83%9B%E3%82%AD', 'lpkaikokuterpadu@gmail.com', 'lpkaikokuterpadu@gmail.com', 'adaw', 'wada', '323r', '23r2', '23r2df', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8166997799794!2d108.9736890707426!3d-6.912507652349622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fa5af84c2ae8d%3A0x6d0eb4890eba578f!2sLPK%20AIKOKU%20TERPADU!5e0!3m2!1sid!2sid!4v1748591560939!5m2!1sid!2sid', '2025-05-30 08:48:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hero`
--

CREATE TABLE `tb_hero` (
  `id_hero` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT current_timestamp(),
  `link_tombol` varchar(255) DEFAULT NULL,
  `teks_tombol` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_hero`
--

INSERT INTO `tb_hero` (`id_hero`, `judul`, `deskripsi`, `gambar`, `tanggal_upload`, `link_tombol`, `teks_tombol`) VALUES
(10, 'LPK AIKOKU TERPADU22', 'Lpk', 'jpng.jpg', '2025-06-07 09:09:13', 'profile.php', 'coba'),
(11, 'LPK AIKOKU TERPADU', '3', 'Fujiyama.jpg', '2025-06-07 09:15:42', 'album.php', 'Daftar Sekarang'),
(12, 'cc', 'cc', 'contact.png', '2025-06-26 20:25:16', 'daftar.php', 'ccc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hero_album`
--

CREATE TABLE `tb_hero_album` (
  `id_hero` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_upload` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_hero_album`
--

INSERT INTO `tb_hero_album` (`id_hero`, `judul`, `deskripsi`, `gambar`, `tanggal_upload`) VALUES
(6, 'qw', 'qwd', 'foto_login.jpg', '2025-06-06 19:09:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hero_kontak`
--

CREATE TABLE `tb_hero_kontak` (
  `id_hero` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_hero_kontak`
--

INSERT INTO `tb_hero_kontak` (`id_hero`, `judul`, `deskripsi`, `gambar`, `tanggal_upload`) VALUES
(6, 'wa', 'ww', 'foto_login.jpg', '2025-06-06 12:44:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hero_pendaftaran`
--

CREATE TABLE `tb_hero_pendaftaran` (
  `id_hero` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_hero_pendaftaran`
--

INSERT INTO `tb_hero_pendaftaran` (`id_hero`, `judul`, `deskripsi`, `gambar`, `tanggal_upload`) VALUES
(4, 'tes', 'eee', 'foto_login.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hero_pengumuman`
--

CREATE TABLE `tb_hero_pengumuman` (
  `id` int(11) NOT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_description` varchar(255) DEFAULT NULL,
  `hero_image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_hero_pengumuman`
--

INSERT INTO `tb_hero_pengumuman` (`id`, `hero_title`, `hero_description`, `hero_image`, `created_at`) VALUES
(6, 'coba', 'c', 'assassins-creed-shadows-naoe-yasuke-4k-wallpaper-uhdpaper.com-642@5@e.jpg', '2025-06-26 10:45:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hero_profile`
--

CREATE TABLE `tb_hero_profile` (
  `id_hero` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_hero_profile`
--

INSERT INTO `tb_hero_profile` (`id_hero`, `judul`, `deskripsi`, `gambar`, `upload_date`) VALUES
(7, '21', '21', 'foto_login.jpg', '2025-06-06 13:09:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hero_program`
--

CREATE TABLE `tb_hero_program` (
  `id_hero_program` int(11) NOT NULL,
  `nama_program` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `program` varchar(50) DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_hero_program`
--

INSERT INTO `tb_hero_program` (`id_hero_program`, `nama_program`, `judul`, `deskripsi`, `gambar`, `program`, `tanggal_upload`) VALUES
(9, '', 'rsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaa', 'rsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaa', 'jpng.jpg', 'tokutei', '2025-05-13 23:10:33'),
(10, '', '32', '32', '1749222148_bg.jpg', 'engineering', '2025-06-06 22:02:28'),
(11, '', 'ew', 'fe4', '1749263212_Fujiyama.jpg', 'magang', '2025-06-07 09:26:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_informasi_kontak`
--

CREATE TABLE `tb_informasi_kontak` (
  `id_kontak` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email_kontak` varchar(255) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `jam_kerja` varchar(100) NOT NULL,
  `jam_sabtu` varchar(100) NOT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_informasi_kontak`
--

INSERT INTO `tb_informasi_kontak` (`id_kontak`, `alamat`, `email_kontak`, `telepon`, `jam_kerja`, `jam_sabtu`, `catatan`, `created_at`) VALUES
(6, 'ww', 'ww@frged', 'ww', 'ww', 'ww', 'ww', '2025-06-06 12:47:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_job`
--

CREATE TABLE `tb_job` (
  `id_job` int(11) NOT NULL,
  `nama_job` enum('Perhotelan','Pertanian','Pengolahan Makanan','Perawat Lansia','Konstruksi','Cleaning Service','Restoran') NOT NULL,
  `deskripsi_job` text NOT NULL,
  `hero_image` varchar(255) NOT NULL,
  `tanggal_upload` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_job`
--

INSERT INTO `tb_job` (`id_job`, `nama_job`, `deskripsi_job`, `hero_image`, `tanggal_upload`) VALUES
(4, 'Pertanian', 'qqaaa2', '1751287169_foto_login.jpg', '2025-06-29 18:26:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_job_detail`
--

CREATE TABLE `tb_job_detail` (
  `id_job_detail` int(11) NOT NULL,
  `nama_job` varchar(100) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `paragraf` text DEFAULT NULL,
  `pengumuman` text DEFAULT NULL,
  `cakupan_tugas` text DEFAULT NULL,
  `pendaftaran_terbuka` text DEFAULT NULL,
  `persyaratan_umum` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_job_detail`
--

INSERT INTO `tb_job_detail` (`id_job_detail`, `nama_job`, `gambar`, `paragraf`, `pengumuman`, `cakupan_tugas`, `pendaftaran_terbuka`, `persyaratan_umum`) VALUES
(3, 'Konstruksi', '1751288925_assassins-creed-shadows-naoe-yasuke-4k-wallpaper-uhdpaper.com-642@5@e.jpg', 'aaaaaaaaaaaaaaaw1112\r\ns22', 'aa', 'aa', 'aa', 'aa'),
(5, 'Cleaning Service', '1751293937_foto_login.jpg', 'a2\r\n22', '2s', 'a\r\nasd', 'awaa\r\n2\r\naw', '                        aw\r\naw'),
(7, 'Pertanian', '1751294034_bg.jpg', 'wdq', 'q3dw', '                     qd   q3wd', '             dq   3qd        ', '                    qd    ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `id_kontak` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `message` text NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kontak`
--

INSERT INTO `tb_kontak` (`id_kontak`, `name`, `email`, `phone`, `address`, `message`, `date_sent`) VALUES
(5, 'awdeaw', 'imam12@gmail.com', '123', '123', '123', '2025-04-24 14:22:46'),
(6, 'aer', 'aew2@dq', 'awr', 'awr', 'awerfc', '2025-05-09 08:24:38'),
(7, 'wre', 'ana@gmail.com', 'f3', '3r', 'ef', '2025-05-09 08:51:35'),
(8, 'dx', 'diji@mailinator13.com', '1', '1', '1', '2025-06-26 13:12:37'),
(9, 'dx', 'diji@mailinator13.com', '1', '1', '1', '2025-06-26 13:13:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kontak_maps`
--

CREATE TABLE `tb_kontak_maps` (
  `id_maps` int(11) NOT NULL,
  `maps_url` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kontak_maps`
--

INSERT INTO `tb_kontak_maps` (`id_maps`, `maps_url`, `created_at`) VALUES
(11, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8166996517343!2d108.97572757419275!3d-6.912507667651758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fa5af84c2ae8d%3A0x6d0eb4890eba578f!2sLPK%20AIKOKU%20TERPADU!5e0!3m2!1sid!2sid!4v1746803766047!5m2!1sid!2sid', '2025-06-06 19:52:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kontak_masuk`
--

CREATE TABLE `tb_kontak_masuk` (
  `id_kontak` int(11) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tanggal_kirim` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kontak_masuk`
--

INSERT INTO `tb_kontak_masuk` (`id_kontak`, `isi_pesan`, `tanggal_kirim`) VALUES
(1, '{\"Email\":\"bla bla@fha\"}', '2025-05-30 01:27:24'),
(2, '{\"Email\":\"aw@ed\",\"Nama\":\"naued\"}', '2025-05-30 01:28:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_logo`
--

CREATE TABLE `tb_logo` (
  `id_logo` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `text_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_logo`
--

INSERT INTO `tb_logo` (`id_logo`, `logo`, `text_logo`, `created_at`) VALUES
(1, 'logo_1748647707.jpg', 'LPK AIKOKU TERPADU TER', '2025-05-30 23:28:27'),
(2, 'logo_1748647707.jpg', 'LPK AIKOKU TERPADU', '2025-05-30 23:30:49'),
(3, 'logo_1748664193.png', 'LPK AIKOKU TERPADU', '2025-05-31 04:03:13'),
(4, 'logo_1748664193.png', 'LPK AIKOKU TERPADU1', '2025-06-26 12:00:56'),
(5, 'logo_1748664193.png', 'LPK AIKOKU TERPADU', '2025-06-26 12:01:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `foto_diri` varchar(255) DEFAULT NULL,
  `nomor_pendaftaran` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `alamat_ktp` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `alamat_keluarga` text DEFAULT NULL,
  `telepon_keluarga` varchar(20) DEFAULT NULL,
  `program` varchar(100) DEFAULT NULL,
  `bidang` varchar(100) DEFAULT NULL,
  `pendidikan_terakhir` varchar(50) DEFAULT NULL,
  `pengalaman_kerja` text DEFAULT NULL,
  `status_pernikahan` varchar(50) DEFAULT NULL,
  `motivasi` text DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `pengalaman_jepang` varchar(50) DEFAULT NULL,
  `penyakit_kronis` text DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `tanggal_daftar` datetime DEFAULT current_timestamp(),
  `id_pengguna` int(11) DEFAULT NULL,
  `pengumuman` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_pendaftaran`, `nama_lengkap`, `foto_diri`, `nomor_pendaftaran`, `tempat_lahir`, `tanggal_lahir`, `usia`, `jenis_kelamin`, `agama`, `alamat_ktp`, `email`, `telepon`, `alamat`, `alamat_keluarga`, `telepon_keluarga`, `program`, `bidang`, `pendidikan_terakhir`, `pengalaman_kerja`, `status_pernikahan`, `motivasi`, `tinggi_badan`, `berat_badan`, `pengalaman_jepang`, `penyakit_kronis`, `golongan_darah`, `status`, `tanggal_daftar`, `id_pengguna`, `pengumuman`) VALUES
(3, 'ZAKI1', NULL, '2025-0001', '12', '0011-11-11', 1, 'Laki-laki', 'Islam', '12', '12@12', '12', 'ed', '2222', '222', 'Magang', NULL, 'S3', '22222', 'Menikah', NULL, 222, 22, 'Pemula', '22', '22', 'Lolos', '2025-04-24 22:07:39', NULL, NULL),
(4, 'qw', NULL, '2025-0002', 'qw', '0002-02-12', 1, 'Laki-laki', 'Buddha', '12qw', 'qw@qw', 'qw1', 'wqe1', '213e', '12e', 'Engineering', NULL, 'D3', '321', 'Janda/Duda', NULL, 21, 22, 'Pemula', '12', 'e', 'Lolos', '2025-04-24 22:07:39', NULL, ''),
(5, 'intan', NULL, '2025005', '12', '1222-12-12', 12, 'Perempuan', 'Islam', 'aewr', '12@12', '231', '34qeq', '3qr', 'q34ed', 'Engineering', NULL, 'S2', 'qr43', 'Belum Menikah', NULL, 12, 12, 'Pemula', '24', 'ew2', 'Pending', '2025-05-05 21:51:39', NULL, NULL),
(6, 'intan', NULL, '2025006', '12', '1222-12-12', 12, 'Perempuan', 'Islam', 'aewr', '12@12', '231', '34qeq', '3qr', 'q34ed', 'Engineering', NULL, 'S2', 'qr43', 'Belum Menikah', NULL, 12, 12, 'Pemula', '24', 'ew2', 'Pending', '2025-05-05 21:51:53', NULL, NULL),
(7, 'intan', NULL, '2025007', '12', '1222-12-12', 12, 'Perempuan', 'Islam', 'aewr', '12@12', '231', '34qeq', '3qr', 'q34ed', 'Engineering', NULL, 'S2', 'qr43', 'Belum Menikah', NULL, 12, 12, 'Pemula', '24', 'ew2', 'Pending', '2025-05-05 21:51:53', NULL, NULL),
(8, 'intan', NULL, '2025008', '12', '1222-12-12', 12, 'Perempuan', 'Islam', 'aewr', '12@12', '231', '34qeq', '3qr', 'q34ed', 'Engineering', NULL, 'S2', 'qr43', 'Belum Menikah', NULL, 12, 12, 'Pemula', '24', 'ew2', 'Pending', '2025-05-05 21:53:12', NULL, NULL),
(9, 'intan', NULL, '2025009', '12', '1222-12-12', 12, 'Perempuan', 'Islam', 'aewr', '12@12', '231', '34qeq', '3qr', 'q34ed', 'Engineering', NULL, 'S2', 'qr43', 'Belum Menikah', NULL, 12, 12, 'Pemula', '24', 'ew2', 'Pending', '2025-05-05 21:53:22', NULL, NULL),
(10, 'aan', NULL, '2025010', '123', '0003-03-12', 12, 'Laki-laki', 'Hindu', 'eq2', '12@12', '12', '12', '12', '12', 'Magang', NULL, 'S1', '12', 'Janda/Duda', NULL, 12, 12, 'Pemula', '12dqaw', 'dqw', 'Lolos', '2025-05-05 21:57:07', NULL, NULL),
(11, 'ek', NULL, '2025011', '12', '1222-12-12', 12, 'Laki-laki', 'Islam', '12e', '12e@dq', '21d', '12', '12', '12', 'Magang', NULL, 'S2', '12', 'Menikah', NULL, 12, 12, 'Pemula', '12', '12', 'Tidak Lolos', '2025-05-05 22:09:12', NULL, NULL),
(13, 'gg', NULL, '2025013', '12', '1211-12-12', 12, 'Laki-laki', 'Kristen', '', 'EQ@edac', '12', '12', '12', '222', 'Tokutei Ginou', NULL, 'S1', '123e', 'Menikah', NULL, 12, 12, 'Pemula', 'f', '3', 'Lolos', '2025-05-05 22:46:11', NULL, 'oke apakah bisa masuk dan berjalan normal ,tes tes '),
(14, 'zaka', NULL, '2025014', '11', '0000-00-00', 121, 'Laki-laki', 'Islam', '', '112@dc', '11', '12', '12', '11', 'Engineering', NULL, 'S3', 'ed', 'Janda/Duda', NULL, 12, 12, 'Pemula', '12d', '1', 'Lolos', '2025-05-07 20:32:06', NULL, ''),
(15, 'aa', NULL, '2025015', 'aa', '0012-12-12', 12, 'Laki-laki', 'Buddha', '21', '32e@d', '32', 'e2', '23', 'q32', 'Magang', NULL, 'S3', '32', 'Belum Menikah', NULL, 1, 12, 'Ex-Jepang', '2e', 'd', 'Lolos', '2025-05-07 21:14:58', NULL, ''),
(16, 'c', NULL, '2025016', '12xxq', '1111-11-11', 1, 'Laki-laki', 'Islam', '', 'e2@ea', 'e211a', '12311aq', '23xxq', '213a', 'Magang', NULL, 'MTS', 'qr43', 'Belum Menikah', NULL, 1, 12, 'Pemula', '12e', '2e', 'Lolos', '2025-05-07 22:03:42', NULL, ''),
(17, 'x', NULL, '2025017', '22', '2222-02-22', 22, 'Perempuan', 'Islam', '22', 'rd@edqwaxzz22', '22', '22', '22', '2rq222', 'Magang', NULL, 'SMP2', '2qr', 'Belum M2enikah', NULL, 21, 122, 'Ex-Jepang2', '1er2', '1rd2', 'Lolos', '2025-05-07 22:52:31', NULL, 'namanya coba'),
(18, 'q', NULL, '2025018', 'q', '1111-11-11', 1, 'Perempuan', 'Kristen', '1w3', '13@1', 'd13r12', '123', '12', '12', 'Magang', NULL, 'S2', '2', 'Menikah', NULL, 12, 34, 'Pemula', '1', 'fd', 'Lolos', '2025-05-08 06:18:44', NULL, ''),
(19, 'y2', NULL, '2025019', '33a2', '0333-03-31', 332, 'Laki-laki', 'Katolik', '22', '33@3434a21111', '3aa22', '33aa2', '33aa22', '33aa2', 'Engineering22', NULL, 'S3', '3322', 'Belum Menikah22', NULL, 3322, 3322, 'Ex-Jepang22', '3322', '3322', 'Lolos', '2025-05-08 13:45:48', NULL, ''),
(20, 'bb', NULL, '2025020', '11222211rf11', '1111-11-11', 11, 'Perempuan', 'Islam', '11', '11!11@1122a2211', '1122', '1122', '1122', '1122', 'Engineering', NULL, 'S2', '11', 'Menikah', NULL, 11, 11, 'Pemula', '11', '11', 'Lolos', '2025-05-08 14:02:56', NULL, 'COBAAAAA'),
(21, 'bayu', NULL, '2025021', 'bREBES', '1111-11-11', 11, 'Laki-laki', 'Konghucu', '11', '11!@11', '11', '11', '11', '11', 'Engineering', NULL, 'S3', '11', 'Menikah', NULL, 1, 1, 'Pemula', '1212', '11', 'Tidak Lolos', '2025-05-08 15:40:50', NULL, ''),
(22, 'anam', NULL, '2025022', '121', '1111-11-11', 12, 'Perempuan', 'Kristen', 'a', 'a@wsda', 'aw', 'aa', '21ed', 'de12', 'Magang', NULL, 'MI', 'a2eq', 'Menikah', NULL, 12, 12, 'Pemula', 'cfa', 'aw31', 'Tidak Lolos', '2025-05-12 17:01:14', NULL, ''),
(23, 'Molestiae veniam si', NULL, '2025023', 'Nesciunt non ut pro', '1991-12-28', 63, 'Laki-laki', 'Buddha', 'Maxime id voluptas u', 'jotebo@mailinator.com', 'Voluptatem et ut har', 'Veniam impedit eaq', 'Molestiae perspiciat', 'Consectetur enim Na', 'Engineering', NULL, 'D3', 'Doloribus non pariat', 'Belum Menikah', NULL, 33, 14, 'Pemula', 'Voluptate nihil comm', 'Id ex', 'Lolos', '2025-05-20 19:51:25', NULL, ''),
(24, 'Quia quisquam ration', NULL, '2025024', 'Culpa ea consequat', '2010-08-05', 95, 'Perempuan', 'Konghucu', 'Ut perspiciatis qui', 'suqyho@mailinator.com', 'Reiciendis lorem in ', 'Iusto sed Nam omnis ', 'Occaecat quo velit q', 'Qui cum ut delectus', 'Magang', NULL, 'D3', 'Aperiam vel et disti', 'Belum Menikah', NULL, 33, 96, 'Ex-Jepang', 'Commodi laboriosam ', 'Volup', 'Tidak Lolos', '2025-05-20 19:52:38', NULL, ''),
(25, 'oin', NULL, '2025025', 'Eu fugit distinctio', '2000-04-05', 54, 'Laki-laki', 'Konghucu', 'Fugiat aut dolores ', 'muxopefi@mailinator.com', 'Hic harum quo placea', 'Nobis illum delenit', 'Qui commodo tempor n', 'Ea quo officia porro', 'Engineering', NULL, 'SMK', 'Possimus velit ut ', 'Menikah', NULL, 54, 46, 'Pemula', 'Sit neque quae ut i', 'Nihil', 'Lolos', '2025-05-29 19:14:10', NULL, ''),
(26, 'oin', NULL, '2025026', 'Eius incidunt asper', '2011-12-12', 81, 'Perempuan', 'Hindu', 'Optio assumenda iru', 'catysutoz@mailinator.com', 'Aut non sunt nesciu', 'Fugit aut id commod', 'Explicabo Sunt qui', 'Odit vero anim rerum', 'Magang', NULL, 'SD', 'Ut cupidatat adipisc', 'Belum Menikah', NULL, 51, 57, 'Ex-Jepang', 'Nihil rerum omnis la', 'Quia ', 'Tidak Lolos', '2025-05-29 19:15:04', NULL, ''),
(27, 'kk', NULL, '2025027', 'Sed saepe irure duis', '2019-02-10', 53, 'Perempuan', 'Hindu', 'Molestias pariatur ', 'zevyriw@mailinator.com', 'Veniam odio perspic', 'Veniam non consequa', 'Et incidunt pariatu', 'Dolore maiores est d', 'Tokutei Ginou', NULL, 'SMA', 'Ut et ab vel iusto n', 'Janda/Duda', NULL, 50, 41, 'Ex-Jepang', 'Dolore nostrum debit', 'Est r', 'Tidak Lolos', '2025-05-29 19:30:05', NULL, ''),
(28, 'kk', NULL, '2025028', 'Duis expedita nisi e', '2013-04-08', 4, 'Perempuan', 'Islam', 'Quis veniam in quis', 'cahaxome@mailinator.com', 'Sed accusamus ex ver', 'Voluptas odit conseq', 'Earum non blanditiis', 'Recusandae Perspici', 'Engineering', NULL, 'D3', 'Esse in nostrum debi', 'Janda/Duda', NULL, 38, 13, 'Ex-Jepang', 'Qui sint impedit se', 'Quam ', 'Lolos', '2025-05-29 19:30:14', NULL, ''),
(29, 'll', NULL, '2025029', 'Qui voluptate est c', '1986-10-07', 5, 'Laki-laki', 'Konghucu', 'Pariatur Aute accus', 'coquc@mailinator.com', 'A minim est recusand', 'Ut quos enim facere ', 'Praesentium sit dolo', 'Aperiam nesciunt co', 'Tokutei Ginou', NULL, 'MTS', 'Eos deserunt minim ', 'Menikah', NULL, 32, 24, 'Pemula', 'Exercitation odio di', 'Volup', 'Lolos', '2025-05-29 19:51:30', NULL, ''),
(30, 'll', NULL, '2025030', 'Debitis nostrum null', '1982-02-08', 8, 'Laki-laki', 'Katolik', 'Eum numquam qui saep', 'symilukyby@mailinator.com', 'Qui error deserunt q', 'Eum eos sit archit', 'Voluptatem facilis ', 'Rem quis modi qui il', 'Magang', NULL, 'SD', 'Dignissimos dolorem ', 'Belum Menikah', NULL, 85, 64, 'Pemula', 'Quibusdam a aliquam ', 'Paria', 'Lolos', '2025-05-29 19:51:40', NULL, ''),
(31, 'pp', NULL, '2025031', 'Nulla culpa id vol', '1970-03-21', 83, 'Perempuan', 'Islam', 'Ut nihil id sapient', 'hexyl@mailinator.com', 'Exercitation eos est', 'Impedit et fugit n', 'Quisquam in quod vol', 'Id quod laudantium', 'Engineering', NULL, 'ALIYAH', 'Nulla nobis impedit', 'Janda/Duda', NULL, 80, 72, 'Pemula', 'Et blanditiis ullamc', 'Est n', 'Lolos', '2025-05-29 20:00:13', NULL, ''),
(32, 'op', NULL, '2025032', 'Dicta voluptatibus i11111', '2025-09-17', 6, 'Laki-laki', 'Buddha', 'Ex accusamus molesti', 'hozon@mailinator.com', 'Iste distinctio Sin', 'Necessitatibus quia ', 'Est laborum consect', 'Error ut velit quod ', 'Engineering', NULL, 'MTS', 'Quod molestiae sed d', 'Menikah', NULL, 86, 40, 'Pemula', 'Eiusmod rerum ut non', 'Reici', 'Lolos', '2025-05-29 20:09:06', NULL, ''),
(34, 'haki', NULL, '2025034', 'Rerum quas tempore ', '1978-07-04', 14, 'Perempuan', 'Buddha', 'Non excepteur facere', 'zusaqy@mailinator.com', 'Est quod atque mini', 'Quia excepteur volup', 'Irure consectetur es', 'Omnis voluptatem dol', 'Engineering', NULL, 'S2', 'Esse et consectetur', 'Belum Menikah', NULL, 82, 33, 'Ex-Jepang', 'Ipsam adipisicing si', 'Labor', 'Pending', '2025-05-29 20:41:33', NULL, NULL),
(36, 'op1', NULL, '2025035', 'Quasi necessitatibus12', '2002-11-13', 11, 'Laki-laki', 'Buddha', 'Veniam mollitia vol', 'diji@mailinator1.com', 'Vel doloribus dolor ', 'Delectus adipisci o', 'Dicta optio et sequ', 'Nisi molestiae ut de', 'Magang', NULL, 'SD', 'Ut aut odit incididu', 'Belum Menikah', NULL, 80, 31, 'Pemula', 'Aperiam commodi dolo', 'Volup', 'Lolos', '2025-05-29 22:02:53', NULL, 'tes lok'),
(37, 'Vel nulla accusamus ', NULL, '2025037', 'Porro dolore invento', '2010-06-01', 48, 'Perempuan', 'Hindu', 'Reiciendis sint ips', 'kiromahiw@mailinator.com', 'Eiusmod cum fugiat v', 'Eaque ratione recusa', 'Illo culpa amet per', 'Non nulla minim tene', 'Tokutei Ginou', NULL, 'SMK', 'Aute quos irure aut ', 'Janda/Duda', NULL, 45, 25, 'Pemula', 'Harum sed sit rerum ', 'Conse', 'Lolos', '2025-06-08 18:27:12', NULL, ''),
(38, 'marina12', NULL, '2025038', 'Qui eos facilis dol', '1971-03-13', 79, 'Laki-laki', 'Konghucu', 'Irure voluptas labor', 'marina12@mailinator.com', 'Hic voluptas iste no', 'Consectetur sit te', 'Quia repudiandae qui', 'Velit quisquam paria', 'Tokutei Ginou', NULL, 'S1', 'Excepteur labore lab', 'Menikah', NULL, 60, 22, 'Ex-Jepang', 'Quae ut et veniam q', 'Volup', 'Lolos', '2025-06-22 09:08:15', NULL, 'COBAAAAA'),
(39, 'hikmah', NULL, '2025039', '12', '1212-12-12', 12, 'Laki-laki', 'Islam', '12', 'hikmah1@gmail.com', '12', '12', '12', '12', 'Magang', NULL, 'S2', '12', 'Belum Menikah', NULL, 12, 12, 'Pemula', '12', '12', 'Lolos', '2025-06-24 14:37:38', NULL, ''),
(40, 'hikmah1', NULL, '2025040', '12', '1212-12-12', 12, 'Laki-laki', 'Islam', '12', 'hikmah1@gmail.com', '12', '12', '12', '12', 'Magang', NULL, 'S2', '12', 'Belum Menikah', NULL, 12, 12, 'Pemula', '12', '12', 'Lolos', '2025-06-24 14:40:38', NULL, ''),
(41, 'ko', NULL, '2025041', '11', '1111-11-11', 11, 'Laki-laki', 'Islam', '11', '111@111.com', '11', '11', '11', '11', 'Magang', NULL, 'S3', '11', 'Belum Menikah', NULL, 11, 11, 'Pemula', '11', '11', 'Lolos', '2025-06-24 16:29:46', NULL, ''),
(42, 'Odit quisquam ut per', NULL, '2025042', 'Illum molestias ips', '2013-04-02', 68, 'Perempuan', 'Islam', 'Voluptatum laboris e', 'kadamahejo@mailinator.com', 'Voluptas excepturi c', 'Exercitationem eu co', 'Similique nemo quis ', 'Magni adipisicing do', 'Tokutei Ginou', NULL, 'SMA', 'Vel nihil reprehende', 'Janda/Duda', NULL, 60, 98, 'Ex-Jepang', 'Est amet ratione b', 'Ut do', 'Pending', '2025-06-24 16:44:05', NULL, NULL),
(43, 'Error ut ullam aliqu', NULL, '2025043', 'Et dolorem ut duis n', '1992-03-08', 1, 'Laki-laki', 'Islam', 'Quas quis aliquid om', 'byhadol@mailinator.com', 'Dolor veniam et har', 'Animi amet recusan', 'Sit et ex earum amet', 'Sit eum ab esse pari', 'Tokutei Ginou', NULL, 'S3', 'Sunt sint autem a du', 'Janda/Duda', NULL, 62, 68, 'Ex-Jepang', 'Nobis non qui recusa', 'Commo', 'Pending', '2025-06-24 16:46:42', NULL, NULL),
(44, 'Quibusdam eu sit do', NULL, '2025044', 'Et ex voluptatibus u1', '2020-08-08', 63, 'Perempuan', 'Hindu', 'Consequatur et bland', 'jitaq@mailinator.com', 'Ea reiciendis itaque', 'Esse nisi voluptatum', 'Enim asperiores ipsa', 'Et dolores pariatur', 'Engineering', NULL, 'MTS', 'Tempor eum excepteur', 'Janda/Duda', NULL, 80, 37, 'Pemula', 'Architecto id et co', 'Quam ', 'Lolos', '2025-06-24 18:55:24', 44, ''),
(45, 'Ut non facilis aut r', NULL, '2025045', 'Distinctio Maiores ', '1970-04-17', 8, 'Laki-laki', 'Islam', 'Tempore ut quam mag', 'lyky@mailinator.com', 'Odit aperiam aut qui', 'Natus optio incidun', 'Ut in vitae nemo nes', 'Accusantium sed ipsa', 'Engineering', NULL, 'S1', 'Labore nulla aut ver', 'Belum Menikah', NULL, 3, 42, 'Ex-Jepang', 'Sint rerum ea volupt', 'Qui s', 'Lolos', '2025-06-26 19:50:22', 45, ''),
(46, 'Deleniti totam earum', NULL, '2025046', 'Dicta non ut omnis q', '2025-02-09', 28, 'Laki-laki', 'Konghucu', 'Adipisci ratione rep', 'vararulane@mailinator.com', 'Labore non qui id a', 'Error assumenda dolo', 'Facilis exercitation', 'Voluptatum obcaecati', 'Magang', NULL, 'SMA', 'Explicabo Cillum qu', 'Menikah', NULL, 88, 7, 'Ex-Jepang', 'Inventore aute reici', 'Sunt ', 'Pending', '2025-06-26 19:58:09', 46, NULL),
(47, 'Veniam consectetur', NULL, '2025047', 'Vitae qui est dignis', '1998-06-03', 36, 'Perempuan', 'Hindu', 'Sunt aperiam eos aut', 'finina@mailinator.com', 'Omnis voluptatum vol', 'Provident eveniet ', 'Assumenda voluptate ', 'Doloremque adipisici', 'Magang', NULL, 'MI', 'Iste rerum minima qu', 'Janda/Duda', NULL, 81, 10, 'Pemula', 'Id rerum quia in es', 'Quia ', 'Pending', '2025-06-26 20:28:14', 47, NULL),
(48, 'Aut in voluptates au', '../../uploads/foto_1751167430.', '2025048', 'Et dolor eum cum in ', '2014-01-04', 37, 'Perempuan', 'Buddha', 'Quis autem dignissim', 'hoqybar@mailinator.com', 'Quia in duis nemo mo', 'Aute sint odit enim ', 'Sequi aspernatur lor', 'Reprehenderit quod ', 'Tokutei Ginou', NULL, 'SD', 'Esse non reprehender', 'Menikah', 'Recusandae Omnis do', 11, 50, 'Ex-Jepang', 'Quod iste aute sed m', 'Velit', 'Pending', '2025-06-29 10:23:50', 48, NULL),
(49, 'Voluptatem adipisici', '../../uploads/foto_1751167488.', '2025049', 'Molestias ea est dig', '2005-02-13', 67, 'Laki-laki', 'Katolik', 'Mollit quis voluptat', 'kapovobe@mailinator.com', 'Delectus beatae eos', 'Molestiae culpa poss', 'Et eiusmod dolorem q', 'Alias quod aut ut do', 'Tokutei Ginou', NULL, 'S3', 'Corporis a magna ut ', 'Menikah', 'Incididunt enim obca', 34, 91, 'Pemula', 'Fugit deserunt labo', 'Dolor', 'Pending', '2025-06-29 10:24:48', 49, NULL),
(50, 'Sed est rerum facili', '../../uploads/foto_1751167637.', '2025050', 'Iusto sit mollitia ', '2008-07-19', 74, 'Perempuan', 'Konghucu', 'Aliquid occaecat exc', 'wexyqifufa@mailinator.com', 'Molestiae aliquip ip', 'Accusamus aliquid es', 'Impedit possimus n', 'Praesentium perferen', 'Tokutei Ginou', NULL, 'SMA', 'Possimus omnis plac', 'Menikah', 'Ut alias et sit ut a', 78, 36, 'Pemula', 'Nemo in velit dignis', 'Quia ', 'Pending', '2025-06-29 10:27:17', 50, NULL),
(51, 'Eaque cupidatat ad l', '../../uploads/foto_1751168658.', '2025051', 'Qui sint sed deserun', '2023-07-21', 98, 'Perempuan', 'Kristen', 'Soluta laudantium q', 'rovy@mailinator.com', 'Nobis dolore iure ut', 'Quis deserunt conseq', 'Earum optio numquam', 'Et ut enim mollit ul', 'Engineering', NULL, 'D3', 'Labore et quia volup', 'Menikah', 'Ullamco iste sunt du', 57, 10, 'Ex-Jepang', 'Necessitatibus tempo', 'Ad do', 'Pending', '2025-06-29 10:44:18', 51, NULL),
(52, 'Ut voluptatibus dign', 'foto_1751169024.', '2025052', 'Sed veniam alias co', '2015-03-25', 51, 'Laki-laki', 'Katolik', 'Quas numquam qui imp', 'putuvovuw@mailinator.com', 'Ut elit modi omnis ', 'Sed pariatur Tempor', 'Sed omnis duis solut', 'Commodo rem voluptat', 'Engineering', NULL, 'S2', 'Ut incididunt dolore', 'Janda/Duda', 'Vero sint dolorum l', 14, 42, 'Pemula', 'Sunt nostrud quia et', 'A sus', 'Pending', '2025-06-29 10:50:24', 52, NULL),
(53, 'Voluptatem ut repudi', 'foto_1751169060.', '2025053', 'Quia mollitia et fug', '1973-03-20', 66, 'Laki-laki', 'Konghucu', 'Mollit assumenda sed', 'moje@mailinator.com', 'Voluptatibus volupta', 'Sit cumque ut conseq', 'Incidunt optio vel', 'Et consectetur deser', 'Tokutei Ginou', NULL, 'MTS', 'Neque harum consecte', 'Menikah', 'Ut est labore modi l', 16, 7, 'Pemula', 'Asperiores ut vero q', 'Et co', 'Pending', '2025-06-29 10:51:00', 53, NULL),
(54, 'Et repudiandae sequi', 'foto_1751169127.', '2025054', 'Mollit voluptas tota', '2002-03-07', 87, 'Laki-laki', 'Kristen', 'Quaerat earum magnam', 'hybojufafa@mailinator.com', 'Adipisicing sunt ali', 'Perferendis pariatur', 'Maiores explicabo N', 'Aliquam in laborum ', 'Tokutei Ginou', NULL, 'ALIYAH', 'Enim consequatur Ve', 'Menikah', 'Labore voluptatem q', 26, 64, 'Pemula', 'Enim lorem asperiore', 'Moles', 'Pending', '2025-06-29 10:52:07', 54, NULL),
(55, 'Facere quis esse ve', 'foto_1751169451.jpg', '2025055', 'Aliquam do ex omnis ', '1989-05-05', 56, 'Laki-laki', 'Hindu', 'Aliquid tempore lau', 'hedagezy@mailinator.com', 'Voluptate excepteur ', 'Voluptatibus aut qui', 'Nihil enim est itaqu', 'Eius voluptate sed m', 'Tokutei Ginou', NULL, 'D3', 'Ut iure quis eu omni', 'Menikah', 'Dolores et eos dolor', 35, 3, 'Pemula', 'Ut veniam elit dui', 'Et as', 'Pending', '2025-06-29 10:57:31', 55, NULL),
(56, 'Cupiditate asperiore', 'foto_1751178096.jpg', '2025056', 'Minus rerum sed assu', '2003-07-08', 52, 'Laki-laki', 'Islam', 'Ratione commodo quia', 'xesulavex@mailinator.com', 'Est est quasi labor', 'Ex ullamco officia a', 'Quia ullam recusanda', 'Quisquam et repellen', 'Tokutei Ginou', 'Pertanian', 'S1', 'Commodo ut ullamco m', 'Janda/Duda', '', 75, 38, 'Pemula', 'Suscipit sed consequ', 'Offic', 'Lolos', '2025-06-29 11:17:14', 56, ''),
(57, 'Sapiente magni est m', 'foto_1751177164.png', '2025057', 'Impedit ea dolore e', '1979-02-28', 95, 'Perempuan', 'Kristen', 'Aut natus id qui con', 'mulew@mailinator.com', 'Alias non incididunt', 'Minus voluptatem Am', 'Aut consectetur et r', 'Dolores laborum Par', 'Engineering', 'Pertanian', 'SMA', 'Nesciunt et non rei', 'Menikah', 'Qui est omnis labore', 62, 55, 'Pemula', 'A velit officia sit', 'Eos r', 'Pending', '2025-06-29 13:06:04', 57, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_pengguna` varchar(100) NOT NULL,
  `roles` enum('admin','user') DEFAULT 'user',
  `tanggal_aktivitas` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`, `email_pengguna`, `roles`, `tanggal_aktivitas`) VALUES
(3, 'admin123', '202cb962ac59075b964b07152d234b70', 'admin124@gmail.com', 'admin', '2025-05-09 09:12:49'),
(4, 'haki123', '8e0cdbc8beefb35843dd2e835c5eee03', 'haki12@gmail.com', 'user', '2025-05-09 09:12:49'),
(14, 'gg', '202cb962ac59075b964b07152d234b70', 'EQ@ed', 'user', '2025-05-09 09:12:49'),
(16, 'zaka', 'e10adc3949ba59abbe56e057f20f883e', '112@d', 'user', '2025-05-09 09:12:49'),
(17, 'aa', 'e10adc3949ba59abbe56e057f20f883e', '32e@d', 'user', '2025-05-09 09:12:49'),
(18, 'c', 'e10adc3949ba59abbe56e057f20f883e', 'e2@e', 'user', '2025-05-09 09:12:49'),
(19, 'x', '202cb962ac59075b964b07152d234b70', 'rd@edqwaxzz', 'user', '2025-05-09 09:12:49'),
(20, 'q', '$2y$10$vpjQcoWWXTiyV5hpp9jZuOL9qbFMh4zwuncm4y/aSaVCjthYT9azq', '13@1', 'user', '2025-05-09 09:12:49'),
(21, 'y11', 'e10adc3949ba59abbe56e057f20f883e', '33@3434a', 'user', '2025-05-09 09:12:49'),
(22, 'bb', '202cb962ac59075b964b07152d234b70', '11!11@1122a2211', 'user', '2025-05-09 09:12:49'),
(23, 'bayu', '202cb962ac59075b964b07152d234b70', '11!@11', 'user', '2025-05-09 09:12:49'),
(24, 'wa', '202cb962ac59075b964b07152d234b70', 'muhammadbaehaqi12@gmail.com', 'user', '2025-05-09 11:03:46'),
(25, 'anam', 'e10adc3949ba59abbe56e057f20f883e', 'a@wsda', 'user', '2025-05-12 10:01:14'),
(26, 'aa', '4124bc0a9335c27f086f24ba207a4912', 'muhammadbaehaqi12@gmail.com', 'admin', '2025-05-12 10:35:52'),
(27, 'Molestiae veniam si', 'e10adc3949ba59abbe56e057f20f883e', 'jotebo@mailinator.com', 'user', '2025-05-20 12:51:25'),
(28, 'Quia quisquam ration', 'e10adc3949ba59abbe56e057f20f883e', 'suqyho@mailinator.com', 'user', '2025-05-20 12:52:38'),
(29, 'oin', 'e10adc3949ba59abbe56e057f20f883e', 'muxopefi@mailinator.com', 'user', '2025-05-29 12:14:10'),
(30, 'kk', 'e10adc3949ba59abbe56e057f20f883e', 'zevyriw@mailinator.com', 'user', '2025-05-29 12:30:05'),
(31, 'll', 'e10adc3949ba59abbe56e057f20f883e', 'coquc@mailinator.com', 'user', '2025-05-29 12:51:30'),
(32, 'pp', 'e10adc3949ba59abbe56e057f20f883e', 'hexyl@mailinator.com', 'user', '2025-05-29 13:00:13'),
(33, 'op', 'e10adc3949ba59abbe56e057f20f883e', 'hozon@mailinator.com', 'user', '2025-05-29 13:09:06'),
(34, 'haki', 'e10adc3949ba59abbe56e057f20f883e', 'zusaqy@mailinator.com', 'user', '2025-05-29 13:41:33'),
(35, 'op', 'e10adc3949ba59abbe56e057f20f883e', 'hozon@mailinator.com', 'user', '2025-05-29 13:53:07'),
(37, 'op11', 'e10adc3949ba59abbe56e057f20f883e', 'diji@mailinator13.com', 'user', '2025-05-29 15:03:06'),
(38, 'Vel nulla accusamus ', 'e10adc3949ba59abbe56e057f20f883e', 'kiromahiw@mailinator.com', 'user', '2025-06-08 11:27:12'),
(39, 'marina12', 'e10adc3949ba59abbe56e057f20f883e', 'marina12@mailinator.com', 'user', '2025-06-22 02:08:15'),
(40, 'hikmah', 'e10adc3949ba59abbe56e057f20f883e', 'hikmah1@gmail.com', 'user', '2025-06-24 07:37:38'),
(41, 'ko', 'e10adc3949ba59abbe56e057f20f883e', '111@111.com', 'user', '2025-06-24 09:29:46'),
(42, 'Odit quisquam ut per', 'e10adc3949ba59abbe56e057f20f883e', 'kadamahejo@mailinator.com', 'user', '2025-06-24 09:44:05'),
(43, 'Error ut ullam aliqu', 'e10adc3949ba59abbe56e057f20f883e', 'byhadol@mailinator.com', 'user', '2025-06-24 09:46:42'),
(44, 'Quibusdam eu sit do', 'e10adc3949ba59abbe56e057f20f883e', 'jitaq@mailinator.com', 'user', '2025-06-24 11:55:24'),
(45, 'Ut non facilis aut r', 'e10adc3949ba59abbe56e057f20f883e', 'lyky@mailinator.com', 'user', '2025-06-26 12:50:22'),
(46, 'Deleniti totam earum', 'e10adc3949ba59abbe56e057f20f883e', 'vararulane@mailinator.com', 'user', '2025-06-26 12:58:09'),
(47, 'Veniam consectetur', 'e10adc3949ba59abbe56e057f20f883e', 'finina@mailinator.com', 'user', '2025-06-26 13:28:14'),
(48, 'Aut in voluptates au', 'e10adc3949ba59abbe56e057f20f883e', 'hoqybar@mailinator.com', 'user', '2025-06-29 03:23:50'),
(49, 'Voluptatem adipisici', 'e10adc3949ba59abbe56e057f20f883e', 'kapovobe@mailinator.com', 'user', '2025-06-29 03:24:48'),
(50, 'Sed est rerum facili', 'e10adc3949ba59abbe56e057f20f883e', 'wexyqifufa@mailinator.com', 'user', '2025-06-29 03:27:17'),
(51, 'Eaque cupidatat ad l', 'e10adc3949ba59abbe56e057f20f883e', 'rovy@mailinator.com', 'user', '2025-06-29 03:44:18'),
(52, 'Ut voluptatibus dign', 'e10adc3949ba59abbe56e057f20f883e', 'putuvovuw@mailinator.com', 'user', '2025-06-29 03:50:24'),
(53, 'Voluptatem ut repudi', 'e10adc3949ba59abbe56e057f20f883e', 'moje@mailinator.com', 'user', '2025-06-29 03:51:00'),
(54, 'Et repudiandae sequi', 'e10adc3949ba59abbe56e057f20f883e', 'hybojufafa@mailinator.com', 'user', '2025-06-29 03:52:07'),
(55, 'Facere quis esse ve', 'e10adc3949ba59abbe56e057f20f883e', 'hedagezy@mailinator.com', 'user', '2025-06-29 03:57:31'),
(56, 'Cupiditate asperiore', 'e10adc3949ba59abbe56e057f20f883e', 'xesulavex@mailinator.com', 'user', '2025-06-29 04:17:14'),
(57, 'Sapiente magni est m', 'e10adc3949ba59abbe56e057f20f883e', 'mulew@mailinator.com', 'user', '2025-06-29 06:06:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengumuman_tayang`
--

CREATE TABLE `tb_pengumuman_tayang` (
  `id` int(11) NOT NULL,
  `id_pendaftaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pengumuman_tayang`
--

INSERT INTO `tb_pengumuman_tayang` (`id`, `id_pendaftaran`) VALUES
(15, 3),
(7, 10),
(8, 11),
(9, 13),
(10, 14),
(11, 15),
(12, 16),
(13, 17),
(4, 20),
(2, 21),
(3, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_persyaratan_program`
--

CREATE TABLE `tb_persyaratan_program` (
  `id` int(11) NOT NULL,
  `jenis` enum('umum','dokumen') NOT NULL,
  `isi` text NOT NULL,
  `program` enum('magang','engineering','tokutei') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_persyaratan_program`
--

INSERT INTO `tb_persyaratan_program` (`id`, `jenis`, `isi`, `program`) VALUES
(2, 'umum', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'magang'),
(3, 'dokumen', 'coba tes', 'magang'),
(4, 'dokumen', 'ciba', 'magang'),
(5, 'umum', 'aa', 'tokutei'),
(6, 'umum', 'avan', 'tokutei'),
(7, 'dokumen', 'afcew', 'tokutei'),
(8, 'dokumen', 'awdfaw', 'tokutei'),
(9, 'dokumen', 'awd', 'engineering'),
(10, 'dokumen', 'afwa', 'engineering'),
(11, 'dokumen', 'eafa', 'engineering'),
(12, 'umum', 'wafwa', 'engineering'),
(13, 'umum', 'wadaw', 'engineering'),
(14, 'umum', 'dewqewqwc\r\nedqd\r\n\r\nqeqf', 'engineering'),
(15, 'dokumen', '23\r\n23\r\n23', 'engineering');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profile_legalitas`
--

CREATE TABLE `tb_profile_legalitas` (
  `id_legalitas` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `nomor_surat` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_profile_legalitas`
--

INSERT INTO `tb_profile_legalitas` (`id_legalitas`, `judul`, `deskripsi`, `nomor_surat`, `logo`, `tanggal_upload`) VALUES
(9, 'wadaa', 'awdaaa', 'awdaa', 'Fujiyama.jpg', '2025-05-11 22:05:55'),
(11, '12', '12', '12', 'logo.png', '2025-05-11 22:06:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profile_pengurus`
--

CREATE TABLE `tb_profile_pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `nama_pengurus` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_profile_pengurus`
--

INSERT INTO `tb_profile_pengurus` (`id_pengurus`, `nama_pengurus`, `jabatan`, `deskripsi`, `foto`, `tanggal_upload`) VALUES
(2, 'awdcaw', 'qwa', 'wadqwa', 'wong gagah.jpg', '2025-05-11 11:16:49'),
(3, 'qawd', 'dawfde', 'awda', 'Selma.jpg', '2025-05-11 08:37:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profile_sambutan`
--

CREATE TABLE `tb_profile_sambutan` (
  `id` int(11) NOT NULL,
  `paragraf_1` text NOT NULL,
  `paragraf_2` text NOT NULL,
  `paragraf_3` text NOT NULL,
  `paragraf_4` text NOT NULL,
  `nama_kepala` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_profile_sambutan`
--

INSERT INTO `tb_profile_sambutan` (`id`, `paragraf_1`, `paragraf_2`, `paragraf_3`, `paragraf_4`, `nama_kepala`, `gambar`, `tanggal_upload`) VALUES
(4, 'wqd', 'qwd', 'qwd', 'qwd', 'Imam Joharudin', '1749221196_nihongjin.jpg', '2025-06-06 14:46:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profile_sejarah`
--

CREATE TABLE `tb_profile_sejarah` (
  `id` int(11) NOT NULL,
  `judul_atas` varchar(100) DEFAULT NULL,
  `judul_bawah` varchar(100) DEFAULT NULL,
  `judul_tengah` varchar(100) DEFAULT NULL,
  `paragraf1` text DEFAULT NULL,
  `paragraf2` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_profile_sejarah`
--

INSERT INTO `tb_profile_sejarah` (`id`, `judul_atas`, `judul_bawah`, `judul_tengah`, `paragraf1`, `paragraf2`, `gambar`, `tanggal_upload`) VALUES
(7, 'Sejarah', 'LPK AIKOKU TERPADU', 'LPK AIKOKU TERPADU', 'qwed', 'qwd', 'Fujiyama.jpg', '2025-06-06 21:37:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profile_visimisi`
--

CREATE TABLE `tb_profile_visimisi` (
  `id_visimisi` int(11) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `tanggal_upload` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_profile_visimisi`
--

INSERT INTO `tb_profile_visimisi` (`id_visimisi`, `visi`, `misi`, `tanggal_upload`) VALUES
(1, 'coba', 'ajwidajwfanwdkljadfghjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjadwad', '2025-05-11 16:11:49'),
(2, 'wqeq', '1.jahweuauwh \r\n2jjaqdjwiadio\r\nj213uiue4hq2ih1\r\n\r\nfeawe', '2025-05-11 16:12:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_album`
--
ALTER TABLE `tb_album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indeks untuk tabel `tb_beranda_fasilitas`
--
ALTER TABLE `tb_beranda_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `tb_beranda_keunggulan`
--
ALTER TABLE `tb_beranda_keunggulan`
  ADD PRIMARY KEY (`id_keunggulan`);

--
-- Indeks untuk tabel `tb_beranda_tentang_kami`
--
ALTER TABLE `tb_beranda_tentang_kami`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indeks untuk tabel `tb_beranda_testimoni`
--
ALTER TABLE `tb_beranda_testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indeks untuk tabel `tb_footer`
--
ALTER TABLE `tb_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_hero`
--
ALTER TABLE `tb_hero`
  ADD PRIMARY KEY (`id_hero`);

--
-- Indeks untuk tabel `tb_hero_album`
--
ALTER TABLE `tb_hero_album`
  ADD PRIMARY KEY (`id_hero`);

--
-- Indeks untuk tabel `tb_hero_kontak`
--
ALTER TABLE `tb_hero_kontak`
  ADD PRIMARY KEY (`id_hero`);

--
-- Indeks untuk tabel `tb_hero_pendaftaran`
--
ALTER TABLE `tb_hero_pendaftaran`
  ADD PRIMARY KEY (`id_hero`);

--
-- Indeks untuk tabel `tb_hero_pengumuman`
--
ALTER TABLE `tb_hero_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_hero_profile`
--
ALTER TABLE `tb_hero_profile`
  ADD PRIMARY KEY (`id_hero`);

--
-- Indeks untuk tabel `tb_hero_program`
--
ALTER TABLE `tb_hero_program`
  ADD PRIMARY KEY (`id_hero_program`);

--
-- Indeks untuk tabel `tb_informasi_kontak`
--
ALTER TABLE `tb_informasi_kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `tb_job`
--
ALTER TABLE `tb_job`
  ADD PRIMARY KEY (`id_job`);

--
-- Indeks untuk tabel `tb_job_detail`
--
ALTER TABLE `tb_job_detail`
  ADD PRIMARY KEY (`id_job_detail`);

--
-- Indeks untuk tabel `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`id_kontak`),
  ADD KEY `idx_date_sent` (`date_sent`);

--
-- Indeks untuk tabel `tb_kontak_maps`
--
ALTER TABLE `tb_kontak_maps`
  ADD PRIMARY KEY (`id_maps`);

--
-- Indeks untuk tabel `tb_kontak_masuk`
--
ALTER TABLE `tb_kontak_masuk`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `tb_logo`
--
ALTER TABLE `tb_logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indeks untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `idx_tanggal_daftar` (`tanggal_daftar`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_pengumuman_tayang`
--
ALTER TABLE `tb_pengumuman_tayang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indeks untuk tabel `tb_persyaratan_program`
--
ALTER TABLE `tb_persyaratan_program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_profile_legalitas`
--
ALTER TABLE `tb_profile_legalitas`
  ADD PRIMARY KEY (`id_legalitas`);

--
-- Indeks untuk tabel `tb_profile_pengurus`
--
ALTER TABLE `tb_profile_pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indeks untuk tabel `tb_profile_sambutan`
--
ALTER TABLE `tb_profile_sambutan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_profile_sejarah`
--
ALTER TABLE `tb_profile_sejarah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_profile_visimisi`
--
ALTER TABLE `tb_profile_visimisi`
  ADD PRIMARY KEY (`id_visimisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_album`
--
ALTER TABLE `tb_album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_beranda_fasilitas`
--
ALTER TABLE `tb_beranda_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_beranda_keunggulan`
--
ALTER TABLE `tb_beranda_keunggulan`
  MODIFY `id_keunggulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_beranda_tentang_kami`
--
ALTER TABLE `tb_beranda_tentang_kami`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_beranda_testimoni`
--
ALTER TABLE `tb_beranda_testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_footer`
--
ALTER TABLE `tb_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_hero`
--
ALTER TABLE `tb_hero`
  MODIFY `id_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_hero_album`
--
ALTER TABLE `tb_hero_album`
  MODIFY `id_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_hero_kontak`
--
ALTER TABLE `tb_hero_kontak`
  MODIFY `id_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_hero_pendaftaran`
--
ALTER TABLE `tb_hero_pendaftaran`
  MODIFY `id_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_hero_pengumuman`
--
ALTER TABLE `tb_hero_pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_hero_profile`
--
ALTER TABLE `tb_hero_profile`
  MODIFY `id_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_hero_program`
--
ALTER TABLE `tb_hero_program`
  MODIFY `id_hero_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_informasi_kontak`
--
ALTER TABLE `tb_informasi_kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_job`
--
ALTER TABLE `tb_job`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_job_detail`
--
ALTER TABLE `tb_job_detail`
  MODIFY `id_job_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kontak_maps`
--
ALTER TABLE `tb_kontak_maps`
  MODIFY `id_maps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_kontak_masuk`
--
ALTER TABLE `tb_kontak_masuk`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_logo`
--
ALTER TABLE `tb_logo`
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `tb_pengumuman_tayang`
--
ALTER TABLE `tb_pengumuman_tayang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_persyaratan_program`
--
ALTER TABLE `tb_persyaratan_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_profile_legalitas`
--
ALTER TABLE `tb_profile_legalitas`
  MODIFY `id_legalitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_profile_pengurus`
--
ALTER TABLE `tb_profile_pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_profile_sambutan`
--
ALTER TABLE `tb_profile_sambutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_profile_sejarah`
--
ALTER TABLE `tb_profile_sejarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_profile_visimisi`
--
ALTER TABLE `tb_profile_visimisi`
  MODIFY `id_visimisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pengumuman_tayang`
--
ALTER TABLE `tb_pengumuman_tayang`
  ADD CONSTRAINT `tb_pengumuman_tayang_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `tb_pendaftaran` (`id_pendaftaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
