-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2021 pada 22.57
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
  `jenis_penugasan` varchar(50) NOT NULL,
  `auditan_in` varchar(50) NOT NULL,
  `auditan_opd` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `pkpt` varchar(15) NOT NULL,
  `kf1` varchar(15) NOT NULL,
  `d1` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penugasan`
--

INSERT INTO `penugasan` (`id_penugasan`, `no_st`, `tgl_st`, `uraian_penugasan`, `jenis_penugasan`, `auditan_in`, `auditan_opd`, `status`, `pkpt`, `kf1`, `d1`) VALUES
(53, 'BPKP/01/002/2002', '2021-04-04', 'Contoh Uraian Penugasan', 'Audit', '9', '', 'Belum Direview', 'PKPT', 'KF1', 'D2'),
(55, 'BPKP/01/002/2002', '2021-04-05', 'Contoh yang k 2', 'Asistensi', '', '351', 'Belum Direview', 'Non PKPT', 'KF3', 'D1');

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
  MODIFY `id_penugasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
