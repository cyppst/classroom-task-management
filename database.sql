-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2018 at 02:50 AM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.2.4-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farah_teach`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin_pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `no`, `name`, `admin_phone`, `admin_id`, `admin_pass`) VALUES
(1, 'ผู้ดูแลระบบ', 'สมคิด  ศิลป์วิทยารักษ์', '0909090821', 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `assingnment_status`
--

CREATE TABLE `assingnment_status` (
  `assing_status_id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `assing_status_atatus` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `assing_status_score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assingnment_title`
--

CREATE TABLE `assingnment_title` (
  `assing_title_id` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `assing_title_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `assing_title_score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attend class`
--

CREATE TABLE `attend class` (
  `attend_id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `attend_status` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `number of atten` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkname`
--

CREATE TABLE `checkname` (
  `cn_id` int(11) NOT NULL,
  `cn_date` date NOT NULL,
  `regis_section` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkname_score`
--

CREATE TABLE `checkname_score` (
  `cns_id` int(11) NOT NULL,
  `cn_id` int(11) NOT NULL,
  `std_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `regis_section` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkscore`
--

CREATE TABLE `checkscore` (
  `cs_id` int(11) NOT NULL,
  `regis_section` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_schudle`
--

CREATE TABLE `class_schudle` (
  `table_id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `table_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `cri_id` int(4) NOT NULL,
  `std_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cn_score` float NOT NULL,
  `regis_section` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `exa_id` int(11) NOT NULL,
  `exa_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `exa_score` int(11) NOT NULL,
  `regis_section` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examination_list`
--

CREATE TABLE `examination_list` (
  `ex_list_id` int(11) NOT NULL,
  `exa_id` int(11) NOT NULL,
  `std_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ex_list_score` float NOT NULL,
  `regis_section` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `regis_id` int(5) NOT NULL,
  `regis_section` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `std_id` int(11) NOT NULL,
  `regis_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration_list`
--

CREATE TABLE `registration_list` (
  `re_list_id` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `re_list_score` float NOT NULL,
  `re_list_grade` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(3) NOT NULL,
  `semester_name` int(1) NOT NULL,
  `semester_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(5) NOT NULL,
  `std_number` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `std_group` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `std_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `std_lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `std_phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_line` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `subject_no` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `sub_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `sub_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `sub_sem` int(5) NOT NULL,
  `tech_id` int(5) NOT NULL,
  `section` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjected`
--

CREATE TABLE `subjected` (
  `su_id` int(11) NOT NULL,
  `su_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `su_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `col_id` int(3) NOT NULL,
  `col_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `col_a` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `col_fornt` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tech_id` int(11) NOT NULL,
  `no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tech_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tech_lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tech_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tech_user` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tech_pass` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `work_id` int(11) NOT NULL,
  `regis_section` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `work_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `work_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_score`
--

CREATE TABLE `work_score` (
  `ws_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL COMMENT 'id งาน',
  `std_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสนักศึกษา',
  `score` float DEFAULT NULL COMMENT 'คะแนน',
  `regis_section` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'section',
  `cn` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `assingnment_status`
--
ALTER TABLE `assingnment_status`
  ADD PRIMARY KEY (`assing_status_id`);

--
-- Indexes for table `assingnment_title`
--
ALTER TABLE `assingnment_title`
  ADD PRIMARY KEY (`assing_title_id`);

--
-- Indexes for table `attend class`
--
ALTER TABLE `attend class`
  ADD PRIMARY KEY (`attend_id`);

--
-- Indexes for table `checkname`
--
ALTER TABLE `checkname`
  ADD PRIMARY KEY (`cn_id`);

--
-- Indexes for table `checkname_score`
--
ALTER TABLE `checkname_score`
  ADD PRIMARY KEY (`cns_id`);

--
-- Indexes for table `checkscore`
--
ALTER TABLE `checkscore`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `class_schudle`
--
ALTER TABLE `class_schudle`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`cri_id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`exa_id`);

--
-- Indexes for table `examination_list`
--
ALTER TABLE `examination_list`
  ADD PRIMARY KEY (`ex_list_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`regis_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `registration_list`
--
ALTER TABLE `registration_list`
  ADD PRIMARY KEY (`re_list_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `subjected`
--
ALTER TABLE `subjected`
  ADD PRIMARY KEY (`su_id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`col_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tech_id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `work_score`
--
ALTER TABLE `work_score`
  ADD PRIMARY KEY (`ws_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `checkname`
--
ALTER TABLE `checkname`
  MODIFY `cn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `checkname_score`
--
ALTER TABLE `checkname_score`
  MODIFY `cns_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT for table `checkscore`
--
ALTER TABLE `checkscore`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `cri_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `exa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `examination_list`
--
ALTER TABLE `examination_list`
  MODIFY `ex_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `regis_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=418;
--
-- AUTO_INCREMENT for table `subjected`
--
ALTER TABLE `subjected`
  MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `col_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `work_score`
--
ALTER TABLE `work_score`
  MODIFY `ws_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=632;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
