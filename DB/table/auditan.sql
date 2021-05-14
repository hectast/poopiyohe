-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 04:04 AM
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
  `mitra` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditan`
--

INSERT INTO `auditan` (`id`, `nama`, `mitra`, `email`, `password`) VALUES
('', 'User Auditan', '-', 'userauditan@gmail.com', '$2y$10$QL4iMADGzPrVghS1Pznk..6ZYw15XZiqtdlDGLoeQ12D4jUYtj0dy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auditan`
--
ALTER TABLE `auditan`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
