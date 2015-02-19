-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2015 at 07:23 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rsmsa`
--
CREATE DATABASE IF NOT EXISTS `rsmsa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rsmsa`;

-- --------------------------------------------------------

--
-- Table structure for table `rsmsa_accidents`
--

CREATE TABLE IF NOT EXISTS `rsmsa_accidents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accident_reg_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accident_class` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ocs_check` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supervisor_check` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rank_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sign_date` date NOT NULL,
  `accident_fatal` int(10) unsigned NOT NULL,
  `cause` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `weather` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `accident_severe_injury` int(10) unsigned DEFAULT NULL,
  `accident_simple_injury` int(10) unsigned DEFAULT NULL,
  `accident_only_damage` int(10) unsigned DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hit_run` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accident_date_time` date NOT NULL,
  `accident_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area_region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area_district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `road_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `road_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `road_mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intersection_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intersection_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intersection_mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `rsmsa_accidents_rank_no_foreign` (`rank_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

--
-- Dumping data for table `rsmsa_accidents`
--

INSERT INTO `rsmsa_accidents` (`id`, `accident_reg_number`, `accident_class`, `ocs_check`, `supervisor_check`, `rank_no`, `sign_date`, `accident_fatal`, `cause`, `weather`, `accident_severe_injury`, `accident_simple_injury`, `accident_only_damage`, `latitude`, `longitude`, `hit_run`, `accident_date_time`, `accident_area`, `area_region`, `area_district`, `road_name`, `road_number`, `road_mark`, `intersection_name`, `intersection_number`, `intersection_mark`, `created_at`, `updated_at`) VALUES
(40, 'P/AAA/CCC', 'Fatal Accident', 'YES', 'YES', 'R6478', '2015-02-09', 2, 'Dangerous Driving', 'Rain', 2, 5, 7, NULL, NULL, NULL, '2015-02-09', 'KIMARA', 'DAR ES SALAAM', 'KINONDONI ', 'MOROGORO', '10', '50', 'BARUTI', '23', '80', '2015-02-11 16:57:04', '2015-02-11 16:57:04'),
(44, 'ACC/111', 'Human Error Accident', 'YES', 'YES', 'R111', '2015-02-11', 2, 'Excessive Speed', 'Slippery', 0, 1, 0, NULL, NULL, NULL, '2015-02-11', 'Tarime', 'MARA', 'Tarime', 'NYAMWAGA', '2', '60', 'CENTER', '2', '60', '2015-02-12 13:24:47', '2015-02-12 13:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `rsmsa_accident_driver`
--

CREATE TABLE IF NOT EXISTS `rsmsa_accident_driver` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accident_id` int(10) unsigned NOT NULL,
  `driver_id` int(10) unsigned NOT NULL,
  `severity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_use` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seat_belt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alcohol` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `rsmsa_accident_driver_accident_id_foreign` (`accident_id`),
  KEY `rsmsa_accident_driver_driver_id_foreign` (`driver_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `rsmsa_accident_driver`
--

INSERT INTO `rsmsa_accident_driver` (`id`, `accident_id`, `driver_id`, `severity`, `phone_use`, `seat_belt`, `alcohol`, `created_at`, `updated_at`) VALUES
(15, 40, 1, 'Killed', 'Found using phone while driving', 'Seat belt not fastened', 20, '2015-02-11 16:57:05', '2015-02-11 16:57:05'),
(19, 44, 1, NULL, NULL, NULL, NULL, '2015-02-12 13:24:47', '2015-02-12 13:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `rsmsa_accident_passenger`
--

CREATE TABLE IF NOT EXISTS `rsmsa_accident_passenger` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accident_id` int(10) unsigned NOT NULL,
  `pass_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass_gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass_dob` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass_physical_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass_national_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass_phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass_seat_belt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass_alcohol` int(10) unsigned DEFAULT NULL,
  `pass_casuality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `rsmsa_accident_passenger_accident_id_foreign` (`accident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rsmsa_accident_passenger`
--

INSERT INTO `rsmsa_accident_passenger` (`id`, `accident_id`, `pass_name`, `pass_gender`, `pass_dob`, `pass_physical_address`, `pass_address`, `pass_national_id`, `pass_phone_number`, `pass_seat_belt`, `pass_alcohol`, `pass_casuality`, `created_at`, `updated_at`) VALUES
(6, 40, 'Prisca', 'Female', '12/02/1990', 'Kimara', 'Kimara', 'Tanzania', '0785 123 128', 'No seat belt', 20, 'Injured', '2015-02-11 16:57:05', '2015-02-11 16:57:05'),
(7, 44, 'KIMARO', 'Male', '1987-12-12T21:00:00.000Z', 'MOSHI', 'MOSHI', 'TANZANIA', '0713 125 369', 'No seat belt', 20, 'Injured', '2015-02-12 13:24:47', '2015-02-12 13:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `rsmsa_accident_vehicle`
--

CREATE TABLE IF NOT EXISTS `rsmsa_accident_vehicle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accident_id` int(10) unsigned NOT NULL,
  `vehicle_id` int(10) unsigned NOT NULL,
  `vehicle_fatal` int(10) unsigned DEFAULT NULL,
  `vehicle_severe_injury` int(10) unsigned DEFAULT NULL,
  `vehicle_simple_injury` int(10) unsigned DEFAULT NULL,
  `vehicle_not_injured` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `rsmsa_accident_vehicle_accident_id_foreign` (`accident_id`),
  KEY `rsmsa_accident_vehicle_vehicle_id_foreign` (`vehicle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `rsmsa_accident_vehicle`
--

INSERT INTO `rsmsa_accident_vehicle` (`id`, `accident_id`, `vehicle_id`, `vehicle_fatal`, `vehicle_severe_injury`, `vehicle_simple_injury`, `vehicle_not_injured`, `created_at`, `updated_at`) VALUES
(9, 40, 1, 2, 2, 2, 2, '2015-02-11 16:57:05', '2015-02-11 16:57:05'),
(10, 44, 1, NULL, NULL, NULL, NULL, '2015-02-12 13:24:47', '2015-02-12 13:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `rsmsa_accident_witness`
--

CREATE TABLE IF NOT EXISTS `rsmsa_accident_witness` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accident_id` int(10) unsigned NOT NULL,
  `witness_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `witness_gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `witness_dob` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `witness_physical_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `witness_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `witness_national_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `witness_phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `rsmsa_accident_witness_accident_id_foreign` (`accident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rsmsa_accident_witness`
--

INSERT INTO `rsmsa_accident_witness` (`id`, `accident_id`, `witness_name`, `witness_gender`, `witness_dob`, `witness_physical_address`, `witness_address`, `witness_national_id`, `witness_phone_number`, `created_at`, `updated_at`) VALUES
(6, 40, 'Balozi', 'Male', '04/12/1980', 'Zanzibar', 'Zanzibar', 'Tanzania', '0758 122 456', '2015-02-11 16:57:05', '2015-02-11 16:57:05'),
(7, 44, 'CHRISTINA', 'Female', '1968-02-09T21:00:00.000Z', 'DAR ES SALAAM', 'DAR ES SALAAM', 'TANZANIA', '0715 136 789', '2015-02-12 13:24:48', '2015-02-12 13:24:48');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rsmsa_accidents`
--
ALTER TABLE `rsmsa_accidents`
  ADD CONSTRAINT `rsmsa_accidents_rank_no_foreign` FOREIGN KEY (`rank_no`) REFERENCES `rsmsa_police` (`rank_no`);

--
-- Constraints for table `rsmsa_accident_driver`
--
ALTER TABLE `rsmsa_accident_driver`
  ADD CONSTRAINT `rsmsa_accident_driver_accident_id_foreign` FOREIGN KEY (`accident_id`) REFERENCES `rsmsa_accidents` (`id`),
  ADD CONSTRAINT `rsmsa_accident_driver_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `rsmsa_drivers` (`id`);

--
-- Constraints for table `rsmsa_accident_passenger`
--
ALTER TABLE `rsmsa_accident_passenger`
  ADD CONSTRAINT `rsmsa_accident_passenger_accident_id_foreign` FOREIGN KEY (`accident_id`) REFERENCES `rsmsa_accidents` (`id`);

--
-- Constraints for table `rsmsa_accident_vehicle`
--
ALTER TABLE `rsmsa_accident_vehicle`
  ADD CONSTRAINT `rsmsa_accident_vehicle_accident_id_foreign` FOREIGN KEY (`accident_id`) REFERENCES `rsmsa_accidents` (`id`),
  ADD CONSTRAINT `rsmsa_accident_vehicle_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `rsmsa_vehicles` (`id`);

--
-- Constraints for table `rsmsa_accident_witness`
--
ALTER TABLE `rsmsa_accident_witness`
  ADD CONSTRAINT `rsmsa_accident_witness_accident_id_foreign` FOREIGN KEY (`accident_id`) REFERENCES `rsmsa_accidents` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
