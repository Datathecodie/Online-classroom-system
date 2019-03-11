-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2018 at 07:24 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otg1`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_type` varchar(255) NOT NULL,
  `faculty_id` int(10) NOT NULL,
  `duration` int(10) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `retest` int(11) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`c_id`, `c_name`, `c_type`, `faculty_id`, `duration`, `deleted`, `retest`) VALUES
(6, 'first', 'first course for people', 13, 3, 0, -1),
(7, 'testing', 'Its a course', 13, 2, 0, -1);

-- --------------------------------------------------------

--
-- Table structure for table `enrollcourse`
--

CREATE TABLE `enrollcourse` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollcourse`
--

INSERT INTO `enrollcourse` (`id`, `sid`, `cid`, `date`) VALUES
(15, 11, 7, '2018-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_login`
--

CREATE TABLE `faculty_login` (
  `login_id` int(8) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `institution` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty_login`
--

INSERT INTO `faculty_login` (`login_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `institution`, `date_created`, `deleted`) VALUES
(12, 'Data', 'ekavade', 'data@data.com', 'data', 'm', 'GEC', '2018-03-25 06:46:27', 0),
(13, 'troll', 'one', 'troll@a.com', 'troll', 'f', 'RIET', '2018-03-25 07:24:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `s_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `c_id`, `s_id`, `file_name`, `file_path`, `description`, `deleted`) VALUES
(9, 6, 1, 'SolarPC.docx', '../uploads/SolarPC.docx', 'yaaho', 0),
(10, 6, 3, 'Website Price.pdf', '../uploads/Website Price.pdf', 'site', 0),
(11, 7, 1, 'applications.html', '../uploads/applications.html', 'full sentence it is', 0),
(12, 7, 1, 'officesystem.sql', '../uploads/officesystem.sql', 'page 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mcq`
--

CREATE TABLE `mcq` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `question` varchar(80) NOT NULL,
  `opt1` varchar(80) NOT NULL,
  `opt2` varchar(80) NOT NULL,
  `opt3` varchar(80) NOT NULL,
  `opt4` varchar(80) NOT NULL,
  `correct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq`
--

INSERT INTO `mcq` (`id`, `c_id`, `s_id`, `f_id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `correct`) VALUES
(3, 7, 1, 12, 'what is 2 + 2?', '2', '3', '22', '4', 4),
(4, 7, 1, 12, '3+5', '2', '3', '8', '4', 3),
(5, 7, 1, 12, 'Circle has How many Edges', '1', 'infinite', '3', '88', 2),
(6, 7, 1, 11, 'triangle has how many sides?', '3', '2', '1', '0', 1),
(7, 7, 1, 11, 'what is spherical?', 'bat', 'net', 'rat', 'ball', 4);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `stid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `correct` int(11) NOT NULL DEFAULT '0',
  `done` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `stid`, `cid`, `sid`, `fid`, `total`, `correct`, `done`) VALUES
(29, 11, 7, 1, 11, 2, 2, 1),
(30, 11, 7, 1, 12, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `stid` int(11) NOT NULL,
  `date` date NOT NULL,
  `done` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `cid`, `sid`, `stid`, `date`, `done`) VALUES
(1, 7, 1, 11, '2018-06-18', 1),
(2, 7, 2, 11, '2018-06-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `is_set` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `c_id`, `s_id`, `f_id`, `is_set`) VALUES
(7, 6, 1, 13, 1),
(8, 6, 2, 13, 0),
(9, 6, 3, 13, 1),
(10, 7, 1, 13, 1),
(11, 7, 2, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `login_id` int(8) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`login_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `deleted`, `date_created`) VALUES
(11, 'name', 'name', 'name@name.com', 'naav', 'm', 0, '2018-03-25 05:32:37'),
(12, 'troll', 'one', 'troll@a.com', 'troll', 'f', 1, '2018-03-25 07:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `opt1` varchar(80) NOT NULL,
  `opt2` varchar(80) NOT NULL,
  `opt3` varchar(80) NOT NULL,
  `opt4` varchar(80) NOT NULL,
  `correct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `enrollcourse`
--
ALTER TABLE `enrollcourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_login`
--
ALTER TABLE `faculty_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq`
--
ALTER TABLE `mcq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enrollcourse`
--
ALTER TABLE `enrollcourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faculty_login`
--
ALTER TABLE `faculty_login`
  MODIFY `login_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mcq`
--
ALTER TABLE `mcq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `login_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
