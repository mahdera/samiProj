-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 29, 2014 at 02:00 AM
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
    -- Table structure for table `tbl_assessment`
    --

    CREATE TABLE `tbl_assessment` (
        `id` bigint(20) NOT NULL,
        `assessment_type` varchar(200) NOT NULL,
        `assessment_date` date NOT NULL,
        `summary` text,
        `modified_by` int(11) NOT NULL,
        `modification_date` datetime NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    -- --------------------------------------------------------

    --
    -- Table structure for table `tbl_assessment_lookup`
    --

    CREATE TABLE `tbl_assessment_lookup` (
        `id` int(11) NOT NULL,
        `value` varchar(70) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
    (1, 'Main District', 'Main District', '---', 2, '2014-12-28');

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
        `location` text NOT NULL,
        `modified_by` int(11) NOT NULL,
        `modification_date` datetime NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_event_calendar`
    --

    INSERT INTO `tbl_event_calendar` (`id`, `title`, `body`, `start_time`, `end_time`, `location`, `modified_by`, `modification_date`) VALUES
    (2, 'this is the title', 'this is the body. This is one of the best pic ever', '2014-12-11T08:15:00+01:00', '2014-12-11T08:45:00+01:00', '', 33, '2014-12-11 13:59:19'),
    (3, 'another title', 'another body', '2014-12-10T08:00:00+01:00', '2014-12-10T08:30:00+01:00', '', 33, '2014-12-11 13:20:46'),
    (4, 'this is my plan for Friday', 'And this is the event detail that is going to take place on Friday. updated.', '2014-12-12T08:00:00+01:00', '2014-12-12T08:30:00+01:00', '', 33, '2014-12-11 13:59:00'),
    (5, 'I would like to....UPDATED', 'I would like to take a nap right now', '2014-12-11T14:00:00+01:00', '2014-12-11T14:30:00+01:00', '', 34, '2014-12-11 14:56:40'),
    (6, 'This is the event', 'This is the body of the event, updated.', '2014-12-11T10:15:00+01:00', '2014-12-11T10:45:00+01:00', '', 33, '2014-12-14 09:28:43'),
    (7, 'What a Day', 'This Saturday was amazing and I really enjoyed it.', '2014-12-13T09:15:00+01:00', '2014-12-13T09:45:00+01:00', '', 33, '2014-12-13 21:59:28'),
    (8, 'The new title', 'This is the body of the new event', '2014-12-18T13:15:00+01:00', '2014-12-18T13:45:00+01:00', '1333 Hst Washington DC. Updated. I love the new location thing!!', 33, '2014-12-18 16:44:03'),
    (9, 'this is the title', 'this is the body', '2014-12-24T13:15:00+01:00', '2014-12-24T13:45:00+01:00', 'this is the location', 34, '2014-12-22 17:37:09');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_fn`
    --

    INSERT INTO `tbl_fn` (`id`, `fn_name`, `modified_by`, `modification_date`, `show_all`) VALUES
    (57, 'Function 1', 2, '2014-11-23 00:00:00', 1),
    (58, 'Function 2', 2, '2014-11-23 00:00:00', 1),
    (59, 'Function 3', 2, '2014-11-23 00:00:00', 1),
    (60, 'Function 4', 2, '2014-11-23 00:00:00', 1),
    (61, 'Function 5', 2, '2014-11-23 00:00:00', 1),
    (62, 'Function 6', 2, '2014-11-23 00:00:00', 1),
    (63, 'Function 7', 2, '2014-11-23 00:00:00', 1),
    (64, 'Function 8', 2, '2014-11-23 00:00:00', 1),
    (65, 'Function 9', 2, '2014-11-23 00:00:00', 1),
    (66, 'Function 10', 2, '2014-11-23 00:00:00', 1),
    (67, 'FN 1 By Bre', 50, '2014-12-28 09:16:49', 0),
    (68, 'FN 2 By Bre', 50, '2014-12-28 09:17:06', 0),
    (69, 'FN 3 By Bre', 50, '2014-12-28 09:17:18', 0),
    (70, 'FN 4 By Bre', 50, '2014-12-28 09:17:29', 0),
    (71, 'FN 5 By Bre', 50, '2014-12-28 09:17:43', 0),
    (72, 'FN 6 By Bre', 50, '2014-12-28 09:17:52', 0);

    -- --------------------------------------------------------

    --
    -- Table structure for table `tbl_fn_action`
    --

    CREATE TABLE `tbl_fn_action` (
        `id` bigint(20) NOT NULL,
        `fn_id` bigint(20) NOT NULL,
        `action_text` text,
        `goal_second_id` int(11) NOT NULL,
        `modified_by` int(11) NOT NULL,
        `modification_date` datetime NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_fn_action`
    --

    INSERT INTO `tbl_fn_action` (`id`, `fn_id`, `action_text`, `goal_second_id`, `modified_by`, `modification_date`) VALUES
    (11, 57, 'This is th action for zele function 1. zola man is in Ethiopia! working perfect so far.', 44, 52, '2014-12-28 19:34:41'),
    (12, 57, 'This is th action for zele function 1. zola man is in Ethiopia! working perfect so far.', 43, 50, '2014-12-28 19:40:53');

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
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    -- --------------------------------------------------------

    --
    -- Table structure for table `tbl_form_3`
    --

    CREATE TABLE `tbl_form_3` (
        `id` bigint(20) NOT NULL,
        `q3_1` text NOT NULL,
        `modified_by` int(11) NOT NULL,
        `modification_date` datetime NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    -- --------------------------------------------------------

    --
    -- Table structure for table `tbl_form_4`
    --

    CREATE TABLE `tbl_form_4` (
        `id` bigint(20) NOT NULL,
        `q4_1` text NOT NULL,
        `modified_by` int(11) NOT NULL,
        `modification_date` datetime NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    -- --------------------------------------------------------

    --
    -- Table structure for table `tbl_form_5`
    --

    CREATE TABLE `tbl_form_5` (
        `id` bigint(20) NOT NULL,
        `q5_1` text NOT NULL,
        `modified_by` int(11) NOT NULL,
        `modification_date` datetime NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    -- --------------------------------------------------------

    --
    -- Table structure for table `tbl_form_6`
    --

    CREATE TABLE `tbl_form_6` (
        `id` bigint(20) NOT NULL,
        `q6_1` text NOT NULL,
        `modified_by` int(11) NOT NULL,
        `modification_date` datetime NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    -- --------------------------------------------------------

    --
    -- Table structure for table `tbl_form_7`
    --

    CREATE TABLE `tbl_form_7` (
        `id` bigint(20) NOT NULL,
        `q7_1` text NOT NULL,
        `modified_by` int(11) NOT NULL,
        `modification_date` datetime NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    -- --------------------------------------------------------

    --
    -- Table structure for table `tbl_form_8`
    --

    CREATE TABLE `tbl_form_8` (
        `id` bigint(20) NOT NULL,
        `q8_1` text NOT NULL,
        `modified_by` int(11) NOT NULL,
        `modification_date` datetime NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    -- --------------------------------------------------------

    --
    -- Table structure for table `tbl_form_9`
    --

    CREATE TABLE `tbl_form_9` (
        `id` bigint(20) NOT NULL,
        `q9_1` text NOT NULL,
        `modified_by` int(11) NOT NULL,
        `modification_date` datetime NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    -- --------------------------------------------------------

    --
    -- Table structure for table `tbl_form_10`
    --

    CREATE TABLE `tbl_form_10` (
        `id` bigint(20) NOT NULL,
        `q10_1` text NOT NULL,
        `modified_by` int(11) NOT NULL,
        `modification_date` datetime NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    -- --------------------------------------------------------

    --
    -- Table structure for table `tbl_goal_first`
    --

    CREATE TABLE `tbl_goal_first` (
        `id` bigint(20) NOT NULL,
        `modified_by` int(11) NOT NULL,
        `modification_date` datetime NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_first`
    --

    INSERT INTO `tbl_goal_first` (`id`, `modified_by`, `modification_date`) VALUES
    (36, 51, '2014-12-28 09:12:12'),
    (37, 52, '2014-12-28 09:45:51');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_first_g1`
    --

    INSERT INTO `tbl_goal_first_g1` (`id`, `goal_first_th_id`, `g1`, `fn_id`, `modified_by`, `modification_date`) VALUES
    (70, 72, 'G1 for Th1 by zele', 57, 50, '2014-12-28 09:40:23'),
    (71, 73, 'G1 for Th2 By Bre', 67, 50, '2014-12-28 09:40:05'),
    (72, 74, 'G1 for Th1 By Tele', 57, 52, '2014-12-28 09:45:51');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_first_g1_obj_fn`
    --

    INSERT INTO `tbl_goal_first_g1_obj_fn` (`id`, `goal_first_g1_id`, `obj`, `fn_id`, `modified_by`, `modification_date`) VALUES
    (84, 70, 'Obj1 for Th1 by zele', 58, 50, '2014-12-28 09:40:23'),
    (85, 71, 'Obj1 for Th2 By Bre', 68, 50, '2014-12-28 09:40:05'),
    (86, 72, 'Obj1 for Th1 By Tele', 58, 52, '2014-12-28 09:45:51');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_first_g2`
    --

    INSERT INTO `tbl_goal_first_g2` (`id`, `goal_first_th_id`, `g2`, `fn_id`, `modified_by`, `modification_date`) VALUES
    (70, 72, 'G2 for Th1 by zele', 59, 49, '2014-12-28 09:40:23'),
    (71, 73, 'G2 for Th2 By Bre', 69, 49, '2014-12-28 09:40:05'),
    (72, 74, 'G2 for Th1 By Tele', 59, 52, '2014-12-28 09:45:51');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_first_g2_obj_fn`
    --

    INSERT INTO `tbl_goal_first_g2_obj_fn` (`id`, `goal_first_g2_id`, `obj`, `fn_id`, `modified_by`, `modification_date`) VALUES
    (78, 70, 'Obj2 for Th1 by zele', 60, 49, '2014-12-28 09:40:23'),
    (79, 71, 'Obj2 for Th2 By Bre', 70, 49, '2014-12-28 09:40:05'),
    (80, 72, 'Obj2 for Th1 By Tele', 60, 52, '2014-12-28 09:45:51');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_first_g3`
    --

    INSERT INTO `tbl_goal_first_g3` (`id`, `goal_first_th_id`, `g3`, `fn_id`, `modified_by`, `modification_date`) VALUES
    (70, 72, 'G3 for Th1 by zele. He is in Ethiopia now.', 61, 49, '2014-12-28 09:40:23'),
    (71, 73, 'G3 for Th2 By Bre', 71, 49, '2014-12-28 09:40:05'),
    (72, 74, 'G3 for Th1 By Tele', 61, 52, '2014-12-28 09:45:51');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_first_g3_obj_fn`
    --

    INSERT INTO `tbl_goal_first_g3_obj_fn` (`id`, `goal_first_g3_id`, `obj`, `fn_id`, `modified_by`, `modification_date`) VALUES
    (80, 70, 'Obj3 for Th1 by zele. Last updated by Bre.\nFinally updated by Wondisho.', 62, 49, '2014-12-28 09:40:23'),
    (81, 71, 'Obj3 for Th2 By Bre.\nFinally updated by Wondisho.', 72, 49, '2014-12-28 09:40:05'),
    (82, 72, 'Obj3 for Th1 By Tele', 61, 52, '2014-12-28 09:45:51');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_first_th`
    --

    INSERT INTO `tbl_goal_first_th` (`id`, `goal_first_id`, `th_id`, `modified_by`, `modification_date`) VALUES
    (72, 36, 82, 51, '2014-12-28 09:12:12'),
    (73, 36, 83, 50, '2014-12-28 09:19:24'),
    (74, 37, 84, 52, '2014-12-28 09:45:51');

    -- --------------------------------------------------------

    --
    -- Table structure for table `tbl_goal_second`
    --

    CREATE TABLE `tbl_goal_second` (
        `id` bigint(20) NOT NULL,
        `modified_by` int(11) NOT NULL,
        `modification_date` datetime NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_second`
    --

    INSERT INTO `tbl_goal_second` (`id`, `modified_by`, `modification_date`) VALUES
    (43, 51, '2014-12-28 09:13:38'),
    (44, 52, '2014-12-28 11:39:32');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_second_fn`
    --

    INSERT INTO `tbl_goal_second_fn` (`id`, `goal_second_id`, `fn_id`, `modified_by`, `modification_date`) VALUES
    (24, 43, 57, 51, '2014-12-28 09:13:38'),
    (25, 43, 67, 50, '2014-12-28 09:20:21'),
    (26, 43, 58, 50, '2014-12-28 09:37:49'),
    (28, 44, 57, 52, '2014-12-28 11:41:33');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_second_g1`
    --

    INSERT INTO `tbl_goal_second_g1` (`id`, `goal_second_fn_id`, `g1`, `modified_by`, `modification_date`) VALUES
    (24, 24, 'G1 for function 1 by zele. updated by zele', 50, '2014-12-28 19:41:16'),
    (25, 25, 'G1 for FN 1 By Bre', 50, '2014-12-28 09:41:15'),
    (26, 26, 'G1 added by Wondisho for Function 2', 50, '2014-12-28 09:40:59'),
    (27, 28, 'G1  for Function 1 by Tele', 52, '2014-12-28 19:37:01');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_second_g1_obj`
    --

    INSERT INTO `tbl_goal_second_g1_obj` (`id`, `goal_second_g1_id`, `obj`, `modified_by`, `modification_date`) VALUES
    (33, 24, 'Obj 1 for function 1 by zele', 50, '2014-12-28 19:41:16'),
    (34, 25, 'Obj1 for FN 1 By Bre', 50, '2014-12-28 09:41:15'),
    (35, 26, 'Obj1 added by Wondisho.for Function 2', 50, '2014-12-28 09:40:59'),
    (36, 27, 'Obj1  for Function 1 by Tele', 52, '2014-12-28 19:37:01');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_second_g2`
    --

    INSERT INTO `tbl_goal_second_g2` (`id`, `goal_second_fn_id`, `g2`, `modified_by`, `modification_date`) VALUES
    (24, 24, 'G2 for function 1 by zele', 49, '2014-12-28 19:41:16'),
    (25, 25, 'G2 for FN 1 By Bre', 49, '2014-12-28 09:41:15'),
    (26, 26, 'G2 added by Wondisho.for Function 2', 49, '2014-12-28 09:40:59'),
    (27, 28, 'G2  for Function 1 by Tele', 52, '2014-12-28 19:37:01');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_second_g2_obj`
    --

    INSERT INTO `tbl_goal_second_g2_obj` (`id`, `goal_second_g2_id`, `obj`, `modified_by`, `modification_date`) VALUES
    (31, 24, 'Obj2 for function 1 by zele', 49, '2014-12-28 19:41:16'),
    (32, 25, 'Obj2 for FN 1 By Bre', 49, '2014-12-28 09:41:15'),
    (33, 26, 'Obj3 added by Wondisho.for Function 2', 49, '2014-12-28 09:40:59'),
    (34, 27, 'Obj2  for Function 1 by Tele', 52, '2014-12-28 19:37:01');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_second_g3`
    --

    INSERT INTO `tbl_goal_second_g3` (`id`, `goal_second_fn_id`, `g3`, `modified_by`, `modification_date`) VALUES
    (24, 24, 'G3 for function 1 by zele', 49, '2014-12-28 19:41:16'),
    (25, 25, 'G3 for FN 1 By Bre', 49, '2014-12-28 09:41:15'),
    (26, 26, 'G3 added by Wondisho.for Function 2', 49, '2014-12-28 09:40:59'),
    (27, 28, 'G3  for Function 1 by Tele Holla Tele', 52, '2014-12-28 19:37:01');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_goal_second_g3_obj`
    --

    INSERT INTO `tbl_goal_second_g3_obj` (`id`, `goal_second_g3_id`, `obj`, `modified_by`, `modification_date`) VALUES
    (36, 24, 'Obj3 for function 1 by zele. Updated from Ethiopia.', 49, '2014-12-28 19:41:16'),
    (37, 25, 'Obj3 for FN 1 By Bre', 49, '2014-12-28 09:41:15'),
    (38, 26, 'Obj3 added by Wondisho.for Function 2', 49, '2014-12-28 09:40:59'),
    (39, 27, 'Obj3  for Function 1 by Tele. Updated by TELE!!', 52, '2014-12-28 19:37:01');

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
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
    ) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_sub_district`
    --

    INSERT INTO `tbl_sub_district` (`id`, `district_id`, `code`, `display_name`, `description`, `modified_by`, `modification_date`) VALUES
    (15, 1, 'Sub District A', 'Sub District A', '---', 2, '2014-12-28'),
    (16, 1, 'Sub District B', 'Sub District B', '---', 2, '2014-12-28'),
    (17, 1, 'Sub District C', 'Sub District C', '---', 2, '2014-12-28');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_th`
    --

    INSERT INTO `tbl_th` (`id`, `th_name`, `modified_by`, `modification_date`) VALUES
    (82, 'Th1 By Zele', 51, '2014-12-28 09:07:53'),
    (83, 'Th2 By Bre', 50, '2014-12-28 09:15:56'),
    (84, 'Th1 By Tele', 52, '2014-12-28 09:43:19');

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
    ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_th_action`
    --

    INSERT INTO `tbl_th_action` (`id`, `th_id`, `action_text`, `modified_by`, `modification_date`) VALUES
    (3, 82, 'This should never be deleted, said Zele. yes its working now. Last updated by Wondisho.\nFinal cool by Wondisho.', 50, '2014-12-28 09:39:00'),
    (4, 83, 'This Th action is added by Berhanu Teka. Last updated by Wondisho.\nThis is cool by wondisho.', 50, '2014-12-28 09:38:49'),
    (5, 84, 'This is the TH Action.', 52, '2014-12-28 12:25:37');

    -- --------------------------------------------------------

    --
    -- Table structure for table `tbl_uploaded_document`
    --

    CREATE TABLE `tbl_uploaded_document` (
        `id` bigint(20) NOT NULL,
        `file_name` varchar(70) NOT NULL,
        `uploaded_by` int(11) NOT NULL,
        `upload_date` datetime NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
    ) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_user`
    --

    INSERT INTO `tbl_user` (`id`, `first_name`, `last_name`, `email`, `user_id`, `password`, `phone_number`, `member_type`, `user_status`, `user_level`, `user_role`, `modified_by`, `modification_date`, `deleted`) VALUES
    (2, 'Admin', 'Admin', 'mahderalem@gmail.com', 'root', '63a9f0ea7bb98050796b649e85481845', '39439483948', 'Admin', 'Active', 'Super User', 'root', 0, '2014-10-09 00:00:00', 0),
    (49, 'Wondwossen', 'Mulugeta', 'wondisho@yahoo.com', 'wondisho', '202cb962ac59075b964b07152d234b70', '251911607338', 'User', 'Active', '01', '01A', 2, '2014-12-28 09:00:04', 0),
    (50, 'Berhanu', 'Teka', 'bre@yahoo.com', 'bre', '202cb962ac59075b964b07152d234b70', '43895794857', 'User', 'Active', '02', '02A', 2, '2014-12-28 09:06:21', 0),
    (51, 'Zelalem', 'Assefa', 'zele@gmail.com', 'zele', '202cb962ac59075b964b07152d234b70', '94875898', 'User', 'Active', '02', '999', 2, '2014-12-28 09:07:02', 0),
    (52, 'Tilahun', 'Berhanu', 'tele@yahoo.com', 'tele', '202cb962ac59075b964b07152d234b70', '3453453454', 'User', 'Active', '02', '02A', 49, '2014-12-28 09:42:31', 0);

    -- --------------------------------------------------------

    --
    -- Table structure for table `tbl_user_district`
    --

    CREATE TABLE `tbl_user_district` (
        `id` int(11) NOT NULL,
        `district_id` int(11) NOT NULL,
        `user_id` int(11) NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_user_district`
    --

    INSERT INTO `tbl_user_district` (`id`, `district_id`, `user_id`) VALUES
    (13, 1, 49);

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
    ) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

    --
    -- Dumping data for table `tbl_user_sub_district`
    --

    INSERT INTO `tbl_user_sub_district` (`id`, `sub_district_id`, `user_id`) VALUES
    (35, 15, 50),
    (36, 15, 51),
    (37, 16, 52);

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
    ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `goal_second_id` (`goal_second_id`,`fn_id`), ADD KEY `tbl_goal_second_fn_ibfk_1` (`goal_second_id`), ADD KEY `tbl_goal_second_fn_ibfk_2` (`fn_id`), ADD KEY `tbl_goal_second_fn_ibfk_3` (`modified_by`);

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
    -- Indexes for table `tbl_uploaded_document`
    --
    ALTER TABLE `tbl_uploaded_document`
    ADD PRIMARY KEY (`id`), ADD KEY `tbl_uploaded_document_ibfk_1` (`uploaded_by`);

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
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_assessment_lookup`
    --
    ALTER TABLE `tbl_assessment_lookup`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_assessment_th`
    --
    ALTER TABLE `tbl_assessment_th`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_district`
    --
    ALTER TABLE `tbl_district`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
    --
    -- AUTO_INCREMENT for table `tbl_event_calendar`
    --
    ALTER TABLE `tbl_event_calendar`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
    --
    -- AUTO_INCREMENT for table `tbl_fn`
    --
    ALTER TABLE `tbl_fn`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
    --
    -- AUTO_INCREMENT for table `tbl_fn_action`
    --
    ALTER TABLE `tbl_fn_action`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
    --
    -- AUTO_INCREMENT for table `tbl_form_1`
    --
    ALTER TABLE `tbl_form_1`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_form_1_q3`
    --
    ALTER TABLE `tbl_form_1_q3`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_form_1_q4`
    --
    ALTER TABLE `tbl_form_1_q4`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_form_2`
    --
    ALTER TABLE `tbl_form_2`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_form_3`
    --
    ALTER TABLE `tbl_form_3`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_form_4`
    --
    ALTER TABLE `tbl_form_4`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_form_5`
    --
    ALTER TABLE `tbl_form_5`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_form_6`
    --
    ALTER TABLE `tbl_form_6`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_form_7`
    --
    ALTER TABLE `tbl_form_7`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_form_8`
    --
    ALTER TABLE `tbl_form_8`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_form_9`
    --
    ALTER TABLE `tbl_form_9`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_form_10`
    --
    ALTER TABLE `tbl_form_10`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_goal_first`
    --
    ALTER TABLE `tbl_goal_first`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
    --
    -- AUTO_INCREMENT for table `tbl_goal_first_g1`
    --
    ALTER TABLE `tbl_goal_first_g1`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
    --
    -- AUTO_INCREMENT for table `tbl_goal_first_g1_obj_fn`
    --
    ALTER TABLE `tbl_goal_first_g1_obj_fn`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
    --
    -- AUTO_INCREMENT for table `tbl_goal_first_g2`
    --
    ALTER TABLE `tbl_goal_first_g2`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
    --
    -- AUTO_INCREMENT for table `tbl_goal_first_g2_obj_fn`
    --
    ALTER TABLE `tbl_goal_first_g2_obj_fn`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
    --
    -- AUTO_INCREMENT for table `tbl_goal_first_g3`
    --
    ALTER TABLE `tbl_goal_first_g3`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
    --
    -- AUTO_INCREMENT for table `tbl_goal_first_g3_obj_fn`
    --
    ALTER TABLE `tbl_goal_first_g3_obj_fn`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
    --
    -- AUTO_INCREMENT for table `tbl_goal_first_th`
    --
    ALTER TABLE `tbl_goal_first_th`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
    --
    -- AUTO_INCREMENT for table `tbl_goal_second`
    --
    ALTER TABLE `tbl_goal_second`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
    --
    -- AUTO_INCREMENT for table `tbl_goal_second_fn`
    --
    ALTER TABLE `tbl_goal_second_fn`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
    --
    -- AUTO_INCREMENT for table `tbl_goal_second_g1`
    --
    ALTER TABLE `tbl_goal_second_g1`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
    --
    -- AUTO_INCREMENT for table `tbl_goal_second_g1_obj`
    --
    ALTER TABLE `tbl_goal_second_g1_obj`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
    --
    -- AUTO_INCREMENT for table `tbl_goal_second_g2`
    --
    ALTER TABLE `tbl_goal_second_g2`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
    --
    -- AUTO_INCREMENT for table `tbl_goal_second_g2_obj`
    --
    ALTER TABLE `tbl_goal_second_g2_obj`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
    --
    -- AUTO_INCREMENT for table `tbl_goal_second_g3`
    --
    ALTER TABLE `tbl_goal_second_g3`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
    --
    -- AUTO_INCREMENT for table `tbl_goal_second_g3_obj`
    --
    ALTER TABLE `tbl_goal_second_g3_obj`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
    --
    -- AUTO_INCREMENT for table `tbl_responsibility`
    --
    ALTER TABLE `tbl_responsibility`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_risk`
    --
    ALTER TABLE `tbl_risk`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_sub_district`
    --
    ALTER TABLE `tbl_sub_district`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
    --
    -- AUTO_INCREMENT for table `tbl_team`
    --
    ALTER TABLE `tbl_team`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_th`
    --
    ALTER TABLE `tbl_th`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
    --
    -- AUTO_INCREMENT for table `tbl_th_action`
    --
    ALTER TABLE `tbl_th_action`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
    --
    -- AUTO_INCREMENT for table `tbl_uploaded_document`
    --
    ALTER TABLE `tbl_uploaded_document`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
    --
    -- AUTO_INCREMENT for table `tbl_user`
    --
    ALTER TABLE `tbl_user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
    --
    -- AUTO_INCREMENT for table `tbl_user_district`
    --
    ALTER TABLE `tbl_user_district`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
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
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
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
    ADD CONSTRAINT `tbl_responsibility_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `tbl_team` (`id`) ON DELETE CASCADE;

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
    -- Constraints for table `tbl_th_action`
    --
    ALTER TABLE `tbl_th_action`
    ADD CONSTRAINT `tbl_th_action_ibfk_1` FOREIGN KEY (`th_id`) REFERENCES `tbl_th` (`id`) ON DELETE CASCADE;

    --
    -- Constraints for table `tbl_uploaded_document`
    --
    ALTER TABLE `tbl_uploaded_document`
    ADD CONSTRAINT `tbl_uploaded_document_ibfk_1` FOREIGN KEY (`uploaded_by`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

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
    
