-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2020 at 08:19 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_admin_no` varchar(15) NOT NULL,
  `s_name` text NOT NULL,
  `s_dob` date NOT NULL,
  `s_fname` text NOT NULL,
  `s_mname` text NOT NULL,
  `s_contact` text NOT NULL,
  `s_email` text NOT NULL,
  `s_class` text NOT NULL,
  `s_section` text NOT NULL,
  `s_roll` int(11) DEFAULT NULL,
  `s_address` text NOT NULL,
  `s_password` text NOT NULL,
  `s_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_admin_no`, `s_name`, `s_dob`, `s_fname`, `s_mname`, `s_contact`, `s_email`, `s_class`, `s_section`, `s_roll`, `s_address`, `s_password`, `s_image`) VALUES
('12342020101', 'Abhishek Sharma', '2020-04-02', 'Rakesh Sharma', 'Anjali Sharma', '8076187250', 'priyankanegi0310@gmail.com', '6', 'C', 1, 'Sundar Block', '1235000213', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_enrol_no` varchar(15) NOT NULL,
  `t_name` text NOT NULL,
  `t_dob` date NOT NULL,
  `t_contact` text NOT NULL,
  `t_email` text NOT NULL,
  `t_qualification` text NOT NULL,
  `t_address` text NOT NULL,
  `t_status` text NOT NULL,
  `t_password` text NOT NULL,
  `t_class` text DEFAULT NULL,
  `t_section` text DEFAULT NULL,
  `t_image` varchar(6) NOT NULL,
  `t_active` text NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_enrol_no`, `t_name`, `t_dob`, `t_contact`, `t_email`, `t_qualification`, `t_address`, `t_status`, `t_password`, `t_class`, `t_section`, `t_image`, `t_active`) VALUES
('1234202001', 'Abhishek Sharma', '2020-04-23', '9711495489', 'priyankanegi0310@gmail.com', 'MSc', 'Laxmi Nagar', 'CT', '1896531804', '6', 'C', 'true', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `status`) VALUES
('1234202001', '1896531804', 'teacher'),
('12342020101', '1235000213', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_admin_no`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_enrol_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
