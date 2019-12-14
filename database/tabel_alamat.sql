-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2019 at 03:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

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
-- Table structure for table `tabel_alamat`
--

CREATE TABLE `tabel_alamat` (
  `id_alamat` varchar(7) NOT NULL,
  `id_user` int(7) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `negara` varchar(45) NOT NULL,
  `kode_pos` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_alamat`
--

INSERT INTO `tabel_alamat` (`id_alamat`, `id_user`, `alamat`, `kota`, `provinsi`, `negara`, `kode_pos`) VALUES
('1', 1, '', '', '', '', ''),
('2', 2, 'Perumahan Mastrip Blok S no 10', 'Jember', 'Jawa Timur', 'Indonesia', '68121');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_alamat`
--
ALTER TABLE `tabel_alamat`
  ADD PRIMARY KEY (`id_alamat`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_alamat`
--
ALTER TABLE `tabel_alamat`
  ADD CONSTRAINT `tabel_alamat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
