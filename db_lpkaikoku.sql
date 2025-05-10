-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2025 pada 11.32
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
-- Struktur dari tabel `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `footer_deskripsi` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `menu_beranda_link` varchar(255) DEFAULT NULL,
  `menu_profil_link` varchar(255) DEFAULT NULL,
  `menu_album_link` varchar(255) DEFAULT NULL,
  `menu_pengumuman_link` varchar(255) DEFAULT NULL,
  `menu_kontak_link` varchar(255) DEFAULT NULL,
  `program_tokutei_link` varchar(255) DEFAULT NULL,
  `program_magang_link` varchar(255) DEFAULT NULL,
  `program_engineering_link` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `jam_kerja_weekdays` varchar(50) DEFAULT NULL,
  `jam_kerja_sabtu` varchar(50) DEFAULT NULL,
  `jam_kerja_minggu` varchar(50) DEFAULT NULL,
  `google_maps` text DEFAULT NULL,
  `copyright` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hero_pengumuman`
--

CREATE TABLE `hero_pengumuman` (
  `id` int(11) NOT NULL,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_description` varchar(255) DEFAULT NULL,
  `hero_image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hero_pengumuman`
--

INSERT INTO `hero_pengumuman` (`id`, `hero_title`, `hero_description`, `hero_image`, `created_at`) VALUES
(3, 'wa', 'aw', 'ttd.png', '2025-05-09 12:00:53');

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
(1, 'awadaw', 'awdaw@ahd', 'edq', 'dasr', 'aef', '2025-04-24 13:22:29'),
(2, 'aw', 'muhammadbaehaqi12@gmail.com', '21', 'qef', 'fa', '2025-04-24 13:25:45'),
(5, 'awdeaw', 'imam12@gmail.com', '123', '123', '123', '2025-04-24 14:22:46'),
(6, 'aer', 'aew2@dq', 'awr', 'awr', 'awerfc', '2025-05-09 08:24:38'),
(7, 'wre', 'ana@gmail.com', 'f3', '3r', 'ef', '2025-05-09 08:51:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_maps`
--

CREATE TABLE `tb_maps` (
  `id_maps` int(11) NOT NULL,
  `maps_url` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_maps`
--

INSERT INTO `tb_maps` (`id_maps`, `maps_url`, `created_at`) VALUES
(9, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8166996517343!2d108.97572757419275!3d-6.912507667651758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fa5af84c2ae8d%3A0x6d0eb4890eba578f!2sLPK%20AIKOKU%20TERPADU!5e0!3m2!1sid!2sid!4v1746803766047!5m2!1sid!2sid', '2025-05-09 22:50:05');

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
(4, 'qw', '2025-0002', 'qw', '0002-02-12', 1, 'Laki-laki', 'Buddha', '12qw', 'qw@qw', 'qw1', 'wqe1', '213e', '12e', 'Engineering', 'D3', '321', 'Janda/Duda', 21, 22, 'Pemula', '12', 'e', 'Lolos', '2025-04-24 22:07:39', NULL, NULL),
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
(20, 'bb', '2025020', '1122', '2222-02-22', 11, 'Perempuan', 'Islam', '11', '11!11@1122', '1122', '1122', '1122', '1122', 'Engineering', 'S2', '11', 'Menikah', 11, 11, 'Pemula', '11', '11', 'Lolos', '2025-05-08 14:02:56', NULL, 'COBAAAAA'),
(21, 'bayu', '2025021', 'bREBES', '1111-11-11', 11, 'Laki-laki', 'Konghucu', '11', '11!@11', '11', '11', '11', '11', 'Engineering', 'S3', '11', 'Menikah', 1, 1, 'Pemula', '1212', '11', 'Lolos', '2025-05-08 15:40:50', NULL, '');

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
(3, 'imam123', 'beeccdb438355c029a66dbec333fa1c8', 'imam12@gmail.com', 'admin', '2025-05-09 09:12:49'),
(4, 'haki123', '8e0cdbc8beefb35843dd2e835c5eee03', 'haki12@gmail.com', 'user', '2025-05-09 09:12:49'),
(14, 'gg', '202cb962ac59075b964b07152d234b70', 'EQ@ed', 'user', '2025-05-09 09:12:49'),
(16, 'zaka', 'e10adc3949ba59abbe56e057f20f883e', '112@d', 'user', '2025-05-09 09:12:49'),
(17, 'aa', 'e10adc3949ba59abbe56e057f20f883e', '32e@d', 'user', '2025-05-09 09:12:49'),
(18, 'c', 'e10adc3949ba59abbe56e057f20f883e', 'e2@e', 'user', '2025-05-09 09:12:49'),
(19, 'x', '202cb962ac59075b964b07152d234b70', 'rd@edqwaxzz', 'user', '2025-05-09 09:12:49'),
(20, 'q', '$2y$10$vpjQcoWWXTiyV5hpp9jZuOL9qbFMh4zwuncm4y/aSaVCjthYT9azq', '13@1', 'user', '2025-05-09 09:12:49'),
(21, 'y11', 'e10adc3949ba59abbe56e057f20f883e', '33@3434a', 'user', '2025-05-09 09:12:49'),
(22, 'bb', '202cb962ac59075b964b07152d234b70', '11!11@1122', 'user', '2025-05-09 09:12:49'),
(23, 'bayu', '202cb962ac59075b964b07152d234b70', '11!@11', 'user', '2025-05-09 09:12:49'),
(24, 'wa', '202cb962ac59075b964b07152d234b70', 'muhammadbaehaqi12@gmail.com', 'user', '2025-05-09 11:03:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hero_pengumuman`
--
ALTER TABLE `hero_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_album`
--
ALTER TABLE `tb_album`
  ADD PRIMARY KEY (`id_album`);

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
-- Indeks untuk tabel `tb_maps`
--
ALTER TABLE `tb_maps`
  ADD PRIMARY KEY (`id_maps`);

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hero_pengumuman`
--
ALTER TABLE `hero_pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_album`
--
ALTER TABLE `tb_album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT untuk tabel `tb_maps`
--
ALTER TABLE `tb_maps`
  MODIFY `id_maps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
