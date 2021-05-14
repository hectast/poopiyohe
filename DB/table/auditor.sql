-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 02:15 AM
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
(12, 'Erwin Setiabudi', 'erwin@gmail.com', '$2y$10$XWUNtooQqH0vL7sUt5XhD.oBp3oqgHIBImPeBj3IFqU77UhghhVIm', 0),
(14, 'Ibnu Samsudar', 'ibnu@gmail.com', '$2y$10$K5QMi62Iz3dUWKKBFo5f0e.fZ55Gqli8p/R/q8kh00pGj1evVWSg2', 0),
(15, 'Ahmad Dahlan', 'ahmad@gmail.com', '$2y$10$KOQvrARTnr5nkN3EcKcFPOL2ZO7jmlKpUhEa0eLNmqRfXGlLcDGqC', 0),
(16, 'Novi Steffen Raintung', 'novisteffen@gmail.com', '$2y$10$Vc8jGJSGUVi6PAxdgg98lOPtpHWFbgvUsOMZlqHic3yRyoB3htjjK', 0),
(17, 'Syarif Hidayatullah Suleman', 'syarif@gmail.com', '$2y$10$5xADPgwsG0NnGvnuhXBji.YOcSxV0clfroR/g0TyUq8YmrxqiWcOO', 0),
(18, 'Jamsir Utiarahman', 'jamsir@gmail.com', '$2y$10$adLhqXP8WG3RfxbvbPFWxOdou/NBvtiBNaOe/fe36FPNxIgPbZWNC', 0),
(19, 'Susi Yefrida', 'susi@gmail.com', '$2y$10$yuz/tYebMc6TwgG2lapEy.tkIatJqKclKnlGwR95uAFCPrNK5GfYK', 0),
(20, 'Kiki Asmaeni', 'kiki@gmail.com', '$2y$10$zt1ENXwB/U6MR2n78caQ0eT3NmYT2YPgwwEiH5v3tsHM7xr06oMpW', 0),
(21, 'Arfan Suryadi', 'arfan@gmail.com', '$2y$10$VkWjkjrm88aqNEovffzPK.F3w1atIOoJHmEE/5P/hgtR3vRtsOJWq', 0),
(22, 'Heri Kiswanto', 'heri@gmail.com', '$2y$10$QzeoZyU6TynnA2BkBAZQtO/gUQr4Ecc/CElyMxUTCthC2keDcIJF.', 0),
(23, 'Farid Adam Rahmadi', 'farid@gmail.com', '$2y$10$Ppozlx6ILr1YxHVy0tqktOlOzN7Us0lk.iQdSdf0MBgDEpy35SleG', 0),
(24, 'Faris Naufal Ghani Habibullah', 'faris@gmail.com', '$2y$10$iv9VzwAzp6ks837BHT.e0OOwnt5u0XGm5PoQAIqT8N4d/Lm6.8qA.', 0),
(25, 'Mido Gustaf Santana', 'midogustaf@gmail.com', '$2y$10$o5DSc4r8rUPj/vvNBqzxmOfl5uf1nAOepdJ3UC7gcJecE2ll0xqmq', 0),
(26, 'Muhammad Sulistiyono', 'muhsulistiyono@gmail.com', '$2y$10$rMQ9ZeUaKCUKj4sfgNBib.5r33X4ElMs3IxLI68sfV5KyWVto.CM2', 0),
(27, 'Anton Kurniawan', 'anton@gmail.com', '$2y$10$N/Mmk.vPafPfHOuLdo.g6.xE5yQpvyjA1Q0/aqlYOzYE8lP38oGXi', 0),
(28, 'Henry Nugraha', 'henry@gmail.com', '$2y$10$cD2m9OXLh0CKiSS/gYvg7eNDb5y22d4k911TzkOGP5uXegtB4kYW.', 0),
(29, 'Luluk Lutfiana', 'luluk@gmail.com', '$2y$10$os2o5/tNC//z/8JSPcnSKeMrIdKTyEVfQPwzW/pusXgn3TT3mLOd6', 0),
(30, 'Muhammad Yusuf Hidayat', 'muhyusuf@gmail.com', '$2y$10$f9e6y05ClQhuI/v4jTxBeeHT0ZrTY.aeg/IeEcvtM1Jqedbw/itU.', 0),
(31, 'Mukhlis Erisnanto', 'mukhlis@gmail.com', '$2y$10$4vxKLK3iABmDJv1FzRB4MeVRc7oZfFFh5JqAsFEI4vtTxkiOok6vK', 0),
(32, 'Ni Wayan Sintya Galuh Paramita', 'sintyagaluh@gmail.com', '$2y$10$yhI.DxLAxl4.n4gusjt3eOBVANKvHQx2D9iD7xDY7U3dHUVZttUs6', 0),
(33, 'Titiana Muqitoh', 'titiana@gmail.com', '$2y$10$JiJ11LzwRZPdB5OlaT4dSuQUE6WQy6QyhWBUNsmlpwNJfX3ckyfDm', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
