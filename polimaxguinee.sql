-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 06 mars 2026 à 12:06
-- Version du serveur : 8.0.45-0ubuntu0.24.04.1
-- Version de PHP : 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `polimaxguinee`
--

-- --------------------------------------------------------

--
-- Structure de la table `achats`
--

CREATE TABLE `achats` (
  `id` bigint UNSIGNED NOT NULL,
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` bigint UNSIGNED NOT NULL,
  `total_ctns` int NOT NULL DEFAULT '1',
  `total_pcs` int NOT NULL DEFAULT '1',
  `total_amount` decimal(15,2) DEFAULT NULL,
  `shippment` decimal(15,2) DEFAULT NULL,
  `grand_total` decimal(15,2) NOT NULL,
  `date_achat` date DEFAULT NULL,
  `status` enum('commanded','canceled','delivered','shipped','paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'commanded',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `achats`
--

INSERT INTO `achats` (`id`, `identifier`, `store_id`, `total_ctns`, `total_pcs`, `total_amount`, `shippment`, `grand_total`, `date_achat`, `status`, `created_at`, `updated_at`) VALUES
(2, 'ACHAT2026020001', 1, 4424, 4424, 1986608000.00, 473600000.00, 1986608000.00, '2026-02-14', 'commanded', '2026-02-14 00:14:13', '2026-02-23 23:03:14'),
(3, 'ACHAT2026020003', 1, 2260, 2260, 796820000.00, 351600000.00, 796820000.00, '2026-02-14', 'commanded', '2026-02-14 00:27:47', '2026-02-21 13:40:46'),
(4, 'ACHAT2026020004', 1, 782, 782, 262074000.00, 98620000.00, 262074000.00, '2026-02-15', 'commanded', '2026-02-15 20:30:33', '2026-02-21 13:23:08'),
(5, 'ACHAT2026020005', 1, 410, 410, 365794599.99, 189000000.00, 365794599.99, '2026-02-15', 'commanded', '2026-02-15 21:03:44', '2026-02-20 23:29:58'),
(6, 'ACHAT2026020006', 1, 507, 507, 552323000.00, 203000000.00, 552323000.00, '2026-02-19', 'commanded', '2026-02-19 12:34:01', '2026-02-21 12:59:37'),
(7, 'ACHAT2026020007', 1, 220, 220, 83000000.00, 28000000.00, 83000000.00, '2026-02-19', 'commanded', '2026-02-19 12:48:05', '2026-02-21 13:01:04'),
(8, 'ACHAT2026020008', 1, 60, 60, 59100000.00, 4200000.00, 59100000.00, '2026-02-19', 'commanded', '2026-02-19 13:17:13', '2026-02-21 13:02:39'),
(9, 'ACHAT2026020009', 1, 200, 200, 79352000.00, 15552000.00, 79352000.00, '2026-02-19', 'commanded', '2026-02-19 13:54:19', '2026-02-21 13:03:47'),
(10, 'ACHAT2026020010', 1, 100, 100, 30500000.00, 5500000.00, 30500000.00, '2026-02-19', 'commanded', '2026-02-19 14:06:12', '2026-02-21 13:04:22'),
(11, 'ACHAT2026020011', 1, 60, 60, 102280000.00, 17380000.00, 102280000.00, '2026-02-19', 'commanded', '2026-02-19 14:30:20', '2026-02-21 13:04:49'),
(12, 'ACHAT2026020012', 1, 100, 100, 28750000.00, 14050000.00, 28750000.00, '2026-02-19', 'commanded', '2026-02-19 14:51:36', '2026-02-21 13:05:42'),
(13, 'ACHAT2026020013', 1, 100, 100, 58548000.00, 33848000.00, 58548000.00, '2026-02-19', 'commanded', '2026-02-19 21:54:13', '2026-02-21 13:06:04'),
(14, 'ACHAT2026020014', 1, 100, 100, 51170000.00, 22870000.00, 51170000.00, '2026-02-19', 'commanded', '2026-02-19 21:59:54', '2026-02-21 13:06:41'),
(15, 'ACHAT2026020015', 1, 50, 50, 27475000.00, 4575000.00, 27475000.00, '2026-02-19', 'commanded', '2026-02-19 22:24:26', '2026-02-21 13:08:10'),
(16, 'ACHAT2026020016', 1, 50, 50, 31575000.00, 4575000.00, 31575000.00, '2026-02-19', 'commanded', '2026-02-19 22:43:35', '2026-02-21 13:08:49'),
(17, 'ACHAT2026020017', 1, 10, 10, 7605000.00, 915000.00, 7605000.00, '2026-02-19', 'commanded', '2026-02-19 23:16:58', '2026-02-21 13:17:31'),
(18, 'ACHAT2026020018', 1, 6, 6, 3718000.00, 310000.00, 3718000.00, '2026-02-19', 'commanded', '2026-02-19 23:25:48', '2026-02-21 13:17:50'),
(19, 'ACHAT2026020019', 1, 20, 20, 15910000.00, 1830000.00, 15910000.00, '2026-02-19', 'commanded', '2026-02-19 23:32:53', '2026-02-21 13:18:18'),
(20, 'ACHAT2026020020', 1, 30, 30, 18860000.00, 10370000.00, 18860000.00, '2026-02-19', 'commanded', '2026-02-19 23:41:44', '2026-02-21 13:15:24'),
(21, 'ACHAT2026020021', 1, 50, 50, 24573000.00, 13723000.00, 24573000.00, '2026-02-19', 'commanded', '2026-02-19 23:51:21', '2026-02-21 13:20:25'),
(22, 'ACHAT2026020022', 1, 30, 30, 9650000.00, 3050000.00, 9650000.00, '2026-02-19', 'commanded', '2026-02-19 23:56:14', '2026-02-21 13:19:58'),
(23, 'ACHAT2026020023', 1, 30, 30, 17925000.00, 945000.00, 17925000.00, '2026-02-20', 'commanded', '2026-02-20 11:00:47', '2026-02-20 22:59:50'),
(24, 'ACHAT2026020024', 1, 30, 30, 14125000.00, 1135000.00, 14125000.00, '2026-02-20', 'commanded', '2026-02-20 11:10:38', '2026-02-21 12:12:56'),
(25, 'ACHAT2026020025', 1, 30, 30, 8290000.00, 490000.00, 8290000.00, '2026-02-20', 'commanded', '2026-02-20 11:21:31', '2026-02-21 12:14:09'),
(26, 'ACHAT2026020026', 1, 20, 20, 9650000.00, 490000.00, 9650000.00, '2026-02-20', 'commanded', '2026-02-20 11:29:11', '2026-02-21 12:15:34'),
(27, 'ACHAT2026020027', 1, 20, 20, 8638000.00, 658000.00, 8638000.00, '2026-02-20', 'commanded', '2026-02-20 11:33:23', '2026-02-21 12:17:06'),
(28, 'ACHAT2026020028', 1, 20, 20, 11640000.00, 1660000.00, 11640000.00, '2026-02-20', 'commanded', '2026-02-20 11:36:11', '2026-02-21 12:18:08'),
(29, 'ACHAT2026020029', 1, 50, 50, 22975000.00, 2175000.00, 22975000.00, '2026-02-20', 'commanded', '2026-02-20 11:44:48', '2026-02-21 12:19:12'),
(30, 'ACHAT2026020030', 1, 15, 15, 8980000.00, 745000.00, 8980000.00, '2026-02-20', 'commanded', '2026-02-20 11:54:04', '2026-02-21 12:20:18'),
(31, 'ACHAT2026020031', 1, 30, 30, 18576000.00, 1116000.00, 18576000.00, '2026-02-20', 'commanded', '2026-02-20 11:58:36', '2026-02-21 12:21:00'),
(32, 'ACHAT2026020032', 1, 45, 45, 11575000.00, 1090000.00, 11575000.00, '2026-02-20', 'commanded', '2026-02-20 12:03:07', '2026-02-21 12:23:11'),
(33, 'ACHAT2026020033', 1, 45, 45, 9210000.00, 2460000.00, 9210000.00, '2026-02-20', 'commanded', '2026-02-20 12:05:52', '2026-02-21 12:23:49'),
(34, 'ACHAT2026020034', 1, 15, 15, 4385000.00, 830000.00, 4385000.00, '2026-02-20', 'commanded', '2026-02-20 12:09:50', '2026-02-21 12:24:43'),
(35, 'ACHAT2026020035', 1, 15, 15, 4333000.00, 658000.00, 4333000.00, '2026-02-20', 'commanded', '2026-02-20 12:12:45', '2026-02-21 12:25:13'),
(36, 'ACHAT2026020036', 1, 25, 25, 10082000.00, 2432000.00, 10082000.00, '2026-02-20', 'commanded', '2026-02-20 12:16:58', '2026-02-21 12:26:00'),
(37, 'ACHAT2026020037', 1, 25, 25, 9507000.00, 2432000.00, 9507000.00, '2026-02-20', 'commanded', '2026-02-20 12:23:59', '2026-02-21 12:26:39'),
(38, 'ACHAT2026020038', 1, 30, 30, 18960000.00, 3000000.00, 18960000.00, '2026-02-20', 'commanded', '2026-02-20 12:57:28', '2026-02-21 12:27:41'),
(39, 'ACHAT2026020039', 1, 30, 30, 18367000.00, 2317000.00, 18367000.00, '2026-02-20', 'commanded', '2026-02-20 13:02:46', '2026-02-21 12:28:28'),
(40, 'ACHAT2026020040', 1, 30, 30, 31770000.00, 3090000.00, 31770000.00, '2026-02-20', 'commanded', '2026-02-20 14:14:55', '2026-02-21 12:29:16'),
(41, 'ACHAT2026020041', 1, 20, 20, 22210000.00, 3090000.00, 22210000.00, '2026-02-20', 'commanded', '2026-02-20 14:20:07', '2026-02-21 12:32:20'),
(42, 'ACHAT2026020042', 1, 20, 20, 20380000.00, 1260000.00, 20380000.00, '2026-02-20', 'commanded', '2026-02-20 14:22:50', '2026-02-21 12:38:38'),
(43, 'ACHAT2026020043', 1, 3838, 3838, 526313340.00, 175405000.00, 526313340.00, '2026-02-20', 'commanded', '2026-02-20 15:15:34', '2026-02-21 12:55:50'),
(44, 'ACHAT2026020044', 1, 973, 973, 133429390.00, 44468000.00, 133429390.00, '2026-02-20', 'commanded', '2026-02-20 15:17:54', '2026-02-21 12:56:16'),
(45, 'ACHAT2026020045', 1, 207, 207, 28386324.00, 9460314.00, 28386324.00, '2026-02-20', 'commanded', '2026-02-20 15:20:47', '2026-02-21 12:56:33'),
(46, 'ACHAT2026020046', 1, 207, 207, 28387010.00, 9461000.00, 28387010.00, '2026-02-20', 'commanded', '2026-02-20 15:28:52', '2026-02-21 12:56:54'),
(49, 'ACHAT2026020047', 1, 132, 132, 33594334.00, 7261522.00, 33594334.00, '2026-02-21', 'commanded', '2026-02-21 15:03:16', '2026-02-21 15:03:16'),
(50, 'ACHAT2026020050', 1, 550, 550, 163100000.00, 85000000.00, 163100000.00, '2026-02-21', 'commanded', '2026-02-21 15:18:03', '2026-03-04 13:01:24'),
(51, 'ACHAT2026020051', 1, 1235, 1235, 114460884.00, 45918384.00, 114460884.00, '2026-02-21', 'commanded', '2026-02-21 15:39:48', '2026-02-21 15:50:13'),
(52, 'ACHAT2026020052', 1, 1150, 1150, 106237478.00, 42513678.00, 106237478.00, '2026-02-21', 'commanded', '2026-02-21 15:47:35', '2026-02-21 15:47:35'),
(53, 'ACHAT2026020053', 1, 4450, 4450, 133149100.00, 14788000.00, 133149100.00, '2026-02-21', 'commanded', '2026-02-21 15:56:59', '2026-02-21 15:56:59'),
(54, 'ACHAT2026020054', 1, 100, 100, 43374734.00, 20794734.00, 43374734.00, '2026-02-21', 'commanded', '2026-02-21 16:06:53', '2026-02-21 16:06:53'),
(55, 'ACHAT2026020055', 1, 800, 800, 58677880.00, 25877880.00, 58677880.00, '2026-02-21', 'commanded', '2026-02-21 16:11:43', '2026-02-21 16:11:43'),
(56, 'ACHAT2026020056', 1, 450, 450, 65891565.00, 29112615.00, 65891565.00, '2026-02-21', 'commanded', '2026-02-21 16:15:02', '2026-02-21 16:15:02'),
(57, 'ACHAT2026020057', 1, 100, 100, 45503290.00, 26802090.00, 45503290.00, '2026-02-21', 'commanded', '2026-02-21 16:21:56', '2026-02-21 16:21:56'),
(58, 'ACHAT2026020058', 1, 58, 58, 10436332.00, 2000000.00, 10436332.00, '2026-02-21', 'commanded', '2026-02-21 16:45:26', '2026-02-21 16:45:26'),
(59, 'ACHAT2026020059', 1, 100, 100, 19300000.00, 2000000.00, 19300000.00, '2026-02-21', 'commanded', '2026-02-21 16:50:05', '2026-02-21 16:50:05'),
(60, 'ACHAT2026020060', 1, 100, 100, 11224862.00, 5545262.00, 11224862.00, '2026-02-21', 'commanded', '2026-02-21 17:25:31', '2026-02-21 17:25:31'),
(62, 'ACHAT2026020061', 1, 100, 100, 13326572.00, 6469472.00, 13326572.00, '2026-02-21', 'commanded', '2026-02-21 17:41:16', '2026-02-21 17:41:16'),
(63, 'ACHAT2026020063', 1, 100, 100, 24419900.00, 15000000.00, 24419900.00, '2026-02-21', 'commanded', '2026-02-21 17:55:44', '2026-02-21 17:55:44'),
(64, 'ACHAT2026020064', 1, 600, 600, 57089649.00, 22181049.00, 57089649.00, '2026-02-21', 'commanded', '2026-02-21 18:01:43', '2026-02-21 18:01:43'),
(65, 'ACHAT2026020065', 1, 0, 0, 0.00, 12938945.00, 0.00, '2026-02-21', 'commanded', '2026-02-21 18:05:07', '2026-02-21 18:12:20'),
(66, 'ACHAT2026020066', 1, 200, 200, 36765745.00, 12938945.00, 36765745.00, '2026-02-21', 'commanded', '2026-02-21 18:15:39', '2026-02-21 18:15:39'),
(67, 'ACHAT2026020067', 1, 195, 195, 65121334.00, 27033154.00, 65121334.00, '2026-02-21', 'commanded', '2026-02-21 18:31:48', '2026-02-21 18:31:48'),
(68, 'ACHAT2026020068', 1, 215, 215, 71800445.00, 29805785.00, 71800445.00, '2026-02-21', 'commanded', '2026-02-21 18:35:30', '2026-02-21 18:35:30'),
(69, 'ACHAT2026020069', 1, 135, 135, 45084000.00, 18715260.00, 45084000.00, '2026-02-21', 'commanded', '2026-02-21 18:38:24', '2026-02-21 18:38:24'),
(70, 'ACHAT2026020070', 1, 80, 80, 26716444.00, 11090524.00, 26716444.00, '2026-02-21', 'commanded', '2026-02-21 18:41:36', '2026-02-21 18:41:36'),
(71, 'ACHAT2026020071', 1, 60, 60, 20037333.00, 8317893.00, 20037333.00, '2026-02-21', 'commanded', '2026-02-21 18:44:02', '2026-02-21 18:44:02'),
(72, 'ACHAT2026020072', 1, 36, 36, 6181000.00, 925000.00, 6181000.00, '2026-02-23', 'commanded', '2026-02-23 12:39:10', '2026-02-23 12:39:10'),
(73, 'ACHAT2026030073', 1, 76, 76, 49613788.00, 27360000.00, 49613788.00, '2026-03-02', 'commanded', '2026-03-02 11:12:28', '2026-03-02 11:12:28'),
(74, 'ACHAT2026030074', 1, 50, 50, 12995460.00, 4084960.00, 12995460.00, '2026-03-03', 'commanded', '2026-03-03 18:27:46', '2026-03-03 18:27:46'),
(75, 'ACHAT2026030075', 1, 50, 50, 16035880.00, 5385880.00, 16035880.00, '2026-03-03', 'commanded', '2026-03-03 18:31:49', '2026-03-03 18:31:49'),
(76, 'ACHAT2026030076', 1, 20, 20, 7585000.00, 2785000.00, 7585000.00, '2026-03-03', 'commanded', '2026-03-03 18:35:04', '2026-03-03 18:35:04');

-- --------------------------------------------------------

--
-- Structure de la table `catalogue_customers`
--

CREATE TABLE `catalogue_customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `catalogue_customers`
--

INSERT INTO `catalogue_customers` (`id`, `name`, `email`, `phone`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'IBRAHIMA BAH', 'ibrahimamariama21@outlook.com', '19511319802', 'No. 7,XinShi Street, ShanShan Building, Room 505', '$2y$10$C24WepZhLG2EBmoTH6wLYOSWd9F/dp.dscKVuE4KWJJdsLcBwtegO', 'cE11jKLmDQHly2fgKvao1MnDbJGLVLmrWk8x6BFamiaXDuxYPp0kK5vxicqK', '2026-02-13 11:50:23', '2026-02-13 11:50:23');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `category_type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'electronique', 'divert', 'general', NULL, '2026-02-15 20:03:46'),
(4, 'Quincaillerie', 'Divert', 'general', '2026-02-06 18:17:46', '2026-02-15 20:02:36'),
(5, 'alimentation', 'Divert', 'general', '2026-02-06 19:58:07', '2026-02-15 20:03:16');

-- --------------------------------------------------------

--
-- Structure de la table `category_products`
--

CREATE TABLE `category_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category_products`
--

INSERT INTO `category_products` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(4, 24, 4, '2026-02-14 00:27:47', '2026-02-14 00:27:47'),
(5, 23, 4, NULL, NULL),
(7, 26, 1, '2026-02-15 20:30:33', '2026-02-15 20:30:33'),
(8, 27, 1, '2026-02-15 20:30:33', '2026-02-15 20:30:33'),
(9, 28, 1, '2026-02-15 21:03:44', '2026-02-15 21:03:44'),
(10, 29, 1, '2026-02-15 21:03:44', '2026-02-15 21:03:44'),
(11, 30, 1, '2026-02-15 21:03:44', '2026-02-15 21:03:44'),
(12, 31, 1, '2026-02-15 21:03:44', '2026-02-15 21:03:44'),
(13, 32, 4, '2026-02-19 12:34:01', '2026-02-19 12:34:01'),
(14, 33, 4, '2026-02-19 12:48:05', '2026-02-19 12:48:05'),
(15, 34, 4, '2026-02-19 13:17:13', '2026-02-19 13:17:13'),
(16, 35, 4, '2026-02-19 13:54:19', '2026-02-19 13:54:19'),
(17, 36, 4, '2026-02-19 14:06:12', '2026-02-19 14:06:12'),
(18, 37, 4, '2026-02-19 14:30:20', '2026-02-19 14:30:20'),
(19, 38, 4, '2026-02-19 14:51:36', '2026-02-19 14:51:36'),
(20, 39, 4, '2026-02-19 21:54:13', '2026-02-19 21:54:13'),
(21, 40, 4, '2026-02-19 21:59:54', '2026-02-19 21:59:54'),
(22, 41, 4, '2026-02-19 22:24:26', '2026-02-19 22:24:26'),
(23, 42, 4, '2026-02-19 22:43:35', '2026-02-19 22:43:35'),
(24, 43, 4, '2026-02-19 23:16:58', '2026-02-19 23:16:58'),
(25, 44, 4, '2026-02-19 23:25:48', '2026-02-19 23:25:48'),
(26, 45, 4, '2026-02-19 23:32:53', '2026-02-19 23:32:53'),
(27, 46, 4, '2026-02-19 23:41:44', '2026-02-19 23:41:44'),
(28, 47, 4, '2026-02-19 23:51:21', '2026-02-19 23:51:21'),
(29, 48, 4, '2026-02-19 23:56:14', '2026-02-19 23:56:14'),
(30, 49, 4, '2026-02-20 11:00:47', '2026-02-20 11:00:47'),
(31, 50, 4, '2026-02-20 11:10:38', '2026-02-20 11:10:38'),
(32, 51, 4, '2026-02-20 11:21:31', '2026-02-20 11:21:31'),
(33, 52, 4, '2026-02-20 11:29:11', '2026-02-20 11:29:11'),
(34, 53, 4, '2026-02-20 11:33:23', '2026-02-20 11:33:23'),
(35, 54, 4, '2026-02-20 11:36:11', '2026-02-20 11:36:11'),
(36, 55, 4, '2026-02-20 11:44:48', '2026-02-20 11:44:48'),
(37, 56, 4, '2026-02-20 11:54:04', '2026-02-20 11:54:04'),
(38, 57, 4, '2026-02-20 11:58:36', '2026-02-20 11:58:36'),
(39, 58, 4, '2026-02-20 12:03:07', '2026-02-20 12:03:07'),
(40, 59, 4, '2026-02-20 12:05:52', '2026-02-20 12:05:52'),
(41, 60, 4, '2026-02-20 12:09:50', '2026-02-20 12:09:50'),
(42, 61, 4, '2026-02-20 12:12:45', '2026-02-20 12:12:45'),
(43, 62, 4, '2026-02-20 12:16:58', '2026-02-20 12:16:58'),
(44, 63, 4, '2026-02-20 12:23:59', '2026-02-20 12:23:59'),
(45, 64, 4, '2026-02-20 12:57:28', '2026-02-20 12:57:28'),
(46, 65, 4, '2026-02-20 13:02:46', '2026-02-20 13:02:46'),
(47, 66, 4, '2026-02-20 14:14:55', '2026-02-20 14:14:55'),
(48, 67, 4, '2026-02-20 14:20:07', '2026-02-20 14:20:07'),
(49, 68, 4, '2026-02-20 14:22:50', '2026-02-20 14:22:50'),
(50, 69, 4, '2026-02-20 15:15:34', '2026-02-20 15:15:34'),
(51, 70, 4, '2026-02-20 15:17:54', '2026-02-20 15:17:54'),
(52, 71, 4, '2026-02-20 15:20:47', '2026-02-20 15:20:47'),
(53, 72, 4, '2026-02-20 15:28:52', '2026-02-20 15:28:52'),
(56, 75, 4, '2026-02-21 15:03:16', '2026-02-21 15:03:16'),
(57, 76, 4, '2026-02-21 15:18:03', '2026-02-21 15:18:03'),
(58, 77, 4, '2026-02-21 15:39:48', '2026-02-21 15:39:48'),
(59, 78, 4, '2026-02-21 15:47:35', '2026-02-21 15:47:35'),
(60, 79, 4, '2026-02-21 15:56:59', '2026-02-21 15:56:59'),
(61, 80, 4, '2026-02-21 16:06:53', '2026-02-21 16:06:53'),
(62, 81, 4, '2026-02-21 16:11:43', '2026-02-21 16:11:43'),
(63, 82, 4, '2026-02-21 16:15:03', '2026-02-21 16:15:03'),
(64, 83, 4, '2026-02-21 16:21:56', '2026-02-21 16:21:56'),
(65, 84, 4, '2026-02-21 16:45:26', '2026-02-21 16:45:26'),
(66, 85, 4, '2026-02-21 16:50:05', '2026-02-21 16:50:05'),
(67, 86, 4, '2026-02-21 17:25:31', '2026-02-21 17:25:31'),
(69, 88, 4, '2026-02-21 17:41:16', '2026-02-21 17:41:16'),
(70, 89, 4, '2026-02-21 17:55:44', '2026-02-21 17:55:44'),
(71, 90, 4, '2026-02-21 18:01:43', '2026-02-21 18:01:43'),
(73, 92, 4, '2026-02-21 18:15:39', '2026-02-21 18:15:39'),
(74, 93, 4, '2026-02-21 18:31:48', '2026-02-21 18:31:48'),
(75, 94, 4, '2026-02-21 18:35:30', '2026-02-21 18:35:30'),
(76, 95, 4, '2026-02-21 18:38:24', '2026-02-21 18:38:24'),
(77, 96, 4, '2026-02-21 18:41:36', '2026-02-21 18:41:36'),
(78, 97, 4, '2026-02-21 18:44:02', '2026-02-21 18:44:02'),
(79, 98, 4, '2026-02-23 12:39:10', '2026-02-23 12:39:10'),
(80, 99, 4, '2026-03-02 11:12:28', '2026-03-02 11:12:28'),
(81, 100, 4, '2026-03-03 18:27:46', '2026-03-03 18:27:46'),
(82, 101, 4, '2026-03-03 18:31:49', '2026-03-03 18:31:49'),
(83, 102, 4, '2026-03-03 18:35:04', '2026-03-03 18:35:04');

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `logo`, `about`, `created_at`, `updated_at`) VALUES
(1, 'EDAAG TRADING', 'Guinée Conakry, Madina école Gare Voiture Dabola', '1771612441.jpg', 'Le manager principale du site, il est chargé de la gestion complète et mis à jour du site', NULL, '2026-02-20 18:34:01');

-- --------------------------------------------------------

--
-- Structure de la table `currency_settings`
--

CREATE TABLE `currency_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `currencyName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currencyCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currencySymbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `mark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_taken` double(15,2) NOT NULL DEFAULT '0.00',
  `total_repaid` double(15,2) NOT NULL DEFAULT '0.00',
  `balance` double(15,2) NOT NULL DEFAULT '0.00',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fidelite` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `mark`, `customerName`, `tel`, `address`, `total_taken`, `total_repaid`, `balance`, `email`, `fidelite`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bobo Sere', 'Bobo Sere', '628928787', 'Madina école Ajam', 597240000.00, 270000000.00, -527240000.00, NULL, 1, '2026-02-14 00:42:06', '2026-03-05 15:45:31', NULL),
(2, 'WEB2602140001', 'Mamadou Oury Diallo', '623040561', 'Sonfonia', 0.00, 0.00, 0.00, NULL, 1, '2026-02-14 01:16:21', '2026-02-17 00:39:37', '2026-02-17 00:39:37'),
(3, 'SFK', 'Fode sidibe', '611119192', 'Kankan', 0.00, 0.00, 0.00, NULL, 1, '2026-02-14 19:47:55', '2026-02-14 19:47:55', NULL),
(4, 'M C', 'Mamoudou Cisse', '627340034', 'Siguiri', 591710000.00, 250000000.00, -441710000.00, NULL, 1, '2026-02-15 21:47:59', '2026-03-06 10:21:52', NULL),
(5, 'Dembaya', 'Elhadj youssouf koulibali', '622586306', 'Siguiri', 597240000.00, 300000000.00, -297240000.00, NULL, 1, '2026-02-17 00:41:34', '2026-02-17 00:41:34', NULL),
(6, 'Jrc', 'Abdoul Aziz Diallo', '622149874', 'Sonfonia', 639240000.00, 284240000.00, -381280000.00, NULL, 1, '2026-02-17 00:42:31', '2026-03-04 18:06:03', NULL),
(12, 'Oumar', 'DT SARLU', '622664444', 'Cimenterie', 366070000.00, 0.00, -366070000.00, 'diallotrading22@gmail.com', 1, '2026-03-02 22:16:58', '2026-03-04 18:32:20', NULL),
(13, 'Djalan', 'Ismail Gonossourou Conde', '623180991', 'Lola', 337170000.00, 0.00, -337170000.00, NULL, 1, '2026-03-02 22:47:07', '2026-03-02 22:47:07', NULL),
(16, 'SMS', 'Saliou Sow', '623471167', 'Madina gare voiture Dabola', 15840000.00, 15840000.00, 0.00, 'test@email.com', 1, '2026-03-04 18:22:19', '2026-03-04 18:27:58', NULL),
(17, 'ADK', 'Abdoulaye (oustage waré)', '628593110', 'Madina gare voiture dabola', 28600000.00, 0.00, -28600000.00, NULL, 1, '2026-03-04 22:02:42', '2026-03-04 22:05:03', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `store_id` bigint UNSIGNED DEFAULT NULL,
  `catalogue_customer_id` bigint UNSIGNED DEFAULT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `total_amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer_orders`
--

INSERT INTO `customer_orders` (`id`, `store_id`, `catalogue_customer_id`, `customer_name`, `phone`, `address`, `notes`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Mamadou Oury Diallo', '623040561', 'Sonfonia', 'Modia', 3300000.00, 'cancelled', '2026-02-14 01:14:40', '2026-02-14 20:02:59'),
(2, 1, NULL, 'Gran Pere', '624166064', 'Sonfonia', 'Exprès', 30750000.00, 'cancelled', '2026-02-17 11:11:32', '2026-02-18 15:36:01'),
(3, 1, NULL, 'DIALLO ELHADJ MAMADOU', '+224621534834', 'kobaya, C/Ratoma Conakry 几内亚 Guinea', 'bcnncm', 3150000.00, 'cancelled', '2026-02-20 07:38:29', '2026-02-21 21:23:33'),
(4, 1, 1, 'IBRAHIMA BAH', '19511319802', 'No. 7,XinShi Street, ShanShan Building, Room 505', 'bon de commande', 4560000.00, 'cancelled', '2026-02-20 13:39:16', '2026-02-21 21:24:02');

-- --------------------------------------------------------

--
-- Structure de la table `customer_order_items`
--

CREATE TABLE `customer_order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `unit_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `total_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer_order_items`
--

INSERT INTO `customer_order_items` (`id`, `customer_order_id`, `product_id`, `quantity`, `unit_price`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 23, 6, 550000.00, 3300000.00, '2026-02-14 01:14:40', '2026-02-14 01:14:40'),
(2, 2, 23, 15, 550000.00, 8250000.00, '2026-02-17 11:11:32', '2026-02-17 11:11:32'),
(3, 2, 24, 50, 450000.00, 22500000.00, '2026-02-17 11:11:32', '2026-02-17 11:11:32'),
(4, 3, 24, 7, 450000.00, 3150000.00, '2026-02-20 07:38:29', '2026-02-20 07:38:29'),
(5, 4, 24, 6, 450000.00, 2700000.00, '2026-02-20 13:39:16', '2026-02-20 13:39:16'),
(6, 4, 32, 1, 1300000.00, 1300000.00, '2026-02-20 13:39:16', '2026-02-20 13:39:16'),
(7, 4, 33, 1, 560000.00, 560000.00, '2026-02-20 13:39:16', '2026-02-20 13:39:16');

-- --------------------------------------------------------

--
-- Structure de la table `dettes`
--

CREATE TABLE `dettes` (
  `id` bigint UNSIGNED NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `store_id` bigint UNSIGNED NOT NULL,
  `endettement_date` date NOT NULL,
  `montant_total` double(10,2) NOT NULL,
  `montant_paid` double(10,2) NOT NULL,
  `reste` double(10,2) NOT NULL,
  `preuve` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` enum('pending','paid','cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id` bigint UNSIGNED NOT NULL,
  `numero_devis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `total_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status` enum('draft','sent','accepted','rejected','expired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `valid_until` date DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `validated_by` bigint UNSIGNED DEFAULT NULL,
  `validated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`id`, `numero_devis`, `store_id`, `customer_id`, `notes`, `total_amount`, `status`, `valid_until`, `created_by`, `validated_by`, `validated_at`, `created_at`, `updated_at`) VALUES
(4, 'DEV-202602-0001', 1, 5, 'Dans l\'attente dune suite favorable ( Mr Koulibaly ) DEMBAYAH', 371160000.00, 'draft', '2026-03-25', 2, NULL, NULL, '2026-02-23 13:06:16', '2026-02-23 13:08:43');

-- --------------------------------------------------------

--
-- Structure de la table `devi_lines`
--

CREATE TABLE `devi_lines` (
  `id` bigint UNSIGNED NOT NULL,
  `devis_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `unit_price` decimal(15,2) NOT NULL,
  `total_price` decimal(15,2) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `devi_lines`
--

INSERT INTO `devi_lines` (`id`, `devis_id`, `product_id`, `quantity`, `unit_price`, `total_price`, `notes`, `created_at`, `updated_at`) VALUES
(34, 4, 76, 100, 310000.00, 31000000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(35, 4, 77, 200, 120000.00, 24000000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(36, 4, 78, 200, 120000.00, 24000000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(37, 4, 75, 24, 360000.00, 8640000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(38, 4, 98, 18, 300000.00, 5400000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(39, 4, 79, 1000, 50000.00, 50000000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(40, 4, 93, 30, 370000.00, 11100000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(41, 4, 94, 40, 370000.00, 14800000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(42, 4, 83, 50, 480000.00, 24000000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(43, 4, 84, 29, 180000.00, 5220000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(44, 4, 85, 50, 200000.00, 10000000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(45, 4, 80, 30, 450000.00, 13500000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(46, 4, 81, 300, 85000.00, 25500000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(47, 4, 82, 150, 180000.00, 27000000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(48, 4, 86, 50, 200000.00, 10000000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(49, 4, 88, 50, 250000.00, 12500000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(50, 4, 89, 50, 250000.00, 12500000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(51, 4, 90, 300, 120000.00, 36000000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44'),
(52, 4, 92, 100, 260000.00, 26000000.00, NULL, '2026-02-23 13:08:44', '2026-02-23 13:08:44');

-- --------------------------------------------------------

--
-- Structure de la table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_categories_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `slug`, `categoryName`, `created_at`, `updated_at`) VALUES
(1, 'transport', 'Transport', NULL, NULL),
(2, 'fournitures', 'Fournitures', NULL, NULL),
(3, 'maintenance', 'Maintenance', NULL, NULL),
(4, 'salaires', 'Salaires', NULL, NULL),
(5, 'divers', 'Divers', NULL, NULL),
(6, 'Nourritures', 'Nourriture', '2026-02-13 12:33:28', '2026-02-13 12:33:28');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` bigint UNSIGNED NOT NULL,
  `numero_facture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `store_id` bigint UNSIGNED NOT NULL,
  `quantity` int DEFAULT NULL,
  `montant_total` decimal(15,2) DEFAULT NULL,
  `avance` decimal(15,2) NOT NULL,
  `reste` decimal(15,2) DEFAULT NULL,
  `statut` enum('non payé','payé') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non payé',
  `livraison` enum('non livré','livré') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non livré',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `numero_facture`, `customer_id`, `store_id`, `quantity`, `montant_total`, `avance`, `reste`, `statut`, `livraison`, `notes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, '2026020001', 6, 1, 1106, 597240000.00, 0.00, 340850000.00, 'non payé', 'livré', NULL, '2026-02-21 14:13:41', '2026-03-04 18:06:03', NULL),
(19, '2026020019', 1, 1, 1106, 597240000.00, 170000000.00, 327240000.00, 'non payé', 'livré', '1er versement', '2026-02-21 14:20:28', '2026-03-05 15:45:31', NULL),
(20, '2026020020', 5, 1, 1106, 597240000.00, 300000000.00, 297240000.00, 'non payé', 'livré', '1er versements ecobank pottal cash', '2026-02-21 14:32:24', '2026-02-21 14:32:37', NULL),
(21, '2026020021', 4, 1, 1106, 591710000.00, 200000000.00, 341710000.00, 'non payé', 'livré', 'fais en deux versement First banque Siguiri', '2026-02-21 14:42:42', '2026-03-06 10:21:52', NULL),
(22, '2026030022', 12, 1, 2817, 366070000.00, 0.00, 366070000.00, 'non payé', 'livré', 'Numéro conteneur TEMU1109650', '2026-03-02 22:22:37', '2026-03-02 22:27:15', NULL),
(23, '2026030023', 13, 1, 2457, 337170000.00, 0.00, 337170000.00, 'non payé', 'livré', 'Número Conteneur TEMU2523069', '2026-03-02 22:54:37', '2026-03-02 22:55:27', NULL),
(24, '2026030024', 6, 1, 150, 42000000.00, 24000000.00, 14150000.00, 'non payé', 'livré', 'vente des grillage du conteneur Lola', '2026-03-04 12:52:18', '2026-03-04 13:52:57', NULL),
(25, '2026030025', 16, 1, 48, 15840000.00, 0.00, 0.00, 'payé', 'livré', 'solde ok', '2026-03-04 18:23:05', '2026-03-04 18:27:58', NULL),
(26, '2026030026', 17, 1, 76, 28600000.00, 0.00, 28600000.00, 'non payé', 'non livré', NULL, '2026-03-04 22:03:40', '2026-03-04 22:03:40', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `journaliers`
--

CREATE TABLE `journaliers` (
  `id` bigint UNSIGNED NOT NULL,
  `nomPrenant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` double NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` double NOT NULL DEFAULT '0',
  `reste` double NOT NULL,
  `datePrise` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commandes`
--

CREATE TABLE `ligne_commandes` (
  `id` bigint UNSIGNED NOT NULL,
  `achat_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `cartons` int NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '0',
  `unit_price_purchase` decimal(20,2) NOT NULL DEFAULT '0.00',
  `total_price_purchase` decimal(20,2) NOT NULL DEFAULT '0.00',
  `unit_price_sale` decimal(20,2) NOT NULL DEFAULT '0.00',
  `montant_sale` decimal(20,2) NOT NULL DEFAULT '0.00',
  `ctn_price_sale` decimal(20,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ligne_commandes`
--

INSERT INTO `ligne_commandes` (`id`, `achat_id`, `product_id`, `cartons`, `quantity`, `unit_price_purchase`, `total_price_purchase`, `unit_price_sale`, `montant_sale`, `ctn_price_sale`, `created_at`, `updated_at`) VALUES
(2, 2, 23, 4424, 4424, 342000.00, 1986608000.00, 449052.44, 2388960000.00, 540000.00, '2026-02-14 00:14:13', '2026-02-23 23:03:14'),
(3, 3, 24, 2260, 2260, 197000.00, 796820000.00, 352575.22, 1017000000.00, 450000.00, '2026-02-14 00:27:47', '2026-02-21 13:40:46'),
(4, 4, 26, 700, 700, 208320.00, 234102772.38, 334432.53, 259000000.00, 370000.00, '2026-02-15 20:30:33', '2026-02-21 13:23:08'),
(5, 4, 27, 82, 82, 215000.00, 27971227.62, 341112.53, 32390000.00, 395000.00, '2026-02-15 20:30:33', '2026-02-21 13:23:08'),
(6, 5, 28, 150, 150, 398400.00, 128906341.46, 859375.61, 240000000.00, 1600000.00, '2026-02-15 21:03:44', '2026-02-21 13:26:24'),
(7, 5, 29, 120, 120, 521280.00, 117870673.17, 982255.61, 255000000.00, 2125000.00, '2026-02-15 21:03:44', '2026-02-21 13:26:24'),
(8, 5, 30, 70, 70, 336000.00, 55788292.68, 796975.61, 100240000.00, 1432000.00, '2026-02-15 21:03:44', '2026-02-21 13:26:24'),
(9, 5, 31, 70, 70, 442300.00, 63229292.68, 903275.61, 124775000.00, 1782500.00, '2026-02-15 21:03:44', '2026-02-21 13:26:24'),
(10, 6, 32, 507, 507, 689000.00, 552323000.00, 1089394.48, 659100000.00, 1300000.00, '2026-02-19 12:34:02', '2026-02-21 12:59:37'),
(11, 7, 33, 220, 220, 250000.00, 83000000.00, 377272.73, 123200000.00, 560000.00, '2026-02-19 12:48:05', '2026-02-21 13:01:04'),
(12, 8, 34, 60, 60, 915000.00, 59100000.00, 985000.00, 80400000.00, 1340000.00, '2026-02-19 13:17:13', '2026-02-21 13:02:39'),
(13, 9, 35, 200, 200, 319000.00, 79352000.00, 396760.00, 90000000.00, 450000.00, '2026-02-19 13:54:19', '2026-02-21 13:03:47'),
(14, 10, 36, 100, 100, 250000.00, 30500000.00, 305000.00, 38000000.00, 380000.00, '2026-02-19 14:06:12', '2026-02-21 13:04:22'),
(15, 11, 37, 60, 60, 1415000.00, 102280000.00, 1704666.67, 109800000.00, 1830000.00, '2026-02-19 14:30:20', '2026-02-21 13:04:49'),
(16, 12, 38, 100, 100, 147000.00, 28750000.00, 287500.00, 34000000.00, 340000.00, '2026-02-19 14:51:36', '2026-02-21 13:05:42'),
(17, 13, 39, 100, 100, 247000.00, 58548000.00, 585480.00, 62000000.00, 620000.00, '2026-02-19 21:54:13', '2026-02-21 13:06:04'),
(18, 14, 40, 100, 100, 283000.00, 51170000.00, 511700.00, 57000000.00, 570000.00, '2026-02-19 21:59:54', '2026-02-21 13:06:41'),
(19, 15, 41, 50, 50, 458000.00, 27475000.00, 549500.00, 34000000.00, 680000.00, '2026-02-19 22:24:26', '2026-02-21 13:08:09'),
(20, 16, 42, 50, 50, 540000.00, 31575000.00, 631500.00, 32500000.00, 650000.00, '2026-02-19 22:43:35', '2026-02-21 13:08:49'),
(21, 17, 43, 10, 10, 669000.00, 7605000.00, 760500.00, 9700000.00, 970000.00, '2026-02-19 23:16:58', '2026-02-21 13:17:31'),
(22, 18, 44, 6, 6, 568000.00, 3718000.00, 619666.67, 4500000.00, 750000.00, '2026-02-19 23:25:48', '2026-02-21 13:17:50'),
(23, 19, 45, 20, 20, 704000.00, 15910000.00, 795500.00, 19200000.00, 960000.00, '2026-02-19 23:32:53', '2026-02-21 13:18:18'),
(24, 20, 46, 30, 30, 283000.00, 18860000.00, 628666.67, 27600000.00, 920000.00, '2026-02-19 23:41:44', '2026-02-21 13:15:24'),
(25, 21, 47, 50, 50, 217000.00, 24573000.00, 491460.00, 34000000.00, 680000.00, '2026-02-19 23:51:21', '2026-02-21 13:20:25'),
(26, 22, 48, 30, 30, 220000.00, 9650000.00, 321666.67, 21600000.00, 720000.00, '2026-02-19 23:56:14', '2026-02-21 13:19:58'),
(27, 23, 49, 30, 30, 566000.00, 17925000.00, 597500.00, 19800000.00, 660000.00, '2026-02-20 11:00:47', '2026-02-20 22:59:50'),
(28, 24, 50, 30, 30, 433000.00, 14125000.00, 470833.33, 17400000.00, 580000.00, '2026-02-20 11:10:38', '2026-02-21 12:12:56'),
(29, 25, 51, 30, 30, 260000.00, 8290000.00, 276333.33, 11400000.00, 380000.00, '2026-02-20 11:21:31', '2026-02-21 12:14:09'),
(30, 26, 52, 20, 20, 458000.00, 9650000.00, 482500.00, 11600000.00, 580000.00, '2026-02-20 11:29:11', '2026-02-21 12:15:34'),
(31, 27, 53, 20, 20, 399000.00, 8638000.00, 431900.00, 11600000.00, 580000.00, '2026-02-20 11:33:23', '2026-02-21 12:17:06'),
(32, 28, 54, 20, 20, 499000.00, 11640000.00, 582000.00, 13600000.00, 680000.00, '2026-02-20 11:36:11', '2026-02-21 12:18:08'),
(33, 29, 55, 50, 50, 416000.00, 22975000.00, 459500.00, 29000000.00, 580000.00, '2026-02-20 11:44:48', '2026-02-21 12:19:12'),
(34, 30, 56, 15, 15, 549000.00, 8980000.00, 598666.67, 10050000.00, 670000.00, '2026-02-20 11:54:04', '2026-02-21 12:20:18'),
(35, 31, 57, 30, 30, 582000.00, 18576000.00, 619200.00, 24000000.00, 800000.00, '2026-02-20 11:58:36', '2026-02-21 12:21:00'),
(36, 32, 58, 45, 45, 233000.00, 11575000.00, 257222.22, 17100000.00, 380000.00, '2026-02-20 12:03:07', '2026-02-21 12:23:11'),
(37, 33, 59, 45, 45, 150000.00, 9210000.00, 204666.67, 12600000.00, 280000.00, '2026-02-20 12:05:52', '2026-02-21 12:23:49'),
(38, 34, 60, 15, 15, 237000.00, 4385000.00, 292333.33, 8700000.00, 580000.00, '2026-02-20 12:09:50', '2026-02-21 12:24:42'),
(39, 35, 61, 15, 15, 245000.00, 4333000.00, 288866.67, 8700000.00, 580000.00, '2026-02-20 12:12:45', '2026-02-21 12:25:13'),
(40, 36, 62, 25, 25, 306000.00, 10082000.00, 403280.00, 15750000.00, 630000.00, '2026-02-20 12:16:58', '2026-02-21 12:26:00'),
(41, 37, 63, 25, 25, 283000.00, 9507000.00, 380280.00, 15750000.00, 630000.00, '2026-02-20 12:23:59', '2026-02-21 12:26:39'),
(42, 38, 64, 30, 30, 532000.00, 18960000.00, 632000.00, 21600000.00, 720000.00, '2026-02-20 12:57:28', '2026-02-21 12:27:41'),
(43, 39, 65, 30, 30, 535000.00, 18367000.00, 612233.33, 21600000.00, 720000.00, '2026-02-20 13:02:46', '2026-02-21 12:28:28'),
(44, 40, 66, 30, 30, 956000.00, 31770000.00, 1059000.00, 42900000.00, 1430000.00, '2026-02-20 14:14:55', '2026-02-21 12:29:16'),
(45, 41, 67, 20, 20, 956000.00, 22210000.00, 1110500.00, 28600000.00, 1430000.00, '2026-02-20 14:20:07', '2026-02-21 12:32:20'),
(46, 42, 68, 20, 20, 956000.00, 20380000.00, 1019000.00, 28600000.00, 1430000.00, '2026-02-20 14:22:50', '2026-02-21 12:38:38'),
(47, 43, 69, 3838, 3838, 91430.00, 526313340.00, 137132.19, 633270000.00, 165000.00, '2026-02-20 15:15:34', '2026-02-21 12:55:50'),
(48, 44, 70, 973, 973, 91430.00, 133429390.00, 137131.95, 160545000.00, 165000.00, '2026-02-20 15:17:54', '2026-02-21 12:56:16'),
(49, 45, 71, 207, 207, 91430.00, 28386324.00, 137132.00, 34155000.00, 165000.00, '2026-02-20 15:20:47', '2026-02-21 12:56:33'),
(50, 46, 72, 207, 207, 91430.00, 28387010.00, 137135.31, 34155000.00, 165000.00, '2026-02-20 15:28:52', '2026-02-21 12:56:54'),
(53, 49, 75, 132, 132, 199491.00, 33594334.00, 254502.53, 47520000.00, 360000.00, '2026-02-21 15:03:16', '2026-02-21 15:03:16'),
(54, 50, 76, 550, 550, 142000.00, 163100000.00, 296545.45, 165000000.00, 300000.00, '2026-02-21 15:18:03', '2026-03-04 13:01:24'),
(55, 51, 77, 1235, 1235, 55500.00, 114460884.00, 92680.88, 148200000.00, 120000.00, '2026-02-21 15:39:48', '2026-02-21 15:50:13'),
(56, 52, 78, 1150, 1150, 55412.00, 106237478.00, 92380.42, 138000000.00, 120000.00, '2026-02-21 15:47:35', '2026-02-21 15:47:35'),
(57, 53, 79, 4450, 4450, 26598.00, 133149100.00, 29921.15, 222500000.00, 50000.00, '2026-02-21 15:56:59', '2026-02-21 15:56:59'),
(58, 54, 80, 100, 100, 225800.00, 43374734.00, 433747.34, 45000000.00, 450000.00, '2026-02-21 16:06:53', '2026-02-21 16:06:53'),
(59, 55, 81, 800, 800, 41000.00, 58677880.00, 73347.35, 68000000.00, 85000.00, '2026-02-21 16:11:43', '2026-02-21 16:11:43'),
(60, 56, 82, 450, 450, 81731.00, 65891565.00, 146425.70, 81000000.00, 180000.00, '2026-02-21 16:15:03', '2026-02-21 16:15:03'),
(61, 57, 83, 100, 100, 187012.00, 45503290.00, 455032.90, 48000000.00, 480000.00, '2026-02-21 16:21:56', '2026-02-21 16:21:56'),
(62, 58, 84, 58, 58, 145454.00, 10436332.00, 179936.76, 10440000.00, 180000.00, '2026-02-21 16:45:26', '2026-02-21 16:45:26'),
(63, 59, 85, 100, 100, 173000.00, 19300000.00, 193000.00, 20000000.00, 200000.00, '2026-02-21 16:50:05', '2026-02-21 16:50:05'),
(64, 60, 86, 100, 100, 56796.00, 11224862.00, 112248.62, 20000000.00, 200000.00, '2026-02-21 17:25:31', '2026-02-21 17:25:31'),
(66, 62, 88, 100, 100, 68571.00, 13326572.00, 133265.72, 25000000.00, 250000.00, '2026-02-21 17:41:16', '2026-02-21 17:41:16'),
(67, 63, 89, 100, 100, 94199.00, 24419900.00, 244199.00, 25000000.00, 250000.00, '2026-02-21 17:55:44', '2026-02-21 17:55:44'),
(68, 64, 90, 600, 600, 58181.00, 57089649.00, 95149.42, 72000000.00, 120000.00, '2026-02-21 18:01:43', '2026-02-21 18:01:43'),
(70, 66, 92, 200, 200, 119134.00, 36765745.00, 183828.73, 52000000.00, 260000.00, '2026-02-21 18:15:39', '2026-02-21 18:15:39'),
(71, 67, 93, 195, 195, 195324.00, 65121334.00, 333955.56, 72150000.00, 370000.00, '2026-02-21 18:31:48', '2026-02-21 18:31:48'),
(72, 68, 94, 215, 215, 195324.00, 71800445.00, 333955.56, 79550000.00, 370000.00, '2026-02-21 18:35:30', '2026-02-21 18:35:30'),
(73, 69, 95, 135, 135, 195324.00, 45084000.00, 333955.56, 49950000.00, 370000.00, '2026-02-21 18:38:24', '2026-02-21 18:38:24'),
(74, 70, 96, 80, 80, 195324.00, 26716444.00, 333955.55, 29600000.00, 370000.00, '2026-02-21 18:41:36', '2026-02-21 18:41:36'),
(75, 71, 97, 60, 60, 195324.00, 20037333.00, 333955.55, 22200000.00, 370000.00, '2026-02-21 18:44:02', '2026-02-21 18:44:02'),
(76, 72, 98, 36, 36, 146000.00, 6181000.00, 171694.44, 10800000.00, 300000.00, '2026-02-23 12:39:10', '2026-02-23 12:39:10'),
(77, 73, 99, 76, 76, 292813.00, 49613788.00, 652813.00, 72200000.00, 950000.00, '2026-03-02 11:12:28', '2026-03-02 11:12:28'),
(78, 74, 100, 50, 50, 178210.00, 12995460.00, 259909.20, 17500000.00, 350000.00, '2026-03-03 18:27:46', '2026-03-03 18:27:46'),
(79, 75, 101, 50, 50, 213000.00, 16035880.00, 320717.60, 20000000.00, 400000.00, '2026-03-03 18:31:49', '2026-03-03 18:31:49'),
(80, 76, 102, 20, 20, 240000.00, 7585000.00, 379250.00, 9000000.00, 450000.00, '2026-03-03 18:35:04', '2026-03-03 18:35:04');

-- --------------------------------------------------------

--
-- Structure de la table `logistics`
--

CREATE TABLE `logistics` (
  `id` bigint UNSIGNED NOT NULL,
  `numeroPurchase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeLogistic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'conteneur',
  `store_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `depense` double(20,2) NOT NULL,
  `dateEmis` date NOT NULL,
  `dateFournis` date NOT NULL,
  `filePurchase` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_21_003047_create_roles_table', 1),
(6, '2023_10_21_003109_add_role_to_users_table', 1),
(7, '2023_10_23_091044_add_data_to_users_table', 1),
(8, '2024_06_26_023634_create_settings_table', 1),
(9, '2024_07_24_062154_create_payment_settings_table', 1),
(10, '2024_07_24_101813_create_currency_settings_table', 1),
(11, '2024_07_25_113846_create_places_table', 1),
(12, '2024_07_28_075653_create_customers_table', 1),
(13, '2024_07_30_115912_create_stores_table', 1),
(14, '2024_07_31_122944_create_expense_categories_table', 1),
(15, '2024_07_31_154910_create_categories_table', 1),
(16, '2024_08_01_101449_create_products_table', 1),
(17, '2024_08_01__102528_create-add-tennants-to-categories', 1),
(18, '2024_08_06_153007_create_logistics_table', 1),
(19, '2024_08_06_153412_create_purchases_table', 1),
(20, '2024_08_09_071551_create_factures_table', 1),
(21, '2024_08_09_073416_create_sales_table', 1),
(22, '2024_08_09_184119_create_payments_table', 1),
(23, '2025_01_27_091306_create_category_products_table', 1),
(24, '2025_01_28_084252_create_temoignages_table', 1),
(25, '2025_01_28_144930_create_store_products_table', 1),
(26, '2025_01_28_144931_create_stock_transfers_table', 1),
(27, '2025_03_21_095229_create_companies_table', 1),
(28, '2025_03_21_135033_create_expenses_table', 1),
(29, '2025_06_24_183859_create_dettes_table', 1),
(30, '2025_06_24_185537_create_payment_dettes_table', 1),
(31, '2025_08_26_111025_create_journaliers_table', 1),
(32, '2025_08_31_112858_create_paiement_journaliers_table', 1),
(33, '2026_01_11_130836_add_columns_to_customers_table', 1),
(34, '2026_01_11_141511_create_transaction_factures_table', 1),
(35, '2026_01_11_155943_add_soft_deletes_to_customers_table', 1),
(36, '2026_01_11_160527_add_soft_deletes_2_to_customers_table', 1),
(37, '2026_01_20_122114_create_achats_table', 1),
(38, '2026_01_21_000001_add_receipt_number_to_payments_table', 1),
(39, '2026_01_21_000002_add_receipt_number_and_paid_by_to_transaction_factures_table', 1),
(40, '2026_01_21_000003_create_ligne_commandes_table', 1),
(41, '2026_01_21_000006_fix_product_dimensions_defaults', 1),
(42, '2026_01_22_000001_set_company_logo_default', 1),
(43, '2026_01_22_000002_add_ctns_to_store_products_table', 1),
(44, '2026_01_22_000003_create_customer_orders_table', 1),
(45, '2026_01_22_000004_create_customer_order_items_table', 1),
(46, '2026_01_24_000001_create_catalogue_customers_table', 1),
(47, '2026_01_24_000002_add_store_and_catalogue_customer_to_customer_orders_table', 1),
(48, '2026_02_11_110629_add_column_to_products_table', 2),
(49, '2026_02_11_162342_add_store_id_to_expenses_table', 3),
(50, '2026_02_12_150707_create_stock_histories_table', 3),
(51, '2026_02_20_140025_create_devis_table', 4),
(52, '2026_02_20_140035_create_devi_lines_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `paiement_journaliers`
--

CREATE TABLE `paiement_journaliers` (
  `id` bigint UNSIGNED NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `journalier_id` bigint UNSIGNED NOT NULL,
  `versement` decimal(15,2) NOT NULL,
  `paid_by` enum('cash','check','orange money') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `facture_id` bigint UNSIGNED NOT NULL,
  `receipt_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `versement` decimal(15,2) NOT NULL,
  `total_paye` decimal(15,2) NOT NULL,
  `reste` decimal(15,2) NOT NULL,
  `paid_by` enum('cash','check','orange money') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `payments`
--

INSERT INTO `payments` (`id`, `facture_id`, `receipt_number`, `versement`, `total_paye`, `reste`, `paid_by`, `note`, `created_at`, `updated_at`) VALUES
(23, 18, 'RCF2026020001', 0.00, 0.00, 597240000.00, 'cash', 'un premier versement de 0 effectué lors de l\'emission de la facture comme avance.', '2026-02-21 14:13:41', '2026-02-21 14:13:41'),
(24, 18, 'RCF2026020024', 112750000.00, 112750000.00, 484490000.00, 'cash', '1er versement', '2026-02-21 14:15:46', '2026-02-21 14:15:46'),
(25, 18, 'RCF2026020025', 25500000.00, 138250000.00, 458990000.00, 'cash', '2em versement', '2026-02-21 14:17:30', '2026-02-21 14:17:30'),
(26, 19, 'RCF2026020026', 170000000.00, 170000000.00, 427240000.00, 'cash', 'un premier versement de 170000000 effectué lors de l\'emission de la facture comme avance.', '2026-02-21 14:20:28', '2026-02-21 14:20:28'),
(27, 20, 'RCF2026020027', 300000000.00, 300000000.00, 297240000.00, 'cash', 'un premier versement de 300000000 effectué lors de l\'emission de la facture comme avance.', '2026-02-21 14:32:24', '2026-02-21 14:32:24'),
(28, 21, 'RCF2026020028', 200000000.00, 200000000.00, 391710000.00, 'cash', 'un premier versement de 200000000 effectué lors de l\'emission de la facture comme avance.', '2026-02-21 14:42:42', '2026-02-21 14:42:42'),
(29, 18, 'RCF2026020029', 47650000.00, 185900000.00, 411340000.00, 'orange money', '3em versement', '2026-02-23 15:11:07', '2026-02-23 15:11:07'),
(30, 18, 'RCF2026020030', 6000000.00, 191900000.00, 405340000.00, 'orange money', 'via orange money sur le 624166064', '2026-02-25 14:15:54', '2026-02-25 14:15:54'),
(31, 18, 'RCF2026020031', 51350000.00, 243250000.00, 353990000.00, 'cash', 'paiement cash reçu par Abdoul Aziz Camara', '2026-02-25 14:19:18', '2026-02-25 14:19:18'),
(32, 22, 'RCF2026030032', 0.00, 0.00, 366070000.00, 'cash', 'un premier versement de 0 effectué lors de l\'emission de la facture comme avance.', '2026-03-02 22:22:37', '2026-03-02 22:22:37'),
(33, 23, 'RCF2026030033', 0.00, 0.00, 337170000.00, 'cash', 'un premier versement de 0 effectué lors de l\'emission de la facture comme avance.', '2026-03-02 22:54:37', '2026-03-02 22:54:37'),
(34, 24, 'RCF2026030034', 24000000.00, 24000000.00, 18000000.00, 'orange money', 'un premier versement de 24000000 effectué lors de l\'emission de la facture comme avance.', '2026-03-04 12:52:18', '2026-03-04 12:52:18'),
(35, 24, 'RCF2026030035', 3850000.00, 27850000.00, 14150000.00, 'orange money', 'grillage lola', '2026-03-04 13:52:57', '2026-03-04 13:52:57'),
(36, 18, 'RCF2026030036', 13140000.00, 256390000.00, 340850000.00, 'orange money', 'Paiement par OM sur le 624166064', '2026-03-04 18:06:03', '2026-03-04 18:06:03'),
(37, 25, 'RCF2026030037', 0.00, 0.00, 15840000.00, 'cash', 'un premier versement de 0 effectué lors de l\'emission de la facture comme avance.', '2026-03-04 18:23:05', '2026-03-04 18:23:05'),
(38, 25, 'RCF2026030038', 15840000.00, 15840000.00, 0.00, 'cash', 'total paiement', '2026-03-04 18:27:58', '2026-03-04 18:27:58'),
(39, 26, 'RCF2026030039', 0.00, 0.00, 28600000.00, 'cash', 'un premier versement de 0 effectué lors de l\'emission de la facture comme avance.', '2026-03-04 22:03:40', '2026-03-04 22:03:40'),
(40, 19, 'RCF2026030040', 50000000.00, 220000000.00, 377240000.00, 'cash', 'Rafiou qui es aller chercher l\'argent', '2026-03-05 15:06:53', '2026-03-05 15:06:53'),
(41, 19, 'RCF2026030041', 50000000.00, 270000000.00, 327240000.00, 'orange money', 'Retrait chez Abraham il a émis un chèque', '2026-03-05 15:45:31', '2026-03-05 15:45:31'),
(42, 21, 'RCF2026030042', 50000000.00, 250000000.00, 341710000.00, 'cash', 'dépôt effectuer a la banque Siguiri', '2026-03-06 10:21:52', '2026-03-06 10:21:52');

-- --------------------------------------------------------

--
-- Structure de la table `payment_dettes`
--

CREATE TABLE `payment_dettes` (
  `id` bigint UNSIGNED NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dette_id` bigint UNSIGNED NOT NULL,
  `versement` decimal(15,2) NOT NULL,
  `paid_by` enum('cash','check','orange money') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `typeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

CREATE TABLE `places` (
  `id` bigint UNSIGNED NOT NULL,
  `placeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countryName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `places`
--

INSERT INTO `places` (`id`, `placeName`, `countryName`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Conakry', 'Guinea', 'Capitale de la Guinee', NULL, NULL),
(2, 'Labe', 'Guinea', 'Ville de la Guinee', NULL, NULL),
(3, 'Monrovia', 'Liberia', 'Capitale du Liberia', NULL, NULL),
(4, 'Kankan', 'Guinea', 'Ville de la Guinee', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cbm` float DEFAULT NULL,
  `qtityCtn` int NOT NULL DEFAULT '0',
  `price` double(20,2) NOT NULL DEFAULT '0.00',
  `price_sale` decimal(20,2) DEFAULT '0.00',
  `price_sale_ctn` decimal(20,2) DEFAULT '0.00',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ib profile.jpg',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock_initial` int DEFAULT '0',
  `stock_restant` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `libelle`, `sku`, `cbm`, `qtityCtn`, `price`, `price_sale`, `price_sale_ctn`, `image`, `description`, `created_at`, `updated_at`, `stock_initial`, `stock_restant`) VALUES
(23, 'Mastic polimax', 'Mastic polimax', NULL, 1, 342000.00, 449052.44, 540000.00, '1771028053_product_1.JPG', 'Mastic polimax', '2026-02-14 00:14:13', '2026-02-23 23:04:01', 0, 0),
(24, 'Rechaud a Gaz', 'Rechaud a Gaz', NULL, 1, 197000.00, 352575.22, 450000.00, '1771028867_product_1.jpg', 'Rechaud a Gaz', '2026-02-14 00:27:47', '2026-02-21 13:40:46', 0, 1130),
(26, '300B 16 inch polimax', '300B 16 inch polimax', NULL, 1, 208320.00, 334432.53, 370000.00, '1771187433_product_1.PNG', '300B 16 inch polimax', '2026-02-15 20:30:33', '2026-02-21 13:23:08', 0, 700),
(27, '300B 18 inch polimax', '300B 18 inch polimax', NULL, 1, 215000.00, 341112.53, 395000.00, '1771187433_product_2.PNG', '300B 18 inch polimax', '2026-02-15 20:30:33', '2026-02-21 13:23:08', 0, 82),
(28, 'LED solar 60w', 'LED solar 60w', NULL, 1, 398400.00, 859375.61, 1600000.00, '1771189424_product_1.JPG', 'LED solar 60w', '2026-02-15 21:03:44', '2026-02-21 13:26:24', 0, 150),
(29, 'LED solar 100w', 'LED solar 100w', NULL, 1, 521280.00, 982255.61, 2125000.00, '1771189424_product_2.jpg', 'LED solar 100w', '2026-02-15 21:03:44', '2026-02-21 13:26:24', 0, 120),
(30, 'LED solar 200w', 'LED solar 200w', NULL, 1, 336000.00, 796975.61, 1432000.00, '1771189424_product_3.JPG', 'LED solar 200w', '2026-02-15 21:03:44', '2026-02-21 13:26:24', 0, 70),
(31, 'LED solar 300w', 'LED solar 300w', NULL, 1, 442300.00, 903275.61, 1782500.00, '1771189424_product_4.JPG', 'LED solar 300w', '2026-02-15 21:03:44', '2026-02-21 13:26:24', 0, 70),
(32, 'colle Papier', 'colle Papier', NULL, 1, 689000.00, 1089394.48, 1300000.00, '1771504441_product_1.PNG', 'colle Papier', '2026-02-19 12:34:01', '2026-02-21 12:59:37', 0, 507),
(33, 'Bulbond', 'Bulbond', NULL, 1, 250000.00, 377272.73, 560000.00, '1771505285_product_1.PNG', 'Bulbond', '2026-02-19 12:48:05', '2026-02-21 13:01:04', 0, 220),
(34, 'Cylinder Lincy', 'Cylinder Lincy', NULL, 1, 915000.00, 985000.00, 1340000.00, '1771507033_product_1.PNG', 'Cylinder Lincy', '2026-02-19 13:17:13', '2026-02-21 13:02:39', 0, 60),
(35, 'Smecos 101 3Coup', 'Smecos 101 3Coup', NULL, 1, 319000.00, 396760.00, 450000.00, '1771509259_product_1.PNG', 'Smecos 101 3Coup', '2026-02-19 13:54:19', '2026-02-21 13:03:47', 0, 0),
(36, 'Corneille', 'Corneille', NULL, 1, 250000.00, 305000.00, 380000.00, '1771509972_product_1.PNG', 'Corneille', '2026-02-19 14:06:12', '2026-02-21 13:04:22', 0, 0),
(37, 'Wista W20700', 'Wista W20700', NULL, 1, 1415000.00, 1704666.67, 1830000.00, '1771511420_product_1.PNG', 'Wista W20700', '2026-02-19 14:30:20', '2026-02-21 13:04:49', 0, 0),
(38, 'Rouleaux peinture N4 petit', 'Rouleaux peinture N4 petit', NULL, 1, 147000.00, 287500.00, 340000.00, '1771512696_product_1.JPG', 'Rouleaux peinture N4 petit', '2026-02-19 14:51:36', '2026-02-21 13:05:42', 0, 0),
(39, 'rouleau peinture N9 grand', 'rouleau peinture N9 grand', NULL, 1, 247000.00, 585480.00, 620000.00, '1771538053_product_1.JPG', 'rouleau peinture N9 grand', '2026-02-19 21:54:13', '2026-02-21 13:06:04', 0, 0),
(40, 'Rouleaux peinture 60pcs', 'Rouleaux peinture 60pcs', NULL, 1, 283000.00, 511700.00, 570000.00, '1771538394_product_1.PNG', 'Rouleaux peinture 60pcs', '2026-02-19 21:59:54', '2026-02-21 13:06:41', 0, 0),
(41, 'Disque a couper ABC', 'Disque a couper ABC', NULL, 1, 458000.00, 549500.00, 680000.00, '1771539866_product_1.jpg', 'Disque a couper ABC', '2026-02-19 22:24:26', '2026-02-21 13:08:09', 0, 0),
(42, 'Disque a meuler', 'Disque a meuler', NULL, 1, 540000.00, 631500.00, 650000.00, '1771541015_product_1.jpg', 'Disque a meuler', '2026-02-19 22:43:35', '2026-02-21 13:08:49', 0, 0),
(43, 'Centimètres 7.5M', 'Centimètres 7.5M', NULL, 1, 669000.00, 760500.00, 970000.00, '1771543018_product_1.JPG', 'Centimètres 7.5M', '2026-02-19 23:16:58', '2026-02-21 13:17:31', 0, 0),
(44, 'Centimètres 3M', 'Centimètres 3M', NULL, 1, 568000.00, 619666.67, 750000.00, '1771543548_product_1.PNG', 'Centimètres 3M', '2026-02-19 23:25:48', '2026-02-21 13:17:50', 0, 0),
(45, 'Centimètres 5M', 'Centimètres 5M', NULL, 1, 704000.00, 795500.00, 960000.00, '1771543973_product_1.PNG', 'Centimètres 5M', '2026-02-19 23:32:53', '2026-02-21 13:18:18', 0, 0),
(46, 'Tyrolienne Bâtiment', 'Tyrolienne Bâtiment', NULL, 1, 283000.00, 628666.67, 920000.00, '1771544504_product_1.PNG', 'Tyrolienne Bâtiment', '2026-02-19 23:41:44', '2026-02-21 13:15:24', 0, 0),
(47, 'Taloche Plastique', 'Taloche Plastique', NULL, 1, 217000.00, 491460.00, 680000.00, '1771545081_product_1.PNG', 'Taloche Plastique', '2026-02-19 23:51:21', '2026-02-21 13:20:25', 0, 0),
(48, 'Palette Bois', 'Palette Bois', NULL, 1, 220000.00, 321666.67, 720000.00, '1771545374_product_1.PNG', 'Palette Bois', '2026-02-19 23:56:14', '2026-02-21 13:19:58', 0, 0),
(49, 'Vachette 45', 'Vachette 45', NULL, 1, 566000.00, 597500.00, 660000.00, '1771585247_product_1.PNG', 'Vachette 45', '2026-02-20 11:00:47', '2026-02-20 22:59:50', 0, 0),
(50, 'Vachette 55', 'Vachette 55', NULL, 1, 433000.00, 470833.33, 580000.00, '1771585838_product_4.PNG', 'Vachette 55', '2026-02-20 11:10:38', '2026-02-21 12:12:56', 0, 0),
(51, 'Vachette 65', 'Vachette 65', NULL, 1, 260000.00, 276333.33, 380000.00, '1771586491_product_5.PNG', 'Vachette 65', '2026-02-20 11:21:31', '2026-02-21 12:14:09', 0, 0),
(52, 'Vachette Blanc 50', 'Vachette Blanc 50', NULL, 1, 458000.00, 482500.00, 580000.00, '1771586951_product_6.PNG', 'Vachette Blanc 50', '2026-02-20 11:29:11', '2026-02-21 12:15:34', 0, 0),
(53, 'Vachette Blanc 63', 'Vachette Blanc 63', NULL, 1, 399000.00, 431900.00, 580000.00, '1771587203_product_7.PNG', 'Vachette Blanc 63', '2026-02-20 11:33:23', '2026-02-21 12:17:06', 0, 0),
(54, 'Vachette Blanc 75', 'Vachette Blanc 75', NULL, 1, 499000.00, 582000.00, 680000.00, '1771587371_product_8.PNG', 'Vachette Blanc 75', '2026-02-20 11:36:11', '2026-02-21 12:18:08', 0, 0),
(55, 'Soficlef 2004', 'Soficlef 2004', NULL, 1, 416000.00, 459500.00, 580000.00, '1771587888_product_9.PNG', 'Soficlef 2004', '2026-02-20 11:44:48', '2026-02-21 12:19:12', 0, 50),
(56, 'Soficlef 221-22 C', 'Soficlef 221-22 C', NULL, 1, 549000.00, 598666.67, 670000.00, '1771588444_product_10.JPG', 'Soficlef 221-22 C', '2026-02-20 11:54:04', '2026-02-21 12:20:18', 0, 0),
(57, 'Soficlef 221-32 L', 'Soficlef 221-32 L', NULL, 1, 582000.00, 619200.00, 800000.00, '1771588716_product_11.JPG', 'Soficlef 221-32 L', '2026-02-20 11:58:36', '2026-02-21 12:21:00', 0, 0),
(58, 'Pomel 110', 'Pomel 110', NULL, 1, 233000.00, 257222.22, 380000.00, '1771588987_product_12.PNG', 'Pomel 110', '2026-02-20 12:03:07', '2026-02-21 12:23:11', 0, 0),
(59, 'Pomel 140', 'Pomel 140', NULL, 1, 150000.00, 204666.67, 280000.00, '1771589152_product_13.PNG', 'Pomel 140', '2026-02-20 12:05:52', '2026-02-21 12:23:49', 0, 0),
(60, 'Poulie 1Tonne', 'Poulie 1Tonne', NULL, 1, 237000.00, 292333.33, 580000.00, '1771589390_product_14.JPG', 'Poulie 1Tonne', '2026-02-20 12:09:50', '2026-02-21 12:24:42', 0, 0),
(61, 'Poulie 2Tonne', 'Poulie 2Tonne', NULL, 1, 245000.00, 288866.67, 580000.00, '1771589565_product_15.JPG', 'Poulie 2Tonne', '2026-02-20 12:12:45', '2026-02-21 12:25:13', 0, 0),
(62, 'Marteaux Menuisier grand', 'Marteaux Menuisier grand', NULL, 1, 306000.00, 403280.00, 630000.00, '1771589818_product_16.JPG', 'Marteaux Menuisier grand', '2026-02-20 12:16:58', '2026-02-21 12:26:00', 0, 0),
(63, 'Marteaux Menuisier Petit', 'Marteaux Menuisier Petit', NULL, 1, 283000.00, 380280.00, 630000.00, '1771590239_product_1.JPG', 'Marteaux Menuisier Petit', '2026-02-20 12:23:59', '2026-02-21 12:26:39', 0, 0),
(64, 'Papier verre P60', 'Papier verre P60', NULL, 1, 532000.00, 632000.00, 720000.00, '1771592248_product_1.PNG', 'Papier verre P60', '2026-02-20 12:57:28', '2026-02-21 12:27:41', 0, 0),
(65, 'Papier verre P80', 'Papier verre P80', NULL, 1, 535000.00, 612233.33, 720000.00, '1771592566_product_1.PNG', 'Papier verre P80', '2026-02-20 13:02:46', '2026-02-21 12:28:28', 0, 0),
(66, 'Papier verre P220', 'Papier verre P220', NULL, 1, 956000.00, 1059000.00, 1430000.00, '1771596895_product_1.PNG', 'Papier verre P220', '2026-02-20 14:14:55', '2026-02-21 12:29:16', 0, 0),
(67, 'Papier verre P400', 'Papier verre P400', NULL, 1, 956000.00, 1110500.00, 1430000.00, '1771597207_product_2.PNG', 'Papier verre P400', '2026-02-20 14:20:07', '2026-02-21 12:32:20', 0, 0),
(68, 'Papier verre P600', 'Papier verre P600', NULL, 1, 956000.00, 1019000.00, 1430000.00, '1771597370_product_3.PNG', 'Papier verre P600', '2026-02-20 14:22:50', '2026-02-21 12:38:38', 0, 0),
(69, 'pointe Acier N3', 'pointe Acier N3', NULL, 1, 91430.00, 137132.19, 165000.00, '1771600534_product_1.JPG', 'pointe Acier N3', '2026-02-20 15:15:34', '2026-02-21 12:55:50', 0, 0),
(70, 'Pointe Acier N4', 'Pointe Acier N4', NULL, 1, 91430.00, 137131.95, 165000.00, '1771600674_product_5.JPG', 'Pointe Acier N4', '2026-02-20 15:17:54', '2026-02-21 12:56:16', 0, 0),
(71, 'Pointe Acier N2', 'Pointe Acier N2', NULL, 1, 91430.00, 137132.00, 165000.00, '1771600847_product_6.JPG', 'Pointe Acier N2', '2026-02-20 15:20:47', '2026-02-21 12:56:33', 0, 0),
(72, 'Pointe Acier N1', 'Pointe Acier N1', NULL, 1, 91430.00, 137135.31, 165000.00, '1771601332_product_1.JPG', 'Pointe Acier N1', '2026-02-20 15:28:52', '2026-02-21 12:56:54', 0, 0),
(75, 'Pioche 2Kg', 'Pioche 2Kg', NULL, 1, 199491.00, 254502.53, 330000.00, '1771686196_product_1.JPG', 'Pioche 2Kg', '2026-02-21 15:03:16', '2026-03-04 18:18:34', 0, 48),
(76, 'Grillage', 'Grillage', NULL, 1, 142000.00, 296545.45, 300000.00, '1771687083_product_1.PNG', 'Grillage', '2026-02-21 15:18:03', '2026-03-04 13:01:24', 0, 550),
(77, 'Fil Galva Noir 4mm', 'Fil Galva Noir 4mm', NULL, 1, 55500.00, 92680.88, 140000.00, '1771688388_product_1.PNG', 'Fil Galva Noir 4mm', '2026-02-21 15:39:48', '2026-03-02 22:37:51', 0, 835),
(78, 'Fil Galva Noir 3mm', 'Fil Galva Noir 3mm', NULL, 1, 55412.00, 92380.42, 140000.00, '1771688855_product_1.PNG', 'Fil Galva Noir 3mm', '2026-02-21 15:47:35', '2026-03-02 22:37:20', 0, 750),
(79, 'Fil attache 4Kg', 'Fil attache 4Kg', NULL, 1, 26598.00, 29921.15, 52000.00, '1771689419_product_1.JPG', 'Fil attache 4Kg', '2026-02-21 15:56:59', '2026-03-02 22:38:20', 0, 3250),
(80, 'Barbelet Lame 7kgx5', 'Barbelet Lame 7kgx5', NULL, 1, 225800.00, 433747.34, 445000.00, '1771690013_product_1.JPG', 'Barbelet Lame 7kgx5', '2026-02-21 16:06:53', '2026-03-04 21:59:13', 0, 40),
(81, 'Barbelet pointe 7kg', 'Barbelet pointe 7kg', NULL, 1, 41000.00, 73347.35, 85000.00, '1771690303_product_1.JPG', 'Barbelet pointe 7kg', '2026-02-21 16:11:43', '2026-02-21 16:11:43', 0, 0),
(82, 'Barbelet pointe 14kg', 'Barbelet pointe 14kg', NULL, 1, 81731.00, 146425.70, 180000.00, '1771690502_product_1.JPG', 'Barbelet pointe 14kg', '2026-02-21 16:15:02', '2026-02-21 16:15:02', 0, 0),
(83, 'Grillage clôture vert', 'Grillage clôture vert', NULL, 1, 187012.00, 455032.90, 480000.00, '1771690916_product_1.JPG', 'Grillage clôture vert', '2026-02-21 16:21:56', '2026-02-21 16:21:56', 0, 0),
(84, 'Grillage Anti Moustique 1m', 'Grillage Anti Moustique 1m', NULL, 1, 145454.00, 179936.76, 180000.00, '1771692326_product_1.JPG', 'Grillage Anti Moustique 1m', '2026-02-21 16:45:26', '2026-02-21 16:45:26', 0, 0),
(85, 'Grillage Anti Moustique 1m20', 'Grillage Anti Moustique 1m20', NULL, 1, 173000.00, 193000.00, 200000.00, '1771692605_product_1.JPG', 'Grillage Anti Moustique 1m20', '2026-02-21 16:50:05', '2026-02-21 16:50:05', 0, 0),
(86, 'Grillage Poulet Rond 1m', 'Grillage Poulet Rond 1m', NULL, 1, 56796.00, 112248.62, 200000.00, '1771694731_product_1.PNG', 'Grillage Poulet Rond 1m', '2026-02-21 17:25:31', '2026-02-21 17:25:31', 0, 0),
(88, 'Grillage poulet rond 1m20', 'Grillage poulet rond 1m20', NULL, 1, 68571.00, 133265.72, 250000.00, '1771695676_product_1.PNG', 'Grillage poulet rond 1m20', '2026-02-21 17:41:16', '2026-02-21 17:41:16', 0, 0),
(89, 'Grillage Carré', 'Grillage Carré', NULL, 1, 94199.00, 244199.00, 250000.00, '1771696544_product_1.JPG', 'Grillage Carré', '2026-02-21 17:55:44', '2026-02-21 17:55:44', 0, 0),
(90, 'Galva Blanc 10kg', 'Galva Blanc 10kg', NULL, 1, 58181.00, 95149.42, 120000.00, '1771696903_product_1.JPG', 'Galva Blanc 10kg', '2026-02-21 18:01:43', '2026-02-21 18:01:43', 0, 0),
(92, 'Galva Blanc 4kg', 'Galva Blanc 4kg', NULL, 1, 119134.00, 183828.73, 260000.00, '1771697739_product_1.JPG', 'Galva Blanc 4kg', '2026-02-21 18:15:39', '2026-02-21 18:15:39', 0, 0),
(93, 'pointe Ordinaire N6', 'pointe Ordinaire N6', NULL, 1, 195324.00, 333955.56, 390000.00, '1771698708_product_1.JPG', 'pointe Ordinaire N6', '2026-02-21 18:31:48', '2026-03-02 22:39:20', 0, 160),
(94, 'Pointe Ordinaire N8', 'Pointe Ordinaire N8', NULL, 1, 195324.00, 333955.56, 390000.00, '1771698930_product_1.JPG', 'Pointe Ordinaire N8', '2026-02-21 18:35:30', '2026-03-02 22:39:45', 0, 180),
(95, 'Pointe ordinaire N10', 'Pointe ordinaire N10', NULL, 1, 195324.00, 333955.56, 390000.00, '1771699104_product_1.JPG', 'Pointe ordinaire N10', '2026-02-21 18:38:24', '2026-03-02 22:40:36', 0, 100),
(96, 'Pointe Ordinaire N7', 'Pointe Ordinaire N7', NULL, 1, 195324.00, 333955.55, 390000.00, '1771699296_product_1.JPG', 'Pointe Ordinaire N7', '2026-02-21 18:41:36', '2026-03-02 22:41:07', 0, 50),
(97, 'Pointe Ordinaire N12', 'Pointe Ordinaire N12', NULL, 1, 195324.00, 333955.55, 390000.00, '1771699442_product_1.JPG', 'Pointe Ordinaire N12', '2026-02-21 18:44:02', '2026-03-02 22:41:34', 0, 30),
(98, 'Pioche 1.5kg', 'Pioche 1.5kg', NULL, 1, 146000.00, 171694.44, 300000.00, '1771850350_product_1.jpeg', 'Pioche 1.5kg', '2026-02-23 12:39:10', '2026-02-23 12:39:10', 0, 0),
(99, 'Tyrolienne ABC', 'Tyrolienne ABC', NULL, 1, 292813.00, 652813.00, 950000.00, '1772449948_product_1.PNG', 'Tyrolienne ABC', '2026-03-02 11:12:28', '2026-03-02 11:12:28', 0, 0),
(100, 'Serre-Joint 60cm', 'Serre-Joint 60cm', NULL, 1, 178210.00, 259909.20, 350000.00, '1772562466_product_1.JPG', 'Serre-Joint 60cm', '2026-03-03 18:27:46', '2026-03-03 18:27:46', 0, 0),
(101, 'Serre-Joint 80cm', 'Serre-Joint 80cm', NULL, 1, 213000.00, 320717.60, 400000.00, '1772562709_product_2.JPG', 'Serre-Joint 80cm', '2026-03-03 18:31:49', '2026-03-03 18:31:49', 0, 0),
(102, 'Serre-Joint 100cm', 'Serre-Joint 100cm', NULL, 1, 240000.00, 379250.00, 450000.00, '1772562904_product_3.JPG', 'Serre-Joint 100cm', '2026-03-03 18:35:04', '2026-03-03 18:35:04', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `store_id` bigint UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `numeroPurchase` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameRole` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `nameRole`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '2026-02-06 13:45:08', '2026-02-06 13:45:08'),
(2, 'superuser', 'Superuser', '2026-02-06 13:45:08', '2026-02-06 13:45:08'),
(3, 'shopmanager', 'Shop Manager', '2026-02-06 13:45:08', '2026-02-06 13:45:08'),
(4, 'vendeur', 'Vendeur', '2026-02-06 13:45:08', '2026-02-06 13:45:08'),
(5, 'comptable', 'Comptable', '2026-02-06 13:45:08', '2026-02-06 13:45:08');

-- --------------------------------------------------------

--
-- Structure de la table `sales`
--

CREATE TABLE `sales` (
  `id` bigint UNSIGNED NOT NULL,
  `numeroFacture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `store_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `prix` double(20,2) NOT NULL,
  `prixTotal` double(20,2) NOT NULL,
  `interet` double(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sales`
--

INSERT INTO `sales` (`id`, `numeroFacture`, `product_id`, `store_id`, `quantity`, `prix`, `prixTotal`, `interet`, `created_at`, `updated_at`) VALUES
(24, '2026020001', 23, 1, 1106, 540000.00, 597240000.00, 100588001.36, '2026-02-21 14:13:41', '2026-02-21 14:13:41'),
(25, '2026020019', 23, 1, 1106, 540000.00, 597240000.00, 100588001.36, '2026-02-21 14:20:28', '2026-02-21 14:20:28'),
(26, '2026020020', 23, 1, 1106, 540000.00, 597240000.00, 100588001.36, '2026-02-21 14:32:24', '2026-02-21 14:32:24'),
(27, '2026020021', 23, 1, 1106, 535000.00, 591710000.00, 95058001.36, '2026-02-21 14:42:42', '2026-02-21 14:42:42'),
(28, '2026030022', 76, 1, 200, 300000.00, 60000000.00, 690910.00, '2026-03-02 22:22:37', '2026-03-04 16:30:20'),
(29, '2026030022', 75, 1, 42, 335000.00, 14070000.00, 3380893.74, '2026-03-02 22:22:37', '2026-03-02 22:22:37'),
(30, '2026030022', 78, 1, 400, 130000.00, 52000000.00, 15047832.00, '2026-03-02 22:22:37', '2026-03-02 22:22:37'),
(31, '2026030022', 77, 1, 400, 130000.00, 52000000.00, 14927648.00, '2026-03-02 22:22:37', '2026-03-02 22:22:37'),
(32, '2026030022', 79, 1, 1200, 48000.00, 57600000.00, 21694620.00, '2026-03-02 22:22:37', '2026-03-02 22:22:37'),
(33, '2026030022', 80, 1, 60, 450000.00, 27000000.00, 975159.60, '2026-03-02 22:22:37', '2026-03-02 22:22:37'),
(34, '2026030022', 82, 1, 150, 180000.00, 27000000.00, 5036145.00, '2026-03-02 22:22:37', '2026-03-02 22:22:37'),
(35, '2026030022', 81, 1, 200, 85000.00, 17000000.00, 2330530.00, '2026-03-02 22:22:37', '2026-03-02 22:22:37'),
(36, '2026030022', 93, 1, 35, 360000.00, 12600000.00, 911555.40, '2026-03-02 22:22:37', '2026-03-02 22:22:37'),
(37, '2026030022', 94, 1, 35, 360000.00, 12600000.00, 911555.40, '2026-03-02 22:22:37', '2026-03-02 22:22:37'),
(38, '2026030022', 96, 1, 30, 360000.00, 10800000.00, 781333.50, '2026-03-02 22:22:37', '2026-03-02 22:22:37'),
(39, '2026030022', 95, 1, 35, 360000.00, 12600000.00, 911555.40, '2026-03-02 22:22:37', '2026-03-02 22:22:37'),
(40, '2026030022', 97, 1, 30, 360000.00, 10800000.00, 781333.50, '2026-03-02 22:22:37', '2026-03-02 22:22:37'),
(41, '2026030023', 77, 1, 435, 140000.00, 60900000.00, 20583817.20, '2026-03-02 22:54:37', '2026-03-02 22:54:37'),
(42, '2026030023', 78, 1, 350, 140000.00, 49000000.00, 16666853.00, '2026-03-02 22:54:37', '2026-03-02 22:54:37'),
(43, '2026030023', 75, 1, 42, 335000.00, 14070000.00, 3380893.74, '2026-03-02 22:54:37', '2026-03-02 22:54:37'),
(44, '2026030023', 79, 1, 1250, 52000.00, 65000000.00, 27598562.50, '2026-03-02 22:54:37', '2026-03-02 22:54:37'),
(45, '2026030023', 93, 1, 100, 390000.00, 39000000.00, 5604444.00, '2026-03-02 22:54:37', '2026-03-02 22:54:37'),
(46, '2026030023', 94, 1, 100, 390000.00, 39000000.00, 5604444.00, '2026-03-02 22:54:37', '2026-03-02 22:54:37'),
(47, '2026030023', 97, 1, 30, 390000.00, 11700000.00, 1681333.50, '2026-03-02 22:54:37', '2026-03-02 22:54:37'),
(48, '2026030023', 96, 1, 50, 390000.00, 19500000.00, 2802222.50, '2026-03-02 22:54:37', '2026-03-02 22:54:37'),
(49, '2026030023', 95, 1, 100, 390000.00, 39000000.00, 5604444.00, '2026-03-02 22:54:37', '2026-03-02 22:54:37'),
(50, '2026030024', 76, 1, 150, 280000.00, 42000000.00, -2481817.50, '2026-03-04 12:52:18', '2026-03-04 16:30:20'),
(51, '2026030025', 75, 1, 48, 330000.00, 15840000.00, 3623878.56, '2026-03-04 18:23:05', '2026-03-04 18:23:05'),
(52, '2026030026', 80, 1, 40, 445000.00, 17800000.00, 450106.40, '2026-03-04 22:03:40', '2026-03-04 22:03:40'),
(53, '2026030026', 98, 1, 36, 300000.00, 10800000.00, 4619000.16, '2026-03-04 22:03:40', '2026-03-04 22:03:40');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stock_histories`
--

CREATE TABLE `stock_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `store_id` bigint UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(20,2) NOT NULL,
  `dispo_before` double(20,2) NOT NULL DEFAULT '0.00',
  `dispo_after` double(20,2) NOT NULL DEFAULT '0.00',
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stock_histories`
--

INSERT INTO `stock_histories` (`id`, `store_id`, `type`, `amount`, `dispo_before`, `dispo_after`, `reference`, `created_at`, `updated_at`) VALUES
(1, 1, 'expense', 50000.00, 0.00, 50000.00, 'expense_1', '2026-02-13 11:35:53', '2026-02-13 11:42:17'),
(2, 1, 'purchase', 320200000.00, 50000.00, 320250000.00, 'purchase_1', '2026-02-13 14:07:54', '2026-02-13 20:55:12'),
(3, 1, 'sale', -597240000.00, 320250000.00, -276990000.00, 'sale_1', '2026-02-13 14:08:42', '2026-02-14 22:13:34'),
(4, 1, 'sale', -3300000.00, -276990000.00, -280290000.00, 'sale_2', '2026-02-13 14:12:40', '2026-02-14 22:13:34'),
(5, 1, 'purchase', -116117000.00, -280290000.00, -396407000.00, 'purchase_2', '2026-02-14 00:14:13', '2026-02-21 13:33:33'),
(6, 1, 'purchase', -75600000.00, -396407000.00, -472007000.00, 'purchase_3', '2026-02-14 00:27:47', '2026-02-21 13:40:46'),
(7, 1, 'sale', -508500000.00, -472007000.00, -980507000.00, 'sale_3', '2026-02-14 20:01:10', '2026-02-21 13:40:46'),
(8, 1, 'sale', -508500000.00, -980507000.00, -1489007000.00, 'sale_4', '2026-02-14 20:05:05', '2026-02-21 13:40:46'),
(9, 1, 'sale', -72000000.00, -1489007000.00, -1561007000.00, 'sale_5', '2026-02-14 20:10:19', '2026-02-21 13:40:46'),
(10, 1, 'sale', -508500000.00, -1561007000.00, -2069507000.00, 'sale_6', '2026-02-14 22:04:29', '2026-02-21 13:40:46'),
(11, 1, 'sale', -597240000.00, -2069507000.00, -2666747000.00, 'sale_7', '2026-02-14 22:18:00', '2026-02-21 13:40:46'),
(12, 1, 'sale', -44000000.00, -2666747000.00, -2710747000.00, 'sale_8', '2026-02-15 11:20:18', '2026-02-21 13:40:46'),
(13, 1, 'sale', -36400000.00, -2710747000.00, -2747147000.00, 'sale_9', '2026-02-15 11:20:18', '2026-02-21 13:40:46'),
(14, 1, 'purchase', 134176000.00, -2747147000.00, -2612971000.00, 'purchase_4', '2026-02-15 20:30:33', '2026-02-21 13:40:46'),
(15, 1, 'purchase', 713705400.01, -2612971000.00, -1899265599.99, 'purchase_5', '2026-02-15 21:03:44', '2026-02-21 13:40:46'),
(16, 1, 'sale', -259000000.00, -1899265599.99, -2158265599.99, 'sale_10', '2026-02-16 00:06:11', '2026-02-21 13:40:46'),
(17, 1, 'sale', -32390000.00, -2158265599.99, -2190655599.99, 'sale_11', '2026-02-16 00:06:11', '2026-02-21 13:40:46'),
(18, 1, 'sale', -240000000.00, -2190655599.99, -2430655599.99, 'sale_12', '2026-02-16 00:06:11', '2026-02-21 13:40:46'),
(19, 1, 'sale', -255000000.00, -2430655599.99, -2685655599.99, 'sale_13', '2026-02-16 00:06:11', '2026-02-21 13:40:46'),
(20, 1, 'sale', -100275000.00, -2685655599.99, -2785930599.99, 'sale_14', '2026-02-16 00:06:11', '2026-02-21 13:40:46'),
(21, 1, 'sale', -124775000.00, -2785930599.99, -2910705599.99, 'sale_15', '2026-02-16 00:06:11', '2026-02-21 13:40:46'),
(22, 1, 'sale', -591710000.00, -2910705599.99, -3502415599.99, 'sale_16', '2026-02-17 00:33:11', '2026-02-21 13:40:46'),
(23, 1, 'sale', -597240000.00, -3502415599.99, -4099655599.99, 'sale_17', '2026-02-17 00:44:28', '2026-02-21 13:40:46'),
(24, 1, 'sale', -597240000.00, -4099655599.99, -4696895599.99, 'sale_18', '2026-02-17 19:57:57', '2026-02-21 13:40:46'),
(25, 1, 'purchase', 309777000.00, -4696895599.99, -4387118599.99, 'purchase_6', '2026-02-19 12:34:01', '2026-02-21 13:40:46'),
(26, 1, 'purchase', 68200000.00, -4387118599.99, -4318918599.99, 'purchase_7', '2026-02-19 12:48:05', '2026-02-21 13:40:46'),
(27, 1, 'purchase', 26100000.00, -4318918599.99, -4292818599.99, 'purchase_8', '2026-02-19 13:17:13', '2026-02-21 13:40:46'),
(28, 1, 'purchase', 26200000.00, -4292818599.99, -4266618599.99, 'purchase_9', '2026-02-19 13:54:19', '2026-02-21 13:40:46'),
(29, 1, 'purchase', 13000000.00, -4266618599.99, -4253618599.99, 'purchase_10', '2026-02-19 14:06:12', '2026-02-21 13:40:46'),
(30, 1, 'purchase', 26100000.00, -4253618599.99, -4227518599.99, 'purchase_11', '2026-02-19 14:30:20', '2026-02-21 13:40:46'),
(31, 1, 'purchase', 19300000.00, -4227518599.99, -4208218599.99, 'purchase_12', '2026-02-19 14:51:36', '2026-02-21 13:40:46'),
(32, 1, 'purchase', 38300000.00, -4208218599.99, -4169918599.99, 'purchase_13', '2026-02-19 21:54:13', '2026-02-21 13:40:46'),
(33, 1, 'purchase', 29700000.00, -4169918599.99, -4140218599.99, 'purchase_14', '2026-02-19 21:59:54', '2026-02-21 13:40:46'),
(34, 1, 'purchase', 11100000.00, -4140218599.99, -4129118599.99, 'purchase_15', '2026-02-19 22:24:26', '2026-02-21 13:40:46'),
(35, 1, 'purchase', 5250000.00, -4129118599.99, -4123868599.99, 'purchase_16', '2026-02-19 22:43:35', '2026-02-21 13:40:46'),
(36, 1, 'purchase', 3110000.00, -4123868599.99, -4120758599.99, 'purchase_17', '2026-02-19 23:16:58', '2026-02-21 13:40:46'),
(37, 1, 'purchase', 1272000.00, -4120758599.99, -4119486599.99, 'purchase_18', '2026-02-19 23:25:48', '2026-02-21 13:40:46'),
(38, 1, 'purchase', 5120000.00, -4119486599.99, -4114366599.99, 'purchase_19', '2026-02-19 23:32:53', '2026-02-21 13:40:46'),
(39, 1, 'purchase', 19110000.00, -4114366599.99, -4095256599.99, 'purchase_20', '2026-02-19 23:41:44', '2026-02-21 13:40:46'),
(40, 1, 'purchase', 22650000.00, -4095256599.99, -4072606599.99, 'purchase_21', '2026-02-19 23:51:21', '2026-02-21 13:40:46'),
(41, 1, 'purchase', 15000000.00, -4072606599.99, -4057606599.99, 'purchase_22', '2026-02-19 23:56:14', '2026-02-21 13:40:46'),
(42, 1, 'purchase', 3120000.00, -4057606599.99, -4054486599.99, 'purchase_23', '2026-02-20 11:00:47', '2026-02-21 13:40:46'),
(43, 1, 'purchase', 4110000.00, -4054486599.99, -4050376599.99, 'purchase_24', '2026-02-20 11:10:38', '2026-02-21 13:40:46'),
(44, 1, 'purchase', 3600000.00, -4050376599.99, -4046776599.99, 'purchase_25', '2026-02-20 11:21:31', '2026-02-21 13:40:46'),
(45, 1, 'purchase', 2440000.00, -4046776599.99, -4044336599.99, 'purchase_26', '2026-02-20 11:29:11', '2026-02-21 13:40:46'),
(46, 1, 'purchase', 3620000.00, -4044336599.99, -4040716599.99, 'purchase_27', '2026-02-20 11:33:23', '2026-02-21 13:40:46'),
(47, 1, 'purchase', 3420000.00, -4040716599.99, -4037296599.99, 'purchase_28', '2026-02-20 11:36:11', '2026-02-21 13:40:46'),
(48, 1, 'purchase', 8200000.00, -4037296599.99, -4029096599.99, 'purchase_29', '2026-02-20 11:44:48', '2026-02-21 13:40:46'),
(49, 1, 'purchase', 1965000.00, -4029096599.99, -4027131599.99, 'purchase_30', '2026-02-20 11:54:04', '2026-02-21 13:40:46'),
(50, 1, 'purchase', 6540000.00, -4027131599.99, -4020591599.99, 'purchase_31', '2026-02-20 11:58:36', '2026-02-21 13:40:46'),
(51, 1, 'purchase', 6615000.00, -4020591599.99, -4013976599.99, 'purchase_32', '2026-02-20 12:03:07', '2026-02-21 13:40:46'),
(52, 1, 'purchase', 10575000.00, -4013976599.99, -4003401599.99, 'purchase_33', '2026-02-20 12:05:52', '2026-02-21 13:40:46'),
(53, 1, 'purchase', 5220000.00, -4003401599.99, -3998181599.99, 'purchase_34', '2026-02-20 12:09:50', '2026-02-21 13:40:46'),
(54, 1, 'purchase', 5025000.00, -3998181599.99, -3993156599.99, 'purchase_35', '2026-02-20 12:12:45', '2026-02-21 13:40:46'),
(55, 1, 'purchase', 8350000.00, -3993156599.99, -3984806599.99, 'purchase_36', '2026-02-20 12:16:58', '2026-02-21 13:40:46'),
(56, 1, 'purchase', 8800000.00, -3984806599.99, -3976006599.99, 'purchase_37', '2026-02-20 12:23:59', '2026-02-21 13:40:46'),
(57, 1, 'purchase', 5940000.00, -3976006599.99, -3970066599.99, 'purchase_38', '2026-02-20 12:57:28', '2026-02-21 13:40:46'),
(58, 1, 'purchase', 5850000.00, -3970066599.99, -3964216599.99, 'purchase_39', '2026-02-20 13:02:46', '2026-02-21 13:40:46'),
(59, 1, 'purchase', 14520000.00, -3964216599.99, -3949696599.99, 'purchase_40', '2026-02-20 14:14:55', '2026-02-21 13:40:46'),
(60, 1, 'purchase', 9680000.00, -3949696599.99, -3940016599.99, 'purchase_41', '2026-02-20 14:20:07', '2026-02-21 13:40:46'),
(61, 1, 'purchase', -8000000.00, -3940016599.99, -3948016599.99, 'purchase_42', '2026-02-20 14:22:50', '2026-02-21 13:40:46'),
(62, 1, 'purchase', 301551660.00, -3948016599.99, -3646464939.99, 'purchase_43', '2026-02-20 15:15:34', '2026-02-21 13:40:46'),
(63, 1, 'purchase', 44467997.35, -3646464939.99, -3601996942.64, 'purchase_44', '2026-02-20 15:17:54', '2026-02-21 13:40:46'),
(64, 1, 'purchase', 16263990.00, -3601996942.64, -3585732952.64, 'purchase_45', '2026-02-20 15:20:47', '2026-02-21 13:40:46'),
(65, 1, 'purchase', 16263990.00, -3585732952.64, -3569468962.64, 'purchase_46', '2026-02-20 15:28:52', '2026-02-21 13:40:46'),
(67, 1, 'purchase', 6833333.33, -3569468962.64, -3562635629.31, 'purchase_48', '2026-02-20 21:39:30', '2026-02-21 13:40:46'),
(68, 1, 'sale', -597240000.00, -3562635629.31, -4159875629.31, 'sale_19', '2026-02-21 05:21:44', '2026-02-21 13:40:46'),
(69, 1, 'sale', -540000.00, -4159875629.31, -4160415629.31, 'sale_20', '2026-02-21 13:43:55', '2026-02-21 13:45:41'),
(70, 1, 'sale', -597240000.00, -4160415629.31, -4757655629.31, 'sale_21', '2026-02-21 13:46:52', '2026-02-21 14:13:09'),
(71, 1, 'sale', -54000000.00, -4757655629.31, -4811655629.31, 'sale_22', '2026-02-21 13:58:14', '2026-02-21 14:13:09'),
(72, 1, 'sale', -54000000.00, -4811655629.31, -4865655629.31, 'sale_23', '2026-02-21 14:00:46', '2026-02-21 14:13:09'),
(73, 1, 'sale', 597240000.00, -4865655629.31, -4268415629.31, 'sale_24', '2026-02-21 14:13:41', '2026-02-21 14:13:41'),
(74, 1, 'sale', 597240000.00, -4268415629.31, -3671175629.31, 'sale_25', '2026-02-21 14:20:28', '2026-02-21 14:20:28'),
(75, 1, 'sale', 597240000.00, -3671175629.31, -3073935629.31, 'sale_26', '2026-02-21 14:32:24', '2026-02-21 14:32:24'),
(76, 1, 'sale', 591710000.00, -3073935629.31, -2482225629.31, 'sale_27', '2026-02-21 14:42:42', '2026-02-21 14:42:42'),
(77, 1, 'purchase', -33594334.00, -2482225629.31, -2515819963.31, 'purchase_49', '2026-02-21 15:03:16', '2026-02-21 15:03:16'),
(78, 1, 'purchase', -10000000.00, -2515819963.31, -2525819963.31, 'purchase_50', '2026-02-21 15:18:03', '2026-03-04 13:01:24'),
(79, 1, 'purchase', -114460884.00, -2525819963.31, -2640280847.31, 'purchase_51', '2026-02-21 15:39:48', '2026-03-04 13:01:24'),
(80, 1, 'purchase', -106237478.00, -2640280847.31, -2746518325.31, 'purchase_52', '2026-02-21 15:47:35', '2026-03-04 13:01:24'),
(81, 1, 'purchase', -133149100.00, -2746518325.31, -2879667425.31, 'purchase_53', '2026-02-21 15:56:59', '2026-03-04 13:01:24'),
(82, 1, 'purchase', -43374734.00, -2879667425.31, -2923042159.31, 'purchase_54', '2026-02-21 16:06:53', '2026-03-04 13:01:24'),
(83, 1, 'purchase', -58677880.00, -2923042159.31, -2981720039.31, 'purchase_55', '2026-02-21 16:11:43', '2026-03-04 13:01:24'),
(84, 1, 'purchase', -65891565.00, -2981720039.31, -3047611604.31, 'purchase_56', '2026-02-21 16:15:02', '2026-03-04 13:01:24'),
(85, 1, 'purchase', -45503290.00, -3047611604.31, -3093114894.31, 'purchase_57', '2026-02-21 16:21:56', '2026-03-04 13:01:24'),
(86, 1, 'purchase', -10436332.00, -3093114894.31, -3103551226.31, 'purchase_58', '2026-02-21 16:45:26', '2026-03-04 13:01:24'),
(87, 1, 'purchase', -19300000.00, -3103551226.31, -3122851226.31, 'purchase_59', '2026-02-21 16:50:05', '2026-03-04 13:01:24'),
(88, 1, 'purchase', -11224862.00, -3122851226.31, -3134076088.31, 'purchase_60', '2026-02-21 17:25:31', '2026-03-04 13:01:24'),
(89, 1, 'purchase', 13326572.00, -3134076088.31, -3120749516.31, 'purchase_61', '2026-02-21 17:32:18', '2026-03-04 13:01:24'),
(90, 1, 'purchase', -13326572.00, -3120749516.31, -3134076088.31, 'purchase_62', '2026-02-21 17:41:16', '2026-03-04 13:01:24'),
(91, 1, 'purchase', -24419900.00, -3134076088.31, -3158495988.31, 'purchase_63', '2026-02-21 17:55:44', '2026-03-04 13:01:24'),
(92, 1, 'purchase', -57089649.00, -3158495988.31, -3215585637.31, 'purchase_64', '2026-02-21 18:01:43', '2026-03-04 13:01:24'),
(93, 1, 'purchase', 36765745.00, -3215585637.31, -3178819892.31, 'purchase_65', '2026-02-21 18:05:07', '2026-03-04 13:01:24'),
(94, 1, 'purchase', -36765745.00, -3178819892.31, -3215585637.31, 'purchase_66', '2026-02-21 18:15:39', '2026-03-04 13:01:24'),
(95, 1, 'purchase', -65121334.00, -3215585637.31, -3280706971.31, 'purchase_67', '2026-02-21 18:31:48', '2026-03-04 13:01:24'),
(96, 1, 'purchase', -71800445.00, -3280706971.31, -3352507416.31, 'purchase_68', '2026-02-21 18:35:30', '2026-03-04 13:01:24'),
(97, 1, 'purchase', -45084000.00, -3352507416.31, -3397591416.31, 'purchase_69', '2026-02-21 18:38:24', '2026-03-04 13:01:24'),
(98, 1, 'purchase', -26716444.00, -3397591416.31, -3424307860.31, 'purchase_70', '2026-02-21 18:41:36', '2026-03-04 13:01:24'),
(99, 1, 'purchase', -20037333.00, -3424307860.31, -3444345193.31, 'purchase_71', '2026-02-21 18:44:02', '2026-03-04 13:01:24'),
(100, 1, 'purchase', -6181000.00, -3444345193.31, -3450526193.31, 'purchase_72', '2026-02-23 12:39:10', '2026-03-04 13:01:24'),
(101, 1, 'purchase', -49613788.00, -3450526193.31, -3500139981.31, 'purchase_73', '2026-03-02 11:12:28', '2026-03-04 13:01:24'),
(102, 1, 'sale', 60000000.00, -3500139981.31, -3440139981.31, 'sale_28', '2026-03-02 22:22:37', '2026-03-04 13:01:24'),
(103, 1, 'sale', 14070000.00, -3440139981.31, -3426069981.31, 'sale_29', '2026-03-02 22:22:37', '2026-03-04 13:01:24'),
(104, 1, 'sale', 52000000.00, -3426069981.31, -3374069981.31, 'sale_30', '2026-03-02 22:22:37', '2026-03-04 13:01:24'),
(105, 1, 'sale', 52000000.00, -3374069981.31, -3322069981.31, 'sale_31', '2026-03-02 22:22:37', '2026-03-04 13:01:24'),
(106, 1, 'sale', 57600000.00, -3322069981.31, -3264469981.31, 'sale_32', '2026-03-02 22:22:37', '2026-03-04 13:01:24'),
(107, 1, 'sale', 27000000.00, -3264469981.31, -3237469981.31, 'sale_33', '2026-03-02 22:22:37', '2026-03-04 13:01:24'),
(108, 1, 'sale', 27000000.00, -3237469981.31, -3210469981.31, 'sale_34', '2026-03-02 22:22:37', '2026-03-04 13:01:24'),
(109, 1, 'sale', 17000000.00, -3210469981.31, -3193469981.31, 'sale_35', '2026-03-02 22:22:37', '2026-03-04 13:01:24'),
(110, 1, 'sale', 12600000.00, -3193469981.31, -3180869981.31, 'sale_36', '2026-03-02 22:22:37', '2026-03-04 13:01:24'),
(111, 1, 'sale', 12600000.00, -3180869981.31, -3168269981.31, 'sale_37', '2026-03-02 22:22:37', '2026-03-04 13:01:24'),
(112, 1, 'sale', 10800000.00, -3168269981.31, -3157469981.31, 'sale_38', '2026-03-02 22:22:37', '2026-03-04 13:01:24'),
(113, 1, 'sale', 12600000.00, -3157469981.31, -3144869981.31, 'sale_39', '2026-03-02 22:22:37', '2026-03-04 13:01:24'),
(114, 1, 'sale', 10800000.00, -3144869981.31, -3134069981.31, 'sale_40', '2026-03-02 22:22:37', '2026-03-04 13:01:24'),
(115, 1, 'sale', 60900000.00, -3134069981.31, -3073169981.31, 'sale_41', '2026-03-02 22:54:37', '2026-03-04 13:01:24'),
(116, 1, 'sale', 49000000.00, -3073169981.31, -3024169981.31, 'sale_42', '2026-03-02 22:54:37', '2026-03-04 13:01:24'),
(117, 1, 'sale', 14070000.00, -3024169981.31, -3010099981.31, 'sale_43', '2026-03-02 22:54:37', '2026-03-04 13:01:24'),
(118, 1, 'sale', 65000000.00, -3010099981.31, -2945099981.31, 'sale_44', '2026-03-02 22:54:37', '2026-03-04 13:01:24'),
(119, 1, 'sale', 39000000.00, -2945099981.31, -2906099981.31, 'sale_45', '2026-03-02 22:54:37', '2026-03-04 13:01:24'),
(120, 1, 'sale', 39000000.00, -2906099981.31, -2867099981.31, 'sale_46', '2026-03-02 22:54:37', '2026-03-04 13:01:24'),
(121, 1, 'sale', 11700000.00, -2867099981.31, -2855399981.31, 'sale_47', '2026-03-02 22:54:37', '2026-03-04 13:01:24'),
(122, 1, 'sale', 19500000.00, -2855399981.31, -2835899981.31, 'sale_48', '2026-03-02 22:54:37', '2026-03-04 13:01:24'),
(123, 1, 'sale', 39000000.00, -2835899981.31, -2796899981.31, 'sale_49', '2026-03-02 22:54:37', '2026-03-04 13:01:24'),
(124, 1, 'purchase', -12995460.00, -2796899981.31, -2809895441.31, 'purchase_74', '2026-03-03 18:27:46', '2026-03-04 13:01:24'),
(125, 1, 'purchase', -16035880.00, -2809895441.31, -2825931321.31, 'purchase_75', '2026-03-03 18:31:49', '2026-03-04 13:01:24'),
(126, 1, 'purchase', -7585000.00, -2825931321.31, -2833516321.31, 'purchase_76', '2026-03-03 18:35:04', '2026-03-04 13:01:24'),
(127, 1, 'sale', 42000000.00, -2833516321.31, -2791516321.31, 'sale_50', '2026-03-04 12:52:18', '2026-03-04 13:01:24'),
(128, 1, 'sale', 15840000.00, -2791516321.31, -2775676321.31, 'sale_51', '2026-03-04 18:23:05', '2026-03-04 18:23:05'),
(129, 1, 'sale', 17800000.00, -2775676321.31, -2757876321.31, 'sale_52', '2026-03-04 22:03:40', '2026-03-04 22:03:40'),
(130, 1, 'sale', 10800000.00, -2757876321.31, -2747076321.31, 'sale_53', '2026-03-04 22:03:40', '2026-03-04 22:03:40');

-- --------------------------------------------------------

--
-- Structure de la table `stock_transfers`
--

CREATE TABLE `stock_transfers` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `from_store_id` bigint UNSIGNED NOT NULL,
  `to_store_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stores`
--

CREATE TABLE `stores` (
  `id` bigint UNSIGNED NOT NULL,
  `store_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `store_picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stores`
--

INSERT INTO `stores` (`id`, `store_name`, `place_id`, `user_id`, `store_picture`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Magasin Central Madina', 1, 11, '1771191936.jpg', 1, 'Boutique principale.', NULL, '2026-02-15 21:45:36'),
(9, 'Madina', 1, 15, '1771865439.jpeg', 1, 'Polimax', '2026-02-23 16:50:39', '2026-02-23 16:50:39');

-- --------------------------------------------------------

--
-- Structure de la table `store_products`
--

CREATE TABLE `store_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `store_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `ctns` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `store_products`
--

INSERT INTO `store_products` (`id`, `product_id`, `store_id`, `quantity`, `ctns`, `created_at`, `updated_at`) VALUES
(1, 23, 1, 0, 4424, '2026-02-14 00:14:13', '2026-02-23 23:03:14'),
(2, 24, 1, 2260, 2260, '2026-02-14 00:27:47', '2026-02-21 13:40:46'),
(4, 26, 1, 700, 700, '2026-02-15 20:30:33', '2026-02-21 13:23:08'),
(5, 27, 1, 82, 82, '2026-02-15 20:30:33', '2026-02-21 13:23:08'),
(6, 28, 1, 150, 150, '2026-02-15 21:03:44', '2026-02-21 13:26:24'),
(7, 29, 1, 120, 120, '2026-02-15 21:03:44', '2026-02-21 13:26:24'),
(8, 30, 1, 70, 70, '2026-02-15 21:03:44', '2026-02-21 13:26:24'),
(9, 31, 1, 70, 70, '2026-02-15 21:03:44', '2026-02-21 13:26:24'),
(10, 32, 1, 507, 507, '2026-02-19 12:34:02', '2026-02-21 12:59:37'),
(11, 33, 1, 220, 220, '2026-02-19 12:48:05', '2026-02-21 13:01:04'),
(12, 34, 1, 60, 60, '2026-02-19 13:17:13', '2026-02-21 13:02:39'),
(13, 35, 1, 200, 200, '2026-02-19 13:54:19', '2026-02-21 13:03:47'),
(14, 36, 1, 100, 100, '2026-02-19 14:06:12', '2026-02-21 13:04:22'),
(15, 37, 1, 60, 60, '2026-02-19 14:30:20', '2026-02-21 13:04:49'),
(16, 38, 1, 100, 100, '2026-02-19 14:51:36', '2026-02-21 13:05:42'),
(17, 39, 1, 100, 100, '2026-02-19 21:54:13', '2026-02-21 13:06:04'),
(18, 40, 1, 100, 100, '2026-02-19 21:59:54', '2026-02-21 13:06:41'),
(19, 41, 1, 50, 50, '2026-02-19 22:24:26', '2026-02-21 13:08:09'),
(20, 42, 1, 50, 50, '2026-02-19 22:43:35', '2026-02-21 13:08:49'),
(21, 43, 1, 10, 10, '2026-02-19 23:16:58', '2026-02-21 13:17:31'),
(22, 44, 1, 6, 6, '2026-02-19 23:25:48', '2026-02-21 13:17:50'),
(23, 45, 1, 20, 20, '2026-02-19 23:32:53', '2026-02-21 13:18:18'),
(24, 46, 1, 30, 30, '2026-02-19 23:41:44', '2026-02-21 13:15:24'),
(25, 47, 1, 50, 50, '2026-02-19 23:51:21', '2026-02-21 13:20:25'),
(26, 48, 1, 30, 30, '2026-02-19 23:56:14', '2026-02-21 13:19:58'),
(27, 49, 1, 30, 30, '2026-02-20 11:00:47', '2026-02-20 22:59:50'),
(28, 50, 1, 30, 30, '2026-02-20 11:10:38', '2026-02-21 12:12:56'),
(29, 51, 1, 30, 30, '2026-02-20 11:21:31', '2026-02-21 12:14:09'),
(30, 52, 1, 20, 20, '2026-02-20 11:29:11', '2026-02-21 12:15:34'),
(31, 53, 1, 20, 20, '2026-02-20 11:33:23', '2026-02-21 12:17:06'),
(32, 54, 1, 20, 20, '2026-02-20 11:36:11', '2026-02-21 12:18:08'),
(33, 55, 1, 50, 50, '2026-02-20 11:44:48', '2026-02-21 12:19:12'),
(34, 56, 1, 15, 15, '2026-02-20 11:54:04', '2026-02-21 12:20:18'),
(35, 57, 1, 30, 30, '2026-02-20 11:58:36', '2026-02-21 12:21:00'),
(36, 58, 1, 45, 45, '2026-02-20 12:03:07', '2026-02-21 12:23:11'),
(37, 59, 1, 45, 45, '2026-02-20 12:05:52', '2026-02-21 12:23:48'),
(38, 60, 1, 15, 15, '2026-02-20 12:09:50', '2026-02-21 12:24:42'),
(39, 61, 1, 15, 15, '2026-02-20 12:12:45', '2026-02-21 12:25:13'),
(40, 62, 1, 25, 25, '2026-02-20 12:16:58', '2026-02-21 12:26:00'),
(41, 63, 1, 25, 25, '2026-02-20 12:23:59', '2026-02-21 12:26:39'),
(42, 64, 1, 30, 30, '2026-02-20 12:57:28', '2026-02-21 12:27:41'),
(43, 65, 1, 30, 30, '2026-02-20 13:02:46', '2026-02-21 12:28:28'),
(44, 66, 1, 30, 30, '2026-02-20 14:14:55', '2026-02-21 12:29:16'),
(45, 67, 1, 20, 20, '2026-02-20 14:20:07', '2026-02-21 12:32:20'),
(46, 68, 1, 20, 20, '2026-02-20 14:22:50', '2026-02-21 12:38:38'),
(47, 69, 1, 3838, 3838, '2026-02-20 15:15:34', '2026-02-21 12:55:50'),
(48, 70, 1, 973, 973, '2026-02-20 15:17:54', '2026-02-21 12:56:16'),
(49, 71, 1, 207, 207, '2026-02-20 15:20:47', '2026-02-21 12:56:33'),
(50, 72, 1, 207, 207, '2026-02-20 15:28:52', '2026-02-21 12:56:54'),
(53, 75, 1, 0, 132, '2026-02-21 15:03:16', '2026-02-21 15:03:16'),
(54, 76, 1, 200, 550, '2026-02-21 15:18:03', '2026-03-04 13:01:24'),
(55, 77, 1, 400, 1235, '2026-02-21 15:39:48', '2026-02-21 15:50:13'),
(56, 78, 1, 400, 1150, '2026-02-21 15:47:35', '2026-02-21 15:47:35'),
(57, 79, 1, 2000, 4450, '2026-02-21 15:56:59', '2026-02-21 15:56:59'),
(58, 80, 1, 0, 100, '2026-02-21 16:06:53', '2026-02-21 16:06:53'),
(59, 81, 1, 600, 800, '2026-02-21 16:11:43', '2026-02-21 16:11:43'),
(60, 82, 1, 300, 450, '2026-02-21 16:15:03', '2026-02-21 16:15:03'),
(61, 83, 1, 100, 100, '2026-02-21 16:21:56', '2026-02-21 16:21:56'),
(62, 84, 1, 58, 58, '2026-02-21 16:45:26', '2026-02-21 16:45:26'),
(63, 85, 1, 100, 100, '2026-02-21 16:50:05', '2026-02-21 16:50:05'),
(64, 86, 1, 100, 100, '2026-02-21 17:25:31', '2026-02-21 17:25:31'),
(66, 88, 1, 100, 100, '2026-02-21 17:41:16', '2026-02-21 17:41:16'),
(67, 89, 1, 100, 100, '2026-02-21 17:55:44', '2026-02-21 17:55:44'),
(68, 90, 1, 600, 600, '2026-02-21 18:01:43', '2026-02-21 18:01:43'),
(70, 92, 1, 200, 200, '2026-02-21 18:15:39', '2026-02-21 18:15:39'),
(71, 93, 1, 60, 195, '2026-02-21 18:31:48', '2026-02-21 18:31:48'),
(72, 94, 1, 80, 215, '2026-02-21 18:35:30', '2026-02-21 18:35:30'),
(73, 95, 1, 0, 135, '2026-02-21 18:38:24', '2026-02-21 18:38:24'),
(74, 96, 1, 0, 80, '2026-02-21 18:41:36', '2026-02-21 18:41:36'),
(75, 97, 1, 0, 60, '2026-02-21 18:44:02', '2026-02-21 18:44:02'),
(76, 98, 1, 0, 36, '2026-02-23 12:39:10', '2026-02-23 12:39:10'),
(77, 99, 1, 76, 76, '2026-03-02 11:12:28', '2026-03-02 11:12:28'),
(78, 100, 1, 50, 50, '2026-03-03 18:27:46', '2026-03-03 18:27:46'),
(79, 101, 1, 50, 50, '2026-03-03 18:31:49', '2026-03-03 18:31:49'),
(80, 102, 1, 20, 20, '2026-03-03 18:35:04', '2026-03-03 18:35:04');

-- --------------------------------------------------------

--
-- Structure de la table `temoignages`
--

CREATE TABLE `temoignages` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `transaction_factures`
--

CREATE TABLE `transaction_factures` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `receipt_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `versement` double(15,2) NOT NULL,
  `balance` double(15,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motdepasse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profilePic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `store_id` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `motdepasse`, `status`, `token`, `profilePic`, `phone`, `created_at`, `updated_at`, `role_id`, `store_id`, `description`) VALUES
(1, 'Administrator', 'admin', 'info@ibratechengineer.com', '$2y$10$.FbjnGEz/fOCHkuXdjrhiuR2WPyTGXIlbKL/HINPw6WCKWua3PEaq', 'EdaagPOS@', 'Active', '920829f9f4dcc46abab7bb33608affa49d75a74dbb9854d9403dfa13a5684025', NULL, '19511319802', NULL, NULL, 1, NULL, 'Le manager principale du site, il est chargé de la gestion complète et mis à jour du site'),
(2, 'GENERAL MANAGER', 'CEO', 'edaagtrading0@gmail.com', '$2y$10$D4QsqEhKXtQ5seAaj2wRSeFsUPvzm7XptJOFE0zlseTJ8Ysezikzm', 'Polimax2026@', 'Active', '920829f9f4dcc46abab7bb33608affa49d75a74dbb9854d9403dfa13a5684025', '1771029486.jpg', '624166064', NULL, '2026-02-23 14:21:10', 2, NULL, 'Le manager général de la plateforme. Il a la main mise sur toutes les entités. Il supervise les faits et gestes des employés'),
(11, 'Abdou aziz', 'Abdoul aziz camara', 'abdoulazizedaagtrading@gmail.com', '$2y$10$tgf.zJX7odCmKBTGSB9OlOKfXAtwZrrhqY2bqr7MSSsH2zhEPlL7m', 'Azizedaag123@', 'Active', '', '1725478994.png', '627795781', '2026-02-13 15:04:23', '2026-02-14 00:06:11', 3, NULL, 'Confidentiel'),
(15, 'Abdoul Gadirou Diallo', 'Abdoul Gadirou', 'abdoulgadirouedaagtrading@gmail.com', '$2y$10$ufCZ3PjrXa0zg0Mrik0SEuFeox9ridkry4Ei3mYRgG7WNUVs1bjw6', 'Layli2026@', 'Active', '', '1725478994.png', '623523654', '2026-02-23 16:46:18', '2026-02-23 16:52:56', 3, NULL, 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achats`
--
ALTER TABLE `achats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `achats_identifier_unique` (`identifier`),
  ADD KEY `achats_store_id_foreign` (`store_id`);

--
-- Index pour la table `catalogue_customers`
--
ALTER TABLE `catalogue_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `catalogue_customers_email_unique` (`email`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Index pour la table `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_products_product_id_foreign` (`product_id`),
  ADD KEY `category_products_category_id_foreign` (`category_id`);

--
-- Index pour la table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `currency_settings`
--
ALTER TABLE `currency_settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_orders_store_id_foreign` (`store_id`),
  ADD KEY `customer_orders_catalogue_customer_id_foreign` (`catalogue_customer_id`);

--
-- Index pour la table `customer_order_items`
--
ALTER TABLE `customer_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_order_items_customer_order_id_foreign` (`customer_order_id`),
  ADD KEY `customer_order_items_product_id_foreign` (`product_id`);

--
-- Index pour la table `dettes`
--
ALTER TABLE `dettes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dettes_customer_id_foreign` (`customer_id`),
  ADD KEY `dettes_store_id_foreign` (`store_id`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `devis_numero_devis_unique` (`numero_devis`),
  ADD KEY `devis_store_id_foreign` (`store_id`),
  ADD KEY `devis_customer_id_foreign` (`customer_id`),
  ADD KEY `devis_created_by_foreign` (`created_by`),
  ADD KEY `devis_validated_by_foreign` (`validated_by`);

--
-- Index pour la table `devi_lines`
--
ALTER TABLE `devi_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devi_lines_devis_id_foreign` (`devis_id`),
  ADD KEY `devi_lines_product_id_foreign` (`product_id`);

--
-- Index pour la table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_expense_categories_id_foreign` (`expense_categories_id`),
  ADD KEY `expenses_user_id_foreign` (`user_id`),
  ADD KEY `expenses_store_id_foreign` (`store_id`);

--
-- Index pour la table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `factures_numero_facture_unique` (`numero_facture`),
  ADD KEY `factures_customer_id_foreign` (`customer_id`),
  ADD KEY `factures_store_id_foreign` (`store_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `journaliers`
--
ALTER TABLE `journaliers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ligne_commandes`
--
ALTER TABLE `ligne_commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ligne_commandes_achat_id_foreign` (`achat_id`),
  ADD KEY `ligne_commandes_product_id_foreign` (`product_id`);

--
-- Index pour la table `logistics`
--
ALTER TABLE `logistics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logistics_numeropurchase_unique` (`numeroPurchase`),
  ADD KEY `logistics_store_id_foreign` (`store_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiement_journaliers`
--
ALTER TABLE `paiement_journaliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paiement_journaliers_journalier_id_foreign` (`journalier_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_receipt_number_unique` (`receipt_number`),
  ADD KEY `payments_facture_id_foreign` (`facture_id`);

--
-- Index pour la table `payment_dettes`
--
ALTER TABLE `payment_dettes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_dettes_dette_id_foreign` (`dette_id`);

--
-- Index pour la table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`);

--
-- Index pour la table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_product_id_foreign` (`product_id`),
  ADD KEY `purchases_store_id_foreign` (`store_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_product_id_foreign` (`product_id`),
  ADD KEY `sales_store_id_foreign` (`store_id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock_histories`
--
ALTER TABLE `stock_histories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stock_histories_reference_unique` (`reference`),
  ADD KEY `stock_histories_store_id_type_reference_index` (`store_id`,`type`,`reference`);

--
-- Index pour la table `stock_transfers`
--
ALTER TABLE `stock_transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_transfers_product_id_foreign` (`product_id`),
  ADD KEY `stock_transfers_from_store_id_foreign` (`from_store_id`),
  ADD KEY `stock_transfers_to_store_id_foreign` (`to_store_id`);

--
-- Index pour la table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stores_store_name_unique` (`store_name`),
  ADD KEY `stores_place_id_foreign` (`place_id`),
  ADD KEY `stores_user_id_foreign` (`user_id`);

--
-- Index pour la table `store_products`
--
ALTER TABLE `store_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_products_product_id_foreign` (`product_id`),
  ADD KEY `store_products_store_id_foreign` (`store_id`);

--
-- Index pour la table `temoignages`
--
ALTER TABLE `temoignages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transaction_factures`
--
ALTER TABLE `transaction_factures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_factures_receipt_number_unique` (`receipt_number`),
  ADD KEY `transaction_factures_customer_id_foreign` (`customer_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `fk_store_id` (`store_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achats`
--
ALTER TABLE `achats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `catalogue_customers`
--
ALTER TABLE `catalogue_customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pour la table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `currency_settings`
--
ALTER TABLE `currency_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `customer_order_items`
--
ALTER TABLE `customer_order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `dettes`
--
ALTER TABLE `dettes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `devi_lines`
--
ALTER TABLE `devi_lines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `journaliers`
--
ALTER TABLE `journaliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ligne_commandes`
--
ALTER TABLE `ligne_commandes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `logistics`
--
ALTER TABLE `logistics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `paiement_journaliers`
--
ALTER TABLE `paiement_journaliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `payment_dettes`
--
ALTER TABLE `payment_dettes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT pour la table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stock_histories`
--
ALTER TABLE `stock_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT pour la table `stock_transfers`
--
ALTER TABLE `stock_transfers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `store_products`
--
ALTER TABLE `store_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `temoignages`
--
ALTER TABLE `temoignages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `transaction_factures`
--
ALTER TABLE `transaction_factures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achats`
--
ALTER TABLE `achats`
  ADD CONSTRAINT `achats_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `category_products`
--
ALTER TABLE `category_products`
  ADD CONSTRAINT `category_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD CONSTRAINT `customer_orders_catalogue_customer_id_foreign` FOREIGN KEY (`catalogue_customer_id`) REFERENCES `catalogue_customers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `customer_orders_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `customer_order_items`
--
ALTER TABLE `customer_order_items`
  ADD CONSTRAINT `customer_order_items_customer_order_id_foreign` FOREIGN KEY (`customer_order_id`) REFERENCES `customer_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT;

--
-- Contraintes pour la table `dettes`
--
ALTER TABLE `dettes`
  ADD CONSTRAINT `dettes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `dettes_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `devis_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `devis_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `devis_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`),
  ADD CONSTRAINT `devis_validated_by_foreign` FOREIGN KEY (`validated_by`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `devi_lines`
--
ALTER TABLE `devi_lines`
  ADD CONSTRAINT `devi_lines_devis_id_foreign` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `devi_lines_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_expense_categories_id_foreign` FOREIGN KEY (`expense_categories_id`) REFERENCES `expense_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `expenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `factures_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `ligne_commandes`
--
ALTER TABLE `ligne_commandes`
  ADD CONSTRAINT `ligne_commandes_achat_id_foreign` FOREIGN KEY (`achat_id`) REFERENCES `achats` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `ligne_commandes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT;

--
-- Contraintes pour la table `logistics`
--
ALTER TABLE `logistics`
  ADD CONSTRAINT `logistics_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE RESTRICT;

--
-- Contraintes pour la table `paiement_journaliers`
--
ALTER TABLE `paiement_journaliers`
  ADD CONSTRAINT `paiement_journaliers_journalier_id_foreign` FOREIGN KEY (`journalier_id`) REFERENCES `journaliers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_facture_id_foreign` FOREIGN KEY (`facture_id`) REFERENCES `factures` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `payment_dettes`
--
ALTER TABLE `payment_dettes`
  ADD CONSTRAINT `payment_dettes_dette_id_foreign` FOREIGN KEY (`dette_id`) REFERENCES `dettes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `purchases_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE RESTRICT;

--
-- Contraintes pour la table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE RESTRICT;

--
-- Contraintes pour la table `stock_histories`
--
ALTER TABLE `stock_histories`
  ADD CONSTRAINT `stock_histories_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `stock_transfers`
--
ALTER TABLE `stock_transfers`
  ADD CONSTRAINT `stock_transfers_from_store_id_foreign` FOREIGN KEY (`from_store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_transfers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_transfers_to_store_id_foreign` FOREIGN KEY (`to_store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `stores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT;

--
-- Contraintes pour la table `store_products`
--
ALTER TABLE `store_products`
  ADD CONSTRAINT `store_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `store_products_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `transaction_factures`
--
ALTER TABLE `transaction_factures`
  ADD CONSTRAINT `transaction_factures_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_store_id` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
