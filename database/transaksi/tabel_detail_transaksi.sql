-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2020 at 04:45 AM
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
-- Table structure for table `tabel_detail_transaksi`
--

CREATE TABLE `tabel_detail_transaksi` (
  `id_detail_transaksi` varchar(5) NOT NULL,
  `id_transaksi` varchar(17) NOT NULL,
  `id_user` varchar(7) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `size` varchar(5) NOT NULL,
  `qty` int(3) NOT NULL,
  `subtotal` smallint(6) NOT NULL,
  `tax` float NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_detail_transaksi`
--

INSERT INTO `tabel_detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_user`, `id_barang`, `size`, `qty`, `subtotal`, `tax`, `tanggal`) VALUES
('S9gR0', '3CA304653R4228947', '1', 'ywCpL', '', 1, 20, 0.88, '2020-01-10 23:05:04');

--
-- Triggers `tabel_detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `add_total_trans` AFTER INSERT ON `tabel_detail_transaksi` FOR EACH ROW UPDATE tabel_transaksi
SET total=(SELECT SUM(subtotal) 
           from tabel_detail_transaksi
where tabel_transaksi.id_transaksi= tabel_detail_transaksi.id_transaksi)
    where tabel_transaksi.id_transaksi = New.id_transaksi
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_trans` AFTER UPDATE ON `tabel_detail_transaksi` FOR EACH ROW UPDATE tabel_transaksi
SET total=(SELECT SUM(subtotal) 
           from tabel_detail_transaksi
where tabel_transaksi.id_transaksi= tabel_detail_transaksi.id_transaksi)
    where tabel_transaksi.id_transaksi = New.id_transaksi
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_detail_transaksi`
--
ALTER TABLE `tabel_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `s` (`id_transaksi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_detail_transaksi`
--
ALTER TABLE `tabel_detail_transaksi`
  ADD CONSTRAINT `id_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `tabel_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_detail_transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tabel_barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
