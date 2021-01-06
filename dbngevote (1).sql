-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2021 pada 01.07
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbngevote`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_calon`
--

CREATE TABLE `tb_calon` (
  `id_calon` varchar(2) NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `foto_calon` varchar(200) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_calon`
--

INSERT INTO `tb_calon` (`id_calon`, `nama_calon`, `foto_calon`, `visi`, `misi`) VALUES
('1', 'Bagus Miftah', '5ff45d87c28f2.jpg', 'Mempererat tenggang rasa antara teman seangkatan-seperjuangan', '<p>1. Baik kepada sesama</p><p>2. Tidak pelit informasi</p>'),
('2', 'Muklis Rahman', '5ff46170d7c6a.jpg', 'Menyadarkan pentingnya hidup sehat guna meningkatkan kualitas belajar', '<p>1. Olahraga seminggu sekali</p><p>2. Traktir salad tiap hari</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` enum('Administrator','Panitia','Pemilih') NOT NULL,
  `status` enum('1','0') NOT NULL,
  `jenis` enum('ADM','PAN','PST','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`, `status`, `jenis`) VALUES
(15, 'Rizky', '5181311006', 'rizky01', 'Administrator', '1', 'ADM'),
(21, 'Tanti', '5181311015', '12345', 'Panitia', '1', 'PAN'),
(22, 'Tatra', '5161311021', 'tatra01', 'Panitia', '1', 'PAN'),
(23, 'Awalif', '5181311023', '5589', 'Pemilih', '0', 'PST'),
(24, 'Catur', '5181311001', '2651', 'Pemilih', '0', 'PST'),
(25, 'Rifqi', '5181311003', '5908', 'Pemilih', '1', 'PST'),
(26, 'Damee', '5181311002', '5008', 'Pemilih', '0', 'PST'),
(27, 'Wahyu', '5181311024', '2390', 'Pemilih', '0', 'PST'),
(28, 'Melin', '5181311013', '3085', 'Pemilih', '0', 'PST'),
(29, 'Wuni', '5181311014', '6936', 'Pemilih', '0', 'PST'),
(30, 'Adiska', '5181311004', '1169', 'Pemilih', '0', 'PST'),
(31, 'Nanda', '5181311020', '9064', 'Pemilih', '1', 'PST'),
(32, 'Irawan', '5181311008', '8336', 'Pemilih', '0', 'PST');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_vote`
--

CREATE TABLE `tb_vote` (
  `id_vote` int(11) NOT NULL,
  `id_calon` varchar(2) NOT NULL,
  `id_pemilih` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_vote`
--

INSERT INTO `tb_vote` (`id_vote`, `id_calon`, `id_pemilih`, `waktu`) VALUES
(12, '1', 23, '2021-01-05 13:32:42'),
(13, '1', 24, '2021-01-05 13:46:47'),
(14, '1', 30, '2021-01-05 13:50:51'),
(15, '1', 26, '2021-01-05 13:52:33'),
(16, '1', 28, '2021-01-05 13:52:55'),
(17, '1', 29, '2021-01-05 13:59:25'),
(18, '1', 27, '2021-01-05 14:05:01'),
(19, '1', 32, '2021-01-05 17:54:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_calon`
--
ALTER TABLE `tb_calon`
  ADD PRIMARY KEY (`id_calon`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_vote`
--
ALTER TABLE `tb_vote`
  ADD PRIMARY KEY (`id_vote`),
  ADD UNIQUE KEY `id_pemilih` (`id_pemilih`),
  ADD KEY `id_calon` (`id_calon`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tb_vote`
--
ALTER TABLE `tb_vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_vote`
--
ALTER TABLE `tb_vote`
  ADD CONSTRAINT `tb_vote_ibfk_1` FOREIGN KEY (`id_pemilih`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_vote_ibfk_2` FOREIGN KEY (`id_calon`) REFERENCES `tb_calon` (`id_calon`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
