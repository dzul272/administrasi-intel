-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 06:47 AM
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
-- Table structure for table `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id_kategori` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `route_kategori` varchar(200) NOT NULL,
  `isprotect_kategori` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id_kategori`, `id_desa`, `nama_kategori`, `route_kategori`, `isprotect_kategori`, `created_at`, `updated_at`) VALUES
(1, 2, 'Umum', 'umum', 1, '2020-02-28 01:16:59', '2020-02-28 01:16:59'),
(2, 2, 'Potensi & Produk Desa', 'potensi-dan-produk-desa', 1, '2020-02-28 01:16:59', '2020-02-28 01:16:59'),
(3, 2, 'Kriminal', 'kriminal', 0, '2020-02-28 01:17:19', '2020-02-28 03:55:47'),
(4, 2, 'Kabar Desa', 'kabar-desa', 0, '2020-02-28 03:21:34', '2020-02-28 03:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `judul_slider` varchar(100) NOT NULL,
  `isi_slider` text NOT NULL,
  `foto_slider` text NOT NULL,
  `is_active` int(2) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `id_desa`, `judul_slider`, `isi_slider`, `foto_slider`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 2, 'Lomba yuk', 'Egrang hehehe', 'wanadadi_lomba_yuk_1582745649.jpg', 0, '2020-02-27 02:34:09', '2020-02-27 22:26:23'),
(3, 2, 'Rafli Ganteng', 'Ya jelas', 'wanadadi_rafli_ganteng_1582815082.jpg', 1, '2020-02-27 20:42:35', '2020-02-27 22:27:00'),
(4, 2, 'Book Circle Dong', 'Elevate People Hehehe skuy', 'wanadadi_book_circle_dong_skuy_1582814936.jpg', 0, '2020-02-27 20:56:41', '2020-02-27 22:26:07'),
(5, 2, 'Book Circle Aja', 'Bookcircle | Elevate People Skuy', 'wanadadi_book_circle_aja_1582816360.PNG', 1, '2020-02-27 21:50:03', '2020-02-27 22:26:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `kategori_artikel` (`id_desa`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`),
  ADD KEY `slide_desa` (`id_desa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD CONSTRAINT `kategori_artikel` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);

--
-- Constraints for table `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `slide_desa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
