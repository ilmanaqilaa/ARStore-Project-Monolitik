-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 12:32 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ligas`
--

CREATE TABLE `ligas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ligas`
--

INSERT INTO `ligas` (`id`, `nama`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Asset 3 Dimensi', '3dlogo.png', NULL, NULL),
(2, 'Kaos AR', 'kaos.jpg', NULL, NULL),
(3, 'Catalog AR', 'catalog.png', NULL, NULL),
(4, 'Card AR', 'cardgames.png', NULL, NULL),
(6, 'Cincin Augmented Reality', '1673768116160.png', '2023-01-15 00:35:16', '2023-01-15 00:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(50, '2014_10_12_000000_create_users_table', 1),
(51, '2014_10_12_100000_create_password_resets_table', 1),
(52, '2019_08_19_000000_create_failed_jobs_table', 1),
(53, '2020_08_11_130922_create_ligas_table', 1),
(54, '2020_08_11_131251_create_products_table', 1),
(55, '2020_08_11_131307_create_pesanans_table', 1),
(56, '2020_08_11_131327_create_pesanan_details_table', 1),
(57, '2023_01_12_124016_add_ekstension_to_pesanan_details_table', 2),
(58, '2023_01_12_143623_add_ekstension_to_pesanan_details_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pemesanan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `total_harga` int(11) NOT NULL,
  `kode_unik` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bkt_transaksi` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `kode_pemesanan`, `status`, `total_harga`, `kode_unik`, `user_id`, `created_at`, `updated_at`, `bkt_transaksi`) VALUES
(17, 'JP-17', '2', 275000, 491, 4, '2023-01-31 20:47:53', '2023-01-31 20:54:38', '167522330843.jpeg'),
(18, 'JP-18', '2', 250000, 793, 4, '2023-01-31 20:57:47', '2023-01-31 20:58:13', '167522389037.jpeg'),
(19, 'JP-19', '2', 125000, 421, 4, '2023-01-31 20:58:48', '2023-01-31 20:59:13', '167522393695.jpeg'),
(20, 'JP-20', '2', 125000, 909, 4, '2023-01-31 21:03:47', '2023-01-31 21:04:06', '167522423537.jpeg'),
(21, 'JP-21', '2', 125000, 822, 7, '2023-02-01 03:20:50', '2023-02-01 03:21:15', '167524686098.jpeg'),
(22, 'JP-22', '2', 25000, 298, 7, '2023-02-01 03:50:12', '2023-02-01 03:50:43', '167524862217.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_details`
--

CREATE TABLE `pesanan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ekstension` varchar(255) COLLATE utf8_unicode_ci DEFAULT '-',
  `ukuran` varchar(255) COLLATE utf8_unicode_ci DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pesanan_details`
--

INSERT INTO `pesanan_details` (`id`, `jumlah_pesanan`, `total_harga`, `product_id`, `pesanan_id`, `created_at`, `updated_at`, `ekstension`, `ukuran`) VALUES
(25, 1, 125000, 1, 17, '2023-01-31 20:47:53', '2023-01-31 20:47:53', '.obj', NULL),
(26, 1, 25000, 17, 17, '2023-01-31 20:48:00', '2023-01-31 20:48:00', NULL, 'XXL'),
(27, 1, 125000, 4, 17, '2023-01-31 20:48:05', '2023-01-31 20:48:05', NULL, NULL),
(28, 1, 125000, 3, 18, '2023-01-31 20:57:47', '2023-01-31 20:57:47', '.blend', NULL),
(29, 1, 125000, 2, 18, '2023-01-31 20:57:52', '2023-01-31 20:57:52', '.obj', NULL),
(30, 1, 125000, 1, 19, '2023-01-31 20:58:48', '2023-01-31 20:58:48', NULL, NULL),
(31, 1, 125000, 2, 20, '2023-01-31 21:03:47', '2023-01-31 21:03:47', '.fbx', NULL),
(32, 1, 125000, 2, 21, '2023-02-01 03:20:50', '2023-02-01 03:20:50', '.fbx', NULL),
(33, 1, 25000, 17, 22, '2023-02-01 03:50:12', '2023-02-01 03:50:12', NULL, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `liga_id` int(11) NOT NULL,
  `is_ready` tinyint(1) NOT NULL DEFAULT '1',
  `jenis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `harga`, `liga_id`, `is_ready`, `jenis`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Desain Gedung', 125000, 1, 1, 'Desain gedung pencakar langit', 'building.jpg', NULL, NULL),
(2, 'Desain Dragon Head', 125000, 1, 1, 'Desain kepala naga yang menyeramkan', 'dragon.png', NULL, NULL),
(3, 'Desain RUmput', 125000, 1, 1, 'Asset rumput', 'grass.jpg', NULL, NULL),
(4, 'Desain Rumah', 125000, 1, 1, 'Desain rumah kompleks', 'house.jpg', NULL, NULL),
(5, 'Desain Kamar Isometric', 200000, 1, 1, 'Desain ruang kamar berbentuk isometric', 'isometric.png', NULL, '2023-01-17 18:22:04'),
(15, 'Dragon Skyrim', 125781, 1, 1, 'Ini adalah desain karakter naga dari game Skyrim', 'ScreenShot18.png', '2023-01-10 13:16:48', '2023-01-10 13:16:48'),
(17, 'Kaos AR Naga', 25000, 2, 1, 'Kaos yang dapat mengeluarkan animasi', 'ScreenShot36.png', '2023-01-12 05:31:07', '2023-01-12 05:31:07'),
(18, 'Karakter Skyrim', 250000, 1, 1, 'Ini adalah desain karakter game Skyrim bernama Paarthurnax', '1673760709144.png', '2023-01-14 22:31:49', '2023-01-14 22:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('admin','pelanggan') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pelanggan',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `email`, `email_verified_at`, `password`, `alamat`, `nohp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Ilman Aqilaa', 'admin', 'ilmanaqilaa2@gmail.com', NULL, '$2y$10$8r22DsEc7PNYfXMEsF4fmuxOWfoge8uZTqi53BS6TKVQQchP1DhZu', 'Bandung', '08817814787', NULL, NULL, NULL),
(2, 'tesi', 'pelanggan', 'tesi@gmail.com', NULL, '$2y$10$1dxji.8kTLAReJ60SrVhkO3x2TxQsku6qxui/mxaHV3xizktBhhOO', NULL, NULL, NULL, '2023-01-09 21:04:25', '2023-01-09 21:04:25'),
(3, 'meta', 'pelanggan', 'meta@gmail.com', NULL, '$2y$10$YCuVz77RlDWTb0DXaPQ9fuFfcKJIam4VyLp1lYjdiTpkZSuF7F14W', 'Bandung, Sukajadi', '0881147548', NULL, '2023-01-09 21:06:21', '2023-01-09 21:06:21'),
(4, 'Danny', 'pelanggan', 'danymcartney@gmail.com', NULL, '$2y$10$tDwNB7N0reuQIZATEHqkneQBUfUQO66V/mdFyUENesRJ3k5I1CBBS', 'Johannes Burg Cihampelas', '08814579568', NULL, '2023-01-10 12:23:21', '2023-01-10 12:23:21'),
(5, 'Metha', 'pelanggan', 'metha@gmail.com', NULL, '$2y$10$33aNSBB15GNnS6BD.OBUeunw4HU0hqfY.5XAXFYG65b0tEe3p2hAK', 'Bandung', '0881246753', NULL, '2023-01-15 22:45:33', '2023-01-15 22:45:33'),
(6, 'Nurdin', 'pelanggan', 'nurdin@gmail.com', NULL, '$2y$10$7uHCr6PCn67GWHgid4kowu0OtBn67ITKXk0.UUkKPnYu2/jiRJhVm', 'Bandung, Maleber', '08812457845', NULL, '2023-01-17 18:25:16', '2023-01-17 18:25:16'),
(7, 'Fathan', 'pelanggan', 'fathan@gmail.com', NULL, '$2y$10$sDG2PsvEiBao7ExWaVC6l.6MPLwrZcZCZMKXr./mU0ncOF2rZNJe2', 'Bandung', '08812474512', NULL, '2023-02-01 03:19:45', '2023-02-01 03:19:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ligas`
--
ALTER TABLE `ligas`
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
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ligas`
--
ALTER TABLE `ligas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
