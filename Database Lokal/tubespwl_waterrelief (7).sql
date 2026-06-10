-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2026 at 05:36 AM
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
-- Database: `tubespwl_waterrelief`
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
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `assigned_volunteer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shelter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `handled_by` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `category` enum('food','water','medical','shelter','emergency','other') NOT NULL,
  `urgency_level` enum('low','medium','high') NOT NULL DEFAULT 'medium',
  `status` enum('pending','processing','completed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `assigned_volunteer_id`, `shelter_id`, `handled_by`, `title`, `description`, `category`, `urgency_level`, `status`, `created_at`, `updated_at`, `item_name`) VALUES
(1, 3, 4, 1, 4, 'Aku butuh beras', 'Aku butuh beras', 'food', 'high', 'processing', '2026-06-09 18:42:53', '2026-06-09 18:43:32', NULL),
(2, 3, 4, 1, 4, 'Aku butuh minum', 'Butuh minum', 'emergency', 'medium', 'processing', '2026-06-09 19:04:58', '2026-06-09 19:05:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_images`
--

CREATE TABLE `complaint_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaint_images`
--

INSERT INTO `complaint_images` (`id`, `complaint_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 1, '1781055774.jpg', '2026-06-09 18:42:54', '2026-06-09 18:42:54'),
(2, 2, '1781057098.webp', '2026-06-09 19:04:58', '2026-06-09 19:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shelter_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `volunteer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `donor_name` varchar(100) NOT NULL,
  `item_name` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('pending','on_delivery','confirmed','received') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `donation_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `shelter_id`, `user_id`, `volunteer_id`, `category_id`, `donor_name`, `item_name`, `quantity`, `status`, `notes`, `donation_date`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 4, NULL, 'Cinta', 'Bulan', 123, 'received', 'm e', '2026-06-09', '2026-06-09 12:20:25', '2026-06-09 12:20:52'),
(2, 1, 3, 4, NULL, 'Cinta', 'Selimut', 109, 'received', 'Halo', '2026-06-09', '2026-06-09 12:31:59', '2026-06-09 12:32:18'),
(3, 1, 3, 4, 4, 'Cinta', 'dndc s', 123, 'received', 'vfdf', '2026-03-12', '2026-06-09 12:45:30', '2026-06-09 12:48:23'),
(4, 1, 3, 4, 3, 'Cinta', 'Obat', 12, 'received', 'hahah', '2026-06-15', '2026-06-09 12:49:40', '2026-06-09 13:17:38'),
(5, 1, 3, 4, 3, 'Cinta', 'Gula', 123, 'received', 'wfec', '2026-06-09', '2026-06-09 13:17:05', '2026-06-09 13:17:35'),
(6, 1, 3, 4, 4, 'Cinta', 'gygcioy vu', 100, 'received', 'dxeec', '2026-06-09', '2026-06-09 13:22:59', '2026-06-09 20:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `logistics`
--

CREATE TABLE `logistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `shelter_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `minimum_stock` int(11) NOT NULL DEFAULT 10,
  `expired_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_notification_sent` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistics`
--

INSERT INTO `logistics` (`id`, `category_id`, `shelter_id`, `item_name`, `stock`, `minimum_stock`, `expired_date`, `description`, `created_at`, `updated_at`, `expiry_notification_sent`) VALUES
(1, 3, 1, 'gygcioy vu', 232, 10, '2026-06-25', 'Bla', '2026-06-09 12:19:36', '2026-06-09 20:15:05', 0),
(2, 1, 1, 'dndc s', 123, 10, NULL, 'Otomatis dari donasi', '2026-06-09 12:46:08', '2026-06-09 12:46:08', 0),
(3, 3, 1, 'Gula', 123, 10, NULL, 'Otomatis dari donasi', '2026-06-09 13:17:35', '2026-06-09 13:17:35', 0),
(4, 3, 1, 'Obat', 12, 10, NULL, 'Otomatis dari donasi', '2026-06-09 13:17:38', '2026-06-09 13:17:38', 0),
(5, 4, 1, 'Bulan', 1200, 12000, '2026-06-20', 'yyy', '2026-06-09 13:58:53', '2026-06-09 13:58:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logistics_categories`
--

CREATE TABLE `logistics_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistics_categories`
--

INSERT INTO `logistics_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Food', '2026-06-09 10:03:33', '2026-06-09 10:03:33'),
(2, 'Water', '2026-06-09 10:03:33', '2026-06-09 10:03:33'),
(3, 'Medicine', '2026-06-09 10:03:33', '2026-06-09 10:03:33'),
(4, 'Clothes', '2026-06-09 10:03:33', '2026-06-09 10:03:33');

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
(1, '2026_05_12_172337_create_roles_table', 1),
(2, '2026_05_13_094736_create_shelters_table', 1),
(3, '2026_05_13_094752_create_logistics_categories_table', 1),
(4, '2026_05_13_101433_create_users_table', 1),
(5, '2026_05_13_102549_create_logistics_table', 1),
(6, '2026_05_13_103835_create_refugees_table', 1),
(7, '2026_05_13_104230_create_complaints_table', 1),
(8, '2026_05_13_104444_create_complaint_images_table', 1),
(9, '2026_05_13_105453_create_activity_logs_table', 1),
(10, '2026_05_13_172505_make_role_id_nullable_in_users_table', 1),
(11, '2026_05_14_171911_add_two_factor_fields_to_users_table', 1),
(12, '2026_05_15_114611_create_password_reset_tokens_table', 1),
(13, '2026_05_16_183101_add_bio_to_users_table', 1),
(14, '2026_05_16_183339_add_profile_fields_to_users_table', 1),
(15, '2026_05_17_121552_add_volunteer_fields_to_users_table', 1),
(16, '2026_05_19_062416_create_sessions_table', 1),
(17, '2026_05_19_062533_create_cache_table', 1),
(18, '2026_05_19_063125_create_notifications_table', 1),
(19, '2026_05_30_000001_create_donations_table', 1),
(20, '2026_06_01_090652_add_assigned_volunteer_id_to_complaints_table', 1),
(21, '2026_06_01_094228_add_item_name_to_complaint_table', 1),
(22, '2026_06_03_080330_drop_activity_log_table', 1),
(23, '2026_06_03_080640_drop_refugees_table', 1),
(24, '2026_06_03_104157_update_status_enum_donations_table', 1),
(25, '2026_06_03_181453_add_volunteer_id_to_donations_table', 1),
(26, '2026_06_03_181454_add_category_id_to_donations_table', 1),
(27, '2026_06_09_130325_add_expiry_notification_sent_to_logistics_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('03a6090d-2ba0-4b9d-8e7a-454caab5eac0', 'App\\Notifications\\DonationDeliveredNotification', 'App\\Models\\User', 3, '{\"title\":\"Donation Delivered\",\"message\":\"Your donation has been successfully delivered to the shelter by volunteer f.\"}', NULL, '2026-06-09 12:32:18', '2026-06-09 12:32:18'),
('0c4a9f58-c75d-46d0-88b8-8ffadcf0d365', 'App\\Notifications\\NewDonationSubmittedNotification', 'App\\Models\\User', 4, '{\"title\":\"New Donation Submitted\",\"message\":\"Cinta submitted a donation: Gula\",\"donation_id\":5}', NULL, '2026-06-09 13:17:05', '2026-06-09 13:17:05'),
('19386030-4997-42e2-bd1d-a7f03475a232', 'App\\Notifications\\NewComplaintSubmitted', 'App\\Models\\User', 4, '{\"title\":\"New Complaint\",\"message\":\"Aku butuh beras has been submitted and is awaiting review.\",\"complaint_id\":1}', NULL, '2026-06-09 18:42:54', '2026-06-09 18:42:54'),
('1cfa5cc0-b4da-463f-a675-7ac7b39f58e2', 'App\\Notifications\\NewDonationSubmittedNotification', 'App\\Models\\User', 4, '{\"title\":\"New Donation Submitted\",\"message\":\"Cinta submitted a donation: Selimut\",\"donation_id\":2}', NULL, '2026-06-09 12:31:59', '2026-06-09 12:31:59'),
('2809944d-4c81-4530-a6d7-760e79177254', 'App\\Notifications\\DonationDeliveryAssignedNotification', 'App\\Models\\User', 3, '{\"title\":\"Donation On Delivery\",\"message\":\"Volunteer f has accepted and is delivering your donation.\",\"donation_id\":3}', NULL, '2026-06-09 12:45:59', '2026-06-09 12:45:59'),
('31b373dc-39fe-41a0-b05b-08c26d4841d5', 'App\\Notifications\\LowStockNotif', 'App\\Models\\User', 4, '{\"title\":\"Low Stock Alert\",\"message\":\"Bulan stock is running low (1200 remaining).\",\"logistic_id\":5,\"shelter_id\":\"1\"}', NULL, '2026-06-09 13:58:53', '2026-06-09 13:58:53'),
('49e2de2a-6dc6-493e-9bd0-ab979c8e9551', 'App\\Notifications\\NewShelterCreated', 'App\\Models\\User', 3, '{\"title\":\"New Shelter Created\",\"message\":\"Shelter \\\"Shelters01\\\" is now available.\",\"shelter_id\":1}', NULL, '2026-06-09 12:18:58', '2026-06-09 12:18:58'),
('55568bd0-20e3-4ccb-9dde-1eca44b789ca', 'App\\Notifications\\ComplaintTakenNotification', 'App\\Models\\User', 3, '{\"title\":\"Complaint Assigned\",\"message\":\"Volunteer f has accepted complaint Aku butuh beras and is now handling your complaint.\",\"complaint_id\":1}', NULL, '2026-06-09 18:43:32', '2026-06-09 18:43:32'),
('5a5ca684-fb30-4785-a66b-996f38d6fb2e', 'App\\Notifications\\NewDonationSubmittedNotification', 'App\\Models\\User', 4, '{\"title\":\"New Donation Submitted\",\"message\":\"Cinta submitted a donation: dndc s\",\"donation_id\":3}', NULL, '2026-06-09 12:45:30', '2026-06-09 12:45:30'),
('69c5215c-ac73-4d00-9a46-4e1af38e16b5', 'App\\Notifications\\DonationDeliveryAssignedNotification', 'App\\Models\\User', 3, '{\"title\":\"Donation On Delivery\",\"message\":\"Volunteer f has accepted and is delivering your donation.\",\"donation_id\":5}', NULL, '2026-06-09 13:17:30', '2026-06-09 13:17:30'),
('751fa263-9e3f-4f1e-a426-6afda5c813c5', 'App\\Notifications\\DonationDeliveredNotification', 'App\\Models\\User', 3, '{\"title\":\"Donation Delivered\",\"message\":\"Your donation has been successfully delivered to the shelter by volunteer f.\"}', NULL, '2026-06-09 13:17:38', '2026-06-09 13:17:38'),
('7cf42a8e-af62-4478-8df5-031b943dd6ff', 'App\\Notifications\\NewDonationSubmittedNotification', 'App\\Models\\User', 4, '{\"title\":\"New Donation Submitted\",\"message\":\"Cinta submitted a donation: gygcioy vu\",\"donation_id\":6}', NULL, '2026-06-09 13:22:59', '2026-06-09 13:22:59'),
('95ac8a97-3a0a-4454-8f01-ace93e2ba619', 'App\\Notifications\\ComplaintTakenNotification', 'App\\Models\\User', 3, '{\"title\":\"Complaint Assigned\",\"message\":\"Volunteer f has accepted complaint Aku butuh minum and is now handling your complaint.\",\"complaint_id\":2}', NULL, '2026-06-09 19:05:58', '2026-06-09 19:05:58'),
('a4b66924-c1df-4c08-b408-3e3fccf86aaf', 'App\\Notifications\\DonationDeliveredNotification', 'App\\Models\\User', 3, '{\"title\":\"Donation Delivered\",\"message\":\"Your donation has been successfully delivered to the shelter by volunteer f.\"}', NULL, '2026-06-09 20:15:05', '2026-06-09 20:15:05'),
('a5d917d9-dd6d-4408-919a-88ee99d2dd4c', 'App\\Notifications\\DonationDeliveryAssignedNotification', 'App\\Models\\User', 3, '{\"title\":\"Donation On Delivery\",\"message\":\"Volunteer f has accepted and is delivering your donation.\",\"donation_id\":1}', NULL, '2026-06-09 12:20:49', '2026-06-09 12:20:49'),
('b067dba8-3cbb-4579-8f13-b3a0dc16ea1a', 'App\\Notifications\\LogisticExpiringSoonNotification', 'App\\Models\\User', 4, '{\"title\":\"Logistic Expiring Soon\",\"message\":\"Bulan will expire on 2026-06-20\",\"logistic_id\":5}', NULL, '2026-06-09 13:58:53', '2026-06-09 13:58:53'),
('b117c0cd-9575-455d-a860-476c7d34f6fd', 'App\\Notifications\\NewDonationSubmittedNotification', 'App\\Models\\User', 4, '{\"title\":\"New Donation Submitted\",\"message\":\"Cinta submitted a donation: Bulan\",\"donation_id\":1}', NULL, '2026-06-09 12:20:25', '2026-06-09 12:20:25'),
('b4d6f5de-f085-40bc-ae52-8ece99e867f7', 'App\\Notifications\\DonationDeliveryAssignedNotification', 'App\\Models\\User', 3, '{\"title\":\"Donation On Delivery\",\"message\":\"Volunteer f has accepted and is delivering your donation.\",\"donation_id\":6}', NULL, '2026-06-09 20:15:03', '2026-06-09 20:15:03'),
('baa059e6-60e5-4ee3-a39a-b971f5525be6', 'App\\Notifications\\DonationDeliveryAssignedNotification', 'App\\Models\\User', 3, '{\"title\":\"Donation On Delivery\",\"message\":\"Volunteer f has accepted and is delivering your donation.\",\"donation_id\":4}', NULL, '2026-06-09 13:17:33', '2026-06-09 13:17:33'),
('bcb8ca27-f277-4afc-b7e7-44b428bc592e', 'App\\Notifications\\DonationDeliveryAssignedNotification', 'App\\Models\\User', 3, '{\"title\":\"Donation On Delivery\",\"message\":\"Volunteer f has accepted and is delivering your donation.\",\"donation_id\":2}', NULL, '2026-06-09 12:32:16', '2026-06-09 12:32:16'),
('c59a8f9b-5728-415a-9fcc-cf8e56035935', 'App\\Notifications\\DonationDeliveredNotification', 'App\\Models\\User', 3, '{\"title\":\"Donation Delivered\",\"message\":\"Your donation has been successfully delivered to the shelter by volunteer f.\"}', NULL, '2026-06-09 13:17:35', '2026-06-09 13:17:35'),
('d08215d4-5fb1-4966-a3e1-f738be7ad34b', 'App\\Notifications\\NewComplaintSubmitted', 'App\\Models\\User', 5, '{\"title\":\"New Complaint\",\"message\":\"Aku butuh minum has been submitted and is awaiting review.\",\"complaint_id\":2}', NULL, '2026-06-09 19:04:58', '2026-06-09 19:04:58'),
('d36a84b5-7792-4513-8ab8-6f85193ae5b0', 'App\\Notifications\\NewComplaintSubmitted', 'App\\Models\\User', 4, '{\"title\":\"New Complaint\",\"message\":\"Aku butuh minum has been submitted and is awaiting review.\",\"complaint_id\":2}', NULL, '2026-06-09 19:04:58', '2026-06-09 19:04:58'),
('d46c4bb6-a317-4ba1-9c3e-3bfe3770de4f', 'App\\Notifications\\DonationDeliveredNotification', 'App\\Models\\User', 3, '{\"title\":\"Donation Delivered\",\"message\":\"Your donation has been successfully delivered to the shelter by volunteer f.\"}', NULL, '2026-06-09 12:46:08', '2026-06-09 12:46:08'),
('e116552f-ac3e-4f71-b89e-8d29308016cd', 'App\\Notifications\\DonationDeliveredNotification', 'App\\Models\\User', 3, '{\"title\":\"Donation Delivered\",\"message\":\"Your donation has been successfully delivered to the shelter by volunteer f.\"}', NULL, '2026-06-09 12:20:52', '2026-06-09 12:20:52');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2026-06-09 10:03:33', '2026-06-09 10:03:33'),
(2, 'citizen', '2026-06-09 10:03:33', '2026-06-09 10:03:33'),
(3, 'volunteer', '2026-06-09 10:03:33', '2026-06-09 10:03:33');

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

-- --------------------------------------------------------

--
-- Table structure for table `shelters`
--

CREATE TABLE `shelters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shelter_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `capacity` int(11) NOT NULL,
  `current_refugees` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','full','closed') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shelters`
--

INSERT INTO `shelters` (`id`, `shelter_name`, `address`, `capacity`, `current_refugees`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shelters01', 'Jalan Durian', 32, 23, 'active', '2026-06-09 12:18:58', '2026-06-09 12:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shelter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `two_factor_code` varchar(255) DEFAULT NULL,
  `two_factor_expires_at` timestamp NULL DEFAULT NULL,
  `two_factor_enabled` tinyint(1) NOT NULL DEFAULT 0,
  `bio` text DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `availability` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `shelter_id`, `name`, `email`, `phone`, `address`, `profile_photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `two_factor_code`, `two_factor_expires_at`, `two_factor_enabled`, `bio`, `date_of_birth`, `gender`, `skills`, `organization`, `experience`, `availability`) VALUES
(1, 1, NULL, 'Admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$Zlm3aBTJFKbtP984VcYrKOp45jSkbugUU3shew7w6BRe5KUvhcEVq', NULL, '2026-06-09 10:03:34', '2026-06-09 10:18:02', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, NULL, 'Administrator', 'admin@waterrelief.com', NULL, NULL, NULL, NULL, '$2y$12$msqr8YqIn.XVQ0DtdXrWH.Dc5NjESPaRwe5ZBq88ExLnZ0x8QnPY6', '29A6zyW157Jh4cXSDoWlNEtMmchQPqtnjgoZiBnlsm90h8Ti78vJhj3xa6G5', '2026-06-09 10:11:34', '2026-06-09 20:05:58', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, NULL, 'Cinta', 'farelhiayamo@gmail.com', '089867564321', 'jln. Pinguin Raya 3', '1781036780.jpeg', NULL, '$2y$12$UNVi8bN7dVROsrmlJkkSweaLhTP57NiC09JQNPmX8wnicLRwcI5a6', NULL, '2026-06-09 11:28:48', '2026-06-09 13:38:14', NULL, NULL, 0, 'Aku ganteng dan kamu juga', '1997-03-11', 'Male', NULL, NULL, NULL, NULL),
(4, 3, NULL, 'f', 'marunoyumitgc@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$aDjA1qoZqZ16A5E6GVyWX.fLVV/ZaX2LcVdUcwSeiOEoz9iKy6mMG', NULL, '2026-06-09 12:17:54', '2026-06-09 12:18:35', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 3, NULL, 'oalah', 'jojosantuygame66@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$/o0h1bqFnVKtVNgofnifKOFBmI7PzX.ssnZ5jJHXO9oW5EHDwPj6y', NULL, '2026-06-09 18:44:47', '2026-06-09 18:45:40', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 2, NULL, 'Darin', 'papieleven@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$HirElwHINZcciDNiDWC/JOKA/35p3/Cy91jJLRZtAan1O9G2J5cTi', NULL, '2026-06-09 18:46:11', '2026-06-09 18:46:41', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaints_user_id_foreign` (`user_id`),
  ADD KEY `complaints_shelter_id_foreign` (`shelter_id`),
  ADD KEY `complaints_handled_by_foreign` (`handled_by`),
  ADD KEY `complaints_assigned_volunteer_id_foreign` (`assigned_volunteer_id`);

--
-- Indexes for table `complaint_images`
--
ALTER TABLE `complaint_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaint_images_complaint_id_foreign` (`complaint_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donations_shelter_id_foreign` (`shelter_id`),
  ADD KEY `donations_user_id_foreign` (`user_id`),
  ADD KEY `donations_volunteer_id_foreign` (`volunteer_id`),
  ADD KEY `donations_category_id_foreign` (`category_id`);

--
-- Indexes for table `logistics`
--
ALTER TABLE `logistics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logistics_category_id_foreign` (`category_id`),
  ADD KEY `logistics_shelter_id_foreign` (`shelter_id`);

--
-- Indexes for table `logistics_categories`
--
ALTER TABLE `logistics_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shelters`
--
ALTER TABLE `shelters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_shelter_id_foreign` (`shelter_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaint_images`
--
ALTER TABLE `complaint_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logistics`
--
ALTER TABLE `logistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logistics_categories`
--
ALTER TABLE `logistics_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shelters`
--
ALTER TABLE `shelters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_assigned_volunteer_id_foreign` FOREIGN KEY (`assigned_volunteer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `complaints_handled_by_foreign` FOREIGN KEY (`handled_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `complaints_shelter_id_foreign` FOREIGN KEY (`shelter_id`) REFERENCES `shelters` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `complaints_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `complaint_images`
--
ALTER TABLE `complaint_images`
  ADD CONSTRAINT `complaint_images_complaint_id_foreign` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `logistics_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `donations_shelter_id_foreign` FOREIGN KEY (`shelter_id`) REFERENCES `shelters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donations_volunteer_id_foreign` FOREIGN KEY (`volunteer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `logistics`
--
ALTER TABLE `logistics`
  ADD CONSTRAINT `logistics_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `logistics_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `logistics_shelter_id_foreign` FOREIGN KEY (`shelter_id`) REFERENCES `shelters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_shelter_id_foreign` FOREIGN KEY (`shelter_id`) REFERENCES `shelters` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
