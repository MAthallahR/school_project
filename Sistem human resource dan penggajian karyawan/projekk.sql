-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2025 at 01:21 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekk`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int NOT NULL,
  `nama` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `tanggal` date NOT NULL,
  `absen_pada` time NOT NULL,
  `keluar_pada` time DEFAULT NULL,
  `alasan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dafker`
--

CREATE TABLE `dafker` (
  `id` int NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telp` varchar(250) NOT NULL,
  `jenis_kelamin` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id` int NOT NULL,
  `nama` varchar(250) NOT NULL,
  `gaji-pokok` varchar(250) NOT NULL,
  `potongan` varchar(250) NOT NULL,
  `bonus` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id`, `nama`, `gaji-pokok`, `potongan`, `bonus`) VALUES
(1, 'cole palmer', '100000000', '5000000', '15000000');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int NOT NULL,
  `nama` varchar(250) NOT NULL,
  `nomortelp` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_kelamin` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jabatan` varchar(250) NOT NULL,
  `token` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `nomortelp`, `jenis_kelamin`, `jabatan`, `token`) VALUES
(1, 'cole palmer', '+6285777380134', 'pria', 'boss', '250508'),
(2, 'Nicolas JACKson', '+6286996372234', 'peria', 'Penasehat', '692233'),
(3, 'mykhailo mudryk', '+6284215692431', 'Pria', 'CEO', '156910'),
(4, 'Anthony Santos nigga', '+6281234236922', 'laki', 'Karyawan', '211169'),
(5, 'mudryk', '18372313132', 'laki', 'Karyawan', '335244'),
(6, 'sigma', '1231329910482142', 'Laki', 'Karyawan', '784112'),
(7, 'Simple', '1415215', 'laki', 'Karyawan', '853134');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_absensi`
--

CREATE TABLE `riwayat_absensi` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal` date NOT NULL,
  `absen_pada` time NOT NULL,
  `keluar_pada` time DEFAULT NULL,
  `alasan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `riwayat_absensi`
--

INSERT INTO `riwayat_absensi` (`id`, `nama`, `keterangan`, `tanggal`, `absen_pada`, `keluar_pada`, `alasan`) VALUES
(18, 'cole palmer', 'Hadir', '2025-04-17', '00:18:59', '00:19:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_on`) VALUES
(1, 'guest', 'guest', '2024-11-18 20:38:45'),
(2, 'admin', 'admin', '2024-11-18 20:38:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `dafker`
--
ALTER TABLE `dafker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telp` (`telp`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD UNIQUE KEY `nomor-kontak` (`nomortelp`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `riwayat_absensi`
--
ALTER TABLE `riwayat_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dafker`
--
ALTER TABLE `dafker`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `riwayat_absensi`
--
ALTER TABLE `riwayat_absensi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `PindahAbsensi` ON SCHEDULE EVERY 1 DAY STARTS '2025-04-18 06:59:59' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    DECLARE source_count INT;
    DECLARE transferred_count INT;
    
    -- 1. Verify source data
    SELECT COUNT(*) INTO source_count FROM absensi 
    WHERE DATE(CONVERT_TZ(tanggal, '+00:00', '+07:00')) = CURDATE();
    
    -- Only proceed if data exists
    IF source_count > 0 THEN
        -- 2. Transfer with timezone fix
        INSERT INTO riwayat_absensi 
        SELECT * FROM absensi 
        WHERE DATE(CONVERT_TZ(tanggal, '+00:00', '+07:00')) = CURDATE();
        
        -- 3. Verify transfer
        SELECT COUNT(*) INTO transferred_count FROM riwayat_absensi 
        WHERE DATE(CONVERT_TZ(tanggal, '+00:00', '+07:00')) = CURDATE();
        
        -- 4. Only delete if counts match exactly
        IF source_count = transferred_count THEN
            DELETE FROM absensi 
            WHERE DATE(CONVERT_TZ(tanggal, '+00:00', '+07:00')) = CURDATE();
        END IF;
    END IF;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
