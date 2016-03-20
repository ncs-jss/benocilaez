-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2016 at 01:08 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `campuspuppy`
--

-- --------------------------------------------------------

--
-- Table structure for table `college_ambassadors`
--

CREATE TABLE IF NOT EXISTS `college_ambassadors` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `college` int(4) NOT NULL,
  `verify_users` tinyint(1) NOT NULL,
  `manage_college_profile` tinyint(1) NOT NULL,
  `manage_events` tinyint(1) NOT NULL,
  `manage_subambassadors` tinyint(1) NOT NULL,
  `manage_courses_and_batches` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `college_ambassadors`
--

INSERT INTO `college_ambassadors` (`id`, `name`, `email`, `mobile`, `college`, `verify_users`, `manage_college_profile`, `manage_events`, `manage_subambassadors`, `manage_courses_and_batches`) VALUES
(1, 'Nikhil Verma', 'vrmanikhil@gmail.com', 7503705892, 0, 1, 1, 1, 1, 1),
(2, 'Prashant Chaudhary', 'prashantp099@gmail.com', 9044509199, 0, 2, 2, 2, 2, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
