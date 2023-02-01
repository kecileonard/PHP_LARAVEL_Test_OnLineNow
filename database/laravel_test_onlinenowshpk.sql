-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 01:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_test_onlinenowshpk`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Lorem Ipsus', 'loremipsus', 'Lorem ipsum dolor sit amet,', 1, '1675075745.png', '2023-01-30 09:49:05', '2023-01-31 00:20:20'),
(5, 'Lorem Ipsus', 'loremipsus', 'Lorem Ipsus dolor sit', 1, '1675079804.png', '2023-01-30 10:56:44', '2023-01-31 00:21:26'),
(6, 'Lorem Ipsus', 'loremipsus', 'Lorem Ipsus dolor sit', 1, '1675081561.png', '2023-01-30 11:26:01', '2023-01-31 00:20:10'),
(7, 'Lorem Ipsus', 'loremipsus', 'Lorem Ipsus dolor sit', 1, '1675083297.png', '2023-01-30 11:54:57', '2023-01-31 00:19:50'),
(8, 'Lorem Ipsus', 'loremipsus', 'Lorem Ipsus dolor sit', 1, '1675083337.png', '2023-01-30 11:55:37', '2023-01-31 00:18:10'),
(9, 'Lorem Ipsus', 'loremipsus', 'loremipsus', 1, '1675210037.png', '2023-01-30 12:08:53', '2023-01-31 23:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(5, '2022_10_08_224035_create_categories_table', 1),
(6, '2023_01_24_204811_add_lastname_to_users', 1),
(7, '2023_01_24_214340_rename_name_to_users', 1),
(8, '2023_01_24_214827_add_username_to_users', 1),
(11, '2014_10_12_100000_create_password_resets_table', 2),
(12, '2019_08_19_000000_create_failed_jobs_table', 2),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(14, '2023_01_30_015216_create_categories_table', 2),
(15, '2023_01_30_015242_create_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `email_verified_at`, `password`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Leonard', 'Keci', 'adminleonard', 'adminleonard@gmail.com', NULL, '$2y$10$K7SzclCC4NWGi3HxT9W3COfYZeBz91es94x5KaArBkEFjL6Tg9Z8e', 1, NULL, '2023-01-30 01:47:46', '2023-01-30 01:47:46'),
(3, 'Leonard', 'Keci', 'userleonard', 'userleonard@gmail.com', NULL, '$2y$10$sdRnH3Z019dkpLt4pmX3zugAcSi9FOESpLaAxRtaGogT.uDiWSsdG', 0, NULL, '2023-01-30 08:11:17', '2023-01-30 08:19:33'),
(4, 'Matteo', 'Rossi', 'matteorossi', 'matteorossi@gmail.com', NULL, '$2y$10$5TtfayDadU9/S3x6.ec5AeActKhsVyuqgYt7UkUJT8fEZAJLA05Ta', 0, NULL, '2023-01-30 08:12:01', '2023-01-30 08:15:36'),
(5, 'Alessandro', 'Pina', 'alessandropina', 'alessandropina@gmail.com', NULL, '$2y$10$G8JQkyd5nQWwo4xHi/bZBe4zDYwIu6oiRz21Kac46ssznvh8mTKS6', 0, NULL, '2023-01-30 08:12:41', '2023-01-30 08:16:20'),
(7, 'Daniela', 'Merlin', 'danielamerlin', 'danielamerlin@gmail.com', NULL, '$2y$10$hOpliGS67kEZ5EqPr5KIZ.5o88VLHCecHpNC7kO.aNNLDUaozKQcC', 0, NULL, '2023-01-30 08:13:26', '2023-01-30 08:18:14'),
(8, 'Fabio', 'Tonzo', 'fabiotonzo', 'fabiotonzo@gmail.com', NULL, '$2y$10$XFnonkHRBg2u0FxD2wbMJeK/BYAJsGifRBNABK5R65Xti6lTXRgfC', 0, NULL, '2023-01-30 08:13:51', '2023-01-30 08:19:17'),
(9, 'Leonard', 'Keci', 'userleonard2', 'userleonard2@gmail.com', NULL, '$2y$10$/U5p5lGKI3f8PgTRRqWnruXmHkzdXosdcsztl/rni0jJfYUcqjfGS', 0, NULL, '2023-01-30 08:41:02', '2023-01-31 17:02:00'),
(10, 'Elisa', 'Pino', 'elisapino', 'elisapino@gmail.com', NULL, '$2y$10$Zq9KEpwv82y4.3iupKK5e.dNyT9bLYGV36lkKwNSmS2bJv8cALGny', 0, NULL, '2023-01-30 13:02:23', '2023-01-30 13:02:23'),
(18, 'Alessia', 'Camasce', 'alessia', 'alessia@gmail.com', NULL, '$2y$10$B54AwpIJjVdhucEZQ/unsOHXWC54mK4ZGMEi5Yw90XkRqu1Ob.ioe', 0, NULL, '2023-01-31 16:43:26', '2023-01-31 19:34:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
