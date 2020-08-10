-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 09:05 AM
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
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `no_artikel` int(11) NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_file`, `id_desa`, `no_artikel`, `nama_file`, `created_at`, `updated_at`) VALUES
(4, 2, 6, '6-1582896490.jpg', '2020-02-28 20:28:10', '2020-02-28 20:28:10'),
(5, 2, 7, '7-1582896700.jpg', '2020-02-28 20:31:40', '2020-02-28 20:31:40'),
(9, 2, 8, '8-1582997211.png', '2020-03-01 00:26:51', '2020-03-01 00:26:51'),
(10, 2, 8, '8-1582997245.png', '2020-03-01 00:27:25', '2020-03-01 00:27:25'),
(11, 2, 16, '16-1583004011.png', '2020-03-01 02:20:11', '2020-03-01 02:20:11'),
(12, 2, 20, '20-1583006476.png', '2020-03-01 03:01:16', '2020-03-01 03:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `komponen_kontak`
--

CREATE TABLE `komponen_kontak` (
  `id_kontak` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `nama_kontak` varchar(100) NOT NULL,
  `nomor_kontak` varchar(20) NOT NULL,
  `is_favorite` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen_kontak`
--

INSERT INTO `komponen_kontak` (`id_kontak`, `id_desa`, `nama_kontak`, `nomor_kontak`, `is_favorite`, `created_at`, `updated_at`) VALUES
(4, 2, 'Senia', '081391052661', 0, '2020-03-02 01:54:46', '2020-03-02 01:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `komponen_sambutan`
--

CREATE TABLE `komponen_sambutan` (
  `id_sambutan` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `foto_sambutan` varchar(250) NOT NULL,
  `ketfoto_sambutan` varchar(50) NOT NULL,
  `video_sambutan` varchar(250) NOT NULL,
  `judul_sambutan` varchar(100) NOT NULL,
  `isi_sambutan` text NOT NULL,
  `penyambut_sambutan` varchar(50) NOT NULL,
  `jabatan_sambutan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen_sambutan`
--

INSERT INTO `komponen_sambutan` (`id_sambutan`, `id_desa`, `foto_sambutan`, `ketfoto_sambutan`, `video_sambutan`, `judul_sambutan`, `isi_sambutan`, `penyambut_sambutan`, `jabatan_sambutan`, `created_at`, `updated_at`) VALUES
(1, 2, 'wanadadi_foto_sambutan_1583060195.jpg', 'Pemerintah', 'https://www.youtube.com/watch?v=TLbevoyuv7c', 'Selamat Data Di Desa Wanadadi', 'Assalamualaikum wr wb.<br>\r\nSaya Rafli Firdausy irawan', 'Rafli Firdausy Irawan', 'Kepala Desa', '2020-03-01 16:34:20', '2020-03-01 18:08:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`),
  ADD UNIQUE KEY `nama_file` (`nama_file`),
  ADD KEY `file_desa` (`id_desa`);

--
-- Indexes for table `komponen_kontak`
--
ALTER TABLE `komponen_kontak`
  ADD PRIMARY KEY (`id_kontak`),
  ADD KEY `kontak_desa` (`id_desa`);

--
-- Indexes for table `komponen_sambutan`
--
ALTER TABLE `komponen_sambutan`
  ADD PRIMARY KEY (`id_sambutan`),
  ADD KEY `sambutan_desa` (`id_desa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `komponen_kontak`
--
ALTER TABLE `komponen_kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komponen_sambutan`
--
ALTER TABLE `komponen_sambutan`
  MODIFY `id_sambutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_desa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);

--
-- Constraints for table `komponen_kontak`
--
ALTER TABLE `komponen_kontak`
  ADD CONSTRAINT `kontak_desa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);

--
-- Constraints for table `komponen_sambutan`
--
ALTER TABLE `komponen_sambutan`
  ADD CONSTRAINT `sambutan_desa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
