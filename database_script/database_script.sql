-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2014 at 08:01 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `db_sami_proj`
--
create database if not exists db_sami_proj;
use db_sami_proj;

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `notes` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` VALUES(1, 0, 'First Date', 'Firsts date content goes here', '2012-08-11 07:52:29', '2012-08-11 12:52:33');
INSERT INTO `calendar` VALUES(2, 0, 'Database Appointment #2', 'Meeting for Juan ', '2012-08-23 08:43:45', '2012-08-23 09:43:50');
INSERT INTO `calendar` VALUES(3, 0, 'Test title', 'test here', '2012-08-12 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `calendar` VALUES(4, 0, 'test3', '230 test', '2012-08-29 02:30:00', '0000-00-00 00:00:00');
INSERT INTO `calendar` VALUES(6, 0, 'What a night', 'This is added by the administrator', '2014-10-18 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `calendar` VALUES(8, 0, 'This is in the past days', 'The most important part of the calendary. This line is updated. Again updated for the last time', '2014-10-10 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `calendar` VALUES(9, 0, 'Where is the calendar', 'I dont see the calendary object', '2014-10-18 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_urls`
--

CREATE TABLE `calendar_urls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `calendar_array` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `calendar_urls`
--

INSERT INTO `calendar_urls` VALUES(1, 0, '''events.php''');
INSERT INTO `calendar_urls` VALUES(2, 0, '''https://www.google.com/calendar/feeds/kelchuk68%40gmail.com/public/basic''');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment`
--

CREATE TABLE `tbl_assessment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `assessment_type` varchar(50) NOT NULL,
  `assessment_date` date NOT NULL,
  `summary` text,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_assessment`
--

INSERT INTO `tbl_assessment` VALUES(1, 'as1', '2014-10-08', 'this is the summary', 0, '0000-00-00');
INSERT INTO `tbl_assessment` VALUES(2, 'as1', '2014-10-05', 'sdfasd', 0, '0000-00-00');
INSERT INTO `tbl_assessment` VALUES(3, 'as2', '2014-10-08', 'This is the Summary written just before SCRUM lol. I love php more than Java', 0, '0000-00-00');
INSERT INTO `tbl_assessment` VALUES(4, 'as2', '2014-10-09', 'This is the summary info', 5, '2014-10-11');
INSERT INTO `tbl_assessment` VALUES(5, 'as2', '2014-10-11', 'Sample summary text', 5, '0000-00-00');
INSERT INTO `tbl_assessment` VALUES(6, 'as1', '2014-10-11', 'Summary by Abebe', 5, '0000-00-00');
INSERT INTO `tbl_assessment` VALUES(7, 'as2', '2014-10-11', 'This is the sumamry', 5, '0000-00-00');
INSERT INTO `tbl_assessment` VALUES(9, 'as1', '2014-10-17', 'This is the summary information', 2, '2014-10-17');
INSERT INTO `tbl_assessment` VALUES(10, 'as1', '2014-10-18', 'Summary of the Assessment', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment_th`
--

CREATE TABLE `tbl_assessment_th` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `assessment_id` bigint(20) NOT NULL,
  `th_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assessment_id` (`assessment_id`),
  KEY `th_id` (`th_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_assessment_th`
--

INSERT INTO `tbl_assessment_th` VALUES(1, 3, 9, 0, '0000-00-00');
INSERT INTO `tbl_assessment_th` VALUES(2, 3, 10, 0, '0000-00-00');
INSERT INTO `tbl_assessment_th` VALUES(3, 6, 11, 5, '0000-00-00');
INSERT INTO `tbl_assessment_th` VALUES(4, 6, 12, 5, '0000-00-00');
INSERT INTO `tbl_assessment_th` VALUES(5, 6, 13, 5, '0000-00-00');
INSERT INTO `tbl_assessment_th` VALUES(6, 5, 14, 5, '0000-00-00');
INSERT INTO `tbl_assessment_th` VALUES(8, 9, 18, 2, '2014-10-17');
INSERT INTO `tbl_assessment_th` VALUES(9, 9, 19, 2, '2014-10-17');
INSERT INTO `tbl_assessment_th` VALUES(10, 10, 20, 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fn`
--

CREATE TABLE `tbl_fn` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fn_name` varchar(70) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_fn`
--

INSERT INTO `tbl_fn` VALUES(1, 'sdfdsf', 0, '0000-00-00');
INSERT INTO `tbl_fn` VALUES(2, 'sdfdf', 0, '0000-00-00');
INSERT INTO `tbl_fn` VALUES(3, 'dfsf', 0, '0000-00-00');
INSERT INTO `tbl_fn` VALUES(4, 'this is mahder', 0, '0000-00-00');
INSERT INTO `tbl_fn` VALUES(5, 'LEKU the FN LOVE', 2, '2014-10-16');
INSERT INTO `tbl_fn` VALUES(6, 'MAHI love', 2, '2014-10-16');
INSERT INTO `tbl_fn` VALUES(7, 'YEFI BABES', 2, '2014-10-16');
INSERT INTO `tbl_fn` VALUES(8, 'SAMI FN', 2, '2014-10-16');
INSERT INTO `tbl_fn` VALUES(9, 'xxx', 2, '2014-10-16');
INSERT INTO `tbl_fn` VALUES(10, 'AS is', 2, '2014-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fn_action`
--

CREATE TABLE `tbl_fn_action` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fn_id` bigint(20) NOT NULL,
  `action_text` text,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fn_id` (`fn_id`),
  UNIQUE KEY `fn_id_2` (`fn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_fn_action`
--

INSERT INTO `tbl_fn_action` VALUES(1, 2, 'lkdfkj', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_1`
--

CREATE TABLE `tbl_form_1` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `form_date` date NOT NULL,
  `plan` text NOT NULL,
  `q1` text NOT NULL,
  `q2` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_form_1`
--

INSERT INTO `tbl_form_1` VALUES(10, 'this is the title', '2014-10-09', 'this is the plan', 'this is question 1', 'this is question 2', 0, '0000-00-00');
INSERT INTO `tbl_form_1` VALUES(12, 'this is the title', '2014-10-18', 'This is the plan', 'q1', 'q2', 8, '2014-10-18');
INSERT INTO `tbl_form_1` VALUES(13, 'kj', '2014-10-18', 'kjhjkh', 'jhjh', 'jm', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_1_q3`
--

CREATE TABLE `tbl_form_1_q3` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `form_1_id` bigint(20) NOT NULL,
  `col1` varchar(70) DEFAULT NULL,
  `col2` varchar(70) DEFAULT NULL,
  `col3` varchar(70) DEFAULT NULL,
  `col4` varchar(70) DEFAULT NULL,
  `col5` varchar(70) DEFAULT NULL,
  `col6` varchar(70) DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `form_1_id` (`form_1_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_form_1_q3`
--

INSERT INTO `tbl_form_1_q3` VALUES(1, 10, '1', '2', '3', '4', '5', '6', 0, '0000-00-00');
INSERT INTO `tbl_form_1_q3` VALUES(2, 10, '7', '8', '9', '10', '11', '12', 0, '0000-00-00');
INSERT INTO `tbl_form_1_q3` VALUES(3, 10, '13', '14', '15', '16', '17', '18', 0, '0000-00-00');
INSERT INTO `tbl_form_1_q3` VALUES(4, 10, '', '', '', '', '', '', 0, '0000-00-00');
INSERT INTO `tbl_form_1_q3` VALUES(7, 12, '1', '2', '3', '4', '5', '6', 8, '2014-10-18');
INSERT INTO `tbl_form_1_q3` VALUES(8, 12, '', '', '', '', '', '', 8, '2014-10-18');
INSERT INTO `tbl_form_1_q3` VALUES(9, 13, '', '', '', '', '', '', 8, '2014-10-18');
INSERT INTO `tbl_form_1_q3` VALUES(10, 13, '', '', '', '', '', '', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_1_q4`
--

CREATE TABLE `tbl_form_1_q4` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `form_1_id` bigint(20) NOT NULL,
  `col1` varchar(70) DEFAULT NULL,
  `col2` varchar(70) DEFAULT NULL,
  `col3` varchar(70) DEFAULT NULL,
  `col4` varchar(70) DEFAULT NULL,
  `col5` varchar(70) DEFAULT NULL,
  `col6` varchar(70) DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `form_1_id` (`form_1_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_form_1_q4`
--

INSERT INTO `tbl_form_1_q4` VALUES(1, 10, '', '', '', '', '', '', 0, '0000-00-00');
INSERT INTO `tbl_form_1_q4` VALUES(3, 12, '', '', '', '', '', '', 8, '2014-10-18');
INSERT INTO `tbl_form_1_q4` VALUES(4, 13, '', '', '', '', '', '', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_2`
--

CREATE TABLE `tbl_form_2` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `q2_1` text NOT NULL,
  `q2_2` text NOT NULL,
  `q2_3` text NOT NULL,
  `q2_4` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_form_2`
--

INSERT INTO `tbl_form_2` VALUES(1, '1', '2', '3', '4', 0, '0000-00-00');
INSERT INTO `tbl_form_2` VALUES(5, '1', '2', '3', '6', 8, '2014-10-18');
INSERT INTO `tbl_form_2` VALUES(6, 'jhg', 'b', 'hkjhh', 'bvb', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_3`
--

CREATE TABLE `tbl_form_3` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `q3_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_form_3`
--

INSERT INTO `tbl_form_3` VALUES(1, 'eresd', 0, '0000-00-00');
INSERT INTO `tbl_form_3` VALUES(3, 'lsdfkj', 8, '2014-10-18');
INSERT INTO `tbl_form_3` VALUES(4, 'jhkjh', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_4`
--

CREATE TABLE `tbl_form_4` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `q4_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_form_4`
--

INSERT INTO `tbl_form_4` VALUES(1, 'dvf', 0, '0000-00-00');
INSERT INTO `tbl_form_4` VALUES(2, 'What the hell?', 8, '2014-10-17');
INSERT INTO `tbl_form_4` VALUES(4, 'jhg', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_5`
--

CREATE TABLE `tbl_form_5` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `q5_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_form_5`
--

INSERT INTO `tbl_form_5` VALUES(1, 'ddsds', 0, '0000-00-00');
INSERT INTO `tbl_form_5` VALUES(4, 'jhgjhg', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_6`
--

CREATE TABLE `tbl_form_6` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `q6_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_form_6`
--

INSERT INTO `tbl_form_6` VALUES(1, 'ooo', 0, '0000-00-00');
INSERT INTO `tbl_form_6` VALUES(4, 'jhghjg', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_7`
--

CREATE TABLE `tbl_form_7` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `q7_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_form_7`
--

INSERT INTO `tbl_form_7` VALUES(1, '777ygg', 0, '0000-00-00');
INSERT INTO `tbl_form_7` VALUES(3, 'jghjg', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_8`
--

CREATE TABLE `tbl_form_8` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `q8_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_form_8`
--

INSERT INTO `tbl_form_8` VALUES(1, '888', 0, '0000-00-00');
INSERT INTO `tbl_form_8` VALUES(3, 'qwe', 8, '2014-10-18');
INSERT INTO `tbl_form_8` VALUES(4, 'ghf', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_9`
--

CREATE TABLE `tbl_form_9` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `q9_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_form_9`
--

INSERT INTO `tbl_form_9` VALUES(1, '999', 0, '0000-00-00');
INSERT INTO `tbl_form_9` VALUES(3, 'jhg', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_10`
--

CREATE TABLE `tbl_form_10` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `q10_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_form_10`
--

INSERT INTO `tbl_form_10` VALUES(1, '1010101010', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first`
--

CREATE TABLE `tbl_goal_first` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `th_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `th_id` (`th_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_goal_first`
--

INSERT INTO `tbl_goal_first` VALUES(16, 22, 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g1`
--

CREATE TABLE `tbl_goal_first_g1` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_id` bigint(20) NOT NULL,
  `g1` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_id` (`goal_first_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_goal_first_g1`
--

INSERT INTO `tbl_goal_first_g1` VALUES(15, 16, 'g1', 10, 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g1_obj_fn`
--

CREATE TABLE `tbl_goal_first_g1_obj_fn` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_g1_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_g1_id` (`goal_first_g1_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_goal_first_g1_obj_fn`
--

INSERT INTO `tbl_goal_first_g1_obj_fn` VALUES(7, 15, 'obj1', 3, 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g2`
--

CREATE TABLE `tbl_goal_first_g2` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_id` bigint(20) NOT NULL,
  `g2` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_id` (`goal_first_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_goal_first_g2`
--

INSERT INTO `tbl_goal_first_g2` VALUES(15, 16, 'g2', 5, 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g2_obj_fn`
--

CREATE TABLE `tbl_goal_first_g2_obj_fn` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_g2_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_g2_id` (`goal_first_g2_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_goal_first_g2_obj_fn`
--

INSERT INTO `tbl_goal_first_g2_obj_fn` VALUES(7, 15, 'obj2', 6, 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g3`
--

CREATE TABLE `tbl_goal_first_g3` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_id` bigint(20) NOT NULL,
  `g3` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_id` (`goal_first_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_goal_first_g3`
--

INSERT INTO `tbl_goal_first_g3` VALUES(15, 16, 'g3', 8, 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g3_obj_fn`
--

CREATE TABLE `tbl_goal_first_g3_obj_fn` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_g3_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_g3_id` (`goal_first_g3_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_goal_first_g3_obj_fn`
--

INSERT INTO `tbl_goal_first_g3_obj_fn` VALUES(7, 15, 'obj3', 2, 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second`
--

CREATE TABLE `tbl_goal_second` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fn_id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fn_id` (`fn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_goal_second`
--

INSERT INTO `tbl_goal_second` VALUES(18, 5, 8, '2014-10-18');
INSERT INTO `tbl_goal_second` VALUES(19, 6, 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g1`
--

CREATE TABLE `tbl_goal_second_g1` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_second_id` bigint(20) NOT NULL,
  `g1` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_second_id` (`goal_second_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_goal_second_g1`
--

INSERT INTO `tbl_goal_second_g1` VALUES(15, 18, 'this is g1', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g1` VALUES(16, 19, 'this is g1', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g1_obj`
--

CREATE TABLE `tbl_goal_second_g1_obj` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_second_g1_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_second_g1_id` (`goal_second_g1_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_goal_second_g1_obj`
--

INSERT INTO `tbl_goal_second_g1_obj` VALUES(9, 15, 'this is obj1', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g1_obj` VALUES(10, 16, 'this is obj1', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g1_obj` VALUES(11, 16, 'this is obj3', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g1_obj` VALUES(12, 16, 'this is obj2', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g2`
--

CREATE TABLE `tbl_goal_second_g2` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_second_id` bigint(20) NOT NULL,
  `g2` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_second_id` (`goal_second_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_goal_second_g2`
--

INSERT INTO `tbl_goal_second_g2` VALUES(13, 18, 'this is g2', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g2` VALUES(14, 19, 'this is g2', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g2_obj`
--

CREATE TABLE `tbl_goal_second_g2_obj` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_second_g2_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_second_g2_id` (`goal_second_g2_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_goal_second_g2_obj`
--

INSERT INTO `tbl_goal_second_g2_obj` VALUES(9, 13, 'this is obj2', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g2_obj` VALUES(10, 14, 'this is obj1', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g2_obj` VALUES(11, 14, 'this is obj4', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g2_obj` VALUES(12, 14, 'this is obj3', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g2_obj` VALUES(13, 14, 'this is obj2', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g3`
--

CREATE TABLE `tbl_goal_second_g3` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_second_id` bigint(20) NOT NULL,
  `g3` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_second_id` (`goal_second_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_goal_second_g3`
--

INSERT INTO `tbl_goal_second_g3` VALUES(9, 18, 'this is g3', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g3` VALUES(10, 19, 'this is g3', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g3_obj`
--

CREATE TABLE `tbl_goal_second_g3_obj` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_second_g3_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_second_g3_id` (`goal_second_g3_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_goal_second_g3_obj`
--

INSERT INTO `tbl_goal_second_g3_obj` VALUES(10, 9, 'this is obj3', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g3_obj` VALUES(11, 10, 'this is obj1', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g3_obj` VALUES(12, 10, 'this is obj5', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g3_obj` VALUES(13, 10, 'this is obj4', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g3_obj` VALUES(14, 10, 'this is obj3', 8, '2014-10-18');
INSERT INTO `tbl_goal_second_g3_obj` VALUES(15, 10, 'this is obj2', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_responsibility`
--

CREATE TABLE `tbl_responsibility` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) NOT NULL,
  `role` text,
  `responsibility` text,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_responsibility`
--

INSERT INTO `tbl_responsibility` VALUES(1, 2, 'This is the role description. This line is updated.', 'this is the responsibility textarea', 0, '0000-00-00');
INSERT INTO `tbl_responsibility` VALUES(2, 1, 'This is the second role', 'This is the second responsibility. How about this....', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_risk`
--

CREATE TABLE `tbl_risk` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `th_id` bigint(20) NOT NULL,
  `mg` varchar(50) NOT NULL,
  `dr` varchar(50) NOT NULL,
  `pr` varchar(50) NOT NULL,
  `wa` varchar(50) NOT NULL,
  `rs` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `th_id` (`th_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_risk`
--

INSERT INTO `tbl_risk` VALUES(1, 8, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 0, '0000-00-00');
INSERT INTO `tbl_risk` VALUES(2, 5, 'mg4', 'dr4', 'pr4', 'wa4', 'rs4', 0, '0000-00-00');
INSERT INTO `tbl_risk` VALUES(3, 11, 'mg3', 'dr2', 'pr3', 'wa1', 'rs4', 5, '2014-10-11');
INSERT INTO `tbl_risk` VALUES(4, 5, 'mg3', 'dr4', 'pr1', 'wa1', 'rs4', 2, '2014-10-16');
INSERT INTO `tbl_risk` VALUES(6, 18, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 2, '2014-10-17');
INSERT INTO `tbl_risk` VALUES(7, 20, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 8, '2014-10-18');
INSERT INTO `tbl_risk` VALUES(8, 20, 'mg4', 'dr4', 'pr1', 'wa4', 'rs2', 8, '2014-10-18');
INSERT INTO `tbl_risk` VALUES(9, 21, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 8, '2014-10-18');
INSERT INTO `tbl_risk` VALUES(10, 22, 'mg1', 'dr1', 'pr1', 'wa4', 'rs3', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `organization` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone` varchar(70) NOT NULL,
  `interest` varchar(70) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` VALUES(1, 'Name', 'title', 'organization', 'mahdera@yahoo.com', '2020039494', '3', 0, '0000-00-00');
INSERT INTO `tbl_team` VALUES(2, 'sdf', 'lksdjfk', 'lkdj', 'lekbirgebre@yahoo.com', '4985723984', '2', 0, '0000-00-00');
INSERT INTO `tbl_team` VALUES(3, 'sdf', 'asdf', 'asdf', 'asdf', 'asdf', '3', 0, '0000-00-00');
INSERT INTO `tbl_team` VALUES(4, 'name', 'title ', 'organization', 'email@isp.com', '099898', 'Interest 1,Interest 3,', 0, '0000-00-00');
INSERT INTO `tbl_team` VALUES(5, 'sdf', 'sdg', 'defg', 'm@gmail.com', '345', 'Interest 1,Interest 5,Interest 7,', 5, '0000-00-00');
INSERT INTO `tbl_team` VALUES(7, 'Team Mahder', 'This is the title of the team', 'Organization Info', 'mahdera@yahoo.com', '2023743138', 'Interest 1,Interest 2,', 2, '2014-10-17');
INSERT INTO `tbl_team` VALUES(8, 'Team Name', 'Title of Team', 'Organization of Team', 'emailteam@gmail.com', '878768766', 'Interest 1,Interest 5,', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team_interest`
--

CREATE TABLE `tbl_team_interest` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) NOT NULL,
  `interest_name` varchar(70) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_team_interest`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_th`
--

CREATE TABLE `tbl_th` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `th_name` varchar(70) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_th`
--

INSERT INTO `tbl_th` VALUES(1, 'sdff', 0, '0000-00-00');
INSERT INTO `tbl_th` VALUES(2, 'dfgdfg', 0, '0000-00-00');
INSERT INTO `tbl_th` VALUES(3, 'undefined', 0, '0000-00-00');
INSERT INTO `tbl_th` VALUES(4, 'A TH Name', 0, '0000-00-00');
INSERT INTO `tbl_th` VALUES(5, 'Another TH', 0, '0000-00-00');
INSERT INTO `tbl_th` VALUES(6, 'jhg', 0, '0000-00-00');
INSERT INTO `tbl_th` VALUES(7, 'ghf', 0, '0000-00-00');
INSERT INTO `tbl_th` VALUES(8, 'What Kind of Th is 42', 0, '0000-00-00');
INSERT INTO `tbl_th` VALUES(9, 'This is TH One. this better be updating', 0, '0000-00-00');
INSERT INTO `tbl_th` VALUES(10, 'This is TH Two this is the second th being edited', 0, '0000-00-00');
INSERT INTO `tbl_th` VALUES(11, 'Th1 by abebe', 5, '0000-00-00');
INSERT INTO `tbl_th` VALUES(12, 'Th2 by abebe', 5, '0000-00-00');
INSERT INTO `tbl_th` VALUES(13, 'Th3 by abebe', 5, '0000-00-00');
INSERT INTO `tbl_th` VALUES(14, 'Better be working', 5, '2014-10-11');
INSERT INTO `tbl_th` VALUES(15, 'This is yet another th created by Abebe', 5, '2014-10-11');
INSERT INTO `tbl_th` VALUES(16, 'This is th1', 2, '2014-10-16');
INSERT INTO `tbl_th` VALUES(18, 'My Sample Th1', 2, '2014-10-17');
INSERT INTO `tbl_th` VALUES(19, 'Anoter Sample Th1 By root Yes', 2, '2014-10-17');
INSERT INTO `tbl_th` VALUES(20, 'Added Th 123', 8, '2014-10-18');
INSERT INTO `tbl_th` VALUES(21, 'New Th Value', 8, '2014-10-18');
INSERT INTO `tbl_th` VALUES(22, 'Some Th', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_th_action`
--

CREATE TABLE `tbl_th_action` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `th_id` bigint(20) NOT NULL,
  `action_text` text,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `th_id` (`th_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_th_action`
--

INSERT INTO `tbl_th_action` VALUES(1, 5, 'This is the action done for Th action by Mahder Neway. This line is updated.', 0, '0000-00-00');
INSERT INTO `tbl_th_action` VALUES(2, 4, 'ffggfdg', 0, '0000-00-00');
INSERT INTO `tbl_th_action` VALUES(3, 22, 'Done', 8, '2014-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `member_type` varchar(50) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `modified_by` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` VALUES(2, 'Admin', 'Admin', 'mahderalem@gmail.com', 'root', '63a9f0ea7bb98050796b649e85481845', '39439483948', 'Admin', 'Active', 0, '2014-10-09');
INSERT INTO `tbl_user` VALUES(3, 'Lekbir', 'Gebretsadik', 'lekbirgebre@yahoo.com', 'leki', '202cb962ac59075b964b07152d234b70', '87897986', 'User', 'Active', 2, '2014-10-10');
INSERT INTO `tbl_user` VALUES(4, 'Yefikir', 'Alemayehu', 'yefi@yahoo.com', 'yefi', '81dc9bdb52d04dc20036dbd8313ed055', '---', 'User', 'Active', 2, '2014-10-10');
INSERT INTO `tbl_user` VALUES(5, 'Abebe', 'Teka', 'abebe@gmail.com', 'abebe', '202cb962ac59075b964b07152d234b70', '987987', 'User', 'Blocked', 2, '2014-10-11');
INSERT INTO `tbl_user` VALUES(6, 'Sample', 'Person', 'sample@yahoo.com', 'sample', '202cb962ac59075b964b07152d234b70', '987987', 'User', 'Active', 0, '2014-10-11');
INSERT INTO `tbl_user` VALUES(8, 'Mahder', 'Neway', 'mahdera@yahoo.com', 'mahder', '0f3fbc595a293952fabc8de77ae840ca', '2023743138', 'User', 'Active', 2, '2014-10-17');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_assessment_th`
--
ALTER TABLE `tbl_assessment_th`
  ADD CONSTRAINT `tbl_assessment_th_ibfk_4` FOREIGN KEY (`th_id`) REFERENCES `tbl_th` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_assessment_th_ibfk_3` FOREIGN KEY (`assessment_id`) REFERENCES `tbl_assessment` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `tbl_goal_first`
--
ALTER TABLE `tbl_goal_first`
  ADD CONSTRAINT `tbl_goal_first_ibfk_1` FOREIGN KEY (`th_id`) REFERENCES `tbl_th` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_first_g1`
--
ALTER TABLE `tbl_goal_first_g1`
  ADD CONSTRAINT `tbl_goal_first_g1_ibfk_1` FOREIGN KEY (`goal_first_id`) REFERENCES `tbl_goal_first` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_first_g1_obj_fn`
--
ALTER TABLE `tbl_goal_first_g1_obj_fn`
  ADD CONSTRAINT `tbl_goal_first_g1_obj_fn_ibfk_1` FOREIGN KEY (`goal_first_g1_id`) REFERENCES `tbl_goal_first_g1` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_first_g2`
--
ALTER TABLE `tbl_goal_first_g2`
  ADD CONSTRAINT `tbl_goal_first_g2_ibfk_1` FOREIGN KEY (`goal_first_id`) REFERENCES `tbl_goal_first` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_first_g2_obj_fn`
--
ALTER TABLE `tbl_goal_first_g2_obj_fn`
  ADD CONSTRAINT `tbl_goal_first_g2_obj_fn_ibfk_1` FOREIGN KEY (`goal_first_g2_id`) REFERENCES `tbl_goal_first_g2` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_first_g3`
--
ALTER TABLE `tbl_goal_first_g3`
  ADD CONSTRAINT `tbl_goal_first_g3_ibfk_1` FOREIGN KEY (`goal_first_id`) REFERENCES `tbl_goal_first` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_goal_first_g3_obj_fn`
--
ALTER TABLE `tbl_goal_first_g3_obj_fn`
  ADD CONSTRAINT `tbl_goal_first_g3_obj_fn_ibfk_1` FOREIGN KEY (`goal_first_g3_id`) REFERENCES `tbl_goal_first_g3` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `tbl_team_interest_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `tbl_team` (`id`);

--
-- Constraints for table `tbl_th_action`
--
ALTER TABLE `tbl_th_action`
  ADD CONSTRAINT `tbl_th_action_ibfk_1` FOREIGN KEY (`th_id`) REFERENCES `tbl_th` (`id`);
