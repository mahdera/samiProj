-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2014 at 02:57 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_sami_proj`
--

-- --------------------------------------------------------
drop database if exists db_sami_proj;
create database db_sami_proj;
use db_sami_proj;
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `member_id`, `title`, `notes`, `start`, `end`) VALUES
(11, 23, '', '', '2014-11-23 00:00:00', '0000-00-00 00:00:00'),
(12, 23, 'This is my title', 'this is the note', '2014-11-23 00:00:00', '0000-00-00 00:00:00'),
(13, 23, 'she is hungry', 'this is the note', '2014-11-23 00:00:00', '0000-00-00 00:00:00'),
(14, 23, 'she is hungry', 'this is the note', '2014-11-23 00:00:00', '0000-00-00 00:00:00'),
(15, 23, 'she is hungry', 'an anger', '2014-11-23 00:00:00', '0000-00-00 00:00:00'),
(16, 23, 'she is hungry', 'an anger', '2014-11-23 00:00:00', '0000-00-00 00:00:00'),
(17, 23, 'she is hungry', 'an anger', '2014-11-23 00:00:00', '0000-00-00 00:00:00'),
(18, 23, 'title of the event', 'this is the note', '2014-11-23 00:00:00', '0000-00-00 00:00:00'),
(19, 0, 'title of the event', 'this is the note', '2014-11-23 00:00:00', '0000-00-00 00:00:00'),
(20, 0, 'what the hell', 'yes', '2014-11-23 00:00:00', '0000-00-00 00:00:00'),
(21, 2, 'pan cake', 'this is delicious', '2014-11-23 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assessment`
--

INSERT INTO `tbl_assessment` (`id`, `assessment_type`, `assessment_date`, `summary`, `modified_by`, `modification_date`) VALUES
(17, 'as1', '2014-11-22', 'This is the summary info I''m entering now. lol''s', 22, '2014-11-22 22:46:44'),
(19, 'Ass 1', '2014-11-24', 'This is the summary', 25, '2014-11-24 17:28:23'),
(23, 'Ass- Sami house', '2014-11-28', 'sldkfdlk', 22, '2014-11-28 14:46:06'),
(24, 'Ass- Sami house', '2014-11-28', 'jhgjhg', 22, '2014-11-28 14:47:18'),
(25, 'Ass 1', '2014-11-28', 'ssss', 22, '2014-11-28 14:53:08'),
(29, 'Ass- Sami house', '2014-12-02', 'This is the summary information.', 23, '2014-12-02 08:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment_lookup`
--

CREATE TABLE `tbl_assessment_lookup` (
  `id` int(11) NOT NULL,
  `value` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assessment_lookup`
--

INSERT INTO `tbl_assessment_lookup` (`id`, `value`) VALUES
(1, 'Ass 1'),
(2, 'Ass 2'),
(3, 'Ass- Sami house');

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assessment_th`
--

INSERT INTO `tbl_assessment_th` (`id`, `assessment_id`, `th_id`, `modified_by`, `modification_date`) VALUES
(24, 17, 41, 22, '2014-11-22 22:44:01'),
(25, 17, 42, 22, '2014-11-22 22:44:01'),
(28, 19, 47, 25, '2014-11-24 17:28:23'),
(29, 19, 48, 26, '2014-11-24 23:50:37'),
(30, 19, 49, 26, '2014-11-24 23:50:37'),
(35, 23, 56, 23, '2014-11-28 14:47:18'),
(40, 29, 41, 23, '2014-12-02 08:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `code`, `display_name`, `description`, `modified_by`, `modification_date`) VALUES
(1, 'First District', 'First District', '---', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fn`
--

CREATE TABLE `tbl_fn` (
  `id` bigint(20) NOT NULL,
  `fn_name` varchar(200) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL,
  `show_all` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fn`
--

INSERT INTO `tbl_fn` (`id`, `fn_name`, `modified_by`, `modification_date`, `show_all`) VALUES
(31, 'Fn1 By Biruk', 22, '2014-11-22 23:06:12', 0),
(32, 'Fn2 By Biruk', 22, '2014-11-22 23:06:18', 0),
(33, 'Fn3 By Biruk', 22, '2014-11-22 23:06:25', 0),
(34, 'Fn4 By Biruk', 22, '2014-11-22 23:06:25', 0),
(35, 'Fn5 By Biruk', 22, '2014-11-22 23:06:27', 0),
(36, 'Fn6 By Biruk', 22, '2014-11-22 23:06:28', 0),
(37, 'Fn7 By Biruk', 22, '2014-11-22 23:22:20', 0),
(38, 'ruka''s function one', 23, '2014-11-23 04:13:18', 0),
(39, 'ruka''s function two', 23, '2014-11-23 04:13:19', 0),
(40, 'ruka''s function three', 23, '2014-11-23 04:13:21', 0),
(41, 'ruka''s function four', 23, '2014-11-23 04:13:22', 0),
(42, 'ruka''s function five', 23, '2014-11-23 04:13:23', 0),
(43, 'ruka''s function six', 23, '2014-11-23 04:13:25', 0),
(44, 'Function 1', 2, '2014-11-23 00:00:00', 1),
(45, 'Function 2', 2, '2014-11-23 00:00:00', 1),
(46, 'Function 3', 2, '2014-11-23 00:00:00', 1),
(47, 'Function 4', 2, '2014-11-23 00:00:00', 1),
(48, 'Function 5', 2, '2014-11-23 00:00:00', 1),
(49, 'Function 6', 2, '2014-11-23 00:00:00', 1),
(50, 'Function 7', 2, '2014-11-23 00:00:00', 1),
(51, 'Function 8', 2, '2014-11-23 00:00:00', 1),
(52, 'Function 9', 2, '2014-11-23 00:00:00', 1),
(53, 'Function 10', 2, '2014-11-23 00:00:00', 1),
(54, 'this it ', 27, '2014-11-28 09:12:50', 0),
(55, 'Gigi the best girl', 23, '2014-11-28 15:44:34', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fn_action`
--

INSERT INTO `tbl_fn_action` (`id`, `fn_id`, `action_text`, `modified_by`, `modification_date`) VALUES
(32, 31, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of UPDATED!', 22, '2014-11-23 00:10:52'),
(34, 40, 'This is yefi entering fn action to ruka''s Fn. Now it is updated by RUKA . yesssss', 22, '2014-11-29 08:07:29'),
(35, 55, 'love. updated by biruk', 22, '2014-11-29 06:59:04'),
(37, 45, 'fdgdsgv. java', 27, '2014-12-03 08:56:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_2`
--

INSERT INTO `tbl_form_2` (`id`, `q2_1`, `q2_2`, `q2_3`, `q2_4`, `modified_by`, `modification_date`) VALUES
(12, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of updated', '', 22, '2014-11-23 00:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_3`
--

CREATE TABLE `tbl_form_3` (
  `id` bigint(20) NOT NULL,
  `q3_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_3`
--

INSERT INTO `tbl_form_3` (`id`, `q3_1`, `modified_by`, `modification_date`) VALUES
(11, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_4`
--

CREATE TABLE `tbl_form_4` (
  `id` bigint(20) NOT NULL,
  `q4_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_4`
--

INSERT INTO `tbl_form_4` (`id`, `q4_1`, `modified_by`, `modification_date`) VALUES
(9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_5`
--

CREATE TABLE `tbl_form_5` (
  `id` bigint(20) NOT NULL,
  `q5_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_5`
--

INSERT INTO `tbl_form_5` (`id`, `q5_1`, `modified_by`, `modification_date`) VALUES
(9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_6`
--

CREATE TABLE `tbl_form_6` (
  `id` bigint(20) NOT NULL,
  `q6_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_6`
--

INSERT INTO `tbl_form_6` (`id`, `q6_1`, `modified_by`, `modification_date`) VALUES
(9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_7`
--

CREATE TABLE `tbl_form_7` (
  `id` bigint(20) NOT NULL,
  `q7_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_7`
--

INSERT INTO `tbl_form_7` (`id`, `q7_1`, `modified_by`, `modification_date`) VALUES
(9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_8`
--

CREATE TABLE `tbl_form_8` (
  `id` bigint(20) NOT NULL,
  `q8_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_8`
--

INSERT INTO `tbl_form_8` (`id`, `q8_1`, `modified_by`, `modification_date`) VALUES
(10, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_9`
--

CREATE TABLE `tbl_form_9` (
  `id` bigint(20) NOT NULL,
  `q9_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_9`
--

INSERT INTO `tbl_form_9` (`id`, `q9_1`, `modified_by`, `modification_date`) VALUES
(8, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of DO YOUR JOBS VERY GOOD!', 22, '2014-11-23 00:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_10`
--

CREATE TABLE `tbl_form_10` (
  `id` bigint(20) NOT NULL,
  `q10_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_10`
--

INSERT INTO `tbl_form_10` (`id`, `q10_1`, `modified_by`, `modification_date`) VALUES
(9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:14:05'),
(12, 'asdsad', 27, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first`
--

CREATE TABLE `tbl_goal_first` (
  `id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first`
--

INSERT INTO `tbl_goal_first` (`id`, `modified_by`, `modification_date`) VALUES
(33, 27, '2014-11-29 08:37:28');

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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g1`
--

INSERT INTO `tbl_goal_first_g1` (`id`, `goal_first_th_id`, `g1`, `fn_id`, `modified_by`, `modification_date`) VALUES
(55, 57, 'g1', 44, 23, '2014-12-02 08:09:38'),
(56, 58, 'G1 entered by Yefi', 46, 27, '2014-12-02 08:10:55'),
(57, 57, 'g1', 45, 23, '2014-12-02 08:21:36'),
(58, 59, 'g1', 46, 27, '2014-12-03 08:51:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g1_obj_fn`
--

INSERT INTO `tbl_goal_first_g1_obj_fn` (`id`, `goal_first_g1_id`, `obj`, `fn_id`, `modified_by`, `modification_date`) VALUES
(59, 55, 'obj1', 53, 23, '2014-12-02 08:09:38'),
(60, 56, 'obj1', 49, 27, '2014-12-02 08:10:55'),
(61, 57, 'obj1', 51, 23, '2014-12-02 08:21:36'),
(62, 58, 'obj1', 51, 27, '2014-12-03 08:51:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g2`
--

INSERT INTO `tbl_goal_first_g2` (`id`, `goal_first_th_id`, `g2`, `fn_id`, `modified_by`, `modification_date`) VALUES
(55, 57, 'g2', 45, 23, '2014-12-02 08:09:38'),
(56, 58, 'g2', 48, 27, '2014-12-02 08:10:55'),
(57, 57, 'g2', 42, 23, '2014-12-02 08:21:36'),
(58, 59, 'g2', 41, 27, '2014-12-03 08:51:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g2_obj_fn`
--

INSERT INTO `tbl_goal_first_g2_obj_fn` (`id`, `goal_first_g2_id`, `obj`, `fn_id`, `modified_by`, `modification_date`) VALUES
(57, 55, 'obj2', 46, 23, '2014-12-02 08:09:38'),
(58, 56, 'obj2', 52, 27, '2014-12-02 08:10:55'),
(59, 57, 'obj2', 41, 23, '2014-12-02 08:21:36'),
(60, 58, 'obj2', 39, 27, '2014-12-03 08:51:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g3`
--

INSERT INTO `tbl_goal_first_g3` (`id`, `goal_first_th_id`, `g3`, `fn_id`, `modified_by`, `modification_date`) VALUES
(55, 57, 'g3', 47, 23, '2014-12-02 08:09:38'),
(56, 58, 'g3', 42, 27, '2014-12-02 08:10:55'),
(57, 57, 'g3', 46, 23, '2014-12-02 08:21:36'),
(58, 59, 'g3', 42, 27, '2014-12-03 08:51:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_g3_obj_fn`
--

INSERT INTO `tbl_goal_first_g3_obj_fn` (`id`, `goal_first_g3_id`, `obj`, `fn_id`, `modified_by`, `modification_date`) VALUES
(59, 55, 'obj4', 49, 23, '2014-12-02 08:09:38'),
(60, 56, 'obj3', 40, 27, '2014-12-02 08:10:55'),
(61, 57, 'obj3', 54, 23, '2014-12-02 08:21:36'),
(62, 58, 'obj3. This is updated here.', 52, 27, '2014-12-03 08:51:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_first_th`
--

INSERT INTO `tbl_goal_first_th` (`id`, `goal_first_id`, `th_id`, `modified_by`, `modification_date`) VALUES
(57, 33, 62, 23, '2014-12-02 08:09:38'),
(58, 33, 63, 27, '2014-12-02 08:10:55'),
(59, 33, 64, 23, '2014-12-02 08:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second`
--

CREATE TABLE `tbl_goal_second` (
  `id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second`
--

INSERT INTO `tbl_goal_second` (`id`, `modified_by`, `modification_date`) VALUES
(40, 23, '2014-11-30 09:07:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_fn`
--

INSERT INTO `tbl_goal_second_fn` (`id`, `goal_second_id`, `fn_id`, `modified_by`, `modification_date`) VALUES
(31, 40, 45, 27, '2014-12-03 08:27:56');

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g1`
--

INSERT INTO `tbl_goal_second_g1` (`id`, `goal_second_fn_id`, `g1`, `modified_by`, `modification_date`) VALUES
(54, 31, 'this is g1. edited', 27, '2014-12-03 08:56:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g1_obj`
--

INSERT INTO `tbl_goal_second_g1_obj` (`id`, `goal_second_g1_id`, `obj`, `modified_by`, `modification_date`) VALUES
(73, 54, 'this is obj1. updated.', 27, '2014-12-03 08:56:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g2`
--

INSERT INTO `tbl_goal_second_g2` (`id`, `goal_second_fn_id`, `g2`, `modified_by`, `modification_date`) VALUES
(52, 31, 'this is g2. edited.', 27, '2014-12-03 08:56:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g2_obj`
--

INSERT INTO `tbl_goal_second_g2_obj` (`id`, `goal_second_g2_id`, `obj`, `modified_by`, `modification_date`) VALUES
(68, 52, 'this is obj2. updated.', 27, '2014-12-03 08:56:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g3`
--

INSERT INTO `tbl_goal_second_g3` (`id`, `goal_second_fn_id`, `g3`, `modified_by`, `modification_date`) VALUES
(48, 31, 'this is g3. edited.', 27, '2014-12-03 08:56:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_goal_second_g3_obj`
--

INSERT INTO `tbl_goal_second_g3_obj` (`id`, `goal_second_g3_id`, `obj`, `modified_by`, `modification_date`) VALUES
(67, 48, 'this is obj3. updated. This is my final test', 27, '2014-12-03 08:56:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_risk`
--

INSERT INTO `tbl_risk` (`id`, `th_id`, `mg`, `dr`, `pr`, `wa`, `rs`, `modified_by`, `modification_date`) VALUES
(24, 41, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 22, '2014-11-22 23:03:03'),
(25, 42, 'mg2', 'dr2', 'pr2', 'wa2', 'rs2', 22, '2014-11-22 23:03:23'),
(29, 48, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 26, '2014-11-25 00:04:00'),
(30, 49, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 26, '2014-11-25 00:05:05'),
(34, 62, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 23, '2014-12-02 08:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_district`
--

CREATE TABLE `tbl_sub_district` (
  `id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_district`
--

INSERT INTO `tbl_sub_district` (`id`, `district_id`, `code`, `display_name`, `description`, `modified_by`, `modification_date`) VALUES
(1, 1, 'First Sub District - FD', 'First Sub District - FD', '---', 2, '2014-12-03'),
(2, 1, 'Second Sub District - FD', 'Second Sub District - FD', '---', 0, '0000-00-00');

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`id`, `team_name`, `title`, `organization`, `email`, `phone`, `interest`, `modified_by`, `modification_date`) VALUES
(28, 'Team Name', 'Team''s title ', 'organization of the team', 'email@gmail.com', '987987', 'Interest 1,Interest 2', 23, '2014-12-02 08:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_th`
--

INSERT INTO `tbl_th` (`id`, `th_name`, `modified_by`, `modification_date`) VALUES
(41, 'Th1 By Biruk', 22, '2014-11-22 22:46:44'),
(42, 'Th2 By Biruk', 22, '2014-11-22 22:46:44'),
(43, 'Th3 By Biruk', 22, '2014-11-22 22:50:13'),
(44, 'Th1 by Ruka. Biruk', 22, '2014-11-29 07:07:43'),
(45, 'Th2 by Ruka', 22, '2014-11-29 07:07:43'),
(47, 'This is th1', 25, '2014-11-24 17:28:23'),
(48, 'Th1 by leki', 26, '2014-11-24 23:50:37'),
(49, 'Th2 by leki', 26, '2014-11-24 23:50:37'),
(50, 'The TH One', 26, '2014-11-25 07:07:43'),
(51, 'The TH Two updated.', 26, '2014-11-25 07:07:43'),
(55, 'Thlkdjfkdj', 22, '2014-11-28 14:46:06'),
(56, 'jhgg', 22, '2014-11-28 14:47:18'),
(62, 'Th1 By Biruk', 23, '2014-12-02 08:01:59'),
(63, 'Th2 By Biruk', 23, '2014-12-02 08:02:32'),
(64, 'Th By Rahel', 23, '2014-12-02 08:12:14');

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_th_action`
--

INSERT INTO `tbl_th_action` (`id`, `th_id`, `action_text`, `modified_by`, `modification_date`) VALUES
(27, 43, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of UPDATED', 22, '2014-11-23 00:15:33'),
(28, 42, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:06:20'),
(35, 64, 'xcxcx', 27, '2014-12-03 08:51:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `last_name`, `email`, `user_id`, `password`, `phone_number`, `member_type`, `user_status`, `user_level`, `user_role`, `modified_by`, `modification_date`) VALUES
(2, 'Admin', 'Admin', 'mahderalem@gmail.com', 'root', '63a9f0ea7bb98050796b649e85481845', '39439483948', 'Admin', 'Active', 'Super User', 'Root', 0, '2014-10-09 00:00:00'),
(22, 'Biruk', 'Fikre', 'biruk@yahoo.com', 'biruk', '202cb962ac59075b964b07152d234b70', '9823749873', 'User', 'Active', '01', '01A', 2, '2014-11-28 14:29:17'),
(23, 'Rahel', 'Taye', 'rahel@gmail.com', 'rahel', '202cb962ac59075b964b07152d234b70', '983498734', 'User', 'Active', '02', '999', 2, '2014-12-03 08:17:16'),
(25, 'Mahder', 'Neway', 'mneway@americanprogress.org', 'mahder', '0f3fbc595a293952fabc8de77ae840ca', '(202) 374 3138', 'User', 'Active', '01', '01A', 2, '2014-11-24 16:43:23'),
(26, 'Lekbir', 'Gebretsadik', 'lekbirgebre@yahoo.com', 'leki', '202cb962ac59075b964b07152d234b70', '(202) 730 5250', 'User', 'Active', '02', '02A', 2, '2014-11-24 16:45:35'),
(27, 'Yefikir', 'Alemayehu', 'yefi@yahoo.com', 'yefi', '202cb962ac59075b964b07152d234b70', '98798787', 'User', 'Active', '02', '999', 2, '2014-12-03 08:17:07'),
(28, 'Miki', 'Biruk', 'miki@yahoo.com', 'miki', '202cb962ac59075b964b07152d234b70', '98798789', 'User', 'Blocked', '01', '999', 2, '2014-11-28 10:47:30'),
(29, 'Lala', 'Biruk', 'lala@yahoo.com', 'lala', '202cb962ac59075b964b07152d234b70', '87986876', 'User', 'Active', '02', '02A', 2, '2014-11-24 17:11:25'),
(30, 'Tona', 'Biruk', 'tona@yahoo.com', 'tona', '202cb962ac59075b964b07152d234b70', '98786876', 'User', 'Active', '02', '02A', 2, '2014-12-03 08:19:53'),
(31, 'New', 'User', 'newuser@yahoo.com', 'nuser', '202cb962ac59075b964b07152d234b70', '098098233', 'User', 'Pending', '02', '999', 0, '2014-12-03 07:23:53'),
(32, 'Carimah', 'Towson', 'carimah.towson@gmail.com', 'carimah', '202cb962ac59075b964b07152d234b70', '98498374837', 'User', 'Active', '01', '01A', 2, '2014-12-03 07:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_district`
--

CREATE TABLE `tbl_user_district` (
  `id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_district`
--

INSERT INTO `tbl_user_district` (`id`, `district_id`, `user_id`) VALUES
(5, 1, 25),
(6, 1, 28),
(7, 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level_lookup`
--

CREATE TABLE `tbl_user_level_lookup` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `value` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_level_lookup`
--

INSERT INTO `tbl_user_level_lookup` (`id`, `code`, `value`) VALUES
(1, '01', 'District Level'),
(2, '02', 'Sub District Level');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role_lookup`
--

CREATE TABLE `tbl_user_role_lookup` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `value` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_role_lookup`
--

INSERT INTO `tbl_user_role_lookup` (`id`, `code`, `value`) VALUES
(1, '01A', 'District Admin'),
(2, '02A', 'Sub District Admin'),
(3, '999', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_sub_district`
--

CREATE TABLE `tbl_user_sub_district` (
  `id` int(11) NOT NULL,
  `sub_district_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_sub_district`
--

INSERT INTO `tbl_user_sub_district` (`id`, `sub_district_id`, `user_id`) VALUES
(14, 1, 26),
(16, 2, 29),
(18, 1, 31),
(19, 1, 27),
(20, 1, 23),
(21, 2, 30);

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
-- Indexes for table `tbl_assessment_lookup`
--
ALTER TABLE `tbl_assessment_lookup`
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
-- Indexes for table `tbl_user_level_lookup`
--
ALTER TABLE `tbl_user_level_lookup`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_role_lookup`
--
ALTER TABLE `tbl_user_role_lookup`
ADD PRIMARY KEY (`id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `calendar_urls`
--
ALTER TABLE `calendar_urls`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_assessment`
--
ALTER TABLE `tbl_assessment`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbl_assessment_lookup`
--
ALTER TABLE `tbl_assessment_lookup`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_assessment_th`
--
ALTER TABLE `tbl_assessment_th`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_fn`
--
ALTER TABLE `tbl_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tbl_fn_action`
--
ALTER TABLE `tbl_fn_action`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tbl_form_1`
--
ALTER TABLE `tbl_form_1`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbl_form_1_q3`
--
ALTER TABLE `tbl_form_1_q3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `tbl_form_1_q4`
--
ALTER TABLE `tbl_form_1_q4`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `tbl_form_2`
--
ALTER TABLE `tbl_form_2`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_form_3`
--
ALTER TABLE `tbl_form_3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_form_4`
--
ALTER TABLE `tbl_form_4`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_form_5`
--
ALTER TABLE `tbl_form_5`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_form_6`
--
ALTER TABLE `tbl_form_6`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_form_7`
--
ALTER TABLE `tbl_form_7`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_form_8`
--
ALTER TABLE `tbl_form_8`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_form_9`
--
ALTER TABLE `tbl_form_9`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_form_10`
--
ALTER TABLE `tbl_form_10`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_goal_first`
--
ALTER TABLE `tbl_goal_first`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g1`
--
ALTER TABLE `tbl_goal_first_g1`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g1_obj_fn`
--
ALTER TABLE `tbl_goal_first_g1_obj_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g2`
--
ALTER TABLE `tbl_goal_first_g2`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g2_obj_fn`
--
ALTER TABLE `tbl_goal_first_g2_obj_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g3`
--
ALTER TABLE `tbl_goal_first_g3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g3_obj_fn`
--
ALTER TABLE `tbl_goal_first_g3_obj_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `tbl_goal_first_th`
--
ALTER TABLE `tbl_goal_first_th`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `tbl_goal_second`
--
ALTER TABLE `tbl_goal_second`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_goal_second_fn`
--
ALTER TABLE `tbl_goal_second_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g1`
--
ALTER TABLE `tbl_goal_second_g1`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g1_obj`
--
ALTER TABLE `tbl_goal_second_g1_obj`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g2`
--
ALTER TABLE `tbl_goal_second_g2`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g2_obj`
--
ALTER TABLE `tbl_goal_second_g2_obj`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g3`
--
ALTER TABLE `tbl_goal_second_g3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g3_obj`
--
ALTER TABLE `tbl_goal_second_g3_obj`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `tbl_responsibility`
--
ALTER TABLE `tbl_responsibility`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_risk`
--
ALTER TABLE `tbl_risk`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_sub_district`
--
ALTER TABLE `tbl_sub_district`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_team_interest`
--
ALTER TABLE `tbl_team_interest`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_th`
--
ALTER TABLE `tbl_th`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `tbl_th_action`
--
ALTER TABLE `tbl_th_action`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_user_district`
--
ALTER TABLE `tbl_user_district`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_user_level_lookup`
--
ALTER TABLE `tbl_user_level_lookup`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user_role_lookup`
--
ALTER TABLE `tbl_user_role_lookup`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user_sub_district`
--
ALTER TABLE `tbl_user_sub_district`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
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
ADD CONSTRAINT `tbl_sub_district_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `tbl_district` (`id`) ON DELETE CASCADE;

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
