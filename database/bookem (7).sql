-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 22, 2022 at 10:58 AM
-- Server version: 5.7.33
-- PHP Version: 8.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookem`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Appointments, Anytime', 'Book services instantly through the Book3m App and avoid the back-and-forth phone calls during business hours.', '/uploaded/about/1649880830_62572efe67763.png', '2022-02-19 03:16:38', '2022-04-13 14:13:50'),
(3, 'Look Around', 'Book3m makes it easy to find appointments with local beauty, wellness, and health professionals. Find your favorite spot or discover new businesses through our marketplace.', '/uploaded/about/1649880646_62572e467c2e4.png', '2022-02-19 03:32:54', '2022-04-13 14:14:21'),
(4, 'Get Notified', 'Automated reminders ensure you never forget upcoming appointments. Use the app to change and manage your appointment.', '/uploaded/about/1649880910_62572f4eedd9d.png', '2022-04-13 14:15:10', '2022-04-13 14:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `admin__reviews`
--

CREATE TABLE `admin__reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin__reviews`
--

INSERT INTO `admin__reviews` (`id`, `customer_name`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sotoallure', '/uploaded/admin/review/1650185744_625bd61053635.jpeg', 'The holidays are over, and it’s officially that phase of winter where we start counting down the days until spring. And being in the thick of winter means the arrival of the much-dreaded winter hair', 1, '2022-04-17 02:55:44', '2022-04-17 02:56:44'),
(2, 'OB Waves Salon', '/uploaded/admin/review/1650185864_625bd688a246f.jpeg', '<p>Popular men’s hairstyles tend to evolve, rather than quickly change season to season. Still, it can be difficult to keep track of the trendiest looks.Before you fully commit to a new ‘do, consider</p>', 1, '2022-04-17 02:57:44', '2022-04-17 02:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `all_service_cupons`
--

CREATE TABLE `all_service_cupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promocode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` double NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parking_space` int(11) DEFAULT NULL,
  `wifi` int(11) DEFAULT NULL,
  `credit_card_accept` int(11) DEFAULT NULL,
  `disability` int(11) DEFAULT NULL,
  `child_friendly` int(11) DEFAULT NULL,
  `pets_allowed` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `user_id`, `parking_space`, `wifi`, `credit_card_accept`, `disability`, `child_friendly`, `pets_allowed`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 1, 1, 1, 1, '2022-04-15 23:48:31', '2022-04-16 02:12:16'),
(2, 2, 1, 1, 1, 1, 1, 1, '2022-04-16 03:34:50', '2022-04-16 03:34:50'),
(3, 4, 1, 1, 1, 1, 1, 1, '2022-04-16 03:51:02', '2022-04-16 03:51:02'),
(4, 5, 1, 1, 1, 1, 1, 1, '2022-04-16 04:15:14', '2022-04-16 04:15:14'),
(5, 6, 1, 1, 1, 1, 1, 1, '2022-04-16 04:33:53', '2022-04-16 04:33:53'),
(6, 7, 1, 1, 1, 1, 1, 1, '2022-04-16 04:46:46', '2022-04-16 04:46:46'),
(7, 8, 1, 1, 1, 1, 1, 1, '2022-04-16 07:56:36', '2022-04-16 07:56:36'),
(8, 9, 1, 1, 1, 1, 1, NULL, '2022-04-16 08:07:30', '2022-04-16 08:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `ic_id` int(11) DEFAULT NULL,
  `service_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `booking_fee` double DEFAULT NULL,
  `travel_fee` double DEFAULT NULL,
  `promocode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promocode_discount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_transaction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `payable_amount` decimal(10,0) DEFAULT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cardexp_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cardexp_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_cvv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `appointment_no`, `user_id`, `provider_id`, `ic_id`, `service_location`, `address`, `latitude`, `longitude`, `subtotal`, `booking_fee`, `travel_fee`, `promocode`, `promocode_discount`, `date`, `start_time`, `end_time`, `payment_id`, `payment_type`, `payment_method`, `balance_transaction`, `currency`, `amount`, `payable_amount`, `card_number`, `cardexp_month`, `cardexp_year`, `card_cvv`, `payment_status`, `service_status`, `created_at`, `updated_at`) VALUES
(1, '22041701', 15, 2, 10, '2', 'Dhaka University, Nilkhet Road, Dhaka, Bangladesh', '23.7338448', '90.39287', 75, 0, 87, 'N/A', 0, '2022-04-17', '2022-04-17 15:00:00', '2022-04-17 15:00:00', 'ch_3KpYovJCIneuWHgB0cX8N0FL', 'Stripe', 'card_1KpYouJCIneuWHgBB3KcnygQ', 'txn_3KpYovJCIneuWHgB0b7Zfgpq', 'usd', '162.00', '162', NULL, NULL, NULL, NULL, '1', '0', '2022-04-17 19:11:21', '2022-05-24 03:53:07'),
(2, '22041702', 15, 2, 10, '2', 'Dhaka University, Nilkhet Road, Dhaka, Bangladesh', '23.7338448', '90.39287', 75, 0, 87, 'N/A', 0, '2022-04-17', '2022-04-17 15:05:00', '2022-04-17 15:05:00', 'ch_3KpYtCJCIneuWHgB15F4L74E', 'Stripe', 'card_1KpYtBJCIneuWHgBleFAFNlS', 'txn_3KpYtCJCIneuWHgB174AhWsZ', 'usd', '162.00', '162', NULL, NULL, NULL, NULL, '1', '2', '2022-04-17 19:15:47', '2022-04-17 19:28:27'),
(3, '22041703', 15, 2, 10, '2', 'Dhaka College, New Market, Dhaka, Bangladesh', '23.7355796', '90.3837064', 75, 0, 88, 'N/A', 0, '2022-04-17', '2022-04-17 15:10:00', '2022-04-17 15:10:00', 'ch_3KpYzKJCIneuWHgB0YZW0h7L', 'Stripe', 'card_1KpYzIJCIneuWHgBTmAD53WD', 'txn_3KpYzKJCIneuWHgB04mj9Tp4', 'usd', '163.00', '163', NULL, NULL, NULL, NULL, '1', '0', '2022-04-17 19:22:06', '2022-04-17 19:22:06'),
(4, '22041704', 14, 2, NULL, '2', '12 Picket Post Close, Winkfield Row, Bracknell', '51.4086295', '-0.7214513', 30, 0, 63, 'N/A', 0, '2022-04-20', '2022-04-20 15:25:00', '2022-04-20 17:10:00', 'ch_3KpfFoJCIneuWHgB111QHgIs', 'Stripe', 'card_1KpfFmJCIneuWHgB1N5lNMEP', 'txn_3KpfFoJCIneuWHgB1iBdOZrE', 'usd', '93.00', '93', NULL, NULL, NULL, NULL, '1', '0', '2022-04-18 02:03:32', '2022-04-18 02:03:32'),
(5, '22041705', 14, 2, NULL, '2', '12 Picket Post Close, Winkfield Row, Bracknell', '51.4086295', '-0.7214513', 30, 0, 63, 'N/A', 0, '2022-04-20', '2022-04-20 15:25:00', '2022-04-20 17:10:00', 'ch_3KpfHSJCIneuWHgB15bAvIjO', 'Stripe', 'card_1KpfHQJCIneuWHgBJyZLsXQg', 'txn_3KpfHSJCIneuWHgB1vSL1GWq', 'usd', '93.00', '93', NULL, NULL, NULL, NULL, '1', '0', '2022-04-18 02:05:14', '2022-04-18 02:05:14'),
(6, '22041706', 14, 2, NULL, '2', '12 Picket Post Close, Winkfield Row, Bracknell', '51.4086295', '-0.7214513', 30, 0, 63, 'N/A', 0, '2022-04-20', '2022-04-20 15:25:00', '2022-04-20 17:10:00', 'ch_3KpfUwJCIneuWHgB0wMTFPG9', 'Stripe', 'card_1KpfUuJCIneuWHgBojvXgdbF', 'txn_3KpfUwJCIneuWHgB0xbTx47p', 'usd', '93.00', '93', NULL, NULL, NULL, NULL, '1', '0', '2022-04-18 02:19:10', '2022-04-18 02:19:10'),
(7, '22041907', 14, 2, 10, '2', '12th Knot, Upper Ground, London', '51.5085361', '-0.1063', 260, 0, 64, 'N/A', 0, '2022-05-06', '2022-05-06 15:30:00', '2022-05-06 23:00:00', 'ch_3KqCJIJCIneuWHgB1avWWBXl', 'Stripe', 'card_1KqCJGJCIneuWHgBg17I33VT', 'txn_3KqCJIJCIneuWHgB1q2lVgQ6', 'usd', '324.00', '324', NULL, NULL, NULL, NULL, '1', '0', '2022-04-19 13:21:20', '2022-04-19 13:21:20'),
(8, '22041908', 14, 2, NULL, '2', NULL, '0', '0', 260, 0, 0, 'N/A', 0, '2022-04-29', '2022-04-29 15:30:00', '2022-04-29 23:00:00', 'ch_3KqCKXJCIneuWHgB1N9eitGW', 'Stripe', 'card_1KqCKVJCIneuWHgBsCsObx3u', 'txn_3KqCKXJCIneuWHgB1Q5UENIa', 'usd', '260.00', '260', NULL, NULL, NULL, NULL, '1', '0', '2022-04-19 13:22:37', '2022-04-19 13:22:37'),
(9, '22041909', 14, 2, NULL, '2', '30 No. East Madarbari Ward, Chattogram, Bangladesh', '22.3279941', '91.8281763', 260, 0, 129, 'N/A', 0, '2022-04-28', '2022-04-28 19:10:00', '2022-04-29 02:40:00', 'ch_3KqCRjJCIneuWHgB1qI89cZ6', 'Stripe', 'card_1KqCRhJCIneuWHgBAxa0K1IT', 'txn_3KqCRjJCIneuWHgB1D2eualJ', 'usd', '389.00', '389', NULL, NULL, NULL, NULL, '1', '0', '2022-04-19 13:30:03', '2022-04-19 13:30:03'),
(10, '22041910', 14, 3, NULL, '2', NULL, '0', '0', 60, 0, 0, 'N/A', 0, '2022-04-27', '2022-04-27 15:45:00', '2022-04-27 16:05:00', 'ch_3KqCj7JCIneuWHgB0NyqYL5R', 'Stripe', 'card_1KqCj5JCIneuWHgBpFD1vcoH', 'txn_3KqCj7JCIneuWHgB0ydp7GO8', 'usd', '60.00', '60', NULL, NULL, NULL, NULL, '1', '0', '2022-04-19 13:48:02', '2022-04-19 13:48:02'),
(11, '22041911', 14, 3, NULL, '2', NULL, '0', '0', 60, 0, 0, 'N/A', 0, '2022-04-27', '2022-04-27 15:45:00', '2022-04-27 16:05:00', 'ch_3KqCl8JCIneuWHgB0zVFwaf3', 'Stripe', 'card_1KqCl6JCIneuWHgBDDyEG6Ut', 'txn_3KqCl8JCIneuWHgB0q8AyN0n', 'usd', '60.00', '60', NULL, NULL, NULL, NULL, '1', '0', '2022-04-19 13:50:06', '2022-04-19 13:50:06'),
(12, '22042012', 14, 3, NULL, '2', NULL, '0', '0', 70, 0, 0, 'N/A', 0, '2022-04-23', '2022-04-23 16:00:00', '2022-04-23 17:20:00', 'ch_3KqRk5JCIneuWHgB1Smq1XCo', 'Stripe', 'card_1KqRk3JCIneuWHgBl3YocrDl', 'txn_3KqRk5JCIneuWHgB1iRNlgIL', 'usd', '70.00', '70', NULL, NULL, NULL, NULL, '1', '0', '2022-04-20 05:50:01', '2022-04-20 05:50:01'),
(13, '22051513', 14, 2, NULL, '2', NULL, '0', '0', 150, 0, 100, 'N/A', 0, '2022-05-17', '2022-05-16 19:08:00', '2022-05-16 22:43:00', 'ch_3KzoAwJCIneuWHgB02Z88SlG', 'Stripe', 'card_1KzoAuJCIneuWHgBrWsXvgns', 'txn_3KzoAwJCIneuWHgB0QtpnHmB', 'usd', '250.00', '250', NULL, NULL, NULL, NULL, '1', '0', '2022-05-15 14:36:30', '2022-05-15 14:36:30'),
(14, '22051514', 14, 2, NULL, '2', NULL, '0', '0', 150, 0, 100, 'N/A', 0, '2022-05-17', '2022-05-16 19:13:00', '2022-05-16 22:48:00', 'ch_3KzoGpJCIneuWHgB0tdCBdmf', 'Stripe', 'card_1KzoGoJCIneuWHgB6JkeJkWq', 'txn_3KzoGpJCIneuWHgB0Se7PmFf', 'usd', '250.00', '250', NULL, NULL, NULL, NULL, '1', '0', '2022-05-15 14:42:32', '2022-05-15 14:42:32'),
(15, '22051515', 14, 2, NULL, '2', NULL, NULL, NULL, 150, 0, 100, 'N/A', 0, '2022-05-17', '2022-05-16 19:18:00', '2022-05-16 22:53:00', 'ch_3KzqDxJCIneuWHgB0egSjHPy', 'Stripe', 'card_1KzqDwJCIneuWHgBHy6Ev7Mw', 'txn_3KzqDxJCIneuWHgB0CcicjiZ', 'usd', '250.00', '250', NULL, NULL, NULL, NULL, '1', '0', '2022-05-15 16:47:42', '2022-05-15 16:47:42'),
(16, '22051516', 14, 2, NULL, '2', NULL, NULL, NULL, 75, 0, 100, 'N/A', 0, '2022-05-17', '2022-05-16 21:28:00', '2022-05-16 22:58:00', 'ch_3KzqG4JCIneuWHgB1H6VWW2n', 'Stripe', 'card_1KzqG3JCIneuWHgBcvzk0LgH', 'txn_3KzqG4JCIneuWHgB1VSLk5aQ', 'usd', '175.00', '175', NULL, NULL, NULL, NULL, '1', '0', '2022-05-15 16:49:53', '2022-05-15 16:49:53'),
(17, '22051817', 14, 2, NULL, '2', 'unnamed road, Shahidbagh, Dhaka - 1217, Bangladesh', '23.7442126', '90.4211816', 105, 0, 90, 'N/A', 0, '2022-05-24', '2022-05-23 19:08:00', '2022-05-23 22:23:00', 'ch_3L0tlIJCIneuWHgB1rbKTT93', 'Stripe', 'card_1L0tkaJCIneuWHgBLYAT2N7I', 'txn_3L0tlIJCIneuWHgB1xaBWxzx', 'usd', '195.00', '195', NULL, NULL, NULL, NULL, '1', '0', '2022-05-18 14:46:31', '2022-05-18 14:46:31'),
(18, '22051818', 14, 2, NULL, '2', 'unnamed road, Shahidbagh, Dhaka - 1217, Bangladesh', '23.7443041', '90.4210561', 75, 0, 90, 'N/A', 0, '2022-05-24', '2022-05-23 20:58:00', '2022-05-23 22:28:00', 'ch_3L0tqZJCIneuWHgB1LCwDuyW', 'Stripe', 'card_1L0tqXJCIneuWHgBSy2HWNfw', 'txn_3L0tqZJCIneuWHgB1EeEnAQL', 'usd', '165.00', '165', NULL, NULL, NULL, NULL, '1', '2', '2022-05-18 14:51:55', '2022-05-24 03:52:14'),
(19, '22051819', 14, 2, NULL, '2', 'unnamed road, Shahidbagh, Dhaka - 1217, Bangladesh', '23.7442004', '90.4211774', 75, 0, 90, 'N/A', 0, '2022-05-22', '2022-05-21 20:06:00', '2022-05-21 21:36:00', 'ch_3L0txGJCIneuWHgB0wxTgV2t', 'Stripe', 'card_1L0txFJCIneuWHgBnSrsR7Lf', 'txn_3L0txGJCIneuWHgB0ecz9Ceq', 'usd', '165.00', '165', NULL, NULL, NULL, NULL, '1', '3', '2022-05-18 14:58:51', '2022-05-18 14:58:51'),
(20, '22051820', 14, 2, NULL, '2', 'unnamed road, Shahidbagh, Dhaka - 1217, Bangladesh', '23.744181', '90.4211943', 75, 0, 90, 'N/A', 0, '2022-06-12', '2022-06-11 20:06:00', '2022-06-11 22:41:00', 'ch_3L0uGRJCIneuWHgB050pc4Ol', 'Stripe', 'card_1L0uGQJCIneuWHgBQv1bxWm4', 'txn_3L0uGRJCIneuWHgB0TSOevfy', 'usd', '165.00', '165', NULL, NULL, NULL, NULL, '1', '2', '2022-05-18 15:18:40', '2022-05-22 02:04:29'),
(21, '22061221', 14, 2, NULL, '2', NULL, '0', '0', 99, 0, 0, 'N/A', 0, '2022-06-12', '2022-06-11 22:06:00', '2022-06-12 00:41:00', 'ch_3L9o9BJCIneuWHgB1h2hFmGi', 'Stripe', 'card_1L9o99JCIneuWHgBZ9U4n4Jq', 'txn_3L9o9BJCIneuWHgB1rrAW9X6', 'usd', '99.00', '99', NULL, NULL, NULL, NULL, '1', '0', '2022-06-12 04:33:31', '2022-06-12 04:33:31'),
(29, '22061322', 14, 2, NULL, '2', NULL, '0', '0', 110, 0, 0, 'N/A', 10, '2022-06-14', '2022-06-13 20:06:00', '2022-06-13 22:41:00', 'ch_3LA9xpJCIneuWHgB1rJTTd4t', 'Stripe', 'card_1LA9xoJCIneuWHgBPyswBDQH', 'txn_3LA9xpJCIneuWHgB1FYQWIS3', 'usd', '100.00', '100', NULL, NULL, NULL, NULL, '1', '0', '2022-06-13 03:51:13', '2022-06-13 03:51:13'),
(30, '22061423', 14, 2, NULL, '2', NULL, '0', '0', 75, 0, 0, 'N/A', 0, '2022-06-14', '2022-06-14 08:25:00', '2022-06-14 09:55:00', 'ch_3LAYDIJCIneuWHgB0GBizhKA', 'Stripe', 'card_1LAYDGJCIneuWHgBpufQp4S1', 'txn_3LAYDIJCIneuWHgB0AAab0Wv', 'usd', '75.00', '75', NULL, NULL, NULL, NULL, '1', '0', '2022-06-14 05:44:46', '2022-06-14 05:44:46'),
(31, '22061624', 14, 10, NULL, '2', NULL, '0', '0', 75, 0, 0, 'N/A', 0, '2022-06-16', '2022-06-15 20:06:00', '2022-06-15 21:35:00', 'ch_3LBGjuJCIneuWHgB1HdOdi7b', 'Stripe', 'card_1LBGjtJCIneuWHgBhx1pFVsa', 'txn_3LBGjuJCIneuWHgB1etRgsfH', 'usd', '75.00', '75', NULL, NULL, NULL, NULL, '1', '0', '2022-06-16 05:17:21', '2022-06-16 05:17:21'),
(32, '22061625', 14, 10, 10, NULL, NULL, '0', '0', 100, 0, 0, 'N/A', 0, '2022-06-16', '2022-06-15 22:16:00', '2022-06-15 23:20:00', 'ch_3LBHaQJCIneuWHgB0SNsP85b', 'Stripe', 'card_1LBHaOJCIneuWHgBgq5pLnXQ', 'txn_3LBHaQJCIneuWHgB04mJsN1F', 'usd', '100.00', '100', NULL, NULL, NULL, NULL, '1', '0', '2022-06-16 06:11:35', '2022-06-16 06:11:35'),
(33, '22062226', 14, 58, NULL, NULL, 'Chittagong, Bangladesh', '22.356851', '91.7831819', 100, 0, 0, 'N/A', 0, '2022-06-22', '2022-06-21 19:08:00', '2022-06-21 19:37:00', 'ch_3LDMrjJCIneuWHgB0sUaxIFW', 'Stripe', 'card_1LDMrhJCIneuWHgBZAdSfMLI', 'txn_3LDMrjJCIneuWHgB027L1tWS', 'usd', '100.00', '100', NULL, NULL, NULL, NULL, '1', '0', '2022-06-22 00:13:56', '2022-06-22 04:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_items`
--

CREATE TABLE `appointment_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `discount_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_items`
--

INSERT INTO `appointment_items` (`id`, `employee_id`, `appointment_id`, `service_id`, `price`, `qty`, `discount_price`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, 75, 1, 0, '2022-04-17 19:11:21', '2022-04-17 19:11:21'),
(2, NULL, 2, 1, 75, 1, 0, '2022-04-17 19:15:47', '2022-04-17 19:15:47'),
(3, NULL, 3, 1, 75, 1, 0, '2022-04-17 19:22:06', '2022-04-17 19:22:06'),
(4, NULL, 4, 9, 30, 1, 0, '2022-04-18 02:03:32', '2022-04-18 02:03:32'),
(5, NULL, 5, 9, 30, 1, 0, '2022-04-18 02:05:14', '2022-04-18 02:05:14'),
(6, NULL, 6, 9, 30, 1, 0, '2022-04-18 02:19:10', '2022-04-18 02:19:10'),
(7, NULL, 7, 1, 75, 1, 0, '2022-04-19 13:21:20', '2022-04-19 13:21:20'),
(8, NULL, 7, 2, 75, 1, 0, '2022-04-19 13:21:20', '2022-04-19 13:21:20'),
(9, NULL, 7, 7, 35, 1, 0, '2022-04-19 13:21:20', '2022-04-19 13:21:20'),
(10, NULL, 7, 8, 45, 1, 0, '2022-04-19 13:21:20', '2022-04-19 13:21:20'),
(11, NULL, 7, 9, 30, 1, 0, '2022-04-19 13:21:20', '2022-04-19 13:21:20'),
(12, NULL, 8, 1, 75, 1, 0, '2022-04-19 13:22:37', '2022-04-19 13:22:37'),
(13, NULL, 8, 2, 75, 1, 0, '2022-04-19 13:22:37', '2022-04-19 13:22:37'),
(14, NULL, 8, 7, 35, 1, 0, '2022-04-19 13:22:37', '2022-04-19 13:22:37'),
(15, NULL, 8, 8, 45, 1, 0, '2022-04-19 13:22:37', '2022-04-19 13:22:37'),
(16, NULL, 8, 9, 30, 1, 0, '2022-04-19 13:22:37', '2022-04-19 13:22:37'),
(17, NULL, 9, 1, 75, 1, 0, '2022-04-19 13:30:03', '2022-04-19 13:30:03'),
(18, NULL, 9, 2, 75, 1, 0, '2022-04-19 13:30:03', '2022-04-19 13:30:03'),
(19, NULL, 9, 7, 35, 1, 0, '2022-04-19 13:30:03', '2022-04-19 13:30:03'),
(20, NULL, 9, 8, 45, 1, 0, '2022-04-19 13:30:03', '2022-04-19 13:30:03'),
(21, NULL, 9, 9, 30, 1, 0, '2022-04-19 13:30:03', '2022-04-19 13:30:03'),
(22, NULL, 10, 13, 60, 1, 0, '2022-04-19 13:48:02', '2022-04-19 13:48:02'),
(23, NULL, 11, 13, 60, 1, 0, '2022-04-19 13:50:06', '2022-04-19 13:50:06'),
(24, NULL, 12, 3, 70, 1, 0, '2022-04-20 05:50:01', '2022-04-20 05:50:01'),
(25, NULL, 13, 1, 75, 1, 0, '2022-04-22 13:44:18', '2022-04-22 13:44:18'),
(26, NULL, 14, 1, 75, 1, 0, '2022-04-22 14:06:05', '2022-04-22 14:06:05'),
(27, NULL, 15, 1, 75, 1, 0, '2022-04-22 14:10:07', '2022-04-22 14:10:07'),
(28, NULL, 16, 1, 75, 1, 0, '2022-04-22 14:11:44', '2022-04-22 14:11:44'),
(29, NULL, 16, 2, 75, 1, 0, '2022-04-22 14:11:44', '2022-04-22 14:11:44'),
(30, NULL, 17, 21, 180, 1, 0, '2022-04-22 15:06:24', '2022-04-22 15:06:24'),
(31, NULL, 13, 1, 75, 1, 0, '2022-05-15 14:36:30', '2022-05-15 14:36:30'),
(32, NULL, 13, 2, 75, 1, 0, '2022-05-15 14:36:30', '2022-05-15 14:36:30'),
(33, NULL, 14, 1, 75, 1, 0, '2022-05-15 14:42:32', '2022-05-15 14:42:32'),
(34, NULL, 14, 2, 75, 1, 0, '2022-05-15 14:42:32', '2022-05-15 14:42:32'),
(35, NULL, 15, 1, 75, 1, 0, '2022-05-15 16:47:42', '2022-05-15 16:47:42'),
(36, NULL, 15, 2, 75, 1, 0, '2022-05-15 16:47:42', '2022-05-15 16:47:42'),
(37, NULL, 16, 1, 75, 1, 0, '2022-05-15 16:49:53', '2022-05-15 16:49:53'),
(38, NULL, 17, 9, 30, 1, 0, '2022-05-18 14:46:31', '2022-05-18 14:46:31'),
(39, NULL, 17, 1, 75, 1, 0, '2022-05-18 14:46:31', '2022-05-18 14:46:31'),
(40, NULL, 18, 1, 75, 1, 0, '2022-05-18 14:51:55', '2022-05-18 14:51:55'),
(41, NULL, 19, 1, 75, 1, 0, '2022-05-18 14:58:51', '2022-05-18 14:58:51'),
(42, NULL, 20, 1, 75, 1, 0, '2022-05-18 15:18:40', '2022-05-18 15:18:40'),
(43, 55, 21, 2, 67.5, 1, 0, '2022-06-12 04:33:31', '2022-06-12 04:33:31'),
(44, 55, 21, 7, 31.5, 1, 0, '2022-06-12 04:33:31', '2022-06-12 04:33:31'),
(45, 55, 22, 2, 65, 1, 0, '2022-06-13 00:59:41', '2022-06-13 00:59:41'),
(46, 57, 22, 7, 35, 1, 0, '2022-06-13 00:59:41', '2022-06-13 00:59:41'),
(47, 55, 23, 2, 65, 1, 0, '2022-06-13 01:22:31', '2022-06-13 01:22:31'),
(48, 57, 23, 7, 35, 1, 0, '2022-06-13 01:22:31', '2022-06-13 01:22:31'),
(49, 55, 24, 2, 65, 1, 0, '2022-06-13 01:25:13', '2022-06-13 01:25:13'),
(50, 57, 24, 7, 35, 1, 0, '2022-06-13 01:25:13', '2022-06-13 01:25:13'),
(51, 55, 25, 2, 65, 1, 10, '2022-06-13 02:58:39', '2022-06-13 02:58:39'),
(52, 57, 25, 7, 35, 1, 0, '2022-06-13 02:58:39', '2022-06-13 02:58:39'),
(53, 55, 26, 2, 65, 1, 10, '2022-06-13 03:08:21', '2022-06-13 03:08:21'),
(54, 57, 26, 7, 35, 1, 0, '2022-06-13 03:08:21', '2022-06-13 03:08:21'),
(55, 55, 27, 2, 65, 1, 10, '2022-06-13 03:12:08', '2022-06-13 03:12:08'),
(56, 57, 27, 7, 35, 1, 0, '2022-06-13 03:12:08', '2022-06-13 03:12:08'),
(57, 55, 28, 2, 65, 1, 10, '2022-06-13 03:34:15', '2022-06-13 03:34:15'),
(58, 57, 28, 7, 35, 1, 0, '2022-06-13 03:34:15', '2022-06-13 03:34:15'),
(59, 55, 29, 2, 65, 1, 10, '2022-06-13 03:51:13', '2022-06-13 03:51:13'),
(60, 57, 29, 7, 35, 1, 0, '2022-06-13 03:51:13', '2022-06-13 03:51:13'),
(61, 55, 30, 2, 75, 1, 0, '2022-06-14 05:44:46', '2022-06-14 05:44:46'),
(62, 55, 31, 2, 75, 1, 0, '2022-06-16 05:17:21', '2022-06-16 05:17:21'),
(63, 10, 32, 36, 100, 1, 0, '2022-06-16 06:11:35', '2022-06-16 06:11:35'),
(64, 58, 33, 38, 100, 1, 0, '2022-06-22 00:13:56', '2022-06-22 00:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1 = active, 0 = inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `category_id`, `title`, `slug`, `description`, `image`, `author`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 'At-Home Care and Styling Tips for Every Hair Type', 'at-home-care-and-styling-tips-for-every-hair-type', '<p><span style=\"color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 24px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">To best care for your hair in-between visits to the salon, it’s important to tailor your hair care and styling routine to your hair type. Your hair type is determined by your hair’s curl pattern, and typically falls into one of 4 categories: straight, wavy, curly, or coily. Within those categories, hair can vary in density from fine to thick, and in porosity (how well hair soaks up moisture).</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">That said, there are a few common hair care tips that apply to all hair types:&nbsp;</span></p><ol style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; list-style-position: initial; list-style-image: initial; padding-left: 20px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><li style=\"box-sizing: inherit; margin-bottom: 10px;\"><span style=\"box-sizing: inherit;\"><span style=\"box-sizing: inherit; font-weight: 700;\">Get regular&nbsp;<a href=\"https://booksy.com/en-us/s/haircut\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">haircuts</a>.</span>&nbsp;Some hair types can go a long time between trims without much damage. But it’s generally good to get regular haircuts to keep your ends fresh and prevent breakage.</span></li><li style=\"box-sizing: inherit; margin-bottom: 10px;\"><span style=\"box-sizing: inherit;\"><span style=\"box-sizing: inherit; font-weight: 700;\">Turn down the temp.</span>&nbsp;To prevent unnecessary moisture loss, wash your hair with lukewarm water instead of hot.&nbsp;</span></li><li style=\"box-sizing: inherit; margin-bottom: 0px;\"><span style=\"box-sizing: inherit;\"><span style=\"box-sizing: inherit; font-weight: 700;\">Evaluate your diet.</span>&nbsp;Make sure you are getting enough more&nbsp;<a href=\"https://www.healthline.com/health/tricks-healthier-fuller-hair\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">protein</a>&nbsp;(prevents brittleness and dryness), iron (makes hair grow faster), vitamin A (aids with natural oil production), vitamin C (aids in collagen production), and omega-3 fatty acids (keeps hair hydrated and improves scalp health)</span></li></ol><p><br></p>', '/uploaded/blog/1645075269_620ddb45a4a21.jpg', 1, 1, '2022-02-16 23:21:09', '2022-02-16 23:21:09'),
(4, 1, 2, '4 Tips to Help Grow and Maintain a Healthy Beard', '4-tips-to-help-grow-and-maintain-a-healthy-beard', '<p><span style=\"color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 24px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">There comes a time in the life of a man when he decides to grow a&nbsp;</span><a href=\"https://booksy.com/en-us/s/beard-trim\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial; font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 24px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">beard</a><span style=\"color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 24px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">. Maybe it’s something you’ve always wanted to try. Maybe you’ve just watched Chris Evans as Captain America in&nbsp;</span><em style=\"box-sizing: inherit; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 24px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">Avengers:</em><span style=\"color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 24px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">&nbsp;</span><i style=\"box-sizing: inherit; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 24px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">Infinity War</i><span style=\"color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 24px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">&nbsp;</span><a href=\"https://www.vox.com/2019/6/18/18523997/captain-america-beard-endgame-infinity-war\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial; font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 24px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">one too many times</a><span style=\"color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 24px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">.</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">Whatever the case, we’re here to help you grow a beard that is bound to impress. Check out these four tips on growing a beard, establishing a proper beard care routine, and maintaining your style.</p><h2 style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 34px; line-height: 42px; margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-family: Poppins, sans-serif; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span class=\"ez-toc-section\" id=\"tip-1-know-what-youre-getting-into\" style=\"box-sizing: inherit;\"></span><span style=\"box-sizing: inherit;\">Tip #1: Know What You’re Getting Into</span><span class=\"ez-toc-section-end\" style=\"box-sizing: inherit;\"></span></h2><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">Before taking the plunge into the unknown, start by asking yourself&nbsp;<span style=\"box-sizing: inherit;\">a few questions, namely:&nbsp;<em style=\"box-sizing: inherit;\">What kind of beard do I want? Do I have the right hair texture and face shape for this beard? How much aftercare will this beard require and am I up for it?</em></span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">A beard is a commitment, and these questions will help ensure you’re committing to the right one. You might want a Jason Momoa beard, but if you don’t have time to regularly maintain it, it will look scraggly and unkempt. Or you might discover that your desired beard doesn’t compliment your face shape or hair texture.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">When it comes to maintenance, decide how much time you’re able to add to your regular grooming routine in order to keep your beard looking fresh and neat. You may also need to factor in more frequent trips to the&nbsp;<a href=\"https://booksy.com/blog/us/the-best-beard-style-pre-booking/\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">barber</a>, so don’t forget to consider both the time investment and cost. Finally, take into account the cost of any grooming products you will need to purchase (more on that later).</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit; font-weight: 700;\">Not sure what kind of beard suits you best? Book an appointment with a local barber in seconds on Booksy.</span></p><p><br></p>', '/uploaded/blog/1645075357_620ddb9d6705c.jpg', 1, 1, '2022-02-16 23:22:37', '2022-02-16 23:22:37'),
(5, 1, 2, 'Football-Inspired Looks to Show Off Your Super Bowl Style', 'football-inspired-looks-to-show-off-your-super-bowl-style', '<p><span style=\"color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 24px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">When you hear Super Bowl style, your mind probably goes right to the dazzling Halftime Show hair,&nbsp;</span><a href=\"https://booksy.com/en-us/s/makeup-artist\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial; font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 24px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">makeup</a><span style=\"color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 24px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">, and wardrobe. And while you probably don’t have a crew of makeup artists and stylists behind you, that doesn’t mean you can’t add some personal flair to the occasion.</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">Whether your team is in it to win it, or you’re just there for the snacks, Super Bowl Sunday is a great excuse to have fun, dress up, and show your team spirit. So if you’re ready to make your mark like that Super Bowl ad everyone’s talking about, keep reading.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">The keys to a standout Super Bowl look? Eye-catching hair, makeup, or nail art, paired with thoughtful accents and details. Read on for our top football-inspired looks that will add some special sauce to your Super Bowl Sunday.</p><h2 style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 34px; line-height: 42px; margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-family: Poppins, sans-serif; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span class=\"ez-toc-section\" id=\"eyes-on-the-prize\" style=\"box-sizing: inherit;\"></span><span style=\"box-sizing: inherit; font-weight: 700;\">Eyes on the Prize</span><span class=\"ez-toc-section-end\" style=\"box-sizing: inherit;\"></span></h2><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">This year, the Super Bowl gods have blessed us with some gorgeous eye makeup palettes. If you’re rooting for the Rams, you can achieve the signature&nbsp;<a href=\"https://www.youtube.com/watch?v=-ijCWaO5YPw\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">blue-and-gold</a>&nbsp;look by experimenting with contrasting eyeshadows, or even pairing an eyeshadow and liner in each shade. When working with such bright colors, use primer and a skin-tone base color to improve the pigment and longevity of your makeup. If you’re a Bengals fan, you know what to do: work those&nbsp;<a href=\"https://www.youtube.com/watch?v=8wuaXMp7uc0\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">tiger stripes</a>. For a dramatic shortcut, try adding orange eyeliner accents to charcoal eyeshadow, or pairing a black liner with orange eyeshadow. Complete the look with a bold orange-red lipstick.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">Not a super fan? Don’t even know the rules? Good news: you don’t have to pick sides with your team, or your style. For a look that screams&nbsp;<em style=\"box-sizing: inherit;\">I’m here for the snacks and friends but I also like to look the part,&nbsp;</em>you can do one of two things. Either choose one team palette for each eye, or choose one eye palette and pair it with hair or outfit accents in the other team’s colors.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">And if your team didn’t make it to the Super Bowl, don’t let that stop you from showing your support. Get inspired with these eye-makeup tutorials for the&nbsp;<a href=\"https://www.youtube.com/watch?v=5A_8II0Wy4g\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">Seahawks</a>,&nbsp;<a href=\"https://www.youtube.com/watch?v=TwFp8jflcHE\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">Steelers</a>,&nbsp;<a href=\"https://www.youtube.com/watch?v=ZFpZed6iw20\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">49ers</a>, and&nbsp;<a href=\"https://www.youtube.com/watch?v=KxbLU1i7LFA\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">Chiefs.</a>&nbsp;And if you’re feeling extra bold? Don’t forget the&nbsp;<a href=\"https://www.youtube.com/watch?v=dnzx5NgpIB8\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">eye black</a>.</p><p><br></p>', '/uploaded/blog/1645075906_620dddc2e0ae2.jpg', 1, 1, '2022-02-16 23:31:46', '2022-02-16 23:31:46'),
(6, 2, 2, '5 Valentine’s Day Gift Ideas for Everyone You Love', '5-valentines-day-gift-ideas-for-everyone-you-love', '<p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; font-size: 24px; line-height: 38px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">Shopping aisles are awash in red and pink, so you know it’s time to start working on your Valentine’s Day gifts. Whether you’re partnered or single, take this holiday as an opportunity to show some love to those you care about. And don’t forget: that includes you, too!</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">Sometimes, Valentine’s Day gift guides can be just a little too specific. This can be helpful, but it’s not always easy to find the exact fit for&nbsp;<em style=\"box-sizing: inherit;\">your&nbsp;</em>person. So this year, we’ve decided to focus on broad categories instead. This makes it a lot easier to narrow things down and choose something your loved one will actually love.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">Ready to get gifting? Read on for our favorite Valentine’s Day gift ideas for everyone on your list.</p><h2 style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 34px; line-height: 42px; margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-family: Poppins, sans-serif; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span class=\"ez-toc-section\" id=\"something-floral\" style=\"box-sizing: inherit;\"></span>Something Floral<span class=\"ez-toc-section-end\" style=\"box-sizing: inherit;\"></span></h2><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">If your Valentine loves flowers, of course you could go the traditional route and get them a gorgeous bouquet. Unfortunately, flowers don’t last forever. So if you want to gift your favorite person something a little more permanent – not to mention special – give them the gift of a hands-on floral arrangement workshop.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">This Valentine’s Day gift gets extra props for being interactive and very fun to do in person. But if you can’t find a local offering, all is not lost. Fortunately, there are plenty of virtual workshops through sites like&nbsp;<a href=\"https://www.skillshare.com/browse/flower-arranging\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">Skillshare</a>,&nbsp;<a href=\"https://www.udemy.com/courses/search/?q=Floral+Design\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">Udemy</a>, and even online&nbsp;<a href=\"https://www.thesprucecrafts.com/best-online-floral-design-classes-4847294\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">professional certifications</a>.</p>', '/uploaded/blog/1645075959_620dddf75e036.jpg', 2, 1, '2022-02-16 23:32:39', '2022-02-16 23:32:39'),
(7, 2, 2, '5 Original Valentine’s Day Date Ideas', '5-original-valentines-day-date-ideas', '<p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; font-size: 24px; line-height: 38px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">Valentine’s Day is just one day out of the year to show your appreciation to the ones you care about. But it’s also a great excuse to try something different or exciting for a change.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">Maybe you’re dating someone new and really want to impress them. Or you’re in a long-term relationship and feel stuck or out of fresh ideas. Or maybe you’re just looking for something fun to do with your friends.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">This Valentine’s Day, commit to spending quality time with your loved ones — even if you’re also giving them a gift! To help you do this, here are 5 Valentine’s Day date ideas for every style and budget.</p><h2 style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 34px; line-height: 42px; margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-family: Poppins, sans-serif; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span class=\"ez-toc-section\" id=\"go-dancing\" style=\"box-sizing: inherit;\"></span>Go Dancing<span class=\"ez-toc-section-end\" style=\"box-sizing: inherit;\"></span></h2><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">If you really want to impress your date, choose a classic activity like going out dancing. It’s easy to see why this romantic Valentine’s Day date idea is a perfect fit for the occasion. There are so many different options, whether you’re more into classic dance or just want to get your groove on under a disco ball.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">And if you have two left feet, there’s still hope! Dance lessons double as a great gift and a bonding experience, and they’re available in many different styles. Plus, you can build your confidence up to hit the dance floor come next Valentine’s Day.</p>', '/uploaded/blog/1645076013_620dde2d3d8d1.jpg', 2, 1, '2022-02-16 23:33:33', '2022-02-16 23:33:33'),
(8, 2, 2, '5 Great Galentine’s Day Activities to Celebrate Your BFFs', '5-great-galentines-day-activities-to-celebrate-your-bffs', '<p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; font-size: 24px; line-height: 38px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">Since it first appeared in a 2010 episode of&nbsp;</span><i style=\"box-sizing: inherit;\">Parks and Recreation</i><span style=\"box-sizing: inherit;\">, Galentine’s Day has quickly become a beloved new tradition. And along with that, there’s been a surge in creative Galentine’s Day activities,&nbsp;<a href=\"https://www.cosmopolitan.com/lifestyle/a17045558/galentines-valentines-day-party/\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">party ideas</a>, and merchandise.&nbsp;</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">Whether you’re single or paired up, it’s always a good occasion to celebrate the friends who have been by your side through thick and thin.&nbsp;</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">Galentine’s Day is celebrated on February 13th, which falls on a Sunday this year. So if your besties are long-distance or you just haven’t caught up in a while, you could even make Galentine’s a weekend affair.&nbsp;</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">Looking to show some appreciation to your BFFs? Read on for our 5 favorite Galentine’s Day activities.&nbsp;</span></p><h2 style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 34px; line-height: 42px; margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-family: Poppins, sans-serif; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span class=\"ez-toc-section\" id=\"brunch\" style=\"box-sizing: inherit;\"></span>Brunch<span class=\"ez-toc-section-end\" style=\"box-sizing: inherit;\"></span></h2><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">This is where it all began. Give a nod to Leslie Knope and her love of waffles by hosting your own Galentine’s Day weekend brunch. While you can always go out to a restaurant, brunch fare is also quite simple to make — so it’s a great opportunity to either host a party or organize a pitch-in. You’ll get more time to bond and also add your own flair.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><a href=\"https://www.surlatable.com/heart-shaped-egg-pancake-mold/PRO-6905491.html\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">Heart-shaped</a>&nbsp;pancakes and eggs? Pastel pink&nbsp;<a href=\"https://www.anthropologie.com/shop/waterfall-flute?category=FAMILY&amp;color=066&amp;quantity=1&amp;size=Flute&amp;type=STANDARD\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">champagne flutes</a>? There’s no better occasion to pull out all the stops and create an unapologetically cute, Instagram-worthy brunch spread.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">Not sure what to make? Here’s a list of mouth-watering&nbsp;<a href=\"https://www.goodhousekeeping.com/holidays/valentines-day-ideas/g30459063/valentines-day-breakfast-ideas/\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">brunch recipes</a>&nbsp;to send to your pals.</p>', '/uploaded/blog/1645076075_620dde6b6227e.jpg', 2, 1, '2022-02-16 23:34:35', '2022-02-16 23:34:35'),
(9, 2, 2, 'Most Popular Men’s Haircuts for 2022', 'most-popular-mens-haircuts-for-2022', '<p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; font-size: 24px; line-height: 38px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">Popular men’s hairstyles tend to evolve, rather than quickly change season to season. Still, it can be difficult to keep track of the trendiest looks.</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">Before you fully commit to a new ‘do, consider one important factor: your face shape. The same&nbsp;<a href=\"https://booksy.com/en-us/s/haircut\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">haircut</a>&nbsp;looks different on someone with a square face versus an oval face. If you have facial hair, consider whether your new style will complement your&nbsp;<a href=\"https://booksy.com/en-us/s/beard-trim\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">beard</a>&nbsp;or mustache. And if you’re unsure, definitely check with your barber before you take the plunge.</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\">Whether you want to refresh your look, or you’re ready for a major change, choosing the right style can be overwhelming. If you’re not sure how to choose the right style for you, check<span style=\"box-sizing: inherit;\">&nbsp;out our list of most popular men’s haircuts for 2022.</span></p><h2 style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 34px; line-height: 42px; margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-family: Poppins, sans-serif; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span class=\"ez-toc-section\" id=\"buzz-cut\" style=\"box-sizing: inherit;\"></span><span style=\"box-sizing: inherit;\">Buzz cut</span><span class=\"ez-toc-section-end\" style=\"box-sizing: inherit;\"></span></h2><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">Yes, it’s plain, but hear us out! The low-maintenance buzz cut is making a comeback. This military-inspired cut is classic and masculine,&nbsp;</span><span style=\"box-sizing: inherit;\">and can be great if you want to take accentuate your face or facial hair. Want to mix it up a little? Try a bleached or colored version.&nbsp;</span></p>', '/uploaded/blog/1645076145_620ddeb1e8880.jpg', 2, 1, '2022-02-16 23:35:45', '2022-02-16 23:35:45'),
(10, 2, 2, 'Winter Hair Woes and How to Fight Them', 'winter-hair-woes-and-how-to-fight-them', '<p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; font-size: 24px; line-height: 38px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">The holidays are over, and it’s officially that phase of winter where we start counting down the days until spring. And being in the thick of winter means the arrival of the much-dreaded winter hair woes.&nbsp;</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">Itchy scalp? Coarse&nbsp;<a href=\"https://booksy.com/en-us/s/beard-trim\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">beard</a>? Split ends? Static? This list is a who’s who of the most annoying hair and facial hair frustrations that plague us every winter.&nbsp;</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">The good news? You can make 2022 the year you finally&nbsp;</span><a href=\"https://booksy.com/blog/us/top-hair-treatments-for-damaged-or-healthy-hair/\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">winter-proof</a><span style=\"box-sizing: inherit;\">&nbsp;your hair. Read on for our list of most common winter hair woes and learn how to give your hair the TLC it needs to shine all season long – and beyond.</span></p><h2 style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 34px; line-height: 42px; margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-family: Poppins, sans-serif; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span class=\"ez-toc-section\" id=\"dry-and-irritated-scalp\" style=\"box-sizing: inherit;\"></span><span style=\"box-sizing: inherit; font-weight: 700;\">Dry and Irritated Scalp</span><span style=\"box-sizing: inherit; font-weight: 700;\"></span><span class=\"ez-toc-section-end\" style=\"box-sizing: inherit;\"></span></h2><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">If you switch up your beauty and skincare routine in the winter months, then it makes sense to switch up your hair care routine as well. Just like the skin on your face and hands gets dry during winter, so does the skin on your head.&nbsp;</span><span style=\"box-sizing: inherit;\">And the same logic applies for treating a dry scalp. Moisturize, moisturize, and moisturize!</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">Unfortunately, you can’t just slather lotion on your hair like you do your hands. But luckily, there are a lot better options for revitalizing a dry scalp.&nbsp;</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">If you can, try to shampoo less and condition more. Shampoo contains surfactants, which do a great job cleaning the hair but can also strip the scalp of necessary moisture. If shampooing less is not an option, swap your current shampoo for a gentle, moisturizing one.</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">Hair masks and oils can also work wonders when it comes to locking in moisture and nourishing your scalp. Try this DIY&nbsp;</span><a href=\"https://www.harpersbazaar.com/beauty/hair/a28874813/coconut-oil-hair-masks/\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">coconut oil hair mask</a><span style=\"box-sizing: inherit;\">&nbsp;that can be customized to your hair’s specific needs.&nbsp;</span><span style=\"box-sizing: inherit;\">Oils can help moisturize and heal irritated scalp skin, but they don’t work the same for everyone. For instance, if you have very fine hair, too much oil can make hair feel weighed down and greasy.</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\"><span style=\"box-sizing: inherit; font-weight: 700;\">Not sure how best to treat your hair type and texture?</span>&nbsp;<span style=\"box-sizing: inherit; font-weight: 700;\">Book an appointment with your hair technician on Booksy.</span></span></p>', '/uploaded/blog/1645076195_620ddee30336b.jpg', 2, 1, '2022-02-16 23:36:35', '2022-02-16 23:36:35'),
(11, 2, 2, 'The Most Anticipated 2022 Beauty Trends', 'the-most-anticipated-2022-beauty-trends', '<p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; font-size: 24px; line-height: 38px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">Pinterest recently released its annual&nbsp;</span><a href=\"https://business.pinterest.com/en-gb/pinterest-predicts/?5oxG2bVxIj730Hj1MuxT3i=parent_filter%3D4diUw7k8Ca7RLDT75cRn37\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">Pinterest Predicts</a><span style=\"box-sizing: inherit;\">&nbsp;list for 2022, and it’s gotten us positively pumped to see which beauty trends will make their mark in the new year.&nbsp;</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">Unlike a year-end trend report, Pinterest describes their list as a “not-yet-trending report.” The report is based on the trends in what users are searching for on the social media and image-sharing platform. And they have a pretty solid track record – 8 out of 10 of their 2021 predictions ended up coming true.&nbsp;</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">For us at Booksy, it’s all about staying ahead of the curve with hair,&nbsp;<a href=\"https://booksy.com/en-us/s/nail-salon\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">nails</a>,&nbsp;<a href=\"https://booksy.com/en-us/s/makeup-artist\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">makeup</a>, skincare, and self-care. This year’s most exciting trends take inspiration from the&nbsp;</span><a href=\"https://www.harpersbazaar.com/uk/beauty/beauty-shows-trends/a38525352/beauty-trends-2022/\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: inherit; color: rgb(45, 181, 176); outline-style: none; outline-width: initial;\">Y2K era</a><span style=\"box-sizing: inherit;\">&nbsp;and the turn of the new millennium. We love to see the resurgence of old-school styles with a modern, optimistic twist.&nbsp;</span></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">Read on for our list of the most anticipated 2022 beauty trends.</span></p><h2 style=\"box-sizing: inherit; color: rgb(51, 51, 51); font-size: 34px; line-height: 42px; margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-family: Poppins, sans-serif; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span class=\"ez-toc-section\" id=\"bling-on-everything\" style=\"box-sizing: inherit;\"></span>Bling on Everything<span class=\"ez-toc-section-end\" style=\"box-sizing: inherit;\"></span></h2><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 50px; margin-left: 0px; color: rgb(116, 116, 116); font-family: &quot;Proxima Nova&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0.2px; background-color: rgb(250, 250, 250);\"><span style=\"box-sizing: inherit;\">Why should jewelry have all the fun? In 2022, we expect to see more bling than ever: gems, jewels, rhinestones, and all kinds of shiny objects. Think bedazzled nails and glamorous eye makeup. According to Pinterest, we might also find bling in more unexpected or surprising places, in the form of novelty items like tooth gems and temporary tattoos.&nbsp;</span></p>', '/uploaded/blog/1645076249_620ddf19cfbee.jpg', 2, 1, '2022-02-16 23:37:29', '2022-02-16 23:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `user_id`, `category_name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 1, 'CONSUMERS', 'all-consumers', '2022-02-16 23:19:47', '2022-02-16 23:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `business_categories`
--

CREATE TABLE `business_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_categories`
--

INSERT INTO `business_categories` (`id`, `provider_id`, `category_id`, `created_at`, `updated_at`) VALUES
(14, 12, 1, '2022-04-16 03:44:42', '2022-04-16 03:44:42'),
(15, 5, 1, '2022-04-16 04:02:58', '2022-04-16 04:02:58'),
(16, 6, 1, '2022-04-16 04:29:13', '2022-04-16 04:29:13'),
(17, 7, 2, '2022-04-16 04:40:16', '2022-04-16 04:40:16'),
(18, 8, 2, '2022-04-16 07:48:32', '2022-04-16 07:48:32'),
(19, 9, 2, '2022-04-16 08:01:24', '2022-04-16 08:01:24'),
(20, 2, 1, '2022-04-17 21:01:49', '2022-04-17 21:01:49'),
(21, 3, 1, '2022-04-17 21:03:57', '2022-04-17 21:03:57'),
(24, 18, 2, '2022-04-22 15:04:49', '2022-04-22 15:04:49'),
(25, 18, 2, '2022-04-25 02:29:52', '2022-04-25 02:29:52'),
(26, 18, 3, '2022-04-25 02:29:52', '2022-04-25 02:29:52'),
(27, 18, 4, '2022-04-25 02:29:52', '2022-04-25 02:29:52'),
(28, 19, 3, '2022-04-25 02:46:48', '2022-04-25 02:46:48'),
(29, 19, 7, '2022-04-25 02:46:48', '2022-04-25 02:46:48'),
(30, 20, 2, '2022-04-25 02:51:11', '2022-04-25 02:51:11'),
(31, 20, 3, '2022-04-25 02:51:11', '2022-04-25 02:51:11'),
(32, 20, 4, '2022-04-25 02:51:11', '2022-04-25 02:51:11'),
(33, 21, 2, '2022-04-25 02:57:04', '2022-04-25 02:57:04'),
(34, 21, 3, '2022-04-25 02:57:04', '2022-04-25 02:57:04'),
(35, 21, 4, '2022-04-25 02:57:04', '2022-04-25 02:57:04'),
(36, 23, 2, '2022-04-26 04:13:30', '2022-04-26 04:13:30'),
(37, 23, 4, '2022-04-26 04:13:30', '2022-04-26 04:13:30'),
(38, 24, 1, '2022-04-26 04:16:57', '2022-04-26 04:16:57'),
(39, 24, 2, '2022-04-26 04:16:57', '2022-04-26 04:16:57'),
(40, 25, 1, '2022-04-27 01:38:07', '2022-04-27 01:38:07'),
(41, 25, 3, '2022-04-27 01:38:07', '2022-04-27 01:38:07'),
(42, 25, 4, '2022-04-27 01:38:07', '2022-04-27 01:38:07'),
(43, 26, 1, '2022-04-27 01:43:44', '2022-04-27 01:43:44'),
(44, 26, 3, '2022-04-27 01:43:44', '2022-04-27 01:43:44'),
(45, 12, 1, NULL, NULL),
(46, 29, 1, '2022-04-27 11:16:09', '2022-04-27 11:16:09'),
(47, 29, 2, '2022-04-27 11:16:09', '2022-04-27 11:16:09'),
(48, 30, 1, '2022-04-27 11:17:19', '2022-04-27 11:17:19'),
(49, 30, 4, '2022-04-27 11:17:19', '2022-04-27 11:17:19'),
(50, 31, 1, '2022-04-27 11:20:29', '2022-04-27 11:20:29'),
(51, 32, 2, '2022-04-27 11:20:32', '2022-04-27 11:20:32'),
(52, 32, 3, '2022-04-27 11:20:32', '2022-04-27 11:20:32'),
(53, 32, 4, '2022-04-27 11:20:32', '2022-04-27 11:20:32'),
(54, 32, 5, '2022-04-27 11:20:32', '2022-04-27 11:20:32'),
(55, 33, 1, '2022-04-27 12:48:18', '2022-04-27 12:48:18'),
(56, 35, 1, '2022-04-27 12:52:27', '2022-04-27 12:52:27'),
(57, 36, 2, '2022-04-27 12:56:46', '2022-04-27 12:56:46'),
(58, 37, 2, '2022-04-27 17:14:25', '2022-04-27 17:14:25'),
(59, 37, 3, '2022-04-27 17:14:25', '2022-04-27 17:14:25'),
(60, 37, 4, '2022-04-27 17:14:25', '2022-04-27 17:14:25'),
(61, 38, 2, '2022-04-27 17:16:30', '2022-04-27 17:16:30'),
(62, 38, 3, '2022-04-27 17:16:30', '2022-04-27 17:16:30'),
(63, 39, 3, '2022-04-27 17:18:34', '2022-04-27 17:18:34'),
(64, 39, 4, '2022-04-27 17:18:34', '2022-04-27 17:18:34'),
(65, 40, 2, '2022-04-27 17:23:15', '2022-04-27 17:23:15'),
(66, 40, 4, '2022-04-27 17:23:15', '2022-04-27 17:23:15'),
(67, 58, 2, '2022-06-22 00:07:07', '2022-06-22 00:07:07'),
(68, 58, 3, '2022-06-22 00:07:07', '2022-06-22 00:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `business_hours`
--

CREATE TABLE `business_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) NOT NULL,
  `saloon_id` int(11) DEFAULT NULL,
  `saturday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuesday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wednesday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thursday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `friday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_hours`
--

INSERT INTO `business_hours` (`id`, `provider_id`, `saloon_id`, `saturday`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, '10AM - 05PM', '10AM - 05PM', '10AM - 05PM', '10AM - 05PM', '10AM - 05PM', '10AM - 05PM', 'Close', '2022-04-15 14:58:55', '2022-04-15 14:58:55'),
(2, 3, NULL, '10am - 9pm', '10am-7pm', '10am-9pm', '10am-9pm', '10am-9pm', '10am-9pm', 'close', '2022-04-16 03:15:56', '2022-04-16 03:15:56'),
(3, 4, NULL, '10am - 9pm', '10am-7pm', '10am-9pm', '10am-9pm', 'Close', '10am-9pm', '10am-5pm', '2022-04-16 03:47:24', '2022-04-16 03:47:24'),
(4, 5, NULL, '10am - 9pm', '10am-7pm', '10am-9pm', '10am-7pm', '10am-9pm', '10am-3pm', '10am-9pm', '2022-04-16 04:06:36', '2022-04-16 04:06:36'),
(5, 6, NULL, '10am - 9pm', '10am-9pm', '10am-8pm', '10am-7pm', '10am-9pm', '10am-9pm', '10am-9pm', '2022-04-16 04:31:50', '2022-04-16 04:31:50'),
(6, 7, NULL, '10am - 9pm', '10am-9pm', '10am-8pm', '10am-7pm', '10am-9pm', '10am-3pm', 'close', '2022-04-16 04:42:25', '2022-04-16 04:42:25'),
(7, 8, NULL, '10am - 9pm', '10am-9pm', '10am-9pm', '10am-9pm', '10am-8pm', '10am-9pm', 'close', '2022-04-16 07:50:50', '2022-04-16 07:50:50'),
(8, 9, NULL, '10am - 9pm', '10am-7pm', '10am-9pm', '10am-7pm', '10am-9pm', '10am-9pm', 'close', '2022-04-16 08:03:44', '2022-04-16 08:03:44'),
(9, 21, NULL, '10AM - 05PM', '10AM - 05PM', '10AM - 05PM', '10AM - 05PM', '10AM - 05PM', '10AM - 05PM', 'close', '2022-04-25 03:18:00', '2022-04-25 03:23:12'),
(20, 10, NULL, '10AM - 05PM', '10AM - 05PM', '10AM - 05PM', '10AM - 05PM', '10AM - 05PM', 'close', 'close', '2022-04-26 02:53:57', '2022-04-26 03:19:12'),
(21, 35, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-27 12:52:53', '2022-04-27 12:52:53'),
(22, 39, NULL, '10AM - 9PM', '10AM - 9PM', '10AM - 9PM', '10AM - 9PM', '10AM - 9PM', '10AM - 9PM', 'CLOSE', '2022-04-27 17:26:42', '2022-04-27 17:32:30'),
(23, 40, NULL, '10am - 9pm', '10am-7pm', '10am-9pm', '10am-7pm', '10am-9pm', '10am-9pm', 'close', '2022-04-16 08:03:44', '2022-04-16 08:03:44'),
(24, 39, 38, '10AM - 9PM', '10AM - 9PM', '10AM - 9PM', '10AM - 9PM', '10AM - 9PM', 'Close', 'CLOSE', '2022-04-27 17:26:42', '2022-04-27 17:32:30'),
(25, 38, NULL, '10AM - 9PM', '10AM - 9PM', '10AM - 9PM', 'CLOSE', 'CLOSE', 'CLOSE', 'CLOSE', '2022-04-27 18:46:43', '2022-04-27 18:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `business_hour_updates`
--

CREATE TABLE `business_hour_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) NOT NULL,
  `saloon_id` int(11) DEFAULT NULL,
  `sat_s` time DEFAULT NULL,
  `sat_e` time DEFAULT NULL,
  `san_s` time DEFAULT NULL,
  `san_e` time DEFAULT NULL,
  `mon_s` time DEFAULT NULL,
  `mon_e` time DEFAULT NULL,
  `tus_s` time DEFAULT NULL,
  `tus_e` time DEFAULT NULL,
  `wen_s` time DEFAULT NULL,
  `wen_e` time DEFAULT NULL,
  `thus_s` time DEFAULT NULL,
  `thus_e` time DEFAULT NULL,
  `fri_s` time DEFAULT NULL,
  `fri_e` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_hour_updates`
--

INSERT INTO `business_hour_updates` (`id`, `provider_id`, `saloon_id`, `sat_s`, `sat_e`, `san_s`, `san_e`, `mon_s`, `mon_e`, `tus_s`, `tus_e`, `wen_s`, `wen_e`, `thus_s`, `thus_e`, `fri_s`, `fri_e`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, '08:00:00', '18:00:00', '02:06:00', '13:09:00', '02:06:00', '18:06:00', '01:08:00', '13:08:00', '02:06:00', '15:28:00', '02:06:00', '15:28:00', NULL, NULL, '2022-05-09 01:07:24', '2022-05-09 01:07:24'),
(2, 10, 2, '14:25:00', '13:28:00', '13:27:00', '13:28:00', '13:26:00', '13:29:00', '14:25:00', '15:28:00', '02:06:00', '15:28:00', '02:06:00', '15:28:00', NULL, NULL, '2022-05-09 01:26:03', '2022-05-09 01:26:03'),
(3, 13, 2, '08:00:00', '18:00:00', '02:06:00', '13:09:00', '02:06:00', '18:06:00', '01:08:00', '13:08:00', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-09 05:48:51', '2022-05-09 05:48:51'),
(4, 40, 2, '08:00:00', '18:00:00', '02:06:00', '13:09:00', '02:06:00', '18:06:00', '01:08:00', '13:08:00', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-09 05:50:10', '2022-05-09 05:50:10'),
(5, 10, NULL, '08:00:00', '18:00:00', '02:06:00', '13:09:00', '02:06:00', '18:06:00', '01:08:00', '13:08:00', NULL, NULL, '02:06:00', '15:28:00', NULL, NULL, '2022-05-09 01:07:24', '2022-05-09 01:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `category_logo`, `home_status`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hair Salon', 'hair-salon', '/uploaded/category/1650052499_6259cd93bac1b.webp', NULL, 1, 1, '2022-04-15 13:54:59', '2022-04-15 13:54:59'),
(2, 'Barbershop', 'barbershop', '/uploaded/category/1650052548_6259cdc47670b.webp', NULL, 2, 1, '2022-04-15 13:55:48', '2022-04-15 13:55:48'),
(3, 'Nail Salon', 'nail-salon', '/uploaded/category/1650052588_6259cdec23e04.webp', NULL, 3, 1, '2022-04-15 13:56:28', '2022-04-15 13:56:28'),
(4, 'Skin Care', 'skin-care', '/uploaded/category/1650052620_6259ce0cb965d.webp', NULL, 4, 1, '2022-04-15 13:57:00', '2022-04-15 13:57:00'),
(5, 'Eyebrows & Lashes', 'eyebrows-lashes', '/uploaded/category/1650052661_6259ce35abb26.webp', '1', 10, 1, '2022-04-15 13:57:41', '2022-04-15 14:02:06'),
(6, 'Massage', 'massage', '/uploaded/category/1650052732_6259ce7c34da5.webp', '1', 6, 1, '2022-04-15 13:58:52', '2022-04-15 13:58:52'),
(7, 'Makeup Artist', 'makeup-artist', '/uploaded/category/1650052807_6259cec7e4c85.webp', NULL, 7, 1, '2022-04-15 14:00:07', '2022-04-15 14:00:07'),
(8, 'Day Spa', 'day-spa', '/uploaded/category/1650052841_6259cee99b7b6.webp', '1', 8, 1, '2022-04-15 14:00:41', '2022-04-15 14:00:41'),
(9, 'Braids', 'braids', '/uploaded/category/1650052906_6259cf2a9d0f3.webp', '1', 9, 1, '2022-04-15 14:01:46', '2022-04-15 14:01:58'),
(10, 'Tattoo Shops', 'tattoo-shops', '/uploaded/category/1650052957_6259cf5dd1ba6.webp', NULL, 11, 1, '2022-04-15 14:02:37', '2022-04-15 14:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `childcategories`
--

CREATE TABLE `childcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `childcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_payments`
--

CREATE TABLE `coupon_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_transaction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_payments`
--

INSERT INTO `coupon_payments` (`id`, `order_no`, `user_id`, `coupon_id`, `payment_id`, `payment_type`, `payment_method`, `balance_transaction`, `currency`, `amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '22041701', 15, 4, 'ch_3KpYa0JCIneuWHgB1vlTbFvo', 'Stripe', 'card_1KpYZ2JCIneuWHgBw1yvnQrN', 'txn_3KpYa0JCIneuWHgB1p4tDsQP', 'usd', '350.00', '1', '2022-04-17 18:55:56', '2022-04-17 18:55:56'),
(2, '22041902', 14, 5, 'ch_3KqAARJCIneuWHgB0p5Iwabs', 'Stripe', 'card_1KqAAQJCIneuWHgB5f0aZUxC', 'txn_3KqAARJCIneuWHgB0Cdn7Po7', 'usd', '200.00', '1', '2022-04-19 11:04:03', '2022-04-19 11:04:03'),
(3, '22060503', 14, 11, 'ch_3L7Dm5JCIneuWHgB1B3xCZRV', 'Stripe', 'card_1L7Dm3JCIneuWHgBHaoxyFwa', 'txn_3L7Dm5JCIneuWHgB1f57zISi', 'usd', '200.00', '1', '2022-06-05 01:19:10', '2022-06-05 01:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `customer_reviews`
--

CREATE TABLE `customer_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1=active, 2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_services`
--

CREATE TABLE `employee_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_services`
--

INSERT INTO `employee_services` (`id`, `user_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 28, 1, '2022-04-27 03:47:00', '2022-04-27 03:47:00'),
(2, 28, 3, '2022-04-27 03:47:00', '2022-04-27 03:47:00'),
(3, 34, 28, '2022-04-27 12:51:04', '2022-04-27 12:51:04'),
(4, 41, 29, '2022-04-27 17:37:09', '2022-04-27 17:37:09'),
(5, 41, 30, '2022-04-27 17:37:09', '2022-04-27 17:37:09'),
(6, 42, 1, '2022-05-09 01:19:37', '2022-05-09 01:19:37'),
(7, 42, 2, '2022-05-09 01:19:37', '2022-05-09 01:19:37'),
(8, 43, 7, '2022-06-04 00:46:28', '2022-06-04 00:46:28'),
(9, 43, 9, '2022-06-04 00:46:28', '2022-06-04 00:46:28'),
(10, 43, 27, '2022-06-04 00:46:28', '2022-06-04 00:46:28'),
(11, 44, 8, '2022-06-04 00:47:21', '2022-06-04 00:47:21'),
(12, 44, 27, '2022-06-04 00:47:21', '2022-06-04 00:47:21'),
(18, 54, 1, '2022-06-04 05:58:38', '2022-06-04 05:58:38'),
(19, 54, 2, '2022-06-04 05:58:38', '2022-06-04 05:58:38'),
(21, 55, 2, '2022-06-04 06:07:28', '2022-06-04 06:07:28'),
(22, 56, 8, '2022-06-05 00:40:05', '2022-06-05 00:40:05'),
(23, 57, 2, '2022-06-05 00:48:58', '2022-06-05 00:48:58'),
(24, 57, 7, '2022-06-04 06:07:28', '2022-06-04 06:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `expreinces`
--

CREATE TABLE `expreinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `experinces` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experince_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experince_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expreinces`
--

INSERT INTO `expreinces` (`id`, `user_id`, `experinces`, `experince_from`, `experince_to`, `created_at`, `updated_at`) VALUES
(1, 24, 'hello', '2022-04-26', '2022-04-26', '2022-04-26 04:16:57', '2022-04-26 04:16:57'),
(3, 26, 'hello', '2000-02-02', '2022-04-27', '2022-04-27 01:43:44', '2022-04-27 01:43:44'),
(4, 28, 'hello', '2000-02-02', '2022-04-27', '2022-04-27 03:47:00', '2022-04-27 03:47:00'),
(5, 34, 'addfadafda', '2010-01-01', '2022-04-27', '2022-04-27 12:51:04', '2022-04-27 12:51:04'),
(6, 41, 'Hello', '2000-02-02', '2022-04-27', '2022-04-27 17:37:09', '2022-04-27 17:37:09'),
(7, 42, 'asdf', '2022-05-02', '2022-05-09', '2022-05-09 01:19:37', '2022-05-09 01:19:37'),
(8, 43, 'vaqog@mailinator.com', '2021-02-13', '2022-06-04', '2022-06-04 00:46:28', '2022-06-04 00:46:28'),
(9, 44, 'ruwi@mailinator.com', '2020-10-06', '2022-06-04', '2022-06-04 00:47:21', '2022-06-04 00:47:21'),
(10, 47, 'hello', '2020-02-02', '2022-06-04', '2022-06-04 00:53:05', '2022-06-04 00:53:05'),
(11, 48, 'hello', '2020-02-02', '2022-06-04', '2022-06-04 00:54:12', '2022-06-04 00:54:12'),
(12, 49, 'hello', '2020-02-02', '2022-06-04', '2022-06-04 05:41:41', '2022-06-04 05:41:41'),
(13, 50, 'hello', '2020-02-02', '2022-06-04', '2022-06-04 05:49:20', '2022-06-04 05:49:20'),
(14, 51, 'hello', '2020-02-02', '2022-06-04', '2022-06-04 05:51:37', '2022-06-04 05:51:37'),
(15, 52, 'hello', '2022-02-02', '2022-06-04', '2022-06-04 05:54:10', '2022-06-04 05:54:10'),
(16, 53, 'kofix@mailinator.com', '2003-01-16', '2022-06-04', '2022-06-04 05:56:39', '2022-06-04 05:56:39'),
(17, 54, 'hello', '2020-02-02', '2022-06-04', '2022-06-04 05:58:38', '2022-06-04 05:58:38'),
(18, 55, 'hello', '2022-06-05', '2022-06-05', '2022-06-04 06:07:28', '2022-06-05 00:40:20'),
(19, 56, '10', '2020-02-02', '2022-06-05', '2022-06-05 00:40:05', '2022-06-05 00:40:05'),
(20, 57, '20', '2020-02-02', '2022-06-05', '2022-06-05 00:48:58', '2022-06-05 00:48:58');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'I have canceled my booking. How can I get my prepayment back?', 'Some Providers collect cancelation fees if a client violates the cancelation policy. Conditions of the free cancelation are displayed at the moment of making a booking and can be found in the booking confirmation email. If you adhered to the cancellation policy but still incurred a charge, please contact the Provider to clarify the charge. Their contact details can be found on their Business Profile.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>', '2022-04-17 03:00:35', '2022-04-17 03:00:35'),
(2, 'How can I leave a review?', 'Book3m will automatically send a link to leave a review approximately 30 mins after the appointment is finished, there is also an option to add a review in the app via the Reviews tab. You can only leave a review up to 30 days after your appointment. Please note that to be eligible for leaving a review a booking has to be made from your Book3m&nbsp; account or by a Provider as it is linked to your Book3m\'s account data for verification purposes.', '2022-04-17 03:02:13', '2022-04-17 19:48:30'),
(3, 'I am not satisfied with the service provided. What can I do about it?', 'We encourage you to first contact the Provider directly to resolve an unsatisfactory experience.  If you had booked your appointment using your Booksy account or a Provider linked the appointment to your account, you are eligible to leave a review on the Provider’s Business Profile up to 30 days after your visit.', '2022-04-17 03:02:53', '2022-04-17 03:02:53'),
(4, 'One of the shops should not be listed on Book3m. How can I report it?', 'If you’d like to report a business, please go to the Provider’s Business Profile and click on a “Report” button. From there, select a reason for reporting and submit.', '2022-04-17 03:04:59', '2022-04-17 19:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `faq_to_clients`
--

CREATE TABLE `faq_to_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_to_clients`
--

INSERT INTO `faq_to_clients` (`id`, `provider_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'How can you help you?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel minus aspernatur in, odio accusamus necessitatibus. Optio beatae unde alias similique.', '2022-04-15 14:57:44', '2022-04-15 14:57:44'),
(2, 2, 'Why Book3m?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel minus aspernatur in, odio accusamus necessitatibus. Optio beatae unde alias similique.', '2022-04-15 14:58:17', '2022-04-15 15:01:50'),
(3, 3, 'Consumer Refund Request', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-04-16 03:12:12', '2022-04-16 03:12:12'),
(4, 3, 'Card Payment Error (Fraud and Other)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release', '2022-04-16 03:12:52', '2022-04-16 03:12:52'),
(5, 3, 'Appointments: Book, Reschedule, or Cancel', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\'', '2022-04-16 03:13:33', '2022-04-16 03:13:33'),
(6, 2, 'Consumer Refund Request', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-04-16 03:30:55', '2022-04-16 03:30:55'),
(7, 2, 'Card Payment Error (Fraud and Other)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-04-16 03:31:50', '2022-04-16 03:31:50'),
(8, 4, 'Consumer Refund Request', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of', '2022-04-16 03:46:11', '2022-04-16 03:46:11'),
(9, 4, 'Contrary to popular belief', 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful', '2022-04-16 03:46:54', '2022-04-16 03:46:54'),
(10, 5, 'The standard chunk of Lorem Ipsum used', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,', '2022-04-16 04:04:47', '2022-04-16 04:04:47'),
(11, 5, 'All the Lorem Ipsum generators', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '2022-04-16 04:05:13', '2022-04-16 04:05:13'),
(12, 5, 'Where does it from?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2022-04-16 04:06:01', '2022-04-16 04:06:01'),
(13, 6, 'FAQ1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '2022-04-16 04:30:54', '2022-04-16 04:30:54'),
(14, 6, 'FAQ2', 'but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-04-16 04:31:19', '2022-04-16 04:31:19'),
(15, 7, 'FAQ1', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', '2022-04-16 04:41:24', '2022-04-16 04:41:24'),
(16, 7, 'FAQ2', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', '2022-04-16 04:41:54', '2022-04-16 04:41:54'),
(17, 8, 'FAQ1', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,', '2022-04-16 07:49:24', '2022-04-16 07:49:24'),
(18, 8, 'FAQ2', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-04-16 07:49:47', '2022-04-16 07:49:47'),
(19, 8, 'FAQ3', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary,', '2022-04-16 07:50:22', '2022-04-16 07:50:22'),
(20, 9, 'FAQ1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,', '2022-04-16 08:02:07', '2022-04-16 08:02:07'),
(21, 9, 'FAQ2', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text,', '2022-04-16 08:03:02', '2022-04-16 08:03:02'),
(22, 9, 'FAQ3', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words,', '2022-04-16 08:03:28', '2022-04-16 08:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_businesses`
--

CREATE TABLE `favourite_businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourite_businesses`
--

INSERT INTO `favourite_businesses` (`id`, `user_id`, `provider_id`, `created_at`, `updated_at`) VALUES
(1, 14, 3, '2022-04-19 13:46:02', '2022-04-19 13:46:02'),
(2, 14, 2, '2022-05-09 05:44:05', '2022-05-09 05:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'services', '2022-04-16 08:12:04', '2022-04-16 08:12:04'),
(2, 'appointments', '2022-04-16 08:12:13', '2022-04-16 08:12:13'),
(3, 'reviews', '2022-04-16 08:12:24', '2022-04-16 08:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `feature_plans`
--

CREATE TABLE `feature_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_plans`
--

INSERT INTO `feature_plans` (`id`, `feature_id`, `plan_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-04-16 08:13:20', '2022-04-16 08:13:20'),
(8, 1, 2, '2022-04-16 09:44:40', '2022-04-16 09:44:40'),
(9, 2, 2, '2022-04-16 09:44:40', '2022-04-16 09:44:40'),
(10, 3, 2, '2022-04-16 09:44:40', '2022-04-16 09:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `ic_portfolios`
--

CREATE TABLE `ic_portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ic_id` int(11) NOT NULL,
  `portfolio_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ic_reviews`
--

CREATE TABLE `ic_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `ic_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1=active, 2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ic_social_media`
--

CREATE TABLE `ic_social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ic_id` int(11) NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ic_to_customer_reviews`
--

CREATE TABLE `ic_to_customer_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `ic_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1=active, 2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(57, '2014_10_12_000000_create_users_table', 1),
(58, '2014_10_12_100000_create_password_resets_table', 1),
(59, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(60, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(61, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(62, '2016_06_01_000004_create_oauth_clients_table', 1),
(63, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(64, '2019_05_03_000001_create_customer_columns', 1),
(65, '2019_05_03_000002_create_subscriptions_table', 1),
(66, '2019_05_03_000003_create_subscription_items_table', 1),
(67, '2019_08_19_000000_create_failed_jobs_table', 1),
(68, '2021_01_27_174854_create_categories_table', 1),
(69, '2021_02_07_182407_create_subcategories_table', 1),
(70, '2021_02_16_174948_create_divisions_table', 1),
(71, '2021_02_16_175010_create_districts_table', 1),
(72, '2021_02_27_173313_create_blogs_table', 1),
(73, '2021_02_27_174254_create_blog_categories_table', 1),
(74, '2021_03_25_165730_create_settings_table', 1),
(75, '2021_07_25_101045_create_countries_table', 1),
(76, '2022_01_18_080329_create_services_table', 1),
(77, '2022_01_18_080632_create_provider_reviews_table', 1),
(78, '2022_01_18_080700_create_customer_reviews_table', 1),
(79, '2022_01_18_083738_create_provider_customers_table', 1),
(80, '2022_01_18_095010_create_childcategories_table', 1),
(81, '2022_01_19_045418_create_promocodes_table', 1),
(82, '2022_01_19_081820_create_service_images_table', 1),
(83, '2022_01_25_102359_create_business_categories_table', 1),
(84, '2022_01_25_102750_create_business_hours_table', 1),
(85, '2022_01_25_103239_create_faq_to_clients_table', 1),
(86, '2022_01_25_103332_create_provider_portfolios_table', 1),
(87, '2022_01_27_054721_create_social_media_table', 1),
(88, '2022_01_27_070745_create_portfolios_table', 1),
(89, '2022_01_27_110259_create_favourite_businesses_table', 1),
(90, '2022_01_29_105421_create_appointments_table', 1),
(91, '2022_02_10_142024_create_provider_payment_methods_table', 1),
(92, '2022_02_17_082300_create_contacts_table', 1),
(93, '2022_02_19_052045_create_about_us_table', 1),
(94, '2022_02_19_054610_create_privacy__policies_table', 1),
(95, '2022_02_19_054724_create_terms_services_table', 1),
(96, '2022_02_19_082237_create_pricings_table', 1),
(97, '2022_02_24_092700_create_faqs_table', 1),
(98, '2022_02_24_163254_create_withdraws_table', 1),
(99, '2022_02_26_053602_create_provider_balances_table', 1),
(100, '2022_02_27_094848_create_admin__reviews_table', 1),
(101, '2022_03_15_164707_create_appointment_items_table', 1),
(102, '2022_03_17_073237_create_plans_table', 1),
(103, '2022_03_20_103909_create_features_table', 1),
(104, '2022_03_20_104137_create_feature_plans_table', 1),
(105, '2022_03_28_060733_create_ic_social_media_table', 1),
(106, '2022_03_28_061028_create_ic_portfolios_table', 1),
(107, '2022_03_28_093556_create_payment_methods_table', 1),
(108, '2022_03_29_062006_create_service_reviews_table', 1),
(109, '2022_03_29_062219_create_ic_reviews_table', 1),
(110, '2022_03_30_085634_create_ic_to_customer_reviews_table', 1),
(111, '2022_04_03_060751_create_service_review_items_table', 1),
(112, '2022_04_12_095239_create_coupon_payments_table', 1),
(119, '2022_04_15_213747_create_amenities_table', 2),
(120, '2022_04_15_215835_create_safety_rules_table', 2),
(121, '2022_04_26_095616_create_expreinces_table', 3),
(122, '2022_04_27_093012_create_employee_services_table', 4),
(123, '2022_05_08_065021_create_business_hour_updates_table', 5),
(125, '2022_05_25_114144_create_provider_coupon_pays_table', 1),
(126, '2022_06_07_071814_create_all_service_cupons_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'card',
  `default_method` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `billing_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_period_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_plan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `access_list` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `slug`, `price`, `billing_period`, `billing_period_type`, `stripe_plan_id`, `about`, `access_list`, `created_at`, `updated_at`) VALUES
(1, 'Basic Plan', 'basic-plan', 200, '1', 'Months', 'price_1KeR3dJCIneuWHgBS0ahJDBo', 'This is Basic Plan', NULL, '2022-04-16 08:13:20', '2022-04-16 08:13:20'),
(2, 'Silver Plan', 'silver-plan', 300, '1', 'Months', 'price_1KeR4bJCIneuWHgBeGYslEp1', 'This is Silver Plan', NULL, '2022-04-16 08:14:07', '2022-04-16 09:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) NOT NULL,
  `portfolio_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `provider_id`, `portfolio_image`, `created_at`, `updated_at`) VALUES
(1, 2, '/uploaded/provider/portfolio/1650056426_6259dcea7314d.jpeg', '2022-04-15 15:00:26', '2022-04-15 15:00:26'),
(2, 2, '/uploaded/provider/portfolio/1650056433_6259dcf151308.jpeg', '2022-04-15 15:00:33', '2022-04-15 15:00:33'),
(3, 2, '/uploaded/provider/portfolio/1650056440_6259dcf8a23db.jpeg', '2022-04-15 15:00:40', '2022-04-15 15:00:40'),
(4, 2, '/uploaded/provider/portfolio/1650056477_6259dd1daa344.jpeg', '2022-04-15 15:01:17', '2022-04-15 15:01:17'),
(5, 2, '/uploaded/provider/portfolio/1650056484_6259dd24f18ec.jpeg', '2022-04-15 15:01:24', '2022-04-15 15:01:24'),
(9, 3, '/uploaded/provider/portfolio/1650100954_625a8ada387e6.jpeg', '2022-04-16 03:22:34', '2022-04-16 03:22:34'),
(10, 3, '/uploaded/provider/portfolio/1650100968_625a8ae887b09.jpeg', '2022-04-16 03:22:48', '2022-04-16 03:22:48'),
(11, 3, '/uploaded/provider/portfolio/1650100979_625a8af36c60b.jpeg', '2022-04-16 03:22:59', '2022-04-16 03:22:59'),
(12, 3, '/uploaded/provider/portfolio/1650100990_625a8afe1b0d1.jpeg', '2022-04-16 03:23:10', '2022-04-16 03:23:10'),
(13, 3, '/uploaded/provider/portfolio/1650101001_625a8b09a62c3.jpeg', '2022-04-16 03:23:21', '2022-04-16 03:23:21'),
(14, 4, '/uploaded/provider/portfolio/1650102480_625a90d00ce79.jpeg', '2022-04-16 03:48:00', '2022-04-16 03:48:00'),
(15, 4, '/uploaded/provider/portfolio/1650102492_625a90dcc6963.jpeg', '2022-04-16 03:48:12', '2022-04-16 03:48:12'),
(16, 4, '/uploaded/provider/portfolio/1650102506_625a90ea03358.jpeg', '2022-04-16 03:48:26', '2022-04-16 03:48:26'),
(17, 4, '/uploaded/provider/portfolio/1650102525_625a90fdcde38.jpeg', '2022-04-16 03:48:45', '2022-04-16 03:48:45'),
(18, 4, '/uploaded/provider/portfolio/1650102559_625a911fa37e7.jpeg', '2022-04-16 03:49:19', '2022-04-16 03:49:19'),
(19, 5, '/uploaded/provider/portfolio/1650103711_625a959f1f399.jpeg', '2022-04-16 04:08:31', '2022-04-16 04:08:31'),
(20, 5, '/uploaded/provider/portfolio/1650103721_625a95a966aed.jpeg', '2022-04-16 04:08:41', '2022-04-16 04:08:41'),
(21, 5, '/uploaded/provider/portfolio/1650103730_625a95b25b142.jpeg', '2022-04-16 04:08:50', '2022-04-16 04:08:50'),
(22, 5, '/uploaded/provider/portfolio/1650103740_625a95bc3d10d.jpeg', '2022-04-16 04:09:00', '2022-04-16 04:09:00'),
(23, 5, '/uploaded/provider/portfolio/1650103761_625a95d164b29.jpeg', '2022-04-16 04:09:21', '2022-04-16 04:09:21'),
(24, 6, '/uploaded/provider/portfolio/1650105145_625a9b39662d0.jpeg', '2022-04-16 04:32:25', '2022-04-16 04:32:25'),
(25, 6, '/uploaded/provider/portfolio/1650105154_625a9b4255a25.jpeg', '2022-04-16 04:32:34', '2022-04-16 04:32:34'),
(26, 6, '/uploaded/provider/portfolio/1650105168_625a9b50e3757.jpeg', '2022-04-16 04:32:48', '2022-04-16 04:32:48'),
(27, 6, '/uploaded/provider/portfolio/1650105191_625a9b67d07f3.jpeg', '2022-04-16 04:33:11', '2022-04-16 04:33:11'),
(28, 6, '/uploaded/provider/portfolio/1650105218_625a9b82be0fe.jpeg', '2022-04-16 04:33:38', '2022-04-16 04:33:38'),
(29, 7, '/uploaded/provider/portfolio/1650105787_625a9dbbc88c8.jpeg', '2022-04-16 04:43:07', '2022-04-16 04:43:07'),
(30, 7, '/uploaded/provider/portfolio/1650105808_625a9dd0ac575.jpeg', '2022-04-16 04:43:28', '2022-04-16 04:43:28'),
(31, 7, '/uploaded/provider/portfolio/1650105833_625a9de98978f.jpeg', '2022-04-16 04:43:53', '2022-04-16 04:43:53'),
(32, 7, '/uploaded/provider/portfolio/1650105850_625a9dfa2a6ca.jpeg', '2022-04-16 04:44:10', '2022-04-16 04:44:10'),
(33, 7, '/uploaded/provider/portfolio/1650105860_625a9e04955ff.jpeg', '2022-04-16 04:44:20', '2022-04-16 04:44:20'),
(34, 8, '/uploaded/provider/portfolio/1650117129_625aca09d1e87.jpeg', '2022-04-16 07:52:09', '2022-04-16 07:52:09'),
(35, 8, '/uploaded/provider/portfolio/1650117250_625aca8236fbe.jpeg', '2022-04-16 07:54:10', '2022-04-16 07:54:10'),
(36, 8, '/uploaded/provider/portfolio/1650117262_625aca8eda298.jpeg', '2022-04-16 07:54:22', '2022-04-16 07:54:22'),
(37, 8, '/uploaded/provider/portfolio/1650117277_625aca9def7b8.jpeg', '2022-04-16 07:54:37', '2022-04-16 07:54:37'),
(38, 8, '/uploaded/provider/portfolio/1650117288_625acaa85fec2.jpeg', '2022-04-16 07:54:48', '2022-04-16 07:54:48'),
(39, 8, '/uploaded/provider/portfolio/1650117306_625acaba23549.jpeg', '2022-04-16 07:55:06', '2022-04-16 07:55:06'),
(40, 9, '/uploaded/provider/portfolio/1650117850_625accdab1840.jpeg', '2022-04-16 08:04:10', '2022-04-16 08:04:10'),
(41, 9, '/uploaded/provider/portfolio/1650117861_625acce533993.jpeg', '2022-04-16 08:04:21', '2022-04-16 08:04:21'),
(42, 9, '/uploaded/provider/portfolio/1650117873_625accf16e36c.jpeg', '2022-04-16 08:04:33', '2022-04-16 08:04:33'),
(43, 9, '/uploaded/provider/portfolio/1650117924_625acd24495df.jpeg', '2022-04-16 08:05:24', '2022-04-16 08:05:24'),
(44, 9, '/uploaded/provider/portfolio/1650117945_625acd39489b6.jpeg', '2022-04-16 08:05:45', '2022-04-16 08:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `pricings`
--

CREATE TABLE `pricings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `selling_price` double NOT NULL,
  `discount_type` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `discount_price` double DEFAULT NULL,
  `price_active` int(11) DEFAULT NULL,
  `validity` int(11) DEFAULT NULL,
  `validity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pricing_list` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacy__policies`
--

CREATE TABLE `privacy__policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy__policies`
--

INSERT INTO `privacy__policies` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Privacy Policy', '<div style=\"line-height: 23px;\">This privacy policy (this “Policy”) explains how personal information is collected, used, and disclosed by Book3m Inc, 515 North State Street, Suite 460, Chicago, IL 60654, and all its designated agents, employees, and subsidiaries (“Book3m” or “we”). This Policy applies to consumer users (individually referred to as “you”) of Book3m’s websites, applications, and other online services (collectively, our “Sites”).</div><div style=\"line-height: 23px;\"><br></div><div style=\"line-height: 23px;\">Other third parties, such as small and medium businesses (“SMBs”) at which you make reservations through our Sites, issuers of Merchant Gift Cards you purchase through our Sites, and social networks that you use in connection with our Sites, may also collect, use, and share information about you. This Policy does not cover such third parties or their services. For information about third-party privacy practices, please consult with them directly.</div><div style=\"line-height: 23px;\"><br></div><h5 style=\"line-height: 23px;\"><u>Part I - Information We Collect.</u></h5><h2 style=\"line-height: 23px;\"><u><br></u></h2><blockquote style=\"line-height: 23px;\" class=\"blockquote\"><blockquote style=\"line-height: 23px;\" class=\"blockquote\"><p><span style=\"font-family: &quot;Times New Roman&quot;;\">We collect information about you in various ways when you use our Sites. We use this information to, among other things, provide the functionality and improve the quality of our Sites and personalize your experience. For example, we may collect your name, date of birth, your photo, email address, postal address, phone number (including your mobile phone number), billing information, survey responses, demographics, current and prior appointments details, favorite SMBs, special SMB requests, passwords, contact information of people you add to, or notify of, your appointments through our Sites, names and email addresses of recipients of Book3m Gift Cards (as this term is defined in the Book3m Terms of Use) and Merchant Gift Cards, and other information you provide on our Sites. If you use our mobile application, either to book an appointment or to pay, we may also collect your mobile device ID, your precise location data, and the SMB search locations you select. For certain services on our Sites, credit or debit card account information may be required, as further described in the section called “Payment Card Information” below. We may also obtain information from other sources, such as third-party websites, applications, and services (each, a “Third-Party Platform”), through which you connect with our Sites and combine that with information we collect on our Sites.</span></p></blockquote></blockquote>', '2022-02-19 03:56:19', '2022-04-13 23:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `purchase_by` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promocode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `discount` double DEFAULT NULL,
  `percetange` double NOT NULL,
  `percetange_price` double NOT NULL,
  `total_price` double NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`id`, `created_by`, `user_id`, `payment_id`, `purchase_by`, `name`, `promocode`, `price`, `discount`, `percetange`, `percetange_price`, `total_price`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 'Exclusively For You', 'book3m1', 70, 10, 0, 0, 0, '2022-04-18', '2022-04-20', 0, '2022-04-17 00:33:45', '2022-06-13 00:06:35'),
(2, 1, 1, NULL, NULL, 'Mcdonalds', 'book3m2', 100, 15, 0, 0, 0, '2022-04-17', '2022-04-18', 0, '2022-04-17 00:34:43', '2022-06-13 00:06:35'),
(3, 1, 1, NULL, NULL, 'couponer', 'book3m3', 200, 20, 0, 0, 0, '2022-04-17', '2022-04-29', 0, '2022-04-17 00:35:59', '2022-06-13 00:06:35'),
(4, 1, 1, 1, 15, 'Coupon Day', 'book3m4', 350, 35, 0, 0, 0, '2022-04-18', '2022-04-16', 0, '2022-04-17 00:36:49', '2022-06-13 00:06:35'),
(5, 1, 1, 2, 14, 'Friday Discount', 'book3m5', 200, 10, 0, 0, 0, '2022-04-21', '2022-04-30', 0, '2022-04-17 19:06:37', '2022-06-13 00:06:35'),
(6, 2, 2, NULL, NULL, 'tonmoy', 'tonmoy123', 75, NULL, 13, 10, 65, '2022-06-12', '2022-06-20', 1, '2022-06-13 00:06:35', '2022-06-13 00:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `provider_balances`
--

CREATE TABLE `provider_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) NOT NULL,
  `total_balance` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provider_balances`
--

INSERT INTO `provider_balances` (`id`, `provider_id`, `total_balance`, `balance`, `created_at`, `updated_at`) VALUES
(1, 2, 327, 327, '2022-04-17 19:28:27', '2022-05-24 03:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `provider_coupon_pays`
--

CREATE TABLE `provider_coupon_pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_transaction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provider_coupon_pays`
--

INSERT INTO `provider_coupon_pays` (`id`, `order_no`, `provider_id`, `coupon_id`, `payment_id`, `payment_type`, `payment_method`, `balance_transaction`, `currency`, `amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '22052501', 2, 6, 'ch_3L3IpAJCIneuWHgB1ywnaudX', 'Stripe', 'card_1L3Ip8JCIneuWHgBOy3u4zpe', 'txn_3L3IpAJCIneuWHgB1hICUBXQ', 'usd', '200.00', '1', '2022-05-25 05:56:25', '2022-05-25 05:56:25'),
(2, '22052502', 2, 7, 'ch_3L3Ir9JCIneuWHgB0eIeRMlv', 'Stripe', 'card_1L3Ir8JCIneuWHgBR5r6nbjb', 'txn_3L3Ir9JCIneuWHgB0XkM7VnY', 'usd', '200.00', '1', '2022-05-25 05:58:29', '2022-05-25 05:58:29'),
(3, '22052503', 2, 8, 'ch_3L3IslJCIneuWHgB1WB8XwgK', 'Stripe', 'card_1L3IsjJCIneuWHgBZBRLSbpv', 'txn_3L3IslJCIneuWHgB1CfZc7Im', 'usd', '200.00', '1', '2022-05-25 06:00:09', '2022-05-25 06:00:09'),
(4, '22052504', 2, 9, 'ch_3L3J0nJCIneuWHgB1h3SpUhb', 'Stripe', 'card_1L3J0mJCIneuWHgBBGKTE6XD', 'txn_3L3J0nJCIneuWHgB1Tx20C1q', 'usd', '200.00', '1', '2022-05-25 06:08:27', '2022-05-25 06:08:27'),
(5, '22052605', 2, 10, 'ch_3L3ZylJCIneuWHgB0PrgmfM6', 'Stripe', 'card_1L3ZyjJCIneuWHgB7hqndTwN', 'txn_3L3ZylJCIneuWHgB0D494Hz7', 'usd', '200.00', '1', '2022-05-26 00:15:31', '2022-05-26 00:15:31'),
(6, '22052606', 2, 11, 'ch_3L3arXJCIneuWHgB1anKNcWM', 'Stripe', 'card_1L3arWJCIneuWHgBAtqAWtBT', 'txn_3L3arXJCIneuWHgB1PYIO3KD', 'usd', '280.00', '1', '2022-05-26 01:12:04', '2022-05-26 01:12:04'),
(7, '22060507', 2, 12, 'ch_3L7Dr5JCIneuWHgB18MKlwmV', 'Stripe', 'card_1L7Dr3JCIneuWHgBDi2mVvjf', 'txn_3L7Dr5JCIneuWHgB1AoclbqO', 'usd', '4840.00', '1', '2022-06-05 01:24:20', '2022-06-05 01:24:20'),
(8, '22060708', 2, 13, 'ch_3L7uj7JCIneuWHgB0wiWRhd4', 'Stripe', 'card_1L7uj5JCIneuWHgBQbmaWB98', 'txn_3L7uj7JCIneuWHgB0mwBBjDZ', 'usd', '3060.00', '1', '2022-06-06 23:10:56', '2022-06-06 23:10:56'),
(9, '22060809', 2, 14, 'ch_3L8LITJCIneuWHgB0NVy28UE', 'Stripe', 'card_1L8LISJCIneuWHgBDg4m4CKt', 'txn_3L8LITJCIneuWHgB0Ux5DexD', 'usd', '40.00', '1', '2022-06-08 03:33:08', '2022-06-08 03:33:08'),
(10, '22061210', 2, 6, 'ch_3L9otoJCIneuWHgB1rdXAKpt', 'Stripe', 'card_1L9otnJCIneuWHgBuvnRxkYQ', 'txn_3L9otoJCIneuWHgB1OC1hNHa', 'usd', '100.00', '1', '2022-06-12 05:21:41', '2022-06-12 05:21:41'),
(11, '22061311', 2, 6, 'ch_3LA6SRJCIneuWHgB1cUpR0rc', 'Stripe', 'card_1LA6SQJCIneuWHgBYxexcFf2', 'txn_3LA6SRJCIneuWHgB1l5xpJrS', 'usd', '140.00', '1', '2022-06-13 00:06:35', '2022-06-13 00:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `provider_customers`
--

CREATE TABLE `provider_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_address` text COLLATE utf8mb4_unicode_ci,
  `store_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_frontpage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_backpage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provider_payment_methods`
--

CREATE TABLE `provider_payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cardholder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=active, 2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provider_portfolios`
--

CREATE TABLE `provider_portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provider_reviews`
--

CREATE TABLE `provider_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `ic_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1=active, 2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `safety_rules`
--

CREATE TABLE `safety_rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `safety_rules`
--

INSERT INTO `safety_rules` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(4, 3, 'No Walk-ins', '2022-04-16 02:17:41', '2022-04-16 02:17:41'),
(5, 3, 'No waiting area', '2022-04-16 02:26:29', '2022-04-16 02:26:29'),
(6, 3, 'Employees wear masks', '2022-04-16 02:28:58', '2022-04-16 02:28:58'),
(7, 3, 'Employee temperature checks', '2022-04-16 02:29:15', '2022-04-16 02:29:15'),
(8, 3, 'Disinfection of all surfaces in the workplace', '2022-04-16 02:55:00', '2022-04-16 02:55:00'),
(9, 3, 'Disinfection between clients', '2022-04-16 02:55:25', '2022-04-16 02:55:25'),
(10, 3, 'Maintain social distancing', '2022-04-16 02:55:43', '2022-04-16 02:55:43'),
(11, 3, 'Client temperature checks', '2022-04-16 02:56:06', '2022-04-16 02:56:06'),
(12, 2, 'No Walk-ins', '2022-04-16 03:33:05', '2022-04-16 03:33:05'),
(13, 2, 'No waiting area', '2022-04-16 03:33:14', '2022-04-16 03:33:14'),
(14, 2, 'Employees wear masks', '2022-04-16 03:33:24', '2022-04-16 03:33:24'),
(15, 2, 'Employee temperature checks', '2022-04-16 03:33:34', '2022-04-16 03:33:34'),
(16, 2, 'Disinfection of all surfaces in the workplace', '2022-04-16 03:33:43', '2022-04-16 03:33:43'),
(17, 2, 'Disinfection between clients', '2022-04-16 03:33:51', '2022-04-16 03:33:51'),
(18, 2, 'Maintain social distancing', '2022-04-16 03:34:01', '2022-04-16 03:34:01'),
(19, 2, 'Client temperature checks', '2022-04-16 03:34:10', '2022-04-16 03:34:10'),
(20, 4, 'No Walk-ins', '2022-04-16 03:49:36', '2022-04-16 03:49:36'),
(21, 4, 'No waiting area', '2022-04-16 03:49:46', '2022-04-16 03:49:46'),
(22, 4, 'Employees wear masks', '2022-04-16 03:49:54', '2022-04-16 03:49:54'),
(23, 4, 'Employee temperature checks', '2022-04-16 03:50:02', '2022-04-16 03:50:02'),
(24, 4, 'Disinfection of all surfaces in the workplace', '2022-04-16 03:50:13', '2022-04-16 03:50:13'),
(25, 4, 'Disinfection between clients', '2022-04-16 03:50:31', '2022-04-16 03:50:31'),
(26, 4, 'Maintain social distancing', '2022-04-16 03:50:41', '2022-04-16 03:50:41'),
(27, 4, 'Client temperature checks', '2022-04-16 03:50:50', '2022-04-16 03:50:50'),
(28, 5, 'No Walk-ins', '2022-04-16 04:12:43', '2022-04-16 04:12:43'),
(29, 5, 'No waiting area', '2022-04-16 04:12:54', '2022-04-16 04:12:54'),
(30, 5, 'Employees wear masks', '2022-04-16 04:13:02', '2022-04-16 04:13:02'),
(31, 5, 'Employee temperature checks', '2022-04-16 04:13:10', '2022-04-16 04:13:10'),
(32, 5, 'Disinfection of all surfaces in the workplace', '2022-04-16 04:13:20', '2022-04-16 04:13:20'),
(33, 5, 'Disinfection between clients', '2022-04-16 04:13:28', '2022-04-16 04:13:28'),
(34, 5, 'Maintain social distancing', '2022-04-16 04:13:36', '2022-04-16 04:13:36'),
(35, 5, 'Client temperature checks', '2022-04-16 04:13:46', '2022-04-16 04:13:46'),
(36, 6, 'No Walk-ins', '2022-04-16 04:35:26', '2022-04-16 04:35:26'),
(37, 6, 'No waiting area', '2022-04-16 04:35:38', '2022-04-16 04:35:38'),
(38, 6, 'Employees wear masks', '2022-04-16 04:35:49', '2022-04-16 04:35:49'),
(39, 6, 'Employee temperature checks', '2022-04-16 04:35:59', '2022-04-16 04:35:59'),
(40, 6, 'Disinfection of all surfaces in the workplace', '2022-04-16 04:36:09', '2022-04-16 04:36:09'),
(41, 6, 'Disinfection between clients', '2022-04-16 04:36:23', '2022-04-16 04:36:23'),
(42, 6, 'Maintain social distancing', '2022-04-16 04:36:34', '2022-04-16 04:36:34'),
(43, 6, 'Client temperature checks', '2022-04-16 04:36:44', '2022-04-16 04:36:44'),
(44, 7, 'No Walk-ins', '2022-04-16 04:45:10', '2022-04-16 04:45:10'),
(45, 7, 'No waiting area', '2022-04-16 04:45:17', '2022-04-16 04:45:17'),
(46, 7, 'Employees wear masks', '2022-04-16 04:45:25', '2022-04-16 04:45:25'),
(47, 7, 'Employee temperature checks', '2022-04-16 04:45:41', '2022-04-16 04:45:41'),
(48, 7, 'Disinfection of all surfaces in the workplace', '2022-04-16 04:45:49', '2022-04-16 04:45:49'),
(49, 7, 'Disinfection between clients', '2022-04-16 04:45:56', '2022-04-16 04:45:56'),
(50, 7, 'Maintain social distancing', '2022-04-16 04:46:04', '2022-04-16 04:46:04'),
(51, 7, 'Client temperature checks', '2022-04-16 04:46:14', '2022-04-16 04:46:14'),
(52, 8, 'No Walk-ins', '2022-04-16 07:55:44', '2022-04-16 07:55:44'),
(53, 8, 'No waiting area', '2022-04-16 07:55:53', '2022-04-16 07:55:53'),
(54, 8, 'Employees wear masks', '2022-04-16 07:56:01', '2022-04-16 07:56:01'),
(55, 8, 'Employee temperature checks', '2022-04-16 07:56:09', '2022-04-16 07:56:09'),
(56, 8, 'Disinfection of all surfaces in the workplace', '2022-04-16 07:56:19', '2022-04-16 07:56:19'),
(57, 9, 'No Walk-ins', '2022-04-16 08:05:55', '2022-04-16 08:05:55'),
(58, 9, 'No waiting area', '2022-04-16 08:06:03', '2022-04-16 08:06:03'),
(59, 9, 'Employees wear masks', '2022-04-16 08:06:11', '2022-04-16 08:06:11'),
(60, 9, 'Employee temperature checks', '2022-04-16 08:06:20', '2022-04-16 08:06:20'),
(61, 9, 'Disinfection of all surfaces in the workplace', '2022-04-16 08:06:27', '2022-04-16 08:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` double NOT NULL,
  `discount_type` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `discount_price` double DEFAULT NULL,
  `price_active` int(11) DEFAULT NULL,
  `price_status` int(11) DEFAULT NULL,
  `service_hour` int(11) DEFAULT NULL,
  `service_min` int(11) DEFAULT NULL,
  `service_total_min` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `seo_keyword` text COLLATE utf8mb4_unicode_ci,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `default_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=active, 0=inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `provider_id`, `name`, `slug`, `selling_price`, `discount_type`, `discount`, `discount_price`, `price_active`, `price_status`, `service_hour`, `service_min`, `service_total_min`, `description`, `seo_keyword`, `seo_description`, `default_image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Father/ Son Haircut', 'father-son-haircut', 75, NULL, 0, 0, 1, 1, 1, 30, 90, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel minus aspernatur in, odio accusamus necessitatibus. Optio beatae unde alias similique.<br></p>', NULL, NULL, '/uploaded/service/1650056767_6259de3f20ef7.jpeg', 1, NULL, '2022-04-15 15:06:07', '2022-04-15 15:06:07'),
(2, 2, 'Touch up Color', 'touch-up-color', 75, NULL, 0, 0, 1, 1, 1, 30, 90, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel minus aspernatur in, odio accusamus necessitatibus. Optio beatae unde alias similique.<br></p>', NULL, NULL, '/uploaded/service/1650057002_6259df2a9aaba.jpeg', 1, NULL, '2022-04-15 15:10:02', '2022-06-11 05:18:30'),
(3, 3, 'Haircut', 'haircut', 70, NULL, 0, 0, 1, 1, 1, 20, 80, '<p><span style=\"color: rgb(118, 118, 118); font-family: ProximaNova-Regular; font-size: 16px; letter-spacing: 0.1px;\">All woman’s and men’s haircuts include infused steam towels, blowdry/ Style, eyebrow line up, and removal or line up of facial hair.</span><br></p>', NULL, NULL, '/uploaded/service/1650118834_625ad0b2bd249.jpeg', 1, NULL, '2022-04-16 08:20:34', '2022-04-16 08:20:34'),
(4, 3, 'All over Color+ Haircut', 'all-over-color-haircut', 97, NULL, 0, 0, 1, 1, 1, 10, 70, '<p><span style=\"color: rgb(118, 118, 118); font-family: ProximaNova-Regular; font-size: 16px; letter-spacing: 0.1px;\">Haircut included</span><br></p>', NULL, NULL, '/uploaded/service/1650118944_625ad12063560.jpeg', 1, NULL, '2022-04-16 08:22:24', '2022-04-16 08:22:24'),
(5, 3, 'Flex Package', 'flex-package', 100, 1, 20, 80, 1, 1, 2, 20, 240, '<p><span style=\"color: rgb(118, 118, 118); font-family: ProximaNova-Regular; font-size: 16px; letter-spacing: 0.1px;\">Haircut and style. (FACIAL HAIR INCLUDED)+WAX OF CHOICE.nose, lip, chin, eyebrow+ FACIALFACIAL INCLUDES:(hot steam and Steam towels)Deep facial cleanseExfoliating scrubCustomized maskaromatherapy</span><br></p>', NULL, NULL, '/uploaded/service/1650119076_625ad1a460ce8.jpeg', 1, NULL, '2022-04-16 08:24:36', '2022-04-16 08:24:36'),
(6, 3, 'SCALP MICROPIGMENTATION', 'scalp-micropigmentation', 2000, NULL, 0, 0, 1, 1, 3, 30, 210, '<p><span style=\"color: rgb(118, 118, 118); font-family: ProximaNova-Regular; font-size: 16px; letter-spacing: 0.1px;\">Scalp Micropigmentation, is a non-surgical, superficial cosmetic tattoo that gives the illusion of a close buzz cut hairstyle on a bald head or density to a thinning crown. The procedure can also be used to conceal scars from hair transplantation, and hide the visual impact of burns or scars on head. Last 4-6 years.</span><br></p>', NULL, NULL, '/uploaded/service/1650119262_625ad25ec6870.jpeg', 1, NULL, '2022-04-16 08:27:42', '2022-04-16 08:27:42'),
(7, 2, 'Adult Haircut', 'adult-haircut', 35, NULL, 0, 0, 1, 1, 1, 5, 65, '<p><span style=\"color: rgb(118, 118, 118); font-family: ProximaNova-Regular; font-size: 16px; letter-spacing: 0.1px;\">After&amp;Before hours pricing $65 Before 9am or after 7:00pm (Text before booking)</span><br></p>', NULL, NULL, '/uploaded/service/1650119724_625ad42c85ac1.jpeg', 1, NULL, '2022-04-16 08:35:24', '2022-04-16 08:35:24'),
(8, 2, 'Haircut with beard', 'haircut-with-beard', 45, NULL, 0, 0, 1, 1, 1, 5, 65, '<p><span style=\"color: rgb(118, 118, 118); font-family: ProximaNova-Regular; font-size: 16px; letter-spacing: 0.1px;\">After&amp;Before hours pricing $75 Before 9am or after 7:00pm (Text before booking)</span><br></p>', NULL, NULL, '/uploaded/service/1650119783_625ad4670eec2.jpeg', 1, NULL, '2022-04-16 08:36:23', '2022-04-16 08:36:23'),
(9, 2, 'Kids haircut', 'kids-haircut', 30, NULL, 0, 0, 1, 1, 1, 45, 105, '<p><span style=\"color: rgb(118, 118, 118); font-family: ProximaNova-Regular; font-size: 16px; letter-spacing: 0.1px;\">After&amp;Before hours pricing $40 Before 9am or after 7:00pm (Text before booking)</span><br></p>', NULL, NULL, '/uploaded/service/1650119859_625ad4b301837.jpeg', 1, NULL, '2022-04-16 08:37:39', '2022-04-16 08:37:39'),
(10, 4, 'Haircut with braids', 'haircut-with-braids', 75, NULL, 0, 0, 1, 1, 1, 30, 90, '<p><span style=\"color: rgb(118, 118, 118); font-family: ProximaNova-Regular; font-size: 16px; letter-spacing: 0.1px;\">After&amp;Before hours pricing $80 Before 9am or after 7:00pm (Text before booking)</span><br></p>', NULL, NULL, '/uploaded/service/1650120057_625ad5794e3b1.jpeg', 1, NULL, '2022-04-16 08:40:57', '2022-04-16 08:40:57'),
(11, 4, 'Before 9am or After 8pm Cut', 'before-9am-or-after-8pm-cut', 75, NULL, 0, 0, 1, 1, 1, 10, 70, '<p><span style=\"color: rgb(118, 118, 118); font-family: ProximaNova-Regular; font-size: 16px; letter-spacing: 0.1px;\">After&amp;Before hours pricing $75 Before 9am or after 6:00pm (Text before booking) $30 cancellation fee if cancelled same day</span><br></p>', NULL, NULL, '/uploaded/service/1650120139_625ad5cb27a30.jpeg', 1, NULL, '2022-04-16 08:42:19', '2022-04-16 08:42:19'),
(12, 4, 'Arms (Full)', 'arms-full', 40, NULL, 0, 0, 1, 1, 1, 10, 70, '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', NULL, NULL, '/uploaded/service/1650121005_625ad92d88626.jpeg', 1, NULL, '2022-04-16 08:56:45', '2022-04-16 08:56:45'),
(13, 3, 'Back (Full)', 'back-full', 60, NULL, 0, 0, 1, 1, NULL, 20, 20, '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', NULL, NULL, '/uploaded/service/1650121099_625ad98b9f2da.jpeg', 1, NULL, '2022-04-16 08:58:19', '2022-04-16 08:58:19'),
(14, 4, 'Bikini (Deep)', 'bikini-deep', 65, NULL, 0, 0, 1, 1, NULL, 20, 20, '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', NULL, NULL, '/uploaded/service/1650121145_625ad9b954e06.jpeg', 1, NULL, '2022-04-16 08:59:05', '2022-04-16 08:59:05'),
(15, 4, 'Back (Half)', 'back-half', 35, NULL, 0, 0, 1, 1, NULL, 15, 15, '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', NULL, NULL, '/uploaded/service/1650121269_625ada352bf8a.jpeg', 1, NULL, '2022-04-16 09:01:09', '2022-04-16 09:01:09'),
(16, 5, 'Manicure No Chip', 'manicure-no-chip', 45, NULL, 0, 0, 1, 1, NULL, 30, 30, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,</span><br></p>', NULL, NULL, NULL, 1, NULL, '2022-04-16 14:06:16', '2022-04-16 14:06:16'),
(17, 5, 'Regular Mani&Pedi', 'regular-manipedi', 65, NULL, 0, 0, 1, 1, 1, NULL, 60, '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', NULL, NULL, NULL, 1, NULL, '2022-04-16 14:08:45', '2022-04-16 14:08:45'),
(18, 5, 'Manicure Regular', 'manicure-regular', 25, NULL, 0, 0, 1, 1, NULL, 25, 25, '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', NULL, NULL, NULL, 1, NULL, '2022-04-16 14:09:36', '2022-04-16 14:09:36'),
(19, 5, 'Pedicure no chip', 'pedicure-no-chip', 55, NULL, 0, 0, 1, 1, NULL, 30, 30, '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', NULL, NULL, NULL, 1, NULL, '2022-04-16 14:11:04', '2022-04-16 14:11:04'),
(20, 5, 'Regular Mani', 'regular-mani', 60, NULL, 0, 0, 1, 1, 0, 30, 30, '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', NULL, NULL, NULL, 1, NULL, '2022-04-16 14:12:17', '2022-04-18 02:36:21'),
(21, 18, 'Test', 'test', 200, 1, 20, 180, 2, 1, 1, 5, 65, '<p>test</p>', 'test', 'test', '/uploaded/service/1650621255_62627b471e34c.jpg', 1, '2022-05-18 05:49:50', '2022-04-22 14:53:40', '2022-05-18 05:49:50'),
(27, 2, 'Ocean Alvarez', 'ocean-alvarez', 981, 2, 18, 804.42, 2, 2, 19, 50, 1190, '<p>saasasdasdsadsa</p>', 'Enim vero magnam nec', 'Est adipisicing rer', NULL, 0, NULL, '2022-04-27 11:25:07', '2022-04-27 11:25:07'),
(28, 33, 'Hair Cut', 'hair-cut', 120, 1, 0, 120, 1, 1, 1, 5, 65, '<p>fafadfadadfa</p>', 'adfad', 'afda', NULL, 1, '2022-05-18 05:49:44', '2022-04-27 12:49:48', '2022-05-18 05:49:44'),
(29, 38, 'hairCut of honey', 'haircut-of-honey', 120, 1, 0, 120, 1, 1, 1, 5, 65, '<p>sadadasdsadsadsadasdsadsadasdsadasdsa</p>', 'sadsad', 'asdsadasd', '/uploaded/service/1651102521_6269d339e9dbe.png', 1, '2022-05-18 05:49:38', '2022-04-27 17:35:21', '2022-05-18 05:49:38'),
(30, 38, 'Nail Cut OF honey', 'nail-cut-of-honey', 120, 1, 0, 120, 1, 1, 1, 5, 65, '<p>sadasdsadsadad</p>', 'asdasd', 'asdsadsa', '/uploaded/service/1651102564_6269d3643e067.png', 1, '2022-05-18 05:49:32', '2022-04-27 17:36:04', '2022-05-18 05:49:32'),
(31, 39, 'hairCut of ic', 'haircut-of-ic', 120, 1, 0, 120, 1, 1, 1, 5, 65, '<p>asdasdasdasd</p>', 'asdsa', 'asdasd', '/uploaded/service/1651102897_6269d4b1c7abd.jpg', 1, '2022-05-18 05:49:25', '2022-04-27 17:41:37', '2022-05-18 05:49:25'),
(32, 39, 'Nail Cut OF ic', 'nail-cut-of-ic', 120, 1, 0, 120, 1, 1, 1, 5, 65, '<p>asdasdasdsad</p>', 'asdasd', 'sadasdsad', '/uploaded/service/1651102937_6269d4d92333a.jpg', 1, '2022-05-18 05:49:18', '2022-04-27 17:42:17', '2022-05-18 05:49:18'),
(33, 40, 'hairCut of tonmoy', 'haircut-of-tonmoy', 120, 1, 0, 120, 1, 1, 1, 5, 65, '<p>asdasdasd</p>', 'asdasd', 'asdasd', '/uploaded/service/1651103071_6269d55f79d39.jpg', 1, '2022-05-18 05:49:11', '2022-04-27 17:44:31', '2022-05-18 05:49:11'),
(34, 40, 'Nail Cut OF tonmoy', 'nail-cut-of-tonmoy', 120, 1, 0, 120, 1, 1, 1, 5, 65, '<p>asdasdasdas</p>', 'asdasd', 'asdasd', '/uploaded/service/1651103133_6269d59d0209c.png', 1, '2022-05-18 05:49:05', '2022-04-27 17:45:05', '2022-05-18 05:49:05'),
(35, 2, 'xyz', 'xyz', 127, 1, 86, 41, 1, 2, 1, 55, 115, 'Ut fugiat pariatur. .sasadsadsad', 'Voluptatibus lorem d', 'Voluptatibus necessi', NULL, 1, NULL, '2022-06-08 05:05:18', '2022-06-15 05:46:07'),
(36, 10, 'hello', 'hello', 100, NULL, 0, 0, 1, 1, 1, 5, 65, '<p>aasdsada</p>', 'asdsa', 'asdasdsa', '/uploaded/service/1655185187_62a81f2381ee2.jpeg', 1, NULL, '2022-06-13 23:39:47', '2022-06-13 23:39:47'),
(37, 2, 'hellos', 'hellos', 120, NULL, 0, 0, 1, 1, 1, 30, 90, '<p>asasa</p>', 'saas', 'asasa', NULL, 1, NULL, '2022-06-15 01:38:05', '2022-06-15 05:54:45'),
(38, 58, 'helloHair', 'hellohair', 100, NULL, 0, 0, 1, 1, 0, 30, 30, '<p>asdfasdasdas</p>', NULL, NULL, NULL, 1, NULL, '2022-06-22 00:09:07', '2022-06-22 00:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `service_images`
--

CREATE TABLE `service_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_images`
--

INSERT INTO `service_images` (`id`, `service_id`, `service_image`, `created_at`, `updated_at`) VALUES
(1, 36, '/uploaded/service/image/1655185187_62a81f2385efa.jpeg', '2022-06-13 23:39:47', '2022-06-13 23:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `service_reviews`
--

CREATE TABLE `service_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `ic_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1=active, 2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_review_items`
--

CREATE TABLE `service_review_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `ic_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_fee` double NOT NULL DEFAULT '0',
  `coupon_fee_one` double NOT NULL DEFAULT '0',
  `coupon_fee_all` double NOT NULL DEFAULT '0',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `white_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_slogan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `booking_fee`, `coupon_fee_one`, `coupon_fee_all`, `logo`, `white_logo`, `site_name`, `site_slogan`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `youtube_link`, `phone`, `email`, `address`, `latitude`, `longitude`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 0, 20, 200, '/uploaded/logo/1650276080_625d36f0489fe.png', '/uploaded/logo/1650052272_6259ccb033d6a.png', 'Book3m', 'Just 3 Clicks to book, It\'s that easy', NULL, NULL, NULL, NULL, NULL, '+1 1234567890', 'info@book3m.com', 'New York State, USA', '43.2994285', '-74.21793260000001', '© 2022 Just Book3m. All rights reserved', '2022-04-15 13:47:44', '2022-05-25 04:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `provider_id`, `facebook`, `twitter`, `linkedin`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 2, 'https://facebook.com', 'https://twitter.com', 'https://linkedin.com', 'https://instagram.com', 'https://youtube.com', '2022-04-15 14:59:34', '2022-04-15 14:59:34'),
(2, 3, 'https://www.facebook.com/', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.instagram.com', 'https://www.youtube.com', '2022-04-16 03:16:37', '2022-04-16 03:16:37'),
(3, 4, 'https://www.facebook.com/', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.instagram.com', 'https://www.youtube.com', '2022-04-16 03:47:44', '2022-04-16 03:47:44'),
(4, 5, 'https://www.facebook.com/', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.instagram.com', 'https://www.youtube.com', '2022-04-16 04:07:29', '2022-04-16 04:07:29'),
(5, 6, 'https://www.facebook.com/', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.instagram.com', 'https://www.youtube.com', '2022-04-16 04:32:10', '2022-04-16 04:32:10'),
(6, 7, 'https://www.facebook.com/', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.instagram.com', 'https://www.youtube.com', '2022-04-16 04:42:40', '2022-04-16 04:42:40'),
(7, 8, 'https://www.facebook.com/', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.instagram.com', 'https://www.youtube.com', '2022-04-16 07:51:20', '2022-04-16 07:51:20'),
(8, 9, 'https://www.facebook.com/', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.instagram.com', 'https://www.youtube.com', '2022-04-16 08:03:59', '2022-04-16 08:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_id`, `stripe_status`, `stripe_plan`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, 3, 'default', 'sub_1KpZ2wJCIneuWHgBEQgBCyMI', 'active', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, NULL, NULL, '2022-04-17 19:25:52', '2022-04-17 19:25:52'),
(2, 18, 'default', 'sub_1KrJAIJCIneuWHgBZnCpnUE6', 'active', 'price_1KeR3dJCIneuWHgBS0ahJDBo', 1, NULL, NULL, '2022-04-22 14:52:40', '2022-04-22 14:52:40'),
(3, 10, 'default', 'sub_1Kt713JCIneuWHgBJo454VXx', 'active', 'price_1KeR3dJCIneuWHgBS0ahJDBo', 1, NULL, NULL, '2022-04-27 03:17:24', '2022-04-27 03:17:24'),
(4, 2, 'default', 'sub_1Kt76eJCIneuWHgBlfEX5B1V', 'active', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, NULL, NULL, '2022-04-27 03:23:11', '2022-04-27 03:23:11'),
(5, 31, 'default', 'sub_1Kt8wzJCIneuWHgBXhpOsEoE', 'active', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, NULL, NULL, '2022-04-27 11:22:31', '2022-04-27 11:22:31'),
(6, 33, 'default', 'sub_1KtAIeJCIneuWHgBGATIeBg0', 'active', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, NULL, NULL, '2022-04-27 12:48:59', '2022-04-27 12:48:59'),
(7, 38, 'default', 'sub_1KtKAYJCIneuWHgBJBFXYunh', 'active', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, NULL, NULL, '2022-04-27 17:21:18', '2022-04-27 17:21:18'),
(8, 39, 'default', 'sub_1KtKTDJCIneuWHgBLpspUpXt', 'active', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, NULL, NULL, '2022-04-27 17:40:35', '2022-04-27 17:40:35'),
(9, 40, 'default', 'sub_1KtKWEJCIneuWHgB3Qm26l04', 'active', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, NULL, NULL, '2022-04-27 17:43:41', '2022-04-27 17:43:41'),
(10, 58, 'default', 'sub_1LDMlrJCIneuWHgBksVaz98y', 'active', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, NULL, NULL, '2022-06-22 00:07:54', '2022-06-22 00:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_items`
--

INSERT INTO `subscription_items` (`id`, `subscription_id`, `stripe_id`, `stripe_plan`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'si_LWcHlHAw425IBp', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, '2022-04-17 19:25:52', '2022-04-17 19:25:52'),
(2, 2, 'si_LYQ0BXwWJMXE1R', 'price_1KeR3dJCIneuWHgBS0ahJDBo', 1, '2022-04-22 14:52:40', '2022-04-22 14:52:40'),
(3, 3, 'si_LaHajobwua0kMr', 'price_1KeR3dJCIneuWHgBS0ahJDBo', 1, '2022-04-27 03:17:24', '2022-04-27 03:17:24'),
(4, 4, 'si_LaHgjt5asDHUrP', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, '2022-04-27 03:23:11', '2022-04-27 03:23:11'),
(5, 5, 'si_LaJakLoAN70v4K', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, '2022-04-27 11:22:31', '2022-04-27 11:22:31'),
(6, 6, 'si_LaKyugM4xNlmoO', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, '2022-04-27 12:48:59', '2022-04-27 12:48:59'),
(7, 7, 'si_LaVAiJL6yB5v5Z', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, '2022-04-27 17:21:18', '2022-04-27 17:21:18'),
(8, 8, 'si_LaVUtDKADhCkzz', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, '2022-04-27 17:40:35', '2022-04-27 17:40:35'),
(9, 9, 'si_LaVX1m4CaZljrg', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, '2022-04-27 17:43:41', '2022-04-27 17:43:41'),
(10, 10, 'si_LvDCYP4DVqVdbT', 'price_1KeR4bJCIneuWHgBeGYslEp1', 1, '2022-06-22 00:07:54', '2022-06-22 00:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `terms_services`
--

CREATE TABLE `terms_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_services`
--

INSERT INTO `terms_services` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Terms of Service', '<p>The Services (as defined herein) and Terms of Use are provided by Book3m.</p><p>ANY USERS WHO DO NOT AGREE WITH THESE TERMS OF USE SHOULD NOT USE THE SERVICES! THIS AGREEMENT CONTAINS,\r\nAMONG OTHER THINGS, AN ARBITRATION PROVISION CONTAINING A CLASS ACTION WAIVER.</p><p><b>Part I – Definitions, Agreement to be Bound.</b></p><p>References to the “Booking Services” mean those appointment-scheduling services made available by us through the Book3m Application.</p><p> References to the “Book3m Application” mean any mobile, web, or voice software application related\r\n                    to the Services designed, developed, and/or made available by us and available through the iTunes\r\n                    and Google Play stores as well as other third-party services, including but not limited to Amazon\r\n                    Alexa and Google Home.</p><p>References to the “Book3m Site” mean the Web site bearing the URL http://www.booksy.com and all\r\n                    affiliated websites owned and operated by Book3m , our subsidiaries, and related companies.</p><p>References to the “Commercial Content” mean content that advertises or promotes a commercial\r\n                    product or service.</p><p>References to a “Customer” mean any person or entity who uses the Book3m Application Book3m Site, or a Third-Party Platform as defined in Section 3.8 to schedule an appointment, manage appointments, browse health-, beauty- and wellness-related content and services, and/or pay for services rendered, whether said individual registers directly for the use of the Book3m Application or is added by an Book3m&nbsp; through whom Customer obtains services.</p><p>References to “Dispute” mean any claim, conflict, controversy, or disagreement between the Parties\r\n                    arising out of, or related in any way to, these Terms (or any Terms, supplement, or amendment\r\n                    contemplated by these Terms,) including, without limitation, any action in tort, contract, or\r\n                    otherwise, at equity or at law, or any alleged breach, including, without limitation, any matter\r\n                    with respect to the meaning, effect, validity, performance, termination, interpretation, or\r\n                    enforcement of these Terms or any terms contemplated by the Terms.</p><p>References to “Material Breach” mean any breach of these Terms upon the occurrence of which a\r\n                    reasonable person in the position of the non-breaching Party would wish to immediately terminate\r\n                    these Terms because of that breach.</p><p>References to a “Book3m ” mean a small or medium business and seller of goods, services, or products who use the Services to allow Customers to book, manage, view, and cancel appointments.<br></p><p><span style=\"color: rgb(32, 33, 36); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap;\"><b><br></b></span><br></p><p><span style=\"color: rgb(32, 33, 36); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap;\"><br></span>                                            \r\n                                        </p>', '2022-04-16 09:36:31', '2022-04-17 03:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` int(11) DEFAULT NULL COMMENT '1 = admin, 2 = user',
  `usertype` int(11) DEFAULT NULL COMMENT '1=facility, 2=customer',
  `admintype` int(11) DEFAULT NULL,
  `providertype` int(11) DEFAULT NULL COMMENT '1=facility, 2=IC, 3=employee',
  `ic_provider_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_about` longtext COLLATE utf8mb4_unicode_ci,
  `thumbnail_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `travel_fee` double DEFAULT '0',
  `travel_policy` text COLLATE utf8mb4_unicode_ci,
  `service_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=my place, 2=client location',
  `work_start_time` time DEFAULT NULL,
  `work_end_time` time DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 = active, 1 = deactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ic_status` tinyint(2) DEFAULT '0' COMMENT 'Travel=0,Station=1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `usertype`, `admintype`, `providertype`, `ic_provider_id`, `name`, `email`, `provider_id`, `provider`, `email_verified_at`, `mobile`, `address`, `latitude`, `longitude`, `gender`, `image`, `password`, `business_name`, `business_url`, `business_logo`, `business_about`, `thumbnail_img`, `travel_fee`, `travel_policy`, `service_location`, `work_start_time`, `work_end_time`, `rating`, `last_seen`, `status`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `ic_status`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 'Book3m', 'admin@gmail.com', NULL, NULL, '2022-04-15 20:40:56', '+1 1234567890', NULL, NULL, NULL, NULL, NULL, '$2y$10$OMn5orhAs4pd3k2sek5otunoxujpqFEFbB.3GZpFJVEB8fCYH3TVq', NULL, 'hello', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2022-06-06 23:06:58', 1, 'k4J1rU6pTahNNgBqLmd7PcJH0022LhH2aEQrr8W97BhTmv6iJpwei5dQMtWM', '2022-04-15 13:47:44', '2022-06-06 23:06:58', NULL, NULL, NULL, NULL, 0),
(2, 2, 1, NULL, 1, NULL, 'Vendor', 'vendor1@gmail.com', NULL, NULL, '2022-04-15 20:40:56', '+1 1234567890', '2701 Black Rd, Joliet, IL 60435, USA', 41.5383591, -88.1486805, NULL, NULL, '$2y$10$naU8U0CW8unx5g6IFgreY.YfiZCFEOjjWDuCzbe.enSZODxplYsTy', 'Savanna', 'savanna', '/uploaded/provider/1650056464_6259dd1015a2d.jpeg', 'My name is Savanna. I’ve been licensed for seven amazing years and have built a great clientele along the way. I specialize in men’s grooming and detailed haircuts.  I love coloring hair as well!  Any thing to help my clients ‘FLEX THEIR CONFIDENCE’. In September 2019- I opened Studio Flex. Studio Flex is located inside Chicago Sports and Fitness club', '/uploaded/provider/1650055883_6259dacbc0b24.jpeg', 10, NULL, '2', '10:00:00', '17:00:00', NULL, '2022-06-18 05:37:29', 0, NULL, '2022-04-15 14:07:28', '2022-06-18 05:37:29', 'cus_LaHfLtEQ4lY3ix', 'visa', '4242', NULL, 0),
(3, 2, 1, NULL, 1, NULL, 'Vendor', 'vendor2@gmail.com', NULL, NULL, '2022-04-15 20:41:09', '+1 1234567890', '1159 West Madison Street, Chicago, IL 60607, USA', 41.88147590000001, -87.6565021, NULL, NULL, '$2y$10$PRvZ7BloutD2Wm6sfLuMs.Y7tsxUYkzHdNj5Dgxm1OgYoiCAHb6tS', 'Kevin Michael Hair Pro', 'kevin-michael-hair-pro', '/uploaded/provider/1650100094_625a877eda5db.jpeg', 'Providing fresh and crisp cuts to the Chicagoland area is my passion, and I welcome any and all clients to our shop on North Pulaski Road, where you will be able to choose from a plethora of different  haircut styles, beard grooming options, and eyebrow maintenance services. Find your barber home today at Platinum Fades!', '/uploaded/provider/1650100094_625a877edabc4.jpeg', 20, NULL, '2', '10:00:00', '20:00:00', NULL, '2022-06-08 05:38:36', 1, NULL, '2022-04-15 14:10:41', '2022-06-08 05:38:36', 'cus_LWcHG7zLtnj6F6', 'visa', '4242', NULL, 0),
(4, 2, 1, NULL, 1, NULL, 'Vendor', 'vendor3@gmail.com', NULL, NULL, '2022-04-15 20:41:12', '+1 1234567890', '1534 W Brandon Blvd, Brandon, FL 33511, USA', 27.9389707, -82.30771, NULL, NULL, '$2y$10$Q.hHN/D0B63z96Fz4e1jm.jX/iMqnLiI7HB28DdmYZCBKGP8FB0Z2', 'Mi Amor Hair Studios @ Salons By JC Suite 36', 'mi-amor-hair-studios-at-salons-by-jc-suite-36', '/uploaded/provider/1650102281_625a9009ec1a0.jpeg', 'Barber at Fresko Fadez 3: Licensed Professional who specializes in men’s haircuts, beard trims, hot towel shaves, design work, kids cuts, undercuts, and certain women’s haircuts. Instagram: designsb', '/uploaded/provider/1650102281_625a9009ec7c1.jpeg', 20, NULL, '2', '10:00:00', '21:00:00', NULL, '2022-04-16 13:55:53', 1, NULL, '2022-04-15 14:12:34', '2022-04-16 13:55:53', NULL, NULL, NULL, '2022-04-20 14:12:34', 0),
(5, 2, 1, NULL, 1, NULL, 'Vendor1', 'vendor4@gmail.com', NULL, NULL, '2022-04-15 20:40:56', '+1 1234567890', 'My Salon Suite of Coral Gables - South Miami, 1340 South Dixie Highway, Coral Gables, FL 33146, USA', 25.7128836, -80.2783851, NULL, NULL, '$2y$10$cI8bAEWJByNg3S.nFlbc9O780AjzndnSfpoZV1wBOm9g7JRHzbEpW', 'J•Nat Hair Studio', 'jnat-hair-studio', '/uploaded/provider/1650103378_625a945245332.jpeg', 'Barber at Fresko Fadez 3: Licensed Professional who specializes in men’s haircuts, beard trims, hot towel shaves, design work, kids cuts, undercuts, and certain women’s haircuts. Instagram', '/uploaded/provider/1650103378_625a945245891.jpeg', 30, NULL, '2', '10:00:00', '20:00:00', NULL, '2022-04-16 14:00:16', 1, NULL, '2022-04-15 14:14:08', '2022-04-16 14:00:16', NULL, NULL, NULL, '2022-04-20 14:14:08', 0),
(6, 2, 1, NULL, 1, NULL, 'Vendor', 'vendor5@gmail.com', NULL, NULL, '2022-04-15 20:40:56', '+1 1234567890', '70 Calle Marina, Ponce, 00730, Puerto Rico', 18.0118322, -66.6135504, NULL, NULL, '$2y$10$G0b4ikfTGA7oHmyyhvbtwu8Zvlf68WEYptjoLns9ANyQrn7LYXZfG', 'The Black White Salon', 'the-black-white-salon', '/uploaded/provider/1650104953_625a9a796fd15.jpeg', 'Barber Stylist', '/uploaded/provider/1650104953_625a9a797094b.jpeg', 20, NULL, '2', '10:00:00', '19:00:00', NULL, '2022-04-16 04:37:34', 1, NULL, '2022-04-15 14:16:48', '2022-04-16 04:37:34', NULL, NULL, NULL, '2022-04-20 14:16:48', 0),
(7, 2, 1, NULL, 1, NULL, 'Vendor', 'vendor6@gmail.com', NULL, NULL, '2022-04-15 20:40:56', '+1 1234567890', '2847 N Pulaski Rd, Chicago, IL 60641, USA', 41.9331587, -87.7266698, NULL, NULL, '$2y$10$89FsrPEQwBjzFRSp9GftUe42a57I/CUR9gyc.08PgKtOV9jBPxe.K', 'Vince @ Platinum Fades', 'vince-at-platinum-fades', '/uploaded/provider/1650105615_625a9d0fdc1e8.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '/uploaded/provider/1650105615_625a9d0fdceca.jpeg', 30, NULL, '2', '10:00:00', '20:00:00', NULL, '2022-04-16 04:47:10', 1, NULL, '2022-04-15 14:19:10', '2022-04-16 04:47:10', NULL, NULL, NULL, '2022-04-20 14:19:10', 0),
(8, 2, 1, NULL, 1, NULL, 'Vendor', 'vendor7@gmail.com', NULL, NULL, '2022-04-15 20:40:56', '+1 1234567890', '415 N Main St, Euless, TX 76039, USA', 32.8424801, -97.0832511, NULL, NULL, '$2y$10$ZyX.sN4s3taahiw2LAPzXeSSkYptpaxs2aOQIficIXHufh7RkfAaC', 'Styles Barber & Beauty', 'styles-barber-beauty', '/uploaded/provider/1650116912_625ac9309cd5d.jpeg', 'Styles Barber&Beauty EST. 1998', '/uploaded/provider/1650116912_625ac9309da71.jpeg', 10, NULL, '1', '10:00:00', '19:00:00', NULL, '2022-04-16 07:57:25', 1, NULL, '2022-04-15 14:20:58', '2022-04-16 07:57:25', NULL, NULL, NULL, '2022-04-20 14:20:58', 0),
(9, 2, 1, NULL, 1, NULL, 'Vendor', 'vendor8@gmail.com', NULL, NULL, '2022-04-15 20:40:56', '+1 1234567890', '5935 West 35th Street, Cicero, IL 60804, USA', 41.8287954, -87.7723355, NULL, NULL, '$2y$10$wYUP6WT63DxThL7Tq4kDV.WOYyB6sF9d1TFIGMdV02T1rpixN1doS', 'How To Fade Hair', 'how-to-fade-hair', '/uploaded/provider/1650117684_625acc349f7c4.jpeg', 'My name is Savanna. I’ve been licensed for seven amazing years and have built a great clientele along the way. I specialize in men’s grooming and detailed haircuts.  I love coloring hair as well!  Any thing to help my clients ‘FLEX THEIR CONFIDENCE’. In September 2019- I opened Studio Flex. Studio Flex is located inside Chicago Sports and Fitness club.  Where health and fitness go hand and hand with beauty and self confidence.  In addition to men and woman’s hairstyling, we offer hair coloring, perms, braids, extensions, nail extensions, waxing services, facial services, permanent makeup and much more.  \r\nVisit Studio Flex Joliet on Booksy to book an appointment. Your services is greatly appreciated.', '/uploaded/provider/1650117684_625acc34a022c.jpeg', 20, NULL, '2', '10:00:00', '21:00:00', NULL, '2022-04-16 08:12:27', 1, NULL, '2022-04-15 14:23:02', '2022-04-16 08:12:27', NULL, NULL, NULL, '2022-04-20 14:23:02', 0),
(10, 2, 1, NULL, 2, NULL, 'TonmoyIc', 'ic1@gmail.com', NULL, NULL, '2022-04-21 01:38:01', '+1 225584711', 'Dhaka, Bangladesh', NULL, NULL, NULL, NULL, '$2y$10$dxvlewJSxm91UzRV9lZa.esg2Qlj/5TgQlwPzCw2KvFo/TBaa.mKy', 'Styler Barbar', 'styler-barbar', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2022-06-22 00:05:33', 1, NULL, '2022-04-16 13:41:54', '2022-06-22 00:05:33', 'cus_LaHaNUwO8QaUVV', 'visa', '4242', NULL, 0),
(11, 2, 1, NULL, 2, NULL, 'Vince', 'ic2@gmail.com', NULL, NULL, NULL, '+1 556325147', 'New York, NY, USA', NULL, NULL, NULL, NULL, '$2y$10$NEOUI5nxm9dU9f8mmFczreQFUVhm/q3CIjAxQx83HnvpKiG.A49IC', 'vince', 'vince', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-04-16 13:48:16', '2022-04-16 13:48:16', NULL, NULL, NULL, NULL, 0),
(12, 2, 1, NULL, 2, NULL, 'Waxing At Tiffany’s', 'ic3@gmail.com', NULL, NULL, NULL, '+1 6325487198', 'Kingdom of Kushti, Halleck, NV, USA', NULL, NULL, NULL, NULL, '$2y$10$o2hZhGQSiTts.aiw7d9liewWBKVw1wu7qDho/nvIrK2WX6HPxkFVa', 'Waxing At Tiffany’s', 'waxing-at-tiffanys', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-04-16 13:54:47', '2022-04-16 13:54:47', NULL, NULL, NULL, NULL, 0),
(13, 2, 1, NULL, NULL, NULL, 'Fade Hair', 'ic4@gmail.com', NULL, NULL, NULL, '+1 3621547965', 'U.S. Virgin Islands', NULL, NULL, NULL, NULL, '$2y$10$x3SpYSRtqPsERg/EBKn.6ePcYL0NMwduBXKraoAC/ArdyogmFk8Ze', 'Fade Hare', 'fade-hare', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-04-16 13:57:48', '2022-06-13 04:08:54', NULL, NULL, NULL, NULL, 0),
(14, 2, 2, NULL, NULL, NULL, 'customer', 'customer@gmail.com', NULL, NULL, '2022-04-06 01:37:04', '+1 12548736', 'USA', 37.09024, -95.712891, NULL, NULL, '$2y$10$M328k8P1PIYLNVYNPgaH5OqrUyH4w4NU1SSeRNh.2./hL2yqU2zKa', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2022-06-22 04:50:44', 1, NULL, '2022-04-16 14:16:47', '2022-06-22 04:50:44', NULL, NULL, NULL, NULL, 0),
(15, 2, 2, NULL, NULL, NULL, 'MD. IMRAN', 'ektechimran2@gmail.com', NULL, NULL, '2022-04-17 17:08:06', '+880 1755430927', 'Dhaka, Bangladesh', 23.810332, 90.4125181, NULL, NULL, '$2y$10$9l0NwC/DvT2GS7D68PXDEeEXIqpR26GNX0SH9bT7X8DVPj3KT44VC', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2022-04-22 15:07:08', 1, NULL, '2022-04-17 15:29:50', '2022-04-22 15:07:08', NULL, NULL, NULL, NULL, 0),
(16, 2, 2, NULL, NULL, NULL, 'Mehnaz Shawkat Wasima', 'mehnaz.wasima203@gmail.com', NULL, NULL, NULL, '+880 1755768062', '120/A East Maderbari, Shirin Mahal,  Dharogahut road,  Chittagon', 0, 0, NULL, NULL, '$2y$10$KGfMKOPK/IKgf9CkW/auueIQvBQY/g1Mgmi91V5sxR4xQxRO8quCy', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2022-04-19 19:58:21', 1, NULL, '2022-04-19 19:58:17', '2022-04-22 18:33:48', NULL, NULL, NULL, NULL, 0),
(17, 1, NULL, NULL, NULL, NULL, 'Mehnaz Shawkat Wasima', 'superadmin@gmail.com', NULL, NULL, NULL, '01755768062', NULL, NULL, NULL, NULL, NULL, '$2y$10$EVlN4u3drpAt81R6fGwHzuSA/pZUKr3TDLzz.C3z4cSyo8ZvuHeMi', NULL, 'okk', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-04-22 14:39:28', '2022-04-22 14:39:28', NULL, NULL, NULL, NULL, 0),
(41, 2, NULL, NULL, 3, 38, 'ChlidTonmoy', 'chlidtonmoy@gmail.com', NULL, NULL, NULL, '+8801820840336', 'Chowmony', NULL, NULL, NULL, NULL, '$2y$10$sA9O5504jBAUNUW0mTFRg.1BPx5FxESy.rrupO9yCYIGvNIIZ0GQG', 'ChlidTonmoy', 'chlidtonmoy', NULL, 'ChlidTonmoy', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-04-27 17:37:09', '2022-04-27 17:37:09', NULL, NULL, NULL, NULL, 0),
(55, 2, NULL, NULL, 3, 2, 'tonmoy', 'tonmoy@mintsoft.org', NULL, NULL, NULL, '0182000147', 'sadsadadsa', NULL, NULL, NULL, NULL, '$2y$10$GH4UQ4e238zqEgAf1P6lMudtDdHEfnHrzS/D69u4N2ukESAwIfSiS', 'tonmoy slug', 'tonmoy-slug', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-06-04 06:07:28', '2022-06-05 00:40:20', NULL, NULL, NULL, NULL, 0),
(57, 2, NULL, NULL, 3, 2, 'helloworld', 'helloworld@gmail.com', NULL, NULL, NULL, '0182000147', 'sadsadadsa', NULL, NULL, NULL, NULL, '$2y$10$aYPVgtc33dx6AYLBDw8wUublIN/A11N1e1ncYAsVE5rzQ69u10rIO', 'helloworld', 'helloworld', NULL, 'helloworld', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-06-05 00:48:58', '2022-06-05 00:48:58', NULL, NULL, NULL, NULL, 0),
(58, 2, 1, NULL, 2, NULL, 'tonmoy12312', 'tonmoy12312@gmail.com', NULL, NULL, NULL, '+880 123456789', 'Chittagong, Bangladesh', NULL, NULL, NULL, NULL, '$2y$10$.Q.uBL8BbodDU3wC5r3sBOnAar4XQTLJVzzO86sF/RFZG1N7aeF32', 'dsfsdfsd', 'dsfsdfsd', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2022-06-22 02:17:20', 1, NULL, '2022-06-22 00:07:07', '2022-06-22 02:17:20', 'cus_LvDCg8sMh6APrt', 'visa', '4242', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin__reviews`
--
ALTER TABLE `admin__reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_service_cupons`
--
ALTER TABLE `all_service_cupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `all_service_cupons_user_id_foreign` (`user_id`),
  ADD KEY `all_service_cupons_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_items`
--
ALTER TABLE `appointment_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_title_unique` (`title`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_category_name_unique` (`category_name`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Indexes for table `business_categories`
--
ALTER TABLE `business_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_hours`
--
ALTER TABLE `business_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_hour_updates`
--
ALTER TABLE `business_hour_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childcategories`
--
ALTER TABLE `childcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_country_name_unique` (`country_name`);

--
-- Indexes for table `coupon_payments`
--
ALTER TABLE `coupon_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `districts_district_name_unique` (`district_name`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `divisions_division_name_unique` (`division_name`);

--
-- Indexes for table `employee_services`
--
ALTER TABLE `employee_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_services_user_id_foreign` (`user_id`),
  ADD KEY `employee_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `expreinces`
--
ALTER TABLE `expreinces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expreinces_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_to_clients`
--
ALTER TABLE `faq_to_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite_businesses`
--
ALTER TABLE `favourite_businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_plans`
--
ALTER TABLE `feature_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_plans_feature_id_foreign` (`feature_id`),
  ADD KEY `feature_plans_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `ic_portfolios`
--
ALTER TABLE `ic_portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_reviews`
--
ALTER TABLE `ic_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_social_media`
--
ALTER TABLE `ic_social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_to_customer_reviews`
--
ALTER TABLE `ic_to_customer_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_name_unique` (`name`),
  ADD UNIQUE KEY `plans_slug_unique` (`slug`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricings`
--
ALTER TABLE `pricings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pricings_name_unique` (`name`),
  ADD UNIQUE KEY `pricings_slug_unique` (`slug`);

--
-- Indexes for table `privacy__policies`
--
ALTER TABLE `privacy__policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_balances`
--
ALTER TABLE `provider_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_coupon_pays`
--
ALTER TABLE `provider_coupon_pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_customers`
--
ALTER TABLE `provider_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_payment_methods`
--
ALTER TABLE `provider_payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_portfolios`
--
ALTER TABLE `provider_portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_reviews`
--
ALTER TABLE `provider_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `safety_rules`
--
ALTER TABLE `safety_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_images`
--
ALTER TABLE `service_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_reviews`
--
ALTER TABLE `service_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_review_items`
--
ALTER TABLE `service_review_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_plan_unique` (`subscription_id`,`stripe_plan`),
  ADD KEY `subscription_items_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `terms_services`
--
ALTER TABLE `terms_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin__reviews`
--
ALTER TABLE `admin__reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `all_service_cupons`
--
ALTER TABLE `all_service_cupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `appointment_items`
--
ALTER TABLE `appointment_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_categories`
--
ALTER TABLE `business_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `business_hours`
--
ALTER TABLE `business_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `business_hour_updates`
--
ALTER TABLE `business_hour_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `childcategories`
--
ALTER TABLE `childcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_payments`
--
ALTER TABLE `coupon_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_services`
--
ALTER TABLE `employee_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `expreinces`
--
ALTER TABLE `expreinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faq_to_clients`
--
ALTER TABLE `faq_to_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `favourite_businesses`
--
ALTER TABLE `favourite_businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feature_plans`
--
ALTER TABLE `feature_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ic_portfolios`
--
ALTER TABLE `ic_portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ic_reviews`
--
ALTER TABLE `ic_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ic_social_media`
--
ALTER TABLE `ic_social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ic_to_customer_reviews`
--
ALTER TABLE `ic_to_customer_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pricings`
--
ALTER TABLE `pricings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy__policies`
--
ALTER TABLE `privacy__policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `provider_balances`
--
ALTER TABLE `provider_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `provider_coupon_pays`
--
ALTER TABLE `provider_coupon_pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `provider_customers`
--
ALTER TABLE `provider_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provider_payment_methods`
--
ALTER TABLE `provider_payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provider_portfolios`
--
ALTER TABLE `provider_portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provider_reviews`
--
ALTER TABLE `provider_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `safety_rules`
--
ALTER TABLE `safety_rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `service_images`
--
ALTER TABLE `service_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_reviews`
--
ALTER TABLE `service_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_review_items`
--
ALTER TABLE `service_review_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `terms_services`
--
ALTER TABLE `terms_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `all_service_cupons`
--
ALTER TABLE `all_service_cupons`
  ADD CONSTRAINT `all_service_cupons_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `coupon_payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `all_service_cupons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
