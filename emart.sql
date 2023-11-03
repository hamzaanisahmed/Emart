-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 04:58 PM
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
(5, 'Electronics', 'electronics', '5.jpg', 1, 'Yes', '2023-10-22 06:40:00', '2023-10-22 06:40:01');

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
(1, 'United States', 'US', NULL, NULL),
(2, 'Canada', 'CA', NULL, NULL),
(3, 'Afghanistan', 'AF', NULL, NULL),
(4, 'Albania', 'AL', NULL, NULL),
(5, 'Algeria', 'DZ', NULL, NULL),
(6, 'American Samoa', 'AS', NULL, NULL),
(7, 'Andorra', 'AD', NULL, NULL),
(8, 'Angola', 'AO', NULL, NULL),
(9, 'Anguilla', 'AI', NULL, NULL),
(10, 'Antarctica', 'AQ', NULL, NULL),
(11, 'Antigua and/or Barbuda', 'AG', NULL, NULL),
(12, 'Argentina', 'AR', NULL, NULL),
(13, 'Armenia', 'AM', NULL, NULL),
(14, 'Aruba', 'AW', NULL, NULL),
(15, 'Australia', 'AU', NULL, NULL),
(16, 'Austria', 'AT', NULL, NULL),
(17, 'Azerbaijan', 'AZ', NULL, NULL),
(18, 'Bahamas', 'BS', NULL, NULL),
(19, 'Bahrain', 'BH', NULL, NULL),
(20, 'Bangladesh', 'BD', NULL, NULL),
(21, 'Barbados', 'BB', NULL, NULL),
(22, 'Belarus', 'BY', NULL, NULL),
(23, 'Belgium', 'BE', NULL, NULL),
(24, 'Belize', 'BZ', NULL, NULL),
(25, 'Benin', 'BJ', NULL, NULL),
(26, 'Bermuda', 'BM', NULL, NULL),
(27, 'Bhutan', 'BT', NULL, NULL),
(28, 'Bolivia', 'BO', NULL, NULL),
(29, 'Bosnia and Herzegovina', 'BA', NULL, NULL),
(30, 'Botswana', 'BW', NULL, NULL),
(31, 'Bouvet Island', 'BV', NULL, NULL),
(32, 'Brazil', 'BR', NULL, NULL),
(33, 'British lndian Ocean Territory', 'IO', NULL, NULL),
(34, 'Brunei Darussalam', 'BN', NULL, NULL),
(35, 'Bulgaria', 'BG', NULL, NULL),
(36, 'Burkina Faso', 'BF', NULL, NULL),
(37, 'Burundi', 'BI', NULL, NULL),
(38, 'Cambodia', 'KH', NULL, NULL),
(39, 'Cameroon', 'CM', NULL, NULL),
(40, 'Cape Verde', 'CV', NULL, NULL),
(41, 'Cayman Islands', 'KY', NULL, NULL),
(42, 'Central African Republic', 'CF', NULL, NULL),
(43, 'Chad', 'TD', NULL, NULL),
(44, 'Chile', 'CL', NULL, NULL),
(45, 'China', 'CN', NULL, NULL),
(46, 'Christmas Island', 'CX', NULL, NULL),
(47, 'Cocos (Keeling) Islands', 'CC', NULL, NULL),
(48, 'Colombia', 'CO', NULL, NULL),
(49, 'Comoros', 'KM', NULL, NULL),
(50, 'Congo', 'CG', NULL, NULL),
(51, 'Cook Islands', 'CK', NULL, NULL),
(52, 'Costa Rica', 'CR', NULL, NULL),
(53, 'Croatia (Hrvatska)', 'HR', NULL, NULL),
(54, 'Cuba', 'CU', NULL, NULL),
(55, 'Cyprus', 'CY', NULL, NULL),
(56, 'Czech Republic', 'CZ', NULL, NULL),
(57, 'Democratic Republic of Congo', 'CD', NULL, NULL),
(58, 'Denmark', 'DK', NULL, NULL),
(59, 'Djibouti', 'DJ', NULL, NULL),
(60, 'Dominica', 'DM', NULL, NULL),
(61, 'Dominican Republic', 'DO', NULL, NULL),
(62, 'East Timor', 'TP', NULL, NULL),
(63, 'Ecudaor', 'EC', NULL, NULL),
(64, 'Egypt', 'EG', NULL, NULL),
(65, 'El Salvador', 'SV', NULL, NULL),
(66, 'Equatorial Guinea', 'GQ', NULL, NULL),
(67, 'Eritrea', 'ER', NULL, NULL),
(68, 'Estonia', 'EE', NULL, NULL),
(69, 'Ethiopia', 'ET', NULL, NULL),
(70, 'Falkland Islands (Malvinas)', 'FK', NULL, NULL),
(71, 'Faroe Islands', 'FO', NULL, NULL),
(72, 'Fiji', 'FJ', NULL, NULL),
(73, 'Finland', 'FI', NULL, NULL),
(74, 'France', 'FR', NULL, NULL),
(75, 'France, Metropolitan', 'FX', NULL, NULL),
(76, 'French Guiana', 'GF', NULL, NULL),
(77, 'French Polynesia', 'PF', NULL, NULL),
(78, 'French Southern Territories', 'TF', NULL, NULL),
(79, 'Gabon', 'GA', NULL, NULL),
(80, 'Gambia', 'GM', NULL, NULL),
(81, 'Georgia', 'GE', NULL, NULL),
(82, 'Germany', 'DE', NULL, NULL),
(83, 'Ghana', 'GH', NULL, NULL),
(84, 'Gibraltar', 'GI', NULL, NULL),
(85, 'Greece', 'GR', NULL, NULL),
(86, 'Greenland', 'GL', NULL, NULL),
(87, 'Grenada', 'GD', NULL, NULL),
(88, 'Guadeloupe', 'GP', NULL, NULL),
(89, 'Guam', 'GU', NULL, NULL),
(90, 'Guatemala', 'GT', NULL, NULL),
(91, 'Guinea', 'GN', NULL, NULL),
(92, 'Guinea-Bissau', 'GW', NULL, NULL),
(93, 'Guyana', 'GY', NULL, NULL),
(94, 'Haiti', 'HT', NULL, NULL),
(95, 'Heard and Mc Donald Islands', 'HM', NULL, NULL),
(96, 'Honduras', 'HN', NULL, NULL),
(97, 'Hong Kong', 'HK', NULL, NULL),
(98, 'Hungary', 'HU', NULL, NULL),
(99, 'Iceland', 'IS', NULL, NULL),
(100, 'India', 'IN', NULL, NULL),
(101, 'Indonesia', 'ID', NULL, NULL),
(102, 'Iran (Islamic Republic of)', 'IR', NULL, NULL),
(103, 'Iraq', 'IQ', NULL, NULL),
(104, 'Ireland', 'IE', NULL, NULL),
(105, 'Israel', 'IL', NULL, NULL),
(106, 'Italy', 'IT', NULL, NULL),
(107, 'Ivory Coast', 'CI', NULL, NULL),
(108, 'Jamaica', 'JM', NULL, NULL),
(109, 'Japan', 'JP', NULL, NULL),
(110, 'Jordan', 'JO', NULL, NULL),
(111, 'Kazakhstan', 'KZ', NULL, NULL),
(112, 'Kenya', 'KE', NULL, NULL),
(113, 'Kiribati', 'KI', NULL, NULL),
(114, 'Korea, Democratic People\'s Republic of', 'KP', NULL, NULL),
(115, 'Korea, Republic of', 'KR', NULL, NULL),
(116, 'Kuwait', 'KW', NULL, NULL),
(117, 'Kyrgyzstan', 'KG', NULL, NULL),
(118, 'Lao People\'s Democratic Republic', 'LA', NULL, NULL),
(119, 'Latvia', 'LV', NULL, NULL),
(120, 'Lebanon', 'LB', NULL, NULL),
(121, 'Lesotho', 'LS', NULL, NULL),
(122, 'Liberia', 'LR', NULL, NULL),
(123, 'Libyan Arab Jamahiriya', 'LY', NULL, NULL),
(124, 'Liechtenstein', 'LI', NULL, NULL),
(125, 'Lithuania', 'LT', NULL, NULL),
(126, 'Luxembourg', 'LU', NULL, NULL),
(127, 'Macau', 'MO', NULL, NULL),
(128, 'Macedonia', 'MK', NULL, NULL),
(129, 'Madagascar', 'MG', NULL, NULL),
(130, 'Malawi', 'MW', NULL, NULL),
(131, 'Malaysia', 'MY', NULL, NULL),
(132, 'Maldives', 'MV', NULL, NULL),
(133, 'Mali', 'ML', NULL, NULL),
(134, 'Malta', 'MT', NULL, NULL),
(135, 'Marshall Islands', 'MH', NULL, NULL),
(136, 'Martinique', 'MQ', NULL, NULL),
(137, 'Mauritania', 'MR', NULL, NULL),
(138, 'Mauritius', 'MU', NULL, NULL),
(139, 'Mayotte', 'TY', NULL, NULL),
(140, 'Mexico', 'MX', NULL, NULL),
(141, 'Micronesia, Federated States of', 'FM', NULL, NULL),
(142, 'Moldova, Republic of', 'MD', NULL, NULL),
(143, 'Monaco', 'MC', NULL, NULL),
(144, 'Mongolia', 'MN', NULL, NULL),
(145, 'Montserrat', 'MS', NULL, NULL),
(146, 'Morocco', 'MA', NULL, NULL),
(147, 'Mozambique', 'MZ', NULL, NULL),
(148, 'Myanmar', 'MM', NULL, NULL),
(149, 'Namibia', 'NA', NULL, NULL),
(150, 'Nauru', 'NR', NULL, NULL),
(151, 'Nepal', 'NP', NULL, NULL),
(152, 'Netherlands', 'NL', NULL, NULL),
(153, 'Netherlands Antilles', 'AN', NULL, NULL),
(154, 'New Caledonia', 'NC', NULL, NULL),
(155, 'New Zealand', 'NZ', NULL, NULL),
(156, 'Nicaragua', 'NI', NULL, NULL),
(157, 'Niger', 'NE', NULL, NULL),
(158, 'Nigeria', 'NG', NULL, NULL),
(159, 'Niue', 'NU', NULL, NULL),
(160, 'Norfork Island', 'NF', NULL, NULL),
(161, 'Northern Mariana Islands', 'MP', NULL, NULL),
(162, 'Norway', 'NO', NULL, NULL),
(163, 'Oman', 'OM', NULL, NULL),
(164, 'Pakistan', 'PK', NULL, NULL),
(165, 'Palau', 'PW', NULL, NULL),
(166, 'Panama', 'PA', NULL, NULL),
(167, 'Papua New Guinea', 'PG', NULL, NULL),
(168, 'Paraguay', 'PY', NULL, NULL),
(169, 'Peru', 'PE', NULL, NULL),
(170, 'Philippines', 'PH', NULL, NULL),
(171, 'Pitcairn', 'PN', NULL, NULL),
(172, 'Poland', 'PL', NULL, NULL),
(173, 'Portugal', 'PT', NULL, NULL),
(174, 'Puerto Rico', 'PR', NULL, NULL),
(175, 'Qatar', 'QA', NULL, NULL),
(176, 'Republic of South Sudan', 'SS', NULL, NULL),
(177, 'Reunion', 'RE', NULL, NULL),
(178, 'Romania', 'RO', NULL, NULL),
(179, 'Russian Federation', 'RU', NULL, NULL),
(180, 'Rwanda', 'RW', NULL, NULL),
(181, 'Saint Kitts and Nevis', 'KN', NULL, NULL),
(182, 'Saint Lucia', 'LC', NULL, NULL),
(183, 'Saint Vincent and the Grenadines', 'VC', NULL, NULL),
(184, 'Samoa', 'WS', NULL, NULL),
(185, 'San Marino', 'SM', NULL, NULL),
(186, 'Sao Tome and Principe', 'ST', NULL, NULL),
(187, 'Saudi Arabia', 'SA', NULL, NULL),
(188, 'Senegal', 'SN', NULL, NULL),
(189, 'Serbia', 'RS', NULL, NULL),
(190, 'Seychelles', 'SC', NULL, NULL),
(191, 'Sierra Leone', 'SL', NULL, NULL),
(192, 'Singapore', 'SG', NULL, NULL),
(193, 'Slovakia', 'SK', NULL, NULL),
(194, 'Slovenia', 'SI', NULL, NULL),
(195, 'Solomon Islands', 'SB', NULL, NULL),
(196, 'Somalia', 'SO', NULL, NULL),
(197, 'South Africa', 'ZA', NULL, NULL),
(198, 'South Georgia South Sandwich Islands', 'GS', NULL, NULL),
(199, 'Spain', 'ES', NULL, NULL),
(200, 'Sri Lanka', 'LK', NULL, NULL),
(201, 'St. Helena', 'SH', NULL, NULL),
(202, 'St. Pierre and Miquelon', 'PM', NULL, NULL),
(203, 'Sudan', 'SD', NULL, NULL),
(204, 'Suriname', 'SR', NULL, NULL),
(205, 'Svalbarn and Jan Mayen Islands', 'SJ', NULL, NULL),
(206, 'Swaziland', 'SZ', NULL, NULL),
(207, 'Sweden', 'SE', NULL, NULL),
(208, 'Switzerland', 'CH', NULL, NULL),
(209, 'Syrian Arab Republic', 'SY', NULL, NULL),
(210, 'Taiwan', 'TW', NULL, NULL),
(211, 'Tajikistan', 'TJ', NULL, NULL),
(212, 'Tanzania, United Republic of', 'TZ', NULL, NULL),
(213, 'Thailand', 'TH', NULL, NULL),
(214, 'Togo', 'TG', NULL, NULL),
(215, 'Tokelau', 'TK', NULL, NULL),
(216, 'Tonga', 'TO', NULL, NULL),
(217, 'Trinidad and Tobago', 'TT', NULL, NULL),
(218, 'Tunisia', 'TN', NULL, NULL),
(219, 'Turkey', 'TR', NULL, NULL),
(220, 'Turkmenistan', 'TM', NULL, NULL),
(221, 'Turks and Caicos Islands', 'TC', NULL, NULL),
(222, 'Tuvalu', 'TV', NULL, NULL),
(223, 'Uganda', 'UG', NULL, NULL),
(224, 'Ukraine', 'UA', NULL, NULL),
(225, 'United Arab Emirates', 'AE', NULL, NULL),
(226, 'United Kingdom', 'GB', NULL, NULL),
(227, 'United States minor outlying islands', 'UM', NULL, NULL),
(228, 'Uruguay', 'UY', NULL, NULL),
(229, 'Uzbekistan', 'UZ', NULL, NULL),
(230, 'Vanuatu', 'VU', NULL, NULL),
(231, 'Vatican City State', 'VA', NULL, NULL),
(232, 'Venezuela', 'VE', NULL, NULL),
(233, 'Vietnam', 'VN', NULL, NULL),
(234, 'Virgin Islands (British)', 'VG', NULL, NULL),
(235, 'Virgin Islands (U.S.)', 'VI', NULL, NULL),
(236, 'Wallis and Futuna Islands', 'WF', NULL, NULL),
(237, 'Western Sahara', 'EH', NULL, NULL),
(238, 'Yemen', 'YE', NULL, NULL),
(239, 'Yugoslavia', 'YU', NULL, NULL),
(240, 'Zaire', 'ZR', NULL, NULL),
(241, 'Zambia', 'ZM', NULL, NULL),
(242, 'Zimbabwe', 'ZW', NULL, NULL),
(243, 'Rest Of The World', 'RES', NULL, NULL);

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
(19, '2023_10_23_130016_create_shipping_charges_table', 4);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `company`, `address`, `apartment`, `city`, `state`, `subtotal`, `shipping`, `coupon_code`, `discount`, `grand_total`, `created_at`, `updated_at`, `country_id`) VALUES
(1, 1, 'Muhammad', 'Saad Khan', 'saad@gmail.com', '03212334565', 'Saad Enterprise', 'ABC-90', 'liaqtabad 17 number near bakery plot number 1789', 'Karachi', 'Karachi', 6000.00, 0.00, NULL, NULL, 6000.00, '2023-10-23 07:40:37', '2023-10-23 07:40:37', 10);

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
(1, 1, 9, 'Silver Byron Watch', 1, 6000.00, 6000.00, '2023-10-23 07:40:37', '2023-10-23 07:40:37');

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
(1, 'Smart Watch', 'smart-watch', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 5000.00, 5999.00, 3, 5, 1, 'Yes', '001', NULL, 'Yes', 7, '{\"id\":1,\"title\":\"Smart Watch\",\"slug\":\"smart-watch\",\"description\":\"<p><span style=\\\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\/span><br><\\/p>\",\"short_description\":\"<p><span style=\\\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\\\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.<\\/span><br><\\/p>\",\"price\":5000,\"compare_price\":5999,\"category_id\":3,\"sub_category_id\":5,\"brand_id\":1,\"is_featured\":\"Yes\",\"sku\":\"001\",\"barcode\":null,\"track_qty\":\"Yes\",\"qty\":7,\"related_products\":\"{\\\"id\\\":1,\\\"title\\\":\\\"Smart Watch\\\",\\\"slug\\\":\\\"smart-watch\\\",\\\"description\\\":\\\"<p><span style=\\\\\\\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\\\\\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\\\\\/span><br><\\\\\\/p>\\\",\\\"short_description\\\":\\\"<p><span style=\\\\\\\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\\\\\\\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.<\\\\\\/span><br><\\\\\\/p>\\\",\\\"price\\\":5000,\\\"compare_price\\\":5999,\\\"category_id\\\":3,\\\"sub_category_id\\\":5,\\\"brand_id\\\":1,\\\"is_featured\\\":\\\"Yes\\\",\\\"sku\\\":\\\"001\\\",\\\"barcode\\\":null,\\\"track_qty\\\":\\\"Yes\\\",\\\"qty\\\":7,\\\"related_products\\\":\\\"5,1,4\\\",\\\"status\\\":1,\\\"created_at\\\":\\\"2023-10-22T11:55:23.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-22T12:31:04.000000Z\\\"},{\\\"id\\\":4,\\\"title\\\":\\\"Red Digital Smart Watch\\\",\\\"slug\\\":\\\"red-digital-smart-watch\\\",\\\"description\\\":\\\"<p><span style=\\\\\\\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\\\\\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\\\\\/span><br><\\\\\\/p>\\\",\\\"short_description\\\":\\\"<p><span style=\\\\\\\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\\\\\\\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.<\\\\\\/span><br><\\\\\\/p>\\\",\\\"price\\\":30000,\\\"compare_price\\\":29999,\\\"category_id\\\":3,\\\"sub_category_id\\\":5,\\\"brand_id\\\":1,\\\"is_featured\\\":\\\"Yes\\\",\\\"sku\\\":\\\"004\\\",\\\"barcode\\\":null,\\\"track_qty\\\":\\\"Yes\\\",\\\"qty\\\":15,\\\"related_products\\\":\\\"\\\",\\\"status\\\":1,\\\"created_at\\\":\\\"2023-10-22T12:00:27.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-22T12:31:17.000000Z\\\"},{\\\"id\\\":5,\\\"title\\\":\\\"Timex Unisex Originals\\\",\\\"slug\\\":\\\"timex-unisex-originals\\\",\\\"description\\\":\\\"<p><span style=\\\\\\\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\\\\\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\\\\\/span><br><\\\\\\/p>\\\",\\\"short_description\\\":\\\"<p><span style=\\\\\\\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\\\\\\\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.<\\\\\\/span><br><\\\\\\/p>\\\",\\\"price\\\":2000,\\\"compare_price\\\":2699,\\\"category_id\\\":3,\\\"sub_category_id\\\":5,\\\"brand_id\\\":null,\\\"is_featured\\\":\\\"Yes\\\",\\\"sku\\\":\\\"005\\\",\\\"barcode\\\":null,\\\"track_qty\\\":\\\"Yes\\\",\\\"qty\\\":15,\\\"related_products\\\":\\\"\\\",\\\"status\\\":1,\\\"created_at\\\":\\\"2023-10-22T12:11:22.000000Z\\\",\\\"updated_at\\\":\\\"2023-10-22T12:11:31.000000Z\\\"}\",\"status\":1,\"created_at\":\"2023-10-22T11:55:23.000000Z\",\"updated_at\":\"2023-10-22T12:42:59.000000Z\"},{\"id\":4,\"title\":\"Red Digital Smart Watch\",\"slug\":\"red-digital-smart-watch\",\"description\":\"<p><span style=\\\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\\/span><br><\\/p>\",\"short_description\":\"<p><span style=\\\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\\\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.<\\/span><br><\\/p>\",\"price\":30000,\"compare_price\":29999,\"category_id\":3,\"sub_category_id\":5,\"brand_id\":1,\"is_featured\":\"Yes\",\"sku\":\"004\",\"barcode\":null,\"track_qty\":\"Yes\",\"qty\":15,\"related_products\":\"\",\"status\":1,\"created_at\":\"2023-10-22T12:00:27.000000Z\",\"updated_at\":\"2023-10-22T12:31:17.000000Z\"}', 1, '2023-10-22 06:55:23', '2023-10-22 07:50:20'),
(2, 'Joemalone Jasmine', 'joemalone-jasmine', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 4500.00, NULL, 4, 3, NULL, 'Yes', '002', NULL, 'Yes', 3, '', 1, '2023-10-22 06:57:05', '2023-10-22 07:01:46'),
(3, 'Air max 95', 'air-max-95', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 12000.00, 11500.00, 3, 4, 4, 'Yes', '003', NULL, 'Yes', 20, '', 1, '2023-10-22 06:59:09', '2023-10-22 07:02:47'),
(4, 'Red Digital Smart Watch', 'red-digital-smart-watch', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 30000.00, 29999.00, 3, 5, 1, 'Yes', '004', NULL, 'Yes', 15, '', 1, '2023-10-22 07:00:27', '2023-10-22 07:31:17'),
(5, 'Timex Unisex Originals', 'timex-unisex-originals', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 2000.00, 2699.00, 3, 5, NULL, 'Yes', '005', NULL, 'Yes', 15, '', 1, '2023-10-22 07:11:22', '2023-10-22 07:11:31'),
(6, 'Simple Cotton T-shirt', 'simple-cotton-t-shirt', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 1000.00, 1299.00, 3, 2, 3, 'Yes', '006', NULL, 'Yes', 7, '', 1, '2023-10-22 07:14:31', '2023-10-22 07:14:31'),
(7, 'Air Jordan 12 gym red-2', 'air-jordan-12-gym-red-2', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 30000.00, 35999.00, 3, 4, 4, 'Yes', '007', NULL, 'Yes', 20, '', 1, '2023-10-22 07:16:46', '2023-10-22 07:16:46'),
(8, 'Kui Ye Chen’s AirPods', 'kui-ye-chens-airpods', '<p><span style=\"color: rgb(108, 117, 125); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', '<p><span style=\"color: rgb(33, 37, 41); font-family: &quot;Libre Franklin&quot;, sans-serif; font-size: 13.6px; background-color: rgb(248, 249, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</span><br></p>', 9000.00, 0.00, 5, 6, 1, 'Yes', '008', NULL, 'Yes', 5, '', 1, '2023-10-22 07:18:29', '2023-10-22 07:21:31'),
(9, 'Silver Byron Watch', 'silver-byron-watch', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.<br></p>', 6000.00, NULL, 3, 5, 5, 'No', '009', NULL, 'Yes', 15, '', 1, '2023-10-22 07:36:30', '2023-10-22 07:36:40'),
(10, 'Black DSLR 50 mm lense', 'black-dslr-50-mm-lense', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', NULL, 50000.00, 55000.00, 5, NULL, 6, 'No', '011', NULL, 'Yes', 30, '', 1, '2023-10-22 07:37:46', '2023-10-22 07:59:55'),
(11, 'Black DSLR lense', 'black-dslr-lense', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p><div><br></div>', 30000.00, NULL, 5, 7, NULL, 'No', '012', NULL, 'Yes', 10, '', 1, '2023-10-22 07:57:13', '2023-10-22 07:57:13'),
(12, 'Gray Nike running shoes', 'gray-nike-running-shoes', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><div><br></div>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p><div><br></div>', 25000.00, NULL, 3, 4, 4, 'No', '013', NULL, 'Yes', 15, '', 1, '2023-10-22 07:58:40', '2023-10-22 07:58:40');

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
(4, 4, '4-4-1697976027.jpg', NULL, '2023-10-22 07:00:27', '2023-10-22 07:00:27'),
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
(18, 4, '4-18-1697978775.jpg', NULL, '2023-10-22 07:46:15', '2023-10-22 07:46:15'),
(19, 4, '4-19-1697978776.jpg', NULL, '2023-10-22 07:46:16', '2023-10-22 07:46:16'),
(20, 4, '4-20-1697978781.jpg', NULL, '2023-10-22 07:46:21', '2023-10-22 07:46:21'),
(21, 4, '4-21-1697978783.jpg', NULL, '2023-10-22 07:46:23', '2023-10-22 07:46:23'),
(22, 1, '1-22-1697979013.jpg', NULL, '2023-10-22 07:50:13', '2023-10-22 07:50:13'),
(23, 1, '1-23-1697979014.jpg', NULL, '2023-10-22 07:50:14', '2023-10-22 07:50:14'),
(24, 1, '1-24-1697979015.jpg', NULL, '2023-10-22 07:50:15', '2023-10-22 07:50:15'),
(25, 1, '1-25-1697979016.jpg', NULL, '2023-10-22 07:50:16', '2023-10-22 07:50:16'),
(26, 11, '11-26-1697979433.jpg', NULL, '2023-10-22 07:57:13', '2023-10-22 07:57:13'),
(27, 12, '12-27-1697979520.jpg', NULL, '2023-10-22 07:58:40', '2023-10-22 07:58:40');

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
(7, '164', 150.00, '2023-10-24 14:34:11', '2023-10-24 14:34:34'),
(8, '1', 250.00, '2023-10-24 14:34:27', '2023-10-24 14:34:27');

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
(25, '1697979687.jpg', '2023-10-22 08:01:27', '2023-10-22 08:01:27');

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
(1, 'saad', 'saad@gmail.com', NULL, '12345678901', '$2y$10$shkxIDJvcw1BAiJ2iPpxuOdWMlnpHliFEED77NcVOJKznnVULmdZS', 'user', NULL, '2023-10-21 09:34:15', '2023-10-21 09:34:15'),
(2, 'hamza', 'hamza@gmail.com', NULL, '12345678909', '$2a$04$AgBhfabyNyA88rOCql5ZUewiuUgWoszqOhJRVoURNJcTYXYAjr7mK', 'admin', NULL, NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `temp_images`
--
ALTER TABLE `temp_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
