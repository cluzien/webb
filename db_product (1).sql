-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 10:43 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_product`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `No` int(11) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Nama Kopi` varchar(30) NOT NULL,
  `Jenis Biji Kopi` varchar(30) NOT NULL,
  `Gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`No`, `Nama`, `Nama Kopi`, `Jenis Biji Kopi`, `Gambar`) VALUES
(13, 'Tegar', 'Cappuccino', 'Arabica', 'BG WEB NASIONAL 5 (1).png'),
(14, 'febriansyah', 'Espresso', 'robusta asli', 'kopi5.jpg'),
(15, 'Tasya', 'Cappuccino', 'robusta', 'kopi2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `role`) VALUES
('admin', '$2y$10$nI5AKEz.FCVXST2nI.1jpOuicGnYFaXPp/Wa4iPvtig9VcJxD7Q2i', 'admin'),
('amat', '$2y$10$K3JH4W8xC/WQT4Qlx.lbXe.Kk5w51mNwoyjqStXLSj8J3SEGFw.Ee', 'user'),
('arya', '$2y$10$voJwVOiak0h0lKlBkJsIAONtUkedfJCs8TNTNOaVwtzi3wU.TjnI.', ''),
('endah', '$2y$10$HLiTPt46AGvBamLtwLx0vu.kna98KkulpS3x3cWWZxHvAKTqqLYSa', ''),
('informatika', '$2y$10$rYk2PP9E.tSKkm.SGeiNquGV86/hsrdkLrSReIiAYstr2N1WoMJ5q', ''),
('Khrysna', '$2y$10$mPLgrICqoU7vUNzMUJoV.unQeTu7IIarMJspkGBPC2JioExmj6hi.', ''),
('khrysnaa', '$2y$10$2AVIsdf86gAtfXB/OYjgQue5nTak8Qxs8rrM6OimmFCXjRznIJ572', 'user'),
('tegar', '$2y$10$qxyIlQgK7bCk0kXsLrUV2ussVpXkK311F3JehjC.lPZprlY8ErWLK', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
