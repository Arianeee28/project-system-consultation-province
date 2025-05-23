-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 09:40 AM
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
-- Database: `db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userName`, `fullName`, `password`) VALUES
(2, 'admin', 'Admin Justine', '123456'),
(4, 'Justine', 'Justine Tabor', '$2y$10$O53kmhelmxw/7oCwJ70SU.rkduRkDG3DWBsdk.sFvAV6rwbfz9BK6');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `specialization` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `user_name`, `fullName`, `specialization`, `password`) VALUES
(2, 'Dr. Keer', 'Keer Francisco', 'Computer', '123456'),
(4, 'Keer', 'Keer The Great', 'Cardiologist', '$2y$10$jCDTZvuQCLRMhug9XiZ..eELmqJJNPfQhSa.XPdqCEc.SjxyPcM5q');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` char(10) NOT NULL,
  `phoneNumber` bigint(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `age`, `sex`, `phoneNumber`, `password`) VALUES
(9, 'Justine ', 'Bieber', 51, 'male/lalak', 12345678901, '$2y$10$1C8a/vh/NFu3d'),
(11, 'killua', 'jojo', 56, 'male/lalak', 9876543210, '$2y$10$rFECrFakQm1sn'),
(12, 'justine', 'graet', 21, 'male/lalak', 99999999991, '$2y$10$CoOrkOaUVZ3Yh'),
(13, 'juju', 'onthebeat', 23, 'male/lalak', 2323232323, '$2y$10$IBsJW8pdSI5Th'),
(14, 'kraaa', 'brrbrr', 22, 'male/lalak', 123456789, '$2y$10$P1Zsdt38LADwS'),
(15, 'hgfjhv', 'hjtfuytfu', 25, 'male/lalak', 21, '$2y$10$nz.JjvhyZcWt/'),
(16, 'Errenthe', 'Great', 21, 'male/lalak', 0, '$2y$10$cnzKi4kY0Ioq8'),
(17, 'Keerpogi', 'Pogi', 21, 'male/lalak', 102030405, '$2y$10$nRPneSxM9/.cT79WNOcwZOPcx4kV2UZv4zSNZZak.EVDPWfFxV2US'),
(18, 'Oscarthe', 'Great', 19, 'male/lalak', 88888888888, '$2y$10$qhJ.OVNMswCvk5nvVyV9cOGSB4vaMIqIV4yD4esDqF27Jp/cGql8S'),
(19, 'yv', 'ff', 10, 'male/lalak', 9543784035, '$2y$10$QIlB7krW7.8ggPSi1Mlo6.yDReTJj2WWnvIIBk3vMWLQBWfon5uFK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
