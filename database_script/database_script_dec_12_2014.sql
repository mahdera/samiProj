-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2014 at 01:25 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_sami_proj`
--
drop database if exists db_sami_proj;
create database db_sami_proj;
use db_sami_proj;
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
  ) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_assessment`
  --

  INSERT INTO `tbl_assessment` (`id`, `assessment_type`, `assessment_date`, `summary`, `modified_by`, `modification_date`) VALUES
  (30, 'Ass 1', '2014-12-03', 'This is the summary info. updated. last edited by Bre. Buki', 34, '2014-12-13 08:18:43'),
  (31, 'Ass- Sami house', '2014-12-04', 'This is the summary info by Bre. Mahi added something to it', 34, '2014-12-13 08:22:15'),
  (34, 'Ass 1', '2014-12-04', 'This is the summary info by Wondisho - the great', 34, '2014-12-13 08:23:00'),
  (36, 'Ass 2', '2014-12-05', 'sdf', 34, '2014-12-05 08:51:14'),
  (37, 'Ass 2', '2014-12-05', 'sdf. Why is the summary similar?', 34, '2014-12-14 06:55:57'),
  (38, 'Ass 2', '2014-12-05', 'sdf. This value is updated.', 34, '2014-12-13 22:48:32'),
  (39, 'Ass 1', '2014-12-14', 'summary', 34, '2014-12-14 06:55:35'),
  (40, 'Ass 1', '2014-12-14', 'summary', 34, '2014-12-14 06:55:35');

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
  ) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_assessment_th`
  --

  INSERT INTO `tbl_assessment_th` (`id`, `assessment_id`, `th_id`, `modified_by`, `modification_date`) VALUES
  (41, 30, 66, 35, '2014-12-03 23:58:47'),
  (42, 30, 67, 35, '2014-12-03 23:58:47'),
  (43, 31, 68, 34, '2014-12-04 07:37:08'),
  (44, 31, 69, 34, '2014-12-04 07:37:08'),
  (45, 31, 70, 34, '2014-12-04 07:37:08'),
  (46, 34, 71, 34, '2014-12-04 07:56:05'),
  (47, 34, 72, 34, '2014-12-04 07:56:05'),
  (48, 36, 74, 34, '2014-12-05 08:51:14'),
  (49, 36, 75, 34, '2014-12-05 08:51:14'),
  (50, 36, 75, 34, '2014-12-05 08:51:14'),
  (51, 39, 77, 34, '2014-12-14 06:55:35'),
  (52, 39, 78, 34, '2014-12-14 06:55:35');

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
  ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_district`
  --

  INSERT INTO `tbl_district` (`id`, `code`, `display_name`, `description`, `modified_by`, `modification_date`) VALUES
  (1, 'First District.', 'First District.', '---', 33, '2014-12-11');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tbl_event_calendar`
  --

  CREATE TABLE `tbl_event_calendar` (
    `id` bigint(20) NOT NULL,
    `title` varchar(255) NOT NULL,
    `body` text NOT NULL,
    `start_time` varchar(100) NOT NULL,
    `end_time` varchar(100) NOT NULL,
    `modified_by` int(11) NOT NULL,
    `modification_date` datetime NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_event_calendar`
  --

  INSERT INTO `tbl_event_calendar` (`id`, `title`, `body`, `start_time`, `end_time`, `modified_by`, `modification_date`) VALUES
  (2, 'this is the title', 'this is the body. This is one of the best pic ever', '2014-12-11T08:15:00+01:00', '2014-12-11T08:45:00+01:00', 33, '2014-12-11 13:59:19'),
  (3, 'another title', 'another body', '2014-12-10T08:00:00+01:00', '2014-12-10T08:30:00+01:00', 33, '2014-12-11 13:20:46'),
  (4, 'this is my plan for Friday', 'And this is the event detail that is going to take place on Friday. updated.', '2014-12-12T08:00:00+01:00', '2014-12-12T08:30:00+01:00', 33, '2014-12-11 13:59:00'),
  (5, 'I would like to....UPDATED', 'I would like to take a nap right now', '2014-12-11T14:00:00+01:00', '2014-12-11T14:30:00+01:00', 34, '2014-12-11 14:56:40'),
  (6, 'This is the event', 'This is the body of the event, updated.', '2014-12-11T10:15:00+01:00', '2014-12-11T10:45:00+01:00', 33, '2014-12-14 09:28:43'),
  (7, 'What a Day', 'This Saturday was amazing and I really enjoyed it.', '2014-12-13T09:15:00+01:00', '2014-12-13T09:45:00+01:00', 33, '2014-12-13 21:59:28');

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
  ) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

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
  (55, 'Gigi the best girl', 23, '2014-11-28 15:44:34', 0),
  (56, 'Other fn by Mahder ', 29, '2014-12-03 16:49:45', 0);

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
  ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_fn_action`
  --

  INSERT INTO `tbl_fn_action` (`id`, `fn_id`, `action_text`, `modified_by`, `modification_date`) VALUES
  (1, 44, 'I am goin gto hit the bed', 44, '2014-12-17 23:02:47');

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
  ) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_form_1`
  --

  INSERT INTO `tbl_form_1` (`id`, `title`, `form_date`, `plan`, `q1`, `q2`, `modified_by`, `modification_date`) VALUES
  (39, 'This is the title', '2014-12-03', 'This is the plan', 'this is question one', 'this is question two', 27, '2014-12-03 10:37:25'),
  (40, 'Form one\\''s title', '2014-12-03', 'Form one\\''s plan', 'Question one', 'Question two', 29, '2014-12-03 16:51:59'),
  (41, 'Team\\''s Title Here', '2014-12-03', 'Team\\''s Plan Here', '1\\''s', '2\\''s', 29, '2014-12-03 16:57:15'),
  (42, 'title by zele', '2014-12-04', 'this is the plan by zele. last updated by Bre', 'q1', 'q2', 34, '2014-12-04 07:48:17'),
  (43, 'wondiso title', '2014-12-04', 'plan', '1', '2', 34, '2014-12-04 08:16:35'),
  (44, 'jkh', '2014-12-05', 'kjhkj', 'jhgjhg', 'jhg. This is updated.', 44, '2014-12-18 06:51:58');

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
  ) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_form_1_q3`
  --

  INSERT INTO `tbl_form_1_q3` (`id`, `form_1_id`, `row`, `col`, `column_value`, `modified_by`, `modification_date`) VALUES
  (135, 39, 1, 1, '1', 27, '2014-12-03 10:37:25'),
  (136, 39, 1, 2, '2', 27, '2014-12-03 10:37:25'),
  (137, 39, 1, 3, '3', 27, '2014-12-03 10:37:25'),
  (138, 39, 1, 4, '4', 27, '2014-12-03 10:37:25'),
  (139, 40, 1, 1, '1', 29, '2014-12-03 16:51:59'),
  (140, 40, 1, 2, '2', 29, '2014-12-03 16:51:59'),
  (141, 40, 1, 3, '3', 29, '2014-12-03 16:51:59'),
  (142, 40, 1, 4, '4', 29, '2014-12-03 16:51:59'),
  (143, 41, 1, 1, '1', 29, '2014-12-03 16:57:15'),
  (144, 41, 1, 2, '2', 29, '2014-12-03 16:57:15'),
  (145, 41, 1, 3, '3', 29, '2014-12-03 16:57:15'),
  (146, 41, 1, 4, '4', 29, '2014-12-03 16:57:15'),
  (151, 42, 1, 1, '1', 34, '2014-12-04 07:48:17'),
  (152, 42, 1, 2, '2', 34, '2014-12-04 07:48:17'),
  (153, 42, 1, 3, '3', 34, '2014-12-04 07:48:17'),
  (154, 42, 1, 4, '4', 34, '2014-12-04 07:48:17'),
  (155, 43, 1, 1, '1', 34, '2014-12-04 08:16:35'),
  (156, 43, 1, 2, '2', 34, '2014-12-04 08:16:35'),
  (157, 43, 1, 3, '3', 34, '2014-12-04 08:16:35'),
  (158, 43, 1, 4, '4', 34, '2014-12-04 08:16:35'),
  (167, 44, 1, 1, '1', 33, '2014-12-18 06:51:58'),
  (168, 44, 1, 2, '2', 33, '2014-12-18 06:51:58'),
  (169, 44, 1, 3, '3', 33, '2014-12-18 06:51:58'),
  (170, 44, 1, 4, '4', 33, '2014-12-18 06:51:58'),
  (171, 44, 2, 1, '5', 33, '2014-12-18 06:51:58'),
  (172, 44, 2, 2, '6', 33, '2014-12-18 06:51:58'),
  (173, 44, 2, 3, '7', 33, '2014-12-18 06:51:58'),
  (174, 44, 2, 4, '8', 33, '2014-12-18 06:51:58');

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
  ) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_form_1_q4`
  --

  INSERT INTO `tbl_form_1_q4` (`id`, `form_1_id`, `row`, `col`, `column_value`, `modified_by`, `modification_date`) VALUES
  (127, 39, 1, 1, '5', 27, '2014-12-03 10:37:25'),
  (128, 39, 1, 2, '6', 27, '2014-12-03 10:37:25'),
  (129, 39, 1, 3, '7', 27, '2014-12-03 10:37:25'),
  (130, 39, 1, 4, '8', 27, '2014-12-03 10:37:25'),
  (131, 40, 1, 1, '5', 29, '2014-12-03 16:51:59'),
  (132, 40, 1, 2, '6', 29, '2014-12-03 16:51:59'),
  (133, 40, 1, 3, '7', 29, '2014-12-03 16:51:59'),
  (134, 40, 1, 4, '8', 29, '2014-12-03 16:51:59'),
  (135, 41, 1, 1, '5', 29, '2014-12-03 16:57:15'),
  (136, 41, 1, 2, '6', 29, '2014-12-03 16:57:15'),
  (137, 41, 1, 3, '7', 29, '2014-12-03 16:57:15'),
  (138, 41, 1, 4, '8', 29, '2014-12-03 16:57:15'),
  (143, 42, 1, 1, '5', 34, '2014-12-04 07:48:17'),
  (144, 42, 1, 2, '6', 34, '2014-12-04 07:48:17'),
  (145, 42, 1, 3, '7', 34, '2014-12-04 07:48:17'),
  (146, 42, 1, 4, '8', 34, '2014-12-04 07:48:17'),
  (147, 43, 1, 1, '5', 34, '2014-12-04 08:16:35'),
  (148, 43, 1, 2, '6', 34, '2014-12-04 08:16:35'),
  (149, 43, 1, 3, '7', 34, '2014-12-04 08:16:35'),
  (150, 43, 1, 4, '8', 34, '2014-12-04 08:16:35'),
  (159, 44, 1, 1, '9', 33, '2014-12-18 06:51:58'),
  (160, 44, 1, 2, '10', 33, '2014-12-18 06:51:58'),
  (161, 44, 1, 3, '11', 33, '2014-12-18 06:51:58'),
  (162, 44, 1, 4, '12', 33, '2014-12-18 06:51:58'),
  (163, 44, 2, 1, '13', 33, '2014-12-18 06:51:58'),
  (164, 44, 2, 2, '14', 33, '2014-12-18 06:51:58'),
  (165, 44, 2, 3, '15', 33, '2014-12-18 06:51:58'),
  (166, 44, 2, 4, '16', 33, '2014-12-18 06:51:58');

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
  (12, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of updated', '', 22, '2014-11-23 00:13:41'),
  (13, 'q2.1', 'q2.2', 'q2.3', '', 35, '2014-12-04 06:23:11'),
  (14, '1', '2', '3', '', 34, '2014-12-04 08:16:45');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tbl_form_3`
  --

  CREATE TABLE `tbl_form_3` (
    `id` bigint(20) NOT NULL,
    `q3_1` text NOT NULL,
    `modified_by` int(11) NOT NULL,
    `modification_date` datetime NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_form_3`
  --

  INSERT INTO `tbl_form_3` (`id`, `q3_1`, `modified_by`, `modification_date`) VALUES
  (11, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:13:35'),
  (15, 'form 3', 35, '2014-12-04 06:23:34'),
  (16, 'Form 3 by wondisho', 44, '2014-12-18 06:41:18');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tbl_form_4`
  --

  CREATE TABLE `tbl_form_4` (
    `id` bigint(20) NOT NULL,
    `q4_1` text NOT NULL,
    `modified_by` int(11) NOT NULL,
    `modification_date` datetime NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_form_4`
  --

  INSERT INTO `tbl_form_4` (`id`, `q4_1`, `modified_by`, `modification_date`) VALUES
  (9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:13:37'),
  (12, 'This is form 4', 35, '2014-12-04 06:26:01'),
  (13, 'This is form 4 by wondisho', 34, '2014-12-04 08:17:14');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tbl_form_5`
  --

  CREATE TABLE `tbl_form_5` (
    `id` bigint(20) NOT NULL,
    `q5_1` text NOT NULL,
    `modified_by` int(11) NOT NULL,
    `modification_date` datetime NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_form_5`
  --

  INSERT INTO `tbl_form_5` (`id`, `q5_1`, `modified_by`, `modification_date`) VALUES
  (9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:13:38'),
  (12, 'This is form 5', 35, '2014-12-04 06:26:13'),
  (13, 'This is form 5 by wondisho. This better be working...', 44, '2014-12-18 07:03:41');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tbl_form_6`
  --

  CREATE TABLE `tbl_form_6` (
    `id` bigint(20) NOT NULL,
    `q6_1` text NOT NULL,
    `modified_by` int(11) NOT NULL,
    `modification_date` datetime NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_form_6`
  --

  INSERT INTO `tbl_form_6` (`id`, `q6_1`, `modified_by`, `modification_date`) VALUES
  (9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:13:46'),
  (12, 'This is form 6. That''s the way it''s', 35, '2014-12-04 06:26:27'),
  (13, 'This is form 6 by wondisho', 34, '2014-12-04 08:17:46');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tbl_form_7`
  --

  CREATE TABLE `tbl_form_7` (
    `id` bigint(20) NOT NULL,
    `q7_1` text NOT NULL,
    `modified_by` int(11) NOT NULL,
    `modification_date` datetime NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_form_7`
  --

  INSERT INTO `tbl_form_7` (`id`, `q7_1`, `modified_by`, `modification_date`) VALUES
  (9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:14:00'),
  (12, 'This''s Form 7', 35, '2014-12-04 06:26:44'),
  (13, 'This is form 7 by wondisho', 34, '2014-12-04 08:17:57'),
  (14, 'hi', 34, '2014-12-10 09:04:16');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tbl_form_8`
  --

  CREATE TABLE `tbl_form_8` (
    `id` bigint(20) NOT NULL,
    `q8_1` text NOT NULL,
    `modified_by` int(11) NOT NULL,
    `modification_date` datetime NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_form_8`
  --

  INSERT INTO `tbl_form_8` (`id`, `q8_1`, `modified_by`, `modification_date`) VALUES
  (10, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:14:02'),
  (13, 'This''s Form 8', 35, '2014-12-04 06:26:52'),
  (14, 'This is form 8 by wondisho', 34, '2014-12-04 08:18:09'),
  (15, 'hahaha. updated.', 34, '2014-12-14 07:09:42');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tbl_form_9`
  --

  CREATE TABLE `tbl_form_9` (
    `id` bigint(20) NOT NULL,
    `q9_1` text NOT NULL,
    `modified_by` int(11) NOT NULL,
    `modification_date` datetime NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_form_9`
  --

  INSERT INTO `tbl_form_9` (`id`, `q9_1`, `modified_by`, `modification_date`) VALUES
  (8, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of DO YOUR JOBS VERY GOOD!', 22, '2014-11-23 00:14:47'),
  (11, 'This''s Form 9', 35, '2014-12-04 06:26:59'),
  (12, 'This is form 9 by wondisho', 34, '2014-12-04 08:18:20');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tbl_form_10`
  --

  CREATE TABLE `tbl_form_10` (
    `id` bigint(20) NOT NULL,
    `q10_1` text NOT NULL,
    `modified_by` int(11) NOT NULL,
    `modification_date` datetime NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_form_10`
  --

  INSERT INTO `tbl_form_10` (`id`, `q10_1`, `modified_by`, `modification_date`) VALUES
  (9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of ', 22, '2014-11-23 00:14:05'),
  (13, 'This is Form 10 added by Wondisho!', 33, '2014-12-04 08:10:22'),
  (14, 'Form 10 By Wondisho', 34, '2014-12-04 08:11:37'),
  (15, 'This is another form 10 by wondisho', 34, '2014-12-04 08:18:33'),
  (16, 'it better be working by wondisho', 34, '2014-12-09 06:49:09'),
  (17, 'It better be working by Bre', 34, '2014-12-09 06:49:58'),
  (18, 'It better be working by Zele', 35, '2014-12-09 06:51:10');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tbl_goal_first`
  --

  CREATE TABLE `tbl_goal_first` (
    `id` bigint(20) NOT NULL,
    `modified_by` int(11) NOT NULL,
    `modification_date` datetime NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_goal_first`
  --

  INSERT INTO `tbl_goal_first` (`id`, `modified_by`, `modification_date`) VALUES
  (35, 35, '2014-12-04 07:08:24');

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
  ) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

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
  ) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

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
  ) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

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
  ) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

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
  ) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

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
  ) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

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
  ) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

  -- --------------------------------------------------------

  --
  -- Table structure for table `tbl_goal_second`
  --

  CREATE TABLE `tbl_goal_second` (
    `id` bigint(20) NOT NULL,
    `modified_by` int(11) NOT NULL,
    `modification_date` datetime NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_goal_second`
  --

  INSERT INTO `tbl_goal_second` (`id`, `modified_by`, `modification_date`) VALUES
  (41, 35, '2014-12-04 07:11:32');

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
  ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
  ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
  ) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

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
  ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
  ) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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
  ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
  ) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

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
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_risk`
  --

  INSERT INTO `tbl_risk` (`id`, `th_id`, `mg`, `dr`, `pr`, `wa`, `rs`, `modified_by`, `modification_date`) VALUES
  (24, 41, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 22, '2014-11-22 23:03:03'),
  (25, 42, 'mg2', 'dr2', 'pr2', 'wa2', 'rs2', 22, '2014-11-22 23:03:23'),
  (35, 65, 'mg1', 'dr1', 'pr1', 'wa3', 'rs3', 29, '2014-12-03 16:48:20'),
  (36, 75, 'mg1', 'dr1', 'pr1', 'wa2', 'rs4', 34, '2014-12-13 08:28:39'),
  (37, 69, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 34, '2014-12-04 07:43:15'),
  (38, 73, 'mg1', 'dr1', 'pr1', 'wa1', 'rs1', 34, '2014-12-04 08:00:59'),
  (39, 77, 'mg1', 'dr4', 'pr1', 'wa2', 'rs2', 34, '2014-12-14 07:03:55');

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
  ) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_sub_district`
  --

  INSERT INTO `tbl_sub_district` (`id`, `district_id`, `code`, `display_name`, `description`, `modified_by`, `modification_date`) VALUES
  (1, 1, 'First Sub District - FD i love u', 'First Sub District - FD i love u', '---', 33, '2014-12-12'),
  (2, 1, 'Second Sub District - FD - updated. Final UPdate. I need to sleep', 'Second Sub District - FD - updated. Final UPdate. I need to sleep', '---', 33, '2014-12-15'),
  (3, 1, 'Sample Sub District - updated.', 'Sample Sub District - updated.', '---', 25, '2014-12-03'),
  (4, 1, 'My Other Sample Sub District Nov 11', 'My Other Sample Sub District Nov 11', '---', 33, '2014-12-11'),
  (5, 1, 'hi sub district', 'hi sub district', '---', 33, '2014-12-11'),
  (7, 1, '1247', '1247', '---', 33, '2014-12-12'),
  (8, 1, '222', '222', '---', 33, '2014-12-17'),
  (9, 1, 'this is a new branch- final update. What the hell is wrong. 123', 'this is a new branch- final update. What the hell is wrong. 123', '---', 33, '2014-12-15'),
  (13, 1, '111', '111', '---', 33, '2014-12-17'),
  (14, 1, '333', '333', '---', 33, '2014-12-17');

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
  ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_team`
  --

  INSERT INTO `tbl_team` (`id`, `team_name`, `title`, `organization`, `email`, `phone`, `interest`, `modified_by`, `modification_date`) VALUES
  (1, 'TEam for Second Sub District', 'title of the team', 'organization of the team', 'email@gmail.com', '987987', 'Interest 2,Interest 5', 29, '2014-12-03 16:46:35'),
  (3, 'Team name created by Zelalem. Last updated by mahi', 'This is the title of the team', 'this is the organization of the team', 'email@gmail.com', '97987987', 'Interest 1,Interest 2,Interest 6,', 34, '2014-12-13 08:18:06'),
  (4, 'Team''s name by Bre', 'Title ', 'oganization ', 'breemail@gmail.com', '987987-000', 'Interest 1,', 34, '2014-12-04 07:35:17'),
  (5, 'Team''s name by Wondisho', 'this is the title', 'organization', 'email@yahoo.com', '9875983743dflkd', 'Interest 5,', 34, '2014-12-14 06:54:56');

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
  ) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

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
  (55, 'Thlkdjfkdj', 22, '2014-11-28 14:46:06'),
  (56, 'jhgg', 22, '2014-11-28 14:47:18'),
  (65, 'First Th For Second District', 29, '2014-12-03 16:47:17'),
  (66, 'Th1 created by Zele. Last updated by Bre and then wondisho', 33, '2014-12-13 08:18:43'),
  (67, 'Th2 created by Zele. updated.', 33, '2014-12-13 08:18:43'),
  (68, 'Th1 by bre', 33, '2014-12-13 08:22:15'),
  (69, 'Th2 by bre', 33, '2014-12-13 08:22:15'),
  (70, 'Th3 by bre', 33, '2014-12-13 08:22:15'),
  (71, 'Th1 By Wondisho', 33, '2014-12-13 08:23:00'),
  (72, 'Th2 By Wondisho', 33, '2014-12-13 08:23:00'),
  (73, 'Final TH by wondisho', 34, '2014-12-04 08:00:08'),
  (74, 'sadf', 34, '2014-12-05 08:51:14'),
  (75, 'sdf - pefecto', 34, '2014-12-13 08:26:06'),
  (76, 'sdf-123. Last Updated. again updated.', 34, '2014-12-14 07:03:20'),
  (77, '1', 34, '2014-12-14 06:55:35'),
  (78, '2', 34, '2014-12-14 06:55:35'),
  (79, 'added th', 34, '2014-12-14 06:56:37');

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
  ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
    `modification_date` datetime NOT NULL,
    `deleted` tinyint(1) NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_user`
  --

  INSERT INTO `tbl_user` (`id`, `first_name`, `last_name`, `email`, `user_id`, `password`, `phone_number`, `member_type`, `user_status`, `user_level`, `user_role`, `modified_by`, `modification_date`, `deleted`) VALUES
  (2, 'Admin', 'Admin', 'mahderalem@gmail.com', 'root', '63a9f0ea7bb98050796b649e85481845', '39439483948', 'Admin', 'Active', 'Super User', 'Root', 0, '2014-10-09 00:00:00', 0),
  (22, 'Biruk', 'Fikre', 'biruk@yahoo.com', 'biruk', '202cb962ac59075b964b07152d234b70', '9823749873', 'User', 'Blocked', '01', '01A', 2, '2014-12-03 23:49:13', 1),
  (23, 'Rahel', 'Taye', 'rahel@gmail.com', 'rahel', '202cb962ac59075b964b07152d234b70', '983498734', 'User', 'Blocked', '02', '999', 2, '2014-12-03 23:48:30', 1),
  (25, 'Mahder', 'Neway', 'mneway@americanprogress.org', 'mahder', '0f3fbc595a293952fabc8de77ae840ca', '(202) 374 3138', 'User', 'Blocked', '01', '01A', 2, '2014-12-03 23:46:08', 0),
  (26, 'Lekbir', 'Gebretsadik', 'lekbirgebre@yahoo.com', 'leki', '202cb962ac59075b964b07152d234b70', '(202) 730 5250', 'User', 'Blocked', '02', '02A', 2, '2014-12-03 23:48:09', 1),
  (27, 'Yefikir', 'Alemayehu', 'yefi@yahoo.com', 'yefi', '202cb962ac59075b964b07152d234b70', '98798787', 'User', 'Blocked', '02', '999', 2, '2014-12-03 23:48:57', 1),
  (28, 'Miki', 'Biruk', 'miki@yahoo.com', 'miki', '202cb962ac59075b964b07152d234b70', '98798789', 'User', 'Blocked', '01', '02A', 33, '2014-12-11 22:51:04', 1),
  (29, 'Lala', 'Biruk', 'lala@yahoo.com', 'lala', '202cb962ac59075b964b07152d234b70', '87986876', 'User', 'Blocked', '02', '02A', 2, '2014-12-11 17:31:04', 1),
  (30, 'Tona', 'Biruk', 'tona@yahoo.com', 'tona', '202cb962ac59075b964b07152d234b70', '98786876', 'User', 'Blocked', '02', '02A', 2, '2014-12-03 23:48:49', 1),
  (31, 'Netsanet', 'Tadesse', 'netsanet.tadesse@gmail.com', 'netsanet', '202cb962ac59075b964b07152d234b70', '909809809', 'User', 'Blocked', '01', '01A', 2, '2014-12-03 23:46:20', 1),
  (32, 'Yelfign', 'Ejigu', 'aba@gmail.com', 'aba', '202cb962ac59075b964b07152d234b70', '0934893048', 'User', 'Blocked', '02', '02A', 2, '2014-12-03 23:49:03', 1),
  (33, 'Wondwossen', 'Mulugeta', 'wondisho@yahoo.com', 'wondisho', '202cb962ac59075b964b07152d234b70', '0911607338', 'User', 'Active', '01', '01A', 33, '2014-12-16 08:12:32', 0),
  (34, 'Berhanu', 'Teka', 'bre.teka@yahoo.com', 'bre', '202cb962ac59075b964b07152d234b70', '09876543', 'User', 'Active', '02', '02A', 33, '2014-12-16 06:49:59', 0),
  (35, 'Zelalem', 'Yesigat', 'zelalem@gmail.com', 'zele', '202cb962ac59075b964b07152d234b70', '5714281901', 'User', 'Active', '02', '999', 33, '2014-12-16 06:47:49', 0),
  (36, 'Alemu', 'Aga', 'alemu@yahoo.com', 'alemu', '202cb962ac59075b964b07152d234b70', '0498594', 'User', 'Active', '01', '999', 33, '2014-12-11 22:51:42', 1),
  (37, 'Abdisa', 'Aga', 'abdisa@yahoo.com', 'abdisa', '202cb962ac59075b964b07152d234b70', '98798897', 'User', 'Active', '02', '02A', 33, '2014-12-11 21:20:11', 1),
  (38, 'Bemnet', 'Shemeles', 'bemenet@yahoo.com', 'bement', '202cb962ac59075b964b07152d234b70', '987987987', 'User', 'Active', '02', '999', 33, '2014-12-11 21:24:18', 1),
  (39, 'Eyob', 'Delele', 'eyob@yahoo.com', 'eyob', '202cb962ac59075b964b07152d234b70', '343434', 'User', 'Active', '02', '02A', 34, '2014-12-12 06:39:09', 1),
  (40, 'Betesegaw', 'Dereje', 'betese@yahoo.com', 'betese', '202cb962ac59075b964b07152d234b70', '094809384', 'User', 'Active', '02', '02A', 34, '2014-12-12 07:00:07', 0),
  (41, 'Samuel', 'Chisu', 'samichisu@yahoo.com', 'sami', '202cb962ac59075b964b07152d234b70', '098987', 'User', 'Active', '02', '02A', 33, '2014-12-12 07:12:15', 1),
  (42, 'Sami', 'Anbessa', 'samianbessa@yahoo.com', 'samia', '202cb962ac59075b964b07152d234b70', '09809809', 'User', 'Active', '02', '999', 33, '2014-12-12 07:12:58', 1),
  (43, 'User Created', 'By Sami Chisu', 'usersami@chisu.com', 'samicu', '202cb962ac59075b964b07152d234b70', '0948598', 'User', 'Active', '02', '999', 41, '2014-12-12 07:37:01', 1),
  (44, 'Andit', 'Setiyou', 'andit@gmail.com', 'andit', '202cb962ac59075b964b07152d234b70', 'ldkfjkj908', 'User', 'Active', '02', '999', 33, '2014-12-16 06:53:47', 0),
  (45, 'Lela', 'Setiyou', 'lela@gmail.com', 'lela', '202cb962ac59075b964b07152d234b70', '(202) 374 313', 'User', 'Active', '01', '01A', 33, '2014-12-16 06:55:59', 0),
  (46, 'Carima', 'Towson', 'carima@yahoo.com', 'carima', '202cb962ac59075b964b07152d234b70', '939393939393', 'User', 'Active', '01', '01A', 33, '2014-12-16 08:06:17', 0);

  -- --------------------------------------------------------

  --
  -- Table structure for table `tbl_user_district`
  --

  CREATE TABLE `tbl_user_district` (
    `id` int(11) NOT NULL,
    `district_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL
  ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_user_district`
  --

  INSERT INTO `tbl_user_district` (`id`, `district_id`, `user_id`) VALUES
  (5, 1, 25),
  (6, 1, 28),
  (7, 1, 31),
  (8, 1, 22),
  (9, 1, 33),
  (10, 1, 36),
  (11, 1, 45),
  (12, 1, 46);

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
  ) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `tbl_user_sub_district`
  --

  INSERT INTO `tbl_user_sub_district` (`id`, `sub_district_id`, `user_id`) VALUES
  (14, 1, 26),
  (16, 2, 29),
  (18, 1, 32),
  (19, 1, 27),
  (20, 1, 23),
  (21, 1, 30),
  (22, 1, 34),
  (24, 1, 37),
  (25, 3, 38),
  (26, 1, 39),
  (27, 1, 40),
  (28, 5, 41),
  (29, 5, 42),
  (30, 5, 43),
  (31, 1, 35),
  (32, 1, 44);

  --
  -- Indexes for dumped tables
  --

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
  -- Indexes for table `tbl_event_calendar`
  --
  ALTER TABLE `tbl_event_calendar`
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
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `goal_first_th_id` (`goal_first_th_id`), ADD KEY `goal_first_id` (`goal_first_th_id`);

  --
  -- Indexes for table `tbl_goal_first_g2_obj_fn`
  --
  ALTER TABLE `tbl_goal_first_g2_obj_fn`
  ADD PRIMARY KEY (`id`), ADD KEY `goal_first_g2_id` (`goal_first_g2_id`);

  --
  -- Indexes for table `tbl_goal_first_g3`
  --
  ALTER TABLE `tbl_goal_first_g3`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `goal_first_th_id` (`goal_first_th_id`), ADD KEY `goal_first_id` (`goal_first_th_id`);

  --
  -- Indexes for table `tbl_goal_first_g3_obj_fn`
  --
  ALTER TABLE `tbl_goal_first_g3_obj_fn`
  ADD PRIMARY KEY (`id`), ADD KEY `goal_first_g3_id` (`goal_first_g3_id`);

  --
  -- Indexes for table `tbl_goal_first_th`
  --
  ALTER TABLE `tbl_goal_first_th`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `goal_first_id` (`goal_first_id`,`th_id`,`modified_by`), ADD UNIQUE KEY `th_id` (`th_id`), ADD KEY `tbl_goal_first_th_ibfk_2` (`th_id`), ADD KEY `tbl_goal_first_th_ibfk_3` (`modified_by`);

  --
  -- Indexes for table `tbl_goal_second`
  --
  ALTER TABLE `tbl_goal_second`
  ADD PRIMARY KEY (`id`), ADD KEY `modifiedByFk` (`modified_by`);

  --
  -- Indexes for table `tbl_goal_second_fn`
  --
  ALTER TABLE `tbl_goal_second_fn`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `fn_id` (`fn_id`), ADD KEY `tbl_goal_second_fn_ibfk_1` (`goal_second_id`), ADD KEY `tbl_goal_second_fn_ibfk_2` (`fn_id`), ADD KEY `tbl_goal_second_fn_ibfk_3` (`modified_by`);

  --
  -- Indexes for table `tbl_goal_second_g1`
  --
  ALTER TABLE `tbl_goal_second_g1`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `goal_second_fn_id` (`goal_second_fn_id`), ADD KEY `goal_second_id` (`goal_second_fn_id`);

  --
  -- Indexes for table `tbl_goal_second_g1_obj`
  --
  ALTER TABLE `tbl_goal_second_g1_obj`
  ADD PRIMARY KEY (`id`), ADD KEY `goal_second_g1_id` (`goal_second_g1_id`);

  --
  -- Indexes for table `tbl_goal_second_g2`
  --
  ALTER TABLE `tbl_goal_second_g2`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `goal_second_fn_id` (`goal_second_fn_id`), ADD KEY `goal_second_id` (`goal_second_fn_id`);

  --
  -- Indexes for table `tbl_goal_second_g2_obj`
  --
  ALTER TABLE `tbl_goal_second_g2_obj`
  ADD PRIMARY KEY (`id`), ADD KEY `goal_second_g2_id` (`goal_second_g2_id`);

  --
  -- Indexes for table `tbl_goal_second_g3`
  --
  ALTER TABLE `tbl_goal_second_g3`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `goal_second_fn_id_2` (`goal_second_fn_id`), ADD KEY `goal_second_fn_id` (`goal_second_fn_id`);

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
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `display_name` (`display_name`), ADD KEY `district_id` (`district_id`);

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
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `user_id` (`user_id`), ADD UNIQUE KEY `user_id_2` (`user_id`), ADD KEY `modified_by` (`modified_by`);

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
  -- AUTO_INCREMENT for table `tbl_assessment`
  --
  ALTER TABLE `tbl_assessment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
  --
  -- AUTO_INCREMENT for table `tbl_assessment_lookup`
  --
  ALTER TABLE `tbl_assessment_lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
  --
  -- AUTO_INCREMENT for table `tbl_assessment_th`
  --
  ALTER TABLE `tbl_assessment_th`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
  --
  -- AUTO_INCREMENT for table `tbl_district`
  --
  ALTER TABLE `tbl_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
  --
  -- AUTO_INCREMENT for table `tbl_event_calendar`
  --
  ALTER TABLE `tbl_event_calendar`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
  --
  -- AUTO_INCREMENT for table `tbl_fn`
  --
  ALTER TABLE `tbl_fn`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
  --
  -- AUTO_INCREMENT for table `tbl_fn_action`
  --
  ALTER TABLE `tbl_fn_action`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
  --
  -- AUTO_INCREMENT for table `tbl_form_1`
  --
  ALTER TABLE `tbl_form_1`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
  --
  -- AUTO_INCREMENT for table `tbl_form_1_q3`
  --
  ALTER TABLE `tbl_form_1_q3`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=175;
  --
  -- AUTO_INCREMENT for table `tbl_form_1_q4`
  --
  ALTER TABLE `tbl_form_1_q4`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=167;
  --
  -- AUTO_INCREMENT for table `tbl_form_2`
  --
  ALTER TABLE `tbl_form_2`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
  --
  -- AUTO_INCREMENT for table `tbl_form_3`
  --
  ALTER TABLE `tbl_form_3`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
  --
  -- AUTO_INCREMENT for table `tbl_form_4`
  --
  ALTER TABLE `tbl_form_4`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
  --
  -- AUTO_INCREMENT for table `tbl_form_5`
  --
  ALTER TABLE `tbl_form_5`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
  --
  -- AUTO_INCREMENT for table `tbl_form_6`
  --
  ALTER TABLE `tbl_form_6`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
  --
  -- AUTO_INCREMENT for table `tbl_form_7`
  --
  ALTER TABLE `tbl_form_7`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
  --
  -- AUTO_INCREMENT for table `tbl_form_8`
  --
  ALTER TABLE `tbl_form_8`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
  --
  -- AUTO_INCREMENT for table `tbl_form_9`
  --
  ALTER TABLE `tbl_form_9`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
  --
  -- AUTO_INCREMENT for table `tbl_form_10`
  --
  ALTER TABLE `tbl_form_10`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
  --
  -- AUTO_INCREMENT for table `tbl_goal_first`
  --
  ALTER TABLE `tbl_goal_first`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
  --
  -- AUTO_INCREMENT for table `tbl_goal_first_g1`
  --
  ALTER TABLE `tbl_goal_first_g1`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
  --
  -- AUTO_INCREMENT for table `tbl_goal_first_g1_obj_fn`
  --
  ALTER TABLE `tbl_goal_first_g1_obj_fn`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
  --
  -- AUTO_INCREMENT for table `tbl_goal_first_g2`
  --
  ALTER TABLE `tbl_goal_first_g2`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
  --
  -- AUTO_INCREMENT for table `tbl_goal_first_g2_obj_fn`
  --
  ALTER TABLE `tbl_goal_first_g2_obj_fn`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
  --
  -- AUTO_INCREMENT for table `tbl_goal_first_g3`
  --
  ALTER TABLE `tbl_goal_first_g3`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
  --
  -- AUTO_INCREMENT for table `tbl_goal_first_g3_obj_fn`
  --
  ALTER TABLE `tbl_goal_first_g3_obj_fn`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
  --
  -- AUTO_INCREMENT for table `tbl_goal_first_th`
  --
  ALTER TABLE `tbl_goal_first_th`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
  --
  -- AUTO_INCREMENT for table `tbl_goal_second`
  --
  ALTER TABLE `tbl_goal_second`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
  --
  -- AUTO_INCREMENT for table `tbl_goal_second_fn`
  --
  ALTER TABLE `tbl_goal_second_fn`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
  --
  -- AUTO_INCREMENT for table `tbl_goal_second_g1`
  --
  ALTER TABLE `tbl_goal_second_g1`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
  --
  -- AUTO_INCREMENT for table `tbl_goal_second_g1_obj`
  --
  ALTER TABLE `tbl_goal_second_g1_obj`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
  --
  -- AUTO_INCREMENT for table `tbl_goal_second_g2`
  --
  ALTER TABLE `tbl_goal_second_g2`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
  --
  -- AUTO_INCREMENT for table `tbl_goal_second_g2_obj`
  --
  ALTER TABLE `tbl_goal_second_g2_obj`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
  --
  -- AUTO_INCREMENT for table `tbl_goal_second_g3`
  --
  ALTER TABLE `tbl_goal_second_g3`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
  --
  -- AUTO_INCREMENT for table `tbl_goal_second_g3_obj`
  --
  ALTER TABLE `tbl_goal_second_g3_obj`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
  --
  -- AUTO_INCREMENT for table `tbl_responsibility`
  --
  ALTER TABLE `tbl_responsibility`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
  --
  -- AUTO_INCREMENT for table `tbl_risk`
  --
  ALTER TABLE `tbl_risk`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
  --
  -- AUTO_INCREMENT for table `tbl_sub_district`
  --
  ALTER TABLE `tbl_sub_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
  --
  -- AUTO_INCREMENT for table `tbl_team`
  --
  ALTER TABLE `tbl_team`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
  --
  -- AUTO_INCREMENT for table `tbl_team_interest`
  --
  ALTER TABLE `tbl_team_interest`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
  --
  -- AUTO_INCREMENT for table `tbl_th`
  --
  ALTER TABLE `tbl_th`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
  --
  -- AUTO_INCREMENT for table `tbl_th_action`
  --
  ALTER TABLE `tbl_th_action`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
  --
  -- AUTO_INCREMENT for table `tbl_user`
  --
  ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
  --
  -- AUTO_INCREMENT for table `tbl_user_district`
  --
  ALTER TABLE `tbl_user_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
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
  ADD CONSTRAINT `tbl_user_sub_district_ibfk_1` FOREIGN KEY (`sub_district_id`) REFERENCES `tbl_sub_district` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_user_sub_district_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;
