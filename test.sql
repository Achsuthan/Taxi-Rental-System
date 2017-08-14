-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2014 at 07:40 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `name` varchar(50) NOT NULL,
  `email` varchar(32) NOT NULL,
  `address` varchar(50) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `contact_no` int(14) NOT NULL,
  `pass` varchar(200) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `address`, `nic`, `contact_no`, `pass`) VALUES
('Saad Sahibjan', 'saadbulto@gmail.com', '138/2, Dematagoda Rd, Colombo09.', '943230420v', 779303127, '6c40907c12a980873f0172406a944fa7a18ca720');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name_type` varchar(4) NOT NULL,
  `F_Name` varchar(30) NOT NULL,
  `L_Name` varchar(30) NOT NULL,
  `card` varchar(50) NOT NULL,
  `cvv` int(10) NOT NULL,
  `Phone_Number` int(20) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Travel_Time` varchar(10) NOT NULL,
  `No_Of_Passanger` int(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Vehicle_Type` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ID`, `Name_type`, `F_Name`, `L_Name`, `card`, `cvv`, `Phone_Number`, `Address`, `Date`, `Travel_Time`, `No_Of_Passanger`, `Email`, `Vehicle_Type`, `username`) VALUES
(71, 'Mr', 'Brintha', 'Vaseekaran', '', 0, 774455878, '18,3/4,Collingwood place,Colombo-06', '15/09/2014', '08:00', 2, 'Brinthamahendran123@gmail.com', 'car', ''),
(72, 'Mr', 'Mahendran', 'Achsuthan', '', 0, 774455878, '18,2/4,colling wood place colombo-06', '11/11/2014', '11:11', 6, 'achsuthan2010@yahoo.com', 'tuck tuck', ''),
(73, 'Mr', 'achsuthan', 'magjgj', '', 0, 123456789, 'fklsdflsdfjlksdfj', '01/11/3434', '22:55', 4, 'achsuthan2010@yahoo.com', 'van', ''),
(74, 'Mr', 'Achsuthan', 'Achsuthan', '', 0, 774455878, '18,2/4 colling wood place col-o6', '11/11/1111', '11:11', 3, 'jeyamaal@gmail.com', 'tuck tuck', ''),
(75, 'Mr', 'Achsuthan', 'Mahendran', '', 0, 774455878, '18,2/4 colling wood place col-o6', '11/11/1111', '11:11', 3, 'vaseekaran26@gmail.com', 'van', ''),
(90, 'mr', 'kjcf', 'kdnsv', '', 0, 898, 'nsdjknvjk', 'ndjknc', 'ndknv', 87, 'ddvn', 'kjv', ''),
(91, 'Mr', 'Saad', 'Sahibjan', '1234567890987654', 123, 779303127, 'jasgfs', '2014-12-12', '13:00', 6, 'saadbulto@ymail.com', 'van', ''),
(92, 'Mr', 'Saad', 'Sahibjan', '1234567890987654', 123, 779303127, 'jasgfs', '2014-12-12', '13:00', 6, 'saadbulto@ymail.com', 'van', ''),
(93, 'Mr', 'Saad', 'Sahibjan', '1234567890123456', 123, 779303127, '7286jkhd', '2014-12-31', '12:59', 3, 'saadbulto@ymail.com', 'car', ''),
(94, 'Mr', 'Saad', 'Sahibjan', '1234567890123456', 123, 779303127, '7286jkhd', '2014-12-31', '12:59', 3, 'saadbulto@ymail.com', 'car', ''),
(95, 'Mr', 'Saad', 'Sahibjan', '1234567890123456', 123, 779303127, '7286jkhd', '2014-12-31', '12:59', 3, 'saadbulto@ymail.com', 'car', ''),
(96, 'Mr', 'Saad', 'Sahibjan', '1234567890981234', 123, 779303127, 'dfjk5', '2014-12-31', '12:59', 1, 'saadbulto@ymail.com', 'van', 'rifhan22'),
(97, 'Mr', 'Saad', 'Sahibjan', '1234567890123456', 123, 779303127, '138/2, demat', '2014-12-31', '12:59', 1, 'saadbulto@gmail.com', 'car', 'rifhan22');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `details1` varchar(100) NOT NULL,
  `details2` varchar(100) NOT NULL,
  `details3` varchar(100) NOT NULL,
  `details4` varchar(100) NOT NULL,
  `details5` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `details1`, `details2`, `details3`, `details4`, `details5`) VALUES
(1, '1st 5km RS300 per KM RS60', '1 hr package and max 60km =RS2000', '2 hr package and max 100km=RS4000', 'AIRPORT PICK AND DROP 2500', 'AIRPORT DROP 2000');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE IF NOT EXISTS `drivers` (
  `id` varchar(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `age` int(3) NOT NULL,
  `salary` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `fname`, `lname`, `address`, `NIC`, `age`, `salary`) VALUES
('123yamu', 'Saad', 'Sahibjan', 'kllk', '943230420V', 49, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `answer`, `question`) VALUES
(13, 'A. First register with us, then use the username to log in to the webpage and access the book now page to make your bookings.', 'Q. How to book vehicles?'),
(14, 'Access the Gallery Page or the Book Now page.', 'What are the vehicles available?'),
(15, 'Use your credit card to make initial payment and pay the rest at dispatch.', 'How to make payments?');

-- --------------------------------------------------------

--
-- Table structure for table `tuck_tuck`
--

CREATE TABLE IF NOT EXISTS `tuck_tuck` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `details1` varchar(100) NOT NULL,
  `details2` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tuck_tuck`
--

INSERT INTO `tuck_tuck` (`id`, `details1`, `details2`) VALUES
(1, '1st km RS55 every 100m RS5', '1hr package max 40km 1200 ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` int(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sign_up_date` date NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `last_logged_in` datetime NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `firstname`, `lastname`, `email`, `contact`, `password`, `sign_up_date`, `ip_address`, `last_logged_in`) VALUES
('rifhan22', 'gh', 'jkhdf', 'rifhan@hotmail.com', 779303127, '2dbc2fd2358e1ea1b7a6bc08ea647b9a337ac92d', '2014-09-23', '::1', '0000-00-00 00:00:00'),
('saad', 'Saad', 'Sahibjan', 'saad_bulto@ymail.com', 779303127, '432ef7dfc0a00b757178875205e8c229a8bddcc4', '2014-09-18', '::1', '0000-00-00 00:00:00'),
('zxcv', 'Saad', 'kjash', 'asfsdkj@gmail.com', 779303127, '5fa339bbbb1eeaced3b52e54f44576aaf0d77d96', '2014-09-23', '::1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `van`
--

CREATE TABLE IF NOT EXISTS `van` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `details1` varchar(100) NOT NULL,
  `details2` varchar(100) NOT NULL,
  `details3` varchar(100) NOT NULL,
  `details4` varchar(100) NOT NULL,
  `details5` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `van`
--

INSERT INTO `van` (`id`, `details1`, `details2`, `details3`, `details4`, `details5`) VALUES
(1, '1st 5km RS350 per KM RS65', '1 hr package and max 60km =RS2200', '2 hr package and max 100km=RS4000', 'AIRPORT PICK AND DROP 2500', 'AIRPORT DROP 2100');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `type` varchar(30) NOT NULL,
  `features` varchar(255) DEFAULT NULL,
  `modelNo` int(30) NOT NULL,
  `make` varchar(10) NOT NULL,
  `model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`type`, `features`, `modelNo`, `make`, `model`) VALUES
('car', 'AC', 20114, '2012', ''),
('van', 'Non-ac', 201145, '0', '2014'),
('van', 'AC', 2144, 'Honda', '2014'),
('tuk tuk', 'non ac', 21445, 'alba', '2010'),
('car', 'ac', 1402, 'toyota', '2014'),
('car', 'ac', 1403, 'toyota', '2011'),
('car', 'ac', 10001, 'honda', '2008'),
('car', 'ac', 1004, 'nissan', '2006'),
('van', 'non-ac', 1002, 'mitsubishi', '2001'),
('car', 'ac', 10025, 'nissan', '2002'),
('tuk tuk', '', 2101, 'bajaj', '2009'),
('car', 'ac', 30002, 'honda', 'civic'),
('car', 'ac', 30002, 'honda', 'civic'),
('car', 'ac', 30002, 'honda', 'sports'),
('car', 'ac', 30003, 'sunny', 'nissan'),
('car', 'non-ac', 30004, 'prius', 'toyota'),
('van', 'ac', 30005, 'ranger', 'nissan'),
('tuk tuk', NULL, 30005, '4 stroke', 'bajaj'),
('tuk', NULL, 30006, '2 stroke', 'bajaj'),
('car', 'ac', 30002, 'honda', 'sports'),
('car', 'ac', 30003, 'sunny', 'nissan'),
('car', 'non-ac', 30004, 'prius', 'toyota'),
('van', 'ac', 30005, 'ranger', 'nissan'),
('tuk tuk', NULL, 30005, '4 stroke', 'bajaj'),
('tuk', NULL, 30006, '2 stroke', 'bajaj'),
('car', 'AC', 20114, '2012', ''),
('van', 'Non-ac', 201145, '0', '2014'),
('van', 'AC', 2144, 'Honda', '2014'),
('tuk tuk', 'non ac', 21445, 'alba', '2010'),
('car', 'ac', 1402, 'toyota', '2014'),
('car', 'ac', 1403, 'toyota', '2011'),
('car', 'ac', 10001, 'honda', '2008'),
('car', 'ac', 1004, 'nissan', '2006'),
('van', 'non-ac', 1002, 'mitsubishi', '2001'),
('car', 'ac', 10025, 'nissan', '2002'),
('tuk tuk', '', 2101, 'bajaj', '2009'),
('car', 'ac', 30002, 'honda', 'civic'),
('car', 'ac', 30002, 'honda', 'civic'),
('car', 'ac', 30002, 'honda', 'sports'),
('car', 'ac', 30003, 'sunny', 'nissan'),
('car', 'non-ac', 30004, 'prius', 'toyota'),
('van', 'ac', 30005, 'ranger', 'nissan'),
('tuk tuk', NULL, 30005, '4 stroke', 'bajaj'),
('tuk', NULL, 30006, '2 stroke', 'bajaj'),
('car', 'ac', 30002, 'honda', 'sports'),
('car', 'ac', 30003, 'sunny', 'nissan'),
('car', 'non-ac', 30004, 'prius', 'toyota'),
('van', 'ac', 30005, 'ranger', 'nissan'),
('tuk tuk', NULL, 30005, '4 stroke', 'bajaj'),
('tuk', NULL, 30006, '2 stroke', 'bajaj');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
