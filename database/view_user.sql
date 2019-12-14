-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2019 at 03:38 PM
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
-- Structure for view `view_user`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user`  AS  select `a`.`id_user` AS `id_user`,`a`.`nama_user` AS `nama_user`,`a`.`email` AS `email`,`a`.`status_email` AS `status_email`,`a`.`username` AS `username`,`a`.`no_telp` AS `no_telp`,`a`.`dob` AS `dob`,`a`.`kode` AS `kode`,`b`.`alamat` AS `alamat`,`b`.`kota` AS `kota`,`b`.`provinsi` AS `provinsi`,`b`.`negara` AS `negara`,`b`.`kode_pos` AS `kode_pos` from (`tabel_user` `a` join `tabel_alamat` `b`) where (`a`.`id_user` = `b`.`id_user`) ;

--
-- VIEW  `view_user`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
