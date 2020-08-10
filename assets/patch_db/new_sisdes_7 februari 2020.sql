-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 07:41 AM
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
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(50) NOT NULL,
  `route_akses` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `nama_akses`, `route_akses`, `created_at`, `updated_at`) VALUES
(1, 'Olah Data Kependudukan', 'kependudukan', '2020-02-06 18:57:14', '2020-02-06 18:57:14'),
(2, 'Olah Data Layanan Surat', 'surat', '2020-02-06 18:57:14', '2020-02-06 18:57:14'),
(3, 'Olah Data Kesekretariatan', 'kesekretariatan', '2020-02-06 18:58:07', '2020-02-06 18:58:07'),
(4, 'Olah Data Dokumen Desa', 'dokumen', '2020-02-06 18:58:07', '2020-02-06 18:58:07'),
(5, 'Olah Data Sistem Keuangan Desa', 'siskeudes', '2020-02-06 18:59:40', '2020-02-06 18:59:40'),
(6, 'Olah Pengaturan Akses ', 'akses', '2020-02-06 18:59:40', '2020-02-06 18:59:40'),
(7, 'Olah Pengaturan', 'pengaturan', '2020-02-06 19:00:04', '2020-02-06 19:00:04');

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
  `namakantor_desa` varchar(50) DEFAULT NULL,
  `alamatkantor_desa` text,
  `kodepos_desa` varchar(6) DEFAULT NULL,
  `notelp_desa` varchar(20) DEFAULT NULL,
  `email_desa` varchar(100) DEFAULT NULL,
  `deskripsi_desa` text,
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

INSERT INTO `desa` (`id_desa`, `nama_desa`, `kecamatan_desa`, `kabupaten_desa`, `provinsi_desa`, `namakantor_desa`, `alamatkantor_desa`, `kodepos_desa`, `notelp_desa`, `email_desa`, `deskripsi_desa`, `logo_desa`, `path_desa`, `userid_desa`, `password_desa`, `created_at`, `updated_at`) VALUES
(2, 'Wanadadi', 'Wanadadi', 'Banjarnegara', 'Jawa Tengah', 'Balai Desa', 'Jalan Jalan Yuk', '53181', '085726096515', 'wanadadi@gmail.com', 'Klahang Jaya', NULL, '10_wanadadi', 'PRATAMAYUDHASANTOSA', '10_wanadadi', '2020-02-06 18:48:04', '2020-02-07 08:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `id_desa`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(1, 2, 'Kepala Desa', '2020-02-07 08:11:45', '2020-02-07 08:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `jenisrequest`
--

CREATE TABLE `jenisrequest` (
  `id_jenisrequest` int(11) NOT NULL,
  `nama_jenisrequest` varchar(100) NOT NULL,
  `kategori_jenisrequest` enum('surat','pengaduan','','') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_auth`
--

CREATE TABLE `log_auth` (
  `id_log_auth` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_auth`
--

INSERT INTO `log_auth` (`id_log_auth`, `id_user`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 1, 'login', '2020-02-07 00:08:58', '2020-02-07 00:08:58'),
(2, 1, 'logout', '2020-02-07 00:16:42', '2020-02-07 00:16:42'),
(3, 1, 'login', '2020-02-07 00:17:11', '2020-02-07 00:17:11'),
(4, 1, 'logout', '2020-02-07 01:14:08', '2020-02-07 01:14:08'),
(5, 1, 'login', '2020-02-07 01:14:11', '2020-02-07 01:14:11'),
(6, 1, 'logout', '2020-02-07 01:24:44', '2020-02-07 01:24:44'),
(7, 1, 'login', '2020-02-07 01:24:50', '2020-02-07 01:24:50'),
(8, 1, 'login', '2020-02-07 07:35:45', '2020-02-07 07:35:45'),
(9, 1, 'logout', '2020-02-07 08:49:48', '2020-02-07 08:49:48'),
(10, 1, 'login', '2020-02-07 08:50:17', '2020-02-07 08:50:17'),
(11, 1, 'logout', '2020-02-07 09:16:36', '2020-02-07 09:16:36'),
(12, 1, 'login', '2020-02-07 09:16:40', '2020-02-07 09:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `masterjabatan`
--

CREATE TABLE `masterjabatan` (
  `id_masterjabatan` int(11) NOT NULL,
  `nama_masterjabatan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masterjabatan`
--

INSERT INTO `masterjabatan` (`id_masterjabatan`, `nama_masterjabatan`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Desa', '2020-02-06 19:12:50', '2020-02-06 19:12:50'),
(2, 'Sekretaris Desa', '2020-02-06 19:12:50', '2020-02-06 19:12:50'),
(3, 'Kaur Perencanaan', '2020-02-06 19:12:50', '2020-02-06 19:12:50'),
(4, 'Kaur Keuangan', '2020-02-06 19:12:50', '2020-02-06 19:12:50'),
(5, 'Kaur Umum', '2020-02-06 19:12:50', '2020-02-06 19:12:50'),
(6, 'Kasi Pelayanan', '2020-02-06 19:12:50', '2020-02-06 19:12:50'),
(7, 'Kasi Pemerintahan', '2020-02-06 19:12:50', '2020-02-06 19:12:50'),
(8, 'Kasi Kesejahteraan Rakyat', '2020-02-06 19:12:50', '2020-02-06 19:12:50'),
(9, 'Kaur Tata Usaha', '2020-02-06 19:12:50', '2020-02-06 19:12:50'),
(10, 'Kadus 1', '2020-02-06 19:12:50', '2020-02-06 19:12:50'),
(11, 'Kadus 2', '2020-02-06 19:13:02', '2020-02-06 19:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `mastersurat`
--

CREATE TABLE `mastersurat` (
  `id_mastersurat` int(11) NOT NULL,
  `nama_mastersurat` varchar(100) NOT NULL,
  `kode_mastersurat` varchar(10) NOT NULL,
  `url_mastersurat` text NOT NULL,
  `deskripsi_mastersurat` text,
  `id_desa` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mastersurat`
--

INSERT INTO `mastersurat` (`id_mastersurat`, `nama_mastersurat`, `kode_mastersurat`, `url_mastersurat`, `deskripsi_mastersurat`, `id_desa`, `created_at`, `updated_at`) VALUES
(1, 'Surat Keterangan Beda Identitas', '400', 'surat_keterangan_beda_identitas', NULL, NULL, '2020-02-06 22:36:16', '2020-02-07 07:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `pamong`
--

CREATE TABLE `pamong` (
  `id_pamong` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_pamong` varchar(100) NOT NULL,
  `nip_pamong` varchar(30) DEFAULT NULL,
  `foto_pamong` text,
  `tanggallahir_pamong` date DEFAULT NULL,
  `nosk_pamong` varchar(100) DEFAULT NULL,
  `tanggalpelantikan_pamong` date DEFAULT NULL,
  `pendidikan_pamong` varchar(50) DEFAULT NULL,
  `akhirjabatan_pamong` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pamong`
--

INSERT INTO `pamong` (`id_pamong`, `id_desa`, `id_jabatan`, `nama_pamong`, `nip_pamong`, `foto_pamong`, `tanggallahir_pamong`, `nosk_pamong`, `tanggalpelantikan_pamong`, `pendidikan_pamong`, `akhirjabatan_pamong`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Rafli Firdausy Irawan', '123123', NULL, '2020-02-05', NULL, '2020-02-20', 'S1', '2020-02-29', '2020-02-07 08:15:18', '2020-02-07 08:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_request` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_jenisrequest` int(11) NOT NULL,
  `id_tipesurat` int(11) DEFAULT NULL,
  `nik_request` varchar(20) NOT NULL,
  `perihal_request` varchar(200) NOT NULL,
  `nama_request` varchar(100) NOT NULL,
  `latitude_request` double DEFAULT NULL,
  `longitude_request` double DEFAULT NULL,
  `foto_request` text,
  `status_request` enum('wait','proses','selesai','tolak') NOT NULL DEFAULT 'wait',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `nama_role` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `id_desa`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 2, 'Administrator', '2020-02-06 19:00:41', '2020-02-06 19:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `roledetail`
--

CREATE TABLE `roledetail` (
  `id_roledetail` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roledetail`
--

INSERT INTO `roledetail` (`id_roledetail`, `id_role`, `id_akses`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-02-06 19:03:06', '2020-02-06 19:03:06'),
(2, 1, 2, '2020-02-06 19:03:06', '2020-02-06 19:03:06'),
(3, 1, 3, '2020-02-06 19:03:06', '2020-02-06 19:03:06'),
(4, 1, 4, '2020-02-06 19:03:06', '2020-02-06 19:03:06'),
(5, 1, 5, '2020-02-06 19:03:06', '2020-02-06 19:03:06'),
(6, 1, 6, '2020-02-06 19:03:06', '2020-02-06 19:03:06'),
(7, 1, 7, '2020-02-06 19:03:06', '2020-02-06 19:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_tipesurat` int(11) DEFAULT NULL,
  `id_pamong` int(11) DEFAULT NULL,
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
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipesurat`
--

CREATE TABLE `tipesurat` (
  `id_tipesurat` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `nama_tipesurat` varchar(100) NOT NULL,
  `kode_tipesurat` varchar(10) NOT NULL,
  `url_tipesurat` text NOT NULL,
  `deskripsi_tipesurat` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipesurat`
--

INSERT INTO `tipesurat` (`id_tipesurat`, `id_desa`, `nama_tipesurat`, `kode_tipesurat`, `url_tipesurat`, `deskripsi_tipesurat`, `created_at`, `updated_at`) VALUES
(1, 2, 'Surat Keterangan Beda Identitas', '400', 'surat_keterangan_beda_identitas', NULL, '2020-02-06 23:01:36', '2020-02-06 23:01:36'),
(2, 2, 'Surat Pengantar KTP', '200', 'surat_pengantar_ktp', NULL, '2020-02-06 23:02:59', '2020-02-06 23:02:59'),
(3, 2, 'Pengantar Surat Nikah Talak Cerai Rujuk', '200', 'surat_pengantar_ntcr', 'Untuk Persyaratak Nikah', '2020-02-06 23:02:59', '2020-02-06 23:02:59'),
(4, 2, 'Surat Keterangan Beda Identitas', '200', 'surat_keterangan_beda_identitas', '', '2020-02-06 23:02:59', '2020-02-06 23:02:59'),
(5, 2, 'Surat Keterangan Domisili Lembaga', '200', 'surat_keterangan_domisili_lembaga', '', '2020-02-06 23:02:59', '2020-02-06 23:02:59'),
(6, 2, 'Surat Keterangan Domisili', '200', 'surat_keterangan_domisili', '', '2020-02-06 23:02:59', '2020-02-06 23:02:59'),
(7, 2, 'Surat Keterangan Kematian', '200', 'surat_keterangan_kematian', '', '2020-02-06 23:02:59', '2020-02-06 23:02:59'),
(8, 2, 'Surat Keterangan Tanah', '200', 'surat_keterangan_tanah', '', '2020-02-06 23:02:59', '2020-02-06 23:02:59'),
(9, 2, 'Surat Keterangan Tidak Mampu', '200', 'surat_keterangan_tidak_mampu', '', '2020-02-06 23:02:59', '2020-02-06 23:02:59'),
(10, 2, 'Surat Keterangan Usaha', '200', 'surat_keterangan_usaha', '', '2020-02-06 23:02:59', '2020-02-06 23:02:59'),
(11, 2, 'Surat Pengantar KTP', '200', 'surat_pengantar_ktp', '', '2020-02-06 23:02:59', '2020-02-06 23:02:59'),
(12, 2, 'Surat Pengantar SKCK', '200', 'surat_pengantar_skck', '', '2020-02-06 23:02:59', '2020-02-06 23:02:59'),
(13, 2, 'Surat Pengantar UMUM', '200', 'surat_pengantar_umum', '', '2020-02-06 23:02:59', '2020-02-06 23:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `password_user` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_desa`, `id_role`, `nama_user`, `username_user`, `password_user`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Pemerintah Desa wanadadi', 'wanadadi', 'f5bb0c8de146c67b44babbf4e6584cc0', '2020-02-06 19:21:08', '2020-02-07 08:50:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `fk_id_desa_jabatan` (`id_desa`);

--
-- Indexes for table `jenisrequest`
--
ALTER TABLE `jenisrequest`
  ADD PRIMARY KEY (`id_jenisrequest`);

--
-- Indexes for table `log_auth`
--
ALTER TABLE `log_auth`
  ADD PRIMARY KEY (`id_log_auth`),
  ADD KEY `log_user` (`id_user`);

--
-- Indexes for table `masterjabatan`
--
ALTER TABLE `masterjabatan`
  ADD PRIMARY KEY (`id_masterjabatan`);

--
-- Indexes for table `mastersurat`
--
ALTER TABLE `mastersurat`
  ADD PRIMARY KEY (`id_mastersurat`),
  ADD KEY `surat_desa` (`id_desa`);

--
-- Indexes for table `pamong`
--
ALTER TABLE `pamong`
  ADD PRIMARY KEY (`id_pamong`),
  ADD KEY `fk_id_jabatan_pamong` (`id_jabatan`),
  ADD KEY `fk_id_desa_pamong` (`id_desa`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `fk_id_desa_request` (`id_desa`),
  ADD KEY `fk_id_jenisrequest_request` (`id_jenisrequest`),
  ADD KEY `id_tipesurat` (`id_tipesurat`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `fk_id_desa_role` (`id_desa`);

--
-- Indexes for table `roledetail`
--
ALTER TABLE `roledetail`
  ADD PRIMARY KEY (`id_roledetail`),
  ADD KEY `fk_id_role_roledetail` (`id_role`),
  ADD KEY `fk_id_akses_roledetail` (`id_akses`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `fk_id_desa_surat` (`id_desa`),
  ADD KEY `fk_id_tipesurat_surat` (`id_tipesurat`);

--
-- Indexes for table `tipesurat`
--
ALTER TABLE `tipesurat`
  ADD PRIMARY KEY (`id_tipesurat`),
  ADD KEY `fk_id_desa_tipesurat` (`id_desa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username_user` (`username_user`),
  ADD KEY `admin_role` (`id_role`),
  ADD KEY `admin_desa` (`id_desa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenisrequest`
--
ALTER TABLE `jenisrequest`
  MODIFY `id_jenisrequest` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_auth`
--
ALTER TABLE `log_auth`
  MODIFY `id_log_auth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `masterjabatan`
--
ALTER TABLE `masterjabatan`
  MODIFY `id_masterjabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mastersurat`
--
ALTER TABLE `mastersurat`
  MODIFY `id_mastersurat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pamong`
--
ALTER TABLE `pamong`
  MODIFY `id_pamong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roledetail`
--
ALTER TABLE `roledetail`
  MODIFY `id_roledetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipesurat`
--
ALTER TABLE `tipesurat`
  MODIFY `id_tipesurat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);

--
-- Constraints for table `log_auth`
--
ALTER TABLE `log_auth`
  ADD CONSTRAINT `log_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `mastersurat`
--
ALTER TABLE `mastersurat`
  ADD CONSTRAINT `surat_desa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`);

--
-- Constraints for table `pamong`
--
ALTER TABLE `pamong`
  ADD CONSTRAINT `fk_id_desa_pamong` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_jabatan_pamong` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fk_id_desa_request` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_jenisrequest_request` FOREIGN KEY (`id_jenisrequest`) REFERENCES `jenisrequest` (`id_jenisrequest`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`id_tipesurat`) REFERENCES `tipesurat` (`id_tipesurat`);

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `fk_id_desa_role` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roledetail`
--
ALTER TABLE `roledetail`
  ADD CONSTRAINT `fk_id_akses_roledetail` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_role_roledetail` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `fk_id_desa_surat` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_tipesurat_surat` FOREIGN KEY (`id_tipesurat`) REFERENCES `tipesurat` (`id_tipesurat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tipesurat`
--
ALTER TABLE `tipesurat`
  ADD CONSTRAINT `fk_id_desa_tipesurat` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `admin_desa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`),
  ADD CONSTRAINT `admin_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
