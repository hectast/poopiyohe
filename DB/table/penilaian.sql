-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2021 pada 07.44
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
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_penugasan` int(11) NOT NULL,
  `tgl_nilai` date NOT NULL,
  `q1` varchar(11) NOT NULL,
  `q2` varchar(11) NOT NULL,
  `q3` varchar(11) NOT NULL,
  `q4` varchar(11) NOT NULL,
  `q5` varchar(11) NOT NULL,
  `q6` varchar(11) NOT NULL,
  `q7` varchar(11) NOT NULL,
  `q8` varchar(11) NOT NULL,
  `q9` varchar(11) NOT NULL,
  `q10` varchar(11) NOT NULL,
  `q11` varchar(11) NOT NULL,
  `q12` varchar(11) NOT NULL,
  `q13` varchar(11) NOT NULL,
  `q14` varchar(11) NOT NULL,
  `q15` varchar(11) NOT NULL,
  `q16` varchar(11) NOT NULL,
  `q17` varchar(11) NOT NULL,
  `q18` varchar(11) NOT NULL,
  `q19` varchar(11) NOT NULL,
  `q20` varchar(11) NOT NULL,
  `ic` varchar(11) NOT NULL,
  `te` varchar(11) NOT NULL,
  `er` varchar(11) NOT NULL,
  `il` varchar(11) NOT NULL,
  `om` varchar(11) NOT NULL,
  `ct` varchar(11) NOT NULL,
  `dc` varchar(11) NOT NULL,
  `rf` varchar(11) NOT NULL,
  `ir` varchar(11) NOT NULL,
  `trad` varchar(11) NOT NULL,
  `sya` varchar(11) NOT NULL,
  `bia` varchar(11) NOT NULL,
  `wak` varchar(11) NOT NULL,
  `kom` varchar(11) NOT NULL,
  `psm` varchar(11) NOT NULL,
  `per` varchar(11) NOT NULL,
  `pro` varchar(11) NOT NULL,
  `sar` varchar(11) NOT NULL,
  `smp` varchar(11) NOT NULL,
  `pnrb` varchar(11) NOT NULL,
  `prf` varchar(11) NOT NULL,
  `itg` varchar(11) NOT NULL,
  `orp` varchar(11) NOT NULL,
  `nur` varchar(11) NOT NULL,
  `ind` varchar(11) NOT NULL,
  `res` varchar(11) NOT NULL,
  `pion` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_penugasan`, `tgl_nilai`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `ic`, `te`, `er`, `il`, `om`, `ct`, `dc`, `rf`, `ir`, `trad`, `sya`, `bia`, `wak`, `kom`, `psm`, `per`, `pro`, `sar`, `smp`, `pnrb`, `prf`, `itg`, `orp`, `nur`, `ind`, `res`, `pion`) VALUES
(4, 68, '2021-04-24', '100', '80', '82', '83', '90', '87', '29', '29', '20', '89', '90', '90', '76', '66', '100', '90', '87', '78', '67', '77', '90', '64.5', '87.25', '89', '90', '87', '89.4', '67', '67.25', '81.26666666', '95', '80', '100', '59.5', '77', '67', '82.8', '90', '92.9907', '82.69896666', '80.8814', '86.3247', '87.1841', '51', '80', '87', '78.7317'),
(6, 70, '2021-04-24', '100', '100', '100', '100', '90', '87', '29', '29', '20', '89', '90', '90', '76', '66', '90', '88', '77', '65', '67', '78', '87', '59.5', '73.5', '66', '88', '77', '75', '67', '89.5', '75.83333333', '100', '100', '90', '24.5', '78', '80.5', '65', '89', '92.6574', '79.96193333', '75.1654', '68.3265', '87.1841', '55', '90', '77', '75.446'),
(8, 69, '2021-04-24', '100', '90', '90', '90', '100', '90', '90', '89', '83', '88', '89', '88', '77', '78', '90', '90', '88', '78', '78', '88', '90', '94.5', '86.25', '78', '90', '88', '86.2', '78', '91.25', '86.91111111', '95', '90', '100', '86', '88', '83', '84.8', '88', '89.991', '89.42122222', '87.5977', '85.6581', '89.3512', '86', '88', '88', '87.4345');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
