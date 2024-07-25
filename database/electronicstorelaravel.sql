-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 08:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronicstorelaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_users`
--

CREATE TABLE `auth_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_users`
--

INSERT INTO `auth_users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'zoha tazmen', '03077936308', 'zohatazmen770@gmail.com', NULL, '$2y$12$Jgri9xnsC0zi.R8TsebCaebKHEwMHWBpTpONbcYnsDVYt3aanOcx2', NULL, NULL, '2024-07-24 18:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checked`
--

CREATE TABLE `checked` (
  `id` int(30) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `room_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `date_in` datetime NOT NULL,
  `date_out` datetime NOT NULL,
  `booked_cid` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = pending, 1=checked in , 2 = checked out',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checked`
--

INSERT INTO `checked` (`id`, `ref_no`, `room_id`, `name`, `contact_no`, `date_in`, `date_out`, `booked_cid`, `status`, `date_updated`) VALUES
(4, '0000\n', 1, 'John Smith', '+14526-5455-44', '2020-09-19 11:48:09', '2020-09-22 11:48:09', 0, 2, '2020-09-19 13:11:34'),
(5, '9564082520\n', 1, 'John Smith', '+14526-5455-44', '2020-09-19 11:48:33', '2020-09-22 11:48:33', 0, 2, '2020-09-19 13:12:19'),
(6, '2765813481\n', 1, 'asdasd asdas as', '8747808787', '2020-09-19 13:16:00', '2020-09-24 13:16:00', 0, 2, '2020-09-19 13:43:21'),
(7, '4392831400\n', 3, 'Sample', '5205525544', '2020-09-19 13:00:00', '2020-09-23 13:00:00', 0, 2, '2020-09-19 16:00:55'),
(10, '6479004224\n', 1, 'John Smith', '+14526-5455-44', '2020-09-23 10:31:00', '2020-09-29 10:31:00', 3, 1, '2020-09-19 16:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'null',
  `email` varchar(255) NOT NULL DEFAULT 'null',
  `phone` varchar(255) NOT NULL DEFAULT 'null',
  `subject` varchar(255) NOT NULL DEFAULT 'null',
  `message` varchar(255) NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Zoha Tazmen', 'zohatazmen@gmail.com', 'Zoha Tazmen', 'Zoha Tazmen', 'dwdqwqdqw', '2024-07-18 13:40:45', '2024-07-18 13:40:45'),
(2, 'Zoha Tazmen', 'zohatazmen@gmail.com', 'Zoha Tazmen', 'Zoha Tazmen', 'afde', '2024-07-18 13:42:24', '2024-07-18 13:42:24'),
(4, 'zohatazmen', 'zohatazmen@gmail.com', 'zohatazmen', 'zohatazmen', 'contact', '2024-07-25 10:18:44', '2024-07-25 10:18:44');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_18_182116_create_contacts_table', 2),
(5, '2024_07_20_143642_create_shops_table', 3),
(6, '2024_07_20_210908_create__orders_table', 4),
(7, '2024_07_20_211345_create_orders_table', 5),
(8, '2024_07_20_211406_create_order_items_table', 5),
(9, '2024_07_21_123128_add_details_to_users_table', 6),
(10, '2024_07_21_123753_create_wishlists_table', 7),
(11, '2024_07_21_161639_create_auth_users_table', 8),
(12, '2024_07_23_203410_update_auth_users_passwords', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `address`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 'Zoha Tazmen', 'zohatazmen69@gmail.com', 'ch.house chak no 90 6/R\r\nsahiwal, pakistan', 2607.00, '2024-07-20 17:38:34', '2024-07-20 17:38:34'),
(2, 'Zoha Tazmen', 'zohatazmen@gmail.com', 'ch.house chak no 90 6/R\r\nsahiwal, pakistan', 869.00, '2024-07-20 17:49:52', '2024-07-20 17:49:52'),
(3, 'Zoha Tazmen', 'zohatazmen@gmail.com', 'ch.house chak no 90 6/R\r\nsahiwal, pakistan', 869.00, '2024-07-20 17:50:05', '2024-07-20 17:50:05'),
(4, 'Zoha Tazmen', 'zohatazmen@gmail.com', 'ch.house chak no 90 6/R\r\nsahiwal, pakistan', 869.00, '2024-07-21 07:16:30', '2024-07-21 07:16:30'),
(5, 'Zoha Tazmen', 'zohatazmen@gmail.com', 'ch.house chak no 90 6/R\r\nsahiwal, pakistan', 0.00, '2024-07-21 07:17:36', '2024-07-21 07:17:36'),
(6, 'Zoha Tazmen', 'zohatazmen@gmail.com', 'ch.house chak no 90 6/R\r\nsahiwal, pakistan', 0.00, '2024-07-21 07:18:09', '2024-07-21 07:18:09'),
(7, 'Zoha Tazmen', 'zoha@gmail.com', 'ch.house chak no 90 6/R\r\nsahiwal, pakistan', 869.00, '2024-07-21 07:18:57', '2024-07-21 07:18:57'),
(8, 'Zoha Tazmen', 'ljahdufiaed@gmail.com', 'ch.house chak no 90 6/R', 450.00, '2024-07-25 08:00:34', '2024-07-25 08:00:34'),
(11, 'Zoha Tazmen', 'zohatazmen770@gmail.com', 'ch.house chak no 90 6/R\r\nsahiwal, pakistan', 1738.00, '2024-07-25 10:17:36', '2024-07-25 10:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Product Name 1', 3, 869.00, '2024-07-20 17:38:34', '2024-07-20 17:38:34'),
(2, 4, 'Product Name 2', 1, 869.00, '2024-07-21 07:16:30', '2024-07-21 07:16:30'),
(3, 7, 'Product Name 6', 1, 869.00, '2024-07-21 07:18:57', '2024-07-21 07:18:57'),
(4, 11, 'Product Name 1', 1, 869.00, '2024-07-25 10:17:36', '2024-07-25 10:17:36'),
(5, 11, 'Product Name 1', 1, 869.00, '2024-07-25 10:17:36', '2024-07-25 10:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(30) NOT NULL,
  `room` varchar(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Available , 1= Unvailables'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room`, `category_id`, `status`) VALUES
(1, 'Room-101', 3, 1),
(3, 'Room-102', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `name`, `price`, `cover_img`) VALUES
(2, 'Deluxe Room', 500, '1600480260_4.jpg'),
(3, 'Single Room', 120, '1600480680_2.jpg'),
(4, 'Family Room', 350, '1600480680_room-1.jpg'),
(6, 'Twin Bed Room', 200, '1600482780_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('WHrIYG3nhwfxYjYKj2FfkAZz8QjsMR3zzdnPBu4T', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibkJON1pVN0pCQzNxYU4zSEdXN0lCd1NSV1I5TTljY0pMVmhTQkNOcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hZG1pbnMtbGlzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaG9wIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTtzOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1721923091),
('WKFcBi8dOjeYekh7HFZK7mtbqUOg3UWADQslSs26', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVlh0SUJldG1pQmV3YnhSdEhJT0RqWm5MbGNkYXAzbDRWSmxWT040QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvd2lzaGxpc3QiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1721917733);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `description`, `image`, `category`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Product Name 1', 'Description for Product 1', 'frontend/img/product/12.jpg', 'Brand One', 869.00, '2024-07-20 21:04:43', '2024-07-20 21:04:43'),
(2, 'Product Name 2', 'Description for Product 2', 'frontend/img/product/12.jpg', 'Brand One', 869.00, '2024-07-20 21:04:43', '2024-07-20 21:04:43'),
(3, 'Product Name 3', 'Description for Product 3', 'frontend/img/product/12.jpg', 'Brand One', 869.00, '2024-07-20 21:04:43', '2024-07-20 21:04:43'),
(4, 'Product Name 4', 'Description for Product 4', 'frontend/img/product/12.jpg', 'Brand Two', 869.00, '2024-07-20 21:04:43', '2024-07-20 21:04:43'),
(5, 'Product Name 5', 'Description for Product 5', 'frontend/img/product/12.jpg', 'Brand Two', 869.00, '2024-07-20 21:04:43', '2024-07-20 21:04:43'),
(6, 'Product Name 6', 'Description for Product 6', 'frontend/img/product/12.jpg', 'Accessories', 869.00, '2024-07-20 21:04:43', '2024-07-20 21:04:43'),
(7, 'Product Name 7', 'Description for Product 7', 'frontend/img/product/12.jpg', 'Accessories', 869.00, '2024-07-20 21:04:43', '2024-07-20 21:04:43'),
(8, 'Product Name 8', 'Description for Product 8', 'frontend/img/product/12.jpg', 'Top Brands', 869.00, '2024-07-20 21:04:43', '2024-07-20 21:04:43'),
(9, 'Product Name 9', 'Description for Product 9', 'frontend/img/product/12.jpg', 'Top Brands', 869.00, '2024-07-20 21:04:43', '2024-07-20 21:04:43'),
(10, 'Product Name 10', 'Description for Product 10', 'frontend/img/product/12.jpg', 'Jewelry', 869.00, '2024-07-20 21:04:43', '2024-07-20 21:04:43'),
(11, 'Product Name 11', 'Description for Product 11', 'frontend/img/product/12.jpg', 'Jewelry', 869.00, '2024-07-20 21:04:43', '2024-07-20 21:04:43'),
(12, 'Product Name 1', 'Description for product 1', 'frontend/img/product/7.jpg', 'Category1', 869.00, '2024-07-20 21:30:35', '2024-07-20 21:30:35'),
(13, 'Product Name 2', 'Description for product 2', 'frontend/img/product/2.jpg', 'Category2', 869.00, '2024-07-20 21:30:35', '2024-07-20 21:30:35'),
(14, 'Product Name 3', 'Description for product 3', 'frontend/img/product/9.jpg', 'Category3', 869.00, '2024-07-20 21:30:35', '2024-07-20 21:30:35'),
(15, 'Product Name 4', 'Description for product 4', 'frontend/img/product/4.jpg', 'Category4', 869.00, '2024-07-20 21:30:35', '2024-07-20 21:30:35'),
(16, 'Product Name 5', 'Description for product 5', 'frontend/img/product/10.jpg', 'Category5', 869.00, '2024-07-20 21:30:35', '2024-07-20 21:30:35'),
(17, 'Product Name 6', 'Description for product 6', 'frontend/img/product/11.jpg', 'Category6', 869.00, '2024-07-20 21:30:35', '2024-07-20 21:30:35'),
(18, 'Product Name 7', 'Description for product 7', 'frontend/img/product/8.jpg', 'Category7', 869.00, '2024-07-20 21:30:35', '2024-07-20 21:30:35'),
(19, 'Product Name 8', 'Description for product 8', 'frontend/img/product/12.jpg', 'Category8', 869.00, '2024-07-20 21:30:35', '2024-07-20 21:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `hotel_name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `hotel_name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Hotel Management System', 'info@sample.com', '+6948 8542 623', '1600478940_hotel-cover.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;ABOUT US&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Lorem Ipsum&lt;/b&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#x2019;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;h2 style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;Where does it come from?&lt;/h2&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400;&quot;&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/p&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `country`, `state`, `city`, `phone`, `company`) VALUES
(1, 'Zoha Tazmen', 'zohatazmen@gmail.com', NULL, '$2y$12$K4PT/Z2eF6xf7g/23UVLlOe8.rH7WWrMaNRrTCVoO3rDLE4nFF6YS', NULL, '2024-07-20 05:04:04', '2024-07-20 05:04:04', NULL, NULL, NULL, NULL, NULL),
(2, 'Zoha Tazmen', 'zoha12@gmail.com', NULL, '$2y$12$QiAzWuHqFVoh64aea6sbwe4aX21qvQaZXg.Cg8HyY0NkFFhZOaes2', NULL, '2024-07-21 07:27:25', '2024-07-21 07:32:07', 'Pakistan', 'Khyber Pakhtunkhwa', 'Sahiwal', '03077936306', 'NA'),
(3, 'Zoha Tazmen', 'admin@example.com', NULL, '$2y$12$hVG7Omwqc3bjlegJvOas3uq/OVhba2Fn2RovU04aNs1UU4PiuyULm', NULL, '2024-07-21 07:32:56', '2024-07-21 07:32:56', NULL, NULL, NULL, NULL, NULL),
(4, 'Zoha Tazmen', 'zohatazmen69@gmail.com', NULL, '$2y$12$a8SOOQdoI2J1MmWvkDD4tep76QDh6bAyDLOW1gRjfsX5xnRHCD0SW', NULL, '2024-07-25 08:17:59', '2024-07-25 08:17:59', NULL, NULL, NULL, NULL, NULL),
(5, 'Zoha Tazmen', 'zohatazmen1@gmail.com', NULL, '$2y$12$9.14KNkEn8B5vixk8mWubuHj2ipeXQN1wqpvppPZjYdEK5Hm8Eb7S', NULL, '2024-07-25 10:15:52', '2024-07-25 10:16:16', 'Pakistan', 'Punjab', 'Sahiwal', '03071327880', 'zoha');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `shop_id`, `created_at`, `updated_at`) VALUES
(4, 3, 1, '2024-07-21 07:55:59', '2024-07-21 07:55:59'),
(7, 5, 14, '2024-07-25 10:16:44', '2024-07-25 10:16:44'),
(8, 5, 13, '2024-07-25 10:16:54', '2024-07-25 10:16:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_users`
--
ALTER TABLE `auth_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_users_phone_unique` (`phone`),
  ADD UNIQUE KEY `auth_users_email_unique` (`email`);

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_shop_id_foreign` (`shop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
