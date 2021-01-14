-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 07:32 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apk_umarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', NULL, 'makanan', '2019-12-16 11:41:55', '2019-12-16 11:41:55'),
(2, 'Minuman', NULL, 'minuman', '2019-12-16 11:41:59', '2019-12-16 11:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prody_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone_number`, `address`, `prody_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'ANDIKA PRATAMA', 'hanny@gmail.com', '0987654321', 'okjhgfd', 57, 0, '2019-12-16 15:44:04', '2019-12-16 15:44:04'),
(5, 'REPALDI HANDI SAPUTRA', 'admin@umarket.id', '098769876543', 'jal', 39, 0, '2019-12-16 16:01:22', '2019-12-16 16:01:22'),
(6, 'rekaja', 'repaldi25@gmail.com', '987654', 'Jambi', 38, 0, '2019-12-16 18:42:32', '2019-12-16 18:42:32'),
(7, 'Mince Lestari', 'mince@gmail.com', '0812838392822', 'tungkal', 32, 0, '2019-12-17 22:43:13', '2019-12-17 22:43:13'),
(8, 'Ahmad Muklisin', 'Akuahs@gmail.com', '098765432', 'aghjsm', 32, 0, '2019-12-19 04:25:45', '2019-12-19 04:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `university_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fakultas Kesehatan Masyarakat', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(2, 1, 'Fakultas Teknik', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(3, 1, 'Fakultas Ilmu Keolahragaan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(4, 1, 'Fakultas Teknologi Pertanian', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(5, 1, 'Fakultas Ilmu Budaya', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(6, 1, 'Fakultas Ilmu Sosial dan Politik', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(7, 1, 'Fakultas Kedokteran dan Ilmu Kesehatan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(8, 1, 'Fakultas Sains dan Teknologi', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(9, 1, 'Fakultas Peternakan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(10, 1, 'Fakultas Pertanian', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(11, 1, 'Fakultas Ekonomi dan Bisnis', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(12, 1, 'Fakultas Hukum', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(13, 1, 'Fakultas Keguruan dan Ilmu Pendidikan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(14, 1, 'Fakultas Kehutanan', '2019-12-16 17:00:00', '2019-12-16 17:00:00');

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
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2019_12_15_134609_create_categories_table', 1),
(29, '2019_12_15_134619_create_products_table', 1),
(30, '2019_12_15_134628_create_customers_table', 1),
(31, '2019_12_16_160758_create_orders_table', 1),
(32, '2019_12_16_160808_create_order_details_table', 1),
(33, '2019_12_16_160828_create_universities_table', 1),
(34, '2019_12_16_160843_create_faculties_table', 1),
(35, '2019_12_16_160856_create_prodies_table', 1),
(36, '2019_12_16_180556_add_field_status_to_products_table', 1),
(37, '2019_12_16_212109_add_field_password_to_customers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prody_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice`, `customer_id`, `customer_name`, `customer_phone`, `customer_address`, `prody_id`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 'SD3d-1576535155', '1', 'REPALDI HANDI SAPUTRA', '081313263264', 'Jl Kemajuan', 32, 194000, '2019-12-16 15:25:55', '2019-12-16 15:25:55'),
(2, 'Rvdx-1576535357', '2', 'REPALDI HANDI SAPUTRA', '098765875', 'JL KEMAJUAN', 3, 291000, '2019-12-16 15:29:18', '2019-12-16 15:29:18'),
(3, 'xfMf-1576535905', '3', 'rekaja', '0987654', 'ertyaujkl', 13, 97000, '2019-12-16 15:38:25', '2019-12-16 15:38:25'),
(4, 'WWck-1576536244', '4', 'ANDIKA PRATAMA', '0987654321', 'okjhgfd', 57, 291000, '2019-12-16 15:44:04', '2019-12-16 15:44:04'),
(5, '0NWP-1576537282', '5', 'REPALDI HANDI SAPUTRA', '098769876543', 'jal', 39, 291000, '2019-12-16 16:01:22', '2019-12-16 16:01:22'),
(6, 'JKLE-1576546952', '6', 'rekaja', '987654', 'Jambi', 38, 485000, '2019-12-16 18:42:32', '2019-12-16 18:42:32'),
(7, '4vGY-1576647793', '7', 'Mince Lestari', '0812838392822', 'tungkal', 32, 97000, '2019-12-17 22:43:13', '2019-12-17 22:43:13'),
(8, 'uMbA-1576754745', '8', 'Ahmad Muklisin', '098765432', 'aghjsm', 32, 224000, '2019-12-19 04:25:45', '2019-12-19 04:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `qty`, `weight`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 97000, 2, 200, '2019-12-16 15:25:55', '2019-12-16 15:25:55'),
(2, 2, 1, 97000, 3, 200, '2019-12-16 15:29:18', '2019-12-16 15:29:18'),
(3, 3, 1, 97000, 1, 200, '2019-12-16 15:38:25', '2019-12-16 15:38:25'),
(4, 4, 1, 97000, 3, 200, '2019-12-16 15:44:04', '2019-12-16 15:44:04'),
(5, 5, 1, 97000, 3, 200, '2019-12-16 16:01:22', '2019-12-16 16:01:22'),
(6, 6, 1, 97000, 5, 200, '2019-12-16 18:42:32', '2019-12-16 18:42:32'),
(7, 7, 1, 97000, 1, 200, '2019-12-17 22:43:13', '2019-12-17 22:43:13'),
(8, 8, 1, 97000, 2, 200, '2019-12-19 04:25:45', '2019-12-19 04:25:45'),
(9, 8, 6, 10000, 3, 100, '2019-12-19 04:25:45', '2019-12-19 04:25:45');

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
-- Table structure for table `prodies`
--

CREATE TABLE `prodies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodies`
--

INSERT INTO `prodies` (`id`, `university_id`, `faculty_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'S1 Ilmu Kesehatan Masyarakat', NULL, NULL),
(2, 1, 2, 'S1 Teknik Elektro', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(3, 2, 2, 'S1 Teknik Kimia', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(4, 1, 2, 'S1 Teknik Lingkungan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(5, 1, 2, 'S1 Teknik Sipil', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(6, 1, 2, 'Profesi Insinyur', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(7, 1, 3, 'S1 Kepelatihan Olahraga', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(8, 1, 3, 'S1 Pendidikan Olahraga dan Kesehatan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(9, 1, 4, 'S1 Teknik Pertanian', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(10, 1, 4, 'S1 Teknologi Hasil Pertanian', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(11, 1, 4, 'S1 Teknologi Industri Pertanian', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(12, 1, 5, 'S1 Arkeologi', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(13, 1, 5, 'S1 Bahasa Arab', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(14, 1, 5, 'S1 Ilmu Sejarah', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(15, 1, 5, 'S1 Sastra Indonesia', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(16, 1, 5, 'S1 Seni Drama Tari dan Musik', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(17, 1, 6, 'D-IV Manajemen Pemerintahan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(18, 1, 6, 'S1 Ilmu Pemerintahan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(19, 1, 6, 'S1 Ilmu Politik', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(20, 1, 7, 'S1 Ilmu Keperawatan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(21, 1, 7, 'S1 Kedokteran', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(22, 1, 7, 'S1 Psikologi', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(23, 1, 7, 'Profesi Dokter', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(24, 1, 7, 'Profesi Ners', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(25, 1, 8, 'D-III Analis Kimia', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(26, 1, 8, 'D-III Kimia Industri', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(27, 1, 8, 'S1 Biologi', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(28, 1, 8, 'S1 Farmasi', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(29, 1, 8, 'S1 Fisika', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(30, 1, 8, 'S1 Kimia', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(31, 1, 8, 'S1 Matematika', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(32, 1, 8, 'S1 Sistem Informasi', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(33, 1, 8, 'S1 Teknik Geofisika', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(34, 1, 8, 'S1 Teknik Geologi', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(35, 1, 8, 'S1 Teknik Pertambangan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(36, 1, 9, 'D-III Kesehatan Hewan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(37, 1, 9, 'D-III Teknologi Hasil Perikanan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(38, 1, 9, 'S1 Pemanfaatan Sumber Daya Perikanan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(39, 1, 9, 'S1 Peternakan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(40, 1, 10, 'D-III Agrobisnis', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(41, 1, 10, 'S1 Agribisnis', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(42, 1, 10, 'S1 Agroekoteknologi', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(43, 1, 11, 'D-III Akuntansi', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(44, 1, 11, 'D-III Manajemen Pemasaran', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(45, 1, 11, 'D-III Perpajakan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(46, 1, 11, 'D-IV Keuangan Daerah', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(47, 1, 11, 'S1 Akuntansi', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(48, 1, 11, 'S1 Ekonomi Islam', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(49, 1, 11, 'S1 Ekonomi Pembangunan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(50, 1, 11, 'S1 Manajemen', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(51, 1, 12, 'S1 Ilmu Hukum', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(52, 1, 13, 'S1 Administrasi Pendidikan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(53, 1, 13, 'S1 Bimbingan Dan Konseling', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(54, 1, 13, 'S1 Pendidikan Bahasa dan Sastra Indonesia', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(55, 1, 13, 'S1 Pendidikan Bahasa Inggris', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(56, 1, 13, 'S1 Pendidikan Biologi', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(57, 1, 13, 'S1 Pendidikan Ekonomi', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(58, 1, 13, 'S1 Pendidikan Fisika', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(59, 1, 13, 'S1 Pendidikan Guru PAUD', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(60, 1, 13, 'S1 Pendidikan Guru Sekolah Dasar', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(61, 1, 13, 'S1 Pendidikan Kimia', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(62, 1, 13, 'S1 Pendidikan Matematika', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(63, 1, 13, 'S1 Pendidikan Pancasila dan Kewarganegaraan', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(64, 1, 13, 'S1 Pendidikan Sejarah', '2019-12-16 17:00:00', '2019-12-16 17:00:00'),
(65, 1, 14, 'S1 Kehutanan', '2019-12-16 17:00:00', '2019-12-16 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `description`, `image`, `price`, `weight`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PIZZA - HUTT', 'pizza-hutt', 1, '<p>Makanan Enak, Murah dan Sehat</p>', '1576521758pizza-hutt.jpg', 97000, 200, 1, '2019-12-16 11:42:38', '2019-12-16 11:42:52'),
(2, 'Mie Lidi', 'mie-lidi', 1, '<p>Renyah, Guri dan Mantap</p>', '1576712319mie-lidi.jpg', 20000, 200, 1, '2019-12-18 16:38:39', '2019-12-18 16:38:39'),
(3, 'VIZZ Thai Tea', 'vizz-thai-tea', 2, '<p><a href=\"https://food.detik.com/info-kuliner/d-3656707/segarnya-minuman-dingin-dari-teh-hingga-mangga-yang-populer\" target=\"_blank\">Segarnya Minuman Dingin dari Teh hingga Mangga yang Populer</a></p>', '1576712518vizz-thai-tea.jpg', 10000, 100, 1, '2019-12-18 16:41:58', '2019-12-18 16:41:58'),
(4, 'Es Timun-Buah Naga', 'es-timun-buah-naga', 2, '<p>Es timun buah naga yang menyegarkan</p>', '1576712636es-timun-buah-naga.jpg', 10000, 100, 1, '2019-12-18 16:43:56', '2019-12-18 16:43:56'),
(5, 'Minuman Kekinian', 'minuman-kekinian', 2, '<p>Gooma menghadirkan minuman dengan menggunakan matcha sebagai bahan dasar minumannya. Tak seperti merek lainnya, Gooma juga tidak punya pilihan <em>topping </em>boba, tetapi menawarkan <em>topping chia pudding</em>, <em>matcha pudding</em>, <em>grass jelly</em>, <em>coffee jelly </em>dan aloe vera. Dari sekian minuman kekinian yang ditawarkan Gooma, Dear Kukki adalah salah satu yang wajib kamu coba. Minuman ini menawarkan konsep yang benar-benar baru dan unik, yaitu perpaduan antara saus kue <em>(cookie sauce)</em> dan susu segar yang disajikan dengan dua potong biskuit lotus. Takaran sausnya yang tidak terlalu manis sukses membuat minuman ini disukai banyak orang.</p>', '1576712764minuman-kekinian.jpg', 20000, 100, 1, '2019-12-18 16:46:04', '2019-12-18 16:46:04'),
(6, 'Minuman Kekinian Murah Alpukat Kocok Lagi Hits!', 'minuman-kekinian-murah-alpukat-kocok-lagi-hits', 1, '<p>-</p>', '1576713019minuman-kekinian-murah-alpukat-kocok-lagi-hits.jpg', 10000, 100, 1, '2019-12-18 16:50:19', '2019-12-18 16:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Universitas Jambi', '2019-12-09 17:00:00', '2019-12-16 17:00:00');

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
(1, 'Admin Umaket', 'admin@umarket.id', NULL, '$2y$10$vibCk9sv6Kvxm4.v.0BfheRMaD0DL9RU4UYHjIOCfr0G/71v9c3w2', NULL, '2019-12-16 11:41:20', '2019-12-16 11:41:20'),
(2, 'REPALDI HANDI SAPUTRA', 'repaldi25@gmail.com', NULL, '$2y$10$5BJN4rRoZ7R/.WVAHQMPnOdmmb9pubAdNlg7BKEvfi1pM161/FKkO', NULL, '2019-12-17 20:35:20', '2019-12-17 20:35:20'),
(3, 'Eva Mulani', 'Eva@gmail.com', NULL, '$2y$10$38IBCCN.L5iUjk9RWGBh/.sdmoSbWk.cxvv5.GAXnwsJAOP7ueNtq', NULL, '2019-12-17 21:53:50', '2019-12-17 21:53:50'),
(4, 'Ahmad', 'ahmad@gmail.com', NULL, '$2y$10$lHB5ogc1GLQ1P7Y0WbHEsO0hlbO6h4/20Jmyo1zX2w/yNtSkaDYde', NULL, '2019-12-19 04:21:03', '2019-12-19 04:21:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_invoice_unique` (`invoice`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `prodies`
--
ALTER TABLE `prodies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prodies`
--
ALTER TABLE `prodies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
