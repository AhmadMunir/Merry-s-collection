-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2019 pada 16.27
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

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
-- Struktur untuk view `laporan_transaksi`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_transaksi`  AS  select `tabel_transaksi`.`id_transaksi` AS `id_transaksi`,`tabel_user`.`nama_user` AS `nama_user`,`tabel_barang`.`nama_barang` AS `nama_barang`,`tabel_detail_transaksi`.`tanggal` AS `tanggal`,`tabel_transaksi`.`alamat_pengiriman` AS `alamat_pengiriman`,`tabel_transaksi`.`status` AS `status`,`tabel_transaksi`.`total` AS `total` from (((`tabel_transaksi` join `tabel_user`) join `tabel_barang`) join `tabel_detail_transaksi`) where ((`tabel_transaksi`.`id_user` = `tabel_user`.`id_user`) and (`tabel_barang`.`id_barang` = `tabel_detail_transaksi`.`id_barang`) and (`tabel_detail_transaksi`.`id_transaksi` = `tabel_transaksi`.`id_transaksi`)) ;

--
-- VIEW  `laporan_transaksi`
-- Data: Tidak ada
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
