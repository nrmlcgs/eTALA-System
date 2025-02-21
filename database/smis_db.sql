-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 07:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `announcement_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date_time_from` datetime NOT NULL,
  `date_time_to` datetime DEFAULT current_timestamp(),
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_announcement`
--

INSERT INTO `tbl_announcement` (`announcement_id`, `title`, `date_time_from`, `date_time_to`, `description`) VALUES
(3, 'exam', '2024-04-25 00:00:00', '2024-04-25 19:00:00', 'may exam tayo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_docs`
--

CREATE TABLE `tbl_docs` (
  `id` int(255) NOT NULL,
  `lrn_no` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_docs`
--

INSERT INTO `tbl_docs` (`id`, `lrn_no`, `file_type`, `file_name`) VALUES
(33, '112587764732', 'SF 10-JHS', '112587764732_Vicente_Shaira May_SHF10-JHS.xlsx'),
(35, '112587764732', 'Diploma', '112587764732_Vicente_Shaira May_Diploma.pdf'),
(36, '112587764732', 'SF 10-JHS', '112587764732_Vicente_Shaira May_SHF10-SHS.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grades`
--

CREATE TABLE `tbl_grades` (
  `grade_id` int(100) NOT NULL,
  `student_id` int(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `1st_grading` varchar(100) NOT NULL,
  `2nd_grading` varchar(100) NOT NULL,
  `3rd_grading` varchar(100) NOT NULL,
  `4th_grading` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL DEFAULT '1',
  `final_grade` varchar(100) NOT NULL,
  `passed_failed` varchar(100) NOT NULL,
  `year_level` int(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `school_year` varchar(255) NOT NULL,
  `adviser_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_grades`
--

INSERT INTO `tbl_grades` (`grade_id`, `student_id`, `subject`, `1st_grading`, `2nd_grading`, `3rd_grading`, `4th_grading`, `unit`, `final_grade`, `passed_failed`, `year_level`, `section`, `school_year`, `adviser_name`) VALUES
(26, 21, 'English', '95', '95', '95', '95', '1', '95.00', 'Passed', 1, 'Dalton', '2019-2022', ''),
(27, 21, 'Mathematics', '85', '95', '95', '80', '1', '83.75', 'Passed', 1, 'Dalton', '2019-2022', ''),
(28, 21, 'Science', '95', '86', '86', '75', '1', '85.25', 'Passed', 1, 'Dalton', '2019-2022', ''),
(29, 21, 'Filipino', '75', '76', '76', '85', '1', '79.00', 'Passed', 1, 'Dalton', '2019-2022', ''),
(30, 21, 'TLE', '75', '86', '86', '91', '1', '83.00', 'Passed', 1, 'Dalton', '2019-2022', ''),
(31, 21, 'ESP', '90', '94', '94', '96', '1', '92.75', 'Passed', 1, 'Dalton', '2019-2022', ''),
(32, 21, 'Music', '90', '82', '82', '85', '1', '84.25', 'Passed', 1, 'Dalton', '2019-2022', ''),
(33, 21, 'Arts', '90', '87', '87', '89', '1', '87.75', 'Passed', 1, 'Dalton', '2019-2022', ''),
(34, 21, 'PE', '92', '95', '95', '90', '1', '92.50', 'Passed', 1, 'Dalton', '2019-2022', ''),
(35, 21, 'Health', '77', '78', '78', '90', '1', '80.00', 'Passed', 1, 'Dalton', '2019-2022', ''),
(36, 21, 'Araling Panlipunan', '90', '95', '95', '89', '1', '91.50', 'Passed', 1, 'Dalton', '2019-2022', ''),
(37, 22, 'English', '95', '97', '97', '98', '1', '96.50', 'Passed', 1, 'Dalton', '2019-2022', ''),
(38, 22, 'Mathematics', '80', '84', '84', '86', '1', '83.00', 'Passed', 1, 'Dalton', '2019-2022', ''),
(39, 22, 'Science', '78', '96', '96', '95', '1', '86.00', 'Passed', 1, 'Dalton', '2019-2022', ''),
(40, 22, 'Araling Panlipunan', '75', '77', '77', '78', '1', '76.50', 'Passed', 1, 'Dalton', '2019-2022', ''),
(41, 22, 'Filipino', '79', '86', '86', '89', '1', '84.75', 'Passed', 1, 'Dalton', '2019-2022', ''),
(42, 22, 'TLE', '89', '92', '92', '94', '1', '91.25', 'Passed', 1, 'Dalton', '2019-2022', ''),
(43, 22, 'ESP', '95', '87', '87', '91', '1', '89.75', 'Passed', 1, 'Dalton', '2019-2022', ''),
(44, 22, 'Music', '91', '94', '94', '90', '1', '91.75', 'Passed', 1, 'Dalton', '2019-2022', ''),
(45, 22, 'Arts', '85', '81', '81', '82', '1', '82.00', 'Passed', 1, 'Dalton', '2019-2022', ''),
(46, 22, 'PE', '95', '91', '91', '93', '1', '93.75', 'Passed', 1, 'Dalton', '2019-2022', ''),
(47, 22, 'Health', '90', '75', '75', '78', '1', '83.00', 'Passed', 1, 'Dalton', '2019-2022', ''),
(48, 25, 'English', '89', '89', '88', '88', '1', '88.50', '', 1, 'Dalton', '2019-2022', 'Isidren Paciente'),
(49, 25, 'Mathematics', '89', '87', '87', '85', '1', '87.25', 'Passed', 1, 'Dalton', '2019-2022', ''),
(50, 25, 'Science', '96', '76', '76', '75', '1', '84.00', 'Passed', 1, 'Dalton', '2019-2022', ''),
(51, 25, 'Araling Panlipunan', '89', '80', '80', '79', '1', '83.50', 'Passed', 1, 'Dalton', '2019-2022', ''),
(52, 25, 'Filipino', '79', '76', '76', '77', '1', '76.75', 'Passed', 1, 'Dalton', '2019-2022', ''),
(53, 25, 'TLE', '89', '86', '86', '80', '1', '85.50', 'Passed', 1, 'Dalton', '2019-2022', ''),
(54, 25, 'ESP', '75', '79', '79', '82', '1', '78.50', 'Passed', 1, 'Dalton', '2019-2022', ''),
(55, 25, 'Music', '98', '91', '91', '89', '1', '92.50', 'Passed', 1, 'Dalton', '2019-2022', ''),
(56, 25, 'Arts', '90', '85', '85', '80', '1', '85.75', 'Passed', 1, 'Dalton', '2019-2022', ''),
(57, 25, 'PE', '90', '97', '97', '90', '1', '92.00', 'Passed', 1, 'Dalton', '2019-2022', ''),
(58, 25, 'Health', '79', '89', '89', '91', '1', '84.75', 'Passed', 1, 'Dalton', '2019-2022', ''),
(59, 24, 'English', '75', '90', '', '', '1', '', '', 1, 'Dalton', '2019-2020', 'Isidren Paciente'),
(60, 24, 'Mathematics', '89', '', '', '', '1', '', '', 1, 'Dalton', '2019-2020', 'Isidren Paciente'),
(61, 24, 'Science', '89', '85', '85', '83', '1', '86.75', 'Passed', 1, 'Dalton', '2019-2020', ''),
(62, 24, 'Araling Panlipunan', '85', '83', '83', '75', '1', '82.25', 'Passed', 1, 'Dalton', '2019-2020', ''),
(63, 24, 'Filipino', '75', '77', '77', '80', '1', '77.00', 'Passed', 1, 'Dalton', '2019-2020', ''),
(64, 24, 'TLE', '95', '78', '78', '75', '1', '86.50', 'Passed', 1, 'Dalton', '2019-2020', ''),
(65, 24, 'ESP', '89', '76', '76', '77', '1', '79.25', 'Passed', 1, 'Dalton', '2019-2020', ''),
(66, 24, 'Music', '75', '76', '76', '75', '1', '76.25', 'Passed', 1, 'Dalton', '2019-2020', ''),
(67, 24, 'Arts', '89', '75', '75', '78', '1', '80.00', 'Passed', 1, 'Dalton', '2019-2020', ''),
(68, 24, 'PE', '78', '76', '76', '75', '1', '77.00', 'Passed', 1, 'Dalton', '2019-2020', ''),
(69, 24, 'Health', '89', '92', '92', '95', '1', '91.50', 'Passed', 1, 'Dalton', '2019-2020', ''),
(70, 28, 'English', '85', '89', '89', '90', '1', '87.75', 'Passed', 1, 'Dalton', '2017-2018', ''),
(71, 28, 'Mathematics', '89', '85', '85', '78', '1', '81.75', 'Passed', 1, 'Dalton', '2017-2018', ''),
(72, 28, 'Science', '89', '78', '78', '81', '1', '80.75', 'Passed', 1, 'Dalton', '2017-2018', ''),
(73, 28, 'Araling Panlipunan', '77', '87', '87', '90', '1', '85.25', 'Passed', 1, 'Dalton', '2017-2018', ''),
(74, 28, 'Filipino', '90', '90', '90', '90', '1', '90.00', 'Passed', 1, 'Dalton', '2017-2018', ''),
(75, 28, 'TLE', '85', '89', '89', '88', '1', '87.00', 'Passed', 1, 'Dalton', '2017-2018', ''),
(76, 28, 'ESP', '90', '88', '88', '89', '1', '86.25', 'Passed', 1, 'Dalton', '2017-2018', ''),
(77, 28, 'Music', '75', '77', '77', '78', '1', '76.25', 'Passed', 1, 'Dalton', '2017-2018', ''),
(78, 28, 'Arts', '78', '88', '88', '89', '1', '83.50', 'Passed', 1, 'Dalton', '2017-2018', ''),
(79, 28, 'PE', '85', '95', '95', '96', '1', '91.75', 'Passed', 1, 'Dalton', '2017-2018', ''),
(80, 28, 'Health', '95', '96', '96', '97', '1', '95.75', 'Passed', 1, 'Dalton', '2017-2018', ''),
(81, 23, 'English', '88', '76', '87', '98', '1', '87.25', 'Passed', 1, 'Dalton', '2019-2020', 'Isidren Paciente'),
(82, 23, 'Mathematics', '85', '89', '89', '91', '1', '88.50', 'PASSED', 1, 'Dalton', '2019-2020', 'Isidren Paciente'),
(83, 23, 'Science', '75', '89', '89', '95', '1', '84.25', 'Passed', 1, 'Dalton', '2019-2020', 'Isidren Paciente'),
(84, 23, 'Araling Panlipunan', '89', '88', '88', '87', '1', '88.25', 'Passed', 1, 'Dalton', '2019-2020', 'Isidren Paciente'),
(85, 23, 'Filipino', '90', '90', '90', '91', '1', '90.25', 'Passed', 1, 'Dalton', '2019-2020', 'Isidren Paciente'),
(86, 23, 'TLE', '95', '98', '98', '99', '1', '97.00', 'Passed', 1, 'Dalton', '2019-2020', 'Isidren Paciente'),
(87, 23, 'ESP', '89', '86', '86', '85', '1', '86.75', 'Passed', 1, 'Dalton', '2019-2020', ''),
(88, 23, 'Music', '87', '90', '90', '91', '1', '88.50', 'Passed', 1, 'Dalton', '2019-2020', 'Isidren Paciente'),
(89, 23, 'Arts', '85', '87', '87', '88', '1', '86.50', 'Passed', 1, 'Dalton', '2019-2020', 'Isidren Paciente'),
(90, 23, 'PE', '89', '97', '97', '85', '1', '91.75', 'Passed', 1, 'Dalton', '2019-2020', 'Isidren Paciente'),
(91, 23, 'Health', '85', '89', '89', '87', '1', '86.75', 'Passed', 1, 'Dalton', '2019-2020', 'Isidren Paciente'),
(92, 28, 'English', '90', '90', '90', '89', '1', '89.75', 'Passed', 4, 'Section Test', '2019-2020', ''),
(94, 19, 'English', '77', '88', '88', '87', '1', '82.00', 'Passed', 1, 'Dalton', '2019-2020', 'Isidren Paciente');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history_log`
--

CREATE TABLE `tbl_history_log` (
  `log_id` int(100) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `student_id` int(100) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_history_log`
--

INSERT INTO `tbl_history_log` (`log_id`, `transaction`, `user_id`, `student_id`, `date_added`) VALUES
(1, 'logged out', 1, 0, 'Dec 17, 2023  12:36pm'),
(2, 'logging in', 1, 0, 'Dec 17, 2023  12:37:pm'),
(3, 'logged out', 1, 0, 'Dec 17, 2023  12:40pm'),
(4, 'logging in', 0, 1, 'Dec 17, 2023  12:41:pm'),
(5, 'logged out', 0, 1, 'Dec 17, 2023  12:45pm'),
(6, 'logging in', 1, 0, 'Dec 17, 2023  12:46:pm'),
(7, 'logged out', 1, 0, 'Dec 17, 2023  12:56pm'),
(8, 'logging in', 0, 1, 'Dec 17, 2023  12:56:pm'),
(9, 'logged out', 0, 1, 'Dec 17, 2023  12:57pm'),
(10, 'logging in', 1, 0, 'Dec 17, 2023  12:58:pm'),
(11, 'logged out', 1, 0, 'Dec 17, 2023  12:58pm'),
(12, 'logging in', 1, 0, 'Dec 30, 2023  04:34:pm'),
(13, 'logging in', 0, 1, 'Dec 30, 2023  04:57:pm'),
(14, 'logging in', 1, 0, 'Jan 03, 2024  09:54:am'),
(15, 'logging in', 1, 0, 'Jan 03, 2024  12:28:pm'),
(16, 'logging in', 1, 0, 'Jan 04, 2024  10:38:pm'),
(17, 'logging in', 1, 0, 'Jan 08, 2024  06:36:pm'),
(18, 'logging in', 1, 0, 'Jan 08, 2024  07:02:pm'),
(19, 'logging in', 1, 0, 'Jan 09, 2024  03:10:pm'),
(20, 'logged out', 1, 0, 'Jan 09, 2024  03:52pm'),
(21, 'logging in', 1, 0, 'Jan 10, 2024  09:18:am'),
(22, 'logging in', 1, 0, 'Jan 10, 2024  01:35:pm'),
(23, 'logging in', 1, 0, 'Jan 11, 2024  12:07:am'),
(24, 'logging in', 1, 0, 'Jan 11, 2024  11:12:am'),
(25, 'logging in', 1, 0, 'Jan 11, 2024  02:10:pm'),
(26, 'logging in', 1, 0, 'Jan 11, 2024  03:47:pm'),
(27, 'logging in', 1, 0, 'Jan 11, 2024  05:45:pm'),
(28, 'logging in', 1, 0, 'Jan 12, 2024  12:59:am'),
(29, 'logging in', 1, 0, 'Jan 14, 2024  07:41:pm'),
(30, 'logging in', 1, 0, 'Jan 15, 2024  01:10:pm'),
(31, 'logging in', 1, 0, 'Jan 15, 2024  03:30:pm'),
(32, 'logging in', 1, 0, 'Jan 27, 2024  09:35:am'),
(33, 'logging in', 1, 0, 'Jan 27, 2024  10:10:am'),
(34, 'logging in', 1, 0, 'Jan 27, 2024  10:11:am'),
(35, 'logging in', 1, 0, 'Jan 27, 2024  10:17:am'),
(36, 'logging in', 0, 8, 'Jan 27, 2024  10:19:am'),
(37, 'logging in', 1, 0, 'Jan 29, 2024  08:59:am'),
(38, 'logging in', 0, 11, 'Jan 29, 2024  09:39:am'),
(39, 'logged out', 0, 11, 'Jan 29, 2024  09:52am'),
(40, 'logging in', 1, 0, 'Jan 29, 2024  09:52:am'),
(41, 'logging in', 0, 11, 'Jan 29, 2024  10:01:am'),
(42, 'logging in', 1, 0, 'Jan 29, 2024  10:53:am'),
(43, 'logged out', 1, 0, 'Jan 29, 2024  11:04am'),
(44, 'logging in', 1, 0, 'Jan 29, 2024  11:22:am'),
(45, 'logged out', 1, 0, 'Jan 29, 2024  11:28am'),
(46, 'logging in', 1, 0, 'Jan 29, 2024  11:28:am'),
(47, 'logged out', 1, 0, 'Jan 29, 2024  11:30am'),
(48, 'logging in', 1, 0, 'Jan 29, 2024  11:37:am'),
(49, 'logging in', 0, 11, 'Jan 29, 2024  11:38:am'),
(50, 'logged out', 1, 0, 'Jan 29, 2024  11:39am'),
(51, 'logging in', 1, 0, 'Jan 29, 2024  11:39:am'),
(52, 'logged out', 0, 0, 'Jan 29, 2024  11:39am'),
(53, 'logging in', 0, 11, 'Jan 29, 2024  11:40:am'),
(54, 'logged out', 0, 0, 'Jan 29, 2024  11:40am'),
(55, 'logging in', 1, 0, 'Jan 29, 2024  11:40:am'),
(56, 'logging in', 0, 11, 'Jan 29, 2024  11:44:am'),
(57, 'logged out', 1, 0, 'Jan 29, 2024  11:44am'),
(58, 'logging in', 1, 0, 'Jan 29, 2024  11:44:am'),
(59, 'logged out', 0, 0, 'Jan 29, 2024  11:45am'),
(60, 'logging in', 0, 11, 'Jan 29, 2024  11:46:am'),
(61, 'logging in', 1, 0, 'Jan 29, 2024  11:46:am'),
(62, 'logged out', 1, 0, 'Jan 29, 2024  01:44pm'),
(63, 'logging in', 1, 0, 'Jan 29, 2024  01:44:pm'),
(64, 'logged out', 1, 0, 'Jan 29, 2024  01:47pm'),
(65, 'logged out', 0, 11, 'Jan 29, 2024  01:47pm'),
(66, 'logging in', 1, 0, 'Jan 29, 2024  02:00:pm'),
(67, 'logging in', 1, 0, 'Jan 29, 2024  02:21:pm'),
(68, 'logging in', 0, 17, 'Jan 29, 2024  02:41:pm'),
(69, 'logged out', 1, 0, 'Jan 29, 2024  02:56pm'),
(70, 'logging in', 1, 0, 'Jan 29, 2024  02:56:pm'),
(71, 'logged out', 1, 0, 'Jan 29, 2024  02:57pm'),
(72, 'logging in', 1, 0, 'Jan 29, 2024  02:57:pm'),
(73, 'logged out', 1, 0, 'Jan 29, 2024  02:58pm'),
(74, 'logging in', 1, 0, 'Jan 29, 2024  02:58:pm'),
(75, 'logging in', 0, 18, 'Jan 29, 2024  03:14:pm'),
(76, 'logged out', 1, 0, 'Jan 29, 2024  03:46pm'),
(77, 'logging in', 1, 0, 'Jan 29, 2024  03:47:pm'),
(78, 'logged out', 1, 0, 'Jan 29, 2024  04:02pm'),
(79, 'logging in', 1, 0, 'Jan 29, 2024  04:02:pm'),
(80, 'logged out', 1, 0, 'Jan 29, 2024  04:28pm'),
(81, 'logging in', 6, 0, 'Jan 29, 2024  04:29:pm'),
(82, 'logged out', 6, 0, 'Jan 29, 2024  04:29pm'),
(83, 'logging in', 1, 0, 'Jan 29, 2024  04:29:pm'),
(84, 'logged out', 0, 11, 'Jan 29, 2024  04:41pm'),
(85, 'logging in', 0, 11, 'Jan 29, 2024  04:41:pm'),
(86, 'logged out', 0, 0, 'Jan 29, 2024  04:54pm'),
(87, 'logging in', 6, 0, 'Jan 29, 2024  04:54:pm'),
(88, 'logging in', 1, 0, 'Jan 30, 2024  12:36:pm'),
(89, 'logged out', 1, 0, 'Jan 30, 2024  03:14pm'),
(90, 'logging in', 7, 0, 'Jan 30, 2024  03:14:pm'),
(91, 'logged out', 7, 0, 'Jan 30, 2024  03:21pm'),
(92, 'logging in', 1, 0, 'Jan 30, 2024  03:21:pm'),
(93, 'logged out', 1, 0, 'Jan 30, 2024  03:35pm'),
(94, 'logging in', 7, 0, 'Jan 30, 2024  03:35:pm'),
(95, 'logged out', 7, 0, 'Jan 30, 2024  03:52pm'),
(96, 'logging in', 1, 0, 'Jan 30, 2024  03:52:pm'),
(97, 'logged out', 1, 0, 'Jan 30, 2024  03:54pm'),
(98, 'logging in', 8, 0, 'Jan 30, 2024  03:54:pm'),
(99, 'logged out', 8, 0, 'Jan 30, 2024  04:27pm'),
(100, 'logging in', 8, 0, 'Jan 30, 2024  04:29:pm'),
(101, 'logged out', 8, 0, 'Jan 30, 2024  04:32pm'),
(102, 'logging in', 1, 0, 'Jan 31, 2024  09:27:pm'),
(103, 'logging in', 1, 0, 'Feb 09, 2024  06:30:pm'),
(104, 'logging in', 1, 0, 'Feb 11, 2024  10:44:am'),
(105, 'logging in', 1, 0, 'Feb 11, 2024  11:11:am'),
(106, 'logging in', 1, 0, 'Feb 11, 2024  08:28:pm'),
(107, 'logging in', 1, 0, 'Feb 11, 2024  09:02:pm'),
(108, 'logging in', 1, 0, 'Feb 11, 2024  09:59:pm'),
(109, 'logging in', 1, 0, 'Feb 12, 2024  10:26:am'),
(110, 'logging in', 1, 0, 'Feb 12, 2024  12:14:pm'),
(111, 'logging in', 1, 0, 'Feb 12, 2024  12:22:pm'),
(112, 'logging in', 1, 0, 'Feb 22, 2024  11:18:am'),
(113, 'logging in', 1, 0, 'Feb 25, 2024  08:27:pm'),
(114, 'logging in', 1, 0, 'Feb 25, 2024  08:31:pm'),
(115, 'logging in', 1, 0, 'Feb 25, 2024  08:31:pm'),
(116, 'logging in', 1, 0, 'Feb 25, 2024  08:37:pm'),
(117, 'logging in', 1, 0, 'Feb 25, 2024  08:48:pm'),
(118, 'logging in', 1, 0, 'Feb 25, 2024  08:50:pm'),
(119, 'logging in', 1, 0, 'Feb 26, 2024  10:36:am'),
(120, 'logging in', 1, 0, 'Feb 26, 2024  10:47:am'),
(121, 'logging in', 1, 0, 'Feb 26, 2024  11:59:am'),
(122, 'logging in', 1, 0, 'Apr 10, 2024  02:52:pm'),
(123, 'logging in', 1, 0, 'Apr 10, 2024  02:53:pm'),
(124, 'logging in', 0, 19, 'Apr 10, 2024  02:57:pm'),
(125, 'logged out', 0, 19, 'Apr 10, 2024  03:13pm'),
(126, 'logging in', 0, 19, 'Apr 10, 2024  03:14:pm'),
(127, 'logging in', 1, 0, 'Apr 10, 2024  03:17:pm'),
(128, 'logging in', 0, 19, 'Apr 10, 2024  03:18:pm'),
(129, 'logging in', 0, 19, 'Apr 10, 2024  03:30:pm'),
(130, 'logging in', 0, 19, 'Apr 10, 2024  03:35:pm'),
(131, 'logging in', 1, 0, 'Apr 10, 2024  03:35:pm'),
(132, 'logged out', 0, 0, 'Apr 10, 2024  03:42pm'),
(133, 'logging in', 0, 19, 'Apr 10, 2024  03:42:pm'),
(134, 'logging in', 1, 0, 'Apr 10, 2024  03:42:pm'),
(135, 'logging in', 1, 0, 'Apr 10, 2024  03:43:pm'),
(136, 'logging in', 1, 0, 'Apr 10, 2024  03:44:pm'),
(137, 'logging in', 1, 0, 'Apr 10, 2024  03:44:pm'),
(138, 'logging in', 0, 19, 'Apr 10, 2024  03:46:pm'),
(139, 'logged out', 0, 0, 'Apr 10, 2024  03:48pm'),
(140, 'logging in', 0, 19, 'Apr 10, 2024  03:49:pm'),
(141, 'logging in', 0, 19, 'Apr 10, 2024  03:51:pm'),
(142, 'logging in', 1, 0, 'Apr 10, 2024  03:51:pm'),
(143, 'logged out', 1, 0, 'Apr 10, 2024  04:48pm'),
(144, 'logging in', 0, 19, 'Apr 10, 2024  04:48:pm'),
(145, 'logged out', 1, 0, 'Apr 10, 2024  05:21pm'),
(146, 'logging in', 1, 0, 'Apr 10, 2024  05:22:pm'),
(147, 'logging in', 1, 0, 'Apr 10, 2024  06:57:pm'),
(148, 'logging in', 0, 19, 'Apr 10, 2024  07:32:pm'),
(149, 'logged out', 0, 19, 'Apr 10, 2024  07:34pm'),
(150, 'logging in', 0, 19, 'Apr 10, 2024  07:35:pm'),
(151, 'logged out', 0, 19, 'Apr 10, 2024  09:04pm'),
(152, 'logging in', 0, 19, 'Apr 10, 2024  09:04:pm'),
(153, 'logged out', 0, 19, 'Apr 10, 2024  09:07pm'),
(154, 'logging in', 0, 19, 'Apr 10, 2024  09:07:pm'),
(155, 'logging in', 1, 0, 'Apr 10, 2024  09:55:pm'),
(156, 'logging in', 1, 0, 'Apr 10, 2024  09:56:pm'),
(157, 'logged out', 0, 19, 'Apr 10, 2024  10:08pm'),
(158, 'logging in', 0, 19, 'Apr 13, 2024  08:30:pm'),
(159, 'logging in', 1, 0, 'Apr 13, 2024  08:31:pm'),
(160, 'logging in', 0, 19, 'Apr 13, 2024  08:48:pm'),
(161, 'logging in', 0, 19, 'Apr 13, 2024  08:53:pm'),
(162, 'logged out', 0, 19, 'Apr 13, 2024  08:54pm'),
(163, 'logging in', 1, 0, 'Apr 13, 2024  08:54:pm'),
(164, 'logged out', 1, 0, 'Apr 13, 2024  08:55pm'),
(165, 'logging in', 0, 19, 'Apr 13, 2024  08:56:pm'),
(166, 'logging in', 0, 19, 'Apr 13, 2024  08:57:pm'),
(167, 'logging in', 0, 19, 'Apr 13, 2024  08:58:pm'),
(168, 'logged out', 0, 19, 'Apr 13, 2024  09:10pm'),
(169, 'logging in', 1, 0, 'Apr 13, 2024  09:37:pm'),
(170, 'logging in', 0, 19, 'Apr 13, 2024  09:49:pm'),
(171, 'logged out', 0, 19, 'Apr 13, 2024  09:52pm'),
(172, 'logging in', 1, 0, 'Apr 13, 2024  09:52:pm'),
(173, 'logging in', 1, 0, 'Apr 13, 2024  11:53:pm'),
(174, 'logging in', 1, 0, 'Apr 14, 2024  04:11:pm'),
(175, 'logging in', 0, 19, 'Apr 14, 2024  06:31:pm'),
(176, 'logging in', 1, 0, 'Apr 15, 2024  12:10:pm'),
(177, 'logged out', 1, 0, 'Apr 15, 2024  12:21pm'),
(178, 'logging in', 0, 19, 'Apr 15, 2024  12:21:pm'),
(179, 'logging in', 0, 19, 'Apr 15, 2024  12:44:pm'),
(180, 'logging in', 0, 19, 'Apr 15, 2024  12:45:pm'),
(181, 'logging in', 0, 19, 'Apr 15, 2024  12:46:pm'),
(182, 'logging in', 0, 19, 'Apr 15, 2024  12:50:pm'),
(183, 'logged out', 0, 19, 'Apr 16, 2024  07:36pm'),
(184, 'logging in', 0, 23, 'Apr 16, 2024  07:36:pm'),
(185, 'logging in', 1, 0, 'Apr 17, 2024  08:19:pm'),
(186, 'logging in', 0, 19, 'Apr 17, 2024  09:45:pm'),
(187, 'logging in', 0, 19, 'Apr 18, 2024  03:34:am'),
(188, 'logged out', 0, 19, 'Apr 18, 2024  03:43am'),
(189, 'logging in', 1, 0, 'Apr 19, 2024  06:38:pm'),
(190, 'logging in', 0, 19, 'Apr 20, 2024  12:47:pm'),
(191, 'logged out', 0, 19, 'Apr 20, 2024  02:12pm'),
(192, 'logging in', 0, 28, 'Apr 20, 2024  02:12:pm'),
(193, 'logged out', 0, 28, 'Apr 20, 2024  02:33pm'),
(194, 'logged out', 1, 0, 'Apr 20, 2024  02:40pm'),
(195, 'logging in', 1, 0, 'Apr 20, 2024  02:40:pm'),
(196, 'logged out', 1, 0, 'Apr 20, 2024  02:41pm'),
(197, 'logging in', 1, 0, 'Apr 20, 2024  02:42:pm'),
(198, 'logging in', 0, 28, 'Apr 20, 2024  03:19:pm'),
(199, 'logged out', 0, 28, 'Apr 20, 2024  04:21pm'),
(200, 'logging in', 1, 0, 'Apr 20, 2024  04:21:pm'),
(201, 'logged out', 1, 0, 'Apr 20, 2024  04:33pm'),
(202, 'logging in', 0, 19, 'Apr 20, 2024  04:45:pm'),
(203, 'logged out', 0, 19, 'Apr 20, 2024  04:45pm'),
(204, 'logged out', 1, 0, 'Apr 20, 2024  04:46pm'),
(205, 'logging in', 0, 19, 'Apr 20, 2024  04:56:pm'),
(206, 'logged out', 0, 19, 'Apr 20, 2024  04:57pm'),
(207, 'logging in', 1, 0, 'Apr 20, 2024  04:57:pm'),
(208, 'logged out', 1, 0, 'Apr 20, 2024  05:10pm'),
(209, 'logging in', 0, 19, 'Apr 20, 2024  05:10:pm'),
(210, 'logged out', 0, 19, 'Apr 20, 2024  05:14pm'),
(211, 'logging in', 0, 19, 'Apr 20, 2024  07:41:pm'),
(212, 'logging in', 1, 0, 'Apr 20, 2024  07:46:pm'),
(213, 'logging in', 0, 19, 'Apr 20, 2024  09:05:pm'),
(214, 'logged out', 0, 19, 'Apr 20, 2024  10:39pm'),
(215, 'logging in', 1, 0, 'Apr 20, 2024  10:39:pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE `tbl_program` (
  `program_id` int(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`program_id`, `program`, `description`) VALUES
(1, 'Regular', 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_year`
--

CREATE TABLE `tbl_school_year` (
  `sy_id` int(100) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_school_year`
--

INSERT INTO `tbl_school_year` (`sy_id`, `school_year`) VALUES
(1, '2019-2020 '),
(2, '2020-2021 '),
(3, '2021-2022 '),
(4, '2022-2023 '),
(5, '2023-2024 '),
(6, '2018-2019 '),
(7, '2017-2018 ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `section_id` int(100) NOT NULL,
  `year_level_id` int(100) NOT NULL,
  `section_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`section_id`, `year_level_id`, `section_name`) VALUES
(1, 1, 'Dalton'),
(3, 2, 'Reimann'),
(4, 2, 'Einstein'),
(5, 3, 'Hirodotus'),
(6, 3, 'Archamedus'),
(7, 4, 'st. dominic'),
(8, 4, 'st. dorothea'),
(9, 5, 'HUMSS 1'),
(10, 5, 'ICT 1'),
(12, 6, 'GAS 2'),
(13, 6, 'ICT 2'),
(14, 6, 'HUMSS 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shs`
--

CREATE TABLE `tbl_shs` (
  `id` int(11) NOT NULL,
  `student_id` int(100) NOT NULL,
  `track_strand` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `sem_id` int(10) NOT NULL,
  `first` int(10) NOT NULL,
  `second` int(10) NOT NULL,
  `section` varchar(255) NOT NULL,
  `year_level` int(100) NOT NULL,
  `adviser_name` varchar(255) NOT NULL,
  `average` float GENERATED ALWAYS AS ((`first` + `second`) / 2) STORED,
  `sem_action` varchar(10) GENERATED ALWAYS AS (case when (`first` + `second`) / 2 >= 75 then 'PASSED' else 'FAILED' end) STORED,
  `school_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shs`
--

INSERT INTO `tbl_shs` (`id`, `student_id`, `track_strand`, `subject`, `sem_id`, `first`, `second`, `section`, `year_level`, `adviser_name`, `school_year`) VALUES
(7, 28, '4', '21st Century Literature from the Philippines and the World', 1, 76, 87, 'HUMSS 1', 5, 'Adviser Name', '2020-2021'),
(8, 28, '4', 'General Mathematics', 1, 87, 87, 'HUMSS 1', 5, 'Adviser Name', '2020-2021'),
(9, 28, '4', 'Empowerment Technologies', 2, 77, 87, 'HUMSS 1', 5, 'Adviser Name', '2020-2021'),
(10, 28, '4', 'Oral Communication', 2, 76, 88, 'HUMSS 1', 5, 'Adviser Name', '2020-2021'),
(11, 28, '4', 'General Chemistry 1', 2, 87, 87, 'HUMSS 1', 5, 'Adviser Name', '2020-2021'),
(12, 28, '4', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 1, 87, 87, 'HUMSS 1', 5, 'Adviser Name', '2020-2021'),
(13, 28, '4', 'Physical Education and Health 1', 2, 77, 88, 'HUMSS 2', 6, 'Adviser Name', '2021-2022'),
(14, 28, '4', '21st Century Literature from the Philippines and the World', 1, 89, 87, 'HUMSS 2', 6, 'Adviser Name', '2021-2022'),
(15, 28, '4', 'General Mathematics', 1, 98, 77, 'HUMSS 2', 6, 'Adviser Name', '2021-2022'),
(16, 28, '4', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 1, 91, 98, 'HUMSS 2', 6, 'Adviser Name', '2021-2022'),
(17, 28, '4', 'Oral Communication', 2, 78, 87, 'HUMSS 2', 6, 'Adviser Name', '2021-2022'),
(18, 27, '4', '21st Century Literature from the Philippines and the World', 1, 88, 87, 'HUMSS 2', 6, 'Test Adviser name', '2019-2020'),
(19, 28, '4', 'Empowerment Technologies', 1, 88, 86, 'HUMSS 2', 6, 'Adviser Name', '2021-2022'),
(20, 28, '4', 'Pre - Calculus', 1, 88, 88, 'HUMSS 2', 6, 'Adviser Name', '2021-2022'),
(27, 28, '4', 'Pre - Calculus', 2, 90, 88, 'HUMSS 2', 6, 'Isidren Paciente', '2021-2022'),
(28, 28, '4', 'Oral Communication', 1, 78, 76, 'HUMSS 2', 6, 'Isidren Paciente', '2021-2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_info`
--

CREATE TABLE `tbl_student_info` (
  `student_id` int(100) NOT NULL,
  `lrn_no` varchar(12) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `birth_place` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `year_level` int(100) NOT NULL,
  `school_year` varchar(100) NOT NULL,
  `section` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `verify_token` int(100) NOT NULL DEFAULT 0,
  `user_type` int(100) NOT NULL DEFAULT 3,
  `track_strand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student_info`
--

INSERT INTO `tbl_student_info` (`student_id`, `lrn_no`, `lastname`, `firstname`, `middlename`, `email`, `password`, `gender`, `date_of_birth`, `address`, `birth_place`, `religion`, `contact_no`, `age`, `year_level`, `school_year`, `section`, `status`, `program`, `verify_token`, `user_type`, `track_strand`) VALUES
(19, '110189130023', 'Mendez', 'Angel', 'Castro', 'kntjrld@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Female', '2000-10-14', 'Sitio Caldera, Aluyan, Abra De Ilog Occidental Mindoro', 'Aluyan, Abra De Ilog Occidental Mindoro', 'Catholic', '09458293941', '23', 1, '2019-2020', 'Dalton', 'Passed', 'Regular', 0, 3, ''),
(20, '110568958332', 'Moreno', 'Mark Angelo', 'Belen', 'moreno@gmail.com', '17b19f18884c1300cf64955c2f14b6e4', 'Male', '2005-11-01', 'Tuguilan, Tayamaan, Mamburao Occidental Mindoro', 'Mamburao Occidental Mindoro', 'Catholic', '09556892465', '17', 1, '2019-2020', 'Dalton', 'Passed', 'Regular', 0, 3, ''),
(21, '110189130021', 'Belen', 'Hazel Ann', 'Amorgado', 'belen@gmail.com', 'e77d6dbd4480d23799a1ffe8883afdfa', 'Female', '2006-02-15', 'Tuguilan, Tayamaan, Mamburao, Occidental Mindoro', 'Tuguilan, Tayamaan, Mamburao, Occidental Mindoro', 'Catholic', '09458925465', '16', 1, '2019-2020', 'Dalton', 'Passed', 'Regular', 0, 3, ''),
(22, '110568958443', 'Roga', 'John Mar', 'Cueto', 'roga@gmail.com', '8aba0e4b6a95d23319ee6edd3fa87f9e', 'Male', '2004-12-10', 'Tayamaan, Mamburao, Occidental Mindoro', 'Dungon, Tayamaan, Mamburao Occidental Mindoro', 'Born Again', '09859475869', '19', 1, '2019-2020', 'Dalton', 'Passed', 'Regular', 0, 3, ''),
(23, '112589583535', 'Cagas', 'Eugine', 'Ebano', 'cagas@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Male', '2003-09-15', 'Balansay, Mamburao, Occidental Mindoro', 'Mamburao, Occidental Mindoro', 'Catholic', '09568469264', '19', 1, '2019-2020', 'Dalton', 'Passed', 'Regular', 0, 3, ''),
(24, '112235898564', 'Heras', 'Mica', 'Perez', 'heras@gmail.com', '3664b117bb17d49b8906b29268be725c', 'Female', '2004-10-06', 'Poblacion, Abra De Ilog, Occidental Mindoro', 'Poblacion, Abra De Ilog, Occidental Mindoro', 'Catholic', '09125869863', '19', 1, '2019-2020', 'Dalton', 'Passed', 'Regular', 0, 3, ''),
(25, '111128695365', 'Castro', 'Ana ', 'Albao', 'castro@gmail.com', '987f6c3ed52eea0e00f48f838d330911', 'Female', '2006-06-10', 'Balao, Abra De Ilog Occidental Mindoro', 'Balao, Abra De Ilog Occidental Mindoro', 'Catholic', '09856258594', '15', 1, '2019-2020', 'Dalton', 'Passed', 'Regular', 0, 3, ''),
(26, '115989668933', 'Villalobos ', 'Von Ralph ', 'Cuzon', 'villalobos@gmail.com', '2ad4a2178c37c002fe0c73ae2c054448', 'Male', '2004-11-24', 'Fatima, Mamburao Occidental Mindoro', 'Mamburao, Occidental Mindoro', 'Catholic', '09583364889', '18', 1, '2019-2020', 'Dalton', 'Passed', 'Regular', 0, 3, ''),
(27, '119856485223', 'Magada', 'Aldrin', 'Cuzon', 'magada@gmail.com', '223dc7911df448a8348f0c851e556392', 'Male', '2007-07-10', 'Balansay, Mamburao Occidental Mindoro', 'Mamburao, Occidental Mindoro', 'Catholic', '09459681581', '15', 6, '2019-2020', 'HUMSS 2', 'Passed', 'Regular', 0, 3, '4'),
(28, '112587764732', 'Vicente', 'Shaira May', 'Santileces ', 'vicente@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Female', '2006-08-15', 'Payompon, Mamburao, Occidental Mindoro', 'Mamburao Occidental Mindoro', 'Catholic', '09458265498', '17', 6, '2021-2022', 'HUMSS 2', 'Passed', 'Regular', 0, 3, '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_name`, `description`, `order_id`) VALUES
(1, 'English', 'English', 2),
(2, 'Mathematics', 'Mathematics', 3),
(3, 'Science', 'Science', 4),
(4, 'Araling Panlipunan', 'Araling Panlipunan', 5),
(5, 'Filipino', 'Filipino', 1),
(7, 'TLE', 'TLE', 7),
(8, 'ESP', 'Edukasyon sa Pagpapakatao', 6),
(9, 'Music', 'Music', 8),
(10, 'Arts', 'Arts', 9),
(11, 'PE', 'Physical Education', 10),
(12, 'Health', 'Health', 11),
(13, '21st Century Literature from the Philippines and the World', 'Core', 0),
(14, 'General Mathematics', 'Core', 0),
(15, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'Core', 0),
(16, 'Oral Communication', 'Core', 0),
(17, 'Physical Education and Health 1', 'Core', 0),
(18, 'Empowerment Technologies', 'Applied ', 0),
(19, 'General Biology 1', 'Specialized', 0),
(20, 'General Chemistry 1', 'Specialized', 0),
(21, 'Pre - Calculus', 'Specialized ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`) VALUES
(3, 'donzal', 'angelo', 'angelo', 'angelo123', 'angelo123'),
(4, 'Angelo', 'angelo', 'donzal', 'gelo123', 'gelo123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_track_strand`
--

CREATE TABLE `tbl_track_strand` (
  `id` int(11) NOT NULL,
  `track` varchar(255) NOT NULL,
  `strand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_track_strand`
--

INSERT INTO `tbl_track_strand` (`id`, `track`, `strand`) VALUES
(4, ' Academic Track', 'Science, Technology, Engineering, and Math (STEM)'),
(6, 'Technical-Vocational-Livelihood', 'ICT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` int(100) NOT NULL DEFAULT 0 COMMENT '1 = admin, 0 = staff',
  `verify_token` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `lastname`, `firstname`, `username`, `email`, `password`, `user_type`, `verify_token`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 1, 0),
(7, 'paciente', 'isidren', 'isidren', 'isidren@gmail.com', '4ea9809a55f9ca30c1d41fcea43a42ca', 0, 0),
(8, 'donzal', 'angelo', 'nunezgirl', 'angelo@gmail.com', 'f625ab125cf3828df31058cdcd32c1ef', 0, 0),
(9, 'ehrmann', 'mark anthony', 'anthony', 'anthony@gmail.com', 'anthony123', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year_level`
--

CREATE TABLE `tbl_year_level` (
  `year_level_id` int(100) NOT NULL,
  `year_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_year_level`
--

INSERT INTO `tbl_year_level` (`year_level_id`, `year_level`) VALUES
(1, 'Grade 7'),
(2, 'Grade 8'),
(3, 'Grade 9'),
(4, 'Grade 10'),
(5, 'Grade 11'),
(6, 'Grade 12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `tbl_docs`
--
ALTER TABLE `tbl_docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `tbl_history_log`
--
ALTER TABLE `tbl_history_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  ADD PRIMARY KEY (`sy_id`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `tbl_shs`
--
ALTER TABLE `tbl_shs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_track_strand`
--
ALTER TABLE `tbl_track_strand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_year_level`
--
ALTER TABLE `tbl_year_level`
  ADD PRIMARY KEY (`year_level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `announcement_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_docs`
--
ALTER TABLE `tbl_docs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  MODIFY `grade_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tbl_history_log`
--
ALTER TABLE `tbl_history_log`
  MODIFY `log_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `program_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  MODIFY `sy_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `section_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_shs`
--
ALTER TABLE `tbl_shs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  MODIFY `student_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_track_strand`
--
ALTER TABLE `tbl_track_strand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_year_level`
--
ALTER TABLE `tbl_year_level`
  MODIFY `year_level_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
