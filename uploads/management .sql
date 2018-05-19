-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2018 at 10:34 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `admin_id` varchar(20) NOT NULL,
  `admin_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `name`, `admin_id`, `admin_pass`) VALUES
(1, 'adminFara', 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `assingnment_status`
--

CREATE TABLE `assingnment_status` (
  `assing_status_id` char(4) NOT NULL,
  `assing_status_atatus` char(1) NOT NULL,
  `assing_status_score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assingnment_title`
--

CREATE TABLE `assingnment_title` (
  `assing_title_id` char(3) NOT NULL,
  `assing_title_name` varchar(50) NOT NULL,
  `assing_title_score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attend class`
--

CREATE TABLE `attend class` (
  `attend_id` char(4) NOT NULL,
  `attend_status` char(1) NOT NULL,
  `number of atten` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `checkname`
--

CREATE TABLE `checkname` (
  `cn_id` int(11) NOT NULL,
  `cn_date` date NOT NULL,
  `regis_section` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `checkname`
--

INSERT INTO `checkname` (`cn_id`, `cn_date`, `regis_section`) VALUES
(1, '2018-03-08', 'N0001'),
(2, '2018-03-15', 'S0001'),
(3, '2018-03-22', 'S0001'),
(4, '2018-03-29', 'S0001'),
(5, '2018-04-05', 'S0001'),
(6, '2018-03-01', 'S0006'),
(7, '2018-03-02', 'S0006'),
(8, '2018-03-03', 'S0006'),
(9, '2018-03-04', 'S0006'),
(10, '2018-03-05', 'S0006'),
(11, '2018-03-06', 'S0006'),
(12, '2018-03-07', 'S0006'),
(13, '2018-03-24', 'S0001'),
(14, '2018-03-22', 'S0002'),
(15, '2018-03-23', 'S0002'),
(16, '2018-03-27', 'S0002'),
(17, '2018-03-21', 'S0002'),
(18, '2018-03-13', 'S0002'),
(19, '2018-04-12', ''),
(20, '2018-04-19', ''),
(21, '2018-04-12', ''),
(22, '2018-04-19', ''),
(23, '2018-04-19', 'N0021'),
(24, '2018-04-18', ''),
(25, '2018-04-10', '');

-- --------------------------------------------------------

--
-- Table structure for table `checkname_score`
--

CREATE TABLE `checkname_score` (
  `cns_id` int(11) NOT NULL,
  `cn_id` int(11) NOT NULL,
  `std_id` varchar(20) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `checkname_score`
--

INSERT INTO `checkname_score` (`cns_id`, `cn_id`, `std_id`, `score`) VALUES
(32, 1, '1', 1),
(33, 1, '2', 1),
(34, 1, '4', 1),
(35, 1, '5603222', 1),
(36, 6, '1', 1),
(37, 6, '2', 3),
(38, 2, '1', 1),
(39, 2, '2', 2),
(40, 2, '4', 1),
(41, 2, '5603222', 1),
(42, 4, '1', 1),
(43, 4, '2', 1),
(44, 4, '4', 2),
(45, 4, '5603222', 1),
(46, 3, '1', 1),
(47, 3, '2', 1),
(48, 3, '4', 1),
(49, 3, '5603222', 4),
(50, 14, '1', 1),
(51, 15, '1', 2),
(52, 15, '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_schudle`
--

CREATE TABLE `class_schudle` (
  `table_id` char(4) NOT NULL,
  `table_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `cri_id` char(3) NOT NULL,
  `cri_name` varchar(50) NOT NULL,
  `cri_score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `exa_id` int(11) NOT NULL,
  `exa_name` varchar(20) NOT NULL,
  `exa_score` int(11) NOT NULL,
  `regis_section` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examination`
--

INSERT INTO `examination` (`exa_id`, `exa_name`, `exa_score`, `regis_section`) VALUES
(6, 'กลางภาค', 20, 'S0001'),
(7, 'Mid', 20, 'S0006'),
(8, 'Final', 30, 'S0006'),
(9, 'สอบก่อนเรียน', 5, 'S0002'),
(10, 'efwrf2', 0, 'S0002'),
(11, 'ASSASDSD', 0, ''),
(12, 'ความหมาย', 0, 'N0021');

-- --------------------------------------------------------

--
-- Table structure for table `examination_list`
--

CREATE TABLE `examination_list` (
  `ex_list_id` int(11) NOT NULL,
  `exa_id` int(11) NOT NULL,
  `std_id` varchar(20) NOT NULL,
  `ex_list_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examination_list`
--

INSERT INTO `examination_list` (`ex_list_id`, `exa_id`, `std_id`, `ex_list_score`) VALUES
(1, 7, '1', 1),
(2, 7, '2', 10),
(3, 6, '1', 21),
(4, 6, '2', 21),
(5, 6, '4', 32),
(6, 6, '5603222', 32),
(11, 8, '1', 2),
(12, 8, '2', 10),
(13, 9, '1', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `regis_id` int(5) NOT NULL,
  `regis_section` varchar(10) NOT NULL,
  `std_id` int(11) NOT NULL,
  `regis_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`regis_id`, `regis_section`, `std_id`, `regis_date`) VALUES
(1, 'N0002', 1, '2018-02-01 00:00:00'),
(4, 'N0001', 1, '2018-03-03 17:59:36'),
(5, 'N0001', 2, '2018-03-03 17:59:36'),
(9, 'N0001', 4, '2018-03-03 18:18:59'),
(18, 'N0006', 5603220, '2018-03-04 17:08:36'),
(19, 'N0006', 5603221, '2018-03-04 17:08:36'),
(20, 'N0006', 1, '2018-03-04 18:22:05'),
(21, 'N0006', 2, '2018-03-04 18:22:05'),
(22, 'N0001', 5603220, '2018-03-10 11:37:06'),
(23, 'N0001', 5603221, '2018-03-10 11:37:06'),
(24, 'N0001', 5603222, '2018-03-10 11:37:24'),
(25, 'N0002', 2, '2018-03-13 13:49:22'),
(26, 'N0009', 1, '2018-04-02 20:38:08'),
(27, 'N0009', 2, '2018-04-02 20:38:08'),
(28, 'N0021', 1, '2018-04-09 23:08:58'),
(29, 'N0021', 2, '2018-04-09 23:08:58'),
(30, 'N0021', 4, '2018-04-09 23:08:58'),
(31, 'N0021', 4, '2018-04-11 00:55:37'),
(32, 'N0021', 5603222, '2018-04-11 00:55:37'),
(33, 'N0021', 1, '2018-04-11 02:59:53'),
(34, 'N0021', 2, '2018-04-11 02:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `registration_list`
--

CREATE TABLE `registration_list` (
  `re_list_id` char(5) NOT NULL,
  `re_list_score` float NOT NULL,
  `re_list_grade` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` char(3) NOT NULL,
  `score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(5) NOT NULL,
  `std_number` varchar(13) NOT NULL,
  `std_group` varchar(10) NOT NULL,
  `std_name` varchar(50) NOT NULL,
  `std_lname` varchar(50) NOT NULL,
  `std_phone` varchar(10) NOT NULL,
  `std_line` varchar(50) NOT NULL,
  `std_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_number`, `std_group`, `std_name`, `std_lname`, `std_phone`, `std_line`, `std_pass`) VALUES
(1, '5704063001229', '57043.042', 'Rangsima', 'Chesamor', '09090909', 'fararara', '1234'),
(2, '5704063001225', '57043.042', 'พรพิไล', 'จิตรัตน์', '0846899015', 'whannnnn', '1234'),
(4, '5704063001107', '57050.054', 'ร่ๅ', 'ราร่า', '213567', 'raaaa', '5704063001233'),
(6, '5.60406E+12', '56050.042', 'sdsd', 'asd', '1', 'q', '5.60406E+12'),
(5603222, '5.60406E+12', '56050.042', 'sdsd', 'asd', '1', 'q', '5.60406E+12'),
(5603223, '5.60406E+12', '56050.042', 'sdsd', 'asd', '1', 'q', '5.60406E+12');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` varchar(7) NOT NULL,
  `subject_no` varchar(7) NOT NULL,
  `sub_name` varchar(20) NOT NULL,
  `sub_year` int(5) NOT NULL,
  `sub_sem` int(5) NOT NULL,
  `tech_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `subject_no`, `sub_name`, `sub_year`, `sub_sem`, `tech_id`) VALUES
('N0001', '5600', 'C++', 2562, 1, 1),
('N0002', '44504', 'เขียนโปรแกรม', 2562, 1, 2),
('N0003', 'GED1001', 'วิถีโลก', 2561, 1, 2),
('N0004', '1003', 'วิถีโลก', 2561, 2, 2),
('N0005', '1003', 'วิถีโลก', 2561, 1, 2),
('N0006', 'GED1003', 'คอมพิวเตอร์ชีวิต', 2561, 2, 1),
('N0007', '1001', 'ภาษาไทย', 2561, 1, 2),
('N0019', 'SCS1004', 'ภาษา sql', 2560, 1, 2),
('N0020', 'SCS1006', 'ภาษา Java', 2561, 2, 2),
('N0021', '1005', 'เขียนโปรแกรมVisual B', 2560, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subjected`
--

CREATE TABLE `subjected` (
  `su_id` int(11) NOT NULL,
  `su_no` varchar(20) NOT NULL,
  `su_name` varchar(50) NOT NULL,
  `su_year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjected`
--

INSERT INTO `subjected` (`su_id`, `su_no`, `su_name`, `su_year`) VALUES
(1, '1004', 'เขียนโปรแกรมVisual Basic', '2560'),
(2, '1005', 'ภาษา sql', '2561'),
(3, '1006', 'ภาษา Java', '2562');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `col_id` int(3) NOT NULL,
  `col_code` varchar(10) NOT NULL,
  `col_a` varchar(10) NOT NULL,
  `col_fornt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`col_id`, `col_code`, `col_a`, `col_fornt`) VALUES
(1, '#00ffff', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tech_id` int(11) NOT NULL,
  `no` varchar(10) NOT NULL,
  `tech_name` varchar(50) NOT NULL,
  `tech_lname` varchar(50) NOT NULL,
  `tech_phone` varchar(10) NOT NULL,
  `tech_user` varchar(10) NOT NULL,
  `tech_pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tech_id`, `no`, `tech_name`, `tech_lname`, `tech_phone`, `tech_user`, `tech_pass`) VALUES
(1, 'อาจารย์', 'จุฑามาส', 'กระจ่างศรี', '090123123', 'krutik', '1234'),
(2, 'อาจารย์', 'ณาตยาณี', 'พรมเมือง', '09323', 'nattayanee', '1234'),
(3, 'อาจารย์', 'สมคิด', 'ศิลป์วิทยารักษ์', '091029301', 'somkid', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `work_id` int(11) NOT NULL,
  `regis_section` varchar(10) NOT NULL,
  `work_name` varchar(30) NOT NULL,
  `work_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`work_id`, `regis_section`, `work_name`, `work_score`) VALUES
(1, 'S0001', 'ข้อมูลเบื้องต้นของภาษาC++', 10),
(2, 'S0001', 'ความหมายของภาษาC++', 20),
(3, 'S0001', 'คำสั่งภาษาC++', 20),
(4, 'S0006', 'ความหมาย', 10),
(5, 'S0002', 'ความหมาย', 5),
(6, 'S0002', 'หน่กหน', 5),
(7, 'S0002', 'c[dpv[5', 5),
(8, 'S0001', 'ควา', 0),
(9, 'N0002', 'feF', 4),
(10, 'N0021', 'ความหมาย', 0),
(11, '', 'DSASD', 0),
(12, '', 'DSASD', 0),
(13, 'N0021', 'กลางภาค', 0),
(14, '', 'ปลายภาค', 0),
(15, '', 'ความหมาย', 0),
(16, '', 'ASasas', 0),
(17, '', 'ASasAS', 0),
(18, '', 'ปลายภาค', 0),
(19, '', 'AasAasaadsa', 0),
(20, '', 'sSsASCCRT', 0),
(21, '', 'ZXAaxwdw', 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_score`
--

CREATE TABLE `work_score` (
  `ws_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  `std_id` varchar(20) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_score`
--

INSERT INTO `work_score` (`ws_id`, `work_id`, `std_id`, `score`) VALUES
(48, 3, '1', 3),
(49, 3, '2', 3),
(50, 2, '1', 9),
(51, 2, '2', 2),
(52, 2, '4', 2),
(53, 2, '5603222', 10),
(54, 5, '1', 2147483647),
(55, 5, '1', 2147483647),
(56, 5, '2', 2147483647),
(57, 5, '1', 2147483647),
(58, 5, '2', 2147483647),
(59, 5, '1', 2147483647),
(60, 5, '2', 2147483647),
(61, 5, '1', 2147483647),
(62, 5, '1', 2147483647),
(63, 5, '2', 2147483647),
(64, 9, '1', 4),
(65, 9, '2', 4),
(66, 10, '1', 9),
(67, 10, '2', 3),
(68, 10, '4', 3),
(69, 10, '4', 2),
(70, 10, '5603222', 3);

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
  ADD PRIMARY KEY (`regis_id`);

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
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`);

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
  MODIFY `cn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `checkname_score`
--
ALTER TABLE `checkname_score`
  MODIFY `cns_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `exa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `examination_list`
--
ALTER TABLE `examination_list`
  MODIFY `ex_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `regis_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5603224;
--
-- AUTO_INCREMENT for table `subjected`
--
ALTER TABLE `subjected`
  MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `col_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `work_score`
--
ALTER TABLE `work_score`
  MODIFY `ws_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
