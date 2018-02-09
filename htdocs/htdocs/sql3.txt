-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Nov 27, 2009 at 11:16 AM
-- Server version: 5.0.15
-- PHP Version: 5.0.5
-- 
-- Database: `db_scimores`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `sci_cust_info`
-- 

CREATE TABLE `sci_cust_info` (
  `sci_cust_id` int(5) NOT NULL auto_increment,
  `sci_username` varchar(30) NOT NULL,
  `sci_password` varchar(30) NOT NULL,
  `sci_fname` varchar(30) NOT NULL,
  `sci_lname` varchar(30) NOT NULL,
  `sci_email` varchar(80) NOT NULL,
  `sci_address` varchar(255) default NULL,
  `sci_city` varchar(60) default NULL,
  `sci_state` varchar(50) default NULL,
  `sci_country` varchar(60) NOT NULL,
  `sci_zip` int(10) NOT NULL,
  `sci_mobile` int(12) default NULL,
  `sci_phone` int(12) NOT NULL,
  `sci_status` varchar(30) NOT NULL,
  PRIMARY KEY  (`sci_cust_id`),
  UNIQUE KEY `sci_email` (`sci_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='scimores customer information table' AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `sci_cust_info`
-- 

INSERT INTO `sci_cust_info` VALUES (1, 'michael', 'mike14', 'mike', 'jack', 'mic_sri@yahoo.co.in', 'north street,srirenagarajapuram', 'Tirunelveli', 'Tamilnadu', 'India', 6587567, 2147483647, 789567546, 'APPROVED');
INSERT INTO `sci_cust_info` VALUES (2, 'jegan', 'jack', 'Fransis', 'Antony', 'jack@hdsa.com', 'Sdff sdfs sdfsdfsd fsdf', 'Tirunelveli', 'Tamilnadu', 'Haiti', 7656567, 2147483647, 789789789, '');
INSERT INTO `sci_cust_info` VALUES (6, 'kumara', 'kum', 'Sankar', 'Kumar', 'kumar@yahoo.com', 'North street,srirenagarajapuram', 'Kanyakumari', 'Tamilnadu', 'India', 5675656, 2147483647, 867867867, '');
INSERT INTO `sci_cust_info` VALUES (8, 'packiyaraj', 'pack', 'Pack', 'Raj', 'asdasd@sdfs.com', 'Sdafsadfsadf', 'Sadfsadf', 'Sadfsadf', 'Belarus', 8765, 2147483647, 567567, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `sci_reference`
-- 

CREATE TABLE `sci_reference` (
  `sci_sno` int(11) NOT NULL auto_increment,
  `sci_warrantdate` date NOT NULL,
  `sci_sharetype` varchar(50) NOT NULL,
  `sci_currentvalue` float(6,2) NOT NULL,
  PRIMARY KEY  (`sci_sno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='scimores references table' AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `sci_reference`
-- 

INSERT INTO `sci_reference` VALUES (1, '2012-12-31', 'warrented', 25.00);

-- --------------------------------------------------------

-- 
-- Table structure for table `sci_stock`
-- 

CREATE TABLE `sci_stock` (
  `sci_email` varchar(50) NOT NULL,
  `sci_trans_type` varchar(20) NOT NULL,
  `sci_trans_date` date NOT NULL,
  `sci_investment` bigint(10) NOT NULL,
  `sci_share_type` varchar(30) NOT NULL,
  `sci_num_share` int(11) NOT NULL,
  `sci_purchasevalue` float NOT NULL,
  `sci_approval_status` varchar(30) NOT NULL,
  `sci_auth_code` varchar(20) NOT NULL,
  `sci_certficateno` int(11) NOT NULL,
  `sci_pri_holder` varchar(50) NOT NULL,
  `sci_pri_percent` float NOT NULL,
  `sci_joint` varchar(40) NOT NULL,
  `sci_joint_percent` float NOT NULL,
  `sci_benifit1` varchar(40) NOT NULL,
  `sci_benifit1_percent` float NOT NULL,
  `sci_benifit2` varchar(40) NOT NULL,
  `sci_benifit2_percent` float NOT NULL,
  `sci_benifit3` varchar(40) NOT NULL,
  `sci_benifit3_percent` float NOT NULL,
  `sci_warrantdate` date NOT NULL,
  `sci_sharevalue` float(6,2) NOT NULL,
  `sci_sharetype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='scimores stock details table';

-- 
-- Dumping data for table `sci_stock`
-- 

INSERT INTO `sci_stock` VALUES ('asdasd@sdfs.com', 'Purchase', '2009-11-26', 123123, 'warrant', 4924, 0, 'APPROVED', '10', 0, 'ert', 17, 'ert', 39, 'ert', 9, 'ert', 16, 'ert', 58, '0000-00-00', 0.00, '');
INSERT INTO `sci_stock` VALUES ('asdasd@sdfs.com', 'Purchase', '2009-11-26', 9000, 'warrant', 360, 0, '', '', 0, 'tyu', 4, 'tyu', 5, 'tyu', 10, 'tyu', 18, 'tyu', 17, '0000-00-00', 0.00, '');
INSERT INTO `sci_stock` VALUES ('asdasd@sdfs.com', 'Purchase', '2009-11-27', 5000, 'warrant', 200, 0, '', '', 0, 'wsw', 18, 'weqr', 27, 'dfsg', 40, 'dfsg', 28, 'dfsgdfsg', 36, '2012-12-31', 25.00, 'warrant');
