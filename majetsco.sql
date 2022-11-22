-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306:3306
-- Generation Time: Sep 02, 2022 at 07:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majetsco`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` varchar(300) NOT NULL,
  `admin_pword` varchar(300) NOT NULL,
  `admin_surname` varchar(300) NOT NULL,
  `admin_firstname` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_pword`, `admin_surname`, `admin_firstname`) VALUES
('admin', 'sudBR9QN3U5Tw', 'Mark Steven', 'Reyes'),
('superadmin', '$2y$10$uGIPJxd7cVZQziearvWzXuWAHJJmVcWmp221uAEOf4IZmg5SqZrfu', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_attendance_sheet`
--

CREATE TABLE `tb_attendance_sheet` (
  `emp_id` varchar(300) NOT NULL,
  `time_in` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `time_out` timestamp(6) NULL DEFAULT NULL,
  `attendance_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_attendance_sheet`
--

INSERT INTO `tb_attendance_sheet` (`emp_id`, `time_in`, `time_out`, `attendance_date`) VALUES
('1', '2022-08-30 04:47:44.000000', '2022-08-30 11:47:44.000000', '2022-08-30'),
('2', '2022-08-30 01:47:44.000000', '2022-08-30 04:47:44.000000', '2022-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `emp_id` varchar(300) NOT NULL,
  `emp_type` varchar(300) DEFAULT NULL,
  `emp_pword` varchar(300) NOT NULL,
  `emp_surname` varchar(300) NOT NULL,
  `emp_firstname` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`emp_id`, `emp_type`, `emp_pword`, `emp_surname`, `emp_firstname`) VALUES
('1', NULL, '$2y$10$MXS8.hvhWETGlGhkWAHowOCU6wrIVB02SH000wiikD3Iqr3mAH0VO', 'Reyes', 'Mark Steven'),
('2', NULL, '$2y$10$oBwdsgshosjykXChy/1VneK2Bt3j/PjCyiFUZc.xdlys7P9AVRlQm', 'Villavicencio', 'John Vincent');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jeepney`
--

CREATE TABLE `tb_jeepney` (
  `plate_number` varchar(300) NOT NULL,
  `jeepney_route` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jeepney`
--

INSERT INTO `tb_jeepney` (`plate_number`, `jeepney_route`) VALUES
('480BBZ', 'GASAK-DIVISORIA'),
('7AAA616', 'GASAK-RECTO'),
('CY9D708', 'MALABON-MONUMENTO'),
('TK761NPJ', 'MALABON-NAVOTAS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_maintenance`
--

CREATE TABLE `tb_maintenance` (
  `date_issued` date NOT NULL,
  `date_fixed` date NOT NULL,
  `plate_number` varchar(300) NOT NULL,
  `defective_part` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL,
  `maintenance_cost` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_maintenance`
--

INSERT INTO `tb_maintenance` (`date_issued`, `date_fixed`, `plate_number`, `defective_part`, `description`, `maintenance_cost`) VALUES
('0000-00-00', '0000-00-00', '7AAA616', 'Windshield', 'Loose ', 900),
('0000-00-00', '0000-00-00', '7AAA616', 'Tire', 'Flat Tire', 800),
('2022-01-09', '2022-01-09', '480BBZ', 'Windshield', 'Loose', 400);

-- --------------------------------------------------------

--
-- Table structure for table `tb_route`
--

CREATE TABLE `tb_route` (
  `jeepney_route` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_route`
--

INSERT INTO `tb_route` (`jeepney_route`) VALUES
('GASAK-DIVISORIA'),
('GASAK-RECTO'),
('MALABON-MONUMENTO'),
('MALABON-NAVOTAS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_attendance_sheet`
--
ALTER TABLE `tb_attendance_sheet`
  ADD KEY `emp_id_fk` (`emp_id`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tb_jeepney`
--
ALTER TABLE `tb_jeepney`
  ADD KEY `route_fk` (`jeepney_route`);

--
-- Indexes for table `tb_route`
--
ALTER TABLE `tb_route`
  ADD PRIMARY KEY (`jeepney_route`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_attendance_sheet`
--
ALTER TABLE `tb_attendance_sheet`
  ADD CONSTRAINT `emp_id_fk` FOREIGN KEY (`emp_id`) REFERENCES `tb_employee` (`emp_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tb_jeepney`
--
ALTER TABLE `tb_jeepney`
  ADD CONSTRAINT `route_fk` FOREIGN KEY (`jeepney_route`) REFERENCES `tb_route` (`jeepney_route`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
