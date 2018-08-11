-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2018 at 12:18 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_kuttab`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `slug` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `slug`) VALUES
(1, 'Administrator', 'adm'),
(2, 'Kepala Sekolah', 'ks'),
(3, 'Guru', 'gr');

-- --------------------------------------------------------

--
-- Table structure for table `jenisbayar`
--

CREATE TABLE `jenisbayar` (
  `id` int(11) NOT NULL,
  `namapembayaran` varchar(50) NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisbayar`
--

INSERT INTO `jenisbayar` (`id`, `namapembayaran`, `jumlah`, `created_at`, `updated_at`, `deleated_at`) VALUES
(2, 'SPP Januari 2018', 90000, '2018-07-30 20:36:15', '2018-07-30 20:36:15', NULL),
(3, 'SPP Februari 2018', 90000, '2018-07-30 20:36:37', '2018-08-06 09:13:19', NULL),
(4, 'SPP Maret 2018', 90000, '2018-07-30 20:36:59', '2018-08-06 09:13:09', NULL),
(5, 'SPP April 2018', 90000, '2018-07-30 20:37:17', '2018-08-06 09:12:59', NULL),
(6, 'SPP Mei 2018', 90000, '2018-07-30 20:37:40', '2018-08-06 09:12:48', NULL),
(7, 'Daftar Ulang 2018', 500000, '2018-07-30 20:38:08', '2018-07-30 20:38:08', NULL),
(8, 'SPP Juni 2018', 80000, '2018-08-09 00:14:38', '2018-08-09 00:14:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id` int(11) NOT NULL,
  `pengajar_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `kode` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `masuk` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `keluar` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id`, `pengajar_id`, `kode`, `keterangan`, `tanggal`, `masuk`, `keluar`, `created_at`, `updated_at`, `deleated_at`) VALUES
(1, 0, 'KM001', 'Saldo Awal', '2018-08-03 17:00:00', 700000, 0, NULL, NULL, NULL),
(4, 0, 'KL002', 'Pembelian Alat Kantor', '2018-08-05 17:00:00', 0, 200000, '2018-08-06 16:38:23', '2018-08-06 16:38:23', NULL),
(5, 0, 'KM002', 'Kas Kuttab', '2018-08-05 17:00:00', 4000000, 0, '2018-08-06 16:39:51', '2018-08-06 16:39:51', NULL),
(6, 0, 'KL003', 'Biaya Dauroh', '2018-08-05 17:00:00', 0, 500000, '2018-08-06 16:40:44', '2018-08-06 16:40:44', NULL),
(7, 0, 'KM004', 'Pembayaran rekening listrik', '2018-08-05 17:00:00', 0, 300000, '2018-08-06 16:41:39', '2018-08-06 16:41:39', NULL),
(8, 0, 'KM005', 'Sumbangan Dari Wali Santri', '2018-08-05 17:00:00', 2000000, 0, '2018-08-06 16:42:28', '2018-08-06 16:42:28', NULL),
(9, 0, 'KL004', 'Biaya Perjalanan Dauroh', '2018-08-05 17:00:00', 0, 1000000, '2018-08-06 16:43:45', '2018-08-06 16:43:45', NULL),
(10, 0, 'KM0010', 'Kas Kuttab', '2018-08-08 17:00:00', 4000000, 0, '2018-08-09 00:16:12', '2018-08-09 00:16:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `namakategori` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `namakategori`, `created_at`, `updated_at`, `deleated_at`) VALUES
(1, 'Muatan Khusus', '2018-07-24 23:32:19', '2018-07-24 23:32:19', NULL),
(3, 'Murofaqot', '2018-07-25 02:34:21', '2018-07-30 20:32:55', NULL),
(4, 'Muatan Penunjang', '2018-07-30 20:32:31', '2018-07-30 20:32:31', NULL),
(5, 'Murofaqot 1', '2018-08-09 00:14:02', '2018-08-09 00:14:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `thnakademik` varchar(20) NOT NULL,
  `pengajar_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `thnakademik`, `pengajar_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Kuttab Awal 1B', '2017-2018', 2, '2018-07-25 06:59:29', '2018-07-25 06:59:49', NULL),
(5, 'Kuttab Awal 2B', '2017-2018', 24, '2018-07-25 07:01:39', '2018-07-30 20:28:11', NULL),
(6, 'Kuttab Awal 3B', '2017-2018', 8, '2018-07-30 20:27:49', '2018-07-30 20:28:26', NULL),
(7, 'Kuttab Awal 3B  Akhwat', '2017-2018', 21, '2018-07-30 20:29:06', '2018-07-30 20:29:06', NULL),
(8, 'Kuttab Awal 1A', '2017-2018', 8, '2018-08-06 08:43:54', '2018-08-06 08:43:54', NULL),
(9, 'Kuttab Awal 2A', '2017-2018', 26, '2018-08-06 08:44:26', '2018-08-06 08:44:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `pengajar_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `pengajar_id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'satria', '$2y$10$HXzUT4sYDZTq7nPtaAq.eedSFLtBhTGT7dKjvjXh34cIRc2h34igW', 'r8HJmq3qchenxv2xO9ZHqgx22GK3U9ohnCrMxHrlPBBdlZe5Vf1lHMEfzAZB', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE `mainmenu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`id`, `parent_id`, `nama`, `icon`, `url`) VALUES
(2, 0, 'Dashboard', 'fa fa-square', 'dashboard'),
(3, 0, 'Pengajar', 'fa fa-user', 'pengajar'),
(4, 0, 'Santri', 'fa fa-users', 'santri'),
(5, 0, 'Kelas', 'fa fa-building-o', 'kelas'),
(8, 0, 'Kategori', 'fa fa-map-o', 'kategori'),
(9, 0, 'Pelajaran', 'fa fa-book', 'pelajaran'),
(10, 0, 'Jenis Bayar', 'fa fa-map', 'jenis'),
(11, 0, 'Pembayaran', 'fa fa-cart-plus', 'pembayaran'),
(12, 0, 'Kas', 'fa fa-suitcase', 'kas');

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id` int(11) NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `namapelajaran` varchar(50) NOT NULL,
  `sub_pelajaran` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id`, `kategori_id`, `namapelajaran`, `sub_pelajaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Karakter Iman', 'Pemahaman', '2018-07-25 05:49:11', '2018-07-25 06:05:54', NULL),
(2, 1, 'Karakter Iman', 'Sikap', '2018-07-30 20:35:04', '2018-07-30 20:35:04', NULL),
(3, 1, 'Al-Qur\'an', 'Tahfidz', '2018-07-30 20:35:49', '2018-07-30 20:35:49', NULL),
(4, 1, 'Al-Qur\'an', 'Adab', '2018-08-06 08:58:10', '2018-08-06 08:58:10', NULL),
(5, 1, 'Al-Qur\'an', 'Tilawah', '2018-08-06 09:02:44', '2018-08-06 09:02:44', NULL),
(6, 3, 'Bahasa Indonesia', '-', '2018-08-06 09:08:12', '2018-08-06 09:08:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_angka`
--

CREATE TABLE `nilai_angka` (
  `id` int(11) NOT NULL,
  `santri_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `kelas_id` int(10) UNSIGNED DEFAULT '0',
  `pengajar_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `matapelajaran_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `uts` varchar(10) NOT NULL,
  `uas` varchar(10) NOT NULL,
  `craeted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_uraian`
--

CREATE TABLE `nilai_uraian` (
  `id` int(11) NOT NULL,
  `santri_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `kelas_id` int(10) UNSIGNED DEFAULT '0',
  `pengajar_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `matapelajaran_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `uts` varchar(1000) NOT NULL,
  `uas` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `santri_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tgl_pembayaran` timestamp NULL DEFAULT NULL,
  `jenisbayar_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `bayar` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `santri_id`, `tgl_pembayaran`, `jenisbayar_id`, `bayar`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '2018-08-08 17:00:00', 8, 0, 0, '2018-08-09 00:15:16', '2018-08-09 00:15:16', NULL),
(2, 2, '2018-08-10 17:00:00', 2, 0, 0, '2018-08-10 18:35:24', '2018-08-10 18:35:24', NULL),
(3, 2, '2018-08-10 17:00:00', 3, 0, 0, '2018-08-10 18:35:39', '2018-08-10 18:35:39', NULL),
(4, 2, '2018-08-10 17:00:00', 5, 0, 0, '2018-08-11 01:17:59', '2018-08-11 01:17:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` timestamp NULL DEFAULT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jabatan_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `password_asli` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id`, `nip`, `nama`, `gender`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `jabatan_id`, `password_asli`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '1234', 'Ade Yanuar', 0, 'Malang', '2018-07-02 17:00:00', 'Malang', '082139405016', 2, 'admin123', NULL, NULL, NULL),
(8, '12345', 'Hasan', 0, 'Jakarta', '1994-06-13 17:00:00', 'asdasd', '082139405016', 1, NULL, '2018-07-23 10:37:58', '2018-07-24 22:28:48', NULL),
(21, '1345266', 'Yumna Abidah', 1, 'Malang', '1993-06-22 17:00:00', 'Malang', '085334655712', 3, NULL, '2018-07-24 16:51:21', '2018-07-24 16:56:41', NULL),
(23, '1264889', 'Siti Maisaroh', 1, 'Malang', '1993-06-21 17:00:00', 'Malang', '085334688776', 3, NULL, '2018-07-24 16:56:16', '2018-07-24 16:56:16', NULL),
(24, '136789', 'Hadi Suwitnyo', 0, 'Malang', '1991-07-23 17:00:00', 'Malang', '0853346557128', 3, NULL, '2018-07-24 22:31:25', '2018-07-24 22:31:25', NULL),
(26, '1234590', 'Ahmad Irfan Hidayatullah', 0, 'Malang', '1970-01-01 17:00:00', 'mLng', '0853346557128', 1, NULL, '2018-07-24 23:12:33', '2018-07-24 23:12:33', NULL),
(27, '156876', 'Irwan', 0, 'Malang', '1990-07-16 17:00:00', 'Jl. Muharto', '0853346557128', 1, NULL, '2018-08-09 00:13:07', '2018-08-09 00:13:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` timestamp NULL DEFAULT NULL,
  `alamat` text NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `no_telp_ortu` varchar(20) NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id`, `nis`, `nama`, `gender`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nama_ayah`, `nama_ibu`, `no_telp_ortu`, `kelas_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1617001', 'Abdul Lathif Ats Tsabit', 0, 'Malang', '2004-12-31 17:00:00', 'Malang', '-', '-', '-', 4, '2018-08-03 23:31:46', '2018-08-03 23:31:46', NULL),
(2, '1617004', 'Ahmad Aufar Roihan', 0, 'Malang', '2004-12-31 17:00:00', 'Malang', '-', '-', '-', 4, '2018-08-03 23:33:08', '2018-08-03 23:33:08', NULL),
(3, '1516004', 'Alea Alciro', 0, 'Malang', '2011-07-12 17:00:00', 'Malang', '-', '-', '=', 5, '2018-08-06 08:31:28', '2018-08-06 08:31:28', NULL),
(4, '1617012', 'Arina Tsabita', 1, 'Malang', '2011-06-27 17:00:00', 'Malang', '-', '-', '=', 5, '2018-08-06 08:33:18', '2018-08-06 08:33:18', NULL),
(5, '1516009', 'Azka Ahmad Ghifari', 0, 'Malang', '2011-08-17 17:00:00', 'Malang', '-', '-', '-', 5, '2018-08-06 08:34:39', '2018-08-06 08:34:39', NULL),
(6, '1516018', 'Ichwanul Ihsan', 0, 'Malang', '2004-12-31 17:00:00', '-', '-', '-', '-', 6, '2018-08-06 08:37:02', '2018-08-06 08:37:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenisbayar`
--
ALTER TABLE `jenisbayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mainmenu`
--
ALTER TABLE `mainmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_angka`
--
ALTER TABLE `nilai_angka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_uraian`
--
ALTER TABLE `nilai_uraian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenisbayar`
--
ALTER TABLE `jenisbayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mainmenu`
--
ALTER TABLE `mainmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai_angka`
--
ALTER TABLE `nilai_angka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_uraian`
--
ALTER TABLE `nilai_uraian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
