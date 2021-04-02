-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2021 at 12:51 PM
-- Server version: 8.0.22
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roblant`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldata`
--

DROP TABLE IF EXISTS `tbldata`;
CREATE TABLE IF NOT EXISTS `tbldata` (
  `id` int NOT NULL AUTO_INCREMENT,
  `watered` varchar(121) NOT NULL,
  `moisture` float NOT NULL,
  `Temperatuur` int NOT NULL,
  `light` varchar(121) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` varchar(121) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldata`
--

INSERT INTO `tbldata` (`id`, `watered`, `moisture`, `Temperatuur`, `light`, `time`) VALUES
(1, '', 85, 25, '500', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblklanten`
--

DROP TABLE IF EXISTS `tblklanten`;
CREATE TABLE IF NOT EXISTS `tblklanten` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(121) NOT NULL,
  `firstname` varchar(121) NOT NULL,
  `email` varchar(121) NOT NULL,
  `password` varchar(121) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblklanten`
--

INSERT INTO `tblklanten` (`id`, `lastname`, `firstname`, `email`, `password`) VALUES
(8, 'sato', 'masahito', 'masahitorama@gmail.com', '$2y$13$RKRyC8DHhJTAjUjzbSNljOrQPh8EmFUFn4uTheWqMEhVkmrDVJnDG'),
(13, 'test', 'test', 'test@123.com', '$2y$13$q13dIVEX7/zXsGP/ETTcNObhqn79c706/HCRyCBdReebq/6e5LwcK'),
(14, 'test', 'test', 'test@student.thomasmore.be', '$2y$13$E68xz/cAiIxvCciN7M9LA.3qDEap7B0gm5FZYxk9bA2xrPyoeEslC');

-- --------------------------------------------------------

--
-- Table structure for table `tblmanueel`
--

DROP TABLE IF EXISTS `tblmanueel`;
CREATE TABLE IF NOT EXISTS `tblmanueel` (
  `ManueelID` int NOT NULL,
  `Aantal keer per maand snoeien` varchar(45) NOT NULL,
  PRIMARY KEY (`ManueelID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
