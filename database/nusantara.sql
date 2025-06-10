-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2025 at 06:33 PM
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
-- Database: `nusantara`
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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `category` enum('pakaian_adat','tarian','rumah_adat','kerajinan','upacara','kuliner') NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `detailed_description` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tags`)),
  `photographer` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `description`, `image_url`, `region`, `category`, `is_featured`, `detailed_description`, `slug`, `views`, `tags`, `photographer`, `source`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Ulos Batak', 'Kain tenun tradisional masyarakat Batak yang memiliki makna spiritual dan sosial dalam berbagai upacara adat.', 'https://infokost.id/blog/wp-content/uploads/2023/10/Nama-Pakaian-Adat-Sumatera-Utara.webp', 'Sumatera Utara', 'pakaian_adat', 0, NULL, 'ulos-batak', 2, NULL, NULL, NULL, 1, '2025-06-09 11:06:50', '2025-06-09 07:13:18'),
(2, 'Kebaya Jawa', 'Pakaian tradisional wanita Jawa yang mencerminkan keanggunan dan kesederhanaan dalam filosofi hidup masyarakat Jawa.', 'https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/08/04/Snapinstaapp_334849439_1981022142234940_6665247490311761773_n_1080-3630450252.jpg', 'Jawa', 'pakaian_adat', 0, NULL, 'kebaya-jawa', 3, NULL, NULL, NULL, 1, '2025-06-09 11:06:50', '2025-06-09 07:15:39'),
(3, 'Payas Agung', 'Busana adat pernikahan Bali dengan perhiasan mendetail yang mencerminkan keindahan dan kemewahan budaya Bali.', 'https://i.pinimg.com/736x/f0/58/c6/f058c67c6945403d7798e17ea78026c8.jpg', 'Bali', 'pakaian_adat', 0, NULL, 'payas-agung', 0, NULL, NULL, NULL, 1, '2025-06-09 11:06:50', '2025-06-09 11:06:50'),
(4, 'Baju Bodo', 'Pakaian adat wanita Bugis-Makassar dengan warna-warna cerah yang melambangkan stratifikasi sosial pemakainya.', 'https://serayunews.pw/wp-content/uploads/2024/08/baju-bodo.jpeg', 'Sulawesi Selatan', 'pakaian_adat', 0, NULL, 'baju-bodo', 0, NULL, NULL, NULL, 1, '2025-06-09 11:06:50', '2025-06-09 11:06:50'),
(5, 'Tongkonan', 'Rumah adat Toraja dengan atap melengkung seperti perahu yang menjadi pusat kehidupan sosial dan ritual masyarakat Toraja. Tongkonan memiliki struktur yang dibangun berdasarkan filosofi tiga lapisan dunia: dunia atas (langit), dunia tengah (bumi), dan dunia bawah.', 'https://www.ruparupa.com/blog/wp-content/uploads/2022/02/toraja-houses-1500.jpg', 'Sulawesi Selatan', 'rumah_adat', 0, NULL, 'tongkonan', 0, NULL, NULL, NULL, 1, '2025-06-09 11:06:50', '2025-06-09 11:06:50'),
(6, 'Rumah Gadang', 'Rumah adat Minangkabau dengan atap bergonjong menyerupai tanduk kerbau. Struktur rumah mencerminkan sistem matrilineal masyarakat Minang, dengan kamar-kamar yang disusun berdasarkan hierarki perempuan dalam keluarga.', 'https://awsimages.detik.net.id/community/media/visual/2023/08/09/rumah-adat-sumatera-barat_169.jpeg?w=1200', 'Sumatera Barat', 'rumah_adat', 0, NULL, 'rumah-gadang', 0, NULL, NULL, NULL, 1, '2025-06-09 11:06:50', '2025-06-09 11:06:50'),
(7, 'Rumah Betang', 'Rumah panjang tradisional suku Dayak yang dapat menampung hingga 150 orang. Dibangun tinggi di atas tiang untuk menghindari banjir dan serangan musuh, Rumah Betang mencerminkan nilai kebersamaan dan gotong royong.', 'https://cdn2.gnfi.net/gnfi/uploads/articles/rumah-betang-2-34f72cc687b5321f675abebe64ab962b.jpg', 'Kalimantan', 'rumah_adat', 0, NULL, 'rumah-betang', 0, NULL, NULL, NULL, 1, '2025-06-09 11:06:50', '2025-06-09 11:06:50'),
(8, 'Honai', 'Rumah tradisional suku Dani di Papua yang berbentuk bundar dengan atap kerucut. Honai dirancang untuk menyimpan panas di malam hari di daerah pegunungan yang dingin. Terdapat pembagian Honai berdasarkan gender dan fungsi sosial.', 'https://www.ruparupa.com/blog/wp-content/uploads/2022/02/rumah-adat-papua-e1645175880542.jpg', 'Papua', 'rumah_adat', 0, NULL, 'honai', 0, NULL, NULL, NULL, 1, '2025-06-09 11:06:50', '2025-06-09 11:06:50'),
(9, 'Tari Kecak', 'Tarian yang menampilkan puluhan penari pria yang duduk melingkar dan menyerukan \"cak\" secara berirama. Tarian ini menceritakan epos Ramayana dan merupakan perpaduan seni tari dan musik vokal.', 'https://geti.id/wp-content/uploads/2023/08/image-1024x695.png', 'Bali', 'tarian', 0, NULL, 'tari-kecak', 0, NULL, NULL, NULL, 1, '2025-06-09 11:06:50', '2025-06-09 11:06:50');

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
(4, '2025_06_09_092832_create_galleries_table', 2);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kesya', 'kesya@example.com', NULL, '$2y$12$xN5NixklUGPd4g6GwviUzuVUf113TA9roB6SUJiHBkCoPfal7rLIe', NULL, '2025-06-09 04:18:15', '2025-06-09 04:18:15'),
(2, 'kesya 2', 'kesya@example2.com', NULL, '$2y$12$6O/pIqzpLCLGB6iR6kER3ur38UHRwOOnBA.Dppawcn42i.d1oTvGu', NULL, '2025-06-09 04:24:57', '2025-06-09 04:24:57'),
(3, 'kesya 4', 'kesya@example3.com', NULL, '$2y$12$mlge/4vwwrpg90OoU5lBquvOG1NBgQoaTtv6BLe.5Y63oph9RpB9O', NULL, '2025-06-09 04:29:16', '2025-06-09 05:41:52');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_category_is_active` (`category`,`is_active`),
  ADD KEY `idx_region_is_active` (`region`,`is_active`),
  ADD KEY `idx_featured_is_active` (`is_featured`,`is_active`),
  ADD KEY `idx_slug` (`slug`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
