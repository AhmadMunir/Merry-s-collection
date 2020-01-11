-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2020 at 04:44 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

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
-- Table structure for table `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `id_transaksi` varchar(17) NOT NULL,
  `id_user` int(7) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `total` float DEFAULT NULL,
  `tax_total` float NOT NULL,
  `shipping` float NOT NULL,
  `status` varchar(20) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `shipping_method` varchar(20) NOT NULL,
  `paypal_fee` float NOT NULL,
  `terima_bersih` float NOT NULL,
  `resi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`id_transaksi`, `id_user`, `tanggal`, `total`, `tax_total`, `shipping`, `status`, `alamat_pengiriman`, `shipping_method`, `paypal_fee`, `terima_bersih`, `resi`) VALUES
('3CA304653R4228947', 1, '2020-01-10 23:05:03', 20, 0.88, 4, 'Order Accepted', 'Rt 9  Rw 4 Sukosari Lor, Kabupaten Kaur, Bengkulu, AS', 'JNE', 1.02, 23.86, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD CONSTRAINT `tabel_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
