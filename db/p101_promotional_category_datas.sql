-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2018 at 10:37 PM
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
-- Table structure for table `p101_promotional_category_datas`
--

CREATE TABLE `p101_promotional_category_datas` (
  `id` int(11) NOT NULL,
  `promotional_category_id` int(11) NOT NULL,
  `type` enum('0','1') NOT NULL COMMENT '0=>coupon,1=>store',
  `store_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `old_value` varchar(255) NOT NULL,
  `new_value` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p101_promotional_category_datas`
--

INSERT INTO `p101_promotional_category_datas` (`id`, `promotional_category_id`, `type`, `store_id`, `coupon_id`, `old_value`, `new_value`, `created_at`, `updated_at`) VALUES
(4, 5, '0', 0, 5, '12', '54', '2017-12-30 19:20:17', '2017-12-30 19:20:17'),
(5, 6, '1', 6, 0, '45', '99', '2017-12-30 19:20:53', '2017-12-30 19:20:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p101_promotional_category_datas`
--
ALTER TABLE `p101_promotional_category_datas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p101_promotional_category_datas`
--
ALTER TABLE `p101_promotional_category_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
