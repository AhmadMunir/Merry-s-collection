-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2019 at 05:13 AM
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
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` int(7) NOT NULL,
  `nama_admin` varchar(45) NOT NULL,
  `email_admin` varchar(45) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`id_admin`, `nama_admin`, `email_admin`, `no_telpon`, `alamat`, `username`, `password`) VALUES
(1, 'munir', 'oi@gmail.com', '08298298298', 'bondowoso', 'munir', 'munir');

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
('1', 1, 'Rt 9  Rw 4 Sukosari Lor', 'Bondowoso', 'Jawa Timur', 'Indonesia', '68287'),
('2', 2, 'Perumahan Mastrip Blok S no 10', 'Jember', 'Jawa Timur', 'Indonesia', '68121');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `id_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `id_kategori` int(7) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `deskripsi` text,
  `harga` int(8) NOT NULL,
  `stok` int(3) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_barang`
--

INSERT INTO `tabel_barang` (`id_barang`, `nama_barang`, `id_kategori`, `gambar`, `deskripsi`, `harga`, `stok`, `time`) VALUES
('1TGeq', 'Brown Shoe', 3, '5dcbd4353a0de.jpg', NULL, 100000, 0, '2019-11-13 17:00:21'),
('8ackR', 'Jeans Casual Denim', 8, '5dcbbc28be475.jpg', NULL, 100000, 10, '2019-11-13 16:59:26'),
('Hl025', 'Sepatu Kulit Manusia', 3, '5dcbb4a4a625f.jpg', NULL, 200000, 29, '2019-11-13 16:59:26'),
('I9qfM', 'Woman Bag', 7, '5dcbb1645e490.jpg', NULL, 300000, 4, '2019-11-13 16:59:26'),
('O7pax', 'Shoe Crocodiles Skin', 3, '5dcbd32b194ec.jpg', NULL, 5000000, 1, '2019-11-13 16:59:26'),
('T7VbS', 'Womans Jackets Time Now', 5, '5dcbbc5cd6ede.jpg', NULL, 150000, 10, '2019-11-13 16:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_detail_stok`
--

CREATE TABLE `tabel_detail_stok` (
  `id_detail_stok` int(2) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `size` varchar(3) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_detail_stok`
--

INSERT INTO `tabel_detail_stok` (`id_detail_stok`, `id_barang`, `size`, `deskripsi`, `jumlah_stok`) VALUES
(9, 'I9qfM', '1', '1', 4),
(10, 'Hl025', '38', '-', 19),
(11, 'Hl025', '39', '-', 2),
(12, 'Hl025', '40', '-', 8),
(13, '8ackR', 'S', '-', 2),
(14, '8ackR', 'M', '-', 3),
(15, '8ackR', 'L', '-', 5),
(16, 'T7VbS', 'S', '-', 3),
(17, 'T7VbS', 'M', '-', 7),
(18, 'O7pax', '38', '38', 1),
(19, '1TGeq', '-', '-', 0);

--
-- Triggers `tabel_detail_stok`
--
DELIMITER $$
CREATE TRIGGER `stok_barang` AFTER INSERT ON `tabel_detail_stok` FOR EACH ROW UPDATE tabel_barang
SET stok = (SELECT SUM(jumlah_stok) FROM tabel_detail_stok WHERE id_barang = new.id_barang)
WHERE id_barang = new.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_barang_2` AFTER UPDATE ON `tabel_detail_stok` FOR EACH ROW UPDATE tabel_barang
SET stok = (SELECT SUM(jumlah_stok) FROM tabel_detail_stok WHERE id_barang = new.id_barang)
WHERE id_barang = new.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_detail_transaksi`
--

CREATE TABLE `tabel_detail_transaksi` (
  `id_detail` int(7) NOT NULL,
  `id_transaksi` varchar(10) NOT NULL,
  `id_barang` int(7) NOT NULL,
  `qty` int(3) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kategori`
--

CREATE TABLE `tabel_kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kategori`
--

INSERT INTO `tabel_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Dompet'),
(3, 'Sepatu'),
(5, 'Jaket'),
(6, 'Baju'),
(7, 'Tas'),
(8, 'Jeans');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_temp_detail_transaksi`
--

CREATE TABLE `tabel_temp_detail_transaksi` (
  `id_detail` int(7) NOT NULL,
  `id_transaksi` varchar(10) NOT NULL,
  `id_barang` int(7) NOT NULL,
  `qty` int(3) NOT NULL,
  `subtotal` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_temp_trans`
--

CREATE TABLE `tabel_temp_trans` (
  `id_transaksi` varchar(10) NOT NULL,
  `id_user` int(7) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `id_user` int(7) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(7) NOT NULL,
  `nama_user` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `status_email` varchar(11) NOT NULL DEFAULT 'unverified',
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `kode` varchar(12) NOT NULL,
  `dob` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `nama_user`, `email`, `status_email`, `username`, `password`, `no_telp`, `kode`, `dob`) VALUES
(1, 'Ahmad Munir', 'hel000941@gmail.com', 'unverified', 'munir', '123', '123qwe', 'RI9lTNJaU58x', '1999-02-08'),
(2, 'Ridi', 'ridisnasd@gmail.coms', 'unverified', 'ridi', 'asd', '082982098', '4zTft8yAo1Dx', '1998-09-06');

--
-- Triggers `tabel_user`
--
DELIMITER $$
CREATE TRIGGER `in_idalamat` AFTER INSERT ON `tabel_user` FOR EACH ROW INSERT INTO tabel_alamat SET
id_alamat = new.id_user, id_user = new.id_user
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barang`
-- (See below for the actual view)
--
CREATE TABLE `view_barang` (
`id_barang` varchar(5)
,`nama_barang` varchar(30)
,`id_kategori` int(7)
,`gambar` varchar(30)
,`harga` int(8)
,`stok` int(3)
,`nama_kategori` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user`
-- (See below for the actual view)
--
CREATE TABLE `view_user` (
`id_user` int(7)
,`nama_user` varchar(45)
,`email` varchar(45)
,`status_email` varchar(11)
,`username` varchar(30)
,`no_telp` varchar(20)
,`dob` varchar(10)
,`kode` varchar(12)
,`alamat` varchar(45)
,`kota` varchar(30)
,`provinsi` varchar(30)
,`negara` varchar(45)
,`kode_pos` varchar(6)
);

-- --------------------------------------------------------

--
-- Structure for view `view_barang`
--
DROP TABLE IF EXISTS `view_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang`  AS  select `b`.`id_barang` AS `id_barang`,`b`.`nama_barang` AS `nama_barang`,`b`.`id_kategori` AS `id_kategori`,`b`.`gambar` AS `gambar`,`b`.`harga` AS `harga`,`b`.`stok` AS `stok`,`a`.`nama_kategori` AS `nama_kategori` from (`tabel_kategori` `a` join `tabel_barang` `b`) where (`b`.`id_kategori` = `a`.`id_kategori`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_user`
--
DROP TABLE IF EXISTS `view_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user`  AS  select `a`.`id_user` AS `id_user`,`a`.`nama_user` AS `nama_user`,`a`.`email` AS `email`,`a`.`status_email` AS `status_email`,`a`.`username` AS `username`,`a`.`no_telp` AS `no_telp`,`a`.`dob` AS `dob`,`a`.`kode` AS `kode`,`b`.`alamat` AS `alamat`,`b`.`kota` AS `kota`,`b`.`provinsi` AS `provinsi`,`b`.`negara` AS `negara`,`b`.`kode_pos` AS `kode_pos` from (`tabel_user` `a` join `tabel_alamat` `b`) where (`a`.`id_user` = `b`.`id_user`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tabel_alamat`
--
ALTER TABLE `tabel_alamat`
  ADD PRIMARY KEY (`id_alamat`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tabel_detail_stok`
--
ALTER TABLE `tabel_detail_stok`
  ADD PRIMARY KEY (`id_detail_stok`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tabel_detail_transaksi`
--
ALTER TABLE `tabel_detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  ADD PRIMARY KEY (`id_kategori`) USING BTREE;

--
-- Indexes for table `tabel_temp_detail_transaksi`
--
ALTER TABLE `tabel_temp_detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tabel_temp_trans`
--
ALTER TABLE `tabel_temp_trans`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `id_admin` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_detail_stok`
--
ALTER TABLE `tabel_detail_stok`
  MODIFY `id_detail_stok` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tabel_detail_transaksi`
--
ALTER TABLE `tabel_detail_transaksi`
  MODIFY `id_detail` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tabel_temp_detail_transaksi`
--
ALTER TABLE `tabel_temp_detail_transaksi`
  MODIFY `id_detail` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_detail_stok`
--
ALTER TABLE `tabel_detail_stok`
  ADD CONSTRAINT `tabel_detail_stok_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tabel_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_detail_transaksi`
--
ALTER TABLE `tabel_detail_transaksi`
  ADD CONSTRAINT `tabel_detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tabel_transaksi` (`id_transaksi`);

--
-- Constraints for table `tabel_temp_detail_transaksi`
--
ALTER TABLE `tabel_temp_detail_transaksi`
  ADD CONSTRAINT `tabel_temp_detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tabel_temp_trans` (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
