-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2025 at 12:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oqas`
--

-- --------------------------------------------------------

--
-- Table structure for table `evidence`
--

CREATE TABLE `evidence` (
  `id` int(11) NOT NULL COMMENT 'รหัสหลักฐาน',
  `indicator_id` int(11) NOT NULL COMMENT 'รหัสตัวชี้วัด',
  `type` enum('text','link') NOT NULL DEFAULT 'text' COMMENT 'ชนิดหลักฐาน',
  `detail` text NOT NULL COMMENT 'รายละเอียดหลักฐาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `indicator`
--

CREATE TABLE `indicator` (
  `id` int(11) NOT NULL COMMENT 'รหัสตัวชี้วัด',
  `project_id` int(11) NOT NULL COMMENT 'รหัสการประเมิน',
  `parent_id` int(11) NOT NULL DEFAULT 0 COMMENT 'ตัวชี้วัดหลัก 0 หมายถึงเป็นตัวชี้วัดสูงสุด',
  `title` varchar(1000) NOT NULL COMMENT 'หัวข้อ',
  `subject` text NOT NULL COMMENT 'คำอธิบายหัวข้อ',
  `detail` text NOT NULL COMMENT 'รายละเอียด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indicator`
--

INSERT INTO `indicator` (`id`, `project_id`, `parent_id`, `title`, `subject`, `detail`) VALUES
(1, 1, 0, 'มาตรฐานที่ 1', 'คุณภาพของผู้เรียน', ''),
(2, 1, 0, 'มาตรฐานที่ 2', 'กระบวนการบริหารและการจัดการ', ''),
(3, 1, 0, 'มาตรฐานที่ 3', 'กระบวนการจัดการเรียนการสอน ที่เน้นผู้เรียนเป็นสําคัญ', ''),
(4, 1, 1, 'ตัวชี้วัดที่ 1.1', 'ผู้เรียนมีสมรรถนะตามหลักสูตรสถานศึกษา', ''),
(5, 1, 1, 'ตัวชี้วัดที่ 1.2', 'ผู้เรียนมีคุณลักษณะที่พึงประสงค์ตามหลักสูตรสถานศึกษา', '');

-- --------------------------------------------------------

--
-- Table structure for table `org`
--

CREATE TABLE `org` (
  `id` int(11) NOT NULL COMMENT 'รหัสหน่วยงาน',
  `name` varchar(1000) NOT NULL COMMENT 'ชื่อหน่วยงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org`
--

INSERT INTO `org` (`id`, `name`) VALUES
(1, 'วิทยาลัยอาชีวศึกษาร้อยเอ็ด');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL COMMENT 'รหัสการประเมิน',
  `org_id` int(11) NOT NULL COMMENT 'รหัสหน่วยงาน',
  `subject` varchar(1000) NOT NULL COMMENT 'หัวข้อ',
  `due_date` date NOT NULL DEFAULT current_timestamp(),
  `visible` enum('public','private') NOT NULL DEFAULT 'private' COMMENT 'การเผยแพร่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `org_id`, `subject`, `due_date`, `visible`) VALUES
(1, 1, 'การประกันคุณภาพภายนอก 2567', '2025-01-30', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `system_config`
--

CREATE TABLE `system_config` (
  `id` varchar(32) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_config`
--

INSERT INTO `system_config` (`id`, `value`) VALUES
('systemName', 'PLC');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `user_type_id` int(11) NOT NULL DEFAULT 2,
  `picture` varchar(100) DEFAULT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `username`, `password`, `email`, `name`, `surname`, `user_type_id`, `picture`, `active`) VALUES
(1, 'dev', '81dc9bdb52d04dc20036dbd8313ed055', 'noppol.ins@gmail.com', 'นพพล', 'อินศร', 1, 'ZGV2.jpg', '1'),
(3, 'noppol', '8689391a8b93cd2d55ccf3f436eef4e2', 'noppol@rvc.ac.th', '', '', 2, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(32) NOT NULL,
  `active_menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type_name`, `active_menu`) VALUES
(1, 'developer', 'qa,oqas,developer,admin,user_menu'),
(2, 'admin', 'qa,oqas,adminuser_menu'),
(3, 'user', 'qa,oqas,user_menu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evidence`
--
ALTER TABLE `evidence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indicator_id` (`indicator_id`);

--
-- Indexes for table `indicator`
--
ALTER TABLE `indicator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `org`
--
ALTER TABLE `org`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `org_id` (`org_id`);

--
-- Indexes for table `system_config`
--
ALTER TABLE `system_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evidence`
--
ALTER TABLE `evidence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสหลักฐาน';

--
-- AUTO_INCREMENT for table `indicator`
--
ALTER TABLE `indicator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตัวชี้วัด', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `org`
--
ALTER TABLE `org`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสหน่วยงาน', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการประเมิน', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evidence`
--
ALTER TABLE `evidence`
  ADD CONSTRAINT `evidence_ibfk_1` FOREIGN KEY (`indicator_id`) REFERENCES `indicator` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `indicator`
--
ALTER TABLE `indicator`
  ADD CONSTRAINT `indicator_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `org` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
