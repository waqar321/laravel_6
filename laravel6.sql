-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 12:31 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel6`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satus` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `url`, `satus`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 0, 'Shoes', 'Shoes category', 'shoes', 1, NULL, NULL, NULL),
(13, 0, 'Vehicle', 'Vehicle cateogory', 'Vehicle', 1, NULL, NULL, NULL),
(14, 0, 'T-shirts', 'T-shirts category', 'T-shirts', 1, NULL, NULL, NULL),
(15, 0, 'computer-accessories', 'Computer Accessories Categorfy', 'computer-accessories', 1, NULL, NULL, NULL),
(16, 12, 'Nike Shoes', 'Nike best shoes', 'shoes-nike', 1, NULL, NULL, NULL),
(17, 12, 'Adidas Shoes', 'Adidas Shoes', 'shoes-adidas', 1, NULL, NULL, NULL),
(18, 12, 'ASICS Shoes', 'ASICS shoes', 'shoes-asics', 1, NULL, NULL, NULL),
(19, 12, 'Skechers Shoes', 'Skechers shoes', 'shoes-skechers', 1, NULL, NULL, NULL),
(20, 13, 'Toyota Corolla', 'Toyota Corolla', 'vehicles-toyotaCorolla', 1, NULL, NULL, NULL),
(21, 13, 'Suzuki Mehran', 'Suzuki Mehran', 'vehicle-suzukiMehran', 1, NULL, NULL, NULL),
(22, 14, 'Charcoal T-Shirt', 'Charcoal t shirts', 'T-shirts-Charcoal', 1, NULL, NULL, NULL),
(23, 14, 'Diners T-Shirt', 'diner t shirts', 'Tshirts-diner', 1, NULL, NULL, NULL),
(24, 15, 'A4TECH (82)', 'A4TECH is gaming', 'computer-A4TECH', 1, NULL, NULL, NULL),
(25, 0, 'ASUS', 'ASUS', 'computer-ASUS', 1, NULL, NULL, NULL),
(26, 14, 'Formal T-shirts', 'Formal T-shirts', 'T-shirts', 1, NULL, NULL, NULL),
(27, 12, 'Sports Shoes', 'Sports Shoes', 'sports-shoes', 1, NULL, NULL, NULL),
(28, 12, 'Jogging Shoes', 'Jogging Shoes', 'jogging-shoes', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_24_050154_create_category_table', 1),
(5, '2019_11_23_011630_create_products_table', 2),
(6, '2019_11_24_232537_create_product_attritube_table', 3);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_code`, `product_color`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 16, 'Nike Shirt', 'aa-002', 'gray', 'Nike T-Shirt', 2500.00, '1574810839nike_gray_shoes.jpg', '2019-11-24 17:03:10', '2019-11-26 18:27:19'),
(2, 16, 'Nike Joyride Shoes', 'aa-001', 'black', 'Nike Joyride Run Flyknit black', 2500.00, '1574810894nike_black_shoes.jpg', '2019-11-24 17:03:37', '2019-11-26 18:28:14'),
(3, 20, 'Toyoto colla xli', 'tt--001', 'white', 'Toyoto colla xli collor 2010', 14000.00, '1574633134xli.jpg', '2019-11-24 17:05:34', '2019-11-24 17:05:34'),
(4, 21, 'Suzui Mehan', 'SM-001', 'Gray', 'Suzuzki Mehan 2019 Brand new', 90000.00, '1574721748suzuki_merhan.jpg', '2019-11-25 17:42:28', '2019-11-25 17:42:28'),
(5, 27, 'Blue Sports Shoes', 'BSS001', 'Blue', 'Blue Sports Shoes', 2000.00, '1574776514blue_shoes.jpg', '2019-11-26 08:55:14', '2019-11-26 08:55:14'),
(6, 26, 'Alibaba Soft Jersey Me', 'FTS-001', 'Dark Green', 'Alibaba Soft Jersey Me', 2500.00, '1574809442form_t_shirt.jpg', '2019-11-26 18:04:02', '2019-11-26 18:04:02'),
(7, 17, 'adidas_yello_shoes', 'AS-001', 'Yellow', 'adidas_yello_shoes', 2500.00, '1574811011adidas_yello_shoes.jpg', '2019-11-26 18:30:11', '2019-11-26 18:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_attritube`
--

CREATE TABLE `product_attritube` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attritube`
--

INSERT INTO `product_attritube` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(5, 1, 'BTO-L1', 'Large', 3500.00, 5, '2019-11-25 12:09:55', '2019-11-25 12:09:55'),
(6, 1, 'BTO-S1', 'small', 2500.00, 5, '2019-11-25 14:57:07', '2019-11-25 14:57:07'),
(7, 1, 'BTO-m1', 'medium', 2500.00, 5, '2019-11-25 14:57:07', '2019-11-25 14:57:07'),
(8, 5, 'CodeBss001-38', '38', 2000.00, 10, '2019-11-26 08:56:20', '2019-11-26 08:56:20'),
(9, 5, 'CodeBss001-39', '40', 2000.00, 5, '2019-11-26 08:56:20', '2019-11-26 08:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Waqar Mughal', 'waqarmughal707@gmail.com', 1, NULL, '$2y$10$mrLlVTxnc16H2EEY7yHoAuhC3a7XTd1YF5RnzOgngcAmfbj/71nd.', NULL, '2019-11-22 17:06:39', '2019-11-22 17:19:43'),
(2, 'aamir Iqbal', 'waqarmughal7071@gmail.com', NULL, NULL, '$2y$10$ZMKwu2WGLIdtTqjF0W20xOnqq6HesjIyRkC8CdjgFWG8qq6KQ.ruC', NULL, '2019-11-22 17:12:32', '2019-11-22 17:12:32');

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attritube`
--
ALTER TABLE `product_attritube`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_attritube`
--
ALTER TABLE `product_attritube`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
