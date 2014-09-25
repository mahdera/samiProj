-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 25, 2014 at 02:19 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_sami_proj`
--
create database db_sami_proj;
use db_sami_proj;
-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment`
--

CREATE TABLE `tbl_assessment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `assessment_type` varchar(50) NOT NULL,
  `assessment_date` date NOT NULL,
  `summary` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_assessment`
--

INSERT INTO `tbl_assessment` (`id`, `assessment_type`, `assessment_date`, `summary`) VALUES
(3, 'as2', '2014-09-11', 'This is the summary Information done by Mahder.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment_th`
--

CREATE TABLE `tbl_assessment_th` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `assessment_id` bigint(20) NOT NULL,
  `th_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assessment_id` (`assessment_id`),
  KEY `th_id` (`th_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_assessment_th`
--

INSERT INTO `tbl_assessment_th` (`id`, `assessment_id`, `th_id`) VALUES
(1, 3, 7),
(2, 3, 8),
(3, 3, 9),
(4, 3, 10),
(5, 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fn`
--

CREATE TABLE `tbl_fn` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fn_name` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_fn`
--

INSERT INTO `tbl_fn` (`id`, `fn_name`) VALUES
(1, 'mahder the fn good'),
(2, 'this is good');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fn_action`
--

CREATE TABLE `tbl_fn_action` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fn_id` bigint(20) NOT NULL,
  `action_text` text,
  PRIMARY KEY (`id`),
  KEY `fn_id` (`fn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first`
--

CREATE TABLE `tbl_goal_first` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `th_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `th_id` (`th_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_goal_first`
--

INSERT INTO `tbl_goal_first` (`id`, `th_id`) VALUES
(1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g1`
--

CREATE TABLE `tbl_goal_first_g1` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_id` bigint(20) NOT NULL,
  `g1` varchar(50) NOT NULL,
  `fn` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_id` (`goal_first_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_goal_first_g1`
--

INSERT INTO `tbl_goal_first_g1` (`id`, `goal_first_id`, `g1`, `fn`) VALUES
(1, 1, 'g1', 'mahder the fn good');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g1_obj_fn`
--

CREATE TABLE `tbl_goal_first_g1_obj_fn` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_g1_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `fn` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_g1_id` (`goal_first_g1_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g2`
--

CREATE TABLE `tbl_goal_first_g2` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_id` bigint(20) NOT NULL,
  `g2` varchar(50) NOT NULL,
  `fn` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_id` (`goal_first_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_goal_first_g2`
--

INSERT INTO `tbl_goal_first_g2` (`id`, `goal_first_id`, `g2`, `fn`) VALUES
(1, 1, 'g2', 'this is good');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g2_obj_fn`
--

CREATE TABLE `tbl_goal_first_g2_obj_fn` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_g2_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `fn` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_g2_id` (`goal_first_g2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g3`
--

CREATE TABLE `tbl_goal_first_g3` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_id` bigint(20) NOT NULL,
  `g3` varchar(50) NOT NULL,
  `fn` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_id` (`goal_first_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_goal_first_g3`
--

INSERT INTO `tbl_goal_first_g3` (`id`, `goal_first_id`, `g3`, `fn`) VALUES
(1, 1, 'g3', 'this is good');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g3_obj_fn`
--

CREATE TABLE `tbl_goal_first_g3_obj_fn` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_g3_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `fn` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_g3_id` (`goal_first_g3_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_goal_first_g3_obj_fn`
--

INSERT INTO `tbl_goal_first_g3_obj_fn` (`id`, `goal_first_g3_id`, `obj`, `fn`) VALUES
(1, 1, 'trevor obj', 'this is good');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second`
--

CREATE TABLE `tbl_goal_second` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fn_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fn_id` (`fn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g1`
--

CREATE TABLE `tbl_goal_second_g1` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_second_id` bigint(20) NOT NULL,
  `g1` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_second_id` (`goal_second_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g1_obj`
--

CREATE TABLE `tbl_goal_second_g1_obj` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_second_g1_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_second_g1_id` (`goal_second_g1_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g2`
--

CREATE TABLE `tbl_goal_second_g2` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_second_id` bigint(20) NOT NULL,
  `g2` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_second_id` (`goal_second_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g2_obj`
--

CREATE TABLE `tbl_goal_second_g2_obj` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_second_g2_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_second_g2_id` (`goal_second_g2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g3`
--

CREATE TABLE `tbl_goal_second_g3` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_second_id` bigint(20) NOT NULL,
  `g3` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_second_id` (`goal_second_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second_g3_obj`
--

CREATE TABLE `tbl_goal_second_g3_obj` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_second_g3_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_second_g3_id` (`goal_second_g3_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_responsibility`
--

CREATE TABLE `tbl_responsibility` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) NOT NULL,
  `role` text,
  `responsibility` text,
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_responsibility`
--

INSERT INTO `tbl_responsibility` (`id`, `team_id`, `role`, `responsibility`) VALUES
(1, 4, 'asdfasdf', 'asfgasdfgsd');

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
  PRIMARY KEY (`id`),
  KEY `th_id` (`th_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_risk`
--

INSERT INTO `tbl_risk` (`id`, `th_id`, `mg`, `dr`, `pr`, `wa`, `rs`) VALUES
(1, 12, 'mg2', 'dr3', 'pr2', 'wa3', 'rs3');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`id`, `team_name`, `title`, `organization`, `email`, `phone`, `interest`) VALUES
(3, 'team 1', 'title 1', 'organization 1', 'email1@yahoo.com', '9485749875', '3'),
(4, 'dfg', 'adsfg', 'adfg', 'ghsfgdh@df.com', '4563456', '3'),
(5, '', '', '', '', '', ''),
(6, '', '', '', '', '', ''),
(7, '', '', '', '', '', ''),
(8, '', '', '', '', '', ''),
(9, '', '', '', '', '', ''),
(10, '', '', '', '', '', ''),
(11, '', '', '', '', '', ''),
(12, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_th`
--

CREATE TABLE `tbl_th` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `th_name` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_th`
--

INSERT INTO `tbl_th` (`id`, `th_name`) VALUES
(7, 'Th1'),
(8, 'Th2'),
(9, 'Th3'),
(10, 'Th4'),
(11, 'Th5'),
(12, 'Nitendo Games'),
(13, ''),
(14, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_th_action`
--

CREATE TABLE `tbl_th_action` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `th_id` bigint(20) NOT NULL,
  `action_text` text,
  PRIMARY KEY (`id`),
  KEY `th_id` (`th_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_assessment_th`
--
ALTER TABLE `tbl_assessment_th`
  ADD CONSTRAINT `tbl_assessment_th_ibfk_1` FOREIGN KEY (`assessment_id`) REFERENCES `tbl_assessment` (`id`),
  ADD CONSTRAINT `tbl_assessment_th_ibfk_2` FOREIGN KEY (`th_id`) REFERENCES `tbl_th` (`id`);

--
-- Constraints for table `tbl_fn_action`
--
ALTER TABLE `tbl_fn_action`
  ADD CONSTRAINT `tbl_fn_action_ibfk_1` FOREIGN KEY (`fn_id`) REFERENCES `tbl_fn` (`id`);

--
-- Constraints for table `tbl_goal_first`
--
ALTER TABLE `tbl_goal_first`
  ADD CONSTRAINT `tbl_goal_first_ibfk_1` FOREIGN KEY (`th_id`) REFERENCES `tbl_th` (`id`);

--
-- Constraints for table `tbl_goal_first_g1`
--
ALTER TABLE `tbl_goal_first_g1`
  ADD CONSTRAINT `tbl_goal_first_g1_ibfk_1` FOREIGN KEY (`goal_first_id`) REFERENCES `tbl_goal_first` (`id`);

--
-- Constraints for table `tbl_goal_first_g1_obj_fn`
--
ALTER TABLE `tbl_goal_first_g1_obj_fn`
  ADD CONSTRAINT `tbl_goal_first_g1_obj_fn_ibfk_1` FOREIGN KEY (`goal_first_g1_id`) REFERENCES `tbl_goal_first_g1` (`id`);

--
-- Constraints for table `tbl_goal_first_g2`
--
ALTER TABLE `tbl_goal_first_g2`
  ADD CONSTRAINT `tbl_goal_first_g2_ibfk_1` FOREIGN KEY (`goal_first_id`) REFERENCES `tbl_goal_first` (`id`);

--
-- Constraints for table `tbl_goal_first_g2_obj_fn`
--
ALTER TABLE `tbl_goal_first_g2_obj_fn`
  ADD CONSTRAINT `tbl_goal_first_g2_obj_fn_ibfk_1` FOREIGN KEY (`goal_first_g2_id`) REFERENCES `tbl_goal_first_g2` (`id`);

--
-- Constraints for table `tbl_goal_first_g3`
--
ALTER TABLE `tbl_goal_first_g3`
  ADD CONSTRAINT `tbl_goal_first_g3_ibfk_1` FOREIGN KEY (`goal_first_id`) REFERENCES `tbl_goal_first` (`id`);

--
-- Constraints for table `tbl_goal_first_g3_obj_fn`
--
ALTER TABLE `tbl_goal_first_g3_obj_fn`
  ADD CONSTRAINT `tbl_goal_first_g3_obj_fn_ibfk_1` FOREIGN KEY (`goal_first_g3_id`) REFERENCES `tbl_goal_first_g3` (`id`);

--
-- Constraints for table `tbl_goal_second`
--
ALTER TABLE `tbl_goal_second`
  ADD CONSTRAINT `tbl_goal_second_ibfk_1` FOREIGN KEY (`fn_id`) REFERENCES `tbl_fn` (`id`);

--
-- Constraints for table `tbl_goal_second_g1`
--
ALTER TABLE `tbl_goal_second_g1`
  ADD CONSTRAINT `tbl_goal_second_g1_ibfk_1` FOREIGN KEY (`goal_second_id`) REFERENCES `tbl_goal_second` (`id`);

--
-- Constraints for table `tbl_goal_second_g1_obj`
--
ALTER TABLE `tbl_goal_second_g1_obj`
  ADD CONSTRAINT `tbl_goal_second_g1_obj_ibfk_1` FOREIGN KEY (`goal_second_g1_id`) REFERENCES `tbl_goal_second_g1` (`id`);

--
-- Constraints for table `tbl_goal_second_g2`
--
ALTER TABLE `tbl_goal_second_g2`
  ADD CONSTRAINT `tbl_goal_second_g2_ibfk_1` FOREIGN KEY (`goal_second_id`) REFERENCES `tbl_goal_second` (`id`);

--
-- Constraints for table `tbl_goal_second_g2_obj`
--
ALTER TABLE `tbl_goal_second_g2_obj`
  ADD CONSTRAINT `tbl_goal_second_g2_obj_ibfk_1` FOREIGN KEY (`goal_second_g2_id`) REFERENCES `tbl_goal_second_g2` (`id`);

--
-- Constraints for table `tbl_goal_second_g3`
--
ALTER TABLE `tbl_goal_second_g3`
  ADD CONSTRAINT `tbl_goal_second_g3_ibfk_1` FOREIGN KEY (`goal_second_id`) REFERENCES `tbl_goal_second` (`id`);

--
-- Constraints for table `tbl_goal_second_g3_obj`
--
ALTER TABLE `tbl_goal_second_g3_obj`
  ADD CONSTRAINT `tbl_goal_second_g3_obj_ibfk_1` FOREIGN KEY (`goal_second_g3_id`) REFERENCES `tbl_goal_second_g3` (`id`);

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
-- Constraints for table `tbl_th_action`
--
ALTER TABLE `tbl_th_action`
  ADD CONSTRAINT `tbl_th_action_ibfk_1` FOREIGN KEY (`th_id`) REFERENCES `tbl_th` (`id`);
