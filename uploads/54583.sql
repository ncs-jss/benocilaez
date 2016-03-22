-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2016 at 12:47 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zeal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `society_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `society_email`, `event_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(40, 'abhayrawat26952@gmail.com', 'nibb40', NULL, '2016-02-11 13:48:36', '2016-02-11 13:48:36'),
(41, 'abhayrawat26952@gmail.com', 'nibb41', NULL, '2016-02-11 13:48:44', '2016-02-11 13:48:44'),
(42, 'abhayrawat26952@gmail.com', 'nibb42', NULL, '2016-02-11 13:50:53', '2016-02-11 13:50:53'),
(43, 'quanta@quanta.com', 'quan43', NULL, '2016-02-11 13:54:15', '2016-02-11 13:54:15'),
(44, 'quanta@quanta.com', 'quan44', NULL, '2016-02-11 13:55:04', '2016-02-11 13:55:04'),
(45, 'quanta@quanta.com', 'quan45', NULL, '2016-02-11 13:55:30', '2016-02-11 13:55:30'),
(47, 'abhayrawat26952@gmail.com', 'nibb47', NULL, '2016-02-11 13:57:08', '2016-02-11 13:57:08'),
(48, 'abhayrawat26952@gmail.com', 'nibb48', NULL, '2016-02-14 06:10:14', '2016-02-14 06:10:14'),
(49, 'abhayrawat26952@gmail.com', 'nibb49', NULL, '2016-02-15 09:59:50', '2016-02-15 09:59:50'),
(50, 'abhayrawat26952@gmail.com', 'nibb50', NULL, '2016-02-19 13:16:52', '2016-02-19 13:16:52'),
(51, 'abhayrawat26952@gmail.com', 'nibb51', NULL, '2016-02-25 06:06:26', '2016-02-25 06:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

CREATE TABLE `event_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_description` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `1st_place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `2nd_place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prize_money` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachment` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `timing` datetime NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `grp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_details`
--

INSERT INTO `event_details` (`id`, `event_id`, `event_name`, `event_description`, `1st_place`, `2nd_place`, `prize_money`, `attachment`, `timing`, `contact`, `remember_token`, `created_at`, `updated_at`, `approved`, `grp`) VALUES
(28, 'nibb40', ',hklnlknk', '{"short_des":"","long_des":"<p>Your Event&#39;s Description Here...<\\/p>\\n","rules":[""]}', NULL, NULL, '["",""]', '', '0000-00-00 00:00:00', '[{"name":"","number":""},{"name":"","number":""}]', NULL, '2016-02-11 13:48:36', '2016-02-18 06:56:20', 0, 0),
(29, 'nibb41', 'lkjkl', '{"short_des":"","long_des":"<p>Your Event&#39;s Description Here...<\\/p>\\n","rules":[""]}', NULL, NULL, '["",""]', '', '0000-00-00 00:00:00', '[{"name":"","number":""},{"name":"","number":""}]', NULL, '2016-02-11 13:48:44', '2016-02-25 05:42:36', 0, 0),
(30, 'nibb42', 'skllsgl;smd', '{"short_des":"","long_des":"<p>Your Event&#39;s Description Here...<\\/p>\\n","rules":[""]}', NULL, NULL, '["",""]', '', '0000-00-00 00:00:00', '[{"name":"","number":""},{"name":"","number":""}]', NULL, '2016-02-11 13:50:53', '2016-02-15 06:01:01', 0, 0),
(31, 'quan43', 'q1', '{"short_des":"","long_des":"<p>Your Event&#39;s Description Here...<\\/p>\\n","rules":[""]}', NULL, NULL, '["",""]', '', '0000-00-00 00:00:00', '[{"name":"","number":""},{"name":"","number":""}]', NULL, '2016-02-11 13:54:15', '2016-02-18 07:49:51', 0, 0),
(32, 'quan44', 'q2', '{"short_des":"","long_des":"<p>Your Event&#39;s Description Here...<\\/p>\\n","rules":[""]}', NULL, NULL, '["",""]', '', '0000-00-00 00:00:00', '[{"name":"","number":""},{"name":"","number":""}]', NULL, '2016-02-11 13:55:04', '2016-02-18 07:53:51', 2, 0),
(33, 'quan45', 'q2', '{"short_des":"","long_des":"<p>Your Event&#39;s Description Here...<\\/p>\\n","rules":[""]}', NULL, NULL, '["",""]', '', '0000-00-00 00:00:00', '[{"name":"","number":""},{"name":"","number":""}]', NULL, '2016-02-11 13:55:30', '2016-02-18 07:51:25', 0, 0),
(35, 'nibb47', 'asda32', '{"short_des":"","long_des":"<p>Your Event&#39;s Description Here...<\\/p>\\n","rules":[""]}', NULL, NULL, '["",""]', '', '0000-00-00 00:00:00', '[{"name":"","number":""},{"name":"","number":""}]', NULL, '2016-02-11 13:57:08', '2016-02-15 06:00:59', 1, 0),
(36, 'nibb48', 'zxc', '{"short_des":"","long_des":"<p>Your Event&#39;s Description Here...<\\/p>\\n","rules":[""]}', NULL, NULL, '["",""]', '', '0000-00-00 00:00:00', '[{"name":"","number":""},{"name":"","number":""}]', NULL, '2016-02-14 06:10:14', '2016-02-14 06:10:14', 0, 0),
(37, 'nibb49', 'script', '{"short_des":"as","long_des":"<blockquote>\\n<ul>\\n\\t<li>\\n\\t<div style=\\"background:#eee;border:1px solid #ccc;padding:5px 10px;\\"><s><em><strong>Your Event&#39;s Description Here... &lt;script&gt;console.log(&quot;sbhkljkljsy&quot;)&lt;\\/script&gt;<\\/strong><\\/em><\\/s><\\/div>\\n\\t<\\/li>\\n<\\/ul>\\n<\\/blockquote>\\n","rules":[""]}', NULL, NULL, '["",""]', '', '0000-00-00 00:00:00', '[{"name":"","number":""},{"name":"","number":""}]', NULL, '2016-02-15 09:59:50', '2016-02-15 10:06:16', 1, 0),
(38, 'nibb50', 'sasda', '{"short_des":"","long_des":"<p>Your Event&#39;s Description Here...<\\/p>\\n","rules":[""]}', NULL, NULL, '["",""]', '', '0000-00-00 00:00:00', '[{"name":"","number":""},{"name":"","number":""}]', NULL, '2016-02-19 13:16:52', '2016-02-19 13:16:52', 0, 0),
(39, 'nibb51', 'nsddnklvs', '{"short_des":"","long_des":"<p>Your Event&#39;s Description Here...<\\/p>\\n","rules":[""]}', NULL, NULL, '["",""]', '', '0000-00-00 00:00:00', '[{"name":"","number":""},{"name":"","number":""}]', NULL, '2016-02-25 06:06:26', '2016-02-25 06:06:26', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_14_150639_create_users', 1),
('2016_01_14_152641_create_user_details', 1),
('2016_01_14_161440_create_admin_details', 1),
('2016_01_14_163451_create_events', 1),
('2016_01_14_164422_create_event_details', 1),
('2016_01_14_171909_create_zeal_id', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priviliges` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `society` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `priviliges`, `remember_token`, `created_at`, `updated_at`, `society`) VALUES
(6, 'abhayrawat26952@gmail.com', '$2y$10$45xbyg3.BR.wPeG3ciXH4.lY0MUG.3juoEoGR1zqdlg6fY8yg9C/.', 1, 'bMyrCFj7HI2FDEu7E76IXtTtQ0u7UC574tM0tZkpIKoPHsbvQGEQBOzenjJ4', '2016-01-22 06:51:26', '2016-02-12 06:39:54', 'Nibble'),
(9, 'quanta@quanta.com', '$2y$10$mLMcXEOtSKQ7GNcoEOka4eprb1EVF//6v.VbMPk2ctMFO5Y2ny.GW', 2, 'JldYa0KamFkcEDwmkymrn93gHFQsL3eG0ALqXwUCRsuQlOEqQwFQg6NfKdAo', '2016-01-24 04:20:47', '2016-02-12 06:39:10', 'quanta'),
(10, 'xx@xx.com', '$2y$10$sGUmCN5vKbO3ZSxV1U7N4esQ9/B594ZK1Estty7xtHGMSzp1qg306', 2, NULL, '2016-02-15 08:27:42', '2016-02-15 08:27:42', 'abhay'),
(11, 'xx1@xx.com', '$2y$10$w8yBYzuq4w.0abCE4jZ5lOPo6ix8682wctBtnFPiFOR5AbvYNCNWq', 2, NULL, '2016-02-15 08:32:38', '2016-02-15 08:32:38', 'abhay'),
(12, 'x1x1@xx.com', '$2y$10$P0zk7bI4GpsBkYoBE96s6u6ejKT4YKAxJBbeQZ2ZA9AHoH4l0JoVy', 2, NULL, '2016-02-15 08:33:17', '2016-02-15 08:33:17', 'abhay');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` tinyint(4) NOT NULL,
  `college` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zeal_id`
--

CREATE TABLE `zeal_id` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zealid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_details_email_foreign` (`email`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_event_id_unique` (`event_id`),
  ADD KEY `events_society_email_foreign` (`society_email`);

--
-- Indexes for table `event_details`
--
ALTER TABLE `event_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_details_event_id_foreign` (`event_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_email_foreign` (`email`);

--
-- Indexes for table `zeal_id`
--
ALTER TABLE `zeal_id`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zeal_id_email_foreign` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `event_details`
--
ALTER TABLE `event_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `zeal_id`
--
ALTER TABLE `zeal_id`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD CONSTRAINT `admin_details_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_society_email_foreign` FOREIGN KEY (`society_email`) REFERENCES `users` (`email`);

--
-- Constraints for table `event_details`
--
ALTER TABLE `event_details`
  ADD CONSTRAINT `event_details_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `zeal_id`
--
ALTER TABLE `zeal_id`
  ADD CONSTRAINT `zeal_id_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
