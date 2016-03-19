-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2015 at 02:44 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `const_pizza_proj`
--
CREATE DATABASE IF NOT EXISTS `const_pizza_proj` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `const_pizza_proj`;

-- --------------------------------------------------------

--
-- Table structure for table `pizza_crust_types`
--

CREATE TABLE IF NOT EXISTS `pizza_crust_types` (
  `pt_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_crust_type` varchar(225) DEFAULT NULL,
  `pt_detals` varchar(225) DEFAULT NULL,
  `pt_created_by` varchar(45) DEFAULT NULL,
  `pt_crated_on` date DEFAULT NULL,
  `pt_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pizza_crust_types`
--

INSERT INTO `pizza_crust_types` (`pt_id`, `pt_crust_type`, `pt_detals`, `pt_created_by`, `pt_crated_on`, `pt_updated_on`) VALUES
(1, 'hand-tossed', 'hand-tossed', 'admin', '2015-11-08', '2015-11-08 15:30:16'),
(2, 'pan', 'pan', 'admin', '2015-11-08', '2015-11-08 15:30:16'),
(3, 'stuffed', 'stuffed', 'admin', '2015-11-08', '2015-11-08 15:30:50'),
(4, 'thin', 'thin', 'admin', '2015-11-08', '2015-11-08 15:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `pizza_customer_information`
--

CREATE TABLE IF NOT EXISTS `pizza_customer_information` (
  `ci_id` int(11) NOT NULL AUTO_INCREMENT,
  `ci_name` varchar(225) DEFAULT NULL,
  `ci_address` varchar(225) DEFAULT NULL,
  `ci_postal_code` bigint(20) DEFAULT NULL,
  `ci_city_id` int(11) DEFAULT NULL,
  `ci_province_id` int(11) DEFAULT NULL,
  `ci_phone_no` bigint(20) DEFAULT NULL,
  `ci_email_address` varchar(225) DEFAULT NULL,
  `oi_id` int(11) DEFAULT NULL,
  `ci_created_date` date DEFAULT NULL,
  `ci_created_by` varchar(25) DEFAULT NULL,
  `ci_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ci_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `pizza_customer_information`
--

INSERT INTO `pizza_customer_information` (`ci_id`, `ci_name`, `ci_address`, `ci_postal_code`, `ci_city_id`, `ci_province_id`, `ci_phone_no`, `ci_email_address`, `oi_id`, `ci_created_date`, `ci_created_by`, `ci_updated_on`) VALUES
(1, 'Ontario', 'Canada', 12321, NULL, 1, 12345, 'ontario@cn.com', 1, NULL, NULL, '2015-11-11 15:01:31'),
(2, 'Manisota', 'canada', 11234234, NULL, 3, 123124, 'xyz@xyz.com', 2, NULL, NULL, '2015-11-11 15:06:00'),
(3, 'saket', 'canada', 12324213, NULL, 4, 123213123, 'lkm@lkm.com', 3, NULL, NULL, '2015-11-11 15:07:00'),
(4, 'mani', 'canada', 3242423, NULL, 3, 21321312, 'admin@example.com', 4, NULL, NULL, '2015-11-11 15:07:40'),
(5, '', 'canada', 3432, NULL, 0, 3423423, 'admin@example.com', 5, NULL, NULL, '2015-11-11 15:08:31'),
(6, 'outid', 'canada', 12323, NULL, 4, 12312312, 'xyz@xyz.com', 6, NULL, NULL, '2015-11-11 15:10:41'),
(7, 'lkm', 'CANADA', 24324, NULL, 2, 234235, 'lkm@lkm.com', 7, NULL, NULL, '2015-11-11 16:09:49'),
(8, 'guest', 'CANADA', 3423423, NULL, 3, 23434231, 'xyz@xyz.com', 11, NULL, NULL, '2015-11-11 19:36:10'),
(9, 'abh', 'canada', 12323, NULL, 2, 12324, 'xyz@xyz.com', 12, NULL, NULL, '2015-11-11 19:47:45'),
(10, 'cvsdf', 'canada', 3432, NULL, 2, 23423, 'cvk@ckh.com', 13, NULL, NULL, '2015-11-11 19:51:51'),
(11, 'XYZ', 'canada', 3423, NULL, 1, 34324, 'lkm@lkm.com', 14, NULL, NULL, '2015-11-11 19:54:44'),
(12, 'klm', 'canada', 23423, NULL, 1, 23213, 'vgs@kj.com', 15, NULL, NULL, '2015-11-11 19:58:33'),
(13, 'XYZ', 'canada', 2112, NULL, 1, 12312, 'lkm@lkm.com', 16, NULL, NULL, '2015-11-11 20:00:22'),
(14, 'klm', 'canada', 213213, NULL, 3, 21321321, 'xyz@xyz.com', 17, NULL, NULL, '2015-11-11 20:05:19'),
(15, '', '', 0, NULL, 0, 0, '', 18, NULL, NULL, '2015-11-11 20:09:10'),
(16, 'jghj', 'fghtyutur', 567567, NULL, 2, 756765, '', 19, NULL, NULL, '2015-11-12 12:06:38'),
(17, 'sdswd', 'canada', 23123, NULL, 2, 213123, 'xyz@xyz.com', 20, NULL, NULL, '2015-11-12 12:17:04'),
(18, 'XYZ', 'fnewfwe', 645645, NULL, 2, 123213421, 'xyz@xyz.com', 22, NULL, NULL, '2015-11-12 13:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `pizza_details`
--

CREATE TABLE IF NOT EXISTS `pizza_details` (
  `pd_id` int(11) NOT NULL AUTO_INCREMENT,
  `pd_type` varchar(225) DEFAULT NULL,
  `pd_price` double DEFAULT NULL,
  `pd_create_by` varchar(45) DEFAULT NULL,
  `pd_created_on` date DEFAULT NULL,
  `pd_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pizza_details`
--

INSERT INTO `pizza_details` (`pd_id`, `pd_type`, `pd_price`, `pd_create_by`, `pd_created_on`, `pd_updated_on`) VALUES
(1, 'small', 5, 'admin', '2015-11-08', '2015-11-08 15:27:42'),
(2, 'medium', 10, 'admin', '2015-11-08', '2015-11-08 15:27:42'),
(3, 'Large', 15, 'admin', '2015-11-08', '2015-11-08 15:28:34'),
(4, 'extra-large', 20, 'admin', '2015-11-08', '2015-11-08 15:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `pizza_order_information`
--

CREATE TABLE IF NOT EXISTS `pizza_order_information` (
  `oi_id` int(11) NOT NULL AUTO_INCREMENT,
  `pd_id` int(11) DEFAULT NULL,
  `pt_id` int(11) DEFAULT NULL,
  `tt_ids` varchar(225) DEFAULT NULL,
  `oi_quantity` int(11) NOT NULL,
  `oi_base_amount` double DEFAULT NULL,
  `oi_tax_amount` double NOT NULL,
  `oi_total_amount` double NOT NULL,
  `oi_status` int(11) DEFAULT NULL,
  `oi_ordered_by` varchar(225) DEFAULT NULL,
  `oi_delivery_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`oi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `pizza_order_information`
--

INSERT INTO `pizza_order_information` (`oi_id`, `pd_id`, `pt_id`, `tt_ids`, `oi_quantity`, `oi_base_amount`, `oi_tax_amount`, `oi_total_amount`, `oi_status`, `oi_ordered_by`, `oi_delivery_time`) VALUES
(1, 3, 2, '1,2,3,4,5', 3, 15, 5.4, 50.4, 2, NULL, '2015-11-11 15:00:56'),
(2, 3, 3, '5,8', 10, 15, 18.38, 168.38, 2, NULL, '2015-11-11 15:05:30'),
(3, 1, 2, '2,4,8', 3, 5, 2.25, 17.25, 2, NULL, '2015-11-11 15:06:34'),
(4, 2, 3, '3,6,10', 6, 10, 7.35, 67.35, 2, NULL, '2015-11-11 15:07:19'),
(5, 4, 2, '2,3,4,5,6,7', 20, 20, 0, 0, 2, NULL, '2015-11-11 15:08:07'),
(6, 2, 1, '5,8', 4, 10, 6, 46, 2, NULL, '2015-11-11 15:10:09'),
(7, 2, 2, '3', 2, 10, 2.6, 22.6, 2, NULL, '2015-11-11 16:09:27'),
(8, 2, 3, '4', 17, 10, 0, 170, 2, NULL, '2015-11-11 19:15:39'),
(11, 4, 3, '4', 2, 20, 4.9, 44.9, 2, 'Guest-User', '2015-11-11 19:35:42'),
(12, 2, 2, '3,9', 2, 10, 2.6, 22.6, 1, 'Guest-User', '2015-11-11 19:47:19'),
(13, 1, 4, '4', 4, 5, 2.6, 22.6, 1, 'Guest-User', '2015-11-11 19:51:30'),
(14, 2, 2, '3,6', 5, 10, 6, 56, 1, 'Guest-User', '2015-11-11 19:54:27'),
(15, 1, 2, '5', 1, 5, 0.6, 5.6, 1, 'Guest-User', '2015-11-11 19:58:11'),
(16, 1, 3, '3', 3, 5, 1.8, 16.8, 1, 'Guest-User', '2015-11-11 20:00:04'),
(17, 2, 2, '5', 1, 10, 1.23, 11.22, 1, 'Guest-User', '2015-11-11 20:04:50'),
(18, 1, 2, '6', 1, 5, 0, 0, 1, 'Guest-User', '2015-11-11 20:09:02'),
(19, 2, 3, '9', 2, 10, 2.6, 22.6, 1, 'Guest-User', '2015-11-12 12:06:12'),
(20, 1, 1, '3,7', 3, 5, 1.95, 16.95, 2, NULL, '2015-11-12 12:16:43'),
(21, 1, 2, '3,4', 4, 5, 0, 20, 1, NULL, '2015-11-12 12:34:04'),
(22, 1, 1, '5', 3, 5, 1.95, 16.95, 1, NULL, '2015-11-12 12:39:56'),
(23, 1, 1, '7', 3, 5, 0, 15, 1, 'Guest-User', '2015-11-12 13:36:06'),
(24, 2, 2, '3,5', 4, 10, 0, 40, 1, 'Guest-User', '2015-11-12 13:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `pizza_state_master`
--

CREATE TABLE IF NOT EXISTS `pizza_state_master` (
  `sm_id` int(11) NOT NULL AUTO_INCREMENT,
  `sm_name` varchar(225) DEFAULT NULL,
  `sm_tax_per` double DEFAULT NULL,
  `sm_created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sm_created_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pizza_state_master`
--

INSERT INTO `pizza_state_master` (`sm_id`, `sm_name`, `sm_tax_per`, `sm_created_on`, `sm_created_by`) VALUES
(1, 'Ontario', 12, '2015-11-08 15:33:04', 'admin'),
(2, 'Quebec', 13, '2015-11-08 15:33:04', 'admin'),
(3, 'Manitoba', 12.25, '2015-11-08 15:33:52', 'admin'),
(4, 'Saskatchewan', 15, '2015-11-08 15:33:52', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pizza_topping_types`
--

CREATE TABLE IF NOT EXISTS `pizza_topping_types` (
  `tt_id` int(11) NOT NULL AUTO_INCREMENT,
  `tt_type` varchar(225) DEFAULT NULL,
  `tt_details` varchar(225) DEFAULT NULL,
  `tt_created_by` varchar(45) DEFAULT NULL,
  `tt_created_on` date DEFAULT NULL,
  `tt_updated_by` varchar(45) DEFAULT NULL,
  `tt_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pizza_topping_types`
--

INSERT INTO `pizza_topping_types` (`tt_id`, `tt_type`, `tt_details`, `tt_created_by`, `tt_created_on`, `tt_updated_by`, `tt_updated_on`) VALUES
(1, 'Black Olive', NULL, NULL, NULL, NULL, '2015-11-08 18:17:03'),
(2, 'Onion', NULL, NULL, NULL, NULL, '2015-11-08 18:17:03'),
(3, 'Paneer', NULL, NULL, NULL, NULL, '2015-11-08 18:17:26'),
(4, 'Mushroom', NULL, NULL, NULL, NULL, '2015-11-08 18:17:26'),
(5, 'Babycron', NULL, NULL, NULL, NULL, '2015-11-08 18:18:06'),
(6, 'Jalapeno', NULL, NULL, NULL, NULL, '2015-11-08 18:18:06'),
(7, 'Crip Capcicum', NULL, NULL, NULL, NULL, '2015-11-08 18:18:47'),
(8, 'Golden Corn', NULL, NULL, NULL, NULL, '2015-11-08 18:18:47'),
(9, 'Fresh Tomatto', NULL, NULL, NULL, NULL, '2015-11-08 18:19:55'),
(10, 'Red Paprika', NULL, NULL, NULL, NULL, '2015-11-08 18:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `pizza_users`
--

CREATE TABLE IF NOT EXISTS `pizza_users` (
  `pu_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `updatedon` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pizza_users`
--

INSERT INTO `pizza_users` (`pu_id`, `username`, `password`, `updatedon`) VALUES
(1, 'ah', '12345', '2015-11-12 11:13:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
