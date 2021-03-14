-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2021 at 06:07 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cst-256-clc`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `users_id`) VALUES
(1, 'test', 'test', 2),
(5, 'Java', 'a Programming Language', 1),
(7, 'PHP', 'Everything about Laravel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `ID` int(11) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `groups_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`ID`, `users_id`, `groups_id`) VALUES
(3, 4, 1),
(6, 4, 5),
(22, 1, 1),
(24, 2, 5),
(28, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `job` varchar(200) DEFAULT NULL,
  `skills` varchar(45) DEFAULT NULL,
  `education` varchar(45) DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `job`, `skills`, `education`, `users_id`) VALUES
(2, 'PHP', 'Gaming, Programming, Camping', 'Computer Programming in GCU', 1),
(7, 'test', 'test', 'test', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Safa Bayraktar', 'SBayraktar@my.gcu.edu', NULL, '$2y$10$mf9DBYxZobJr3LIOeWQUbOR8QBvjpGMskt1AAxMOXNzrbxMNcunxG', 'kMJk9PxmAJ5pEE0rPDWiVb5dnln14hpF4m5AfZxvixPx5XIyPPg5aSPizG5O', '2021-01-25 04:14:57', '2021-01-25 04:14:57'),
(2, 'test', 'test@user.com', NULL, '$2y$10$2keVhWsSrqU1R3DDPj9ZpOZL.H24Y0lRz3RhOipkqr7I7Rl3y8iMG', 'IqqP5xe7Cv0mQ9rmB3OVQ6XO5SzIYiHsTdccqYPh5MIJ1L21KkPYG3DiWPkW', '2021-02-01 07:39:02', '2021-02-01 07:39:02'),
(4, 'testuser2', 'testuser@user.com', NULL, '$2y$10$ILL6rkO51ujsAh4ib2SDv.wqc5MEzU/X7YOLAuXTNUOYkizQ11m/6', NULL, '2021-02-01 07:45:00', '2021-02-01 07:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_suspended`
--

CREATE TABLE `users_suspended` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_suspended`
--

INSERT INTO `users_suspended` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'new', 'newuser@user.com', '0000-00-00 00:00:00', '$2y$10$T8kK6Ft9LaF9v29UgDzpLu5x6s6pN6jW1RcgabA2nsv7BNm8INz.e', '6HLIzFk3yVDbgkuVPuSfCvkjBH9kxccDHlLfMTlrAwwc3P729VKkMRRpGSDt', '2021-02-07 09:59:44', '2021-02-07 09:59:44'),
(6, 'new', 'new@newuser.com', '0000-00-00 00:00:00', '$2y$10$LCmU9K9vF36Paxi7kUhaFuioC98jUlPiXHvpRlrTtwJO.gXPi4UaS', '', '2021-02-08 09:25:16', '2021-02-08 09:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `ID` int(11) NOT NULL,
  `phonenumber` varchar(10) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `biography` varchar(200) DEFAULT NULL,
  `isAdmin` tinyint(4) DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`ID`, `phonenumber`, `address`, `biography`, `isAdmin`, `users_id`) VALUES
(1, '5308768523', '3300 West Camelback road, Phoenix, AZ, 85017', 'Computer Programming major in GCU', 1, 1),
(2, '1234567890', 'test address', 'test biography', 0, 2),
(3, '1231234455', 'testuser address', 'testuser biography', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_suspended_info`
--

CREATE TABLE `user_suspended_info` (
  `ID` int(11) NOT NULL,
  `phonenumber` varchar(10) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `biography` varchar(200) DEFAULT NULL,
  `isAdmin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_suspended_info`
--

INSERT INTO `user_suspended_info` (`ID`, `phonenumber`, `address`, `biography`, `isAdmin`) VALUES
(6, '1231233232', 'newuser address', 'newuser bio', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_groups_users1_idx` (`users_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_members_users1_idx` (`users_id`),
  ADD KEY `fk_membership_groups1_idx` (`groups_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_portfolio_users1_idx` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_suspended`
--
ALTER TABLE `users_suspended`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_user_info_users_idx` (`users_id`);

--
-- Indexes for table `user_suspended_info`
--
ALTER TABLE `user_suspended_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `fk_groups_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `fk_members_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_membership_groups1` FOREIGN KEY (`groups_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `fk_portfolio_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `fk_user_info_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
