-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Apr 2021 pada 10.13
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
-- Struktur dari tabel `temuan`
--

CREATE TABLE `temuan` (
  `id_temuan` int(11) NOT NULL,
  `id_penugasan` int(11) NOT NULL,
  `no_laporan` varchar(20) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `jenisnominal` varchar(50) NOT NULL,
  `isirupiah` varchar(20) NOT NULL,
  `saldo` varchar(100) NOT NULL,
  `hal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `temuan`
--

INSERT INTO `temuan` (`id_temuan`, `id_penugasan`, `no_laporan`, `tgl_laporan`, `kondisi`, `jenisnominal`, `isirupiah`, `saldo`, `hal`) VALUES
(51, 72, 'Nobis reprehenderit ', '2003-04-20', 'Reprehenderit commo', 'Rupiah', '20000000', '0', 'Sed do in blanditiis'),
(52, 72, 'Nobis reprehenderit ', '2003-04-20', 'kondisi', 'Non Rupiah', '', '0', 'halhahlahlahl');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `temuan`
--
ALTER TABLE `temuan`
  ADD PRIMARY KEY (`id_temuan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `temuan`
--
ALTER TABLE `temuan`
  MODIFY `id_temuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
