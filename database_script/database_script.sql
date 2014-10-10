-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2014 at 09:41 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `db_sami_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assessment`
--

create table tbl_user(
    id int auto_increment,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    email varchar(70) not null,
    phone_number varchar(30) not null,
    member_type varchar(50) not null,
    modified_by int not null,
    modification_date date not null,
    primary key(id),
    foreign key(modified_by) references tbl_user(id)
);

CREATE TABLE `tbl_assessment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `assessment_type` varchar(50) NOT NULL,
  `assessment_date` date NOT NULL,
  `summary` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_assessment`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_assessment_th`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_fn`
--

CREATE TABLE `tbl_fn` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fn_name` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_fn`
--

INSERT INTO `tbl_fn` VALUES(1, 'sdfdsf');
INSERT INTO `tbl_fn` VALUES(2, 'sdfdf');
INSERT INTO `tbl_fn` VALUES(3, 'dfsf');
INSERT INTO `tbl_fn` VALUES(4, 'this is mahder');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_fn_action`
--

INSERT INTO `tbl_fn_action` VALUES(1, 4, 'Bill Cosby Action. I love this guy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first`
--

CREATE TABLE `tbl_goal_first` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `th_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `th_id` (`th_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_goal_first`
--

INSERT INTO `tbl_goal_first` VALUES(5, 4);
INSERT INTO `tbl_goal_first` VALUES(1, 5);
INSERT INTO `tbl_goal_first` VALUES(2, 5);
INSERT INTO `tbl_goal_first` VALUES(3, 5);
INSERT INTO `tbl_goal_first` VALUES(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g1`
--

CREATE TABLE `tbl_goal_first_g1` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_id` bigint(20) NOT NULL,
  `g1` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_id` (`goal_first_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_goal_first_g1`
--

INSERT INTO `tbl_goal_first_g1` VALUES(1, 1, 'hgjhg', 1);
INSERT INTO `tbl_goal_first_g1` VALUES(2, 1, 'lskdjf', 2);
INSERT INTO `tbl_goal_first_g1` VALUES(3, 1, 'hgjh', 3);
INSERT INTO `tbl_goal_first_g1` VALUES(4, 1, 'jhghg', 4);
INSERT INTO `tbl_goal_first_g1` VALUES(5, 5, 'This is G1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g1_obj_fn`
--

CREATE TABLE `tbl_goal_first_g1_obj_fn` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_g1_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_g1_id` (`goal_first_g1_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_goal_first_g1_obj_fn`
--

INSERT INTO `tbl_goal_first_g1_obj_fn` VALUES(1, 2, '', 1);
INSERT INTO `tbl_goal_first_g1_obj_fn` VALUES(2, 2, '', 1);
INSERT INTO `tbl_goal_first_g1_obj_fn` VALUES(3, 3, 'jkhkjiu', 2);
INSERT INTO `tbl_goal_first_g1_obj_fn` VALUES(4, 3, 'kjkjh', 2);
INSERT INTO `tbl_goal_first_g1_obj_fn` VALUES(5, 4, 'hkjh', 3);
INSERT INTO `tbl_goal_first_g1_obj_fn` VALUES(6, 4, 'yuhjg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g2`
--

CREATE TABLE `tbl_goal_first_g2` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_id` bigint(20) NOT NULL,
  `g2` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_id` (`goal_first_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_goal_first_g2`
--

INSERT INTO `tbl_goal_first_g2` VALUES(1, 1, 'jhhgf', 1);
INSERT INTO `tbl_goal_first_g2` VALUES(2, 1, 'dlfkjdklj', 2);
INSERT INTO `tbl_goal_first_g2` VALUES(3, 1, 'hkjhj', 3);
INSERT INTO `tbl_goal_first_g2` VALUES(4, 1, 'hjgjhg', 4);
INSERT INTO `tbl_goal_first_g2` VALUES(5, 5, 'This is G2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g2_obj_fn`
--

CREATE TABLE `tbl_goal_first_g2_obj_fn` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_g2_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_g2_id` (`goal_first_g2_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_goal_first_g2_obj_fn`
--

INSERT INTO `tbl_goal_first_g2_obj_fn` VALUES(1, 2, '', 1);
INSERT INTO `tbl_goal_first_g2_obj_fn` VALUES(2, 2, '', 2);
INSERT INTO `tbl_goal_first_g2_obj_fn` VALUES(3, 3, 'kjhjkh', 3);
INSERT INTO `tbl_goal_first_g2_obj_fn` VALUES(4, 3, 'ijkhjk', 4);
INSERT INTO `tbl_goal_first_g2_obj_fn` VALUES(5, 4, 'kjhjkh', 1);
INSERT INTO `tbl_goal_first_g2_obj_fn` VALUES(6, 4, 'ijkhjk', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g3`
--

CREATE TABLE `tbl_goal_first_g3` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_id` bigint(20) NOT NULL,
  `g3` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_id` (`goal_first_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_goal_first_g3`
--

INSERT INTO `tbl_goal_first_g3` VALUES(1, 1, 'kguhg', 1);
INSERT INTO `tbl_goal_first_g3` VALUES(2, 1, 'dfkljdkjf', 2);
INSERT INTO `tbl_goal_first_g3` VALUES(3, 1, 'iyuiu', 3);
INSERT INTO `tbl_goal_first_g3` VALUES(4, 1, 'gjhghg', 4);
INSERT INTO `tbl_goal_first_g3` VALUES(5, 5, 'This is G3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_first_g3_obj_fn`
--

CREATE TABLE `tbl_goal_first_g3_obj_fn` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `goal_first_g3_id` bigint(20) NOT NULL,
  `obj` varchar(50) NOT NULL,
  `fn_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goal_first_g3_id` (`goal_first_g3_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_goal_first_g3_obj_fn`
--

INSERT INTO `tbl_goal_first_g3_obj_fn` VALUES(1, 2, '', 1);
INSERT INTO `tbl_goal_first_g3_obj_fn` VALUES(2, 2, '', 2);
INSERT INTO `tbl_goal_first_g3_obj_fn` VALUES(3, 3, '', 3);
INSERT INTO `tbl_goal_first_g3_obj_fn` VALUES(4, 3, '', 4);
INSERT INTO `tbl_goal_first_g3_obj_fn` VALUES(5, 4, 'madew', 1);
INSERT INTO `tbl_goal_first_g3_obj_fn` VALUES(6, 4, 'lkhj', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_goal_second`
--

CREATE TABLE `tbl_goal_second` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fn_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fn_id` (`fn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_goal_second`
--

INSERT INTO `tbl_goal_second` VALUES(2, 1);
INSERT INTO `tbl_goal_second` VALUES(4, 1);
INSERT INTO `tbl_goal_second` VALUES(7, 1);
INSERT INTO `tbl_goal_second` VALUES(3, 3);
INSERT INTO `tbl_goal_second` VALUES(6, 3);
INSERT INTO `tbl_goal_second` VALUES(1, 4);
INSERT INTO `tbl_goal_second` VALUES(5, 4);
INSERT INTO `tbl_goal_second` VALUES(8, 4);
INSERT INTO `tbl_goal_second` VALUES(9, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_goal_second_g1`
--

INSERT INTO `tbl_goal_second_g1` VALUES(1, 1, 'a');
INSERT INTO `tbl_goal_second_g1` VALUES(2, 2, 'df');
INSERT INTO `tbl_goal_second_g1` VALUES(3, 3, 'sdf');
INSERT INTO `tbl_goal_second_g1` VALUES(4, 1, 'eg');
INSERT INTO `tbl_goal_second_g1` VALUES(5, 3, 'sadf');
INSERT INTO `tbl_goal_second_g1` VALUES(6, 2, 'dfg');
INSERT INTO `tbl_goal_second_g1` VALUES(7, 1, 'd');
INSERT INTO `tbl_goal_second_g1` VALUES(8, 1, 'g1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_goal_second_g1_obj`
--

INSERT INTO `tbl_goal_second_g1_obj` VALUES(1, 4, 'erg');
INSERT INTO `tbl_goal_second_g1_obj` VALUES(2, 5, 'erg');
INSERT INTO `tbl_goal_second_g1_obj` VALUES(3, 5, 'tuk');
INSERT INTO `tbl_goal_second_g1_obj` VALUES(4, 8, 'g1 added obj');
INSERT INTO `tbl_goal_second_g1_obj` VALUES(5, 8, 'g1 added obj');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_goal_second_g2`
--

INSERT INTO `tbl_goal_second_g2` VALUES(1, 2, 'fds');
INSERT INTO `tbl_goal_second_g2` VALUES(2, 1, 'tyrj');
INSERT INTO `tbl_goal_second_g2` VALUES(3, 3, 'gf');
INSERT INTO `tbl_goal_second_g2` VALUES(4, 2, 'erthg');
INSERT INTO `tbl_goal_second_g2` VALUES(5, 1, 'f');
INSERT INTO `tbl_goal_second_g2` VALUES(6, 1, 'g2');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_goal_second_g2_obj`
--

INSERT INTO `tbl_goal_second_g2_obj` VALUES(1, 2, 'aefgwre');
INSERT INTO `tbl_goal_second_g2_obj` VALUES(2, 3, 'ghj');
INSERT INTO `tbl_goal_second_g2_obj` VALUES(3, 3, 'tyu');
INSERT INTO `tbl_goal_second_g2_obj` VALUES(4, 6, 'g2 added obj');
INSERT INTO `tbl_goal_second_g2_obj` VALUES(5, 6, 'g2 added obj');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_goal_second_g3`
--

INSERT INTO `tbl_goal_second_g3` VALUES(1, 2, 'vsdv');
INSERT INTO `tbl_goal_second_g3` VALUES(2, 1, 'g3');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_goal_second_g3_obj`
--

INSERT INTO `tbl_goal_second_g3_obj` VALUES(1, 1, 'rht');
INSERT INTO `tbl_goal_second_g3_obj` VALUES(4, 1, 'sdf');
INSERT INTO `tbl_goal_second_g3_obj` VALUES(5, 2, 'g3 added obj');
INSERT INTO `tbl_goal_second_g3_obj` VALUES(6, 2, 'g3 added obj');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_responsibility`
--

INSERT INTO `tbl_responsibility` VALUES(1, 2, 'This is the role description', 'this is the responsibility textarea');
INSERT INTO `tbl_responsibility` VALUES(2, 1, 'This is the second role', 'This is the second responsibility');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_risk`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` VALUES(1, 'Name', 'title', 'organization', 'mahdera@yahoo.com', '2020039494', '3');
INSERT INTO `tbl_team` VALUES(2, 'sdf', 'lksdjfk', 'lkdj', 'lekbirgebre@yahoo.com', '4985723984', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team_interest`
--

CREATE TABLE `tbl_team_interest` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) NOT NULL,
  `interest_name` varchar(70) NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_th`
--

INSERT INTO `tbl_th` VALUES(1, 'sdff');
INSERT INTO `tbl_th` VALUES(2, 'dfgdfg');
INSERT INTO `tbl_th` VALUES(3, 'undefined');
INSERT INTO `tbl_th` VALUES(4, 'A TH Name');
INSERT INTO `tbl_th` VALUES(5, 'Another TH');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_th_action`
--

INSERT INTO `tbl_th_action` VALUES(1, 5, 'This is the action done for Th action by Mahder Neway. This line is updated.');

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
-- Constraints for table `tbl_team_interest`
--
ALTER TABLE `tbl_team_interest`
  ADD CONSTRAINT `tbl_team_interest_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `tbl_team` (`id`);

--
-- Constraints for table `tbl_th_action`
--
ALTER TABLE `tbl_th_action`
  ADD CONSTRAINT `tbl_th_action_ibfk_1` FOREIGN KEY (`th_id`) REFERENCES `tbl_th` (`id`);

create table tbl_form_2(
    id bigint auto_increment,
    q2_1 text not null,
    q2_2 text not null,
    q2_3 text not null,
    q2_4 text not null,
    primary key(id)
);

create table tbl_form_3(
    id bigint auto_increment,
    q3_1 text not null,
    primary key(id)
);

create table tbl_form_4(
    id bigint auto_increment,
    q4_1 text not null,
    primary key(id)
);

create table tbl_form_5(
    id bigint auto_increment,
    q5_1 text not null,
    primary key(id)
);

create table tbl_form_6(
    id bigint auto_increment,
    q6_1 text not null,
    primary key(id)
);

create table tbl_form_7(
    id bigint auto_increment,
    q7_1 text not null,
    primary key(id)
);

create table tbl_form_8(
    id bigint auto_increment,
    q8_1 text not null,
    primary key(id)
);

create table tbl_form_9(
    id bigint auto_increment,
    q9_1 text not null,
    primary key(id)
);

create table tbl_form_10(
    id bigint auto_increment,
    q10_1 text not null,
    primary key(id)
);