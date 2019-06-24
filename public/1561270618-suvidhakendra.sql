-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2019 at 01:11 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suvidhakendra`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_address` text COLLATE utf8mb4_unicode_ci,
  `client_gstin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_emailid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_mobileno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `upload_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `client_address`, `client_gstin`, `client_emailid`, `client_mobileno`, `payment_status`, `upload_file`, `created_at`, `updated_at`, `deleted_at`, `start_date`) VALUES
(1, 'pramod', 'kjkakasda', '222555444994455', NULL, NULL, 965, NULL, '2019-06-21 07:19:27', '2019-06-21 07:19:27', NULL, NULL),
(2, 'praksah', 'ddlksadlksd', '222555444994466', NULL, NULL, 16, NULL, '2019-06-21 07:34:54', '2019-06-21 07:34:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci,
  `gst_in` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_mobileno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `company_address`, `gst_in`, `company_email`, `company_mobileno`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tushar', 'odopsjdpsajda', '123456789123588', NULL, NULL, '2019-06-21 07:18:47', '2019-06-21 07:18:47', NULL),
(2, 'odjskdsD', 'DOSDSKNDKASD', '123456789123455', NULL, NULL, '2019-06-21 07:18:59', '2019-06-21 07:18:59', NULL);

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
(56, '2014_10_12_000000_create_users_table', 1),
(57, '2014_10_12_100000_create_password_resets_table', 1),
(58, '2019_06_20_173737_create_sales_table', 1),
(59, '2019_06_20_173838_create_purchases_table', 1),
(60, '2019_06_20_190755_create_1561046875_roles_table', 1),
(61, '2019_06_20_190804_create_1561046883_users_table', 1),
(62, '2019_06_20_190805_add_5d0baf6e94c17_relationships_to_user_table', 1),
(63, '2019_06_20_191132_create_1561047092_companies_table', 1),
(64, '2019_06_20_194152_update_1561048912_companies_table', 1),
(65, '2019_06_20_194507_create_1561049107_clients_table', 1),
(66, '2019_06_20_200026_update_1561050026_clients_table', 1);

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
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `inv_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsn_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` decimal(8,2) NOT NULL,
  `rate` decimal(8,2) NOT NULL,
  `pcs_kgs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `CGST` decimal(8,2) DEFAULT NULL,
  `SGST` decimal(8,2) DEFAULT NULL,
  `IGST` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Administrator (can create other users)', '2019-06-21 07:18:21', '2019-06-21 07:18:21'),
(2, 'Simple user', '2019-06-21 07:18:21', '2019-06-21 07:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `inv_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsn_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` decimal(8,2) NOT NULL,
  `rate` decimal(8,2) NOT NULL,
  `pcs_kgs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `CGST` decimal(8,2) DEFAULT NULL,
  `SGST` decimal(8,2) DEFAULT NULL,
  `IGST` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `client_id`, `inv_no`, `company_name`, `company_address`, `date`, `product_name`, `hsn_code`, `qty`, `rate`, `pcs_kgs`, `gst_rate`, `total`, `CGST`, `SGST`, `IGST`, `created_at`, `updated_at`) VALUES
(4, 1, 'jcbdkhbc', 'tushar', 'odopsjdpsajda', NULL, 'man', '65666', '5.00', '24.00', 'kgs', '4', '120.00', '0.00', '0.00', '6.00', '2019-06-21 07:25:19', '2019-06-21 07:25:19'),
(5, 1, 'jcbdkhbc', 'tushar', 'odopsjdpsajda', NULL, 'man', '65666', '5.00', '24.00', 'kgs', '4', '120.00', '0.00', '0.00', '6.00', '2019-06-21 07:27:20', '2019-06-21 07:27:20'),
(6, 1, '365155', 'tushar', 'odopsjdpsajda', '23/12/6611', 'fjvjfv', '65656', '8.00', '5.00', 'pcs', '2', '40.00', '0.00', '0.00', '1.00', '2019-06-21 07:30:12', '2019-06-21 07:30:12'),
(7, 1, '365155', 'tushar', 'odopsjdpsajda', '23/12/6611', 'fjvjfv', '65656', '8.00', '5.00', 'pcs', '2', '40.00', '0.00', '0.00', '1.00', '2019-06-21 07:32:03', '2019-06-21 07:32:03'),
(8, 2, '65656', 'tushar', 'odopsjdpsajda', '23/12/66', 'hello', '65656', '2.00', '58.00', 'kgs', '2', '116.00', '0.00', '0.00', '2.90', '2019-06-21 07:35:34', '2019-06-21 07:35:34'),
(9, 1, '4848484', 'tushar', 'odopsjdpsajda', '25-2-09', 'jdjdnj', 'idjidj', '2.00', '7.00', 'pcs', '6', '14.00', '0.00', '0.00', '0.84', '2019-06-22 02:30:18', '2019-06-22 02:30:18'),
(10, 1, '656464', 'tushar', 'odopsjdpsajda', '25-2-09', 'hcjhd', 'dsdhsaidh', '4.00', '25.00', 'pcs', '2', '100.00', '0.00', '0.00', '2.50', '2019-06-22 02:50:41', '2019-06-22 02:50:41'),
(11, 1, 'jfhjhfj', 'odjskdsD', 'DOSDSKNDKASD', '25-2-09', 'kdkdnknd', 'kshks', '50.00', '2.00', 'kgs', '2.5', '100.00', '1.25', '1.25', '0.00', '2019-06-22 03:34:34', '2019-06-22 03:34:34'),
(12, 1, 'jfhjhfj', 'odjskdsD', 'DOSDSKNDKASD', '25-2-09', 'kdkdnknd', 'kshks', '50.00', '2.00', 'kgs', '2.5', '100.00', '1.25', '1.25', '0.00', '2019-06-22 03:52:36', '2019-06-22 03:52:36'),
(13, 1, 'jfhjhfj', 'odjskdsD', 'DOSDSKNDKASD', '25-2-09', 'kdkdnknd', 'kshks', '50.00', '2.00', 'kgs', '2.5', '100.00', '1.25', '1.25', '0.00', '2019-06-22 03:52:44', '2019-06-22 03:52:44'),
(14, 1, 'jfhjhfj', 'odjskdsD', 'DOSDSKNDKASD', '25-2-09', 'kdkdnknd', 'kshks', '50.00', '2.00', 'kgs', '2.5', '100.00', '1.25', '1.25', '0.00', '2019-06-22 03:53:58', '2019-06-22 03:53:58'),
(15, 1, 'jfhjhfj', 'odjskdsD', 'DOSDSKNDKASD', '25-2-09', 'kdkdnknd', 'kshks', '50.00', '2.00', 'kgs', '28', '100.00', '14.00', '14.00', '0.00', '2019-06-22 03:55:48', '2019-06-22 05:08:16'),
(16, 1, 'jfhjhfj', 'odjskdsD', 'DOSDSKNDKASD', '25-2-09', 'kdkdnknd', 'kshks', '50.00', '2.00', 'pcs', '12', '100.00', '6.00', '6.00', '0.00', '2019-06-22 03:57:10', '2019-06-22 04:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$Gi4xHoh7TgSFhBqhLrnCnuU3f3XlJX4OrahtJJfS0hL4joBsfYvyO', '', '2019-06-21 07:18:21', '2019-06-21 07:18:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_deleted_at_index` (`deleted_at`);

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
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `316681_5d0baf685f467` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `316681_5d0baf685f467` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
