-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2017 at 02:22 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p101`
--

-- --------------------------------------------------------

--
-- Table structure for table `p101_coupons`
--

CREATE TABLE `p101_coupons` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `coupon_type` enum('0','1') NOT NULL COMMENT '0=>coupon,1=>deal',
  `coupon_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `offer_line` varchar(255) NOT NULL,
  `top_deal` enum('0','1') NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `expiry_date` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p101_coupons`
--

INSERT INTO `p101_coupons` (`id`, `category_id`, `store_id`, `coupon_type`, `coupon_code`, `name`, `label`, `offer_line`, `top_deal`, `url`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(4, 3, 5, '0', 'safsa', 'asdfs', 'sadf', 'sadf', '0', 'sadfsa', '2017-12-28', '0', '2017-12-24 17:53:01', '2017-12-24 17:53:01'),
(5, 3, 5, '0', 'rfdgsg', 'fdgh', 'fffffff', 'ddddddddd', '0', 'sdfgdsfg', '2017-12-30', '0', '2017-12-24 23:57:35', '2017-12-24 18:27:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p101_coupons`
--
ALTER TABLE `p101_coupons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p101_coupons`
--
ALTER TABLE `p101_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
