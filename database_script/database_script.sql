-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2014 at 02:10 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `calendar_urls`
--

CREATE TABLE `calendar_urls` (
`id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `calendar_array` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment`
--

CREATE TABLE `tbl_assessment` (
`id` bigint(20) NOT NULL,
  `assessment_type` varchar(200) NOT NULL,
  `assessment_date` date NOT NULL,
  `summary` text,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assessment`
--

INSERT INTO `tbl_assessment` (`id`, `assessment_type`, `assessment_date`, `summary`, `modified_by`, `modification_date`) VALUES
(17, 'as1', '2014-11-22', 'This is the summary info I''m entering now. lol''s', 22, '2014-11-22 22:46:44'),
(18, 'as1', '2014-11-23', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. UPDATED.', 23, '2014-11-23 03:47:25');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assessment_th`
--

INSERT INTO `tbl_assessment_th` (`id`, `assessment_id`, `th_id`, `modified_by`, `modification_date`) VALUES
(24, 17, 41, 22, '2014-11-22 22:44:01'),
(25, 17, 42, 22, '2014-11-22 22:44:01'),
(26, 18, 44, 23, '2014-11-23 03:47:01'),
(27, 18, 45, 23, '2014-11-23 03:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
`id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `district_name`, `description`) VALUES
(1, 'First District', '---'),
(2, 'Second District', '---');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fn`
--

CREATE TABLE `tbl_fn` (
`id` bigint(20) NOT NULL,
  `fn_name` varchar(200) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fn`
--

INSERT INTO `tbl_fn` (`id`, `fn_name`, `modified_by`, `modification_date`) VALUES
(31, 'Fn1 By Biruk', 22, '2014-11-22 23:06:12'),
(32, 'Fn2 By Biruk', 22, '2014-11-22 23:06:18'),
(33, 'Fn3 By Biruk', 22, '2014-11-22 23:06:25'),
(34, 'Fn4 By Biruk', 22, '2014-11-22 23:06:25'),
(35, 'Fn5 By Biruk', 22, '2014-11-22 23:06:27'),
(36, 'Fn6 By Biruk', 22, '2014-11-22 23:06:28'),
(37, 'Fn7 By Biruk', 22, '2014-11-22 23:22:20'),
(38, 'ruka''s function one', 23, '2014-11-23 04:13:18'),
(39, 'ruka''s function two', 23, '2014-11-23 04:13:19'),
(40, 'ruka''s function three', 23, '2014-11-23 04:13:21'),
(41, 'ruka''s function four', 23, '2014-11-23 04:13:22'),
(42, 'ruka''s function five', 23, '2014-11-23 04:13:23'),
(43, 'ruka''s function six', 23, '2014-11-23 04:13:25');

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fn_action`
--

INSERT INTO `tbl_fn_action` (`id`, `fn_id`, `action_text`, `modified_by`, `modification_date`) VALUES
(32, 31, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of UPDATED!', 22, '2014-11-23 00:10:52'),
(33, 42, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nmy first update.\n\nThis is my second update.', 23, '2014-11-23 04:36:44');

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_1`
--

INSERT INTO `tbl_form_1` (`id`, `title`, `form_date`, `plan`, `q1`, `q2`, `modified_by`, `modification_date`) VALUES
(33, 'This is a sample title', '2014-11-23', 'plan', 'q1', 'q2. updated value!', 23, '2014-11-23 08:03:20'),
(34, 'This is a sample title for checkup', '2014-11-23', 'this is the plan ', 'this is q1', 'this is q2', 23, '2014-11-23 08:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_1_q3`
--

CREATE TABLE `tbl_form_1_q3` (
`id` bigint(20) NOT NULL,
  `form_1_id` bigint(20) NOT NULL,
  `row` int(11) DEFAULT NULL,
  `col` int(11) DEFAULT NULL,
  `column_value` text,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_1_q3`
--

INSERT INTO `tbl_form_1_q3` (`id`, `form_1_id`, `row`, `col`, `column_value`, `modified_by`, `modification_date`) VALUES
(59, 33, 1, 1, '1', 23, '2014-11-23 08:03:20'),
(60, 33, 1, 2, '2', 23, '2014-11-23 08:03:20'),
(61, 33, 1, 3, '3', 23, '2014-11-23 08:03:20'),
(62, 33, 1, 4, '4', 23, '2014-11-23 08:03:20'),
(99, 34, 1, 1, '1', 23, '2014-11-23 08:09:22'),
(100, 34, 1, 2, '2', 23, '2014-11-23 08:09:22'),
(101, 34, 1, 3, '3', 23, '2014-11-23 08:09:22'),
(102, 34, 1, 4, '4', 23, '2014-11-23 08:09:22'),
(103, 34, 2, 1, '5', 23, '2014-11-23 08:09:22'),
(104, 34, 2, 2, '6', 23, '2014-11-23 08:09:22'),
(105, 34, 2, 3, '7', 23, '2014-11-23 08:09:22'),
(106, 34, 2, 4, '8', 23, '2014-11-23 08:09:22'),
(107, 34, 3, 1, '9', 23, '2014-11-23 08:09:22'),
(108, 34, 3, 2, '10', 23, '2014-11-23 08:09:22'),
(109, 34, 3, 3, '11', 23, '2014-11-23 08:09:22'),
(110, 34, 3, 4, '12', 23, '2014-11-23 08:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_1_q4`
--

CREATE TABLE `tbl_form_1_q4` (
`id` bigint(20) NOT NULL,
  `form_1_id` bigint(20) NOT NULL,
  `row` int(11) DEFAULT NULL,
  `col` int(11) DEFAULT NULL,
  `column_value` text,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_1_q4`
--

INSERT INTO `tbl_form_1_q4` (`id`, `form_1_id`, `row`, `col`, `column_value`, `modified_by`, `modification_date`) VALUES
(51, 33, 1, 1, '5', 23, '2014-11-23 08:03:20'),
(52, 33, 1, 2, '6', 23, '2014-11-23 08:03:20'),
(53, 33, 1, 3, '7', 23, '2014-11-23 08:03:20'),
(54, 33, 1, 4, '8888', 23, '2014-11-23 08:03:20'),
(91, 34, 1, 1, '13', 23, '2014-11-23 08:09:22'),
(92, 34, 1, 2, '14', 23, '2014-11-23 08:09:22'),
(93, 34, 1, 3, '15', 23, '2014-11-23 08:09:22'),
(94, 34, 1, 4, '16', 23, '2014-11-23 08:09:22'),
(95, 34, 2, 1, '17', 23, '2014-11-23 08:09:22'),
(96, 34, 2, 2, '18', 23, '2014-11-23 08:09:22'),
(97, 34, 2, 3, '19', 23, '2014-11-23 08:09:22'),
(98, 34, 2, 4, '20', 23, '2014-11-23 08:09:22'),
(99, 34, 3, 1, '21', 23, '2014-11-23 08:09:22'),
(100, 34, 3, 2, '22', 23, '2014-11-23 08:09:22'),
(101, 34, 3, 3, '23', 23, '2014-11-23 08:09:22'),
(102, 34, 3, 4, '24. This is updated value.', 23, '2014-11-23 08:09:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_2`
--

INSERT INTO `tbl_form_2` (`id`, `q2_1`, `q2_2`, `q2_3`, `q2_4`, `modified_by`, `modification_date`) VALUES
(12, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of updated', '', 22, '2014-11-23 00:13:41'),
(13, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. updated.', '', 23, '2014-11-23 04:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_3`
--

CREATE TABLE `tbl_form_3` (
`id` bigint(20) NOT NULL,
  `q3_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_3`
--

INSERT INTO `tbl_form_3` (`id`, `q3_1`, `modified_by`, `modification_date`) VALUES
(11, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:13:35'),
(12, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. nice', 23, '2014-11-23 04:29:48'),
(13, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 23, '2014-11-23 04:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_4`
--

CREATE TABLE `tbl_form_4` (
`id` bigint(20) NOT NULL,
  `q4_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_4`
--

INSERT INTO `tbl_form_4` (`id`, `q4_1`, `modified_by`, `modification_date`) VALUES
(9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:13:37'),
(10, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 23, '2014-11-23 04:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_5`
--

CREATE TABLE `tbl_form_5` (
`id` bigint(20) NOT NULL,
  `q5_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_5`
--

INSERT INTO `tbl_form_5` (`id`, `q5_1`, `modified_by`, `modification_date`) VALUES
(9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:13:38'),
(10, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 23, '2014-11-23 04:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_6`
--

CREATE TABLE `tbl_form_6` (
`id` bigint(20) NOT NULL,
  `q6_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_6`
--

INSERT INTO `tbl_form_6` (`id`, `q6_1`, `modified_by`, `modification_date`) VALUES
(9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:13:46'),
(10, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 23, '2014-11-23 04:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_7`
--

CREATE TABLE `tbl_form_7` (
`id` bigint(20) NOT NULL,
  `q7_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_7`
--

INSERT INTO `tbl_form_7` (`id`, `q7_1`, `modified_by`, `modification_date`) VALUES
(9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:14:00'),
(10, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 23, '2014-11-23 04:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_8`
--

CREATE TABLE `tbl_form_8` (
`id` bigint(20) NOT NULL,
  `q8_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_8`
--

INSERT INTO `tbl_form_8` (`id`, `q8_1`, `modified_by`, `modification_date`) VALUES
(10, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:14:02'),
(11, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 23, '2014-11-23 04:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_9`
--

CREATE TABLE `tbl_form_9` (
`id` bigint(20) NOT NULL,
  `q9_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_9`
--

INSERT INTO `tbl_form_9` (`id`, `q9_1`, `modified_by`, `modification_date`) VALUES
(8, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of DO YOUR JOBS VERY GOOD!', 22, '2014-11-23 00:14:47'),
(9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 23, '2014-11-23 04:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_10`
--

CREATE TABLE `tbl_form_10` (
`id` bigint(20) NOT NULL,
  `q10_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_10`
--

INSERT INTO `tbl_form_10` (`id`, `q10_1`, `modified_by`, `modification_date`) VALUES
(9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:14:05'),
(10, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. updated', 23, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first`
--

CREATE TABLE `tbl_goal_first` (
`id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first`
--

INSERT INTO `tbl_goal_first` (`id`, `modified_by`, `modification_date`) VALUES
(29, 22, '2014-11-22 23:07:21'),
(30, 23, '2014-11-23 04:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g1`
--

CREATE TABLE `tbl_goal_first_g1` (
`id` bigint(20) NOT NULL,
  `goal_first_th_id` bigint(20) NOT NULL,
  `g1` text NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g1`
--

INSERT INTO `tbl_goal_first_g1` (`id`, `goal_first_th_id`, `g1`, `fn_id`, `modified_by`, `modification_date`) VALUES
(44, 46, 'G1 th1 by biruk', 31, 22, '2014-11-22 23:07:21'),
(45, 47, 'G1', 31, 22, '2014-11-22 23:12:57'),
(46, 48, 'Contrar''y to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 31, 22, '2014-11-23 00:15:33'),
(47, 49, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 42, 23, '2014-11-23 04:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g1_obj_fn`
--

CREATE TABLE `tbl_goal_first_g1_obj_fn` (
`id` bigint(20) NOT NULL,
  `goal_first_g1_id` bigint(20) NOT NULL,
  `obj` text NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g1_obj_fn`
--

INSERT INTO `tbl_goal_first_g1_obj_fn` (`id`, `goal_first_g1_id`, `obj`, `fn_id`, `modified_by`, `modification_date`) VALUES
(45, 44, 'obj1 th1 by biruk', 32, 22, '2014-11-22 23:07:21'),
(46, 45, 'Obj1', 31, 22, '2014-11-22 23:12:57'),
(47, 45, 'Obj1.1', 31, 22, '2014-11-22 23:12:57'),
(48, 46, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 31, 22, '2014-11-23 00:15:33'),
(49, 46, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 32, 22, '2014-11-23 00:15:33'),
(50, 46, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 32, 22, '2014-11-23 00:15:33'),
(51, 47, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 41, 23, '2014-11-23 04:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g2`
--

CREATE TABLE `tbl_goal_first_g2` (
`id` bigint(20) NOT NULL,
  `goal_first_th_id` bigint(20) NOT NULL,
  `g2` text NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g2`
--

INSERT INTO `tbl_goal_first_g2` (`id`, `goal_first_th_id`, `g2`, `fn_id`, `modified_by`, `modification_date`) VALUES
(44, 46, 'g2 th1 by biruk', 33, 22, '2014-11-22 23:07:21'),
(45, 47, 'F2', 32, 22, '2014-11-22 23:12:57'),
(46, 48, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 32, 22, '2014-11-23 00:15:33'),
(47, 49, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 38, 23, '2014-11-23 04:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g2_obj_fn`
--

CREATE TABLE `tbl_goal_first_g2_obj_fn` (
`id` bigint(20) NOT NULL,
  `goal_first_g2_id` bigint(20) NOT NULL,
  `obj` text NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g2_obj_fn`
--

INSERT INTO `tbl_goal_first_g2_obj_fn` (`id`, `goal_first_g2_id`, `obj`, `fn_id`, `modified_by`, `modification_date`) VALUES
(43, 44, 'obj2 th1 by biruk', 34, 22, '2014-11-22 23:07:21'),
(44, 45, 'Obj2', 32, 22, '2014-11-22 23:12:57'),
(45, 45, 'Obj2.1', 32, 22, '2014-11-22 23:12:57'),
(46, 46, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 31, 22, '2014-11-23 00:15:33'),
(47, 46, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 33, 22, '2014-11-23 00:15:33'),
(48, 46, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 33, 22, '2014-11-23 00:15:33'),
(49, 47, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 43, 23, '2014-11-23 04:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g3`
--

CREATE TABLE `tbl_goal_first_g3` (
`id` bigint(20) NOT NULL,
  `goal_first_th_id` bigint(20) NOT NULL,
  `g3` text NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g3`
--

INSERT INTO `tbl_goal_first_g3` (`id`, `goal_first_th_id`, `g3`, `fn_id`, `modified_by`, `modification_date`) VALUES
(44, 46, 'g3 th1 by biruk', 35, 22, '2014-11-22 23:07:21'),
(45, 47, 'G3', 33, 22, '2014-11-22 23:12:57'),
(46, 48, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 33, 22, '2014-11-23 00:15:33'),
(47, 49, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 40, 23, '2014-11-23 04:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g3_obj_fn`
--

CREATE TABLE `tbl_goal_first_g3_obj_fn` (
`id` bigint(20) NOT NULL,
  `goal_first_g3_id` bigint(20) NOT NULL,
  `obj` text NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g3_obj_fn`
--

INSERT INTO `tbl_goal_first_g3_obj_fn` (`id`, `goal_first_g3_id`, `obj`, `fn_id`, `modified_by`, `modification_date`) VALUES
(43, 44, 'obj3 th1 by biruk', 36, 22, '2014-11-22 23:07:21'),
(44, 45, 'Obj3', 33, 22, '2014-11-22 23:12:57'),
(45, 45, 'Obj3.1. This value is updated.', 33, 22, '2014-11-22 23:12:57'),
(46, 46, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 33, 22, '2014-11-23 00:15:33'),
(47, 46, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 34, 22, '2014-11-23 00:15:33'),
(48, 46, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 35, 22, '2014-11-23 00:15:33'),
(49, 46, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 36, 22, '2014-11-23 00:15:33'),
(50, 46, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 37, 22, '2014-11-23 00:15:33'),
(51, 47, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 39, 23, '2014-11-23 04:32:16');

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_th`
--

INSERT INTO `tbl_goal_first_th` (`id`, `goal_first_id`, `th_id`, `modified_by`, `modification_date`) VALUES
(46, 29, 41, 22, '2014-11-22 23:07:21'),
(47, 29, 42, 22, '2014-11-22 23:09:31'),
(48, 29, 43, 22, '2014-11-22 23:22:43'),
(49, 30, 46, 23, '2014-11-23 04:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second`
--

CREATE TABLE `tbl_goal_second` (
`id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second`
--

INSERT INTO `tbl_goal_second` (`id`, `modified_by`, `modification_date`) VALUES
(36, 22, '2014-11-22 23:57:59'),
(37, 23, '2014-11-23 04:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_fn`
--

CREATE TABLE `tbl_goal_second_fn` (
`id` bigint(20) NOT NULL,
  `goal_second_id` bigint(20) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_fn`
--

INSERT INTO `tbl_goal_second_fn` (`id`, `goal_second_id`, `fn_id`, `modified_by`, `modification_date`) VALUES
(18, 36, 31, 22, '2014-11-22 23:57:59'),
(19, 37, 42, 23, '2014-11-23 04:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g1`
--

CREATE TABLE `tbl_goal_second_g1` (
`id` bigint(20) NOT NULL,
  `goal_second_fn_id` bigint(20) NOT NULL,
  `g1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g1`
--

INSERT INTO `tbl_goal_second_g1` (`id`, `goal_second_fn_id`, `g1`, `modified_by`, `modification_date`) VALUES
(41, 18, 'It''s Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:00:19'),
(42, 19, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 23, '2014-11-23 04:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g1_obj`
--

CREATE TABLE `tbl_goal_second_g1_obj` (
`id` bigint(20) NOT NULL,
  `goal_second_g1_id` bigint(20) NOT NULL,
  `obj` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g1_obj`
--

INSERT INTO `tbl_goal_second_g1_obj` (`id`, `goal_second_g1_id`, `obj`, `modified_by`, `modification_date`) VALUES
(51, 41, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:00:19'),
(52, 41, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:00:19'),
(53, 41, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:00:19'),
(54, 41, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:00:19'),
(55, 42, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 23, '2014-11-23 04:36:44'),
(56, 42, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 23, '2014-11-23 04:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g2`
--

CREATE TABLE `tbl_goal_second_g2` (
`id` bigint(20) NOT NULL,
  `goal_second_fn_id` bigint(20) NOT NULL,
  `g2` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g2`
--

INSERT INTO `tbl_goal_second_g2` (`id`, `goal_second_fn_id`, `g2`, `modified_by`, `modification_date`) VALUES
(39, 18, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:00:19'),
(40, 19, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 23, '2014-11-23 04:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g2_obj`
--

CREATE TABLE `tbl_goal_second_g2_obj` (
`id` bigint(20) NOT NULL,
  `goal_second_g2_id` bigint(20) NOT NULL,
  `obj` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g2_obj`
--

INSERT INTO `tbl_goal_second_g2_obj` (`id`, `goal_second_g2_id`, `obj`, `modified_by`, `modification_date`) VALUES
(45, 39, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:00:19'),
(46, 39, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:00:19'),
(47, 39, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:00:19'),
(48, 39, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:00:19'),
(49, 39, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:00:19'),
(50, 40, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 23, '2014-11-23 04:36:44'),
(51, 40, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 23, '2014-11-23 04:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g3`
--

CREATE TABLE `tbl_goal_second_g3` (
`id` bigint(20) NOT NULL,
  `goal_second_fn_id` bigint(20) NOT NULL,
  `g3` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g3`
--

INSERT INTO `tbl_goal_second_g3` (`id`, `goal_second_fn_id`, `g3`, `modified_by`, `modification_date`) VALUES
(35, 18, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:00:19'),
(36, 19, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 23, '2014-11-23 04:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g3_obj`
--

CREATE TABLE `tbl_goal_second_g3_obj` (
`id` bigint(20) NOT NULL,
  `goal_second_g3_id` bigint(20) NOT NULL,
  `obj` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g3_obj`
--

INSERT INTO `tbl_goal_second_g3_obj` (`id`, `goal_second_g3_id`, `obj`, `modified_by`, `modification_date`) VALUES
(47, 35, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:00:19'),
(48, 35, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of this line is udpated', 22, '2014-11-23 00:00:19'),
(49, 36, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 23, '2014-11-23 04:36:44'),
(50, 36, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of . updated.', 23, '2014-11-23 04:36:44');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_risk`
--

CREATE TABLE `tbl_risk` (
`id` bigint(20) NOT NULL,
  `th_id` bigint(20) NOT NULL,
  `mg` text NOT NULL,
  `dr` text NOT NULL,
  `pr` text NOT NULL,
  `wa` text NOT NULL,
  `rs` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_risk`
--

INSERT INTO `tbl_risk` (`id`, `th_id`, `mg`, `dr`, `pr`, `wa`, `rs`, `modified_by`, `modification_date`) VALUES
(24, 41, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 22, '2014-11-22 23:03:03'),
(25, 42, 'mg2', 'dr2', 'pr2', 'wa2', 'rs2', 22, '2014-11-22 23:03:23'),
(26, 46, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 23, '2014-11-23 04:04:34'),
(27, 44, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 23, '2014-11-23 04:04:45'),
(28, 45, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 23, '2014-11-23 04:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_district`
--

CREATE TABLE `tbl_sub_district` (
`id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `sub_district_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_district`
--

INSERT INTO `tbl_sub_district` (`id`, `district_id`, `sub_district_name`, `description`) VALUES
(1, 1, 'First Sub District - FD', '---gigi'),
(2, 1, 'Second Sub District - FD', '---'),
(3, 2, 'First Sub District - SD', '---'),
(4, 2, 'Second Sub District - SD', '---');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
`id` bigint(20) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `interest` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`id`, `team_name`, `title`, `organization`, `email`, `phone`, `interest`, `modified_by`, `modification_date`) VALUES
(19, 'name', 'title', 'The Organization''s name', 'team@yahoo.com', '983478937', 'Interest 1,Interest 3,Interest 7,', 22, '2014-11-22 22:10:55'),
(20, 'team''s name', 'team''s title', 'team''s organization', 'email@address.com', '4804958', 'Interest 2,Interest 6', 23, '2014-11-23 03:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team_interest`
--

CREATE TABLE `tbl_team_interest` (
`id` bigint(20) NOT NULL,
  `team_id` bigint(20) NOT NULL,
  `interest_name` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_th`
--

CREATE TABLE `tbl_th` (
`id` bigint(20) NOT NULL,
  `th_name` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_th`
--

INSERT INTO `tbl_th` (`id`, `th_name`, `modified_by`, `modification_date`) VALUES
(41, 'Th1 By Biruk', 22, '2014-11-22 22:46:44'),
(42, 'Th2 By Biruk', 22, '2014-11-22 22:46:44'),
(43, 'Th3 By Biruk', 22, '2014-11-22 22:50:13'),
(44, 'Th1 by Ruka', 23, '2014-11-23 03:47:25'),
(45, 'Th2 by Ruka', 23, '2014-11-23 03:47:25'),
(46, 'Th''s created by Ruka', 23, '2014-11-23 03:49:56');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_th_action`
--

INSERT INTO `tbl_th_action` (`id`, `th_id`, `action_text`, `modified_by`, `modification_date`) VALUES
(27, 43, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of UPDATED', 22, '2014-11-23 00:15:33'),
(28, 42, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:06:20'),
(29, 46, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\n\nupdated by mahder neway!\n\nanother update.', 23, '2014-11-23 04:32:16');

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
  `user_level` varchar(20) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `last_name`, `email`, `user_id`, `password`, `phone_number`, `member_type`, `user_status`, `user_level`, `user_role`, `modified_by`, `modification_date`) VALUES
(2, 'Admin', 'Admin', 'mahderalem@gmail.com', 'root', '63a9f0ea7bb98050796b649e85481845', '39439483948', 'Admin', 'Active', 'Super User', 'Root', 0, '2014-10-09 00:00:00'),
(22, 'Biruk', 'Fikre', 'biruk@yahoo.com', 'biruk', '202cb962ac59075b964b07152d234b70', '9823749873', 'User', 'Active', 'District Level', 'User', 2, '2014-11-22 21:57:25'),
(23, 'Rahel', 'Taye', 'rahel@gmail.com', 'rahel', '202cb962ac59075b964b07152d234b70', '983498734', 'User', 'Active', 'Sub District Level', 'User', 2, '2014-11-23 03:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_district`
--

CREATE TABLE `tbl_user_district` (
`id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_district`
--

INSERT INTO `tbl_user_district` (`id`, `district_id`, `user_id`) VALUES
(4, 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_sub_district`
--

CREATE TABLE `tbl_user_sub_district` (
`id` int(11) NOT NULL,
  `sub_district_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_sub_district`
--

INSERT INTO `tbl_user_sub_district` (`id`, `sub_district_id`, `user_id`) VALUES
(13, 3, 23);

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
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fn`
--
ALTER TABLE `tbl_fn`
 ADD PRIMARY KEY (`id`), ADD KEY `modifiedByFk` (`modified_by`);

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
 ADD PRIMARY KEY (`id`), ADD KEY `modifiedByFk` (`modified_by`);

--
-- Indexes for table `tbl_goal_second_fn`
--
ALTER TABLE `tbl_goal_second_fn`
 ADD PRIMARY KEY (`id`), ADD KEY `tbl_goal_second_fn_ibfk_1` (`goal_second_id`), ADD KEY `tbl_goal_second_fn_ibfk_2` (`fn_id`), ADD KEY `tbl_goal_second_fn_ibfk_3` (`modified_by`);

--
-- Indexes for table `tbl_goal_second_g1`
--
ALTER TABLE `tbl_goal_second_g1`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_second_id` (`goal_second_fn_id`);

--
-- Indexes for table `tbl_goal_second_g1_obj`
--
ALTER TABLE `tbl_goal_second_g1_obj`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_second_g1_id` (`goal_second_g1_id`);

--
-- Indexes for table `tbl_goal_second_g2`
--
ALTER TABLE `tbl_goal_second_g2`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_second_id` (`goal_second_fn_id`);

--
-- Indexes for table `tbl_goal_second_g2_obj`
--
ALTER TABLE `tbl_goal_second_g2_obj`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_second_g2_id` (`goal_second_g2_id`);

--
-- Indexes for table `tbl_goal_second_g3`
--
ALTER TABLE `tbl_goal_second_g3`
 ADD PRIMARY KEY (`id`), ADD KEY `goal_second_fn_id` (`goal_second_fn_id`);

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
-- Indexes for table `tbl_sub_district`
--
ALTER TABLE `tbl_sub_district`
 ADD PRIMARY KEY (`id`), ADD KEY `district_id` (`district_id`);

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
-- Indexes for table `tbl_user_district`
--
ALTER TABLE `tbl_user_district`
 ADD PRIMARY KEY (`id`), ADD KEY `tbl_user_district_ibfk_2` (`user_id`), ADD KEY `tbl_user_district_ibfk_1` (`district_id`);

--
-- Indexes for table `tbl_user_sub_district`
--
ALTER TABLE `tbl_user_sub_district`
 ADD PRIMARY KEY (`id`), ADD KEY `tbl_user_sub_district_ibfk_1` (`sub_district_id`), ADD KEY `tbl_user_sub_district_ibfk_2` (`user_id`);

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
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_assessment_th`
--
ALTER TABLE `tbl_assessment_th`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_fn`
--
ALTER TABLE `tbl_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tbl_fn_action`
--
ALTER TABLE `tbl_fn_action`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tbl_form_1`
--
ALTER TABLE `tbl_form_1`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_form_1_q3`
--
ALTER TABLE `tbl_form_1_q3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `tbl_form_1_q4`
--
ALTER TABLE `tbl_form_1_q4`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `tbl_form_2`
--
ALTER TABLE `tbl_form_2`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_form_3`
--
ALTER TABLE `tbl_form_3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_form_4`
--
ALTER TABLE `tbl_form_4`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_form_5`
--
ALTER TABLE `tbl_form_5`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_form_6`
--
ALTER TABLE `tbl_form_6`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_form_7`
--
ALTER TABLE `tbl_form_7`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_form_8`
--
ALTER TABLE `tbl_form_8`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_form_9`
--
ALTER TABLE `tbl_form_9`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_form_10`
--
ALTER TABLE `tbl_form_10`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_goal_first`
--
ALTER TABLE `tbl_goal_first`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g1`
--
ALTER TABLE `tbl_goal_first_g1`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g1_obj_fn`
--
ALTER TABLE `tbl_goal_first_g1_obj_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g2`
--
ALTER TABLE `tbl_goal_first_g2`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g2_obj_fn`
--
ALTER TABLE `tbl_goal_first_g2_obj_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g3`
--
ALTER TABLE `tbl_goal_first_g3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g3_obj_fn`
--
ALTER TABLE `tbl_goal_first_g3_obj_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tbl_goal_first_th`
--
ALTER TABLE `tbl_goal_first_th`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tbl_goal_second`
--
ALTER TABLE `tbl_goal_second`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tbl_goal_second_fn`
--
ALTER TABLE `tbl_goal_second_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g1`
--
ALTER TABLE `tbl_goal_second_g1`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g1_obj`
--
ALTER TABLE `tbl_goal_second_g1_obj`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g2`
--
ALTER TABLE `tbl_goal_second_g2`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g2_obj`
--
ALTER TABLE `tbl_goal_second_g2_obj`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g3`
--
ALTER TABLE `tbl_goal_second_g3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g3_obj`
--
ALTER TABLE `tbl_goal_second_g3_obj`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tbl_responsibility`
--
ALTER TABLE `tbl_responsibility`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_risk`
--
ALTER TABLE `tbl_risk`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_sub_district`
--
ALTER TABLE `tbl_sub_district`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_team_interest`
--
ALTER TABLE `tbl_team_interest`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_th`
--
ALTER TABLE `tbl_th`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tbl_th_action`
--
ALTER TABLE `tbl_th_action`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_user_district`
--
ALTER TABLE `tbl_user_district`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_user_sub_district`
--
ALTER TABLE `tbl_user_sub_district`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
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
ADD CONSTRAINT `tbl_goal_first_th_ibfk_1` FOREIGN KEY (`goal_first_id`) REFERENCES `tbl_goal_first` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tbl_goal_first_th_ibfk_2` FOREIGN KEY (`th_id`) REFERENCES `tbl_th` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tbl_goal_first_th_ibfk_3` FOREIGN KEY (`modified_by`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_second`
--
ALTER TABLE `tbl_goal_second`
ADD CONSTRAINT `tbl_goal_second_ibfk_1` FOREIGN KEY (`modified_by`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_second_fn`
--
ALTER TABLE `tbl_goal_second_fn`
ADD CONSTRAINT `tbl_goal_second_fn_ibfk_1` FOREIGN KEY (`goal_second_id`) REFERENCES `tbl_goal_second` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tbl_goal_second_fn_ibfk_2` FOREIGN KEY (`fn_id`) REFERENCES `tbl_fn` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tbl_goal_second_fn_ibfk_3` FOREIGN KEY (`modified_by`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_second_g1`
--
ALTER TABLE `tbl_goal_second_g1`
ADD CONSTRAINT `tbl_goal_second_g1_ibfk_1` FOREIGN KEY (`goal_second_fn_id`) REFERENCES `tbl_goal_second_fn` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_second_g1_obj`
--
ALTER TABLE `tbl_goal_second_g1_obj`
ADD CONSTRAINT `tbl_goal_second_g1_obj_ibfk_1` FOREIGN KEY (`goal_second_g1_id`) REFERENCES `tbl_goal_second_g1` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_second_g2`
--
ALTER TABLE `tbl_goal_second_g2`
ADD CONSTRAINT `tbl_goal_second_g2_ibfk_1` FOREIGN KEY (`goal_second_fn_id`) REFERENCES `tbl_goal_second_fn` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_second_g2_obj`
--
ALTER TABLE `tbl_goal_second_g2_obj`
ADD CONSTRAINT `tbl_goal_second_g2_obj_ibfk_1` FOREIGN KEY (`goal_second_g2_id`) REFERENCES `tbl_goal_second_g2` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_second_g3`
--
ALTER TABLE `tbl_goal_second_g3`
ADD CONSTRAINT `tbl_goal_second_g3_ibfk_1` FOREIGN KEY (`goal_second_fn_id`) REFERENCES `tbl_goal_second_fn` (`id`) ON DELETE CASCADE;

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
ADD CONSTRAINT `tbl_risk_ibfk_1` FOREIGN KEY (`th_id`) REFERENCES `tbl_th` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_sub_district`
--
ALTER TABLE `tbl_sub_district`
ADD CONSTRAINT `tbl_sub_district_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `tbl_district` (`id`);

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

--
-- Constraints for table `tbl_user_district`
--
ALTER TABLE `tbl_user_district`
ADD CONSTRAINT `tbl_user_district_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `tbl_district` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tbl_user_district_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_user_sub_district`
--
ALTER TABLE `tbl_user_sub_district`
ADD CONSTRAINT `tbl_user_sub_district_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tbl_user_sub_district_ibfk_1` FOREIGN KEY (`sub_district_id`) REFERENCES `tbl_sub_district` (`id`) ON DELETE CASCADE;
