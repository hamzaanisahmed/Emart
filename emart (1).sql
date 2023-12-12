-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 01:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emart`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'appple', 1, '2023-10-22 06:42:56', '2023-10-22 07:02:25'),
(3, 'Cyan', 'cyan', 1, '2023-10-22 06:47:07', '2023-10-22 06:47:07'),
(4, 'Nike', 'nike', 1, '2023-10-22 07:02:09', '2023-10-22 07:02:09'),
(5, 'Byron', 'byron', 1, '2023-10-22 07:35:15', '2023-10-22 07:35:15'),
(6, 'Canon', 'canon', 1, '2023-10-22 07:38:01', '2023-10-22 07:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `homepage` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `homepage`, `created_at`, `updated_at`) VALUES
(3, 'Men\'s', 'mens', '3.jpg', 1, 'Yes', '2023-10-22 06:39:20', '2023-10-22 06:39:21'),
(4, 'Women\'s', 'womens', '4-1697979689.jpg', 1, 'Yes', '2023-10-22 06:39:39', '2023-10-22 08:01:29'),
(5, 'Electronics', 'electronics', '5-1702217259.jpg', 1, 'Yes', '2023-10-22 06:40:00', '2023-12-10 09:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(164, 'Pakistan', 'PK', NULL, NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_18_113511_alter_users_table', 1),
(6, '2023_07_07_110911_create_categories_table', 1),
(7, '2023_08_04_134920_create_temp_images_table', 1),
(8, '2023_08_11_111107_create_sub_categories_table', 1),
(9, '2023_08_15_191058_create_brands_table', 1),
(10, '2023_08_20_184126_create_products_table', 1),
(11, '2023_08_20_185930_create_product_images_table', 1),
(15, '2023_10_19_120808_create_orders_table', 2),
(16, '2023_10_19_120837_create_order_items_table', 2),
(17, '2023_10_19_192632_create_contries_table', 2),
(18, '2023_10_21_142701_alter_orders_table', 3),
(20, '2023_10_23_130016_create_shipping_charges_table', 4),
(23, '2023_12_06_111623_alter_orders_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `apartment` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `shipping` double(10,2) NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `grand_total` double(10,2) NOT NULL,
  `payment_status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `status` enum('pending','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `shipped_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `company`, `address`, `apartment`, `city`, `state`, `subtotal`, `shipping`, `coupon_code`, `discount`, `grand_total`, `payment_status`, `status`, `shipped_date`, `created_at`, `updated_at`, `country_id`) VALUES
(14, 1, 'Muhammad', 'Saad Khan', 'saad@gmail.com', '03212334566', 'Saad Enterprise', 'helloxyz123', 'liaqtabad number 10 near erum bakery', 'Karachi', 'liaqtabad', 10500.00, 0.00, NULL, NULL, 10500.00, 'unpaid', 'shipped', '2023-12-04 23:00:30', '2023-12-09 05:34:58', '2023-12-10 05:49:35', 164),
(22, 1, 'Muhammad', 'Saad Khan', 'saad@gmail.com', '03212334566', 'Saad Enterprise', 'helloxyz123', 'liaqtabad number 10 near erum bakery', 'Karachi', 'liaqtabad', 2000.00, 0.00, NULL, NULL, 2000.00, 'unpaid', 'delivered', '2023-12-14 01:00:01', '2023-12-10 08:03:43', '2023-12-12 06:39:08', 164),
(25, 1, 'Muhammad', 'Saad Khan', 'saad@gmail.com', '03212334566', 'Saad Enterprise', 'helloxyz123', 'liaqtabad number 10 near erum bakery', 'Karachi', 'liaqtabad', 4000.00, 250.00, NULL, NULL, 4250.00, 'unpaid', 'pending', NULL, '2023-12-12 06:51:43', '2023-12-12 06:51:43', 164);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orders_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `orders_id`, `product_id`, `name`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(18, 14, 9, 'Silver Byron Watch', 1, 6000.00, 6000.00, '2023-12-09 05:34:58', '2023-12-09 05:34:58'),
(19, 14, 2, 'Joemalone Jasmine', 1, 4500.00, 4500.00, '2023-12-09 05:34:58', '2023-12-09 05:34:58'),
(25, 22, 5, 'Timex Unisex Originals', 1, 2000.00, 2000.00, '2023-12-10 08:03:43', '2023-12-10 08:03:43'),
(29, 25, 3, 'Air max 95', 2, 2000.00, 4000.00, '2023-12-12 06:51:43', '2023-12-12 06:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `price` double(10,2) NOT NULL,
  `compare_price` double(10,2) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_featured` enum('Yes','No') NOT NULL DEFAULT 'No',
  `sku` varchar(255) NOT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `track_qty` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `qty` int(11) DEFAULT NULL,
  `related_products` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `description`, `short_description`, `price`, `compare_price`, `category_id`, `sub_category_id`, `brand_id`, `is_featured`, `sku`, `barcode`, `track_qty`, `qty`, `related_products`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Smart Watch', 'smart-watch', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 5000.00, 5999.00, 3, 5, 1, 'Yes', '001', NULL, 'Yes', 7, '4', 1, '2023-10-22 06:55:23', '2023-12-07 01:41:19'),
(2, 'Joemalone Jasmine', 'joemalone-jasmine', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 4500.00, NULL, 4, 3, NULL, 'Yes', '002', NULL, 'Yes', 3, '', 1, '2023-10-22 06:57:05', '2023-10-22 07:01:46'),
(3, 'Air max 95', 'air-max-95', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 2000.00, NULL, 3, 4, 4, 'Yes', '003', NULL, 'Yes', 20, '', 1, '2023-10-22 06:59:09', '2023-12-12 06:53:02'),
(5, 'Timex Unisex Originals', 'timex-unisex-originals', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 2000.00, 2699.00, 3, 5, NULL, 'Yes', '005', NULL, 'Yes', 15, '', 1, '2023-10-22 07:11:22', '2023-10-22 07:11:31'),
(6, 'Simple Cotton T-shirt', 'simple-cotton-t-shirt', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 1000.00, 1299.00, 3, 2, 3, 'Yes', '006', NULL, 'Yes', 7, '', 1, '2023-10-22 07:14:31', '2023-10-22 07:14:31'),
(7, 'Air Jordan 12 gym red-2', 'air-jordan-12-gym-red-2', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 30000.00, 35999.00, 3, 4, 4, 'Yes', '007', NULL, 'Yes', 20, '', 1, '2023-10-22 07:16:46', '2023-10-22 07:16:46'),
(8, 'Kui Ye Chen’s AirPods', 'kui-ye-chens-airpods', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 9000.00, 0.00, 5, 6, 1, 'Yes', '008', NULL, 'Yes', 5, '', 1, '2023-10-22 07:18:29', '2023-10-22 07:21:31'),
(9, 'Silver Byron Watch', 'silver-byron-watch', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.<br></p>', 6000.00, NULL, 3, 5, 5, 'No', '009', NULL, 'Yes', 15, '', 1, '2023-10-22 07:36:30', '2023-10-22 07:36:40'),
(10, 'Black DSLR 50 mm lense', 'black-dslr-50-mm-lense', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', NULL, 50000.00, 55000.00, 5, NULL, 6, 'No', '011', NULL, 'Yes', 30, '', 1, '2023-10-22 07:37:46', '2023-10-22 07:59:55'),
(11, 'Black DSLR lense', 'black-dslr-lense', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p><div><br></div>', 30000.00, NULL, 5, 7, NULL, 'No', '012', NULL, 'Yes', 10, '', 1, '2023-10-22 07:57:13', '2023-10-22 07:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `sort_order`, `created_at`, `updated_at`) VALUES
(2, 2, '2-2-1697975825.jpg', NULL, '2023-10-22 06:57:05', '2023-10-22 06:57:05'),
(3, 3, '3-3-1697975949.jpg', NULL, '2023-10-22 06:59:09', '2023-10-22 06:59:09'),
(5, 5, '5-5-1697976682.jpg', NULL, '2023-10-22 07:11:22', '2023-10-22 07:11:22'),
(6, 6, '6-6-1697976871.jpg', NULL, '2023-10-22 07:14:31', '2023-10-22 07:14:31'),
(7, 7, '7-7-1697977006.jpg', NULL, '2023-10-22 07:16:46', '2023-10-22 07:16:46'),
(8, 8, '8-8-1697977109.jpg', NULL, '2023-10-22 07:18:29', '2023-10-22 07:18:29'),
(9, 1, '1-9-1697977173.jpg', NULL, '2023-10-22 07:19:33', '2023-10-22 07:19:33'),
(10, 9, '9-10-1697978190.jpg', NULL, '2023-10-22 07:36:30', '2023-10-22 07:36:30'),
(11, 10, '10-11-1697978266.jpg', NULL, '2023-10-22 07:37:46', '2023-10-22 07:37:46'),
(15, 6, '6-15-1697978709.jpg', NULL, '2023-10-22 07:45:09', '2023-10-22 07:45:09'),
(16, 6, '6-16-1697978710.jpg', NULL, '2023-10-22 07:45:10', '2023-10-22 07:45:10'),
(17, 6, '6-17-1697978710.jpg', NULL, '2023-10-22 07:45:10', '2023-10-22 07:45:10'),
(22, 1, '1-22-1697979013.jpg', NULL, '2023-10-22 07:50:13', '2023-10-22 07:50:13'),
(23, 1, '1-23-1697979014.jpg', NULL, '2023-10-22 07:50:14', '2023-10-22 07:50:14'),
(24, 1, '1-24-1697979015.jpg', NULL, '2023-10-22 07:50:15', '2023-10-22 07:50:15'),
(25, 1, '1-25-1697979016.jpg', NULL, '2023-10-22 07:50:16', '2023-10-22 07:50:16'),
(26, 11, '11-26-1697979433.jpg', NULL, '2023-10-22 07:57:13', '2023-10-22 07:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `country_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, '164', 250.00, '2023-12-09 05:36:56', '2023-12-09 05:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `homepage` enum('Yes','No') NOT NULL DEFAULT 'No',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `status`, `homepage`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Headphones', 'headphones', 1, 'Yes', 5, '2023-10-22 06:40:37', '2023-10-22 06:40:37'),
(2, 'Clothes', 'clothes', 1, 'Yes', 3, '2023-10-22 06:41:17', '2023-10-22 06:41:17'),
(3, 'Perfume', 'perfume', 1, 'Yes', 4, '2023-10-22 06:41:26', '2023-10-22 06:41:26'),
(4, 'Shoes', 'shoes', 1, 'Yes', 3, '2023-10-22 06:41:42', '2023-10-22 06:41:42'),
(5, 'Watches', 'watches', 1, 'Yes', 3, '2023-10-22 06:42:00', '2023-10-22 06:42:00'),
(6, 'AirPod\'s', 'airpods', 1, 'Yes', 5, '2023-10-22 06:50:12', '2023-10-22 06:50:12'),
(7, 'Camera\'s', 'cameras', 1, 'Yes', 5, '2023-10-22 07:56:26', '2023-10-22 07:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `temp_images`
--

CREATE TABLE `temp_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_images`
--

INSERT INTO `temp_images` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1697974550.jpg', '2023-10-22 06:35:50', '2023-10-22 06:35:50'),
(2, '1697974580.jpg', '2023-10-22 06:36:20', '2023-10-22 06:36:20'),
(3, '1697974587.jpg', '2023-10-22 06:36:27', '2023-10-22 06:36:27'),
(4, '1697974593.jpg', '2023-10-22 06:36:33', '2023-10-22 06:36:33'),
(5, '1697974757.jpg', '2023-10-22 06:39:17', '2023-10-22 06:39:17'),
(6, '1697974774.jpg', '2023-10-22 06:39:34', '2023-10-22 06:39:34'),
(7, '1697974797.jpg', '2023-10-22 06:39:57', '2023-10-22 06:39:57'),
(8, '1697975633.jpg', '2023-10-22 06:53:53', '2023-10-22 06:53:53'),
(9, '1697975808.jpg', '2023-10-22 06:56:48', '2023-10-22 06:56:48'),
(10, '1697975932.jpg', '2023-10-22 06:58:52', '2023-10-22 06:58:52'),
(11, '1697976007.jpg', '2023-10-22 07:00:07', '2023-10-22 07:00:07'),
(12, '1697976220.jpg', '2023-10-22 07:03:40', '2023-10-22 07:03:40'),
(13, '1697976344.jpg', '2023-10-22 07:05:44', '2023-10-22 07:05:44'),
(14, '1697976457.jpg', '2023-10-22 07:07:37', '2023-10-22 07:07:37'),
(15, '1697976644.jpg', '2023-10-22 07:10:44', '2023-10-22 07:10:44'),
(16, '1697976812.jpg', '2023-10-22 07:13:32', '2023-10-22 07:13:32'),
(17, '1697976931.jpg', '2023-10-22 07:15:31', '2023-10-22 07:15:31'),
(18, '1697977063.jpg', '2023-10-22 07:17:43', '2023-10-22 07:17:43'),
(19, '1697978164.jpg', '2023-10-22 07:36:04', '2023-10-22 07:36:04'),
(20, '1697978242.jpg', '2023-10-22 07:37:22', '2023-10-22 07:37:22'),
(21, '1697978329.jpg', '2023-10-22 07:38:49', '2023-10-22 07:38:49'),
(22, '1697978428.jpg', '2023-10-22 07:40:28', '2023-10-22 07:40:28'),
(23, '1697979415.jpg', '2023-10-22 07:56:55', '2023-10-22 07:56:55'),
(24, '1697979505.jpg', '2023-10-22 07:58:25', '2023-10-22 07:58:25'),
(25, '1697979687.jpg', '2023-10-22 08:01:27', '2023-10-22 08:01:27'),
(26, '1701612414.jpg', '2023-12-03 09:06:54', '2023-12-03 09:06:54'),
(27, '1702217249.jpg', '2023-12-10 09:07:29', '2023-12-10 09:07:29'),
(28, '1702217254.jpg', '2023-12-10 09:07:34', '2023-12-10 09:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Saad Khan', 'saad@gmail.com', NULL, '12345678901', '$2y$10$shkxIDJvcw1BAiJ2iPpxuOdWMlnpHliFEED77NcVOJKznnVULmdZS', 'user', NULL, '2023-10-21 09:34:15', '2023-10-21 09:34:15'),
(2, 'hamza', 'hamza@gmail.com', NULL, '12345678909', '$2a$04$AgBhfabyNyA88rOCql5ZUewiuUgWoszqOhJRVoURNJcTYXYAjr7mK', 'admin', NULL, NULL, NULL),
(3, 'hammad', 'hammad@gmail.com', NULL, '03124567890', '$2y$10$xn8dK6sxQr5XAh070CaRu.h5q0efohFRa.N7lTMW9pURytXlZ/qfa', 'user', NULL, '2023-12-06 06:51:28', '2023-12-06 06:51:28');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `countries`
--
ALTER TABLE `countries`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_country_id_foreign` (`country_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_orders_id_foreign` (`orders_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
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
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `temp_images`
--
ALTER TABLE `temp_images`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `temp_images`
--
ALTER TABLE `temp_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
