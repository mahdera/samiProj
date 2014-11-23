-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2014 at 02:29 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_1_q3`
--

CREATE TABLE `tbl_form_1_q3` (
`id` bigint(20) NOT NULL,
  `form_1_id` bigint(20) NOT NULL,
  `col1` varchar(255) DEFAULT NULL,
  `col2` varchar(255) DEFAULT NULL,
  `col3` varchar(255) DEFAULT NULL,
  `col4` varchar(255) DEFAULT NULL,
  `col5` varchar(255) DEFAULT NULL,
  `col6` varchar(255) DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_1_q4`
--

CREATE TABLE `tbl_form_1_q4` (
`id` bigint(20) NOT NULL,
  `form_1_id` bigint(20) NOT NULL,
  `col1` varchar(255) DEFAULT NULL,
  `col2` varchar(255) DEFAULT NULL,
  `col3` varchar(255) DEFAULT NULL,
  `col4` varchar(255) DEFAULT NULL,
  `col5` varchar(255) DEFAULT NULL,
  `col6` varchar(255) DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_3`
--

CREATE TABLE `tbl_form_3` (
`id` bigint(20) NOT NULL,
  `q3_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_4`
--

CREATE TABLE `tbl_form_4` (
`id` bigint(20) NOT NULL,
  `q4_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_5`
--

CREATE TABLE `tbl_form_5` (
`id` bigint(20) NOT NULL,
  `q5_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_6`
--

CREATE TABLE `tbl_form_6` (
`id` bigint(20) NOT NULL,
  `q6_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_7`
--

CREATE TABLE `tbl_form_7` (
`id` bigint(20) NOT NULL,
  `q7_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_8`
--

CREATE TABLE `tbl_form_8` (
`id` bigint(20) NOT NULL,
  `q8_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_9`
--

CREATE TABLE `tbl_form_9` (
`id` bigint(20) NOT NULL,
  `q9_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_10`
--

CREATE TABLE `tbl_form_10` (
`id` bigint(20) NOT NULL,
  `q10_1` text NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first`
--

CREATE TABLE `tbl_goal_first` (
`id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second`
--

CREATE TABLE `tbl_goal_second` (
`id` bigint(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `last_name`, `email`, `user_id`, `password`, `phone_number`, `member_type`, `user_status`, `user_level`, `user_role`, `modified_by`, `modification_date`) VALUES
(2, 'Admin', 'Admin', 'mahderalem@gmail.com', 'root', '63a9f0ea7bb98050796b649e85481845', '39439483948', 'Admin', 'Active', 'Super User', 'Root', 0, '2014-10-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_district`
--

CREATE TABLE `tbl_user_district` (
`id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_sub_district`
--

CREATE TABLE `tbl_user_sub_district` (
`id` int(11) NOT NULL,
  `sub_district_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_assessment_th`
--
ALTER TABLE `tbl_assessment_th`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_fn`
--
ALTER TABLE `tbl_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_fn_action`
--
ALTER TABLE `tbl_fn_action`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_form_1`
--
ALTER TABLE `tbl_form_1`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_form_1_q3`
--
ALTER TABLE `tbl_form_1_q3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_form_1_q4`
--
ALTER TABLE `tbl_form_1_q4`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_form_2`
--
ALTER TABLE `tbl_form_2`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_form_3`
--
ALTER TABLE `tbl_form_3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_form_4`
--
ALTER TABLE `tbl_form_4`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_form_5`
--
ALTER TABLE `tbl_form_5`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_form_6`
--
ALTER TABLE `tbl_form_6`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_form_7`
--
ALTER TABLE `tbl_form_7`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_form_8`
--
ALTER TABLE `tbl_form_8`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_form_9`
--
ALTER TABLE `tbl_form_9`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_form_10`
--
ALTER TABLE `tbl_form_10`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_goal_first`
--
ALTER TABLE `tbl_goal_first`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g1`
--
ALTER TABLE `tbl_goal_first_g1`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g1_obj_fn`
--
ALTER TABLE `tbl_goal_first_g1_obj_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g2`
--
ALTER TABLE `tbl_goal_first_g2`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g2_obj_fn`
--
ALTER TABLE `tbl_goal_first_g2_obj_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g3`
--
ALTER TABLE `tbl_goal_first_g3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tbl_goal_first_g3_obj_fn`
--
ALTER TABLE `tbl_goal_first_g3_obj_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_goal_first_th`
--
ALTER TABLE `tbl_goal_first_th`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tbl_goal_second`
--
ALTER TABLE `tbl_goal_second`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_goal_second_fn`
--
ALTER TABLE `tbl_goal_second_fn`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g1`
--
ALTER TABLE `tbl_goal_second_g1`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g1_obj`
--
ALTER TABLE `tbl_goal_second_g1_obj`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g2`
--
ALTER TABLE `tbl_goal_second_g2`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g2_obj`
--
ALTER TABLE `tbl_goal_second_g2_obj`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g3`
--
ALTER TABLE `tbl_goal_second_g3`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_goal_second_g3_obj`
--
ALTER TABLE `tbl_goal_second_g3_obj`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tbl_responsibility`
--
ALTER TABLE `tbl_responsibility`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_risk`
--
ALTER TABLE `tbl_risk`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_sub_district`
--
ALTER TABLE `tbl_sub_district`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_team_interest`
--
ALTER TABLE `tbl_team_interest`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_th`
--
ALTER TABLE `tbl_th`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_th_action`
--
ALTER TABLE `tbl_th_action`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_user_district`
--
ALTER TABLE `tbl_user_district`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user_sub_district`
--
ALTER TABLE `tbl_user_sub_district`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
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
