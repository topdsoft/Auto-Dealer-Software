-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2011 at 12:09 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `autodealer`
--

-- --------------------------------------------------------

--
-- Table structure for table `autos`
--

CREATE TABLE IF NOT EXISTS `autos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `make_id` int(10) unsigned NOT NULL,
  `body_id` int(10) unsigned NOT NULL,
  `model` varchar(40) NOT NULL,
  `trim` varchar(40) NOT NULL,
  `year` int(10) unsigned NOT NULL,
  `vin` varchar(20) NOT NULL,
  `mileage` int(10) unsigned NOT NULL,
  `intColor` varchar(20) NOT NULL,
  `extColor` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `scancode` varchar(20) DEFAULT NULL,
  `engine` varchar(20) NOT NULL,
  `transmission` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `sold` datetime DEFAULT NULL,
  `options` text,
  `warranty` text,
  `notes` text,
  PRIMARY KEY (`id`),
  KEY `make_id` (`make_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `autos`
--


-- --------------------------------------------------------

--
-- Table structure for table `bodies`
--

CREATE TABLE IF NOT EXISTS `bodies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bodies`
--

INSERT INTO `bodies` (`id`, `name`) VALUES
(1, 'SUV'),
(2, 'Convertable'),
(3, 'Sedan'),
(4, 'Coupe'),
(5, 'Pickup'),
(6, 'Wagon');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fName` varchar(40) NOT NULL,
  `lName` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `customers`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  `auto_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auto_id` (`auto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `images`
--


-- --------------------------------------------------------

--
-- Table structure for table `makes`
--

CREATE TABLE IF NOT EXISTS `makes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `makes`
--

INSERT INTO `makes` (`id`, `name`) VALUES
(1, 'Cheverolet'),
(2, 'Ford'),
(3, 'Lincoln'),
(4, 'Mercury'),
(5, 'Buick'),
(6, 'Dodge'),
(7, 'BMW'),
(9, 'Honda'),
(10, 'Datsun'),
(11, 'Audi'),
(12, 'Cadillac'),
(13, 'Chrysler'),
(14, 'GMC'),
(15, 'Hummer'),
(16, 'Hyundai'),
(17, 'Infiniti'),
(18, 'Isuzu'),
(19, 'Jaguar'),
(20, 'Jeep'),
(21, 'Kia'),
(22, 'Land Rover'),
(23, 'Mazda'),
(24, 'Mercedes-Benz'),
(25, 'Mitsubishi'),
(26, 'Nissan'),
(27, 'Oldsmobile'),
(28, 'Pontiac'),
(29, 'Saab'),
(30, 'Lexus'),
(31, 'Saturn'),
(32, 'Subaru'),
(34, 'Suzuki'),
(35, 'Toyota'),
(36, 'Wolkswagen'),
(37, 'Volvo'),
(38, 'Acura'),
(39, 'Eagle');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `auto_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `salePrice` decimal(10,2) NOT NULL,
  `notes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sales`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--
--
-- Constraints for dumped tables
--

--
-- Constraints for table `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_ibfk_1` FOREIGN KEY (`make_id`) REFERENCES `makes` (`id`);
