-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2016 at 06:08 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `im_check_in_out`
--

CREATE TABLE IF NOT EXISTS `im_check_in_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `check_in_time` datetime NOT NULL,
  `check_out_time` datetime NOT NULL,
  `total_hours` varchar(50) NOT NULL,
  `salary_per_h` float NOT NULL DEFAULT '0',
  `total_salary` varchar(50) NOT NULL,
  `late_time` int(6) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `created_ip` varchar(50) NOT NULL,
  `modify_date` datetime NOT NULL,
  `del_status` tinyint(1) NOT NULL DEFAULT '0',
  `check_in_status` int(1) NOT NULL DEFAULT '1',
  `early_time` int(6) NOT NULL DEFAULT '0',
  `salaried_hours` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `im_expense_detail`
--

CREATE TABLE IF NOT EXISTS `im_expense_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `expense_date` datetime NOT NULL,
  `expense_comment` varchar(1000) NOT NULL,
  `expense_amount` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1=Active,0=inactive',
  `del_status` int(1) NOT NULL DEFAULT '0' COMMENT '1=deleted, 0=not deleted',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_by_ip` varchar(100) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_by_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `im_expense_type`
--

CREATE TABLE IF NOT EXISTS `im_expense_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_title` varchar(100) NOT NULL,
  `expense_note` varchar(1000) NOT NULL,
  `del_status` int(1) NOT NULL DEFAULT '0' COMMENT '1=deleted, 0=not deleted',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1=Active,0=inactive',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_by_ip` varchar(100) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_by_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `im_log`
--

CREATE TABLE IF NOT EXISTS `im_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_by_ip` varchar(100) NOT NULL,
  `created_by_title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `im_notification`
--

CREATE TABLE IF NOT EXISTS `im_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0=unread,1=read',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_by_ip` varchar(100) NOT NULL,
  `alert_title` varchar(20) NOT NULL DEFAULT 'reorder',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `im_offer_detail`
--

CREATE TABLE IF NOT EXISTS `im_offer_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_by_ip` varchar(100) NOT NULL,
  `modify_date` datetime NOT NULL,
  `modify_by` int(11) NOT NULL,
  `modify_by_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `im_product`
--

CREATE TABLE IF NOT EXISTS `im_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `barcode` varchar(100) NOT NULL DEFAULT '0',
  `reorder_level` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1=Active,0=inactive',
  `del_status` int(1) NOT NULL DEFAULT '0' COMMENT '1=deleted, 0=not deleted',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_by_ip` varchar(100) NOT NULL,
  `modify_date` datetime NOT NULL,
  `modify_by` int(11) NOT NULL,
  `modify_by_ip` varchar(100) NOT NULL,
  `product_type` int(1) NOT NULL DEFAULT '0' COMMENT '0=product, 1=offer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `im_product_assig`
--

CREATE TABLE IF NOT EXISTS `im_product_assig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_by_ip` varchar(100) NOT NULL,
  `modify_date` datetime NOT NULL,
  `modify_by` int(11) NOT NULL,
  `modify_by_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `im_sale`
--

CREATE TABLE IF NOT EXISTS `im_sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `total` varchar(25) NOT NULL,
  `sale_note` varchar(1000) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `payment_method` int(1) NOT NULL DEFAULT '0' COMMENT '0=cash,1=card,2=online',
  `created_date` datetime NOT NULL,
  `created_by_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `im_sale_detail`
--

CREATE TABLE IF NOT EXISTS `im_sale_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(50) NOT NULL,
  `sale_ref` varchar(100) NOT NULL DEFAULT '0',
  `invoice_status` int(1) NOT NULL DEFAULT '0' COMMENT '0=Out,1=IN',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_by_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `im_shops`
--

CREATE TABLE IF NOT EXISTS `im_shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_title` varchar(255) NOT NULL,
  `shop_detail` varchar(1000) NOT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `close_time` varchar(50) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0=inactive, 1=active',
  `del_status` int(1) NOT NULL DEFAULT '0' COMMENT '0=not deleted,1=deleted',
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by_ip` varchar(50) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` date NOT NULL,
  `modified_by_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `im_users`
--

CREATE TABLE IF NOT EXISTS `im_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL DEFAULT '0',
  `last_name` varchar(200) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '0',
  `detail` varchar(5000) NOT NULL DEFAULT '0',
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL DEFAULT '0',
  `phone_no` varchar(200) NOT NULL DEFAULT '0',
  `mobile_no` varchar(200) NOT NULL DEFAULT '0',
  `image` varchar(200) NOT NULL DEFAULT '0',
  `created_by` int(10) NOT NULL,
  `created_date` date NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '2' COMMENT '1=Super Admin, 2= Shop User',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1=Active,0=inactive',
  `modify_date` datetime NOT NULL,
  `rec_key` varchar(255) NOT NULL DEFAULT '0',
  `del_status` int(1) NOT NULL DEFAULT '0' COMMENT '1=deleted, 0=not deleted',
  `salary_per_h` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `im_users`
--

INSERT INTO `im_users` (`id`, `first_name`, `last_name`, `title`, `detail`, `user_name`, `password`, `address`, `phone_no`, `mobile_no`, `image`, `created_by`, `created_date`, `ip_address`, `type`, `status`, `modify_date`, `rec_key`, `del_status`, `salary_per_h`) VALUES
(1, 'Sardar', 'Aadil', '', '', 'admin', '202cb962ac59075b964b07152d234b70', 'admin', '05146546', '03315146546', 'profileImage-20160421170549.jpg', 0, '2016-04-21', '192.168.1.109', 1, 1, '0000-00-00 00:00:00', '0', 0, '50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
