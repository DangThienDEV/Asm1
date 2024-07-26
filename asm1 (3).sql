-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2024 at 01:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asm1`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2024-07-19 09:15:10', '2024-07-19 09:15:10'),
(2, 1, '2024-07-19 10:42:35', '2024-07-19 10:42:35'),
(3, 4, '2024-07-19 18:24:51', '2024-07-19 18:24:51'),
(4, 7, '2024-07-19 18:52:13', '2024-07-19 18:52:13'),
(5, 2, '2024-07-24 18:42:37', '2024-07-24 18:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 1, '2024-07-24 18:43:26', '2024-07-24 18:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lenovo', 1, '2024-07-18 11:46:09', '2024-07-18 11:46:09'),
(2, 'MacBook', 1, '2024-07-18 11:46:09', '2024-07-18 11:46:09'),
(3, 'Dell', 1, '2024-07-18 11:46:09', '2024-07-18 11:46:09'),
(4, 'ASUS', 1, '2024-07-18 11:46:09', '2024-07-18 11:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sản Phẩm Tốt', 4, 2, 0, '2024-07-25 17:44:13', '2024-07-25 17:44:13'),
(2, 'tốt', 4, 2, 0, '2024-07-25 17:52:50', '2024-07-25 17:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_18_010448_create_categories_table', 1),
(6, '2024_07_18_010725_create_products_table', 1),
(7, '2024_07_18_010733_create_comments_table', 1),
(8, '2024_07_19_160130_create_carts_table', 2),
(9, '2024_07_19_160136_create_cart_items_table', 2),
(10, '2024_07_19_160401_create_orders_table', 3),
(11, '2024_07_19_160408_create_order_items_table', 3),
(12, '2024_07_19_160413_create_payments_table', 3),
(13, '2024_07_19_173330_add_details_to_orders_table', 4),
(14, '2024_07_20_005959_add_role_to_users_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `total_price` decimal(10,0) DEFAULT NULL,
  `shipping_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total_price`, `shipping_address`, `phone_number`, `payment_method`, `created_at`, `updated_at`) VALUES
(4, 1, 'pending', NULL, '23 An Trai, Vân Canh, Hoài Đức, Hà Nội', NULL, NULL, '2024-07-19 10:42:44', '2024-07-19 10:42:44'),
(5, 1, 'pending', '2300', '23 An Trai, Vân Canh, Hoài Đức, Hà Nội', NULL, NULL, '2024-07-19 10:46:19', '2024-07-19 10:46:19'),
(6, 1, 'pending', '1900', '23 An Trai, Vân Canh, Hoài Đức, Hà Nội', NULL, NULL, '2024-07-19 10:48:03', '2024-07-19 10:48:03'),
(7, 1, 'pending', '2300', '23 An Trai, Vân Canh, Hoài Đức, Hà Nội', NULL, NULL, '2024-07-19 10:48:48', '2024-07-19 10:48:48'),
(8, 1, 'pending', '2300', '23 An Trai, Vân Canh, Hoài Đức, Hà Nội', NULL, NULL, '2024-07-19 10:53:04', '2024-07-19 10:53:04'),
(9, 1, 'pending', '0', '23 An Trai, Vân Canh, Hoài Đức, Hà Nội', NULL, NULL, '2024-07-19 10:54:00', '2024-07-19 10:54:00'),
(10, 1, 'pending', '1900', '23 An Trai, Vân Canh, Hoài Đức, Hà Nội', NULL, NULL, '2024-07-19 10:55:40', '2024-07-19 10:55:40'),
(11, 1, 'pending', '1900', '23 An Trai, Vân Canh, Hoài Đức, Hà Nội', '0936520709', 'credit_card', '2024-07-19 10:57:58', '2024-07-19 10:57:58'),
(12, 1, 'pending', '3800', 'Liên Mạc Thanh Hà Hải Dương', '0936521719', 'paypal', '2024-07-19 16:57:49', '2024-07-19 16:57:49'),
(13, 1, 'pending', '40000000', 'Liên Mạc Thanh Hà Hải Dương', '0936521719', 'credit_card', '2024-07-19 17:41:40', '2024-07-19 17:41:40'),
(14, 1, 'pending', '100000000', '23 An Trai', '0936520709', 'credit_card', '2024-07-19 17:52:26', '2024-07-19 17:52:26'),
(15, 2, 'pending', '172300000', 'Liên Mạc Thanh Hà Hải Dương', '0936521719', 'credit_card', '2024-07-24 18:43:03', '2024-07-24 18:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 4, 2, 2, '2299.99', '2024-07-19 10:42:44', '2024-07-19 10:42:44'),
(3, 5, 2, 1, '2299.99', '2024-07-19 10:46:19', '2024-07-19 10:46:19'),
(4, 6, 1, 1, '1899.99', '2024-07-19 10:48:03', '2024-07-19 10:48:03'),
(5, 7, 2, 1, '2299.99', '2024-07-19 10:48:48', '2024-07-19 10:48:48'),
(6, 8, 2, 1, '2299.99', '2024-07-19 10:53:04', '2024-07-19 10:53:04'),
(7, 10, 1, 1, '1899.99', '2024-07-19 10:55:40', '2024-07-19 10:55:40'),
(8, 11, 1, 1, '1899.99', '2024-07-19 10:57:59', '2024-07-19 10:57:59'),
(9, 12, 1, 2, '1899.99', '2024-07-19 16:57:49', '2024-07-19 16:57:49'),
(10, 13, 1, 2, '20000000.00', '2024-07-19 17:41:40', '2024-07-19 17:41:40'),
(11, 14, 1, 5, '20000000.00', '2024-07-19 17:52:26', '2024-07-19 17:52:26'),
(12, 15, 2, 2, '22900000.00', '2024-07-24 18:43:03', '2024-07-24 18:43:03'),
(13, 15, 2, 1, '22900000.00', '2024-07-24 18:43:03', '2024-07-24 18:43:03'),
(14, 15, 2, 2, '22900000.00', '2024-07-24 18:43:03', '2024-07-24 18:43:03'),
(15, 15, 1, 1, '20000000.00', '2024-07-24 18:43:03', '2024-07-24 18:43:03'),
(16, 15, 3, 1, '18900000.00', '2024-07-24 18:43:03', '2024-07-24 18:43:03'),
(17, 15, 3, 1, '18900000.00', '2024-07-24 18:43:03', '2024-07-24 18:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `luot_xem` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `content`, `status`, `category_id`, `created_at`, `updated_at`, `luot_xem`) VALUES
(1, 'Lenovo ThinkPad X1 Carbon', 'upload/sanpham/lenovo.jpg\r\n', 20000000.00, 'Mô tả sản phẩm Lenovo ThinkPad X1 Carbon.', 1, 1, '2024-07-18 11:46:17', '2024-07-18 11:46:17', 1000),
(2, 'MacBook Pro 13-inch', 'upload/sanpham/macbook.jpg', 22900000.00, 'Mô tả sản phẩm MacBook Pro 13-inch.', 1, 2, '2024-07-18 11:46:17', '2024-07-18 11:46:17', 2000),
(3, 'Dell XPS 15', 'upload/sanpham/dell.jpg', 18900000.00, 'Mô tả sản phẩm Dell XPS 15.', 1, 3, '2024-07-18 11:46:17', '2024-07-18 11:46:17', 1500),
(4, 'ASUS ZenBook 14', 'upload/sanpham/asus.jpg', 21000000.00, 'Mô tả sản phẩm ASUS ZenBook 14.', 1, 4, '2024-07-18 11:46:17', '2024-07-18 11:46:17', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Dang Thien', 'thiendvph42781@fpt.edu.vn', NULL, '$2y$12$QuOhJKmFIPybmnh1aBI5I.6/Ex9pf2bN2hYiXM8AkWQRBMXlk5Hn6', NULL, '2024-07-18 11:01:23', '2024-07-18 11:01:23', NULL),
(2, 'admin', 'thien@gmail.com', NULL, '$2y$12$4TmnwbN2OG3YguSEZudukOTyCISMTQLYipJ.d.S1K4oOAU9JEHTnW', NULL, '2024-07-18 11:08:36', '2024-07-18 11:08:36', '1'),
(3, 'Peter', 'dangt@gmail.com', NULL, '$2y$12$SbbOFsEyUtXqscxadTPhuOIuoX2AoLHJWsIzNkb.KwQ/jclrItWYG', NULL, '2024-07-19 08:41:58', '2024-07-19 08:41:58', NULL),
(4, 'Đặng Thị Lan Anh', 'john.doe@example.com', NULL, '$2y$12$Eg/bmG6/3E7M2Rv/YC0C7u9wOYpQ8Eblm75VkYoiWUFzMEXNOuOCK', NULL, '2024-07-19 18:22:54', '2024-07-19 18:22:54', NULL),
(5, 'Trịnh Công Cương', 'biintrinh@gmail.com', NULL, '$2y$12$pEY4xJS6wMGwsc0swK5fpODYrd4bNnapomtn/t9oH82eNULZmsD7m', NULL, '2024-07-19 18:31:11', '2024-07-19 18:31:11', NULL),
(6, 'thien ne', 'lananh05112006@gmail.com', NULL, '$2y$12$a4YU1zASYZgCObghZD8qEuDu2J5DG7gmHKO7OWpaJJ7oBVOgk/SHa', NULL, '2024-07-19 18:47:03', '2024-07-19 18:47:03', NULL),
(7, 'Vũ Ngọc Minh', 'minhsuy@gmail.com', NULL, '$2y$12$BExzUgsqVOtcBKPGWfiAd.CqbGGKfD60LYqMcArE44c9upM3mzJ7S', NULL, '2024-07-19 18:51:53', '2024-07-19 18:51:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

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
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
