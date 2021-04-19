-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 12:03 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `self_creation`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Polo', '2021-04-19 03:00:46', '2021-04-19 03:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Formal', '2021-04-19 02:54:45', '2021-04-19 02:54:45'),
(3, 'Tshirt', '2021-04-19 03:44:20', '2021-04-19 03:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_04_07_040902_create_user_table', 1),
(2, '2021_04_07_041245_create_users_table', 2),
(3, '2021_04_07_045817_create_products_table', 3),
(4, '2021_04_07_051906_create_products_table', 4),
(5, '2021_04_18_052540_create_cart_table', 5),
(6, '2021_04_18_072925_create_order_table', 6),
(7, '2021_04_18_074253_create_order_master_table', 7),
(8, '2021_04_18_074852_create_order_table', 8),
(9, '2021_04_18_080111_create_order_master_table', 9),
(10, '2021_04_18_081019_create_order_table', 10),
(11, '2021_04_19_080026_create_category_table', 11),
(12, '2021_04_19_081810_create_category_table', 12),
(13, '2021_04_19_082903_create_brand_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `order_id`, `amount`, `quantity`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 1, 5994, 1998, 2, 999, '2021-04-18 02:41:19', '2021-04-18 02:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_masters`
--

CREATE TABLE `order_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_masters`
--

INSERT INTO `order_masters` (`id`, `user_id`, `status`, `payment_method`, `payment_status`, `address`, `amount`, `order_id`, `created_at`, `updated_at`) VALUES
(4, 2, 'pending', 'cod', 'pending', 'sachin', 2098, 5994, '2021-04-18 02:41:18', '2021-04-18 02:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `brand`, `description`, `gallery`, `created_at`, `updated_at`) VALUES
(1, 'Pure Cotton Polo Shirt', '999', '2', '2', 'This polo shirt has a simple, yet incredibly versatile design that will slip very happily into any area of your wardrobe, ready to save the day when you’re looking for quick and easy outfit options.', 'https://asset1.cxnmarksandspencer.com/is/image/mands/SD_03_T28_5000M_QE_X_EC_90?$PDP_INT_IMAGEGRID_2_LG$', NULL, NULL),
(2, 'Air Dry Merino Wool | Polo', '7315', '2', '2', 'Upgrade to the new Air Dry Polo and experience the difference of 100% Merino Wool. Made with a soft and airy knit fabric that’s as durable as it is comfortable.', 'https://cdn.shopify.com/s/files/1/0154/9055/products/Polo-navy_2048x.jpg?v=1602614751', NULL, NULL),
(3, 'Air Dry Merino Wool | Polo', '6995', '3', '2', 'Upgrade to the new Air Dry Polo and experience the difference of 100% Merino Wool. Made with a soft and airy knit fabric that’s as durable as it is comfortable.', 'https://cdn.shopify.com/s/files/1/0154/9055/products/polo-Black_2048x.jpg?v=1602614729', NULL, NULL),
(4, 'Polo Tshirt - Orange Grid', '3490', '3', '2', 'An easy, everyday polo in a soft green hue. Cut from 100% Supima cotton (the finest in the world) and designed for everyday comfort.', 'https://cdn.andamen.com/media/catalog/product/0/1/01_9_57.jpg', NULL, NULL),
(5, 'Pure Cotton Polo Shirt', '999', '3', '2', 'This polo shirt has a simple, yet incredibly versatile design that will slip very happily into any area of your wardrobe, ready to save the day when you’re looking for quick and easy outfit options.', 'https://asset1.cxnmarksandspencer.com/is/image/mands/SD_03_T28_5000M_QE_X_EC_90?$PDP_INT_IMAGEGRID_2_LG$', NULL, NULL),
(6, 'Air Dry Merino Wool | Polo', '7315', '2', '2', 'Upgrade to the new Air Dry Polo and experience the difference of 100% Merino Wool. Made with a soft and airy knit fabric that’s as durable as it is comfortable.', 'https://cdn.shopify.com/s/files/1/0154/9055/products/Polo-navy_2048x.jpg?v=1602614751', NULL, NULL),
(7, 'Air Dry Merino Wool | Polo', '6995', '2', '2', 'Upgrade to the new Air Dry Polo and experience the difference of 100% Merino Wool. Made with a soft and airy knit fabric that’s as durable as it is comfortable.', 'https://cdn.shopify.com/s/files/1/0154/9055/products/polo-Black_2048x.jpg?v=1602614729', NULL, NULL),
(9, 'ABC', '1000', '2', '2', 'ASDFGHJKL:', 'https://cdn.shopify.com/s/files/1/0154/9055/products/polo-Black_2048x.jpg?v=1602614729', '2021-04-19 03:45:00', '2021-04-19 03:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Peter Parker', 'peterparker@gmail.com', '$2y$10$e5wIBNKnMCe49A2jVM6Gs.R0QAqkdgPEldovJ0zMVQsTnGjtlgR6K', 'user', NULL, '2021-04-18 06:25:54'),
(2, 'Jenish Bhatt', 'jenish@gmail.com', '$2y$10$RnByZ9IEmfifIwvUCy478eoHMV.VKeIfeS5BmFm6g8cB1O590x4W6', 'admin', '2021-04-06 23:19:43', '2021-04-19 03:01:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_masters`
--
ALTER TABLE `order_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_masters`
--
ALTER TABLE `order_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
