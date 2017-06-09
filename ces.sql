-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2017 at 05:04 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ces`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_info`
--

CREATE TABLE `academic_info` (
  `id_number` int(11) NOT NULL,
  `student_info` int(11) NOT NULL,
  `elem_name` varchar(50) DEFAULT NULL,
  `elem_address` varchar(50) DEFAULT NULL,
  `elem_year` varchar(10) DEFAULT NULL,
  `secondary_name` varchar(50) DEFAULT NULL,
  `secondary_address` varchar(50) DEFAULT NULL,
  `secondary_year` varchar(10) DEFAULT NULL,
  `tertiary_name` varchar(50) DEFAULT NULL,
  `tertiary_address` varchar(50) DEFAULT NULL,
  `tertiary_year` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_info`
--

INSERT INTO `academic_info` (`id_number`, `student_info`, `elem_name`, `elem_address`, `elem_year`, `secondary_name`, `secondary_address`, `secondary_year`, `tertiary_name`, `tertiary_address`, `tertiary_year`) VALUES
(1, 1, 'North Central School', 'San Fernando City', '2010', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `id_number` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`id_number`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, 'Joel Niko', 'Noti', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `civilstatus_info`
--

CREATE TABLE `civilstatus_info` (
  `civil_status_id` int(11) NOT NULL,
  `civil_status_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_info`
--

CREATE TABLE `course_info` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parental_info`
--

CREATE TABLE `parental_info` (
  `id_number` int(11) NOT NULL,
  `student_info` int(11) NOT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `father_address` varchar(50) DEFAULT NULL,
  `father_contact_no` varchar(20) DEFAULT NULL,
  `father_occupation` varchar(50) DEFAULT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `mother_address` varchar(50) DEFAULT NULL,
  `mother_contact_no` varchar(20) DEFAULT NULL,
  `mother_occupation` varchar(50) DEFAULT NULL,
  `guardian_name` varchar(50) DEFAULT NULL,
  `guardian_address` varchar(50) DEFAULT NULL,
  `guardian_contact_no` varchar(20) DEFAULT NULL,
  `guardian_occupation` varchar(50) DEFAULT NULL,
  `guardian_relation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parental_info`
--

INSERT INTO `parental_info` (`id_number`, `student_info`, `father_name`, `father_address`, `father_contact_no`, `father_occupation`, `mother_name`, `mother_address`, `mother_contact_no`, `mother_occupation`, `guardian_name`, `guardian_address`, `guardian_contact_no`, `guardian_occupation`, `guardian_relation`) VALUES
(1, 1, 'Audie Flores', 'Tanqui', '0917', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section_info`
--

CREATE TABLE `section_info` (
  `section_id` int(11) NOT NULL,
  `section_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id_number` int(11) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `home_address` varchar(50) DEFAULT NULL,
  `bh_address` varchar(50) DEFAULT NULL,
  `bh_contact_no` varchar(20) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `year_level` int(11) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `birth_place` varchar(50) DEFAULT NULL,
  `civil_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id_number`, `lastname`, `firstname`, `middlename`, `contact_no`, `birthday`, `nationality`, `home_address`, `bh_address`, `bh_contact_no`, `course`, `year_level`, `section`, `sex`, `birth_place`, `civil_status`) VALUES
(1, 'Flores', 'Sylvester', 'Bulilan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_info`
--

CREATE TABLE `subject_info` (
  `id_number` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `descriptive_title` varchar(50) NOT NULL,
  `year_level` varchar(50) NOT NULL,
  `lecture` int(10) NOT NULL,
  `laboratory` int(10) NOT NULL,
  `units` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_info`
--

INSERT INTO `subject_info` (`id_number`, `subject_name`, `descriptive_title`, `year_level`, `lecture`, `laboratory`, `units`) VALUES
(1, 'Math', 'Mathematics', '1', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `yearlvl_info`
--

CREATE TABLE `yearlvl_info` (
  `year_level_id` int(11) NOT NULL,
  `year_level_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_info`
--
ALTER TABLE `academic_info`
  ADD PRIMARY KEY (`id_number`) USING BTREE,
  ADD KEY `student_info` (`student_info`);

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `civilstatus_info`
--
ALTER TABLE `civilstatus_info`
  ADD PRIMARY KEY (`civil_status_id`);

--
-- Indexes for table `course_info`
--
ALTER TABLE `course_info`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `parental_info`
--
ALTER TABLE `parental_info`
  ADD PRIMARY KEY (`id_number`) USING BTREE,
  ADD KEY `student_info` (`student_info`);

--
-- Indexes for table `section_info`
--
ALTER TABLE `section_info`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id_number`),
  ADD KEY `course` (`course`),
  ADD KEY `year_level` (`year_level`),
  ADD KEY `section` (`section`),
  ADD KEY `civil_status` (`civil_status`);

--
-- Indexes for table `subject_info`
--
ALTER TABLE `subject_info`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `yearlvl_info`
--
ALTER TABLE `yearlvl_info`
  ADD PRIMARY KEY (`year_level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_info`
--
ALTER TABLE `academic_info`
  MODIFY `id_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `civilstatus_info`
--
ALTER TABLE `civilstatus_info`
  MODIFY `civil_status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course_info`
--
ALTER TABLE `course_info`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parental_info`
--
ALTER TABLE `parental_info`
  MODIFY `id_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `section_info`
--
ALTER TABLE `section_info`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subject_info`
--
ALTER TABLE `subject_info`
  MODIFY `id_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `yearlvl_info`
--
ALTER TABLE `yearlvl_info`
  MODIFY `year_level_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_info`
--
ALTER TABLE `academic_info`
  ADD CONSTRAINT `academic_info_ibfk_1` FOREIGN KEY (`student_info`) REFERENCES `student_info` (`id_number`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `parental_info`
--
ALTER TABLE `parental_info`
  ADD CONSTRAINT `parental_info_ibfk_1` FOREIGN KEY (`student_info`) REFERENCES `student_info` (`id_number`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
