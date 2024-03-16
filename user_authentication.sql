-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 16, 2024 at 12:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_authentication`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '0001_01_01_000001_create_cache_table', 1),
(8, '0001_01_01_000002_create_jobs_table', 1),
(9, '2024_03_15_102650_create_users_table', 1),
(10, '2024_03_15_184201_create_plans_table', 1),
(11, '2024_03_15_193113_create_plan_addeds_table', 1),
(12, '2024_03_15_232707_create_purchase_infos_table', 1),
(13, '2024_03_16_074108_create_transactions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_price` int(11) NOT NULL,
  `plan_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_name`, `plan_price`, `plan_description`, `created_at`, `updated_at`) VALUES
(1, 'Basic Plan', 10, 'Suitable for basic needs', '2024-03-15 23:24:06', '2024-03-15 23:24:06'),
(2, 'Standard Plan', 20, 'Suitable for standard needs', '2024-03-15 23:22:28', '2024-03-15 23:22:28'),
(3, 'Premium Plan', 30, 'Suitable for premium needs', '2024-03-15 23:23:22', '2024-03-15 23:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `plan_addeds`
--

CREATE TABLE `plan_addeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_price` int(11) NOT NULL,
  `plan_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_infos`
--

CREATE TABLE `purchase_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postalCode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_infos`
--

INSERT INTO `purchase_infos` (`id`, `name`, `email`, `address`, `city`, `country`, `postalCode`, `created_at`, `updated_at`) VALUES
(1, 'Carmel Infanta', 'carmelinfanta97@gmail.com', 'address', 'city', 'country', '628002', '2024-03-15 23:29:28', '2024-03-15 23:29:28'),
(2, 'Carmel Infanta', 'carmelinfanta97@gmail.com', 'asasd', 'city', 'country', '628002', '2024-03-15 23:31:17', '2024-03-15 23:31:17'),
(3, 'Carmel Infanta', 'carmelinfanta97@gmail.com', 'test address', 'city', 'country', '628002', '2024-03-16 02:09:05', '2024-03-16 02:09:05'),
(4, 'Carmel Infanta', 'carmelinfanta97@gmail.com', 'address', 'city', 'country', '628002', '2024-03-16 02:57:29', '2024-03-16 02:57:29'),
(5, 'Carmel Infanta', 'carmelinfanta97@gmail.com', 'test', 'city', 'country', '628002', '2024-03-16 03:17:59', '2024-03-16 03:17:59'),
(6, 'Carmel Infanta', 'carmelinfanta97@gmail.com', 'test', 'city', 'country', '628002', '2024-03-16 04:27:18', '2024-03-16 04:27:18'),
(7, 'Carmel Infanta', 'carmelinfanta97@gmail.com', 'test', 'city', 'country', '628002', '2024-03-16 04:33:51', '2024-03-16 04:33:51'),
(8, 'Joshua', 'joshua@gmail.com', 'test address', 'city', 'country', '628002', '2024-03-16 05:10:26', '2024-03-16 05:10:26'),
(9, 'Joshua', 'joshua@gmail.com', 'test', 'city', 'country', '628002', '2024-03-16 05:20:26', '2024-03-16 05:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `reference_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `name`, `email`, `price`, `reference_id`, `created_at`, `updated_at`) VALUES
(1, 'Carmel Infanta', 'carmelinfanta97@gmail.com', 10, 'HqEocvwKiY2zMXGerDivWOv8snqqdYbmfc9ZPOJr', '2024-03-16 02:58:01', '2024-03-16 02:58:01'),
(2, 'Carmel Infanta', 'carmelinfanta97@gmail.com', 20, 'HqEocvwKiY2zMXGerDivWOv8snqqdYbmfc9ZPOJr', '2024-03-16 03:18:21', '2024-03-16 03:18:21'),
(3, 'Carmel Infanta', 'carmelinfanta97@gmail.com', 10, 'HqEocvwKiY2zMXGerDivWOv8snqqdYbmfc9ZPOJr', '2024-03-16 04:27:51', '2024-03-16 04:27:51'),
(4, 'Carmel Infanta', 'carmelinfanta97@gmail.com', 10, 'HqEocvwKiY2zMXGerDivWOv8snqqdYbmfc9ZPOJr', '2024-03-16 04:34:17', '2024-03-16 04:34:17'),
(5, 'Joshua', 'joshua@gmail.com', 10, 'tok_1OuufUSAfFhqfzubHbODBsZd', '2024-03-16 05:10:50', '2024-03-16 05:10:50'),
(6, 'Joshua', 'joshua@gmail.com', 20, 'tok_1Ouup5SAfFhqfzubawBb8nj0', '2024-03-16 05:20:46', '2024-03-16 05:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Carmel Infanta', 'carmelinfanta97@gmail.com', '$2y$12$JWQIVqFN5nPBnE21CdrssulXUeYKfOxbLzjiduQs8eUgCV8oMgGLu', '2024-03-15 23:28:08', '2024-03-15 23:28:08'),
(2, 'Joshua', 'joshua@gmail.com', '$2y$12$qzVrmhLtIhz6xlUCV95An.c1uFs5tFrkiccsq43wcvUV0KA6UndGW', '2024-03-16 05:09:55', '2024-03-16 05:09:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_addeds`
--
ALTER TABLE `plan_addeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_infos`
--
ALTER TABLE `purchase_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plan_addeds`
--
ALTER TABLE `plan_addeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `purchase_infos`
--
ALTER TABLE `purchase_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
