-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2019 at 02:43 AM
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
-- Table structure for table `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `id_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `id_kategori` int(7) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(8) NOT NULL,
  `stok` int(3) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_barang`
--

INSERT INTO `tabel_barang` (`id_barang`, `nama_barang`, `id_kategori`, `gambar`, `deskripsi`, `harga`, `stok`, `time`) VALUES
('1TGeq', 'Brown Shoe', 3, '5dcbd4353a0de.jpg', NULL, 100000, 0, '2019-11-13 17:00:21'),
('8ackR', 'Jeans Casual Denim', 8, '5dcbbc28be475.jpg', NULL, 100000, 10, '2019-11-13 16:59:26'),
('DSEpu', 'Sepatu Kulit Cokelat', 3, 'default.jpg', NULL, 2000, 1, '2019-11-19 03:08:38'),
('Hl025', 'Sepatu Kulit Manusia', 3, '5dcbb4a4a625f.jpg', NULL, 200000, 29, '2019-11-13 16:59:26'),
('I9qfM', 'Woman Bag', 7, '5dcbb1645e490.jpg', NULL, 300000, 4, '2019-11-13 16:59:26'),
('O7pax', 'Shoe Crocodiles Skin', 3, '5dcbd32b194ec.jpg', NULL, 5000000, 1, '2019-11-13 16:59:26'),
('RlZn2', 'Shoes', 2, 'default.jpg', NULL, 20000, 2, '2019-11-21 08:37:31'),
('T7VbS', 'Womans Jackets Time Now', 5, '5dcbbc5cd6ede.jpg', NULL, 150000, 10, '2019-11-13 16:59:26');

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
