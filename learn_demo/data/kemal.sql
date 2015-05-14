-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2015 at 11:57 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kemal`
--

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE IF NOT EXISTS `forgot_password` (
`id` bigint(20) NOT NULL,
  `id_login` bigint(20) NOT NULL,
  `fp_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_login`
--

CREATE TABLE IF NOT EXISTS `users_login` (
`id` bigint(20) NOT NULL,
  `id_role` bigint(20) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_account_expired` tinyint(1) NOT NULL DEFAULT '0',
  `is_account_locked` tinyint(1) NOT NULL DEFAULT '0',
  `is_credentials_expired` tinyint(1) NOT NULL DEFAULT '0',
  `activte_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_login`
--

INSERT INTO `users_login` (`id`, `id_role`, `username`, `email`, `salt`, `password`, `is_active`, `is_account_expired`, `is_account_locked`, `is_credentials_expired`, `activte_key`, `created_at`, `updated_at`) VALUES
(1, 2, 'ashok', 'chitrodaal@gmail.com', NULL, 'ashok', 1, 0, 0, 0, NULL, '2015-05-14 11:49:38', '2015-05-14 11:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE IF NOT EXISTS `users_role` (
`id` bigint(20) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id`, `name`, `role`, `created_at`, `updated_at`) VALUES
(1, 'super', 'SUPER', '2015-05-14 00:00:00', '2015-05-14 00:00:00'),
(2, 'admin', 'ADMIN', '2015-05-14 00:00:00', '2015-05-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
`id` bigint(20) NOT NULL,
  `id_login` bigint(20) DEFAULT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contry` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_2AB9B5667002C064` (`fp_key`), ADD KEY `IDX_2AB9B566448D8A20` (`id_login`);

--
-- Indexes for table `users_login`
--
ALTER TABLE `users_login`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_4D7F6F59DC499668` (`id_role`), ADD KEY `username_index` (`username`), ADD KEY `email_index` (`email`), ADD KEY `salt_index` (`salt`), ADD KEY `password_index` (`password`), ADD KEY `activte_key_index` (`activte_key`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_98E0C46457698A6A` (`role`), ADD KEY `name_index` (`name`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_D95AB405448D8A20` (`id_login`), ADD KEY `first_name_index` (`first_name`), ADD KEY `last_name_index` (`last_name`), ADD KEY `city_index` (`city`), ADD KEY `state_index` (`state`), ADD KEY `zip_code_index` (`zip_code`), ADD KEY `phone_index` (`phone`), ADD KEY `mobile_index` (`mobile`), ADD KEY `fax_index` (`fax`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_login`
--
ALTER TABLE `users_login`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `forgot_password`
--
ALTER TABLE `forgot_password`
ADD CONSTRAINT `FK_2AB9B566448D8A20` FOREIGN KEY (`id_login`) REFERENCES `users_login` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_login`
--
ALTER TABLE `users_login`
ADD CONSTRAINT `FK_4D7F6F59DC499668` FOREIGN KEY (`id_role`) REFERENCES `users_role` (`id`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
ADD CONSTRAINT `FK_D95AB405448D8A20` FOREIGN KEY (`id_login`) REFERENCES `users_login` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
