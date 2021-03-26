-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Mar 2021 pada 20.04
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
-- Struktur dari tabel `penugasan_auditor`
--

CREATE TABLE `penugasan_auditor` (
  `id_pa` int(11) NOT NULL,
  `id_penugasan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `peran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penugasan_auditor`
--

INSERT INTO `penugasan_auditor` (`id_pa`, `id_penugasan`, `id`, `peran`) VALUES
(63, 34, 8, 'Ketua Tim'),
(64, 34, 11, 'Pengendali Teknis'),
(65, 34, 10, 'Anggota Tim'),
(66, 35, 8, 'Ketua Tim'),
(67, 35, 13, 'Pembantu Penanggung Jawab'),
(68, 35, 10, 'Pengendali Teknis'),
(69, 35, 9, 'Anggota Tim');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `penugasan_auditor`
--
ALTER TABLE `penugasan_auditor`
  ADD PRIMARY KEY (`id_pa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penugasan_auditor`
--
ALTER TABLE `penugasan_auditor`
  MODIFY `id_pa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
