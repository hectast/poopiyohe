-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2021 pada 19.49
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
-- Struktur dari tabel `surat_tuntas`
--

CREATE TABLE `surat_tuntas` (
  `id` int(11) NOT NULL,
  `id_penugasan` int(11) NOT NULL,
  `nomor_surat` varchar(20) NOT NULL,
  `tgl_surat` date NOT NULL,
  `surat_tuntas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_tuntas`
--

INSERT INTO `surat_tuntas` (`id`, `id_penugasan`, `nomor_surat`, `tgl_surat`, `surat_tuntas`) VALUES
(7, 62, 'Dolor praesentium lo', '1973-08-06', '1619019248.5087608045f07c303.pdf');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `surat_tuntas`
--
ALTER TABLE `surat_tuntas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `surat_tuntas`
--
ALTER TABLE `surat_tuntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
