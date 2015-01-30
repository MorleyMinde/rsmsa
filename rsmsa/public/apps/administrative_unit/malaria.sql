-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2015 at 09:43 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `malaria`
--

-- --------------------------------------------------------

--
-- Table structure for table `kaya`
--

CREATE TABLE IF NOT EXISTS `kaya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `ward` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `leader_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `male` int(11) NOT NULL,
  `female` int(11) NOT NULL,
  `station` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_of_veo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `writer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `distribution_by` int(11) NOT NULL,
  `distribution_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `kaya`
--

INSERT INTO `kaya` (`id`, `uid`, `region`, `district`, `ward`, `village`, `leader_name`, `phone`, `male`, `female`, `station`, `name_of_veo`, `writer`, `status`, `distribution_by`, `distribution_date`, `created_at`, `updated_at`) VALUES
(4, 485180, 6, 26, 'vnvcnb', 'cnbcnbvcn', 'cnbcnb', 'gfgf', 2, 4, 'gnhvnhgn', 'jhgjhgfhgj', 'jfhgjhgjfhgjhgjhg', 1, 0, '21-01-2015', '2015-01-21 19:53:19', '2015-01-21 16:53:19'),
(10, 343443, 1, 1, '94', '360', 'gfsdgfs', '24235425', 4, 6, 'sgfsdg', 'gsggfsgf', 'fgsgfsgsfdg', 0, 0, '', '2015-01-25 04:24:32', '2015-01-25 04:24:32'),
(12, 536534653, 1, 1, '94', '360', '6trytey', 'yeyeyer', 6, 8, 'ncngf', 'jhgfjhfj', 'jfgjhgfjf', 0, 0, '', '2015-01-25 04:30:05', '2015-01-25 04:30:05'),
(13, 12345674, 1, 1, '94', '360', 'Kelvin', '074256536', 6, 4, 'Msewe', 'sunday', 'anna', 1, 0, '25-01-2015', '2015-01-25 11:55:47', '2015-01-25 08:55:47'),
(14, 45678, 1, 1, '94', '360', 'Henry', '098765544', 8, 2, 'Mwenge', 'kitulo', 'sunday', 1, 0, '25-01-2015', '2015-01-25 12:30:41', '2015-01-25 09:30:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
