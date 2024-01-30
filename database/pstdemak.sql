-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 09:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pstdemak`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `dashboard`
-- (See below for the actual view)
--
CREATE TABLE `dashboard` (
`tahun` int(4)
,`bulan` int(2)
,`total` bigint(21)
,`jenis_kelamin` int(1)
,`kepuasan` int(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id` int(5) UNSIGNED NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id`, `jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kepuasan`
--

CREATE TABLE `kepuasan` (
  `id` int(5) UNSIGNED NOT NULL,
  `kepuasan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kepuasan`
--

INSERT INTO `kepuasan` (`id`, `kepuasan`) VALUES
(1, 'Sangat Tidak Puas'),
(2, 'Tidak Puas'),
(3, 'Puas'),
(4, 'Sangat Puas');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(5) UNSIGNED NOT NULL,
  `layanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `layanan`) VALUES
(1, 'Perpustakaan'),
(2, 'Konsultasi Kegiatan Statistik'),
(3, 'Konsultasi Data'),
(4, 'Konsultasi Rekomendasi Kegiatan Statistik');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-01-15-041551', 'App\\Database\\Migrations\\JenisKelamin', 'default', 'App', 1705308346, 1),
(2, '2024-01-15-041742', 'App\\Database\\Migrations\\PST', 'default', 'App', 1705308346, 1),
(3, '2024-01-15-073614', 'App\\Database\\Migrations\\Pendidikan', 'default', 'App', 1705308346, 1),
(4, '2024-01-15-074630', 'App\\Database\\Migrations\\Pekerjaan', 'default', 'App', 1705308346, 1),
(5, '2024-01-15-075231', 'App\\Database\\Migrations\\PemanfaatanData', 'default', 'App', 1705308346, 1),
(6, '2024-01-15-075420', 'App\\Database\\Migrations\\Layanan', 'default', 'App', 1705308346, 1),
(7, '2024-01-15-082653', 'App\\Database\\Migrations\\Kepuasan', 'default', 'App', 1705308346, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(5) UNSIGNED NOT NULL,
  `pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `pekerjaan`) VALUES
(1, 'Pelajar/Mahasiswa'),
(2, 'Peneliti/Dosen'),
(3, 'ASN/TNI/POLRI'),
(4, 'Pegawai BUMN/BUMD'),
(5, 'Pegawai Swasta'),
(6, 'Wiraswasta'),
(7, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `pemanfaatan_data`
--

CREATE TABLE `pemanfaatan_data` (
  `id` int(5) UNSIGNED NOT NULL,
  `pemanfaatan_data` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pemanfaatan_data`
--

INSERT INTO `pemanfaatan_data` (`id`, `pemanfaatan_data`) VALUES
(1, 'Tugas Sekolah/Tugas Kuliah'),
(2, 'Perencanaan'),
(3, 'Evaluasi'),
(4, 'Komersial'),
(5, 'Penelitian'),
(6, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(5) UNSIGNED NOT NULL,
  `pendidikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `pendidikan`) VALUES
(1, 'SLTA Kebawah/ SLTA/ Sederajat'),
(2, 'D1/D2/D3'),
(3, 'D4/S1'),
(4, 'S2'),
(5, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `pst`
--

CREATE TABLE `pst` (
  `id` int(5) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tahun_lahir` varchar(4) NOT NULL,
  `umur` int(3) NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan` int(1) NOT NULL,
  `pekerjaan` int(1) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `pemanfaatan_data` int(1) NOT NULL,
  `layanan` int(1) NOT NULL,
  `data` varchar(100) NOT NULL,
  `saran` text NOT NULL,
  `kepuasan` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pst`
--

INSERT INTO `pst` (`id`, `tanggal`, `tahun`, `nama`, `jenis_kelamin`, `email`, `tahun_lahir`, `umur`, `alamat`, `pendidikan`, `pekerjaan`, `instansi`, `pemanfaatan_data`, `layanan`, `data`, `saran`, `kepuasan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2024-11-18', '2020', 'Muhshi', 1, 'dasdas@emai.com', '1993', 21, '2q3rwtgfh weg hrf SWEG SD', 5, 3, 'BPS', 1, 2, 'dda 2027', 'BAGUS SEKALI', 4, '2024-01-18 08:04:08', '2024-01-18 08:04:08', NULL),
(2, '2024-07-18', '2023', 'Mitha', 2, 'email@email.com', '1987', 28, 'sadf EFSDFA ADFHDF', 3, 3, 'BPS', 3, 1, 'DDA 2020', 'bbs', 2, '2024-01-18 08:17:28', '2024-01-30 08:47:51', '2024-01-30 08:47:51'),
(3, '2024-01-18', '2023', 'Wiwik', 2, 'email@email.com', '1984', 30, 'sd saf sadf', 4, 3, 'BPS', 4, 2, 'DDA 2019', 'ok', 2, '2024-01-18 08:18:51', '2024-01-30 08:32:26', '2024-01-30 08:32:26'),
(4, '2024-03-18', '2024', 'Zaen', 1, 'email@emai.com', '1980', 34, 'sad ', 3, 3, 'BPS', 5, 2, 'DDA', 'ok', 4, '2024-01-18 08:20:22', '2024-01-30 08:32:08', '2024-01-30 08:32:08'),
(5, '2024-04-24', '2024', 'aku', 1, 'email@email.com', '1994', 21, 'dsf sdf', 2, 4, 'sdfasf', 4, 3, 'sadf', 'asfd', 2, '2024-01-18 08:25:39', '2024-01-30 08:32:01', '2024-01-30 08:32:01'),
(8, '2024-01-19', '2024', 'ads', 2, 'DSA@EMAIL.COM', '1684', 2, 'ASDF ', 2, 2, 'ASD', 2, 3, 'Asad', ' adS', 3, '2024-01-18 08:34:45', '2024-01-30 08:31:58', '2024-01-30 08:31:58'),
(9, '2024-05-19', '2024', 'Muhshi', 1, 'email@email.com', '1994', 29, 'alamat', 4, 3, 'instansi', 3, 2, 'dda ', 'saeran', 2, '2024-01-19 01:53:56', '2024-01-30 08:32:06', '2024-01-30 08:32:06'),
(10, '2024-01-10', '2024', 'Bareu', 1, 'sda@dsaf.com', '2004', 23, 'alamat', 2, 1, 'Instansi', 2, 2, 'DDA', 'saran', 3, '2024-01-19 01:56:00', '2024-01-30 08:32:04', '2024-01-30 08:32:04'),
(11, '2023-09-02', '2023', 'Mulyono', 1, 'pademak01@gmail.com', '1985', 38, 'Karangrejo, Wonosalam', 3, 3, 'Pengadilan Agama Demak', 3, 1, 'Kepadatan Penduduk, Jumlah Penduduk', '-', 4, '2024-01-29 07:16:14', '2024-01-29 07:16:14', NULL),
(12, '2023-02-14', '2023', 'Fitriana', 2, '-@gmail.com', '1993', 30, 'Pemkab Demak', 3, 3, 'Bappelitbangda', 3, 1, 'Pertumbuhan Ekonomi ', '-', 4, '2024-01-29 07:31:33', '2024-01-29 07:31:33', NULL),
(13, '2023-03-01', '2023', 'Nurul Nuraini', 2, '-@gmail.com', '1983', 41, 'Pemkab Demak', 3, 3, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu P', 3, 1, 'PDRB Lapangan Usaha 2022', '-', 4, '2024-01-29 07:35:28', '2024-01-29 07:35:28', NULL),
(14, '2023-03-31', '2023', 'Andri S.P, S.M', 1, 'klh@demakkab.go.id', '1979', 45, 'Jl. Bayangkara Baru No. 1, Demak', 4, 3, 'Dinas Lingkungan Hidup', 3, 1, 'Angka Kemiskinan. PDRB. Produktifitas Padi, Jumlah Penduduk', '-', 3, '2024-01-29 07:39:48', '2024-01-30 08:49:06', NULL),
(15, '2023-05-15', '2023', 'Dewi Sartika', 2, '-@gmail.com', '1979', 45, 'Demak', 3, 3, 'DinPTSP', 5, 1, 'PDRB Kabupaten Demak', '-', 4, '2024-01-29 07:42:01', '2024-01-29 07:42:01', NULL),
(16, '2023-06-21', '2023', 'Almira', 2, 'almiranadiakusuma@apps.ipb.ac.id', '2000', 24, 'Kabupaten Demak', 1, 1, 'Institut Pertanian Bogor', 5, 1, 'Data Kemiskinan dan Data Penduduk', 'bagus dan sangat puas', 4, '2024-01-29 07:44:39', '2024-01-30 08:48:22', NULL),
(17, '2023-08-08', '2023', 'Muhammad Sharifudin', 1, 'udin24651@gmail.com', '2000', 24, 'Desa sedo RT. 06 RW 02 Kec. Demak Kab. Demak', 3, 1, 'Universitas Semarang', 5, 1, 'Data usia produktif dan data lansia', '-', 3, '2024-01-29 07:47:32', '2024-01-29 07:47:32', NULL),
(18, '2023-08-08', '2023', 'Muhammad Imron', 1, 'udin24651@gmail.com', '1991', 33, 'Desa Pilangsari RT. 02 RW. 03 Kec. Sayung Kab. Demak', 3, 1, 'Universiats Semarang', 5, 1, 'Data usia Produktif dan data usaha lansia', '-', 4, '2024-01-29 07:50:48', '2024-01-29 07:50:48', NULL),
(19, '2023-08-21', '2023', 'Sheila Farach Diba', 2, '-@gmail.com', '2000', 24, 'Demak', 3, 7, 'Dinas Komunikasi dan Informatika Kabupaten Demak', 2, 1, 'Data Ketenagakerjaan', '-', 4, '2024-01-29 07:53:14', '2024-01-29 07:53:14', NULL),
(20, '2023-08-28', '2023', 'Norzam Yahya', 1, '-@gmail.com', '1992', 32, 'Demak', 1, 3, 'Dinas Kependudukan dan Pencatatan Sipil Kabupaten ', 2, 1, 'Data Kewilayahan (Kabupaten Demak Dalam Angka)', '-', 4, '2024-01-29 07:55:36', '2024-01-29 07:55:36', NULL),
(21, '2023-09-18', '2023', 'Endah Ekasanti', 2, '-@gmail.com', '1989', 35, 'Demak', 1, 3, 'Data Komunikasi dan Informatika Kabupaten Demak', 2, 1, 'Data Indeks Konsumsi Rumah Tangga (IKR) dan Biaya Produksi dan Pembentukan Barang Modal (BPPBM)', '-', 4, '2024-01-29 08:00:02', '2024-01-29 08:00:02', NULL),
(22, '2023-12-27', '2023', 'Dhama Sekar', 2, 'dhamasekar48@gmail.com', '2000', 23, 'Karanganyar', 2, 1, 'Universitas Muhammadiyah Semarang', 5, 1, 'Kabupaten Demak Dalam Angka', '-', 4, '2024-01-29 08:02:21', '2024-01-29 08:02:21', NULL),
(23, '2023-11-06', '2023', 'Anisa Rismawati', 2, 'anisa.rismawati@gmail.com', '2001', 23, 'Kecamatan Karangawen', 1, 1, 'Universitas Diponegoro', 5, 1, 'Jumlah Penduduk', '-', 3, '2024-01-29 08:04:54', '2024-01-29 08:04:54', NULL),
(24, '2023-12-18', '2023', 'Darmawan, MT', 1, 'darmawanmtaufiq@gmail.com', '1988', 36, 'Demak', 3, 7, 'PT Pemodalan Nasional Madani', 2, 1, 'Data Ketenagakerjaan', '-', 3, '2024-01-29 08:07:53', '2024-01-29 08:07:53', NULL);

-- --------------------------------------------------------

--
-- Structure for view `dashboard`
--
DROP TABLE IF EXISTS `dashboard`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dashboard`  AS SELECT year(`r`.`tanggal`) AS `tahun`, month(`r`.`tanggal`) AS `bulan`, count(`r`.`id`) AS `total`, `r`.`jenis_kelamin` AS `jenis_kelamin`, `r`.`kepuasan` AS `kepuasan` FROM `pst` AS `r` WHERE `r`.`deleted_at` is null GROUP BY year(`r`.`tanggal`), month(`r`.`tanggal`), `r`.`jenis_kelamin`, `r`.`kepuasan` ORDER BY year(`r`.`tanggal`) ASC, month(`r`.`tanggal`) ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kepuasan`
--
ALTER TABLE `kepuasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemanfaatan_data`
--
ALTER TABLE `pemanfaatan_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pst`
--
ALTER TABLE `pst`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kepuasan`
--
ALTER TABLE `kepuasan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pemanfaatan_data`
--
ALTER TABLE `pemanfaatan_data`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pst`
--
ALTER TABLE `pst`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
