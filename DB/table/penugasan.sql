-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Mar 2021 pada 20.03
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_poopiyohe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `penugasan`
--

CREATE TABLE `penugasan` (
  `id_penugasan` int(11) NOT NULL,
  `no_st` varchar(20) NOT NULL,
  `tgl_st` date NOT NULL,
  `uraian_penugasan` varchar(50) NOT NULL,
  `jenis_penugasan` varchar(15) NOT NULL,
  `auditan_in` varchar(50) NOT NULL,
  `auditan_opd` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `pkpt` varchar(15) NOT NULL,
  `kf1` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penugasan`
--

INSERT INTO `penugasan` (`id_penugasan`, `no_st`, `tgl_st`, `uraian_penugasan`, `jenis_penugasan`, `auditan_in`, `auditan_opd`, `status`, `pkpt`, `kf1`) VALUES
(34, 'BPKP/PROJEK/001/A1', '2021-03-26', 'Penugasan', 'Verifikasi', '', '240', 'Belum Divalidasi', 'PKPT', 'KF1'),
(35, 'TIWI001', '2021-03-27', 'TIWI CANTIK', 'Audit', '9', '-', 'Belum Divalidasi', 'PKPT', 'KF1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`id_penugasan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penugasan`
--
ALTER TABLE `penugasan`
  MODIFY `id_penugasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
