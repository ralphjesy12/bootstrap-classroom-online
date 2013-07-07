-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2013 at 03:43 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uoc`
--
CREATE DATABASE `uoc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uoc`;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_activity`
--

CREATE TABLE IF NOT EXISTS `uoc_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `desc` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_announcements`
--

CREATE TABLE IF NOT EXISTS `uoc_announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `atitle` text NOT NULL,
  `adesc` text NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acreator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_assignments`
--

CREATE TABLE IF NOT EXISTS `uoc_assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asTitle` text NOT NULL,
  `asDesc` text NOT NULL,
  `asEndDate` date NOT NULL,
  `cid` int(11) NOT NULL,
  `asCdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_assignsubmissions`
--

CREATE TABLE IF NOT EXISTS `uoc_assignsubmissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `assid` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `filename` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_assignuploads`
--

CREATE TABLE IF NOT EXISTS `uoc_assignuploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `filename` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_bu`
--

CREATE TABLE IF NOT EXISTS `uoc_bu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `desc` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_courses`
--

CREATE TABLE IF NOT EXISTS `uoc_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctitle` text NOT NULL,
  `ccode` varchar(8) NOT NULL,
  `cvis` int(11) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `passkey` varchar(8) NOT NULL,
  `ccreator` int(11) NOT NULL,
  `cdesc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_enrollment`
--

CREATE TABLE IF NOT EXISTS `uoc_enrollment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseid` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `enrolldate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_events`
--

CREATE TABLE IF NOT EXISTS `uoc_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `etitle` text NOT NULL,
  `edesc` text NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edate` date NOT NULL,
  `ecreator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_feedbacks`
--

CREATE TABLE IF NOT EXISTS `uoc_feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_gchat`
--

CREATE TABLE IF NOT EXISTS `uoc_gchat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `uname` text NOT NULL,
  `msg` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_learned`
--

CREATE TABLE IF NOT EXISTS `uoc_learned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_learning`
--

CREATE TABLE IF NOT EXISTS `uoc_learning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `type` text NOT NULL,
  `lname` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_lessons`
--

CREATE TABLE IF NOT EXISTS `uoc_lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asTitle` text NOT NULL,
  `asDesc` text NOT NULL,
  `asEndDate` date NOT NULL,
  `cid` int(11) NOT NULL,
  `asCdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_lessonuploads`
--

CREATE TABLE IF NOT EXISTS `uoc_lessonuploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `filename` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_members`
--

CREATE TABLE IF NOT EXISTS `uoc_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `eml` varchar(36) NOT NULL,
  `uname` varchar(36) NOT NULL,
  `pass` varchar(36) NOT NULL,
  `jdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `utype` int(1) NOT NULL,
  `regid` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `uoc_members`
--

INSERT INTO `uoc_members` (`id`, `fname`, `lname`, `eml`, `uname`, `pass`, `jdate`, `utype`, `regid`) VALUES
(1, 'OLFU', 'Administrator', 'olfuadmin@yahoo.com', 'OLFUadmin', 'password', '2013-06-24 14:10:02', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `uoc_messages`
--

CREATE TABLE IF NOT EXISTS `uoc_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_qqoptions`
--

CREATE TABLE IF NOT EXISTS `uoc_qqoptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `qqid` int(11) NOT NULL,
  `text` text NOT NULL,
  `tof` text NOT NULL,
  `qqonum` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_quizquestions`
--

CREATE TABLE IF NOT EXISTS `uoc_quizquestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `text` text NOT NULL,
  `qnum` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_quizresults`
--

CREATE TABLE IF NOT EXISTS `uoc_quizresults` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `score` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_quizzes`
--

CREATE TABLE IF NOT EXISTS `uoc_quizzes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qTitle` text NOT NULL,
  `qDate` date NOT NULL,
  `qTs` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_studentid`
--

CREATE TABLE IF NOT EXISTS `uoc_studentid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studid` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uoc_welcome`
--

CREATE TABLE IF NOT EXISTS `uoc_welcome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
