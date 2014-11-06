-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2014 at 11:00 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_sami_proj`
--

create database db_sami_proj;
use db_sami_proj;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
`id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `notes` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `member_id`, `title`, `notes`, `start`, `end`) VALUES
(1, 0, 'First Date', 'Firsts date content goes here', '2012-08-11 07:52:29', '2012-08-11 12:52:33'),
(2, 0, 'Database Appointment #2', 'Meeting for Juan ', '2012-08-23 08:43:45', '2012-08-23 09:43:50'),
(3, 0, 'Test title', 'test here', '2012-08-12 00:00:00', '0000-00-00 00:00:00'),
(4, 0, 'test3', '230 test', '2012-08-29 02:30:00', '0000-00-00 00:00:00'),
(6, 0, 'What a night', 'This is added by the administrator', '2014-10-18 00:00:00', '0000-00-00 00:00:00'),
(8, 0, 'This is in the past days', 'The most important part of the calendary. This line is updated. Again updated for the last time', '2014-10-10 00:00:00', '0000-00-00 00:00:00'),
(9, 0, 'Where is the calendar', 'I dont see the calendary object', '2014-10-18 00:00:00', '0000-00-00 00:00:00'),
(10, 8, 'This is my Event', 'You can add anyting you want here as an event', '2014-11-02 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_urls`
--

CREATE TABLE `calendar_urls` (
`id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `calendar_array` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_urls`
--

INSERT INTO `calendar_urls` (`id`, `member_id`, `calendar_array`) VALUES
(1, 0, '''events.php'''),
(2, 0, '''https://www.google.com/calendar/feeds/kelchuk68%40gmail.com/public/basic''');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment`
--

CREATE TABLE `tbl_assessment` (
`id` bigint(20) NOT NULL,
  `assessment_type` varchar(50) NOT NULL,
  `assessment_date` date NOT NULL,
  `summary` text,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assessment`
--

INSERT INTO `tbl_assessment` (`id`, `assessment_type`, `assessment_date`, `summary`, `modified_by`, `modification_date`) VALUES
(1, 'as1', '2014-10-08', 'this is the summary', 0, '0000-00-00 00:00:00'),
(2, 'as1', '2014-10-05', 'sdfasd', 0, '0000-00-00 00:00:00'),
(3, 'as2', '2014-10-08', 'This is the Summary written just before SCRUM lol. I love php more than Java', 0, '0000-00-00 00:00:00'),
(4, 'as2', '2014-10-09', 'This is the summary info', 5, '2014-10-11 00:00:00'),
(5, 'as2', '2014-10-11', 'Sample summary text', 5, '0000-00-00 00:00:00'),
(6, 'as1', '2014-10-11', 'Summary by Abebe', 5, '0000-00-00 00:00:00'),
(7, 'as2', '2014-10-11', 'This is the sumamry', 5, '0000-00-00 00:00:00'),
(9, 'as1', '2014-10-17', 'This is the summary information', 2, '2014-10-17 00:00:00'),
(10, 'as1', '2014-10-18', 'Summary of the Assessment', 8, '2014-10-18 00:00:00'),
(11, 'as3', '2014-10-24', 'This is the summary of the Add Assessment Box', 8, '2014-10-24 00:00:00'),
(12, 'as4', '2014-10-24', 'The summary for the brand new Th goes in here.', 8, '2014-10-24 16:47:03'),
(13, 'as2', '2014-10-28', 'This is the summary filed!', 8, '2014-10-28 16:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment_th`
--

CREATE TABLE `tbl_assessment_th` (
`id` bigint(20) NOT NULL,
  `assessment_id` bigint(20) NOT NULL,
  `th_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assessment_th`
--

INSERT INTO `tbl_assessment_th` (`id`, `assessment_id`, `th_id`, `modified_by`, `modification_date`) VALUES
(1, 3, 9, 0, '0000-00-00 00:00:00'),
(2, 3, 10, 0, '0000-00-00 00:00:00'),
(3, 6, 11, 5, '0000-00-00 00:00:00'),
(4, 6, 12, 5, '0000-00-00 00:00:00'),
(5, 6, 13, 5, '0000-00-00 00:00:00'),
(6, 5, 14, 5, '0000-00-00 00:00:00'),
(8, 9, 18, 2, '2014-10-17 00:00:00'),
(9, 9, 19, 2, '2014-10-17 00:00:00'),
(10, 10, 20, 8, '2014-10-18 00:00:00'),
(11, 11, 24, 8, '2014-10-24 00:00:00'),
(12, 11, 25, 8, '2014-10-24 00:00:00'),
(13, 12, 26, 8, '2014-10-24 16:47:03'),
(14, 13, 28, 8, '2014-10-28 16:39:54'),
(15, 13, 29, 8, '2014-10-28 16:39:54'),
(16, 13, 30, 8, '2014-10-28 16:39:54'),
(17, 13, 31, 8, '2014-10-28 16:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fn`
--

CREATE TABLE `tbl_fn` (
`id` bigint(20) NOT NULL,
  `fn_name` varchar(70) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fn`
--

INSERT INTO `tbl_fn` (`id`, `fn_name`, `modified_by`, `modification_date`) VALUES
(1, 'sdfdsf', 0, '0000-00-00 00:00:00'),
(2, 'sdfdf', 0, '0000-00-00 00:00:00'),
(3, 'dfsf', 0, '0000-00-00 00:00:00'),
(4, 'this is mahder', 0, '0000-00-00 00:00:00'),
(5, 'LEKU the FN LOVE', 2, '2014-10-16 00:00:00'),
(6, 'MAHI love', 2, '2014-10-16 00:00:00'),
(7, 'YEFI BABES', 2, '2014-10-16 00:00:00'),
(8, 'SAMI FN', 2, '2014-10-16 00:00:00'),
(9, 'xxx', 2, '2014-10-16 00:00:00'),
(10, 'AS is', 2, '2014-10-16 00:00:00'),
(11, 'This is FN', 8, '2014-11-03 20:12:50'),
(12, 'First Function', 8, '2014-11-03 20:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fn_action`
--

CREATE TABLE `tbl_fn_action` (
`id` bigint(20) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `action_text` text,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fn_action`
--

INSERT INTO `tbl_fn_action` (`id`, `fn_id`, `action_text`, `modified_by`, `modification_date`) VALUES
(5, 8, 'action 1 for sami', 8, '2014-10-25 01:08:03'),
(6, 8, 'this is action text for 2', 8, '2014-10-25 01:08:16'),
(7, 8, 'This is the fn1 action', 8, '2014-10-25 01:29:48'),
(8, 8, 'this is the second action', 8, '2014-10-25 01:29:59'),
(9, 5, 'Just to be on the safe side', 8, '2014-10-25 01:30:13'),
(10, 5, 'another action text goes in erher', 8, '2014-10-25 01:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_1`
--

CREATE TABLE `tbl_form_1` (
`id` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `form_date` date NOT NULL,
  `plan` text NOT NULL,
  `q1` text NOT NULL,
  `q2` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_1`
--

INSERT INTO `tbl_form_1` (`id`, `title`, `form_date`, `plan`, `q1`, `q2`, `modified_by`, `modification_date`) VALUES
(19, 'This is the title', '2014-10-24', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 8, '2014-10-24 19:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_1_q3`
--

CREATE TABLE `tbl_form_1_q3` (
`id` bigint(20) NOT NULL,
  `form_1_id` bigint(20) NOT NULL,
  `col1` varchar(70) DEFAULT NULL,
  `col2` varchar(70) DEFAULT NULL,
  `col3` varchar(70) DEFAULT NULL,
  `col4` varchar(70) DEFAULT NULL,
  `col5` varchar(70) DEFAULT NULL,
  `col6` varchar(70) DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_1_q3`
--

INSERT INTO `tbl_form_1_q3` (`id`, `form_1_id`, `col1`, `col2`, `col3`, `col4`, `col5`, `col6`, `modified_by`, `modification_date`) VALUES
(13, 19, '1', '2', '3', '4', '5', '6', 8, '2014-10-24 19:36:21'),
(14, 19, '', '', '', '', '', '', 8, '2014-10-24 19:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_1_q4`
--

CREATE TABLE `tbl_form_1_q4` (
`id` bigint(20) NOT NULL,
  `form_1_id` bigint(20) NOT NULL,
  `col1` varchar(70) DEFAULT NULL,
  `col2` varchar(70) DEFAULT NULL,
  `col3` varchar(70) DEFAULT NULL,
  `col4` varchar(70) DEFAULT NULL,
  `col5` varchar(70) DEFAULT NULL,
  `col6` varchar(70) DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_1_q4`
--

INSERT INTO `tbl_form_1_q4` (`id`, `form_1_id`, `col1`, `col2`, `col3`, `col4`, `col5`, `col6`, `modified_by`, `modification_date`) VALUES
(6, 19, '', '', '', '', '', '', 8, '2014-10-24 19:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_2`
--

CREATE TABLE `tbl_form_2` (
`id` bigint(20) NOT NULL,
  `q2_1` text NOT NULL,
  `q2_2` text NOT NULL,
  `q2_3` text NOT NULL,
  `q2_4` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_2`
--

INSERT INTO `tbl_form_2` (`id`, `q2_1`, `q2_2`, `q2_3`, `q2_4`, `modified_by`, `modification_date`) VALUES
(9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 8, '2014-10-24 19:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_3`
--

CREATE TABLE `tbl_form_3` (
`id` bigint(20) NOT NULL,
  `q3_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_3`
--

INSERT INTO `tbl_form_3` (`id`, `q3_1`, `modified_by`, `modification_date`) VALUES
(8, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 8, '2014-10-24 19:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_4`
--

CREATE TABLE `tbl_form_4` (
`id` bigint(20) NOT NULL,
  `q4_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_4`
--

INSERT INTO `tbl_form_4` (`id`, `q4_1`, `modified_by`, `modification_date`) VALUES
(7, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 8, '2014-10-24 19:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_5`
--

CREATE TABLE `tbl_form_5` (
`id` bigint(20) NOT NULL,
  `q5_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_5`
--

INSERT INTO `tbl_form_5` (`id`, `q5_1`, `modified_by`, `modification_date`) VALUES
(7, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 8, '2014-10-24 19:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_6`
--

CREATE TABLE `tbl_form_6` (
`id` bigint(20) NOT NULL,
  `q6_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_6`
--

INSERT INTO `tbl_form_6` (`id`, `q6_1`, `modified_by`, `modification_date`) VALUES
(7, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 8, '2014-10-24 19:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_7`
--

CREATE TABLE `tbl_form_7` (
`id` bigint(20) NOT NULL,
  `q7_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_7`
--

INSERT INTO `tbl_form_7` (`id`, `q7_1`, `modified_by`, `modification_date`) VALUES
(7, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 8, '2014-10-24 19:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_8`
--

CREATE TABLE `tbl_form_8` (
`id` bigint(20) NOT NULL,
  `q8_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_8`
--

INSERT INTO `tbl_form_8` (`id`, `q8_1`, `modified_by`, `modification_date`) VALUES
(7, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 8, '2014-10-24 19:40:03'),
(8, 'Something', 8, '2014-10-24 23:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_9`
--

CREATE TABLE `tbl_form_9` (
`id` bigint(20) NOT NULL,
  `q9_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_9`
--

INSERT INTO `tbl_form_9` (`id`, `q9_1`, `modified_by`, `modification_date`) VALUES
(6, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 8, '2014-10-24 19:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_10`
--

CREATE TABLE `tbl_form_10` (
`id` bigint(20) NOT NULL,
  `q10_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_10`
--

INSERT INTO `tbl_form_10` (`id`, `q10_1`, `modified_by`, `modification_date`) VALUES
(7, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 8, '2014-10-24 19:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first`
--

CREATE TABLE `tbl_goal_first` (
`id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first`
--

INSERT INTO `tbl_goal_first` (`id`, `modified_by`, `modification_date`) VALUES
(7, 8, '2014-11-06 13:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g1`
--

CREATE TABLE `tbl_goal_first_g1` (
`id` bigint(20) NOT NULL,
  `goal_first_th_id` bigint(20) NOT NULL,
  `g1` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g1`
--

INSERT INTO `tbl_goal_first_g1` (`id`, `goal_first_th_id`, `g1`, `fn_id`, `modified_by`, `modification_date`) VALUES
(8, 8, 'g1 for some th', 12, 8, '2014-11-06 13:42:41'),
(9, 9, 'g1 for my first th', 11, 8, '2014-11-06 13:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g1_obj_fn`
--

CREATE TABLE `tbl_goal_first_g1_obj_fn` (
`id` bigint(20) NOT NULL,
  `goal_first_g1_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g1_obj_fn`
--

INSERT INTO `tbl_goal_first_g1_obj_fn` (`id`, `goal_first_g1_id`, `obj`, `fn_id`, `modified_by`, `modification_date`) VALUES
(5, 8, 'obj1 for some th', 12, 8, '2014-11-06 13:42:41'),
(6, 9, 'obj1 for my first th', 11, 8, '2014-11-06 16:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g2`
--

CREATE TABLE `tbl_goal_first_g2` (
`id` bigint(20) NOT NULL,
  `goal_first_th_id` bigint(20) NOT NULL,
  `g2` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g2`
--

INSERT INTO `tbl_goal_first_g2` (`id`, `goal_first_th_id`, `g2`, `fn_id`, `modified_by`, `modification_date`) VALUES
(8, 8, 'g2 for some th', 12, 8, '2014-11-06 13:42:41'),
(9, 9, 'g2 for my first th', 11, 8, '2014-11-06 13:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g2_obj_fn`
--

CREATE TABLE `tbl_goal_first_g2_obj_fn` (
`id` bigint(20) NOT NULL,
  `goal_first_g2_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g2_obj_fn`
--

INSERT INTO `tbl_goal_first_g2_obj_fn` (`id`, `goal_first_g2_id`, `obj`, `fn_id`, `modified_by`, `modification_date`) VALUES
(5, 8, 'obj2 for some th', 12, 8, '2014-11-06 13:42:41'),
(6, 9, 'obj2 for my first th', 11, 8, '2014-11-06 13:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g3`
--

CREATE TABLE `tbl_goal_first_g3` (
`id` bigint(20) NOT NULL,
  `goal_first_th_id` bigint(20) NOT NULL,
  `g3` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g3`
--

INSERT INTO `tbl_goal_first_g3` (`id`, `goal_first_th_id`, `g3`, `fn_id`, `modified_by`, `modification_date`) VALUES
(8, 8, 'g3 for some th', 12, 8, '2014-11-06 13:42:41'),
(9, 9, 'g3 for my first th', 11, 8, '2014-11-06 13:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g3_obj_fn`
--

CREATE TABLE `tbl_goal_first_g3_obj_fn` (
`id` bigint(20) NOT NULL,
  `goal_first_g3_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g3_obj_fn`
--

INSERT INTO `tbl_goal_first_g3_obj_fn` (`id`, `goal_first_g3_id`, `obj`, `fn_id`, `modified_by`, `modification_date`) VALUES
(5, 8, 'obj3 for some th', 12, 8, '2014-11-06 13:42:41'),
(6, 9, 'obj3 for my first th', 11, 8, '2014-11-06 16:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_th`
--

CREATE TABLE `tbl_goal_first_th` (
`id` bigint(20) NOT NULL,
  `goal_first_id` bigint(20) NOT NULL,
  `th_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_th`
--

INSERT INTO `tbl_goal_first_th` (`id`, `goal_first_id`, `th_id`, `modified_by`, `modification_date`) VALUES
(8, 7, 22, 8, '2014-11-06 13:42:41'),
(9, 7, 24, 8, '2014-11-06 13:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second`
--

CREATE TABLE `tbl_goal_second` (
`id` bigint(20) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second`
--

INSERT INTO `tbl_goal_second` (`id`, `fn_id`, `modified_by`, `modification_date`) VALUES
(24, 8, 8, '2014-10-24 18:22:43'),
(25, 5, 8, '2014-10-24 23:13:33'),
(26, 5, 8, '2014-10-25 01:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g1`
--

CREATE TABLE `tbl_goal_second_g1` (
`id` bigint(20) NOT NULL,
  `goal_second_id` bigint(20) NOT NULL,
  `g1` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g1`
--

INSERT INTO `tbl_goal_second_g1` (`id`, `goal_second_id`, `g1`, `modified_by`, `modification_date`) VALUES
(21, 24, 'goal second g1', 8, '2014-10-24 18:22:43'),
(22, 25, 'sdf', 8, '2014-10-24 23:13:33'),
(23, 26, 'g1', 8, '2014-10-25 01:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g1_obj`
--

CREATE TABLE `tbl_goal_second_g1_obj` (
`id` bigint(20) NOT NULL,
  `goal_second_g1_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g1_obj`
--

INSERT INTO `tbl_goal_second_g1_obj` (`id`, `goal_second_g1_id`, `obj`, `modified_by`, `modification_date`) VALUES
(19, 21, 'goal second obj1', 8, '2014-10-24 18:22:43'),
(20, 22, 'bef', 8, '2014-10-24 23:13:33'),
(21, 22, 'eb', 8, '2014-10-24 23:13:33'),
(22, 22, 'erg', 8, '2014-10-24 23:13:33'),
(23, 22, 'advs', 8, '2014-10-24 23:13:33'),
(24, 22, 'betrb', 8, '2014-10-24 23:13:33'),
(25, 23, 'obj', 8, '2014-10-25 01:27:50'),
(26, 23, 'obj2', 8, '2014-10-25 01:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g2`
--

CREATE TABLE `tbl_goal_second_g2` (
`id` bigint(20) NOT NULL,
  `goal_second_id` bigint(20) NOT NULL,
  `g2` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g2`
--

INSERT INTO `tbl_goal_second_g2` (`id`, `goal_second_id`, `g2`, `modified_by`, `modification_date`) VALUES
(19, 24, 'goal second g2', 8, '2014-10-24 18:22:43'),
(20, 25, 'wetb', 8, '2014-10-24 23:13:33'),
(21, 26, 'g2', 8, '2014-10-25 01:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g2_obj`
--

CREATE TABLE `tbl_goal_second_g2_obj` (
`id` bigint(20) NOT NULL,
  `goal_second_g2_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g2_obj`
--

INSERT INTO `tbl_goal_second_g2_obj` (`id`, `goal_second_g2_id`, `obj`, `modified_by`, `modification_date`) VALUES
(18, 19, 'goal second obj2', 8, '2014-10-24 18:22:43'),
(19, 20, 'qv', 8, '2014-10-24 23:13:33'),
(20, 21, 'objg22', 8, '2014-10-25 01:27:50'),
(21, 21, 'obj3', 8, '2014-10-25 01:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g3`
--

CREATE TABLE `tbl_goal_second_g3` (
`id` bigint(20) NOT NULL,
  `goal_second_id` bigint(20) NOT NULL,
  `g3` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g3`
--

INSERT INTO `tbl_goal_second_g3` (`id`, `goal_second_id`, `g3`, `modified_by`, `modification_date`) VALUES
(15, 24, 'goal second g3', 8, '2014-10-24 18:22:43'),
(16, 25, 'qerg', 8, '2014-10-24 23:13:33'),
(17, 26, 'g3', 8, '2014-10-25 01:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g3_obj`
--

CREATE TABLE `tbl_goal_second_g3_obj` (
`id` bigint(20) NOT NULL,
  `goal_second_g3_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g3_obj`
--

INSERT INTO `tbl_goal_second_g3_obj` (`id`, `goal_second_g3_id`, `obj`, `modified_by`, `modification_date`) VALUES
(20, 15, 'goal second obj3', 8, '2014-10-24 18:22:43'),
(21, 16, 'vq', 8, '2014-10-24 23:13:33'),
(22, 17, 'obg3', 8, '2014-10-25 01:27:50'),
(23, 17, 'obj4', 8, '2014-10-25 01:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_responsibility`
--

CREATE TABLE `tbl_responsibility` (
`id` bigint(20) NOT NULL,
  `team_id` bigint(20) NOT NULL,
  `role` text,
  `responsibility` text,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_responsibility`
--

INSERT INTO `tbl_responsibility` (`id`, `team_id`, `role`, `responsibility`, `modified_by`, `modification_date`) VALUES
(1, 2, 'This is the role description. This line is updated.', 'this is the responsibility textarea', 0, '0000-00-00 00:00:00'),
(2, 1, 'This is the second role', 'This is the second responsibility. How about this....', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_risk`
--

CREATE TABLE `tbl_risk` (
`id` bigint(20) NOT NULL,
  `th_id` bigint(20) NOT NULL,
  `mg` varchar(50) NOT NULL,
  `dr` varchar(50) NOT NULL,
  `pr` varchar(50) NOT NULL,
  `wa` varchar(50) NOT NULL,
  `rs` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_risk`
--

INSERT INTO `tbl_risk` (`id`, `th_id`, `mg`, `dr`, `pr`, `wa`, `rs`, `modified_by`, `modification_date`) VALUES
(1, 8, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 0, '0000-00-00 00:00:00'),
(2, 5, 'mg4', 'dr4', 'pr4', 'wa4', 'rs4', 0, '0000-00-00 00:00:00'),
(3, 11, 'mg3', 'dr2', 'pr3', 'wa1', 'rs4', 5, '2014-10-11 00:00:00'),
(4, 5, 'mg3', 'dr4', 'pr1', 'wa1', 'rs4', 2, '2014-10-16 00:00:00'),
(6, 18, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 2, '2014-10-17 00:00:00'),
(7, 20, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 8, '2014-10-18 00:00:00'),
(8, 20, 'mg4', 'dr4', 'pr1', 'wa4', 'rs2', 8, '2014-10-18 00:00:00'),
(9, 21, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 8, '2014-10-18 00:00:00'),
(10, 22, 'mg1', 'dr1', 'pr1', 'wa4', 'rs3', 8, '2014-10-18 00:00:00'),
(11, 23, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 8, '2014-10-22 00:00:00'),
(12, 24, 'mg1', 'dr2', 'pr4', 'wa2', 'rs3', 8, '2014-10-24 00:00:00'),
(13, 26, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 8, '2014-10-24 16:47:27'),
(14, 27, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 8, '2014-10-25 01:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
`id` bigint(20) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `organization` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone` varchar(70) NOT NULL,
  `interest` varchar(70) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`id`, `team_name`, `title`, `organization`, `email`, `phone`, `interest`, `modified_by`, `modification_date`) VALUES
(1, 'Name', 'title', 'organization', 'mahdera@yahoo.com', '2020039494', '3', 0, '0000-00-00 00:00:00'),
(2, 'sdf', 'lksdjfk', 'lkdj', 'lekbirgebre@yahoo.com', '4985723984', '2', 0, '0000-00-00 00:00:00'),
(3, 'sdf', 'asdf', 'asdf', 'asdf', 'asdf', '3', 0, '0000-00-00 00:00:00'),
(4, 'name', 'title ', 'organization', 'email@isp.com', '099898', 'Interest 1,Interest 3,', 0, '0000-00-00 00:00:00'),
(5, 'sdf', 'sdg', 'defg', 'm@gmail.com', '345', 'Interest 1,Interest 5,Interest 7,', 5, '0000-00-00 00:00:00'),
(7, 'Team Mahder', 'This is the title of the team', 'Organization Info', 'mahdera@yahoo.com', '2023743138', 'Interest 1,Interest 2,', 2, '2014-10-17 00:00:00'),
(8, 'Team Name', 'Title of Team', 'Organization of Team', 'emailteam@gmail.com', '878768766', 'Interest 1,Interest 5,', 8, '2014-10-18 00:00:00'),
(9, 'Team USA', 'The Best Team Ever', 'USA', 'teamusa@usa.com', '9889789787', 'Interest 1,Interest 3,Interest 4,', 8, '2014-10-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team_interest`
--

CREATE TABLE `tbl_team_interest` (
`id` bigint(20) NOT NULL,
  `team_id` bigint(20) NOT NULL,
  `interest_name` varchar(70) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_th`
--

CREATE TABLE `tbl_th` (
`id` bigint(20) NOT NULL,
  `th_name` varchar(70) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_th`
--

INSERT INTO `tbl_th` (`id`, `th_name`, `modified_by`, `modification_date`) VALUES
(1, 'sdff', 0, '0000-00-00 00:00:00'),
(2, 'dfgdfg', 0, '0000-00-00 00:00:00'),
(4, 'A TH Name', 0, '0000-00-00 00:00:00'),
(5, 'Another TH', 0, '0000-00-00 00:00:00'),
(6, 'jhg', 0, '0000-00-00 00:00:00'),
(7, 'ghf', 0, '0000-00-00 00:00:00'),
(8, 'What Kind of Th is 42', 0, '0000-00-00 00:00:00'),
(9, 'This is TH One. this better be updating', 0, '0000-00-00 00:00:00'),
(10, 'This is TH Two this is the second th being edited', 0, '0000-00-00 00:00:00'),
(11, 'Th1 by abebe', 5, '0000-00-00 00:00:00'),
(12, 'Th2 by abebe', 5, '0000-00-00 00:00:00'),
(13, 'Th3 by abebe', 5, '0000-00-00 00:00:00'),
(14, 'Better be working', 5, '2014-10-11 00:00:00'),
(15, 'This is yet another th created by Abebe', 5, '2014-10-11 00:00:00'),
(16, 'This is th1', 2, '2014-10-16 00:00:00'),
(18, 'My Sample Th1', 2, '2014-10-17 00:00:00'),
(19, 'Anoter Sample Th1 By root Yes', 2, '2014-10-17 00:00:00'),
(20, 'Added Th 123', 8, '2014-10-18 00:00:00'),
(21, 'New Th Value', 8, '2014-10-18 00:00:00'),
(22, 'Some Th', 8, '2014-10-18 00:00:00'),
(23, 'New Th On the Train', 8, '2014-10-22 00:00:00'),
(24, 'My First Th', 8, '2014-10-24 00:00:00'),
(25, 'My Second Th', 8, '2014-10-24 00:00:00'),
(26, 'This is A Brand New Th', 8, '2014-10-24 16:47:03'),
(27, 'Sample TH For Sami. This is Updated', 8, '2014-10-25 01:14:48'),
(28, 'New Th1', 8, '2014-10-28 16:39:54'),
(29, 'New Th2', 8, '2014-10-28 16:39:54'),
(30, 'New Th3', 8, '2014-10-28 16:39:54'),
(31, 'New Th4', 8, '2014-10-28 16:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_th_action`
--

CREATE TABLE `tbl_th_action` (
`id` bigint(20) NOT NULL,
  `th_id` bigint(20) NOT NULL,
  `action_text` text,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_th_action`
--

INSERT INTO `tbl_th_action` (`id`, `th_id`, `action_text`, `modified_by`, `modification_date`) VALUES
(8, 24, 'this is my first action', 8, '2014-10-25 01:11:06'),
(10, 24, 'going to sleep', 8, '2014-10-25 01:12:15'),
(11, 27, 'This is the first action', 8, '2014-10-25 01:28:57'),
(12, 27, 'This is the second action', 8, '2014-10-25 01:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
`id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `member_type` varchar(50) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `last_name`, `email`, `user_id`, `password`, `phone_number`, `member_type`, `user_status`, `modified_by`, `modification_date`) VALUES
(2, 'Admin', 'Admin', 'mahderalem@gmail.com', 'root', '63a9f0ea7bb98050796b649e85481845', '39439483948', 'Admin', 'Active', 0, '2014-10-09 00:00:00'),
(3, 'Lekbir', 'Gebretsadik', 'lekbirgebre@yahoo.com', 'leki', '202cb962ac59075b964b07152d234b70', '87897986', 'User', 'Active', 2, '2014-10-10 00:00:00'),
(4, 'Yefikir', 'Alemayehu', 'yefi@yahoo.com', 'yefi', '81dc9bdb52d04dc20036dbd8313ed055', '---', 'User', 'Active', 2, '2014-10-10 00:00:00'),
(5, 'Abebe', 'Teka', 'abebe@gmail.com', 'abebe', '202cb962ac59075b964b07152d234b70', '987987', 'User', 'Blocked', 2, '2014-10-11 00:00:00'),
(6, 'Sample', 'Person', 'sample@yahoo.com', 'sample', '202cb962ac59075b964b07152d234b70', '987987', 'User', 'Active', 0, '2014-10-11 00:00:00'),
(8, 'Mahder', 'Neway', 'mahdera@yahoo.com', 'mahder', '0f3fbc595a293952fabc8de77ae840ca', '2023743138', 'User', 'Active', 2, '2014-10-17 00:00:00'),
(9, 'Alemu', 'Gebre', 'alemu@yahoo.com', 'alemu', '202cb962ac59075b964b07152d234b70', '453453432', 'User', 'Pending', 0, '2014-10-24 18:07:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_urls`
--
ALTER TABLE `calendar_urls`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_assessment`
--
ALTER TABLE `tbl_assessment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_assessment_th`
--
ALTER TABLE `tbl_assessment_th`
 ADD PRIMARY KEY (`id`), ADD KEY `assessment_id` (`assessment_id`), ADD KEY `th_id` (`th_id`);

--
-- Indexes for table `tbl_fn`
--
ALTER TABLE `tbl_fn`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fn_action`
--
ALTER TABLE `tbl_fn_action`
 ADD PRIMARY KEY (`id`), ADD KEY `fn_id_2` (`fn_id`);

--
-- Indexes for table `tbl_form_1`
--
ALTER TABLE `tbl_form_1`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_1_q3`
--
ALTER TABLE `tbl_form_1_q3`
 ADD PRIMARY KEY (`id`), ADD KEY `form_1_id` (`form_1_id`);

--
-- Indexes for table `tbl_form_1_q4`
--
ALTER TABLE `tbl_form_1_q4`
 ADD PRIMARY KEY (`id`), ADD KEY `form_1_id` (`form_1_id`);

--
-- Indexes for table `tbl_form_2`
--
ALTER TABLE `tbl_form_2`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_3`
--
ALTER TABLE `tbl_form_3`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_4`
--
ALTER TABLE `tbl_form_4`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_5`
--
ALTER TABLE `tbl_form_5`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_6`
--
ALTER TABLE `tbl_form_6`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_7`
--
ALTER TABLE `tbl_form_7`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_8`
--
ALTER TABLE `tbl_form_8`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_9`
--
ALTER TABLE `tbl_form_9`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_10`
--
ALTER TABLE `tbl_form_10`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_goal_first`
--
ALTER TABLE `tbl_goal_first`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_goal_first_g1`
--
ALTER TABLE `tbl_goal_first_g1`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_first_id` (`goal_first_th_id`);

--
-- Indexes for table `tbl_goal_first_g1_obj_fn`
--
ALTER TABLE `tbl_goal_first_g1_obj_fn`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_first_g1_id` (`goal_first_g1_id`);

--
-- Indexes for table `tbl_goal_first_g2`
--
ALTER TABLE `tbl_goal_first_g2`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_first_id` (`goal_first_th_id`);

--
-- Indexes for table `tbl_goal_first_g2_obj_fn`
--
ALTER TABLE `tbl_goal_first_g2_obj_fn`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_first_g2_id` (`goal_first_g2_id`);

--
-- Indexes for table `tbl_goal_first_g3`
--
ALTER TABLE `tbl_goal_first_g3`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_first_id` (`goal_first_th_id`);

--
-- Indexes for table `tbl_goal_first_g3_obj_fn`
--
ALTER TABLE `tbl_goal_first_g3_obj_fn`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_first_g3_id` (`goal_first_g3_id`);

--
-- Indexes for table `tbl_goal_first_th`
--
ALTER TABLE `tbl_goal_first_th`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `goal_first_id` (`goal_first_id`,`th_id`,`modified_by`), ADD KEY `tbl_goal_first_th_ibfk_2` (`th_id`), ADD KEY `tbl_goal_first_th_ibfk_3` (`modified_by`);

--
-- Indexes for table `tbl_goal_second`
--
ALTER TABLE `tbl_goal_second`
 ADD PRIMARY KEY (`id`), ADD KEY `fn_id` (`fn_id`);

--
-- Indexes for table `tbl_goal_second_g1`
--
ALTER TABLE `tbl_goal_second_g1`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_second_id` (`goal_second_id`);

--
-- Indexes for table `tbl_goal_second_g1_obj`
--
ALTER TABLE `tbl_goal_second_g1_obj`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_second_g1_id` (`goal_second_g1_id`);

--
-- Indexes for table `tbl_goal_second_g2`
--
ALTER TABLE `tbl_goal_second_g2`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_second_id` (`goal_second_id`);

--
-- Indexes for table `tbl_goal_second_g2_obj`
--
ALTER TABLE `tbl_goal_second_g2_obj`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_second_g2_id` (`goal_second_g2_id`);

--
-- Indexes for table `tbl_goal_second_g3`
--
ALTER TABLE `tbl_goal_second_g3`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_second_id` (`goal_second_id`);

--
-- Indexes for table `tbl_goal_second_g3_obj`
--
ALTER TABLE `tbl_goal_second_g3_obj`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_second_g3_id` (`goal_second_g3_id`);

--
-- Indexes for table `tbl_responsibility`
--
ALTER TABLE `tbl_responsibility`
 ADD PRIMARY KEY (`id`), ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `tbl_risk`
--
ALTER TABLE `tbl_risk`
 ADD PRIMARY KEY (`id`), ADD KEY `th_id` (`th_id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_team_interest`
--
ALTER TABLE `tbl_team_interest`
 ADD PRIMARY KEY (`id`), ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `tbl_th`
--
ALTER TABLE `tbl_th`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_th_action`
--
ALTER TABLE `tbl_th_action`
 ADD PRIMARY KEY (`id`), ADD KEY `th_id` (`th_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `user_id` (`user_id`), ADD KEY `modified_by` (`modified_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `calendar_urls`
--
ALTER TABLE `calendar_urls`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_assessment`
--
ALTER TABLE `tbl_assessment`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_assessment_th`
--
ALTER TABLE `tbl_assessment_th`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_fn`
--
ALTER TABLE `tbl_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_fn_action`
--
ALTER TABLE `tbl_fn_action`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_form_1`
--
ALTER TABLE `tbl_form_1`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_form_1_q3`
--
ALTER TABLE `tbl_form_1_q3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_form_1_q4`
--
ALTER TABLE `tbl_form_1_q4`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_form_2`
--
ALTER TABLE `tbl_form_2`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_form_3`
--
ALTER TABLE `tbl_form_3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_form_4`
--
ALTER TABLE `tbl_form_4`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_form_5`
--
ALTER TABLE `tbl_form_5`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_form_6`
--
ALTER TABLE `tbl_form_6`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_form_7`
--
ALTER TABLE `tbl_form_7`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_form_8`
--
ALTER TABLE `tbl_form_8`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_form_9`
--
ALTER TABLE `tbl_form_9`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_form_10`
--
ALTER TABLE `tbl_form_10`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_goal_first`
--
ALTER TABLE `tbl_goal_first`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g1`
--
ALTER TABLE `tbl_goal_first_g1`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g1_obj_fn`
--
ALTER TABLE `tbl_goal_first_g1_obj_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g2`
--
ALTER TABLE `tbl_goal_first_g2`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g2_obj_fn`
--
ALTER TABLE `tbl_goal_first_g2_obj_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g3`
--
ALTER TABLE `tbl_goal_first_g3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g3_obj_fn`
--
ALTER TABLE `tbl_goal_first_g3_obj_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_goal_first_th`
--
ALTER TABLE `tbl_goal_first_th`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_goal_second`
--
ALTER TABLE `tbl_goal_second`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g1`
--
ALTER TABLE `tbl_goal_second_g1`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g1_obj`
--
ALTER TABLE `tbl_goal_second_g1_obj`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g2`
--
ALTER TABLE `tbl_goal_second_g2`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g2_obj`
--
ALTER TABLE `tbl_goal_second_g2_obj`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g3`
--
ALTER TABLE `tbl_goal_second_g3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g3_obj`
--
ALTER TABLE `tbl_goal_second_g3_obj`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_responsibility`
--
ALTER TABLE `tbl_responsibility`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_risk`
--
ALTER TABLE `tbl_risk`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_team_interest`
--
ALTER TABLE `tbl_team_interest`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_th`
--
ALTER TABLE `tbl_th`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_th_action`
--
ALTER TABLE `tbl_th_action`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_assessment_th`
--
ALTER TABLE `tbl_assessment_th`
ADD CONSTRAINT `tbl_assessment_th_ibfk_3` FOREIGN KEY (`assessment_id`) REFERENCES `tbl_assessment` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tbl_assessment_th_ibfk_4` FOREIGN KEY (`th_id`) REFERENCES `tbl_th` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_fn_action`
--
ALTER TABLE `tbl_fn_action`
ADD CONSTRAINT `tbl_fn_action_ibfk_1` FOREIGN KEY (`fn_id`) REFERENCES `tbl_fn` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_form_1_q3`
--
ALTER TABLE `tbl_form_1_q3`
ADD CONSTRAINT `tbl_form_1_q3_ibfk_1` FOREIGN KEY (`form_1_id`) REFERENCES `tbl_form_1` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_form_1_q4`
--
ALTER TABLE `tbl_form_1_q4`
ADD CONSTRAINT `tbl_form_1_q4_ibfk_1` FOREIGN KEY (`form_1_id`) REFERENCES `tbl_form_1` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_first_g1`
--
ALTER TABLE `tbl_goal_first_g1`
ADD CONSTRAINT `tbl_goal_first_g1_ibfk_1` FOREIGN KEY (`goal_first_th_id`) REFERENCES `tbl_goal_first_th` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_first_g1_obj_fn`
--
ALTER TABLE `tbl_goal_first_g1_obj_fn`
ADD CONSTRAINT `tbl_goal_first_g1_obj_fn_ibfk_1` FOREIGN KEY (`goal_first_g1_id`) REFERENCES `tbl_goal_first_g1` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_first_g2`
--
ALTER TABLE `tbl_goal_first_g2`
ADD CONSTRAINT `tbl_goal_first_g2_ibfk_1` FOREIGN KEY (`goal_first_th_id`) REFERENCES `tbl_goal_first_th` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_first_g2_obj_fn`
--
ALTER TABLE `tbl_goal_first_g2_obj_fn`
ADD CONSTRAINT `tbl_goal_first_g2_obj_fn_ibfk_1` FOREIGN KEY (`goal_first_g2_id`) REFERENCES `tbl_goal_first_g2` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_first_g3`
--
ALTER TABLE `tbl_goal_first_g3`
ADD CONSTRAINT `tbl_goal_first_g3_ibfk_1` FOREIGN KEY (`goal_first_th_id`) REFERENCES `tbl_goal_first_th` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_first_g3_obj_fn`
--
ALTER TABLE `tbl_goal_first_g3_obj_fn`
ADD CONSTRAINT `tbl_goal_first_g3_obj_fn_ibfk_1` FOREIGN KEY (`goal_first_g3_id`) REFERENCES `tbl_goal_first_g3` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_first_th`
--
ALTER TABLE `tbl_goal_first_th`
ADD CONSTRAINT `tbl_goal_first_th_ibfk_3` FOREIGN KEY (`modified_by`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tbl_goal_first_th_ibfk_1` FOREIGN KEY (`goal_first_id`) REFERENCES `tbl_goal_first` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tbl_goal_first_th_ibfk_2` FOREIGN KEY (`th_id`) REFERENCES `tbl_th` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_second`
--
ALTER TABLE `tbl_goal_second`
ADD CONSTRAINT `tbl_goal_second_ibfk_1` FOREIGN KEY (`fn_id`) REFERENCES `tbl_fn` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_second_g1`
--
ALTER TABLE `tbl_goal_second_g1`
ADD CONSTRAINT `tbl_goal_second_g1_ibfk_1` FOREIGN KEY (`goal_second_id`) REFERENCES `tbl_goal_second` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_second_g1_obj`
--
ALTER TABLE `tbl_goal_second_g1_obj`
ADD CONSTRAINT `tbl_goal_second_g1_obj_ibfk_1` FOREIGN KEY (`goal_second_g1_id`) REFERENCES `tbl_goal_second_g1` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_second_g2`
--
ALTER TABLE `tbl_goal_second_g2`
ADD CONSTRAINT `tbl_goal_second_g2_ibfk_1` FOREIGN KEY (`goal_second_id`) REFERENCES `tbl_goal_second` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_second_g2_obj`
--
ALTER TABLE `tbl_goal_second_g2_obj`
ADD CONSTRAINT `tbl_goal_second_g2_obj_ibfk_1` FOREIGN KEY (`goal_second_g2_id`) REFERENCES `tbl_goal_second_g2` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_second_g3`
--
ALTER TABLE `tbl_goal_second_g3`
ADD CONSTRAINT `tbl_goal_second_g3_ibfk_1` FOREIGN KEY (`goal_second_id`) REFERENCES `tbl_goal_second` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_second_g3_obj`
--
ALTER TABLE `tbl_goal_second_g3_obj`
ADD CONSTRAINT `tbl_goal_second_g3_obj_ibfk_1` FOREIGN KEY (`goal_second_g3_id`) REFERENCES `tbl_goal_second_g3` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_responsibility`
--
ALTER TABLE `tbl_responsibility`
ADD CONSTRAINT `tbl_responsibility_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `tbl_team` (`id`);

--
-- Constraints for table `tbl_risk`
--
ALTER TABLE `tbl_risk`
ADD CONSTRAINT `tbl_risk_ibfk_1` FOREIGN KEY (`th_id`) REFERENCES `tbl_th` (`id`);

--
-- Constraints for table `tbl_team_interest`
--
ALTER TABLE `tbl_team_interest`
ADD CONSTRAINT `tbl_team_interest_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `tbl_team` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_th_action`
--
ALTER TABLE `tbl_th_action`
ADD CONSTRAINT `tbl_th_action_ibfk_1` FOREIGN KEY (`th_id`) REFERENCES `tbl_th` (`id`) ON DELETE CASCADE;
