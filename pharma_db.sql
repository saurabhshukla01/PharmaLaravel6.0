-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 04:28 PM
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
(1, 'Lavis', 1, '2020-07-30 04:28:55', '2020-07-30 18:56:22'),
(2, 'Panta Loon', 1, '2020-07-30 04:29:04', '2020-07-30 18:56:23'),
(3, 'Lee Cooper', 1, '2020-07-30 04:29:12', '2020-07-30 18:56:24'),
(4, 'Redcheef', 1, '2020-07-30 04:29:23', '2020-07-30 18:56:24'),
(5, 'Allen Solly', 1, '2020-07-30 04:30:49', '2020-07-30 18:56:27'),
(6, 'Pepe Jeans', 1, '2020-07-30 04:31:46', '2020-07-30 18:57:00'),
(7, 'Numero Uno', 1, '2020-07-30 04:32:01', '2020-07-30 18:57:01'),
(8, 'Mufti', 1, '2020-07-30 04:32:12', '2020-07-30 18:57:02'),
(9, 'Wrangler', 1, '2020-07-30 04:32:25', '2020-07-30 18:57:02'),
(10, 'Flying Machine ZET', 1, '2020-07-30 04:32:41', '2020-08-02 16:54:08'),
(11, 'Peter England', 1, '2020-08-02 17:10:27', '2020-08-02 17:10:27');

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
(1, 0, 2, 'T-shirts', '274502.jpg', 10.00, 'One e-commerce study found that 20% of purchase failures are potentially a result of missing or ... Take this example of a basic, white t-shirt', 't-shirts', 'One e-commerce study found that 20% of purchase failures are potentially a result of missing or ... Take this example of a basic, white t-shirt', 'One e-commerce study found that 20% of purchase failures are potentially a result of missing or ... Take this example of a basic, white t-shirt', 'One e-commerce study found that 20% of purchase failures are potentially a result of missing or ... Take this example of a basic, white t-shirt', 1, '2020-08-02 22:06:37', '2020-08-02 22:19:45'),
(2, 0, 1, 'T-shirts', '229312.jpg', 10.00, 'One e-commerce study found that 20% of purchase failures are potentially a result of missing or ... Take this example of a basic, white t-shirt', 't-shirts', 'One e-commerce study found that 20% of purchase failures are potentially a result of missing or ... Take this example of a basic, white t-shirt', 'One e-commerce study found that 20% of purchase failures are potentially a result of missing or ... Take this example of a basic, white t-shirt', 'One e-commerce study found that 20% of purchase failures are potentially a result of missing or ... Take this example of a basic, white t-shirt', 1, '2020-08-02 22:29:32', '2020-08-02 22:29:32'),
(3, 0, 3, 'T-shirts', '856023.png', 10.00, 'One e-commerce study found that 20% of purchase failures are potentially a result of missing or ... Take this example of a basic, white t-shirt', 't-shirts', 'One e-commerce study found that 20% of purchase failures are potentially a result of missing or ... Take this example of a basic, white t-shirt', 'One e-commerce study found that 20% of purchase failures are potentially a result of missing or ... Take this example of a basic, white t-shirt', 'One e-commerce study found that 20% of purchase failures are potentially a result of missing or ... Take this example of a basic, white t-shirt', 1, '2020-08-02 22:30:26', '2020-08-02 22:30:26'),
(4, 0, 1, 'Denims', '720196.jpg', 15.00, 'E-commerce SEO: guide on when to create and optimise new categories pages ... Category pages, 5.0%, example.co.uk/mens-jeans', 'denims', 'E-commerce SEO: guide on when to create and optimise new categories pages ... Category pages, 5.0%, example.co.uk/mens-jeans', 'E-commerce SEO: guide on when to create and optimise new categories pages ... Category pages, 5.0%, example.co.uk/mens-jeans', 'E-commerce SEO: guide on when to create and optimise new categories pages ... Category pages, 5.0%, example.co.uk/mens-jeans', 1, '2020-08-02 22:31:48', '2020-08-02 22:31:48'),
(5, 0, 2, 'Denims', '852254.jpg', 10.00, 'E-commerce SEO: guide on when to create and optimise new categories pages ... Category pages, 5.0%, example.co.uk/mens-jeans', 'denims', 'E-commerce SEO: guide on when to create and optimise new categories pages ... Category pages, 5.0%, example.co.uk/mens-jeans', 'E-commerce SEO: guide on when to create and optimise new categories pages ... Category pages, 5.0%, example.co.uk/mens-jeans', 'E-commerce SEO: guide on when to create and optimise new categories pages ... Category pages, 5.0%, example.co.uk/mens-jeans', 1, '2020-08-02 22:32:35', '2020-08-02 22:32:35'),
(6, 0, 3, 'Denims', '410079.jpg', 15.00, 'E-commerce SEO: guide on when to create and optimise new categories pages ... Category pages, 5.0%, example.co.uk/mens-jeans', 'denims', 'E-commerce SEO: guide on when to create and optimise new categories pages ... Category pages, 5.0%, example.co.uk/mens-jeans', 'E-commerce SEO: guide on when to create and optimise new categories pages ... Category pages, 5.0%, example.co.uk/mens-jeans', 'E-commerce SEO: guide on when to create and optimise new categories pages ... Category pages, 5.0%, example.co.uk/mens-jeans', 1, '2020-08-02 22:33:19', '2020-08-02 22:33:19'),
(7, 2, 1, 'Casual-T-shirts', '647799.jpg', 10.00, 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'causal-t-shirts', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 1, '2020-08-03 00:21:37', '2020-08-03 00:29:24'),
(8, 2, 1, 'Causal Top Shirts', '68778.jpg', 10.00, 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'Casual-top-shirts', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 1, '2020-08-03 03:43:50', '2020-08-03 03:46:26'),
(9, 5, 2, 'Casual Tops', '167541.png', 10.00, 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'Casual-tops', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 1, '2020-08-03 03:49:50', '2020-08-03 03:49:50'),
(10, 5, 2, 'Branded Tops', '403575.jpg', 10.00, 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'branded-tops', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 1, '2020-08-03 03:55:27', '2020-08-03 03:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'saurabh shukla', 'sona.vipin@gmail.com', 'testing', 'Gulshan Ikebana ,\r\nPlot No. GH 03/A,\r\nSector 143, Noida,\r\nUttar Pradesh 201306\r\ninfo@gulshanikebana.in', '2020-08-05 04:28:57', '2020-08-05 04:28:57');

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
(1, '2020_07_18_042714_create_admins_table', 1),
(2, '2020_07_21_064818_create_sections_table', 2),
(3, '2020_07_21_115820_create_categories_table', 3),
(4, '2020_07_26_053105_create_products_table', 4),
(5, '2020_07_29_072545_create_products_attributes_table', 5),
(6, '2020_07_30_073959_create_products_images_table', 6),
(7, '2020_07_30_114255_create_brands_table', 7),
(8, '2020_07_31_053213_add_column_to_products', 8),
(9, '2014_10_12_000000_create_users_table', 9),
(10, '2020_08_05_042601_create_userregistrations_table', 10),
(11, '2020_08_05_050550_create_users_table', 11),
(12, '2020_08_05_093817_create_contacts_table', 12),
(13, '2020_08_05_112051_create_tempcarts_table', 13);

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
  `brand_id` int(11) NOT NULL,
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

INSERT INTO `products` (`id`, `category_id`, `section_id`, `brand_id`, `product_name`, `product_code`, `product_color`, `product_price`, `product_discount`, `product_weight`, `product_video`, `main_image`, `description`, `wash_care`, `fabric`, `pattern`, `sleeve`, `fit`, `occassion`, `meta_title`, `meta_description`, `meta_keywords`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 7, 'Ginger solid fit Jeans', 'GSFJ01', 'Black', 1099.00, 10.00, 450.00, '', 'ginger-solid.png-9239701.png', 'The success of denim e-commerce growth hinges heavily on the convenience ... getting so much more detailed with the descriptions now that you can almost ... As a top three product category in total apparel, denim', 'The success of denim e-commerce growth hinges heavily on the convenience ... getting so much more detailed with the descriptions now that you can almost ... As a top three product category in total apparel, denim', 'Cotton', 'Plain', 'Full Sleeve', 'Slim', 'Casual', 'The success of denim e-commerce growth hinges heavily on the convenience ... getting so much more detailed with the descriptions now that you can almost ... As a top three product category in total apparel, denim', 'The success of denim e-commerce growth hinges heavily on the convenience ... getting so much more detailed with the descriptions now that you can almost ... As a top three product category in total apparel, denim', 'apparel , denims', 'Yes', 1, '2020-08-02 22:37:46', '2020-08-04 08:55:25'),
(2, 4, 1, 11, 'Peter England Dark Jeans', 'PEDJ09', 'Black', 1270.00, 10.00, 500.00, '', 'peter-england.png-3551513.png', 'The success of denim e-commerce growth hinges heavily on the convenience ... getting so much more detailed with the descriptions now that you can almost ... As a top three product category in total apparel, denim', 'The success of denim e-commerce growth hinges heavily on the convenience ... getting so much more detailed with the descriptions now that you can almost ... As a top three product category in total apparel, denim', 'Cotton', 'Plain', 'Full Sleeve', 'Regular', 'Formal', 'The success of denim e-commerce growth hinges heavily on the convenience ... getting so much more detailed with the descriptions now that you can almost ... As a top three product category in total apparel, denim', 'The success of denim e-commerce growth hinges heavily on the convenience ... getting so much more detailed with the descriptions now that you can almost ... As a top three product category in total apparel, denim', 'The success of denim e-commerce growth hinges heavily on the convenience ... getting so much more detailed with the descriptions now that you can almost ... As a top three product category in total apparel, denim', 'Yes', 1, '2020-08-02 22:51:27', '2020-08-02 22:51:27'),
(3, 2, 1, 7, 'Pure Cotton Neck t-shirt', 'PCNS08', 'Red', 799.00, 12.00, 120.00, '', 'pure-cotton-neck-tshirt.png-9414435.png', 'Ecommerce managers and online store owners all know the importance of product descriptions. but they are still often overlooked and not optimized to their full', 'Ecommerce managers and online store owners all know the importance of product descriptions. but they are still often overlooked and not optimized to their full', 'Cotton', 'Printed', 'Half Sleeve', 'Slim', 'Casual', 'Ecommerce managers and online store owners all know the importance of product descriptions. but they are still often overlooked and not optimized to their full', 'Ecommerce managers and online store owners all know the importance of product descriptions. but they are still often overlooked and not optimized to their full', 'Ecommerce managers and online store owners all know the importance of product descriptions. but they are still often overlooked and not optimized to their full', 'No', 1, '2020-08-02 22:58:07', '2020-08-02 22:58:07'),
(4, 2, 1, 8, 'Rare Rabbit Green T shirt', 'RRGP778', 'Green', 1780.00, 5.00, 130.00, '', 'Rare-green-tshirt.png-5709135.png', 'Ecommerce managers and online store owners all know the importance of product descriptions. but they are still often overlooked and not optimized to their full', 'Ecommerce managers and online store owners all know the importance of product descriptions. but they are still often overlooked and not optimized to their full', 'Cotton', 'Printed', 'Half Sleeve', 'Slim', 'Casual', 'Ecommerce managers and online store owners all know the importance of product descriptions. but they are still often overlooked and not optimized to their full', 'Ecommerce managers and online store owners all know the importance of product descriptions. but they are still often overlooked and not optimized to their full', 'Ecommerce managers and online store owners all know the importance of product descriptions. but they are still often overlooked and not optimized to their full', 'Yes', 1, '2020-08-02 23:01:12', '2020-08-03 00:10:06'),
(5, 5, 2, 10, 'Causal Long Top', 'CLT002', 'White black', 1200.00, 10.00, 130.00, '', 'casual-long-top.png-4086517.png', 'E-commerce SEO: guide on when to create and optimise new categories pages ... Sitting close to the top of the hierarchy, category pages also benefit from ... Some say that descriptions on category pages are purely done for', 'E-commerce SEO: guide on when to create and optimise new categories pages ... Sitting close to the top of the hierarchy, category pages also benefit from ... Some say that descriptions on category pages are purely done for', 'Polyester', 'Checked', 'Full Sleeve', 'Slim', 'Casual', 'E-commerce SEO: guide on when to create and optimise new categories pages ... Sitting close to the top of the hierarchy, category pages also benefit from ... Some say that descriptions on category pages are purely done for', 'E-commerce SEO: guide on when to create and optimise new categories pages ... Sitting close to the top of the hierarchy, category pages also benefit from ... Some say that descriptions on category pages are purely done for', 'E-commerce SEO: guide on when to create and optimise new categories pages ... Sitting close to the top of the hierarchy, category pages also benefit from ... Some say that descriptions on category pages are purely done for', 'Yes', 1, '2020-08-02 23:10:52', '2020-08-02 23:10:52'),
(6, 1, 2, 9, 'Pack Cotton Unicorn T shirts', 'PCUT221', 'white  pink  blue', 1800.00, 12.00, 500.00, '', 'pack-cotton-unicorn-t-shirts.png-7742624.png', 'Huge Collection of Women\'s Tshirts. Avail low price offers and discounts. Order Now. COD, Easy Returns and Exchange.', 'Huge Collection of Women\'s Tshirts. Avail low price offers and discounts. Order Now. COD, Easy Returns and Exchange.', 'Cotton', 'Printed', 'Half Sleeve', '', 'Casual', 'Huge Collection of Women\'s Tshirts. Avail low price offers and discounts. Order Now. COD, Easy Returns and Exchange.', 'Huge Collection of Women\'s Tshirts. Avail low price offers and discounts. Order Now. COD, Easy Returns and Exchange.', 'Huge Collection of Women\'s Tshirts. Avail low price offers and discounts. Order Now. COD, Easy Returns and Exchange.', 'No', 1, '2020-08-02 23:17:26', '2020-08-02 23:17:47'),
(7, 3, 3, 6, 'Cotton skating Dynasore T shirt', 'CSDT900', 'Blue', 1990.00, 10.00, 120.00, '', 'cotton-sktting-dyansore-t-shirt.png-2644251.png', 'Description. I\'ve always loved \'The Great Wave off Kanagawa\' as a piece of art, so I wanted to pay tribute to it by throwing in there something else Japan is.', 'Description. I\'ve always loved \'The Great Wave off Kanagawa\' as a piece of art, so I wanted to pay tribute to it by throwing in there something else Japan is.', 'Cotton', 'Printed', 'Half Sleeve', 'Regular', 'Casual', 'Description. I\'ve always loved \'The Great Wave off Kanagawa\' as a piece of art, so I wanted to pay tribute to it by throwing in there something else Japan is', 'Description. I\'ve always loved \'The Great Wave off Kanagawa\' as a piece of art, so I wanted to pay tribute to it by throwing in there something else Japan is', 'Description. I\'ve always loved \'The Great Wave off Kanagawa\' as a piece of art, so I wanted to pay tribute to it by throwing in there something else Japan is', 'Yes', 1, '2020-08-02 23:23:50', '2020-08-02 23:23:50'),
(8, 3, 3, 2, 'Pantaloon Junior Printed T Shirt', 'PJPT762', 'Light Blue', 399.00, 0.00, 100.00, '', 'pantaloon-junior-printed-Light-Blue-Tshirt.png-9870808.png', 'Often boys wore them while doing chores and playing outside, eventually opening up the idea of wearing them as general-purpose casual clothing.', 'Often boys wore them while doing chores and playing outside, eventually opening up the idea of wearing them as general-purpose casual clothing.', 'Cotton', 'Printed', 'Full Sleeve', 'Slim', 'Casual', 'Often boys wore them while doing chores and playing outside, eventually opening up the idea of wearing them as general-purpose casual clothing.', 'Often boys wore them while doing chores and playing outside, eventually opening up the idea of wearing them as general-purpose casual clothing.', 'Often boys wore them while doing chores and playing outside, eventually opening up the idea of wearing them as general-purpose casual clothing.', 'No', 1, '2020-08-02 23:27:21', '2020-08-03 00:02:53'),
(9, 6, 3, 5, 'Cotton Rich Denims shorts', 'CRDS66', 'Blue', 2900.00, 10.00, 300.00, '', 'shorts.jpg-49337.jpg', 'We found the best t-shirts for kids that strike a balance between function and fashion by asking stylish parents to share their favorite kids tees', 'We found the best t-shirts for kids that strike a balance between function and fashion by asking stylish parents to share their favorite kids tees', 'Cotton', 'Plain', 'Short Sleeve', 'Regular', 'Casual', 'We found the best t-shirts for kids that strike a balance between function and fashion by asking stylish parents to share their favorite kids tees', 'We found the best t-shirts for kids that strike a balance between function and fashion by asking stylish parents to share their favorite kids tees', 'We found the best t-shirts for kids that strike a balance between function and fashion by asking stylish parents to share their favorite kids tees', 'Yes', 1, '2020-08-02 23:31:21', '2020-08-03 00:04:33'),
(10, 6, 3, 2, 'Pantaloons Baby Casual Blue Jeans', 'PBCC001', 'Blue', 599.00, 5.00, 170.00, '', 'pantloon-baby-causal.jpg-3260240.jpg', 'Pantaloons Baby Casual Comfort Fit Medium Blue Jeans for Kids designs stylish, on-trend clothes that empower kids, babies, ... Shop Kids » ... Boys Will Be Good Humans', 'Pantaloons Baby Casual Comfort Fit Medium Blue Jeans for Kids designs stylish, on-trend clothes that empower kids, babies, ... Shop Kids » ... Boys Will Be Good Humans', 'Wool', 'Solid', 'Full Sleeve', 'Regular', 'Casual', 'Pantaloons Baby Casual Comfort Fit Medium Blue Jeans for Kids designs stylish, on-trend clothes that empower kids, babies, ... Shop Kids » ... Boys Will Be Good Humans', 'Pantaloons Baby Casual Comfort Fit Medium Blue Jeans for Kids designs stylish, on-trend clothes that empower kids, babies, ... Shop Kids » ... Boys Will Be Good Humans', 'Pantaloons Baby Casual Comfort Fit Medium Blue Jeans for Kids designs stylish, on-trend clothes that empower kids, babies, ... Shop Kids » ... Boys Will Be Good Humans', 'Yes', 1, '2020-08-02 23:34:55', '2020-08-02 23:59:48'),
(11, 5, 2, 2, 'SKINNY JEANS', 'SJ009', 'Blue', 3500.00, 0.00, 500.00, '', 'women-deni.png-2447557.png', 'Jeans for Women - Buy from the trendy collection of ladies jeans Online in India. Shop for boyfriend fit, boot-cut, slim-fit, etc. type of Jeans for Women', 'Jeans for Women - Buy from the trendy collection of ladies jeans Online in India. Shop for boyfriend fit, boot-cut, slim-fit, etc. type of Jeans for Women', 'Cotton', 'Self', 'Full Sleeve', 'Slim', 'Casual', 'Jeans for Women - Buy from the trendy collection of ladies jeans Online in India. Shop for boyfriend fit, boot-cut, slim-fit, etc. type of Jeans for Women', 'Jeans for Women - Buy from the trendy collection of ladies jeans Online in India. Shop for boyfriend fit, boot-cut, slim-fit, etc. type of Jeans for Women', 'Jeans for Women - Buy from the trendy collection of ladies jeans Online in India. Shop for boyfriend fit, boot-cut, slim-fit, etc. type of Jeans for Women', 'Yes', 1, '2020-08-02 23:38:43', '2020-08-02 23:38:43'),
(12, 5, 2, 5, 'Jogger Fit women Blue Jeans', 'JFBJ110', 'Blue', 1600.00, 50.00, 500.00, '', 'Jogger-Fit-women-Blue-jeans.jpeg-7429385.jpeg', 'Shop stylish ladies jeans, ripped, boyfriend, cropped, high waisted jeans for ladies/girls for all sizes from top brands', 'Shop stylish ladies jeans, ripped, boyfriend, cropped, high waisted jeans for ladies/girls for all sizes from top brands', 'Polyester', 'Plain', 'Full Sleeve', 'Regular', 'Casual', 'Shop stylish ladies jeans, ripped, boyfriend, cropped, high waisted jeans for ladies/girls for all sizes from top brands', 'Shop stylish ladies jeans, ripped, boyfriend, cropped, high waisted jeans for ladies/girls for all sizes from top brands', 'Shop stylish ladies jeans, ripped, boyfriend, cropped, high waisted jeans for ladies/girls for all sizes from top brands', 'No', 1, '2020-08-02 23:43:33', '2020-08-02 23:54:10'),
(13, 7, 1, 5, 'Casual Brown T shirt', 'CBT76', 'Brown', 1390.00, 10.00, 500.00, '', 'casual-menswear-500x500.jpg-7608937.jpg', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'Polyester', 'Plain', 'Full Sleeve', 'Regular', 'Formal', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'Yes', 1, '2020-08-03 00:24:21', '2020-08-03 00:24:21'),
(14, 7, 1, 7, 'Casual Blue T shirt', 'CBT77', 'Blue', 1900.00, 15.00, 550.00, '', 'blue.jpg-1627235.jpg', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'Cotton', 'Checked', 'Full Sleeve', 'Slim', 'Formal', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'Yes', 1, '2020-08-03 00:26:14', '2020-08-03 00:26:14'),
(15, 10, 2, 2, 'Woolen Top Black', 'WTB009', 'Black', 11999.00, 10.00, 1000.00, '', 'tops2.jpg-7082780.jpg', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'Wool', 'Checked', 'Full Sleeve', 'Regular', 'Casual', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'Yes', 1, '2020-08-03 03:57:11', '2020-08-03 03:57:11'),
(16, 9, 2, 7, 'Blue Green Tops', 'BTFG99', 'Blue green', 1290.00, 10.00, 800.00, '', 'blue-top.jpg-5505689.jpg', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'Cotton', 'Checked', '', 'Regular', 'Casual', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'We only list UK sizes. If you\'re not sure what your UK size is, please click on ‘Size Chart’ & review our size guides.', 'Yes', 1, '2020-08-03 03:59:46', '2020-08-03 03:59:46');

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
(1, 1, 'Small', 1800.00, 20, 'GSFJ01-S', 1, '2020-08-03 00:35:22', '2020-08-04 09:00:16'),
(2, 1, 'Medium', 2000.00, 15, 'GSFJ01-M', 1, '2020-08-03 00:35:22', '2020-08-04 09:01:18'),
(3, 1, 'Large', 2200.00, 20, 'GSFJ01-L', 1, '2020-08-03 00:35:22', '2020-08-04 09:01:19'),
(4, 1, 'Xtra Large', 2400.00, 5, 'GSFJ01-XL', 0, '2020-08-03 00:35:22', '2020-08-04 09:00:20'),
(5, 13, 'Small', 1500.00, 17, 'CBT76-S', 1, '2020-08-03 00:36:27', '2020-08-03 00:36:27'),
(6, 13, 'Medium', 1800.00, 10, 'CBT76-M', 1, '2020-08-03 00:36:27', '2020-08-03 00:36:27'),
(7, 14, 'Small', 1800.00, 20, 'CBT77-S', 1, '2020-08-03 00:37:48', '2020-08-03 00:37:48'),
(8, 14, 'Medium', 2000.00, 25, 'CBT77-M', 1, '2020-08-03 00:37:48', '2020-08-03 00:37:48'),
(9, 14, 'Large', 2200.00, 15, 'CBT77-L', 1, '2020-08-03 00:37:48', '2020-08-03 00:37:48'),
(10, 10, 'Small', 1900.00, 10, 'PBCC001-S', 1, '2020-08-05 06:15:25', '2020-08-05 06:15:25'),
(11, 11, 'Small', 1900.00, 25, 'SJ009-S', 1, '2020-08-05 06:15:53', '2020-08-05 06:15:53'),
(12, 12, 'Small', 1300.00, 30, 'JFBJ110-S', 1, '2020-08-05 06:16:31', '2020-08-05 06:16:31'),
(13, 15, 'Medium', 2500.00, 10, 'WTB009-M', 1, '2020-08-05 06:17:05', '2020-08-05 06:17:05'),
(14, 16, 'Small', 1000.00, 25, 'BTFG99-S', 1, '2020-08-05 06:17:33', '2020-08-05 06:17:33'),
(15, 3, 'Small', 1000.00, 15, 'PCNS08-S', 1, '2020-08-05 06:18:09', '2020-08-05 06:18:09'),
(16, 2, 'Small', 1500.00, 10, 'PEDJ09-S', 1, '2020-08-05 06:19:02', '2020-08-05 06:19:02'),
(17, 2, 'Medium', 1900.00, 20, 'PEDJ09-M', 1, '2020-08-05 06:19:02', '2020-08-05 06:19:02'),
(18, 4, 'Small', 1900.00, 25, 'RRGP778-S', 1, '2020-08-05 06:38:03', '2020-08-05 06:38:03');

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
(1, 12, '9215631596431743.jpeg', 1, '2020-08-02 23:45:43', '2020-08-02 23:45:43'),
(2, 12, '7573051596431743.jpeg', 1, '2020-08-02 23:45:43', '2020-08-04 09:04:22'),
(3, 11, '657921596431971.jpeg', 1, '2020-08-02 23:49:32', '2020-08-02 23:49:32'),
(4, 11, '8606591596431972.jpg', 1, '2020-08-02 23:49:32', '2020-08-02 23:49:32'),
(5, 11, '5649321596431972.png', 1, '2020-08-02 23:49:32', '2020-08-02 23:49:32'),
(6, 9, '9679991596432894.png', 1, '2020-08-03 00:04:54', '2020-08-03 00:04:54'),
(7, 4, '2925021596433019.jpg', 1, '2020-08-03 00:06:59', '2020-08-03 00:06:59'),
(8, 4, '548431596433126.jpg', 1, '2020-08-03 00:08:46', '2020-08-03 00:08:46'),
(9, 6, '1196411596433501.png', 1, '2020-08-03 00:15:01', '2020-08-03 00:15:01'),
(10, 6, '7295931596433501.png', 1, '2020-08-03 00:15:01', '2020-08-03 00:15:01');

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
(1, 'Men', 1, NULL, '2020-07-30 22:27:40'),
(2, 'Women', 1, NULL, '2020-07-30 22:26:46'),
(3, 'Kids', 1, NULL, '2020-07-30 22:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `tempcarts`
--

CREATE TABLE `tempcarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_sid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_qlt` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tempcarts`
--

INSERT INTO `tempcarts` (`id`, `product_id`, `user_sid`, `size`, `pro_qlt`, `created_at`, `updated_at`) VALUES
(1, 16, 'ABCD4294967295', NULL, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addinformation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `dob`, `address`, `city`, `state`, `pincode`, `country`, `addinformation`, `mobile`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr', 'saurabh', 'shukla', 'saurabh@gmail.com', NULL, '$2y$10$gX/OU2.znYI.33X4dj5pse9dxSrXZojryjMOY5WfpBpb6m7aFWUGW', '1999-06-29', 'Noida', 'Noida', 'UP', '239088', 'India', 'Testing Information of shop', '9876543210', '112958.jpg', 1, 'fyahBnJvXrBOyHrPTAtxJ7vGUba8fxViCbgXjnSO', '2020-08-05 02:48:27', '2020-08-05 02:48:27'),
(2, 'Mrs', 'sapna', 'dubey', 'sapna@gmail.com', NULL, '$2y$10$b1oZibinlBznNAAxZTvGfO/9W/O8rLqKQotlS0HPiVKT4I.fhWBbq', '1997-10-21', 'Noida', 'Noida', 'UP', '239088', 'India', 'testing test', '7899009987', '77950.png', 1, 'fyahBnJvXrBOyHrPTAtxJ7vGUba8fxViCbgXjnSO', '2020-08-05 02:59:15', '2020-08-05 02:59:15'),
(3, 'Mr', 'vipin', 'tiwari', 'vipin@gmail.com', NULL, '$2y$10$92VCbbcZXllxkj.E2UjogOs4kdsABpCzGjZDvedGZRe.MBHliOVy.', '1993-10-12', 'Greater nodia', 'noida', 'UP', '123456', 'India', 'testing envy hosting', '9876543212', '15200.png', 1, 'fyahBnJvXrBOyHrPTAtxJ7vGUba8fxViCbgXjnSO', '2020-08-05 03:01:10', '2020-08-05 03:01:10');

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- Indexes for table `tempcarts`
--
ALTER TABLE `tempcarts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tempcarts`
--
ALTER TABLE `tempcarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
