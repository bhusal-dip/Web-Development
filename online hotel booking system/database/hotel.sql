-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2019 at 04:18 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `paid`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `paid` ()  NO SQL
SELECT * from booking WHERE STATUS="Paid"$$

DROP PROCEDURE IF EXISTS `unpaid`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `unpaid` ()  NO SQL
SELECT * from booking WHERE STATUS="Unpaid"$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `A_ID` int(3) NOT NULL AUTO_INCREMENT,
  `A_Name` varchar(20) NOT NULL,
  `A_Pass` varchar(20) NOT NULL,
  PRIMARY KEY (`A_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_ID`, `A_Name`, `A_Pass`) VALUES
(1, 'Sudip', 'admin'),
(2, 'Rupesh', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `B_ID` int(3) NOT NULL AUTO_INCREMENT,
  `C_ID` int(3) NOT NULL,
  `H_ID` int(3) NOT NULL,
  `R_NO` int(3) NOT NULL,
  `Amount` int(5) NOT NULL,
  `Status` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid',
  PRIMARY KEY (`B_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`B_ID`, `C_ID`, `H_ID`, `R_NO`, `Amount`, `Status`) VALUES
(12, 4, 101, 1, 1000, 'Paid'),
(13, 1, 101, 2, 1000, 'Paid'),
(14, 1, 101, 4, 1500, 'Paid'),
(15, 1, 100, 1, 1000, 'Paid'),
(18, 1, 100, 3, 2000, 'Paid'),
(17, 1, 100, 2, 1000, 'Paid'),
(20, 1, 101, 2, 1000, 'Paid');

--
-- Triggers `booking`
--
DROP TRIGGER IF EXISTS `delete-record`;
DELIMITER $$
CREATE TRIGGER `delete-record` AFTER DELETE ON `booking` FOR EACH ROW INSERT INTO record VALUES (OLD.B_ID, OLD.C_ID, OLD.H_ID, OLD.R_NO, OLD.Amount, 'Canceled')
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update-record1`;
DELIMITER $$
CREATE TRIGGER `update-record1` AFTER UPDATE ON `booking` FOR EACH ROW INSERT INTO record VALUES (NEW.B_ID, NEW.C_ID, NEW.H_ID, NEW.R_NO, NEW.Amount, 'Paid')
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_record`;
DELIMITER $$
CREATE TRIGGER `update_record` AFTER INSERT ON `booking` FOR EACH ROW INSERT INTO record VALUES (NEW.B_ID, NEW.C_ID, NEW.H_ID, NEW.R_NO, NEW.Amount, 'Booked')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `C_ID` int(3) NOT NULL AUTO_INCREMENT,
  `C_Name` varchar(20) NOT NULL,
  `C_Address` varchar(50) NOT NULL,
  `C_Email` varchar(30) NOT NULL,
  `C_Phone` bigint(10) NOT NULL,
  `C_Pass` varchar(20) NOT NULL,
  PRIMARY KEY (`C_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `C_Name`, `C_Address`, `C_Email`, `C_Phone`, `C_Pass`) VALUES
(1, 'Sudip Bhusal', 'Bangalore', 'sudip.17.beis@acharya.ac.in', 9980492380, 'asdf'),
(2, 'Sagar', 'Nepal', 'sagar1996@gmail.com', 9865326486, 'hello123'),
(3, 'Raj', 'Bangalore', 'raj12@gmail.com', 9823456123, 'asdf'),
(4, 'Kushal Dhungana', 'Nepal', 'kushaldhungana65@gmail.com', 8861019862, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `H_ID` int(3) NOT NULL,
  `H_Name` varchar(20) NOT NULL,
  `H_Address` varchar(50) NOT NULL,
  `H_Phone` bigint(10) NOT NULL,
  `H_Room` int(2) NOT NULL,
  PRIMARY KEY (`H_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`H_ID`, `H_Name`, `H_Address`, `H_Phone`, `H_Room`) VALUES
(100, 'TAJ', 'Mumbai', 9865326486, 3),
(101, 'Raddison Blu', 'Bangalore', 9576234567, 4),
(102, 'Shangrila', 'Bangalore', 9823421287, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reception`
--

DROP TABLE IF EXISTS `reception`;
CREATE TABLE IF NOT EXISTS `reception` (
  `R_ID` varchar(10) NOT NULL,
  `R_Name` varchar(20) NOT NULL,
  `R_Address` varchar(30) NOT NULL,
  `R_Phone` bigint(10) NOT NULL,
  `R_Pass` varchar(20) NOT NULL,
  PRIMARY KEY (`R_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reception`
--

INSERT INTO `reception` (`R_ID`, `R_Name`, `R_Address`, `R_Phone`, `R_Pass`) VALUES
('1taj001', 'Rita', 'Delhi', 9865326486, 'hello123'),
('1rad012', 'Madison', 'Assam', 9824356123, 'hello123');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
CREATE TABLE IF NOT EXISTS `record` (
  `B_ID` int(3) NOT NULL,
  `C_ID` int(3) NOT NULL,
  `H_ID` int(3) NOT NULL,
  `R_NO` int(3) NOT NULL,
  `Amount` int(5) NOT NULL,
  `Remark` enum('Canceled','Paid','Booked') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`B_ID`, `C_ID`, `H_ID`, `R_NO`, `Amount`, `Remark`) VALUES
(15, 1, 100, 1, 1000, 'Booked'),
(15, 1, 100, 1, 1000, 'Paid'),
(16, 1, 100, 1, 1000, 'Booked'),
(17, 1, 100, 2, 1000, 'Booked'),
(16, 1, 100, 1, 1000, 'Canceled'),
(18, 1, 100, 3, 2000, 'Booked'),
(18, 1, 100, 3, 2000, 'Paid'),
(17, 1, 100, 2, 1000, 'Paid'),
(19, 1, 101, 1, 1000, 'Booked'),
(20, 1, 101, 2, 1000, 'Booked'),
(19, 1, 101, 1, 1000, 'Canceled'),
(20, 1, 101, 2, 1000, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `R_NO` int(3) NOT NULL,
  `H_ID` int(11) NOT NULL,
  `R_Type` enum('Single-Bed','Double-Bed') NOT NULL,
  `R_Amount` int(5) NOT NULL,
  `Availability` enum('YES','NO') NOT NULL DEFAULT 'YES'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`R_NO`, `H_ID`, `R_Type`, `R_Amount`, `Availability`) VALUES
(1, 100, 'Single-Bed', 1000, 'YES'),
(2, 100, 'Single-Bed', 1000, 'YES'),
(3, 100, 'Double-Bed', 2000, 'YES'),
(1, 101, 'Single-Bed', 1500, 'YES'),
(2, 101, 'Double-Bed', 3000, 'YES'),
(3, 101, 'Double-Bed', 3000, 'YES'),
(4, 101, 'Single-Bed', 1500, 'YES'),
(1, 102, 'Single-Bed', 1200, 'YES'),
(2, 102, 'Double-Bed', 1800, 'YES'),
(3, 102, 'Single-Bed', 1200, 'YES'),
(4, 102, 'Double-Bed', 1800, 'YES'),
(5, 102, 'Double-Bed', 1800, 'YES');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
