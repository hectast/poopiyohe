-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 04:30 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`) VALUES
(1, 'admin', 'adminbpkp@gmail.com', '$2y$10$.elM14CGqMaU2WrfgwcaeuM8Lpd7H0Hn/EXdk4gnHOY2ngXDZFiWi');

-- --------------------------------------------------------

--
-- Table structure for table `akibat`
--

CREATE TABLE `akibat` (
  `id_akibat` int(11) NOT NULL,
  `akibat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akibat`
--

INSERT INTO `akibat` (`id_akibat`, `akibat`) VALUES
(51, 'lebih bayar'),
(52, 'Kesengajaan  Bendahara'),
(53, 'Kesengajaan  Bendahara'),
(54, 'Voluptatibus asperio'),
(55, 'Mollit autem volupta'),
(56, 'Doloremque harum est'),
(57, 'Quae voluptatem dol'),
(58, 'Quibusdam irure ex q'),
(59, 'Quidem ipsum assumen');

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
(12, 'Erwin Setiabudi', 'erwin@gmail.com', '$2y$10$XWUNtooQqH0vL7sUt5XhD.oBp3oqgHIBImPeBj3IFqU77UhghhVIm', 2),
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
(25, 'Mido Gustaf Santana', 'midogustaf@gmail.com', '$2y$10$o5DSc4r8rUPj/vvNBqzxmOfl5uf1nAOepdJ3UC7gcJecE2ll0xqmq', 1),
(26, 'Muhammad Sulistiyono', 'muhsulistiyono@gmail.com', '$2y$10$rMQ9ZeUaKCUKj4sfgNBib.5r33X4ElMs3IxLI68sfV5KyWVto.CM2', 0),
(27, 'Anton Kurniawan', 'anton@gmail.com', '$2y$10$N/Mmk.vPafPfHOuLdo.g6.xE5yQpvyjA1Q0/aqlYOzYE8lP38oGXi', 0),
(28, 'Henry Nugraha', 'henry@gmail.com', '$2y$10$cD2m9OXLh0CKiSS/gYvg7eNDb5y22d4k911TzkOGP5uXegtB4kYW.', 0),
(29, 'Luluk Lutfiana', 'luluk@gmail.com', '$2y$10$os2o5/tNC//z/8JSPcnSKeMrIdKTyEVfQPwzW/pusXgn3TT3mLOd6', 0),
(30, 'Muhammad Yusuf Hidayat', 'muhyusuf@gmail.com', '$2y$10$f9e6y05ClQhuI/v4jTxBeeHT0ZrTY.aeg/IeEcvtM1Jqedbw/itU.', 0),
(31, 'Mukhlis Erisnanto', 'mukhlis@gmail.com', '$2y$10$4vxKLK3iABmDJv1FzRB4MeVRc7oZfFFh5JqAsFEI4vtTxkiOok6vK', 0),
(32, 'Ni Wayan Sintya Galuh Paramita', 'sintyagaluh@gmail.com', '$2y$10$yhI.DxLAxl4.n4gusjt3eOBVANKvHQx2D9iD7xDY7U3dHUVZttUs6', 0),
(33, 'Titiana Muqitoh', 'titiana@gmail.com', '$2y$10$JiJ11LzwRZPdB5OlaT4dSuQUE6WQy6QyhWBUNsmlpwNJfX3ckyfDm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `baktl`
--

CREATE TABLE `baktl` (
  `id_baktl` int(11) NOT NULL,
  `id_penugasan` int(11) NOT NULL,
  `file_upload` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baktl`
--

INSERT INTO `baktl` (`id_baktl`, `id_penugasan`, `file_upload`) VALUES
(46, 67, '1619335167.9012.pdf'),
(47, 68, '1619335624.5692.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `data_akibat`
--

CREATE TABLE `data_akibat` (
  `id_temuan` int(11) NOT NULL,
  `id_akibat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_akibat`
--

INSERT INTO `data_akibat` (`id_temuan`, `id_akibat`) VALUES
(32, 51),
(33, 52),
(33, 53),
(34, 54),
(34, 55),
(35, 56),
(35, 57),
(35, 58),
(36, 59);

-- --------------------------------------------------------

--
-- Table structure for table `data_kriteria`
--

CREATE TABLE `data_kriteria` (
  `id_temuan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kriteria`
--

INSERT INTO `data_kriteria` (`id_temuan`, `id_kriteria`) VALUES
(32, 57),
(33, 58),
(33, 59),
(33, 60),
(34, 61),
(35, 62),
(36, 63),
(36, 64),
(36, 65);

-- --------------------------------------------------------

--
-- Table structure for table `data_rekomendasi`
--

CREATE TABLE `data_rekomendasi` (
  `id_temuan` int(11) NOT NULL,
  `id_rekomendasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_rekomendasi`
--

INSERT INTO `data_rekomendasi` (`id_temuan`, `id_rekomendasi`) VALUES
(32, 57),
(33, 58),
(34, 59),
(34, 60),
(35, 61),
(35, 62),
(36, 63),
(36, 64),
(36, 65);

-- --------------------------------------------------------

--
-- Table structure for table `data_sebab`
--

CREATE TABLE `data_sebab` (
  `id_temuan` int(11) NOT NULL,
  `id_sebab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_sebab`
--

INSERT INTO `data_sebab` (`id_temuan`, `id_sebab`) VALUES
(32, 56),
(32, 57),
(33, 58),
(34, 59),
(35, 60),
(35, 61),
(36, 62);

-- --------------------------------------------------------

--
-- Table structure for table `data_uraian`
--

CREATE TABLE `data_uraian` (
  `id_temuan` int(11) NOT NULL,
  `id_uraian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_uraian`
--

INSERT INTO `data_uraian` (`id_temuan`, `id_uraian`) VALUES
(32, 56),
(33, 57),
(34, 58),
(35, 59),
(36, 60),
(36, 61),
(36, 62);

-- --------------------------------------------------------

--
-- Table structure for table `instansi_vertikal`
--

CREATE TABLE `instansi_vertikal` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `pass` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi_vertikal`
--

INSERT INTO `instansi_vertikal` (`id`, `nama_instansi`, `email`, `keterangan`, `pass`) VALUES
(6, 'Kantor Pelayanan Perbendaharaan Negara Gorontalo', 'kppn@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(7, 'Badan Pertanahan Nasional Provinsi Gorontalo', 'bpnp@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(8, 'Bawaslu Provinsi Gorontalo', 'bawaslu@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(9, 'Kejaksaan Tinggi Provinsi Gorontalo', 'kejati@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(10, 'KPU Provinsi Gorontalo', 'kpu@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(11, 'Polda Gorontalo', 'polda@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(12, 'Kanwil Kemenkumham Provinsi Gorontalo', 'kanwilkemenkumham@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(13, 'BNN Provinsi Gorontalo', 'bnn@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(14, 'Universitas Negeri Gorontalo', 'ung@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(15, 'Balai Pelaksanaan Jalan Nasional XV Provinsi Gorontalo', 'bpjn@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(16, 'Kanwil Kemenag Provinsi Gorontalo', 'kanwilkemenag@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(17, 'BKKBN Provinsi Gorontalo', 'bkkbn@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(18, 'Badan Pusat Statistik Provinsi Gorontalo', 'bps@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(19, 'Badan Pemantapan Kawasan Hutan (BPKH) Provinsi Gorontalo', 'bpkh@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(20, 'Badan Intelejensi Negara Daerah Gorontalo', 'bin@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(21, 'Kantor Wilayah Ditjen Perbendaharaan Provinsi Gorontalo', 'ditperben@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(22, 'Badan Penyelenggaran Jaminan Sosial Ketenagakerjaan', 'bpjsketenagakerjaan@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(23, 'Badan Penyelenggaran Jaminan Sosial Kesehatan', 'bpjskesehatan@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(24, 'Kantor Pengawasan dan Pelayanan Bea dan Cukai', 'kppbc@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(25, 'Kantor Imigrasi??Kelas I TPI??Gorontalo', 'kik1tpi@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(26, 'Balai Karantina Pertanian Kelas II Gorontalo', 'bkpk2@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(27, 'Balai Wilayah Sungai Sulawesi II Gorontalo', 'bwss2@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(28, 'Kantor Kesehatan Pelabuhan Kelas II Gorontalo', 'kkpk2@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(29, 'Kantor Kesyahbandaran dan Otoritas Pelabuhan Kelas III', 'kkopk2@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(30, 'Kantor Unit Penyelenggara Pelabuhan Pelabuhan Anggrek Gorontalo', 'kupppa@gmail.com', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(31, 'UPT Badan Kepegawaian Negara Gorontalo', '-', '-', '90c2269aa739a4500c388f2cd5dafe4f');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`) VALUES
(57, 'peraturan'),
(58, 'peraturan'),
(59, 'peraturan'),
(60, 'peraturan'),
(61, 'Laudantium ad ab la'),
(62, 'Explicabo Do do con'),
(63, 'Eos et id laudantiu'),
(64, 'Magnam occaecat nihi'),
(65, 'Accusantium qui do n');

-- --------------------------------------------------------

--
-- Table structure for table `log_token`
--

CREATE TABLE `log_token` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_token`
--

INSERT INTO `log_token` (`id`, `email`, `token`, `timestamp`) VALUES
(41, 'dikbudpora.prov.go@gmail.com', 'DD2SO50ZaX', '2021-04-25 07:02:33'),
(42, 'erwin@gmail.com', 'xQerG7Z7Ls', '2021-04-25 07:31:54'),
(43, 'ibnu@gmail.com', 'zFD9xRlBLz', '2021-04-25 07:18:26'),
(44, 'kiki@gmail.com', '48oNO9TYaz', '2021-04-25 07:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `opd`
--

CREATE TABLE `opd` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_pemda` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `pass` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opd`
--

INSERT INTO `opd` (`id`, `nama_instansi`, `email`, `nama_pemda`, `keterangan`, `pass`) VALUES
(217, 'DINAS PENDIDIKAN, KEBUDAYAAN, PEMUDA DAN OLAHRAGA', 'dikbudpora.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(218, 'DINAS KESEHATAN', 'dinkes.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(219, 'RUMAH SAKIT UMUM DAERAH dr. HASRI AINUN HABIBIE ', 'rs.hasriainunhabibie@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(220, 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG', 'dispupr.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(221, 'DINAS PERUMAHAN RAKYAT DAN KAWASAN PERMUKIMAN', '-', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(222, 'BADAN KESATUAN BANGSA DAN POLITIK', 'bkesbangpol.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(223, 'DINAS SOSIAL, PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK', '-', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(224, 'BADAN PENANGGULANGAN BENCANA DAERAH', 'bpbd.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(225, 'DINAS TENAGA KERJA DAN TRANSMIGRASI', 'disnaker.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(226, 'DINAS PANGAN ', 'dispa.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(227, 'DINAS LINGKUNGAN HIDUP DAN KEHUTANAN', 'dlhk.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(228, 'BADAN LINGKUNGAN HIDUP DAN RISET DAERAH', 'blhrisda.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(229, 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA, ADMINISTRASI KEPENDUDUKAN PENCATATAN SIPIL', 'dpmd.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(230, 'SEKRETARIAT PELAKSANA HARIAN BNP', 'sekbnp.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(231, 'DINAS PERHUBUNGAN', 'dishub.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(232, 'DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK', 'diskominfoti.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(233, 'DINAS KOPERASI, UKM, PERINDUSTRIAN DAN PERDAGANGAN', 'disppkukm.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(234, 'DINAS PENANAMAN MODAL, ESDM DAN TRANSMIGRASI', 'dpmptsp.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(235, 'DINAS KEARSIPAN DAN PERPUSTAKAAN', 'dinpersip.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(236, 'DINAS KELAUTAN DAN PERIKANAN', 'dkp.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(237, 'DINAS PARIWISATA', 'dispar.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(238, 'DINAS PERTANIAN ', 'dinaspertanian.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(239, 'DINAS PETERNAKAN DAN PERKEBUNAN', 'disnakbun.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(240, 'BADAN KOORDINASI PENYULUHAN', 'bakornaspen.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(241, 'DEWAN PERWAKILAN RAKYAT DAERAH', 'dprd.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(242, 'KEPALA DAERAH DAN WAKIL KEPALA DAERAH', 'kaderwakader.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(243, 'SEKRETARIAT DAERAH', 'sekda.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(244, 'SEKRETARIAT DPRD', 'sekdprd.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(245, 'BADAN PENGHUBUNG', 'bp.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(246, 'SATUAN POLISI PAMONG PRAJA DAN PERLINDUNGAN MASYARAKAT', 'satpolpppm.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(247, 'SEKRETARIAT DEWAN PENGURUS KORPRI', 'korpri.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(248, 'INSPEKTORAT PROVINSI GORONTALO', 'inspektorat.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(249, 'BADAN PERENCANAAN, PENELITIAN DAN PENGEMBANGAN DAERAH', 'bappelitbang.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(250, 'BADAN KEUANGAN PROVINSI GORONTALO', 'bka.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(251, 'BADAN KEPEGAWAIAN', 'bk.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(252, 'BADAN PENDIDIKAN DAN PELATIHAN', 'bpp.prov.go@gmail.com', 'Provinsi Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(253, 'DINAS PENDIDIKAN', 'disdik.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(254, 'DINAS PENDIDIKAN DAN KEBUDAYAAN', 'dikbud.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(255, 'DINAS KESEHATAN', 'dinkes.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(256, 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG', 'dinpupr.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(257, 'DINAS PERUMAHAN RAKYAT PERMUKIMAN DAN PERTANAHAN', 'disperkimtan.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(258, 'DINAS SATUAN POLISI PAMONG PRAJA', 'dinsatpolpp.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(259, 'DINAS SOSIAL', 'dinsos.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(260, 'BADAN PENANGGULANGAN BENCANA DAERAH', 'bpbd.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(261, 'DINAS PANGAN', 'dinpa.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(262, 'DINAS LINGKUNGAN HIDUP', 'dlh.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(263, 'DINAS CATATAN SIPIL DAN KEPENDUDUKAN', 'dindukcapil.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(264, 'DINAS PEMBERDAYAAN MASYARAKAT DESA', 'dpmd.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(265, 'DINAS PENGENDALIAN PENDUDUK, KB, PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK', 'dppkbp3a.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(266, 'DINAS PERHUBUNGAN', 'dishub.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(267, 'DINAS KOMUNIKASI DAN INFORMATIKA', 'diskominfo.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(268, 'DINAS PENANAMAN MODAL, PELAYANAN TERPADU SATU PINTU DAN TENAGA KERJA', 'dpmptsp.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(269, 'DINAS PEMUDA DAN OLAH RAGA', 'dispora.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(270, 'DINAS PERPUSTAKAAN DAN KEARSIPAN', 'dispersib.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(271, 'DINAS KELAUTAN DAN PERIKANAN', 'dinkelpan.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', 'DINAS KELAUTAN DAN PERIKANAN\r\n', '90c2269aa739a4500c388f2cd5dafe4f'),
(272, 'DINAS PARIWISATA DAN EKONOMI KREATIF', 'disparekraf.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(273, 'DINAS PERTANIAN DAN PETERNAKAN', 'distanak.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(274, 'DINAS KESEHATAN', 'dinkes.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(275, 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG', 'dispupr.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(276, 'DINAS PERUMAHAN RAKYAT DAN KAWASAN PEMUKIMAN', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(277, 'SATUAN POLISI PAMONG PRAJA', 'satpolpp.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(278, 'BADAN PENANGGULANGAN BENCANA DAERAH', 'bpbd.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(279, 'DINAS SOSIAL DAN PEMBERDAYAAN MASYARAKAT', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(280, 'DINAS TENAGA KERJA, KOPERASI DAN UKM', 'distekukm.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(281, 'DINAS PENGENDALIAN PENDUDUK, KB, PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(282, 'DINAS PANGAN', 'dispa.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(283, 'DINAS LINGKUNGAN HIDUP', 'dlh.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(284, 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL', 'disdukcapil.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(285, 'DINAS PERHUBUNGAN', 'dishub.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(286, 'DINAS KOMUNIKASI, INFORMATIKA DAN PERSANDIAN', 'diskominfoti.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(287, 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(288, 'DINAS KEARSIPAN DAN PERPUSTAKAAN', 'dinpersip.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(289, 'DINAS PERINDUSTRIAN, PERDAGANGAN, KOPERASI DAN UMKM', 'disperindagkop.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(290, 'DINAS KELAUTAN PERIKANAN DAN PERTANIAN', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(291, 'DINAS PARIWISATA, KEPEMUDAAN DAN OLAH RAGA', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(292, 'SEKRETARIAT DAERAH', 'sekda.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(293, 'SEKRETARIAT DEWAN PERWAKILAN RAKYAT DAERAH', '', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(294, 'DINAS PERDAGANGAN DAN PERINDUSTRIAN', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(295, 'SEKRETARIAT DAERAH', 'sekda.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(296, 'KECAMATAN TAPA', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(297, 'INSPEKTORAT', 'inspektorat.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(298, 'BADAN PERENCANAAN, PENELITIAN DAN PENGEMBANGAN DAERAH', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(299, 'KECAMATAN KABILA', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(300, 'BADAN KEUANGAN', 'bk.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(301, 'PEJABAT PENGELOLA KEUANGAN DAERAH (PPKD)', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(302, 'BADAN KEPEGAWAIAN PENDIDIKAN DAN PELATIHAN', 'bkpp.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(303, 'KECAMATAN SUWAWA', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(304, 'SEKRETARIAT DPRD', 'sekdprd.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(305, 'KANTOR CAMAT KOTA TIMUR', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(306, 'KECAMATAN BONEPANTAI', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(307, 'KANTOR CAMAT KOTA BARAT', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(308, 'KECAMATAN BULANGO UTARA', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(309, 'KANTOR CAMAT KOTA SELATAN', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(310, 'KANTOR CAMAT KOTA UTARA', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(311, 'KECAMATAN TILONGKABILA', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(312, 'KANTOR CAMAT DUNGINGI', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(313, 'KECAMATAN BOTUPINGGE', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(314, 'KANTOR CAMAT KOTA TENGAH', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(315, 'KECAMATAN KABILA BONE', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(316, 'KANTOR CAMAT HULONTHALANGI', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(317, 'KECAMATAN BONE', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(318, 'KANTOR CAMAT SIPATANA', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(319, 'KECAMATAN BONE RAYA', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(320, 'KECAMATAN SUWAWA TIMUR', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(321, 'KECAMATAN SUWAWA SELATAN', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(322, 'KANTOR CAMAT DUMBO RAYA', '-', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(323, 'KECAMATAN SUWAWA TENGAH', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(324, 'BADAN  KESATUAN BANGSA DAN POLITIK ', 'bkesbangpol.kota.go@gmail.com', 'Kota Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(325, 'KECAMATAN BULANGO ULU', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(326, 'KECAMATAN BULANGO SELATAN', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(327, 'KECAMATAN BULANGO TIMUR', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(328, 'Dinas Pendidikan dan Kebudayaan', 'disdikbud.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(329, 'KECAMATAN BULAWA', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(330, 'Dinas Kesehatan', 'dinkes.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(331, 'KECAMATAN PINOGU', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(332, 'Dinas Pekerjaan Umum dan Penataan Ruang', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(333, 'Dinas Pekerjaan Umum', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(334, 'INSPEKTORAT', 'inspektorat.kab.bonbol@gmail.com', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(335, 'Dinas Perumahan dan Kawasan Permukiman', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(336, 'BADAN PERENCANAAN PEMBANGUNAN DAERAH, PENELITIAN DAN PENGEMBANGAN', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(337, 'BADAN KEUANGAN DAN PENDAPATAN DAERAH', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(338, 'Badan Kesatuan Bangsa dan Politik', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(339, 'Satuan Polisi Pamong Praja', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(340, 'BADAN KEPEGAWAIAN, PENDIDIKAN DAN PELATIHAN DAERAH', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(341, 'Dinas Sosial', 'dinsos.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(342, 'SEKRETARIAT DEWAN PERWAKILAN RAKYAT DAERAH', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(343, 'Badan Penanggulangan Bencana Daerah', 'bpbd.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(344, 'BADAN KESATUAN BANGSA DAN POLITIK', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(345, 'Badan Narkotika Nasional', 'bnn.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(346, 'Dinas Tenaga Kerja dan Transmigrasi', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(347, 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(348, 'Badan Pemberdayaan Perempuan dan KB', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(349, 'Dinas Pendidikan', 'disdik.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(350, 'Dinas Ketahanan Pangan', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(351, 'Dinas Kesehatan', 'dinkes.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(352, 'Badan Ketahanan Pangan', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(353, 'Dinas Lingkungan Hidup dan Sumber Daya Alam', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(354, 'Rumah Sakit Umum Daerah', 'rsud.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(355, 'Badan Lingkungan Hidup', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(356, 'Dinas Kependudukan dan Pencatatan Sipil', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(357, 'Dinas Pemberdayaan Masyarakat dan Desa', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(358, 'Dinas Pekerjaan Umum dan Penataan Ruang', 'dispupr.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(359, 'Dinas Pengendalian Penduduk dan KB', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(360, 'Dinas Perumahan dan Kawasan Permukiman', 'disperkaper.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(361, 'Dinas Perhubungan', 'dishub.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(362, 'Dinas Komunikasi dan  Informatika', 'diskominfo.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(363, 'Badan Kesatuan Bangsa Dan Politik', 'kesbangpo.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(364, 'Dinas Koperasi Usaha Kecil dan Menengah', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(365, 'Satuan Polisi Pamong Praja', 'satpolpp.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(366, 'Dinas Sosial', 'dinsos.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(367, 'Dinas Penanaman Modal dan PTSP', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(368, 'Badan Penanggulangan Bencana Daerah', 'bpbd.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(369, 'Dinas Pemuda, Olahraga dan Pariwisata', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(370, 'Dinas Tenaga Kerja dan Transmigrasi', 'disnaker.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(371, 'Dinas Pemuda dan Olahraga', 'dispora.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(372, 'Dinas Perpustakaan dan Arsip', 'dinpersip.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(373, 'Dinas Perikanan ', 'dinasperikanan.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(374, 'Dinas Pariwisata, Kebudayaan, Komunikasi dan Informatika', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(375, 'Dinas Pertanian', 'dinaspertanian.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(376, 'Dinas Peternakan dan Kesehatan Hewan', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(377, 'Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian Penduduk dan Keluarga Berencana', '-', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(378, 'Badan Pelaksana Penyuluhan Pertanian, Kehutanan dan Perkebunan', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(379, 'Dinas Kehutanan, Pertambangan dan Energi', 'dkpe.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(380, 'Dinas Pangan', 'dispan.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(381, 'Dinas Perindustrian dan Perdagangan', 'disperda.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(382, 'Dinas Lingkungan Hidup', 'dislingkup.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(383, 'Sekretariat DPRD', 'sekdprd.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(384, 'Dinas Kependudukan dan Pencatatan Sipil', 'disdukcapil.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(385, 'Sekretariat Daerah', 'sekda.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(386, 'Kantor Pelayanan Pengaduan Masyarakat', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(387, 'Kantor Unit Layanan Pengadaan Barang/Jasa', '-', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(388, 'Kantor Sekretariat KORPRI', 'kopri.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(389, 'Inspektorat', 'inspektorat.kab.go@mail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(390, 'Badan Perencanaan', 'bp.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(391, 'Badan Keuangan', 'bk.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(392, 'Badan Kepegawaian dan Diklat', 'bkepdik.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(393, 'Badan Penelitiaan dan Pengembangan', 'bpp.kab.go@gmail.com', 'Kabupaten Gorontalo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(394, 'Dinas Pemberdayaan Masyarakat dan Desa', 'dpmd.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(395, 'Dinas Pendidikan,Kepemudaan dan Olah Raga', 'disdikpora.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(396, 'Dinas Perhubungan', 'dishub.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(397, 'Dinas Komunikasi, Informatika dan Statistik', 'diskominfoti.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(398, 'Dinas Kesehatan', 'dinkes.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(399, 'Dinas Penanaman Modal', 'dpm.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(400, 'Badan Pengelola Rumah Sakit Umum Daerah Tani dan Nelayan', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(401, 'Dinas Pekerjaan Umum dan Penataan Ruang', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(402, 'Dinas Pemuda, Olahraga dan Pariwisata', 'dispora.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(403, 'Dinas Perumahan Rakyat,Kawasan Permukiman,Perhubungan dan Pertanahan', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(404, 'Dinas Perpustakaan Dan Kearsipan', 'dinpersip.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(405, 'Badan Penanggulangan Bencana Daerah', 'bpbd.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(406, 'Kesbang Politik dan Linmas', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(407, 'Satuan Polisi Pamong Praja ', 'satpolpp.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(408, 'Dinas Perikanan', 'disperka.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(409, 'Dinas Sosial, Pemberdayaan Masyarakat dan Desa', 'dspmd.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(410, 'Dinas Pertanian', 'disperta.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(411, 'Dinas Pangan', 'dispa.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(412, 'Dinas Perindustrian, Perdagangan, Koperasi dan Usaha Kecil Menengah', 'disppkukm.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(413, 'Kepala Daerah dan Wakil Kepala Daerah', 'kaderwakader.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(414, 'Dinas Lingkungan Hidup dan Kehutanan', 'dlhk.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(415, 'Dinas Kependudukan dan Pencatatan Sipil', 'dindukcapil.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(416, 'Dewan Perwakilan Rakyat Daerah', 'dprd.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(417, 'Dinas Pengendalian Kependudukan,Keluarga Berencana,Pemberdayaan Perempuan dan Perlindungan Anak', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(418, 'Dinas Komunikasi, Informatika,Statistik dan Persandian', 'diskominfotik.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(419, 'Dinas Koperasi,Usaha Kecil dan Menengah, Perindustrian dan Perdagangan', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(420, 'Dinas Penanaman Modal, Energi dan Sumber Daya Mineral', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(421, 'Sekretariat Daerah', 'sekda.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(422, 'Dinas Perpustakaan dan Kearsipan', 'dinpersip.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(423, 'Sekretariat DPRD', 'sekdprd.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(424, 'Dinas Perpustakaan dan Arsip Daerah ', 'dinpersipdaerah.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(425, 'Kecamatan Paguat', '-', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(426, 'Dinas Kelautan dan Perikanan', 'dkp.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(427, 'Kecamatan Dengilo', '-', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(428, 'Dinas Pariwisata dan Kebudayaan', 'disparke.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(429, 'Kecamatan Marisa', '-', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(430, 'Dinas Pertanian', 'dinperta.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(431, 'Dinas  Transmigrasi dan Tenaga Kerja ', 'disnaker.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(432, 'Kecamatan Duhiadaa', '-', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(433, 'DPRD', 'dprd.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(434, 'Kepala Daerah dan Wakil Kepala Daerah', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(435, 'Kecamatan Buntulia', '-', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(436, 'Sekertariat Daerah', 'sekda.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(437, 'Kecamatan Patilanggio', '-', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(438, 'Sekertariat DPRD', 'sekdprd.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(439, 'Kecamatan Randangan', '-', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(440, 'Kantor Pelayanan Perijinan Terpadu Satu Atap', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(441, 'Kecamatan Taluditi', '-', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(442, 'Kecamatan Wanggarasi', '-', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(443, 'Kecamatan Paguyaman', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(444, 'Kecamatan Lemito', '-', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(445, 'Kecamatan Popayato', '-', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(446, 'Kecamatan Tilamuta', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(447, 'Kecamatan Popayato Timur', '-', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(448, 'Kecamatan Mananggu', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(449, 'Kecamatan Popayato Barat', '-', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(450, 'Kecamatan Wonosari', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(451, 'Inspektorat Daerah', 'inspektoratdaerah.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(452, 'Kecamatan Dulupi', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(453, 'Badan Perencanaan, Penelitian dan Pengembangan', 'bppp.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(454, 'Kecamatan Paguyaman Pantai', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(455, 'Kecamatan Botumoito', '-', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(456, 'Badan Keuangan Daerah', 'bkd.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(457, 'Inspektorat Daerah', 'inspektoratdaerah.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(458, 'Badan Perencanaan, Penelitian dan Pengembangan Daerah (BAPPPEDA)', 'bappelitbang.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(459, 'Badan Kepegawaian, Pendidikan dan Pelatihan', 'bkpp.kab.po@gmail.com', 'Kabupaten Pohuwato', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(460, 'Badan Keuangan dan Aset Daerah (BKAD)', 'bkad.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(461, 'Badan Kepegawaian Daerah dan Pendidikan Pelatihan', 'bkppd.kab.boal@gmail.com', 'Kabupaten Boalemo', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(462, 'Dinas Pendidikan', 'disdik.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(463, 'Dinas Kesehatan', 'dinkes.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(464, 'Dinas Pekerjaan Umum Dan Penataan Ruang', 'dispupr.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(465, 'Dinas Perumahan Rakyat, Kawasan Permukiman dan Pertanahan', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(466, 'Badan Kesatuan Bangsa', 'kesbang.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(467, 'Dinas Satuan Polisi Pamong Praja Dan Kebakaran', 'satpolppk.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(468, 'Dinas Sosial', 'dinsos.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(469, 'Badan Penanggulangan Bencana Daerah', 'bpbd.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(470, 'Dinas Pemberdayaan Perempuan Dan Perlindungan Anak', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(471, 'Dinas Ketahanan Pangan', 'diskepang.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(472, 'Dinas Lingkungan Hidup', 'dlh.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(473, 'Dinas Kependudukan Dan Catatan Sipil', 'disdukcapil.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(474, 'Dinas Pemberdayaan Masyarakat Dan Desa', 'dpmd.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(475, 'Dinas Pengendalian Penduduk Dan Keluarga Berencana', 'dppkb.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(476, 'Dinas Perhubungan', 'dishub.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(477, 'Dinas Komunikasi Dan Informatika', 'diskominfo.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(478, 'Dinas Perdagangan, Perindustrian, Koperasi Dan Usaha Kecil Menengah', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(479, 'Dinas Penanaman Modal Dan Perijinan Tarpadu Satu Pintu (ESDM)', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(480, 'Dinas Kepemudaan Dan Olahraga', 'diskera.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(481, 'Dinas Kearsipan Dan Perpustakaan ', 'dinpersip.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(482, 'Dinas Kelautan Dan Perikanan', 'dkp.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(483, 'Dinas Pariwisata Dan Kebudayaan', 'disparkeb.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(484, 'Dinas Tanaman Pangan, Hortikultura dan Perkebunan', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(485, 'Dinas Peternakan Dan Kesehatan Hewan', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(486, 'Dinas Transmigrasi Dan Tenaga Kerja', 'disnaker.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(487, 'Dewan Perwakilan Rakyat Daerah ', 'dprd.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(488, 'Kepala Daerah Dan Wakil Kepala Daerah', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(489, 'Sekrtariat Daerah', 'sekda.kab.gorut@gmai.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(490, 'Sekratariat Dewan Perwakilan Rakyat Daerah ', 'sekdprd.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(491, 'Kantor Camat Kwandang', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(492, 'Kantor Camat Anggrek', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(493, 'Kantor Camat Atinggola', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(494, 'Kantor Camat Sumalata', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(495, 'Kantor Camat Tolinggula', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(496, 'Kantor Camat Gentuma Raya', '-', 'Kabupaten Bone Bolango', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(497, 'Kantor Camat Biau', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(498, 'Kantor Camat Sumalata Timur', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(499, 'Kantor Camat Monano', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(500, 'Kantor Camat Tomilito', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(501, 'Kantor Camat Ponelo Kepulauan', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(502, 'Inspektorat Daerah', 'inspektoratdaerah.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(503, 'Badan Perencanaan Penelitian Dan Pengembangan', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(504, 'Badan Keuangan ', 'badankeuagan.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(505, 'Badan Kepegawaian Pendidikan Dan Pelatihan', 'bkpp.kab.gorut@gmail.com', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f'),
(506, 'Kantor Camat Gentuma Raya', '-', 'Kabupaten Gorontalo Utara', '-', '90c2269aa739a4500c388f2cd5dafe4f');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
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

-- --------------------------------------------------------

--
-- Table structure for table `penugasan`
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
  `d1` varchar(5) NOT NULL,
  `status_tl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penugasan`
--

INSERT INTO `penugasan` (`id_penugasan`, `no_st`, `tgl_st`, `uraian_penugasan`, `jenis_penugasan`, `auditan_in`, `auditan_opd`, `status`, `pkpt`, `kf1`, `d1`, `status_tl`) VALUES
(67, 'Consequuntur esse ma', '1976-02-14', 'Provident velit nul', 'Audit', '', '217', 'Belum Direview', 'PKPT', 'KF1', 'D4', 'Belum TL'),
(68, 'Necessitatibus ut eu', '2011-02-03', 'Necessitatibus in ip', 'Audit', '', '217', 'Belum Direview', 'Non PKPT', 'KF3', 'D2', 'Belum TL');

-- --------------------------------------------------------

--
-- Table structure for table `penugasan_auditor`
--

CREATE TABLE `penugasan_auditor` (
  `id_pa` int(11) NOT NULL,
  `id_penugasan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `peran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penugasan_auditor`
--

INSERT INTO `penugasan_auditor` (`id_pa`, `id_penugasan`, `id`, `peran`) VALUES
(124, 66, 33, 'Ketua Tim'),
(125, 66, 30, 'Pengendali Teknis'),
(126, 66, 28, 'Anggota Tim'),
(127, 67, 14, 'Ketua Tim'),
(128, 67, 20, 'Pengendali Teknis'),
(129, 67, 18, 'Anggota Tim'),
(130, 68, 20, 'Ketua Tim'),
(131, 68, 19, 'Pengendali Teknis'),
(132, 68, 32, 'Anggota Tim');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id_rekomendasi` int(11) NOT NULL,
  `rekomendasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`id_rekomendasi`, `rekomendasi`) VALUES
(57, 'setor kas negara'),
(58, 'Mengembalikan Uang senilai Rp.50.000.000'),
(59, 'Veritatis iure recus'),
(60, 'Aut aut et esse qua'),
(61, 'Veniam cillum vel q'),
(62, 'Aliquam ex ut quas u'),
(63, 'Nisi consequatur qui'),
(64, 'Nihil vel libero ill'),
(65, 'Qui sed ut quis ipsa');

-- --------------------------------------------------------

--
-- Table structure for table `sebab`
--

CREATE TABLE `sebab` (
  `id_sebab` int(11) NOT NULL,
  `sebab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sebab`
--

INSERT INTO `sebab` (`id_sebab`, `sebab`) VALUES
(56, 'lalai'),
(57, 'Kesengajaan  Bendahara'),
(58, 'asdasd'),
(59, 'Nam maxime ex distin'),
(60, 'Ipsum facere rem su'),
(61, 'Consequatur irure fu'),
(62, 'Nulla dolorum tempor');

-- --------------------------------------------------------

--
-- Table structure for table `surat_tuntas`
--

CREATE TABLE `surat_tuntas` (
  `id` int(11) NOT NULL,
  `id_penugasan` int(11) NOT NULL,
  `nomor_surat` varchar(20) NOT NULL,
  `tgl_surat` date NOT NULL,
  `surat_tuntas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temuan`
--

CREATE TABLE `temuan` (
  `id_temuan` int(11) NOT NULL,
  `id_penugasan` int(11) NOT NULL,
  `no_laporan` varchar(20) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `jenisnominal` varchar(50) NOT NULL,
  `isirupiah` varchar(20) NOT NULL,
  `hal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temuan`
--

INSERT INTO `temuan` (`id_temuan`, `id_penugasan`, `no_laporan`, `tgl_laporan`, `kondisi`, `jenisnominal`, `isirupiah`, `hal`) VALUES
(32, 67, 'LHA-10/BPN', '2021-04-28', 'setor kas', 'Rupiah', '58000000', 'hal hal yang perlu di perhatikan'),
(33, 67, 'LHA-10/BPN', '2021-04-28', 'asdasdas', 'Rupiah', '50000000', 'hal hal yang perlu di perhatikan (tidak wajib)'),
(34, 68, 'At minim dolores inc', '1994-01-05', 'asdadda', 'Non Rupiah', '', 'Aliquid dolorem fuga'),
(35, 68, 'At minim dolores inc', '1994-01-05', 'Dolor consequuntur m', 'Non Rupiah', '', 'Minima tenetur lauda'),
(36, 68, 'At minim dolores inc', '1994-01-05', 'Officiis commodi adi', 'Rupiah', '67000000', 'Repellendus Et et i');

-- --------------------------------------------------------

--
-- Table structure for table `tindak_lanjut`
--

CREATE TABLE `tindak_lanjut` (
  `id_tl` int(11) NOT NULL,
  `id_temuan` int(11) NOT NULL,
  `id_rekomendasi` int(11) NOT NULL,
  `uraian_tl` varchar(100) NOT NULL,
  `file_tl` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tindak_lanjut`
--

INSERT INTO `tindak_lanjut` (`id_tl`, `id_temuan`, `id_rekomendasi`, `uraian_tl`, `file_tl`) VALUES
(6, 36, 63, 'uraian tl 1 temuan 3', '1619336287.460860851c5f7082a.pdf'),
(7, 36, 63, 'uraian tl 2 temuan 3', '1619336287.466360851c5f71d55.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `uraian`
--

CREATE TABLE `uraian` (
  `id_uraian` int(11) NOT NULL,
  `uraian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uraian`
--

INSERT INTO `uraian` (`id_uraian`, `uraian`) VALUES
(56, 'SETOR kas '),
(57, 'mengembalikan uang negara Rp.50.000.000'),
(58, 'Nisi amet quasi mag'),
(59, 'Placeat a quis dolo'),
(60, 'Magna numquam et adi'),
(61, 'Dolore qui duis quis'),
(62, 'Quia quaerat numquam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akibat`
--
ALTER TABLE `akibat`
  ADD PRIMARY KEY (`id_akibat`);

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
-- Indexes for table `baktl`
--
ALTER TABLE `baktl`
  ADD PRIMARY KEY (`id_baktl`);

--
-- Indexes for table `data_akibat`
--
ALTER TABLE `data_akibat`
  ADD PRIMARY KEY (`id_temuan`,`id_akibat`);

--
-- Indexes for table `data_kriteria`
--
ALTER TABLE `data_kriteria`
  ADD PRIMARY KEY (`id_temuan`,`id_kriteria`);

--
-- Indexes for table `data_rekomendasi`
--
ALTER TABLE `data_rekomendasi`
  ADD PRIMARY KEY (`id_temuan`,`id_rekomendasi`);

--
-- Indexes for table `data_sebab`
--
ALTER TABLE `data_sebab`
  ADD PRIMARY KEY (`id_temuan`,`id_sebab`);

--
-- Indexes for table `data_uraian`
--
ALTER TABLE `data_uraian`
  ADD PRIMARY KEY (`id_temuan`,`id_uraian`);

--
-- Indexes for table `instansi_vertikal`
--
ALTER TABLE `instansi_vertikal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `log_token`
--
ALTER TABLE `log_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`id_penugasan`);

--
-- Indexes for table `penugasan_auditor`
--
ALTER TABLE `penugasan_auditor`
  ADD PRIMARY KEY (`id_pa`);

--
-- Indexes for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id_rekomendasi`);

--
-- Indexes for table `sebab`
--
ALTER TABLE `sebab`
  ADD PRIMARY KEY (`id_sebab`);

--
-- Indexes for table `surat_tuntas`
--
ALTER TABLE `surat_tuntas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temuan`
--
ALTER TABLE `temuan`
  ADD PRIMARY KEY (`id_temuan`);

--
-- Indexes for table `tindak_lanjut`
--
ALTER TABLE `tindak_lanjut`
  ADD PRIMARY KEY (`id_tl`);

--
-- Indexes for table `uraian`
--
ALTER TABLE `uraian`
  ADD PRIMARY KEY (`id_uraian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akibat`
--
ALTER TABLE `akibat`
  MODIFY `id_akibat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `auditor`
--
ALTER TABLE `auditor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `baktl`
--
ALTER TABLE `baktl`
  MODIFY `id_baktl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `instansi_vertikal`
--
ALTER TABLE `instansi_vertikal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `log_token`
--
ALTER TABLE `log_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `opd`
--
ALTER TABLE `opd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=507;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penugasan`
--
ALTER TABLE `penugasan`
  MODIFY `id_penugasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `penugasan_auditor`
--
ALTER TABLE `penugasan_auditor`
  MODIFY `id_pa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id_rekomendasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `sebab`
--
ALTER TABLE `sebab`
  MODIFY `id_sebab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `surat_tuntas`
--
ALTER TABLE `surat_tuntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `temuan`
--
ALTER TABLE `temuan`
  MODIFY `id_temuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tindak_lanjut`
--
ALTER TABLE `tindak_lanjut`
  MODIFY `id_tl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uraian`
--
ALTER TABLE `uraian`
  MODIFY `id_uraian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
