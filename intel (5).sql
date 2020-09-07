-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2020 at 03:51 PM
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
-- Database: `intel`
--

-- --------------------------------------------------------

--
-- Table structure for table `din1`
--

CREATE TABLE `din1` (
  `id` int(11) NOT NULL,
  `din_id` int(11) DEFAULT NULL,
  `siabidibam` text,
  `keterangan` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `din1`
--

INSERT INTO `din1` (`id`, `din_id`, `siabidibam`, `keterangan`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 26, 'Rafli Firdausy', 'waoawkoakw', 1, '2020-08-12 04:11:07', NULL, NULL),
(2, 6, 'aw', 'sdsd', 1, '2020-08-12 04:11:27', '2020-08-23 14:12:36', '2020-08-23 14:12:36'),
(3, 3, 'sdsd', 'sd', 1, '2020-08-12 04:11:49', '2020-08-23 14:12:32', '2020-08-23 14:12:32'),
(4, 10, 'aw', 'sdds', 1, '2020-08-12 04:13:15', NULL, NULL),
(5, 21, 'sd', 'sdd', 1, '2020-08-12 04:13:37', NULL, NULL),
(6, 18, 's', '', 1, '2020-08-12 04:16:05', '2020-08-12 04:32:24', NULL),
(7, 13, 'wadaw', '', 1, '2020-08-12 04:16:31', '2020-08-12 04:32:30', NULL),
(8, 13, 'awawaw', 'sdsdsd', 1, '2020-08-12 04:16:46', '2020-08-12 04:32:34', NULL),
(9, 19, 'Cobacoba', 'oke', 1, '2020-08-20 13:23:15', '2020-08-20 13:40:58', NULL),
(10, 22, 'Cobain Gobang', 'Mantap awokaow', 1, '2020-08-20 14:00:01', NULL, NULL),
(11, 20, 'Iain aowkaow', 'hehehe', 1, '2020-08-20 14:01:01', '2020-08-23 14:12:43', '2020-08-23 14:12:43'),
(12, 15, 'Rafli Ganteng', 'Hehehe', 1, '2020-08-20 14:08:54', NULL, NULL),
(13, 26, 'Rafli Oji', 'Hehehe', 1, '2020-08-20 14:20:40', '2020-08-23 14:12:24', '2020-08-23 14:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `din2s6`
--

CREATE TABLE `din2s6` (
  `id` int(11) NOT NULL,
  `simbol` text,
  `sektor` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `jenis_din` int(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `din2s6`
--

INSERT INTO `din2s6` (`id`, `simbol`, `sektor`, `keterangan`, `jenis_din`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1597085328.jpg', 'Sektor Coba Mantap', 'aowkoakw', 2, 1, '2020-08-11 01:48:48', '2020-08-12 03:57:12', NULL),
(2, '1597085750.png', 'Coba', 'asdknasd', 2, 1, '2020-08-11 01:55:50', '2020-08-12 03:57:12', NULL),
(3, '1597085771.jpg', 'aw', 'dasdasd', 2, 1, '2020-08-11 01:56:11', '2020-08-12 03:57:12', NULL),
(4, '1597085328.jpg', 'Sektor Coba Mantap', 'aowkoakw', 2, 1, '2020-08-11 01:48:48', '2020-08-12 03:57:12', NULL),
(5, '1597085750.png', 'Coba', 'asdknasd', 2, 1, '2020-08-11 01:55:50', '2020-08-12 03:57:12', NULL),
(6, '1597085771.jpg', 'aw', 'dasdasd', 2, 1, '2020-08-11 01:56:11', '2020-08-12 03:57:12', NULL),
(7, '1597085328.jpg', 'Sektor Coba Mantap', 'aowkoakw', 2, 1, '2020-08-11 01:48:48', '2020-08-12 03:57:12', NULL),
(8, '1597085750.png', 'Coba', 'asdknasd', 2, 1, '2020-08-11 01:55:50', '2020-08-12 03:57:12', NULL),
(9, '1597085771.jpg', 'aw', 'dasdasd', 2, 1, '2020-08-11 01:56:11', '2020-08-12 03:57:12', NULL),
(10, '1597085328.jpg', 'Sektor Coba Mantap', 'aowkoakw', 2, 1, '2020-08-11 01:48:48', '2020-08-12 03:57:12', NULL),
(11, '1597085750.png', 'Coba', 'asdknasd', 2, 1, '2020-08-11 01:55:50', '2020-08-12 03:57:12', NULL),
(12, '1597085771.jpg', 'aw', 'dasdasd', 2, 1, '2020-08-11 01:56:11', '2020-08-23 09:55:48', '2020-08-23 09:55:48'),
(13, '1597088265.jpg', 'asdasdasd', 'asdasd', 2, 1, '2020-08-11 02:37:45', '2020-08-12 03:57:12', NULL),
(14, '1597093295.jpg', 'Manaaap', 'Keterangan', 2, 1, '2020-08-11 03:23:55', '2020-08-12 03:57:12', NULL),
(15, '1597093360.jpg', 'Rafli Ganteng', 'oawkoakwoaw Yahuud', 2, 1, '2020-08-11 03:26:23', '2020-08-12 03:57:12', NULL),
(16, '1597093486.jpg', 'Vivin', 'Mantap', 2, 1, '2020-08-11 04:04:46', '2020-08-12 03:57:12', NULL),
(17, '1597094618.jpg', 'Cantik', 'Yuhu Mantap', 2, 1, '2020-08-11 04:23:11', '2020-08-12 03:57:12', NULL),
(18, '1597119934.png', 'Apa', 'aksndlaksdn', 2, 1, '2020-08-11 11:25:34', NULL, NULL),
(19, '1597168921.png', 'AMIKOM MANTAP', 'Mantap', 2, 1, '2020-08-12 01:02:01', '2020-08-12 01:02:12', NULL),
(20, '1597173621.png', 'IAIN SLUR', 'DIN3 MANTAP', 3, 1, '2020-08-12 02:19:18', '2020-08-12 02:20:21', NULL),
(21, '1597173650.png', 'SA', '', 3, 1, '2020-08-12 02:20:50', '2020-08-12 03:57:12', NULL),
(22, '1597174240.png', 'GOBANG POS', 'AW', 3, 1, '2020-08-12 02:30:40', NULL, NULL),
(23, '1597174444.png', 'Bakaran Project', 'awawaw', 2, 1, '2020-08-12 02:33:37', '2020-08-12 03:57:12', NULL),
(24, '1597174583.jpg', 'Gowes', 'awawawaw', 4, 1, '2020-08-12 02:36:23', NULL, NULL),
(25, '1597174615.png', 'Vivin aw', 'hehedsds', 4, 1, '2020-08-12 02:36:42', '2020-08-12 03:57:12', NULL),
(26, '1597175281.jpeg', 'Sektor Coba', 'aaaaaaaaaaaa', 6, 1, '2020-08-12 02:48:01', '2020-08-12 03:36:34', NULL),
(27, '1597389469.png', 'Coba COba', 'alskdnalksndaskndlasnd\r\n', 2, 1, '2020-08-14 14:17:49', NULL, NULL),
(28, '1598034973.png', 'Coba Rafly', 'Senia', 5, 1, '2020-08-22 01:36:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `din7`
--

CREATE TABLE `din7` (
  `id` int(11) NOT NULL,
  `peserta` text,
  `materi_tema` text,
  `jml_peserta` int(10) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `tempat_prov` varchar(255) DEFAULT NULL,
  `tempat_kab` varchar(255) DEFAULT NULL,
  `tempat_kec` varchar(255) DEFAULT NULL,
  `tempat_kel` varchar(255) DEFAULT NULL,
  `tempat_detail` varchar(255) DEFAULT NULL,
  `jenis` int(1) DEFAULT NULL COMMENT '1 = Pelkum | 2 = Penykum | 3 = JMS',
  `triwulan` int(1) DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `materi` varchar(255) DEFAULT NULL,
  `waktu_pelaksanaan` date DEFAULT NULL,
  `keterangan` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `din7`
--

INSERT INTO `din7` (`id`, `peserta`, `materi_tema`, `jml_peserta`, `waktu`, `tempat_prov`, `tempat_kab`, `tempat_kec`, `tempat_kel`, `tempat_detail`, `jenis`, `triwulan`, `media`, `materi`, `waktu_pelaksanaan`, `keterangan`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aw', 'tema', 234, '2020-08-22', '33', '3302', '330219', '3302192006', 'Rumahnya Rafli', 1, 3, 'contoh meda', 'contoh materi', '2020-08-23', 'contoh keterangan', 1, '2020-08-22 15:57:49', '2020-08-23 09:33:59', '2020-08-23 00:00:00'),
(2, 'Rafli Firdausy', 'Menjunjung Tinggi NKRI', 10, '2020-08-21', '33', '3302', '330214', '3302142011', 'Aula Kecamatan', 1, 3, 'TV', 'Mbuh Apa oakwoaw', '2020-08-23', 'Ya ini keteranganya', 1, '2020-08-22 19:17:11', '2020-08-23 10:00:26', '2020-08-23 10:00:26'),
(3, 'Coba Skuy', 'Materi Coba', 239, '2020-08-12', '33', '3302', '330214', '3302142005', 'Aula Kecamatan', 1, 3, 'media contoh', 'materi contoh', '2020-08-26', 'waokaowkaw', 1, '2020-08-22 19:34:08', '2020-08-23 10:00:31', '2020-08-23 10:00:31'),
(4, 'Lagi Lagi', 'temanya', 232, '2020-08-08', '33', '3302', '330204', '3302042007', 'Rumah Rafli', 1, 3, 'Laptop', 'Materinya', '2020-08-18', 'Keteranganya mbuh', 1, '2020-08-22 19:37:22', NULL, NULL),
(5, 'Coba Insert', 'Materi Insert', 123, '2020-08-24', '33', '3302', '330202', '3302022004', 'Rumah Rafli', 1, 3, '', '', '0000-00-00', '', 1, '2020-08-23 09:35:04', '2020-08-23 09:52:38', NULL),
(6, 'Sasaran Edit', 'Wadaw', 122, '2020-08-03', '33', '3302', '330202', '3302022005', 'Detailnya', 1, 3, '', '', '0000-00-00', '', 1, '2020-08-23 09:37:47', '2020-08-23 09:53:23', NULL),
(7, 'Coba Triwulan 1', 'Triwulan 1 wkwk', 12, '2020-01-30', '33', '3302', '330215', '3302152004', 'aaa', 1, 1, '', '', '0000-00-00', '', 1, '2020-08-23 15:18:05', NULL, NULL),
(8, 'Triwulan 1 Lagi', 'adsadasdasd', 23, '2020-02-19', '33', '3302', '330222', '3302222001', 'gfdgdfg', 1, 1, '', '', '0000-00-00', '', 1, '2020-08-23 15:18:49', '2020-08-23 15:19:16', NULL),
(9, 'Triwulan 2', 'awawawaw', 34, '2020-06-25', '33', '3302', '330204', '3302042001', 'awwdsdsdasd', 1, 2, 'rgdfbd', 'asszzaa', '2020-08-28', 'hehe', 1, '2020-08-23 15:20:04', NULL, NULL),
(10, 'Triwulan 4 Contoh', 'aw', 24, '2020-12-31', '33', '3302', '330215', '3302152004', 'awaw', 1, 4, '', '', '0000-00-00', '', 1, '2020-08-23 17:32:24', NULL, NULL),
(11, 'cobain', 'oawkoakwo', 1323, '2020-08-18', '33', '3302', '330217', '3302172009', 'awwa', 1, 3, '', '', '0000-00-00', '', 1, '2020-08-23 21:52:37', NULL, NULL),
(12, 'Coba Penyuluhanx', 'awax', 239, '2020-08-31', '33', '3302', '330203', '3302032004', 'x', 2, 3, '', '', '0000-00-00', '', 1, '2020-08-23 21:56:45', '2020-08-23 21:58:04', NULL),
(13, 'Hapus', 'Hapus Aja', 12312, '2020-08-28', '33', '3302', '330217', '3302172019', 'awaw', 2, 3, '', '', '0000-00-00', '', 1, '2020-08-23 21:58:53', '2020-08-23 21:58:58', '2020-08-23 21:58:58'),
(14, 'jmsx', 'Contoh  Materi', 1110, '2020-08-01', '33', '3302', '330227', '3302271004', 'dsdsx', 3, 3, 'x', 'x', '2020-09-03', 'xx', 1, '2020-08-23 22:22:49', '2020-08-31 23:55:47', NULL),
(15, 'hapus', 'hapis', 1, '2020-08-07', '33', '3302', '330203', '3302032011', 'awsd', 3, 3, '', '', '0000-00-00', '', 1, '2020-08-23 22:27:48', '2020-08-23 22:27:53', '2020-08-23 22:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `din8`
--

CREATE TABLE `din8` (
  `id` int(11) NOT NULL,
  `din7_id` int(11) NOT NULL,
  `foto_video` text,
  `nama_file` text,
  `jenis_file` varchar(1) DEFAULT NULL COMMENT '1 = FOTO | 2 = VIDEO',
  `keterangan` text,
  `jenis` varchar(1) DEFAULT NULL COMMENT '1 = PENERANGAN HUKUM | 2 PENYULUHAN HUKUM',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `din8`
--

INSERT INTO `din8` (`id`, `din7_id`, `foto_video`, `nama_file`, `jenis_file`, `keterangan`, `jenis`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, 'aw.jpg', 'nama.jpg', '1', 'keteranganya', '1', 1, '2020-08-24 01:57:28', '2020-08-26 02:39:30', '2020-08-26 02:39:30'),
(2, 9, '20200825015037.jpg', '14716427_702049253284783_8064488816993370112_n.jpg', '1', 'coronaxxxasdasdasd', '1', 1, '2020-08-25 00:56:22', '2020-08-31 23:53:34', '2020-08-31 23:53:34'),
(3, 8, '20200825005731.mp4', 'WhatsApp Video 2019-09-24 at 10.39.37 PM.mp4', '2', 'coba coa', '1', 1, '2020-08-25 00:57:31', '2020-08-26 02:39:20', '2020-08-26 02:39:20'),
(4, 10, '20200825005951.png', 'mas_basid_toko_modern.png', '1', 'cobain aowkaow', '1', 1, '2020-08-25 00:59:51', '2020-08-31 23:53:35', '2020-08-31 23:53:35'),
(5, 10, '20200825013730.mp4', '17099142_765249073651391_103453384064892928_n (1).mp4', '2', 'aw', '1', 1, '2020-08-25 01:37:30', '2020-08-31 23:53:37', '2020-08-31 23:53:37'),
(6, 4, '20200826025232.jpg', '11236272_1389346561393946_1496168678_n.jpg', '1', 'xxxxxxxx', '1', 1, '2020-08-25 01:52:11', '2020-08-31 23:53:31', '2020-08-31 23:53:31'),
(7, 8, '20200825015619.png', 'Orange White Rays Illustration Book Donation Poster.png', '1', 'contoh hehe', '1', 1, '2020-08-25 01:56:19', '2020-08-31 23:53:29', '2020-08-31 23:53:29'),
(8, 7, '20200826014017.png', 'Green and Yellow Tropical Leaves Summer Sale Story.png', '1', 'awawa', '1', 1, '2020-08-26 01:40:17', '2020-08-31 23:53:27', '2020-08-31 23:53:27'),
(9, 9, '20200826020631.jpeg', 'IMG00001.jpeg', '1', 'awaw', '1', 1, '2020-08-26 02:06:31', '2020-08-31 23:53:25', '2020-08-31 23:53:25'),
(10, 9, '20200826020820.png', 'mas_basid_toko_modern.png', '1', 'fefefefe', '1', 1, '2020-08-26 02:08:20', '2020-08-31 23:53:24', '2020-08-31 23:53:24'),
(11, 5, '20200826020837.png', 'add.png', '1', 'hehehehe', '1', 1, '2020-08-26 02:08:37', '2020-08-26 02:39:34', '2020-08-26 02:39:34'),
(12, 10, '20200826020851.png', 'Rafly.png', '1', 'awww', '1', 1, '2020-08-26 02:08:51', '2020-08-31 23:53:22', '2020-08-31 23:53:22'),
(13, 10, '20200826020907.mp4', 'JtP6M0ei1dRK5Ut1.mp4', '2', 'dddd', '1', 1, '2020-08-26 02:09:07', '2020-08-31 23:53:19', '2020-08-31 23:53:19'),
(14, 8, '20200831231436.jpeg', 'IMG00001.jpeg', '1', 'awaw', '1', 1, '2020-08-31 23:14:36', '2020-08-31 23:53:07', '2020-08-31 23:53:07'),
(15, 4, '20200831232046.jpg', 'batik-batik.jpg', '1', 'Batik Cantik', '2', 1, '2020-08-31 23:20:46', '2020-08-31 23:52:57', '2020-08-31 23:52:57'),
(16, 5, '20200831232411.jpg', 'wisata.jpg', '1', 'ganti wisata', '2', 1, '2020-08-31 23:21:06', '2020-08-31 23:24:46', '2020-08-31 23:24:46'),
(17, 9, '20200831233616.jpg', 'Benua-Amerika.jpg', '1', 'aw', '2', 1, '2020-08-31 23:36:16', '2020-08-31 23:52:54', '2020-08-31 23:52:54'),
(18, 8, '20200831235431.jpeg', 'WhatsApp Image 2020-08-27 at 08.51.00.jpeg', '1', 'cobaaa', '1', 1, '2020-08-31 23:54:31', NULL, NULL),
(19, 12, '20200831235510.jpeg', 'WhatsApp Image 2020-08-27 at 14.58.20 (1).jpeg', '1', 'hehe', '2', 1, '2020-08-31 23:55:10', NULL, NULL),
(20, 14, '20200831235601.jpeg', 'WhatsApp Image 2020-08-27 at 14.58.20.jpeg', '1', 'yuhu', '3', 1, '2020-08-31 23:56:01', NULL, NULL),
(21, 14, '20200901223221.png', 'sipentungmas.png', '1', 'sipentungmas', '3', 1, '2020-09-01 22:32:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `din10`
--

CREATE TABLE `din10` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `nama_lain` varchar(255) DEFAULT NULL,
  `kebangsaan` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `negara_asal` varchar(255) DEFAULT NULL,
  `sementara` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `paspor_no` varchar(255) DEFAULT NULL,
  `paspor_tempat` varchar(255) DEFAULT NULL,
  `paspor_berlaku` datetime DEFAULT NULL COMMENT 'dd-mm-yyyy',
  `alasan_indo` text,
  `rekomendasi_tgl` date DEFAULT NULL,
  `rekomendasi_dari` varchar(255) DEFAULT NULL COMMENT 'kemenlu / kemenkumham / kemenaker\r\nkemenlu / kemenkumham / kemenaker',
  `keterangan` text,
  `foto` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `din12`
--

CREATE TABLE `din12` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` varchar(255) DEFAULT NULL,
  `umur` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `bangsa` varchar(255) DEFAULT NULL,
  `kewarganegaraan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `passpor_no` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `alamat_kantor` varchar(255) DEFAULT NULL,
  `status_kawin` varchar(255) DEFAULT NULL,
  `perkawinan_tempat` varchar(255) DEFAULT NULL,
  `perkawinan_tanggal` varchar(255) DEFAULT NULL,
  `intel_pekerjaan` varchar(255) DEFAULT NULL,
  `intel_pendidikan` varchar(255) DEFAULT NULL,
  `intel_kepartaian` varchar(255) DEFAULT NULL,
  `intel_ormas` varchar(255) DEFAULT NULL,
  `kel_istri_suami` varchar(255) DEFAULT NULL,
  `kel_anak` varchar(255) DEFAULT NULL,
  `kel_saudara` varchar(255) DEFAULT NULL,
  `kel_ayah` varchar(255) DEFAULT NULL,
  `ayah_alamat` varchar(255) DEFAULT NULL,
  `ayah_ibu` varchar(255) DEFAULT NULL,
  `ayah_ibu_alamat` varchar(255) DEFAULT NULL,
  `mertua_nama` varchar(255) DEFAULT NULL,
  `mertua_alamat` varchar(255) DEFAULT NULL,
  `mertua_ibu` varchar(255) DEFAULT NULL,
  `mertua_ibu_alamat` varchar(255) DEFAULT NULL,
  `kenalan_nama1` varchar(255) DEFAULT NULL,
  `kenalan_alamat1` varchar(255) DEFAULT NULL,
  `kenalan_nama2` varchar(255) DEFAULT NULL,
  `kenalan_alamat2` varchar(255) DEFAULT NULL,
  `kenalan_nama3` varchar(255) DEFAULT NULL,
  `kenalan_alamat3` varchar(255) DEFAULT NULL,
  `hobbi` varchar(255) DEFAULT NULL,
  `kedudukan` varchar(255) DEFAULT NULL,
  `lain` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `din13`
--

CREATE TABLE `din13` (
  `id` int(11) NOT NULL,
  `barang_nama` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `peredaran_waktu` datetime DEFAULT NULL,
  `peredaran_daerah` varchar(255) DEFAULT NULL,
  `pencetak` varchar(255) DEFAULT NULL,
  `pimpinan_nama` varchar(255) DEFAULT NULL,
  `pimpinan_alamat` varchar(255) DEFAULT NULL,
  `percetakan_jenis` varchar(255) DEFAULT NULL,
  `jml_oplah` varchar(255) DEFAULT NULL,
  `kasus` varchar(255) DEFAULT NULL,
  `latar_belakang` text,
  `tindakan_kejaksaan` text,
  `tindakan_kepolisian` text,
  `tindakan_pengadilan` text,
  `keterangan` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `din14`
--

CREATE TABLE `din14` (
  `id` int(111) NOT NULL,
  `organisasi_nama` varchar(255) DEFAULT NULL,
  `akte_pendirian` varchar(255) DEFAULT NULL,
  `kependudukan` varchar(255) DEFAULT NULL,
  `berdiri_sejak` varchar(255) DEFAULT NULL,
  `domisili_hukum` text,
  `telp` varchar(255) DEFAULT NULL,
  `pengurus_nama` varchar(255) DEFAULT NULL,
  `pengurus_kependudukan` text,
  `pengurus_periode` varchar(255) DEFAULT NULL,
  `pengurus_alamat` text,
  `pengurus_telp` varchar(255) DEFAULT NULL,
  `kedalam` text,
  `keluar` text,
  `kegiatan_organisasi` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `din15`
--

CREATE TABLE `din15` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `nama_samaran` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `bangsa` varchar(255) DEFAULT NULL,
  `kewarganegaraan` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(255) DEFAULT NULL,
  `passpor_no` int(11) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `alamat_kantor` text,
  `status_kawin` varchar(255) DEFAULT NULL,
  `kepartaian` varchar(255) DEFAULT NULL,
  `perkara_kasus` text,
  `perkarra_latar` text,
  `sp3_no` varchar(255) DEFAULT NULL,
  `sp3_tgl` date DEFAULT NULL,
  `putusan_pn` text,
  `putusan_pt` text,
  `putusan_ma` text,
  `orangtua_nama` varchar(255) DEFAULT NULL,
  `orangtua_alamat` text,
  `kawan_nama` varchar(255) DEFAULT NULL,
  `lain` text,
  `foto` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `din16`
--

CREATE TABLE `din16` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(255) DEFAULT NULL,
  `nama_peminjam` varchar(255) DEFAULT NULL,
  `penanggungjawab` varchar(255) DEFAULT NULL,
  `ijin_usaha` varchar(255) DEFAULT NULL,
  `peredaran_waktu` varchar(255) DEFAULT NULL,
  `peredaran_daerah` text,
  `peredaran_jumlah` varchar(255) DEFAULT NULL,
  `kasus` varchar(255) DEFAULT NULL,
  `latar_belakang` varchar(255) DEFAULT NULL,
  `tindakan_kejaksaan` varchar(255) DEFAULT NULL,
  `tindakan_kepolisian` varchar(255) DEFAULT NULL,
  `tindakan_kominfo` varchar(255) DEFAULT NULL,
  `tindakan_pengadilan` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_by` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kejari_migrations`
--

CREATE TABLE `kejari_migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kejari_migrations`
--

INSERT INTO `kejari_migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` int(1) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `jabatan1` varchar(255) DEFAULT NULL,
  `jabatan2` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `ttd` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `jenis_kelamin`, `no_hp`, `jabatan1`, `jabatan2`, `nip`, `role`, `ttd`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Admin', 1, '085726096515', NULL, NULL, NULL, 'admin', 0, '2020-08-09 20:23:13', '2020-08-09 20:23:13', NULL),
(2, 'user', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Rafli Firdausy Irawan', 1, '085726096515', NULL, NULL, NULL, 'user', 0, '2020-08-09 20:23:59', '2020-08-09 20:23:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `din1`
--
ALTER TABLE `din1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `din_id` (`din_id`),
  ADD KEY `user` (`created_by`);

--
-- Indexes for table `din2s6`
--
ALTER TABLE `din2s6`
  ADD PRIMARY KEY (`id`),
  ADD KEY `din_user` (`created_by`);

--
-- Indexes for table `din7`
--
ALTER TABLE `din7`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinsi` (`tempat_prov`),
  ADD KEY `kabupaten` (`tempat_kab`),
  ADD KEY `kecamatan` (`tempat_kec`),
  ADD KEY `kelurahan` (`tempat_kel`);

--
-- Indexes for table `din8`
--
ALTER TABLE `din8`
  ADD PRIMARY KEY (`id`),
  ADD KEY `din7` (`din7_id`);

--
-- Indexes for table `din10`
--
ALTER TABLE `din10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `din12`
--
ALTER TABLE `din12`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `din13`
--
ALTER TABLE `din13`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `din14`
--
ALTER TABLE `din14`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `din15`
--
ALTER TABLE `din15`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `din16`
--
ALTER TABLE `din16`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `din1`
--
ALTER TABLE `din1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `din2s6`
--
ALTER TABLE `din2s6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `din7`
--
ALTER TABLE `din7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `din8`
--
ALTER TABLE `din8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `din10`
--
ALTER TABLE `din10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `din13`
--
ALTER TABLE `din13`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `din14`
--
ALTER TABLE `din14`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `din15`
--
ALTER TABLE `din15`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `din1`
--
ALTER TABLE `din1`
  ADD CONSTRAINT `din_id` FOREIGN KEY (`din_id`) REFERENCES `din2s6` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `din2s6`
--
ALTER TABLE `din2s6`
  ADD CONSTRAINT `din_user` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `din7`
--
ALTER TABLE `din7`
  ADD CONSTRAINT `kabupaten` FOREIGN KEY (`tempat_kab`) REFERENCES `kabupaten` (`id_kab`),
  ADD CONSTRAINT `kecamatan` FOREIGN KEY (`tempat_kec`) REFERENCES `kecamatan` (`id_kec`),
  ADD CONSTRAINT `kelurahan` FOREIGN KEY (`tempat_kel`) REFERENCES `kelurahan` (`id_kel`),
  ADD CONSTRAINT `provinsi` FOREIGN KEY (`tempat_prov`) REFERENCES `provinsi` (`id_prov`);

--
-- Constraints for table `din8`
--
ALTER TABLE `din8`
  ADD CONSTRAINT `din7` FOREIGN KEY (`din7_id`) REFERENCES `din7` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
