-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 08:05 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

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
-- Table structure for table `auditan`
--

CREATE TABLE `auditan` (
  `id` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `mitra` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auditor`
--

CREATE TABLE `auditor` (
  `id` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditor`
--

INSERT INTO `auditor` (`id`, `nama`) VALUES
('ADTR2021030425B9', 'Zulhamd Kayyies Podungge'),
('ADTR202103044616', 'Azwar Ramadhan Botutihe'),
('ADTR202103048882', 'Ichaq Rahim Zees');

-- --------------------------------------------------------

--
-- Table structure for table `instansi_vertikal`
--

CREATE TABLE `instansi_vertikal` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `id_kemlem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instansi_vertikal`
--

INSERT INTO `instansi_vertikal` (`id`, `nama_instansi`, `id_kemlem`) VALUES
(1, 'Kantor Pelayanan Perbendaharaan Negara Gorontalo', 10),
(2, 'Badan Pertahanan Nasional Provinsi Gorontalo', 9),
(3, 'Bawaslu Provinsi Gorontalo', 11),
(4, 'Kejaksaan Tinggi Provinsi Gorontalo', 12),
(5, 'KPU Provinsi Gorontalo', 13),
(6, 'Polda Gorontalo', 14),
(7, 'Kanwil Kemenkumham Provinsi Gorontalo', 15),
(8, 'BNN Provinsi Gorontalo', 16),
(9, 'Universitas Negeri Gorontalo', 17),
(10, 'Balai Pelaksanaan Jalan Nasional XV Provinsi Goron', 18),
(11, 'Kanwil Kemenag Provinsi Gorontalo', 19),
(12, 'BKKBN Provinsi Gorontalo', 20),
(13, 'Badan Pusat Statistik Provinsi Gorontalo', 21),
(14, 'Badan Pemantapan Kawasan Hutan (BPKH) Provinsi Gorontalo', 22),
(15, 'Badan Intelejensi Negara Daerah Gorontalo', 23),
(16, 'Kantor Wilayah Ditjen Perbendaharaan Provinsi Gorontalo', 24);

-- --------------------------------------------------------

--
-- Table structure for table `kemlem`
--

CREATE TABLE `kemlem` (
  `id` int(11) NOT NULL,
  `kemlem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kemlem`
--

INSERT INTO `kemlem` (`id`, `kemlem`) VALUES
(9, 'Kementerian ATR/BPN'),
(10, 'Kementerian Pertanian'),
(11, 'Badan Pengawas Pemilu'),
(12, 'Kejaksaan RI'),
(13, 'Komisi Pemilihan Umum'),
(14, 'Kepolisian Republik Indonesia'),
(15, 'Kementerian Hukum dan HAM'),
(16, 'Badan Narkotika Nasional'),
(17, 'Kementerian Ristek dan Pendidikan Tinggi'),
(18, 'Kementerian PUPR'),
(19, 'Kementerian Agama'),
(20, 'Badan Kependudukan dan Keluarga Berencana Nasional'),
(21, 'Badan Pusat Statistik'),
(22, 'Kementerian Lingkungan Hidup dan Kehutanan'),
(23, 'Badan Intelijen Negara'),
(24, 'Kementerian Keuangan'),
(25, 'Kementerian Kesehatan'),
(26, 'Kementerian Perhubungan'),
(27, 'Badan Kepegawaian Negara');

-- --------------------------------------------------------

--
-- Table structure for table `opd`
--

CREATE TABLE `opd` (
  `id` int(11) NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `id_pemda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemda`
--

CREATE TABLE `pemda` (
  `id` int(11) NOT NULL,
  `pemda` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemda`
--

INSERT INTO `pemda` (`id`, `pemda`) VALUES
(2, 'Kabupaten Bone Bolango'),
(3, 'Kabupaten Gorontalo Utara'),
(4, 'Kota Gorontalo'),
(5, 'Provinsi Gorontalo'),
(6, 'Kabupaten Gorontalo'),
(7, 'Kabupaten Boalemo'),
(8, 'Kabupaten Pohuwato');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auditan`
--
ALTER TABLE `auditan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditor`
--
ALTER TABLE `auditor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instansi_vertikal`
--
ALTER TABLE `instansi_vertikal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kemlem`
--
ALTER TABLE `kemlem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemda`
--
ALTER TABLE `pemda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instansi_vertikal`
--
ALTER TABLE `instansi_vertikal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kemlem`
--
ALTER TABLE `kemlem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `opd`
--
ALTER TABLE `opd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemda`
--
ALTER TABLE `pemda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
