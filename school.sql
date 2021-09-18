-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2021 at 05:10 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `scores_panel`
--

CREATE TABLE `scores_panel` (
  `1stCA` int(11) DEFAULT NULL,
  `2ndCA` int(11) DEFAULT NULL,
  `exam` int(11) DEFAULT NULL,
  `students_ID` int(11) DEFAULT NULL,
  `subjectID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scores_panel`
--

INSERT INTO `scores_panel` (`1stCA`, `2ndCA`, `exam`, `students_ID`, `subjectID`) VALUES
(23, 15, 42, 1, 1),
(10, 12, 7, 1, 2),
(43, 15, 62, 1, 3),
(10, 12, 27, 2, 1),
(10, 12, 57, 2, 2),
(23, 15, 12, 2, 3),
(11, 12, 27, 3, 1),
(4, 12, 57, 3, 2),
(13, 25, 12, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `students_info`
--

CREATE TABLE `students_info` (
  `name` varchar(7) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `students_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_info`
--

INSERT INTO `students_info` (`name`, `sex`, `age`, `students_ID`) VALUES
('Kinsley', 'M', 12, 1),
('Michael', 'm', 12, 2),
('Rhianna', 'f', 22, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectname` varchar(11) DEFAULT NULL,
  `subjectID` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectname`, `subjectID`) VALUES
('-----------', '---------'),
('english', '1'),
('maths', '2'),
('biology', '3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
