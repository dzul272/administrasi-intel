-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2020 at 09:12 PM
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
-- Table structure for table `sk_bpd`
--

CREATE TABLE `sk_bpd` (
  `id_sk_bpd` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `nomor` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `tentang` varchar(200) NOT NULL,
  `uraian` text NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_kades`
--

CREATE TABLE `sk_kades` (
  `id_sk_kades` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `no_kades` varchar(200) NOT NULL,
  `tgl_kades` date NOT NULL,
  `tentang` text NOT NULL,
  `uraian` text NOT NULL,
  `no_diundangkan` varchar(200) NOT NULL,
  `tgl_diundangkan` date NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_pengundangan_perdes`
--

CREATE TABLE `sk_pengundangan_perdes` (
  `id_sk_pengundangan_perdes` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `no_perdes` varchar(200) NOT NULL,
  `tgl_perdes` date NOT NULL,
  `tentang` varchar(200) NOT NULL,
  `uraian` text NOT NULL,
  `no_pengundangan` varchar(200) NOT NULL,
  `tgl_pengundangan` date NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_pengundangan_perkades`
--

CREATE TABLE `sk_pengundangan_perkades` (
  `id_sk_pengundangan_perkades` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `no_perkades` varchar(200) NOT NULL,
  `tgl_perkades` date NOT NULL,
  `tentang` varchar(200) NOT NULL,
  `uraian` text NOT NULL,
  `no_pengundangan` varchar(200) NOT NULL,
  `tgl_pengundangan` date NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_perdes`
--

CREATE TABLE `sk_perdes` (
  `id_sk_perdes` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `no_perdes` varchar(200) NOT NULL,
  `tgl_perdes` date NOT NULL,
  `tentang` varchar(200) NOT NULL,
  `uraian` text NOT NULL,
  `no_persetujuan` varchar(200) NOT NULL,
  `tgl_persetujuan` date NOT NULL,
  `no_dilaporkan` varchar(200) NOT NULL,
  `tgl_dilaporkan` date NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_perkades`
--

CREATE TABLE `sk_perkades` (
  `id_sk_perkades` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `no_perkades` varchar(200) NOT NULL,
  `tgl_perkades` date NOT NULL,
  `tentang` varchar(200) NOT NULL,
  `uraian` text NOT NULL,
  `no_pengundangan` varchar(200) NOT NULL,
  `tgl_pengundangan` date NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sk_bpd`
--
ALTER TABLE `sk_bpd`
  ADD PRIMARY KEY (`id_sk_bpd`),
  ADD KEY `bpd_desa` (`id_desa`);

--
-- Indexes for table `sk_kades`
--
ALTER TABLE `sk_kades`
  ADD PRIMARY KEY (`id_sk_kades`),
  ADD KEY `skkades_desa` (`id_desa`);

--
-- Indexes for table `sk_pengundangan_perdes`
--
ALTER TABLE `sk_pengundangan_perdes`
  ADD PRIMARY KEY (`id_sk_pengundangan_perdes`),
  ADD KEY `pengundangan_perkades` (`id_desa`);

--
-- Indexes for table `sk_pengundangan_perkades`
--
ALTER TABLE `sk_pengundangan_perkades`
  ADD PRIMARY KEY (`id_sk_pengundangan_perkades`),
  ADD KEY `peng_perkades` (`id_desa`);

--
-- Indexes for table `sk_perdes`
--
ALTER TABLE `sk_perdes`
  ADD PRIMARY KEY (`id_sk_perdes`),
  ADD KEY `desa_perdes` (`id_desa`);

--
-- Indexes for table `sk_perkades`
--
ALTER TABLE `sk_perkades`
  ADD PRIMARY KEY (`id_sk_perkades`),
  ADD KEY `desa_perkades` (`id_desa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sk_bpd`
--
ALTER TABLE `sk_bpd`
  MODIFY `id_sk_bpd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_kades`
--
ALTER TABLE `sk_kades`
  MODIFY `id_sk_kades` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_pengundangan_perdes`
--
ALTER TABLE `sk_pengundangan_perdes`
  MODIFY `id_sk_pengundangan_perdes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_pengundangan_perkades`
--
ALTER TABLE `sk_pengundangan_perkades`
  MODIFY `id_sk_pengundangan_perkades` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_perdes`
--
ALTER TABLE `sk_perdes`
  MODIFY `id_sk_perdes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_perkades`
--
ALTER TABLE `sk_perkades`
  MODIFY `id_sk_perkades` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sk_bpd`
--
ALTER TABLE `sk_bpd`
  ADD CONSTRAINT `bpd_desa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);

--
-- Constraints for table `sk_kades`
--
ALTER TABLE `sk_kades`
  ADD CONSTRAINT `skkades_desa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);

--
-- Constraints for table `sk_pengundangan_perdes`
--
ALTER TABLE `sk_pengundangan_perdes`
  ADD CONSTRAINT `pengundangan_perkades` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);

--
-- Constraints for table `sk_pengundangan_perkades`
--
ALTER TABLE `sk_pengundangan_perkades`
  ADD CONSTRAINT `peng_perkades` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);

--
-- Constraints for table `sk_perdes`
--
ALTER TABLE `sk_perdes`
  ADD CONSTRAINT `desa_perdes` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);

--
-- Constraints for table `sk_perkades`
--
ALTER TABLE `sk_perkades`
  ADD CONSTRAINT `desa_perkades` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
