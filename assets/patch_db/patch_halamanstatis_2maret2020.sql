-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 04:39 PM
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
-- Table structure for table `halaman_statis`
--

CREATE TABLE `halaman_statis` (
  `id_halaman` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `jenis_halaman` enum('profile-desa','visi-misi') NOT NULL,
  `headline_halaman` varchar(250) DEFAULT NULL,
  `isi_halaman` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halaman_statis`
--

INSERT INTO `halaman_statis` (`id_halaman`, `id_desa`, `jenis_halaman`, `headline_halaman`, `isi_halaman`, `created_at`, `updated_at`) VALUES
(1, 2, 'profile-desa', 'profile-desa-1583163544.jpg', '<p><img src=\"http://localhost/new-sisdes/sisdes/assets/file/wanadadi/profile-desa-2-wanadadi1583163532.jpg\" style=\"width: 25%; float: left;\" class=\"note-float-left\">Mantappppppppppppppp</p>', '2020-03-02 22:01:34', '2020-03-02 22:39:04'),
(2, 2, 'visi-misi', 'visi-misi-1583163378.jpg', '<p><img src=\"http://localhost/new-sisdes/sisdes/assets/file/wanadadi/visi-misi-2-wanadadi1583163353.JPG\" xss=\"removed\" class=\"note-float-left\" style=\"width: 25%;\">Mantap Mantap</p>', '2020-03-02 22:34:58', '2020-03-02 22:38:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `halaman_statis`
--
ALTER TABLE `halaman_statis`
  ADD PRIMARY KEY (`id_halaman`),
  ADD KEY `halaman_desa` (`id_desa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `halaman_statis`
--
ALTER TABLE `halaman_statis`
  MODIFY `id_halaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `halaman_statis`
--
ALTER TABLE `halaman_statis`
  ADD CONSTRAINT `halaman_desa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
