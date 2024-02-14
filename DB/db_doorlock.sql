-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2023 at 12:47 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_doorlock`
--

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `id_monitor` int NOT NULL,
  `rfid_id` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ruangan_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `date_request` date DEFAULT NULL,
  `time_request` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`id_monitor`, `rfid_id`, `ruangan_id`, `date_request`, `time_request`) VALUES
(1, '13 8C 45 10', 'CM-2124                                           ', '2023-12-28', '07:47:58'),
(2, '8A 11 7E 19', 'CM-2124                                           ', '2023-12-25', '09:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` char(50) NOT NULL,
  `nama_ruangan` varchar(50) DEFAULT NULL,
  `edit_by` varchar(50) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_edit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `edit_by`, `date_created`, `date_edit`) VALUES
('CH-232', 'video', NULL, NULL, NULL),
('CH-23S', 'Kantor', NULL, NULL, NULL),
('CM-2124', 'LAB ROBOTIK', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_card`
--

CREATE TABLE `user_card` (
  `id` int NOT NULL,
  `id_rfid` char(50) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `identitas` char(20) DEFAULT NULL,
  `edit_by` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `edit_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_card`
--

INSERT INTO `user_card` (`id`, `id_rfid`, `nama`, `identitas`, `edit_by`, `status`, `create_date`, `edit_date`) VALUES
(1, '13 8C 45 10', 'hanan', 'mahasiswa', NULL, 1, '2023-12-22 16:38:29', NULL),
(2, '8A 11 7E 19', 'dsda', 'Dosen', NULL, 0, '2023-12-22 17:13:08', '2023-12-25 09:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int NOT NULL,
  `Column 2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id_monitor`),
  ADD KEY `rfid_id` (`rfid_id`),
  ADD KEY `ruangan_id` (`ruangan_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `user_card`
--
ALTER TABLE `user_card`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id_rfid` (`id_rfid`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_card`
--
ALTER TABLE `user_card`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD CONSTRAINT `RFID` FOREIGN KEY (`rfid_id`) REFERENCES `user_card` (`id_rfid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Ruangan` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
