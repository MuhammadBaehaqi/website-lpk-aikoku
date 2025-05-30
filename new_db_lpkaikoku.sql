-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2025 pada 11.20
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
(2, 'kan', 'Pendidikan LPK', 'uploads/1745418317_jepang.jpg', '2025-04-23'),
(5, 'hkasdzxx', 'Tanda Tangan Kontrak', 'uploads/1745421241_471782679_1245106896748017_8469993405143907191_n.jpg', '2025-04-23'),
(6, '12345', 'Kelulusan Job', 'uploads/1745450377_afda.jpg', '2025-04-23'),
(11, 'aakdfazzdzzxx', 'Kelulusan Job', 'uploads/1745453668_abbas.jpg', '2025-04-24');

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
(1, 'fa-regular fa-money-bill-1', 'wadaaaaaaaaaa', 'awwwwwwaaaaaaaaaaaaaaa'),
(2, 'fas fa-graduation-cap', 'qawa', 'awdawd');

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
(1, 'fas fa-users', 'Lembaga Terpercaya', 'Sebagai lembaga pelatihan bahasa Jepang yang berkomitmen pada kualitas, LPK Aikoku Terpadu\r\n                            membatasi jumlah\r\n                            siswa di setiap kelas untuk memastikan perhatian penuh dan pembelajaran yang optimal bagi\r\n                            setiap peserta.', '2025-05-12 09:07:58'),
(2, 'fas fa-graduation-cap', 'Pengajar Berpengalaman', 'im pengajar profesional yang terdiri dari native speaker dan instruktur tersertifikasi, LPK Aikoku TERPADU memastikan setiap siswa mendapat pembelajaran berkualitas tinggi. Pengajar kami memiliki pengalaman dalam mengajar Bahasa Jepang dan siap membantu Anda mencapai kemahiran yang diinginkan.', '2025-05-12 09:08:19'),
(3, 'fas fa-book', 'Pelatihan Yang Singkat', 'Kami menawarkan program pelatihan yang efektif dan singkat, dirancang untuk mempersiapkan\r\n                            Anda dalam waktu\r\n                            singkat. Kurikulum kami mengikuti standar JLPT (Japanese Language Proficiency Test), dengan\r\n                            fokus pada\r\n                            kemampuan praktis yang mendukung kesiapan kerja.', '2025-05-12 10:52:30');

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
(10, 'LPK AIKOKU TERPADU', 'jadi gini', 'galery.jpg', '2025-05-12 08:54:34');

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
(2, 'hakia11', 'aaaaaa11aaaaa', '11', 'Selma.jpg', '2025-05-12 04:35:39'),
(3, 'aaaaa', 'aaaaaa', NULL, 'it-only-happens-in-motogp24.webp', '2025-05-12 04:35:49'),
(4, 'ZAK', 'aaaa', NULL, 'wong gagah.jpg', '2025-05-12 04:36:10');

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
(5, 'ww', 'ww', 'Fujiyama.jpg', '2025-05-10 14:26:14');

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
(5, '3wq', 'dqw3', 'Fujiyama.jpg', '2025-05-09 15:06:52');

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
(3, 'wa', 'wa', 'bg.jpg', '0000-00-00');

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
(4, 'aaa', 'aefaw', 'bg.jpg', '2025-05-15 13:42:06');

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
(5, 'LPK AIKOKU TERPADU', 'wadqad', 'bg.jpg', '2025-05-15 13:38:36');

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
(6, '', 'sa', 'sa', 'bg.jpg', 'magang', '2025-05-13 23:09:13'),
(8, '', 'as', 'ada', 'bg.jpg', 'engineering', '2025-05-13 23:10:14'),
(9, '', 'rsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaa', 'rsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaarsgaa', 'jpng.jpg', 'tokutei', '2025-05-13 23:10:33');

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
(5, 'awwwwww', 'aw@dfaw', 'aw2', '12', '12', 'de', '2025-05-09 13:49:41');

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
(7, 'wre', 'ana@gmail.com', 'f3', '3r', 'ef', '2025-05-09 08:51:35');

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
(9, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8166996517343!2d108.97572757419275!3d-6.912507667651758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fa5af84c2ae8d%3A0x6d0eb4890eba578f!2sLPK%20AIKOKU%20TERPADU!5e0!3m2!1sid!2sid!4v1746803766047!5m2!1sid!2sid', '2025-05-09 22:50:05');

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
-- Struktur dari tabel `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
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
  `pendidikan_terakhir` varchar(50) DEFAULT NULL,
  `pengalaman_kerja` text DEFAULT NULL,
  `status_pernikahan` varchar(50) DEFAULT NULL,
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

INSERT INTO `tb_pendaftaran` (`id_pendaftaran`, `nama_lengkap`, `nomor_pendaftaran`, `tempat_lahir`, `tanggal_lahir`, `usia`, `jenis_kelamin`, `agama`, `alamat_ktp`, `email`, `telepon`, `alamat`, `alamat_keluarga`, `telepon_keluarga`, `program`, `pendidikan_terakhir`, `pengalaman_kerja`, `status_pernikahan`, `tinggi_badan`, `berat_badan`, `pengalaman_jepang`, `penyakit_kronis`, `golongan_darah`, `status`, `tanggal_daftar`, `id_pengguna`, `pengumuman`) VALUES
(3, 'ZAKI', '2025-0001', '12', '0000-00-00', 1, 'Laki-laki', 'Islam', '12', '12@12', '12', 'ed', '2222', '222', 'Magang', 'S3', '22222', 'Menikah', 222, 22, 'Pemula', '22', '22', 'Lolos', '2025-04-24 22:07:39', NULL, NULL),
(4, 'qw', '2025-0002', 'qw', '0002-02-12', 1, 'Laki-laki', 'Buddha', '12qw', 'qw@qw', 'qw1', 'wqe1', '213e', '12e', 'Engineering', 'D3', '321', 'Janda/Duda', 21, 22, 'Pemula', '12', 'e', 'Lolos', '2025-04-24 22:07:39', NULL, ''),
(5, 'intan', '2025005', '12', '1222-12-12', 12, 'Perempuan', 'Islam', 'aewr', '12@12', '231', '34qeq', '3qr', 'q34ed', 'Engineering', 'S2', 'qr43', 'Belum Menikah', 12, 12, 'Pemula', '24', 'ew2', 'Pending', '2025-05-05 21:51:39', NULL, NULL),
(6, 'intan', '2025006', '12', '1222-12-12', 12, 'Perempuan', 'Islam', 'aewr', '12@12', '231', '34qeq', '3qr', 'q34ed', 'Engineering', 'S2', 'qr43', 'Belum Menikah', 12, 12, 'Pemula', '24', 'ew2', 'Pending', '2025-05-05 21:51:53', NULL, NULL),
(7, 'intan', '2025007', '12', '1222-12-12', 12, 'Perempuan', 'Islam', 'aewr', '12@12', '231', '34qeq', '3qr', 'q34ed', 'Engineering', 'S2', 'qr43', 'Belum Menikah', 12, 12, 'Pemula', '24', 'ew2', 'Pending', '2025-05-05 21:51:53', NULL, NULL),
(8, 'intan', '2025008', '12', '1222-12-12', 12, 'Perempuan', 'Islam', 'aewr', '12@12', '231', '34qeq', '3qr', 'q34ed', 'Engineering', 'S2', 'qr43', 'Belum Menikah', 12, 12, 'Pemula', '24', 'ew2', 'Pending', '2025-05-05 21:53:12', NULL, NULL),
(9, 'intan', '2025009', '12', '1222-12-12', 12, 'Perempuan', 'Islam', 'aewr', '12@12', '231', '34qeq', '3qr', 'q34ed', 'Engineering', 'S2', 'qr43', 'Belum Menikah', 12, 12, 'Pemula', '24', 'ew2', 'Pending', '2025-05-05 21:53:22', NULL, NULL),
(10, 'aan', '2025010', '123', '0003-03-12', 12, 'Laki-laki', 'Hindu', 'eq2', '12@12', '12', '12', '12', '12', 'Magang', 'S1', '12', 'Janda/Duda', 12, 12, 'Pemula', '12dqaw', 'dqw', 'Lolos', '2025-05-05 21:57:07', NULL, NULL),
(11, 'ek', '2025011', '12', '1222-12-12', 12, 'Laki-laki', 'Islam', '12e', '12e@dq', '21d', '12', '12', '12', 'Magang', 'S2', '12', 'Menikah', 12, 12, 'Pemula', '12', '12', 'Tidak Lolos', '2025-05-05 22:09:12', NULL, NULL),
(13, 'gg', '2025013', '12', '1211-12-12', 12, 'Laki-laki', 'Kristen', '', 'EQ@edac', '12', '12', '12', '222', 'Tokutei Ginou', 'S1', '123e', 'Menikah', 12, 12, 'Pemula', 'f', '3', 'Lolos', '2025-05-05 22:46:11', NULL, 'oke apakah bisa masuk dan berjalan normal ,tes tes '),
(14, 'zaka', '2025014', '11', '0000-00-00', 121, 'Laki-laki', 'Islam', '', '112@dc', '11', '12', '12', '11', 'Engineering', 'S3', 'ed', 'Janda/Duda', 12, 12, 'Pemula', '12d', '1', 'Lolos', '2025-05-07 20:32:06', NULL, ''),
(15, 'aa', '2025015', 'aa', '0012-12-12', 12, 'Laki-laki', 'Buddha', '21', '32e@d', '32', 'e2', '23', 'q32', 'Magang', 'S3', '32', 'Belum Menikah', 1, 12, 'Ex-Jepang', '2e', 'd', 'Lolos', '2025-05-07 21:14:58', NULL, ''),
(16, 'c', '2025016', '12xxq', '1111-11-11', 1, 'Laki-laki', 'Islam', '', 'e2@ea', 'e211a', '12311aq', '23xxq', '213a', 'Magang', 'MTS', 'qr43', 'Belum Menikah', 1, 12, 'Pemula', '12e', '2e', 'Lolos', '2025-05-07 22:03:42', NULL, ''),
(17, 'x', '2025017', '22', '2222-02-22', 22, 'Perempuan', 'Islam', '22', 'rd@edqwaxzz22', '22', '22', '22', '2rq222', 'Magang', 'SMP2', '2qr', 'Belum M2enikah', 21, 122, 'Ex-Jepang2', '1er2', '1rd2', 'Lolos', '2025-05-07 22:52:31', NULL, 'namanya coba'),
(18, 'q', '2025018', 'q', '1111-11-11', 1, 'Perempuan', 'Kristen', '1w3', '13@1', 'd13r12', '123', '12', '12', 'Magang', 'S2', '2', 'Menikah', 12, 34, 'Pemula', '1', 'fd', 'Lolos', '2025-05-08 06:18:44', NULL, ''),
(19, 'y2', '2025019', '33a2', '0333-03-31', 332, 'Laki-laki', 'Katolik', '22', '33@3434a21111', '3aa22', '33aa2', '33aa22', '33aa2', 'Engineering22', 'S3', '3322', 'Belum Menikah22', 3322, 3322, 'Ex-Jepang22', '3322', '3322', 'Lolos', '2025-05-08 13:45:48', NULL, ''),
(20, 'bb', '2025020', '11222211rf11', '1111-11-11', 11, 'Perempuan', 'Islam', '11', '11!11@1122a2211', '1122', '1122', '1122', '1122', 'Engineering', 'S2', '11', 'Menikah', 11, 11, 'Pemula', '11', '11', 'Lolos', '2025-05-08 14:02:56', NULL, 'COBAAAAA'),
(21, 'bayu', '2025021', 'bREBES', '1111-11-11', 11, 'Laki-laki', 'Konghucu', '11', '11!@11', '11', '11', '11', '11', 'Engineering', 'S3', '11', 'Menikah', 1, 1, 'Pemula', '1212', '11', 'Tidak Lolos', '2025-05-08 15:40:50', NULL, ''),
(22, 'anam', '2025022', '121', '1111-11-11', 12, 'Perempuan', 'Kristen', 'a', 'a@wsda', 'aw', 'aa', '21ed', 'de12', 'Magang', 'MI', 'a2eq', 'Menikah', 12, 12, 'Pemula', 'cfa', 'aw31', 'Tidak Lolos', '2025-05-12 17:01:14', NULL, ''),
(23, 'Molestiae veniam si', '2025023', 'Nesciunt non ut pro', '1991-12-28', 63, 'Laki-laki', 'Buddha', 'Maxime id voluptas u', 'jotebo@mailinator.com', 'Voluptatem et ut har', 'Veniam impedit eaq', 'Molestiae perspiciat', 'Consectetur enim Na', 'Engineering', 'D3', 'Doloribus non pariat', 'Belum Menikah', 33, 14, 'Pemula', 'Voluptate nihil comm', 'Id ex', 'Pending', '2025-05-20 19:51:25', NULL, NULL),
(24, 'Quia quisquam ration', '2025024', 'Culpa ea consequat', '2010-08-05', 95, 'Perempuan', 'Konghucu', 'Ut perspiciatis qui', 'suqyho@mailinator.com', 'Reiciendis lorem in ', 'Iusto sed Nam omnis ', 'Occaecat quo velit q', 'Qui cum ut delectus', 'Magang', 'D3', 'Aperiam vel et disti', 'Belum Menikah', 33, 96, 'Ex-Jepang', 'Commodi laboriosam ', 'Volup', 'Tidak Lolos', '2025-05-20 19:52:38', NULL, ''),
(25, 'oin', '2025025', 'Eu fugit distinctio', '2000-04-05', 54, 'Laki-laki', 'Konghucu', 'Fugiat aut dolores ', 'muxopefi@mailinator.com', 'Hic harum quo placea', 'Nobis illum delenit', 'Qui commodo tempor n', 'Ea quo officia porro', 'Engineering', 'SMK', 'Possimus velit ut ', 'Menikah', 54, 46, 'Pemula', 'Sit neque quae ut i', 'Nihil', 'Lolos', '2025-05-29 19:14:10', NULL, ''),
(26, 'oin', '2025026', 'Eius incidunt asper', '2011-12-12', 81, 'Perempuan', 'Hindu', 'Optio assumenda iru', 'catysutoz@mailinator.com', 'Aut non sunt nesciu', 'Fugit aut id commod', 'Explicabo Sunt qui', 'Odit vero anim rerum', 'Magang', 'SD', 'Ut cupidatat adipisc', 'Belum Menikah', 51, 57, 'Ex-Jepang', 'Nihil rerum omnis la', 'Quia ', 'Tidak Lolos', '2025-05-29 19:15:04', NULL, ''),
(27, 'kk', '2025027', 'Sed saepe irure duis', '2019-02-10', 53, 'Perempuan', 'Hindu', 'Molestias pariatur ', 'zevyriw@mailinator.com', 'Veniam odio perspic', 'Veniam non consequa', 'Et incidunt pariatu', 'Dolore maiores est d', 'Tokutei Ginou', 'SMA', 'Ut et ab vel iusto n', 'Janda/Duda', 50, 41, 'Ex-Jepang', 'Dolore nostrum debit', 'Est r', 'Tidak Lolos', '2025-05-29 19:30:05', NULL, ''),
(28, 'kk', '2025028', 'Duis expedita nisi e', '2013-04-08', 4, 'Perempuan', 'Islam', 'Quis veniam in quis', 'cahaxome@mailinator.com', 'Sed accusamus ex ver', 'Voluptas odit conseq', 'Earum non blanditiis', 'Recusandae Perspici', 'Engineering', 'D3', 'Esse in nostrum debi', 'Janda/Duda', 38, 13, 'Ex-Jepang', 'Qui sint impedit se', 'Quam ', 'Lolos', '2025-05-29 19:30:14', NULL, ''),
(29, 'll', '2025029', 'Qui voluptate est c', '1986-10-07', 5, 'Laki-laki', 'Konghucu', 'Pariatur Aute accus', 'coquc@mailinator.com', 'A minim est recusand', 'Ut quos enim facere ', 'Praesentium sit dolo', 'Aperiam nesciunt co', 'Tokutei Ginou', 'MTS', 'Eos deserunt minim ', 'Menikah', 32, 24, 'Pemula', 'Exercitation odio di', 'Volup', 'Lolos', '2025-05-29 19:51:30', NULL, ''),
(30, 'll', '2025030', 'Debitis nostrum null', '1982-02-08', 8, 'Laki-laki', 'Katolik', 'Eum numquam qui saep', 'symilukyby@mailinator.com', 'Qui error deserunt q', 'Eum eos sit archit', 'Voluptatem facilis ', 'Rem quis modi qui il', 'Magang', 'SD', 'Dignissimos dolorem ', 'Belum Menikah', 85, 64, 'Pemula', 'Quibusdam a aliquam ', 'Paria', 'Lolos', '2025-05-29 19:51:40', NULL, ''),
(31, 'pp', '2025031', 'Nulla culpa id vol', '1970-03-21', 83, 'Perempuan', 'Islam', 'Ut nihil id sapient', 'hexyl@mailinator.com', 'Exercitation eos est', 'Impedit et fugit n', 'Quisquam in quod vol', 'Id quod laudantium', 'Engineering', 'ALIYAH', 'Nulla nobis impedit', 'Janda/Duda', 80, 72, 'Pemula', 'Et blanditiis ullamc', 'Est n', 'Lolos', '2025-05-29 20:00:13', NULL, ''),
(32, 'op', '2025032', 'Dicta voluptatibus i11111', '2025-09-17', 6, 'Laki-laki', 'Buddha', 'Ex accusamus molesti', 'hozon@mailinator.com', 'Iste distinctio Sin', 'Necessitatibus quia ', 'Est laborum consect', 'Error ut velit quod ', 'Engineering', 'MTS', 'Quod molestiae sed d', 'Menikah', 86, 40, 'Pemula', 'Eiusmod rerum ut non', 'Reici', 'Lolos', '2025-05-29 20:09:06', NULL, ''),
(34, 'haki', '2025034', 'Rerum quas tempore ', '1978-07-04', 14, 'Perempuan', 'Buddha', 'Non excepteur facere', 'zusaqy@mailinator.com', 'Est quod atque mini', 'Quia excepteur volup', 'Irure consectetur es', 'Omnis voluptatem dol', 'Engineering', 'S2', 'Esse et consectetur', 'Belum Menikah', 82, 33, 'Ex-Jepang', 'Ipsam adipisicing si', 'Labor', 'Pending', '2025-05-29 20:41:33', NULL, NULL),
(36, 'op', '2025035', 'Quasi necessitatibus12', '2002-11-13', 11, 'Laki-laki', 'Buddha', 'Veniam mollitia vol', 'diji@mailinator.com', 'Vel doloribus dolor ', 'Delectus adipisci o', 'Dicta optio et sequ', 'Nisi molestiae ut de', 'Magang', 'SD', 'Ut aut odit incididu', 'Belum Menikah', 80, 31, 'Pemula', 'Aperiam commodi dolo', 'Volup', 'Tidak Lolos', '2025-05-29 22:02:53', NULL, '');

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
(3, 'imam123', '202cb962ac59075b964b07152d234b70', 'imam124@gmail.com', 'admin', '2025-05-09 09:12:49'),
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
(37, 'op', 'e10adc3949ba59abbe56e057f20f883e', 'diji@mailinator.com', 'user', '2025-05-29 15:03:06');

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
(14, 3),
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
(13, 'umum', 'wadaw', 'engineering');

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
(10, 'aa', 'aa', 'aa', '20210326081152479_edf52dcf51054adf948dcdd713829aba.jpg', '2025-05-11 22:06:22'),
(11, 'aaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa', 'shanks.jpg', '2025-05-11 22:06:49');

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
(3, 'qawd', 'dawfde', 'awda', 'Selma.jpg', '2025-05-11 08:37:49'),
(5, 'awad', 'awdaw', 'awda', '20210326081152479_edf52dcf51054adf948dcdd713829aba.jpg', '2025-05-11 10:18:06');

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
(1, 'awfad', 'CIBVAuhae', 'HAFDUHAUWHDUAHDCUIOHIO', 'IAJEFIOAIWHDIH', 'AWDOHAIHWDHI', 'Selma.jpg', '2025-05-10 15:20:24'),
(2, 'wafawf', 'awdfacaw', 'awdaw', 'wadaw', 'wafcfawfaw', 'Selma.jpg', '2025-05-10 15:52:31'),
(3, 'wada', 'fawdb', '11', '11', 'Imam Joharudin', 'wong gagah.jpg', '2025-05-10 16:04:19');

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
(5, 'swda', 'awdawd', 'awd', 'wada', 'dwad', '20210326081152479_edf52dcf51054adf948dcdd713829aba.jpg', '2025-05-10 22:53:44');

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
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_beranda_fasilitas`
--
ALTER TABLE `tb_beranda_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_beranda_keunggulan`
--
ALTER TABLE `tb_beranda_keunggulan`
  MODIFY `id_keunggulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_beranda_tentang_kami`
--
ALTER TABLE `tb_beranda_tentang_kami`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_beranda_testimoni`
--
ALTER TABLE `tb_beranda_testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_footer`
--
ALTER TABLE `tb_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_hero_album`
--
ALTER TABLE `tb_hero_album`
  MODIFY `id_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_hero_kontak`
--
ALTER TABLE `tb_hero_kontak`
  MODIFY `id_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_hero_pendaftaran`
--
ALTER TABLE `tb_hero_pendaftaran`
  MODIFY `id_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_hero_pengumuman`
--
ALTER TABLE `tb_hero_pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_hero_profile`
--
ALTER TABLE `tb_hero_profile`
  MODIFY `id_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_hero_program`
--
ALTER TABLE `tb_hero_program`
  MODIFY `id_hero_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_informasi_kontak`
--
ALTER TABLE `tb_informasi_kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kontak_maps`
--
ALTER TABLE `tb_kontak_maps`
  MODIFY `id_maps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kontak_masuk`
--
ALTER TABLE `tb_kontak_masuk`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_pengumuman_tayang`
--
ALTER TABLE `tb_pengumuman_tayang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_persyaratan_program`
--
ALTER TABLE `tb_persyaratan_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_profile_legalitas`
--
ALTER TABLE `tb_profile_legalitas`
  MODIFY `id_legalitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_profile_pengurus`
--
ALTER TABLE `tb_profile_pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_profile_sambutan`
--
ALTER TABLE `tb_profile_sambutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_profile_sejarah`
--
ALTER TABLE `tb_profile_sejarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
