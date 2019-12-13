-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 03:50 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `merry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_baner`
--

CREATE TABLE `tabel_baner` (
  `id_baner` smallint(3) NOT NULL,
  `nama_baner` varchar(10) NOT NULL,
  `baner` varchar(30) NOT NULL,
  `tulisan_sedang` varchar(30) NOT NULL,
  `tulisan_kecil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_baner`
--

INSERT INTO `tabel_baner` (`id_baner`, `nama_baner`, `baner`, `tulisan_sedang`, `tulisan_kecil`) VALUES
(5, 'Budi Setia', '5dd2adde1984a.jpg', 'asd', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_baner`
--
ALTER TABLE `tabel_baner`
  ADD PRIMARY KEY (`id_baner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_baner`
--
ALTER TABLE `tabel_baner`
  MODIFY `id_baner` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
