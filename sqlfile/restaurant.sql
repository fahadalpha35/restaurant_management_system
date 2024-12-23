-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2024 at 10:38 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int NOT NULL,
  `name` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `company_id` int NOT NULL,
  `active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `company_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `active`, `created_at`, `updated_at`, `company_id`) VALUES
(1, 'Drinks', 'drinks', 1, '2024-11-23 23:08:16', '2024-11-24 01:00:30', 0),
(3, 'Rice', 'rice', 1, '2024-11-24 03:53:17', '2024-11-24 03:53:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `service_charge_value` varchar(255) NOT NULL,
  `vat_charge_value` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `currency` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `service_charge_value`, `vat_charge_value`, `address`, `phone`, `country`, `message`, `currency`, `image`) VALUES
(1, 'Company_OSSL', '00', '15', 'Police Plaza Concord', '01790004664', 'Bangladesh', 'this is just an testing', 'BDT', '1732793731_orms.png'),
(2, 'sgsg', 'srrdgsdfg', '124321', 'fds', '23234', 'efs', 'wegfweg', '3224', '');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_25_045226_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `old_sessons`
--

CREATE TABLE `old_sessons` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_general_ci,
  `payload` text COLLATE utf8mb4_general_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `old_sessons`
--

INSERT INTO `old_sessons` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aPD2Vmuxvd634ghuEJp7mC2Lh0u2WYUhZzQ0A30S', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVBiQkhzY1EwSjBqUmxGRnhRUU1la1ExY1FzeFZvS2RLZm9sbzI3TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1732170751),
('LrJe0pcFrlwQGeY3LNZLwhIR65RyrERL5mAWTR3r', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXhKY0hXb1BkNkQ4QTJHNVFvQ1VtR2FPWDFQNndwaVpuMmVzVWkxRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9yZXN0YXVyYW50LnRlc3QvbG9naW4iO319', 1732170580);

-- --------------------------------------------------------

--
-- Table structure for table `old_users`
--

CREATE TABLE `old_users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int NOT NULL,
  `store_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `old_users`
--

INSERT INTO `old_users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `gender`, `store_id`) VALUES
(1, 'admin', '$2y$10$yfi5nUQGXUZtMdl27dWAyOd/jMOmATBpiUvJDmUu9hJ5Ro6BE5wsK', 'admin@admin.com', 'john', 'doe', '80789998', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `service_charge_rate` varchar(255) NOT NULL,
  `service_charge_amount` varchar(255) NOT NULL,
  `vat_charge_rate` varchar(255) NOT NULL,
  `vat_charge_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `net_amount` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `table_id` int NOT NULL,
  `paid_status` int NOT NULL,
  `store_id` int NOT NULL,
  `branch_id` int NOT NULL,
  `order_status` varchar(1000) NOT NULL,
  `company_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `bill_no`, `date_time`, `gross_amount`, `service_charge_rate`, `service_charge_amount`, `vat_charge_rate`, `vat_charge_amount`, `discount`, `net_amount`, `user_id`, `table_id`, `paid_status`, `store_id`, `branch_id`, `order_status`, `company_id`) VALUES
(2, 'ORD-674BF49A2ABF1', '2024-12-01 05:31:06', '20', '10', '2', '15', '3', '0', '25', 2, 1, 0, 1, 0, '', 0),
(3, 'ORD-674BFB090E91A', '2024-12-01 05:58:33', '20', '10', '2', '15', '3', '0', '25', 2, 2, 0, 1, 0, '', 0),
(4, 'ORD-674BFBDBC248E', '2024-12-01 06:02:03', '20', '10', '2', '15', '3', '0', '25', 2, 2, 0, 1, 0, '', 0),
(5, 'ORD-674BFD93089EA', '2024-12-01 06:09:23', '20', '10', '2', '15', '3', '0', '25', 2, 1, 1, 1, 0, '', 0),
(6, 'ORD-674BFDF57B497', '2024-12-01 06:11:01', '20', '10', '2', '15', '3', '0', '25', 2, 1, 0, 1, 0, '', 0),
(7, 'ORD-674BFEAF401B2', '2024-12-01 06:14:07', '20', '10', '2', '15', '3', '0', '25', 2, 4, 0, 1, 0, '', 0),
(8, 'ORD-674BFFF117D80', '2024-12-01 06:19:29', '80', '10', '8', '15', '12', '0', '100', 2, 2, 0, 1, 0, '', 0),
(9, 'ORD-674C030B7EBB4', '2024-12-01 06:32:43', '20', '10', '2', '15', '3', '0', '25', 2, 1, 0, 1, 0, '', 0),
(10, 'ORD-674C046BA981E', '2024-12-01 06:38:35', '40', '10', '4', '15', '6', '0', '50', 2, 1, 0, 1, 0, '', 0),
(11, 'ORD-674C2EAF439DE', '2024-12-01 09:38:55', '60', '10', '6', '15', '9', '0', '75', 2, 1, 0, 1, 0, '', 0),
(12, 'ORD-674C31F7842C6', '2024-12-01 09:52:55', '20', '10', '2', '15', '3', '0', '25', 2, 1, 0, 1, 0, '', 0),
(13, 'ORD-674C32116E4BB', '2024-12-01 09:53:21', '20', '10', '2', '15', '3', '0', '25', 2, 1, 0, 1, 0, '', 0),
(14, 'ORD-674C32260F8D5', '2024-12-01 09:53:42', '20', '10', '2', '15', '3', '0', '25', 2, 1, 0, 1, 0, '', 0),
(15, 'ORD-674C3246AFBF6', '2024-12-01 09:54:14', '20', '10', '2', '15', '3', '0', '25', 2, 1, 0, 1, 0, '', 0),
(16, 'ORD-674C329E3EC9C', '2024-12-01 09:55:42', '120', '10', '12', '15', '18', '0', '150', 2, 1, 0, 1, 0, '', 0),
(17, 'ORD-674D436136B44', '2024-12-02 05:19:29', '20', '10', '2', '15', '3', '0', '25', 2, 1, 0, 1, 0, '', 0),
(18, 'ORD-674D438409212', '2024-12-02 05:20:04', '20', '10', '2', '15', '3', '0', '25', 2, 1, 0, 1, 0, '', 0),
(19, 'ORD-674D439D33A90', '2024-12-02 05:20:29', '120', '10', '12', '15', '18', '0', '150', 2, 1, 0, 1, 0, '', 0),
(20, 'ORD-674D43C0C8245', '2024-12-02 05:21:04', '140', '10', '14', '15', '21', '75', '100', 2, 1, 0, 1, 0, '', 0),
(21, 'ORD-674D89BE5A7C2', '2024-12-02 10:19:42', '80', '10', '8', '15', '12', '0', '100', 2, 1, 0, 1, 0, '', 0),
(22, 'ORD-674D99408C135', '2024-12-02 11:25:52', '20', '10', '2', '15', '3', '0', '25', 2, 1, 0, 1, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `company_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `rate`, `amount`, `company_id`) VALUES
(1, 2, 1, '1', '20', '20.00', 0),
(2, 3, 2, '1', '20', '20.00', 0),
(3, 4, 1, '1', '20', '20.00', 0),
(4, 5, 1, '1', '20', '20.00', 0),
(5, 6, 2, '1', '20', '20.00', 0),
(6, 7, 2, '1', '20', '20.00', 0),
(7, 8, 2, '4', '20', '80.00', 0),
(8, 9, 1, '1', '20', '20.00', 0),
(9, 10, 1, '2', '20', '40.00', 0),
(10, 11, 1, '3', '20', '60.00', 0),
(11, 12, 6, '1', '20', '20.00', 0),
(12, 13, 6, '1', '20', '20.00', 0),
(13, 14, 6, '1', '20', '20.00', 0),
(14, 15, 4, '1', '20', '20.00', 0),
(15, 16, 1, '6', '20', '120.00', 0),
(16, 17, 4, '1', '20', '20.00', 0),
(17, 18, 6, '1', '20', '20.00', 0),
(18, 19, 1, '6', '20', '120.00', 0),
(19, 20, 1, '7', '20', '140.00', 0),
(20, 21, 2, '4', '20', '80.00', 0),
(21, 22, 2, '1', '20', '20.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(16, 'App\\Models\\User', 3, 'ORMS', '883d777e38045dc381f2df171c473a7fe2c75311b4b5d3ca70877f5672f5af5c', '[\"*\"]', NULL, NULL, '2024-11-25 01:22:32', '2024-11-25 01:22:32'),
(49, 'App\\Models\\User', 1, 'ORMS', '51c1b7d514aed8cea52a7dbf39608a31a1dbb2b0fbcd7fca9a14ea1da5d5b89e', '[\"*\"]', NULL, NULL, '2024-11-28 04:19:50', '2024-11-28 04:19:50'),
(50, 'App\\Models\\User', 2, 'ORMS', 'ad75b8e4632928041594ea4dbc615c916ab489334d41d71aaf689abaf35b0d12', '[\"*\"]', NULL, NULL, '2024-11-30 21:48:18', '2024-11-30 21:48:18'),
(51, 'App\\Models\\User', 2, 'ORMS', '14983e4df5ca05ac20121a930d683bc77a867267019bdfc00c1599b647d645f8', '[\"*\"]', NULL, NULL, '2024-12-01 22:32:12', '2024-12-01 22:32:12'),
(52, 'App\\Models\\User', 2, 'ORMS', '2b5f654f1cfd143c5ec6263a7a10a175b4b3467104219277c89236a4bfc62329', '[\"*\"]', NULL, NULL, '2024-12-02 03:58:39', '2024-12-02 03:58:39'),
(53, 'App\\Models\\User', 2, 'ORMS', '5de9a0e61439527fbea55f1c9a58b636d4283b9c8403fa4ad525d9aaa8aaa763', '[\"*\"]', NULL, NULL, '2024-12-02 22:41:15', '2024-12-02 22:41:15'),
(54, 'App\\Models\\User', 2, 'ORMS', 'e619344436b821587b0ad7f9df8e88e71b6e11b9b2a0603ad73d2bdb70bfc945', '[\"*\"]', NULL, NULL, '2024-12-03 23:32:04', '2024-12-03 23:32:04'),
(55, 'App\\Models\\User', 2, 'ORMS', 'c8613a96bb85a163eed157eb068e066486c4512f44db26af98765013d414655b', '[\"*\"]', NULL, NULL, '2024-12-04 05:31:56', '2024-12-04 05:31:56'),
(56, 'App\\Models\\User', 2, 'ORMS', '61ba60d33594c891a5b78cdca92a2a4caf4178345e7b31b134fa96df55f080d4', '[\"*\"]', NULL, NULL, '2024-12-05 02:36:07', '2024-12-05 02:36:07'),
(57, 'App\\Models\\User', 2, 'ORMS', 'b07f3a39c636c6c6b0e54811b8e4105eae850b32e9c5787016c6b4bd6ac1b3de', '[\"*\"]', NULL, NULL, '2024-12-09 23:15:22', '2024-12-09 23:15:22'),
(58, 'App\\Models\\User', 2, 'ORMS', '826f3f2866a20b388cdf10fa3d67dcfb3f3b0917472d8a481d59e7e9d988bfa3', '[\"*\"]', NULL, NULL, '2024-12-10 04:32:51', '2024-12-10 04:32:51'),
(59, 'App\\Models\\User', 2, 'ORMS', 'fb865b47a3b030b5fc95967e4cf61d43c61e94ee5731b0b07c264070a7397612', '[\"*\"]', NULL, NULL, '2024-12-10 23:36:16', '2024-12-10 23:36:16'),
(60, 'App\\Models\\User', 2, 'ORMS', '4992e62577f304f6ebf20f255464105b18da243add2d643eca12c451a7852507', '[\"*\"]', NULL, NULL, '2024-12-11 23:51:40', '2024-12-11 23:51:40'),
(61, 'App\\Models\\User', 2, 'ORMS', '8619073ec4493fa8e2f1d2b85fa378ea2d75cce940ed56883af10998a6115f54', '[\"*\"]', NULL, NULL, '2024-12-21 23:46:08', '2024-12-21 23:46:08'),
(62, 'App\\Models\\User', 2, 'ORMS', 'f3465820ad74b2b123538031d0dac43e1e7f1d70554202a462e1078d08d0c744', '[\"*\"]', NULL, NULL, '2024-12-22 03:43:38', '2024-12-22 03:43:38'),
(63, 'App\\Models\\User', 2, 'ORMS', '9b91d941c25c32567088f3be91bce03c2e8b9bff2d9745478e920bfd7ce9cb11', '[\"*\"]', NULL, NULL, '2024-12-22 07:00:24', '2024-12-22 07:00:24'),
(64, 'App\\Models\\User', 2, 'ORMS', '87fec3354b25a53b197fb9ef912bffa7ea25ea7b5a6a57bb1ea4730f5a66646e', '[\"*\"]', NULL, NULL, '2024-12-23 03:55:51', '2024-12-23 03:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `store_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `active` int NOT NULL,
  `company_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `store_id`, `name`, `price`, `description`, `image`, `active`, `company_id`) VALUES
(1, 1, 1, 1, 'Pepsi', '20', 'test', '1733044745_About-Us.png', 1, 0),
(2, 1, 1, 8, '7 Up', '332', 'dfgdf', '', 1, 0),
(4, 3, 4, 1, 'Chicken Fried Rice', '43', 'fhdhgdf', '', 1, 0),
(6, 1, 1, 1, 'Coca Cola', '234324', 'test', '1733043720_og.png', 1, 0),
(7, 1, 1, 1, 'Frutika', '4354', 'fghh', '1733048468_res.png', 1, 0),
(8, 3, 4, 1, 'Yellow Rice', '453', 'fgdf', 'item.png', 1, 0),
(9, 1, 1, 1, 'Merinda', '3434', 'fghfgh', 'item.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `role_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `permission`) VALUES
(1, 'Super Administrator', 'a:32:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createStore\";i:9;s:11:\"updateStore\";i:10;s:9:\"viewStore\";i:11;s:11:\"deleteStore\";i:12;s:11:\"createTable\";i:13;s:11:\"updateTable\";i:14;s:9:\"viewTable\";i:15;s:11:\"deleteTable\";i:16;s:14:\"createCategory\";i:17;s:14:\"updateCategory\";i:18;s:12:\"viewCategory\";i:19;s:14:\"deleteCategory\";i:20;s:13:\"createProduct\";i:21;s:13:\"updateProduct\";i:22;s:11:\"viewProduct\";i:23;s:13:\"deleteProduct\";i:24;s:11:\"createOrder\";i:25;s:11:\"updateOrder\";i:26;s:9:\"viewOrder\";i:27;s:11:\"deleteOrder\";i:28;s:10:\"viewReport\";i:29;s:13:\"updateCompany\";i:30;s:11:\"viewProfile\";i:31;s:13:\"updateSetting\";}'),
(4, 'Members', 'a:9:{i:0;s:9:\"viewStore\";i:1;s:11:\"deleteStore\";i:2;s:9:\"viewTable\";i:3;s:11:\"deleteTable\";i:4;s:12:\"viewCategory\";i:5;s:11:\"viewProduct\";i:6;s:11:\"createOrder\";i:7;s:11:\"updateOrder\";i:8;s:9:\"viewOrder\";}'),
(5, 'Staff', 'a:6:{i:0;s:9:\"viewTable\";i:1;s:11:\"viewProduct\";i:2;s:11:\"createOrder\";i:3;s:11:\"updateOrder\";i:4;s:9:\"viewOrder\";i:5;s:11:\"viewProfile\";}');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KDTuWkfvSIYvxm99wiT7QpZ9MxZoPML74muA81GI', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieWtBeFYxaURhak1XakFFUm9NZXBXMklkQUVWVTZXb0N0OUJia1ZWdyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MDoiaHR0cDovL3Jlc3RhdXJhbnRfbWFuYWdlbWVudF9zeXN0ZW0udGVzdC9kYXNoYm9hcmQiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0OToiaHR0cDovL3Jlc3RhdXJhbnRfbWFuYWdlbWVudF9zeXN0ZW0udGVzdC9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1734950242);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_id` int NOT NULL,
  `active` int NOT NULL,
  `branch_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `company_id`, `active`, `branch_id`) VALUES
(1, 'OSSL', 1, 1, 0),
(8, 'Test', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `active` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `company_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `category_id`, `name`, `description`, `active`, `created_at`, `updated_at`, `company_id`) VALUES
(1, 1, 'Soft Drinks', 'soft-drinks', 1, '2024-11-24 06:28:42', '2024-12-01 10:07:16', 0),
(4, 3, 'Fried Rice', 'fried rice', 1, '2024-11-24 12:00:54', '2024-11-24 12:00:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `available` int NOT NULL,
  `active` int NOT NULL,
  `store_id` int NOT NULL,
  `company_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `table_name`, `capacity`, `available`, `active`, `store_id`, `company_id`) VALUES
(1, 'Table-1', '8', 1, 1, 1, 0),
(2, 'Table-2', '4', 4, 1, 1, 0),
(3, 'Table-3', '2', 2, 1, 1, 0),
(4, 'Table-4', '3', 3, 1, 1, 0),
(7, 'Table-5', '4', 4, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int NOT NULL,
  `company_id` int NOT NULL,
  `role_id` int NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `firstname`, `lastname`, `phone`, `gender`, `company_id`, `role_id`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kkjbjkn', 'amanaltdmd@gmail.com', 'jkjkn', 'kjjk', '+8801703560212', 1, 1, 1, NULL, '$2y$12$8XFOhtnBBpdURU8AIhNwceVE/vDnYox47dDhLlBvgsPIBhirMwtY6', '', NULL, '2024-11-21 02:44:32', '2024-11-21 02:44:32'),
(2, 'fahadalpha35', 'fahad@gmail.com', 'Fahad', 'Ahmed', '+8801790004664', 1, 1, 1, NULL, '$2y$12$hDDJkcLPe8BmGnE6H9ItzO8aX20lS2za7o9V1ogFLMH0BB5tNhlBW', '1732770378_FahadNew1.jpg', 'b1sbAQuzPskYUvUepYPlt9kLKy3BIsoy30i4S84qegFKBejVnFYjw2Pctf9y', '2024-11-21 03:02:58', '2024-11-21 03:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `old_sessons`
--
ALTER TABLE `old_sessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_users`
--
ALTER TABLE `old_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_table_id` (`table_id`),
  ADD KEY `fk_orders_store_id` (`store_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_order_id` (`order_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_category` (`category_id`),
  ADD KEY `fk_products_subcategory` (`subcategory_id`),
  ADD KEY `fk_products_stores` (`store_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_company` (`company_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tables_store` (`store_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_users_company` (`company_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `old_users`
--
ALTER TABLE `old_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_store_id` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_table_id` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_orders_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_products_stores` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_products_subcategory` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `store_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_store` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
