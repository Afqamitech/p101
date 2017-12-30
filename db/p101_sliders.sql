-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2017 at 05:37 PM
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
-- Table structure for table `p101_sliders`
--

CREATE TABLE `p101_sliders` (
  `id` int(11) NOT NULL,
  `slider_url` enum('0','1','2') NOT NULL COMMENT '0=>none,1=>coupon,2=>store',
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p101_sliders`
--

INSERT INTO `p101_sliders` (`id`, `slider_url`, `image`, `url`, `created_at`, `updated_at`) VALUES
(2, '0', '1513525852.jpg', '', '2017-12-17 10:20:53', '2017-12-17 10:20:53'),
(3, '1', '1514249227.jpg', 'sdfgdsfg', '2017-12-30 14:02:06', '2017-12-30 08:32:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p101_sliders`
--
ALTER TABLE `p101_sliders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p101_sliders`
--
ALTER TABLE `p101_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
