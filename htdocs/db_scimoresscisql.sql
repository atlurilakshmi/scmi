-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Nov 25, 2009 at 02:54 PM
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
  `sci_address` varchar(255) NOT NULL,
  `sci_city` varchar(60) NOT NULL,
  `sci_state` varchar(50) NOT NULL,
  `sci_country` varchar(60) NOT NULL,
  `sci_zip` int(10) NOT NULL,
  `sci_mobile` int(12) NOT NULL,
  `sci_phone` int(12) NOT NULL,
  `sci_status` varchar(30) NOT NULL,
  PRIMARY KEY  (`sci_cust_id`),
  UNIQUE KEY `sci_email` (`sci_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='scimores customer information table' AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `sci_cust_info`
-- 

INSERT INTO `sci_cust_info` VALUES (1, 'michael', 'mike14', 'mike', 'jack', 'mic_sri@yahoo.co.in', 'north street,srirenagarajapuram', 'Tirunelveli', 'Tamilnadu', 'India', 6587567, 2147483647, 789567546, '');
INSERT INTO `sci_cust_info` VALUES (2, 'jegan', 'jack', 'Fransis', 'Antony', 'jack@hdsa.com', 'Sdff sdfs sdfsdfsd fsdf', 'Tirunelveli', 'Tamilnadu', 'Haiti', 7656567, 2147483647, 789789789, '');
INSERT INTO `sci_cust_info` VALUES (6, 'kumara', 'kum', 'Sankar', 'Kumar', 'kumar@yahoo.com', 'North street,srirenagarajapuram', 'Kanyakumari', 'Tamilnadu', 'India', 5675656, 2147483647, 867867867, '');
INSERT INTO `sci_cust_info` VALUES (8, 'packiyaraj', 'pack', 'Pack', 'Raj', 'asdasd@sdfs.com', 'Sdafsadfsadf', 'Sadfsadf', 'Sadfsadf', 'Belarus', 8765, 2147483647, 567567, '');
INSERT INTO `sci_cust_info` VALUES (9, 'indian', 'ind', 'Baharath', 'Matha', 'matha@yahoo.com', 'Main road,nungambakkam', 'Chennai', 'Tamilnadu', 'India', 678678, 2147483647, 98767465, '');
INSERT INTO `sci_cust_info` VALUES (20, 'kanan', 'kan', 'Kannan', 'Mani', 'mani@yahoo.com', 'Xxxx', 'Yyyy', 'Tamilnadu', 'India', 5675, 2147483647, 45634533, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `sci_stock_info`
-- 

CREATE TABLE `sci_stock_info` (
  `sci_cust_id` int(6) NOT NULL,
  `sci_transaction` varchar(30) NOT NULL,
  `sci_sharetype` varchar(30) NOT NULL,
  `sci_warrantdate` date NOT NULL,
  `sci_noofshare` int(6) NOT NULL,
  `sci_certificationno` varchar(30) NOT NULL,
  `sci_transactiondate` date NOT NULL,
  `sci_purchasevalue` double(10,2) NOT NULL,
  `sci_currentvalue` double(10,2) NOT NULL,
  `sci_auth_code` varchar(30) NOT NULL,
  `sci_shareholdertype` varchar(30) NOT NULL,
  `sci_sharepercentage` float(8,2) NOT NULL,
  `sci_ststus` varchar(20) NOT NULL,
  `sci_paymentmode` varchar(20) NOT NULL,
  UNIQUE KEY `sci_cust_id` (`sci_cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='scimores stock information';

-- 
-- Dumping data for table `sci_stock_info`
-- 

