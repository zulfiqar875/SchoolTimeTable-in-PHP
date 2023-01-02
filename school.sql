-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 08:28 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `building` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `multimedia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `building`, `room`, `capacity`, `multimedia`) VALUES
(1, 'A-Block', '101', '50', 'yes'),
(2, 'B-Block', '210', '40', 'yes'),
(3, 'C-Block', '301', '30', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `enrollment` varchar(255) NOT NULL,
  `multimedia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_code`, `course`, `enrollment`, `multimedia`) VALUES
(2, 'CS002', 'Mathematics', '40', 'yes'),
(3, 'CS003', 'Computer-Science', '16', 'yes'),
(5, 'CS005', 'Data Structure', '20', 'yes'),
(6, 'CS006', 'Object Oriented Programming', '20', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `courseoffer`
--

CREATE TABLE `courseoffer` (
  `cfid` int(11) NOT NULL,
  `facultyid` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseoffer`
--

INSERT INTO `courseoffer` (`cfid`, `facultyid`, `coursename`, `Status`) VALUES
(1, 'Dr. Ehsan Ullah Munir', 'Computer-Science', 1),
(2, 'Maaz', 'Computer-Science', 0),
(4, 'Muhammad Ibrahim', 'Object Oriented Programming', 0),
(5, 'Prof. Dr. Nadeem Sharjeel', 'Data Structure', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courserigration`
--

CREATE TABLE `courserigration` (
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courserigration`
--

INSERT INTO `courserigration` (`rid`, `uid`, `fid`, `cid`, `tname`, `sname`, `cname`) VALUES
(9, 6, 3, 3, ' Dr. Ehsan Ullah Munir', 'Abdullah', 'Computer-Science');

-- --------------------------------------------------------

--
-- Table structure for table `course_pref`
--

CREATE TABLE `course_pref` (
  `id` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_pref`
--

INSERT INTO `course_pref` (`id`, `facultyid`, `course`, `time`, `day`) VALUES
(1, 1, 'CS001', '2022-08-30T00:45', 'Monday'),
(2, 1, 'CS002', '2022-08-30T00:45', 'Tuesday');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Ranked` varchar(255) NOT NULL DEFAULT '0',
  `Designation` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `Name`, `Department`, `Ranked`, `Designation`, `Email`, `Password`) VALUES
(1, 'Prof. Dr. Nadeem Sharjeel', 'Computer Science', '2', 'Assoicate Professor', 'nadeem@gmail.com', 'nadeem11'),
(2, 'Maaz', 'Computer Science Department', '3', 'Assistant Professor', 'maazrehan@gmail.com', 'maazrehan'),
(3, 'Dr. Ehsan Ullah Munir', 'Computer Science Department', '4', 'Professor', 'ehsanmunir@gmail.com', 'ehsanmunir'),
(5, 'Muhammad Ibrahim', 'Computer Science', '1', 'Lecturer', 'Ibrahim@gmail.com', 'ibrahim'),
(6, 'Abdullah', 'Computer Science Department', '0', 'Student', 'abdullah@kadmani.com', 'abdullah');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Sid` int(11) NOT NULL,
  `Uid` int(11) NOT NULL,
  `Course` varchar(255) NOT NULL,
  `Day` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Room` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`Sid`, `Uid`, `Course`, `Day`, `Time`, `Room`) VALUES
(18, 1, '5', 'Monday', '5', '301'),
(19, 1, '5', 'Thursday', '20', '210'),
(23, 3, '3', 'Tuesday', '9', '210'),
(24, 3, '3', 'Friday', '23', '101');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `Tid` int(11) NOT NULL,
  `Uid` int(11) NOT NULL DEFAULT 0,
  `Slot` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT '0',
  `Dayname` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`Tid`, `Uid`, `Slot`, `Status`, `Dayname`, `course`, `room`) VALUES
(1, 0, '08:30AM - 09:30AM', '0', 'Monday', '', ''),
(2, 0, '09:30AM - 11:00AM', '0', 'Monday', '', ''),
(3, 0, '11:00AM - 12:30PM', '0', 'Monday', '', ''),
(4, 0, '01:30PM – 03:00PM', '0', 'Monday', '', ''),
(5, 1, '03:00PM – 04:30PM', '1', 'Monday', '2', '301'),
(6, 0, '08:00AM – 09:30AM', '0', 'Tuesday', '', ''),
(7, 0, '09:30AM - 11:00AM', '0', 'Tuesday', '', ''),
(8, 0, '11:00AM – 12:30PM', '0', 'Tuesday', '', ''),
(9, 3, '01:30PM – 03:00PM', '1', 'Tuesday', '3', '210'),
(10, 0, '03:00PM – 04:30PM', '0', 'Tuesday', '', ''),
(11, 0, '08:00AM – 09:30AM', '0', 'Wednesday', '', ''),
(12, 0, '09:30AM - 11:00AM', '0', 'Wednesday', '', ''),
(13, 0, '11:00AM – 12:30PM', '0', 'Wednesday', '', ''),
(14, 0, '01:30PM – 03:00PM', '0', 'Wednesday', '', ''),
(15, 0, '03:00PM – 04:30PM', '0', 'Wednesday', '', ''),
(16, 0, '08:00AM – 09:30AM', '0', 'Thursday', '', ''),
(17, 0, '09:30AM - 11:00AM', '0', 'Thursday', '', ''),
(18, 0, '11:00AM – 12:30PM', '0', 'Thursday', '', ''),
(19, 0, '01:30PM – 03:00PM', '0', 'Thursday', '', ''),
(20, 1, '03:00PM – 04:30PM', '1', 'Thursday', '2', '210'),
(21, 0, '08:00AM – 09:30AM', '0', 'Friday', '', ''),
(22, 0, '09:30AM - 11:00AM', '0', 'Friday', '', ''),
(23, 3, '11:00AM – 12:30PM', '1', 'Friday', '3', '101'),
(24, 0, '01:30PM – 03:00PM', '0', 'Friday', '', ''),
(25, 0, '03:00PM – 04:30PM', '0', 'Friday', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseoffer`
--
ALTER TABLE `courseoffer`
  ADD PRIMARY KEY (`cfid`);

--
-- Indexes for table `courserigration`
--
ALTER TABLE `courserigration`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `course_pref`
--
ALTER TABLE `course_pref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`Sid`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`Tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courseoffer`
--
ALTER TABLE `courseoffer`
  MODIFY `cfid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courserigration`
--
ALTER TABLE `courserigration`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_pref`
--
ALTER TABLE `course_pref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `Sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `Tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
