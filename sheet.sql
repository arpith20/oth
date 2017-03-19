-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2017 at 04:24 PM
-- Server version: 5.5.54-0+deb8u1-log
-- PHP Version: 5.6.29-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `othproduction`
--

-- --------------------------------------------------------

--
-- Table structure for table `sheet`
--

CREATE TABLE IF NOT EXISTS `sheet` (
  `usn` varchar(30) NOT NULL,
  `id` varchar(50) NOT NULL,
  `session` varchar(50) NOT NULL,
  `password` varchar(260) NOT NULL,
  `name` varchar(50) NOT NULL,
  `college` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cheat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sheet`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sheet`
--
ALTER TABLE `sheet`
 ADD UNIQUE KEY `usn` (`usn`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
