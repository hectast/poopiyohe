-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 07:58 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditor`
--

INSERT INTO `auditor` (`id`, `nama`) VALUES
(2, 'Ichaq '),
(3, 'Wahyu'),
(4, 'aza'),
(6, 'sasa');

-- --------------------------------------------------------

--
-- Table structure for table `instansi_vertikal`
--

CREATE TABLE `instansi_vertikal` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(150) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi_vertikal`
--

INSERT INTO `instansi_vertikal` (`id`, `nama_instansi`, `keterangan`) VALUES
(3, 'sadasd', 'asdadasd'),
(4, 'Aku Aku', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `kemlem`
--

CREATE TABLE `kemlem` (
  `id` int(11) NOT NULL,
  `kemlem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kemlem`
--

INSERT INTO `kemlem` (`id`, `kemlem`) VALUES
(9, 'Dinas Pertambangan'),
(10, 'Dinas Kelautan');

-- --------------------------------------------------------

--
-- Table structure for table `opd`
--

CREATE TABLE `opd` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(150) NOT NULL,
  `nama_pemda` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opd`
--

INSERT INTO `opd` (`id`, `nama_instansi`, `nama_pemda`, `keterangan`) VALUES
(211, 'Aku Aku', 'Provinsi Gorontalo', ''),
(212, 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG', 'Kabupaten Boalemo', ''),
(214, 'azaxax', 'Kabupaten Bone Bolango', 'axaxax'),
(215, 'axax', 'Kabupaten Gorontalo', 'axaxccc');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auditor`
--
ALTER TABLE `auditor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `instansi_vertikal`
--
ALTER TABLE `instansi_vertikal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kemlem`
--
ALTER TABLE `kemlem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `opd`
--
ALTER TABLE `opd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
