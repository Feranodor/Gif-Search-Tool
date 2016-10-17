-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2016 at 08:44 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gif`
--

-- --------------------------------------------------------

--
-- Table structure for table `gifs`
--

CREATE TABLE `gifs` (
  `ID` int(11) NOT NULL,
  `gifid` tinytext NOT NULL,
  `vote` int(11) NOT NULL,
  `ip` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gifs`
--

INSERT INTO `gifs` (`ID`, `gifid`, `vote`, `ip`) VALUES
(1, 'ERMGXqtKTDKHC', 1, '::1'),
(2, 'l0MYHpCZ9yxKXIsjC', -1, '::1'),
(3, 'mLNbOr7LAr3G0', 1, '::1'),
(4, 'mLNbOr7LAr3G0', 1, '192.168.99.104'),
(5, 'dnIcDl9QAKGWY', -1, '::1'),
(6, 'HbuyXbadkdWIU', 1, '::1'),
(7, 'AKyzoh2pPVcPK', 1, '::1'),
(8, 'm9IlLnkcKe4Hm', 1, '::1'),
(9, 'pEhAkCtOYLePC', -1, '::1'),
(10, 'F9DzQnxx6ZZNm', 1, '::1'),
(11, 'a0Lgc1JvbfS4o', 1, '::1'),
(12, '3o6ZsUuLNP7yhlsphK', -1, '::1'),
(13, '26uf2jP7j8WVZVGwM', 1, '::1'),
(14, '3o6ZtmGxr1sxM7pP1e', -1, '::1'),
(15, 'c5RxnGpPUav60', 1, '::1'),
(16, '', 0, '::1'),
(17, 'c9zi2aISFeZb2', 1, '::1'),
(18, 'XBMVuHMKGukdq', 1, '::1'),
(19, '11ZX8AhHWTmEeY', -1, '::1'),
(20, '5scLGrLCqJXm8', 1, '::1'),
(21, 'YCkqss70IBBxm', 1, '::1'),
(22, '6vlAb9T9DTlwk', -1, '::1'),
(23, 'veXg35l4CZyjC', 1, '::1'),
(24, 'S7d3GFLDNDgY0', 1, '::1'),
(25, 'CPrfMAHpLjh7i', 1, '::1'),
(26, 'RxJe8iZQpUghi', 1, '::1'),
(27, 'jvpaihQhyFi6c', 1, '::1'),
(28, '2NH80diX7eUak', 1, '::1'),
(29, 'zAYZOtH5OMhuU', -1, '::1'),
(30, 'D49L3FpxqtQ3u', 1, '::1'),
(31, 'EeYpQ7tyGCqQg', -1, '::1'),
(32, 'VNwwkGTJj6F9e', 1, '::1'),
(33, 'dVDwdcgzgVM9W', -1, '::1'),
(34, 'l2Sq9mzrjHG39i0i4', 1, '::1'),
(35, 'l0MYGcfvNAiITaRJC', 1, '::1'),
(36, '12iLDPlSvuJo08', 1, '::1'),
(37, 'Ue0jev5l4BKgM', 1, '::1'),
(38, '26gJz3GGGkgogCKXK', -1, '::1'),
(39, '3o6ZsZrvMTzl7X96DK', -1, '::1'),
(40, 't88JMNNPExvI4', -1, '::1'),
(41, 'aX32LNYa1H8Na', 1, '::1'),
(42, '6ENNQkKkIkjeM', 1, '::1'),
(43, 'l46Cld9ii2klXvln2', 1, '::1'),
(44, 'sUlU8gwJ0wT3a', 1, '::1'),
(45, 'l3vRgsvynv1CEbRFm', 1, '::1'),
(46, '3oz8xzUz7Z114qPCWk', 1, '::1'),
(47, '3oz8xL7GZv4qCN9wRy', 1, '::1'),
(48, '3oz8xtZ35XuSQqfczK', 1, '::1'),
(49, 'OOtYjtUe9JdVm', 1, '::1'),
(50, 'WqbG7DjQXS1tS', -1, '::1'),
(51, '5JAtDVL0wmSn6', 1, '::1'),
(52, 'uImm9tXPFYll6', 1, '::1'),
(53, 'dTMjrTI91ygKY', -1, '::1'),
(54, 'EODu5WcSvdz6U', 1, '::1'),
(55, 'RTxV5Qp31WQgM', 1, '::1'),
(56, 'c9zi2aISFeZb2', -1, '192.168.99.104'),
(57, 'CPrfMAHpLjh7i', 1, '192.168.99.104'),
(58, 'rL8inqijmKECs', 1, '192.168.99.104'),
(59, 'F123NR6AUP9yU', 1, '192.168.99.104'),
(60, '22BZm7rkFfC6s', -1, '192.168.99.104'),
(61, 'l3vRjmN65JBMf7eGA', 1, '192.168.99.104'),
(62, '3oz8xxhcUQXPWSSbcY', 1, '192.168.99.104'),
(63, 'sUlU8gwJ0wT3a', 1, '192.168.99.104'),
(64, '3oz8xtZ35XuSQqfczK', -1, '192.168.99.104'),
(65, 'AsvGnXtOUbuIU', 1, '192.168.99.104');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gifs`
--
ALTER TABLE `gifs`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gifs`
--
ALTER TABLE `gifs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
