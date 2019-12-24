-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2019 at 02:46 PM
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
  `id_transaksi` varchar(8) NOT NULL,
  `id_user` varchar(7) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `qty` int(3) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_temp_detail_transaksi`
--

CREATE TABLE `tabel_temp_detail_transaksi` (
  `id_detail_temp_transaksi` varchar(5) NOT NULL,
  `id_transaksi` varchar(8) NOT NULL,
  `id_user` varchar(7) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `qty` int(3) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_temp_detail_transaksi`
--

INSERT INTO `tabel_temp_detail_transaksi` (`id_detail_temp_transaksi`, `id_transaksi`, `id_user`, `id_barang`, `qty`, `subtotal`, `tanggal`) VALUES
('K2TGx', 'Fz2UO', '2', '8ackR', 1, 2, '2019-12-02 21:29:55'),
('QPGxD', 'Fz2UO', '2', '1TGeq', 1, 1, '2019-12-02 21:29:50'),
('rdOZs', 'Fz2UO', '2', 'DSEpu', 7, 21, '2019-12-02 21:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_temp_transaksi`
--

CREATE TABLE `tabel_temp_transaksi` (
  `id_transaksi` varchar(8) NOT NULL,
  `id_user` int(7) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `total` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_temp_transaksi`
--

INSERT INTO `tabel_temp_transaksi` (`id_transaksi`, `id_user`, `tanggal`, `total`) VALUES
('Fz2UO', 2, '2019-12-02 21:11:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `id_transaksi` varchar(5) NOT NULL,
  `id_user` int(7) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `total` int(9) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `alamat pengiriman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_detail_transaksi`
--
ALTER TABLE `tabel_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tabel_temp_detail_transaksi`
--
ALTER TABLE `tabel_temp_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_temp_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tabel_temp_transaksi`
--
ALTER TABLE `tabel_temp_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
