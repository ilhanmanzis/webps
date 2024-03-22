-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Mar 2024 pada 14.24
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `device`
--

CREATE TABLE `device` (
  `id_device` int(11) NOT NULL,
  `name_device` varchar(50) NOT NULL,
  `harga_perjam` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `device`
--

INSERT INTO `device` (`id_device`, `name_device`, `harga_perjam`, `jumlah`) VALUES
(16, 'PS 3', '7000', 6),
(19, 'PS 4', '12000', 5),
(20, 'PC', '8000', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `name_operator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id_operator`, `name_operator`) VALUES
(1, 'ilhan'),
(4, 'janggar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sift`
--

CREATE TABLE `sift` (
  `id_sift` int(11) NOT NULL,
  `name_sift` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sift`
--

INSERT INTO `sift` (`id_sift`, `name_sift`) VALUES
(1, 'Malam'),
(3, 'Pagi'),
(4, 'Sore');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `no_tv` varchar(50) DEFAULT NULL,
  `paket` varchar(50) DEFAULT NULL,
  `id_device` int(11) NOT NULL,
  `jam_mulai` varchar(50) NOT NULL,
  `jam_selesai` varchar(50) NOT NULL,
  `tambah_waktu` varchar(50) DEFAULT NULL,
  `harga_device` varchar(50) NOT NULL,
  `minuman_3k` varchar(50) DEFAULT NULL,
  `minuman_4k` varchar(50) DEFAULT NULL,
  `harga_minum` varchar(50) DEFAULT NULL,
  `total` varchar(50) NOT NULL,
  `bayar` varchar(50) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id_sift` int(11) NOT NULL,
  `id_operator` int(11) NOT NULL,
  `tambah_harga` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `no_tv`, `paket`, `id_device`, `jam_mulai`, `jam_selesai`, `tambah_waktu`, `harga_device`, `minuman_3k`, `minuman_4k`, `harga_minum`, `total`, `bayar`, `keterangan`, `id_sift`, `id_operator`, `tambah_harga`) VALUES
(25, '2024-03-17', '1', '1', 16, '11:11', '13:10', '0', '14000', '0', '0', '0', '14000', 'cash', 'Lunas', 1, 1, '0'),
(27, '2024-03-17', '1', '1', 19, '00:00', '01:00', '0', '12000', '0', '0', '0', '12000', 'cash', 'Lunas', 1, 1, '0'),
(28, '2024-03-17', '1', '1', 16, '00:00', '01:00', '0', '7000', '0', '0', '0', '7000', 'cash', 'Lunas', 1, 1, '0'),
(29, '2024-03-17', '2', '2', 16, '02:00', '03:00', '0', '7000', '0', '0', '0', '7000', 'cash', 'Lunas', 1, 1, '0'),
(30, '2024-03-17', '9', '9', 16, '00:00', '01:01', '0', '7000', '0', '0', '0', '7000', 'cash', 'Lunas', 1, 1, '0'),
(31, '2024-03-17', '3', '3', 16, '00:00', '01:01', '0', '7000', '0', '0', '0', '7000', 'cash', 'Lunas', 1, 1, '0'),
(32, '2024-03-17', '0', '9', 16, '00:00', '03:00', '0', '21000', '0', '0', '0', '21000', 'cash', 'Lunas', 1, 1, '0'),
(33, '2024-03-17', '09', '0', 16, '00:00', '08:00', '0', '56000', '0', '0', '0', '56000', 'cash', 'Lunas', 1, 1, '0'),
(34, '2024-03-17', '1', '1', 16, '11:00', '12:00', '0', '7000', '0', '0', '0', '7000', 'cash', 'Lunas', 1, 1, '0'),
(35, '2024-03-17', '2', '2', 16, '00:00', '01:00', '0', '7000', '9', '9', '63000', '70000', 'cash', 'Lunas', 1, 1, '0'),
(37, '2024-03-21', '2', '2', 16, '00:00', '01:00', '0', '7000', '0', '0', '0', '7000', 'qris', 'Lunas', 3, 4, '0'),
(38, '2024-03-21', '1', '1', 16, '00:00', '01:00', '0', '7000', '0', '0', '0', '7000', 'qris', 'Lunas', 1, 1, '0'),
(39, '2024-03-22', '9', '9', 19, '20:22', '09:09', '0', '150000', '9', '8', '59000', '209000', 'cash', 'Lunas', 1, 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id_device`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indeks untuk tabel `sift`
--
ALTER TABLE `sift`
  ADD PRIMARY KEY (`id_sift`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `device`
--
ALTER TABLE `device`
  MODIFY `id_device` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sift`
--
ALTER TABLE `sift`
  MODIFY `id_sift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
