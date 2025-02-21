-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2024 at 11:42 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id22069784_smis`
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
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_announcement`
--

INSERT INTO `tbl_announcement` (`announcement_id`, `title`, `date_time_from`, `date_time_to`, `description`) VALUES
(7, 'Independence Day', '2024-06-12 00:00:00', '2024-06-12 23:59:00', 'Independence Day is a national holiday in the Philippines observed annually on June 12.');

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
(1, 'Logged out', 1, 0, 'May 03, 2024  07:37pm'),
(2, 'Logged in', 1, 0, 'May 06, 2024  08:35:am'),
(3, 'Logged in', 1, 0, 'May 07, 2024  10:41:am'),
(4, 'Logged out', 1, 0, 'May 07, 2024  10:41am'),
(5, 'Logged in', 1, 0, 'May 07, 2024  10:36:pm');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `section_id` int(100) NOT NULL,
  `year_level_id` int(100) NOT NULL,
  `section_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signatory`
--

CREATE TABLE `tbl_signatory` (
  `id` int(11) NOT NULL,
  `head_name` varchar(255) NOT NULL,
  `principal_name` varchar(255) NOT NULL,
  `school_manager` varchar(255) NOT NULL,
  `araw` varchar(255) NOT NULL,
  `buwan` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_signatory`
--

INSERT INTO `tbl_signatory` (`id`, `head_name`, `principal_name`, `school_manager`, `araw`, `buwan`, `day`, `month`) VALUES
(1, 'For Update', 'For Update', 'For Update', 'Martes', 'Enero', '10TH', 'June');

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
(12, 'Health', 'Health', 11);

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
(4, ' Academic Track', 'Science, Technology, Engineering, and Math (STEM)');

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
(1, 'Admin', 'Adminstrator', 'admin', 'omnhs.smis@gmail.com', '0192023a7bbd73250516f069df18b500', 1, 0);

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
-- Indexes for table `tbl_signatory`
--
ALTER TABLE `tbl_signatory`
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
  MODIFY `announcement_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_docs`
--
ALTER TABLE `tbl_docs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  MODIFY `grade_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `tbl_history_log`
--
ALTER TABLE `tbl_history_log`
  MODIFY `log_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `program_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  MODIFY `sy_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `section_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_shs`
--
ALTER TABLE `tbl_shs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_signatory`
--
ALTER TABLE `tbl_signatory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  MODIFY `student_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_track_strand`
--
ALTER TABLE `tbl_track_strand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_year_level`
--
ALTER TABLE `tbl_year_level`
  MODIFY `year_level_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
