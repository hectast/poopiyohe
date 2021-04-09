-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 12:58 PM
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
-- Table structure for table `auditor`
--

CREATE TABLE `auditor` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `akses` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditor`
--

INSERT INTO `auditor` (`id`, `nama`, `email`, `password`, `akses`) VALUES
(8, 'Erwin Setiabudi', 'erwin@gmail.com', '$2y$10$3IjIEV5mgWOkhO7Nk0c/eeXp485DCTZX37SATK9HLbyWzqVC0gpLi', 1),
(11, 'wayo', 'wayo@gmail.com', '$2y$10$31OLOIYg18/WeGlY48t5i.ydS2mv2l7ZksTVFMKdwYrUeKT.rNgp.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auditor`
--
ALTER TABLE `auditor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auditor`
--
ALTER TABLE `auditor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
