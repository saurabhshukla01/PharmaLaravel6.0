-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2020 at 06:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `mobile`, `email`, `email_verified_at`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'saurabh shukla', 'admin', '7290944755', 'admin@gmail.com', NULL, '$2y$10$s0zvpqOzftzFYo20kMKCj.JLNOrLZXIAdggwjKZgqE1L0LynvmIby', '301577.jpg', 1, NULL, NULL, '2020-07-20 23:46:03'),
(2, 'saurabh kumar shukla', 'subadmin', '7290944755', 'saurabh@gmail.com', NULL, '$2y$10$8z6zKNzRISpsCtt3UBMofu71qmEGLdYUM2shP/.adUWSDx.cWE9Nu', '992807.jpg', 1, NULL, NULL, '2020-07-20 23:47:05'),
(3, 'Abhi Kumar Shukla', 'subadmin', '9876543210', 'abhi@gmail.com', NULL, '$2y$10$8z6zKNzRISpsCtt3UBMofu71qmEGLdYUM2shP/.adUWSDx.cWE9Nu', '701105.jpg', 1, NULL, NULL, '2020-07-20 23:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lavis', 1, '2020-07-30 09:58:55', '2020-07-30 10:32:15'),
(2, 'Panta Loon', 1, '2020-07-30 09:59:04', '2020-07-30 10:30:39'),
(3, 'Lee Cooper', 1, '2020-07-30 09:59:12', '2020-07-30 10:30:37'),
(4, 'Redcheef', 1, '2020-07-30 09:59:23', '2020-07-30 10:30:36'),
(5, 'Allen Solly', 1, '2020-07-30 10:00:49', '2020-07-30 10:30:35'),
(6, 'Pepe Jeans', 1, '2020-07-30 10:01:46', '2020-07-30 10:30:34'),
(7, 'Numero Uno', 1, '2020-07-30 10:02:01', '2020-07-30 10:30:33'),
(8, 'Mufti', 1, '2020-07-30 10:02:12', '2020-07-30 10:30:32'),
(9, 'Wrangler', 1, '2020-07-30 10:02:25', '2020-07-30 10:30:26'),
(10, 'Flying Machine', 1, '2020-07-30 10:02:41', '2020-07-30 10:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_discount` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `category_name`, `category_image`, `category_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Denims', '556611.jpg', 1.00, '', 'denims', '', '', '', 1, '2020-07-27 07:50:06', '2020-07-27 07:50:06'),
(2, 0, 2, 'Tops', '146497.jpg', 5.00, '', 'tops', '', '', '', 1, '2020-07-27 07:50:43', '2020-07-27 07:50:43'),
(3, 2, 2, 'black-tops', '56126.jpg', 10.00, '', 'black-top', '', '', '', 1, '2020-07-27 07:51:17', '2020-07-27 07:51:17'),
(4, 0, 1, 'Jeans', '462319.webp', 10.00, '', 'jeans', '', '', '', 1, '2020-07-27 07:52:49', '2020-07-27 07:52:49'),
(5, 0, 2, 'Denims', '418530.png', 10.00, 'This is Good For you', 'denims-women', '', '', 'Jeans, tops, Paints', 1, '2020-07-28 05:49:59', '2020-07-28 05:49:59');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2020_07_18_042714_create_admins_table', 3),
(5, '2020_07_21_064818_create_sections_table', 4),
(6, '2020_07_21_115820_create_categories_table', 5),
(7, '2020_07_26_053105_create_products_table', 6),
(8, '2020_07_29_072545_create_products_attributes_table', 7),
(9, '2020_07_30_073959_create_products_images_table', 8),
(10, '2020_07_30_114255_create_brands_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_discount` double(8,2) NOT NULL,
  `product_weight` double(8,2) NOT NULL,
  `product_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `wash_care` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fabric` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pattern` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sleeve` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occassion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `section_id`, `product_name`, `product_code`, `product_color`, `product_price`, `product_discount`, `product_weight`, `product_video`, `main_image`, `description`, `wash_care`, `fabric`, `pattern`, `sleeve`, `fit`, `occassion`, `meta_title`, `meta_description`, `meta_keywords`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Blue T shirt', 'BT001', 'Blue', 2500.50, 10.00, 0.00, '', 'shopping.png-9804463.png', '', '', '', '', '', '', '', '', '', '', 'Yes', 1, '2020-07-27 02:25:39', '2020-07-28 20:47:36'),
(2, 2, 2, 'Green Top', 'TT001', 'Green', 2800.00, 10.00, 300.00, '', 'Restaurant-Blog-Events.png-5177805.png', '', '', '', '', '', '', '', '', '', '', 'Yes', 1, '2020-07-27 02:27:14', '2020-07-28 21:08:36'),
(3, 1, 1, 'Skinny Jeans', 'SJ001', 'Blue', 2780.00, 12.00, 550.00, '', 'shopping1.png-9344223.png', '', '', 'Polyester', 'Printed', 'Half Sleeve', 'Regular', 'Casual', '', '', '', 'No', 1, '2020-07-27 02:29:15', '2020-07-28 20:47:58'),
(4, 3, 2, 'Black Tops small', 'BKT006', 'Black', 2800.00, 10.00, 150.00, '', '5612611.jpg-6793612.jpg', '', '', 'Polyester', 'Printed', 'Short Sleeve', 'Regular', 'Casual', '', '', 'black tops', 'Yes', 1, '2020-07-27 21:43:56', '2020-07-28 20:48:14'),
(5, 1, 1, 'Blue T-half', 'BT0111', 'Blue', 1880.50, 12.00, 300.00, '', '', 'This is good and fexiable', 'cotton is well as good for you', 'Polyester', 'Printed', 'Short Sleeve', 'Regular', 'Casual', 'good and fixable', 'Its is good for all', 'It is fine-for you', 'Yes', 1, '2020-07-27 21:50:57', '2020-07-30 01:33:42'),
(6, 5, 2, 'Gender-lager Jeans', 'GL098', 'blue', 1780.00, 10.00, 700.00, '', 'shopping11.png-7330700.png', 'Jeans is having good', 'Please Wash Care it self', 'Polyester', 'Plain', 'Half Sleeve', 'Regular', 'Casual', '', '', 'Havings goods', 'Yes', 1, '2020-07-28 00:22:23', '2020-07-30 01:26:17'),
(7, 5, 2, 'Tour-jeans', 'BT002', 'Blue', 2300.00, 10.00, 500.00, '', 'shopping12.png-9035303.png', '', '', 'Polyester', 'Self', 'Half Sleeve', 'Regular', 'Casual', 'This is good air pass jeans', '', '', 'No', 1, '2020-07-28 00:24:01', '2020-07-30 01:23:26'),
(9, 1, 1, 'White Jack', 'WkT007', 'White', 1880.50, 10.00, 150.00, '', 'master-safe.png-1339394.png', '', '', '', '', '', '', '', '', '', '', 'No', 1, '2020-07-28 00:54:07', '2020-07-28 20:50:48'),
(10, 5, 2, 'Black Jeans', 'BT009', 'White', 1880.50, 10.00, 550.00, '', 'jeans3.jpg-5311461.jpg', '', '', '', '', '', '', '', '', '', '', 'Yes', 1, '2020-07-28 01:08:40', '2020-07-30 07:41:07'),
(11, 5, 2, 'Lee Cooper', 'LT008', 'Blue', 1780.00, 10.00, 500.00, '', 'shopping14.png-3033814.png', '', 'Storeless', 'Cotton', 'Printed', 'Half Sleeve', 'Regular', 'Casual', 'Meta title brand', 'Meta enter', 'jeans and tops', 'Yes', 1, '2020-07-28 02:01:05', '2020-07-28 02:01:05'),
(12, 1, 1, 'Black T shirts', 'BT007', 'Black', 799.00, 10.00, 150.00, '', 'images3.jpg-4435906.jpg', '', '', 'Cotton', 'Plain', 'Full Sleeve', 'Regular', 'Casual', '', '', '', 'Yes', 1, '2020-07-30 03:10:54', '2020-07-30 05:31:02'),
(13, 1, 1, 'Plain Suitable Black T-shirt', 'BT0011', 'Black', 1880.50, 10.00, 300.00, '', 'blackt2.jpg-7854223.jpg', 'Polo Sleeves: Short Sleeve Fit: Regular Fabric: Cotton Pack of: 1 Neck Type: Polo Neck Ideal For: Men\'s Pattern: Plain Suitable For: ...', 'Easy wash to hand', 'Polyester', 'Printed', 'Half Sleeve', 'Slim', 'Casual', 'Polo Sleeves: Short Sleeve Fit: Regular Fabric: Cotton Pack of: 1 Neck Type: Polo Neck Ideal For: Men\'s Pattern: Plain Suitable For: ...', 'Polo Sleeves: Short Sleeve Fit: Regular Fabric: Cotton Pack of: 1 Neck Type: Polo Neck Ideal For: Men\'s Pattern: Plain Suitable For: ...', 'Polo Sleeves: Short Sleeve Fit: Regular Fabric: Cotton Pack of: 1 Neck Type: Polo Neck Ideal For: Men\'s Pattern: Plain Suitable For: ...', 'Yes', 1, '2020-07-30 03:17:31', '2020-07-30 03:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `size`, `price`, `stock`, `sku`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Small', 1200.00, 10, 'BT001 -S', 1, '2020-07-29 11:29:15', '2020-07-29 11:29:15'),
(2, 1, 'Medium', 1400.00, 25, 'BT001-M', 1, '2020-07-29 11:29:15', '2020-07-29 11:29:15'),
(3, 1, 'Large', 1600.00, 20, 'BT001-L', 1, '2020-07-29 11:29:15', '2020-07-29 11:29:15'),
(4, 1, 'Extra Large', 1800.00, 30, 'BT001 -XL', 1, '2020-07-29 11:29:53', '2020-07-29 11:29:53'),
(5, 3, 'Small', 1200.00, 5, 'SJ001-S', 1, '2020-07-29 22:43:26', '2020-07-30 01:56:50'),
(6, 3, 'Medium', 1400.00, 10, 'SJ001-M', 1, '2020-07-29 22:43:26', '2020-07-30 01:56:51'),
(7, 3, 'Large', 1600.00, 20, 'SJ001-L', 1, '2020-07-29 22:43:26', '2020-07-30 01:56:53'),
(9, 3, 'Xtra Large', 1800.00, 20, 'SJ001-XL', 1, '2020-07-30 02:06:14', '2020-07-30 02:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, '7289701596106637.jpg', 1, '2020-07-30 05:27:17', '2020-07-30 05:27:17'),
(2, 13, '6408781596106637.jpg', 1, '2020-07-30 05:27:17', '2020-07-30 05:27:17'),
(3, 12, '9317711596106882.jpg', 1, '2020-07-30 05:31:22', '2020-07-30 05:31:22'),
(4, 12, '8949601596106882.jpg', 1, '2020-07-30 05:31:22', '2020-07-30 05:31:22'),
(5, 12, '7763021596106882.jpg', 1, '2020-07-30 05:31:22', '2020-07-30 05:31:22'),
(6, 12, '397741596106882.jpg', 1, '2020-07-30 05:31:22', '2020-07-30 05:31:22'),
(7, 11, '2238201596106987.jpg', 1, '2020-07-30 05:33:07', '2020-07-30 05:33:07'),
(8, 11, '7262171596106987.jpg', 1, '2020-07-30 05:33:07', '2020-07-30 05:33:07'),
(9, 11, '438841596106987.jpg', 1, '2020-07-30 05:33:07', '2020-07-30 05:33:07'),
(10, 7, '8362191596107010.jpg', 1, '2020-07-30 05:33:30', '2020-07-30 05:33:30'),
(11, 7, '3365801596107010.jpg', 1, '2020-07-30 05:33:30', '2020-07-30 05:33:30'),
(12, 3, '47781596107051.jpg', 1, '2020-07-30 05:34:11', '2020-07-30 05:34:11'),
(13, 3, '1629151596107051.jpg', 1, '2020-07-30 05:34:11', '2020-07-30 05:34:11'),
(14, 6, '2164991596107103.jpg', 1, '2020-07-30 05:35:03', '2020-07-30 05:35:03'),
(15, 6, '6298611596107103.jpg', 1, '2020-07-30 05:35:03', '2020-07-30 05:35:03'),
(16, 6, '494371596107103.jpg', 1, '2020-07-30 05:35:03', '2020-07-30 05:35:03'),
(17, 6, '3896801596107103.jpg', 1, '2020-07-30 05:35:03', '2020-07-30 05:35:03'),
(18, 6, '9446601596107103.jpg', 1, '2020-07-30 05:35:03', '2020-07-30 05:35:03'),
(19, 10, '1189091596114691.jpg', 1, '2020-07-30 07:41:31', '2020-07-30 07:41:31'),
(20, 10, '2614271596114691.jpg', 1, '2020-07-30 07:41:32', '2020-07-30 07:41:32'),
(21, 10, '1634941596114692.jpg', 1, '2020-07-30 07:41:32', '2020-07-30 07:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men', 1, NULL, NULL),
(2, 'Women', 1, NULL, NULL),
(3, 'Kids', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'saurabh', 'saurabh@gmail.com', NULL, '$2y$10$AyexfImDPO72NcdWRPt.nOXLO6waWwfGd8IdO/l/gSbwpkkoM/OOq', NULL, '2020-07-17 06:11:37', '2020-07-17 06:11:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
