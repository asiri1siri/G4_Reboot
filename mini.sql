-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 09:12 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `DELETED` int(1) NOT NULL,
  `ID` int(3) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `ITEMTYPE` varchar(255) NOT NULL,
  `COND` varchar(255) NOT NULL,
  `IS_CONTAINER` int(1) NOT NULL,
  `PARENT_ID` int(3) NOT NULL,
  `ENTERED` datetime NOT NULL,
  `UPDATED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`DELETED`, `ID`, `NAME`, `DESCRIPTION`, `ITEMTYPE`, `COND`, `IS_CONTAINER`, `PARENT_ID`, `ENTERED`, `UPDATED`) VALUES
(0, 2, 'Pen', 'Writes', 'Stationary', 'Good', 0, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 3, 'Table', '-', 'Furniture', 'New', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `ENABLED` int(1) NOT NULL,
  `ID` int(3) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `USERTYPE` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ENABLED`, `ID`, `NAME`, `USERNAME`, `USERTYPE`, `EMAIL`) VALUES
(0, 2, 'DragonQueen', 'khalisi', 'Admin', 'asdasd@gmail.com'),
(1, 5, 'Spongebob', 'BBaker', 'Admin', 'BBB@gmail.com'),
(1, 7, 'Rachel', 'RRoberts', 'Admin', 'RRR@yahoo.com'),
(0, 8, 'Sam', 'SSmith', 'User', 'SSS@msn.com'),
(1, 10, 'Asiri', '--Asiri--', 'Admin', 'Asiri@Myself.com'),
(0, 123, 'George', 'GCHan', 'Admin', 'ljakjfafa@gmail.com'),
(1, 112, 'SOmeone', 'qwerty', 'admin', 'admin@gmail.com'),
(3, 8989, 'Kapeesh', 'SomeWhatConfused', 'Idiot', 'LMNOP@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
