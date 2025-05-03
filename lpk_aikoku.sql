-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2025 pada 07.40
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
-- Struktur dari tabel `hero_section`
--

CREATE TABLE `hero_section` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `subheading` varchar(255) NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(5, 'awdeaw', 'imam12@gmail.com', '123', '123', '123', '2025-04-24 14:22:46');

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
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_pendaftaran`, `nama_lengkap`, `nomor_pendaftaran`, `tempat_lahir`, `tanggal_lahir`, `usia`, `jenis_kelamin`, `agama`, `alamat_ktp`, `email`, `telepon`, `alamat`, `alamat_keluarga`, `telepon_keluarga`, `program`, `pendidikan_terakhir`, `pengalaman_kerja`, `status_pernikahan`, `tinggi_badan`, `berat_badan`, `pengalaman_jepang`, `penyakit_kronis`, `golongan_darah`, `status`, `tanggal_daftar`, `id_pengguna`) VALUES
(3, 'ZAKI', '2025-0001', '12', '0012-02-12', 1, 'Laki-laki', 'Konghucu', '12', '12@12', '12', 'ed', '2222', '222', 'Magang', 'S3', '22222', 'Menikah', 222, 22, 'Pemula', '22', '22', 'Lolos', '2025-04-24 22:07:39', NULL),
(4, 'qw', '2025-0002', 'qw', '0002-02-12', 1, 'Laki-laki', 'Buddha', '12qw', 'qw@qw', 'qw1', 'wqe1', '213e', '12e', 'Engineering', 'D3', '321', 'Janda/Duda', 21, 22, 'Pemula', '12', 'e', 'Lolos', '2025-04-24 22:07:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_pengguna` varchar(100) NOT NULL,
  `roles` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`, `email_pengguna`, `roles`) VALUES
(3, 'imam123', 'beeccdb438355c029a66dbec333fa1c8', 'imam12@gmail.com', 'admin'),
(4, 'haki123', '8e0cdbc8beefb35843dd2e835c5eee03', 'haki12@gmail.com', 'user'),
(9, 'ZAKI', 'cf4669715e01fe79f2b422ff700ffad0', '12@12', 'user'),
(10, 'awr', 'e5df30b242311b7d0621c7e77e5ef0a0', 'awr@12', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_pendaftaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hero_section`
--
ALTER TABLE `hero_section`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_album`
--
ALTER TABLE `tb_album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indeks untuk tabel `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hero_section`
--
ALTER TABLE `hero_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_album`
--
ALTER TABLE `tb_album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `tb_pendaftaran` (`id_pendaftaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
