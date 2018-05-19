-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 12:41 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_work`
--

-- --------------------------------------------------------

--
-- Table structure for table `frm_banner`
--

CREATE TABLE `frm_banner` (
  `f1` int(10) NOT NULL,
  `f2` text NOT NULL,
  `f3` text NOT NULL,
  `f4` varchar(250) NOT NULL,
  `f5` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frm_banner`
--

INSERT INTO `frm_banner` (`f1`, `f2`, `f3`, `f4`, `f5`) VALUES
(8, 'http://localhost/web_one2ball/index.php', 'frm_php/frm_code/banner1/banner-fifa69-2.gif', '09-04-2018', '568x190'),
(9, 'http://localhost/web_one2ball/index.php', 'frm_php/frm_code/banner1/728x180.gif', '09-04-2018', '770x175'),
(10, 'http://localhost/web_one2ball/index.php', 'frm_php/frm_code/banner1/758.gif', '09-04-2018', '271x360'),
(11, 'http://localhost/web_one2ball/index.php', 'frm_php/frm_code/banner1/allgoal88-272x234.gif', '09-04-2018', '271x190'),
(12, 'http://localhost/web_one2ball/index.php', 'frm_php/frm_code/banner1/ezgif.com-optimize.gif', '09-04-2018', '271x360'),
(13, 'http://localhost/web_one2ball/index.php', 'frm_php/frm_code/banner1/one2ball15000.gif', '09-04-2018', '568x160');

-- --------------------------------------------------------

--
-- Table structure for table `frm_hilight`
--

CREATE TABLE `frm_hilight` (
  `f1` int(10) NOT NULL,
  `f2` text NOT NULL,
  `f3` text NOT NULL,
  `f4` varchar(250) NOT NULL,
  `f5` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frm_hilight`
--

INSERT INTO `frm_hilight` (`f1`, `f2`, `f3`, `f4`, `f5`) VALUES
(2, '<p><span style=\"color: rgb(28, 122, 144);\">คลิปไฮไลท์ยูฟ่า แชมเปี้ยนส์ลีก มาริบอร์ 0-7 </span><span style=\"color: rgb(216, 55, 98);\">ลิเวอร์พูล </span><span style=\"color: rgb(28, 122, 144);\">Maribor 0-7 Liverpool</span></p>', 'https://www.youtube.com/watch?v=eJdZ-UdF6Xg', '09-04-2018', '-'),
(3, '<p>คลิปไฮไลท์ยูฟ่า แชมเปี้ยนส์ลีก มาริบอร์ 0-7 ลิเวอร์พูล Maribor 0-7 Liverpool</p>', 'https://www.youtube.com/watch?v=eJdZ-UdF6Xg', '09-04-2018', '-'),
(4, '<p><span style=\"color: rgb(216, 55, 98);\">คลิปไฮไลท์ยูฟ่า</span> แชมเปี้ยนส์ลีก มาริบอร์ 0-7 ลิเวอร์พูล <strong>Maribor </strong>0-7 Liverpool</p>', 'https://www.youtube.com/watch?v=eJdZ-UdF6Xg', '09-04-2018', '-');

-- --------------------------------------------------------

--
-- Table structure for table `frm_m1`
--

CREATE TABLE `frm_m1` (
  `idf1` int(5) NOT NULL,
  `display` varchar(250) NOT NULL,
  `name_frm` varchar(250) NOT NULL,
  `lv` int(5) NOT NULL,
  `idmcon` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frm_m1`
--

INSERT INTO `frm_m1` (`idf1`, `display`, `name_frm`, `lv`, `idmcon`) VALUES
(1, 'ทีเด็ดวันนี้', 'frm_tded_today', 1, 5),
(2, 'แบนเนอร์', 'frm_banner', 2, 5),
(3, 'คลิปไฮ้ไลท์', 'frm_hilight', 3, 5),
(4, 'ทีเด็ดบอลเต็งวันนี้', 'frm_tded_teng', 4, 5),
(5, 'วิเคราะห์เจาะเกมส์ By One2Ball', 'frm_analyzeball', 5, 5),
(6, 'ข่าวฟุตบอล', 'frm_newsball', 6, 5),
(7, 'วิเคราะห์บอลวันนี้', 'frm_analyzeball_today', 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `frm_m2`
--

CREATE TABLE `frm_m2` (
  `idf2` int(5) NOT NULL,
  `display` varchar(250) NOT NULL,
  `name_frm` varchar(250) NOT NULL,
  `lv` int(5) NOT NULL,
  `idmcon` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `frm_tded_today`
--

CREATE TABLE `frm_tded_today` (
  `f1` int(10) NOT NULL,
  `f2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frm_tded_today`
--

INSERT INTO `frm_tded_today` (`f1`, `f2`) VALUES
(3, 'ชายสามอ่าง'),
(4, 'วายุพงษ์'),
(8, '<p>ทดสอบ1 &nbsp;<span style=\"color: rgb(216, 55, 98);\">VS &nbsp;</span>ทดสอบ2</p>');

-- --------------------------------------------------------

--
-- Table structure for table `frm_tded_today_sub1`
--

CREATE TABLE `frm_tded_today_sub1` (
  `fs1` int(10) NOT NULL,
  `fs2` text NOT NULL,
  `fs3` text NOT NULL,
  `fs4` varchar(50) NOT NULL,
  `idcon` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frm_tded_today_sub1`
--

INSERT INTO `frm_tded_today_sub1` (`fs1`, `fs2`, `fs3`, `fs4`, `idcon`) VALUES
(11, '<p><span style=\"color: rgb(216, 55, 98);\">เวสต์ บรอมมิช อัลเบียน</span></p><p>รอง 0.5 (ENG PR 02:00)</p>', '-', '05-04-2018', 3),
(13, '<p>เวสต์ บรอมมิช อัลเบียน&nbsp;</p><p><span style=\"color: rgb(21, 230, 127);\">รอง 0.5 (ENG PR 02:00) </span></p>', '-', '05-04-2018', 3),
(14, '<p>ทดสอบระบบ <span style=\"color: rgb(74, 190, 217);\">VS </span><span style=\"color: rgb(255, 0, 0);\">ทดสอบระบบ</span></p>', '-', '05-04-2018', 8),
(15, '<p><strong>เวสต์ บรอมมิช อัลเบียน </strong></p><p>รอง 0.5 (ENG <span style=\"color: rgb(255, 0, 0);\">PR </span>02:00)</p>', '-', '05-04-2018', 4),
(16, '<p><span style=\"color: rgb(36, 156, 184);\">เวสต์ บรอมมิช อัลเบียน </span></p><p>รอง 0.5 (ENG PR 02:00)</p>', '-', '05-04-2018', 3),
(17, '<p><span style=\"color: rgb(255, 0, 0);\">เวสต์ บรอมมิช อัลเบียน</span></p><p>รอง 0.5 (ENG PR 02:00)</p>', '-', '09-04-2018', 8),
(18, '<p>เวสต์ บรอมมิช อัลเบียน</p><p><span style=\"color: rgb(216, 55, 98);\">รอง 0.5 (ENG PR 02:00)</span></p>', '-', '09-04-2018', 8);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idm` int(10) NOT NULL,
  `name_menu` varchar(250) NOT NULL,
  `level` int(10) NOT NULL,
  `en` int(1) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idm`, `name_menu`, `level`, `en`, `link`) VALUES
(5, 'หน้าแรก', 1, 0, 'form_index.php'),
(6, 'ทีเด็ดบอล', 2, 0, 'form_index.php'),
(7, 'หนังสือพิมพ์', 3, 0, 'form_index.php'),
(8, 'วิเคราะห์บอล', 4, 0, 'form_index.php'),
(9, 'ราคาบอล', 5, 0, 'form_index.php'),
(10, 'ไฮไลท์ฟุตบอล', 6, 0, 'form_index.php'),
(11, 'ผลฟุตบอล', 7, 0, 'form_index.php'),
(12, 'ข่าวฟุตบอล', 8, 0, 'form_index.php'),
(13, 'ตารางบอล', 9, 0, 'form_index.php'),
(14, 'ดูบอลสดออนไลน์', 10, 0, 'form_index.php'),
(15, 'ติดต่อโฆษณา', 11, 0, 'form_index.php'),
(16, 'เกมส์ท้าเซียน', 12, 0, 'form_index.php');

-- --------------------------------------------------------

--
-- Table structure for table `menu1`
--

CREATE TABLE `menu1` (
  `idm` int(5) NOT NULL,
  `name_menu` varchar(250) NOT NULL,
  `level` int(10) NOT NULL,
  `en` int(1) NOT NULL,
  `idmcon` int(5) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu1`
--

INSERT INTO `menu1` (`idm`, `name_menu`, `level`, `en`, `idmcon`, `link`) VALUES
(1, 'ผลฟุตบอลสด', 1, 0, 11, 'form_index.php'),
(2, 'ผลบอลเมื่อคืน', 2, 0, 11, 'form_index.php'),
(3, 'เกมส์ท้าเซียน', 1, 0, 16, 'form_index.php'),
(4, 'กติกาและรางวัล', 2, 0, 16, 'form_index.php'),
(5, 'บอลเต็ง', 3, 0, 16, 'form_index.php'),
(6, 'บอลสเต็ป', 4, 0, 16, 'form_index.php'),
(7, 'สปอนเซอร์', 5, 0, 16, 'form_index.php'),
(8, 'Hall of Fame', 6, 0, 16, 'form_index.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `frm_banner`
--
ALTER TABLE `frm_banner`
  ADD PRIMARY KEY (`f1`);

--
-- Indexes for table `frm_hilight`
--
ALTER TABLE `frm_hilight`
  ADD PRIMARY KEY (`f1`);

--
-- Indexes for table `frm_m1`
--
ALTER TABLE `frm_m1`
  ADD PRIMARY KEY (`idf1`);

--
-- Indexes for table `frm_m2`
--
ALTER TABLE `frm_m2`
  ADD PRIMARY KEY (`idf2`);

--
-- Indexes for table `frm_tded_today`
--
ALTER TABLE `frm_tded_today`
  ADD PRIMARY KEY (`f1`);

--
-- Indexes for table `frm_tded_today_sub1`
--
ALTER TABLE `frm_tded_today_sub1`
  ADD PRIMARY KEY (`fs1`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idm`);

--
-- Indexes for table `menu1`
--
ALTER TABLE `menu1`
  ADD PRIMARY KEY (`idm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `frm_banner`
--
ALTER TABLE `frm_banner`
  MODIFY `f1` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `frm_hilight`
--
ALTER TABLE `frm_hilight`
  MODIFY `f1` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `frm_m1`
--
ALTER TABLE `frm_m1`
  MODIFY `idf1` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `frm_m2`
--
ALTER TABLE `frm_m2`
  MODIFY `idf2` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frm_tded_today`
--
ALTER TABLE `frm_tded_today`
  MODIFY `f1` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `frm_tded_today_sub1`
--
ALTER TABLE `frm_tded_today_sub1`
  MODIFY `fs1` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu1`
--
ALTER TABLE `menu1`
  MODIFY `idm` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
