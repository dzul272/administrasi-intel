-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 05:43 PM
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
-- Table structure for table `headline`
--

CREATE TABLE `headline` (
  `id_headline` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `jenis_headline` enum('artikel','footer') NOT NULL,
  `gambar_headline` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `headline`
--

INSERT INTO `headline` (`id_headline`, `id_desa`, `jenis_headline`, `gambar_headline`, `created_at`, `updated_at`) VALUES
(1, 2, 'artikel', 'headline-arrtikel-1583167307.jpg', '2020-03-02 23:41:47', '2020-03-02 23:41:47'),
(2, 2, 'footer', 'headline-footer-1583167345.JPG', '2020-03-02 23:41:57', '2020-03-02 23:42:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `headline`
--
ALTER TABLE `headline`
  ADD PRIMARY KEY (`id_headline`),
  ADD KEY `headline_desa` (`id_desa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `headline`
--
ALTER TABLE `headline`
  MODIFY `id_headline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `headline`
--
ALTER TABLE `headline`
  ADD CONSTRAINT `headline_desa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
