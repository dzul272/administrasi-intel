-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 07:49 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_sisdes`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `kecamatan_desa` varchar(100) NOT NULL,
  `kabupaten_desa` varchar(100) NOT NULL,
  `provinsi_desa` varchar(100) NOT NULL,
  `dusun_desa` varchar(30) DEFAULT NULL,
  `namakantor_desa` varchar(50) DEFAULT NULL,
  `alamatkantor_desa` text,
  `kodepos_desa` varchar(6) DEFAULT NULL,
  `notelp_desa` varchar(20) DEFAULT NULL,
  `email_desa` varchar(100) DEFAULT NULL,
  `deskripsi_desa` text,
  `website_desa` varchar(100) DEFAULT NULL,
  `logo_desa` text,
  `path_desa` varchar(50) DEFAULT NULL,
  `userid_desa` varchar(100) DEFAULT NULL,
  `password_desa` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `nama_desa`, `kecamatan_desa`, `kabupaten_desa`, `provinsi_desa`, `dusun_desa`, `namakantor_desa`, `alamatkantor_desa`, `kodepos_desa`, `notelp_desa`, `email_desa`, `deskripsi_desa`, `website_desa`, `logo_desa`, `path_desa`, `userid_desa`, `password_desa`, `created_at`, `updated_at`) VALUES
(2, 'Wanadadi', 'Wanadadi', 'Kab. Banjarnegara', 'Jawa Tengah', 'Wanawani', 'Balai Desa', 'Jalan Jalan Yuk', '53181', '085726096515', 'wanadadi@gmail.com', 'Klahang Bersatu Jaya', 'localhost/new-sisdes/web_desa/pake-ci/', 'wanadadi_logo_1582741416.jpg', '10_wanadadi', 'PRATAMAYUDHASANTOSA', '10_wanadadi', '2020-02-06 18:48:04', '2020-02-27 01:23:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD UNIQUE KEY `website_desa` (`website_desa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
