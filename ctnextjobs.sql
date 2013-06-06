-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2013 at 05:35 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ctnextjobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `employerlogin`
--

CREATE TABLE IF NOT EXISTS `employerlogin` (
  `employerID` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `contactEmail` text NOT NULL,
  `companyName` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` text NOT NULL,
  PRIMARY KEY (`employerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employerlogin`
--

INSERT INTO `employerlogin` (`employerID`, `username`, `password`, `contactEmail`, `companyName`, `address`, `city`, `state`, `zip`) VALUES
(2, 'coders123', 'friday', 'tson830@yahoo.com', 'tom''s coding company', '31 Bart Road', 'Monroe', 'Connecticut', '06468');

-- --------------------------------------------------------

--
-- Table structure for table `jobpostings`
--

CREATE TABLE IF NOT EXISTS `jobpostings` (
  `jobName` text NOT NULL,
  `companyName` text NOT NULL,
  `datePosted` datettime NOT NULL,
  `address` text NOT NULL,
  `jobDescription` text NOT NULL,
  `skillsRequired` text NOT NULL,
  `other` text NOT NULL,
  `contactEmail` text NOT NULL,
  `companySite` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobpostings`
--

INSERT INTO `jobpostings` (`jobName`, `companyName`, `datePosted`, `jobDescription`, `skillsRequired`, `other`, `contactEmail`, `companySite`) VALUES
('tom', 'tom''s coding company', '2011-12-30', '760 chapel st, new haven, ct', 'web development', 'php', 'dedication', 'tson830@yahoo.com', 'www.google.com'),
('tom', 'tom''s coding company', '2011-12-30', '1006 chapel st, new haven, ct', 'web development', 'php', 'dedication', 'tson830@yahoo.com', 'www.google.com'),
('.', '.', '2012-11-30', '130 lane st, hamden, ct', '.', 'c++', 'has fun', 'tson830@yahoo.com', 'http:www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE IF NOT EXISTS `jobseeker` (
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` text NOT NULL,
  `emailaddress` text NOT NULL,
  `telephone` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `jobseekerID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`jobseekerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`firstName`, `lastName`, `address`, `city`, `state`, `zip`, `emailaddress`, `telephone`, `username`, `password`, `jobseekerID`) VALUES
('tom', 'Sonnemann', '', 'Monroe', 'Connecticut', '06468', 'tson830@yahoo.com', '2032099333', 'tson1990', 'friday', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
