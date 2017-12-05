-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 06:56 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
-- Table structure for table `p101_users`
--

CREATE TABLE `p101_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `provider` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` text COLLATE utf8mb4_unicode_ci,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p101_users`
--

INSERT INTO `p101_users` (`id`, `provider`, `provider_id`, `mobile`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '9028285332', 'aamirkazi47@gmail.com', '$2y$10$ClUCqrPXBgxh0xeNY/GUTObExTBJmXV6gcoYlulhn5hX1krg6baNu', 'H0kSEnUtiVzdNCJPvaJCiy5Wvsmei1TWSlkhuvPyMCFYD6pTIlzuBxcnTUc5', NULL, NULL),
(5, 'facebook', '1134413916693087', ' ', 'hancy.pipl@gmail.com', ' ', 'jmoxiPd6mW3x77ehyfL7MVt1CwgzwY1wM979L86QI0tA9gwSEGbTTe7XulMz', '2017-12-05 11:55:56', '2017-12-05 11:55:56'),
(6, 'google', '113853735466915693694', ' ', 'afaque.icon@gmail.com', ' ', '1cQGuu10Z9Up50zuYoBcr6zb4psT7jwXBpL3UY9bhRxGE7UBcZjjhLFHlhuI', '2017-12-05 11:59:04', '2017-12-05 11:59:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p101_users`
--
ALTER TABLE `p101_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p101_users`
--
ALTER TABLE `p101_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
