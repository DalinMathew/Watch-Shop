-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2023 at 05:48 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watch`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `bookingid` int NOT NULL AUTO_INCREMENT,
  `watchid` int NOT NULL,
  `shopid` int NOT NULL,
  `custid` int NOT NULL,
  `brand` varchar(30) NOT NULL,
  `model` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`bookingid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `watchid`, `shopid`, `custid`, `brand`, `model`, `price`, `quantity`, `date`, `status`) VALUES
(7, 15, 39, 21, 'Boat', 'Flash', 2222, 2, '2023-12-09', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `custid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `place` varchar(20) NOT NULL,
  `phone` bigint NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`custid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custid`, `name`, `place`, `phone`, `email`) VALUES
(21, 'Ajith', 'Kottayam', 8637486472, 'ajith@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `type`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin'),
(73, 'ajith@gmail.com', 'ajith', 'customer'),
(72, 'dalin@gmail.com', 'dalin', 'shop');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `shopid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `shop_name` varchar(30) NOT NULL,
  `location` varchar(20) NOT NULL,
  `contact` bigint NOT NULL,
  `shop_regno` varchar(20) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `offer` varchar(255) NOT NULL,
  PRIMARY KEY (`shopid`),
  UNIQUE KEY `gst` (`gst`),
  UNIQUE KEY `shop_regno` (`shop_regno`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shopid`, `name`, `shop_name`, `location`, `contact`, `shop_regno`, `gst`, `email`, `offer`) VALUES
(39, 'Dalin1', 'Samsung Shoppy1', 'Idukki1', 9526673251, 'abc231', 'gst345vbdbde1', 'dalin@gmail.com', '50% on Smart Watches1');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `watchid` int NOT NULL,
  `shopid` int NOT NULL,
  `brand` varchar(30) NOT NULL,
  `model` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `price` int NOT NULL,
  `quantity` int DEFAULT NULL,
  UNIQUE KEY `watchid` (`watchid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`watchid`, `shopid`, `brand`, `model`, `price`, `quantity`) VALUES
(15, 39, 'Boat', 'Flash', 2222, 20),
(17, 39, 'Boat', 'Flash New', 1221, 20),
(16, 39, 'Titan', 'Flash12', 2323, 3);

-- --------------------------------------------------------

--
-- Table structure for table `suggest`
--

DROP TABLE IF EXISTS `suggest`;
CREATE TABLE IF NOT EXISTS `suggest` (
  `suggestid` int NOT NULL AUTO_INCREMENT,
  `watchid` int NOT NULL,
  `brand` varchar(30) NOT NULL,
  `model` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `suggest` varchar(255) NOT NULL,
  PRIMARY KEY (`suggestid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `suggest`
--

INSERT INTO `suggest` (`suggestid`, `watchid`, `brand`, `model`, `suggest`) VALUES
(18, 16, 'Titan', 'Flash12', 'Watch is now reduced 200 Rupees');

-- --------------------------------------------------------

--
-- Table structure for table `watch`
--

DROP TABLE IF EXISTS `watch`;
CREATE TABLE IF NOT EXISTS `watch` (
  `watchid` int NOT NULL AUTO_INCREMENT,
  `shopid` int NOT NULL,
  `brand` varchar(20) NOT NULL,
  `colour` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `shape` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `strap` varchar(20) NOT NULL,
  `screen` varchar(20) NOT NULL,
  `warrenty` varchar(10) NOT NULL,
  `water` varchar(10) NOT NULL,
  `call_val` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `model` varchar(20) NOT NULL,
  `price` bigint NOT NULL,
  `image` varchar(255) NOT NULL,
  `extra` varchar(300) NOT NULL,
  PRIMARY KEY (`watchid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `watch`
--

INSERT INTO `watch` (`watchid`, `shopid`, `brand`, `colour`, `type`, `shape`, `gender`, `strap`, `screen`, `warrenty`, `water`, `call_val`, `model`, `price`, `image`, `extra`) VALUES
(16, 0, 'Titan', 'Blue', 'Chain', 'Square', 'Female', 'Chain', 'AmoLED', '6 Months', 'No', 'Yes', 'Flash12', 2323, 'uploads/ajithra sign 2.jpg', '1.33\' inch hd display with 100+ Sports modes3'),
(15, 39, 'Boat', 'Black', 'Wrist', 'Round', 'Unisex', 'Chain', 'TFT', '1 Year', 'No', 'Yes', 'Flash', 2222, 'uploads/download.jpeg', '1.33\' inch hd display with 100+ Sports modes'),
(17, 0, 'Boat', 'Red', 'Chain', 'Square', 'Female', 'Chain', 'HD', '1 Year', 'No', 'No', 'Flash New', 1221, 'uploads/download.jpeg', '1.33\' inch hd display with 100+ Sports modes2'),
(18, 0, 'Boat', 'Red', 'Chain', 'Square', 'Female', 'Chain', 'HD', '1 Year', 'No', 'No', 'Flash New', 1221, 'uploads/download.jpeg', '1.33\' inch hd display with 100+ Sports modes2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
