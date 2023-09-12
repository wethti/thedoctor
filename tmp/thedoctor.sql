-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 04:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thedoctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subsection_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menutabs`
--

CREATE TABLE `menutabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `template` text DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menutabs`
--

INSERT INTO `menutabs` (`id`, `title`, `description`, `page_id`, `template`, `position`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asdsad', NULL, 2, NULL, 1, '2023-07-19 02:31:40', '2023-07-19 09:22:47', '2023-07-19 09:22:47'),
(2, 'About us', NULL, NULL, NULL, 1, '2023-07-19 09:22:51', '2023-07-19 09:34:06', '2023-07-19 09:34:06'),
(3, 'About us', NULL, NULL, NULL, 1, '2023-07-19 09:34:12', '2023-07-19 09:34:39', '2023-07-19 09:34:39'),
(4, 'About us', NULL, NULL, NULL, 1, '2023-07-19 09:34:48', '2023-07-19 09:34:50', '2023-07-19 09:34:50'),
(5, 'About us', NULL, NULL, NULL, 1, '2023-07-19 09:34:55', '2023-07-19 09:34:57', '2023-07-19 09:34:57'),
(6, 'About us', NULL, NULL, NULL, 4, '2023-07-19 09:35:00', '2023-07-25 09:23:43', NULL),
(7, 'Main components', NULL, NULL, NULL, 1, '2023-07-19 09:45:59', '2023-07-22 04:14:44', NULL),
(8, 'Catalog', NULL, NULL, NULL, 2, '2023-07-19 10:36:29', '2023-07-22 04:14:46', NULL),
(9, 'Product lines', NULL, NULL, NULL, 4, '2023-07-22 01:52:45', '2023-07-22 01:52:49', '2023-07-22 01:52:49'),
(10, 'Hair state', NULL, NULL, NULL, 4, '2023-07-22 01:59:41', '2023-07-22 01:59:43', '2023-07-22 01:59:43'),
(11, 'Press coverage', NULL, NULL, NULL, 3, '2023-07-22 03:49:08', '2023-07-22 04:14:49', NULL),
(12, 'Sitemap', NULL, 5, NULL, 5, '2023-07-25 09:09:57', '2023-07-25 09:24:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_06_142106_create_menutabs_table', 1),
(6, '2023_07_07_130444_create_sections_table', 1),
(7, '2023_07_07_131950_create_subsections_table', 1),
(8, '2023_07_17_094152_create_images_table', 1),
(9, '2023_07_18_100529_create_pages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `route` text DEFAULT NULL,
  `menutab` tinyint(1) NOT NULL DEFAULT 1,
  `section` tinyint(1) NOT NULL DEFAULT 1,
  `subsection` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `route`, `menutab`, `section`, `subsection`, `created_at`, `updated_at`) VALUES
(4, 'About us page', 'about', 1, 1, 1, '2023-07-19 09:24:04', '2023-07-19 09:24:04'),
(5, 'Sitemap', 'sitemap', 1, 0, 0, '2023-07-25 09:08:55', '2023-07-25 09:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `menutab_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `description`, `page_id`, `position`, `created_at`, `updated_at`, `deleted_at`, `menutab_id`) VALUES
(1, 'adsasd', 'd1212', 2, 4, '2023-07-19 02:31:45', '2023-07-19 04:18:04', NULL, 1),
(2, 'adsasd', 'd1212', 3, 2, '2023-07-19 04:13:16', '2023-07-19 04:32:02', NULL, 1),
(3, 'adsasd', 'd1212', 1, 3, '2023-07-19 04:15:34', '2023-07-19 04:15:40', NULL, 1),
(4, 'adsasd', 'd1212', 2, 1, '2023-07-19 04:15:37', '2023-07-19 04:32:02', NULL, 1),
(5, 'About brand', '1', NULL, 2, '2023-07-19 10:36:42', '2023-07-19 10:37:12', '2023-07-19 10:37:12', 6),
(6, 'Contacts', '1', NULL, 4, '2023-07-19 10:37:10', '2023-07-19 10:37:47', NULL, 6),
(7, 'About brand', '1', 4, 1, '2023-07-19 10:37:15', '2023-07-25 09:23:45', NULL, 6),
(8, 'How to find us?', '1', NULL, 2, '2023-07-19 10:37:30', '2023-07-19 10:37:30', NULL, 6),
(9, 'Become a partner', '1', NULL, 3, '2023-07-19 10:37:41', '2023-07-19 10:37:41', NULL, 6),
(10, 'Facial skin condition', '1', NULL, 6, '2023-07-22 01:52:23', '2023-07-22 02:00:20', NULL, 8),
(11, 'Product categories', '1', NULL, 1, '2023-07-22 01:53:03', '2023-07-22 01:53:03', NULL, 8),
(12, 'Product lines', '1', NULL, 2, '2023-07-22 01:54:40', '2023-07-22 01:54:40', NULL, 8),
(13, 'Product properties', '1', NULL, 3, '2023-07-22 01:54:50', '2023-07-22 01:54:50', NULL, 8),
(14, 'Action of products', '1', NULL, 4, '2023-07-22 01:59:50', '2023-07-22 01:59:50', NULL, 8),
(15, 'Hair condition', '1', NULL, 5, '2023-07-22 02:00:01', '2023-07-22 02:00:06', NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `subsections`
--

CREATE TABLE `subsections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `template` text DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subsections`
--

INSERT INTO `subsections` (`id`, `title`, `description`, `page_id`, `template`, `position`, `created_at`, `updated_at`, `deleted_at`, `section_id`) VALUES
(1, '\\z\\z', '\\\\\\\\\\', NULL, NULL, 1, '2023-07-19 04:17:38', '2023-07-19 04:17:38', NULL, 1),
(2, 'How to find us?', '1', NULL, NULL, 1, '2023-07-19 10:37:04', '2023-07-19 10:37:04', NULL, 5),
(3, 'ghfg', 'gfhhgffgh', NULL, NULL, 1, '2023-07-22 13:53:07', '2023-07-22 13:53:07', NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menutabs`
--
ALTER TABLE `menutabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_menutab_idx` (`menutab_id`);

--
-- Indexes for table `subsections`
--
ALTER TABLE `subsections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subsection_section_idx` (`section_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menutabs`
--
ALTER TABLE `menutabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subsections`
--
ALTER TABLE `subsections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `section_menutab_fk` FOREIGN KEY (`menutab_id`) REFERENCES `menutabs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subsections`
--
ALTER TABLE `subsections`
  ADD CONSTRAINT `subsection_section_fk` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
