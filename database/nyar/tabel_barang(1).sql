-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 05:41 PM
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
-- Table structure for table `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `id_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `id_kategori` int(7) NOT NULL,
  `deskripsi` text,
  `harga` int(8) NOT NULL,
  `stok` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_barang`
--

INSERT INTO `tabel_barang` (`id_barang`, `nama_barang`, `id_kategori`, `deskripsi`, `harga`, `stok`, `time`) VALUES
('1TGeq', 'Brown Shoe', 3, 'mmmanna', 1, 0, '2019-11-13 17:00:21'),
('3CJLc', 'Subara', 3, 'Barang WAW', 300000, 0, '2019-12-08 00:58:39'),
('3FXNK', 'cok', 2, 'asd', 22222, 0, '2019-12-08 02:52:32'),
('6xqON', 'jkajkj', 3, NULL, 809898, 0, '2019-12-10 03:43:24'),
('8ackR', 'Jeans Casual Denim', 8, '', 200, 0, '2019-11-13 16:59:26'),
('9bdT1', 'FRIEND', 3, 'Jurang Dalam', 40000, 0, '2019-12-08 01:08:39'),
('9Jad0', 'Ahoy', 7, 'Mantab', 3000, 0, '2019-12-10 01:25:47'),
('Csb53', 'ksnxkmkx', 2, NULL, 787, 0, '2019-12-10 03:37:29'),
('DSEpu', 'Sepatu Kulit Cokelat', 3, '', 32220, 0, '2019-11-19 03:08:38'),
('dyHhw', 'aeea', 5, 'qeeqew', 42324, 0, '2019-12-13 09:36:18'),
('f2CDy', 'adada', 5, 'adad', 898, 90, '2019-12-13 09:59:35'),
('Hl025', 'Sepatu Kulit Manusia', 3, 'walalalala', 200000, 0, '2019-11-13 16:59:26'),
('HXyoJ', 'ada', 3, 'qeqeq', 2411, 1212, '2019-12-13 09:38:27'),
('I9qfM', 'Woman Bag', 7, NULL, 300000, 0, '2019-11-13 16:59:26'),
('jlU4R', 'zdas', 3, 'eqeqwe', 4234, 21, '2019-12-14 23:02:59'),
('JOvHR', 'waww', 2, 'harga murah cuy', 455, 0, '2019-12-09 22:49:53'),
('JZvi7', 'Wororor', 3, '900', 50000, 0, '2019-12-08 02:27:43'),
('m0zKW', 'kkaaka', 5, NULL, 9882920, 123, '2019-12-10 03:52:54'),
('n08Zf', 'Remuk', 3, 'Anda Keren', 70003, 0, '2019-12-07 23:17:40'),
('OXtWF', 'Mamam', 5, NULL, 7000, 23, '2019-12-10 03:58:20'),
('r2kzo', 'Waaaar', 3, 'Jos', 989878, 0, '2019-12-10 01:28:01'),
('RlZn2', 'Shoes', 2, 'Oooooy', 20000, 0, '2019-11-21 08:37:31'),
('si6JR', 'qqewwqeq', 3, NULL, 3000, 0, '2019-12-13 09:21:43'),
('slMIA', 'mentari', 7, 'wowow', 5000, 0, '2019-12-08 00:41:38'),
('X6SM7', 'Ahaay', 5, 'kereeeen', 3400, 0, '2019-12-08 01:18:58'),
('ZIX5c', 'oidauoij', 3, NULL, 9892898, 0, '2019-12-10 03:49:40'),
('ZYpHX', 'awada', 3, 'ewewqe', 1312, 0, '2019-12-13 09:34:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
