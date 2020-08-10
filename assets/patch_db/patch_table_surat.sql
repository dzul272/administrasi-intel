-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 04:20 AM
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
-- Table structure for table `surat`
--

DROP TABLE IF EXISTS `surat`;
CREATE TABLE IF NOT EXISTS `surat` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) NOT NULL,
  `id_tipesurat` int(11) DEFAULT NULL,
  `id_pamong` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `nomer_surat` varchar(200) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal_surat` text,
  `asal_surat` varchar(100) NOT NULL,
  `tujuan_surat` varchar(100) NOT NULL,
  `jenis_surat` enum('masuk','keluar') NOT NULL,
  `namafile_surat` text,
  `nikpeminta_surat` varchar(20) NOT NULL,
  `namapeminta_surat` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_surat`),
  KEY `fk_id_desa_surat` (`id_desa`),
  KEY `fk_id_tipesurat_surat` (`id_tipesurat`),
  KEY `fk_pamong` (`id_pamong`),
  KEY `fk_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `fk_id_desa_surat` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_tipesurat_surat` FOREIGN KEY (`id_tipesurat`) REFERENCES `tipesurat` (`id_tipesurat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pamong` FOREIGN KEY (`id_pamong`) REFERENCES `pamong` (`id_pamong`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
