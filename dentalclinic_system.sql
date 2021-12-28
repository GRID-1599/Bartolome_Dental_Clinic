-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 09:43 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dentalclinic_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `ActLog_Id` int(11) NOT NULL,
  `DateTime_Happen` datetime NOT NULL,
  `Admin` varchar(50) NOT NULL,
  `Action` varchar(25) NOT NULL,
  `Activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`ActLog_Id`, `DateTime_Happen`, `Admin`, `Action`, `Activity`) VALUES
(83, '2021-12-25 01:02:11', 'jude', 'Clean', 'Log cleaned'),
(84, '2021-12-26 13:21:34', 'admin', 'Edit', 'Appointment QSF7YUZ0RUJ32OF has been approved'),
(85, '2021-12-26 13:22:24', 'admin', 'Edit', 'Appointment BK6BHR3HF3ULTZY has been approved'),
(86, '2021-12-26 16:33:57', 'jude', 'Edit', 'Appointment 2C2U5MUT4JRWB4B has been approved'),
(87, '2021-12-26 16:38:07', 'jude', 'Edit', 'Appointment NWK2VKTFL6I82OT has been changed'),
(88, '2021-12-26 16:43:11', 'jude', 'Move', 'Appointment 2C2U5MUT4JRWB4B has been moved to archives'),
(89, '2021-12-26 16:44:16', 'jude', 'Move', 'Appointment QSHOKVUWAWA7Z4K has been unmoved from archives'),
(90, '2021-12-26 16:46:58', 'jude', 'Move', 'Appointment BK6BHR3HF3ULTZY has been moved to archives'),
(91, '2021-12-26 16:47:07', 'jude', 'Move', 'Appointment BK6BHR3HF3ULTZY has been unmoved from archives'),
(92, '2021-12-26 16:47:24', 'jude', 'Move', 'Appointment BK6BHR3HF3ULTZY has been moved to archives'),
(93, '2021-12-26 16:47:37', 'jude', 'Move', 'Appointment BK6BHR3HF3ULTZY has been unmoved from archives'),
(94, '2021-12-26 16:47:56', 'jude', 'Edit', 'Appointment NWK2VKTFL6I82OT has been approved'),
(95, '2021-12-26 16:51:06', 'jude', 'Edit', 'Appointment 7QS9CVFD8XYGL3B has been approved'),
(96, '2021-12-26 16:51:16', 'jude', 'Edit', 'Appointment H8BNU0ID7WPB4D7 has been approved'),
(97, '2021-12-26 16:51:33', 'jude', 'Edit', 'Appointment QSHOKVUWAWA7Z4K has been approved'),
(98, '2021-12-26 18:53:29', 'jude', 'Edit', 'Appointment QIRZ6VZP4RZHFNX has been approved'),
(99, '2021-12-26 18:58:05', 'jude', 'Edit', 'Appointment BK6BHR3HF3ULTZY has been changed'),
(100, '2021-12-26 19:20:44', 'jude', 'Edit', 'Appointment WY9BB5JGF4PDEAX has been approved'),
(101, '2021-12-26 19:21:29', 'jude', 'Edit', 'Appointment QSF7YUZ0RUJ32OF has been changed'),
(102, '2021-12-26 20:51:16', 'jude', 'Edit', 'Patient 1001 details edited'),
(103, '2021-12-26 20:54:07', 'Patient', 'Edit', 'Patient 1001 details edited'),
(104, '2021-12-26 22:46:27', 'jude', 'Edit', 'Service S101 edited'),
(105, '2021-12-26 23:20:00', 'jude', 'Move', 'Appointment WY9BB5JGF4PDEAX has been moved to archives'),
(106, '2021-12-26 23:39:38', 'admin', 'Move', 'Appointment 7QS9CVFD8XYGL3B has been moved to archives'),
(107, '2021-12-26 23:40:04', 'admin', 'Move', 'Appointment 7QS9CVFD8XYGL3B has been unmoved from archives'),
(108, '2021-12-26 23:42:31', 'admin', 'Move', 'Appointment WY9BB5JGF4PDEAX has been unmoved from archives'),
(109, '2021-12-26 23:42:41', 'admin', 'Move', 'Appointment 6F85KQU3TBNIXJR has been unmoved from archives'),
(110, '2021-12-26 23:43:01', 'admin', 'Move', 'Appointment S2XFH573YDKIOUC has been unmoved from archives'),
(111, '2021-12-26 23:43:49', 'admin', 'Move', 'Appointment 2C2U5MUT4JRWB4B has been unmoved from archives'),
(112, '2021-12-26 23:44:09', 'admin', 'Move', 'Appointment WY9BB5JGF4PDEAX has been moved to archives'),
(113, '2021-12-26 23:44:18', 'admin', 'Move', 'Appointment 7QS9CVFD8XYGL3B has been moved to archives'),
(114, '2021-12-26 23:44:28', 'admin', 'Move', 'Appointment WY9BB5JGF4PDEAX has been unmoved from archives'),
(115, '2021-12-26 23:44:48', 'admin', 'Move', 'Appointment 7QS9CVFD8XYGL3B has been unmoved from archives'),
(116, '2021-12-26 23:45:57', 'admin', 'Move', 'Appointment WY9BB5JGF4PDEAX has been moved to archives'),
(117, '2021-12-26 23:46:09', 'admin', 'Move', 'Appointment WY9BB5JGF4PDEAX has been unmoved from archives'),
(118, '2021-12-26 23:47:09', 'admin', 'Move', 'Appointment WY9BB5JGF4PDEAX has been moved to archives'),
(119, '2021-12-26 23:47:15', 'admin', 'Move', 'Appointment 7QS9CVFD8XYGL3B has been moved to archives'),
(120, '2021-12-26 23:47:22', 'admin', 'Move', 'Appointment QIRZ6VZP4RZHFNX has been moved to archives'),
(121, '2021-12-27 00:07:39', 'admin', 'Edit', 'Appointment W2VX6Q4EY7343IL has been approved'),
(122, '2021-12-27 00:07:54', 'admin', 'Edit', 'Appointment 1A00QF9L475TN5W has been approved'),
(123, '2021-12-27 00:08:24', 'admin', 'Edit', 'Appointment S2XFH573YDKIOUC has been approved'),
(124, '2021-12-27 12:53:19', 'admin', 'Edit', 'Appointment K928N4D2A6KE8JP has been approved'),
(125, '2021-12-27 12:53:31', 'admin', 'Delete', 'Appointment K928N4D2A6KE8JP has been deleted'),
(126, '2021-12-27 12:59:58', 'admin', 'Edit', 'Appointment JL0RST5U2CAWN93 has been approved'),
(127, '2021-12-27 13:31:23', 'admin', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(128, '2021-12-27 13:31:58', 'admin', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(129, '2021-12-27 13:32:51', 'admin', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(130, '2021-12-27 13:50:41', 'admin', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(131, '2021-12-27 13:51:18', 'admin', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(132, '2021-12-27 13:52:44', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(133, '2021-12-27 13:52:53', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(134, '2021-12-27 13:53:32', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(135, '2021-12-27 13:54:06', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(136, '2021-12-27 13:54:36', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(137, '2021-12-27 13:54:45', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(138, '2021-12-27 13:56:39', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(139, '2021-12-27 13:56:47', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(140, '2021-12-27 13:57:38', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(141, '2021-12-27 13:58:50', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(142, '2021-12-27 13:59:13', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(143, '2021-12-27 14:02:45', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(144, '2021-12-27 14:02:53', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(145, '2021-12-27 14:04:11', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(146, '2021-12-27 14:04:20', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(147, '2021-12-27 14:04:46', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(148, '2021-12-27 14:05:12', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(149, '2021-12-27 14:11:12', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(150, '2021-12-27 14:11:21', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(151, '2021-12-27 14:12:06', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(152, '2021-12-27 14:12:19', 'jude', 'Edit', 'Appointment JL0RST5U2CAWN93 has been changed'),
(153, '2021-12-27 14:14:24', 'jude', 'Edit', 'Appointment YCWHE4EZG172IBE has been approved'),
(154, '2021-12-27 14:16:09', 'jude', 'Edit', 'Appointment 8ZV6FOMBDPHLDYY has been approved'),
(155, '2021-12-27 14:16:54', 'jude', 'Edit', 'Appointment 3OUVDL0Y5CP1WHE has been approved'),
(156, '2021-12-27 14:21:40', 'jude', 'Edit', 'Appointment 4RJBA4U0Z6ZMCPO has been approved'),
(157, '2021-12-27 14:21:50', 'jude', 'Edit', 'Appointment 4RJBA4U0Z6ZMCPO has been changed'),
(158, '2021-12-27 14:22:02', 'jude', 'Edit', 'Appointment 4RJBA4U0Z6ZMCPO has been changed'),
(159, '2021-12-27 14:22:54', 'jude', 'Edit', 'Appointment 4RJBA4U0Z6ZMCPO has been changed'),
(160, '2021-12-27 14:23:26', 'jude', 'Edit', 'Appointment 4RJBA4U0Z6ZMCPO has been changed'),
(161, '2021-12-27 14:26:04', 'jude', 'Edit', 'Appointment RIQNBX2U48OIJ17 has been approved'),
(162, '2021-12-27 14:28:21', 'jude', 'Edit', 'Appointment YCWHE4EZG172IBE has been changed'),
(163, '2021-12-27 14:32:32', 'jude', 'Edit', 'Appointment 3OUVDL0Y5CP1WHE has been changed'),
(164, '2021-12-27 21:05:41', 'admin', 'Edit', 'Appointment 1Z1ZR7DD1WOIX1H has been changed'),
(165, '2021-12-27 21:12:31', 'admin', 'Edit', 'Appointment B5MFSNI161H36ND has been approved'),
(166, '2021-12-27 21:13:21', 'admin', 'Edit', 'Appointment 1Z1ZR7DD1WOIX1H has been approved'),
(167, '2021-12-27 21:14:52', 'admin', 'Edit', 'Appointment B5MFSNI161H36ND has been changed'),
(168, '2021-12-28 01:59:47', 'jude', 'Edit', 'Date 2022-01-23 has been set to not available'),
(169, '2021-12-28 01:59:51', 'jude', 'Edit', 'Date 2022-01-23 has been set to available'),
(170, '2021-12-28 02:00:26', 'jude', 'Edit', 'Date 2022-01-23 has been set to not available'),
(171, '2021-12-28 02:00:30', 'jude', 'Edit', 'Date 2022-01-23 has been set to available');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(55) NOT NULL,
  `Password` varchar(120) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`, `First_Name`, `Last_Name`, `Contact`, `Email`) VALUES
('123', '$2y$10$bOI.l9O.ZJCGeQkbejRsIOelOdcGJBkFQr2paZeyp56cViUEPzVSW', 'qweq', 'qwe', '231', 'qwe@gmail.com'),
('admin', '$2y$10$RQKP2kBXvpV9Dot9pHyi8ezjrOtSI1T.MVKhg34ybaCN8JCX8vICC', 'jude', 'catudio', '11241241241', 'catudiochrisitaianjdue@gmail.com'),
('jude', '$2y$10$l6M15hGmlHhqvYiIaHxjROkqYpFkH7EA2CCikOMUQ7NkhXLe.WuX2', 'Christian Jude', 'Catudio', '09204248723', 'catudiochristianjude@gmail.com'),
('zxc', '$2y$10$42doLfs2MyD3av6y3zTkQ.V7y/qYZN7pY7E4.MF.qozz1q1VKO/Me', 'jude', 'Catudio', '09204248741', 'catudiochristianjude@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointment_Id` varchar(20) NOT NULL,
  `Patient_ID` int(5) NOT NULL,
  `Contact` varchar(12) NOT NULL,
  `Appoinment_Date` date NOT NULL,
  `Appointment_StartTime` time NOT NULL,
  `Appointment_EndTime` time NOT NULL,
  `Duration_Minutes` int(3) NOT NULL,
  `Allotted_Hours` int(2) NOT NULL,
  `Date_Created` datetime NOT NULL,
  `Payment_Method` varchar(25) NOT NULL,
  `IsPaid` tinyint(1) NOT NULL,
  `Amount` int(6) NOT NULL,
  `IsDone` tinyint(1) NOT NULL,
  `IsApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Appointment_Id`, `Patient_ID`, `Contact`, `Appoinment_Date`, `Appointment_StartTime`, `Appointment_EndTime`, `Duration_Minutes`, `Allotted_Hours`, `Date_Created`, `Payment_Method`, `IsPaid`, `Amount`, `IsDone`, `IsApproved`) VALUES
('1A00QF9L475TN5W', 1001, '09973356903', '2022-01-13', '15:00:00', '17:00:00', 120, 2, '2021-12-27 00:02:38', 'GCash', 0, 600, 0, 1),
('1Z1ZR7DD1WOIX1H', 1001, '09973356903', '2022-01-20', '13:00:00', '14:00:00', 30, 1, '2021-12-27 21:02:41', 'GCash', 1, 1500, 1, 1),
('2C2U5MUT4JRWB4B', 1001, '09973356903', '2021-12-23', '10:00:00', '12:00:00', 120, 2, '2021-12-09 01:23:16', 'GCash', 0, 600, 0, 1),
('3OUVDL0Y5CP1WHE', 1001, '09973356903', '2022-01-14', '15:00:00', '16:00:00', 60, 1, '2021-12-27 00:09:58', 'GCash', 1, 600, 0, 1),
('4RJBA4U0Z6ZMCPO', 1001, '09973356903', '2022-01-07', '11:00:00', '14:00:00', 120, 2, '2021-12-27 00:06:21', 'PayLater', 0, 600, 1, 1),
('6F85KQU3TBNIXJR', 1186, '022312313133', '2021-12-27', '15:00:00', '17:00:00', 120, 2, '2021-12-09 02:23:07', 'GCash', 0, 600, 0, 0),
('8ZV6FOMBDPHLDYY', 1001, '09973356903', '2022-02-26', '14:00:00', '16:00:00', 120, 2, '2021-12-27 14:01:34', 'PayLater', 0, 600, 0, 1),
('B5MFSNI161H36ND', 1001, '09973356903', '2022-02-17', '13:00:00', '14:00:00', 30, 1, '2021-12-27 21:06:59', 'GCash', 1, 1500, 0, 1),
('BK6BHR3HF3ULTZY', 1001, '09973356903', '2021-12-14', '13:00:00', '15:00:00', 120, 2, '2021-12-13 20:11:11', 'GCash', 0, 600, 1, 1),
('H8BNU0ID7WPB4D7', 1001, '09973356903', '2021-12-31', '15:00:00', '17:00:00', 120, 2, '2021-12-09 01:45:38', 'GCash', 0, 600, 0, 1),
('JL0RST5U2CAWN93', 1001, '09973356903', '2022-01-29', '15:00:00', '16:00:00', 60, 1, '2021-12-27 01:27:29', 'GCash', 1, 700, 0, 1),
('KGTQWRUCH98QSS5', 1001, '09973356903', '2022-01-07', '14:00:00', '16:00:00', 120, 2, '2021-12-27 21:10:28', 'GCash', 0, 600, 0, 0),
('LFZMGVM87FXXVRR', 1001, '09973356903', '2021-12-31', '13:00:00', '15:00:00', 120, 2, '2021-12-26 23:58:56', 'GCash', 0, 600, 0, 0),
('NVE4GXG6ZSJ7E1F', 1001, '09973356903', '2022-01-07', '09:00:00', '10:00:00', 60, 1, '2021-12-27 21:11:51', 'PayLater', 0, 600, 0, 0),
('NWK2VKTFL6I82OT', 1001, '09973356903', '2021-12-30', '09:00:00', '11:00:00', 120, 2, '2021-12-09 01:18:18', 'GCash', 1, 2300, 1, 1),
('QSF7YUZ0RUJ32OF', 1186, '022312313133', '2021-12-17', '13:00:00', '15:00:00', 120, 2, '2021-12-13 20:39:18', 'GCash', 0, 6000, 1, 1),
('QSHOKVUWAWA7Z4K', 1186, '022312313133', '2021-12-29', '14:00:00', '16:00:00', 120, 2, '2021-12-09 01:46:43', 'GCash', 0, 600, 0, 1),
('RIQNBX2U48OIJ17', 1001, '09973356903', '2021-12-31', '10:00:00', '12:00:00', 120, 2, '2021-12-27 00:00:54', 'GCash', 0, 600, 0, 1),
('S2XFH573YDKIOUC', 1001, '09973356903', '2021-12-10', '15:00:00', '17:00:00', 120, 2, '2021-12-09 01:29:07', 'GCash', 0, 2200, 0, 1),
('W2VX6Q4EY7343IL', 1001, '09973356903', '2022-01-10', '15:00:00', '17:00:00', 120, 2, '2021-12-27 00:06:42', 'GCash', 0, 600, 0, 1),
('WO83IQHL8X3YQJD', 1001, '09973356903', '2021-12-30', '11:00:00', '14:00:00', 120, 2, '2021-12-26 22:59:01', 'GCash', 0, 600, 0, 0),
('YCWHE4EZG172IBE', 1001, '09973356903', '2022-02-12', '10:00:00', '12:00:00', 120, 2, '2021-12-27 14:12:50', 'GCash', 1, 600, 1, 1),
('Z095MZ191SZAEZD', 1001, '09973356903', '2021-12-23', '13:00:00', '15:00:00', 120, 2, '2021-12-14 10:48:45', 'PayLater', 1, 600, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_patient_condition`
--

CREATE TABLE `appointment_patient_condition` (
  `Appointmet_ID` varchar(20) NOT NULL,
  `Patient_ID` int(5) NOT NULL,
  `Patient_Condition` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_service`
--

CREATE TABLE `appointment_service` (
  `AS_ID` int(11) NOT NULL,
  `Appoinment_Id` varchar(20) NOT NULL,
  `Service_Id` varchar(10) NOT NULL,
  `Service_Name` varchar(150) NOT NULL,
  `Service_Prc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_service`
--

INSERT INTO `appointment_service` (`AS_ID`, `Appoinment_Id`, `Service_Id`, `Service_Name`, `Service_Prc`) VALUES
(67, '9YHPC81364EKI9Z', 'S101', 'Extraction', '600'),
(68, 'X287ONT0TFUYXF3', 'S101', 'Extraction', '600'),
(69, '4X0AKKHK7C47MDT', 'S101', 'Extraction', '600'),
(70, 'QHCBLAQTTI2RF3F', 'S101', 'Extraction', '600'),
(71, '7VZVTN646X9ITVY', 'S101', 'Extraction', '600'),
(72, '4A2P04N4RJ0DAC6', 'S101', 'Extraction', '600'),
(73, 'NWK2VKTFL6I82OT', 'S113', 'Debacterol Application', '300'),
(74, 'NWK2VKTFL6I82OT', 'S112', 'Non-Surgical Root Planning (Per quadrant)', '2,000'),
(75, 'JXVTQA17H820P7N', 'S104', 'Suture', '500'),
(76, 'JXVTQA17H820P7N', 'S105', 'Odontectomy Class I', '6,000+'),
(77, '2C2U5MUT4JRWB4B', 'S101', 'Extraction', '600'),
(78, 'S7841RRYQKHYG6N', 'S101', 'Extraction', '600'),
(79, 'S7841RRYQKHYG6N', 'S104', 'Suture', '500'),
(80, 'S2XFH573YDKIOUC', 'S102', 'Additional Anesthesia', '200'),
(81, 'S2XFH573YDKIOUC', 'S112', 'Non-Surgical Root Planning (Per quadrant)', '2,000'),
(82, 'H8BNU0ID7WPB4D7', 'S101', 'Extraction', '600'),
(83, 'QSHOKVUWAWA7Z4K', 'S101', 'Extraction', '600'),
(84, '6F85KQU3TBNIXJR', 'S101', 'Extraction', '600'),
(85, 'BK6BHR3HF3ULTZY', 'S101', 'Extraction', '600'),
(86, '1HM9LAXXYFAQO56', 'S102', 'Additional Anesthesia', '200'),
(87, '1HM9LAXXYFAQO56', 'S103', 'Surgical Extraction', '1,000+'),
(88, '5UHBLB5LUGLOAHF', 'S106', 'Odontectomy Class II/III', '8,000+'),
(89, '5UHBLB5LUGLOAHF', 'S109', 'Oral Prophylaxis (Mild)', '700'),
(90, 'QSF7YUZ0RUJ32OF', 'S105', 'Odontectomy Class I', '6,000+'),
(91, 'Z095MZ191SZAEZD', 'S101', 'Extraction', '600'),
(92, 'KWEQUJZEX6X1F7R', 'S108', 'Gingivectomy', '4,000'),
(93, 'KWEQUJZEX6X1F7R', 'S112', 'Non-Surgical Root Planning (Per quadrant)', '2,000'),
(94, '78SOZRQ59YNOF7P', 'S101', 'Extraction', '600 '),
(95, '78SOZRQ59YNOF7P', 'S104', 'Suture', '500'),
(96, '78SOZRQ59YNOF7P', 'S125', 'Strip-Off Crowns', '3,000'),
(97, '78SOZRQ59YNOF7P', 'S131', 'Fixed Orthodontics Class III', '50,000+'),
(98, '78SOZRQ59YNOF7P', 'S134', 'Retainers with pontic/active', '4,500+'),
(99, 'H9GNIXAW0OBFICS', 'S101', 'Extraction', '600'),
(100, 'ZGVYTCRL6EQD2VL', 'S101', 'Extraction', '600 '),
(101, 'FLYEW2F4D6PGBCN', 'S101', 'Extraction', '600'),
(102, '1JKG5YB9C5VBH1L', 'S101', 'Extraction', '600'),
(103, '4MLC6KEP3C557EU', 'S101', 'Extraction', '600'),
(104, '4MLC6KEP3C557EU', 'S107', 'Frenectomy', '3500'),
(105, 'QIRZ6VZP4RZHFNX', 'S103', 'Surgical Extraction', '1,000+'),
(106, '7QS9CVFD8XYGL3B', 'S128', 'Orthodontic Appliance', '10,000-15,000'),
(107, '7QS9CVFD8XYGL3B', 'S127', 'Space Maintainer Appliance', '4,000 - 7,000'),
(108, 'WY9BB5JGF4PDEAX', 'S224', 'Denture Repair', '500 - 1,500'),
(109, 'WO83IQHL8X3YQJD', 'S101', 'Extraction', '600'),
(110, 'LFZMGVM87FXXVRR', 'S101', 'Extraction', '600'),
(111, 'RIQNBX2U48OIJ17', 'S101', 'Extraction', '600'),
(112, '1A00QF9L475TN5W', 'S101', 'Extraction', '600'),
(113, 'K928N4D2A6KE8JP', 'S101', 'Extraction', '600'),
(114, '4RJBA4U0Z6ZMCPO', 'S101', 'Extraction', '600'),
(115, 'W2VX6Q4EY7343IL', 'S101', 'Extraction', '600'),
(116, '3OUVDL0Y5CP1WHE', 'S114', 'Light Cure Composite', '600'),
(117, 'JL0RST5U2CAWN93', 'S109', 'Oral Prophylaxis (Mild)', '700'),
(118, '8ZV6FOMBDPHLDYY', 'S101', 'Extraction', '600'),
(119, 'YCWHE4EZG172IBE', 'S101', 'Extraction', '600'),
(120, '1Z1ZR7DD1WOIX1H', 'S223', 'Denture Reline', '1,500'),
(121, 'B5MFSNI161H36ND', 'S223', 'Denture Reline', '1,500'),
(122, 'KGTQWRUCH98QSS5', 'S101', 'Extraction', '600'),
(123, 'NVE4GXG6ZSJ7E1F', 'S114', 'Light Cure Composite', '600');

-- --------------------------------------------------------

--
-- Table structure for table `archived_appointment`
--

CREATE TABLE `archived_appointment` (
  `Appointment_Id` varchar(20) NOT NULL,
  `Patient_ID` int(5) NOT NULL,
  `Contact` varchar(12) NOT NULL,
  `Appoinment_Date` date NOT NULL,
  `Appointment_StartTime` time NOT NULL,
  `Appointment_EndTime` time NOT NULL,
  `Duration_Minutes` int(3) NOT NULL,
  `Allotted_Hours` int(2) NOT NULL,
  `Date_Created` datetime NOT NULL,
  `Payment_Method` varchar(25) NOT NULL,
  `IsPaid` tinyint(1) NOT NULL,
  `Amount` int(6) NOT NULL,
  `IsDone` tinyint(1) NOT NULL,
  `IsApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archived_appointment`
--

INSERT INTO `archived_appointment` (`Appointment_Id`, `Patient_ID`, `Contact`, `Appoinment_Date`, `Appointment_StartTime`, `Appointment_EndTime`, `Duration_Minutes`, `Allotted_Hours`, `Date_Created`, `Payment_Method`, `IsPaid`, `Amount`, `IsDone`, `IsApproved`) VALUES
('7QS9CVFD8XYGL3B', 1001, '09973356903', '2022-01-27', '13:00:00', '15:00:00', 90, 2, '2021-12-26 15:53:20', 'GCash', 0, 14000, 0, 1),
('QIRZ6VZP4RZHFNX', 1001, '09973356903', '2022-01-28', '13:00:00', '16:00:00', 180, 3, '2021-12-26 15:51:06', 'GCash', 0, 1000, 0, 1),
('WY9BB5JGF4PDEAX', 1001, '09973356903', '2021-12-27', '11:00:00', '12:00:00', 30, 1, '2021-12-26 18:58:46', 'GCash', 0, 500, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dental_history`
--

CREATE TABLE `dental_history` (
  `Appoinment_Id` varchar(20) NOT NULL,
  `Last_Dental_Visit` date DEFAULT NULL,
  `Purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dental_history`
--

INSERT INTO `dental_history` (`Appoinment_Id`, `Last_Dental_Visit`, `Purpose`) VALUES
('1JKG5YB9C5VBH1L', '2021-12-08', 'fg'),
('5UHBLB5LUGLOAHF', '2021-12-01', 'qwasdewfsdg'),
('6F85KQU3TBNIXJR', '2021-12-01', 'sample 1'),
('BK6BHR3HF3ULTZY', '2021-12-17', 'waada'),
('Z095MZ191SZAEZD', '2021-12-02', 'asdsad'),
('ZGVYTCRL6EQD2VL', '2021-11-02', 'Checkup');

-- --------------------------------------------------------

--
-- Table structure for table `female_patient`
--

CREATE TABLE `female_patient` (
  `Appoinment_Id` varchar(20) NOT NULL,
  `Patient_ID` int(4) NOT NULL,
  `IsPregnant` tinyint(1) NOT NULL,
  `Months_Pregnant` int(2) NOT NULL,
  `IsTakingBirthPills` tinyint(1) NOT NULL,
  `Date_Answered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `female_patient`
--

INSERT INTO `female_patient` (`Appoinment_Id`, `Patient_ID`, `IsPregnant`, `Months_Pregnant`, `IsTakingBirthPills`, `Date_Answered`) VALUES
('6F85KQU3TBNIXJR', 1186, 0, 0, 0, '2021-12-09'),
('QSF7YUZ0RUJ32OF', 1186, 1, 32, 0, '2021-12-13'),
('QSHOKVUWAWA7Z4K', 1186, 0, 0, 0, '2021-12-09'),
('ZGVYTCRL6EQD2VL', 1221, 0, 0, 0, '2021-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `Appoinment_Id` varchar(20) NOT NULL,
  `Last_Medical_Checkup` date DEFAULT NULL,
  `Medical_Treatment` varchar(255) NOT NULL,
  `Medication` varchar(255) NOT NULL,
  `Hospitalized` varchar(255) NOT NULL,
  `Allergies` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`Appoinment_Id`, `Last_Medical_Checkup`, `Medical_Treatment`, `Medication`, `Hospitalized`, `Allergies`) VALUES
('1JKG5YB9C5VBH1L', '2021-12-29', 'fr', 'None', 'No', 'y'),
('4A2P04N4RJ0DAC6', '0000-00-00', 'None', 'None', 'No', ''),
('5UHBLB5LUGLOAHF', '2021-12-10', 'saad', 'None', 'No', 'asd'),
('6F85KQU3TBNIXJR', '2021-12-02', 'None', 'None', 'No', 'none'),
('7VZVTN646X9ITVY', '0000-00-00', 'None', 'None', 'No', ''),
('BK6BHR3HF3ULTZY', '0000-00-00', 'None', 'None', 'No', ''),
('JXVTQA17H820P7N', '0000-00-00', 'fsd', 'None', 'No', ''),
('QSHOKVUWAWA7Z4K', '0000-00-00', 'None', 'None', 'No', ''),
('Z095MZ191SZAEZD', '2021-12-08', 'aasdasdsad', 'None', 'No', 'asd asdsadasasdasd'),
('ZGVYTCRL6EQD2VL', '0000-00-00', 'None', 'None', 'No', 'N/a');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Message_ID` int(6) NOT NULL,
  `Body` text NOT NULL,
  `From_Name` varchar(100) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Date_Send` datetime NOT NULL,
  `IsRead` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Message_ID`, `Body`, `From_Name`, `Phone`, `Email`, `Date_Send`, `IsRead`) VALUES
(1, 'With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni voluptatum reiciendis quisquam neque, numquam, ullam animi labore, error rerum similique modi iusto repellendus eius id. Unde ea praesentium deserunt odio.', 'qwe', 'qwe312', 'qwe', '2021-11-08 15:31:20', 0),
(3, 'With supporting text below as a natural lead-in to additional Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam ab ipsum fuga illo officia nisi ipsam sequi nam doloremque iste deleniti natus at assumenda id excepturi reiciendis, odio mollitia quidem! content.', NULL, NULL, 'sadadads', '2021-11-08 15:31:08', 0),
(4, 'qwwqeqeqeqwewqeqweqweqweqwewqeq asdasd ', 'Jude', '091686523', 'catudioadad@gmail.com', '2021-11-09 00:33:12', 1),
(5, 'qwwqeqeqeqwewqeqweqweqweqwewqeq asdasd ', 'Jude', '091686523', 'catudioadad@gmail.com', '2021-11-09 00:33:12', 0),
(11, 'qwewqe', '', '', '', '2021-11-11 16:42:00', 1),
(12, 'Hi!', '', '', '', '2021-11-11 16:42:50', 0),
(13, 'qweqwe', 'qwewqe', 'qweqw', 'qweqw', '2021-11-11 16:45:37', 0),
(14, 'qweqweqweq', 'Christian Jude Jamolangue Catudio', 'catudiochristia', '+639973356903', '2021-11-11 16:51:54', 1),
(15, 'sd', 'Christian Jude Jamolangue Catudio', 'catudiochristia', '+639973356903', '2021-11-11 18:46:59', 1),
(16, 'qwwqeqwe hi', 'Christian Jude Jamolangue Catudio', 'catudiochristia', '+639973356903', '2021-11-11 18:59:55', 1),
(17, 'aasda', '', '', '', '2021-11-18 19:31:22', 1),
(18, 'asdadad', 'Christian Jude Jamolangue Catudio', 'catudiochristia', '+639973356903', '2021-11-22 09:03:17', 1),
(19, 'teert', '', '', '', '2021-11-25 22:26:55', 1),
(20, 'asdada', '', '', '', '2021-11-30 20:32:55', 1),
(21, 'adsff asdf sfsf sdfas sf asasdf as', 'CATUDIO, CHRISTIAN JUDE J', 'catudio.christi', '+639973356903', '2021-12-14 21:04:13', 0),
(22, 'asdsa asd asdasd adasd asda  ', 'CATUDIO, CHRISTIAN JUDE J', 'catudio.christi', '+639973356903', '2021-12-14 21:09:02', 0),
(23, 'qeqwe qweq weqweqw qwe', 'Christian Jude Jamolangue Catudio', 'catudiochristia', '+639973356903', '2021-12-14 21:11:06', 1),
(24, 'weqeqwe qwe q', 'CATUDIO, CHRISTIAN JUDE J', 'catudio.christi', '', '2021-12-14 21:50:08', 1),
(25, 'asdada', 'Wilma Jamolangue Catudio', 'catudiochristia', '+639168258446', '2021-12-23 19:54:59', 1),
(26, 'werewrew', 'Catudio, Christian Jude, J.', '+639973356903', 'christianjude.catudio.j@bulsu.edu.ph', '2021-12-23 19:56:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `Note_Id` int(10) NOT NULL,
  `Patient_ID` int(4) NOT NULL,
  `Note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`Note_Id`, `Patient_ID`, `Note`) VALUES
(3, 1186, 'sample text 2q'),
(14, 1001, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(17, 1185, 'safsfasaf'),
(18, 1185, 'd'),
(19, 1001, 'sadfsadas bwerwerwr wrwe rwasdqer'),
(20, 1186, 'samplea 23dsaqq'),
(22, 1186, 'sample 121qq'),
(23, 1213, 'erfewer');

-- --------------------------------------------------------

--
-- Table structure for table `no_clinic_date`
--

CREATE TABLE `no_clinic_date` (
  `Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `no_clinic_date`
--

INSERT INTO `no_clinic_date` (`Id`, `Date`, `Reason`) VALUES
(1, '2022-01-01', 'New Year\'s Day'),
(2, '2022-04-14', 'Maundy Thursday'),
(3, '2022-04-15', 'Good Friday'),
(5, '2022-04-16', 'Black Saturday'),
(6, '2022-05-01', 'Labor Day'),
(7, '2022-09-15', 'Birthday ni Ate Hannah'),
(8, '2022-11-01', 'All Saints\' Day'),
(9, '2022-11-02', 'All Souls’ Day'),
(10, '2022-12-24', 'Christmas eve'),
(11, '2022-12-25', 'Christmas Day'),
(12, '2022-12-31', 'New Year’s eve');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Patient_ID` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Nickname` varchar(20) NOT NULL,
  `Birthday` date NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Civil Status` varchar(30) NOT NULL,
  `Address` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` varchar(25) NOT NULL,
  `Date_Created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Patient_ID`, `Name`, `Nickname`, `Birthday`, `Age`, `Gender`, `Civil Status`, `Address`, `Email`, `Contact`, `Date_Created`) VALUES
(1001, 'Christian Jude Catudio', 'Jude', '1999-10-15', 22, 'Male', 'Single', '624 Kaypalong St. San Vicente Sta Maria Bulacan', 'catudiochristianjude@gmail.com', '09973356903', '2021-10-30'),
(1185, 'Asdda', 'Asdasd', '2021-11-10', 2, 'Male', 'Single', 'Asdsad', 'catudiochristianjude@gmail.com', '0423', '2021-11-22'),
(1186, 'Andrea Nicole ', 'Nicole', '2021-11-11', 23, 'Female', 'Single', 'kaypalong', 'catudiochristianjude@gmail.com', '022312313133', '2021-11-22'),
(1213, 'wererwe', 'werwr', '2021-12-02', 7, 'Female', 'In a relationship', 'asdfsadf', 'catudiochristianjude@gmail.com', '09973356903', '2021-12-14'),
(1220, 'Christian Jude Catudio ', 'Jude', '2000-10-15', 22, 'Male', 'Single', '624 Kaypalong St. San Vicente Sta Maria Bulacan', 'catudiochristianjude@gmail.com', '09973356903', '2021-12-14'),
(1221, 'Lexda Mae Atienza', 'Lexda', '1999-09-29', 22, 'Female', 'Single', 'Hagonoy, Bulacan', 'Lexyatienza@gmail.com', '09155220291', '2021-12-15'),
(1222, 'Christian Jude Catudio ', 'Christian', '2021-12-25', 22, 'Male', 'Single', 'None', 'catudiochristianjude@gmail.com', '09973356903', '2021-12-27'),
(1223, 'Christian Jude Catudio ', '1', '2021-12-01', 1, 'Male', 'Single', '1', 'catudiochristianjude@gmail.com', '01', '2021-12-27'),
(1224, 'Christian Jude Catudio ', 'Qwe', '2021-12-08', 1, 'Male', 'Single', '2', 'catudiochristianjude@gmail.com', '0321', '2021-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `proof_of_payments`
--

CREATE TABLE `proof_of_payments` (
  `App_Id` varchar(20) NOT NULL,
  `ImgFileName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proof_of_payments`
--

INSERT INTO `proof_of_payments` (`App_Id`, `ImgFileName`) VALUES
('JL0RST5U2CAWN93', '258445776_857549964942454_945782423769618730_n'),
('K928N4D2A6KE8JP', '241825176_283817726905979_3242186317388062852_n'),
('RIQNBX2U48OIJ17', '258445776_857549964942454_945782423769618730_n'),
('W2VX6Q4EY7343IL', '258445776_857549964942454_945782423769618730_n');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `Service_ID` varchar(4) NOT NULL,
  `ServiceCategory_ID` varchar(4) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Description` text DEFAULT NULL,
  `Duration_Minutes` int(3) NOT NULL,
  `Starting_Price` varchar(13) NOT NULL,
  `ImgFilename` varchar(250) DEFAULT NULL,
  `Availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`Service_ID`, `ServiceCategory_ID`, `Name`, `Description`, `Duration_Minutes`, `Starting_Price`, `ImgFilename`, `Availability`) VALUES
('S101', 'C101', 'Extraction', 'Some teeth are extracted because they are severely decayed, others may have advanced periodontal disease, or have broken in a way that cannot be repaired. Other teeth may need removal because they are poorly positioned in the mouth such as impacted teeth or in preparation for orthodontic treatment.', 120, '600', 'extraction', 1),
('S102', 'C101', 'Additional Anesthesia', 'For Additional Anesthesia', 0, '200', 'additional_anesthesia', 1),
('S103', 'C101', 'Surgical Extraction', 'By taking an x-ray and examining your tooth, your dentist can usually determine whether or not you\'ll need a simple or surgical extraction. There are times when a simple extraction requires a surgical procedure, though. For example, if a tooth breaks off during the procedure, your dental professional may need to do a more extensive surgical procedure.\r\n\r\nOther reasons for surgical extractions include:\r\n•	Wisdom teeth removal, if they\'re impacted, and the bone and tissue must be cut\r\n•	When removing broken-down teeth\r\n•	Taking out root tips or teeth with long-curved roots\r\n•	If a tooth or molar broke at the gum line\r\n', 180, '1,000+', 'surgical_extraction', 1),
('S104', 'C101', 'Suture', 'When bone is exposed and then covered with gum tissue (as in a gum flap procedure), dental sutures hold the tissue close to the bone. This prevents bacteria or other foreign particles from touching your bone. This prevents infection that could damage the area.', 0, '500', 'suture', 1),
('S105', 'C101', 'Odontectomy Class I', NULL, 120, '6,000+', 'odontectomy', 1),
('S106', 'C101', 'Odontectomy Class II/III', NULL, 180, '8,000+', 'odontectomy', 1),
('S107', 'C101', 'Frenectomy', 'A frenectomy is an oral procedure during which a frenum in the mouth is altered or removed with a laser. A frenum is an attachment between two soft tissues in the mouth, including the cheeks, lips, and gums.', 60, '3500', 'frenectomy', 1),
('S108', 'C101', 'Gingivectomy', 'gingivectomy removes and reshapes loose, diseased gum tissue to get rid of pockets between the teeth and gums. A gum specialist (periodontist) or oral surgeon often will do the procedure. The doctor will start by numbing your gums with a local anesthetic. ', 60, '4,000', 'gingivectomy', 1),
('S109', 'C102', 'Oral Prophylaxis (Mild)', 'Oral prophylaxis is a cleaning procedure performed by a dentist or oral hygienist in order to thoroughly clean the teeth. In this procedure bacterial plaque and tartar are removed from te surface of the teeth with the help of scaling and polishing.', 60, '700', 'oral_prophylaxis', 1),
('S110', 'C102', 'Oral Prophylaxis (Moderate)', 'Oral prophylaxis is a cleaning procedure performed by a dentist or oral hygienist in order to thoroughly clean the teeth. In this procedure bacterial plaque and tartar are removed from te surface of the teeth with the help of scaling and polishing.', 60, '800+', 'oral_prophylaxis', 1),
('S111', 'C102', 'Oral Prophylaxis (Severe)', 'Oral prophylaxis is a cleaning procedure performed by a dentist or oral hygienist in order to thoroughly clean the teeth. In this procedure bacterial plaque and tartar are removed from te surface of the teeth with the help of scaling and polishing.', 90, '1,000', 'oral_prophylaxis', 1),
('S112', 'C102', 'Non-Surgical Root Planning (Per quadrant)', 'This treatment include scaling and root planing (a careful cleaning of the root surfaces to remove plaque and calculus [tartar] from deep gum pockets and to smooth the tooth root to remove bacterial toxins), followed by oral therapy, as needed on a case-by-case basis.', 120, '2,000', 'non_surgical_root_planning', 1),
('S113', 'C102', 'Debacterol Application', 'It\'s an effective treatment option that is widely used by dentists who perform oral procedures, it is for the control of necrotic tissues.', 0, '300', 'debacterol', 1),
('S114', 'C103', 'Light Cure Composite', 'A composite (tooth colored) filling is used to repair a tooth that is affected by decay, cracks, fractures, etc. The decayed or affected portion of the tooth will be removed and then filled with a composite filling.\nAs with most dental restorations, composite fillings are not permanent and may someday have to be replaced. They are very durable, and will last many years, giving you a long lasting, beautiful smile.\nA composite (tooth colored) filling is used to repair a tooth that is affected by decay, cracks, fractures, etc. The decayed or affected portion of the tooth will be removed and then filled with a composite filling.\nAs with most dental restorations, composite fillings are not permanent and may someday have to be replaced. They are very durable, and will last many years, giving you a long lasting, beautiful smile.\n', 60, '600', 'light_cure_composite', 1),
('S115', 'C103', 'Additional Surface', NULL, 0, '200', '', 1),
('S116', 'C103', 'Glass lonomer', 'Glass ionomer is essentially a flexible paste, that is used to form a tight seal between the internal tooth (exposed, due to a cavity) and the surrounding environment. It acts as a sealant, allowing the tooth to remain protected.', 90, '600', 'glass_ionomer', 1),
('S117', 'C103', 'Cavity Liner/Base', 'A dental liner is a material that is usually placed in a thin layer over exposed dentine within a cavity preparation. ... A dental base is a material that is placed on the floor of the cavity preparation in a relatively thick layer.', 90, '200', 'cavity_liner_base', 1),
('S118', 'C103', 'Gl Base', NULL, 90, '200', '', 1),
('S119', 'C103', 'Temporary Filling', 'A temporary or sedative filling is a type of dental procedure performed on a tooth with an uncertain prognosis or as an intermediate measure before further treatment. Imagine a patient who comes in for an emergency appointment with a large, painful cavity.', 90, '500', 'temporary_filling', 1),
('S120', 'C103', 'Desensitization', 'It is to seal the microscopic pores of unprotected root surfaces if a patient is experiencing more than a mild sensitivity to temperature extremes or sweets. Teeth whitening can also leave patients with sensitivity.', 0, '300', 'desensitization', 1),
('S121', 'C104', 'Pit & Fissure Sealant', 'This are safe and painless way of protecting your teeth from tooth decay. A sealant is a protective plastic coating, which is applied to the biting surfaces of the back teeth. The sealant forms a hard shield that keeps food and bacteria from getting into the tiny grooves in the teeth and causing decay.', 60, '600', 'pit_and_fissure_sealant', 1),
('S122', 'C104', 'Fluoride Gel Application + OP', 'It helps prevent tooth decay by making the tooth more resistant to acid attacks from plaque bacteria and sugars in the mouth. It also reverses early decay.', 30, '800', 'fluoride_gel_application', 1),
('S123', 'C104', 'Fluoride Varnish + OP', 'It will stay on the teeth for a few hours which multiplies its effectiveness. It will “wash off” after 4-6 hours by design as it is exposed to food, liquids, as well as the forces of the teeth and your jaw.  This type of fluoride varnish can be applied to the entire mouth in about 2 minutes.  It can be an economical way to treat sensitivity in adults and provides an additional tool that protects the teeth from cavities and sensitivity.', 30, '1,000', 'flouride_varnish', 1),
('S124', 'C104', 'Stainless Steel Crowns', 'SSC are used to repair a decayed molar, it also prevents the teeth from further decaying. They are made in the exact size of a child\'s molar. If your teeth are weak or broken, these crowns are an excellent fix. They are also used to provide support in case you are getting a dental bridge.', 90, '3,000', 'stainless_steel_crown', 1),
('S125', 'C104', 'Strip-Off Crowns', 'Strip crowns consist of a clear plastic-like shell that is filled with tooth-colored composite material and then fitted over the damaged tooth. This will rest over the tooth for a while and once the composite is hardened, the plastic strip is removed to leave behind a tooth-like shell that is the crown.', 90, '3,000', 'stripp_off_crowns', 1),
('S126', 'C104', 'Pulp Treatment', 'It will maintain the tooth so it is not lost. The two most common forms of pulp treatment are pulpotomy and pulpectomy. A pulpotomy removes the diseased pulp within the crown of the tooth. The pulp root remains healthy and unaffected.', 90, '2,000', 'pulp_treatment', 1),
('S127', 'C104', 'Space Maintainer Appliance', NULL, 90, '4,000 - 7,000', 'space_maintainer_appliance', 1),
('S128', 'C104', 'Orthodontic Appliance', NULL, 0, '10,000-15,000', 'orthodontic_appliance', 1),
('S129', 'C105', 'Fixed Orthodontics Class I', 'Fixed braces are the most commonly used type of appliance in orthodontics. They consist of small metal brackets, which are stuck to the teeth using dental glue. Wires are run through the brackets and kept in position with coloured elastic rings (modules). Fixed braces on the upper and lower teeth.', 120, '40,000+', 'fixed_orthodontics', 1),
('S130', 'C105', 'Fixed Orthodontics Class II', 'Fixed braces are the most commonly used type of appliance in orthodontics. They consist of small metal brackets, which are stuck to the teeth using dental glue. Wires are run through the brackets and kept in position with coloured elastic rings (modules). Fixed braces on the upper and lower teeth.', 120, '45,000+', 'fixed_orthodontics', 1),
('S131', 'C105', 'Fixed Orthodontics Class III', 'Fixed braces are the most commonly used type of appliance in orthodontics. They consist of small metal brackets, which are stuck to the teeth using dental glue. Wires are run through the brackets and kept in position with coloured elastic rings (modules). Fixed braces on the upper and lower teeth.', 120, '50,000+', 'fixed_orthodontics', 1),
('S132', 'C105', 'Self-Ligating Orthodontics', 'Self-ligating braces have no elastic ties. Instead, brackets or clips hold the wires in place. This keeps self-ligating braces always active and moving teeth at a faster pace. It is still require periodic adjustments. During these adjustments, your orthodontist will evaluate your progress and may also adjust or replace your archwire. Adjustments can modify the force placed on your teeth, helping them to gradually move into their new positions.', 120, '65,000+', 'self_ligating_brackets', 1),
('S133', 'C105', 'Retainers (per arch)', 'Retainers are most commonly needed after braces come off so that the bone that holds the teeth can rebuild after the teeth have moved. Retainers also help to maintain the new positions of teeth after active orthodontic treatment has been completed.', 30, '4,000', 'retainer', 1),
('S134', 'C105', 'Retainers with pontic/active', 'It connects to the retainer crowns so that the bridge forms one large unit. A bridge consists of the number of pontics plus the retainer crowns on both sides, so a traditional bridge replacing a single missing tooth is a three-unit bridge. Traditional bridges should only replace one to two missing teeth.', 30, '4,500+', 'retainer', 1),
('S135', 'C105', 'Night Guard', 'It is a mouthguards that patients with bruxism (teeth grinding and clenching) wear during sleep to protect their teeth from damage or wear. To protect your teeth and restorations by distributing the bite forces, reducing stress, and preventing abnormal wear. When it comes to grinding, the night guard provides a protective barrier between the upper and lower teeth, cushioning them, and minimizing any damage.', 30, '4,000', 'night_guard', 1),
('S136', 'C106', 'Root Canal Therapy (per canal)', 'It removes the infected pulp and nerve in the root of the tooth, cleans and shapes the inside of the root canal, then fills and seals the space. Afterward, the dentist will place a crown on the tooth to protect and restore it to its original function.', 120, '5,000', 'root_canal_treatment', 1),
('S137', 'C106', 'Emergency Treatment', 'In general, any dental problem that needs immediate treatment to stop bleeding, alleviate severe pain, or save a tooth is considered an emergency. This consideration also applies to severe infections that can be life-threatening. If you have any of these symptoms, you may be experiencing a dental emergency.', 90, '1,000', NULL, 1),
('S138', 'C106', 'Metal Post & Core Build Up', 'A post and core is dental restoration that is used when there is inadequate tooth structure remaining to support a traditional restoration. A small rod, usually metal, is inserted into the root space (root canal) of the tooth and protrudes from the root a couple of millimeters.', 120, '2,000', 'metal_post _core buildup', 1),
('S139', 'C106', 'Fiber Post & Core Build Up', NULL, 120, '2,500', NULL, 1),
('S140', 'C107', 'Temporary Crown (fabricated)', 'A temporary crown may cover an implant or a tooth with a root canal, or a tooth that’s been repaired. It can be used for any single tooth, or it can be a bridge over more than one implant or tooth.', 90, '1,200', 'temporary_crown_fabricated', 1),
('S141', 'C107', 'Temporary Crown (chairside)', NULL, 90, '1,000', NULL, 1),
('S142', 'C107', 'Plastic Jacket Crown (Natura Facing)', 'It used after you have undergone root canal treatment, as a covering over a tooth that is chipped, broken or otherwise damaged to create a permanently restored, functional and esthetic natural look to the teeth. Improves tooth appearance: Tooth jackets help in enhancing your smile.', 90, '2,500', 'plastic_jacket_crown', 1),
('S143', 'C107', 'Plastic Jacket Crown (Luxopal)', NULL, 90, '3,000', 'plastic_jacket_crown', 1),
('S144', 'C107', 'Porcelain Fused to Metal', 'Are fabricated with a metal-alloy interior and a porcelain exterior. This allows them to have the strength of metal crowns combined with the aesthetics of porcelain crowns.', 90, '4,000', NULL, 1),
('S145', 'C107', 'Porcelain + Tillite/ Ceramco', 'Modern ceramic crowns are much stronger than dental porcelains of the past, but no type of all-ceramic crown can match the durability of all-metal or porcelain-fused-to-metal crowns.', 90, '6,000', 'porcelain_fused_to_metal', 1),
('S146', 'C107', 'Ceramage (Anterior)', 'Ceramage is a light-activated zirconium silicate micro ceramic that creates indirect restorations that exhibit virtually the same light transmission as natural teeth and has a remarkable translucency.', 90, '7,500', 'ceramage', 1),
('S147', 'C107', 'Ceramage (Posterior)', 'Ceramage is a light-activated zirconium silicate micro ceramic that creates indirect restorations that exhibit virtually the same light transmission as natural teeth and has a remarkable translucency.', 90, '8,000', 'ceramage', 1),
('S148', 'C107', 'E-Max', 'E-MAX crowns are made from lithium desilicated ceramic, a material that has been harvested for its translucent color and durability. As a result, you get a crown that is tough and durable, but looks exactly like your other teeth. The only downside of E-MAX crowns is the cost.', 60, '22,000', 'e_max', 1),
('S149', 'C108', 'Bleaching - 1 session', 'Bleaching teeth refers to whitening teeth beyond their natural color. Active ingredients like hydrogen peroxide and carbamide peroxide are bleaching agents most often used in teeth bleaching processes.', 60, '5,000', 'bleaching', 1),
('S150', 'C108', 'Bleaching - 2 session', 'Bleaching teeth refers to whitening teeth beyond their natural color. Active ingredients like hydrogen peroxide and carbamide peroxide are bleaching agents most often used in teeth bleaching processes.', 60, '7,000', 'bleaching', 1),
('S151', 'C108', 'Bleaching - 3 session', 'Bleaching teeth refers to whitening teeth beyond their natural color. Active ingredients like hydrogen peroxide and carbamide peroxide are bleaching agents most often used in teeth bleaching processes.', 60, '10,000', 'bleaching', 1),
('S152', 'C108', 'Laminates / Veneers (Direct Composite)', 'Direct composite veneers are veneers made of a composite resin material applied directly to your teeth. It doesn\'t take very long for a dentist to prepare your teeth for application of the veneers, and the application process is considered minimally invasive.', 90, '2,500', 'laminate_or _veneers', 1),
('S153', 'C108', 'Laminates / Veneers (Ceramage)', 'Laminate veneers consist of wafer-thin shells made out of dental ceramic that is carefully bonded onto the outer sides of the teeth, fixing any of the above listed dental issues and smile hang-ups.', 90, '7,000', 'laminate_or _veneers', 1),
('S154', 'C108', 'Laminates / Veneers ( E-Max)', 'eMax Veneers are another kind of porcelain veneer. They are sometimes called eMax laminate veneers and are crafted from lithium disilicate glass-ceramic. This special material offers several advantages. For starters, it\'s lighter and thinner than traditional dental porcelains.', 90, '14,000', 'laminate_or _veneers', 1),
('S155', 'C108', 'Consultation ', 'The dental consultation is where your dentist will discuss your oral and overall health. They will review your dental x-rays and discuss their findings from the dental exam. If needed, your dentist will recommend treatments and answer any questions you may have.', 15, '300', 'consultation', 1),
('S156', 'C109', 'Periapical Xray', 'Periapical X-rays show the whole tooth — from the crown, to beyond the root where the tooth attaches into the jaw. Each periapical X-ray shows all teeth in one portion of either the upper or lower jaw. Periapical X-rays detect any unusual changes in the root and surrounding bone structures.', 20, '400', 'periapical_xray', 1),
('S157', 'C109', 'Diagnostic Cast', 'A diagnostic dental cast is a cast model of a person\'s teeth that a dental professional uses as a guide in the application of corrective or restorative dentistry. Such diagnostic casts are often referred to as study models.', 20, '500', 'diagnostic_cast', 1),
('S158', 'C109', 'Diagnostic Photos', 'photographs of the face and teeth to assess how treatment is progressing, and the impact the treatment is having on the patient\'s face shape.', 20, '500', 'diagnostic_photos', 1),
('S159', 'C110', 'Acrylic Leeformatron - Partial ', 'A Dental Shade Guide is a set of simulated teeth used to select prosthetic teeth by color. The simulated teeth are made of plastic or porcelain.', 45, '4,000', 'acrylic_leeformatron', 1),
('S160', 'C110', 'Acrylic Leeformatron - Complete', 'A Dental Shade Guide is a set of simulated teeth used to select prosthetic teeth by color. The simulated teeth are made of plastic or porcelain.', 45, '4,500', 'acrylic_leeformatron', 1),
('S161', 'C110', 'Acrylic New Ace - Partial', NULL, 45, '4,500', 'acrylic_new_ace', 1),
('S162', 'C110', 'Acrylic New Ace - Complete', NULL, 45, '5,000', 'acrylic_new_ace', 1),
('S163', 'C110', 'Acrylic Cosmo - Partial', NULL, 45, '5,000', 'acrylic_cosmo', 1),
('S164', 'C110', 'Acrylic Cosmo - Complete', NULL, 45, '5,500', 'acrylic_cosmo', 1),
('S165', 'C110', 'Acrylic Luxopal - Partial', NULL, 45, '6,000', 'acrylic_luxopal', 1),
('S166', 'C110', 'Acrylic  Luxopal - Complete', NULL, 45, '7,000', 'acrylic_luxopal', 1),
('S167', 'C110', 'Acrylic New Ace PX - Partial', NULL, 45, '8,000', NULL, 1),
('S168', 'C110', 'Acrylic New Ace PX - Complete', NULL, 45, '9,000', NULL, 1),
('S169', 'C110', 'Acrylic Bioform - Partial', NULL, 45, '9,000', '', 1),
('S170', 'C110', 'Acrylic Bioform - Complete', NULL, 45, '10,000', NULL, 1),
('S171', 'C110', 'Stay Plate Leeformatron - Partial ', NULL, 45, '4,000', 'stay_plate_leeformatron', 1),
('S172', 'C110', 'Stay Plate  Leeformatron - Complete', NULL, 45, '4,500', 'stay_plate_leeformatron', 1),
('S173', 'C110', 'Stay Plate New Ace - Partial', NULL, 45, '4,500', 'stay_plate_leeformatron', 1),
('S174', 'C110', 'Stay Plate New Ace - Complete', NULL, 45, '5,000', 'stay_plate_leeformatron', 1),
('S175', 'C110', 'Stay Plate Cosmo - Partial', NULL, 45, '5,000', 'stay_plate_leeformatron', 1),
('S176', 'C110', 'Stay Plate Cosmo - Complete', NULL, 45, '5,500', 'stay_plate_leeformatron', 1),
('S177', 'C110', 'Stay Plate Luxopal - Partial', NULL, 45, '6,000', NULL, 1),
('S178', 'C110', 'Stay Plate Luxopal - Complete', NULL, 45, '7,000', NULL, 1),
('S179', 'C110', 'Stay Plate New Ace PX - Partial', NULL, 45, '8,000', NULL, 1),
('S180', 'C110', 'Stay Plate New Ace PX -Complete', NULL, 45, '9,000', NULL, 1),
('S181', 'C110', 'Stay Plate Bioform - Partial', NULL, 45, '9,000', NULL, 1),
('S182', 'C110', 'Stay Plate Bioform -Complete', NULL, 45, '10,000', NULL, 1),
('S183', 'C110', 'Plastic Leeformatron - Partial ', NULL, 45, '4,000', NULL, 1),
('S184', 'C110', 'Plastic Leeformatron - Complete', NULL, 45, '4,500', NULL, 1),
('S185', 'C110', 'Plastic New Ace - Partial', NULL, 45, '4,500', NULL, 1),
('S186', 'C110', 'Plastic New Ace -Complete', NULL, 45, '5,000', NULL, 1),
('S187', 'C110', 'Plastic Cosmo - Partial', NULL, 45, '5,000', NULL, 1),
('S188', 'C110', 'Plastic Cosmo -Complete', NULL, 45, '5,500', NULL, 1),
('S189', 'C110', 'Plastic Luxopal - Partial', NULL, 45, '6,000', NULL, 1),
('S190', 'C110', 'Plastic Luxopal -Complete', NULL, 45, '7,000', NULL, 1),
('S191', 'C110', 'Plastic New Ace PX - Partial', NULL, 45, '8,000', NULL, 1),
('S192', 'C110', 'Plastic New Ace PX - Complete', NULL, 45, '9,000', NULL, 1),
('S193', 'C110', 'Plastic Bioform - Partial', NULL, 45, '9,000', NULL, 1),
('S194', 'C110', 'Plastic Bioform - Complete', NULL, 45, '10,000', NULL, 1),
('S195', 'C111', 'Upgrades (Lucitone Base)', NULL, 45, '1,000+', NULL, 1),
('S196', 'C111', 'Upgrades (Gold Mesh)', NULL, 45, '1,000+', NULL, 1),
('S197', 'C115', 'Porcelain  Ordinary - Partial', NULL, 45, '7,000', NULL, 1),
('S198', 'C115', 'Porcelain  Ordinary - Complete', NULL, 45, '8,000', NULL, 1),
('S199', 'C115', 'Porcelain Ivoclar - Partial', NULL, 45, '9,000', NULL, 1),
('S200', 'C115', 'Porcelain  Ivoclar - Complete', NULL, 45, '10,000', NULL, 1),
('S201', 'C112', 'Flexible Cosmo - Partial', NULL, 45, '13,000', NULL, 1),
('S202', 'C112', 'Flexible Cosmo - Complete', NULL, 45, '15,000', NULL, 1),
('S203', 'C112', 'Flexible Luxopal - Partial', NULL, 45, '14,000', NULL, 1),
('S204', 'C112', 'Flexible Luxopal - Complete', NULL, 45, '16,000', NULL, 1),
('S205', 'C112', 'Flexible New Ace PX - Partial', NULL, 45, '15,000', NULL, 1),
('S206', 'C112', 'Flexible New Ace PX - Complete', NULL, 45, '17,000', NULL, 1),
('S207', 'C112', 'Flexible Bioform - Partial', NULL, 45, '17,000', NULL, 1),
('S208', 'C112', 'Flexible Bioform -Complete', NULL, 45, '20,000', NULL, 1),
('S209', 'C112', 'Flexible *Ivocap - Partial', NULL, 45, '30,000+', NULL, 1),
('S210', 'C112', 'Flexible Unilateral Flexible - Partial', NULL, 45, '10,000', NULL, 1),
('S211', 'C112', 'Thermoplastic Cosmo - Partial', NULL, 45, '13,000', NULL, 1),
('S212', 'C112', 'Thermoplastic Cosmo -Complete', NULL, 45, '15,000', NULL, 1),
('S213', 'C112', 'Thermoplastic Luxopal - Partial', NULL, 45, '14,000', NULL, 1),
('S214', 'C112', 'Thermoplastic Luxopal - Complete', NULL, 45, '16,000', NULL, 1),
('S215', 'C112', 'Thermoplastic New Ace PX - Partial', NULL, 45, '15,000', NULL, 1),
('S216', 'C112', 'Thermoplastic New Ace PX -Complete', NULL, 45, '17,000', NULL, 1),
('S217', 'C112', 'Thermoplastic Bioform - Partial', NULL, 45, '17,000', 'thermoplastic_bioform', 1),
('S218', 'C112', 'Thermoplastic Bioform - Complete', NULL, 45, '20,000', 'thermoplastic_bioform', 1),
('S219', 'C112', 'Thermoplastic Ivocap - Partial', NULL, 45, '30,000+', 'thermoplastic_unilateral_flexible', 1),
('S220', 'C112', 'Thermoplastic Unilateral Flexible - Partial', NULL, 45, '10,000', 'thermoplastic_unilateral_flexible', 1),
('S221', 'C113', 'Unilateral', NULL, 45, '10,000', 'unilateral', 1),
('S222', 'C113', 'Bilateral', NULL, 45, '12,000', 'bilateral', 1),
('S223', 'C114', 'Denture Reline', 'A denture reline is a simple procedure to reshape the underside of a denture so that it fits more comfortably on the user\'s gums. Relining is periodically necessary as dentures lose their grip in the mouth. The process is usually affordable and often takes very little time.', 30, '1,500', 'denture_reline', 1),
('S224', 'C114', 'Denture Repair', 'Usually, if a denture is cracked into two or three pieces, it can be repaired. However, if a denture has broken into many pieces, it may not be possible. ... The denture will be cleaned and then a special resin will be poured into the denture to join the broken parts back together. This process usually takes around 1 hour.', 30, '500 - 1,500', 'denture_repair', 1),
('S225', 'C114', 'Additional Pontic', 'A pontic is defined as an artificial tooth on a fixed dental prosthesis that replaces a missing natural tooth, restoring its function and esthetics. It usually fills the space previously occupied by the clinical crown of the missing tooth. ... Pontics are represented on treatment setups as translucent teeth.', 30, '1,500', 'additional_pontic', 1),
('S226', 'C101', 'wwrwerewrw', 'fdgsdfgergt', 90, '1500', '', 0),
('S227', 'C101', 'qwe', 'qwe', 60, '123', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `ServiceCategory_Id` varchar(4) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` text NOT NULL,
  `ImgFileName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`ServiceCategory_Id`, `Name`, `Description`, `ImgFileName`) VALUES
('C101', 'SURGICAL', 'When tooth extraction becomes complicated, surgery may need to be done. This is also the case for wisdom tooth removal. Dental implant is also a recent trend in surgery.', 'surgical'),
('C102', 'PERIODONTAL', 'To thoroughly clean the pockets around teeth and prevent damage to surrounding bone. You have the best chance for successful treatment when you also adopt a daily routine of good oral care, manage health conditions that may impact dental health and stop tobacco use.', 'periodontal'),
('C103', 'RESTORATIVE', 'Replacing teeth makes it easier to maintain good oral care habits to help prevent plaque build-up and the problems plaque can lead to missing teeth can affect your health, appearance and self-esteem and to bring back your natural smile and prevent future oral health issues.', 'restorative'),
('C104', 'PREVENTIVE', 'To?keep gum disease, cavities, tooth sensitivity, and other common dental conditions. By preventing gum disease and cavities or reversing the early signs of these conditions, patients can enjoy a lifetime of bright healthy smiles.', 'preventive'),
('C105', 'ORTHODONTIC', 'Way of straightening or moving teeth, to improve the appearance of the teeth and how they work. It can also help to look after the long-term health of your teeth, gums and jaw joints, by spreading the biting pressure over all your teeth. It can help you to bite more evenly and reduce the strain.', 'orthodontics'),
('C106', 'ENDODONTICS', 'It focus on caring for a complex tooth problems that primarily affect the tooth pulp (the inside of teeth). They use advanced techniques to treat the dental pulp and root tissues. It also focus on relieving your toothache while saving your natural tooth, whenever possible.', 'endodontics'),
('C107', 'CROWNS', 'To restore, to cover and support a tooth with a large filling when there isn?t a lot of tooth left. To protect also a weak tooth for instance, from decay) from breaking or to hold together parts of a cracked tooth.', 'crown'),
('C108', 'ESTHETICS', 'A restoration without damaging dental tissue and gums?that helps to restore the functions of teeth by ensuring their strength, resistance and compatibility with the surrounding mucosa.', 'esthetics'),
('C109', 'DIAGNOSTICS', '', 'diagnostic'),
('C110', 'DENTURES', 'While dentures take some getting used to, and will never feel exactly the same as one\'s natural teeth, today\'s dentures are natural looking and more comfortable than ever.', 'dentures'),
('C111', 'UPGRADES', '', ''),
('C112', 'THERMOPLASTIC', '', ''),
('C113', 'METAL FRAMEWORK', '', ''),
('C114', 'DENTURE REPAIRs', 'dsgdsfdsfa sdf', ''),
('C115', 'PORCELAIN', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `social_history`
--

CREATE TABLE `social_history` (
  `Appoinment_Id` varchar(20) NOT NULL,
  `IsSmoking` tinyint(1) NOT NULL,
  `IsDrinkingAlcohol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`ActLog_Id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`(50));

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_Id`);

--
-- Indexes for table `appointment_patient_condition`
--
ALTER TABLE `appointment_patient_condition`
  ADD PRIMARY KEY (`Appointmet_ID`,`Patient_ID`);

--
-- Indexes for table `appointment_service`
--
ALTER TABLE `appointment_service`
  ADD PRIMARY KEY (`AS_ID`);

--
-- Indexes for table `archived_appointment`
--
ALTER TABLE `archived_appointment`
  ADD PRIMARY KEY (`Appointment_Id`);

--
-- Indexes for table `dental_history`
--
ALTER TABLE `dental_history`
  ADD PRIMARY KEY (`Appoinment_Id`);

--
-- Indexes for table `female_patient`
--
ALTER TABLE `female_patient`
  ADD PRIMARY KEY (`Appoinment_Id`,`Patient_ID`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`Appoinment_Id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Message_ID`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`Note_Id`),
  ADD KEY `note_ibfk_1` (`Patient_ID`);

--
-- Indexes for table `no_clinic_date`
--
ALTER TABLE `no_clinic_date`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Patient_ID`);

--
-- Indexes for table `proof_of_payments`
--
ALTER TABLE `proof_of_payments`
  ADD PRIMARY KEY (`App_Id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Service_ID`),
  ADD KEY `ServiceCategory_ID` (`ServiceCategory_ID`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`ServiceCategory_Id`);

--
-- Indexes for table `social_history`
--
ALTER TABLE `social_history`
  ADD PRIMARY KEY (`Appoinment_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `ActLog_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `appointment_service`
--
ALTER TABLE `appointment_service`
  MODIFY `AS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `Message_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `Note_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `no_clinic_date`
--
ALTER TABLE `no_clinic_date`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Patient_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1225;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment_patient_condition`
--
ALTER TABLE `appointment_patient_condition`
  ADD CONSTRAINT `appointment_patient_condition_ibfk_1` FOREIGN KEY (`Appointmet_ID`) REFERENCES `appointment` (`Appointment_Id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `social_history`
--
ALTER TABLE `social_history`
  ADD CONSTRAINT `social_history_ibfk_1` FOREIGN KEY (`Appoinment_Id`) REFERENCES `appointment` (`Appointment_Id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
