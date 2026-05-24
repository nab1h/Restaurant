-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2026 at 10:12 PM
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
-- Database: `restaurant`
--

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `image`, `created_at`, `updated_at`, `is_active`) VALUES
(2, 'اطباق ساخنه', 'main course', 'categories/5ufCbbacx4HGw7ZC1FM4hhUsnFH99NlQacALTyup.png', '2026-05-20 10:00:05', '2026-05-20 10:00:05', 1),
(3, 'اطباق ساخنهaaa', 'main course', 'categories/Jh9ZG9ORh4DGxGZbcd8ahdbcUkKuY5qLfl3ioofw.png', '2026-05-20 13:11:58', '2026-05-20 13:13:57', 1);

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_en` varchar(255) NOT NULL,
  `question_ar` varchar(255) NOT NULL,
  `answer_en` text NOT NULL,
  `answer_ar` text NOT NULL,
  `order_column` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question_en`, `question_ar`, `answer_en`, `answer_ar`, `order_column`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'nabih', 'نبيه', 'alashmawy', 'العشماويaaa', 1, 1, '2026-05-15 13:01:35', '2026-05-15 13:05:20'),
(2, 'alashmawy', 'العشماوي', 'nabih', 'نبيه', 2, 1, '2026-05-16 20:37:33', '2026-05-16 20:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `home_contents`
--

CREATE TABLE `home_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hero_title_en` varchar(255) DEFAULT NULL,
  `hero_title_ar` varchar(255) DEFAULT NULL,
  `hero_subtitle_en` varchar(255) DEFAULT NULL,
  `hero_subtitle_ar` varchar(255) DEFAULT NULL,
  `about_title_en` varchar(255) DEFAULT NULL,
  `about_title_ar` varchar(255) DEFAULT NULL,
  `about_desc_en` text DEFAULT NULL,
  `about_desc_ar` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_contents`
--

INSERT INTO `home_contents` (`id`, `hero_title_en`, `hero_title_ar`, `hero_subtitle_en`, `hero_subtitle_ar`, `about_title_en`, `about_title_ar`, `about_desc_en`, `about_desc_ar`, `created_at`, `updated_at`) VALUES
(1, 'Taste the Art of Perfection', 'تذوق فن الكمال', 'Experience the Extraordinar', 'اختبر الاستثنائي', 'Our Story', 'قصتنا', 'OVERMEAT is a Saudi restaurant specialized in serving premium smoked meats, brisket, and steak in an authentic American style, with an unforgettable flavor.', 'OVERMEAT مطعم سعودي متخصص في تقديم لحوم مدخنة فاخرة، بريسكت وستيك على الطريقة الأمريكية الأصيلة، بنكهة ما تنساها.', '2026-05-15 11:06:18', '2026-05-20 13:48:31');

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
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('hero_video','hero_image','gallery_image') NOT NULL DEFAULT 'gallery_image',
  `path` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `order_column` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `type`, `path`, `thumbnail`, `title`, `order_column`, `is_active`, `created_at`, `updated_at`) VALUES
(11, 'gallery_image', 'media/GKLLtCTeEqLh9ugjb3Z8MKnw6JQ5VyEmto6a8YnT.png', 'media/GKLLtCTeEqLh9ugjb3Z8MKnw6JQ5VyEmto6a8YnT.png', NULL, 0, 1, '2026-05-15 15:09:45', '2026-05-15 15:09:45'),
(12, 'gallery_image', 'media/ot9OybNV38x8ze9xSjqNt23olMsG51KwxFOq8Gix.png', 'media/ot9OybNV38x8ze9xSjqNt23olMsG51KwxFOq8Gix.png', NULL, 1, 1, '2026-05-15 15:11:50', '2026-05-15 15:11:50'),
(13, 'hero_video', 'media/vzFdbmxdjeYv2B9oB2A6EtJNaqRfoNhfDb1t3O2e.mp4', 'media/vzFdbmxdjeYv2B9oB2A6EtJNaqRfoNhfDb1t3O2e.mp4', NULL, 0, 1, '2026-05-15 15:12:05', '2026-05-15 15:12:05'),
(14, 'hero_image', 'media/LPrEEc3bO2MLYA5bVuZJeVq6e0QfoZYNODv39b3X.png', 'media/LPrEEc3bO2MLYA5bVuZJeVq6e0QfoZYNODv39b3X.png', NULL, 0, 1, '2026-05-15 15:12:15', '2026-05-15 15:12:15'),
(15, 'gallery_image', 'media/wuncEuUjpPzzXyS4gX8OQ994xESeuiSnuI2Fh7Mh.png', 'media/wuncEuUjpPzzXyS4gX8OQ994xESeuiSnuI2Fh7Mh.png', NULL, 2, 1, '2026-05-15 15:12:38', '2026-05-15 15:12:38');

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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2026_04_26_002748_create_users_table', 1),
(4, '2026_04_28_170924_create_reservations_table', 1),
(5, '2026_05_14_190506_create_settings_table', 1),
(6, '2026_05_14_203331_update_settings_table_with_multilang_and_socials', 2),
(7, '2026_05_14_204159_add_contact_details_to_settings_table', 3),
(8, '2026_05_15_135639_create_home_contents_table', 4),
(9, '2026_05_15_154255_create_faqs_table', 5),
(10, '2026_05_15_161312_create_media_table', 6),
(11, '2026_05_16_223005_create_testimonials_table', 7),
(12, '2026_05_17_121648_create_statistics_table', 8),
(13, '2026_05_20_124559_create_categories_table', 9),
(14, '2026_05_20_131214_create_products_table', 10),
(15, '2026_05_20_133230_add_is_active_to_categories_table', 11),
(16, '2026_05_20_134748_add_google_review_link_to_settings_table', 12),
(17, '2026_05_20_175756_add_offer_expires_at_to_products_table', 13);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `description_ar` text NOT NULL,
  `description_en` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_discount` tinyint(1) NOT NULL DEFAULT 0,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `offer_expires_at` timestamp NULL DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name_ar`, `name_en`, `description_ar`, `description_en`, `price`, `is_discount`, `discount_price`, `offer_expires_at`, `is_available`, `image`, `created_at`, `updated_at`) VALUES
(2, 2, 'اطباق ساخنه', 'سبيشيبشس', 'سبيشسيب', 'شسيبشسيب', 1500.00, 1, 100.00, NULL, 1, 'products/9g7V2PbAR0UzTIlejq2lhI8B9coLRSxjapXHXkcq.png', '2026-05-20 10:43:22', '2026-05-20 10:43:37'),
(3, 3, 'اطباق ساخنه', 'main course', 'asdfasdf', 'asdf', 1500.00, 1, 100.00, NULL, 1, 'products/5TDYvH1dI4zUruCRzY7umrRZfsIScYps6GbCan2a.png', '2026-05-20 13:15:42', '2026-05-20 13:15:42'),
(4, 3, 'asdfa', 'fdas', 'afd', 'adfadf', 1200.00, 1, 1000.00, '2026-05-21 18:18:00', 1, 'products/v3Qban01Xd8wKkUNHDV0fekzxCPHhpAsMRT8G5WY.png', '2026-05-20 13:16:45', '2026-05-20 15:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `guests` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `status` enum('pending','confirmed','cancelled','completed') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `is_archive` tinyint(1) NOT NULL DEFAULT 0,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `phone`, `guests`, `reservation_date`, `reservation_time`, `status`, `notes`, `is_archive`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Bebo Alashmawy', '+201505253851', 3, '2026-05-06', '21:00:00', 'confirmed', NULL, 1, 0, '2026-05-17 10:19:48', '2026-05-17 10:26:15'),
(5, 'Bebo Alashmawy ييي', '+201505253851', 2, '2026-05-21', '20:00:00', 'pending', NULL, 0, 0, '2026-05-20 17:02:21', '2026-05-20 17:02:21');

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
('2scno6EsahOTwX3J2Muzp10Wd6mqopWpV9em67gn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia01GYzBtbWIyWmVyenJzOUdBQ0Z5dGJacHoxcjZnSkhDU0xyOW5NbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW51IjtzOjU6InJvdXRlIjtzOjQ6Im1lbnUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1779307471),
('oJFR16FTP3YIqBCTFCJOjUJjuQL6y9pnmJTYgSyc', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSVI2QUVWczNTYXlGVUVhRnpFQno0cWhWcUhJcG5GUGU4RHhxSldhaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Byb2ZpbGUiO319', 1779307447);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) NOT NULL DEFAULT 'Aurum Restaurant',
  `site_title` varchar(255) NOT NULL DEFAULT 'Fine Dining Experience',
  `meta_description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon_180` varchar(255) DEFAULT NULL,
  `icon_32` varchar(255) DEFAULT NULL,
  `icon_16` varchar(255) DEFAULT NULL,
  `manifest` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address_en` varchar(255) DEFAULT NULL,
  `address_ar` varchar(255) DEFAULT NULL,
  `hours_en` varchar(255) DEFAULT NULL,
  `hours_ar` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `snapchat` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `map_link` text DEFAULT NULL,
  `google_review_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_title`, `meta_description`, `logo`, `icon_180`, `icon_32`, `icon_16`, `manifest`, `created_at`, `updated_at`, `address_en`, `address_ar`, `hours_en`, `hours_ar`, `facebook`, `twitter`, `instagram`, `snapchat`, `tiktok`, `mobile`, `whatsapp`, `email`, `map_link`, `google_review_link`) VALUES
(1, 'OVERMEAT', 'OVERMEAT | Restaurant & Food Ordering', 'هو مطعم سعودي متخصص في تقديم لحوم\r\nمدخنة فاخرة، بريسكت وستيك على الطريقة الأمريكية الأصيلة، بنكهة ما تنساها.\r\nزورنا في حي النسيم – جدة', 'logo/d2bAcZtS6xOUBvFetAxZzR8DaJhZ0vxL9grnXOCE.png', 'icon_180/avtH7GZRLhaHa6pxC76gIGtpFmgWyCe0x37TFltf.png', 'icon_32/tEI5FInf3qRKosO9xmTygufgxOidBwGwgrHVR7Hd.png', 'icon_16/YDCOLOxB7YMUAHhJpAL0psd7p0gS0XMi4LGAExRZ.png', NULL, '2026-05-14 16:54:38', '2026-05-20 16:23:11', 'Jeddah - Al Naseem District, Saudi Arabia', 'جده-حي النسيم -المملكة العربية السعودية', 'Daily from 6:00 PM to 12:00 AM', 'يوميًا من الساعة 6 مساءً إلى 12 مساءً', 'https://www.facebook.com/nab1h2', 'https://www.facebook.com/nab1h2', 'https://www.facebook.com/nab1h2', 'https://www.facebook.com/nab1h2', NULL, '+966 54 340 6804', '+966 56 504 8142', 'social@overmeat.sa', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55244.21560874368!2d31.288166885998187!3d30.072313582744943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14368976c35c36e9%3A0x2c45a00925c4c444!2z2YXYtdix!5e0!3m2!1sar!2seg!4v1778794925380!5m2!1sar!2seg\" width=\"700\" height=\"650\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.facebook.com/nab1h2');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `number`, `title_ar`, `title_en`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '15+', 'سنوات الخبره', 'Years Experience', 0, 1, '2026-05-17 09:26:42', '2026-05-17 09:30:40'),
(2, '50k', 'عملاء سعداء', 'happy custemer', 0, 1, '2026-05-17 09:31:07', '2026-05-17 09:31:07'),
(3, '40+', 'أطباق مميزه', 'Signature Dishes', 0, 1, '2026-05-17 09:31:49', '2026-05-17 09:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `role`, `message`, `rating`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'أحمد محمد', 'مدير تسويق', 'تجربة رائعة بكل المقاييس! التصميم كان أكثر مما توقعت.', 5, 1, '2026-05-16 19:34:18', '2026-05-16 19:52:46'),
(2, 'سارة علي', 'صاحبة مشروع', 'خدمة ممتازة ولكن التوصيل تأخر قليلاً.', 4, 1, '2026-05-16 19:34:18', '2026-05-16 19:34:18'),
(5, 'ششب', 'يبشسيب', 'شيبشيبش', 5, 0, '2026-05-16 20:29:51', '2026-05-16 20:29:51'),
(7, 'nabih', 'يبشسيب', 'asdfasdfsadf', 3, 0, '2026-05-20 15:44:39', '2026-05-20 15:44:39'),
(8, 'nabih', 'sfsdfasdf', 'sadfsadfasdf', 3, 0, '2026-05-20 16:57:40', '2026-05-20 16:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bebo Alashmawy', 'beboalashmawy@gmail.com', 'admin', NULL, '$2y$12$NP/xDQ0ia0PIIFcok0ZyFuQUj14ygAE/xYqG5i8yTx3merX9z.0rq', NULL, '2026-05-14 16:54:17', '2026-05-14 16:54:17'),
(3, 'avora', 'avora008@avora.fun', 'sales', NULL, '$2y$12$KBXrisrsLlnHenUS9VZhteGyh1vGCkrsPFU2RLnFFlnoBYq/TKjV6', NULL, '2026-05-20 11:36:18', '2026-05-20 12:55:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_contents`
--
ALTER TABLE `home_contents`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_contents`
--
ALTER TABLE `home_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
